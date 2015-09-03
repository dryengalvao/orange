<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of certidoes_m
 *
 * @author vcerdeira
 */
class contrato_empenho_m extends CI_Model{
    
    public function lista_contrato_empenho(){
        $options['id'] = 'contrato_empenho.id';
        $options['nu_Contrato'] = 'contrato.nu_Contrato';
		$options['nome'] = 'meses.nome';
        $options['nu_NotaEmpenho'] = 'contrato_empenho.nu_NotaEmpenho';
        $options['ano_Empenho'] = 'contrato_empenho.ano_Empenho';
        $options['cd_UnidadeOrcamentaria'] = 'contrato_empenho.cd_UnidadeOrcamentaria';
        $this->db->select($options);
        $this->db->from('public.contrato_empenho');
		$this->db->join('public.contrato', 'contrato.id = contrato_empenho.id_nu_contrato');
		$this->db->join('public.meses', 'meses.id = contrato_empenho.mes');
        $this->db->where('contrato_empenho.exportado',0);
        $this->db->order_by('contrato_empenho.mes','contrato.nu_Contrato','contrato_empenho.nu_NotaEmpenho');
        $query = $this->db->get();
        return $query->result();
    }
	public function lista_contrato_empenho_exportados(){
        $options['id'] = 'contrato_empenho.id';
        $options['nu_Contrato'] = 'contrato.nu_Contrato';
		$options['nome'] = 'meses.nome';
        $options['nu_NotaEmpenho'] = 'contrato_empenho.nu_NotaEmpenho';
        $options['ano_Empenho'] = 'contrato_empenho.ano_Empenho';
        $options['cd_UnidadeOrcamentaria'] = 'contrato_empenho.cd_UnidadeOrcamentaria';
        $this->db->select($options);
        $this->db->from('public.contrato_empenho');
		$this->db->join('public.contrato', 'contrato.id = contrato_empenho.id_nu_contrato');
		$this->db->join('public.meses', 'meses.id = contrato_empenho.mes');
        $this->db->where('contrato_empenho.exportado',1);
        $this->db->order_by('contrato_empenho.mes','contrato.nu_Contrato','contrato_empenho.nu_NotaEmpenho');
        $query = $this->db->get();
        return $query->result();
    }
    public function inserir_contrato_empenho($dados){
        $this->db->insert('contrato_empenho',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT ce.*, c."nu_Contrato" FROM contrato_empenho ce JOIN contrato c on c.id = ce.id_nu_contrato WHERE';
        foreach ($dados as $row){
            $consulta.= " ce.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE contrato_empenho SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('contrato_empenho',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('contrato_empenho', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
