$(document).ready(function(){
	$('.meio').change(function(){
		if($(this).val() == '1'){
			$('.cartao').fadeOut('fast');
			$('.TEF').fadeOut('fast');
			$('.boleto').slideDown('fast');
		}else if($(this).val() == '2'){
			$('.boleto').fadeOut('fast');
			$('.TEF').fadeOut('fast');
			$('.cartao').slideDown('fast');
		}else if($(this).val() == '3'){
			$('.boleto').fadeOut('fast');
			$('.cartao').fadeOut('fast');
			$('.TEF').slideDown('fast');
		}else{
		
		}
	});
	$('.numeroCartao').change(function(){
		var info = $(this).val();
		if(info.substr(0,1) == '4' && info.length >= 13 && info.length <= 16){
			$('.master').removeClass('selected'); $('.amex').removeClass('selected'); $('.diners').removeClass('selected');	$('.elo').removeClass('selected');
			$('.visa').addClass('selected');
			
		}else if(info.substr(0,2) == '51' || info.substr(0,2) == '52' || info.substr(0,2) == '53' || info.substr(0,2) == '54' || info.substr(0,2) == '55' && info.length == 16){
			$('.visa').removeClass('selected');	$('.amex').removeClass('selected');	$('.diners').removeClass('selected'); $('.elo').removeClass('selected');
			$('.master').addClass('selected');
			
		}else if(info.substr(0,2) == '34' || info.substr(0,2) == '37' && info.length == 15){
			$('.visa').removeClass('selected');	$('.master').removeClass('selected'); $('.diners').removeClass('selected');	$('.elo').removeClass('selected');
			$('.amex').addClass('selected');
			
		}else if(info.substr(0,3) == '300' || info.substr(0,3) == '301' || info.substr(0,3) == '302' || info.substr(0,3) == '303' || info.substr(0,3) == '304' || info.substr(0,3) == '305' || info.substr(0,2) == '36' || info.substr(0,2) == '38' && info.length == 14){
			$('.visa').removeClass('selected');	$('.master').removeClass('selected'); $('.amex').removeClass('selected'); $('.elo').removeClass('selected');
			$('.diners').addClass('selected');
			
		}else{
			$('.visa').removeClass('selected');	$('.master').removeClass('selected');	$('.amex').removeClass('selected');		$('.diners').removeClass('selected');
			$('.elo').addClass('selected');
		}
	});
	 $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
	//
	
	
	//
	
	$('.pagarCartao').click(function(){
		//dados pessoais
		var pessoal = getDataPessoal();
		//dados de endereço
		var endereco = getDataEndereco();
		//dados do pedido
		var pedido = getDataPedido();
		
		//dados Cartao
		var cartao = new Array();
		cartao[0] = $('.nomeCartao').val();
		cartao[1] = $('.cpf').val();
		cartao[2] = $('.numeroCartao').val();
		cartao[3] = $('.cartaoTipo').val();
		cartao[4] = $('.codigoCartao').val();
		cartao[5] = $('.mesVenc').val();
		cartao[6] = $('.anoVenc').val();
		cartao[7] = $('.parcelas').val();
		var ret = JSON.stringify(cartao);
		sendSubCartao(pessoal, endereco, pedido, ret);
	});
	$('.geraBoleto').click(function(){
		//dados pessoais
		var pessoal = getDataPessoal();
		//dados de endereço
		var endereco = getDataEndereco();
		//dados do pedido
		var pedido = getDataPedido();
		
		sendSubBoleto(pessoal, endereco, pedido);
		
		
	});
});
function getDataPessoal(){
	var pessoal = new Array();
	pessoal[0] = $('.nome').val();
	pessoal[1] = $('.email').val();
	pessoal[2] = $('.telefone').val();
	var ret = JSON.stringify(pessoal);
	return ret;
}
function getDataEndereco(){
	var endereco = new Array();
		endereco[0] = $('.rua').val();
		endereco[1] = $('.numero').val();
		endereco[2] = $('.bairro').val();
		endereco[3] = $('.cidade').val();
		endereco[4] = $('.estado').val();
		endereco[5] = $('.pais').val();
		endereco[6] = $('.cep').val();
		var ret = JSON.stringify(endereco);
	
		return ret;
}
function getDataPedido(){
	var pedido = new Array();
	pedido[0] = $('.codigo').val();
	pedido[1] = $('.descricao').val();
	pedido[2] = $('.preco').val();
	pedido[3] = $('.desconto').val();
	var ret = JSON.stringify(pedido);
	return ret;
}

function sendSubCartao(pessoal, endereco, pedido, cartao){
	$.ajax({
		type:"POST",
		url:"redirect.php",
		data:{action:'cartaoDeCredito', pessoal:pessoal, endereco:endereco, pedido:pedido, cartao:cartao},
		success:function(data){
			$('.debug').html(data);
		}
	});
}

function sendSubBoleto(pessoal, endereco, pedido){
	$.ajax({
		type:"POST",
		url:"redirect.php",
		data:{action:'BoletoBancario', pessoal:pessoal, endereco:endereco, pedido:pedido},
		success:function(data){
			$('.debug').html(data);
		}
	});
}