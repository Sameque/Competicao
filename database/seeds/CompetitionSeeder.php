<?php

use Illuminate\Database\Seeder;

use App\Competition;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competitions')->delete();

        Competition::create([
            'name'=>'Competicao_Teste-01',
            'dateBegin'=>'01/01/2001',
            'hoursBegin'=>'11:11',
            'dateEnd'=>'01/01/2001',
            'hoursEnd'=>'11:11'
        ]);

        Competition::create([
            'name'=>'Competicao_Teste-02',
            'dateBegin'=>'02/02/2002',
            'hoursBegin'=>'12:12',
            'dateEnd'=>'02/02/2001',
            'hoursEnd'=>'12:12'
        ]);
    }
}
