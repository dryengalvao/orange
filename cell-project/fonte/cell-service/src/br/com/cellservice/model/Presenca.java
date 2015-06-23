package br.com.cellservice.model;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;

import flexjson.JSONDeserializer;
import flexjson.JSONSerializer;

@Entity
public class Presenca {

	@ManyToOne
	@JoinColumn(name = "realizacao_id")
	private Realizacao realizacao;

	@ManyToOne
	@JoinColumn(name = "membro_id")
	private Membro membro;

	private String situacao;

	public Realizacao getRealizacao() {
		return realizacao;
	}

	public void setRealizacao(Realizacao realizacao) {
		this.realizacao = realizacao;
	}

	public Membro getMembro() {
		return membro;
	}

	public void setMembro(Membro membro) {
		this.membro = membro;
	}

	public String getSituacao() {
		return situacao;
	}

	public void setSituacao(String situacao) {
		this.situacao = situacao;
	}

	public static Presenca jsonToObject(String json) {
		return new JSONDeserializer<Presenca>().use(null, Presenca.class).deserialize(json);
	}

	public String objectToJson() {
		return new JSONSerializer().exclude("*.class").serialize(this);
	}

	public static String listToJson(List<Presenca> presenca) {
		return new JSONSerializer().exclude("*.class").serialize(presenca);
	}
}
