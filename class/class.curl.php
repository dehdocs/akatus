<?php
class Curl{
	public function curlCall($urlApi, $XMLdata){
		$curlRequest = curl_init($urlApi);
		curl_setopt($curlRequest, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curlRequest, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlRequest, CURLOPT_POST, 1);
		curl_setopt($curlRequest, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		curl_setopt($curlRequest, CURLOPT_POSTFIELDS, $XMLdata);
		curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, 1);
		$responseData = curl_exec($curlRequest);
		return $responseData;
	}
}
?>