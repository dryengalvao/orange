package br.com.cellservice.ws;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;

@Path("/congregacao")
public class CongregacaoWS {
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
	@Path("/atualizar/{congregacao}")
	@Produces("application/json")
	public String atualizar(@PathParam("congregacao") String congregacao) {
		return "";
	}
	
	@GET
	@Path("/cadastrar/{congregacao}")
	@Produces("application/json")
	public String cadastrar(@PathParam("congregacao") String congregacao) {
		return "";
	}
}
