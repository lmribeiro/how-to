<?php

use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */

?>
<?php $this->beginPage() ?>
<html  lang="<?= Yii::$app->language ?>">
    <head>
        <?php $this->head() ?>

        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">

            @media only screen and (max-width: 620px) {
                table[class=body] h1 {
                    font-size: 28px !important;
                    margin-bottom: 10px !important; }
                table[class=body] p,
                table[class=body] ul,
                table[class=body] ol,
                table[class=body] td,
                table[class=body] span,
                table[class=body] a {
                    font-size: 16px !important; }
                table[class=body] .wrapper,
                table[class=body] .article {
                    padding: 10px !important; }
                table[class=body] .content {
                    padding: 0 !important; }
                table[class=body] .container {
                    padding: 0 !important;
                    width: 100% !important; }
                table[class=body] .main {
                    border-left-width: 0 !important;
                    border-radius: 0 !important;
                    border-right-width: 0 !important; }
                table[class=body] .btn table {
                    width: 100% !important; }
                table[class=body] .btn a {
                    width: 100% !important; }
                table[class=body] .img-responsive {
                    height: auto !important;
                    max-width: 100% !important;
                    width: auto !important; }}

            @media all {
                .ExternalClass {
                    width: 100%; }
                .ExternalClass,
                .ExternalClass p,
                .ExternalClass span,
                .ExternalClass font,
                .ExternalClass td,
                .ExternalClass div {
                    line-height: 100%; }
                .apple-link a {
                    color: inherit !important;
                    font-family: inherit !important;
                    font-size: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                    text-decoration: none !important; }
                .btn-primary table td:hover {
                    background-color: #34495e !important; }
                .btn-primary a:hover {
                    background-color: #34495e !important;
                    border-color: #34495e !important; }
            }

            a {
                color: cadetblue;
                text-decoration: none;
            }
            a:hover {
                color: #A81917;
            }
            .button {
                color:  #A81917!important;
                border: 2px solid #A81917!important;
                padding: 7px;
                border-radius: 4px;
                text-transform: uppercase;
            }
            .button:hover {
                background-color: #A81917!important;
                color: #FFFFFF !important;
            }
            .linkya:hover {
                color: #DE6158!important;
            }
        </style>
    </head>
    <body class="" style="background-color:#fff;font-family:sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
        <?php $this->beginBody() ?>
        <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background-color:#fff; width:100%;">
            <tr style="background-size: 100%;background-position: bottom;background-repeat: no-repeat;">
                <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
                <td class="container" style="min-height: 100vh; font-family:sans-serif;font-size:14px;vertical-align:top;display:block;max-width:580px;padding:10px;width:580px;Margin:0 auto !important;">
                    <div class="content" style="box-sizing:border-box;display:block;Margin:0 auto;max-width:580px;padding:10px;">
                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                            <tr>
                                <td style="line-height: 23px;text-align: left; margin-bottom: 10px; font-family:sans-serif;font-size:14px;vertical-align:top;">
                                    <a href="https://omenu.online/" target="_new">
                                        <img  src="<?= Url::to('@web/images/logo/logo-ry.svg', true) ?>" style="margin-top: -4px; height: 35px;" alt="<?= Yii::$app->name ?>" />
                                        <br/>
                                    </a>
                                    <br/>
                                </td>
                            </tr>
                        </table>
                        <!-- START CENTERED WHITE CONTAINER -->
                        <table class="main" style="min-height: 50vh; border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background:rgba(0,0,0,0.03);border-radius:3px;width:100%;border: none; border-top: 2px solid #A81917; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.09);border-radius: 3px;">
                            <!-- START MAIN CONTENT AREA -->
                            <tr>
                                <td class="wrapper" style="font-family:sans-serif;font-size:14px;vertical-align:top;box-sizing:border-box;padding:20px;text-align: center;">
                                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                                        <tr>
                                            <td style="line-height: 23px;text-align: left; font-family:sans-serif;font-size:14px;vertical-align:top;">
                                                <br/>
                                                <?= $content ?>
                                                <br/>
                                                <br/>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <br/>
                        <br/>
                        <!-- START FOOTER -->
                        <div class="footer" style="clear:both;padding-top:10px;text-align:center;width:100%;">
                            <!-- Email Wrapper Footer Open -->
                            <table border="0" cellpadding="0" cellspacing="0" style="max-width:600px;" width="100%" class="wrapperFooter">
                                <tr>
                                    <td align="center" valign="top">
                                        <!-- Content Table Open -->
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="footer">
                                            <tr>
                                                <td align="center" valign="top" style="padding-top:0px;padding-bottom:10px;padding-left:10px;padding-right:10px;" class="footerEmailInfo">
                                                    <!-- Subscribe Info -->
                                                    <p class="text" style="color:#777777; font-family:'Open Sans', Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none; text-align:center; padding:0; margin:0;" >
                                                        <?= Yii::t('app', 'Recebeu este e-mail porque está registado no nosso serviço.') ?><br/>
                                                        <?= Yii::t('app', 'Se tiver alguma dúvida contacte-nos.') ?> <br>
                                                    </p>
                                                </td>
                                            </tr>

<!--                                                        <tr>
                                                            <td align="center" valign="top" style="padding-top:10px;padding-bottom:0;padding-left:10px;padding-right:10px;" class="socialLinks">
                                                                 Facebook 
                                                                <a href="https://www.facebook.com/" target="_blank" style="display:inline-block;" class="facebook">
                                                                    <img src="<?= Url::to("@web/images/facebook.png", true); ?>" alt="" width="40" border="0" style="height:auto; width:100%; max-width:40px; margin-left:2px; margin-right:2px" />
                                                                </a>
                                                                 Instagram 
                                                                <a href="#https://www.instagram.com/" target="_blank" style="display:inline-block;" class="instagram">
                                                                    <img src="<?= Url::to("@web/images/instagram.png", true); ?>" alt="" width="40" border="0" style="height:auto; width:100%; max-width:40px; margin-left:2px; margin-right:2px" />
                                                                </a>
                                                                 Twitter 
                                                                <a href="https://twitter.com/" target="_blank" style="display:inline-block;" class="twitter">
                                                                    <img src="<?= Url::to("@web/images/twitter.png", true); ?>" alt="" width="40" border="0" style="height:auto; width:100%; max-width:40px; margin-left:2px; margin-right:2px" />
                                                                </a>
                                                            </td>
                                                        </tr>-->

                                            <tr>
                                                <td align="center" valign="top" style="padding-top:10px;padding-bottom:5px;padding-left:10px;padding-right:10px;" class="brandInfo">
                                                    <!-- Brand Information -->
                                                    <p class="text" style="color:#777777; font-family:'Open Sans', Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none; text-align:center; padding:0; margin:0;">
                                                        <?= Yii::$app->formatter->asDatetime(time(), 'full') ?><br/>
                                                        &copy;&nbsp; <?= Yii::$app->name ?> <?= date('Y') ?>.
                                                    </p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="center" valign="top" style="padding-top:0px;padding-bottom:20px;padding-left:10px;padding-right:10px;" class="footerLinks">
                                                    <p class="text" style="color:#777777; font-family:'Open Sans', Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none; text-align:center; padding:0; margin:0;" >
                                                        <a href="https://omenu.online/terms" style="color:#777777;text-decoration:underline;" target="_blank"><?= Yii::t('app', 'Condições de Utilização') ?></a>&nbsp;|&nbsp;
                                                        <a href="https://omenu.online/privacy" style="color:#777777;text-decoration:underline;" target="_blank"><?= Yii::t('app', 'Política de Privacidade') ?></a>
                                                    </p>
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </td>
                <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
            </tr>
        </table>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>