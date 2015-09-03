<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of licitacao_dotacao
 *
 * @author vcerdeira
 */
class licitacao_dotacao extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('licitacao_dotacao_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['licitacao_dotacao'] = $this->licitacao_dotacao_m->lista_licitacao_dotacao();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_licitacao_dotacao',$dados);
    }
	public function exportados(){
        $dados['licitacao_dotacao'] = $this->licitacao_dotacao_m->lista_licitacao_dotacao_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_licitacao_dotacao',$dados);
    }
    public function novo(){
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/nova_licitacao_dotacao',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirLicitacaoDotacao') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
             $dados['cd_CategoriaEconomica'] = $this->input->post('cd_CategoriaEconomica');
             $dados['cd_GrupoNatureza'] = $this->input->post('cd_GrupoNatureza');
             $dados['cd_ModalidadeAplicacao'] = $this->input->post('cd_ModalidadeAplicacao');
			 $dados['cd_Elemento'] = $this->input->post('cd_Elemento');
             $dados['cd_UnidadeOrcamentaria'] = $this->input->post('cd_UnidadeOrcamentaria');
             $dados['cd_FonteRecurso'] = $this->input->post('cd_FonteRecurso');
             $dados['nu_AcaoGoverno'] = $this->input->post('nu_AcaoGoverno');
			 $dados['cd_SubFuncao'] = $this->input->post('cd_SubFuncao');
             $dados['cd_Funcao'] = $this->input->post('cd_Funcao');
             $dados['cd_Programa'] = $this->input->post('cd_Programa');
             $dados['exportado'] = 0;
             if($this->licitacao_dotacao_m->inserir_licitacao_dotacao($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Licitação dotação cadastrada com sucesso!
                <p class='right'> <a href = '". site_url('licitacao_dotacao/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('licitacao_dotacao/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['licitacao_dotacao'] = $this->licitacao_dotacao_m->lista_licitacao_dotacao();
        	 $dados['menu'] = $this->load->view("menu", NULL, true);
        	 $this->load->view('lista_licitacao_dotacao',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['licitacao_dotacao'] = $this->licitacao_dotacao_m->exportar($ids);
            if($dados['licitacao_dotacao'] != NULL) $this->licitacao_dotacao_m->exportados($ids);
            $this->load->view('exportar/exportar_licitacao_dotacao',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhum item selecionado!
                <p class='right'> <a href = '". site_url('licitacao_dotacao/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['licitacao_dotacao'] = $this->licitacao_dotacao_m->lista_licitacao_dotacao();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_licitacao_dotacao',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$dados['licitacao_dotacao'] = $this->licitacao_dotacao_m->consultar($dados);
        $dados['licitacoes'] = $this->tabelas_internas->licitacoes();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/licitacao_dotacao',$dados);
	}
	public function update(){
	   $dados['mes'] = $this->input->post('mes');
	   $dados['id_licitacao'] = $this->input->post('nu_ProcessoLicitatorio');
       $dados['cd_CategoriaEconomica'] = $this->input->post('cd_CategoriaEconomica');
       $dados['cd_GrupoNatureza'] = $this->input->post('cd_GrupoNatureza');
       $dados['cd_ModalidadeAplicacao'] = $this->input->post('cd_ModalidadeAplicacao');
	   $dados['cd_Elemento'] = $this->input->post('cd_Elemento');
       $dados['cd_UnidadeOrcamentaria'] = $this->input->post('cd_UnidadeOrcamentaria');
       $dados['cd_FonteRecurso'] = $this->input->post('cd_FonteRecurso');
       $dados['nu_AcaoGoverno'] = $this->input->post('nu_AcaoGoverno');
	   $dados['cd_SubFuncao'] = $this->input->post('cd_SubFuncao');
       $dados['cd_Funcao'] = $this->input->post('cd_Funcao');
       $dados['cd_Programa'] = $this->input->post('cd_Programa');
	   $id = $this->input->post('id');
	   
	   if(empty($dados['cd_CategoriaEconomica'])) unset($dados['cd_CategoriaEconomica']);
	   if(empty($dados['cd_GrupoNatureza'])) unset($dados['cd_GrupoNatureza']);
	   if(empty($dados['cd_ModalidadeAplicacao'])) unset($dados['cd_ModalidadeAplicacao']);
	   if(empty($dados['cd_Elemento'])) unset($dados['cd_Elemento']);
	   if(empty($dados['cd_UnidadeOrcamentaria'])) unset($dados['cd_UnidadeOrcamentaria']);
	   if(empty($dados['cd_FonteRecurso'])) unset($dados['cd_FonteRecurso']);
	   if(empty($dados['nu_AcaoGoverno'])) unset($dados['nu_AcaoGoverno']);
	   if(empty($dados['cd_SubFuncao'])) unset($dados['cd_SubFuncao']);
	   if(empty($dados['cd_Funcao'])) unset($dados['cd_Funcao']);
       if(empty($dados['cd_Programa'])) unset($dados['cd_Programa']);
	   $dados['exportado'] = 0;
	   if($this->licitacao_dotacao_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Licitação dotação modificada e disponível para exportação!
		  <p class='right'> <a href = '". site_url('licitacao_dotacao/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
       }
       else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('licitacao_dotacao/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
       }
	   $dados['licitacao_dotacao'] = $this->licitacao_dotacao_m->lista_licitacao_dotacao();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_licitacao_dotacao',$dados);
	}
}

?>
