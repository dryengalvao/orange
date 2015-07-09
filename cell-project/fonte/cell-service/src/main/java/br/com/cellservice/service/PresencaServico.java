package br.com.cellservice.service;

import java.util.List;

import br.com.cellservice.model.Presenca;

public interface PresencaServico {

	public Presenca save(Presenca presenca);

	public void remove(Presenca presenca);

	public Presenca find(Long id);

	public List<Presenca> findAll();
}
