package br.com.cellservice.dao;

import java.util.List;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.cfg.AnnotationConfiguration;

import br.com.cellservice.model.Realizacao;

public class RealizacaoDAO {

	private static RealizacaoDAO dao = new RealizacaoDAO();

	public static RealizacaoDAO getInstancia() {
		return dao;
	}

	public List<Realizacao> lista() {
		AnnotationConfiguration configuration = new AnnotationConfiguration();

		configuration.configure();

		SessionFactory factory = configuration.buildSessionFactory();

		Session session = factory.openSession();

		// carrega o produto do banco de dados

		// List<Celula> resultado = (List<Celula>) session.;

		// Transaction tx = session.beginTransaction();
		//

		// tx.commit();
		return null;
	}

	public String remover(int id) {

		return "SUCESS";
	}

	public Realizacao inserir(Realizacao realizacao) {
		return null;
	}

	public Realizacao atualizar(Realizacao realizacao) {
		return null;
	}

}
