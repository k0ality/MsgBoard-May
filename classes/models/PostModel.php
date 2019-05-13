<?php
namespace Msgboard\models;

class PostModel extends BaseModel {

    public static $tableName = 'posts';
    public static $queryName = 'PostQuery';

    protected $relations = [
        'author' => [UserModel::class, 'user_id'],
    ];

    protected $id;
    protected $user_id;
    protected $dt_add;
    protected $show_count;
    protected $like_count;
    protected $title;
    protected $description;
    protected $authorName;

    public function createNewPost($user_id, array $post_data) {
        list($title, $description) = array_values($post_data);
        $sql = 'INSERT INTO posts (dt_add, user_id, title, description) VALUES (NOW(), ?, ?, ?)';

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('iss', $user_id, $title, $description);
        $res = $stmt->execute();

        if ($res) {
            $res = $this->db->insert_id;
        }

        return $res;
    }

    public function changeCounter($name, $sign) {
        $sql = 'UPDATE ' . static::$tableName . ' SET ' . $name . ' = ' . $name . ' ' . $sign . ' 1 WHERE id = ' . $this->id;

        return $this->runSimpleQuery($sql);
    }

    public function addLike(UserModel $userModel) {
        $sql = "INSERT INTO posts_like (user_id, post_id) VALUES ({$userModel->id}, {$this->id})";
        $this->changeCounter('like_count', '+');

        return $this->runSimpleQuery($sql);
    }

    public function removeLike(UserModel $userModel) {
        $sql = "DELETE FROM posts_like WHERE user_id = {$userModel->id} AND post_id = {$this->id}";
        $this->changeCounter('like_count', '-');

        return $this->runSimpleQuery($sql);
    }

}
