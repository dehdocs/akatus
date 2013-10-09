<?php
$dados[0]   = isset($_POST["transacao_id"])?$_POST["transacao_id"]:NULL;
$dados[1]     = isset($_POST["status"])?$_POST["status"]:NULL;
$dados[3]      = isset($_POST["token"])?$_POST["token"]:NULL;


$fp = fopen("txt/".$dados[0].".txt", "a");
 
// Escreve "exemplo de escrita" no bloco1.txt
foreach($dados as $d){
	print_r($d);
	$escreve = fwrite($fp, $d."\n");
}
// Fecha o arquivo
fclose($abre);





