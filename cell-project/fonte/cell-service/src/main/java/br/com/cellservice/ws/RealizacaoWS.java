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

import br.com.cellservice.model.Realizacao;
import br.com.cellservice.service.RealizacaoServico;

@Path("/realizacao")
@Produces("application/json")
public class RealizacaoWS {
	
	@Inject
	private Logger logger;

	@Inject
	private RealizacaoServico servico;
	
	@GET
	@Path("/listar")
	public String listar() {
		logger.info("listar todas as realizacoes..");
		return Realizacao.listToJson(this.servico.findAll());
	}

	@DELETE
	@Path("/deletar/{id}")
	public String deletar(@PathParam("id") String id) {
		logger.info("remover uma realizacao..");
		Realizacao r = new Realizacao();
		r.setId(Long.parseLong(id));

		String resultado = "ERRO";

		try {
			this.servico.remove(r);
			resultado = "SUCESSO";
		} catch (Exception e) {
			logger.error(e.getMessage());
		}

		return "{\"status\":\"" + resultado + "\"}";
	}

	@GET
	@Path("/pesquisar/{id}")
	public String pesquisar(@PathParam("id") String id) {
		logger.info("pesquisar uma realizacao de celula..");
		Realizacao realizacao = this.servico.find(Long.parseLong(id));

		return realizacao.objectToJson();
	}

	@POST
	@Path("/atualizar/{realizacao}")
	public String atualizar(@PathParam("realizacao") String realizacao) {
		return "";
	}

	@PUT
	@Path("/cadastrar/{realizacao}")
	public String cadastrar(@PathParam("realizacao") String json) {
		logger.info("cadastro da realizacao de uma celula..");
		
		Realizacao realizacao = this.servico.save(Realizacao.jsonToObject(json)); 
		return realizacao.objectToJson();
	}
}
