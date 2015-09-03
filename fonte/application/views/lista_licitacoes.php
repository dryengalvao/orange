<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../../css/kickstart.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../js/kickstart.js" type="text/javascript"></script>
		<script>
			  function checkAll(o){
				  var boxes = document.getElementsByTagName("input");
				  for (var x=0;x<boxes.length;x++){
					  var obj = boxes[x];
					  if (obj.type == "checkbox"){
						  if (obj.name!="chkAll") obj.checked = o.checked;
					  }
				  }
			  }
		</script>

	<title>Licitações</title>
</head>
<body>
    <? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Lista de Licitações</h6></div>
        <div class="left col_4"><a class="button pop small green" href="<?php echo site_url('licitacoes/novo'); ?>">Cadastrar novo</a></div>
        <div class="right col_7"> 
        	<ul class="button-bar">
              <li><a href="<?php echo site_url('licitacoes/principal'); ?>">Principal</a></li>
              <li><a href="<?php echo site_url('licitacoes/exportados'); ?>"> Exportados</a></li>
            </ul>
        </div>
        <br></br>
        <? if(isset($msg)) echo $msg; ?>
    </div>  
    <form action="<?php echo site_url('licitacoes/exportar'); ?>" method="post">
    <div class="right col_13"><input class="button pop small green" type="submit" value="Remessa" class="left small"/></div>
    <div class="col_12">
        <table class="striped">
            <thead>
                <tr>
                    <th> Número do processo licitatório   </th>
                    <th> Valor total previsto         	  </th>
                    <th> Descrição do objeto da licitação </th>
                    <th> Número do edital                 </th>
                    <th> Tipo da licitação                </th>
                    <th> Competência	                  </th>
                    <th> </th>
                    <th class="center"> <input type="checkbox" name="todos" onClick="checkAll(this)"/> </th>
                </tr>
            </thead>
            <tbody>
              
            	<? 
					foreach($licitacoes as $row){
						if($row->tp_Licitacao == "I") $tp_licitacao = "Item";
						else $tp_licitacao = "Lote";
						echo '<tr> <td heigth="5"> </td> </tr>
                          	  <tr>
						  		   <td> '. $row->nu_ProcessoLicitatorio .' </td>
								   <td> '. $row->vl_TotalPrevisto       .' </td>
								   <td> '. $row->de_ObjetoLicitacao 	.' </td>
								   <td> '. $row->nu_Edital		  		.' </td>
								   <td> '. $tp_licitacao		  		.' </td>
								   <td> '. $row->nome			  	  	.' </td>
								   <td class="center"> <a href="'.site_url("licitacoes/editar/".$row->id).'"> <img src="../../img/edit.gif"/> </a></td>
								   <td class="center"> <input type="checkbox" name="id[]" value="'.$row->id.'"> </td>
							  </tr>';
					}
				?>
              
            </tbody>
    	</table>
    </form>
	</div>
</body>
</html>