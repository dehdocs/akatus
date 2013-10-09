<?php

class Credito{

	public $apiKey = APIKEY;
	public $email = EMAIL;
	public $curl;
	
	public function __construct(){
		$this->curl = new Curl();
	}
	public function callCard($pessoal, $endereco ,$produtos, $dadosCc){
		$send = $this->curl->curlCall($this->getUrlApi(), $this->mountCard($pessoal, $endereco ,$produtos, $dadosCc));
		var_dump($send);
	}
	public function mountCard($pessoal, $endereco ,$produtos, $dadosCc){
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
						<numero>".$dadosCc[2]."</numero>
						<parcelas>".$dadosCc[7]."</parcelas>
						<codigo_de_seguranca>".$dadosCc[4]."</codigo_de_seguranca>
						<expiracao>".$dadosCc[5].'/'.$dadosCc[6]."</expiracao>
						<desconto>".$produtos[3]."</desconto>
						<peso>0.0</peso>
						<frete>0.00</frete>
						<moeda>BRL</moeda>
						<referencia>".$produtos[0]."</referencia>
						<meio_de_pagamento>".$dadosCc[3]."</meio_de_pagamento>
						
						<portador>
							<nome>".$dadosCc[0]."</nome>
							<cpf>".$dadosCc[1]."</cpf>
							<telefone>".$pessoal[2]."</telefone>
						</portador>
					</transacao>
				</carrinho>";
				return $xml;
	}
	public function getUrlApi(){
		return URLAPI;
	}		
}
?>