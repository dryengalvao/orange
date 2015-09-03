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
class convenios extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('convenios_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['convenios'] = $this->convenios_m->lista_convenios();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_convenios',$dados);
    }
	public function exportados(){
        $dados['convenios'] = $this->convenios_m->lista_convenios_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_convenios',$dados);
    }
    public function novo(){
        $dados['tipo_convenio'] = $this->tabelas_internas->tipo_convenio();
        $dados['tipo_moeda'] = $this->tabelas_internas->tipo_moeda();
        //$dados['esfera_do_conveniado'] = $this->tabelas_internas->esfera_do_conveniado();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/novo_convenio',$dados);
    }
    public function inserir(){
         if($this->form_validation->run('inserirConvenio') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['nu_Convenio'] = $this->input->post('nu_Convenio');
             $dados['vl_Convenio'] = $this->input->post('vl_Convenio');
             $dados['cd_MoedaConvenio'] = $this->input->post('cd_MoedaConvenio');
             $dados['tp_Convenio'] = $this->input->post('tp_Convenio');
             $dados['dt_AssinaturaConvenio'] = $this->input->post('dt_AssinaturaConvenio');
             $dados['dt_VencimentoConvenio'] = $this->input->post('dt_VencimentoConvenio');
             $dados['de_ObjetivoConvenio'] = $this->input->post('de_ObjetivoConvenio');
             $dados['nu_DiarioOficial'] = $this->input->post('nu_DiarioOficial');
             $dados['dt_PublicacaoConvenio'] = $this->input->post('dt_PublicacaoConvenio');
             $dados['nu_LeiAutorizativa'] = $this->input->post('nu_LeiAutorizativa');
             $dados['dt_LeiAutorizativa'] = $this->input->post('dt_LeiAutorizativa');
             $dados['st_RecebeValor'] = $this->input->post('st_RecebeValor');
             
             $dados['dt_AssinaturaConvenio'] = implode(array_reverse(explode("/", $dados['dt_AssinaturaConvenio'])));
             $dados['dt_VencimentoConvenio'] = implode(array_reverse(explode("/", $dados['dt_VencimentoConvenio'])));
             $dados['dt_PublicacaoConvenio'] = implode(array_reverse(explode("/", $dados['dt_PublicacaoConvenio'])));
             
             $dados['exportado'] = 0;
			 if($dados['nu_LeiAutorizativa'] == 0) $dados['nu_LeiAutorizativa'] = "000000";
			 if($dados['dt_LeiAutorizativa'] == 0) $dados['dt_LeiAutorizativa'] = "00000000";
			 else $dados['dt_LeiAutorizativa'] = implode(array_reverse(explode("/", $dados['dt_LeiAutorizativa'])));
             if($this->convenios_m->inserir_convenio($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Convenio cadastrado com sucesso!
                <p class='right'> <a href = '". site_url('convenios/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('convenios/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['convenios'] = $this->convenios_m->lista_convenios();
             $dados['menu'] = $this->load->view("menu", NULL, true);
             $this->load->view('lista_convenios',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['convenios'] = $this->convenios_m->exportar($ids);
            if($dados['convenios'] != NULL) $this->convenios_m->exportados($ids);
            $this->load->view('exportar/exportar_convenios',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhum convenio selecionado!
                <p class='right'> <a href = '". site_url('convenios/principal')."' style='text-decoration:none'>
                    x </a></p></div>"; 
            $dados['convenios'] = $this->convenios_m->lista_convenios();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_convenios',$dados);
        }
    }
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$convenio = $this->convenios_m->consultar($dados);
		foreach($convenio as $row){
			$row->dt_VencimentoConvenio = substr($row->dt_VencimentoConvenio,6,2).'/'.substr($row->dt_VencimentoConvenio,4,2).'/'.substr($row->dt_VencimentoConvenio,0,4);
			$row->dt_AssinaturaConvenio = substr($row->dt_AssinaturaConvenio,6,2).'/'.substr($row->dt_AssinaturaConvenio,4,2).'/'.substr($row->dt_AssinaturaConvenio,0,4);
			$row->dt_LeiAutorizativa = substr($row->dt_LeiAutorizativa,6,2).'/'.substr($row->dt_LeiAutorizativa,4,2).'/'.substr($row->dt_LeiAutorizativa,0,4);
			$row->dt_PublicacaoConvenio = substr($row->dt_PublicacaoConvenio,6,2).'/'.substr($row->dt_PublicacaoConvenio,4,2).'/'.substr($row->dt_PublicacaoConvenio,0,4);
		}
		$dados['convenio'] = $convenio;
		$dados['tipo_convenio'] = $this->tabelas_internas->tipo_convenio();
        $dados['tipo_moeda'] = $this->tabelas_internas->tipo_moeda();
        //$dados['esfera_do_conveniado'] = $this->tabelas_internas->esfera_do_conveniado();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/convenio',$dados);
	}
	public function update(){
		$dados['mes'] = $this->input->post('mes');
		$dados['nu_Convenio'] = $this->input->post('nu_Convenio');
        $dados['vl_Convenio'] = $this->input->post('vl_Convenio');
        $dados['cd_MoedaConvenio'] = $this->input->post('cd_MoedaConvenio');
        $dados['tp_Convenio'] = $this->input->post('tp_Convenio');
        //$dados['tp_EsferaConvenio'] = $this->input->post('tp_EsferaConvenio');
        $dados['dt_AssinaturaConvenio'] = $this->input->post('dt_AssinaturaConvenio');
        $dados['dt_VencimentoConvenio'] = $this->input->post('dt_VencimentoConvenio');
        $dados['de_ObjetivoConvenio'] = $this->input->post('de_ObjetivoConvenio');
        $dados['nu_DiarioOficial'] = $this->input->post('nu_DiarioOficial');
        $dados['dt_PublicacaoConvenio'] = $this->input->post('dt_PublicacaoConvenio');
        $dados['nu_LeiAutorizativa'] = $this->input->post('nu_LeiAutorizativa');
        $dados['dt_LeiAutorizativa'] = $this->input->post('dt_LeiAutorizativa');
        $dados['st_RecebeValor'] = $this->input->post('st_RecebeValor');
		$id = $this->input->post('id');
	   
	    if(empty($dados['nu_Convenio'])) unset($dados['nu_Convenio']);
	    if(empty($dados['vl_Convenio'])) unset($dados['vl_Convenio']);
	    if(empty($dados['de_ObjetivoConvenio'])) unset($dados['de_ObjetivoConvenio']);
	    if(empty($dados['dt_AssinaturaConvenio'])) unset($dados['dt_AssinaturaConvenio']);
        else $dados['dt_AssinaturaConvenio'] = implode(array_reverse(explode("/", $dados['dt_AssinaturaConvenio'])));
		if(empty($dados['dt_VencimentoConvenio'])) unset($dados['dt_VencimentoConvenio']);
        else $dados['dt_VencimentoConvenio'] = implode(array_reverse(explode("/", $dados['dt_VencimentoConvenio'])));
		if(empty($dados['dt_PublicacaoConvenio'])) unset($dados['dt_PublicacaoConvenio']);
        else $dados['dt_PublicacaoConvenio'] = implode(array_reverse(explode("/", $dados['dt_PublicacaoConvenio'])));
		if(empty($dados['dt_LeiAutorizativa'])) unset($dados['dt_LeiAutorizativa']);
        else $dados['dt_LeiAutorizativa'] = implode(array_reverse(explode("/", $dados['dt_LeiAutorizativa'])));
		if(empty($dados['nu_DiarioOficial'])) unset($dados['nu_DiarioOficial']);
	    if(empty($dados['nu_LeiAutorizativa'])) unset($dados['nu_LeiAutorizativa']);
		$dados['exportado'] = 0;
		if($this->convenios_m->editar($dados,$id)== TRUE){
			$dados['msg'] = "<div class='col_5 notice success center'> Convênio modificado e disponível para exportação!
			<p class='right'> <a href = '". site_url('convenios/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";
		}
		else{
			$dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
			<p class='right'> <a href = '". site_url('convenios/principal')."' style='text-decoration:none'>
				  Fechar </a></p></div>";  
		}
		$dados['convenios'] = $this->convenios_m->lista_convenios();
		$dados['menu'] = $this->load->view("menu", NULL, true);
		$this->load->view('lista_convenios',$dados);
	}
}

?>
