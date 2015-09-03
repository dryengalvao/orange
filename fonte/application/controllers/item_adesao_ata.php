<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of item_adesao_ata
 *
 * @author vcerdeira
 */
class item_adesao_ata extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('item_adesao_ata_m');
        $this->load->model('tabelas_internas');
    }
    
    public function principal(){
        $dados['item_adesao_ata'] = $this->item_adesao_ata_m->lista();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_item_adesao_ata',$dados);
    }
	public function exportados(){
        $dados['item_adesao_ata'] = $this->item_adesao_ata_m->lista_exportados();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('lista_item_adesao_ata',$dados);
    }
	
    public function novo(){
        $dados['processos'] = $this->tabelas_internas->processo_compra();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('cadastro/novo_item_adesao_ata',$dados);
    }
	
    public function inserir(){
         if($this->form_validation->run('inserir_item_adesao_ata') == FALSE){
             $this->novo();
         }else{
			 $dados['mes'] = $this->input->post('mes');
             $dados['qt_Item'] = $this->input->post('qt_Item');
             $dados['se_ItemAta'] = $this->input->post('se_ItemAta');
             $dados['vl_Item'] = $this->input->post('vl_Item');
             $dados['un_Medida'] = $this->input->post('un_Medida');
             $dados['de_Item'] = $this->input->post('de_Item');
             $dados['id_adesao_ata'] = $this->input->post('id_adesao_ata');
             $dados['exportado'] = 0;
             if($this->item_adesao_ata_m->inserir($dados) == TRUE){
                $dados['msg'] = "<div class='col_5 notice success center'> Adesão cadastrada com sucesso!
                <p class='right'> <a href = '". site_url('item_adesao_ata/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";
             }
             else{
                $dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
                <p class='right'> <a href = '". site_url('item_adesao_ata/principal')."' style='text-decoration:none'>
                    Fechar </a></p></div>";  
             }
             $dados['item_adesao_ata'] = $this->item_adesao_ata_m->lista();
        	 $dados['menu'] = $this->load->view("menu", NULL, true);
        	 $this->load->view('lista_item_adesao_ata',$dados);
         }
    }
    public function exportar(){
        $ids = $this->input->post('id');
        if($ids != NULL){
            $dados['item_adesao_ata'] = $this->item_adesao_ata_m->exportar($ids);
            if($dados['item_adesao_ata'] != NULL) $this->item_adesao_ata_m->exportados($ids);
            $this->load->view('exportar/exportar_item_adesao_ata',$dados);
        }else{
            $dados['msg'] = "<div class='col_5 notice warning center'> Nenhum item selecionados!
                <p class='right'> <a href = '". site_url('item_adesao_ata/principal')."' style='text-decoration:none'>
                    x </a></p></div>"; 
            $dados['item_adesao_ata'] = $this->item_adesao_ata_m->lista();
            $dados['menu'] = $this->load->view("menu", NULL, true);
            $this->load->view('lista_item_adesao_ata',$dados);
        }
    }/*
	public function editar(){
		$dados['id'] = $this->uri->segment("3");
		$convenio = $this->convenios_m->consultar($dados);
		foreach($convenio as $row){
			$row->dt_VencimentoConvenio = substr($row->dt_VencimentoConvenio,6,2).'/'.substr($row->dt_VencimentoConvenio,4,2).'/'.substr($row->dt_VencimentoConvenio,0,4);
			$row->dt_AssinaturaConvenio = substr($row->dt_AssinaturaConvenio,6,2).'/'.substr($row->dt_AssinaturaConvenio,4,2).'/'.substr($row->dt_AssinaturaConvenio,0,4);
			$row->dt_LeiAutorizativa = substr($row->dt_LeiAutorizativa,6,2).'/'.substr($row->dt_LeiAutorizativa,4,2).'/'.substr($row->dt_LeiAutorizativa,0,4);
			$row->dt_PublicacaoConvenio = substr($row->dt_PublicacaoConvenio,6,2).'/'.substr($row->dt_PublicacaoConvenio,4,2).'/'.substr($row->dt_PublicacaoConvenio,0,4);
		}
		$dados['item_adesao_ata'] = $item_adesao_ata;
		$dados['tipo_item_adesao_ata'] = $this->tabelas_internas->tipo_item_adesao_ata();
     //   $dados['tipo_moeda'] = $this->tabelas_internas->tipo_moeda();
     //   $dados['esfera_do_conveniado'] = $this->tabelas_internas->esfera_do_conveniado();
		$dados['meses'] = $this->tabelas_internas->mes();
        $dados['menu'] = $this->load->view("menu", NULL, true);
        $this->load->view('editar/item_adesao_ata',$dados);
	}
	public function update(){
		$dados['mes'] = $this->input->post('mes');
		$dados['nu_ProcessoCompra'] = $this->input->post('nu_ProcessoCompra');
        $dados['nu_Ata'] = $this->input->post('nu_Ata');
        $dados['nu_ProcessoLicitatorio'] = $this->input->post('nu_ProcessoLicitatorio');
        $dados['dt_Diario'] = $this->input->post('dt_Diario');
        $dados['dt_Validade'] = $this->input->post('dt_Validade');
        $dados['nu_Diario'] = $this->input->post('nu_Diario');
        $dados['dt_Adesao'] = $this->input->post('dt_Adesao');
        $dados['tp_Adesao'] = $this->input->post('tp_Adesao');
		/*
        $dados['nu_DiarioOficial'] = $this->input->post('nu_DiarioOficial');
        $dados['dt_PublicacaoConvenio'] = $this->input->post('dt_PublicacaoConvenio');
        $dados['nu_LeiAutorizativa'] = $this->input->post('nu_LeiAutorizativa');
        $dados['dt_LeiAutorizativa'] = $this->input->post('dt_LeiAutorizativa');
        $dados['st_RecebeValor'] = $this->input->post('st_RecebeValor'); *//*
		$id = $this->input->post('id');
	   
	    if(empty($dados['nu_ProcessoCompra'])) unset($dados['nu_ProcessoCompra']);
	    if(empty($dados['nu_Ata'])) unset($dados['nu_Ata']);
	    if(empty($dados['nu_ProcessoLicitatorio'])) unset($dados['nu_ProcessoLicitatorio']);
	    if(empty($dados['dt_Diario'])) unset($dados['dt_Diario']);
        else $dados['dt_Validade'] = implode(array_reverse(explode("/", $dados['dt_Validade'])));
		if(empty($dados['nu_Diario'])) unset($dados['nu_Diario']);
        else $dados['dt_Adesao'] = implode(array_reverse(explode("/", $dados['dt_Adesao'])));
		if(empty($dados['tp_Adesao'])) unset($dados['tp_Adesao']);
      /*  else $dados['tp_Adesao'] = implode(array_reverse(explode("/", $dados['tp_Adesao'])));
		if(empty($dados['dt_LeiAutorizativa'])) unset($dados['dt_LeiAutorizativa']);
        else $dados['dt_LeiAutorizativa'] = implode(array_reverse(explode("/", $dados['dt_LeiAutorizativa'])));
		if(empty($dados['nu_DiarioOficial'])) unset($dados['nu_DiarioOficial']);
	    if(empty($dados['nu_LeiAutorizativa'])) unset($dados['nu_LeiAutorizativa']);*//*
		$dados['exportado'] = 0;
		if($this->item_adesao_ata_m->editar($dados,$id)== TRUE){
			$dados['msg'] = "<div class='col_5 notice success center'> Convênio modificado e disponível para exportação!
			<p class='right'> <a href = '". site_url('item_adesao_ata/principal')."' style='text-decoration:none'>
				Fechar </a></p></div>";
		}
		else{
			$dados['msg'] = "<div class='col_5 notice error center'> Não foi possível realizar a operação!
			<p class='right'> <a href = '". site_url('item_adesao_ata/principal')."' style='text-decoration:none'>
				  Fechar </a></p></div>";  
		}
		$dados['item_adesao_ata'] = $this->item_adesao_ata_m->lista();
		$dados['menu'] = $this->load->view("menu", NULL, true);
		$this->load->view('lista_item_adesao_ata',$dados);
	}*/
}

?>
