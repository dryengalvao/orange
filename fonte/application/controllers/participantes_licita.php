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
class participantes_licita extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('participantes_licita_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['participantes_licitacao'] = $this->participantes_licita_m->lista_participantes_licitacao();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_participantes_licitacao',$dados);
    }
	public function exportados(){
        $dados['participantes_licitacao'] = $this->participantes_licita_m->lista_participantes_licitacao_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_participantes_licitacao',$dados);
    }
    public function novo(){
        $dados['tipo_participante_licitacao'] = $this->tabelas_internas->tipo_participante_licitacao();
        $dados['tipo_pessoa'] = $this->tabelas_internas->tipo_pessoa();
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/novo_participante_licitacao',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirParticipanteLicitacao') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
             $dados['cd_CicParticipante'] = $this->input->post('cd_CicParticipante');
             $dados['tp_Pessoa'] = $this->input->post('tp_Pessoa');
             $dados['nm_Participante'] = $this->input->post('nm_Participante');
             $dados['tp_Participacao'] = $this->input->post('tp_Participacao');
             $dados['cd_CGCConsorcio'] = $this->input->post('cd_CGCConsorcio');
			 $dados['tp_Convidado'] = $this->input->post('tp_Convidado');
             $dados['exportado'] = 0;
             
             if($this->participantes_licita_m->inserir_participante_licitacao($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Participante cadastrado com sucesso!
                <p class='right'> <a href = '". site_url('participantes_licita/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('participantes_licita/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['participantes_licitacao'] = $this->participantes_licita_m->lista_participantes_licitacao();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_participantes_licitacao',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['participantes_licitacao'] = $this->participantes_licita_m->exportar($ids);
            if($dados['participantes_licitacao'] != NULL) $this->participantes_licita_m->exportados($ids);
            $this->load->view('exportar/exportar_participantes_licitacao',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhum participante selecionado!
                <p class='right'> <a href = '". site_url('participantes_licita/principal')."' style='text-decoration:none'>
                    fechar </a></p></div>";
            $dados['participantes_licitacao'] = $this->participantes_licita_m->lista_participantes_licitacao();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_participantes_licitacao',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$dados['participantes_licitacao'] = $this->participantes_licita_m->consultar($dados);
		$dados['tipo_participante_licitacao'] = $this->tabelas_internas->tipo_participante_licitacao();
        $dados['tipo_pessoa'] = $this->tabelas_internas->tipo_pessoa();
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/participante_licitacao',$dados);		
	}
	public function update(){
		$dados['mes'] = $this->input->post('mes');
		$dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
        $dados['cd_CicParticipante'] = $this->input->post('cd_CicParticipante');
        $dados['tp_Pessoa'] = $this->input->post('tp_Pessoa');
        $dados['nm_Participante'] = $this->input->post('nm_Participante');
        $dados['tp_Participacao'] = $this->input->post('tp_Participacao');
        $dados['cd_CGCConsorcio'] = $this->input->post('cd_CGCConsorcio');
		$dados['tp_Convidado'] = $this->input->post('tp_Convidado');
		$id = $this->input->post('id');
		if(empty($dados['cd_CicParticipante'])) unset($dados['cd_CicParticipante']);
	  	if(empty($dados['nm_Participante'])) unset($dados['nm_Participante']);
		if(empty($dados['cd_CGCConsorcio'])) unset($dados['cd_CGCConsorcio']);
		$dados['exportado'] = 0;
		if($this->participantes_licita_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Participante modificado e disponível para exportação!
		  <p class='right'> <a href = '". site_url('participantes_licita/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
        }
        else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('participantes_licita/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
        }
		$dados['participantes_licitacao'] = $this->participantes_licita_m->lista_participantes_licitacao();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_participantes_licitacao',$dados);		
	}
}

?>
