<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=CONTAS.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($contas as $row){
		  $conta = "0000".$row->ano_criacao.$row->cd_conta;
		  if(strlen(utf8_decode($row->cd_conta)) <= 34){
			  $max = strlen(utf8_decode($row->cd_conta));
			  for($i = $max;$i<34;$i++) $conta.=" ";
		  }
		  $conta.= $row->nome_conta;
		  if(strlen(utf8_decode($row->nome_conta)) <= 50){
			  $max = strlen(utf8_decode($row->nome_conta));
			  for($i = $max;$i<50;$i++) $conta.=" ";
		  }
		  if(strlen(utf8_decode($row->nivel_conta)) <= 2){
			  $max = strlen(utf8_decode($row->nivel_conta));
			  for($i = $max;$i<2;$i++) $conta.=0;
		  }
		  $conta.= $row->nivel_conta.$row->cd_recebeLancamento.$row->id_tipoSaldo;
		  if($row->cd_contaSuperior == "0" || $row->cd_contaSuperior == "00" || $row->cd_contaSuperior == "000") $row->cd_contaSuperior = " ";
		  $conta.=$row->cd_contaSuperior;
		  if(strlen(utf8_decode($row->cd_contaSuperior)) <= 34){
			  $max = strlen(utf8_decode($row->cd_contaSuperior));
			  for($i = $max;$i<34;$i++) $conta.=" ";
		  }
		  /*if(strlen(utf8_decode($row->cd_reduzido)) <= 8){
			  $max = strlen(utf8_decode($row->cd_reduzido));
			  for($i = $max;$i<8;$i++) $conta.=0;
		  }*/
		  $conta.="00000000";
		  if(strlen(utf8_decode($row->cd_itemOrcamentario)) <= 9){
			  $max = strlen(utf8_decode($row->cd_itemOrcamentario));
			  for($i = $max;$i<9;$i++) $conta.=0;
		  }
		  $conta.=$row->cd_itemOrcamentario;
		  if(strlen(utf8_decode($row->cd_banco)) <= 4){
			  $max = strlen(utf8_decode($row->cd_banco));
			  for($i = $max;$i<4;$i++) $conta.=0;
		  }
		  $conta.=$row->cd_banco;
		  if(strlen(utf8_decode($row->cd_agencia)) <= 6){
			  $max = strlen(utf8_decode($row->cd_agencia));
			  for($i = $max;$i<6;$i++) $conta.=0;
		  }
		  $conta.=$row->cd_agencia.$row->nu_conta;
		  if(strlen(utf8_decode($row->nu_conta)) <= 10){
			  $max = strlen(utf8_decode($row->nu_conta));
			  for($i = $max;$i<10;$i++) $conta.=0;
		  }
		  $conta.=$row->tp_conta."000".$row->ano_criacaoSuperior.Chr(13).Chr(10);
		  echo $conta;
	  }
?>
