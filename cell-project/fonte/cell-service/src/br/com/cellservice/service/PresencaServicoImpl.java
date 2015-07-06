package br.com.cellservice.service;

import java.util.List;

import javax.ejb.EJB;

import br.com.cellservice.dao.PresencaDAO;
import br.com.cellservice.model.Presenca;

public class PresencaServicoImpl implements PresencaServico {

	@EJB
	private PresencaDAO dao;

	@Override
	public Presenca save(Presenca presenca) {
		return this.dao.save(presenca);
	}

	@Override
	public void remove(Presenca presenca) {
		this.dao.remove(presenca);
	}

	@Override
	public Presenca find(Long id) {
		return this.dao.find(id);
	}

	@Override
	public List<Presenca> findAll() {
		return this.dao.findAll();
	}
}
