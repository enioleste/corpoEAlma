<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procedimento;
use Illuminate\Support\Facades\Log;

class ProcedimentoController extends Controller
{
	public function viewCadastroProcedimento(){

		return view('cadastro_procedimento')->withtitle('Novo Procedimento');
	}




	public function salvaProcedimento(Request $request){

	    $profissional = Procedimento::create([
			'nome'                 => $request->nome,
			'valor'        => $request->valor,
	    ]);

		Log::debug( __METHOD__  . "Salvando Procedimento, NOME = ".$profissional->nome);

		return redirect('admin/cadastro-procedimento')->With('success_message','Procedimento Cadastrado com Sucesso!! :) ');
	}
}
