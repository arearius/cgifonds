<?php
namespace frontend\models;

use yii\base\Model;

/**
 * Add new comment form
 */
class NewCommentForm extends Model
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
        /*
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }*/
    }

}
