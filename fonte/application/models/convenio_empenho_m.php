<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of certidoes_m
 *
 * @author vcerdeira
 */
class convenio_empenho_m extends CI_Model{
    
    public function lista_convenio_empenho(){
        $options['id'] = 'convenio_empenho.id';
		$options['nome'] = 'meses.nome';
        $options['nu_Convenio'] = 'convenio.nu_Convenio';
        $options['nu_NotaEmpenho'] = 'convenio_empenho.nu_NotaEmpenho';
        $options['ano_Empenho'] = 'convenio_empenho.ano_Empenho';
        $options['cd_UnidadeOrcamentaria'] = 'convenio_empenho.cd_UnidadeOrcamentaria';
        $this->db->select($options);
        $this->db->from('public.convenio_empenho');
		$this->db->join('public.convenio','convenio.id = convenio_empenho.id_convenio');
		$this->db->join('public.meses', 'meses.id = convenio_empenho.mes');
        $this->db->where('convenio_empenho.exportado',0);
        $this->db->order_by('convenio_empenho.mes','convenio.nu_Convenio','convenio_empenho.nu_NotaEmpenho');
        $query = $this->db->get();
        return $query->result();
    }
	public function lista_convenio_empenho_exportados(){
        $options['id'] = 'convenio_empenho.id';
		$options['nome'] = 'meses.nome';
        $options['nu_Convenio'] = 'convenio.nu_Convenio';
        $options['nu_NotaEmpenho'] = 'convenio_empenho.nu_NotaEmpenho';
        $options['ano_Empenho'] = 'convenio_empenho.ano_Empenho';
        $options['cd_UnidadeOrcamentaria'] = 'convenio_empenho.cd_UnidadeOrcamentaria';
        $this->db->select($options);
        $this->db->from('public.convenio_empenho');
		$this->db->join('public.convenio','convenio.id = convenio_empenho.id_convenio');
		$this->db->join('public.meses', 'meses.id = convenio_empenho.mes');
        $this->db->where('convenio_empenho.exportado',1);
        $this->db->order_by('convenio_empenho.mes','convenio.nu_Convenio','convenio_empenho.nu_NotaEmpenho');
        $query = $this->db->get();
        return $query->result();
    }
    public function inserir_convenio_empenho($dados){
        $this->db->insert('convenio_empenho',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT ce.*, c."nu_Convenio" FROM convenio_empenho ce JOIN convenio c on c.id = ce.id_convenio WHERE';
        foreach ($dados as $row){
            $consulta.= " ce.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE convenio_empenho SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('convenio_empenho',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('convenio_empenho', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
