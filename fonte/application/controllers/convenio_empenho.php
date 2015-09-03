<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of convenio_empenho
 *
 * @author vcerdeira
 */
class convenio_empenho extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('convenio_empenho_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['convenio_empenho'] = $this->convenio_empenho_m->lista_convenio_empenho();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_convenio_empenho',$dados);
    }
	public function exportados(){
        $dados['convenio_empenho'] = $this->convenio_empenho_m->lista_convenio_empenho_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_convenio_empenho',$dados);
    }
    public function novo(){
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['convenios'] = $this->tabelas_internas->convenios();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/novo_convenio_empenho',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirConvenioEmpenho') == FALSE){
             $this->novo();
         }else{
			 $notaE2 = TRUE;
			 $notaE3 = TRUE;
			 $dados['mes'] = $this->input->post('mes');
             $dados['id_convenio'] = $this->input->post('nu_Convenio');
             $dados['nu_NotaEmpenho'] = $this->input->post('nu_NotaEmpenho');
			 $notaE['nu_NotaEmpenho2'] = $this->input->post('nu_NotaEmpenho2');
			 $notaE['nu_NotaEmpenho3'] = $this->input->post('nu_NotaEmpenho3');
             $dados['ano_Empenho'] = $this->input->post('ano_Empenho');
             $dados['cd_UnidadeOrcamentaria'] = $this->input->post('cd_UnidadeOrcamentaria');
             $dados['exportado'] = 0;
			 $notaE1 = $this->convenio_empenho_m->inserir_convenio_empenho($dados);
			 if(!empty($notaE['nu_NotaEmpenho2'])) {
				$dados['nu_NotaEmpenho'] = $notaE['nu_NotaEmpenho2'];
			 	$notaE2 = $this->convenio_empenho_m->inserir_convenio_empenho($dados);
			 }
			 if(!empty($notaE['nu_NotaEmpenho3'])) {
				$dados['nu_NotaEmpenho'] = $notaE['nu_NotaEmpenho3'];
			 	$notaE3 = $this->convenio_empenho_m->inserir_convenio_empenho($dados);
			 }
             if($notaE1 == TRUE && $notaE2 == TRUE && $notaE3 == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Notas de empenho cadastradas com sucesso!
                <p class='right'> <a href = '". site_url('convenio_empenho/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('convenio_empenho/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['convenio_empenho'] = $this->convenio_empenho_m->lista_convenio_empenho();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_convenio_empenho',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['convenio_empenho'] = $this->convenio_empenho_m->exportar($ids);
            if($dados['convenio_empenho'] != NULL) $this->convenio_empenho_m->exportados($ids);
            $this->load->view('exportar/exportar_convenio_empenho',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhuma nota de empenho selecionada!
                <p class='right'> <a href = '". site_url('convenio_empenho/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['convenio_empenho'] = $this->convenio_empenho_m->lista_convenio_empenho();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_convenio_empenho',$dados);
        }        
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$dados['convenio_empenho'] = $this->convenio_empenho_m->consultar($dados);
		$dados['convenios'] = $this->tabelas_internas->convenios();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/convenio_empenho',$dados);
	}
	public function update(){
		$dados['mes'] = $this->input->post('mes');
		$dados['id_convenio'] = $this->input->post('nu_Convenio');
	    $dados['nu_NotaEmpenho'] = $this->input->post('nu_NotaEmpenho');
	    $dados['ano_Empenho'] = $this->input->post('ano_Empenho');
	    $dados['cd_UnidadeOrcamentaria'] = $this->input->post('cd_UnidadeOrcamentaria');
		$id = $this->input->post('id');
		if(empty($dados['nu_NotaEmpenho'])) unset($dados['nu_NotaEmpenho']);
	  	if(empty($dados['ano_Empenho'])) unset($dados['ano_Empenho']);
		if(empty($dados['cd_UnidadeOrcamentaria'])) unset($dados['cd_UnidadeOrcamentaria']);
		$dados['exportado'] = 0;
		if($this->convenio_empenho_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Nota de empenho modificada e disponível para exportação!
		  <p class='right'> <a href = '". site_url('convenio_empenho/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
        }
        else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('convenio_empenho/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
        }
		$dados['convenio_empenho'] = $this->convenio_empenho_m->lista_convenio_empenho();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_convenio_empenho',$dados);
	}
}

?>
