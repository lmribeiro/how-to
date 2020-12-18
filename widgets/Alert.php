<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;

class Alert extends Widget
{
    public $messageError;
    public $messageInfo;
    public $messageSuccess;
    public $messageWarning;
    public $position;

    public function init()
    {
        parent::init();

        if (Yii::$app->session->hasFlash('error')) {
            $this->messageError = Yii::$app->session->getFlash('error');
        }

        if (Yii::$app->session->hasFlash('info')) {
            $this->messageInfo = Yii::$app->session->getFlash('info');
        }

        if (Yii::$app->session->hasFlash('success')) {
            $this->messageSuccess = Yii::$app->session->getFlash('success');
        }

        if (Yii::$app->session->hasFlash('warning')) {
            $this->messageWarning = Yii::$app->session->getFlash('warning');
        }

        if ($this->position === null) {
            $this->position = 'toast-top-center';
        }
    }

    public function run()
    {
        $view = $this->getView();

        if ($this->messageError) {
            $view->registerJs(
                'toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "' .
                    $this->position .
                    '",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "10000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("' .
                    $this->messageError .
                    '");'
            );
        }

        if ($this->messageInfo) {
            $view->registerJs(
                'toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "' .
                    $this->position .
                    '",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "10000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.info("' .
                    $this->messageInfo .
                    '");'
            );
        }

        if ($this->messageSuccess) {
            $view->registerJs(
                'toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "' .
                    $this->position .
                    '",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "10000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("' .
                    $this->messageSuccess .
                    '");'
            );
        }

        if ($this->messageWarning) {
            $view->registerJs(
                'toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "' .
                    $this->position .
                    '",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "10000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.warning("' .
                    $this->messageWarning .
                    '");'
            );
        }
    }
}
