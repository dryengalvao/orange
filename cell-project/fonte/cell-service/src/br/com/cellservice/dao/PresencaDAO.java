package br.com.cellservice.dao;

import java.util.List;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.cfg.AnnotationConfiguration;

import br.com.cellservice.model.Presenca;

public class PresencaDAO {

	private static PresencaDAO dao = new PresencaDAO();

	public static PresencaDAO getInstancia() {
		return dao;
	}

	public List<Presenca> lista() {
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

	public Presenca inserir(Presenca presenca) {
		return null;
	}

	public Presenca atualizar(Presenca presenca) {
		return null;
	}

}
