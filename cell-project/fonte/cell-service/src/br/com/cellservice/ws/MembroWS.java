package br.com.cellservice.ws;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;

@Path("/membro")
public class MembroWS {

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
