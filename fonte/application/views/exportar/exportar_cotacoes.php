<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=COTACAO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($cotacoes as $row){
		  $cotacao = $row->tp_Valor.$row->nu_ProcessoLicitatorio;
		  if(strlen(utf8_decode($row->nu_ProcessoLicitatorio)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoLicitatorio));
			  for($i = $max;$i<18;$i++) $cotacao.=" ";
		  }
		  $cotacao.= $row->tp_Pessoa;
		  if(strlen(utf8_decode($row->cd_CicParticipante)) <= 14){
			  $max = strlen(utf8_decode($row->cd_CicParticipante));
			  for($i = $max;$i<14;$i++) $cotacao.=0;
		  }
		  $cotacao.= $row->cd_CicParticipante;
		  if(strlen(utf8_decode($row->nu_SequenciaItem)) <= 5){
			  $max = strlen(utf8_decode($row->nu_SequenciaItem));
			  for($i = $max;$i<5;$i++) $cotacao.=0;
		  }
		  $cotacao.= $row->nu_SequenciaItem;
		  if(strlen(utf8_decode($row->vl_TotalCotadoItem)) <= 16){
			  $max = strlen(utf8_decode($row->vl_TotalCotadoItem));
			  for($i = $max;$i<16;$i++) $cotacao.=0;
		  }
		  $cotacao.=$row->vl_TotalCotadoItem.$row->cd_VencedorPerdedor;
		  if(strlen(utf8_decode($row->qt_ItemCotado)) <= 16){
			  $max = strlen(utf8_decode($row->qt_ItemCotado));
			  for($i = $max;$i<16;$i++) $cotacao.=0;
		  }
		  $cotacao.=$row->qt_ItemCotado.$row->ct_ItemLote;
		  if(strlen(utf8_decode($row->ct_ItemLote)) <= 10){
			  $max = strlen(utf8_decode($row->ct_ItemLote));
			  for($i = $max;$i<10;$i++) $cotacao.=" ";
		  }
		  $cotacao.=Chr(13).Chr(10);
		  echo $cotacao;
	  }
?>
