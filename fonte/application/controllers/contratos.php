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
class contratos extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('contratos_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['contratos'] = $this->contratos_m->lista_contratos();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_contratos',$dados);
    }
	public function exportados(){
        $dados['contratos'] = $this->contratos_m->lista_contratos_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_contratos',$dados);
    }
    public function novo(){
        $dados['tipo_contrato'] = $this->tabelas_internas->tipo_contrato();
        $dados['tipo_pessoa'] = $this->tabelas_internas->tipo_pessoa();
        $dados['tipo_moeda'] = $this->tabelas_internas->tipo_moeda();
		$dados['tipo_do_aditivo'] = $this->tabelas_internas->tipo_do_aditivo();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/novo_contrato',$dados);
    }
	
    public function inserir(){
         if($this->form_validation->run('inserirContrato') == FALSE){
             $this->novo();
         }else{
             $dados['nu_Contrato'] = $this->input->post('nu_contrato');
             $dados['vl_Contrato'] = $this->input->post('vl_contrato');
			 $dados['competencia'] = $this->input->post('competencia');
             $dados['cnpj_UgContrato'] = $this->input->post('cnpj_UgContrato');
             $dados['cd_Moeda'] = $this->input->post('cd_moeda');
             $dados['tp_Contrato'] = $this->input->post('tp_contrato');
			 $dados['tp_Aditivo'] = $this->input->post('tp_Aditivo');
             $dados['nu_ContratoSuperior'] = $this->input->post('nu_ContratoSuperior');
             $dados['nu_ProcessoLicitator'] = $this->input->post('nu_processoLicitatorio');
             $dados['dt_AssinaturaContrato'] = $this->input->post('dt_assinaturaContrato');
             $dados['dt_VencimentoContrato'] = $this->input->post('dt_vencimentoContrato');
             $dados['mes'] = $this->input->post('mes');
			 $dados['tp_PessoaContratado'] = $this->input->post('tp_pessoaContratado');
             $dados['cd_CicContratado'] = $this->input->post('cd_cicContratado');
             $dados['nm_Contratado'] = $this->input->post('nm_contratado');
             $dados['de_ObjetivoContrato'] = $this->input->post('de_objetivoContrato');
             $dados['nu_DiarioOficial'] = $this->input->post('nu_diarioOficial');
             $dados['dt_Publicacao'] = $this->input->post('dt_publicacao');
             $dados['st_RecebeValor'] = $this->input->post('st_RecebeValor');
             $dados['nu_CertidaoINSS'] = $this->input->post('nu_certidaoINSS');
             $dados['dt_CertidaoINSS'] = $this->input->post('dt_certidaoINSS');
             $dados['dt_ValidadeINSS'] = $this->input->post('dt_validadeINSS');
             $dados['nu_CertidaoFGTS'] = $this->input->post('nu_certidaoFGTS');
             $dados['dt_CertidaoFGTS'] = $this->input->post('dt_certidaoFGTS');
             $dados['dt_ValidadeFGTS'] = $this->input->post('dt_validadeFGTS');
             $dados['nu_CertidaoFazendaMunicipal'] = $this->input->post('nu_certidaoFazendaMunicipal');
             $dados['dt_CertidaoFazendaMunicipal'] = $this->input->post('dt_certidaoFazendaMunicipal');
             $dados['dt_ValidadeFazendaMunicipal'] = $this->input->post('dt_validadeFazendaMunicipal');
             $dados['nu_CertidaoFazendaEstadual'] = $this->input->post('nu_certidaoFazendaEstadual');
             $dados['dt_CertidaoFazendaEstadual'] = $this->input->post('dt_certidaoFazendaEstadual');
             $dados['dt_ValidadeFazendaEstadual'] = $this->input->post('dt_validadeFazendaEstadual');
             $dados['nu_CertidaoFazendaFederal'] = $this->input->post('nu_certidaoFazendaFederal');
             $dados['dt_CertidaoFazendaFederal'] = $this->input->post('dt_certidaoFazendaFederal');
             $dados['dt_ValidadeFazendaFederal'] = $this->input->post('dt_validadeFazendaFederal');
             $dados['nu_CertidaoCNDT'] = $this->input->post('nu_certidaoCNDT');
             $dados['dt_certidaoCNDT'] = $this->input->post('dt_certidaoCNDT');
             $dados['dt_validadeCNDT'] = $this->input->post('dt_validadeCNDT');
			 $dados['nu_CertidaoOutras'] = $this->input->post('nu_certidaoOutras');
             $dados['dt_CertidaoOutras'] = $this->input->post('dt_certidaoOutras');
             $dados['dt_ValidadeOutras'] = $this->input->post('dt_validadeOutras');
			 
			 if($dados['dt_AssinaturaContrato'] == 0) $dados['dt_AssinaturaContrato'] = "00000000";
             else $dados['dt_AssinaturaContrato'] = implode(array_reverse(explode("/", $dados['dt_AssinaturaContrato'])));
             if($dados['dt_VencimentoContrato'] == 0) $dados['dt_VencimentoContrato'] = "00000000";
             else $dados['dt_VencimentoContrato'] = implode(array_reverse(explode("/", $dados['dt_VencimentoContrato'])));
			 if($dados['dt_Publicacao'] == 0) $dados['dt_Publicacao'] = "00000000";
             else $dados['dt_Publicacao'] = implode(array_reverse(explode("/", $dados['dt_Publicacao'])));
             if($dados['dt_CertidaoINSS'] == 0) $dados['dt_CertidaoINSS'] = "00000000";
             else $dados['dt_CertidaoINSS'] = implode(array_reverse(explode("/", $dados['dt_CertidaoINSS'])));
			 if($dados['dt_ValidadeINSS'] == 0) $dados['dt_ValidadeINSS'] = "00000000";
             else $dados['dt_ValidadeINSS'] = implode(array_reverse(explode("/", $dados['dt_ValidadeINSS'])));
             if($dados['dt_CertidaoFGTS'] == 0) $dados['dt_CertidaoFGTS'] = "00000000";
             else $dados['dt_CertidaoFGTS'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFGTS'])));
			 if($dados['dt_ValidadeFGTS'] == 0) $dados['dt_ValidadeFGTS'] = "00000000";
             else $dados['dt_ValidadeFGTS'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFGTS'])));
             if($dados['dt_CertidaoFazendaMunicipal'] == 0) $dados['dt_CertidaoFazendaMunicipal'] = "00000000";
             else $dados['dt_CertidaoFazendaMunicipal'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFazendaMunicipal'])));
			 if($dados['dt_ValidadeFazendaMunicipal'] == 0) $dados['dt_ValidadeFazendaMunicipal'] = "00000000";
             else $dados['dt_ValidadeFazendaMunicipal'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFazendaMunicipal'])));
             if($dados['dt_CertidaoFazendaEstadual'] == 0) $dados['dt_CertidaoFazendaEstadual'] = "00000000";
             else $dados['dt_CertidaoFazendaEstadual'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFazendaEstadual'])));
			 if($dados['dt_ValidadeFazendaEstadual'] == 0) $dados['dt_ValidadeFazendaEstadual'] = "00000000";
             else $dados['dt_ValidadeFazendaEstadual'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFazendaEstadual'])));
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
			 if($dados['nu_CertidaoINSS'] == 0) $dados['nu_CertidaoINSS'] = " ";
			 else $dados['nu_CertidaoINSS'] = implode(explode("/", $dados['nu_CertidaoINSS']));
             if($dados['nu_CertidaoFGTS'] == 0) $dados['nu_CertidaoFGTS'] = " ";
			 else $dados['nu_CertidaoFGTS'] = implode(explode("/", $dados['nu_CertidaoFGTS']));
             if($dados['nu_CertidaoFazendaMunicipal'] == 0) $dados['nu_CertidaoFazendaMunicipal'] = " ";
			 else $dados['nu_CertidaoFazendaMunicipal'] = implode(explode("/", $dados['nu_CertidaoFazendaMunicipal']));
             if($dados['nu_CertidaoFazendaEstadual'] == 0) $dados['nu_CertidaoFazendaEstadual'] = " ";
			 else $dados['nu_CertidaoFazendaEstadual'] = implode(explode("/", $dados['nu_CertidaoFazendaEstadual']));
             if($dados['nu_CertidaoFazendaFederal'] == 0) $dados['nu_CertidaoFazendaFederal'] = " ";
			 else $dados['nu_CertidaoFazendaFederal'] = implode(explode("/", $dados['nu_CertidaoFazendaFederal']));
			 if($dados['nu_CertidaoOutras'] == 0) $dados['nu_CertidaoOutras'] = " ";
			 else $dados['nu_CertidaoOutras'] = implode(explode("/", $dados['nu_CertidaoOutras']));
			 if($dados['nu_CertidaoCNDT'] == 0) $dados['nu_CertidaoCNDT'] = " ";
			 else $dados['nu_CertidaoCNDT'] = implode(explode("/", $dados['nu_CertidaoCNDT']));
             $dados['exportado'] = 0;
             if($this->contratos_m->inserir_contratos($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Contrato cadastrado com sucesso!
                <p class='right'> <a href = '". site_url('contratos/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('contratos/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['contratos'] = $this->contratos_m->lista_contratos();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_contratos',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['contratos'] = $this->contratos_m->exportar($ids);
            if($dados['contratos'] != NULL) $this->contratos_m->exportados($ids);
            $this->load->view('exportar/exportar_contratos',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhum contrato selecionado!
                <p class='right'> <a href = '". site_url('contratos/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['contratos'] = $this->contratos_m->lista_contratos();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_contratos',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$contrato = $this->contratos_m->consultar($dados);
		foreach($contrato as $row){
			$row->dt_AssinaturaContrato = substr($row->dt_AssinaturaContrato,6,2).'/'.substr($row->dt_AssinaturaContrato,4,2).'/'.substr($row->dt_AssinaturaContrato,0,4);
			$row->dt_VencimentoContrato = substr($row->dt_VencimentoContrato,6,2).'/'.substr($row->dt_VencimentoContrato,4,2).'/'.substr($row->dt_VencimentoContrato,0,4);
			$row->dt_Publicacao = substr($row->dt_Publicacao,6,2).'/'.substr($row->dt_Publicacao,4,2).'/'.substr($row->dt_Publicacao,0,4);
			$row->dt_CertidaoINSS = substr($row->dt_CertidaoINSS,6,2).'/'.substr($row->dt_CertidaoINSS,4,2).'/'.substr($row->dt_CertidaoINSS,0,4);
			$row->dt_ValidadeINSS = substr($row->dt_ValidadeINSS,6,2).'/'.substr($row->dt_ValidadeINSS,4,2).'/'.substr($row->dt_ValidadeINSS,0,4);
			$row->dt_CertidaoFGTS = substr($row->dt_CertidaoFGTS,6,2).'/'.substr($row->dt_CertidaoFGTS,4,2).'/'.substr($row->dt_CertidaoFGTS,0,4);
			$row->dt_ValidadeFGTS = substr($row->dt_ValidadeFGTS,6,2).'/'.substr($row->dt_ValidadeFGTS,4,2).'/'.substr($row->dt_ValidadeFGTS,0,4);
			$row->dt_CertidaoFazendaEstadual = substr($row->dt_CertidaoFazendaEstadual,6,2).'/'.substr($row->dt_CertidaoFazendaEstadual,4,2).'/'.substr($row->dt_CertidaoFazendaEstadual,0,4);
			$row->dt_ValidadeFazendaEstadual = substr($row->dt_ValidadeFazendaEstadual,6,2).'/'.substr($row->dt_ValidadeFazendaEstadual,4,2).'/'.substr($row->dt_ValidadeFazendaEstadual,0,4);
			$row->dt_CertidaoFazendaMunicipal = substr($row->dt_CertidaoFazendaMunicipal,6,2).'/'.substr($row->dt_CertidaoFazendaMunicipal,4,2).'/'.substr($row->dt_CertidaoFazendaMunicipal,0,4);
			$row->dt_ValidadeFazendaMunicipal = substr($row->dt_ValidadeFazendaMunicipal,6,2).'/'.substr($row->dt_ValidadeFazendaMunicipal,4,2).'/'.substr($row->dt_ValidadeFazendaMunicipal,0,4);
			$row->dt_CertidaoFazendaFederal = substr($row->dt_CertidaoFazendaFederal,6,2).'/'.substr($row->dt_CertidaoFazendaFederal,4,2).'/'.substr($row->dt_CertidaoFazendaFederal,0,4);
			$row->dt_ValidadeFazendaFederal = substr($row->dt_ValidadeFazendaFederal,6,2).'/'.substr($row->dt_ValidadeFazendaFederal,4,2).'/'.substr($row->dt_ValidadeFazendaFederal,0,4);
			$row->dt_CertidaoOutras = substr($row->dt_CertidaoOutras,6,2).'/'.substr($row->dt_CertidaoOutras,4,2).'/'.substr($row->dt_CertidaoOutras,0,4);
			$row->dt_ValidadeOutras = substr($row->dt_ValidadeOutras,6,2).'/'.substr($row->dt_ValidadeOutras,4,2).'/'.substr($row->dt_ValidadeOutras,0,4);
			$row->dt_certidaoCNDT = substr($row->dt_certidaoCNDT,6,2).'/'.substr($row->dt_certidaoCNDT,4,2).'/'.substr($row->dt_CertidaoOutras,0,4);
			$row->dt_validadeCNDT = substr($row->dt_validadeCNDT,6,2).'/'.substr($row->dt_validadeCNDT,4,2).'/'.substr($row->dt_ValidadeOutras,0,4);
			if($row->nu_CertidaoINSS == " ") $row->nu_CertidaoINSS = 0;
			if($row->nu_CertidaoFGTS == " ") $row->nu_CertidaoFGTS = 0;
			if($row->nu_CertidaoCNDT == " ") $row->nu_CertidaoCNDT = 0;
			if($row->nu_CertidaoOutras == " ") $row->nu_CertidaoOutras = 0;
			if($row->nu_CertidaoFazendaFederal == " ") $row->nu_CertidaoFazendaFederal = 0;
			if($row->nu_CertidaoFazendaMunicipal == " ") $row->nu_CertidaoFazendaMunicipal = 0;
			if($row->nu_CertidaoFazendaEstadual == " ") $row->nu_CertidaoFazendaEstadual = 0;
		}
		$dados['contrato'] = $contrato;
		$dados['tipo_contrato'] = $this->tabelas_internas->tipo_contrato();
        $dados['tipo_pessoa'] = $this->tabelas_internas->tipo_pessoa();
        $dados['tipo_moeda'] = $this->tabelas_internas->tipo_moeda();
		$dados['tipo_do_aditivo'] = $this->tabelas_internas->tipo_do_aditivo();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
		$this->load->view('editar/contrato',$dados);
	}
	public function update(){
	   $dados['nu_Contrato'] = $this->input->post('nu_contrato');
	   $dados['vl_Contrato'] = $this->input->post('vl_contrato');
	   $dados['competencia'] = $this->input->post('competencia');
       $dados['cnpj_UgContrato'] = $this->input->post('cnpj_UgContrato');
	   $dados['cd_Moeda'] = $this->input->post('cd_moeda');
	   $dados['tp_Aditivo'] = $this->input->post('tp_Aditivo');
       $dados['nu_ContratoSuperior'] = $this->input->post('nu_ContratoSuperior');
	   $dados['tp_Contrato'] = $this->input->post('tp_contrato');
	   $dados['nu_ProcessoLicitator'] = $this->input->post('nu_processoLicitatorio');
	   $dados['dt_AssinaturaContrato'] = $this->input->post('dt_assinaturaContrato');
	   $dados['dt_VencimentoContrato'] = $this->input->post('dt_vencimentoContrato');
	   $dados['mes'] = $this->input->post('mes');
	   $dados['tp_PessoaContratado'] = $this->input->post('tp_pessoaContratado');
	   $dados['cd_CicContratado'] = $this->input->post('cd_cicContratado');
	   $dados['nm_Contratado'] = $this->input->post('nm_contratado');
	   $dados['de_ObjetivoContrato'] = $this->input->post('de_objetivoContrato');
	   $dados['nu_DiarioOficial'] = $this->input->post('nu_diarioOficial');
	   $dados['dt_Publicacao'] = $this->input->post('dt_publicacao');
	   $dados['st_RecebeValor'] = $this->input->post('st_RecebeValor');
	   $dados['nu_CertidaoINSS'] = $this->input->post('nu_certidaoINSS');
	   $dados['dt_CertidaoINSS'] = $this->input->post('dt_certidaoINSS');
	   $dados['dt_ValidadeINSS'] = $this->input->post('dt_validadeINSS');
	   $dados['nu_CertidaoFGTS'] = $this->input->post('nu_certidaoFGTS');
	   $dados['dt_CertidaoFGTS'] = $this->input->post('dt_certidaoFGTS');
	   $dados['dt_ValidadeFGTS'] = $this->input->post('dt_validadeFGTS');
	   $dados['nu_CertidaoFazendaMunicipal'] = $this->input->post('nu_certidaoFazendaMunicipal');
	   $dados['dt_CertidaoFazendaMunicipal'] = $this->input->post('dt_certidaoFazendaMunicipal');
	   $dados['dt_ValidadeFazendaMunicipal'] = $this->input->post('dt_validadeFazendaMunicipal');
	   $dados['nu_CertidaoFazendaEstadual'] = $this->input->post('nu_certidaoFazendaEstadual');
	   $dados['dt_CertidaoFazendaEstadual'] = $this->input->post('dt_certidaoFazendaEstadual');
	   $dados['dt_ValidadeFazendaEstadual'] = $this->input->post('dt_validadeFazendaEstadual');
	   $dados['nu_CertidaoFazendaFederal'] = $this->input->post('nu_certidaoFazendaFederal');
	   $dados['dt_CertidaoFazendaFederal'] = $this->input->post('dt_certidaoFazendaFederal');
	   $dados['dt_ValidadeFazendaFederal'] = $this->input->post('dt_validadeFazendaFederal');
	   $dados['nu_CertidaoOutras'] = $this->input->post('nu_certidaoOutras');
	   $dados['dt_CertidaoOutras'] = $this->input->post('dt_certidaoOutras');
	   $dados['dt_ValidadeOutras'] = $this->input->post('dt_validadeOutras');
	   $id = $this->input->post('id');
	   
	   if(empty($dados['nu_Contrato'])) unset($dados['nu_Contrato']);
	   if(empty($dados['vl_Contrato'])) unset($dados['vl_Contrato']);
	   if(empty($dados['competencia'])) unset($dados['competencia']);
	   if(empty($dados['cnpj_UgContrato'])) unset($dados['cnpj_UgContrato']);
	   if(empty($dados['nu_ProcessoLicitator'])) unset($dados['nu_ProcessoLicitator']);
	   if(empty($dados['dt_AssinaturaContrato'])) unset($dados['dt_AssinaturaContrato']);
       else $dados['dt_AssinaturaContrato'] = implode(array_reverse(explode("/", $dados['dt_AssinaturaContrato'])));
	   
	   if(empty($dados['dt_VencimentoContrato'])) unset($dados['dt_VencimentoContrato']);
       else $dados['dt_VencimentoContrato'] = implode(array_reverse(explode("/", $dados['dt_VencimentoContrato'])));
	   
	   if(empty($dados['cd_CicContratado'])) unset($dados['cd_CicContratado']);
	   if(empty($dados['nm_Contratado'])) unset($dados['nm_Contratado']);
	   if(empty($dados['de_ObjetivoContrato'])) unset($dados['de_ObjetivoContrato']);
	   if(empty($dados['nu_DiarioOficial'])) unset($dados['nu_DiarioOficial']);
	   
	   if(empty($dados['dt_Publicacao'])) unset($dados['dt_Publicacao']);
       else $dados['dt_Publicacao'] = implode(array_reverse(explode("/", $dados['dt_Publicacao'])));
	   
	   if(empty($dados['nu_CertidaoFazendaMunicipal'])) unset($dados['nu_CertidaoFazendaMunicipal']);
	   else $dados['nu_CertidaoFazendaMunicipal'] = implode(explode("/", $dados['nu_CertidaoFazendaMunicipal']));
	   if(empty($dados['nu_CertidaoFazendaEstadual'])) unset($dados['nu_CertidaoFazendaEstadual']);
	   else $dados['nu_CertidaoFazendaEstadual'] = implode(explode("/", $dados['nu_CertidaoFazendaEstadual']));
	   if(empty($dados['nu_CertidaoFazendaFederal'])) unset($dados['nu_CertidaoFazendaFederal']);
	   else $dados['nu_CertidaoFazendaFederal'] = implode(explode("/", $dados['nu_CertidaoFazendaFederal']));
	   if(empty($dados['nu_CertidaoOutras'])) unset($dados['nu_CertidaoOutras']);
	   else $dados['nu_CertidaoOutras'] = implode(explode("/", $dados['nu_CertidaoOutras']));
	   
	   if($dados['nu_CertidaoINSS'] == 0) $dados['nu_CertidaoINSS'] = " ";
	   elseif(empty($dados['nu_CertidaoINSS'])) unset($dados['nu_CertidaoINSS']);
	   
	   if($dados['nu_CertidaoFGTS'] == 0) $dados['nu_CertidaoFGTS'] = " ";
	   elseif(empty($dados['nu_CertidaoFGTS'])) unset($dados['nu_CertidaoFGTS']);
	   
	   if($dados['dt_CertidaoINSS'] == 0) $dados['dt_CertidaoINSS'] = "00000000";
	   elseif(empty($dados['dt_CertidaoINSS'])) unset($dados['dt_CertidaoINSS']);
       else $dados['dt_CertidaoINSS'] = implode(array_reverse(explode("/", $dados['dt_CertidaoINSS'])));
	   
	   if($dados['dt_ValidadeINSS'] == 0) $dados['dt_ValidadeINSS'] = "00000000";
	   elseif(empty($dados['dt_ValidadeINSS'])) unset($dados['dt_ValidadeINSS']);
       else $dados['dt_ValidadeINSS'] = implode(array_reverse(explode("/", $dados['dt_ValidadeINSS'])));
	   
	   if($dados['dt_CertidaoFGTS'] == 0) $dados['dt_CertidaoFGTS'] = "00000000";
	   elseif(empty($dados['dt_CertidaoFGTS'])) unset($dados['dt_CertidaoFGTS']);
       else $dados['dt_CertidaoFGTS'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFGTS'])));
	   
	   if($dados['dt_ValidadeFGTS'] == 0) $dados['dt_ValidadeFGTS'] = "00000000";
	   elseif(empty($dados['dt_ValidadeFGTS'])) unset($dados['dt_ValidadeFGTS']);
       else $dados['dt_ValidadeFGTS'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFGTS'])));
	   
	   if($dados['dt_CertidaoFazendaEstadual'] == 0) $dados['dt_CertidaoFazendaEstadual'] = "00000000";
	   elseif(empty($dados['dt_CertidaoFazendaEstadual'])) unset($dados['dt_CertidaoFazendaEstadual']);
       else $dados['dt_CertidaoFazendaEstadual'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFazendaEstadual'])));
	   
	   if($dados['dt_ValidadeFazendaEstadual'] == 0) $dados['dt_ValidadeFazendaEstadual'] = "00000000";
	   elseif(empty($dados['dt_ValidadeFazendaEstadual'])) unset($dados['dt_ValidadeFazendaEstadual']);
       else $dados['dt_ValidadeFazendaEstadual'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFazendaEstadual'])));
	   
	   if($dados['dt_CertidaoFazendaMunicipal'] == 0) $dados['dt_CertidaoFazendaMunicipal'] = "00000000";
	   elseif(empty($dados['dt_CertidaoFazendaMunicipal'])) unset($dados['dt_CertidaoFazendaMunicipal']);
       else $dados['dt_CertidaoFazendaMunicipal'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFazendaMunicipal'])));
	   
	   if($dados['dt_ValidadeFazendaMunicipal'] == "0") $dados['dt_ValidadeFazendaMunicipal'] = "00000000";
	   elseif(empty($dados['dt_ValidadeFazendaMunicipal'])) unset($dados['dt_ValidadeFazendaMunicipal']);
       else $dados['dt_ValidadeFazendaMunicipal'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFazendaMunicipal'])));
	   
	   if($dados['dt_CertidaoFazendaFederal'] == 0) $dados['dt_CertidaoFazendaFederal'] = "00000000";
	   elseif(empty($dados['dt_CertidaoFazendaFederal'])) unset($dados['dt_CertidaoFazendaFederal']);
       else $dados['dt_CertidaoFazendaFederal'] = implode(array_reverse(explode("/", $dados['dt_CertidaoFazendaFederal'])));
	   
	   if($dados['dt_ValidadeFazendaFederal'] == 0) $dados['dt_ValidadeFazendaFederal'] = "00000000";
	   elseif(empty($dados['dt_ValidadeFazendaFederal'])) unset($dados['dt_ValidadeFazendaFederal']);
       else $dados['dt_ValidadeFazendaFederal'] = implode(array_reverse(explode("/", $dados['dt_ValidadeFazendaFederal'])));
	   
	   if($dados['dt_CertidaoOutras'] == 0) $dados['dt_CertidaoOutras'] = "00000000";
	   elseif(empty($dados['dt_CertidaoOutras'])) unset($dados['dt_CertidaoOutras']);
       else $dados['dt_CertidaoOutras'] = implode(array_reverse(explode("/", $dados['dt_CertidaoOutras'])));
	   
	   if($dados['dt_ValidadeOutras'] == 0) $dados['dt_ValidadeOutras'] = "00000000";
	   elseif(empty($dados['dt_ValidadeOutras'])) unset($dados['dt_ValidadeOutras']);
       else $dados['dt_ValidadeOutras'] = implode(array_reverse(explode("/", $dados['dt_ValidadeOutras'])));
	   $dados['exportado'] = 0;
	   if($this->contratos_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Contrato modificado e disponível para exportação!
		  <p class='right'> <a href = '". site_url('contratos/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
       }
       else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('contratos/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
       }
	   $dados['contratos'] = $this->contratos_m->lista_contratos();
	   $dados['menu'] = $this->load->view("menu", NULL, true);
	   $this->load->view('lista_contratos',$dados);
	}
}

?>
