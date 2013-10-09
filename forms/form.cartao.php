
<form name="ccDados" class="ccDados" method="post" action="javascript:void(0);">
                <fieldset>
                    <legend>Dados do cartão</legend>
                    <label for="nomeCartao">Nome:</label>
                    <input type="text" class="nomeCartao" name="nomeCartao" placeholder="Digite o nome como impresso no cartão" /><br />
                    
                    <label for="cpf">CPF:</label>
                    <input type="text" class="cpf" name="cpf" placeholder="Digite o cpf do titular do cartão" /><br />
                    
                    <label for='numeroCartao'>Numero do cartão:</label>
                    <input type="text" class="numeroCartao" name="numeroCartao" placeholder="Número do cartão" /><br />
                    <ul class="bandeiras">
                        <li class="visa"><img src="img/visa.png" height="50px" /></li>
                        <li class="master"><img src="img/master.png" height="50px" /></li>
                        <li class="amex"><img src="img/amex.png" height="50px" /></li>
                        <li class="elo"><img src="img/elo.png" height="50px"/></li>
                        <li class="diners"><img src="img/diners.png"  height="50px" /></li>
                    </ul>
                    <label for='codigoCartao'>Código de segurança:</label>
                    <input type="text" class="codigoCartao" name="codigoCartao" placeholder="***" maxlength="3" /><br />
                    <label for="mesVenc">Data de vencimento:</label>
                    <select class="mesVenc">
                        <?php for($n = 1; $n <= 12; $n++){ $dia = ($n < 10)?'0'.$n:$n; echo '<option>'.$dia.'</option>';	} ?>
                    </select>
                    <select class="anoVenc">
                        <?php $anoAtual = date('Y'); $anoFinal = $anoAtual+10;	for($anoAtual;  $anoAtual <= $anoFinal; $anoAtual++){ echo '<option value="'.$anoAtual.'">'.$anoAtual.'</option>';}?>
                    </select><br />
                    <label for="parcelas">Parcelas:</label>
                    <select class="parcelas">
                        <?php
                        for($p = 1; $p <= 12; $p++){
                            $valorParcelado = $preco/$p;
                            if($valorParcelado > 10){
                                if($p > 4){
                                    echo '<option>'.$p.'x de R$ '.number_format($valorParcelado,2,',','.').'</option>';
                                }else{
                                    echo '<option>'.$p.'x de R$ '.number_format($valorParcelado,2,',','.').' sem juros</option>';
                                }
                            }else{
                            
                            }
                        }?>
                    </select><br />
                    <button class="pagarCartao">Pagar com cartão de crédito</button>
                </fieldset>
                
            </form>