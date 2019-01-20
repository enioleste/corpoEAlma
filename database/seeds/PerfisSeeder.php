<?php

use Illuminate\Database\Seeder;

class PerfisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('perfis')->insert([
            [
                'id' => '1',
                'nome' => 'Admin',
                'limite_caixas' => '1000',
            ],
            [
                'id' => '2',
                'nome' => 'Fornecedor',
                'limite_caixas' => '500',
            ],
            [
                'id' => '3',
                'nome' => 'RS',
                'limite_caixas' => '0',
            ],
        ]); 
    }
}
