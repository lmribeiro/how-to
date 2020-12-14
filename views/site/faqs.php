<?php

use app\models\Faq;

$this->title = Yii::$app->name." | ".Yii::t('app', 'FAQs');


?>
<section class="section-header pb-8 pb-lg-13 mb-4 mb-lg-6 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h1 class="display-2 mb-3"><?= Yii::t('app', 'Perguntas Frequentes') ?></h1>
                <p class="lead"><?= Yii::t('app', 'Se o deixou na duvida, provavelmente deixou mais alguem. Aqui pode ver as respostas às questões mais frequentes.') ?></p>
            </div>
        </div>
    </div>
    <div class="pattern bottom"></div>
</section>

<section class="section section-lg pt-0">
    <div class="container mt-n7 mt-lg-n13 z-2">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <!--Accordion-->
                <div class="accordion">
                    <?php foreach ($categories as $category) { ?>
                        <?php $faqs = Faq::findAll(['faq_category_id' => $category->id]) ?>
                        <?php $question = "question" ?>
                        <?php $answer = "answer" ?>

                        <?php foreach ($faqs as $faq) { ?>
                            <div class="card card-sm card-body shadow-box rounded mb-3">
                                <div aria-controls="panel-<?= $faq->id ?>" aria-expanded="false" class="accordion-panel-header" data-target="#panel-<?= $faq->id ?>" data-toggle="collapse" role="button">
                                    <span class="h6 mb-0"><?= $faq->$question ?></span> <span class="icon"><i class="fas fa-angle-down"></i></span>
                                </div>
                                <div class="collapse" id="panel-<?= $faq->id ?>">
                                    <div class="pt-3">
                                        <p class="mb-0"><?= $faq->$answer ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section-lg pb-5 bg-soft">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4"><?= Yii::t('app', 'Não encontrou a resposta que procurava?') ?></h2>
                <p class="lead mb-5"><?= Yii::t('app', 'Se não encontrou a resposta para a duvida que tinha, envie-nos a sua questão.') ?></p>
            </div>
            <div class="col-12 text-center">
                <a class="btn btn-secondary animate-up-2" href="#" data-toggle='modal'data-target='#question_modal' >
                    <?= Yii::t('app', 'Enviar Questão') ?>    
                </a>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__.'/_question_modal.php'; ?>