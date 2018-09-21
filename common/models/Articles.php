<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 21.09.2018
 * Time: 18:29
 */

namespace common\models;

use yii\db\ActiveRecord;

class Articles extends ActiveRecord
{
    public static function tableName()
    {
        return "articles";
    }

}