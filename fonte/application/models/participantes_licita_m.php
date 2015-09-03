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
class participantes_licita_m extends CI_Model{
    
    public function lista_participantes_licitacao(){
        $options = 'SELECT participante_licitacao.id, licitacao."nu_ProcessoLicitatorio", 		 
					participante_licitacao."cd_CicParticipante", participante_licitacao."nm_Participante", tipo_pessoa.descricao, 
					participante_licitacao."tp_Convidado", meses.nome
					FROM public.participante_licitacao
					JOIN public.tipo_pessoa on participante_licitacao."tp_Pessoa" = tipo_pessoa.codigo
					JOIN licitacao on licitacao.id = participante_licitacao.id_licitacao
					JOIN public.meses on participante_licitacao.mes = meses.id
					WHERE participante_licitacao.exportado = 0
					ORDER BY participante_licitacao.mes, licitacao."nu_ProcessoLicitatorio"';
        $query = $this->db->query($options);
        return $query->result();
    }
	public function lista_participantes_licitacao_exportados(){
        $options = 'SELECT participante_licitacao.id, licitacao."nu_ProcessoLicitatorio", 		 
					participante_licitacao."cd_CicParticipante", participante_licitacao."nm_Participante", tipo_pessoa.descricao, 
					participante_licitacao."tp_Convidado", meses.nome
					FROM public.participante_licitacao
					JOIN public.tipo_pessoa on participante_licitacao."tp_Pessoa" = tipo_pessoa.codigo
					JOIN licitacao on licitacao.id = participante_licitacao.id_licitacao
					JOIN public.meses on participante_licitacao.mes = meses.id
					WHERE participante_licitacao.exportado = 1
					ORDER BY participante_licitacao.mes, licitacao."nu_ProcessoLicitatorio"';
        $query = $this->db->query($options);
        return $query->result();
    }
    public function inserir_participante_licitacao($dados){
        $this->db->insert('participante_licitacao',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT pl.*, l."nu_ProcessoLicitatorio" FROM participante_licitacao pl JOIN licitacao l on l.id = pl.id_licitacao WHERE';
        foreach ($dados as $row){
            $consulta.= " pl.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE participante_licitacao SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('participante_licitacao',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('participante_licitacao', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
