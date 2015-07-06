package br.com.cellservice.dao;

import javax.ejb.Stateless;
import javax.ejb.TransactionAttribute;
import javax.ejb.TransactionAttributeType;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

import br.com.cellservice.model.Celula;

@Stateless
@TransactionAttribute(TransactionAttributeType.SUPPORTS)
public class CelulaDAO extends AbstractPersistence<Celula, Long> {
	
	public CelulaDAO() {
		super(Celula.class);
	}

	@PersistenceContext(unitName="cell-persistence-unit")
	private EntityManager em;
	
	@Override
	protected EntityManager getEntityManager() {
        return this.em;
    }
}
