<?php

use Phinx\Migration\AbstractMigration;

class MyFirstMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

        $exists_users = $this->hasTable('users');
        if ($exists_users) {
            $this->table('users')->drop()->save();
        }

        $users = $this->table('users');
        $users->addColumn('dt_add', 'datetime', ['null' => false])
            ->addColumn('email', 'char', ['limit' => 255, 'null' => false])
            ->addColumn('name', 'char', ['limit' => 255, 'null' => false])
            ->addColumn('password', 'char', ['limit' => 64, 'null' => false])
            ->addColumn('token', 'char', ['limit' => 32, 'null' => false])
            ->addIndex(['email'], [
                'unique' => true,
                'name' => 'email'])
            ->create();

        $exists_posts = $this->hasTable('posts');
        if ($exists_posts) {
            $this->table('posts')->drop()->save();
        }

        $posts = $this->table('posts');
        $posts->addColumn('user_id', 'integer', ['limit' => 11, 'signed' => false, 'null' => false])
            ->addColumn('dt_add', 'datetime', ['null' => false])
            ->addColumn('show_count', 'integer', [
                'limit' => 11,
                'signed' => false,
                'null' => false,
                'default' => 0
            ])
            ->addColumn('like_count', 'integer', [
                'limit' => 11,
                'signed' => false,
                'null' => false,
                'default' => 0
            ])
            ->addColumn('title', 'char', ['limit' => 255, 'null' => false])
            ->addColumn('description', 'text', ['null' => false])
            ->create();

/*        $posts->addForeignKey('user_id', 'users', 'id', [
            'delete'=> 'CASCADE',
            'update'=> 'CASCADE',
            'constraint' => 'posts_ibfk_1'
        ])
            ->save();
*/

        $exists_posts_like = $this->hasTable('posts_like');
        if ($exists_posts_like) {
            $this->table('posts_like')->drop()->save();
        }

        $posts_like = $this->table('posts_like');
        $posts_like->addColumn('user_id', 'integer', ['limit' => 11, 'signed' => false, 'null' => false])
            ->addColumn('post_id', 'integer', ['limit' => 11, 'signed' => false, 'null' => false])
            ->addIndex(['user_id', 'post_id'], [
                'unique' => true,
                'name' => 'user_id_2'
            ])
            ->create();

/*        $posts_like->addForeignKey('user_id', 'users', 'id', [
            'delete'=> 'CASCADE',
            'update'=> 'CASCADE',
            'constraint' => 'posts_like_ibfk_1'
        ])
            ->save();
*/
/*        $posts_like->addForeignKey('post_id', 'posts', 'id', [
            'delete'=> 'CASCADE',
            'update'=> 'CASCADE',
            'constraint' => 'posts_like_ibfk_2'
        ])
            ->save();
*/
    }
}
