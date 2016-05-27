<?php

use Illuminate\Database\Seeder;
use App\Problem;
class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('problems')->delete();
        
        $competition_id = DB::table('competitions')->select('id')->first();

        Problem::create([
            'code'=>'SOMA',
            'dificult'=>0,
            'repository_id'=>1,
            'competition_id'=>$competition_id->id,
            'created_at'=>'2001-01-01 00:00:00',
            'updated_at'=>'2015-01-01 00:00:00'
        ]);

        Problem::create([
            'code'=>'FLIPERAM',
            'dificult'=>0,
            'repository_id'=>1,
            'competition_id'=>$competition_id->id,
            'created_at'=>'2001-01-01 00:00:00',
            'updated_at'=>'2015-01-01 00:00:00'
        ]);

        Problem::create([
            'code'=>'1001',
            'dificult'=>0,
            'repository_id'=>2,
            'competition_id'=>$competition_id->id,
            'created_at'=>'2001-01-01 00:00:00',
            'updated_at'=>'2015-01-01 00:00:00'
        ]);

        Problem::create([
            'code'=>'1002',
            'dificult'=>0,
            'repository_id'=>2,
            'competition_id'=>$competition_id->id,
            'created_at'=>'2001-01-01 00:00:00',
            'updated_at'=>'2015-01-01 00:00:00'
        ]);
    }
}
