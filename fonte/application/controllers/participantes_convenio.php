<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contratos
 *
 * @author vcerdeira
 */
class participantes_convenio extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('participantes_convenio_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['participantes_convenio'] = $this->participantes_convenio_m->lista_participantes_convenio();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_participantes_convenio',$dados);
    }
	public function exportados(){
        $dados['participantes_convenio'] = $this->participantes_convenio_m->lista_participantes_convenio_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_participantes_convenio',$dados);
    }
    public function novo(){
        $dados['convenios'] = $this->tabelas_internas->convenios();
        $dados['tipo_pessoa'] = $this->tabelas_internas->tipo_pessoa();
		$dados['esfera_conveniado'] = $this->tabelas_internas->esfera_do_conveniado();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/novo_participante_convenio',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirParticipanteConvenio') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['id_convenio'] = $this->input->post('nu_Convenio');
             $dados['tp_PessoaParticipante'] = $this->input->post('tp_PessoaParticipante');
             $dados['nm_Participante'] = $this->input->post('nm_Participante');
             $dados['cd_CicParticipante'] = $this->input->post('cd_CicParticipante');
             $dados['vl_Participacao'] = $this->input->post('vl_Participacao');
             $dados['vl_PercentualParticipacao'] = $this->input->post('vl_PercentualParticipacao');
             $dados['nu_CertidaoCASAN'] = $this->input->post('nu_CertidaoCASAN');
             $dados['dt_CertidaoCASAN'] = $this->input->post('dt_CertidaoCASAN');
             $dados['dt_ValidadeCertidaoCASAN'] = $this->input->post('dt_ValidadeCertidaoCASAN');
             $dados['nu_CertidaoCELESC'] = $this->input->post('nu_CertidaoCELESC');
             $dados['dt_CertidaoCELESC'] = $this->input->post('dt_CertidaoCELESC');
             $dados['dt_ValidadeCertidaoCELESC'] = $this->input->post('dt_ValidadeCertidaoCELESC');
             $dados['nu_CertidaoFazendaMunicipal'] = $this->input->post('nu_CertidaoFazendaMunicipal');
             $dados['dt_CertidaoFazendaMunicipal'] = $this->input->post('dt_CertidaoFazendaMunicipal');
             $dados['dt_ValidadeFazendaMunicipal'] = $this->input->post('dt_ValidadeFazendaMunicipal');
             $dados['nu_CertidaoIPESC'] = $this->input->post('nu_CertidaoIPESC');
             $dados['dt_CertidaoIPESC'] = $this->input->post('dt_CertidaoIPESC');
             $dados['dt_ValidadeCertidaoIPESC'] = $this->input->post('dt_ValidadeCertidaoIPESC');
             $dados['nu_CertidaoFazendaFederal'] = $this->input->post('nu_CertidaoFazendaFederal');
             $dados['dt_CertidaoFazendaFederal'] = $this->input->post('dt_CertidaoFazendaFederal');
             $dados['dt_ValidadeFazendaFederal'] = $this->input->post('dt_ValidadeFazendaFederal');
             $dados['nu_CertidaoCNDT'] = $this->input->post('nu_CertidaoCNDT');
			 $dados['dt_certidaoCNDT'] = $this->input->post('dt_certidaoCNDT');
			 $dados['dt_validadeCNDT'] = $this->input->post('dt_validadeCNDT');
			 $dados['nu_CertidaoOutras'] = $this->input->post('nu_CertidaoOutras');
			 $dados['dt_CertidaoOutras'] = $this->input->post('dt_CertidaoOutras');
			 $dados['dt_ValidadeOutras'] = $this->input->post('dt_ValidadeOutras');
			 $dados['tp_EsferaConvenio'] = $this->input->post('tp_EsferaConvenio');
			   
             if($dados['dt_CertidaoCASAN'] == 0) $dados['dt_CertidaoCASAN'] = "00000000";
             else $dados['dt_CertidaoCASAN'] = implode(array_reverse(explode("/", $dados['dt_CertidaoCASAN'])));
             if($dados['dt_ValidadeCertidaoCASAN'] == 0) $dados['dt_ValidadeCertidaoCASAN'] = "00000000";
             else $dados['dt_ValidadeCertidaoCASAN'] = implode(array_reverse(explode("/", $dados['dt_ValidadeCertidaoCASAN'])));
			 if($dados['dt_CertidaoCELESC'] == 0) $dados['dt_CertidaoCELESC'] = "00000000";
             else $dados['dt_CertidaoCELESC'] = implode(array_reverse(explode("/", $dados['dt_CertidaoCELESC'])));
             if($dados['dt_ValidadeCertidaoCELESC'] == 0) $dados['dt_ValidadeCertidaoCELESC'] = "00000000";
             else $dados['dt_ValidadeCertidaoCELESC'] = implode(array_reverse(explode("/", $dados['dt_ValidadeCertidaoCELESC'])));
			 if($dados['dt_CertidaoFazendaMunicipal'] == 0) $dados['dt_CertidaoFazendaMunicipal'] = "00000000";
             else $dados['dt_CertidaoFazendaMunicipal'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFazendaMunicipal'])));
             if($dados['dt_ValidadeFazendaMunicipal'] == 0) $dados['dt_ValidadeFazendaMunicipal'] = "00000000";
             else $dados['dt_ValidadeFazendaMunicipal'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFazendaMunicipal'])));
			 if($dados['dt_CertidaoIPESC'] == 0) $dados['dt_CertidaoIPESC'] = "00000000";
             else $dados['dt_CertidaoIPESC'] = implode(array_reverse(explode("/", $dados['dt_CertidaoIPESC'])));
             if($dados['dt_ValidadeCertidaoIPESC'] == 0) $dados['dt_ValidadeCertidaoIPESC'] = "00000000";
             else $dados['dt_ValidadeCertidaoIPESC'] = implode(array_reverse(explode("/", $dados['dt_ValidadeCertidaoIPESC'])));
			 if($dados['dt_CertidaoFazendaFederal'] == 0) $dados['dt_CertidaoFazendaFederal'] = "00000000";
             else $dados['dt_CertidaoFazendaFederal'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFazendaFederal'])));
             if($dados['dt_ValidadeFazendaFederal'] == 0) $dados['dt_ValidadeFazendaFederal'] = "00000000";
             else $dados['dt_ValidadeFazendaFederal'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFazendaFederal'])));
			 if($dados['dt_CertidaoOutras'] == 0) $dados['dt_CertidaoOutras'] = "00000000";
             else $dados['dt_CertidaoOutras'] = implode(array_reverse(explode("/", $dados['dt_CertidaoOutras'])));
             if($dados['dt_ValidadeOutras'] == 0) $dados['dt_ValidadeOutras'] = "00000000";
             else $dados['dt_ValidadeOutras'] = implode(array_reverse(explode("/", $dados['dt_ValidadeOutras'])));
			 if($dados['dt_certidaoCNDT'] == 0) $dados['dt_certidaoCNDT'] = "00000000";
             else $dados['dt_certidaoCNDT'] = implode(array_reverse(explode("/", $dados['dt_certidaoCNDT'])));
             if($dados['dt_validadeCNDT'] == 0) $dados['dt_validadeCNDT'] = "00000000";
             else $dados['dt_validadeCNDT'] = implode(array_reverse(explode("/", $dados['dt_validadeCNDT'])));
			 
			 if($dados['nu_CertidaoCASAN'] == 0) $dados['nu_CertidaoCASAN'] = " ";
			 else $dados['nu_CertidaoCASAN'] = implode(explode("/", $dados['nu_CertidaoCASAN']));
             if($dados['nu_CertidaoCELESC'] == 0) $dados['nu_CertidaoCELESC'] = " ";
			 else $dados['nu_CertidaoCELESC'] = implode(explode("/", $dados['nu_CertidaoCELESC']));
			 if($dados['nu_CertidaoIPESC'] == 0) $dados['nu_CertidaoIPESC'] = " ";
			 else $dados['nu_CertidaoIPESC'] = implode(explode("/", $dados['nu_CertidaoIPESC']));
			 if($dados['nu_CertidaoFazendaMunicipal'] == 0) $dados['nu_CertidaoFazendaMunicipal'] = " ";
             else $dados['nu_CertidaoFazendaMunicipal'] = implode(explode("/", $dados['nu_CertidaoFazendaMunicipal']));
			 if($dados['nu_CertidaoFazendaFederal'] == 0) $dados['nu_CertidaoFazendaFederal'] = " ";
             else $dados['nu_CertidaoFazendaFederal'] = implode(explode("/", $dados['nu_CertidaoFazendaFederal']));
			 if($dados['nu_CertidaoOutras'] == 0) $dados['nu_CertidaoOutras'] = " ";
             else $dados['nu_CertidaoOutras'] = implode(explode("/", $dados['nu_CertidaoOutras']));  
			 if($dados['nu_CertidaoCNDT'] == 0) $dados['nu_CertidaoCNDT'] = " ";
             else $dados['nu_CertidaoCNDT'] = implode(explode("/", $dados['nu_CertidaoCNDT']));    
             $dados['exportado'] = 0;
             if($this->participantes_convenio_m->inserir_participantes_convenio($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Participante cadastrado com sucesso!
                <p class='right'> <a href = '". site_url('participantes_convenio/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('participantes_convenio/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['participantes_convenio'] = $this->participantes_convenio_m->lista_participantes_convenio();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_participantes_convenio',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['participantes_convenio'] = $this->participantes_convenio_m->exportar($ids);
            if($dados['participantes_convenio'] != NULL) $this->participantes_convenio_m->exportados($ids);
            $this->load->view('exportar/exportar_participantes_convenio',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhum participante selecionado!
                <p class='right'> <a href = '". site_url('participantes_convenio/principal')."' style='text-decoration:none'>
                    fechar </a></p></div>";
            $dados['participantes_convenio'] = $this->participantes_convenio_m->lista_participantes_convenio();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_participantes_convenio',$dados);
        }        
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$participante_convenio = $this->participantes_convenio_m->consultar($dados);
		foreach($participante_convenio as $row){
			$row->dt_CertidaoCASAN = substr($row->dt_CertidaoCASAN,6,2).'/'.substr($row->dt_CertidaoCASAN,4,2).'/'.substr($row->dt_CertidaoCASAN,0,4);
			$row->dt_ValidadeCertidaoCASAN = substr($row->dt_ValidadeCertidaoCASAN,6,2).'/'.substr($row->dt_ValidadeCertidaoCASAN,4,2).'/'.substr($row->dt_ValidadeCertidaoCASAN,0,4);
			$row->dt_CertidaoCELESC = substr($row->dt_CertidaoCELESC,6,2).'/'.substr($row->dt_CertidaoCELESC,4,2).'/'.substr($row->dt_CertidaoCELESC,0,4);
			$row->dt_ValidadeCertidaoCELESC = substr($row->dt_ValidadeCertidaoCELESC,6,2).'/'.substr($row->dt_ValidadeCertidaoCELESC,4,2).'/'.substr($row->dt_ValidadeCertidaoCELESC,0,4);
			$row->dt_CertidaoIPESC = substr($row->dt_CertidaoIPESC,6,2).'/'.substr($row->dt_CertidaoIPESC,4,2).'/'.substr($row->dt_CertidaoIPESC,0,4);
			$row->dt_ValidadeCertidaoIPESC = substr($row->dt_ValidadeCertidaoIPESC,6,2).'/'.substr($row->dt_ValidadeCertidaoIPESC,4,2).'/'.substr($row->dt_ValidadeCertidaoIPESC,0,4);
			$row->dt_CertidaoFazendaMunicipal = substr($row->dt_CertidaoFazendaMunicipal,6,2).'/'.substr($row->dt_CertidaoFazendaMunicipal,4,2).'/'.substr($row->dt_CertidaoFazendaMunicipal,0,4);
			$row->dt_ValidadeFazendaMunicipal = substr($row->dt_ValidadeFazendaMunicipal,6,2).'/'.substr($row->dt_ValidadeFazendaMunicipal,4,2).'/'.substr($row->dt_ValidadeFazendaMunicipal,0,4);
			$row->dt_CertidaoFazendaFederal = substr($row->dt_CertidaoFazendaFederal,6,2).'/'.substr($row->dt_CertidaoFazendaFederal,4,2).'/'.substr($row->dt_CertidaoFazendaFederal,0,4);
			$row->dt_ValidadeFazendaFederal = substr($row->dt_ValidadeFazendaFederal,6,2).'/'.substr($row->dt_ValidadeFazendaFederal,4,2).'/'.substr($row->dt_ValidadeFazendaFederal,0,4);
			$row->dt_CertidaoOutras = substr($row->dt_CertidaoOutras,6,2).'/'.substr($row->dt_CertidaoOutras,4,2).'/'.substr($row->dt_CertidaoOutras,0,4);
			$row->dt_ValidadeOutras = substr($row->dt_ValidadeOutras,6,2).'/'.substr($row->dt_ValidadeOutras,4,2).'/'.substr($row->dt_ValidadeOutras,0,4);
			$row->dt_certidaoCNDT = substr($row->dt_certidaoCNDT,6,2).'/'.substr($row->dt_certidaoCNDT,4,2).'/'.substr($row->dt_certidaoCNDT,0,4);
			$row->dt_validadeCNDT = substr($row->dt_validadeCNDT,6,2).'/'.substr($row->dt_validadeCNDT,4,2).'/'.substr($row->dt_validadeCNDT,0,4);
			if($row->nu_CertidaoCASAN == " ") $row->nu_CertidaoCASAN = 0;
			if($row->nu_CertidaoCELESC == " ") $row->nu_CertidaoCELESC = 0;
			if($row->nu_CertidaoIPESC == " ") $row->nu_CertidaoIPESC = 0;
			if($row->nu_CertidaoCNDT == " ") $row->nu_CertidaoCNDT = 0;
			if($row->nu_CertidaoFazendaMunicipal == " ") $row->nu_CertidaoFazendaMunicipal = 0;
			if($row->nu_CertidaoFazendaFederal == " ") $row->nu_CertidaoFazendaFederal = 0;
			if($row->nu_CertidaoOutras == " ") $row->nu_CertidaoOutras = 0;
		}
		$dados['participante_convenio'] = $participante_convenio;
		$dados['convenios'] = $this->tabelas_internas->convenios();
        $dados['tipo_pessoa'] = $this->tabelas_internas->tipo_pessoa();
		$dados['esfera_conveniado'] = $this->tabelas_internas->esfera_do_conveniado();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/participante_convenio',$dados);
	}
	public function update(){
	   $dados['mes'] = $this->input->post('mes');
	   $dados['id_convenio'] = $this->input->post('nu_Convenio');
	   $dados['tp_PessoaParticipante'] = $this->input->post('tp_PessoaParticipante');
	   $dados['nm_Participante'] = $this->input->post('nm_Participante');
	   $dados['cd_CicParticipante'] = $this->input->post('cd_CicParticipante');
	   $dados['vl_Participacao'] = $this->input->post('vl_Participacao');
	   $dados['vl_PercentualParticipacao'] = $this->input->post('vl_PercentualParticipacao');
	   $dados['nu_CertidaoCASAN'] = $this->input->post('nu_CertidaoCASAN');
	   $dados['dt_CertidaoCASAN'] = $this->input->post('dt_CertidaoCASAN');
	   $dados['dt_ValidadeCertidaoCASAN'] = $this->input->post('dt_ValidadeCertidaoCASAN');
	   $dados['nu_CertidaoCELESC'] = $this->input->post('nu_CertidaoCELESC');
	   $dados['dt_CertidaoCELESC'] = $this->input->post('dt_CertidaoCELESC');
	   $dados['dt_ValidadeCertidaoCELESC'] = $this->input->post('dt_ValidadeCertidaoCELESC');
	   $dados['nu_CertidaoFazendaMunicipal'] = $this->input->post('nu_CertidaoFazendaMunicipal');
	   $dados['dt_CertidaoFazendaMunicipal'] = $this->input->post('dt_CertidaoFazendaMunicipal');
	   $dados['dt_ValidadeFazendaMunicipal'] = $this->input->post('dt_ValidadeFazendaMunicipal');
	   $dados['nu_CertidaoIPESC'] = $this->input->post('nu_CertidaoIPESC');
	   $dados['dt_CertidaoIPESC'] = $this->input->post('dt_CertidaoIPESC');
	   $dados['dt_ValidadeCertidaoIPESC'] = $this->input->post('dt_ValidadeCertidaoIPESC');
	   $dados['nu_CertidaoFazendaFederal'] = $this->input->post('nu_CertidaoFazendaFederal');
	   $dados['dt_CertidaoFazendaFederal'] = $this->input->post('dt_CertidaoFazendaFederal');
	   $dados['dt_ValidadeFazendaFederal'] = $this->input->post('dt_ValidadeFazendaFederal');
	   $dados['nu_CertidaoCNDT'] = $this->input->post('nu_CertidaoCNDT');
	   $dados['dt_certidaoCNDT'] = $this->input->post('dt_certidaoCNDT');
	   $dados['dt_validadeCNDT'] = $this->input->post('dt_validadeCNDT');
	   $dados['nu_CertidaoOutras'] = $this->input->post('nu_CertidaoOutras');
	   $dados['dt_CertidaoOutras'] = $this->input->post('dt_CertidaoOutras');
	   $dados['dt_ValidadeOutras'] = $this->input->post('dt_ValidadeOutras');
	   $dados['tp_EsferaConvenio'] = $this->input->post('tp_EsferaConvenio');
	   $id = $this->input->post('id');
	   
	   if(empty($dados['nm_Participante'])) unset($dados['nm_Participante']);
	   if(empty($dados['cd_CicParticipante'])) unset($dados['cd_CicParticipante']);
	   if(empty($dados['vl_Participacao'])) unset($dados['vl_Participacao']);
	   if(empty($dados['vl_PercentualParticipacao'])) unset($dados['vl_PercentualParticipacao']);
	   
	   if($dados['nu_CertidaoCASAN'] == 0) $dados['nu_CertidaoCASAN'] = " ";
	   elseif(empty($dados['nu_CertidaoCASAN'])) unset($dados['nu_CertidaoCASAN']);
       else $dados['nu_CertidaoCASAN'] = implode(explode("/", $dados['nu_CertidaoCASAN']));
	   if($dados['nu_CertidaoCELESC'] == 0) $dados['nu_CertidaoCELESC'] = " ";
	   elseif(empty($dados['nu_CertidaoCELESC'])) unset($dados['nu_CertidaoCELESC']);
       else $dados['nu_CertidaoCELESC'] = implode(explode("/", $dados['nu_CertidaoCELESC']));
	   if($dados['nu_CertidaoFazendaMunicipal'] == 0) $dados['nu_CertidaoFazendaMunicipal'] = " ";
	   elseif(empty($dados['nu_CertidaoFazendaMunicipal'])) unset($dados['nu_CertidaoFazendaMunicipal']);
       else $dados['nu_CertidaoFazendaMunicipal'] = implode(explode("/", $dados['nu_CertidaoFazendaMunicipal']));
	   if($dados['nu_CertidaoIPESC'] == 0) $dados['nu_CertidaoIPESC'] = " ";
	   elseif(empty($dados['nu_CertidaoIPESC'])) unset($dados['nu_CertidaoIPESC']);
       else $dados['nu_CertidaoIPESC'] = implode(explode("/", $dados['nu_CertidaoIPESC']));
	   if($dados['nu_CertidaoFazendaFederal'] == 0) $dados['nu_CertidaoFazendaFederal'] = " ";
	   elseif(empty($dados['nu_CertidaoFazendaFederal'])) unset($dados['nu_CertidaoFazendaFederal']);
       else $dados['nu_CertidaoFazendaFederal'] = implode(explode("/", $dados['nu_CertidaoFazendaFederal']));
	   if($dados['nu_CertidaoOutras'] == 0) $dados['nu_CertidaoOutras'] = " ";
	   elseif(empty($dados['nu_CertidaoOutras'])) unset($dados['nu_CertidaoOutras']);
       else $dados['nu_CertidaoOutras'] = implode(explode("/", $dados['nu_CertidaoOutras']));
	   if($dados['nu_CertidaoCNDT'] == 0) $dados['nu_CertidaoCNDT'] = " ";
	   elseif(empty($dados['nu_CertidaoCNDT'])) unset($dados['nu_CertidaoCNDT']);
       else $dados['nu_CertidaoCNDT'] = implode(explode("/", $dados['nu_CertidaoCNDT']));

	   if($dados['dt_CertidaoCASAN'] == 0) $dados['dt_CertidaoCASAN'] = "00000000";
	   elseif(empty($dados['dt_CertidaoCASAN'])) unset($dados['dt_CertidaoCASAN']);
       else $dados['dt_CertidaoCASAN'] = implode(array_reverse(explode("/", $dados['dt_CertidaoCASAN'])));
	   
	   if($dados['dt_ValidadeCertidaoCASAN'] == 0) $dados['dt_ValidadeCertidaoCASAN'] = "00000000";
	   elseif(empty($dados['dt_ValidadeCertidaoCASAN'])) unset($dados['dt_ValidadeCertidaoCASAN']);
       else $dados['dt_ValidadeCertidaoCASAN'] = implode(array_reverse(explode("/", $dados['dt_ValidadeCertidaoCASAN'])));
	   
	   if($dados['dt_CertidaoCELESC'] == 0) $dados['dt_CertidaoCELESC'] = "00000000";
	   elseif(empty($dados['dt_CertidaoCELESC'])) unset($dados['dt_CertidaoCELESC']);
       else $dados['dt_CertidaoCELESC'] = implode(array_reverse(explode("/", $dados['dt_CertidaoCELESC'])));
	   
	   if($dados['dt_ValidadeCertidaoCELESC'] == 0) $dados['dt_ValidadeCertidaoCELESC'] = "00000000";
	   elseif(empty($dados['dt_ValidadeCertidaoCELESC'])) unset($dados['dt_ValidadeCertidaoCELESC']);
       else $dados['dt_ValidadeCertidaoCELESC'] = implode(array_reverse(explode("/", $dados['dt_ValidadeCertidaoCELESC'])));
	   
	   if($dados['dt_CertidaoIPESC'] == 0) $dados['dt_CertidaoIPESC'] = "00000000";
	   elseif(empty($dados['dt_CertidaoIPESC'])) unset($dados['dt_CertidaoIPESC']);
       else $dados['dt_CertidaoIPESC'] = implode(array_reverse(explode("/", $dados['dt_CertidaoIPESC'])));
	   
	   if($dados['dt_ValidadeCertidaoIPESC'] == 0) $dados['dt_ValidadeCertidaoIPESC'] = "00000000";
	   elseif(empty($dados['dt_ValidadeCertidaoIPESC'])) unset($dados['dt_ValidadeCertidaoIPESC']);
       else $dados['dt_ValidadeCertidaoIPESC'] = implode(array_reverse(explode("/", $dados['dt_ValidadeCertidaoIPESC'])));
	   
	   if($dados['dt_CertidaoFazendaMunicipal'] == 0) $dados['dt_CertidaoFazendaMunicipal'] = "00000000";
	   elseif(empty($dados['dt_CertidaoFazendaMunicipal'])) unset($dados['dt_CertidaoFazendaMunicipal']);
       else $dados['dt_CertidaoFazendaMunicipal'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFazendaMunicipal'])));
	   
	   if($dados['dt_ValidadeFazendaMunicipal'] == 0) $dados['dt_ValidadeFazendaMunicipal'] = "00000000";
	   elseif(empty($dados['dt_ValidadeFazendaMunicipal'])) unset($dados['dt_ValidadeFazendaMunicipal']);
       else $dados['dt_ValidadeFazendaMunicipal'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFazendaMunicipal'])));
	   
	   if($dados['dt_CertidaoFazendaFederal'] == 0) $dados['dt_CertidaoFazendaFederal'] = "00000000";
	   elseif(empty($dados['dt_CertidaoFazendaFederal'])) unset($dados['dt_CertidaoFazendaFederal']);
       else $dados['dt_CertidaoFazendaFederal'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFazendaFederal'])));
	   
	   if($dados['dt_ValidadeFazendaFederal'] == "0") $dados['dt_ValidadeFazendaFederal'] = "00000000";
	   elseif(empty($dados['dt_ValidadeFazendaFederal'])) unset($dados['dt_ValidadeFazendaFederal']);
       else $dados['dt_ValidadeFazendaFederal'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFazendaFederal'])));
	   
	   if($dados['dt_certidaoCNDT'] == 0) $dados['dt_certidaoCNDT'] = "00000000";
	   elseif(empty($dados['dt_certidaoCNDT'])) unset($dados['dt_certidaoCNDT']);
       else $dados['dt_certidaoCNDT'] = implode(array_reverse(explode("/", $dados['dt_certidaoCNDT'])));
	   
	   if($dados['dt_validadeCNDT'] == 0) $dados['dt_validadeCNDT'] = "00000000";
	   elseif(empty($dados['dt_validadeCNDT'])) unset($dados['dt_validadeCNDT']);
       else $dados['dt_validadeCNDT'] = implode(array_reverse(explode("/", $dados['dt_validadeCNDT'])));
	   
	    if($dados['dt_CertidaoOutras'] == 0) $dados['dt_CertidaoOutras'] = "00000000";
	   elseif(empty($dados['dt_CertidaoOutras'])) unset($dados['dt_CertidaoOutras']);
       else $dados['dt_CertidaoOutras'] = implode(array_reverse(explode("/", $dados['dt_CertidaoOutras'])));
	   
	   if($dados['dt_ValidadeOutras'] == 0) $dados['dt_ValidadeOutras'] = "00000000";
	   elseif(empty($dados['dt_ValidadeOutras'])) unset($dados['dt_ValidadeOutras']);
       else $dados['dt_ValidadeOutras'] = implode(array_reverse(explode("/", $dados['dt_ValidadeOutras'])));
	   $dados['exportado'] = 0;
	   if($this->participantes_convenio_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Convênio modificado e disponível para exportação!
		  <p class='right'> <a href = '". site_url('participantes_convenio/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
       }
       else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('participantes_convenio/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
       }
	   $dados['participantes_convenio'] = $this->participantes_convenio_m->lista_participantes_convenio();
       $dados['menu'] = $this->load->view("menu", NULL, true);
       $this->load->view('lista_participantes_convenio',$dados);
	}
}

?>
