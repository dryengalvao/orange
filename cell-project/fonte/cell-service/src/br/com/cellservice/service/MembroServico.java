package br.com.cellservice.service;

import java.util.List;

import javax.ejb.Local;

import br.com.cellservice.model.Membro;

@Local
public interface MembroServico {

	public Membro save(Membro membro);

	public void remove(Membro membro);

	public Membro find(Long id);

	public List<Membro> findAll();
}
