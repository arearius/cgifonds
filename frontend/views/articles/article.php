<?php

$this->title = 'Статья';

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
            <div class="article-one-comments">
                <a href="#" onclick="$.ajax({
                                        type: 'POST',
                                        url: <?php Yii::$app->urlManager->createUrl(["articles/getcomments", 'id' => $article->id]) ?>,
                                        data: 'name=Andrew&nickname=Aramis',
                                        success: function(data){
                                                $('.article-one-comments').html(data);
                                            }
                                        });">Посмотреть комментарии</a>
            </div>
            <div class="article-one-comments2">
                <a href="#" >Посмотреть комментарии</a>
            </div>
            <div class="article-one-comments">

            </div>

        </div>

</div>

<?php
$js = <<<JS
    $('.article-one-comments2').on('click', function(){
         $('.article-one-comments3').html('test');
            $.get('http://cgifonds/index.php?r=articles%2Fgetone&id=1', function(data) {
                console.log(data);
            });
        return false;
    });
JS;

$this->registerJs($js);
?>
