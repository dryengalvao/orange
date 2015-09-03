<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contas_m
 *
 * @author vcerdeira
 */
class contas_m extends CI_Model{
    
    public function lista_contas(){
        $options = 'SELECT conta.id, conta."cd_conta", conta."nu_conta", 
		            conta."cd_banco", conta."cd_agencia", tipo_de_conta.descricao, meses.nome
					FROM public.conta
					JOIN public.tipo_de_conta on conta."tp_conta" = tipo_de_conta.codigo
					JOIN public.meses on conta.mes = meses.id
					WHERE conta.exportado = 0
					ORDER BY conta.mes, conta.nivel_conta, conta."nu_conta"';
        $query = $this->db->query($options);
        return $query->result();
    }
	public function lista_contas_exportados(){
        $options = 'SELECT conta.id, conta."cd_conta", conta."nu_conta", 
		            conta."cd_banco", conta."cd_agencia", tipo_de_conta.descricao, meses.nome
					FROM public.conta
					JOIN public.tipo_de_conta on conta."tp_conta" = tipo_de_conta.codigo
					JOIN public.meses on conta.mes = meses.id
					WHERE conta.exportado = 1
					ORDER BY conta.mes, conta.nivel_conta, conta."nu_conta"';
        $query = $this->db->query($options);
        return $query->result();
    }
    public function inserir_contas($dados){
        $this->db->insert('conta',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = "SELECT * FROM conta WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$consulta.= " ORDER BY nivel_conta";
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE conta SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('conta',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('conta', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
