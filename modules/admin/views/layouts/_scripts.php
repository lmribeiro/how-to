<?php

use yii\helpers\Url;

?>
<script>
    $(function () {
        let mini = '<?= Yii::$app->session->get('minSidebar') ? 'true' : 'false' ?>';
        if (mini === 'true') {
            update_sidebar_tooltip(mini);
        }
    });

    $('#toggle-sidebar').on('click', function () {
        let sidebar = $('body').hasClass("sidebar-mini");
        $.ajax({
            url: '<?= Url::to(["/dashboard/sidebar"]) ?>',
            type: 'post',
            data: {min: !sidebar}
        }).done(function (response) {
            update_sidebar_tooltip(!sidebar);
        }).fail(function (response) {
//            console.log("error");
        });
    });
</script>
