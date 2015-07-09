package br.com.cellservice.service;

import java.util.List;

import br.com.cellservice.model.Congregacao;

public interface CongregacaoServico {

	public Congregacao save(Congregacao congregacao);

	public void remove(Congregacao congregacao);

	public Congregacao find(Long id);

	public List<Congregacao> findAll();
}
