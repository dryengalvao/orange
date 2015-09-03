<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of publicacoes_m
 *
 * @author vcerdeira
 */
class publicacoes_m extends CI_Model{
    
    public function lista_publicacoes(){
        $options = 'SELECT p.*, l."nu_ProcessoLicitatorio", meses.nome FROM publicacao p 
					JOIN licitacao l on l.id = p.id_licitacao
					JOIN public.meses on p.mes = meses.id WHERE p.exportado = 0
					ORDER BY p.mes';
        $query = $this->db->query($options);
        return $query->result();
    }
	public function lista_publicacoes_exportados(){
        $options = 'SELECT p.*, l."nu_ProcessoLicitatorio", meses.nome FROM publicacao p 
					JOIN licitacao l on l.id = p.id_licitacao
					JOIN public.meses on p.mes = meses.id WHERE p.exportado = 1
					ORDER BY p.mes';
        $query = $this->db->query($options);
        return $query->result();
    }
    public function inserir_publicacao($dados){
        $this->db->insert('publicacao',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT p.*, l."nu_ProcessoLicitatorio" FROM publicacao p JOIN licitacao l on l.id = p.id_licitacao WHERE';
        foreach ($dados as $row){
            $consulta.= " p.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE publicacao SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('publicacao',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('publicacao', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
