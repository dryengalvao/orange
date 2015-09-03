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
        </script>
		<title>Nova certidão</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Nova certidão</h6></div>
        <div class="left"> <a href="<?php echo site_url('certidoes/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('certidoes/inserir'); ?>" method="post">
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td class="right"> Número do processo licitatório: </td>
                                <td class="left"> 
                                	<select name="nu_ProcessoLicitatorio" style="width:150px;" <?php if(form_error('nu_ProcessoLicitatorio')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($licitacoes as $row) {
                                				echo "<option value=" . $row->id . "> " . $row->nu_ProcessoLicitatorio . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> CGC ou CPF do participante: </td>
                                <td class="left"> <input type="text" size="30" maxlength="14" name="cd_CicParticipante" value="<?php echo set_value('cd_CicParticipante');?>"<?php if(form_error('cd_CicParticipante')) echo 'class="error"';?>/></td>
                                <td class="right"> Tipo de pessoa que apresentou a certidão: </td>
                                <td class="left"> 
                                	<select name="tp_Pessoa" style="width:150px;" <?php if(form_error('tp_Pessoa')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($tipo_pessoa as $row) {
                                				echo "<option value=" . $row->codigo . "> " . $row->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                        	</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Tipo de certidão apresentada: </td>
                                <td class="left"> 
                                	<select name="tp_Certidao" style="width:150px;" <?php if(form_error('tp_Certidao')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($tipo_certidao as $row) {
                                				echo "<option value=" . $row->codigo . "> " . $row->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> Número da certidão: </td>
                                <td class="left"> <input type="text" size="35" maxlength="60" name="nu_Certidao" value="<?php echo set_value('nu_Certidao');?>"<?php if(form_error('nu_Certidao')) echo 'class="error"';?>/></td>
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
                                <td class="right"> Data de emissão da certidão: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_EmissaoCertidao" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_EmissaoCertidao');?>"<?php if(form_error('dt_EmissaoCertidao')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de validade da certidão: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_ValidadeCertidao" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_ValidadeCertidao');?>"<?php if(form_error('dt_ValidadeCertidao')) echo 'class="error"';?>/></td>
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