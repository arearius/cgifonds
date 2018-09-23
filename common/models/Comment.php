<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Comment model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Comment extends ActiveRecord
{
    private $content;
    private $article_id;

    public function __construct($article_id, $content, array $config = [])
    {
        parent::__construct($config);
        $this->article_id = $article_id;
        $this->content = $content;
    }

    public static function tableName()
    {
        return 'comments';
    }

    public function validateContent($content)
    {
        //return Yii::$app->security->validatePassword($password, $this->password_hash);
        return true;
    }

    public function add()
    {
        return $this->save() ? $this : null;
    }

}
