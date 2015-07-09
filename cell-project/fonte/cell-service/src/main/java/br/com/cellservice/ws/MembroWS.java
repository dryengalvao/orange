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

import br.com.cellservice.model.Membro;
import br.com.cellservice.service.MembroServico;

@Path("/membro")
@Produces("application/json")
public class MembroWS {

	@Inject
	private Logger logger;

	@Inject
	private MembroServico servico;

	@GET
	@Path("/listar")
	public String listar() {
		logger.info("listar todas as membros..");
		return Membro.listToJson(this.servico.findAll());
	}

	@DELETE
	@Path("/deletar/{id}")
	public String deletar(@PathParam("id") String id) {
		logger.info("remover uma celula..");
		Membro m = new Membro();
		m.setId(Long.parseLong(id));

		String resultado = "ERRO";

		try {
			this.servico.remove(m);
			resultado = "SUCESSO";
		} catch (Exception e) {
			logger.error(e.getMessage());
		}

		return "{\"status\":\"" + resultado + "\"}";
	}

	@GET
	@Path("/pesquisar/{id}")
	public String pesquisar(@PathParam("id") String id) {
		logger.info("pesquisar um membro..");
		Membro m = this.servico.find(Long.parseLong(id));

		return m.objectToJson();
	}

	@POST
	@Path("/atualizar/{membro}")
	public String atualizar(@PathParam("membro") String membro) {
		return "";
	}

	@PUT
	@Path("/cadastrar/{membro}")
	public String cadastrar(@PathParam("membro") String json) {
		logger.info("cadastro de membro..");
		
		Membro membro = this.servico.save(Membro.jsonToObject(json)); 
		return membro.objectToJson();
	}

}
