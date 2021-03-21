<?php

namespace app\components;

use Yii;
use yii\helpers\Json;
use yii\httpclient\Client;

class CurtosService
{

    public $apiUrl = 'https://curtos.pt/api/v1/';
    public $apiKey = null;

    public function __construct()
    {
//        $this->apiKey = Yii::$app->params['curtos']['apiKey'];
    }

    public function getShortLink($target)
    {
        $url = $this->apiUrl . 'create';
        try {
            $client = new Client();
            $response = $client->createRequest()
                ->setMethod('POST')
                ->setHeaders([
                    'Authorization' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ])
                ->setContent(json_encode(['target' => $target]))
                ->setUrl($url)
                ->send();
            $result = Json::decode($response->getContent());
            if ($result->code == 200 || $result->code == 201) {
                return $result->data;
            }
            return false;
        } catch (\Throwable $e) {
            Yii::error('CurtosService::getShortLink ERROR :: ' . Json::encode($e->getMessage()));
            return false;
        }
    }
}
