package br.com.cellservice.dao;

import javax.ejb.Stateless;
import javax.ejb.TransactionAttribute;
import javax.ejb.TransactionAttributeType;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

import br.com.cellservice.model.Membro;

@Stateless
@TransactionAttribute(TransactionAttributeType.SUPPORTS)
public class MembroDAO extends AbstractPersistence<Membro, Long> {

	public MembroDAO() {
		super(Membro.class);
	}

	@PersistenceContext(unitName = "cell-persistence-unit")
	private EntityManager em;

	@Override
	protected EntityManager getEntityManager() {
		return this.em;
	}
}
