package br.com.cellservice.connection;

import br.com.cellservice.dao.CelulaDAO;

public class DAOFactory {

	public static CelulaDAO celulaFactoryDAO() {
		return CelulaDAO.getInstancia();
	}
	
}
