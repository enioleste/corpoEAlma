<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
	protected $table = 'procedimentos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'valor',
    ];

   
}
