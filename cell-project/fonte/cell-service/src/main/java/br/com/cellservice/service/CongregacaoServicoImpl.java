package br.com.cellservice.service;

import java.util.List;

import javax.inject.Inject;

import br.com.cellservice.dao.CongregacaoDAO;
import br.com.cellservice.model.Congregacao;

public class CongregacaoServicoImpl implements CongregacaoServico {

	@Inject
	private CongregacaoDAO dao;

	@Override
	public Congregacao save(Congregacao congregacao) {
		return this.dao.save(congregacao);
	}

	@Override
	public void remove(Congregacao congregacao) {
		this.dao.remove(congregacao);
	}

	@Override
	public Congregacao find(Long id) {
		return this.dao.find(id);
	}

	@Override
	public List<Congregacao> findAll() {
		return this.dao.findAll();
	}
}
