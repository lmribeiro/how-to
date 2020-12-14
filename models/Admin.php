<?php

namespace app\models;

use Yii;
use app\models\behaviors\UploadImageBehavior;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $email
 * @property string $role
 * @property string $avatar
 * @property string $avatar_path
 * @property int $status
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_hash
 * @property string $password_reset_token
 * @property int $is_logged
 * @property string $latest_login
 * @property string $created_at
 * @property string $updated_at
 * @property int $deleted
 * @property string $deleted_at
 */
class Admin extends ActiveRecord implements IdentityInterface
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public $avatar;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::class,
                'attributes' => ['avatar'],
                'scenarios' => ['insert', 'update'],
                'placeholder' => '@webroot/images/placeholder/admin/avatar.png',
                'path' => '@webroot/images/uploads/admin/{id}/avatar.png',
                'url' => '@web/images/uploads/admin/{id}/avatar.png',
                'thumbs' => [
                    'thumb' => [
                        'width' => 30,
                        'height' => 30
                    ],
                    'preview' => [
                        'width' => 150,
                        'height' => 150
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'is_logged', 'deleted'], 'integer'],
            [['username', 'email', 'auth_key'], 'required'],
            [['role'], 'string'],
            [['latest_login', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['username', 'name', 'email', 'avatar', 'avatar_path', 'password_hash', 'password_reset_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique', 'targetAttribute' => ['email']],
            [['username'], 'unique', 'targetAttribute' => ['username']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'name' => Yii::t('app', 'Nome'),
            'email' => Yii::t('app', 'Email'),
            'role' => Yii::t('app', 'Role'),
            'avatar' => Yii::t('app', 'Avatar'),
            'avatar_path' => Yii::t('app', 'Avatar Path'),
            'status' => Yii::t('app', 'Estado'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_hash' => Yii::t('app', 'Password Reset Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'is_logged' => Yii::t('app', 'Está logado'),
            'latest_login' => Yii::t('app', 'Último Login'),
            'created_at' => Yii::t('app', 'Adicionado'),
            'updated_at' => Yii::t('app', 'Editado'),
            'deleted' => Yii::t('app', 'Removido'),
            'deleted_at' => Yii::t('app', 'Removido a'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchant()
    {
        return $this->hasOne(Merchant::className(), ['id' => 'merchant_id']);
    }

    public static function getStatusList()
    {
        return [
            self::STATUS_INACTIVE => Yii::t('app', 'Inativo'),
            self::STATUS_ACTIVE => Yii::t('app', 'Ativo')
        ];
    }

    public function getStatusLabel()
    {
        return $this->status ?
                '<span class="badge badge-success">'.Yii::t("app", "Ativo").'</span>' :
                '<span class="badge badge-danger">'.Yii::t("app", "Inativo").'</span>';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne([
                    'username' => $username,
                    'status' => self::STATUS_ACTIVE
        ]);
    }

    /**
     * Finds user by email
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne([
                    'email' => $email,
                    'status' => self::STATUS_ACTIVE
        ]);
    }

    /**
     * Finds user by password reset token
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                        //'status' => self::STATUS_ACTIVE
        ]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword(
                        $password, $this->password_hash
        );
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash(
                $password
        );
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates username to register an user
     */
    public function generateUsername()
    {
        $this->username = 'JohnDoe'.Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString().'_'.time();
    }

    public function sendEmail()
    {
        $admin = Admin::findOne([
                    'email' => $this->email,
        ]);

        $email = \Yii::$app->mailer
                ->compose('set-password-new', ['admin' => $admin])
                ->setTo($this->email)
                ->setFrom([
                    \Yii::$app->params['adminEmail'] => \Yii::$app->name
                ])
                ->setSubject(Yii::$app->name.'  | '.Yii::t('app', 'Validação conta'))
                ->send();

        return $email;
    }

    public function isComplete()
    {
        return (bool) $this->merchant_id;
    }

    public static function userIdCallback()
    {
        $user = self::findIdentity(Yii::$app->user->identity);
        return $user ? $user->id : null;
    }

    public function softDelete()
    {
        $this->attributes = [
            'username' => 'johndoe'.$this->id,
            'name' => 'John Doe',
            'email' => "johndoe".$this->id."@mail.com",
            'avatar' => null,
            'status' => 0,
            'is_logged' => 0,
            'latest_login' => null,
            'deleted' => 1,
            'deleted_at' => date('Y-m-d G:i:s')
        ];

        $this->generateAuthKey();
        if ($this->save()) {
            return true;
        }
        return false;
    }

}
