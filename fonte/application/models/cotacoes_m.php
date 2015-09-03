<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cotacoes_m
 *
 * @author vcerdeira
 */
class cotacoes_m extends CI_Model{
    
    public function lista_cotacoes(){
        $options['id'] = 'cotacao.id';
        $options['nu_ProcessoLicitatorio'] = 'licitacao.nu_ProcessoLicitatorio';
        $options['cd_CicParticipante'] = 'cotacao.cd_CicParticipante';
        $options['vl_TotalCotadoItem'] = 'cotacao.vl_TotalCotadoItem';
        $options['cd_VencedorPerdedor'] = 'cotacao.cd_VencedorPerdedor';
		$options['nome'] = 'meses.nome';
        $this->db->select($options);
        $this->db->from('public.cotacao');
		$this->db->join('public.licitacao','licitacao.id = cotacao.id_licitacao');
		$this->db->join('public.meses', 'meses.id = cotacao.mes');
        $this->db->where('cotacao.exportado',0);
        $this->db->order_by('cotacao.mes','licitacao.nu_ProcessoLicitatorio');
        $query = $this->db->get();
        return $query->result();
    }
	public function lista_cotacoes_exportados(){
        $options['id'] = 'cotacao.id';
        $options['nu_ProcessoLicitatorio'] = 'licitacao.nu_ProcessoLicitatorio';
        $options['cd_CicParticipante'] = 'cotacao.cd_CicParticipante';
        $options['vl_TotalCotadoItem'] = 'cotacao.vl_TotalCotadoItem';
        $options['cd_VencedorPerdedor'] = 'cotacao.cd_VencedorPerdedor';
		$options['nome'] = 'meses.nome';
        $this->db->select($options);
        $this->db->from('public.cotacao');
		$this->db->join('public.licitacao','licitacao.id = cotacao.id_licitacao');
		$this->db->join('public.meses', 'meses.id = cotacao.mes');
        $this->db->where('cotacao.exportado',1);
        $this->db->order_by('cotacao.mes','licitacao.nu_ProcessoLicitatorio');
        $query = $this->db->get();
        return $query->result();
    }
    public function inserir_cotacao($dados){
        $this->db->insert('cotacao',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT c.*, l."nu_ProcessoLicitatorio" FROM cotacao c JOIN licitacao l on l.id = c.id_licitacao WHERE';
        foreach ($dados as $row){
            $consulta.= " c.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE cotacao SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('cotacao',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('cotacao', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
