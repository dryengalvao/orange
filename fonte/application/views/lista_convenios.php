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

	<title>Convenios</title>
</head>
<body>
    <? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Lista de Convênios</h6></div>
        <div class="left col_4"><a class="button pop small green" href="<?php echo site_url('convenios/novo'); ?>">Cadastrar novo</a></div>
        <div class="right col_7"> 
        	<ul class="button-bar">
              <li><a href="<?php echo site_url('convenios/principal'); ?>">p/ Exportar</a></li>
              <li><a href="<?php echo site_url('convenios/exportados'); ?>"> Exportados</a></li>
            </ul>
        </div>
        <br></br>
        <? if(isset($msg)) echo $msg; ?>
    </div>  
    <form action="<?php echo site_url('convenios/exportar'); ?>" method="post">
    <div class="right col_13"><input type="submit" class="button pop small green" value="Remessa" class="left small"/></div>
    <div class="col_12">
        <table class="striped">
            <thead>
                <tr>
                    <th> Número do Convênio        		</th>
                    <th> Valor do Convênio         		</th>
                    <th> Data de assinatura				</th>
                    <th> Descrição do objeto do convênio</th>
                    <th> Tipo do Convênio               </th>
                    <th> Competência	                </th>
                    <th> </th>
                    <th class="center"> <input type="checkbox" name="todos" onClick="checkAll(this)"/> </th>
                </tr>
            </thead>
            <tbody>
              
            	<? 
					foreach($convenios as $row){
						$ano = substr($row->dt_AssinaturaConvenio,0,4);
						$mes = substr($row->dt_AssinaturaConvenio,4,2);
						$dia = substr($row->dt_AssinaturaConvenio,6,2);
						echo '<tr> <td heigth="5"> </td> </tr>
                          	  <tr>
						  		   <td> '. $row->nu_Convenio 		 .' </td>
								   <td> '. $row->vl_Convenio         .' </td>
								   <td> '. $dia.'/'.$mes.'/'.$ano	 .' </td>
								   <td> '. $row->de_ObjetivoConvenio .' </td>
								   <td> '. $row->descricao		  	 .' </td>
								   <td> '. $row->nome			  	 .' </td>
								   <td class="center"> <a href="'.site_url("convenios/editar/".$row->id).'"> <img src="../../img/edit.gif"/> </a></td>
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