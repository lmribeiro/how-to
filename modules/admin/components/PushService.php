<?php

namespace app\components;

use Yii;
use yii\helpers\Url;
use app\models\{
    User,
    Device,
    AdminDevice,
    PushMessageUser,
    PushMessageAdmin
};

class PushService
{

    public $cert = null;
    public $inDev = false;
    public $passphrase = '12345';
    public $sound = 'default';
    public $badge = 1;
    public $firebasePushKey = null;
    public $gateway = null;
    public $maxIosDevices = 500;
    public $maxAndroidDevices = 1000;

    public function __construct()
    {
        $this->firebasePushKey = Yii::$app->params['firebasePushKey'];
    }

    public function sendOneOrAll($deviceOrUser, $pushMessage, $type = 'INBOX', $id = null)
    {
        if ($deviceOrUser instanceof User) {
            $this->sendOne($deviceOrUser, $pushMessage, $type, $id);
        } else {
            $this->sendOneDevice($deviceOrUser, $pushMessage, $type, $id);
        }
    }

    /**
     * Send push notification.
     *
     * @param type $user
     * @param type $merchant
     * @param type $transaction
     * @param type $type
     * @param type $id
     */
    public function sendOne($user, $pushMessage, $type = 'INBOX', $id = null)
    {
        $devices = Device::find()->where(['user_id' => $user->id, 'logged' => 1])->all();

        $msgUser = new PushMessageUser();
        $msgUser->user_id = $user->id;
        $msgUser->push_message_id = $pushMessage->id;
        $msgUser->save();

        $tokens = $itokens = [];
        foreach ($devices as $device) {
            if ($device->client_type === 'Android') {
                array_push($tokens, $device->push_token);
            } elseif ($device->client_type === 'iOS') {
                array_push($itokens, $device->push_token);
            }
        }

        if (count($tokens) > 0) {
            $this->sendPushMessageAndroid($tokens, $pushMessage->title, $pushMessage->subtitle, $type, $id);
        }

        if (count($itokens) > 0) {
            $this->sendPushMessageIOS($itokens, $pushMessage->title, $pushMessage->subtitle, $type, $id);
        }
    }

    public function sendOneAdmin($admin, $pushMessage, $type = 'INBOX', $id = null)
    {
        $devices = AdminDevice::find()->where(['admin_id' => $admin->id, 'logged' => 1])->all();

        $msgUser = new PushMessageAdmin();
        $msgUser->admin_id = $admin->id;
        $msgUser->push_message_id = $pushMessage->id;
        $msgUser->save();

        $tokens = $itokens = [];
        foreach ($devices as $device) {
            if ($device->client_type === 'Android') {
                array_push($tokens, $device->push_token);
            } elseif ($device->client_type === 'iOS') {
                array_push($itokens, $device->push_token);
            }
        }

        if (count($tokens) > 0) {
            $this->sendPushMessageAndroid($tokens, $pushMessage->title, $pushMessage->subtitle, $type, $id);
        }

        if (count($itokens) > 0) {
            $this->sendPushMessageIOS($itokens, $pushMessage->title, $pushMessage->subtitle, $type, $id);
        }
    }

    /**
     * Send device push notification.
     *
     * @param type $device
     * @param type $pushMessage
     * @param type $type
     * @param type $id
     */
    public function sendOneDevice($device, $pushMessage, $type = 'INBOX', $id = null)
    {
        $msgUser = new PushMessageUser();
        $msgUser->user_id = $device->user_id;
        $msgUser->push_message_id = $pushMessage->id;
        if (!$msgUser->save()) {
            Yii::debug(json_encode($msgUser->getErrors()));
        }

        if ($device->client_type === 'Android') {
            $this->sendPushMessageAndroid([$device->push_token], $pushMessage->title, $pushMessage->subtitle, $type, $id);
        } elseif ($device->client_type === 'iOS') {
            $this->sendPushMessageIOS([$device->push_token], $pushMessage->title, $pushMessage->subtitle, $type, $id);
        }
    }

    /**
     * Send push
     *
     * @param type $lang
     * @param type $title
     * @param type $message
     * @param type $type
     * @param type $id
     * @return type
     */
    public function sendPush($lang, $title, $message, $type = 'INBOX', $id = null)
    {
        $ausers = [];
        $query = User::find()
                ->where(['accepts_push_notifications' => 1, 'language' => $lang]);

        $users = $query->all();

        foreach ($users as $user) {
            $msg = new PushMessageUser();
            $msg->user_id = $user->id;
            $msg->push_message_id = $message->id;
            $msg->save();
            array_push($ausers, $user->id);
        }

        $ids = implode(',', $ausers);
        $this->sendBulkPush($ids, $title, $message, $type, $id);


        return count($users);
    }

