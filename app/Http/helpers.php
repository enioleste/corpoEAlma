<?php
use Carbon\Carbon;

function verificaPerfil($user,$perfil){
	//1 = Admin, 2 = Fornecedor
	if($user->perfil === $perfil){
		return true;
	}else{
		return false;
	}
}


function generateDateRange($start_date, $end_date){

    $dates = [];

    for($date = $start_date; $date->lte($end_date); $date->addDay()) {

        $dates[] = $date->format('Y-m-d');
    }
    return $dates;

}	