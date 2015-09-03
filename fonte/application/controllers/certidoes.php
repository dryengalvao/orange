<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of certidoes
 *
 * @author vcerdeira
 */
class certidoes extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('certidoes_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['certidoes'] = $this->certidoes_m->lista_certidoes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_certidoes',$dados);
    }
	public function exportados(){
        $dados['certidoes'] = $this->certidoes_m->lista_certidoes_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_certidoes',$dados);
    }
    public function novo(){
        $dados['tipo_pessoa'] = $this->tabelas_internas->tipo_pessoa();
        $dados['tipo_certidao'] = $this->tabelas_internas->tipo_certidao();
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
        $dados['meses'] = $this->tabelas_internas->mes();
		$dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/nova_certidao',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirCertidao') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['tp_Certidao'] = $this->input->post('tp_Certidao');
             $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
             $dados['tp_Pessoa'] = $this->input->post('tp_Pessoa');
             $dados['cd_CicParticipante'] = $this->input->post('cd_CicParticipante');
             $dados['nu_Certidao'] = $this->input->post('nu_Certidao');
             $dados['dt_EmissaoCertidao'] = $this->input->post('dt_EmissaoCertidao');
             $dados['dt_ValidadeCertidao'] = $this->input->post('dt_ValidadeCertidao');
             
             $dados['dt_EmissaoCertidao'] = implode(array_reverse(explode("/", $dados['dt_EmissaoCertidao'])));
             $dados['dt_ValidadeCertidao'] = implode(array_reverse(explode("/", $dados['dt_ValidadeCertidao'])));
             $dados['nu_Certidao'] = implode(array_reverse(explode("/", $dados['nu_Certidao'])));
             $dados['exportado'] = 0;
             if($this->certidoes_m->inserir_certidao($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Certidão cadastrada com sucesso!
                <p class='right'> <a href = '". site_url('certidoes/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('certidoes/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['certidoes'] = $this->certidoes_m->lista_certidoes();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_certidoes',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['certidoes'] = $this->certidoes_m->exportar($ids);
            if($dados['certidoes'] != NULL) $this->certidoes_m->exportados($ids);
            $this->load->view('exportar/exportar_certidoes',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhuma certidão selecionada!
                <p class='right'> <a href = '". site_url('certidoes/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['certidoes'] = $this->certidoes_m->lista_certidoes();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_certidoes',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$certidoes = $this->certidoes_m->consultar($dados);
		foreach($certidoes as $row){
			$row->dt_EmissaoCertidao = substr($row->dt_EmissaoCertidao,6,2).'/'.substr($row->dt_EmissaoCertidao,4,2).'/'.substr($row->dt_EmissaoCertidao,0,4);
			$row->dt_ValidadeCertidao = substr($row->dt_ValidadeCertidao,6,2).'/'.substr($row->dt_ValidadeCertidao,4,2).'/'.substr($row->dt_ValidadeCertidao,0,4);
		}
		$dados['certidoes'] = $certidoes;
		$dados['tipo_pessoa'] = $this->tabelas_internas->tipo_pessoa();
        $dados['tipo_certidao'] = $this->tabelas_internas->tipo_certidao();
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/certidao',$dados);		
	}
	public function update(){
		$dados['mes'] = $this->input->post('mes');
		$dados['tp_Certidao'] = $this->input->post('tp_Certidao');
        $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
        $dados['tp_Pessoa'] = $this->input->post('tp_Pessoa');
        $dados['cd_CicParticipante'] = $this->input->post('cd_CicParticipante');
        $dados['nu_Certidao'] = $this->input->post('nu_Certidao');
        $dados['dt_EmissaoCertidao'] = $this->input->post('dt_EmissaoCertidao');
        $dados['dt_ValidadeCertidao'] = $this->input->post('dt_ValidadeCertidao');
		$id = $this->input->post('id');
		if(empty($dados['cd_CicParticipante'])) unset($dados['cd_CicParticipante']);
	  	if(empty($dados['nu_Certidao'])) unset($dados['nu_Certidao']);
		if(empty($dados['dt_EmissaoCertidao'])) unset($dados['dt_EmissaoCertidao']);
		else $dados['dt_EmissaoCertidao'] = implode(array_reverse(explode("/", $dados['dt_EmissaoCertidao'])));
		if(empty($dados['dt_ValidadeCertidao'])) unset($dados['dt_ValidadeCertidao']);
		else $dados['dt_ValidadeCertidao'] = implode(array_reverse(explode("/", $dados['dt_ValidadeCertidao'])));
		$dados['exportado'] = 0;
		if($this->certidoes_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Certidão modificada e disponível para exportação!
		  <p class='right'> <a href = '". site_url('certidoes/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
        }
        else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('certidoes/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
        }
		$dados['certidoes'] = $this->certidoes_m->lista_certidoes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_certidoes',$dados);		
	}
}

?>
