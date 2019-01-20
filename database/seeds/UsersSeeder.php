<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@application.com',
                'password' => '$2y$10$v0oCWy1uHNNhaG9nvjAS8uy8jpPM7QYQakPAHxMvUypGBM.LBbKWG',
                'perfil' => '1',
            ],
        ]); 
    }
}
