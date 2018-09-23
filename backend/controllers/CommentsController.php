<?php


/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 22.09.2018
 * Time: 21:45
 */


namespace backend\controllers;

use common\models\Comments;
use yii\web\Controller;

class CommentsController extends Controller
{

    public static function allowedDomains()
    {
        return [
             '*',                        // star allows all domains
            //'http://test1.example.com',
            //'http://test2.example.com',
        ];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST, GET'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }

    public function actionGetallforarticle($articleId)
    {
        $comments = Comments::find()->where(['article_id' => $articleId])->asArray()->all();
        $comments['count'] = count ($comments);
        $comments['articleId'] = $articleId;
        return json_encode($comments);
    }

    public function actionAdd()
    {

        $comment = new Comments();
        $comment->article_id = $_POST['article_id'];
        $comment->content =  $_POST['content'];

        if ($comment->save()) {
            return 'saved';
        } else {
            return 'not saved';
        }
    }

}