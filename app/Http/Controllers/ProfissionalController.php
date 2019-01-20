<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profissional;
use Illuminate\Support\Facades\Log;


class ProfissionalController extends Controller
{
	public function viewCadastroProfissional(){

		return view('cadastro_profissional')->withtitle('Novo Profissional');
	}




	public function salvaProfissional(Request $request){

	    $profissional = Profissional::create([
			'nome'                 => $request->nome,
			'procedimentos'        => json_encode($request->procedimentos),
	    ]);

		Log::debug( __METHOD__  . "Salvando profissional, NOME = ".$profissional->nome);

		return redirect('admin/cadastro-profissional')->With('success_message','Profissional Cadastrado com Sucesso!! :) ');
	}	
}
