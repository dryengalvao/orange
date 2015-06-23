package br.com.cellservice.model;

public class Presenca {
	private Realizacao realizacao;
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

}
