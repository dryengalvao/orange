<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of publicacoes
 *
 * @author vcerdeira
 */
class publicacoes extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('publicacoes_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['publicacoes'] = $this->publicacoes_m->lista_publicacoes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_publicacoes',$dados);
    }
	public function exportados(){
        $dados['publicacoes'] = $this->publicacoes_m->lista_publicacoes_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_publicacoes',$dados);
    }
    public function novo(){
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/nova_publicacao',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirPublicacao') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
             $dados['dt_PublicacaoEdital'] = $this->input->post('dt_PublicacaoEdital');
             $dados['nu_SequencialPublicacao'] = $this->input->post('nu_SequencialPublicacao');
             $dados['nm_veiculoComunicacao'] = $this->input->post('nm_veiculoComunicacao');
             
             $dados['dt_PublicacaoEdital'] = implode(array_reverse(explode("/", $dados['dt_PublicacaoEdital'])));
             $dados['exportado'] = 0;
             if($this->publicacoes_m->inserir_publicacao($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Publicação cadastrada com sucesso!
                <p class='right'> <a href = '". site_url('publicacoes/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('publicacoes/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['publicacoes'] = $this->publicacoes_m->lista_publicacoes();
        	 $dados['menu'] = $this->load->view("menu", NULL, true);
        	 $this->load->view('lista_publicacoes',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['publicacoes'] = $this->publicacoes_m->exportar($ids);
            if($dados['publicacoes'] != NULL) $this->publicacoes_m->exportados($ids);
            $this->load->view('exportar/exportar_publicacoes',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhum item selecionado!
                <p class='right'> <a href = '". site_url('publicacoes/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['publicacoes'] = $this->publicacoes_m->lista_publicacoes();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_publicacoes',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$publicacao = $this->publicacoes_m->consultar($dados);
		foreach($publicacao as $row){
			$row->dt_PublicacaoEdital = substr($row->dt_PublicacaoEdital,6,2).'/'.substr($row->dt_PublicacaoEdital,4,2).'/'.substr($row->dt_PublicacaoEdital,0,4);
		}
		$dados['publicacao'] = $publicacao;
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/publicacao',$dados);
	}
	public function update(){
	   $dados['mes'] = $this->input->post('mes');
	   $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
       $dados['dt_PublicacaoEdital'] = $this->input->post('dt_PublicacaoEdital');
       $dados['nu_SequencialPublicacao'] = $this->input->post('nu_SequencialPublicacao');
       $dados['nm_veiculoComunicacao'] = $this->input->post('nm_veiculoComunicacao');
	   $id = $this->input->post('id');
	   
	   if(empty($dados['nu_SequencialPublicacao'])) unset($dados['nu_SequencialPublicacao']);
	   if(empty($dados['nm_veiculoComunicacao'])) unset($dados['nm_veiculoComunicacao']);
	   if(empty($dados['dt_PublicacaoEdital'])) unset($dados['dt_PublicacaoEdital']);
       else $dados['dt_PublicacaoEdital'] = implode(array_reverse(explode("/", $dados['dt_PublicacaoEdital'])));
	   $dados['exportado'] = 0;
	   if($this->publicacoes_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Publicação modificada e disponível para exportação!
		  <p class='right'> <a href = '". site_url('publicacoes/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
       }
       else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('publicacoes/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
       }
	   $dados['publicacoes'] = $this->publicacoes_m->lista_publicacoes();
       $dados['menu'] = $this->load->view("menu", NULL, true);
       $this->load->view('lista_publicacoes',$dados);
	}
}

?>
