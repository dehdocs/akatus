<?php include('init.php'); 
$preco = isset($_GET['preco'])?$_GET['preco']:false;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Pagamento</title>

<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/main.js"></script>
<link href="css/estilos.css" type="text/css" rel="stylesheet" />
<link href="css/jquery-ui-1.10.3.custom.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="debug"></div>
 <div id="tabs">
        <ul>
            <li><a href="#tabs-1"><span>Dados do cliente</span></a></li>
            <li><a href="#tabs-2"><span>Dados do Produto</span></a></li>
            <li><a href="#tabs-3"><span>Dados de Pagamento</span></a></li>
        </ul>
        <div id="tabs-1">
        	<?php include('forms/form.cadastro.php'); ?>
        </div>
        <div id="tabs-2">
        	<?php include('forms/form.produtos.php'); ?>
        </div>
        <div id="tabs-3">
			<?php 
            $mt->getMethods();
            ?>
            <div class="boleto">
                <button class="geraBoleto">Gerar Boleto</button>
            </div>
            <div class="cartao" style="display:none;">
            <?php include('forms/form.cartao.php'); ?>
            </div>
            <div class="TEF" style="display:none">
            Transferencia
            </div>
		</div>
</div>
</body>
</html>
