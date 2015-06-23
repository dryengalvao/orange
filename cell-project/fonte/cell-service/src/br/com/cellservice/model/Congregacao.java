package br.com.cellservice.model;

import java.util.List;

import javax.persistence.Entity;

import flexjson.JSONDeserializer;
import flexjson.JSONSerializer;

@Entity
public class Congregacao {
	private int id;
	private String nome;
	private String endereco;
	private String numero;
	private int area;

	public int getId() {
		return id;
	}

	public void setId(int id) {
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
		return new JSONDeserializer<Congregacao>().use(null, Congregacao.class).deserialize(json);
	}

	public String objectToJson() {
		return new JSONSerializer().exclude("*.class").serialize(this);
	}

	public static String listToJson(List<Congregacao> congregacao) {
		return new JSONSerializer().exclude("*.class").serialize(congregacao);
	}

}
