<?php

use Illuminate\Database\Seeder;
use \App\Competition;

class CompetitionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('competition_user')->delete();

        $competition_id = DB::table('competitions')->select('id')->first();
        $user_id = DB::table('users')->select('id')->first();

        $competition = Competition::find($competition_id->id);

        $competition->users()->attach($user_id->id);
        $competition->users()->attach($user_id->id-1);

//
//        CompetitionUser::create([
//            'competition_id'=>1,
//            'user_id'=>1,
//            'created_at'=>'2001-01-01 00:00:00',
//            'updated_at'=>'2015-01-01 00:00:00'
//        ]);
//        
//        CompetitionUser::create([
//            'competition_id'=>1,
//            'user_id'=>2,
//            'created_at'=>'2001-01-01 00:00:00',
//            'updated_at'=>'2015-01-01 00:00:00'
//        ]);

    }
}
