<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $UserController;

    public function __construct(UserController $UserController)
    {
        $this->middleware('auth');
        $this->UserController = $UserController;
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**''
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $role = new FornecedorUser;
        // $this->UserController->enviaEmailPosCadastro($data['email'], $data['password']);
        
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'perfil'   => 1,
            'password' => bcrypt($data['password']),
        ]);

/*        $role->user_id           = $user->id;
        $role->sap_fornecedor_id = $data['sap_fornecedor_id'];
        $role->save();*/
        return $user;
    }



    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
