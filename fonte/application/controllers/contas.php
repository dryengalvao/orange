<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contas
 *
 * @author vcerdeira
 */
class contas extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('contas_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['contas'] = $this->contas_m->lista_contas();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_contas',$dados);
    }
	public function exportados(){
        $dados['contas'] = $this->contas_m->lista_contas_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_contas',$dados);
    }
    public function novo(){
        $dados['tipo_de_conta'] = $this->tabelas_internas->tipo_de_conta();
        $dados['tipo_de_saldo'] = $this->tabelas_internas->tipo_de_saldo();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/nova_conta',$dados);
    }
	
    public function inserir(){
         if($this->form_validation->run('inserirConta') == FALSE){
             $this->novo();
         }else{
             $dados['ano_criacao'] = $this->input->post('ano_criacao');
             $dados['cd_conta'] = $this->input->post('cd_conta');
             $dados['nome_conta'] = $this->input->post('nome_conta');
             $dados['nivel_conta'] = $this->input->post('nivel_conta');
             $dados['cd_recebeLancamento'] = $this->input->post('cd_recebeLancamento');
             $dados['id_tipoSaldo'] = $this->input->post('id_tipoSaldo');
             $dados['cd_contaSuperior'] = $this->input->post('cd_contaSuperior');
             $dados['mes'] = $this->input->post('mes');
			 $dados['cd_reduzido'] = $this->input->post('cd_reduzido');
             $dados['cd_itemOrcamentario'] = $this->input->post('cd_itemOrcamentario');
             $dados['cd_banco'] = $this->input->post('cd_banco');
             $dados['cd_agencia'] = $this->input->post('cd_agencia');
             $dados['nu_conta'] = $this->input->post('nu_conta');
             $dados['tp_conta'] = $this->input->post('tp_conta');
             $dados['ano_criacaoSuperior'] = $this->input->post('ano_criacaoSuperior');
            
             $dados['exportado'] = 0;
             if($this->contas_m->inserir_contas($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Conta cadastrada com sucesso!
                <p class='right'> <a href = '". site_url('contas/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('contas/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['contas'] = $this->contas_m->lista_contas();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_contas',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['contas'] = $this->contas_m->exportar($ids);
            if($dados['contas'] != NULL) $this->contas_m->exportados($ids);
            $this->load->view('exportar/exportar_contas',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhuma conta selecionada!
                <p class='right'> <a href = '". site_url('contas/principal')."' style='text-decoration:none'>
                    x </a></p></div>";
            $dados['contas'] = $this->contas_m->lista_contas();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_contas',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$dados['contas'] = $this->contas_m->consultar($dados);
		$dados['tipo_de_conta'] = $this->tabelas_internas->tipo_de_conta();
        $dados['tipo_de_saldo'] = $this->tabelas_internas->tipo_de_saldo();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
		$this->load->view('editar/conta',$dados);
	}
	public function update(){
			 $dados['ano_criacao'] = $this->input->post('ano_criacao');
             $dados['cd_conta'] = $this->input->post('cd_conta');
             $dados['nome_conta'] = $this->input->post('nome_conta');
             $dados['nivel_conta'] = $this->input->post('nivel_conta');
             $dados['cd_recebeLancamento'] = $this->input->post('cd_recebeLancamento');
             $dados['id_tipoSaldo'] = $this->input->post('id_tipoSaldo');
             $dados['cd_contaSuperior'] = $this->input->post('cd_contaSuperior');
             $dados['mes'] = $this->input->post('mes');
			 $dados['cd_reduzido'] = $this->input->post('cd_reduzido');
             $dados['cd_itemOrcamentario'] = $this->input->post('cd_itemOrcamentario');
             $dados['cd_banco'] = $this->input->post('cd_banco');
             $dados['cd_agencia'] = $this->input->post('cd_agencia');
             $dados['nu_conta'] = $this->input->post('nu_conta');
             $dados['tp_conta'] = $this->input->post('tp_conta');
             $dados['ano_criacaoSuperior'] = $this->input->post('ano_criacaoSuperior');
	   $id = $this->input->post('id');
	   
	   if(empty($dados['ano_criacao'])) unset($dados['ano_criacao']);
	   if(empty($dados['cd_conta'])) unset($dados['cd_conta']);
	   if(empty($dados['nome_conta'])) unset($dados['nome_conta']);
	   if(empty($dados['nivel_conta'])) unset($dados['nivel_conta']);
       
	   if(empty($dados['cd_recebeLancamento'])) unset($dados['cd_recebeLancamento']);
	   
	   if(empty($dados['cd_contaSuperior'])) unset($dados['cd_contaSuperior']);
	   if(empty($dados['cd_reduzido'])) unset($dados['cd_reduzido']);
	   if(empty($dados['cd_itemOrcamentario'])) unset($dados['cd_itemOrcamentario']);
	   if(empty($dados['cd_banco'])) unset($dados['cd_banco']);
	   
	   if(empty($dados['cd_agencia'])) unset($dados['cd_agencia']);
	   
	   if(empty($dados['nu_conta'])) unset($dados['nu_conta']);
	   if(empty($dados['ano_criacaoSuperior'])) unset($dados['ano_criacaoSuperior']);
	   $dados['exportado'] = 0;
	   if($this->contas_m->editar($dados,$id)== TRUE){
		  $dados['msg'] = "<div class='col_5 notice success center'> Conta modificado e disponível para exportação!
		  <p class='right'> <a href = '". site_url('contas/principal')."' style='text-decoration:none'>
			  Fechar </a></p></div>";
       }
       else{
		  $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
		  <p class='right'> <a href = '". site_url('contas/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";  
       }
	   $dados['contas'] = $this->contas_m->lista_contas();
	   $dados['menu'] = $this->load->view("menu", NULL, true);
	   $this->load->view('lista_contas',$dados);
	}
}

?>
