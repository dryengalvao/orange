<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=CONVENIO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($convenios as $row){
		  $convenio = $row->st_RecebeValor.$row->nu_Convenio;
		  if(strlen(utf8_decode($row->nu_Convenio)) <= 16){
			  $max = strlen(utf8_decode($row->nu_Convenio));
			  for($i = $max;$i<16;$i++) $convenio.=" ";
		  }
		  if(strlen(utf8_decode($row->vl_Convenio)) <= 16){
			  $max = strlen(utf8_decode($row->vl_Convenio));
			  for($i = $max;$i<16;$i++) $convenio.=0;
		  }
		  $convenio.= $row->vl_Convenio.$row->cd_MoedaConvenio.$row->dt_AssinaturaConvenio.$row->de_ObjetivoConvenio;
		  if(strlen(utf8_decode($row->de_ObjetivoConvenio)) <= 300){
			  $max = strlen(utf8_decode($row->de_ObjetivoConvenio));
			  for($i = $max;$i<300;$i++) $convenio.=" ";
		  }
		  $convenio.=$row->dt_VencimentoConvenio;
		  if(strlen(utf8_decode($row->nu_LeiAutorizativa)) <= 6){
			  $max = strlen(utf8_decode($row->nu_LeiAutorizativa));
			  for($i = $max;$i<6;$i++) $convenio.=0;
		  }
		  $convenio.=$row->nu_LeiAutorizativa.$row->dt_LeiAutorizativa;
		  if(strlen(utf8_decode($row->nu_DiarioOficial)) <= 6){
			  $max = strlen(utf8_decode($row->nu_DiarioOficial));
			  for($i = $max;$i<6;$i++) $convenio.=0;
		  }
		  $convenio.=$row->nu_DiarioOficial.$row->dt_PublicacaoConvenio.$row->tp_Convenio.Chr(13).Chr(10);
		  echo $convenio;
	  }
?>
