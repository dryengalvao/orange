package br.com.cellservice.service;

import java.util.List;

import br.com.cellservice.model.Realizacao;

public interface RealizacaoServico {

	public Realizacao save(Realizacao rongregacao);

	public void remove(Realizacao realizacao);

	public Realizacao find(Long id);

	public List<Realizacao> findAll();
}
