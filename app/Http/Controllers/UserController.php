<?php

namespace App\Http\Controllers;

use App\User;
use App\Perfis;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
	public function listaUsuarios(){
		$users = User::all();
		return view('listaUsuarios')->withtitle('Lista de Usuários')->withUsers($users);
	}

    public function showViewAlterarUsuario($id = null){
        if($id != null || $id != ''){
            $user = User::find($id);
            return view('alterar_usuario')->withTitle('Alterar Usuário')->withUser($user);
        }else{
            
            return view('alterar_usuario')->withTitle('Edição de Usuário');
        }
    }

    public function update(Request $request, $id){
        $user = User::find($id); 
        Log::debug( __METHOD__  . " Atualizando User:  " . $user->name);

        $user->name = $request->name;
        $user->email = $request->email;

        // verifica se a senha foi alterada
        if (!$request->password == ''){
            // muda a senha do seu user já criptografada pela função bcrypt
            $user->password = bcrypt($request->password); 
        }
        $user->save(); // salva o user alterado =)
        return Redirect::to('/home');
    }

    public function showViewCadastro(){
        Log::debug( __METHOD__  . " View Cadastro User");
        return view('cadastro_usuario')->withTitle('Cadastro Usuario');
    }

    public function enviaEmailPosCadastro($email, $senha){

        Log::debug( __METHOD__  . " Enviando Email Pós-Cadastro: EMAIL: " . $email);
        $response = Mail::send('layouts.email_user', ['login' => $email, 'senha' => $senha], function ($message) use ($email)
        {
            $message->from('portalagendamento@decathlon.com', 'Portal de Agendamento');
            $message->to($email);
            $message->subject("Portal de Agendamento - Bem-Vindo!!");
        });

        //return response()->json(['message' => 'Request completed']); 
        return $response;
    } 

/*    public function excluirUser(Request $request){
        $usuario = User::find($request->id_user);
        $fornecedor_user = FornecedorUser::where('user_id',$usuario->id);
        Log::debug( __METHOD__  .' - '. $request->id_user);
        $usuario->delete();
        $fornecedor_user->delete();
        return redirect('/admin/usuarios')->With('success_message','Usuário Excluído com Sucesso!! :) ');
    } */ 
}
