<?php
$this->title = 'Статья';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>

<div class="articles-index">

    <div class="article-one">
        <div class="article-one-id">
            <?php echo $article->id; ?>
        </div>
        <div class="article-one-changedate">
            <?php echo $article->changedate; ?>
        </div>
        <div class="article-one-status">
            <?php echo $article->status; ?>
        </div>
        <div class="article-one-header">
            <?php echo $article->header; ?>
        </div>
        <div class="article-one-content">
            <?php echo $article->content; ?>
        </div>
        <div class="article-one-comments">
            <?php for ($commentsIndex = 0; $commentsIndex < count($comments); $commentsIndex++): ?>
                <div class="comments-table">
                    <div class="comment-row">
                        <div class="comment-cell-text">
                            <?php echo $comments[$commentsIndex]['content']; ?>
                        </div>
                        <div class="comment-cell comment-edit" data-comment-id="<?php echo $comments[$commentsIndex]['id'] ?>">
                            <a class="comment-edit" href=# >Редактировать</a>
                        </div>
                        <div class="comment-cell comment-delete">
                            <a <?php echo 'href="http://backend.cgifonds/index.php?r=comments/delete&comment_id=' . $comments[$commentsIndex]['id'] . '"'?>">Удалить</a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="change-comment" style="display: none">
            <h3><?= Html::encode("Изменить комментарий к статье:") ?></h3>

            <div class="row">
                <div>
                    <?php $form = ActiveForm::begin(['id' => 'change-comment']); ?>

                    <?= $form->field($model, 'content')->textarea(['autofocus' => true])?>

                    <div class="form-group">
                        <?= Html::button('Изменить комментарий', ['class' => 'btn btn-primary change-comment-button', 'name' => 'change-comment-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>


    </div>

</div>

<?php
$js = <<<JS
    $('div.comment-edit').on('click', function(){
        var commentId = $(this).attr('data-comment-id');
        console.log(commentId);
        console.log($(this).parent().eq(0).find('.comment-cell-text').text());
        $.get('http://backend.cgifonds/index.php?r=comments/getbyid&commentId=' + commentId, function(data) {
                var comment = JSON.parse(data)[0];  
                console.log(JSON.parse(data)[0].content);
                $('#changecommentform-content')[0].value = comment.content;
                $('.change-comment-button').attr('data-comment-id', commentId);
        });
        $('.change-comment').show();
    });
    $('.change-comment-button').on('click', function(){  
        $.post("http://backend.cgifonds/index.php?r=comments/update",
            {
                comment_id: $('.change-comment-button').data('comment-id'),
                content: $('#changecommentform-content')[0].value
            },
            function(data){
               console.log(data);
            });
        $('.change-comment').hide();
    });
JS;

$this->registerJs($js);
?>
