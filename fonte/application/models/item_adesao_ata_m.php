<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adesao_ata_licitacao_m
 *
 * @author vcerdeira
 */
class item_adesao_ata_m extends CI_Model{
    
    public function lista(){
        $options = 'SELECT item_adesao_ata.id, adesao_ata_licitacao."nu_ProcessoCompra",
					adesao_ata_licitacao."nu_Ata", meses.nome, 
		            item_adesao_ata."qt_Item",item_adesao_ata."de_Item",item_adesao_ata."vl_Item"
					FROM public.item_adesao_ata
					JOIN public.adesao_ata_licitacao on adesao_ata_licitacao.id = item_adesao_ata.id_adesao_ata
					JOIN public.meses on item_adesao_ata.mes = meses.id
					WHERE item_adesao_ata.exportado = 0
					ORDER BY item_adesao_ata.mes, adesao_ata_licitacao."nu_ProcessoCompra"';
        $query = $this->db->query($options);
        return $query->result();
    }
	public function lista_exportados(){
        $options = 'SELECT item_adesao_ata.id, adesao_ata_licitacao."nu_ProcessoCompra",
					adesao_ata_licitacao."nu_Ata", meses.nome, 
		            item_adesao_ata."qt_Item",item_adesao_ata."de_Item",item_adesao_ata."vl_Item"
					FROM public.item_adesao_ata
					JOIN public.adesao_ata_licitacao on adesao_ata_licitacao.id = item_adesao_ata.id_adesao_ata
					JOIN public.meses on item_adesao_ata.mes = meses.id
					WHERE item_adesao_ata.exportado = 1
					ORDER BY item_adesao_ata.mes, adesao_ata_licitacao."nu_ProcessoCompra"';
        $query = $this->db->query($options);
        return $query->result();
    }
    public function inserir($dados){
        $this->db->insert('item_adesao_ata',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT item_adesao_ata.*, adesao_ata_licitacao."nu_ProcessoCompra", adesao_ata_licitacao."nu_Ata" FROM item_adesao_ata JOIN adesao_ata_licitacao on adesao_ata_licitacao.id = item_adesao_ata.id_adesao_ata WHERE';
        foreach ($dados as $row){
            $consulta.= " item_adesao_ata.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE item_adesao_ata SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('item_adesao_ata',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('item_adesao_ata', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
