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
		<title>Novo participante</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Novo participante de convênio</h6></div>
        <div class="left"> <a href="<?php echo site_url('participantes_convenio/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('participantes_convenio/inserir'); ?>" method="post">
                    	<table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="right"> Número do convênio: </td>
                                <td class="left"> 
                                 	<select name="nu_Convenio" style="width:150px;" <?php if(form_error('nu_Convenio')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($convenios as $row) {
                                				echo "<option value=" . $row->id . "> " . $row->nu_Convenio . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> Tipo jurídico do participante: </td>
                                <td class="left"> 
                                	<select name="tp_PessoaParticipante" style="width:150px;" <?php if(form_error('tp_PessoaParticipante')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($tipo_pessoa as $row) {
                                				echo "<option value=" . $row->codigo . "> " . $row->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> Esfera do conveniado: </td>
                                <td class="left"> 
                                	<select name="tp_EsferaConvenio" style="width:150px;" <?php if(form_error('tp_EsferaConvenio')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($esfera_conveniado as $row) {
                                				echo "<option value=" . $row->codigo . "> " . $row->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                        	</tr>
                            <tr> <td height="3"> </td> </tr>
                        	<tr>
                            	<td class="right"> Nome do participante do convênio: </td>
                                <td class="left" colspan="2"> <input type="text" size="60" maxlength="50" name="nm_Participante" value="<?php echo set_value('nm_Participante');?>"<?php if(form_error('nm_Participante')) echo 'class="error"';?>/></td>
                                <td class="right"> CGC ou CPF do participante do convênio: </td>
                                <td class="left"> <input type="text" size="30" maxlength="14" name="cd_CicParticipante" value="<?php echo set_value('cd_CicParticipante');?>"<?php if(form_error('cd_CicParticipante')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                                <td class="right"> Valor de participação no convênio: </td>
                                <td class="left"> <input type="text" size="25" maxlength="16" name="vl_Participacao" value="<?php echo set_value('vl_Participacao');?>"<?php if(form_error('vl_Participacao')) echo 'class="error"';?> onKeyPress="return(MascaraMoeda(this,',',event))"/></td>
                                <td class="right"> Percentual de participação no convênio: </td>
                                <td class="left"> <input type="text" size="15" maxlength="7" name="vl_PercentualParticipacao" value="<?php echo set_value('vl_PercentualParticipacao');?>"<?php if(form_error('vl_PercentualParticipacao')) echo 'class="error"';?> onKeyPress="return(MascaraMoeda(this,',',event))"/> %</td>
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
                            	<td class="right"> Número do certificado de regularidade do INSS: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_CertidaoCASAN" value="<?php echo set_value('nu_CertidaoCASAN');?>"<?php if(form_error('nu_CertidaoCASAN')) echo 'class="error"';?>/></td>
                                <td class="right"> Data do certificado de regularidade do INSS: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_CertidaoCASAN" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_CertidaoCASAN');?>"<?php if(form_error('dt_CertidaoCASAN')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de validade do certificado de regularidade do INSS: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_ValidadeCertidaoCASAN" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_ValidadeCertidaoCASAN');?>"<?php if(form_error('dt_ValidadeCertidaoCASAN')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade do FGTS: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_CertidaoCELESC" value="<?php echo set_value('nu_CertidaoCELESC');?>"<?php if(form_error('nu_CertidaoCELESC')) echo 'class="error"';?>/></td>
                                <td class="right"> Data do certificado de regularidade do FGTS: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_CertidaoCELESC" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_CertidaoCELESC');?>"<?php if(form_error('dt_CertidaoCELESC')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de validade do certificado de regularidade do FGTS: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_ValidadeCertidaoCELESC" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_ValidadeCertidaoCELESC');?>"<?php if(form_error('dt_ValidadeCertidaoCELESC')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade da Secretaria da Fazenda Municipal: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_CertidaoFazendaMunicipal" value="<?php echo set_value('nu_CertidaoFazendaMunicipal');?>"<?php if(form_error('nu_CertidaoFazendaMunicipal')) echo 'class="error"';?>/></td>
                                <td class="right"> Data do certificado de regularidade da Secretaria da Fazenda Municipal: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_CertidaoFazendaMunicipal" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_CertidaoFazendaMunicipal');?>"<?php if(form_error('dt_CertidaoFazendaMunicipal')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de validade do certificado de regularidade da Secretaria da Fazenda Municipal: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_ValidadeFazendaMunicipal" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_ValidadeFazendaMunicipal');?>"<?php if(form_error('dt_ValidadeFazendaMunicipal')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade da Secretaria da Fazenda Estadual: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_CertidaoIPESC" value="<?php echo set_value('nu_CertidaoIPESC');?>"<?php if(form_error('nu_CertidaoIPESC')) echo 'class="error"';?>/></td>
                                <td class="right"> Data do certificado de regularidade da Secretaria da Fazenda Estadual: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_CertidaoIPESC" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_CertidaoIPESC');?>"<?php if(form_error('dt_CertidaoIPESC')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de validade do certificado de regularidade da Secretaria da Fazenda Estadual: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_ValidadeCertidaoIPESC" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_ValidadeCertidaoIPESC');?>"<?php if(form_error('dt_ValidadeCertidaoIPESC')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade da Secretaria da Fazenda Federal: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_CertidaoFazendaFederal" value="<?php echo set_value('nu_CertidaoFazendaFederal');?>"<?php if(form_error('nu_CertidaoFazendaFederal')) echo 'class="error"';?>/></td>
                                <td class="right"> Data do certificado de regularidade da Secretaria da Fazenda Federal: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_CertidaoFazendaFederal" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_CertidaoFazendaFederal');?>"<?php if(form_error('dt_CertidaoFazendaFederal')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de validade do certificado de regularidade da Secretaria da Fazenda Federal: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_ValidadeFazendaFederal" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_ValidadeFazendaFederal');?>"<?php if(form_error('dt_ValidadeFazendaFederal')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade - CNDT: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_CertidaoCNDT" value="<?php echo set_value('nu_CertidaoCNDT');?>"<?php if(form_error('nu_CertidaoCNDT')) echo 'class="error"';?>/></td>
                                <td class="right"> Data do certificado de regularidade - CNDT: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_certidaoCNDT" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_certidaoCNDT');?>"<?php if(form_error('dt_certidaoCNDT')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de validade do certificado de regularidade - CNDT: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_validadeCNDT" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_validadeCNDT');?>"<?php if(form_error('dt_validadeCNDT')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número do certificado de regularidade - Outras: </td>
                                <td class="left"> <input type="text" size="30" maxlength="60" name="nu_CertidaoOutras" value="<?php echo set_value('nu_CertidaoOutras');?>"<?php if(form_error('nu_CertidaoOutras')) echo 'class="error"';?>/></td>
                                <td class="right"> Data do certificado de regularidade - Outras: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_CertidaoOutras" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_CertidaoOutras');?>"<?php if(form_error('dt_CertidaoOutras')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de validade do certificado de regularidade - Outras: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_ValidadeOutras" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_ValidadeOutras');?>"<?php if(form_error('dt_ValidadeOutras')) echo 'class="error"';?>/></td>
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