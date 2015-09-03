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
class itens_licitacao_m extends CI_Model{
    
    public function lista_itens_licitacao(){
        $options['id'] = 'item_licitacao.id';
        $options['nu_ProcessoLicitatorio'] = 'licitacao.nu_ProcessoLicitatorio';
        $options['nu_SequenciaItem'] = 'item_licitacao.nu_SequenciaItem';
        $options['de_ItemLicitacao'] = 'item_licitacao.de_ItemLicitacao';
        $options['qt_ItemLicitado'] = 'item_licitacao.qt_ItemLicitado';
		$options['nome'] = 'meses.nome';
        $this->db->select($options);
        $this->db->from('public.item_licitacao');
		$this->db->join('public.licitacao','licitacao.id = item_licitacao.id_licitacao');
		$this->db->join('public.meses', 'meses.id = item_licitacao.mes');
        $this->db->where('item_licitacao.exportado',0);
        $this->db->order_by('item_licitacao.mes','licitacao.nu_ProcessoLicitatorio');
        $query = $this->db->get();
        return $query->result();
    }
	public function lista_itens_licitacao_exportados(){
        $options['id'] = 'item_licitacao.id';
        $options['nu_ProcessoLicitatorio'] = 'licitacao.nu_ProcessoLicitatorio';
        $options['nu_SequenciaItem'] = 'item_licitacao.nu_SequenciaItem';
        $options['de_ItemLicitacao'] = 'item_licitacao.de_ItemLicitacao';
        $options['qt_ItemLicitado'] = 'item_licitacao.qt_ItemLicitado';
		$options['nome'] = 'meses.nome';
        $this->db->select($options);
        $this->db->from('public.item_licitacao');
		$this->db->join('public.licitacao','licitacao.id = item_licitacao.id_licitacao');
		$this->db->join('public.meses', 'meses.id = item_licitacao.mes');
        $this->db->where('item_licitacao.exportado',1);
        $this->db->order_by('item_licitacao.mes','licitacao.nu_ProcessoLicitatorio');
        $query = $this->db->get();
        return $query->result();
    }
    public function inserir_item_licitacao($dados){
        $this->db->insert('item_licitacao',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT il.*, l."nu_ProcessoLicitatorio" FROM item_licitacao il JOIN licitacao l on l.id = il.id_licitacao WHERE';
        foreach ($dados as $row){
            $consulta.= " il.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE item_licitacao SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('item_licitacao',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('item_licitacao', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
