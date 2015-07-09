package br.com.cellservice.dao;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import javax.persistence.PersistenceUnit;

import br.com.cellservice.model.Membro;

public class MembroDAO extends AbstractPersistence<Membro, Long> {

	public MembroDAO() {
		super(Membro.class);
	}

	@PersistenceUnit(unitName = "cell-persistence-unit")
	private EntityManagerFactory entityManagerFactory;

	@Override
	protected EntityManager getEntityManager() {

		if (entityManagerFactory == null)
			entityManagerFactory = Persistence
					.createEntityManagerFactory("cell-persistence-unit");

		return entityManagerFactory.createEntityManager();

	}
}
