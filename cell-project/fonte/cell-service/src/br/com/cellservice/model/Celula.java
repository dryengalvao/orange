package br.com.cellservice.model;

import java.util.Collection;

public class Celula {

	private int id;
	private String nome;
	private String endereco;
	private Membro lider;
	private Membro tesoureiro;
	private Membro secretario;
	private Membro anfitriao;
	private String horaRealizacao;
	private String diaRealizacao;
	private Collection<Membro> membros;

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

	public String getHoraRealizacao() {
		return horaRealizacao;
	}

	public void setHoraRealizacao(String horaRealizacao) {
		this.horaRealizacao = horaRealizacao;
	}

	public String getDiaRealizacao() {
		return diaRealizacao;
	}

	public void setDiaRealizacao(String diaRealizacao) {
		this.diaRealizacao = diaRealizacao;
	}

	public Collection<Membro> getMembros() {
		return membros;
	}

	public void setMembros(Collection<Membro> membros) {
		this.membros = membros;
	}

}
