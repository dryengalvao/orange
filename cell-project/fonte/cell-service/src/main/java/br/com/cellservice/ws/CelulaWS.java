package br.com.cellservice.ws;

import javax.inject.Inject;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.QueryParam;

import org.slf4j.Logger;

import br.com.cellservice.model.Celula;
import br.com.cellservice.service.CelulaServico;

@Path("/celula")
@Produces("application/json")
public class CelulaWS {

	@Inject
	private Logger logger;

	@Inject
	private CelulaServico servico;

	@GET
	@Path("/listar")
	public String listar() {
		logger.info("listar todas as celulas..");
		return Celula.listToJson(this.servico.findAll());
	}

	@DELETE
	@Path("/deletar/{id}")
	public String deletar(@PathParam("id") String id) {
		logger.info("remover uma celula..");
		Celula c = new Celula();
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
		logger.info("pesquisar uma celula..");
		Celula celula = this.servico.find(Long.parseLong(id));

		return celula.objectToJson();
	}

	@POST
	@Path("/atualizar/{id}")
	public String atualizar(@PathParam("id") long id,
			@QueryParam("diaSemana") String diaSemana,
            @QueryParam("endereco") String endereco,
            @QueryParam("horario") String horario,
            @QueryParam("nome") String nome)
             {
		logger.info("atualizar uma celulas..");
		
		Celula celula = new Celula();
		celula.setId(id);
		celula.setDiaSemana(diaSemana);
		celula.setEndereco(endereco);
		celula.setHorario(horario);
		celula.setNome(nome);
		
		this.servico.save(celula);
		return "";
	}

	@PUT
	@Path("/cadastrar/{celula}")
	public String cadastrar(@PathParam("celula") String json) {
		logger.info("cadastro de celulas..");
		
		Celula celulaObject = this.servico.save(Celula.jsonToObject(json)); 
		return celulaObject.objectToJson();
	}
}
