<?php


use Phinx\Seed\AbstractSeed;

class UserSeeds extends AbstractSeed
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
        $data = [];
        for ($i = 1; $i < 100; $i++) {
            $data[] = [
                  
                  'username' => $faker->userName,
                  'password'     => $faker->md5('secret'),
                  'mail'     => $faker->freeEmail,
                  'created_at'       => date('Y-m-d H:i:s'),
                  'updated_at'       => date('Y-m-d H:i:s'),
                  
                  
                
            ];
        }

        $this->insert('users', $data);

    }
}
