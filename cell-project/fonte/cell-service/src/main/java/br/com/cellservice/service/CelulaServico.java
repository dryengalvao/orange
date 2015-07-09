package br.com.cellservice.service;

import java.util.List;

import br.com.cellservice.model.Celula;

public interface CelulaServico {

	public Celula save(Celula celula);

	public void remove(Celula celula);

	public Celula find(Long id);

	public List<Celula> findAll();
}
