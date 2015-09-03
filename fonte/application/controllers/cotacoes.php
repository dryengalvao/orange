<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cotacoes
 *
 * @author vcerdeira
 */
class cotacoes extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('cotacoes_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['cotacoes'] = $this->cotacoes_m->lista_cotacoes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_cotacoes',$dados);
    }
	public function exportados(){
        $dados['cotacoes'] = $this->cotacoes_m->lista_cotacoes_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_cotacoes',$dados);
    }
    public function novo(){
        $dados['tipo_pessoa'] = $this->tabelas_internas->tipo_pessoa();
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/nova_cotacao',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirCotacao') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['tp_Valor'] = $this->input->post('tp_Valor');
			 $dados['ct_ItemLote'] = $this->input->post('ct_ItemLote');
             $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
             $dados['tp_Pessoa'] = $this->input->post('tp_Pessoa');
             $dados['cd_CicParticipante'] = $this->input->post('cd_CicParticipante');
             $dados['nu_SequenciaItem'] = $this->input->post('nu_SequenciaItem');
             $dados['vl_TotalCotadoItem'] = $this->input->post('vl_TotalCotadoItem');
             $dados['cd_VencedorPerdedor'] = $this->input->post('cd_VencedorPerdedor');
             $dados['qt_ItemCotado'] = $this->input->post('qt_ItemCotado');
             $dados['cd_ItemLote'] = $this->input->post('cd_ItemLote');             
             $dados['exportado'] = 0;
             if($this->cotacoes_m->inserir_cotacao($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Cotação cadastrada com sucesso!
                <p class='right'> <a href = '". site_url('cotacoes/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('cotacoes/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['cotacoes'] = $this->cotacoes_m->lista_cotacoes();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_cotacoes',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['cotacoes'] = $this->cotacoes_m->exportar($ids);
            if($dados['cotacoes'] != NULL) $this->cotacoes_m->exportados($ids);
            $this->load->view('exportar/exportar_cotacoes',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhuma cotação selecionada!
                <p class='right'> <a href = '". site_url('cotacoes/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['cotacoes'] = $this->cotacoes_m->lista_cotacoes();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_cotacoes',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$dados['cotacoes'] = $this->cotacoes_m->consultar($dados);
		$dados['tipo_pessoa'] = $this->tabelas_internas->tipo_pessoa();
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/cotacao',$dados);
	}
	public function update(){
	   $dados['mes'] = $this->input->post('mes');
	   $dados['tp_Valor'] = $this->input->post('tp_Valor');
       $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
	   $dados['ct_ItemLote'] = $this->input->post('ct_ItemLote');
       $dados['tp_Pessoa'] = $this->input->post('tp_Pessoa');
       $dados['cd_CicParticipante'] = $this->input->post('cd_CicParticipante');
       $dados['nu_SequenciaItem'] = $this->input->post('nu_SequenciaItem');
       $dados['vl_TotalCotadoItem'] = $this->input->post('vl_TotalCotadoItem');
       $dados['cd_VencedorPerdedor'] = $this->input->post('cd_VencedorPerdedor');
       $dados['qt_ItemCotado'] = $this->input->post('qt_ItemCotado');
       $dados['cd_ItemLote'] = $this->input->post('cd_ItemLote');  
	   $id = $this->input->post('id');
	   
	   if(empty($dados['cd_CicParticipante'])) unset($dados['cd_CicParticipante']);
	   if(empty($dados['ct_ItemLote'])) unset($dados['ct_ItemLote']);
	   if(empty($dados['nu_SequenciaItem'])) unset($dados['nu_SequenciaItem']);
	   if(empty($dados['vl_TotalCotadoItem'])) unset($dados['vl_TotalCotadoItem']);
	   if(empty($dados['qt_ItemCotado'])) unset($dados['qt_ItemCotado']);
	   if(empty($dados['cd_ItemLote'])) unset($dados['cd_ItemLote']);
	   $dados['exportado'] = 0;
	   if($this->cotacoes_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Cotação modificada e disponível para exportação!
		  <p class='right'> <a href = '". site_url('cotacoes/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
       }
       else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('cotacoes/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
       }
	   $dados['cotacoes'] = $this->cotacoes_m->lista_cotacoes();
       $dados['menu'] = $this->load->view("menu", NULL, true);
       $this->load->view('lista_cotacoes',$dados);
	}
}

?>
