<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
	protected $table = 'pacientes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cpf', 'rg','email','telefone_residencial','celular','endereco'
    ];


/*    public function users() {
        return $this->belongsToMany('App\User'); 
    }*/
    
}
