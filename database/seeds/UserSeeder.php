<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        User::create([
            'name'=>'userTeste',
            'accessLevel'=>1,
            'email'=>'teste@teste.com',
            'cpf'=>'111.111.111-11',
            'password'=>bcrypt('123456'),
            'rg'=>'987654321',
            'yearCourse'=>2002,
            'birthDate'=>'2001-01-01',
            'graduated'=>2001,
            'username'=>'userTeste',
            'created_at'=>'2001-01-01 00:00:00',
            'updated_at'=>'2015-01-01 00:00:00'
        ]);

        User::create([
            'name'=>'Sameque Santana',
            'accessLevel'=>1,
            'email'=>'same@gmail.com',
            'cpf'=>'111.111.111-11',
            'password'=>bcrypt('123456'),
            'rg'=>'123456789',
            'yearCourse'=>2001,
            'birthDate'=>'2001-01-01',
            'graduated'=>2001,
            'username'=>'samer001',
            'created_at'=>'2001-01-01 00:00:00',
            'updated_at'=>'2015-01-01 00:00:00'
        ]);
    }
}
