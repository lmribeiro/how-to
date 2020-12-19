<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perguntas Frequentes');

?>
<br/>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3 text-center text-white"><?= $this->title ?></h1>
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4><?= Yii::t('app', 'Categorias'); ?></h4>
                </div>
                <div class="card-body">
                    <div class="list-group flex-column">
                        <?php foreach ($categories as $key => $category) { ?>
                                <?= Html::a($category->name, '#', ['class' => $key == 0 ? 'list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center active' : 'list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center', 'style' => 'border: 0; border-radius: 4px;', 'data-id' => $category->id]); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4><?= Yii::t('app', 'Não encontrou a resposta?'); ?></h4>
                </div>
                <div class="card-body">
                    <p><?= Yii::t('app', 'Não encontrou a resposta que procurava? Envie-nos a sua questão.'); ?></p>
                    <?= Html::a(Yii::t('app', 'Enviar Questão'), '#', ['class' => 'btn btn-outline-secondary', 'data-toggle' => 'modal', 'data-target' => '#question_modal']); ?>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="accordion" id="faqs-div">
                <?php foreach ($faqs as $k => $faq) { ?>
                    <div class="card" style="margin-bottom:0px">
                        <div class="card-header" id="question-<?= $faq->id; ?>">
                            <button class="btn btn-link" style="padding-left:0px;padding-right:0px" type="button" data-toggle="collapse" data-target="#collapse-<?= $faq->id; ?>" aria-expanded="true" aria-controls="collapse-<?= $faq->id; ?>">
                                <h4 class="text-primary text-left"><?= $faq->question ?></h4>
                            </button>
                        </div>
                        <div id="collapse-<?= $faq->id; ?>" class="collapse <?= $k == 0 ? 'show' : '' ?>" aria-labelledby="question-<?= $faq->id; ?>" data-parent="#faqs-div">
                            <div class="card-body">
                                <?= $faq->answer ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/_question_modal.php'; ?>

<script>
    $('.list-group-item').on('click', function () {
        id = $(this).data('id');
        $("a").removeClass("active");
        $(this).addClass("active");
        $.ajax({
            type: "GET",
            url: "<?= yii\helpers\Url::to(['faqs/get-faqs']) ?>?category=" + id,
            async: true,
            success: function (response) {
                lang = '<?= Yii::$app->language; ?>';
                $('#faqs-div').html("");
                data = JSON.parse(response);

                if (data.length > 0) {
                    for (i = 0; i < data.length; ++i) {
                        if (lang === 'pt') {
                            $('#faqs-div').append("<div class=\"card\" style=\"margin-bottom:0px\">" +
                                    "<div class=\"card-header\" id=\"question-" + data[i].id + "\">" +
                                    "<button class=\"btn btn-link\" style=\"padding-left:0px;padding-right:0px\" type=\"button\" data-toggle=\"collapse\"" +
                                    "data-target=\"#collapse-" + data[i].id + "\" aria-expanded=\"true\" aria-controls=\"collapse-" + data[i].id + "\">" +
                                    "<h4 class=\"text-primary text-left\">" + data[i].question_pt + "</h4>" +
                                    "</button></div>" +
                                    " <div id=\"collapse-" + data[i].id + "\" class=\"collapse " + (i === 0 ? 'show' : '') + "\" aria-labelledby=\"question-" + data[i].id + "\" data-parent=\"#faqs-div\">" +
                                    "<div class=\"card-body\">" +
                                    "" + data[i].answer_pt + "</div></div></div>");
                        } else {
                            $('#faqs-div').append("<div class=\"card\" style=\"margin-bottom:0px\">" +
                                    "<div class=\"card-header\" id=\"question-" + data[i].id + "\">" +
                                    "<button class=\"btn btn-link\" style=\"padding-left:0px;padding-right:0px\" type=\"button\" data-toggle=\"collapse\"" +
                                    "data-target=\"#collapse-" + data[i].id + "\" aria-expanded=\"true\" aria-controls=\"collapse-" + data[i].id + "\">" +
                                    "<h4 class=\"text-primary text-left\">" + data[i].question_en + "</h4>" +
                                    "</button></div>" +
                                    " <div id=\"collapse-" + data[i].id + "\" class=\"collapse " + (i === 0 ? 'show' : '') + "\" aria-labelledby=\"question-" + data[i].id + "\" data-parent=\"#faqs-div\">" +
                                    "<div class=\"card-body\">" +
                                    "" + data[i].answer_en + "</div></div></div>");
                        }
                    }
                } else {
                    $('#faqs-div').append("<div class=\"card\" style=\"margin-bottom:0px\">" +
                                    "<div class=\"card-header\"><h4 class=\"text-primary text-left\"><?= Yii::t('app', 'Sem perguntas.') ?></h4></div>" +
                                    "<div>" +
                                    "<div class=\"card-body\">" +
                                    "<p><?= Yii::t('app', 'Não há perguntas frequentes para esta categoria.') ?></p></div></div>");
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
</script>
