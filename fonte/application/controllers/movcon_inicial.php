<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of movcon_inicial
 *
 * @author vcerdeira
 */
class movcon_inicial extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('movcon_inicial_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['movcon_inicial'] = $this->movcon_inicial_m->lista_movcon_inicial();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_movcon_inicial',$dados);
    }
	public function exportados(){
        $dados['movcon_inicial'] = $this->movcon_inicial_m->lista_movcon_inicial_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_movcon_inicial',$dados);
    }
    public function novo(){
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['contas'] = $this->tabelas_internas->contas();
		$dados['tipo_de_movimento'] = $this->tabelas_internas->tipo_de_movimento();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/novo_movcon_inicial',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserir_movcon_inicial') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['id_conta'] = $this->input->post('id_conta');
             $dados['tp_movimento'] = $this->input->post('tp_movimento');
			 $dados['vl_movDebito'] = $this->input->post('vl_movDebito');
			 $dados['vl_movCredito'] = $this->input->post('vl_movCredito');
             $dados['exportado'] = 0;
			 if($this->movcon_inicial_m->inserir_movcon_inicial($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Movimentação cadastrada com sucesso!
                <p class='right'> <a href = '". site_url('movcon_inicial/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('movcon_inicial/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['movcon_inicial'] = $this->movcon_inicial_m->lista_movcon_inicial();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_movcon_inicial',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['movcon_inicial'] = $this->movcon_inicial_m->exportar($ids);
            if($dados['movcon_inicial'] != NULL) $this->movcon_inicial_m->exportados($ids);
            $this->load->view('exportar/exportar_movcon_inicial',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhuma movimentação selecionada!
                <p class='right'> <a href = '". site_url('movcon_inicial/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['movcon_inicial'] = $this->movcon_inicial_m->lista_movcon_inicial();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_movcon_inicial',$dados);
        } 
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$dados['movcon_inicial'] = $this->movcon_inicial_m->consultar($dados);
		$dados['meses'] = $this->tabelas_internas->mes();
		$dados['contas'] = $this->tabelas_internas->contas();
		$dados['tipo_de_movimento'] = $this->tabelas_internas->tipo_de_movimento();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/movcon_inicial',$dados);
	}
	public function update(){
		$dados['mes'] = $this->input->post('mes');
        $dados['id_conta'] = $this->input->post('id_conta');
        $dados['tp_movimento'] = $this->input->post('tp_movimento');
		$dados['vl_movDebito'] = $this->input->post('vl_movDebito');
		$dados['vl_movCredito'] = $this->input->post('vl_movCredito');
		$id = $this->input->post('id');
		$dados['exportado'] = 0;
		if($this->movcon_inicial_m->editar($dados,$id) == TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Movimentação modificada e disponível para exportação!
		  <p class='right'> <a href = '". site_url('movcon_inicial/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
        }
        else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('movcon_inicial/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
        }
		$dados['movcon_inicial'] = $this->movcon_inicial_m->lista_movcon_inicial();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_movcon_inicial',$dados);
	}
}

?>
