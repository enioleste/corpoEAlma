<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agendamento;
use App\Profissional;
use App\Procedimento;
use App\Paciente;
use Illuminate\Support\Facades\Log;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($procedimento_id = null)
    {   
        if($procedimento_id != null){
            $agendamentos = Agendamento::where('procedimento_id', $procedimento_id)->get();
            $parametro = 'parametro';
            $nomeProcedimento = Procedimento::where('id',$procedimento_id)->pluck('nome')->first();
        }else{
            $parametro = 'sem parametro';
            $agendamentos = Agendamento::all();
            $nomeProcedimento = '';
        }

        $dataAtual = date('Y-m-d');
        
        if($agendamentos->count() != 0){

            foreach ($agendamentos as $key => $agendamento) {
                $profissional = Profissional::where('id', $agendamento->profissional_id)->first();
                $agendamento->profissional = $profissional->nome;

                $cliente = Paciente::where('id', $agendamento->cliente_id)->first();
                $agendamento->paciente = $cliente->nome;
                $procedimento = Procedimento::where('id',$agendamento->procedimento_id)->first();
                $agendamento->procedimento = $procedimento->nome;

            }
        }else{
            $procedimento = Procedimento::where('id',$procedimento_id)->first();
            
        }

        return view('home',[
            'agendamentos'     => $agendamentos,
            'parametro'        => $parametro,
            'procedimento'     => $procedimento,
            'nomeProcedimento' => $nomeProcedimento,
        ]);

        //dd($agendamentos);

    }
}
