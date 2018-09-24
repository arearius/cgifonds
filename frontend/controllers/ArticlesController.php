<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 21.09.2018
 * Time: 18:27
 */

namespace frontend\controllers;

use common\models\Comments;
use frontend\models\NewArticleForm;
use yii\web\Controller;
use common\models\Articles;
use frontend\models\NewCommentForm;
use frontend\models\ChangeCommentForm;
//use common\models\Article;

class ArticlesController extends Controller
{

    public function actionShowall()
    {
        $articles = Articles::find()->all();
        if (count($articles) > 0) {
            //$model = new Article();
            return $this->render('index', ['articles' => $articles]);
        } else {
            echo 'Нет статей для отображения';
        }
    }

    public function actionGetone($id)
    {
        $article = Articles::find()->where(['id' => $id])->all();
        if (count($article) > 0) {

            $model = new NewCommentForm();
            return $this->render('article', ['article' => $article[0], 'model' => $model]);

        } else {
            echo 'Нет статей для отображения';
        }
    }

    public function actionShowalladmin()
    {
        $articles = Articles::find()->all();
        if (count($articles) > 0) {
            $model = new NewArticleForm();
            return $this->render('//admin/index', ['articles' => $articles, 'model' => $model ]);
        } else {
            echo 'Нет статей для отображения';
        }
    }

    public function actionGetoneadmin($id)
    {
        $article = Articles::find()->where(['id' => $id])->all();
        $comments = Comments::find()->where(['article_id' => $id])->asArray()->all();
        if (count($article) > 0) {

            $model = new ChangeCommentForm();
            return $this->render('//admin/article', ['article' => $article[0], 'comments' => $comments ,'model' => $model]);

        } else {
            echo 'Нет статей для отображения';
        }
    }

}