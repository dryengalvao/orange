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
class certidoes_m extends CI_Model{
    
    public function lista_certidoes(){
        $options = 'SELECT certidao.id, licitacao."nu_ProcessoLicitatorio", certidao."cd_CicParticipante", 
		            certidao."nu_Certidao", tipo_certidao.descricao, meses.nome
					FROM public.certidao
					JOIN public.tipo_certidao on certidao."tp_Certidao" = tipo_certidao.codigo
					JOIN licitacao on licitacao.id = certidao.id_licitacao
					JOIN public.meses on certidao.mes = meses.id
					WHERE certidao.exportado = 0
					ORDER BY certidao.mes, licitacao."nu_ProcessoLicitatorio", certidao."nu_Certidao"';
        $query = $this->db->query($options);
        return $query->result();
    }
	public function lista_certidoes_exportados(){
        $options = 'SELECT certidao.id, licitacao."nu_ProcessoLicitatorio", certidao."cd_CicParticipante", 
		            certidao."nu_Certidao", tipo_certidao.descricao, meses.nome
					FROM public.certidao
					JOIN public.tipo_certidao on certidao."tp_Certidao" = tipo_certidao.codigo
					JOIN licitacao on licitacao.id = certidao.id_licitacao
					JOIN public.meses on certidao.mes = meses.id
					WHERE certidao.exportado = 1
					ORDER BY certidao.mes, licitacao."nu_ProcessoLicitatorio", certidao."nu_Certidao"';
        $query = $this->db->query($options);
        return $query->result();
    }
    public function inserir_certidao($dados){
        $this->db->insert('certidao',$dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
    public function exportar($dados){
        $consulta = 'SELECT c.*, l."nu_ProcessoLicitatorio" FROM certidao c JOIN licitacao l on l.id = c.id_licitacao WHERE';
        foreach ($dados as $row){
            $consulta.= " c.id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
        $query = $this->db->query($consulta);
        return $query->result();
    }
    public function exportados($dados){
        $consulta = "UPDATE certidao SET exportado = 1, dt_exportacao =  now() WHERE";
        foreach ($dados as $row){
            $consulta.= " id = ".$row;
            if(next($dados) != NULL) $consulta.= " or ";
        }
		$query = $this->db->query($consulta);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
    }
	public function consultar($id){
		$query = $this->db->get_where('certidao',$id);
        return $query->result();
	}
	public function editar($dados,$id){
		$this->db->where('id', $id);
		$this->db->update('certidao', $dados);
        if($this->db->affected_rows() != 0) return TRUE;
        else return FALSE;
	}
}
?>
