<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=MOVCONINICIAL.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($movcon_inicial as $row){
		  $row->vl_movDebito = str_replace(".", "", $row->vl_movDebito);
		  $row->vl_movCredito = str_replace(".", "", $row->vl_movCredito);
		  $movcon_inicial = "000000".$row->ano_criacao.$row->cd_conta;
		  if(strlen(utf8_decode($row->cd_conta)) <= 34){
			  $max = strlen(utf8_decode($row->cd_conta));
			  for($i = $max;$i<34;$i++) $movcon_inicial.=" ";
		  }
		  $movcon_inicial.= $row->tp_movimento;
		  if(strlen(utf8_decode($row->vl_movDebito)) <= 16){
			  $max = strlen(utf8_decode($row->vl_movDebito));
			  for($i = $max;$i<16;$i++) $movcon_inicial.=0;
		  }
		  $movcon_inicial.= $row->vl_movDebito;
		  if(strlen(utf8_decode($row->vl_movCredito)) <= 16){
			  $max = strlen(utf8_decode($row->vl_movCredito));
			  for($i = $max;$i<16;$i++) $movcon_inicial.=0;
		  }
		  $movcon_inicial.=$row->vl_movCredito.Chr(13).Chr(10);
		  echo $movcon_inicial;
	  }
?>