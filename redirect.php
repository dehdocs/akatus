<?php 
include('init.php');
$action= isset($_POST['action'])?$_POST['action']:NULL;
switch($action){
	case 'cartaoDeCredito':
		include('call/cartao.php');
		break;
	case 'BoletoBancario':
		include('call/boleto.php');
		break;
	default:
		exit();
		break;\
}
?>