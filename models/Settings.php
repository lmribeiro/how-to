<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property string $key
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 * @property int $deleted
 * @property string $deleted_at
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['value'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['deleted'], 'integer'],
            [['key'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'key' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted' => Yii::t('app', 'Deleted'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }
}
