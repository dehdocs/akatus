<?php 
unset($_POST['action']);

$pessoal = isset($_POST['pessoal'])?$_POST['pessoal']:false;
$endereco = isset($_POST['endereco'])?$_POST['endereco']:false;
$pedido = isset($_POST['pedido'])?$_POST['pedido']:false;

if($pessoal && $endereco && $pedido){
	$pessoal = json_decode($pessoal, false);
	$endereco = json_decode($endereco, false);
	$pedido = json_decode($pedido, false);
	
	$boleto->callBoleto($pessoal, $endereco, $pedido);
	
}else{
	exit();
}
