<?php

namespace app\components;

use Yii;
use yii\helpers\Url;

class Nav
{

    public static function getTopNav(): array
    {
        if (Yii::$app->user->isGuest) {
            return [];
        }

        $module = '/admin';
        $menu = [];
        $settingsItems = [];
        $userItems = [];

        $profile = [
            'icon' => 'far fa-user',
            'class' => '',
            'name' => Yii::t('app', 'Perfil'),
            'action' => Url::to(["$module/admin/view", 'id' => Yii::$app->user->identity->id]),
        ];

        $logout = [
            'icon' => 'fas fa-sign-out-alt',
            'class' => 'text-danger',
            'name' => Yii::t('app', 'Sair'),
            'action' => Url::to(["/auth/logout"]),
        ];

        $setting = [
            'icon' => 'fas fa-cog',
            'class' => '',
            'name' => Yii::t('app', 'Gestão'),
            'action' => Url::to(["$module/dashboard"]),
        ];


        array_push($settingsItems, $setting);
        array_push($settingsItems, $profile);
        array_push($settingsItems, $logout);

        // Create categories
        $settings = [
            'name' => Yii::t('app', 'MENU'),
            'items' => $settingsItems,
            'divider' => false,
        ];

        array_push($menu, $settings);

        return $menu;
    }
}
