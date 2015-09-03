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
class licitacao_empenho_m extends CI_Model{
    
    public function lista_licitacao_empenho(){
        $options['id'] = 'licitacao_empenho.id';
		$options['nome'] = 'meses.nome';
        $options['nu_ProcessoLicitatorio'] = 'licitacao.nu_ProcessoLicitatorio';
        $options['nu_NotaEmpenho'] = 'licitacao_empenho.nu_NotaEmpenho';
        $options['ano_Empenho'] = 'licitacao_empenho.ano_Empenho';
        $options['cd_UnidadeOrcamentaria'] = 'licitacao_empenho.cd_UnidadeOrcamentaria';
        $this->db->select($options);
        $this->db->from('public.licitacao_empenho');
		$this->db->join('public.licitacao','licitacao.id = licitacao_empenho.id_licitacao');
		$this->db->join('public.meses', 'meses.id = licitacao_empenho.mes');
        $this->db->where('licitacao_empenho.exportado',0);
        $this->db->order_by('licitacao_empenho.mes','licitacao.nu_ProcessoLicitatorio','licitacao_empenho.nu_NotaEmpenho');
        $query = $this->db->get();
        return $query->result();
    }
	public function lista_licitacao_empenho_exportados(){
        $options['id'] = 'licitacao_empenho.id';
		$options['nome'] = 'meses.nome';
        $options['nu_ProcessoLicitatorio'] = 'licitacao.nu_ProcessoLicitatorio';
        $options['nu_NotaEmpenho'] = 'licitacao_empenho.nu_NotaEmpenho';
        $options['ano_Empenho'] = 'licitacao_empenho.ano_Empenho';
        $options['cd_UnidadeOrcamentaria'] = 'licitacao_empenho.cd_UnidadeOrcamentaria';
        $this->db->select($options);
        $this->db->from('public.licitacao_empenho');
		$this->db->join('public.licitacao','licitacao.id = licitacao_empenho.id_licitacao');
		$this->db->join('public.meses', 'meses.id = licitacao_empenho.mes');
        $this->db->where('licitacao_empenho.exportado',1);
        $this->db->order_by('licitacao_empenho.mes','licitacao.nu_ProcessoLicitatorio','licitacao_empenho.nu_NotaEmpenho');
        $query = $this->db->get();
        return $query->result();
    }
    public function inserir_licitacao_empenho($dados){
        $this->db->insert('licitacao_empenho',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT ce.*, c."nu_ProcessoLicitatorio" FROM licitacao_empenho ce JOIN licitacao c on c.id = ce.id_licitacao WHERE';
        foreach ($dados as $row){
            $consulta.= " ce.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE licitacao_empenho SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('licitacao_empenho',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('licitacao_empenho', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
