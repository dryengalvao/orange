package br.com.cellservice.dao;

import java.util.List;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.cfg.AnnotationConfiguration;

import br.com.cellservice.model.Membro;

public class MembroDAO {

	private static MembroDAO dao = new MembroDAO();

	public static MembroDAO getInstancia() {
		return dao;
	}

	public List<Membro> lista() {
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

	public Membro inserir(Membro membro) {
		return null;
	}

	public Membro atualizar(Membro membro) {
		return null;
	}

}
