<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 21.09.2018
 * Time: 18:27
 */

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Articles;
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
        $article = Articles::find()->where(['id' => $id])->all()[0];
        if (count($article) > 0) {
            //$model = new Article();
            return $this->render('article', ['article' => $article]);
        } else {
            echo 'Нет статей для отображения';
        }
    }

}