<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 22.09.2018
 * Time: 23:12
 */

namespace frontend\controllers;


use frontend\models\Comment;
use common\models\Comments;
use yii\web\Controller;

class CommentsController extends Controller
{
    public function actionGetall($article_id)
    {
        $comments = Comments::find()->where(['article_id' => $article_id])->asArray()->all();
        return json_encode($comments);

    }

}