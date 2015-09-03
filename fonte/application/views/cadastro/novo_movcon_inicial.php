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
	
        </script>
		<title>Novo Movimento</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Novo movimento inicial</h6></div>
        <div class="left"> <a href="<?php echo site_url('movcon_inicial/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('movcon_inicial/inserir'); ?>" method="post">
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td class="right"> Código da conta contábil: </td>
                                <td class="left"> 
                                	<select name="id_conta" style="width:210px;" <?php if(form_error('id_conta')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($contas as $row) {
                                				echo "<option value=" . $row->id . "> " . $row->cd_conta . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> Tipo de movimento informado: </td>
                                <td class="left"> 
                                	<select name="tp_movimento" style="width:140px;" <?php if(form_error('tp_movimento')) echo 'class="error"';?>>
                                    	<option value=""> </option>
										<? 
											foreach ($tipo_de_movimento as $row) {
                                				echo "<option value=" . $row->codigo . "> " . $row->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
								<td class="right"> Mês da competência: </td>
                                <td class="left"> 
                                	<select name="mes" style="width:140px;" <?php if(form_error('mes')) echo 'class="error"';?>>
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
                            	<td class="right"> Valor do movimento a débito no mês informado: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="vl_movDebito" value="<?php echo set_value('vl_movDebito');?>"<?php if(form_error('vl_movDebito')) echo 'class="error"';?> /></td>
                                <td class="right"> Valor do movimento a crédito no mês informado: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="vl_movCredito" value="<?php echo set_value('vl_movCredito');?>"<?php if(form_error('vl_movCredito')) echo 'class="error"';?> /></td>
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