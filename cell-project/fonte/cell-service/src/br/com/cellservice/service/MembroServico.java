package br.com.cellservice.service;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;

import org.codehaus.jettison.json.JSONArray;

@Path("/membro")
public class MembroServico {

	@GET
	@Produces("application/json")
	public JSONArray lista() {
		return null;
	}
}
