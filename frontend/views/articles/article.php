<?php
header("Access-Control-Allow-Origin *");
$this->title = 'Статья';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>

<div class="articles-index">

    <h1>Показ одной статьи.</h1>
    <br>

        <div class="article-one">

            <div class="article-one-header">
                <?php echo $article->header; ?>
            </div>
            <div class="article-one-content">
                <?php echo $article->content; ?>
            </div>
            <div class="article-one-get-comments">
                <a href="#" >Посмотреть комментарии</a>
            </div>
            <div class="article-one-comments">
            </div>
            <div class="add-comment" style="display: none">
                <h3><?= Html::encode("Добавить комментарий к статье:") ?></h3>

                <div class="row">
                    <div>
                        <?php $form = ActiveForm::begin(['id' => 'add-comment']); ?>

                        <?= $form->field($model, 'content')->textarea(['autofocus' => true])?>

                        <div class="form-group">
                            <?= Html::button('Добавить комментарий', ['class' => 'btn btn-primary send-comment-button', 'name' => 'send-comment-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>


        </div>

</div>

<?php
$js = <<<JS
    $('.article-one-get-comments').on('click', function(){
         //$('.article-one-comments').html('test');
            var url = 'http://backend.cgifonds/index.php?r=comments/getallforarticle&articleId=$article->id';
            console.log(url);
            $.get('http://backend.cgifonds/index.php?r=comments/getallforarticle&articleId=$article->id', function(data) {
                console.log(data);
                var comments = JSON.parse(data);
                
                for (var i=0; i<comments['count']; i++ ) {
                    var newComment = '<div class="article-comment">' + comments[i]['content'] +  '</div>';
                    $('.article-one-comments').append(newComment);
                    $('.add-comment').show();
                }
                
                console.log(comments);
            });
        return false;
    });
    $('.send-comment-button').on('click', function(){
            var data = new Array();
            data['articleId'] = 1;
            data['content'] = $('#newcommentform-content')[0].value;
            console.log(data);
            console.log(JSON.stringify(data));
            $.post("http://backend.cgifonds/index.php?r=comments/add",
            {
                article_id: $article->id,
                content: $('#newcommentform-content')[0].value
            },
            function(data){
                if (data == 'saved'){
                    var newComment = '<div class="article-comment">' + $('#newcommentform-content')[0].value +  '</div>';
                    $('.article-one-comments').append(newComment);
                }
            });
        return false;
    });
JS;

$this->registerJs($js);
?>
