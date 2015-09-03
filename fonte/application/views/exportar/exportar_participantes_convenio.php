<?php
	  header("Content-type: application/octet-stream");
	  header("Content-Disposition: attachment; filename=PARTICIPANTECONVENIO.REM"); 
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  
	  foreach($participantes_convenio as $row){
		  if(strlen(utf8_decode($row->cd_CicParticipante)) < 14){
			  $participante=0;
			  $max = strlen(utf8_decode($row->cd_CicParticipante));
			  for($i = $max;$i<13;$i++) $participante.=0;
			  $participante.= $row->cd_CicParticipante;
		  }else $participante = $row->cd_CicParticipante;
		  $participante.= $row->tp_PessoaParticipante.$row->nm_Participante;
		  if(strlen(utf8_decode($row->nm_Participante)) <= 50){
			  $max = strlen(utf8_decode($row->nm_Participante));
			  for($i = $max;$i<50;$i++) $participante.= " ";
		  }
		  if(strlen(utf8_decode($row->vl_Participacao)) <= 16){
			  $max = strlen(utf8_decode($row->vl_Participacao));
			  for($i = $max;$i<16;$i++) $participante.=0;
		  }
		  $participante.= $row->vl_Participacao;
		  if(strlen(utf8_decode($row->vl_PercentualParticipacao)) <= 7){
			  $max = strlen(utf8_decode($row->vl_PercentualParticipacao));
			  for($i = $max;$i<7;$i++) $participante.=0;
		  }
		  $participante.=$row->vl_PercentualParticipacao.$row->nu_CertidaoCASAN;
		  if(strlen(utf8_decode($row->nu_CertidaoCASAN)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoCASAN));
			  for($i = $max;$i<60;$i++) $participante.=" ";
		  }
		  $participante.=$row->dt_CertidaoCASAN.$row->dt_ValidadeCertidaoCASAN.$row->nu_CertidaoCELESC;
		  if(strlen(utf8_decode($row->nu_CertidaoCELESC)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoCELESC));
			  for($i = $max;$i<60;$i++) $participante.=" ";
		  }
		  $participante.=$row->dt_CertidaoCELESC.$row->dt_ValidadeCertidaoCELESC.$row->nu_CertidaoIPESC;
		  if(strlen(utf8_decode($row->nu_CertidaoIPESC)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoIPESC));
			  for($i = $max;$i<60;$i++) $participante.=" ";
		  }
		  $participante.=$row->dt_CertidaoIPESC.$row->dt_ValidadeCertidaoIPESC.$row->nu_CertidaoFazendaMunicipal;
		  if(strlen(utf8_decode($row->nu_CertidaoFazendaMunicipal)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoFazendaMunicipal));
			  for($i = $max;$i<60;$i++) $participante.=" ";
		  }
		  $participante.=$row->dt_CertidaoFazendaMunicipal.$row->dt_ValidadeFazendaMunicipal.$row->nu_CertidaoFazendaFederal;
		  if(strlen(utf8_decode($row->nu_CertidaoFazendaFederal)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoFazendaFederal));
			  for($i = $max;$i<60;$i++) $participante.=" ";
		  }
		  $participante.=$row->dt_CertidaoFazendaFederal.$row->dt_ValidadeFazendaFederal.$row->nu_CertidaoCNDT;
		  if(strlen(utf8_decode($row->nu_CertidaoCNDT)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoCNDT));
			  for($i = $max;$i<60;$i++) $participante.=" ";
		  }
		  $participante.=$row->dt_certidaoCNDT.$row->dt_validadeCNDT.$row->nu_CertidaoOutras;
		  if(strlen(utf8_decode($row->nu_CertidaoOutras)) <= 60){
			  $max = strlen(utf8_decode($row->nu_CertidaoOutras));
			  for($i = $max;$i<60;$i++) $participante.=" ";
		  }
		  $participante.=$row->dt_CertidaoOutras.$row->dt_ValidadeOutras.$row->nu_Convenio;
		  if(strlen(utf8_decode($row->nu_Convenio)) <= 16){
			  $max = strlen(utf8_decode($row->nu_Convenio));
			  for($i = $max;$i<16;$i++) $participante.=" ";
		  }
		  $participante.= $row->tp_EsferaConvenio.Chr(13).Chr(10);
		  echo $participante;
	  }
?>