    /**
     * Send bulk push notifications.
     *
     * @param type $title
     * @param type $message
     * @param type $type
     * @param type $id
     */
    protected function sendBulkPush($users, $title, $message, $type, $id)
    {
        $devices = Device::find()->where("user_id IN ($users)")->all();

        $tokens = $itokens = [];
        foreach ($devices as $device) {
            if ($device->client_type === 'Android') {
                array_push($tokens, $device->push_token);
            } elseif ($device->client_type === 'iOS') {
                array_push($itokens, $device->push_token);
            }
        }

        if (count($tokens) > 0) {
            $this->sendPushMessageAndroid($tokens, $title, $message->message, $type, $id);
        }
        if (count($itokens) > 0) {
            $this->sendPushMessageIOS($itokens, $title, $message->message, $type, $id);
        }
    }

    /**
     * Send bulk push notifications to Android devices.
     *
     * @param array  $tokens  Devices push tokens
     * @param string $message Message to send
     *
     * @return int number of push notifications sent
     */
    public function sendPushMessageAndroid($tokens, $title, $message, $type, $id)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $data = array(
            'registration_ids' => [],
            'data' => array(
                'title' => $title,
                'type' => $type,
                'id' => $id,
                'message' => $message,
                'sender' => Yii::$app->name,
                'details' => null,
                'vibrate' => 1,
                'sound' => 1,
                "image" => Url::base(true)."/images/icon.png",
                "image-type" => "circle",
                'soundname' => 'default',
            ),
        );

        $total_devices = count($tokens);
        $total_failure = 0;
        $todo = (float) $total_devices / $this->maxAndroidDevices;
        $done = (float) 0;

        if ($total_devices > $this->maxAndroidDevices) {
            $push_tokens = array_chunk($tokens, $this->maxAndroidDevices);
        } else {
            $push_tokens[] = $tokens;
        }

        while ($done < $todo) {
            $data['registration_ids'] = $push_tokens[$done];
            // use key 'http' even if you send the request to https://...
            $options = array(
                'http' => array(
                    'header' => "Authorization: key=$this->firebasePushKey\r\nContent-type: application/json\r\n",
                    'method' => 'POST',
                    'ignore_errors' => true,
                    'content' => json_encode($data),
                ),
            );

            $done++;

            // Send
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            $result_aux = json_decode($result, true);
            $failure = $result_aux['failure'];

            if ($failure > 0) {
                Yii::error("<br/>Push ERROR (Android) <br/>Failures: {$failure} <br/>Result:<br/>".$result."\nData:<br/>".json_encode($data));
                $total_failure += $failure;
            }

            // Yii::error("<br/>Push SUCESS (Android)<br/>Result:\n".$result."<br/>Data:<br/>".json_encode($data));
        }

        Yii::debug('push to android:', "\n\ntotal_devices:$total_devices\n total_failure:$total_failure");

        return $total_devices - $total_failure;
    }

    /**
     * Send bulk push notifications to iOS devices.
     *
     * @param array  $tokens  Devices push tokens
     * @param string $message Message to send
     *
     * @return bool|int False if the connection fails| Number o push notifications sent
     */
    public function sendPushMessageIOS($tokens, $title, $message, $type, $id)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $data = [
            "registration_ids" => [],
            "notification" => [
                "title" => $title,
                "body" => $message
            ],
            "data" => [
                'id' => $id,
                'type' => $type,
                'sound' => $this->sound,
                'badge' => $this->badge,
            ]
        ];

        $total_devices = count($tokens);
        $total_failure = 0;
        $todo = (float) $total_devices / $this->maxAndroidDevices;
        $done = (float) 0;

        if ($total_devices > $this->maxAndroidDevices) {
            $push_tokens = array_chunk($tokens, $this->maxAndroidDevices);
        } else {
            $push_tokens[] = $tokens;
        }

        while ($done < $todo) {
            $data['registration_ids'] = $push_tokens[$done];
            $options = array(
                'http' => array(
                    'header' => "Authorization: key=$this->firebasePushKey\r\nContent-type: application/json\r\n",
                    'method' => 'POST',
                    'ignore_errors' => true,
                    'content' => json_encode($data),
                ),
            );

            $done++;

            // Send
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            $result_aux = json_decode($result, true);
            $failure = $result_aux['failure'];

            if ($failure > 0) {
                Yii::error("\nPush ERROR (iOS) \nFailures: {$failure} \nResult:\n".$result."\nData:\n".json_encode($data), "error", "PushService::sendBulkPushMessageIOS");
                $total_failure += $failure;
            }
        }

        Yii::debug('push to ios:', "\n\ntotal_devices:$total_devices\n total_failure:$total_failure");

        return $total_devices - $total_failure;
    }

}
