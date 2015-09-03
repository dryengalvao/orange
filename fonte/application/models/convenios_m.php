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
class convenios_m extends CI_Model{
    
    public function lista_convenios(){
        $options = 'SELECT convenio.id, convenio."nu_Convenio", convenio."vl_Convenio", meses.nome, 
		            convenio."de_ObjetivoConvenio", convenio."dt_AssinaturaConvenio", tipo_convenio.descricao
					FROM public.convenio
					JOIN public.tipo_convenio on convenio."tp_Convenio" = tipo_convenio.codigo
					JOIN public.meses on convenio.mes = meses.id
					WHERE convenio.exportado = 0
					ORDER BY convenio.mes, convenio."nu_Convenio"';
        $query = $this->db->query($options);
        return $query->result();
    }
	public function lista_convenios_exportados(){
        $options = 'SELECT convenio.id, convenio."nu_Convenio", convenio."vl_Convenio", meses.nome, 
		            convenio."de_ObjetivoConvenio", convenio."dt_AssinaturaConvenio", tipo_convenio.descricao
					FROM public.convenio
					JOIN public.tipo_convenio on convenio."tp_Convenio" = tipo_convenio.codigo
					JOIN public.meses on convenio.mes = meses.id
					WHERE convenio.exportado = 1
					ORDER BY convenio.mes, convenio."nu_Convenio"';
        $query = $this->db->query($options);
        return $query->result();
    }
    public function inserir_convenio($dados){
        $this->db->insert('convenio',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = "SELECT * FROM convenio WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE convenio SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('convenio',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('convenio', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
