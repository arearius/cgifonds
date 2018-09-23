<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 21.09.2018
 * Time: 21:39
 */

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Article extends ActiveRecord
{
    public $header;
    public $about;

    public static function tableName()
    {
        return "articles";
    }

}