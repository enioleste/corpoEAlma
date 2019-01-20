<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
	protected $table = 'profissionais';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'procedimentos',
    ];
}
