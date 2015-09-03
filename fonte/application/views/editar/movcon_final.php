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
		
	
        </script>
		<title>Editar Movimento</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Editar movimento final</h6></div>
        <div class="left"> <a href="<?php echo site_url('movcon_final/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('movcon_final/update'); ?>" method="post">
					  <? foreach($movcon_final as $row){?>
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td class="right"> Código da conta contábil: </td>
                                <td class="left"> 
                                	<select name="id_conta" style="width:210px;">
                                    	<? 
											foreach ($contas as $lc) {
                                				echo "<option value='" . $lc->id . "'";
												if(strcmp($lc->id, $row->id_conta) == 0) echo ' selected="selected" ';
												echo "> " . $lc->cd_conta . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> Tipo de movimento informado: </td>
                                <td class="left"> 
                                	<select name="tp_movimento" style="width:140px;">
                                    	<? 
											foreach ($tipo_de_movimento as $tc) {
                                				echo "<option value='" . $tc->codigo . "'";
												if(strcmp($tc->codigo, $row->tp_movimento) == 0) echo ' selected="selected" ';
												echo "> " . $tc->descricao . " </option>";
                            				}
										?>
                            		</select>
                                </td>
								<td class="right"> Mês da competência: </td>
                                <td class="left"> 
                                	<select name="mes" style="width:140px;">
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
                            	<td class="right"> Valor do movimento a débito no mês informado: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="vl_movDebito" value="<?=$row->vl_movDebito;?>" /></td>
                                <td class="right"> Valor do movimento a crédito no mês informado: </td>
                                <td class="left"> <input type="text" size="30" maxlength="16" name="vl_movCredito" value="<?=$row->vl_movCredito;?>"/></td>
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
                 </td>
              </tr>
          </thead>
        </table>
    
    </div>
</body>
</html>