package br.com.cellservice.model;

import java.util.Collection;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;

@Entity
public class Realizacao implements AbstractEntity {

	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue
	private Long id;

	@OneToOne
	@JoinColumn(name = "celula_id")
	private Celula celula;

	@OneToMany(mappedBy = "realizacao")
	private Collection<Presenca> presenca;

	private int totalVisitantes;
	private int totalDecisoes;
	private String data;
	private String semana;

	public Long getId() {
		return id;
	}

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
