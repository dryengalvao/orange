<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tabelas_internas
 *
 * @author vcerdeira
 */
class tabelas_internas extends CI_Model{
   
    public function tipo_contrato(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_de_contrato');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
    public function tipo_moeda(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_moeda');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
    public function tipo_pessoa(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_pessoa');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
    public function tipo_convenio(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_convenio');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
    public function esfera_do_conveniado(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.esfera_do_conveniado');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
    public function convenios(){
		$options['id'] = 'id';
        $options['nu_Convenio'] = 'nu_Convenio';
        $this->db->select($options);
        $this->db->from('public.convenio');
        $this->db->order_by('nu_Convenio');
        $query = $this->db->get();
        return $query->result();
    }
    public function modalidade_licitacao(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.modalidade_de_licitacao');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
    public function licitacoes(){
		$options['id'] = 'id';
        $options['nu_ProcessoLicitatorio'] = 'nu_ProcessoLicitatorio';
        $this->db->select($options);
        $this->db->from('public.licitacao');
        $this->db->order_by('nu_ProcessoLicitatorio');
        $query = $this->db->get();
        return $query->result();
    }
    public function tipo_certidao(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_certidao');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
    public function tipo_participante_licitacao(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_participante_licitacao');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
	public function contratos(){
		$options['id'] = 'id';
        $options['nu_Contrato'] = 'nu_Contrato';
        $this->db->select($options);
        $this->db->from('public.contrato');
        $this->db->order_by('nu_Contrato');
        $query = $this->db->get();
        return $query->result();
    }
	public function mes(){
		$options['id'] = 'id';
        $options['nome'] = 'nome';
        $this->db->select($options);
        $this->db->from('public.meses');
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->result();
    }
	public function tipo_adesao_ata(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_adesao_ata');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
	public function processo_compra(){
		$options['id'] = 'id';
        $options['nu_Contrato'] = 'nu_ProcessoCompra';
        $this->db->select($options);
        $this->db->from('public.adesao_ata_licitacao');
        $this->db->order_by('nu_ProcessoCompra');
        $query = $this->db->get();
        return $query->result();
    }
	public function status_item_licitacao(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.status_item_licitacao');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
	public function tipo_de_conta(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_de_conta');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
	public function tipo_de_saldo(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_de_saldo');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
	public function tipo_de_movimento(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_de_movimento');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
	public function contas(){
		$options['id'] = 'id';
        $options['cd_conta'] = 'cd_conta';
        $this->db->select($options);
        $this->db->from('public.conta');
        $this->db->order_by('cd_conta');
        $query = $this->db->get();
        return $query->result();
    }
	public function tipo_do_aditivo(){
        $options['codigo'] = 'codigo';
        $options['descricao'] = 'descricao';
        $this->db->select($options);
        $this->db->from('public.tipo_do_aditivo');
        $this->db->order_by('descricao');
        $query = $this->db->get();
        return $query->result();
    }
}

?>
