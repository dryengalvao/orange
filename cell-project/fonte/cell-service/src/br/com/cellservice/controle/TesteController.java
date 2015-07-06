package br.com.cellservice.controle;

import java.io.IOException;

import javax.inject.Inject;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import br.com.cellservice.service.CelulaServico;


/**
 * Servlet implementation class TesteController
 */
@WebServlet("/TesteController")
public class TesteController extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
	@Inject
	private CelulaServico servico;
	
	@Override
	protected void doGet(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {

		resp.setContentType("text/html");
		
		this.servico.findAll();
	}
}
