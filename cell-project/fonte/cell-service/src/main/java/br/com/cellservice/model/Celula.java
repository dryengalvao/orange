package br.com.cellservice.model;

import java.util.ArrayList;
import java.util.Collection;
import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;

import flexjson.JSONDeserializer;
import flexjson.JSONSerializer;

@Entity
public class Celula implements AbstractEntity {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue
	private Long id;

	private String nome;
	private String endereco;

	@OneToOne
	@JoinColumn(name = "lider_id")
	private Membro lider;

	@OneToOne
	@JoinColumn(name = "tesoureiro_id")
	private Membro tesoureiro;

	@OneToOne
	@JoinColumn(name = "secretario_id")
	private Membro secretario;

	@OneToOne
	@JoinColumn(name = "anfitriao_id")
	private Membro anfitriao;

	private String diaSemana;

	private String horario;

	@OneToMany(mappedBy="celula")
	private Collection<Membro> membros;

	public void setId(Long id) {
		this.id = id;
	}
	
	public Long getId() {
		return id;
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

	public Membro getLider() {
		return lider;
	}

	public void setLider(Membro lider) {
		this.lider = lider;
	}

	public Membro getTesoureiro() {
		return tesoureiro;
	}

	public void setTesoureiro(Membro tesoureiro) {
		this.tesoureiro = tesoureiro;
	}

	public Membro getSecretario() {
		return secretario;
	}

	public void setSecretario(Membro secretario) {
		this.secretario = secretario;
	}

	public Membro getAnfitriao() {
		return anfitriao;
	}

	public void setAnfitriao(Membro anfitriao) {
		this.anfitriao = anfitriao;
	}

	public String getDiaSemana() {
		return diaSemana;
	}

	public void setDiaSemana(String diaSemana) {
		this.diaSemana = diaSemana;
	}

	public String getHorario() {
		return horario;
	}

	public void setHorario(String horario) {
		this.horario = horario;
	}

	public Collection<Membro> getMembros() {
		return membros;
	}

	public void setMembros(Collection<Membro> membros) {
		this.membros = membros;
	}
	
	public static Celula jsonToObject(String json) {
		return new JSONDeserializer<Celula>().
				use(null, Celula.class).use("membros", ArrayList.class).deserialize(json);
	}
	
	public String objectToJson() {
		return new JSONSerializer().exclude("*.class").serialize(this);
	}
	
	public static String listToJson(List<Celula> celulas) {
		return new JSONSerializer().exclude("*.class").serialize(celulas);
	}
}
