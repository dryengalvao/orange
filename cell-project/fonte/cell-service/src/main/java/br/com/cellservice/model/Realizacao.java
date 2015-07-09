package br.com.cellservice.model;

import java.util.ArrayList;
import java.util.Collection;
import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;

import flexjson.JSONDeserializer;
import flexjson.JSONSerializer;

@Entity
public class Realizacao implements AbstractEntity {

	/**
	 * 
	 */
	private static final long serialVersionUID = 2498188978439147602L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
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

	public void setId(Long id) {
		this.id = id;
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

	public static Realizacao jsonToObject(String json) {
		return new JSONDeserializer<Realizacao>().use(null, Realizacao.class)
				.use("presenca", ArrayList.class).deserialize(json);
	}

	public String objectToJson() {
		return new JSONSerializer().exclude("*.class").serialize(this);
	}

	public static String listToJson(List<Realizacao> realizacao) {
		return new JSONSerializer().exclude("*.class").serialize(realizacao);
	}
}
