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

	<title>Participantes Licitação</title>
</head>
<body>
    <? echo $menu; ?>
	<div class="col_12">
    	<div class="center"> <h6>Lista de Participantes de Licitação</h6></div>
        <div class="left col_4"><a class="button pop small green" href="<?php echo site_url('participantes_licita/novo'); ?>">Cadastrar novo</a></div>
        <div class="right col_7"> 
        	<ul class="button-bar">
              <li><a href="<?php echo site_url('participantes_licita/principal'); ?>">Principal</a></li>
              <li><a href="<?php echo site_url('participantes_licita/exportados'); ?>"> Exportados</a></li>
            </ul>
        </div>
        <br></br>
        <? if(isset($msg)) echo $msg; ?>
    </div>  
    <form action="<?php echo site_url('participantes_licita/exportar'); ?>" method="post">
    <div class="right col_13"><input class="button pop small green" type="submit" value="Remessa" class="left small"/></div>
    <div class="col_12">
        <table class="striped">
            <thead>
                <tr>
                    <th> Número do processo licitatório </th>
                    <th> CGC do participante         	</th>
                    <th> Tipo jurídico do participante	</th>
                    <th> Nome do participante           </th>
                    <th> Participante convidado         </th>
                    <th> Competência	                </th>
                    <th> </th>
                    <th class="center"> <input type="checkbox" name="todos" onClick="checkAll(this)"/> </th>
                </tr>
            </thead>
            <tbody>
              
            	<? 
					foreach($participantes_licitacao as $row){
						if(strlen(utf8_decode($row->cd_CicParticipante)) == 14) $Cic = substr($row->cd_CicParticipante,0,2).'.'.substr($row->cd_CicParticipante,2,3).'.'.substr($row->cd_CicParticipante,5,3).'/'.substr($row->cd_CicParticipante,8,4).'-'.substr($row->cd_CicParticipante,12,2);
						else $Cic = substr($row->cd_CicParticipante,0,3).'.'.substr($row->cd_CicParticipante,3,3).'.'.substr($row->cd_CicParticipante,6,3).'-'.substr($row->cd_CicParticipante,9,2);
						if($row->tp_Convidado == "S") $convidado = "Sim";
						else $convidado = "Não";
						echo '<tr> <td heigth="5"> </td> </tr>
                          	  <tr>
						  		   <td> '. $row->nu_ProcessoLicitatorio .' </td>
								   <td> '. $Cic						    .' </td>
								   <td> '. $row->descricao 				.' </td>
								   <td> '. $row->nm_Participante		.' </td>
								   <td> '. $convidado					.' </td>
								   <td> '. $row->nome			  	    .' </td>
								   <td class="center"> <a href="'.site_url("participantes_licita/editar/".$row->id).'"> <img src="../../img/edit.gif"/> </a></td>
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