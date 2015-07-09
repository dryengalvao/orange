package br.com.cellservice.teste;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

import br.com.cellservice.model.Celula;
import br.com.cellservice.model.Membro;

public class TesteJPA {

	public static void main(String[] args) {
		/**
		 * Usando MySQL
		 */
		EntityManagerFactory emf = Persistence
				.createEntityManagerFactory("cell-persistence-unit");
		
		EntityManager em = emf.createEntityManager();

//		Congregacao congregacao = new Congregacao();
//		congregacao.setArea(0);
//		congregacao.setEndereco("Endereco 1");
//		congregacao.setNome("Congregacao 1");
//		congregacao.setNumero("1");

		Membro anfitriao = new Membro();
		anfitriao.setId(1l);
//		anfitriao.setConsolidacaoPasso1(true);
//		anfitriao.setConsolidacaoPasso2(true);
//		anfitriao.setConsolidacaoPasso3(true);
//		anfitriao.setConsolidacaoPasso4(true);
//		anfitriao.setConsolidacaoPasso5(true);
//		anfitriao.setConsolidacaoPasso6(true);
//		anfitriao.setConsolidacaoPasso7(true);
//		anfitriao.setEncontro(true);
//		anfitriao.setDiscipulado(true);
//		anfitriao.setEndereco("Qualquer Lugar");
//		anfitriao.setFuncao("Qualquer uma");
//		anfitriao.setNome("Mano veio");
		
		Celula celula = new Celula();
		celula.setAnfitriao(anfitriao);
		celula.setDiaSemana("Quarta-feira");
		celula.setEndereco("Endereco celula");
		celula.setHorario("20 horas");
		celula.setLider(anfitriao);
		celula.setNome("nome da celula");
		celula.setSecretario(anfitriao);
		celula.setTesoureiro(anfitriao);

		em.getTransaction().begin();
		em.persist(celula);

		em.getTransaction().commit();
		em.close();
	}
}

