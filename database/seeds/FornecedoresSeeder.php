<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$fornecedores = json_decode($this->fornecedoresList());
	    
		foreach ($fornecedores as $fornecedor) {
			$fornecedor = (object) $fornecedor;
			try{
				$new_fornecedor = Fornecedor::firstOrNew(array('sap_fornecedor_id' => $fornecedor->sap_fornecedor_id));
				$new_fornecedor->sap_fornecedor_id = $fornecedor->sap_fornecedor_id;
				$new_fornecedor->empresa           = $fornecedor->empresa;
				$new_fornecedor->email             = $fornecedor->email;
				$new_fornecedor->save();
				print($fornecedor);
			} catch (Exception $e) {
			    Log::error($e);
			}
		}	
    }

    public function fornecedoresList(){
    	return '[
		        {
		            "sap_fornecedor_id" : "123456",
		            "empresa"           : "Claro",
		            "email"             : "claro@claro.com.br"
		        },
		        {
		            "sap_fornecedor_id" : "11554212",
		            "empresa"           : "Tim",
		            "email"             : "tim@tim.com.br"
		        }
		    ]';
    }
}
