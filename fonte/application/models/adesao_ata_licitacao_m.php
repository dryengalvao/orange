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
class adesao_ata_licitacao_m extends CI_Model{
    
    public function lista_adesao_ata_licitacao(){
        $options = 'SELECT adesao_ata_licitacao.id, adesao_ata_licitacao."nu_ProcessoCompra",
					adesao_ata_licitacao."nu_Ata", meses.nome, 
		            adesao_ata_licitacao."dt_Adesao", tipo_adesao_ata.descricao
					FROM public.adesao_ata_licitacao
					JOIN public.tipo_adesao_ata on adesao_ata_licitacao."tp_Adesao" = tipo_adesao_ata.codigo
					JOIN public.meses on adesao_ata_licitacao.mes = meses.id
					WHERE adesao_ata_licitacao.exportado = 0
					ORDER BY adesao_ata_licitacao.mes, adesao_ata_licitacao."nu_ProcessoCompra"';
        $query = $this->db->query($options);
        return $query->result();
    }
	public function lista_adesao_ata_licitacao_exportados(){
        $options = 'SELECT adesao_ata_licitacao.id, adesao_ata_licitacao."nu_ProcessoCompra",
					adesao_ata_licitacao."nu_Ata", meses.nome, 
		            adesao_ata_licitacao."dt_Adesao", tipo_adesao_ata.descricao
					FROM public.adesao_ata_licitacao
					JOIN public.tipo_adesao_ata on adesao_ata_licitacao."tp_Adesao" = tipo_adesao_ata.codigo
					JOIN public.meses on adesao_ata_licitacao.mes = meses.id
					WHERE adesao_ata_licitacao.exportado = 1
					ORDER BY adesao_ata_licitacao.mes, adesao_ata_licitacao."nu_ProcessoCompra"';
        $query = $this->db->query($options);
        return $query->result();
    }
    public function inserir_adesao_ata_licitacao($dados){
        $this->db->insert('adesao_ata_licitacao',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = "SELECT * FROM adesao_ata_licitacao WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE adesao_ata_licitacao SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('adesao_ata_licitacao',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('adesao_ata_licitacao', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
