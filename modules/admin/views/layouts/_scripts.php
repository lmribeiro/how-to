<?php

use yii\helpers\Url;

?>
<script>
    $(function () {
        var mini = '<?= Yii::$app->session->get('min_sidebar') ? 'true' : 'false' ?>';
        if (mini === 'true') {
            update_sidebar_tooltip(mini);
        }
    });

    $('#toggle-sidebar').on('click', function () {
        var sidebar = $('body').hasClass("sidebar-mini");
        $.ajax({
            url: '<?= Url::to(["/admin/auth/sidebar"]) ?>',
            type: 'post',
            data: {min: !sidebar}
        }).done(function (response) {
            update_sidebar_tooltip(!sidebar);
        }).fail(function (response) {
//            console.log("error");
        });
    });

    $('.tumbler_wrapper').on('click', function () {
        toggleTheme($('body').hasClass("skin-dark"));
    });

    function toggleTheme(theme) {
        $.ajax({
            url: '<?= Url::to(["/admin/auth/theme"]) ?>',
            type: 'post',
            data: {min: !theme}
        }).done(function (response) {
            $('body').toggleClass('skin-dark');
        }).fail(function (response) {
//            console.log(response);
        });
    }
</script>