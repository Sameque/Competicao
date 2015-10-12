<?php

use Illuminate\Database\Seeder;
use App\Repository;

class RepositoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('repositorys')->truncate();

        Repository::create([
            'name'=>'Spoj',
            'url'=>'http://br.spoj.com/'
        ]);
        Repository::create([
            'name'=>'URI',
            'url'=>'https://www.urionlinejudge.com.br/judge/login'
        ]);
        Repository::create([
            'name'=>'UVA',
            'url'=>'https://uva.onlinejudge.org/index.php'
        ]);
    }
}
