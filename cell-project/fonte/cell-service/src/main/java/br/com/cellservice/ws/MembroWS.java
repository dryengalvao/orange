package br.com.cellservice.service;

import java.util.List;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;

import org.codehaus.jettison.json.JSONArray;

import br.com.cellservice.connection.DAOFactory;
import br.com.cellservice.model.Celula;

@Path("/membro")
public class MembroServico {

	@GET
	@Path("/listar")
	@Produces("application/json")
	public String listar() {
		return "";
	}
	
	@GET @Path("/deletar/{id}")
	@Produces("application/json")
	public String deletar(@PathParam("id") String id) {
		return "";
	}
	
	@GET
	@Path("/pesquisar/{id}")
	@Produces("application/json")
	public String pesquisar(@PathParam("id") String id) {
		return "";
	}
	
	@GET
	@Path("/atualizar/{membro}")
	@Produces("application/json")
	public String atualizar(@PathParam("celula") String celula) {
		return "";
	}
	
	@GET
	@Path("/cadastrar/{membro}")
	@Produces("application/json")
	public String cadastrar(@PathParam("celula") String celula) {
		return "";
	}
	
}
