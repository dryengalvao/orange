<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=LICITACAODOTACAO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($licitacao_dotacao as $row){
		  $dotacao = $row->nu_ProcessoLicitatorio;
		  if(strlen(utf8_decode($row->nu_ProcessoLicitatorio)) <= 16){
			  $max = strlen(utf8_decode($row->nu_ProcessoLicitatorio));
			  for($i = $max;$i<16;$i++) $dotacao.=" ";
		  }
		  $dotacao.= $row->cd_CategoriaEconomica.$row->cd_GrupoNatureza;
		  if(strlen(utf8_decode($row->cd_ModalidadeAplicacao)) <= 2){
			  $max = strlen(utf8_decode($row->cd_ModalidadeAplicacao));
			  for($i = $max;$i<2;$i++) $dotacao.=0;
		  }
		  $dotacao.= $row->cd_ModalidadeAplicacao;
		  if(strlen(utf8_decode($row->cd_Elemento)) <= 2){
			  $max = strlen(utf8_decode($row->cd_Elemento));
			  for($i = $max;$i<2;$i++) $dotacao.=0;
		  }
		  $dotacao.= $row->cd_Elemento;
		  if(strlen(utf8_decode($row->cd_UnidadeOrcamentaria)) <= 6){
			  $max = strlen(utf8_decode($row->cd_UnidadeOrcamentaria));
			  for($i = $max;$i<6;$i++) $dotacao.=0;
		  }
		  $dotacao.= $row->cd_UnidadeOrcamentaria;
		  if(strlen(utf8_decode($row->cd_FonteRecurso)) <= 10){
			  $max = strlen(utf8_decode($row->cd_FonteRecurso));
			  for($i = $max;$i<10;$i++) $dotacao.=0;
		  }
		  $dotacao.= $row->cd_FonteRecurso;
		  if(strlen(utf8_decode($row->nu_AcaoGoverno)) <= 7){
			  $max = strlen(utf8_decode($row->nu_AcaoGoverno));
			  for($i = $max;$i<7;$i++) $dotacao.=0;
		  }
		  $dotacao.= $row->nu_AcaoGoverno;
		  if(strlen(utf8_decode($row->cd_SubFuncao)) <= 3){
			  $max = strlen(utf8_decode($row->cd_SubFuncao));
			  for($i = $max;$i<3;$i++) $dotacao.=0;
		  }
		  $dotacao.= $row->cd_SubFuncao;
		  if(strlen(utf8_decode($row->cd_Funcao)) <= 2){
			  $max = strlen(utf8_decode($row->cd_Funcao));
			  for($i = $max;$i<2;$i++) $dotacao.=0;
		  }
		  $dotacao.= $row->cd_Funcao;
		  if(strlen(utf8_decode($row->cd_Programa)) <= 4){
			  $max = strlen(utf8_decode($row->cd_Programa));
			  for($i = $max;$i<4;$i++) $dotacao.=0;
		  }
		  $dotacao.= $row->cd_Programa.Chr(13).Chr(10);
		  echo $dotacao;
	  }
?>