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
		<title>Nova Nota</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Nova nota de empenho</h6></div>
        <div class="left"> <a href="<?php echo site_url('contrato_empenho/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('contrato_empenho/inserir'); ?>" method="post">
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td class="right"> Número do contrato: </td>
                                <td class="left"> 
                                	<select name="nu_Contrato" style="width:150px;" <?php if(form_error('nu_Contrato')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($contratos as $row) {
                                				echo "<option value=" . $row->id . "> " . $row->nu_Contrato . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> Ano do empenho: </td>
                                <td class="left"> <input type="text" size="10" maxlength="4" name="ano_Empenho" value="<?php echo set_value('ano_Empenho');?>"<?php if(form_error('ano_Empenho')) echo 'class="error"';?>/></td>
                            	<td class="right"> Código da unidade orçamentária: </td>
                                <td class="left"><input type="text" size="10" maxlength="6" name="cd_UnidadeOrcamentaria" value="<?php echo set_value('cd_UnidadeOrcamentaria');?>"<?php if(form_error('cd_UnidadeOrcamentaria')) echo 'class="error"';?>/></td>
                        	</tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                            	<td class="right"> Número da nota de empenho 1: </td>
                                <td class="left"> <input type="text" size="30" maxlength="10" name="nu_NotaEmpenho" value="<?php echo set_value('nu_NotaEmpenho');?>"<?php if(form_error('nu_NotaEmpenho')) echo 'class="error"';?>/></td>
                                <td class="right"> Número da nota de empenho 2: </td>
                                <td class="left"> <input type="text" size="30" maxlength="10" name="nu_NotaEmpenho2" value="<?php echo set_value('nu_NotaEmpenho2');?>"<?php if(form_error('nu_NotaEmpenho2')) echo 'class="error"';?>/></td>
                                <td class="right"> Número da nota de empenho 3: </td>
                                <td class="left"> <input type="text" size="30" maxlength="10" name="nu_NotaEmpenho3" value="<?php echo set_value('nu_NotaEmpenho3');?>"<?php if(form_error('nu_NotaEmpenho3')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>   
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