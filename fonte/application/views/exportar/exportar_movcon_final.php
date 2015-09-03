<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=MOVCONFINAL.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($movcon_final as $row){
		  $movcon_final = "000000".$row->ano_criacao.$row->cd_conta;
		  if(strlen(utf8_decode($row->cd_conta)) <= 34){
			  $max = strlen(utf8_decode($row->cd_conta));
			  for($i = $max;$i<34;$i++) $movcon_final.=" ";
		  }
		  $movcon_final.= $row->tp_movimento;
		  if(strlen(utf8_decode($row->vl_movDebito)) <= 16){
			  $max = strlen(utf8_decode($row->vl_movDebito));
			  for($i = $max;$i<16;$i++) $movcon_final.=0;
		  }
		  $movcon_final.= $row->vl_movDebito;
		  if(strlen(utf8_decode($row->vl_movCredito)) <= 16){
			  $max = strlen(utf8_decode($row->vl_movCredito));
			  for($i = $max;$i<16;$i++) $movcon_final.=0;
		  }
		  $movcon_final.=$row->vl_movCredito.Chr(13).Chr(10);
		  echo $movcon_final;
	  }
?>