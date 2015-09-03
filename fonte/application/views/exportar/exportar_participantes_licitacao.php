<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=PARTICIPANTELICITACAO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($participantes_licitacao as $row){
		  $participante = $row->nu_ProcessoLicitatorio;
		  if(strlen(utf8_decode($row->nu_ProcessoLicitatorio)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoLicitatorio));
			  for($i = $max;$i<18;$i++) $participante.=" ";
		  }
		  if(strlen(utf8_decode($row->cd_CicParticipante)) <= 14){
			  $max = strlen(utf8_decode($row->cd_CicParticipante));
			  for($i = $max;$i<14;$i++) $participante.=0;
		  }
		  $participante.= $row->cd_CicParticipante.$row->tp_Pessoa.$row->nm_Participante;
		  if(strlen(utf8_decode($row->nm_Participante)) <= 50){
			  $max = strlen(utf8_decode($row->nm_Participante));
			  for($i = $max;$i<50;$i++) $participante.=" ";
		  }
		  $participante.= $row->tp_Participacao;
		  if(strlen(utf8_decode($row->cd_CGCConsorcio)) <= 14){
			  $max = strlen(utf8_decode($row->cd_CGCConsorcio));
			  for($i = $max;$i<14;$i++) $participante.=0;
		  }
		  $participante.=$row->cd_CGCConsorcio.$row->tp_Convidado.Chr(13).Chr(10);
		  echo $participante;
	  }
?>
