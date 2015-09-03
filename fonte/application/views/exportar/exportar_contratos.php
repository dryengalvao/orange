<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=CONTRATO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($contratos as $row){
		  $contrato = $row->nu_Contrato;
		  if(strlen(utf8_decode($row->nu_Contrato)) <= 16){
			  $max = strlen(utf8_decode($row->nu_Contrato));
			  for($i = $max;$i<16;$i++) $contrato.=" ";
		  }
		  if(strlen(utf8_decode($row->vl_Contrato)) <= 16){
			  $max = strlen(utf8_decode($row->vl_Contrato));
			  for($i = $max;$i<16;$i++) $contrato.=0;
		  }
		  $contrato.= $row->vl_Contrato.$row->dt_AssinaturaContrato.$row->de_ObjetivoContrato;
		  if(strlen(utf8_decode($row->de_ObjetivoContrato)) <= 300){
			  $max = strlen(utf8_decode($row->de_ObjetivoContrato));
			  for($i = $max;$i<300;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->nu_ProcessoLicitator;
		  if(strlen(utf8_decode($row->nu_ProcessoLicitator)) <= 18){
			  $max = strlen(utf8_decode($row->nu_ProcessoLicitator));
			  for($i = $max;$i<18;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->cd_Moeda.$row->tp_PessoaContratado;
		  if(strlen(utf8_decode($row->cd_CicContratado)) <= 14){
			  $max = strlen(utf8_decode($row->cd_CicContratado));
			  for($i = $max;$i<14;$i++) $contrato.= 0;
		  }
		  $contrato.=$row->cd_CicContratado.$row->nm_Contratado;
		  if(strlen(utf8_decode($row->nm_Contratado)) <= 50){
			  $max = strlen(utf8_decode($row->nm_Contratado));
			  for($i = $max;$i<50;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->dt_VencimentoContrato;
		  if(strlen(utf8_decode($row->nu_DiarioOficial)) <= 6){
			  $max = strlen(utf8_decode($row->nu_DiarioOficial));
			  for($i = $max;$i<6;$i++) $contrato.= 0;
		  }
		  $contrato.=$row->nu_DiarioOficial.$row->dt_Publicacao.$row->st_RecebeValor.$row->nu_CertidaoINSS;
		  if(strlen(utf8_decode($row->nu_CertidaoINSS)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoINSS));
			  for($i = $max;$i<60;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->dt_CertidaoINSS.$row->dt_ValidadeINSS.$row->nu_CertidaoFGTS;
		  if(strlen(utf8_decode($row->nu_CertidaoFGTS)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoFGTS));
			  for($i = $max;$i<60;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->dt_CertidaoFGTS.$row->dt_ValidadeFGTS.$row->nu_CertidaoFazendaEstadual;
		  if(strlen(utf8_decode($row->nu_CertidaoFazendaEstadual)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoFazendaEstadual));
			  for($i = $max;$i<60;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->dt_CertidaoFazendaEstadual.$row->dt_ValidadeFazendaEstadual.$row->nu_CertidaoFazendaMunicipal;
		  if(strlen(utf8_decode($row->nu_CertidaoFazendaMunicipal)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoFazendaMunicipal));
			  for($i = $max;$i<60;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->dt_CertidaoFazendaMunicipal.$row->dt_ValidadeFazendaMunicipal.$row->nu_CertidaoFazendaFederal;
		  if(strlen(utf8_decode($row->nu_CertidaoFazendaFederal)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoFazendaFederal));
			  for($i = $max;$i<60;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->dt_CertidaoFazendaFederal.$row->dt_ValidadeFazendaFederal.$row->nu_CertidaoCNDT;
		  if(strlen(utf8_decode($row->nu_CertidaoCNDT)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoCNDT));
			  for($i = $max;$i<60;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->dt_certidaoCNDT.$row->dt_validadeCNDT.$row->nu_CertidaoOutras;
		  if(strlen(utf8_decode($row->nu_CertidaoOutras)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoOutras));
			  for($i = $max;$i<60;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->dt_CertidaoOutras.$row->dt_ValidadeOutras.$row->tp_Contrato;
		  if($row->nu_ContratoSuperior == "0" || $row->nu_ContratoSuperior == "00" || $row->nu_ContratoSuperior == "000") $row->nu_ContratoSuperior = " ";
		  $contrato.=$row->nu_ContratoSuperior;
		  if(strlen(utf8_decode($row->nu_ContratoSuperior)) <= 16){
			  $max = strlen(utf8_decode($row->nu_ContratoSuperior));
			  for($i = $max;$i<16;$i++) $contrato.=" ";
		  }
		  $contrato.=$row->tp_Aditivo;
		  if(strlen(utf8_decode($row->cnpj_UgContrato)) <= 14){
			  $max = strlen(utf8_decode($row->cnpj_UgContrato));
			  for($i = $max;$i<14;$i++) $contrato.= 0;
		  }
		  $contrato.=$row->cnpj_UgContrato;
		  if(strlen(utf8_decode($row->competencia)) <= 6){
			  $max = strlen(utf8_decode($row->competencia));
			  for($i = $max;$i<6;$i++) $contrato.= 0;
		  }
		  $contrato.=$row->competencia.Chr(13).Chr(10);
		  echo $contrato;
	  }
?>