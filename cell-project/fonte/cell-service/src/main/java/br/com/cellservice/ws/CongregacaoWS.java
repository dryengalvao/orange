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

import br.com.cellservice.model.Congregacao;
import br.com.cellservice.service.CongregacaoServico;

@Path("/congregacao")
@Produces("application/json")
public class CongregacaoWS {
	
	@Inject
	private Logger logger;

	@Inject
	private CongregacaoServico servico;
	
	@GET
	@Path("/listar")
	public String listar() {
		logger.info("listar todas as congregacoes..");
		return Congregacao.listToJson(this.servico.findAll());
	}
	
	@DELETE 
	@Path("/deletar/{id}")
	public String deletar(@PathParam("id") String id) {
		logger.info("remover uma congregacao..");
		Congregacao c = new Congregacao();
		c.setId(Long.parseLong(id));

		String resultado = "ERRO";

		try {
			this.servico.remove(c);
			resultado = "SUCESSO";
		} catch (Exception e) {
			logger.error(e.getMessage());
		}

		return "{\"status\":\"" + resultado + "\"}";
	}
	
	@GET
	@Path("/pesquisar/{id}")
	public String pesquisar(@PathParam("id") String id) {
		logger.info("pesquisar uma congregacao..");
		Congregacao congregacao = this.servico.find(Long.parseLong(id));

		return congregacao.objectToJson();
	}
	
	@POST
	@Path("/atualizar/{congregacao}")
	public String atualizar(@PathParam("congregacao") String congregacao) {
		return "";
	}
	
	@PUT
	@Path("/cadastrar/{congregacao}")
	public String cadastrar(@PathParam("congregacao") String json) {
		logger.info("cadastro de congregacao..");
		
		Congregacao congregacao = this.servico.save(Congregacao.jsonToObject(json)); 
		return congregacao.objectToJson();
	}
}
