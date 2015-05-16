<?php

$rota=parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$pagina= str_replace("projeto-modulo2/", "", $rota['path']);
$path = explode('/',$pagina,2);

function rota($path){

	$rotas = array ( "home","empresa","contato","servicos" );
	if (in_array($path[1], $rotas)) {
		return require_once($path[1].".php");
	} else if ( $path[1] == ""){
		return require_once("home.php");
	} else {
		header("HTTP/1.0 404 Not Found");
		include_once ("erro.php");die;
	}

}

rota($path);

?>