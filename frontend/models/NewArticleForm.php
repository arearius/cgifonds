<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/24/18
 * Time: 10:44 AM
 */

namespace frontend\models;
use yii\base\Model;

class NewArticleForm extends Model
{
    public $header;
    public $about;
    public $content;
    public $status;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // comment content and article id are both required
            [['header', 'about', 'content', 'status'], 'required'],
        ];
    }


}