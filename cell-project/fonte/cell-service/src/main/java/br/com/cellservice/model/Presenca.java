package br.com.cellservice.model;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.OneToOne;

import flexjson.JSONDeserializer;
import flexjson.JSONSerializer;

@Entity
public class Presenca implements AbstractEntity {

	/**
	 * 
	 */
	private static final long serialVersionUID = -8973004777923816276L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private Long id;

	@ManyToOne
	@JoinColumn(name = "realizacao_id")
	private Realizacao realizacao;

	@OneToOne
	@JoinColumn(name = "membro_id")
	private Membro membro;

	private String situacao;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

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
		return new JSONDeserializer<Presenca>().use(null, Presenca.class)
				.deserialize(json);
	}

	public String objectToJson() {
		return new JSONSerializer().exclude("*.class").serialize(this);
	}

	public static String listToJson(List<Presenca> presencas) {
		return new JSONSerializer().exclude("*.class").serialize(presencas);
	}
}
