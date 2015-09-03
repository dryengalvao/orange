<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=ADESAOATALICITACAO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($adesao_ata_licitacao as $row){
		  $adesao = $row->nu_ProcessoCompra;
		  if(strlen(utf8_decode($row->nu_ProcessoCompra)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoCompra));
			  for($i = $max;$i<18;$i++) $adesao.=" ";
		  }
		  $adesao.= $row->nu_Ata;
		  if(strlen(utf8_decode($row->nu_Ata)) <= 18){
			  $max = strlen(utf8_decode($row->nu_Ata));
			  for($i = $max;$i<18;$i++) $adesao.=" ";
		  }
		  $adesao.= $row->nu_ProcessoLicitatorio;
		  if(strlen(utf8_decode($row->nu_ProcessoLicitatorio)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoLicitatorio));
			  for($i = $max;$i<18;$i++) $adesao.=" ";
		  }
		  $adesao.= $row->dt_Publicacao.$row->dt_Validade.$row->nu_Diario;
		  if(strlen(utf8_decode($row->nu_Diario)) <= 6){
			  $max = strlen(utf8_decode($row->nu_Diario));
			  for($i = $max;$i<6;$i++) $adesao.=" ";
		  }
		  $adesao.=$row->dt_Adesao.$row->tp_Adesao.Chr(13).Chr(10);
		  echo $adesao;
	  }
?>