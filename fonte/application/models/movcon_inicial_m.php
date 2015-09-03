<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of movcon_inicial_m
 *
 * @author vcerdeira
 */
class movcon_inicial_m extends CI_Model{
    
    public function lista_movcon_inicial(){
        $options['id'] = 'movcon_inicial.id';
        $options['vl_movDebito'] = 'movcon_inicial.vl_movDebito';
		$options['nome'] = 'meses.nome';
        $options['vl_movCredito'] = 'movcon_inicial.vl_movCredito';
        $options['cd_conta'] = 'conta.cd_conta';
        $options['tp_movimento'] = 'tipo_de_movimento.descricao';
        $this->db->select($options);
        $this->db->from('public.movcon_inicial');
		$this->db->join('public.conta', 'conta.id = movcon_inicial.id_conta');
		$this->db->join('public.meses', 'meses.id = movcon_inicial.mes');
		$this->db->join('public.tipo_de_movimento', 'tipo_de_movimento.codigo = movcon_inicial.tp_movimento');
        $this->db->where('movcon_inicial.exportado',0);
        $this->db->order_by('movcon_inicial.mes','conta.cd_conta');
        $query = $this->db->get();
        return $query->result();
    }
	public function lista_movcon_inicial_exportados(){
        $options['id'] = 'movcon_inicial.id';
        $options['vl_movDebito'] = 'movcon_inicial.vl_movDebito';
		$options['nome'] = 'meses.nome';
        $options['vl_movCredito'] = 'movcon_inicial.vl_movCredito';
        $options['cd_conta'] = 'conta.cd_conta';
        $options['tp_movimento'] = 'tipo_de_movimento.descricao';
        $this->db->select($options);
        $this->db->from('public.movcon_inicial');
		$this->db->join('public.conta', 'conta.id = movcon_inicial.id_conta');
		$this->db->join('public.meses', 'meses.id = movcon_inicial.mes');
		$this->db->join('public.tipo_de_movimento', 'tipo_de_movimento.codigo = movcon_inicial.tp_movimento');
        $this->db->where('movcon_inicial.exportado',1);
        $this->db->order_by('movcon_inicial.mes','conta.cd_conta');
        $query = $this->db->get();
        return $query->result();
    }
    public function inserir_movcon_inicial($dados){
        $this->db->insert('movcon_inicial',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT mvi.*, c."cd_conta", c."ano_criacao" FROM movcon_inicial mvi JOIN conta c on c.id = mvi.id_conta WHERE';
        foreach ($dados as $row){
            $consulta.= " mvi.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE movcon_inicial SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('movcon_inicial',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('movcon_inicial', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
