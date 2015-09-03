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
		<title>Editar Item</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Editar item de licitação</h6></div>
        <div class="left"> <a href="<?php echo site_url('itens_licitacao/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('itens_licitacao/update'); ?>" method="post">
                      <? foreach($iten_licitacao as $row){?>
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td class="right"> Número do processo licitatório: </td>
                                <td class="left"> 
                                	<select name="nu_ProcessoLicitatorio" style="width:150px;">
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
                                <td class="right"> Quantidade de itens solicitados na licitação: </td>
                                <td class="left"> <input type="text" size="20" maxlength="16" name="qt_ItemLicitado" value="<?=$row->qt_ItemLicitado;?>" onKeyPress="return(MascaraMoeda(this,',',event))"/></td>
                        	</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Data da assinatura da homologação: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_HomologacaoItem" id="dt_HomologacaoItem" onkeypress="javascript:formatar(this);" value="<?=$row->dt_HomologacaoItem;?>"/></td>
                                <td class="right"> Data da publicação da homologação: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_PublicacaoHomologacao" onkeypress="javascript:formatar(this);" value="<?=$row->dt_PublicacaoHomologacao;?>"/></td>
								<td class="right"> Controle Item Lote: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="ct_ItemLote" value="<?=$row->ct_ItemLote;?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>   
                                <td class="right"> Descrição do objeto da licitação: </td>
                                <td class="left" colspan="5"> <input type="text" size="160" maxlength="300" name="de_ItemLicitacao" value="<?=$row->de_ItemLicitacao;?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Unidade de medida: </td>
                                <td class="left"> <input type="text" size="35" maxlength="30" name="un_MedidaItem" id="un_MedidaItem" value="<?=$row->un_MedidaItem;?>"/></td>
                                <td class="right"> Status do item: </td>
                                <td class="left"> 
                                	<select name="st_Item" style="width:150px;">
                                    	<option value=""> </option>
										<? 
											foreach ($status_item_licitacao as $si) {
                                				echo "<option value='" . $si->codigo . "'";
												if(strcmp($si->codigo, $row->st_Item) == 0) echo ' selected="selected" ';
												echo "> " . $si->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> Mês da competência: </td>
                                <td class="left"> 
                                	<select name="mes" style="width:150px;">
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