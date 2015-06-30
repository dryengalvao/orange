package br.com.cellservice.service;

import java.util.List;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;

import br.com.cellservice.connection.DAOFactory;
import br.com.cellservice.model.Celula;

@Path("/celula")
public class CelulaServico {

	@GET
	@Path("/listar")
	@Produces("application/json")
	public String listar() {
		
		List<Celula> celulas = DAOFactory.celulaFactoryDAO().lista();
		
		return Celula.listToJson(celulas);
	}
	
	@GET @Path("/deletar/{id}")
	@Produces("application/json")
	public String deletar(@PathParam("id") String id) {
		
		//List<Celula> celulas = DAOFactory.celulaFactoryDAO().lista();
		//return Celula.listToJson(celulas);
		return "";
	}
	
	@GET
	@Path("/pesquisar/{id}")
	@Produces("application/json")
	public String pesquisar(@PathParam("id") String id) {
		
		//List<Celula> celulas = DAOFactory.celulaFactoryDAO().lista();
		//return Celula.listToJson(celulas);
		
		return "";
	}
	
	@GET
	@Path("/atualizar/{celula}")
	@Produces("application/json")
	public String atualizar(@PathParam("celula") String celula) {
		
		//List<Celula> celulas = DAOFactory.celulaFactoryDAO().lista();
		//return Celula.listToJson(celulas);
		return "";
	}
	
	@GET
	@Path("/cadastrar/{celula}")
	@Produces("application/json")
	public String cadastrar(@PathParam("celula") String celula) {
		
		//List<Celula> celulas = DAOFactory.celulaFactoryDAO().lista();
		//return Celula.listToJson(celulas);
		return "";
	}
	
	
}
