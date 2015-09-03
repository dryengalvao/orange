<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of convenios
 *
 * @author vcerdeira
 */
class adesao_ata_licitacao extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('adesao_ata_licitacao_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['adesao_ata_licitacao'] = $this->adesao_ata_licitacao_m->lista_adesao_ata_licitacao();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_adesao_ata_licitacao',$dados);
    }
	public function exportados(){
        $dados['adesao_ata_licitacao'] = $this->adesao_ata_licitacao_m->lista_adesao_ata_licitacao_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_adesao_ata_licitacao',$dados);
    }
    public function novo(){
        $dados['tipo_adesao'] = $this->tabelas_internas->tipo_adesao_ata();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/nova_adesao_ata_licitacao',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserir_adesao_ata_licitacao') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['nu_ProcessoCompra'] = $this->input->post('nu_ProcessoCompra');
             $dados['nu_Ata'] = $this->input->post('nu_Ata');
             $dados['nu_ProcessoLicitatorio'] = $this->input->post('nu_ProcessoLicitatorio');
             $dados['dt_Publicacao'] = $this->input->post('dt_Publicacao');
             $dados['dt_Validade'] = $this->input->post('dt_Validade');
             $dados['nu_Diario'] = $this->input->post('nu_Dirario');
             $dados['dt_Adesao'] = $this->input->post('dt_Adesao');
             $dados['tp_Adesao'] = $this->input->post('tp_Adesao');
             $dados['exportado'] = 0;
			 if($dados['nu_Diario'] == "0") $dados['nu_Diario'] = " ";
			 if($dados['nu_ProcessoLicitatorio'] == 0) $dados['nu_ProcessoLicitatorio'] = " ";
			 if($dados['dt_Publicacao'] == 0) $dados['dt_Publicacao'] = "00000000";
			 else $dados['dt_Publicacao'] = implode(array_reverse(explode("/", $dados['dt_Publicacao'])));
			 $dados['dt_Adesao'] = implode(array_reverse(explode("/", $dados['dt_Adesao'])));
			 $dados['dt_Validade'] = implode(array_reverse(explode("/", $dados['dt_Validade'])));
             if($this->adesao_ata_licitacao_m->inserir_adesao_ata_licitacao($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Adesão cadastrada com sucesso!
                <p class='right'> <a href = '". site_url('adesao_ata_licitacao/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('adesao_ata_licitacao/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['adesao_ata_licitacao'] = $this->adesao_ata_licitacao_m->lista_adesao_ata_licitacao();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_adesao_ata_licitacao',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['adesao_ata_licitacao'] = $this->adesao_ata_licitacao_m->exportar($ids);
            if($dados['adesao_ata_licitacao'] != NULL) $this->adesao_ata_licitacao_m->exportados($ids);
            $this->load->view('exportar/exportar_adesao_ata_licitacao',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhuma adesão selecionada!
                <p class='right'> <a href = '". site_url('adesao_ata_licitacao/principal')."' style='text-decoration:none'>
                    x </a></p></div>"; 
            $dados['adesao_ata_licitacao'] = $this->adesao_ata_licitacao_m->lista_adesao_ata_licitacao();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_adesao_ata_licitacao',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$adesao = $this->adesao_ata_licitacao_m->consultar($dados);
		foreach($adesao as $row){
			$row->dt_Publicacao = substr($row->dt_Publicacao,6,2).'/'.substr($row->dt_Publicacao,4,2).'/'.substr($row->dt_Publicacao,0,4);
			$row->dt_Validade = substr($row->dt_Validade,6,2).'/'.substr($row->dt_Validade,4,2).'/'.substr($row->dt_Validade,0,4);
			$row->dt_Adesao = substr($row->dt_Adesao,6,2).'/'.substr($row->dt_Adesao,4,2).'/'.substr($row->dt_Adesao,0,4);
			if($row->nu_ProcessoLicitatorio == " ") $row->nu_ProcessoLicitatorio = 0;
			if($row->nu_Diario == " ") $row->nu_Diario = 0;
		}
		$dados['adesao_ata_licitacao'] = $adesao;
		$dados['tipo_adesao'] = $this->tabelas_internas->tipo_adesao_ata();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/adesao_ata_licitacao',$dados);
	}
	public function update(){
		$dados['mes'] = $this->input->post('mes');
	   	$dados['nu_ProcessoCompra'] = $this->input->post('nu_ProcessoCompra');
 	   	$dados['nu_Ata'] = $this->input->post('nu_Ata');
	   	$dados['nu_ProcessoLicitatorio'] = $this->input->post('nu_ProcessoLicitatorio');
	   	$dados['dt_Publicacao'] = $this->input->post('dt_Publicacao');
	   	$dados['dt_Validade'] = $this->input->post('dt_Validade');
	   	$dados['nu_Diario'] = $this->input->post('nu_Diario');
	   	$dados['dt_Adesao'] = $this->input->post('dt_Adesao');
	   	$dados['tp_Adesao'] = $this->input->post('tp_Adesao');
	   	$dados['exportado'] = 0;
		$id = $this->input->post('id');
	   
	    if(empty($dados['nu_ProcessoCompra'])) unset($dados['nu_ProcessoCompra']);
	    if(empty($dados['nu_Ata'])) unset($dados['nu_Ata']);
	    if(empty($dados['nu_ProcessoLicitatorio'])) unset($dados['nu_ProcessoLicitatorio']);
	    if(empty($dados['dt_Publicacao'])) unset($dados['dt_Publicacao']);
        else $dados['dt_Publicacao'] = implode(array_reverse(explode("/", $dados['dt_Publicacao'])));
		if(empty($dados['dt_Validade'])) unset($dados['dt_Validade']);
        else $dados['dt_Validade'] = implode(array_reverse(explode("/", $dados['dt_Validade'])));
		if(empty($dados['nu_Diario'])) unset($dados['nu_Diario']);
		else if($dados['nu_Diario'] == "0") $dados['nu_Diario'] = " ";
		if(empty($dados['dt_Adesao'])) unset($dados['dt_Adesao']);
		else $dados['dt_Adesao'] = implode(array_reverse(explode("/", $dados['dt_Adesao'])));
		if($this->adesao_ata_licitacao_m->editar($dados,$id)== TRUE){
			$dados['msg'] = "<div class='col_5 notice success center'> Licitação modificada e disponível para exportação!
			<p class='right'> <a href = '". site_url('adesao_ata_licitacao/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";
		}
		else{
			$dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
			<p class='right'> <a href = '". site_url('adesao_ata_licitacao/principal')."' style='text-decoration:none'>
				  Fechar </a></p></div>";  
		}
		$dados['adesao_ata_licitacao'] = $this->adesao_ata_licitacao_m->lista_adesao_ata_licitacao();
		$dados['menu'] = $this->load->view("menu", NULL, true);
		$this->load->view('lista_adesao_ata_licitacao',$dados);
	}
}

?>
