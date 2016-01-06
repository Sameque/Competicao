<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();

         $this->call(UserSeeder::class);
         $this->call(RepositoryTableSeeder::class);
         $this->call(CompetitionSeeder::class);

        Model::reguard();


    }
}
