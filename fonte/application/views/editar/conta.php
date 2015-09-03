<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../../../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../../../css/kickstart.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="../../../css/jquery-ui-1.9.0.custom_menos_verde.css" rel="stylesheet" type="text/css"/>
        <script src="../../../js/jquery-1_8_2.js" type="text/javascript"></script>
		<script src="../../../js/jquery-ui-1_9_0_custom_menos_verde.js" type="text/javascript"></script>
		<script src="../../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../../js/kickstart.js" type="text/javascript"></script>
        <style>
			td.error{color:red;}
			select.error{border:1px solid red;}
		</style>
       
		<title>Editar conta</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Editar conta</h6></div>
        <div class="left"> <a href="<?php echo site_url('contas/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('contas/update'); ?>" method="post">
					  <? foreach($contas as $row){?>
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                            	<td class="right"> Nome da conta contábil: </td>
                                <td class="left"> <input type="text" size="45" maxlength="50" name="nome_conta" value="<?=$row->nome_conta;?>" /></td>
                                
								<td class="right"> Código da conta contábil: </td>
                                <td class="left"> <input type="text" size="38" maxlength="34" name="cd_conta" value="<?=$row->cd_conta;?>" /></td>
								
								<td class="right"> Ano de criação da conta contábil: </td>
								<td class="left"> <input type="text" size="10" maxlength="4" name="ano_criacao" value="<?=$row->ano_criacao;?>" /></td>
								
                            </tr>
                            <tr> <td height="3"> </td> </tr>
							<tr>
                                <td class="right"> Código reduzido da conta: </td>
                                </td><td class="left"> <input type="text" size="26" maxlength="16" name="cd_reduzido" value="<?=$row->cd_reduzido;?>"/></td>
								
                                <td class="right"> Nível da conta contábil dentro do plano de contas: </td>
                                <td class="left"> <input type="text" size="5" maxlength="2" name="nivel_conta" value="<?=$row->nivel_conta;?>" /></td>
							
								<td class="right"> Código para identificar se a conta contábil recebe ou não lançamento: </td>
                                <td class="left"> <input type="text" size="5" maxlength="1" name="cd_recebeLancamento" value="<?=$row->cd_recebeLancamento;?>" /></td>
								
							</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr> 
								<td class="right"> Identificação do tipo de saldo da conta contábil: </td>
                                <td class="left"> 
                                	<select name="id_tipoSaldo" style="width:150px;" >
										<? 
											foreach ($tipo_de_saldo as $tp) {
                                				echo "<option value='" . $tp->codigo . "'";
												if(strcmp($tp->codigo, $row->id_tipoSaldo) == 0) echo ' selected="selected" ';
												echo "> " . $tp->descricao . " </option>";
                            				}
										?>
                            		</select>
								</td>
								
								<td class="right"> Tipo da conta contábil: </td>
								<td class="left"> 
                                	<select name="tp_conta" style="width:220px;">
										<? 
											foreach ($tipo_de_conta as $tp) {
                                				echo "<option value='" . $tp->codigo . "'";
												if(strcmp($tp->codigo, $row->tp_conta) == 0) echo ' selected="selected" ';
												echo "> " . $tp->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
								
								<td class="right"> Mês da competência: </td>
                                <td class="left"> 
                                	<select name="mes" style="width:150px;" >
										<? 
											foreach ($meses as $m) {
                                				echo "<option value='" . $m->id . "'";
												if(strcmp($m->id, $row->mes) == 0) echo ' selected="selected" ';
												echo "> " . $m->nome . " </option>";
                            				}
										?>
                            		</select>
                                </td>
							</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
								<td class="right"> Código da conta contábil Superior: </td>
                                <td class="left"> <input type="text" size="38" maxlength="34" name="cd_contaSuperior" value="<?=$row->cd_contaSuperior;?>" /></td>
								
								<td class="right"> Ano de criação da conta superior: </td>
                                <td class="left"> <input type="text" size="10" maxlength="4" name="ano_criacaoSuperior" value="<?=$row->ano_criacaoSuperior;?>" /></td>
								
								<td class="right"> Código do item orçamentário ligado a conta contábil: </td>
                                <td class="left"> <input type="text" size="15" maxlength="9" name="cd_itemOrcamentario" value="<?=$row->cd_itemOrcamentario;?>" /></td>
								
							</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
								
								<td class="right"> Código do banco a que a conta se refere: </td>
                                <td class="left"> <input type="text" size="10" maxlength="4" name="cd_banco" value="<?=$row->cd_banco;?>" /></td>
								
								<td class="right"> Código da agência bancária a que a conta se refere: </td>
                                <td class="left"> <input type="text" size="13" maxlength="6" name="cd_agencia" value="<?=$row->cd_agencia;?>" /></td>
								
								<td class="right"> Número da conta bancária a que a conta contábil se refere: </td>
                                <td class="left"> <input type="text" size="17" maxlength="10" name="nu_conta" value="<?=$row->nu_conta;?>" /></td>
								
							</tr>
                            <tr> <td height="8"> </td> </tr>
                            <tr>
                            	<td colspan="6" class="right">
									<input type="hidden" name="id" value="<?=$row->id?>"/>
                                	<input type="submit" value="Editar" class="green"/>
                                </td>
                            </tr>
                        </table>
					   <? }?>
                    </form>
                 </td>
              </tr>
          </thead>
        </table>
    
    </div>
</body>
</html>