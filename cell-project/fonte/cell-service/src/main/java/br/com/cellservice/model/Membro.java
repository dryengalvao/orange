package br.com.cellservice.model;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;

import flexjson.JSONDeserializer;
import flexjson.JSONSerializer;

@Entity
public class Membro implements AbstractEntity {

	/**
	 * 
	 */
	private static final long serialVersionUID = 6535587501205298022L;

	@Id
	@GeneratedValue(strategy=GenerationType.AUTO)
	private Long id;

	private String nome;
	private String endereco;
	private String funcao;
	private boolean discipulado;
	private boolean encontro;
	private boolean consolidacaoPasso1;
	private boolean consolidacaoPasso2;
	private boolean consolidacaoPasso3;
	private boolean consolidacaoPasso4;
	private boolean consolidacaoPasso5;
	private boolean consolidacaoPasso6;
	private boolean consolidacaoPasso7;

	@ManyToOne
	@JoinColumn(name = "celula_id")
	private Celula celula;

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

	public String getFuncao() {
		return funcao;
	}

	public void setFuncao(String funcao) {
		this.funcao = funcao;
	}

	public boolean isDiscipulado() {
		return discipulado;
	}

	public void setDiscipulado(boolean discipulado) {
		this.discipulado = discipulado;
	}

	public boolean isEncontro() {
		return encontro;
	}

	public void setEncontro(boolean encontro) {
		this.encontro = encontro;
	}

	public boolean isConsolidacaoPasso1() {
		return consolidacaoPasso1;
	}

	public void setConsolidacaoPasso1(boolean consolidacaoPasso1) {
		this.consolidacaoPasso1 = consolidacaoPasso1;
	}

	public boolean isConsolidacaoPasso2() {
		return consolidacaoPasso2;
	}

	public void setConsolidacaoPasso2(boolean consolidacaoPasso2) {
		this.consolidacaoPasso2 = consolidacaoPasso2;
	}

	public boolean isConsolidacaoPasso3() {
		return consolidacaoPasso3;
	}

	public void setConsolidacaoPasso3(boolean consolidacaoPasso3) {
		this.consolidacaoPasso3 = consolidacaoPasso3;
	}

	public boolean isConsolidacaoPasso4() {
		return consolidacaoPasso4;
	}

	public void setConsolidacaoPasso4(boolean consolidacaoPasso4) {
		this.consolidacaoPasso4 = consolidacaoPasso4;
	}

	public boolean isConsolidacaoPasso5() {
		return consolidacaoPasso5;
	}

	public void setConsolidacaoPasso5(boolean consolidacaoPasso5) {
		this.consolidacaoPasso5 = consolidacaoPasso5;
	}

	public boolean isConsolidacaoPasso6() {
		return consolidacaoPasso6;
	}

	public void setConsolidacaoPasso6(boolean consolidacaoPasso6) {
		this.consolidacaoPasso6 = consolidacaoPasso6;
	}

	public boolean isConsolidacaoPasso7() {
		return consolidacaoPasso7;
	}

	public void setConsolidacaoPasso7(boolean consolidacaoPasso7) {
		this.consolidacaoPasso7 = consolidacaoPasso7;
	}

	public static Membro jsonToObject(String json) {
		return new JSONDeserializer<Membro>().use(null, Membro.class).deserialize(json);
	}

	public String objectToJson() {
		return new JSONSerializer().exclude("*.class").serialize(this);
	}

	public static String listToJson(List<Membro> membros) {
		return new JSONSerializer().exclude("*.class").serialize(membros);
	}
}
