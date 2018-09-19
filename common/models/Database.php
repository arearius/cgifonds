<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 19.09.2018
 * Time: 22:58
 */

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Database{

    public function createDB() {
        return "New DB created";
    }
}