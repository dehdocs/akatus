<?php 
ini_set('display_errors','on');
include('config.php');
include('class/class.methods.php');
include('class/class.credito.php');
include('class/class.boleto.php');

$mt = new Methods();
$credito = new Credito();
$boleto = new Boleto();

function printr($str){
	echo '<pre>';
	print_r($str);
	echo '</pre>';
}
function alert($str){
	echo '<script>alert('.$str.');</script>';
}
?>