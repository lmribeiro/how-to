<?php

use yii\helpers\Html;

?>
<div <?=Html::renderTagAttributes($options)?> >
  <?php if ($header) : ?> 
  <div class="card-icon bg-link" style="box-shadow: none;float:<?=$headerAlign?>">
    <i class="<?=$icon?> fa-5x text-primary"></i>
  </div>
 
  <div class="card-header border-bottom-0" style="text-align: <?=$headerAlign?>;">
      <h3 class="text-dark "><?=$header?></h3>
      <h4 class="text-dark pb-3"><?=$subHeader?></h4>
    </div>
  <?php endif; ?> 
  <div class="card-warp">
    
    <div class="card-body">
      <div class="ticket-list">
      <?php foreach ($components as $c) {?>
            <?=$c?>
      <?php } ?>
      </div>
    </div>
  </div>
  <?php if ($footer) : ?>
    <div class="tickets-list p-0 card-footer pt-0">
      <a class="ticket-item ticket-more" href="<?=$footer['link']?>">
        <?=$footer['label']?>
        <i class="fas fa-chevron-right"></i>
      </a>    
    </div>
  <?php endif; ?> 
</div>