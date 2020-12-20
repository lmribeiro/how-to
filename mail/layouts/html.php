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
                color: #28abb9;
            }
            .button {
                color:  #28abb9!important;
                border: 2px solid #28abb9!important;
                padding: 7px;
                border-radius: 4px;
                text-transform: uppercase;
            }
            .button:hover {
                background-color: #28abb9!important;
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
                                <td style="line-height: 23px;text-align: center; margin-bottom: 10px; font-family:sans-serif;font-size:14px;vertical-align:top;">
                                    <a href="<?= Yii::$app->homeUrl ?>" target="_new">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="75%" height="75%" style="height: 25px;"
                                             viewBox="5.550000190734863 -70.06999969482422 518.1500244140625 70.06999969482422">
                                            <g fill="#28abb9" ">
                                                <path d="M69.39 -70.07L69.39 -39.03L13.43 -39.03L13.43 -70.07L5.55 -70.07L5.55 0L13.43 0L13.43 -31.05L69.39 -31.05L69.39 0L77.37 0L77.37 -70.07Z M109.49 -70.07C106.25 -70.07 103.49 -68.94 101.22 -66.67C98.95 -64.4 97.81 -61.64 97.81 -58.39L97.81 -11.68C97.81 -8.43 98.95 -5.68 101.22 -3.41C103.49 -1.14 106.25 0 109.49 0L156.21 0C159.45 0 162.21 -1.14 164.48 -3.41C166.75 -5.68 167.88 -8.43 167.88 -11.68L167.88 -58.39C167.88 -61.64 166.75 -64.4 164.48 -66.67C162.21 -68.94 159.45 -70.07 156.21 -70.07ZM109.49 -7.88C108.45 -7.88 107.56 -8.26 106.81 -9C106.07 -9.75 105.69 -10.64 105.69 -11.68L105.69 -58.39C105.69 -59.43 106.07 -60.32 106.81 -61.07C107.56 -61.82 108.45 -62.19 109.49 -62.19L156.21 -62.19C157.24 -62.19 158.14 -61.82 158.88 -61.07C159.63 -60.33 160 -59.43 160 -58.39L160 -11.68C160 -10.64 159.63 -9.75 158.88 -9C158.14 -8.26 157.24 -7.88 156.21 -7.88Z M283.41 -70.07L263.07 -13.82L242.53 -70.07L232.99 -70.07L212.56 -13.82L192.02 -70.07L183.65 -70.07L209.15 0L215.96 0L237.76 -59.85L259.56 0L266.47 0L291.97 -70.07Z M348.42 -32.8L310.46 -32.8L310.46 -24.82L348.42 -24.82Z M366.72 -70.07L366.72 -62.19L397.86 -62.19L397.86 0L405.74 0L405.74 -62.19L436.79 -62.19L436.79 -70.07Z M465.31 -70.07C462.06 -70.07 459.3 -68.94 457.03 -66.67C454.76 -64.4 453.63 -61.64 453.63 -58.39L453.63 -11.68C453.63 -8.43 454.76 -5.68 457.03 -3.41C459.3 -1.14 462.06 0 465.31 0L512.02 0C515.27 0 518.02 -1.14 520.29 -3.41C522.57 -5.68 523.7 -8.43 523.7 -11.68L523.7 -58.39C523.7 -61.64 522.57 -64.4 520.29 -66.67C518.02 -68.94 515.27 -70.07 512.02 -70.07ZM465.31 -7.88C464.27 -7.88 463.38 -8.26 462.63 -9C461.88 -9.75 461.51 -10.64 461.51 -11.68L461.51 -58.39C461.51 -59.43 461.88 -60.32 462.63 -61.07C463.38 -61.82 464.27 -62.19 465.31 -62.19L512.02 -62.19C513.06 -62.19 513.95 -61.82 514.7 -61.07C515.44 -60.33 515.82 -59.43 515.82 -58.39L515.82 -11.68C515.82 -10.64 515.44 -9.75 514.7 -9C513.95 -8.26 513.06 -7.88 512.02 -7.88Z"></path>
                                            </g>
                                        </svg>
                                        <br/>
                                    </a>
                                    <br/>
                                </td>
                            </tr>
                        </table>
                        <!-- START CENTERED WHITE CONTAINER -->
                        <table class="main" style="min-height: 50vh; border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background:rgba(0,0,0,0.03);border-radius:3px;width:100%;border: none; border-top: 2px solid #28abb9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.09);border-radius: 3px;">
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

                                            <tr>
                                                <td align="center" valign="top" style="padding-top:10px;padding-bottom:5px;padding-left:10px;padding-right:10px;" class="brandInfo">
                                                    <!-- Brand Information -->
                                                    <p class="text" style="color:#777777; font-family:'Open Sans', Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none; text-align:center; padding:0; margin:0;">
                                                        <?= Yii::$app->formatter->asDatetime(time(), 'full') ?><br/>
                                                        &copy;&nbsp; <?= Yii::$app->name ?> <?= date('Y') ?>.
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
