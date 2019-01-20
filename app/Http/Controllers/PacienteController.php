<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use Illuminate\Support\Facades\Log;
class PacienteController extends Controller
{

	public function listaPacientes(){
		$pacientes = Paciente::All();
        Log::debug( __METHOD__  . "Listando Pacientes");

		return view('lista_pecientes')->withtitle('Lista de Pacientes')->withFornecedores($paciente);
	}

	public function cadastroPaciente(){

		return view('cadastro_paciente')->withtitle('Novo Paciente');
	}

	public function salvaPaciente(Request $request){

		    $paciente = Paciente::create([
			'nome'                 => $request->nome,
			'cpf'                  => $request->cpf,
			'rg'                   => $request->rg,
			'email'                => $request->email,
			'telefone_residencial' => $request->telefone_residencial,
			'celular'              => $request->celular,
			'endereco'             => $request->endereco,	    		
	    ]);

		Log::debug( __METHOD__  . "Salvando paciente, NOME = ".$paciente->nome);

		return redirect('admin/cadastro-paciente')->With('success_message','Paciente Cadastrado com Sucesso!! :) ');
	}
	public function showViewAlteraPaciente($id_fornecedor){
		Log::debug( __METHOD__  . "View Alteração de Paciente");
		$paciente = Paciente::find($idPaciente);
		return view('cadastro_paciente')->withPaciente($paciente)->withTitle('Edição de Paciente');
	}

	public function update(Request $request, $id){
		$paciente = Fornecedor::find($id);
		$paciente->sap_fornecedor_id = $request->id_fornecedor;
		$paciente->empresa           = $request->empresa;
		$paciente->email             = $request->email;
		$response                    = $paciente->save();	
		Log::debug( __METHOD__  . "Atualizando Fornecedor  = ".$request->id_fornecedor." Empresa = ".$request->empresa);

		return redirect('admin/cadastro-fornecedor')->With('success_message','Fornecedor Alterado com Sucesso!! :) ');
	}

	public function excluirForrnecedor(Request $request){
		$paciente = Paciente::find($request->id_fornecedor);
		$paciente->delete();
		Log::debug( __METHOD__  . "Excluindo Paciente = ".$request->id_fornecedor." Empresa = ".$request->empresa);
		return redirect('/admin/lista-pacientes')->With('success_message','Paciente Excluído com Sucesso!! :) ');
	}
}
