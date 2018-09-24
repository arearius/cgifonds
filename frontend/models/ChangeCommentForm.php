<?php
namespace frontend\models;

use yii\base\Model;

/**
 * Add new comment form
 */
class ChangeCommentForm extends Model
{
    public $content;
    public $article_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // comment content and article id are both required
            [['content', 'article_id'], 'required'],
        ];
    }

    /**
     * Validates the content.
     */
    public function validateComment($attribute, $params)
    {

    }

}
