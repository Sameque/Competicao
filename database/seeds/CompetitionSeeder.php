<?php

use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
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
            'name'=>'Competição_Teste-01',
            'dateBegin'=>'2001-01-01 11:11:11',
            'hoursBegin'=>'2001-01-01 11:11:11',
            'dateEnd'=>'2001-01-01 11:11:11',
            'hoursEnd'=>'2001-01-01 11:11:11'
        ]);

        Repository::create([
            'name'=>'Competição_Teste-02',
            'dateBegin'=>'2001-01-01 12:12:12',
            'hoursBegin'=>'2001-01-01 12:12:12',
            'dateEnd'=>'2001-01-01 12:12:12',
            'hoursEnd'=>'2001-01-01 12:12:12'
        ]);
    }
}
