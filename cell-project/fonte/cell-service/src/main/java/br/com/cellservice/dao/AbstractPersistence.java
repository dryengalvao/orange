package br.com.cellservice.dao;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.Query;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;

import br.com.cellservice.model.AbstractEntity;

/**
 * Classe resolve os métodos básicos de cadastro (CRUD) com API da
 * <code>JPA</code>.
 * 
 */
@SuppressWarnings({ "rawtypes", "unchecked" })
public abstract class AbstractPersistence<T extends AbstractEntity, PK extends Number> {

	/**
	 * Classe da entidade, necessário para o método
	 * <code>EntityManager.find</code>.
	 */
	private Class<T> entityClass;

	public AbstractPersistence(Class<T> entityClass) {
		this.entityClass = entityClass;
	}

	public T save(T e) {
		if (e.getId() != null)
			return getEntityManager().merge(e);
		else {
			getEntityManager().persist(e);
			return e;
		}
	}

	public void remove(T entity) {
		EntityManager em = this.getEntityManager();

		entity = em.merge(entity);
		em.remove(entity);
	}

	public T find(PK id) {
		return this.getEntityManager().find(entityClass, id);
	}

	public List<T> findAll() {
		CriteriaQuery cq = this.getEntityManager().getCriteriaBuilder()
				.createQuery();
		cq.select(cq.from(entityClass));
		return this.getEntityManager().createQuery(cq).getResultList();
	}

	public List<T> findRange(int[] range) {
		CriteriaQuery cq = this.getEntityManager().getCriteriaBuilder()
				.createQuery();
		cq.select(cq.from(entityClass));
		Query q = this.getEntityManager().createQuery(cq);
		q.setMaxResults(range[1] - range[0]);
		q.setFirstResult(range[0]);
		return q.getResultList();
	}

	public int count() {
		CriteriaQuery cq = this.getEntityManager().getCriteriaBuilder()
				.createQuery();
		Root<T> rt = cq.from(entityClass);
		cq.select(this.getEntityManager().getCriteriaBuilder().count(rt));
		Query q = this.getEntityManager().createQuery(cq);
		return ((Long) q.getSingleResult()).intValue();
	}

	/**
	 * Exige a definição do <code>EntityManager</code> responsável pelas
	 * operações de persistência.
	 */
	protected abstract EntityManager getEntityManager();
}
