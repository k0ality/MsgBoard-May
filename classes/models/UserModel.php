<?php
namespace Msgboard\models;

class UserModel extends BaseModel {

    protected $id;
    protected $dt_add;
    protected $email;
    protected $name;
    protected $password;

    public static $tableName = 'users';

    public function createNewUser($email, $password, $name) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = $this->generateHash([$email, $password, $name]);

        $sql = 'INSERT INTO users (dt_add, email, name, password, token) VALUES (NOW(), ?, ?, ?, ?)';

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssss', $email, $name, $password, $token);
        $res = $stmt->execute();

        return $res;
    }

    public function updateToken($token) {
        $sql = 'UPDATE ' . static::$tableName . ' SET token = ? WHERE id = ?';

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('si', $token, $this->id);
        $res = $stmt->execute();

        return $res;
    }

    public function generateHash(array $user_data) {
        $ts  = microtime(true);
        $str = implode(';', array_merge([$ts], $user_data));

        $hash = md5($str);

        return $hash;
    }

    public function hasLikedPost(PostModel $postModel) {
        $items = $this->getLikedPosts();

        return isset($items[$postModel->id]);
    }

    public function getLikedPosts() {
        $posts = [];
        $table = 'posts_like';

        $sql = 'SELECT p.* FROM ' . PostModel::$tableName . ' p INNER JOIN ' . $table . ' pl ON p.id = pl.post_id 
        AND pl.user_id = ' . $this->id;

        $res = $this->getDb()->query($sql);

        if ($res) {
            while ($post = $res->fetch_object(PostModel::class)) {
                $posts[$post->id] = $post;
            }
        }

        return $posts;
    }

}
