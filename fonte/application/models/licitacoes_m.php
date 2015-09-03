<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contratos_m
 *
 * @author vcerdeira
 */
class licitacoes_m extends CI_Model{
    
    public function lista_licitacoes(){
        $options['id'] = 'licitacao.id';
        $options['nu_ProcessoLicitatorio'] = 'licitacao.nu_ProcessoLicitatorio';
        $options['vl_TotalPrevisto'] = 'licitacao.vl_TotalPrevisto';
        $options['de_ObjetoLicitacao'] = 'licitacao.de_ObjetoLicitacao';
        $options['nu_Edital'] = 'licitacao.nu_Edital';
        $options['tp_Licitacao'] = 'licitacao.tp_Licitacao';
		$options['nome'] = 'meses.nome';
        $this->db->select($options);
        $this->db->from('public.licitacao');
		$this->db->join('public.meses', 'meses.id = licitacao.mes');
        $this->db->where('licitacao.exportado',0);
        $this->db->order_by('licitacao.mes','licitacao.nu_ProcessoLicitatorio');
        $query = $this->db->get();
        return $query->result();
    }
	public function lista_licitacoes_exportados(){
        $options['id'] = 'licitacao.id';
        $options['nu_ProcessoLicitatorio'] = 'licitacao.nu_ProcessoLicitatorio';
        $options['vl_TotalPrevisto'] = 'licitacao.vl_TotalPrevisto';
        $options['de_ObjetoLicitacao'] = 'licitacao.de_ObjetoLicitacao';
        $options['nu_Edital'] = 'licitacao.nu_Edital';
        $options['tp_Licitacao'] = 'licitacao.tp_Licitacao';
		$options['nome'] = 'meses.nome';
        $this->db->select($options);
        $this->db->from('public.licitacao');
		$this->db->join('public.meses', 'meses.id = licitacao.mes');
        $this->db->where('licitacao.exportado',1);
        $this->db->order_by('licitacao.mes','licitacao.nu_ProcessoLicitatorio');
        $query = $this->db->get();
        return $query->result();
    }
    public function inserir_licitacao($dados){
        $this->db->insert('licitacao',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = "SELECT * FROM licitacao WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE licitacao SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('licitacao',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('licitacao', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
