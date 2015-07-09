package br.com.cellservice.model;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

import flexjson.JSONDeserializer;
import flexjson.JSONSerializer;

@Entity
public class Congregacao implements AbstractEntity {

	/**
	 * 
	 */
	private static final long serialVersionUID = -5807627480568587683L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private Long id;

	private String nome;
	private String endereco;
	private String numero;
	private int area;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getEndereco() {
		return endereco;
	}

	public void setEndereco(String endereco) {
		this.endereco = endereco;
	}

	public String getNumero() {
		return numero;
	}

	public void setNumero(String numero) {
		this.numero = numero;
	}

	public int getArea() {
		return area;
	}

	public void setArea(int area) {
		this.area = area;
	}

	public static Congregacao jsonToObject(String json) {
		return new JSONDeserializer<Congregacao>().use(null, Celula.class)
				.deserialize(json);
	}

	public String objectToJson() {
		return new JSONSerializer().exclude("*.class").serialize(this);
	}

	public static String listToJson(List<Congregacao> celulas) {
		return new JSONSerializer().exclude("*.class").serialize(celulas);
	}

}
