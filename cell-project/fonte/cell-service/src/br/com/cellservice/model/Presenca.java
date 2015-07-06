package br.com.cellservice.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.OneToOne;

@Entity
public class Presenca implements AbstractEntity {

	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue
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
