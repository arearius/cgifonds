<?php

$this->title = 'Материалы';

?>

<div class="articles-index">

    <h1>Показ всех статей. Количество статей: <?php echo count($articles) ?> </h1>
    <br>
    <?php for ($articleIndex = 0; $articleIndex < count($articles); $articleIndex++): ?>
       <div class="article-table">
           <div class="article-row">
               <div class="article-cell article-header">
                   <a href="<?=Yii::$app->urlManager->createUrl(["articles/getone", 'id' => $articles[$articleIndex]->id])?>"><?php echo $articles[$articleIndex]->header; ?></a>
               </div>
               <div class="article-cell article-descrition">
                   <?php echo $articles[$articleIndex]->about; ?>
               </div>
           </div>
       </div>
    <?php endfor; ?>

</div>

