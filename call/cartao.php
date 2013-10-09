<?php 
unset($_POST['action']);

$pessoal = isset($_POST['pessoal'])?$_POST['pessoal']:false;
$endereco = isset($_POST['endereco'])?$_POST['endereco']:false;
$pedido = isset($_POST['pedido'])?$_POST['pedido']:false;
$cartao = isset($_POST['cartao'])?$_POST['cartao']:false;

if($pessoal && $endereco && $pedido && $cartao){
	$pessoal = json_decode($pessoal, false);
	$endereco = json_decode($endereco, false);
	$pedido = json_decode($pedido, false);
	$cartao = json_decode($cartao, false);
	
	$credito->callCard($pessoal, $endereco, $pedido, $cartao);
	
}else{
	exit();
}
