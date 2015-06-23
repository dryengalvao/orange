package br.com.cellservice.dao;

import java.util.List;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.cfg.AnnotationConfiguration;

import br.com.cellservice.model.Celula;

public class CongregacaoDAO {

	private static CongregacaoDAO dao = new CongregacaoDAO();

	public static CongregacaoDAO getInstancia() {
		return dao;
	}

	public List<Celula> lista() {
		AnnotationConfiguration configuration = new AnnotationConfiguration();

		configuration.configure();

		SessionFactory factory = configuration.buildSessionFactory();

		Session session = factory.openSession();

		// carrega o produto do banco de dados

//		List<Celula> resultado = (List<Celula>) session.;

//		Transaction tx = session.beginTransaction();
//

//		tx.commit();
		return null;
	}
	
	public String remover(int id) {
	
		return "SUCESS";
	}
	
	public Celula inserir(Celula celula) {
		return null;
	}
	
	public Celula atualizar(Celula celula) {
		return null;
	}
	
}
