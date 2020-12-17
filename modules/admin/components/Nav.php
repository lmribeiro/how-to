<?php

namespace app\modules\admin\components;

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
            'name' => Yii::t('app', 'Definições'),
            'action' => Url::to(["$module/settings"]),
        ];

        array_push($settingsItems, $setting);
        array_push($settingsItems, $profile);
        array_push($settingsItems, $logout);

        $settings = [
            'name' => Yii::t('app', 'Menu'),
            'items' => $settingsItems,
            'divider' => true,
        ];

        array_push($menu, $settings);

        return $menu;
    }

    public static function getSideNav(): array
    {
        if (Yii::$app->user->isGuest) {
            return [];
        }

        $menu = $homeItems = $kbItems = $faqItems = $adminItems = [];

        // home
        $dashboard = [
            'id' => 'dashboard',
            'icon' => 'fas fa-fire',
            'name' => Yii::t('app', 'Dashboard'),
            'hasItems' => false,
            'active' => ['dashboard'],
        ];

        $admins = [
            'id' => 'admin',
            'icon' => 'fas fa-user-tie',
            'name' => Yii::t('app', 'Utilizadores'),
            'hasItems' => false,
            'active' => ['admin'],
        ];

        $articles = [
            'id' => 'article',
            'icon' => 'fas fa-file-alt',
            'name' => Yii::t('app', 'Artigos'),
            'hasItems' => false,
            'active' => ['article'],
        ];

        $articlesCategories = [
            'id' => 'article-category',
            'icon' => 'fas fa-th-list',
            'name' => Yii::t('app', 'Categorias'),
            'hasItems' => false,
            'active' => ['article-category'],
        ];
        $articlesTags = [
            'id' => 'article-tags',
            'icon' => 'fas fa-tags',
            'name' => Yii::t('app', 'Tags'),
            'hasItems' => false,
            'active' => ['article-tags'],
        ];

        $faqs = [
            'id' => 'faq',
            'icon' => 'fas fa-question-circle',
            'name' => Yii::t('app', 'Questões'),
            'hasItems' => false,
            'active' => ['faq'],
        ];

        $faqsCategories = [
            'id' => 'faq-category',
            'icon' => 'fas fa-th-list',
            'name' => Yii::t('app', 'Categorias'),
            'hasItems' => false,
            'active' => ['faq-category'],
        ];

        switch (Yii::$app->user->identity->role) {
            case 'ADMIN':
                array_push($homeItems, $dashboard);
                array_push($kbItems, $articles);
                array_push($kbItems, $articlesCategories);
                array_push($kbItems, $articlesTags);
                array_push($faqItems, $faqs);
                array_push($faqItems, $faqsCategories);
                array_push($adminItems, $admins);
                break;
        }

        // Create categories
        $home = [
            'name' => Yii::t('app', 'Home'),
            'items' => $homeItems
        ];

        $kb = [
            'name' => Yii::t('app', 'Knowledge Base'),
            'items' => $kbItems,
        ];

        $faqs = [
            'name' => Yii::t('app', 'FAQs'),
            'items' => $faqItems,
        ];

        $admin = [
            'name' => Yii::t('app', 'Administração'),
            'items' => $adminItems,
        ];

        // Add to menus
        if (!empty($home['items'])) {
            array_push($menu, $home);
        }
        if (!empty($kb['items'])) {
            array_push($menu, $kb);
        }
        if (!empty($faqs['items'])) {
            array_push($menu, $faqs);
        }
        if (!empty($admin['items'])) {
            array_push($menu, $admin);
        }

        return $menu;
    }
}
