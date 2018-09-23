<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 22.09.2018
 * Time: 21:47
 */

namespace common\models;

use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{

    public static function tableName()
    {
        return "comments";
    }


}