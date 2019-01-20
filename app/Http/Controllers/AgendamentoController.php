<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procedimento;
use App\Paciente;
use App\Agendamento;
use App\Profissional;
use Redirect;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
class AgendamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAgendamento(){
        $procedimentos = Procedimento::all();
        $pacientes = Paciente::all();
        $profissionais = Profissional::all();

        return view('novo_agendamento')->withtitle('Novo Agendamento')->withProcedimentos($procedimentos)->withProfissionais($profissionais)->withPacientes($pacientes);
    }


    public function salvaAgendamento(Request $request){

        $agendamento = Agendamento::create([
            'profissional_id' => $request->profissional,
            'cliente_id'      => $request->cliente,
            'procedimento_id' => $request->procedimento,
            'data_hora'       => date('Y-m-d h:m:i', strtotime(str_replace('/', '-', $request->data_hora))),
        ]);

        
        Log::debug( __METHOD__  . "Salvando agendamento,  ". json_encode($agendamento));

        return redirect('admin/novo-agendamento')->With('success_message','Agendamento Realizado com Sucesso!! :) ');        
    }
}

