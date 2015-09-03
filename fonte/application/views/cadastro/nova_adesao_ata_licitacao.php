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
		<title>Nova adesão</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Nova adesão</h6></div>
        <div class="left"> <a href="<?php echo site_url('adesao_ata_licitacao/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('adesao_ata_licitacao/inserir'); ?>" method="post">
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td class="right"> Número do processo de compra: </td>
                                <td class="left"> <input type="text" size="30" maxlength="18" name="nu_ProcessoCompra" value="<?php echo set_value('nu_ProcessoCompra');?>"<?php if(form_error('nu_ProcessoCompra')) echo 'class="error"';?>/></td>
                                <td class="right"> Número da ata: </td>
                                <td class="left"> <input type="text" size="30" maxlength="18" name="nu_Ata" value="<?php echo set_value('nu_Ata');?>"<?php if(form_error('nu_Ata')) echo 'class="error"';?> /></td>
                                <td class="right"> Número do processo licitatório que originou a ata: </td>
                                <td class="left"> <input type="text" size="30" maxlength="18" name="nu_ProcessoLicitatorio" value="<?php echo set_value('nu_ProcessoLicitatorio');?>"<?php if(form_error('nu_ProcessoLicitatorio')) echo 'class="error"';?> /></td>
                        	</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Tipo da Adesão: </td>
                                <td class="left"> 
                                	<select name="tp_Adesao" style="width:250px;" <?php if(form_error('tp_Adesao')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($tipo_adesao as $row) {
                                				echo "<option value=" . $row->codigo . "> " . $row->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> Data de adesão: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_Adesao" value="<?php echo set_value('dt_Adesao');?>"<?php if(form_error('dt_Adesao')) echo 'class="error"';?> onkeypress="javascript:formatar(this);" value="<?php echo set_value('nu_Dirario');?>"/></td>
                                <td class="right"> Data da validade da ata: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_Validade" value="<?php echo set_value('dt_Validade');?>"<?php if(form_error('dt_Validade')) echo 'class="error"';?> onkeypress="javascript:formatar(this);" value="<?php echo set_value('nu_Dirario');?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>   
                                <td class="right"> Número do Diário Oficial da ata: </td>
                                <td class="left"> <input type="text" size="20" maxlength="6" name="nu_Dirario" value="<?php echo set_value('nu_Dirario');?>" <?php if(form_error('nu_Dirario')) echo 'class="error"';?>/></td>
                                <td class="right"> Data de publicação da ata: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_Publicacao" onkeypress="javascript:formatar(this);" value="<?php echo set_value('dt_Publicacao');?>" <?php if(form_error('dt_Publicacao')) echo 'class="error"';?>/></td>
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