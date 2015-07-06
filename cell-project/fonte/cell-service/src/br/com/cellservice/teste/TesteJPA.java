package br.com.cellservice.teste;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

import br.com.cellservice.model.Congregacao;


public class TesteJPA {

	public static void main(String[] args) {

		Congregacao congregacao = new Congregacao();
		congregacao.setArea(0);
		congregacao.setEndereco("Endereco 1");
		congregacao.setNome("Congregacao 1");
		congregacao.setNumero("1");

		/**
		 * Usando MySQL
		 */
		EntityManagerFactory emf = Persistence
				.createEntityManagerFactory("cell-persistence-unit");

		EntityManager em = emf.createEntityManager();
		em.getTransaction().begin();

		em.persist(congregacao);

		em.getTransaction().commit();
		em.close();
	}
}

