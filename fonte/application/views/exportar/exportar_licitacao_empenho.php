<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=LICITACAOEMPENHO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($licitacao_empenho as $row){
		  $empenho = $row->nu_ProcessoLicitatorio;
		  if(strlen(utf8_decode($row->nu_ProcessoLicitatorio)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoLicitatorio));
			  for($i = $max;$i<18;$i++) $empenho.=" ";
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