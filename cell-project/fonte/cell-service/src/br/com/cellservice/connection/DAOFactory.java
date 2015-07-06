package br.com.cellservice.connection;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

public class DAOFactory {

	private static EntityManagerFactory entityManagerFactory = Persistence
			.createEntityManagerFactory("cell-persistence-unit");

	public EntityManager getEntityManager() {
		return entityManagerFactory.createEntityManager();
	}
}
