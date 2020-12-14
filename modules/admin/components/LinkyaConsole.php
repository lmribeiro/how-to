<?php

namespace app\components;

use Yii;
use yii\base\Component;

class LinkyaConsole extends Component
{
    const WINDOWNS = 'WIN';
    public $output=null;

    public function init()
    {
        $base_path = Yii::$app->basePath;
        if (!$this->output) {
            $this->output=">> {$base_path}/runtime/logs/app.log 2>&1 &";
        }
    }


    public function exec(string $function, array $args, bool $response = false)
    {
        $base_path = Yii::$app->basePath;

        if (stristr(PHP_OS, self::WINDOWNS)) {
            if ($response) {
                return popen("start /B php -f {$base_path}/yii $function " . implode(' ', $args), "r");
            } else {
                pclose(popen("start /B php -f {$base_path}/yii $function " . implode(' ', $args) . " {$this->output}", "r"));
            }
        } else {
            if ($response) {
                return exec("php {$base_path}/yii $function " . implode(' ', $args));
            } else {
                exec("php {$base_path}/yii $function " . implode(' ', $args) . " {$this->output}");
            }
        }
    }

    public function multiple($commands)
    {
        foreach ($commands as $key => $command) {
            $this->exec($key, $command);
        }
    }
}
