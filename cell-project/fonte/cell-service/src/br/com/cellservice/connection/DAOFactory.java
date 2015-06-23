package br.com.cellservice.connection;

import br.com.cellservice.dao.CelulaDAO;
import br.com.cellservice.dao.CongregacaoDAO;
import br.com.cellservice.dao.MembroDAO;
import br.com.cellservice.dao.PresencaDAO;
import br.com.cellservice.dao.RealizacaoDAO;

public class DAOFactory {

	public static CelulaDAO celulaFactoryDAO() {
		return CelulaDAO.getInstancia();
	}

	public static MembroDAO membroFactoryDAO() {
		return MembroDAO.getInstancia();
	}

	public static PresencaDAO presencaFactoryDAO() {
		return PresencaDAO.getInstancia();
	}

	public static RealizacaoDAO realizacaoFactoryDAO() {
		return RealizacaoDAO.getInstancia();
	}

	public static CongregacaoDAO congregacaoFactoryDAO() {
		return CongregacaoDAO.getInstancia();
	}
}
