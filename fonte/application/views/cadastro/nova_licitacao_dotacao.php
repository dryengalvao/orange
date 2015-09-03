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
		<title>Nova publicação</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Nova publicação</h6></div>
        <div class="left"> <a href="<?php echo site_url('licitacao_dotacao/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('licitacao_dotacao/inserir'); ?>" method="post">
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
                                <td class="right"> Código da categoria econômica: </td>
                                <td class="left"> <input type="text" size="5" maxlength="1" name="cd_CategoriaEconomica" value="<?php echo set_value('cd_CategoriaEconomica');?>"<?php if(form_error('cd_CategoriaEconomica')) echo 'class="error"';?>/></td>
                                <td class="right"> Código do grupo da natureza: </td>
                                <td class="left"> <input type="text" size="5" maxlength="1" name="cd_GrupoNatureza" value="<?php echo set_value('cd_GrupoNatureza');?>"<?php if(form_error('cd_GrupoNatureza')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                                <td class="right"> Código da modalidade da aplicação: </td>
                                <td class="left"><input type="text" size="5" maxlength="2" name="cd_ModalidadeAplicacao" value="<?php echo set_value('cd_ModalidadeAplicacao');?>"<?php if(form_error('cd_ModalidadeAplicacao')) echo 'class="error"';?>/></td>
                                <td class="right"> Código do elemento: </td>
                                <td class="left"> <input type="text" size="5" maxlength="2" name="cd_Elemento" value="<?php echo set_value('cd_Elemento');?>"<?php if(form_error('cd_Elemento')) echo 'class="error"';?>/></td>
                                <td class="right"> Código da unidade orçamentária: </td>
                                <td class="left"> <input type="text" size="10" maxlength="6" name="cd_UnidadeOrcamentaria" value="<?php echo set_value('cd_UnidadeOrcamentaria');?>"<?php if(form_error('cd_UnidadeOrcamentaria')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                                <td class="right"> Código da fonte de recurso: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="cd_FonteRecurso" value="<?php echo set_value('cd_FonteRecurso');?>"<?php if(form_error('cd_FonteRecurso')) echo 'class="error"';?>/></td>
                                <td class="right"> Número da ação de governo: </td>
                                <td class="left"> <input type="text" size="15" maxlength="7" name="nu_AcaoGoverno" value="<?php echo set_value('nu_AcaoGoverno');?>"<?php if(form_error('nu_AcaoGoverno')) echo 'class="error"';?>/></td>
                                <td class="right"> Código da sub-função: </td>
                                <td class="left"> <input type="text" size="6" maxlength="3" name="cd_SubFuncao" value="<?php echo set_value('cd_SubFuncao');?>"<?php if(form_error('cd_SubFuncao')) echo 'class="error"';?>/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                                <td class="right"> Código da função: </td>
                                <td class="left"> <input type="text" size="5" maxlength="2" name="cd_Funcao" value="<?php echo set_value('cd_Funcao');?>"<?php if(form_error('cd_Funcao')) echo 'class="error"';?>/></td>
                                <td class="right"> Código do programa: </td>
                                <td class="left"> <input type="text" size="10" maxlength="4" name="cd_Programa" value="<?php echo set_value('cd_Programa');?>"<?php if(form_error('cd_Programa')) echo 'class="error"';?>/></td>
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