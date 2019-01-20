<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
	protected $table = 'agendamentos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profissional_id', 'procedimento_id', 'cliente_id','data_hora',
    ];

    public function procedimento(){
    	//classe, relacionamento [coluna local, coluna remota]
    	return $this->belongsTo('App\Procedimento','procedimento_id','id');
    }
}
