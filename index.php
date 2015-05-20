<?php

$rota=parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$pagina= str_replace("projeto-modulo2/", "", $rota['path']);
$path = explode('/',$pagina,2);

function rota($path){

	$rotas = array ( "home","empresa","contato","servicos","produtos" );
	
	$arquivo = $path[1].".php";

	if (!in_array($path[1], $rotas) or !file_exists($arquivo)){
			
		header("HTTP/1.0 404 Not Found");
		include_once ("erro.php");die;

	}
	
	include_once $arquivo;

}

rota($path);

?>