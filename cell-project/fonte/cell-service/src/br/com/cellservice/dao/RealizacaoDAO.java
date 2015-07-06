package br.com.cellservice.dao;

import javax.ejb.Stateless;
import javax.ejb.TransactionAttribute;
import javax.ejb.TransactionAttributeType;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

import br.com.cellservice.model.Realizacao;

@Stateless
@TransactionAttribute(TransactionAttributeType.SUPPORTS)
public class RealizacaoDAO extends AbstractPersistence<Realizacao, Long> {

	public RealizacaoDAO() {
		super(Realizacao.class);
	}

	@PersistenceContext(unitName = "cell-persistence-unit")
	private EntityManager em;

	@Override
	protected EntityManager getEntityManager() {
		return this.em;
	}
}
