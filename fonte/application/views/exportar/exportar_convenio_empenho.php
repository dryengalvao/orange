<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=CONVENIOEMPENHO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($convenio_empenho as $row){
		  $empenho = $row->nu_Convenio;
		  if(strlen(utf8_decode($row->nu_Convenio)) <= 16){
			  $max = strlen(utf8_decode($row->nu_Convenio));
			  for($i = $max;$i<16;$i++) $empenho.=" ";
		  }
		  $empenho.= $row->nu_NotaEmpenho;
		  if(strlen(utf8_decode($row->nu_NotaEmpenho)) <= 10){
			  $max = strlen(utf8_decode($row->nu_NotaEmpenho));
			  for($i = $max;$i<10;$i++) $empenho.=" ";
		  }
		  $empenho.= $row->ano_Empenho;
		  if(strlen(utf8_decode($row->cd_UnidadeOrcamentaria)) <= 6){
			  $max = strlen(utf8_decode($row->cd_UnidadeOrcamentaria));
			  for($i = $max;$i<6;$i++) $empenho.=0;
		  }
		  $empenho.=$row->cd_UnidadeOrcamentaria.Chr(13).Chr(10);
		  echo $empenho;
	  }
?>