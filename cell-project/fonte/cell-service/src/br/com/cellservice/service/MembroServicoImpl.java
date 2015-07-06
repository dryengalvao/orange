package br.com.cellservice.service;

import java.util.List;

import javax.ejb.EJB;

import br.com.cellservice.dao.MembroDAO;
import br.com.cellservice.model.Membro;

public class MembroServicoImpl implements MembroServico {
	@EJB
	private MembroDAO dao;

	@Override
	public Membro save(Membro membro) {
		return this.dao.save(membro);
	}

	@Override
	public void remove(Membro membro) {
		this.dao.remove(membro);
	}

	@Override
	public Membro find(Long id) {
		return this.dao.find(id);
	}

	@Override
	public List<Membro> findAll() {
		return this.dao.findAll();
	}
}
