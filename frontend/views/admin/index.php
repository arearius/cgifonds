<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 23.09.2018
 * Time: 23:03
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Материалы админ панель';

?>

<div class="articles-index">

    <h1>Административная панель</h1>
    <br>
    <div class="article-table">
        <div class="article-row">
            <div class="article-cell article-id">
                Id
            </div>
            <div class="article-cell article-changedate">
                Дата создания
            </div>
            <div class="article-cell article-status">
                Статус
            </div>
            <div class="article-cell article-header">
                Заголовок
            </div>
            <div class="article-cell article-delete">

            </div>
        </div>
    <?php for ($articleIndex = 0; $articleIndex < count($articles); $articleIndex++): ?>

           <div class="article-row">
               <div class="article-cell article-id">
                   <a href="<?=Yii::$app->urlManager->createUrl(["articles/getoneadmin", 'id' => $articles[$articleIndex]->id])?>"><?php echo $articles[$articleIndex]->id; ?></a>
               </div>
               <div class="article-cell article-changedate">
                   <?php echo $articles[$articleIndex]->changedate; ?>
               </div>
               <div class="article-cell article-status">
                   <?php echo $articles[$articleIndex]->status; ?>
               </div>
               <div class="article-cell article-header">
                   <?php echo $articles[$articleIndex]->header; ?>
               </div>
               <div class="article-cell article-delete">
                       <a href="#" class="article-delete" data-article-id="<?php echo $articles[$articleIndex]->id?>" >Delete</a>
               </div>
           </div>

    <?php endfor; ?>
    </div>

    <div class="add-article">
        <h3><?= Html::encode("Добавить новую статью") ?></h3>

        <div class="row">
            <div>
                <?php $form = ActiveForm::begin(['id' => 'add-new-article']); ?>


                <?= $form->field($model, 'header')->textInput(['autofocus' => true]) ?>


                <?= $form->field($model, 'about')->textInput()?>
                <?= $form->field($model, 'status')->textInput()?>
                <?= $form->field($model, 'content')->textarea()?>

                <div class="form-group">
                    <?= Html::button('Создать', ['class' => 'btn btn-primary create-article-button', 'name' => 'send-comment-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>

<?php
$js = <<<JS
    $('a.article-delete').on('click', function(){
        var articleId = $(this).attr('data-article-id');
        console.log(articleId);        
        $.get('http://backend.cgifonds/index.php?r=articles/delete&articleId=' + articleId, function(data) {
                console.log(data);
                location.reload();
        });
    });
    $('.create-article-button').on('click', function(){
        $.post("http://backend.cgifonds/index.php?r=articles/create",
            {
                header: $('#newarticleform-header')[0].value,
                about: $('#newarticleform-about')[0].value,
                status: $('#newarticleform-status')[0].value,
                content: $('#newarticleform-content')[0].value
            },
            function(data){
               console.log(data);
               location.reload();
            });
    });
JS;

$this->registerJs($js);
?>
