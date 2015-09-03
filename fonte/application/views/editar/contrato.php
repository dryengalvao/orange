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
		<title>Editar contrato</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Editar contrato</h6></div>
        <div class="left"> <a href="<?php echo site_url('contratos/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('contratos/update'); ?>" method="post">
                      <? foreach($contrato as $row){?>
                        <table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td class="right"> Número do contrato ou aditivo: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="nu_contrato" value="<?=$row->nu_Contrato?>"/></td>
                                <td class="right"> Valor do contrato: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="vl_contrato" value="<?=$row->vl_Contrato?>" onKeyPress="return(MascaraMoeda(this,',',event))"/></td>
                                <td class="right"> Código da moeda utilizada: </td>
                                <td class="left"> 
                                	<select name="cd_moeda" style="width:150px;">
										<? 
											foreach ($tipo_moeda as $tm) {
                                				echo "<option value='" . $tm->codigo . "'";
												if(strcmp($tm->codigo, $row->cd_Moeda) == 0) echo ' selected="selected" ';
												echo "> " . $tm->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                        	</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Tipo do contrato: </td>
                                <td class="left" colspan="2"> 
                                	<select name="tp_contrato" style="width:400px;">
                                    	
										<? 
											foreach ($tipo_contrato as $tc) {
                                				echo "<option value='" . $tc->codigo . "'";
												if(strcmp($tc->codigo, $row->tp_Contrato) == 0) echo ' selected="selected" ';
												echo "> " . $tc->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right" colspan="2"> Número do processo licitatório que precedeu o contrato: </td>
                                <td class="left"> <input type="text" size="25" maxlength="18" name="nu_processoLicitatorio" value="<?=$row->nu_ProcessoLicitator?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>   
                                <td class="right"> Data de assinatura do contrato: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_assinaturaContrato" id="dt_assinaturaContrato" onkeypress="javascript:formatar(this);" value="<?=$row->dt_AssinaturaContrato?>"/></td>
                                <td class="right"> Data de vencimento do contrato: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_vencimentoContrato" onkeypress="javascript:formatar(this);" value="<?=$row->dt_VencimentoContrato?>"/></td>
                                
                            </tr>
							<tr> <td height="3"> </td> </tr>
							<tr>
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
								<td class="right"> Ano e Mês da ocorrência do ato(AAAAMM): </td>
                                <td class="left"> <input type="text" size="12" maxlength="6" name="competencia" value="<?=$row->competencia;?>"/></td>
							
                            	<td class="right"> Tipo jurídico do contratado: </td>
                                <td class="left"> 
                                	<select name="tp_pessoaContratado" style="width:150px;">
                                    	
										<? 
											foreach ($tipo_pessoa as $tp) {
                                				echo "<option value='" . $tp->codigo . "'";
												if(strcmp($tp->codigo, $row->tp_PessoaContratado) == 0) echo ' selected="selected" ';
												echo "> " . $tp->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
							</tr>
							<tr> <td height="3"> </td> </tr>
							<tr>
                            	<td class="right"> Nome do contratado: </td>
                                <td class="left" colspan="2"> <input type="text" size="60" maxlength="50" name="nm_contratado" value="<?=$row->nm_Contratado?>"/></td>
								<td class="right"> CGC ou CPF do contratado: </td>
                                <td class="left"> <input type="text" size="30" maxlength="14" name="cd_cicContratado" value="<?=$row->cd_CicContratado?>"/></td>
                            
							</tr>
                            <tr> <td height="3"> </td> </tr>
							<tr>
                            	<td class="right"> Descrição do objetivo do contrato: </td>
                                <td class="left" colspan="5"> <input type="text" size="140" maxlength="300" name="de_objetivoContrato" value="<?=$row->de_ObjetivoContrato?>"/></td>
                                
                            
                            </tr>
                            <tr> <td height="3"> </td> </tr>
							<tr>
                            	
								<td class="right"> Número do contrato superior: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="nu_ContratoSuperior" value="<?=$row->nu_ContratoSuperior;?>"/></td>
								<td class="right"> Tipo do Aditivo: </td>
                                <td class="left"> 
                                	<select name="tp_Aditivo" style="width:160px;" <?php if(form_error('tp_Aditivo')) echo 'class="error"';?>>
                                    	
										<? 
											foreach ($tipo_do_aditivo as $ta) {
												echo "<option value='" . $ta->codigo . "'";
												if(strcmp($ta->codigo, $row->tp_Aditivo) == 0) echo ' selected="selected" ';
												echo "> " . $ta->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
								<td class="right"> CNPJ da UG do contrato original(caso celebrado por outra UG): </td>
                                <td class="left"> <input type="text" size="25" maxlength="14" name="cnpj_UgContrato" value="<?=$row->cnpj_UgContrato;?>"/></td>
                            
                            </tr>
                            
                            <tr> <td height="3"> </td> </tr>
                            
                            <tr>
                            	<td class="right"> Número do diário oficial: </td>
                                <td class="left"> <input type="text" size="15" maxlength="6" name="nu_diarioOficial" value="<?=$row->nu_DiarioOficial?>"/></td>
                                <td class="right"> Data de publicação do contrato: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_publicacao" onkeypress="javascript:formatar(this);" value="<?=$row->dt_Publicacao?>"/></td>
                                <td class="right"> Recebe valor: </td>
                                <td class="left"> 
                                	<select name="st_RecebeValor" style="width:150px;">
                                    	<option value="N" <? if($row->st_RecebeValor == "N") echo ' selected="selected" ';?>> Não </option>
                                        <option value="S" <? if($row->st_RecebeValor == "S") echo ' selected="selected" ';?>> Sim </option>
                                    </select>
                                </td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade do INSS: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_certidaoINSS" value="<?=$row->nu_CertidaoINSS?>"/></td>
                                <td class="right"> Data do certificado de regularidade do INSS: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_certidaoINSS" onkeypress="javascript:formatar(this);" value="<?=$row->dt_CertidaoINSS?>"/></td>
                                <td class="right"> Data de validade do certificado de regularidade do INSS: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_validadeINSS" onkeypress="javascript:formatar(this);" value="<?=$row->dt_ValidadeINSS?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade do FGTS: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_certidaoFGTS" value="<?=$row->nu_CertidaoFGTS?>"/></td>
                                <td class="right"> Data do certificado de regularidade do FGTS: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_certidaoFGTS" onkeypress="javascript:formatar(this);" value="<?=$row->dt_CertidaoFGTS?>"/></td>
                                <td class="right"> Data de validade do certificado de regularidade do FGTS: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_validadeFGTS" onkeypress="javascript:formatar(this);" value="<?=$row->dt_ValidadeFGTS?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade da Secretaria da Fazenda Municipal: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_certidaoFazendaMunicipal" value="<?=$row->nu_CertidaoFazendaMunicipal?>"/></td>
                                <td class="right"> Data do certificado de regularidade da Secretaria da Fazenda Municipal: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_certidaoFazendaMunicipal" onkeypress="javascript:formatar(this);" value="<?=$row->dt_CertidaoFazendaMunicipal?>"/></td>
                                <td class="right"> Data de validade do certificado de regularidade da Secretaria da Fazenda Municipal: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_validadeFazendaMunicipal" onkeypress="javascript:formatar(this);" value="<?=$row->dt_ValidadeFazendaMunicipal?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade da Secretaria da Fazenda Estadual: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_certidaoFazendaEstadual" value="<?=$row->nu_CertidaoFazendaEstadual?>"/></td>
                                <td class="right"> Data do certificado de regularidade da Secretaria da Fazenda Estadual: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_certidaoFazendaEstadual" onkeypress="javascript:formatar(this);" value="<?=$row->dt_CertidaoFazendaEstadual?>"/></td>
                                <td class="right"> Data de validade do certificado de regularidade da Secretaria da Fazenda Estadual: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_validadeFazendaEstadual" onkeypress="javascript:formatar(this);" value="<?=$row->dt_ValidadeFazendaEstadual?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade da Secretaria da Fazenda Federal: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_certidaoFazendaFederal" value="<?=$row->nu_CertidaoFazendaFederal?>"/></td>
                                <td class="right"> Data do certificado de regularidade da Secretaria da Fazenda Federal: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_certidaoFazendaFederal" onkeypress="javascript:formatar(this);" value="<?=$row->dt_CertidaoFazendaFederal?>"/></td>
                                <td class="right"> Data de validade do certificado de regularidade da Secretaria da Fazenda Federal: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_validadeFazendaFederal" onkeypress="javascript:formatar(this);" value="<?=$row->dt_ValidadeFazendaFederal?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade - CNDT: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_certidaoCNDT" value="<?=$row->nu_CertidaoCNDT?>"/></td>
                                <td class="right"> Data do certificado de regularidade - CNDT: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_certidaoCNDT" onkeypress="javascript:formatar(this);" value="<?=$row->dt_certidaoCNDT?>"/></td>
                                <td class="right"> Data de validade do certificado de regularidade - CNDT: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_validadeCNDT" onkeypress="javascript:formatar(this);" value="<?=$row->dt_validadeCNDT?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade - Outras: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_certidaoOutras" value="<?=$row->nu_CertidaoOutras?>"/></td>
                                <td class="right"> Data do certificado de regularidade - Outras: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_certidaoOutras" onkeypress="javascript:formatar(this);" value="<?=$row->dt_CertidaoOutras?>"/></td>
                                <td class="right"> Data de validade do certificado de regularidade - Outras: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_validadeOutras" onkeypress="javascript:formatar(this);" value="<?=$row->dt_ValidadeOutras?>"/></td>
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