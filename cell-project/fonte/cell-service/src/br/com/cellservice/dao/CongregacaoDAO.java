package br.com.cellservice.dao;

import javax.ejb.Stateless;
import javax.ejb.TransactionAttribute;
import javax.ejb.TransactionAttributeType;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

import br.com.cellservice.model.Congregacao;

@Stateless
@TransactionAttribute(TransactionAttributeType.SUPPORTS)
public class CongregacaoDAO extends AbstractPersistence<Congregacao, Long> {

	public CongregacaoDAO() {
		super(Congregacao.class);
	}

	@PersistenceContext(unitName = "cell-persistence-unit")
	private EntityManager em;

	@Override
	protected EntityManager getEntityManager() {
		return this.em;
	}
}
