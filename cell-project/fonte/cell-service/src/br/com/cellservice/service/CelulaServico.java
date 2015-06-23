package br.com.cellservice.service;

import java.util.List;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;

import br.com.cellservice.connection.DAOFactory;
import br.com.cellservice.model.Celula;

@Path("/celula")
public class CelulaServico {

	@GET
	@Produces("application/json")
	public String lista() {
		
		List<Celula> celulas = DAOFactory.celulaFactoryDAO().lista();
		
		return Celula.listToJson(celulas);
	}
}
