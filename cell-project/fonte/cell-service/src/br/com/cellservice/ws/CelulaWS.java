package br.com.cellservice.ws;

import javax.inject.Inject;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;

import br.com.cellservice.model.Celula;
import br.com.cellservice.service.CelulaServico;


@Path("celula")
public class CelulaWS {

	@Inject
	private CelulaServico servico;
	
	@GET
	@Produces("application/json")
	public String lista() {
		String json = Celula.listToJson(this.servico.findAll());
		
		return json;
	}
}
