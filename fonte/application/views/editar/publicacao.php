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
        </script>
		<title>Editar publicação</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Editar publicação</h6></div>
        <div class="left"> <a href="<?php echo site_url('publicacoes/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('publicacoes/update'); ?>" method="post">
                      <? foreach($publicacao as $row){?>
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
                                <td class="right"> Data de publicação do edital nos meios de comunicação: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="dt_PublicacaoEdital" onkeypress="javascript:formatar(this);" value="<?=$row->dt_PublicacaoEdital;?>"/></td>
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
                            	<td class="right"> Sequencial de publicação na mesma data: </td>
                                <td class="left"><input type="text" size="5" maxlength="2" name="nu_SequencialPublicacao" value="<?=$row->nu_SequencialPublicacao;?>"/></td>
                        	
                            	<td class="right"> Nome do veículo de comunicação: </td>
                                <td class="left" colspan="2"> <input type="text" size="60" maxlength="50" name="nm_veiculoComunicacao" value="<?=$row->nm_veiculoComunicacao;?>"/></td>                            
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