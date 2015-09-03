<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../../../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../../../css/kickstart.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="../../../js/jquery-1_8_2.js" type="text/javascript"></script>
		<script src="../../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../../js/kickstart.js" type="text/javascript"></script>
        <style>
			td.error{color:red;}
			select.error{border:1px solid red;}
		</style>
		<title>Editar publicação</title>
</head>

<body>
	<? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Editar publicação</h6></div>
        <div class="left"> <a href="<?php echo site_url('licitacao_dotacao/principal'); ?>" style="text-decoration:none">Voltar</a></div>
    	</br>
        <table width="100%" cellpadding="0" cellspacing="0" class="sortable">
          <thead>
              <tr>
                 <td>
                 	<form action="<?php echo site_url('licitacao_dotacao/update'); ?>" method="post">
                       <? foreach($licitacao_dotacao as $row){?>
                    	<table width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td class="right"> Número do processo licitatório: </td>
                                <td class="left"> 
                                	<select name="nu_ProcessoLicitatorio" style="width:150px;" <?php if(form_error('nu_ProcessoLicitatorio')) echo 'class="error"';?>>
										<? 
											foreach ($licitacoes as $lc) {
                                				echo "<option value='" . $lc->id . "'";
												if(strcmp($lc->id, $row->id_licitacao) == 0) echo ' selected="selected" ';
												echo "> " . $lc->nu_ProcessoLicitatorio . " </option>";
                            				}
										?>
                            		</select>
                                </td>
                                <td class="right"> Código da categoria econômica: </td>
                                <td class="left"> <input type="text" size="5" maxlength="1" name="cd_CategoriaEconomica" value="<?=$row->cd_CategoriaEconomica;?>"/></td>
                                <td class="right"> Código do grupo da natureza: </td>
                                <td class="left"> <input type="text" size="5" maxlength="1" name="cd_GrupoNatureza" value="<?=$row->cd_GrupoNatureza;?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                                <td class="right"> Código da modalidade da aplicação: </td>
                                <td class="left"><input type="text" size="5" maxlength="2" name="cd_ModalidadeAplicacao" value="<?=$row->cd_ModalidadeAplicacao;?>"/></td>
                                <td class="right"> Código do elemento: </td>
                                <td class="left"> <input type="text" size="5" maxlength="2" name="cd_Elemento" value="<?=$row->cd_Elemento;?>"/></td>
                                <td class="right"> Código da unidade orçamentária: </td>
                                <td class="left"> <input type="text" size="10" maxlength="6" name="cd_UnidadeOrcamentaria" value="<?=$row->cd_UnidadeOrcamentaria;?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                                <td class="right"> Código da fonte de recurso: </td>
                                <td class="left"> <input type="text" size="20" maxlength="10" name="cd_FonteRecurso" value="<?=$row->cd_FonteRecurso;?>"/></td>
                                <td class="right"> Número da ação de governo: </td>
                                <td class="left"> <input type="text" size="15" maxlength="7" name="nu_AcaoGoverno" value="<?=$row->nu_AcaoGoverno;?>"/></td>
                                <td class="right"> Código da sub-função: </td>
                                <td class="left"> <input type="text" size="6" maxlength="3" name="cd_SubFuncao" value="<?=$row->cd_SubFuncao;?>"/></td>
                            </tr>
                            <tr> <td height="3"> </td> </tr>
                            <tr>
                                <td class="right"> Código da função: </td>
                                <td class="left"> <input type="text" size="5" maxlength="2" name="cd_Funcao" value="<?=$row->cd_Funcao;?>"/></td>
                                <td class="right"> Código do programa: </td>
                                <td class="left"> <input type="text" size="10" maxlength="4" name="cd_Programa" value="<?=$row->cd_Programa;?>"/></td>
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