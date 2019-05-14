<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $data_users = [];
        for ($i = 0; $i < 25; $i++) {
            $data_users[] = [
                'dt_add'        => $faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now')
                    ->format('Y-m-d H:i:s'),
                'email'         => $faker->safeEmail,
                'name'          => $faker->userName,
                'password'      => password_hash($faker->password, PASSWORD_DEFAULT),
                'token'         => 'placeholder',
            ];
        }

        $this->table('users')->insert($data_users)->save();

        $data_posts = [];
        for ($i = 0; $i < 50; $i++) {
            $data_posts[] = [
                'user_id'       => $faker->numberBetween($min = 1, $max = 25),
                'dt_add'        => $faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now')
                    ->format('Y-m-d H:i:s'),
                'show_count'    => $faker->numberBetween($min = 0, $max = 100),
                'like_count'    => $faker->numberBetween($min = 0, $max = 20),
                'title'         => $faker->sentence($nbWords = 1),
                'description'   => $faker->realText($maxNbChars = 300, $indexSize = 2),
            ];
        }

        $this->table('posts')->insert($data_posts)->save();

        $data_likes = [];
        for ($i = 0; $i < 50; $i++) {
            $data_likes[] = [
                'user_id'       => $faker->unique(true)->numberBetween($min = 1, $max = 25),
                'post_id'       => $faker->numberBetween($min = 1, $max = 50),
            ];
        }

        $this->table('posts_like')->insert($data_likes)->save();
    }
}
