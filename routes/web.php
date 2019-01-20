<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

//HomeController
Route::get('/home/{procedimento_id?}', 'HomeController@index')->name('home');
Route::get('/', 'SiteController@viewHomeSite');

/*Route::get('/home/{procedimento_id?}', function ($procedimento_id = null) {
    return $procedimento_id;
});*/


//UserController
Route::get('/admin/usuarios', 'UserController@listaUsuarios')->middleware('admin');
Route::get('/alterar-usuario', 'UserController@showViewAlterarUsuario');
Route::post('/alterar-usuario/{id}', 'UserController@update');
Route::get('/alterar-usuario/{id}', 'UserController@showViewAlterarUsuario');
Route::get('/admin/cadastro-usuario', 'UserController@showViewCadastro')->middleware('admin');
Route::post('/admin/excluir-usuario', 'UserController@excluirUser')->middleware('admin');



//AgendamentosController
Route::get('admin/novo-agendamento', 'AgendamentoController@viewAgendamento');
Route::post('admin/novo-agendamento', 'AgendamentoController@salvaAgendamento');

//PacienteController
Route::get('admin/lista-pecientes', 'PacienteController@listaPacientes')->middleware('admin');
Route::get('admin/cadastro-paciente', 'PacienteController@cadastroPaciente')->middleware('admin');
Route::post('admin/cadastro-paciente', 'PacienteController@salvaPaciente')->middleware('admin');
Route::get('admin/alterar-paciente/{id}', 'PacienteController@showViewAlteraPaciente')->middleware('admin');
Route::post('admin/alterar-paciente/{id}', 'PacienteController@update')->middleware('admin');
Route::post('admin/excluir-paciente', 'PacienteController@excluirPaciente')->middleware('admin');

/*
//GestaoCalendarioController
Route::get('admin/edicao-limite-caixas', 'GestaoCalendarioController@viewEdicaoLimite')->middleware('admin');
Route::get('admin/bloqueio-datas', 'GestaoCalendarioController@viewBloqueioData')->middleware('admin');
Route::post('admin/bloqueio-datas', 'GestaoCalendarioController@bloqueiaDatas')->middleware('admin');
Route::get('admin/lista-datas-bloqueadas', 'GestaoCalendarioController@listaDatasBloqueadas')->middleware('admin');
Route::post('admin/ecluir-data-bloqueada', 'GestaoCalendarioController@excluirBloqueioData')->middleware('admin');
Route::post('admin/salva-limite-caixas', 'GestaoCalendarioController@salvaLimiteCaixas')->middleware('admin');
Route::get('admin/lista-datas-com-quantidade-caixas', 'GestaoCalendarioController@viewDatasQuantCaixas')->middleware('admin');
*/

//Profissional Controller 
Route::get('admin/cadastro-profissional', 'ProfissionalController@viewCadastroProfissional')->middleware('admin');
Route::post('admin/cadastro-profissional', 'ProfissionalController@salvaProfissional')->middleware('admin');

//Procedimento Controller
Route::get('admin/cadastro-procedimento', 'ProcedimentoController@viewCadastroProcedimento')->middleware('admin');
Route::post('admin/cadastro-procedimento', 'ProcedimentoController@salvaProcedimento')->middleware('admin');

//Show Site
Route::get('/index', 'SiteController@viewHomeSite');


Route::post('/envia-email', 'SiteController@enviaEmailSite');

