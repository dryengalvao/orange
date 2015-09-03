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
class participantes_convenio_m extends CI_Model{
    
    public function lista_participantes_convenio(){
        $options['id'] = 'participante_convenio.id';
		$options['nome'] = 'meses.nome';
        $options['nm_Participante'] = 'participante_convenio.nm_Participante';
        $options['cd_CicParticipante'] = 'participante_convenio.cd_CicParticipante';
        $options['vl_Participacao'] = 'participante_convenio.vl_Participacao';
        $options['nu_Convenio'] = 'convenio.nu_Convenio';
        $this->db->select($options);
        $this->db->from('public.participante_convenio');
		$this->db->join('public.convenio','convenio.id = participante_convenio.id_convenio');
		$this->db->join('public.meses', 'meses.id = participante_convenio.mes');
        $this->db->where('participante_convenio.exportado',0);
        $this->db->order_by('participante_convenio.mes','participante_convenio.nm_Participante');
        $query = $this->db->get();
        return $query->result();
    }
	public function lista_participantes_convenio_exportados(){
        $options['id'] = 'participante_convenio.id';
		$options['nome'] = 'meses.nome';
        $options['nm_Participante'] = 'participante_convenio.nm_Participante';
        $options['cd_CicParticipante'] = 'participante_convenio.cd_CicParticipante';
        $options['vl_Participacao'] = 'participante_convenio.vl_Participacao';
        $options['nu_Convenio'] = 'convenio.nu_Convenio';
        $this->db->select($options);
        $this->db->from('public.participante_convenio');
		$this->db->join('public.convenio','convenio.id = participante_convenio.id_convenio');
		$this->db->join('public.meses', 'meses.id = participante_convenio.mes');
        $this->db->where('participante_convenio.exportado',1);
        $this->db->order_by('participante_convenio.mes','participante_convenio.nm_Participante');
        $query = $this->db->get();
        return $query->result();
    }
    public function inserir_participantes_convenio($dados){
        $this->db->insert('participante_convenio',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT pc.*, c."nu_Convenio" FROM participante_convenio pc JOIN convenio c on c.id = pc.id_convenio WHERE';
        foreach ($dados as $row){
            $consulta.= " pc.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE participante_convenio SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('participante_convenio',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('participante_convenio', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
