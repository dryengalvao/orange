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
		<title>Editar cotação</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Editar cotação</h6></div>
        <div class="left"> <a href="<?php echo site_url('cotacoes/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('cotacoes/update'); ?>" method="post">
                      <? foreach($cotacoes as $row){?>
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td class="right"> Número do processo licitatório: </td>
                                <td class="left"> 
                                	<select name="nu_ProcessoLicitatorio" style="width:150px;" >
										<? 
											foreach ($licitacoes as $lc) {
                                				echo "<option value='" . $lc->id . "'";
												if(strcmp($lc->id, $row->id_licitacao) == 0) echo ' selected="selected" ';
												echo "> " . $lc->nu_ProcessoLicitatorio . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> Sequencial do item conforme edital: </td>
                                <td class="left"> <input type="text" size="15" maxlength="5" name="nu_SequenciaItem" value="<?=$row->nu_SequenciaItem;?>"/></td>
                                <td class="right"> Mês da competência: </td>
                                <td class="left"> 
                                	<select name="mes" style="width:150px;" <?php if(form_error('mes')) echo 'class="error"';?>>
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
                            	<td class="right"> Tipo jurídico do participante: </td>
                                <td class="left"> 
                                	<select name="tp_Pessoa" style="width:150px;">
										<? 
											foreach ($tipo_pessoa as $tp) {
                                				echo "<option value='" . $tp->codigo . "'";
												if(strcmp($tp->codigo, $row->tp_Pessoa) == 0) echo ' selected="selected" ';
												echo "> " . $tp->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> CGC ou CPF do participante: </td>
                                <td class="left"> <input type="text" size="30" maxlength="14" name="cd_CicParticipante" value="<?=$row->cd_CicParticipante;?>"/></td>
                                <td class="right"> Situação do participante na licitação: </td>
                                <td class="left"> 
                                	<select name="cd_VencedorPerdedor" style="width:150px;">
                                    	<option value="V" <? if($row->cd_VencedorPerdedor == "V") echo ' selected="selected" ';?>> Vencedor </option>
										<option value="P" <? if($row->cd_VencedorPerdedor == "P") echo ' selected="selected" ';?>> Perdedor </option>
                            		</select>
                                </td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>   
                                <td class="right"> Valor cotado pelo participante: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="vl_TotalCotadoItem" value="<?=$row->vl_TotalCotadoItem;?>" onKeyPress="return(MascaraMoeda(this,',',event))"/></td>
                                <td class="right"> Tipo do valor: </td>
                                <td class="left"> 
                                	<select name="tp_Valor" style="width:150px;">						
                                    	<option value="E" <? if($row->tp_Valor == "E") echo ' selected="selected" ';?>> Espécie </option>
										<option value="P" <? if($row->tp_Valor == "P") echo ' selected="selected" ';?>> Percentual </option>
                            		</select>
                                </td>
                                <td class="right"> Quantidade de produtos oferecidos pelo participante: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="qt_ItemCotado" value="<?=$row->qt_ItemCotado;?>" onKeyPress="return(MascaraMoeda(this,',',event))"/></td>
                            </tr>
                            <tr> <td height="8"> </td> </tr>
                            <tr>
							    <td class="right"> Controle Item Lote: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="ct_ItemLote" value="<?=$row->ct_ItemLote;?>"/></td>
                            	<td colspan="4" class="right">
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