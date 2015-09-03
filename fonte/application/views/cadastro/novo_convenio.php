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
		<title>Novo convenio</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Novo convênio</h6></div>
        <div class="left"> <a href="<?php echo site_url('convenios/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <?php if(form_error('nu_Convenio')) echo '<div class="col_12 error">Número de convênio ja cadastrado!</div>';?>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('convenios/inserir'); ?>" method="post">
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td class="right"> Número do convênio ou aditivo: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="nu_Convenio" value="<?php echo set_value('nu_Convenio');?>"<?php if(form_error('nu_Convenio')) echo 'class="error"';?>/></td>
                                <td class="right"> Valor do convênio: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="vl_Convenio" value="<?php echo set_value('vl_Convenio');?>"<?php if(form_error('vl_Convenio')) echo 'class="error"';?> onKeyPress="return(MascaraMoeda(this,',',event))"/></td>
                                <td class="right"> Código da moeda utilizada: </td>
                                <td class="left"> 
                                	<select name="cd_MoedaConvenio" style="width:150px;" <?php if(form_error('cd_MoedaConvenio')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($tipo_moeda as $row) {
                                				echo "<option value=" . $row->codigo . "> " . $row->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                        	</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Tipo do convênio: </td>
                                <td class="left" colspan="2"> 
                                	<select name="tp_Convenio" style="width:400px;" <?php if(form_error('tp_Convenio')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($tipo_convenio as $row) {
                                				echo "<option value=" . $row->codigo . "> " . $row->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>   
                                <td class="right"> Data de assinatura do convênio: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_AssinaturaConvenio" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_AssinaturaConvenio');?>"<?php if(form_error('dt_AssinaturaConvenio')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de vencimento do convênio: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_VencimentoConvenio" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_VencimentoConvenio');?>"<?php if(form_error('dt_VencimentoConvenio')) echo 'class="error"';?>/></td>
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
                            	<td class="right"> Descrição do objetivo do convênio: </td>
                                <td class="left" colspan="5"> <input type="text" size="160" maxlength="300" name="de_ObjetivoConvenio" value="<?php echo set_value('de_ObjetivoConvenio');?>"<?php if(form_error('de_ObjetivoConvenio')) echo 'class="error"';?>/></td>
                                
                            
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do diário oficial: </td>
                                <td class="left"> <input type="text" size="15" maxlength="6" name="nu_DiarioOficial" value="<?php echo set_value('nu_DiarioOficial');?>"<?php if(form_error('nu_DiarioOficial')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de publicação do convênio: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_PublicacaoConvenio" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_PublicacaoConvenio');?>"<?php if(form_error('dt_PublicacaoConvenio')) echo 'class="error"';?>/></td>
                                <td class="right"> Recebe valor: </td>
                                <td class="left"> 
                                	<select name="st_RecebeValor" style="width:150px;">
                                    	<option value="S"> Sim </option>
                                        <option value="N"> Não </option>
                                    </select>
                                </td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número da lei autorizativa do convênio: </td>
                                <td class="left"> <input type="text" size="15" maxlength="6" name="nu_LeiAutorizativa" value="<?php echo set_value('nu_LeiAutorizativa');?>"<?php if(form_error('nu_LeiAutorizativa')) echo 'class="error"';?>/></td>
                                <td class="right"> Data da lei autorizativa do convênio: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_LeiAutorizativa" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_LeiAutorizativa');?>"<?php if(form_error('dt_LeiAutorizativa')) echo 'class="error"';?>/></td>
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