package br.com.cellservice.ws;

import javax.inject.Inject;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;

import org.slf4j.Logger;

import br.com.cellservice.model.Presenca;
import br.com.cellservice.service.PresencaServico;

@Path("/presenca")
@Produces("application/json")
public class PresencaWS {

	@Inject
	private Logger logger;

	@Inject
	private PresencaServico servico;
	
	@GET
	@Path("/listar")
	public String listar() {
		logger.info("listar todas as presencas..");
		return Presenca.listToJson(this.servico.findAll());
	}

	@DELETE
	@Path("/deletar/{id}")
	public String deletar(@PathParam("id") String id) {
		logger.info("remover uma presenca..");
		Presenca p = new Presenca();
		p.setId(Long.parseLong(id));

		String resultado = "ERRO";

		try {
			this.servico.remove(p);
			resultado = "SUCESSO";
		} catch (Exception e) {
			logger.error(e.getMessage());
		}

		return "{\"status\":\"" + resultado + "\"}";
	}

	@GET
	@Path("/pesquisar/{id}")
	public String pesquisar(@PathParam("id") String id) {
		logger.info("pesquisar uma presenca..");
		Presenca presenca = this.servico.find(Long.parseLong(id));

		return presenca.objectToJson();
	}

	@POST
	@Path("/atualizar/{presenca}")
	public String atualizar(@PathParam("presenca") String presenca) {
		return "";
	}

	@PUT
	@Path("/cadastrar/{presenca}")
	public String cadastrar(@PathParam("presenca") String json) {
		logger.info("cadastro de presenca..");
		
		Presenca presenca = this.servico.save(Presenca.jsonToObject(json)); 
		return presenca.objectToJson();
	}
}
