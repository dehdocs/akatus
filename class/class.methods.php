<?php

require ('class.curl.php');
class Methods{

	public $apiKey = APIKEY;
	public $email = EMAIL;
	public $curl;
	
	public function __construct(){
		$this->curl = new Curl();
	}
	
	//Mostra os métodos de pagamentos cadastrados na akatus na view
	public function getMethods(){
		$xml = simplexml_load_string($this->apiConnect());
		echo '<select class="meio">';
		$n =  1;
		foreach ($xml->meios_de_pagamento->meio_de_pagamento as $meios){
			$meios->descricao =  ($meios->descricao == 'TEF')?'Transferência eletrônica':$meios->descricao;
			echo '<option value="'.$n.'">'.$meios->descricao.'</option>';
			$n++;
		}
		echo '</select>';
	}
	
	//Obtem os dados na api
	public function apiConnect(){
		
		$urlAPI = "https://sandbox.akatus.com/api/v1/meios-de-pagamento.xml";
		$XMLdata ="<?xml version='1.0' encoding='UTF-8'?>
		<meios_de_pagamento>
		<correntista>
		<api_key>".$this->apiKey."</api_key>
		<email>".$this->email."</email>
		</correntista>
		</meios_de_pagamento>";
		
		return $this->curl->curlCall($urlAPI, $XMLdata);
		
	}	
		
}
?>