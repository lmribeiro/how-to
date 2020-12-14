<?php

use kartik\typeahead\Typeahead;
use yii\helpers\Url;
use yii\web\JsExpression;

$template = '<div class="card" style="cursor: pointer;"><div class="card-header" style="min-height: 25px;padding: 5px 0;"><div class="row">'
        .'<div class="col-12"><h5 class="mb-1">{{title}}</h5></div></div></div>'
        .'<div class="card-body text-justify" style="padding: 10px 0;white-space: normal !important; line-height: 16px !important;">'
        .'<div class="row"><div class="col-12">{{excerpt}}</div></div></div>'
        .'<div class="card-footer" style="padding: 10px 0;"><div class="row">'
        .'<div class="col-6">'
        .'<small class=""><b>'.Yii::t('app', 'Data').':</b> {{date}}</small> | '
        .'<small class=""><b>'.Yii::t('app', 'Categoria').':</b> {{category}}</small></div>'
        .'<div class="col-6 text-right">'
        .'<span style="margin-top: 8px"><i class="fa fa-grin text-success"></i> {{up_votes}}</span> '
        .'</div></div></div></div>';

?>
<?=

Typeahead::widget([
    'name' => 'search',
    'options' => ['placeholder' => Yii::t('app', 'Pesquisar por artigo...'), 'autocomplete' => 'off', 'class' => 'form-control form-control-lg'],
    'pluginOptions' => ['highlight' => true],
    'pluginEvents' => [
        "typeahead:select" => "function(event, ui) { openQuestion(ui.id); }",
    ],
    'scrollable' => true,
    'dataset' => [
        [
            'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
            'display' => 'value',
            'remote' => [
                'url' => Url::to(['article/search?search=%QUERY']),
                'wildcard' => '%QUERY'
            ],
            'templates' => [
                'notFound' => Yii::t('app', 'Nenhum resultado encontrado'),
                'suggestion' => new JsExpression("Handlebars.compile('{$template}')")
            ]
        ]
    ]
])

?>

<?php

$base = Url::to(['@web/kb/article/view?id='], true);

$script = <<< JS
function openQuestion(id) {
    location.href = "$base"+ id;
}
JS;
$this->registerJs($script);
$style = <<< CSS
.tt-scrollable-menu .tt-menu {
    max-height: 250px;
}
CSS;
$this->registerCss($style);

?>