package br.com.cellservice.service;

import java.util.List;

import javax.ejb.Local;

import br.com.cellservice.model.Presenca;

@Local
public interface PresencaServico {

	public Presenca save(Presenca presenca);

	public void remove(Presenca presenca);

	public Presenca find(Long id);

	public List<Presenca> findAll();
}
