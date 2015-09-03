<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of movcon_final_m
 *
 * @author vcerdeira
 */
class movcon_final_m extends CI_Model{
    
    public function lista_movcon_final(){
        $options['id'] = 'movcon_final.id';
        $options['vl_movDebito'] = 'movcon_final.vl_movDebito';
		$options['nome'] = 'meses.nome';
        $options['vl_movCredito'] = 'movcon_final.vl_movCredito';
        $options['cd_conta'] = 'conta.cd_conta';
        $options['tp_movimento'] = 'tipo_de_movimento.descricao';
        $this->db->select($options);
        $this->db->from('public.movcon_final');
		$this->db->join('public.conta', 'conta.id = movcon_final.id_conta');
		$this->db->join('public.meses', 'meses.id = movcon_final.mes');
		$this->db->join('public.tipo_de_movimento', 'tipo_de_movimento.codigo = movcon_final.tp_movimento');
        $this->db->where('movcon_final.exportado',0);
        $this->db->order_by('movcon_final.mes','conta.cd_conta');
        $query = $this->db->get();
        return $query->result();
    }
	public function lista_movcon_final_exportados(){
        $options['id'] = 'movcon_final.id';
        $options['vl_movDebito'] = 'movcon_final.vl_movDebito';
		$options['nome'] = 'meses.nome';
        $options['vl_movCredito'] = 'movcon_final.vl_movCredito';
        $options['cd_conta'] = 'conta.cd_conta';
        $options['tp_movimento'] = 'tipo_de_movimento.descricao';
        $this->db->select($options);
        $this->db->from('public.movcon_final');
		$this->db->join('public.conta', 'conta.id = movcon_final.id_conta');
		$this->db->join('public.meses', 'meses.id = movcon_final.mes');
		$this->db->join('public.tipo_de_movimento', 'tipo_de_movimento.codigo = movcon_final.tp_movimento');
        $this->db->where('movcon_final.exportado',1);
        $this->db->order_by('movcon_final.mes','conta.cd_conta');
        $query = $this->db->get();
        return $query->result();
    }
    public function inserir_movcon_final($dados){
        $this->db->insert('movcon_final',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT mvf.*, c."cd_conta", c."ano_criacao" FROM movcon_final mvf JOIN conta c on c.id = mvf.id_conta WHERE';
        foreach ($dados as $row){
            $consulta.= " mvf.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE movcon_final SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('movcon_final',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('movcon_final', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
