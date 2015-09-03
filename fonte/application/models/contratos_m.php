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
class contratos_m extends CI_Model{
    
    public function lista_contratos(){
        $options = 'SELECT contrato.id, contrato."vl_Contrato", contrato."nu_ProcessoLicitator", 
		            contrato."nm_Contratado", contrato."nu_Contrato", tipo_de_contrato.descricao, meses.nome
					FROM public.contrato
					JOIN public.tipo_de_contrato on contrato."tp_Contrato" = tipo_de_contrato.codigo
					JOIN public.meses on contrato.mes = meses.id
					WHERE contrato.exportado = 0
					ORDER BY contrato.mes, contrato."nu_Contrato"';
        $query = $this->db->query($options);
        return $query->result();
    }
	public function lista_contratos_exportados(){
        $options = 'SELECT contrato.id, contrato."vl_Contrato", contrato."nu_ProcessoLicitator", 
		            contrato."nm_Contratado", contrato."nu_Contrato", tipo_de_contrato.descricao, meses.nome
					FROM public.contrato
					JOIN public.tipo_de_contrato on contrato."tp_Contrato" = tipo_de_contrato.codigo
					JOIN public.meses on contrato.mes = meses.id
					WHERE contrato.exportado = 1
					ORDER BY contrato.mes, contrato."nu_Contrato"';
        $query = $this->db->query($options);
        return $query->result();
    }
    public function inserir_contratos($dados){
        $this->db->insert('contrato',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = "SELECT * FROM contrato WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE contrato SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('contrato',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('contrato', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
