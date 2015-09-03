<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of licitacao_empenho
 *
 * @author vcerdeira
 */
class licitacao_empenho extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('licitacao_empenho_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['licitacao_empenho'] = $this->licitacao_empenho_m->lista_licitacao_empenho();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_licitacao_empenho',$dados);
    }
	public function exportados(){
        $dados['licitacao_empenho'] = $this->licitacao_empenho_m->lista_licitacao_empenho_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_licitacao_empenho',$dados);
    }
    public function novo(){
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/nova_licitacao_empenho',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirLicitacaoEmpenho') == FALSE){
             $this->novo();
         }else{
			 $notaE2 = TRUE;
			 $notaE3 = TRUE;
			 $dados['mes'] = $this->input->post('mes');
             $dados['id_licitacao'] = $this->input->post('nu_licitacao');
             $dados['nu_NotaEmpenho'] = $this->input->post('nu_NotaEmpenho');
			 $notaE['nu_NotaEmpenho2'] = $this->input->post('nu_NotaEmpenho2');
			 $notaE['nu_NotaEmpenho3'] = $this->input->post('nu_NotaEmpenho3');
             $dados['ano_Empenho'] = $this->input->post('ano_Empenho');
             $dados['cd_UnidadeOrcamentaria'] = $this->input->post('cd_UnidadeOrcamentaria');
             $dados['exportado'] = 0;
			 $notaE1 = $this->licitacao_empenho_m->inserir_licitacao_empenho($dados);
			 if(!empty($notaE['nu_NotaEmpenho2'])) {
				$dados['nu_NotaEmpenho'] = $notaE['nu_NotaEmpenho2'];
			 	$notaE2 = $this->licitacao_empenho_m->inserir_licitacao_empenho($dados);
			 }
			 if(!empty($notaE['nu_NotaEmpenho3'])) {
				$dados['nu_NotaEmpenho'] = $notaE['nu_NotaEmpenho3'];
			 	$notaE3 = $this->licitacao_empenho_m->inserir_licitacao_empenho($dados);
			 }
             if($notaE1 == TRUE && $notaE2 == TRUE && $notaE3 == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Notas de empenho cadastradas com sucesso!
                <p class='right'> <a href = '". site_url('licitacao_empenho/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('licitacao_empenho/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['licitacao_empenho'] = $this->licitacao_empenho_m->lista_licitacao_empenho();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_licitacao_empenho',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['licitacao_empenho'] = $this->licitacao_empenho_m->exportar($ids);
            if($dados['licitacao_empenho'] != NULL) $this->licitacao_empenho_m->exportados($ids);
            $this->load->view('exportar/exportar_licitacao_empenho',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhuma nota de empenho selecionada!
                <p class='right'> <a href = '". site_url('licitacao_empenho/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['licitacao_empenho'] = $this->licitacao_empenho_m->lista_licitacao_empenho();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_licitacao_empenho',$dados);
        }        
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$dados['licitacao_empenho'] = $this->licitacao_empenho_m->consultar($dados);
		$dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/licitacao_empenho',$dados);
	}
	public function update(){
		$dados['mes'] = $this->input->post('mes');
		$dados['id_licitacao'] = $this->input->post('nu_licitacao');
	    $dados['nu_NotaEmpenho'] = $this->input->post('nu_NotaEmpenho');
	    $dados['ano_Empenho'] = $this->input->post('ano_Empenho');
	    $dados['cd_UnidadeOrcamentaria'] = $this->input->post('cd_UnidadeOrcamentaria');
		$id = $this->input->post('id');
		if(empty($dados['nu_NotaEmpenho'])) unset($dados['nu_NotaEmpenho']);
	  	if(empty($dados['ano_Empenho'])) unset($dados['ano_Empenho']);
		if(empty($dados['cd_UnidadeOrcamentaria'])) unset($dados['cd_UnidadeOrcamentaria']);
		$dados['exportado'] = 0;
		if($this->licitacao_empenho_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Nota de empenho modificada e disponível para exportação!
		  <p class='right'> <a href = '". site_url('licitacao_empenho/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
        }
        else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('licitacao_empenho/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
        }
		$dados['licitacao_empenho'] = $this->licitacao_empenho_m->lista_licitacao_empenho();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_licitacao_empenho',$dados);
	}
}

?>
