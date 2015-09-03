<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../../css/kickstart.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="../../css/jquery-ui-1.9.0.custom_menos_verde.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/jquery-1_8_2.js" type="text/javascript"></script>
		<script src="../../js/jquery-ui-1_9_0_custom_menos_verde.js" type="text/javascript"></script>
		<script src="../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../js/kickstart.js" type="text/javascript"></script>
        <style>
			td.error{color:red;}
			select.error{border:1px solid red;}
		</style>
        <script type="text/javascript">
		
			function formatar(documento){
			  var mascara = '##/##/####';
			  var i = documento.value.length;
			  var saida = mascara.substring(0,1);
			  var texto = mascara.substring(i)
			  
			  if (texto.substring(0,1) != saida){
					documento.value += texto.substring(0,1);
			  }  
			};
			function MascaraMoeda(objTextBox, SeparadorDecimal, e){
			  var sep = 0;
			  var key = "";
			  var i = j = 0;
			  var len = len2 = 0;
			  var strCheck = '0123456789';
			  var aux = aux2 = '';
			  var whichCode = (window.Event) ? e.which : e.keyCode;
			  if (whichCode == 13) return true;
			  key = String.fromCharCode(whichCode); // Valor para o código da Chave
			  if (strCheck.indexOf(key) == -1) return false; // Chave inválida
			  len = objTextBox.value.length;
			  if(len == 16) return false;
			  for(i = 0; i < len; i++)
				  if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
			  aux = '';
			  for(; i < len; i++)
				  if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
			  aux += key;
			  len = aux.length;
			  if (len == 0) objTextBox.value = "";
			  if (len == 1) objTextBox.value = "0"+ SeparadorDecimal + "0" + aux;
			  if (len == 2) objTextBox.value = "0"+ SeparadorDecimal + aux;
			  if (len > 2) {
				  aux2 = "";
				  for (j = 0, i = len - 3; i >= 0; i--) {
					  
					  aux2 += aux.charAt(i);
					  j++;
				  }
				  objTextBox.value = "";
				  len2 = aux2.length;
				  for (i = len2 - 1; i >= 0; i--)
				  objTextBox.value += aux2.charAt(i);
				  objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
			  }
    return false;
}
        </script>
		<title>Nova conta</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Nova conta</h6></div>
        <div class="left"> <a href="<?php echo site_url('contas/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('contas/inserir'); ?>" method="post">
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                            	<td class="right"> Nome da conta contábil: </td>
                                <td class="left"> <input type="text" size="45" maxlength="50" name="nome_conta" value="<?php echo set_value('nome_conta');?>"<?php if(form_error('nome_conta')) echo 'class="error"';?>/></td>
                                
								<td class="right"> Código da conta contábil: </td>
                                <td class="left"> <input type="text" size="38" maxlength="34" name="cd_conta" value="<?php echo set_value('cd_conta');?>"<?php if(form_error('cd_conta')) echo 'class="error"';?> /></td>
								
								<td class="right"> Ano de criação da conta contábil: </td>
								<td class="left"> <input type="text" size="10" maxlength="4" name="ano_criacao" value="<?php echo set_value('ano_criacao');?>"<?php if(form_error('ano_criacao')) echo 'class="error"';?>/></td>
								
                            </tr>
                            <tr> <td height="3"> </td> </tr>
							<tr>
                                <td class="right"> Código reduzido da conta: </td>
                                </td><td class="left"> <input type="text" size="26" maxlength="16" name="cd_reduzido" value="<?php echo set_value('cd_reduzido');?>"<?php if(form_error('cd_reduzido')) echo 'class="error"';?>/></td>
								
                                <td class="right"> Nível da conta contábil dentro do plano de contas: </td>
                                <td class="left"> <input type="text" size="5" maxlength="2" name="nivel_conta" value="<?php echo set_value('nivel_conta');?>"<?php if(form_error('nivel_conta')) echo 'class="error"';?> /></td>
							
								<td class="right"> Código para identificar se a conta contábil recebe ou não lançamento: </td>
                                <td class="left"> <input type="text" size="5" maxlength="1" name="cd_recebeLancamento" value="<?php echo set_value('cd_recebeLancamento');?>"<?php if(form_error('cd_recebeLancamento')) echo 'class="error"';?> /></td>
								
							</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr> 
								<td class="right"> Identificação do tipo de saldo da conta contábil: </td>
                                <td class="left"> 
                                	<select name="id_tipoSaldo" style="width:150px;" <?php if(form_error('id_tipoSaldo')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($tipo_de_saldo as $row) {
                                				echo "<option value=" . $row->codigo . "> " . $row->descricao . " </option>";
                            				}
										?>
                            		</select>
								</td>
								
								<td class="right"> Tipo da conta contábil: </td>
								<td class="left"> 
                                	<select name="tp_conta" style="width:220px;" <?php if(form_error('tp_conta')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($tipo_de_conta as $row) {
                                				echo "<option value=" . $row->codigo . "> " . $row->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
								
								<td class="right"> Mês da competência: </td>
                                <td class="left"> 
                                	<select name="mes" style="width:150px;" <?php if(form_error('mes')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($meses as $m) {
                                				echo "<option value=" . $m->id . "> " . $m->nome . " </option>";
                            				}
										?>
                            		</select>
                                </td>
							</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
								<td class="right"> Código da conta contábil Superior: </td>
                                <td class="left"> <input type="text" size="38" maxlength="34" name="cd_contaSuperior" value="<?php echo set_value('cd_contaSuperior');?>"<?php if(form_error('cd_contaSuperior')) echo 'class="error"';?> /></td>
								
								<td class="right"> Ano de criação da conta superior: </td>
                                <td class="left"> <input type="text" size="10" maxlength="4" name="ano_criacaoSuperior" value="<?php echo set_value('ano_criacaoSuperior');?>"<?php if(form_error('ano_criacaoSuperior')) echo 'class="error"';?> /></td>
								
								<td class="right"> Código do item orçamentário ligado a conta contábil: </td>
                                <td class="left"> <input type="text" size="15" maxlength="9" name="cd_itemOrcamentario" value="<?php echo set_value('cd_itemOrcamentario');?>"<?php if(form_error('cd_itemOrcamentario')) echo 'class="error"';?> /></td>
								
							</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
								
								<td class="right"> Código do banco a que a conta se refere: </td>
                                <td class="left"> <input type="text" size="10" maxlength="4" name="cd_banco" value="<?php echo set_value('cd_banco');?>"<?php if(form_error('cd_banco')) echo 'class="error"';?> /></td>
								
								<td class="right"> Código da agência bancária a que a conta se refere: </td>
                                <td class="left"> <input type="text" size="13" maxlength="6" name="cd_agencia" value="<?php echo set_value('cd_agencia');?>"<?php if(form_error('cd_agencia')) echo 'class="error"';?> /></td>
								
								<td class="right"> Número da conta bancária a que a conta contábil se refere: </td>
                                <td class="left"> <input type="text" size="17" maxlength="10" name="nu_conta" value="<?php echo set_value('nu_conta');?>"<?php if(form_error('nu_conta')) echo 'class="error"';?> /></td>
								
							</tr>
                            <tr> <td height="8"> </td> </tr>
                            <tr>
                            	<td colspan="6" class="right">
                                	<input type="submit" value="Submeter" class="green"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                 </td>
              </tr>
          </thead>
        </table>
    
    </div>
</body>
</html>