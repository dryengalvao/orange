<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=LICITACAO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($licitacoes as $row){
		  $licitacao = $row->nu_ProcessoLicitatorio;
		  if(strlen(utf8_decode($row->nu_ProcessoLicitatorio)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoLicitatorio));
			  for($i = $max;$i<18;$i++) $licitacao.=" ";
		  }
		  if(strlen(utf8_decode($row->nu_DiarioOficial)) <= 6){
			  $max = strlen(utf8_decode($row->nu_DiarioOficial));
			  for($i = $max;$i<6;$i++) $licitacao.=0;
		  }
		  $licitacao.= $row->nu_DiarioOficial.$row->dt_PublicacaoEdital.$row->cd_Modalidade.$row->de_ObjetoLicitacao;
		  if(strlen(utf8_decode($row->de_ObjetoLicitacao)) <= 300){
			  $max = strlen(utf8_decode($row->de_ObjetoLicitacao));
			  for($i = $max;$i<300;$i++) $licitacao.=" ";
		  }
		  if(strlen(utf8_decode($row->vl_TotalPrevisto)) <= 16){
			  $max = strlen(utf8_decode($row->vl_TotalPrevisto));
			  for($i = $max;$i<16;$i++) $licitacao.=0;
		  }
		  $licitacao.=$row->vl_TotalPrevisto.$row->nu_Edital;
		  if(strlen(utf8_decode($row->nu_Edital)) <= 16){
			  $max = strlen(utf8_decode($row->nu_Edital));
			  for($i = $max;$i<16;$i++) $licitacao.=" ";
		  }
		  $licitacao.=$row->tp_Licitacao.Chr(13).Chr(10);
		  echo $licitacao;
	  }
?>
