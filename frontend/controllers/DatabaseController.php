<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 19.09.2018
 * Time: 21:51
 */

namespace frontend\controllers;


use yii\web\Controller;
use common\models\Database;

class DatabaseController extends Controller
{


    public $defaultAction = 'test';
    private $db;


    public function actionView()
    {
        //echo 'ok view';
        //return $this->render('index');
        //return $this->render('create');
    }

    public function actionCreatedb()
    {

        $this->db = new Database;
        $result = $this->db->createDB();
        echo $result;
        //return $this->render('createDatabase');
    }

    public function actionCreatetable()
    {
        echo 'createDB';
        return $this->render('createTable');
    }

}