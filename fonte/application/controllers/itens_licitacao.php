<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of itens_licitacao
 *
 * @author vcerdeira
 */
class itens_licitacao extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('itens_licitacao_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['itens_licitacao'] = $this->itens_licitacao_m->lista_itens_licitacao();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_itens_licitacao',$dados);
    }
	public function exportados(){
        $dados['itens_licitacao'] = $this->itens_licitacao_m->lista_itens_licitacao_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_itens_licitacao',$dados);
    }
    public function novo(){
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['status_item_licitacao'] = $this->tabelas_internas->status_item_licitacao();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/novo_item_licitacao',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirItemLicitacao') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
             $dados['nu_SequenciaItem'] = $this->input->post('nu_SequenciaItem');
			 $dados['ct_ItemLote'] = $this->input->post('ct_ItemLote');
             $dados['de_ItemLicitacao'] = $this->input->post('de_ItemLicitacao');
             $dados['qt_ItemLicitado'] = $this->input->post('qt_ItemLicitado');
             $dados['dt_HomologacaoItem'] = $this->input->post('dt_HomologacaoItem');
             $dados['dt_PublicacaoHomologacao'] = $this->input->post('dt_PublicacaoHomologacao');
             $dados['un_MedidaItem'] = $this->input->post('un_MedidaItem');
             $dados['st_Item'] = $this->input->post('st_Item');
             $dados['dt_HomologacaoItem'] = implode(array_reverse(explode("/", $dados['dt_HomologacaoItem'])));
             $dados['dt_PublicacaoHomologacao'] = implode(array_reverse(explode("/", $dados['dt_PublicacaoHomologacao'])));
             
             $dados['exportado'] = 0;
             if($this->itens_licitacao_m->inserir_item_licitacao($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Item cadastrado com sucesso!
                <p class='right'> <a href = '". site_url('itens_licitacao/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('itens_licitacao/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['itens_licitacao'] = $this->itens_licitacao_m->lista_itens_licitacao();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_itens_licitacao',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['itens_licitacao'] = $this->itens_licitacao_m->exportar($ids);
            if($dados['itens_licitacao'] != NULL) $this->itens_licitacao_m->exportados($ids);
            $this->load->view('exportar/exportar_itens_licitacao',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhum item selecionado!
                <p class='right'> <a href = '". site_url('itens_licitacao/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['itens_licitacao'] = $this->itens_licitacao_m->lista_itens_licitacao();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_itens_licitacao',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$iten_licitacao = $this->itens_licitacao_m->consultar($dados);
		foreach($iten_licitacao as $row){
			$row->dt_HomologacaoItem = substr($row->dt_HomologacaoItem,6,2).'/'.substr($row->dt_HomologacaoItem,4,2).'/'.substr($row->dt_HomologacaoItem,0,4);
			$row->dt_PublicacaoHomologacao = substr($row->dt_PublicacaoHomologacao,6,2).'/'.substr($row->dt_PublicacaoHomologacao,4,2).'/'.substr($row->dt_PublicacaoHomologacao,0,4);
		}
		$dados['iten_licitacao'] = $iten_licitacao;
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['status_item_licitacao'] = $this->tabelas_internas->status_item_licitacao();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/item_licitacao',$dados);
	}
	public function update(){
	   $dados['mes'] = $this->input->post('mes');
	   $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
       $dados['nu_SequenciaItem'] = $this->input->post('nu_SequenciaItem');
       $dados['de_ItemLicitacao'] = $this->input->post('de_ItemLicitacao');
       $dados['qt_ItemLicitado'] = $this->input->post('qt_ItemLicitado');
       $dados['dt_HomologacaoItem'] = $this->input->post('dt_HomologacaoItem');
	   $dados['ct_ItemLote'] = $this->input->post('ct_ItemLote');
       $dados['dt_PublicacaoHomologacao'] = $this->input->post('dt_PublicacaoHomologacao');
       $dados['un_MedidaItem'] = $this->input->post('un_MedidaItem');
       $dados['st_Item'] = $this->input->post('st_Item');
	   $id = $this->input->post('id');
	   
	   if(empty($dados['ct_ItemLote'])) unset($dados['ct_ItemLote']);
	   if(empty($dados['nu_SequenciaItem'])) unset($dados['nu_SequenciaItem']);
	   if(empty($dados['de_ItemLicitacao'])) unset($dados['de_ItemLicitacao']);
	   if(empty($dados['qt_ItemLicitado'])) unset($dados['qt_ItemLicitado']);
	   if(empty($dados['dt_HomologacaoItem'])) unset($dados['dt_HomologacaoItem']);
       else $dados['dt_HomologacaoItem'] = implode(array_reverse(explode("/", $dados['dt_HomologacaoItem'])));
	   if(empty($dados['dt_PublicacaoHomologacao'])) unset($dados['dt_PublicacaoHomologacao']);
       else $dados['dt_PublicacaoHomologacao'] = implode(array_reverse(explode("/", $dados['dt_PublicacaoHomologacao'])));
	   if(empty($dados['un_MedidaItem'])) unset($dados['un_MedidaItem']);
	   $dados['exportado'] = 0;
	   if($this->itens_licitacao_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Item modificado e disponível para exportação!
		  <p class='right'> <a href = '". site_url('itens_licitacao/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
       }
       else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('itens_licitacao/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
       }
	   $dados['itens_licitacao'] = $this->itens_licitacao_m->lista_itens_licitacao();
       $dados['menu'] = $this->load->view("menu", NULL, true);
       $this->load->view('lista_itens_licitacao',$dados);
	}
}

?>
