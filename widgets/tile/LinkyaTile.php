<?php

namespace app\widgets\tile;

use Yii;
use yii\base\Widget;

class LinkyaTile extends Widget
{
    private $html;
    private $attributes=['options','header','subHeader','icon','dataProvider','components','headerAlign','footer'];
    
    public $header;
    public $icon;
    public $subHeader;
    public $dataProvider;
    public $footer=null;
    public $options=['class'=>'card card-statistic-2'];
    public $headerAlign="left";
    public $components=[];
    

    public function init()
    {
        parent::init();
        $attrs=[];
        if (!isset($this->options['class'])) {
            $this->options['class']="";
        }
        foreach ($this->attributes as $key) {
            $attrs[$key]=$this->{$key};
        }
        
        $this->html=$this->render('tile/tile', $attrs);
    }

    public function run()
    {
        return $this->html;
    }
}
