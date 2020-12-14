<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Settings;

/**
 * LoginForm is the model behind the login form.
 */
class BoSettingsForm extends Model
{
    public $terms_pt;
    public $terms_en;
    public $terms_es;
    public $privacy_pt;
    public $privacy_en;
    public $privacy_es;
    public $admin_email;
    public $faqs_email;
    public $noreplay_email;
    public $error_report_email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['terms_pt', 'terms_en', 'privacy_pt', 'privacy_en', 'admin_email', 'faqs_email', 'noreplay_email', 'error_report_email'], 'required'],
            [['terms_pt', 'terms_en', 'privacy_pt', 'privacy_en', 'admin_email', 'faqs_email', 'noreplay_email', 'error_report_email'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'terms_pt' => Yii::t('app', 'Condições de Utilização'),
            'terms_en' => Yii::t('app', 'Condições de Utilização'),
            'privacy_pt' => Yii::t('app', 'Política de Privacidade'),
            'privacy_en' => Yii::t('app', 'Política de Privacidade'),
            'admin_email' => Yii::t('app', 'Email Geral'),
            'faqs_email' => Yii::t('app', 'Email FAQs'),
            'noreplay_email' => Yii::t('app', 'Email de envio de dados de ativação/recuperação de contas'),
            'error_report_email' => Yii::t('app', 'Email de envio de logs aplicacionais'),
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     */
    public function saveAll()
    {
        $this->saveItem('terms_pt', $this->terms_pt);
        $this->saveItem('terms_en', $this->terms_en);
        $this->saveItem('privacy_pt', $this->privacy_pt);
        $this->saveItem('privacy_en', $this->privacy_en);

        $this->saveItem('admin_email', $this->admin_email);
        $this->saveItem('faqs_email', $this->faqs_email);
        $this->saveItem('noreplay_email', $this->noreplay_email);
        $this->saveItem('error_report_email', $this->error_report_email);

        return true;
    }

    public function saveItem($key, $value)
    {
        $model = Settings::findOne($key);
        if (!$model) {
            $model = new Settings();
            $model->key = $key;
        }
        $model->value = $value;
        $model->save();
    }
}
