<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserRepository;

class UserRepositorySeeder_ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('user_repositories')->delete();

        UserRepository::create([
            'repository_id'=>1,
            'username'=>'sameque',
            'user_id'=>1,
            'created_at'=>'2001-01-01 00:00:00',
            'updated_at'=>'2015-01-01 00:00:00'
        ]);
    }
}
