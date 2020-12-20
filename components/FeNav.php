<?php

namespace app\components;

use Yii;
use yii\helpers\Url;

class FeNav
{

    public static function getTopNav(): array
    {
        if (Yii::$app->user->isGuest) {
            return [];
        }

        $module = '/admin';
        $menu = [];
        $settingsItems = [];

        $setting = [
            'icon' => 'fas fa-cog',
            'class' => '',
            'name' => Yii::t('app', 'Gestão'),
            'action' => Url::to(["$module/dashboard"]),
        ];

        $add = [
            'icon' => 'fas fa-plus',
            'class' => '',
            'name' => Yii::t('app', 'Adicionar Artigo'),
            'action' => Url::to(["/article/create"]),
        ];

        $profile = [
            'icon' => 'far fa-user',
            'class' => '',
            'name' => Yii::t('app', 'Perfil'),
            'action' => Url::to(["/user/view", 'id' => Yii::$app->user->identity->id]),
        ];

        $logout = [
            'icon' => 'fas fa-sign-out-alt',
            'class' => 'text-danger',
            'name' => Yii::t('app', 'Sair'),
            'action' => Url::to(["/auth/logout"]),
        ];

        switch (Yii::$app->user->identity->role) {
            case "ADMIN":
                array_push($settingsItems, $setting);
                array_push($settingsItems, $add);
                break;
            case "EDITOR":
                array_push($settingsItems, $add);
                break;
        }

        array_push($settingsItems, $profile);
        array_push($settingsItems, $logout);

        $settings = [
            'name' => Yii::t('app', 'MENU'),
            'items' => $settingsItems,
            'divider' => false,
        ];

        array_push($menu, $settings);

        return $menu;
    }
}
