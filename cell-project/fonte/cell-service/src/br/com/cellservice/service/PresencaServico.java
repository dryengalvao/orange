package br.com.cellservice.service;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;

@Path("/presenca")
public class PresencaServico {
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
	@Path("/atualizar/{presenca}")
	@Produces("application/json")
	public String atualizar(@PathParam("presenca") String presenca) {
		return "";
	}
	
	@GET
	@Path("/cadastrar/{presenca}")
	@Produces("application/json")
	public String cadastrar(@PathParam("presenca") String presenca) {
		return "";
	}
}
