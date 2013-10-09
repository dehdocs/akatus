<?php

class Boleto{

	public $apiKey = APIKEY;
	public $email = APIKEY;
	public $curl;
	
	public function __construct(){
		$this->curl = new Curl();
	}
	//CRIA BOTÃO GERAR BOLETO NA VIEW
	public function callBoleto($pessoal, $endereco ,$produtos){
		printr($produtos);
		$send = $this->curl->curlCall($this->getUrlApi(), $this->mountBoleto($pessoal, $endereco ,$produtos));
		$linkBoleto = simplexml_load_string($send);
		echo '<a href="'.str_replace('www', 'dev', $linkBoleto->url_retorno).'">Gerar Boleto </a>';
	}
	
	//MONTA BOLETO NA AKATUS
	public function mountBoleto($pessoal, $endereco ,$produtos){
		printr($pessoal);
			$xml = "<?xml version='1.0' encoding='utf-8' ?>
				<carrinho>
					<recebedor>
						<api_key>".$this->apiKey."</api_key>
						<email>".$this->email."</email>
					</recebedor>
					<pagador>
						<nome>".$pessoal[0]."</nome>
						<email>a".$pessoal[1]."</email>
						<enderecos>
							<endereco>
								<tipo>entrega</tipo>
								<logradouro>".$endereco[0]."</logradouro>
								<numero>".$endereco[1]."</numero>
								<bairro>".$endereco[2]."</bairro>
								<complemento></complemento>
								<cidade>".$endereco[3]."</cidade>
								<estado>".$endereco[4]."</estado>
								<pais>".$endereco[5]."</pais>
								<cep>".$endereco[6]."</cep>
							</endereco>
							
						</enderecos>
						<telefones>
							<telefone>
								<tipo>comercial</tipo>
								<numero>".$pessoal[2]."</numero>
							</telefone>
						</telefones>
					</pagador>
					<produtos>
						<produto>
							<codigo>".$produtos[0]."</codigo>
							<descricao>".$produtos[1]."</descricao>
							<quantidade>1</quantidade>
							<preco>".$produtos[2]."</preco>
							<peso>0.0</peso>
							<frete>0.00</frete>
							<desconto>".$produtos[3]."</desconto>
						</produto>
					</produtos>
					<transacao>
						<desconto>".$produtos[3]."</desconto>
						<peso>0.00</peso>
						<frete>0.00</frete>
						<moeda>BRL</moeda>
						<referencia>".$produtos[0]."</referencia>
						<meio_de_pagamento>boleto</meio_de_pagamento>
					</transacao>

				</carrinho>";
				return $xml;
	}
	public function getUrlApi(){
		return URLAPI;
	}		
}
?>