<?php

use Illuminate\Database\Seeder;
use App\UserRepository;

class UserRepositorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('user_repositories')->delete();

        $user_id = DB::table('users')->select('id')->first();

        UserRepository::create([
            'repository_id'=>1,
            'username'=>'sameque',
            'user_id'=>$user_id->id,
            'created_at'=>'2001-01-01 00:00:00',
            'updated_at'=>'2015-01-01 00:00:00'
        ]);

        UserRepository::create([
            'repository_id'=>2,
            'username'=>'36622',
            'user_id'=>$user_id->id,
            'created_at'=>'2001-01-01 00:00:00',
            'updated_at'=>'2015-01-01 00:00:00'
        ]);
    }   
}
