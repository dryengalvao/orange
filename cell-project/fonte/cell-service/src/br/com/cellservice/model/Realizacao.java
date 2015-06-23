package br.com.cellservice.model;

import java.util.Collection;

public class Realizacao {
	private Celula celula;
	private Collection<Presenca> presenca;
	private int totalVisitantes;
	private int totalDecisoes;
	private String data;
	private String semana;

	public Celula getCelula() {
		return celula;
	}

	public void setCelula(Celula celula) {
		this.celula = celula;
	}

	public Collection<Presenca> getPresenca() {
		return presenca;
	}

	public void setPresenca(Collection<Presenca> presenca) {
		this.presenca = presenca;
	}

	public int getTotalVisitantes() {
		return totalVisitantes;
	}

	public void setTotalVisitantes(int totalVisitantes) {
		this.totalVisitantes = totalVisitantes;
	}

	public int getTotalDecisoes() {
		return totalDecisoes;
	}

	public void setTotalDecisoes(int totalDecisoes) {
		this.totalDecisoes = totalDecisoes;
	}

	public String getData() {
		return data;
	}

	public void setData(String data) {
		this.data = data;
	}

	public String getSemana() {
		return semana;
	}

	public void setSemana(String semana) {
		this.semana = semana;
	}

}
