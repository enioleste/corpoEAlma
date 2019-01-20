<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function viewHomeSite(){

        return view('index');
    }

    public function enviaEmailSite(Request $request){
        $email = 'decorpoealma1@gmail.com';


        Mail::send('layouts.email_agendamento', ['request' => $request], function ($message) use ($email,$request)
        {
            $message->from('contato@corpoealmacentroestetico.com.br', 'Contato Cliente');
            $message->to($email);
            $message->subject( "Contato de Cliente - " . $request->nome);
        });

        return redirect('/')->With('success_message','Email enviado com sucesso, em breve entraremos em contato com você!! :) ');
    }

}
