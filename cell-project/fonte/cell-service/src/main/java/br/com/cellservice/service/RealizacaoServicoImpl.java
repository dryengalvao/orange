package br.com.cellservice.service;

import java.util.List;

import javax.inject.Inject;

import br.com.cellservice.dao.RealizacaoDAO;
import br.com.cellservice.model.Realizacao;

public class RealizacaoServicoImpl implements RealizacaoServico {

	@Inject
	private RealizacaoDAO dao;

	@Override
	public Realizacao save(Realizacao realizacao) {
		return this.dao.save(realizacao);
	}

	@Override
	public void remove(Realizacao realizacao) {
		this.dao.remove(realizacao);
	}

	@Override
	public Realizacao find(Long id) {
		return this.dao.find(id);
	}

	@Override
	public List<Realizacao> findAll() {
		return this.dao.findAll();
	}
}
