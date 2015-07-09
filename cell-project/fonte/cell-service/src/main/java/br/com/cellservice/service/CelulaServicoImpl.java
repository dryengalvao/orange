package br.com.cellservice.service;

import java.util.List;

import javax.inject.Inject;

import br.com.cellservice.dao.CelulaDAO;
import br.com.cellservice.model.Celula;

public class CelulaServicoImpl implements CelulaServico {

	@Inject
	private CelulaDAO dao;

	@Override
	public Celula save(Celula celula) {
		return this.dao.save(celula);
	}

	@Override
	public void remove(Celula celula) {
		this.dao.remove(celula);
	}

	@Override
	public Celula find(Long id) {
		return this.dao.find(id);
	}

	@Override
	public List<Celula> findAll() {
		return this.dao.findAll();
	}
}
