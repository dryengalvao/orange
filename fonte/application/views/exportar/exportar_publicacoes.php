<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=PUBLICACAO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($publicacoes as $row){
		  $publicacao = $row->nu_ProcessoLicitatorio;
		  if(strlen(utf8_decode($row->nu_ProcessoLicitatorio)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoLicitatorio));
			  for($i = $max;$i<18;$i++) $publicacao.=" ";
		  }
		  $publicacao.= $row->dt_PublicacaoEdital;
		  if(strlen(utf8_decode($row->nu_SequencialPublicacao)) <= 2){
			  $max = strlen(utf8_decode($row->nu_SequencialPublicacao));
			  for($i = $max;$i<2;$i++) $publicacao.=0;
		  }
		  $publicacao.=$row->nm_veiculoComunicacao;
		  if(strlen(utf8_decode($row->nm_veiculoComunicacao)) <= 50){
			  $max = strlen(utf8_decode($row->nm_veiculoComunicacao));
			  for($i = $max;$i<50;$i++) $publicacao.=" ";
		  }
		  $publicacao.=Chr(13).Chr(10);
		  echo $publicacao;
	  }
?>