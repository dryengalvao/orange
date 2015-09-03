<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=ITEMLICITACAO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($itens_licitacao as $row){
		  $item = $row->nu_ProcessoLicitatorio;
		  if(strlen(utf8_decode($row->nu_ProcessoLicitatorio)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoLicitatorio));
			  for($i = $max;$i<18;$i++) $item.=" ";
		  }
		  if(strlen(utf8_decode($row->nu_SequenciaItem)) <= 5){
			  $max = strlen(utf8_decode($row->nu_SequenciaItem));
			  for($i = $max;$i<5;$i++) $item.=0;
		  }
		  $item.= $row->nu_SequenciaItem.$row->de_ItemLicitacao;
		  if(strlen(utf8_decode($row->de_ItemLicitacao)) <= 300){
			  $max = strlen(utf8_decode($row->de_ItemLicitacao));
			  for($i = $max;$i<300;$i++) $item.=" ";
		  }
		  if(strlen(utf8_decode($row->qt_ItemLicitado)) <= 16){
			  $max = strlen(utf8_decode($row->qt_ItemLicitado));
			  for($i = $max;$i<16;$i++) $item.=0;
		  }
		  $item.=$row->qt_ItemLicitado.$row->dt_HomologacaoItem.$row->dt_PublicacaoHomologacao.$row->un_MedidaItem;
		   if(strlen(utf8_decode($row->un_MedidaItem)) <= 30){
			  $max = strlen(utf8_decode($row->un_MedidaItem));
			  for($i = $max;$i<30;$i++) $item.=" ";
		  }
		  $item.=$row->st_Item.$row->ct_ItemLote;
		  if(strlen(utf8_decode($row->ct_ItemLote)) <= 10){
			  $max = strlen(utf8_decode($row->ct_ItemLote));
			  for($i = $max;$i<10;$i++) $item.=" ";
		  }
		  $item.=Chr(13).Chr(10);
		  echo $item;
	  }
?>