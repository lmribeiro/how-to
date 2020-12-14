<?php

use yii\helpers\Url;

?>
<script>

    $('.tumbler_wrapper').on('click', function () {
        toggleTheme($('body').hasClass("skin-dark"));
    });

    function toggleTheme(theme) {
        $.ajax({
            url: '<?= Url::to(["/auth/theme"]) ?>',
            type: 'post',
            data: {min: !theme}
        }).done(function (response) {
            $('body').toggleClass('skin-dark');
        }).fail(function (response) {
//            console.log(response);
        });
    }
</script>
