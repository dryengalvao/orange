<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=CERTIDAO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($certidoes as $row){
		  $certidao = $row->nu_ProcessoLicitatorio;
		  if(strlen(utf8_decode($row->nu_ProcessoLicitatorio)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoLicitatorio));
			  for($i = $max;$i<18;$i++) $certidao.=" ";
		  }
		  if(strlen(utf8_decode($row->cd_CicParticipante)) <= 14){
			  $max = strlen(utf8_decode($row->cd_CicParticipante));
			  for($i = $max;$i<14;$i++) $certidao.=0;
		  }
		  $certidao.= $row->cd_CicParticipante.$row->tp_Certidao.$row->tp_Pessoa.$row->nu_Certidao;
		  if(strlen(utf8_decode($row->nu_Certidao)) <= 60){
			  $max = strlen(utf8_decode($row->nu_Certidao));
			  for($i = $max;$i<60;$i++) $certidao.=" ";
		  }
		  $certidao.= $row->dt_EmissaoCertidao.$row->dt_ValidadeCertidao.Chr(13).Chr(10);
		  echo $certidao;
	  }
?>