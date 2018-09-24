<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/24/18
 * Time: 4:06 PM
 */

namespace backend\controllers;

use common\models\Articles;
use yii\web\Controller;


class ArticlesController extends Controller
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


    public function actionDelete($articleId)
    {
        $article = Articles::findOne(['id' => $articleId]);
        $article->delete();
    }

    public function actionCreate()
    {
        $article = new Articles();
        $article->header = $_POST['header'];
        $article->about = $_POST['about'];
        $article->content = $_POST['content'];
        $article->status = $_POST['status'];

        if ($article->save()) {
            return 'saved';
        } else {
            return 'not saved';
        }
    }

}