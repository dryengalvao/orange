<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of licitacao_dotacao_m
 *
 * @author vcerdeira
 */
class licitacao_dotacao_m extends CI_Model{
    
    public function lista_licitacao_dotacao(){
        $options = 'SELECT ld.*, l."nu_ProcessoLicitatorio", meses.nome FROM licitacao_dotacao ld
					JOIN public.meses on ld.mes = meses.id
					JOIN licitacao l on l.id = ld.id_licitacao WHERE ld.exportado = 0
					ORDER BY ld.mes';
        $query = $this->db->query($options);
        return $query->result();
    }
	public function lista_licitacao_dotacao_exportados(){
        $options = 'SELECT ld.*, l."nu_ProcessoLicitatorio", meses.nome FROM licitacao_dotacao ld
					JOIN public.meses on ld.mes = meses.id 
					JOIN licitacao l on l.id = ld.id_licitacao WHERE ld.exportado = 1
					ORDER BY ld.mes';
        $query = $this->db->query($options);
        return $query->result();
    }
    public function inserir_licitacao_dotacao($dados){
        $this->db->insert('licitacao_dotacao',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT ld.*, l."nu_ProcessoLicitatorio" FROM licitacao_dotacao ld JOIN licitacao l on l.id = ld.id_licitacao WHERE';
        foreach ($dados as $row){
            $consulta.= " ld.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE licitacao_dotacao SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('licitacao_dotacao',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('licitacao_dotacao', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
