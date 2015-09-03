<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of licitacoes
 *
 * @author vcerdeira
 */
class licitacoes extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('licitacoes_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['licitacoes'] = $this->licitacoes_m->lista_licitacoes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_licitacoes',$dados);
    }
	public function exportados(){
        $dados['licitacoes'] = $this->licitacoes_m->lista_licitacoes_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_licitacoes',$dados);
    }
    public function novo(){
        $dados['modalidade_licitacao'] = $this->tabelas_internas->modalidade_licitacao();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/nova_licitacao',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirLicitacao') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['nu_ProcessoLicitatorio'] = $this->input->post('nu_ProcessoLicitatorio');
             $dados['nu_DiarioOficial'] = $this->input->post('nu_DiarioOficial');
             $dados['dt_PublicacaoEdital'] = $this->input->post('dt_PublicacaoEdital');
             $dados['cd_Modalidade'] = $this->input->post('cd_Modalidade');
             $dados['de_ObjetoLicitacao'] = $this->input->post('de_ObjetoLicitacao');
             $dados['vl_TotalPrevisto'] = $this->input->post('vl_TotalPrevisto');
             $dados['nu_Edital'] = $this->input->post('nu_Edital');
             $dados['tp_Licitacao'] = $this->input->post('tp_Licitacao');
             
             $dados['dt_PublicacaoEdital'] = implode(array_reverse(explode("/", $dados['dt_PublicacaoEdital'])));
             
             $dados['exportado'] = 0;
             if($this->licitacoes_m->inserir_licitacao($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Licitação cadastrada com sucesso!
                <p class='right'> <a href = '". site_url('licitacoes/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('licitacoes/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['licitacoes'] = $this->licitacoes_m->lista_licitacoes();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_licitacoes',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['licitacoes'] = $this->licitacoes_m->exportar($ids);
            if($dados['licitacoes'] != NULL) $this->licitacoes_m->exportados($ids);
            $this->load->view('exportar/exportar_licitacoes',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhuma licitação selecionada!
                <p class='right'> <a href = '". site_url('licitacoes/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['licitacoes'] = $this->licitacoes_m->lista_licitacoes();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_licitacoes',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$licitacao = $this->licitacoes_m->consultar($dados);
		foreach($licitacao as $row){
			$row->dt_PublicacaoEdital = substr($row->dt_PublicacaoEdital,6,2).'/'.substr($row->dt_PublicacaoEdital,4,2).'/'.substr($row->dt_PublicacaoEdital,0,4);
		}
		$dados['licitacao'] = $licitacao;
		$dados['modalidade_licitacao'] = $this->tabelas_internas->modalidade_licitacao();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/licitacao',$dados);
	}
	public function update(){
		$dados['mes'] = $this->input->post('mes');
		$dados['nu_ProcessoLicitatorio'] = $this->input->post('nu_ProcessoLicitatorio');
        $dados['nu_DiarioOficial'] = $this->input->post('nu_DiarioOficial');
        $dados['dt_PublicacaoEdital'] = $this->input->post('dt_PublicacaoEdital');
        $dados['cd_Modalidade'] = $this->input->post('cd_Modalidade');
        $dados['de_ObjetoLicitacao'] = $this->input->post('de_ObjetoLicitacao');
        $dados['vl_TotalPrevisto'] = $this->input->post('vl_TotalPrevisto');
        $dados['nu_Edital'] = $this->input->post('nu_Edital');
        $dados['tp_Licitacao'] = $this->input->post('tp_Licitacao');
		$id = $this->input->post('id');
		if(empty($dados['nu_ProcessoLicitatorio'])) unset($dados['nu_ProcessoLicitatorio']);
	  	if(empty($dados['nu_DiarioOficial'])) unset($dados['nu_DiarioOficial']);
		if(empty($dados['dt_PublicacaoEdital'])) unset($dados['dt_PublicacaoEdital']);
		else $dados['dt_PublicacaoEdital'] = implode(array_reverse(explode("/", $dados['dt_PublicacaoEdital'])));
		if(empty($dados['de_ObjetoLicitacao'])) unset($dados['de_ObjetoLicitacao']);
	  	if(empty($dados['vl_TotalPrevisto'])) unset($dados['vl_TotalPrevisto']);
		if(empty($dados['nu_Edital'])) unset($dados['nu_Edital']);
		$dados['exportado'] = 0;
		if($this->licitacoes_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Licitação modificada e disponível para exportação!
		  <p class='right'> <a href = '". site_url('licitacoes/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
        }
        else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('licitacoes/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
        }
		$dados['licitacoes'] = $this->licitacoes_m->lista_licitacoes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_licitacoes',$dados);
	}
}

?>
