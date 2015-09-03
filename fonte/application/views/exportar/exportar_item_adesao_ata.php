<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=ITEMADESAOATA.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($item_adesao_ata as $row){
		  $item = $row->nu_ProcessoCompra;
		  if(strlen(utf8_decode($row->nu_ProcessoCompra)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoCompra));
			  for($i = $max;$i<18;$i++) $item.=" ";
		  }
		  $item.= $row->nu_Ata;
		  if(strlen(utf8_decode($row->nu_Ata)) <= 18){
			  $max = strlen(utf8_decode($row->nu_Ata));
			  for($i = $max;$i<18;$i++) $item.=" ";
		  }
		  if(strlen(utf8_decode($row->qt_Item)) <= 16){
			  $max = strlen(utf8_decode($row->qt_Item));
			  for($i = $max;$i<16;$i++) $item.=0;
		  }
		  $item.= $row->qt_Item;
		  if(strlen(utf8_decode($row->se_ItemAta)) <= 5){
			  $max = strlen(utf8_decode($row->se_ItemAta));
			  for($i = $max;$i<5;$i++) $item.=0;
		  }
		  $item.= $row->se_ItemAta;
		  /*if(strlen(utf8_decode($row->vl_Item)) <= 16){
			  $max = strlen(utf8_decode($row->vl_Item));
			  for($i = $max;$i<16;$i++) $item.=0;
		  }
		  $item.= $row->vl_Item.$row->un_Medida;
		  if(strlen(utf8_decode($row->un_Medida)) <= 30){
			  $max = strlen(utf8_decode($row->un_Medida));
			  for($i = $max;$i<30;$i++) $item.=" ";
		  }*/
		  $item.= $row->de_Item;
		  if(strlen(utf8_decode($row->de_Item)) <= 300){
			  $max = strlen(utf8_decode($row->de_Item));
			  for($i = $max;$i<300;$i++) $item.=" ";
		  }
		  $item.=Chr(13).Chr(10);
		  echo $item;
	  }
?>