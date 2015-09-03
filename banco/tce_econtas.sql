--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: adesao_ata_licitacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE adesao_ata_licitacao (
    id integer NOT NULL,
    "nu_ProcessoCompra" character varying(18) DEFAULT 0 NOT NULL,
    "nu_Ata" character varying(18) DEFAULT 0 NOT NULL,
    "nu_ProcessoLicitatorio" character varying(18) DEFAULT 0 NOT NULL,
    "dt_Publicacao" character(8) DEFAULT 0 NOT NULL,
    "dt_Validade" character(8) DEFAULT 0 NOT NULL,
    "nu_Diario" character varying(6) DEFAULT 0 NOT NULL,
    "dt_Adesao" character varying(8) DEFAULT 0 NOT NULL,
    "tp_Adesao" character(2) DEFAULT 0 NOT NULL,
    mes integer DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0,
    dt_exportacao timestamp without time zone
);


ALTER TABLE adesao_ata_licitacao OWNER TO postgres;

--
-- Name: adesao_ata_licitacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE adesao_ata_licitacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE adesao_ata_licitacao_id_seq OWNER TO postgres;

--
-- Name: adesao_ata_licitacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE adesao_ata_licitacao_id_seq OWNED BY adesao_ata_licitacao.id;


--
-- Name: certidao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE certidao (
    id integer NOT NULL,
    "cd_CicParticipante" character varying(14) DEFAULT 0 NOT NULL,
    "tp_Certidao" character(2) DEFAULT 0 NOT NULL,
    "tp_Pessoa" character(1) DEFAULT 0 NOT NULL,
    "nu_Certidao" character varying(60) DEFAULT 0 NOT NULL,
    "dt_EmissaoCertidao" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeCertidao" character(8) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0,
    dt_exportacao timestamp without time zone,
    id_licitacao integer,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE certidao OWNER TO postgres;

--
-- Name: certidao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE certidao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE certidao_id_seq OWNER TO postgres;

--
-- Name: certidao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE certidao_id_seq OWNED BY certidao.id;


--
-- Name: conta; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE conta (
    id integer NOT NULL,
    ano_criacao character(4) DEFAULT 0 NOT NULL,
    cd_conta character varying(34) DEFAULT 0 NOT NULL,
    nome_conta character varying(50) DEFAULT 0 NOT NULL,
    nivel_conta character varying(2) DEFAULT 0 NOT NULL,
    "cd_recebeLancamento" character varying(1) DEFAULT 0 NOT NULL,
    "id_tipoSaldo" character(1) DEFAULT 1 NOT NULL,
    "cd_contaSuperior" character varying(34) DEFAULT 0 NOT NULL,
    cd_reduzido character varying(8) DEFAULT 0 NOT NULL,
    "cd_itemOrcamentario" character varying(9) DEFAULT 0 NOT NULL,
    cd_banco character varying(4) DEFAULT 0 NOT NULL,
    cd_agencia character varying(6) DEFAULT 0 NOT NULL,
    nu_conta character varying(10) DEFAULT 0 NOT NULL,
    tp_conta character(1) DEFAULT 1 NOT NULL,
    "cd_contaTCU" character(3) DEFAULT 0 NOT NULL,
    "ano_criacaoSuperior" character(4) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0 NOT NULL,
    dt_exportacao timestamp without time zone,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE conta OWNER TO postgres;

--
-- Name: conta_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE conta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE conta_id_seq OWNER TO postgres;

--
-- Name: conta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE conta_id_seq OWNED BY conta.id;


--
-- Name: contrato; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE contrato (
    id integer NOT NULL,
    "vl_Contrato" character varying(16) DEFAULT 0 NOT NULL,
    "dt_AssinaturaContrato" character(8) DEFAULT 0 NOT NULL,
    "de_ObjetivoContrato" character varying(300),
    "nu_ProcessoLicitator" character varying(18) DEFAULT 0 NOT NULL,
    "cd_Moeda" character(3) DEFAULT 0 NOT NULL,
    "tp_PessoaContratado" character(1) DEFAULT 0 NOT NULL,
    "cd_CicContratado" character varying(14) DEFAULT 0 NOT NULL,
    "nm_Contratado" character varying(50),
    "dt_VencimentoContrato" character(8) DEFAULT 0 NOT NULL,
    "nu_DiarioOficial" character varying(6) DEFAULT 0 NOT NULL,
    "dt_Publicacao" character(8) DEFAULT 0 NOT NULL,
    "st_RecebeValor" character(1) DEFAULT 0 NOT NULL,
    "nu_CertidaoINSS" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoINSS" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeINSS" character(8) DEFAULT 0 NOT NULL,
    "nu_CertidaoFGTS" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoFGTS" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeFGTS" character(8) DEFAULT 0 NOT NULL,
    "nu_CertidaoFazendaEstadual" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoFazendaEstadual" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeFazendaEstadual" character(8) DEFAULT 0 NOT NULL,
    "nu_CertidaoFazendaMunicipal" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoFazendaMunicipal" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeFazendaMunicipal" character(8) DEFAULT 0 NOT NULL,
    "nu_CertidaoFazendaFederal" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoFazendaFederal" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeFazendaFederal" character(8) DEFAULT 0 NOT NULL,
    "nu_CertidaoOutras" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoOutras" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeOutras" character(8) DEFAULT 0 NOT NULL,
    "tp_Contrato" character(2) DEFAULT 0 NOT NULL,
    "nu_Contrato" character varying(16) DEFAULT 0 NOT NULL,
    exportado integer,
    dt_exportacao timestamp without time zone,
    mes integer DEFAULT 1 NOT NULL,
    "nu_CertidaoCNDT" character varying(60) DEFAULT 0 NOT NULL,
    "dt_certidaoCNDT" character(8) DEFAULT 0 NOT NULL,
    "dt_validadeCNDT" character(8) DEFAULT 0 NOT NULL,
    "nu_ContratoSuperior" character varying(16) DEFAULT 0 NOT NULL,
    "tp_Aditivo" integer DEFAULT 3 NOT NULL,
    "cnpj_UgContrato" character varying(14) DEFAULT 0 NOT NULL,
    competencia integer DEFAULT 0 NOT NULL
);


ALTER TABLE contrato OWNER TO postgres;

--
-- Name: contrato_empenho; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE contrato_empenho (
    id integer NOT NULL,
    "nu_NotaEmpenho" character varying(10) DEFAULT 0 NOT NULL,
    "ano_Empenho" character(4) DEFAULT 0 NOT NULL,
    "cd_UnidadeOrcamentaria" character varying(6) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0 NOT NULL,
    dt_exportacao timestamp without time zone,
    id_nu_contrato integer,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE contrato_empenho OWNER TO postgres;

--
-- Name: contrato_empenho_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE contrato_empenho_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE contrato_empenho_id_seq OWNER TO postgres;

--
-- Name: contrato_empenho_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE contrato_empenho_id_seq OWNED BY contrato_empenho.id;


--
-- Name: contrato_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE contrato_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE contrato_id_seq OWNER TO postgres;

--
-- Name: contrato_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE contrato_id_seq OWNED BY contrato.id;


--
-- Name: convenio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE convenio (
    id integer NOT NULL,
    "tp_EsferaConvenio" character(1) DEFAULT 0 NOT NULL,
    "st_RecebeValor" character(1) DEFAULT 0 NOT NULL,
    "nu_Convenio" character varying(16) DEFAULT 0 NOT NULL,
    "vl_Convenio" character varying(16) DEFAULT 0 NOT NULL,
    "cd_MoedaConvenio" character(3) DEFAULT 0 NOT NULL,
    "dt_AssinaturaConvenio" character(8) DEFAULT 0 NOT NULL,
    "de_ObjetivoConvenio" character varying(300) DEFAULT 0 NOT NULL,
    "dt_VencimentoConvenio" character(8) DEFAULT 0 NOT NULL,
    "nu_LeiAutorizativa" character varying(6) DEFAULT 0 NOT NULL,
    "dt_LeiAutorizativa" character(8) DEFAULT 0 NOT NULL,
    "nu_DiarioOficial" character varying(6) DEFAULT 0 NOT NULL,
    "dt_PublicacaoConvenio" character(8) DEFAULT 0 NOT NULL,
    "tp_Convenio" character(2) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0,
    dt_exportacao timestamp without time zone,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE convenio OWNER TO postgres;

--
-- Name: convenio_empenho; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE convenio_empenho (
    id integer NOT NULL,
    "nu_NotaEmpenho" character varying(10) DEFAULT 0 NOT NULL,
    "ano_Empenho" character(4) DEFAULT 0 NOT NULL,
    "cd_UnidadeOrcamentaria" character varying(6) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0 NOT NULL,
    dt_exportacao timestamp without time zone,
    id_convenio integer,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE convenio_empenho OWNER TO postgres;

--
-- Name: convenio_empenho_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE convenio_empenho_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE convenio_empenho_id_seq OWNER TO postgres;

--
-- Name: convenio_empenho_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE convenio_empenho_id_seq OWNED BY convenio_empenho.id;


--
-- Name: convenio_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE convenio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE convenio_id_seq OWNER TO postgres;

--
-- Name: convenio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE convenio_id_seq OWNED BY convenio.id;


--
-- Name: cotacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cotacao (
    id integer NOT NULL,
    "tp_Valor" character(1) DEFAULT 0 NOT NULL,
    "tp_Pessoa" character(1) DEFAULT 0 NOT NULL,
    "cd_CicParticipante" character varying(14) DEFAULT 0 NOT NULL,
    "nu_SequenciaItem" character varying(5) DEFAULT 0 NOT NULL,
    "vl_TotalCotadoItem" character varying(16) DEFAULT 0 NOT NULL,
    "cd_VencedorPerdedor" character(1) DEFAULT 0 NOT NULL,
    "qt_ItemCotado" character varying(16) DEFAULT 0 NOT NULL,
    "cd_ItemLote" character varying(10) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0,
    dt_exportacao timestamp without time zone,
    id_licitacao integer,
    mes integer DEFAULT 1 NOT NULL,
    "ct_ItemLote" character varying(10) DEFAULT 0 NOT NULL
);


ALTER TABLE cotacao OWNER TO postgres;

--
-- Name: cotacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cotacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cotacao_id_seq OWNER TO postgres;

--
-- Name: cotacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cotacao_id_seq OWNED BY cotacao.id;


--
-- Name: esfera_do_conveniado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE esfera_do_conveniado (
    id integer NOT NULL,
    codigo character(1) DEFAULT 0 NOT NULL,
    descricao character varying(10) NOT NULL
);


ALTER TABLE esfera_do_conveniado OWNER TO postgres;

--
-- Name: esfera_do_conveniado_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE esfera_do_conveniado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE esfera_do_conveniado_id_seq OWNER TO postgres;

--
-- Name: esfera_do_conveniado_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE esfera_do_conveniado_id_seq OWNED BY esfera_do_conveniado.id;


--
-- Name: item_adesao_ata; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE item_adesao_ata (
    id integer NOT NULL,
    "qt_Item" character varying(16) DEFAULT 0 NOT NULL,
    "se_ItemAta" character varying(5) DEFAULT 0 NOT NULL,
    "vl_Item" character varying(16) DEFAULT 0 NOT NULL,
    "un_Medida" character varying(30) DEFAULT 0 NOT NULL,
    "de_Item" character varying(300) DEFAULT 0 NOT NULL,
    mes integer DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0 NOT NULL,
    dt_exportacao timestamp without time zone,
    id_adesao_ata integer DEFAULT 0 NOT NULL
);


ALTER TABLE item_adesao_ata OWNER TO postgres;

--
-- Name: item_adesao_ata_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE item_adesao_ata_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE item_adesao_ata_id_seq OWNER TO postgres;

--
-- Name: item_adesao_ata_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE item_adesao_ata_id_seq OWNED BY item_adesao_ata.id;


--
-- Name: item_licitacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE item_licitacao (
    id integer NOT NULL,
    "nu_SequenciaItem" character varying(5) DEFAULT 0 NOT NULL,
    "de_ItemLicitacao" character varying(300) DEFAULT 0 NOT NULL,
    "qt_ItemLicitado" character varying(16) DEFAULT 0 NOT NULL,
    "dt_HomologacaoItem" character(8) DEFAULT 0 NOT NULL,
    "dt_PublicacaoHomologacao" character(8) DEFAULT 0 NOT NULL,
    "cd_ItemLote" character varying(10) DEFAULT 0 NOT NULL,
    exportado integer,
    dt_exportacao timestamp without time zone,
    id_licitacao integer,
    mes integer DEFAULT 1 NOT NULL,
    "un_MedidaItem" character varying(30) DEFAULT 0 NOT NULL,
    "st_Item" character(2) DEFAULT 0 NOT NULL,
    "ct_ItemLote" character varying(10) DEFAULT 0 NOT NULL
);


ALTER TABLE item_licitacao OWNER TO postgres;

--
-- Name: item_licitacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE item_licitacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE item_licitacao_id_seq OWNER TO postgres;

--
-- Name: item_licitacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE item_licitacao_id_seq OWNED BY item_licitacao.id;


--
-- Name: licitacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE licitacao (
    id integer NOT NULL,
    "nu_ProcessoLicitatorio" character varying(18) DEFAULT 0 NOT NULL,
    "nu_DiarioOficial" character varying(6) DEFAULT 0 NOT NULL,
    "dt_PublicacaoEdital" character(8) DEFAULT 0 NOT NULL,
    "cd_Modalidade" character(2) DEFAULT 0 NOT NULL,
    "de_ObjetoLicitacao" character varying(300) DEFAULT 0 NOT NULL,
    "vl_TotalPrevisto" character varying(16) DEFAULT 0 NOT NULL,
    "nu_Edital" character varying(16) DEFAULT 0 NOT NULL,
    "tp_Licitacao" character(1) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0,
    dt_exportacao timestamp without time zone,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE licitacao OWNER TO postgres;

--
-- Name: licitacao_dotacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE licitacao_dotacao (
    id integer NOT NULL,
    "cd_CategoriaEconomica" character(1),
    "cd_GrupoNatureza" character(1),
    "cd_ModalidadeAplicacao" character(2),
    "cd_Elemento" character(2),
    "cd_UnidadeOrcamentaria" character varying(6),
    "cd_FonteRecurso" character varying(10),
    "nu_AcaoGoverno" character varying(7),
    "cd_SubFuncao" character(3),
    "cd_Funcao" character(2),
    "cd_Programa" character varying(4),
    exportado integer DEFAULT 0 NOT NULL,
    dt_exportacao timestamp without time zone,
    id_licitacao integer,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE licitacao_dotacao OWNER TO postgres;

--
-- Name: licitacao_dotacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE licitacao_dotacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE licitacao_dotacao_id_seq OWNER TO postgres;

--
-- Name: licitacao_dotacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE licitacao_dotacao_id_seq OWNED BY licitacao_dotacao.id;


--
-- Name: licitacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE licitacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE licitacao_id_seq OWNER TO postgres;

--
-- Name: licitacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE licitacao_id_seq OWNED BY licitacao.id;


--
-- Name: meses; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE meses (
    id integer NOT NULL,
    nome character varying(20) DEFAULT 0 NOT NULL
);


ALTER TABLE meses OWNER TO postgres;

--
-- Name: meses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE meses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE meses_id_seq OWNER TO postgres;

--
-- Name: meses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE meses_id_seq OWNED BY meses.id;


--
-- Name: modalidade_de_licitacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE modalidade_de_licitacao (
    id integer NOT NULL,
    codigo character(2) DEFAULT 0 NOT NULL,
    descricao character varying(40) NOT NULL
);


ALTER TABLE modalidade_de_licitacao OWNER TO postgres;

--
-- Name: modalidade_de_licitacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE modalidade_de_licitacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE modalidade_de_licitacao_id_seq OWNER TO postgres;

--
-- Name: modalidade_de_licitacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE modalidade_de_licitacao_id_seq OWNED BY modalidade_de_licitacao.id;


--
-- Name: movcon_final; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE movcon_final (
    id integer NOT NULL,
    id_conta integer,
    tp_movimento character(1) DEFAULT 0 NOT NULL,
    "vl_movDebito" character varying(16) DEFAULT 0 NOT NULL,
    "vl_movCredito" character varying(16) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0 NOT NULL,
    dt_exportacao timestamp without time zone,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE movcon_final OWNER TO postgres;

--
-- Name: movcon_final_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE movcon_final_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE movcon_final_id_seq OWNER TO postgres;

--
-- Name: movcon_final_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE movcon_final_id_seq OWNED BY movcon_final.id;


--
-- Name: movcon_inicial; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE movcon_inicial (
    id integer NOT NULL,
    id_conta integer,
    tp_movimento character(1) DEFAULT 0 NOT NULL,
    "vl_movDebito" character varying(16) DEFAULT 0 NOT NULL,
    "vl_movCredito" character varying(16) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0 NOT NULL,
    dt_exportacao timestamp without time zone,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE movcon_inicial OWNER TO postgres;

--
-- Name: movcon_inicial_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE movcon_inicial_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE movcon_inicial_id_seq OWNER TO postgres;

--
-- Name: movcon_inicial_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE movcon_inicial_id_seq OWNED BY movcon_inicial.id;


--
-- Name: movcon_mensal; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE movcon_mensal (
    id integer NOT NULL,
    id_conta integer,
    tp_movimento character(1) DEFAULT 0 NOT NULL,
    "vl_movDebito" character varying(16) DEFAULT 0 NOT NULL,
    "vl_movCredito" character varying(16) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0 NOT NULL,
    dt_exportacao timestamp without time zone,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE movcon_mensal OWNER TO postgres;

--
-- Name: movcon_mensal_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE movcon_mensal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE movcon_mensal_id_seq OWNER TO postgres;

--
-- Name: movcon_mensal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE movcon_mensal_id_seq OWNED BY movcon_mensal.id;


--
-- Name: participante_convenio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE participante_convenio (
    id integer NOT NULL,
    "cd_CicParticipante" character varying(14) DEFAULT 0 NOT NULL,
    "tp_PessoaParticipante" character(1) DEFAULT 0 NOT NULL,
    "nm_Participante" character varying(50) DEFAULT 0 NOT NULL,
    "vl_Participacao" character varying(16) DEFAULT 0 NOT NULL,
    "vl_PercentualParticipacao" character varying(7) DEFAULT 0 NOT NULL,
    "nu_CertidaoCASAN" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoCASAN" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeCertidaoCASAN" character(8) DEFAULT 0 NOT NULL,
    "nu_CertidaoCELESC" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoCELESC" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeCertidaoCELESC" character(8) DEFAULT 0 NOT NULL,
    "nu_CertidaoIPESC" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoIPESC" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeCertidaoIPESC" character(8) DEFAULT 0 NOT NULL,
    "nu_CertidaoFazendaMunicipal" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoFazendaMunicipal" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeFazendaMunicipal" character(8) DEFAULT 0 NOT NULL,
    "nu_CertidaoFazendaFederal" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoFazendaFederal" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeFazendaFederal" character(8) DEFAULT 0 NOT NULL,
    "nu_CertidaoOutras" character varying(60) DEFAULT 0 NOT NULL,
    "dt_CertidaoOutras" character(8) DEFAULT 0 NOT NULL,
    "dt_ValidadeOutras" character(8) DEFAULT 0 NOT NULL,
    exportado integer,
    dt_exportacao timestamp without time zone,
    id_convenio integer,
    mes integer DEFAULT 1 NOT NULL,
    "nu_CertidaoCNDT" character varying(60) DEFAULT 0 NOT NULL,
    "dt_certidaoCNDT" character(8) DEFAULT 0 NOT NULL,
    "dt_validadeCNDT" character(8) DEFAULT 0 NOT NULL,
    "tp_EsferaConvenio" character(1) DEFAULT 0 NOT NULL
);


ALTER TABLE participante_convenio OWNER TO postgres;

--
-- Name: participante_convenio_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE participante_convenio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE participante_convenio_id_seq OWNER TO postgres;

--
-- Name: participante_convenio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE participante_convenio_id_seq OWNED BY participante_convenio.id;


--
-- Name: participante_licitacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE participante_licitacao (
    id integer NOT NULL,
    "cd_CicParticipante" character varying(14) DEFAULT 0 NOT NULL,
    "tp_Pessoa" character(1) DEFAULT 0 NOT NULL,
    "nm_Participante" character varying(50) DEFAULT 0 NOT NULL,
    "tp_Participacao" character(1) DEFAULT 0 NOT NULL,
    "cd_CGCConsorcio" character varying(14) DEFAULT 0 NOT NULL,
    exportado integer,
    dt_exportacao timestamp without time zone,
    "tp_Convidado" character(1) DEFAULT 0 NOT NULL,
    id_licitacao integer,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE participante_licitacao OWNER TO postgres;

--
-- Name: participante_licitacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE participante_licitacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE participante_licitacao_id_seq OWNER TO postgres;

--
-- Name: participante_licitacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE participante_licitacao_id_seq OWNED BY participante_licitacao.id;


--
-- Name: publicacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE publicacao (
    id integer NOT NULL,
    "dt_PublicacaoEdital" character(8) DEFAULT 0 NOT NULL,
    "nu_SequencialPublicacao" character(2) DEFAULT 0 NOT NULL,
    "nm_veiculoComunicacao" character varying(50) DEFAULT 0 NOT NULL,
    exportado integer DEFAULT 0 NOT NULL,
    dt_exportacao timestamp without time zone,
    id_licitacao integer,
    mes integer DEFAULT 1 NOT NULL
);


ALTER TABLE publicacao OWNER TO postgres;

--
-- Name: publicacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE publicacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE publicacao_id_seq OWNER TO postgres;

--
-- Name: publicacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE publicacao_id_seq OWNED BY publicacao.id;


--
-- Name: status_item_licitacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE status_item_licitacao (
    id integer NOT NULL,
    codigo character(2) DEFAULT 0 NOT NULL,
    descricao character varying(50) DEFAULT 0 NOT NULL
);


ALTER TABLE status_item_licitacao OWNER TO postgres;

--
-- Name: status_item_licitacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE status_item_licitacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE status_item_licitacao_id_seq OWNER TO postgres;

--
-- Name: status_item_licitacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE status_item_licitacao_id_seq OWNED BY status_item_licitacao.id;


--
-- Name: tipo_adesao_ata; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_adesao_ata (
    id integer NOT NULL,
    codigo character(2) DEFAULT 0 NOT NULL,
    descricao character varying(40) NOT NULL
);


ALTER TABLE tipo_adesao_ata OWNER TO postgres;

--
-- Name: tipo_adesao_ata_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_adesao_ata_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_adesao_ata_id_seq OWNER TO postgres;

--
-- Name: tipo_adesao_ata_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_adesao_ata_id_seq OWNED BY tipo_adesao_ata.id;


--
-- Name: tipo_certidao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_certidao (
    id integer NOT NULL,
    codigo character(2) DEFAULT 0 NOT NULL,
    descricao character varying(18) NOT NULL
);


ALTER TABLE tipo_certidao OWNER TO postgres;

--
-- Name: tipo_certidao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_certidao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_certidao_id_seq OWNER TO postgres;

--
-- Name: tipo_certidao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_certidao_id_seq OWNED BY tipo_certidao.id;


--
-- Name: tipo_convenio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_convenio (
    id integer NOT NULL,
    codigo character(2) DEFAULT 0 NOT NULL,
    descricao character varying(60) NOT NULL
);


ALTER TABLE tipo_convenio OWNER TO postgres;

--
-- Name: tipo_convenio_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_convenio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_convenio_id_seq OWNER TO postgres;

--
-- Name: tipo_convenio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_convenio_id_seq OWNED BY tipo_convenio.id;


--
-- Name: tipo_de_conta; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_de_conta (
    id integer NOT NULL,
    codigo character(1) DEFAULT 0 NOT NULL,
    descricao character varying(25) DEFAULT 0 NOT NULL
);


ALTER TABLE tipo_de_conta OWNER TO postgres;

--
-- Name: tipo_de_conta_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_de_conta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_de_conta_id_seq OWNER TO postgres;

--
-- Name: tipo_de_conta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_de_conta_id_seq OWNED BY tipo_de_conta.id;


--
-- Name: tipo_de_contrato; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_de_contrato (
    id integer NOT NULL,
    codigo character(2) DEFAULT 0 NOT NULL,
    descricao character varying(65) NOT NULL
);


ALTER TABLE tipo_de_contrato OWNER TO postgres;

--
-- Name: tipo_de_contrato_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_de_contrato_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_de_contrato_id_seq OWNER TO postgres;

--
-- Name: tipo_de_contrato_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_de_contrato_id_seq OWNED BY tipo_de_contrato.id;


--
-- Name: tipo_de_movimento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_de_movimento (
    id integer NOT NULL,
    codigo character(1) DEFAULT 0 NOT NULL,
    descricao character varying(10) DEFAULT 0 NOT NULL
);


ALTER TABLE tipo_de_movimento OWNER TO postgres;

--
-- Name: tipo_de_movimento_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_de_movimento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_de_movimento_id_seq OWNER TO postgres;

--
-- Name: tipo_de_movimento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_de_movimento_id_seq OWNED BY tipo_de_movimento.id;


--
-- Name: tipo_de_saldo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_de_saldo (
    id integer NOT NULL,
    codigo character(1) DEFAULT 0 NOT NULL,
    descricao character varying(10) DEFAULT 0 NOT NULL
);


ALTER TABLE tipo_de_saldo OWNER TO postgres;

--
-- Name: tipo_de_saldo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_de_saldo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_de_saldo_id_seq OWNER TO postgres;

--
-- Name: tipo_de_saldo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_de_saldo_id_seq OWNED BY tipo_de_saldo.id;


--
-- Name: tipo_do_aditivo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_do_aditivo (
    id integer NOT NULL,
    codigo character(1) DEFAULT 0 NOT NULL,
    descricao character varying(30) DEFAULT 0 NOT NULL
);


ALTER TABLE tipo_do_aditivo OWNER TO postgres;

--
-- Name: tipo_do_aditivo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_do_aditivo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_do_aditivo_id_seq OWNER TO postgres;

--
-- Name: tipo_do_aditivo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_do_aditivo_id_seq OWNED BY tipo_do_aditivo.id;


--
-- Name: tipo_moeda; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_moeda (
    id integer NOT NULL,
    codigo character(3) DEFAULT 0 NOT NULL,
    descricao character varying(11) NOT NULL
);


ALTER TABLE tipo_moeda OWNER TO postgres;

--
-- Name: tipo_moeda_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_moeda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_moeda_id_seq OWNER TO postgres;

--
-- Name: tipo_moeda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_moeda_id_seq OWNED BY tipo_moeda.id;


--
-- Name: tipo_participante_licitacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_participante_licitacao (
    id integer NOT NULL,
    codigo character(1) DEFAULT 0 NOT NULL,
    descricao character varying(18) NOT NULL
);


ALTER TABLE tipo_participante_licitacao OWNER TO postgres;

--
-- Name: tipo_participante_licitacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_participante_licitacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_participante_licitacao_id_seq OWNER TO postgres;

--
-- Name: tipo_participante_licitacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_participante_licitacao_id_seq OWNED BY tipo_participante_licitacao.id;


--
-- Name: tipo_pessoa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_pessoa (
    id integer NOT NULL,
    codigo character(1) DEFAULT 0 NOT NULL,
    descricao character varying(12) NOT NULL
);


ALTER TABLE tipo_pessoa OWNER TO postgres;

--
-- Name: tipo_pessoa_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_pessoa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_pessoa_id_seq OWNER TO postgres;

--
-- Name: tipo_pessoa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_pessoa_id_seq OWNED BY tipo_pessoa.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY adesao_ata_licitacao ALTER COLUMN id SET DEFAULT nextval('adesao_ata_licitacao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY certidao ALTER COLUMN id SET DEFAULT nextval('certidao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY conta ALTER COLUMN id SET DEFAULT nextval('conta_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contrato ALTER COLUMN id SET DEFAULT nextval('contrato_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contrato_empenho ALTER COLUMN id SET DEFAULT nextval('contrato_empenho_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY convenio ALTER COLUMN id SET DEFAULT nextval('convenio_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY convenio_empenho ALTER COLUMN id SET DEFAULT nextval('convenio_empenho_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cotacao ALTER COLUMN id SET DEFAULT nextval('cotacao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY esfera_do_conveniado ALTER COLUMN id SET DEFAULT nextval('esfera_do_conveniado_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY item_adesao_ata ALTER COLUMN id SET DEFAULT nextval('item_adesao_ata_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY item_licitacao ALTER COLUMN id SET DEFAULT nextval('item_licitacao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY licitacao ALTER COLUMN id SET DEFAULT nextval('licitacao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY licitacao_dotacao ALTER COLUMN id SET DEFAULT nextval('licitacao_dotacao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY meses ALTER COLUMN id SET DEFAULT nextval('meses_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY modalidade_de_licitacao ALTER COLUMN id SET DEFAULT nextval('modalidade_de_licitacao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movcon_final ALTER COLUMN id SET DEFAULT nextval('movcon_final_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movcon_inicial ALTER COLUMN id SET DEFAULT nextval('movcon_inicial_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movcon_mensal ALTER COLUMN id SET DEFAULT nextval('movcon_mensal_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY participante_convenio ALTER COLUMN id SET DEFAULT nextval('participante_convenio_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY participante_licitacao ALTER COLUMN id SET DEFAULT nextval('participante_licitacao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY publicacao ALTER COLUMN id SET DEFAULT nextval('publicacao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY status_item_licitacao ALTER COLUMN id SET DEFAULT nextval('status_item_licitacao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_adesao_ata ALTER COLUMN id SET DEFAULT nextval('tipo_adesao_ata_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_certidao ALTER COLUMN id SET DEFAULT nextval('tipo_certidao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_convenio ALTER COLUMN id SET DEFAULT nextval('tipo_convenio_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_de_conta ALTER COLUMN id SET DEFAULT nextval('tipo_de_conta_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_de_contrato ALTER COLUMN id SET DEFAULT nextval('tipo_de_contrato_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_de_movimento ALTER COLUMN id SET DEFAULT nextval('tipo_de_movimento_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_de_saldo ALTER COLUMN id SET DEFAULT nextval('tipo_de_saldo_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_do_aditivo ALTER COLUMN id SET DEFAULT nextval('tipo_do_aditivo_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_moeda ALTER COLUMN id SET DEFAULT nextval('tipo_moeda_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_participante_licitacao ALTER COLUMN id SET DEFAULT nextval('tipo_participante_licitacao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_pessoa ALTER COLUMN id SET DEFAULT nextval('tipo_pessoa_id_seq'::regclass);


--
-- Data for Name: adesao_ata_licitacao; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: adesao_ata_licitacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('adesao_ata_licitacao_id_seq', 1, true);


--
-- Data for Name: certidao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO certidao VALUES (84, '07913249000137', '02', '2', '33D7DE91EA82BD9C', '20150122', '20150721', 0, NULL, 16, 2);
INSERT INTO certidao VALUES (85, '07913249000137', '05', '2', '2015010511460307761330', '20150122', '20150203', 0, NULL, 16, 2);
INSERT INTO certidao VALUES (86, '07913249000137', '04', '2', '20157847', '20150122', '20150422', 0, NULL, 16, 2);
INSERT INTO certidao VALUES (87, '07913249000137', '03', '2', '17092845', '20150123', '20150222', 0, NULL, 16, 2);
INSERT INTO certidao VALUES (88, '07913249000137', '07', '2', '201579024562', '20150204', '20150802', 0, NULL, 16, 2);
INSERT INTO certidao VALUES (107, '04442937000178', '02', '2', 'AACCD13E0D7E701C', '20150305', '20150901', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (108, '04442937000178', '03', '2', '17383536', '20150313', '20150412', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (109, '04442937000178', '04', '2', '10512015', '20150325', '20150525', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (110, '04442937000178', '99', '2', '030032364000013', '20130820', '20150820', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (111, '04442937000178', '07', '2', '201584175500', '20150303', '20150829', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (112, '04442937000178', '05', '2', '2015032105363186649780', '20150326', '20150419', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (113, '04442937000178', '99', '2', '20151763', '20150319', '20160318', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (114, '34516450000153', '02', '2', '568FF6AAE5DA4444', '20150218', '20150817', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (115, '34516450000153', '05', '2', '2015033101375205971070', '20150402', '20150429', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (116, '34516450000153', '04', '2', '201522003', '20150305', '20150603', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (117, '34516450000153', '03', '2', '17468213', '20150327', '20150426', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (118, '34516450000153', '99', '2', '03174201000011', '20140218', '20160218', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (119, '34516450000153', '07', '2', '201578787747', '20150202', '20150731', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (124, '17418097', '03', '2', '17418097', '20150319', '20150418', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (125, '10181964000137', '04', '2', '20156780', '20150121', '20150421', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (126, '10181964000137', '99', '2', '030108971000017', '20130705', '20150705', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (127, '10181964000137', '07', '2', '201469352336', '20141121', '20150519', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (33, '04063643000135', '99', '2', '20140835', '20141017', '20151016', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (34, '04063643000135', '02', '2', 'CF5DB458B46B0005', '20140718', '20150114', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (35, '04063643000135', '01', '2', '196152014-88888643', '20140718', '20150114', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (36, '04063643000135', '05', '2', '2014112212424028677990', '20141126', '20141221', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (37, '04063643000135', '03', '2', '16747569', '20141126', '20141226', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (38, '04063643000135', '04', '2', '2014104426', '20141013', '20150111', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (39, '04063643000135', '07', '2', '201469950343', '20141126', '20150524', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (40, '35330125000164', '02', '2', 'D9C05CC122FAE482', '20141006', '20150404', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (41, '35330125000164', '01', '2', '227592014-88888125', '20140909', '20150308', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (42, '35330125000164', '05', '2', '2014120105023082333960', '20141201', '20141230', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (43, '35330125000164', '03', '2', '2014000004963102-60', '20141020', '20150117', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (44, '35330125000164', '04', '2', '137056290', '20141128', '20150128', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (45, '35330125000164', '07', '2', '201470572731', '20141201', '20150529', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (46, '32646846000190', '02', '2', 'E68C1A5294542439', '20141021', '20150419', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (47, '32646846000190', '01', '2', '216492014-88888846', '20140820', '20150216', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (48, '32646846000190', '05', '2', '2014111702343264011119', '20141205', '20141216', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (49, '32646846000190', '03', '2', '20141587509', '20141204', '20150204', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (50, '32646846000190', '04', '2', '2284471', '20141205', '20150305', 1, '2015-08-18 10:52:55.29', 10, 1);
INSERT INTO certidao VALUES (51, '09493146000190', '05', '2', '2014122909102529071840', '20141229', '20150127', 1, '2015-08-18 10:52:55.29', 11, 1);
INSERT INTO certidao VALUES (52, '09493146000190', '07', '2', '201467412274', '20141106', '20150504', 1, '2015-08-18 10:52:55.29', 11, 1);
INSERT INTO certidao VALUES (53, '09493146000190', '03', '2', '17082447', '20150122', '20150221', 1, '2015-08-18 10:52:55.29', 11, 1);
INSERT INTO certidao VALUES (54, '09493146000190', '02', '2', 'C52764B2656A7561', '20141223', '20150621', 1, '2015-08-18 10:52:55.29', 11, 1);
INSERT INTO certidao VALUES (55, '09493146000190', '04', '2', '14463', '20141202', '20150302', 1, '2015-08-18 10:52:55.29', 11, 1);
INSERT INTO certidao VALUES (56, '03499782000143', '03', '2', '17079764', '20150122', '20150221', 1, '2015-08-18 10:52:55.29', 12, 1);
INSERT INTO certidao VALUES (76, '02887535000151', '04', '2', '2014115611', '20141117', '20150215', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (77, '02887535000151', '07', '2', '201468780331', '20141117', '20150515', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (89, '02800411000197', '02', '2', '77988557113470D3', '20141124', '20150523', 0, NULL, 17, 2);
INSERT INTO certidao VALUES (90, '02800411000197', '05', '2', '2015011906531144042898', '20150127', '20150217', 0, NULL, 17, 2);
INSERT INTO certidao VALUES (91, '02800411000197', '03', '2', '17105960', '20150127', '20150226', 0, NULL, 17, 2);
INSERT INTO certidao VALUES (92, '02800411000197', '04', '2', '20158755', '20150127', '20150427', 0, NULL, 17, 2);
INSERT INTO certidao VALUES (93, '02800411000197', '07', '2', '201467395648', '20141106', '20150504', 0, NULL, 17, 2);
INSERT INTO certidao VALUES (94, '02800411000197', '99', '2', '20150000998', '20150127', '20150228', 0, NULL, 17, 2);
INSERT INTO certidao VALUES (95, '02800411000197', '99', '2', '002715061', '20150127', '20150227', 0, NULL, 17, 2);
INSERT INTO certidao VALUES (96, '34484741000107', '02', '2', '''E66C89C4AD837D69', '20150130', '20150729', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (97, '34484741000107', '05', '2', '2015011204253132192858', '20150122', '20150210', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (98, '34484741000107', '03', '2', '17159873', '20150203', '20150305', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (99, '34484741000107', '04', '2', '201510428', '20150130', '20150430', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (100, '34484741000107', '07', '2', '201577609976', '20150126', '20150724', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (101, '07695558000188', '02', '2', '73925D1CFB9392DE', '20150117', '20150716', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (102, '07695558000188', '01', '2', '263822014-88888558', '20141015', '20150413', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (103, '07695558000188', '05', '2', '2015020207352109286122', '20150204', '20150303', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (104, '07695558000188', '03', '2', '17167485', '20150204', '20150306', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (105, '07695558000188', '04', '2', '20151458', '20150107', '20150407', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (106, '07695558000188', '07', '2', '201574923900', '20150107', '20150705', 0, NULL, 18, 2);
INSERT INTO certidao VALUES (120, '34516450000153', '99', '2', '002785771', '20150327', '20150427', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (121, '10181964000137', '99', '2', '20140002', '20141229', '20151223', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (122, '10181964000137', '02', '2', 'B26CD8CFA342F759', '20141203', '20150601', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (123, '10181964000137', '05', '2', '2015032608120659109629', '20150406', '20150424', 0, NULL, 19, 4);
INSERT INTO certidao VALUES (57, '03499782000143', '01', '2', '223512014-88888782', '20140829', '20150225', 1, '2015-08-18 10:52:55.29', 12, 1);
INSERT INTO certidao VALUES (58, '03499782000143', '04', '2', '14465', '20141202', '20150302', 1, '2015-08-18 10:52:55.29', 12, 1);
INSERT INTO certidao VALUES (59, '03499782000143', '07', '2', '201464058154', '20141007', '20150404', 1, '2015-08-18 10:52:55.29', 12, 1);
INSERT INTO certidao VALUES (60, '03499782000143', '05', '2', '2015011206212657919155', '20150126', '20150210', 1, '2015-08-18 10:52:55.29', 12, 1);
INSERT INTO certidao VALUES (61, '03499782000143', '03', '2', '17079764', '20150122', '20150221', 1, '2015-08-18 10:52:55.29', 13, 1);
INSERT INTO certidao VALUES (62, '03499782000143', '01', '2', '223512014-88888782', '20140829', '20150225', 1, '2015-08-18 10:52:55.29', 13, 1);
INSERT INTO certidao VALUES (63, '03499782000143', '04', '2', '14465', '20141202', '20150302', 1, '2015-08-18 10:52:55.29', 13, 1);
INSERT INTO certidao VALUES (64, '03499782000143', '07', '2', '201464058154', '20141007', '20150404', 1, '2015-08-18 10:52:55.29', 13, 1);
INSERT INTO certidao VALUES (65, '03499782000143', '05', '2', '2015011206212657919155', '20150122', '20150210', 1, '2015-08-18 10:52:55.29', 13, 1);
INSERT INTO certidao VALUES (66, '04343480000144', '02', '2', 'A232D3B89331D573', '20141111', '20150510', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (68, '04343480000144', '05', '2', '20141229073255047921800', '20150105', '20150127', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (69, '04343480000144', '03', '2', '16975120', '20150107', '20150206', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (70, '04343480000144', '04', '2', '2014114364', '20141113', '20150211', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (71, '04343480000144', '07', '2', '201574991913', '20150107', '20150705', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (72, '04343480000144', '99', '2', '20149035', '20141230', '20150331', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (73, '02887535000151', '02', '2', '6E743DA8C20A415C', '20150113', '20150712', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (74, '02887535000151', '05', '2', '2015010506432216809655', '20150113', '20150203', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (75, '02887535000151', '03', '2', '17017408', '20150113', '20150212', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (78, '04418320000117', '02', '2', 'EBFC3FC02F261524', '20150102', '20150701', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (79, '04418320000117', '05', '2', '2015010507475739301770', '20150106', '20150203', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (80, '04418320000117', '03', '2', '16964519', '20150106', '20150205', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (81, '04418320000117', '04', '2', '2014119504', '20141129', '20150227', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (82, '04418320000117', '99', '2', '002691572', '20150106', '20150206', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (83, '04418320000117', '07', '2', '201453420350', '20140722', '20150117', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (67, '04343480000144', '01', '2', '253232014-88888480', '20141006', '20150404', 1, '2015-08-18 10:52:55.29', 14, 1);
INSERT INTO certidao VALUES (128, '02878815000101', '05', '2', '2015032609480362272899', '20150413', '20150424', 0, NULL, 20, 4);
INSERT INTO certidao VALUES (129, '02878815000101', '03', '2', '1755879', '20150413', '20150513', 0, NULL, 20, 4);
INSERT INTO certidao VALUES (130, '02878815000101', '07', '2', '201592684244', '20150413', '20151009', 0, NULL, 20, 4);
INSERT INTO certidao VALUES (131, '02878815000101', '02', '2', '80174CD8D3E5585F', '20150413', '20151010', 0, NULL, 20, 4);
INSERT INTO certidao VALUES (132, '02878815000101', '04', '2', '201522142', '20150305', '20150603', 0, NULL, 20, 4);
INSERT INTO certidao VALUES (133, '01950467000165', '01', '2', 'D112353F44A8D6D6', '20150427', '20151024', 0, NULL, 21, 6);
INSERT INTO certidao VALUES (134, '01950467000165', '03', '2', '1503000066580', '20150303', '20150903', 0, NULL, 21, 6);
INSERT INTO certidao VALUES (135, '01950467000165', '04', '2', '2015828', '20150416', '20151231', 0, NULL, 21, 6);
INSERT INTO certidao VALUES (136, '01950467000165', '05', '2', '2015052904092047162840', '20150601', '20150627', 0, NULL, 21, 6);
INSERT INTO certidao VALUES (137, '01950467000165', '07', '2', '201589763414', '20150323', '25090323', 0, NULL, 21, 6);
INSERT INTO certidao VALUES (138, '01950467000165', '99', '2', '20151094936', '20150323', '20151231', 0, NULL, 21, 6);
INSERT INTO certidao VALUES (139, '01950467000165', '02', '2', 'D112353F44A8D6D6', '20150427', '20151024', 0, NULL, 21, 6);


--
-- Name: certidao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('certidao_id_seq', 139, true);


--
-- Data for Name: conta; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO conta VALUES (393, '2003', '812', 'PROVISÃO PARA DEBITOS FISCAIS', '4', 'N', 'M', '749', '812', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (390, '2003', '903', 'RESULTADO EXERCICIO SEGUINTE', '3', 'N', 'M', '896', '903', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (391, '2003', '896', 'RESULTADO EXERCICIO FUTUROS', '2', 'N', 'M', '504', '896', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (392, '2003', '3437', 'PROVISÃO EQUIVALÊNCIA PATRIMONIAL NEGATIVA', '3', 'N', 'M', '896', '3437', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (320, '2003', '28', 'CAIXA', '4', 'N', 'M', '21', '28', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (321, '2003', '42', 'BANCO - CONTAS CORRENTES', '4', 'N', 'M', '21', '42', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (322, '2003', '70', 'APLICAÇÕES DE LIQUIDEZ IMEDIATA', '4', 'N', 'M', '21', '70', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (325, '2003', '133', 'CRÉDITOS A COMPRESAR', '4', 'N', 'M', '84', '133', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (326, '2003', '147', 'DEPÓSITOS EM CAUÇÃO', '4', 'N', 'M', '84', '143', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (327, '2003', '2429', 'EMPRÉSTIMOS', '4', 'N', 'M', '84', '2429', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (328, '2003', '2450', 'TRIBUTOS E CONTRIB. A COMPENSAR', '4', 'N', 'M', '84', '2450', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (329, '2003', '2709', 'RECURSOS A APLICAR', '4', 'N', 'M', '84', '2709', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (331, '2003', '2877', 'TRIBUTOS E CONTRIB. A RECUPERAR', '4', 'N', 'M', '84', '2877', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (332, '2003', '168', 'DESPESAS PAGAS ANTECIPADAMENTE', '4', 'N', 'M', '161', '168', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (333, '2003', '196', 'CONTAS A RECEBER - OBRAS', '4', 'N', 'M', '189', '196', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (334, '2003', '203', 'CRÉDITOS DE DEPÓSITOS E CAUÇÕES', '4', 'N', 'M', '189', '203', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (335, '2010', '5229', 'RECURSOS DE CONVÊNIO', '4', 'N', 'M', '189', '5229', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (336, '2010', '5236', 'RECURSOS DE CONTRATO', '4', 'N', 'M', '189', '5236', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (337, '2003', '231', 'PARTICIP. CAPITAL DE OUTRAS EMPRESAS', '4', 'N', 'M', '224', '231', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (338, '2003', '252', 'PROV. P/ PERDAS EM INVESTIMENTOS', '4', 'N', 'M', '224', '252', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (339, '2003', '2786', 'ÁGIO S/ PARTICIPAÇÃO SOCIETÁRIA', '4', 'N', 'M', '224', '2786', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (340, '2003', '3164', 'BENS DE CONVENIO', '4', 'N', 'M', '224', '3164', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (285, '2003', '511', 'CIRCULANTE', '2', 'N', 'M', '504', '511', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (287, '2003', '623', 'OBRIGAÇÕES SOCIAIS E FISCAIS', '3', 'N', 'M', '511', '623', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (286, '2003', '518', 'FORNECEDORES', '3', 'N', 'M', '511', '518', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (289, '2003', '749', 'PROVISÕES', '3', 'N', 'M', '511', '749', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (200, '2003', '1330', 'FÉRIAS', '5', 'S', 'D', '1316', '1330', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (199, '2003', '1323', 'ORDENADOS E SALÁRIOS', '5', 'S', 'D', '1316', '1323', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (198, '2013', '3500', 'CONTRIBUIÇÃO DO ESTADO P/ CUSTEIO', '5', 'S', 'C', '1288', '3500', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (197, '2003', '3031', 'OUTRAS RECEITAS', '5', 'S', 'C', '1288', '3031', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (196, '2003', '2835', 'RECUPERAÇÃO DE DESPESAS', '5', 'S', 'C', '1288', '2835', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (194, '2010', '3843', 'VENDA DE EDITAL', '5', 'S', 'C', '1113', '3843', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (193, '2003', '2002', 'PROJETOS TÉCNICOS', '5', 'S', 'C', '1113', '2002', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (234, '2003', '1596', 'CÓPIAS E REPROGRAFIAS', '5', 'S', 'D', '1435', '1596', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (235, '2003', '1603', 'COPA COZINHA', '5', 'S', 'D', '1435', '1603', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (239, '2003', '1631', 'CONDUÇÃO', '5', 'S', 'D', '1435', '1631', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (240, '2003', '1883', 'DESPESAS GERAIS', '5', 'S', 'D', '1435', '1883', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (232, '2003', '1582', 'DESPESAS CARTORÁRIAS', '5', 'S', 'D', '1435', '1582', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (13, '2003', '4256', 'BANCO BRADESCO S/A.', '5', 'S', 'M', '42', '4256', '0', '0', '3739', '303747', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (367, '2003', '2555', 'DESPESAS DE EXERCÍCIOS FUTUROS', '4', 'N', 'M', '903', '2555', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (341, '2010', '6314', 'INVESTIMENTOS DIVERSOS', '4', 'N', 'M', '224', '6314', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (342, '2003', '280', 'BENS MÓVEIS', '4', 'N', 'M', '273', '280', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (343, '2003', '322', 'BENFEITORIAS EM BENS DE TERCEIROS', '4', 'N', 'M', '273', '322', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (344, '2003', '336', 'PROVISÃO PARA DEPRECIAÇÃO', '4', 'N', 'M', '273', '336', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (345, '2003', '371', 'PROVISÃO PARA AMORTIZAÇÃO', '4', 'N', 'M', '273', '371', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (347, '2003', '413', 'DESPESAS COM IMPLANTAÇÃO', '4', 'N', 'M', '406', '413', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (348, '2003', '448', 'BENS E VALORES DE TERCEIROS', '4', 'N', 'M', '406', '448', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (349, '2003', '455', 'PROVISÃO PARA AMORTIZAÇÃO', '4', 'N', 'M', '406', '455', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (350, '2010', '4270', 'PESQUISA E DESENVOLVIMENTO', '4', 'N', 'M', '406', '4270', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (351, '2010', '4284', 'IMPLANTAÇÃO DE SISTEMAS E MÉTODOS', '4', 'N', 'M', '406', '4284', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (352, '2010', '5257', 'INVESTIMENTOS SOCIAIS', '4', 'N', 'M', '406', '5257', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (363, '2003', '756', 'PROVISÕES TRABALHISTAS', '4', 'N', 'M', '749', '756', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (364, '2003', '805', 'PROVISÃO PARA IMPOSTO DE RENDA', '4', 'N', 'M', '749', '805', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (365, '2003', '2471', 'IMPOSTOS RETIDOS A RECOLHER', '4', 'N', 'M', '2464', '2471', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (138, '2010', '315', 'EQUIPAMENTOS DE COMUNICAÇÃO', '5', 'S', 'M', '280', '315', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (5, '2009', '3829', 'FUNDO FIXO DE CAIXA-03-UCP', '5', 'S', 'M', '28', '3829', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (140, '2010', '3283', 'MÍVEIS E UTENSÍLIOS-INC.', '5', 'S', 'M', '280', '3283', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (368, '2003', '3444', 'PROVISÃO EQUIV. PATRIMONIAL NEGATIVA', '4', 'N', 'M', '3437', '3444', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (369, '2003', '931', 'CAPITAL SOCIAL SUBSCRITO', '4', 'N', 'M', '924', '931', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (370, '2003', '945', 'CAPITAL SOCIAL A INTEGRALIZAR', '4', 'N', 'M', '924', '945', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (373, '2003', '1057', 'LUCRO DO EXERCÍCIO', '4', 'N', 'M', '1050', '1057', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (374, '2003', '1113', 'RECEITAS COM SERVIÇOS', '4', 'N', 'C', '1106', '1113', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (375, '2003', '1127', 'RECEITAS COM ADMINISTRAÇÃO CONVENIOS', '4', 'N', 'C', '1106', '1127', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (376, '2003', '1169', 'RECEITAS DE APLICAÇÕES FINANCEIRAS', '4', 'N', 'C', '1162', '1169', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (377, '2003', '1183', 'JUROS E DESCONTOS OBTIDOS', '4', 'N', 'C', '1162', '1183', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (378, '2003', '1197', 'DIVIDENDOS E LUCROS DISTRIBUIDOS', '4', 'N', 'C', '1190', '1197', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (379, '2003', '1218', 'RESULTADO EQUIVALENCIA PATRIMONIAL', '4', 'N', 'C', '1190', '1218', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (380, '2003', '1288', 'RECEITAS DIVERSAS', '4', 'N', 'C', '1281', '1288', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (77, '2010', '5670', 'CONVENIO 051/2010-PM NHAMUNDÁ', '5', 'S', 'M', '5229', '5670', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (353, '2003', '525', 'FORNECEDORES DE SERVIÇOS', '4', 'N', 'M', '518', '525', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (354, '2003', '546', 'SALÁRIOS A PAGAR', '4', 'N', 'M', '518', '546', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (355, '2003', '574', 'CONTAS A PAGAR', '4', 'N', 'M', '518', '574', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (357, '2003', '609', 'ADIANTAMENTOS', '4', 'N', 'M', '518', '609', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (72, '2010', '5628', 'CONVENIO 045/2010-PM LABREA', '5', 'S', 'M', '5229', '5628', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (85, '2010', '5733', 'CONVENIO 060/2010-PM SILVES', '5', 'S', 'M', '5229', '5733', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (84, '2010', '5726', 'CONVENIO 059/2010-PM NOVA OLINDA DO NORTE', '5', 'S', 'M', '5229', '5726', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (83, '2010', '5712', 'CONVENIO 057/2010-PM STº ANTONIO DO IÇÁ', '5', 'S', 'M', '5229', '5712', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (82, '2010', '5705', 'CONVENIO 056/2010-PM STº ANTONIO DO IÇÁ', '5', 'S', 'M', '5229', '5705', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (81, '2010', '5698', 'CONVENIO 055/2010-PM STª IZABEL RIO NEGRO', '5', 'S', 'M', '5229', '5698', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (79, '2010', '5684', 'CONVENIO 053/2010-PM SILVES', '5', 'S', 'M', '5229', '5684', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (78, '2010', '5677', 'CONVENIO 052/2010-PM PARINTINS', '5', 'S', 'M', '5229', '5677', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (356, '2003', '581', 'OUTRAS CONTAS A PAGAR', '4', 'N', 'M', '518', '581', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (359, '2003', '630', 'OBRIGAÇÕES PREVIDENCIARIAS', '4', 'N', 'M', '623', '630', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (360, '2003', '658', 'OBRIGAÇÕES FISCAIS', '4', 'N', 'M', '623', '658', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (362, '2003', '742', 'EMPRÉSTIMOS', '4', 'N', 'M', '735', '742', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (358, '2010', '4354', 'DEPÓSITOS EM CAUÇÕES', '4', 'N', 'M', '518', '4354', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (28, '2014', '6342', 'EMPRÉSTIMOS CONSIG. BCO. BRASIL', '5', 'S', 'M', '2429', '6343', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (43, '2010', '6027', 'CONVENIO 102/2010-PM MANACAPURU', '5', 'S', 'M', '5229', '6027', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (315, '2003', '2366', 'RESULTADO LÍQUIDO DO EXERCÍCIO', '5', 'S', 'M', '2359', '2366', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (42, '2010', '6020', 'CONVENIO 101/2010-PM FONTE BOA', '5', 'S', 'M', '5229', '6020', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (41, '2010', '6013', 'CONVENIO 100/2010-PM TEFÉ', '5', 'S', 'M', '5229', '6013', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (101, '2010', '5859', 'CONVENIO 078/2010-PM CODAJÁS', '5', 'S', 'M', '5229', '5859', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (210, '2014', '6202', 'BONUS POR DESEMPENHO', '5', 'S', 'D', '1316', '6202', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (202, '2003', '1344', 'HORAS EXTRAS', '5', 'S', 'D', '1316', '1344', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (204, '2003', '1358', 'DIÁRIAS', '5', 'S', 'D', '1316', '1358', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (203, '2003', '1351', 'GRATIFICAÇÕES', '5', 'S', 'D', '1316', '1351', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (206, '2003', '1372', 'AVISO PRÉVIO/INDENIZAÇÕES TRABALHISTAS', '5', 'S', 'D', '1316', '1372', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (205, '2003', '1365', 'AJUDA DE CUSTO', '5', 'S', 'D', '1316', '1365', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (172, '2014', '6272', 'N.E.T.', '5', 'S', 'M', '574', '6272', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (155, '2003', '2800', 'AMORTIZAÇÃO DE SOFTWARES', '5', 'S', 'M', '371', '2800', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (314, '2003', '2352', 'RESULTADO LÍQUIDO DO EXERCÍCIO', '3', 'N', 'M', '2331', '2352', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (181, '2003', '2821', 'PIS/COFINS/CSLL', '5', 'S', 'M', '812', '2821', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (179, '2003', '763', 'PROVISÃO P/ 13º SALÁRIO', '5', 'S', 'M', '756', '763', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (271, '2003', '14', 'ATIVO CIRCULANTE', '2', 'N', 'M', '7', '14', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (178, '2014', '6195', 'EMPRESTIMOS CONSIGNADOS/BANCO BRASIL', '5', 'S', 'M', '742', '6195', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (273, '2003', '84', 'REALIZAVEL DA CURTO PRAZO', '3', 'N', 'M', '0', '84', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (171, '2014', '6265', 'IMPRENSA OFICIAL DO ESTADO DO AMAZONAS', '5', 'S', 'M', '574', '6265', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (169, '2013', '6097', 'M. A. DA COSTA DOS SANTOS', '5', 'S', 'M', '574', '6097', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (189, '2003', '952', 'ACIONISTA-GOV. DO EST. DO AMAZONAS', '5', 'S', 'M', '945', '952', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (188, '2003', '938', 'ACIONISTA-GOV. DO EST. DO AMAZONAS', '5', 'S', 'M', '931', '938', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (190, '2003', '1064', 'LUCROS OU PREJUÍZOS ACUMULADOS', '5', 'S', 'M', '1057', '1064', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (137, '2003', '308', 'COMPUTADORES E PERIFÉRICOS', '5', 'S', 'M', '280', '308', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (299, '2003', '1190', 'RECEITAS C/ PARTICIPAÇÕES SOCIETÁRIAS', '3', 'N', 'C', '1099', '1190', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (278, '2003', '182', 'REALIZAVEL A LONGO PRAZO', '2', 'N', 'M', '7', '182', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (59, '2010', '5509', 'CONVENIO 028/2010-PM MARAÃ', '5', 'S', 'M', '5229', '5509', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (295, '2003', '1106', 'RECEITAS BRUTA C/ SERVIÇOS', '3', 'N', 'M', '1099', '1106', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (298, '2003', '1162', 'RECEITAS FINANCEIRAS', '3', 'N', 'C', '1099', '1162', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (294, '2003', '1106', 'RECEITAS BRUTA C/ SERVIÇOS', '3', 'N', 'M', '1099', '1106', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (293, '2003', '1050', 'RESULTADOS ACUMULADOS', '3', 'N', 'M', '917', '1050', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (296, '2003', '1099', 'RECEITAS OPERACIONAIS', '2', 'N', 'C', '1092', '1099', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (67, '2010', '5565', 'CONVENIO 036/2010-PM APUÍ', '5', 'S', 'M', '5229', '5565', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (50, '2010', '5439', 'CONVENIO 018/2010-PM JURUÁ', '5', 'S', 'M', '5229', '5439', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (52, '2010', '5453', 'CONVENIO 020/2010-PM NOVA OLINDA DO NORTE', '5', 'S', 'M', '5229', '5453', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (3, '2003', '2415', 'FUNDO FIXO DE CAIXA-01', '5', 'S', 'M', '28', '2415', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (300, '2003', '1281', 'RECEITAS DIVERSAS', '3', 'N', 'C', '1232', '1281', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (71, '2010', '5614', 'CONVENIO 043/2010-PM ITAPIRANGA', '5', 'S', 'M', '5229', '5614', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (70, '2010', '5607', 'CONVENIO 042/2010-PM CARAUARI', '5', 'S', 'M', '5229', '5607', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (69, '2010', '5600', 'CONVENIO 041/2010-PM CARAUARI', '5', 'S', 'M', '5229', '5600', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (68, '2010', '5593', 'CONVENIO 040/2010-PM CANUTAMA', '5', 'S', 'M', '5229', '5593', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (136, '2003', '301', 'MÓVEIS E UTENSÍLIOS', '5', 'S', 'M', '280', '301', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (134, '2003', '287', 'MÁQUINAS EQUIP. AGRÍCOLAS', '5', 'S', 'M', '280', '287', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (58, '2010', '5495', 'CONVENIO 026/2010-PM RIO PRETO DA ERVA', '5', 'S', 'M', '5229', '5495', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (384, '2003', '1435', 'DESPESAS GERAIS ADMINISTRATIVAS', '4', 'N', 'D', '1309', '1435', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (385, '2003', '1645', 'JUROS E DESCONTOS', '4', 'N', 'D', '1638', '1645', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (386, '2003', '1673', 'IMPOSTOS, TAXAS E CONTRIBUIÇÕES', '4', 'N', 'D', '1666', '1673', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (387, '2003', '1729', 'MULTAS', '4', 'N', 'D', '1666', '1729', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (389, '2003', '2359', 'RESULTADO LÍQUIDO DO EXERCÍCIO', '4', 'N', 'M', '2352', '2359', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (47, '2010', '5411', 'CONVENIO 014/2010-PM CAREIRO DA VARZEA', '5', 'S', 'M', '5229', '5411', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (48, '2010', '5425', 'CONVENIO 016/2010-PM ITACOATIARA', '5', 'S', 'M', '5229', '5425', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (49, '2010', '5432', 'CONVENIO 017/2010-PM GUAJARÁ', '5', 'S', 'M', '5229', '5432', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (297, '2003', '1092', 'RECEITAS', '1', 'N', 'C', '0', '1092', '0', '0', '0', '0', '9', '0  ', '0000', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (73, '2010', '5635', 'CONVENIO 046/2010-PM FONTE BOA', '5', 'S', 'M', '5229', '5635', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (157, '2010', '3339', 'SOFTWARES-INC.', '5', 'S', 'M', '371', '3339', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (156, '2003', '2801', 'BENFEITORIA IMÓVEL SÉDE DA CIAMA', '5', 'S', 'M', '371', '2801', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (266, '2003', '126', 'ADIANTAMENTO SALÁRIOS DE EMPREGADOS', '5', 'S', 'M', '98', '126', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (97, '2010', '5831', 'CONVENIO 074/2010-PM PARINTINS', '5', 'S', 'M', '5229', '5831', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (96, '2010', '5824', 'CONVENIO 073/2010-PM COARI', '5', 'S', 'M', '5229', '5824', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (95, '2010', '5803', 'CONVENIO 070/2010-PM URUCURITUBA', '5', 'S', 'M', '5229', '5803', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (135, '2003', '294', 'VEÍCULOS', '5', 'S', 'M', '280', '294', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (94, '2010', '5796', 'CONVENIO 069/2010-PM PAUINI', '5', 'S', 'M', '5229', '5796', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (93, '2010', '5789', 'CONVENIO 068/2010-PM ANAMÃ', '5', 'S', 'M', '5229', '5789', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (92, '2010', '5782', 'CONVENIO 067/2010-PM BARCELOS', '5', 'S', 'M', '5229', '5782', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (91, '2010', '5775', 'CONVENIO 066/2010-PM SILVES', '5', 'S', 'M', '5229', '5775', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (230, '2003', '1568', 'JORNAIS, REVISTAS E PERIÓDICOS', '5', 'S', 'D', '1435', '1568', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (231, '2003', '1575', 'DESPESAS BANCÁRIAS', '5', 'S', 'D', '1435', '1575', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (228, '2003', '1554', 'VALE TRANSPORTE', '5', 'S', 'D', '1435', '1554', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (267, '2003', '553', 'ORDENADOIS A PAGAR', '5', 'S', 'M', '546', '553', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (38, '2010', '5355', 'CONVENIO 006/2010-PM BORBA', '5', 'S', 'M', '5229', '5355', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (275, '2003', '98', 'ADIANTAMENTOS', '4', 'N', 'M', '84', '98', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (36, '2010', '5341', 'CONVENIO 004/2010-PM ANAMÃ', '5', 'S', 'M', '5229', '5341', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (31, '2003', '210', 'DEPÓSITO AD RECURSOM TRABALHISTAS', '5', 'S', 'M', '203', '210', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (30, '2003', '6244', 'ALUGUEL IMÓVEL-SÉDE DA CIAMA', '5', 'S', 'M', '168', '6244', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (29, '2003', '2457', 'IRF A COMPENSAR S/ APLIC. FINANC.', '5', 'S', 'M', '2450', '2457', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (27, '2003', '2282', 'EMPRÉSTIMOS A EMPREGADOS', '5', 'S', 'M', '98', '2282', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (26, '2003', '2282', 'EMPRÉSTIMOS A EMPREGADOS', '5', 'S', 'M', '98', '2282', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (25, '2003', '3017', 'ADIANTAMENTO P/ DESP. DE VIAGEM', '5', 'S', 'M', '98', '3017', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (35, '2010', '5334', 'CONVENIO 003/2010-PM ANAMÃ', '5', 'S', 'M', '5229', '5334', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (122, '2010', '6055', 'W. P. CONST. COM. TERRAPL. LTDA.', '5', 'S', 'M', '5236', '6055', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (120, '2010', '6006', 'CONVENIO 099/2010-PM IRANDUBA', '5', 'S', 'M', '5229', '6006', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (119, '2010', '5999', 'CONVENIO 098/2010-PM MANACAPURU', '5', 'S', 'M', '5229', '5999', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (118, '2010', '5992', 'CONVENIO 097/2010-PM MANACAPURU', '5', 'S', 'M', '5229', '5992', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (117, '2010', '5985', 'CONVENIO 096/2010-PM TEFÉ', '5', 'S', 'M', '5229', '5985', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (40, '2010', '5369', 'CONVENIO 008/2010-PM BORBA', '5', 'S', 'M', '5229', '5369', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (209, '2003', '2940', 'ABONO DE FÉRIAS', '5', 'S', 'D', '1316', '2940', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (252, '2013', '5215', 'PLANO DE SAÚDE DOS FUNCIONÁRIOS', '5', 'S', 'D', '1435', '5215', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (131, '2003', '3234', 'INTERMEF-INTEG. MÉDICO HOSP. FAR. LTDA.', '5', 'S', 'M', '252', '3234', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (130, '2003', '3227', 'CIALI-COMPANHIA DE ALIMENTOS', '5', 'S', 'M', '252', '3227', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (129, '2015', '6356', 'EMPRESA AMAZONENSE DE DENDÊ-EMADE', '5', 'S', 'M', '231', '6356', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (128, '2003', '3220', 'AGROPAM-AGRICULT. PECUAR. AMAZ. LTDA.', '5', 'S', 'M', '231', '3220', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (127, '2003', '3206', 'INTERMEF-INTEG. MÉDICO HOSP. FAR. LTDA.', '5', 'S', 'M', '231', '3206', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (121, '2010', '6048', 'CONSTRUTORA SOMA LTDA.', '5', 'S', 'M', '5236', '6048', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (254, '2003', '1652', 'JUROS E MULTAS', '5', 'S', 'D', '1645', '1652', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (253, '2013', '5222', 'SEGURO VIDA C/ ACID. PESSOAIS DOS FUNC.', '5', 'S', 'D', '1435', '5222', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (250, '2003', '1974', 'ALUGUEL IMÓVEL-SÉDE DA CIAMA', '5', 'S', 'D', '1435', '1974', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (249, '2003', '1918', 'ASSOCIAÇÃO DE CLASSE', '5', 'S', 'D', '1435', '1918', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (292, '2003', '917', 'PATRIMONIO LÍQUIDO', '2', 'N', 'M', '504', '917', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (291, '2003', '924', 'CAPITAL SOCIAL', '3', 'N', 'M', '917', '924', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (290, '2003', '2464', 'OBRIGAÇÕES TRIBUTÁRIAS', '3', 'N', 'M', '511', '2464', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (191, '2003', '3654', 'LUCRO OU PREJUÍZO DO EXERCÍCIO', '5', 'S', 'M', '1057', '3654', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (277, '2003', '189', 'CRÉDITOS', '3', 'N', 'M', '182', '189', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (51, '2010', '5446', 'CONVENIO 019/2010-PM NOVA OLINDA DO NORTE', '5', 'S', 'M', '5229', '5446', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (139, '2003', '2247', 'SOFTWARES', '5', 'S', 'M', '280', '2247', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (276, '2003', '161', 'ANTECIPAÇÕES ATIVAS', '3', 'N', 'M', '14', '161', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (274, '2003', '91', 'CONTAS A RECEBER', '4', 'N', 'M', '84', '91', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (283, '2003', '406', 'DIFERIDO', '3', 'N', 'M', '217', '406', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (281, '2003', '273', 'IMOBILIZADO', '3', 'N', 'M', '217', '273', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (116, '2010', '5978', 'CONVENIO 095/2010-PM NHAMUNDÁ', '5', 'S', 'M', '5229', '5978', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (115, '2010', '5971', 'CONVENIO 094/2010-PM ITACOATIARA', '5', 'S', 'M', '5229', '5971', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (114, '2010', '5964', 'CONVENIO 093/2010-PM JURUÁ', '5', 'S', 'M', '5229', '5964', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (133, '2014', '6328', 'IMPLANTAÇÃO NOVOS SISTEMAS E MÉTODOS', '5', 'S', 'M', '6314', '6328', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (132, '2014', '6321', 'PESQUISA E DESENVOLVIMENTO', '5', 'S', 'M', '6314', '6321', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (288, '2003', '735', 'EMPRÉSTIMOS E FINANCIAMENTO', '3', 'N', 'M', '511', '735', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (183, '2003', '2485', 'IRRF A RECOLHER (RETIDO PESSOA JURÍDICA)', '5', 'S', 'M', '2471', '2485', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (269, '2003', '2373', 'SUHAB-SUP. HAB. E ASS. FUNDIÁRIOS', '5', 'S', 'M', '581', '2373', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (185, '2010', '3801', 'CIAMA/UCP/PRODERAM', '5', 'S', 'M', '2555', '3801', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (164, '2003', '2982', 'PRODAM-PROCES. DE DADOS', '5', 'S', 'M', '525', '2982', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (163, '2003', '2961', 'MANAUS ENERGIA S/A.', '5', 'S', 'M', '525', '2961', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (162, '2003', '2947', 'TRADING DERIVADOS DE PETROLEO LTDA.', '5', 'S', 'M', '525', '2947', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (161, '2003', '2380', 'TICKET SERVIÇOS S/A.', '5', 'S', 'M', '525', '2380', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (160, '2010', '6188', 'AMAOTIZAÇÃO GASTOS IMPL. SIST. MÉTODOS', '5', 'S', 'M', '371', '6188', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (159, '2010', '6181', 'AMAOTIZAÇÃO GASTOS PESQUISA E DESENV.', '5', 'S', 'M', '371', '6181', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (195, '2003', '1176', 'RENDIMENTOS APLICAÇÕES FINANCEIRAS', '5', 'S', 'C', '1169', '1176', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (308, '2003', '1295', 'DESPESAS', '1', 'N', 'D', '0', '1295', '0', '0', '0', '0', '3', '0  ', '0000', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (248, '2003', '1890', 'MANUTENÇÃO E ATUALIZAÇÃO DE SISTEMAS', '5', 'S', 'D', '1435', '1890', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (247, '2003', '2527', 'DESPESAS COM INTERNET', '5', 'S', 'D', '1435', '2527', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (246, '2003', '2401', 'CONFRATERNIZAÇÃO E EVENTOS', '5', 'S', 'D', '1435', '2401', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (245, '2003', '2233', 'MATERIAL DE CONSUMO E INFORMÁTICA', '5', 'S', 'D', '1435', '2233', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (256, '2003', '1687', 'IPTU', '5', 'S', 'D', '1673', '1687', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (255, '2003', '1680', 'IOF', '5', 'S', 'D', '1673', '1680', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (312, '2003', '3640', 'PERCA COM INVESTIMENTOS', '5', 'S', 'D', '1764', '3640', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (311, '2003', '1771', 'EQUIVALENCIA PATRIMONIAL NEGATIVA', '5', 'S', 'D', '1764', '1771', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (310, '2003', '1764', 'RESULTADO DA EQUIVALENCIA PATRIMONIAL', '4', 'N', 'D', '1757', '1764', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (309, '2003', '1757', 'DESP. OPERACIONAIS DESP. C/ PART. SOCIETÁRIAS', '3', 'N', 'D', '1302', '1757', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (258, '2003', '1715', 'TAXAS DE EXPEDIENTES', '5', 'S', 'D', '1673', '1715', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (257, '2003', '1694', 'IPVA', '5', 'S', 'D', '1673', '1694', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (305, '2003', '1666', 'DESPESAS  OPERACIONAIS TRIBUTÁRIAS', '3', 'N', 'D', '1302', '1666', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (304, '2003', '1638', 'DESPESAS OPERACIONAIS FINANCEIRAS', '3', 'N', 'D', '1302', '1638', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (303, '2003', '1302', 'DESPESAS OPERACIONAIS', '2', 'N', 'D', '1295', '1302', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (201, '2003', '1337', '13º SALÁRIO', '5', 'S', 'D', '1316', '1337', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (113, '2010', '5957', 'CONVENIO 092/2010-PM NHAMUNDÁ', '5', 'S', 'M', '5229', '5957', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (112, '2010', '5943', 'CONVENIO 090/2010-PM FONTE BOA', '5', 'S', 'M', '5229', '5943', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (111, '2010', '5936', 'CONVENIO 089/2010-PM URUCURITUBA', '5', 'S', 'M', '5229', '5936', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (110, '2010', '5922', 'CONVENIO 087/2010-PM URUCURITUBA', '5', 'S', 'M', '5229', '5922', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (109, '2010', '5915', 'CONVENIO 086/2010-PM CODAJÁS', '5', 'S', 'M', '5229', '5915', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (107, '2010', '5901', 'CONVENIO 084/2010-PM NHAMUNDÁ', '5', 'S', 'M', '5229', '5901', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (317, '2003', '1316', 'DESPESAS TRABALHISTAS', '4', 'N', 'M', '1309', '1316', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (318, '2015', '6349', 'BENFEITORIAS EM BENS DE TERCEIROS-MUSA', '5', 'S', 'M', '371', '6349', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (319, '2003', '602', 'CONTRIBUIÇÃO SINDICAL', '5', 'S', 'M', '581', '602', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (192, '2003', '1785', 'OUTRAS RECEITAS', '5', 'S', 'C', '1113', '1785', '0', '0', '0', '0', '2', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (251, '2003', '2688', 'FRETES E CARRETOS', '5', 'S', 'D', '1435', '2688', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (313, '2003', '3640', 'PERCA COM INVESTIMENTOS', '5', 'S', 'D', '1764', '3640', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (103, '2010', '5873', 'CONVENIO 080/2010-PM CODAJÁS', '5', 'S', 'M', '5229', '5873', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (102, '2010', '5866', 'CONVENIO 079/2010-PM CODAJÁS', '5', 'S', 'M', '5229', '5866', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (280, '2003', '224', 'INVESTIMENTOS', '3', 'N', 'M', '217', '224', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (279, '2003', '217', 'PERMANENTE', '2', 'N', 'M', '7', '217', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (208, '2003', '1393', 'HONORÁRIO CONSELHO DE ADMINISTRAÇÃO', '5', 'S', 'D', '1316', '1393', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (207, '2003', '1386', 'HONORÁRIO CONSELHO FISCAL', '5', 'S', 'D', '1316', '1386', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (8, '2003', '3178', 'BANCO DO BRASIL S/A.', '5', 'S', 'M', '42', '3178', '0', '0', '35637', '63037', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (9, '2003', '3794', 'BANCO DO BRASIL S/A.', '5', 'S', 'M', '42', '3794', '0', '0', '35637', '74047', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (12, '2003', '3878', 'BANCO DO BRASIL S/A.', '5', 'S', 'M', '42', '3878', '0', '0', '35637', '78883', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (100, '2010', '5852', 'CONVENIO 077/2010-PM MANAQUIRI', '5', 'S', 'M', '5229', '5852', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (99, '2010', '5845', 'CONVENIO 076/2010-PM PAUINI', '5', 'S', 'M', '5229', '5845', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (98, '2010', '5838', 'CONVENIO 00752010-PM EIRUNEPÉ', '5', 'S', 'M', '5229', '5838', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (180, '2003', '770', 'FÉRIAS', '5', 'S', 'M', '756', '770', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (158, '2010', '3346', 'BENFEITORIAS IMÓVEIS DE TERCEIROS-INC.', '5', 'S', 'M', '371', '3346', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (236, '2003', '1610', 'IMPRESSOS E MATERIAIS GRÁFICOS', '5', 'S', 'D', '1435', '1610', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (237, '2003', '1617', 'DESPESAS COM VEÍCULOS', '5', 'S', 'D', '1435', '1617', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (238, '2003', '1624', 'COMBUSTÍVES E LUBRIFICANTES', '5', 'S', 'D', '1435', '1624', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (106, '2010', '5894', 'CONVENIO 083/2010-PM NHAMUNDÁ', '5', 'S', 'M', '5229', '5894', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (105, '2010', '5887', 'CONVENIO 082/2010-PM TABATINGA', '5', 'S', 'M', '5229', '5887', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (104, '2010', '5880', 'CONVENIO 081/2010-PM MARAÃ', '5', 'S', 'M', '5229', '5880', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (382, '2003', '1400', 'ENCARGOS SOCIAIS', '4', 'N', 'D', '1309', '1400', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (383, '2003', '1421', 'SERVIÇOS DE TERCEIROS', '4', 'N', 'D', '1309', '1421', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (306, '2003', '2331', 'CONTAS DE FECHAMENTO DE BALANÇO', '2', 'N', 'M', '1295', '2331', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (184, '2003', '2492', 'ISS RETIDO A RECOLHER', '5', 'S', 'M', '2471', '2492', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (187, '2003', '3465', 'INTERMEF-INTEG. MÉDICO HOSP. FAR. LTDA.', '5', 'S', 'M', '3444', '3465', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (186, '2003', '3451', 'CIALI-COMPANHIA DE ALIMENTOS', '5', 'S', 'M', '3444', '3451', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (229, '2003', '1561', 'BENS DE PEQUENO VALOR', '5', 'S', 'D', '1435', '1561', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (226, '2003', '1533', 'DISPENDIO COM ALIMENTAÇÃO', '5', 'S', 'D', '1435', '1533', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (227, '2003', '1540', 'SERVIÇOS DE PESSOA JURÍDICA', '5', 'S', 'D', '1435', '1540', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (224, '2003', '1512', 'CURSOS E SEMINÁRIOS', '5', 'S', 'D', '1435', '1512', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (166, '2003', '6111', 'EMPRESA BRASILEIRA DE TELECOMUNICAÇÃO', '5', 'S', 'M', '525', '6111', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (173, '2014', '6279', 'BUFFET RESTAURANTE SABOR CASEIRO', '5', 'S', 'M', '574', '6279', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (282, '2003', '273', 'IMOBILIZADO', '3', 'N', 'M', '217', '273', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (76, '2010', '5663', 'CONVENIO 050/2010-PM MAUÉS', '5', 'S', 'M', '5229', '5663', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (75, '2010', '5649', 'CONVENIO 048/2010-PM MAUÉS', '5', 'S', 'M', '5229', '5649', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (74, '2010', '5642', 'CONVENIO 047/2010-PM FONTE BOA', '5', 'S', 'M', '5229', '5642', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (307, '2003', '2331', 'CONTAS DE FECHAMENTO DE BALANÇO', '2', 'N', 'M', '1295', '2331', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (270, '2003', '21', 'DISPONIBILIDADES', '3', 'N', 'M', '14', '21', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (108, '2010', '5908', 'CONVENIO 085/2010-PM NHAMUNDÁ', '5', 'S', 'M', '5229', '5908', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (80, '2010', '5691', 'CONVENIO 054/2010-PM SÃO SEBASTIÃO UATUMÃ', '5', 'S', 'M', '5229', '5691', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (170, '2014', '6223', 'O. G. L. CAVALCANTE', '5', 'S', 'M', '574', '6223', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (225, '2003', '1526', 'SERVIÇOS DE PESSOA FÍSICA', '5', 'S', 'D', '1435', '1526', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (302, '2003', '1309', 'DESPESAS OPERACIONAIS ADMINISTRATIVAS', '3', 'N', 'D', '1302', '1309', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (301, '2003', '1232', 'RECEITAS NÃO OPERACIONAIS', '2', 'N', 'C', '1092', '1232', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (15, '2003', '5313', 'BANCO BRADESCO S/A.', '5', 'S', 'M', '42', '5313', '0', '0', '3739', '429503', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (182, '2003', '2478', 'IRRF A RECOLHER (RETIDO PESSOA FÍSICA)', '5', 'S', 'M', '2471', '2478', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (66, '2010', '5558', 'CONVENIO 035/2010-PM AUTAZES', '5', 'S', 'M', '5229', '5558', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (65, '2010', '5551', 'CONVENIO 034/2010-PM ITAMARATI', '5', 'S', 'M', '5229', '5551', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (64, '2010', '5544', 'CONVENIO 033/2010-PM NOVO ARIPUANÃ', '5', 'S', 'M', '5229', '5544', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (63, '2010', '5537', 'CONVENIO 032/2010-PM SÃO PAULO OLIVENÇA', '5', 'S', 'M', '5229', '5537', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (62, '2010', '5530', 'CONVENIO 031/2010-PM SILVES', '5', 'S', 'M', '5229', '5530', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (61, '2010', '5523', 'CONVENIO 030/2010-PM TABATINGA', '5', 'S', 'M', '5229', '5523', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (60, '2010', '5516', 'CONVENIO 029/2010-PM TONANTINS', '5', 'S', 'M', '5229', '5516', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (177, '2003', '644', 'FGTS A RECOLHER', '5', 'S', 'M', '630', '644', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (176, '2003', '637', 'INSS A RECOLHER', '5', 'S', 'M', '630', '637', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (175, '2010', '4361', 'NCA ENGENHARIA E ARQUITETURA LTDA.', '5', 'S', 'M', '4354', '4361', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (174, '2014', '6307', 'J.P. VIAGENS E TURISMO LTDA.', '5', 'S', 'M', '574', '6307', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (168, '2014', '6146', 'FIR DA SILVA SERV. ENTREGA RÁPIDA LTDA.', '5', 'S', 'M', '525', '6146', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (272, '2003', '7', 'ATIVO', '1', 'N', 'M', '0', '7', '0', '0', '0', '0', '9', '0  ', '0000', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (167, '2010', '6125', 'LEGÍTIMA SERV. DE SEG. PATRIMONIAL LTDA.', '5', 'S', 'M', '525', '6125', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (165, '2003', '3605', 'ALTERDATA TECNOLOGIA EM INFOR. LTDA.', '5', 'S', 'M', '525', '3605', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (284, '2003', '504', 'PASSIVO', '1', 'N', 'M', '0', '504', '0', '0', '0', '0', '9', '0  ', '0000', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (88, '2010', '5754', 'CONVENIO 063/2010-PM SILVES', '5', 'S', 'M', '5229', '5754', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (87, '2010', '5747', 'CONVENIO 062/2010-PM SILVES', '5', 'S', 'M', '5229', '5747', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (86, '2010', '5740', 'CONVENIO 061/2010-PM SILVES', '5', 'S', 'M', '5229', '5740', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (212, '2003', '1407', 'PREVIDÊNCIA SOCIAL', '5', 'S', 'D', '1400', '1407', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (211, '2014', '6153', 'PERICULOSIDADE', '5', 'S', 'D', '1316', '6153', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (213, '2003', '1414', 'FGTS', '5', 'S', 'D', '1400', '1414', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (215, '2003', '1449', 'ÁGUA E ESGOTO', '5', 'S', 'D', '1435', '1449', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (218, '2003', '1470', 'MATERIAL DE EXPEDIENTE', '5', 'S', 'D', '1435', '1470', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (216, '2003', '1456', 'EMERGIA ELÉTRICA', '5', 'S', 'D', '1435', '1456', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (217, '2003', '1463', 'TELEFONE', '5', 'S', 'D', '1435', '1463', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (221, '2003', '1491', 'VIAGENS E ESTADIAS', '5', 'S', 'D', '1435', '1491', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (219, '2003', '1477', 'CORREIOS, POSTAGENS E SEDEX', '5', 'S', 'D', '1435', '1477', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (222, '2003', '1498', 'MANUTENÇÃO E CONSERVAÇÃO', '5', 'S', 'D', '1435', '1498', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (220, '2003', '1484', 'MATERIAL DE HIGIENE E LIMPEZA', '5', 'S', 'D', '1435', '1484', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (223, '2003', '1505', 'DEPRECIAÇÃO E AMORTIZAÇÃO', '5', 'S', 'D', '1435', '1505', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (6, '2003', '1519', 'BANCO ITAU S/A.', '5', 'S', 'M', '42', '1519', '0', '0', '1677', '053751', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (7, '2003', '2387', 'BANCO BRADESCO S/A.', '5', 'S', 'M', '42', '2387', '0', '0', '3739', '121940', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (10, '2003', '3857', 'BANCO BRADESCO S/A.', '5', 'S', 'M', '42', '3857', '0', '0', '3739', '196134', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (11, '2003', '3857', 'BANCO BRADESCO S/A.', '5', 'S', 'M', '42', '3857', '0', '0', '35637', '196134', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (57, '2010', '5488', 'CONVENIO 025/2010-PM UARINI', '5', 'S', 'M', '5229', '5488', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (56, '2010', '5481', 'CONVENIO 024/2010-PM UARINI', '5', 'S', 'M', '5229', '5481', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (55, '2010', '5474', 'CONVENIO 023/2010-PM UARINI', '5', 'S', 'M', '5229', '5474', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (54, '2010', '5467', 'CONVENIO 022/2010-PM UARINI', '5', 'S', 'M', '5229', '5467', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (53, '2010', '5460', 'CONVENIO 021/2010-PM UARINI', '5', 'S', 'M', '5229', '5460', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (39, '2010', '5362', 'CONVENIO 007/2010-PM BORBA', '5', 'S', 'M', '5229', '5362', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (89, '2010', '5761', 'CONVENIO 064/2010-PM SILVES', '5', 'S', 'M', '5229', '5761', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (214, '2014', '3059', 'SERVIÇOS DE PESSOA JURÍDICA', '5', 'S', 'D', '1421', '3059', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (260, '2003', '1862', 'ALVARÁ DE FUNCIONAMENTO', '5', 'S', 'D', '1673', '1862', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (259, '2003', '1722', 'ICMS', '5', 'S', 'D', '1673', '1722', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (262, '2003', '1876', 'OUTRAS DESPESAS TRIBUTÁRIAS', '5', 'S', 'D', '1673', '1876', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (261, '2003', '1869', 'I.S.S.', '5', 'S', 'D', '1673', '1869', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (263, '2013', '6104', 'CONTRIBUIÇÃO SINDICAL', '5', 'S', 'D', '1673', '6104', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (265, '2009', '3640', 'PERCAS COM INVESTIMENTOS', '5', 'S', 'D', '1764', '3640', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (264, '2003', '1771', 'EQUIVALENCIA PATRIMONIAL NEGATIVA', '5', 'S', 'D', '1764', '1771', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (243, '2003', '2191', 'REFEIÇÕES E LANCHES', '5', 'S', 'D', '1435', '2191', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (244, '2003', '2198', 'UNIFORMES', '5', 'S', 'D', '1435', '2198', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (18, '2003', '4438', 'BANCO BRADESCO S/A.', '5', 'S', 'M', '42', '4438', '0', '0', '3739', '327514', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (20, '2003', '2394', 'BANCO BRADESCO S/A. APLICAÇÕES', '5', 'S', 'M', '70', '2394', '0', '0', '3739', '0', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (19, '2003', '1799', 'BANCO ITAU S/A. INVESTIMENTOS', '5', 'S', 'M', '70', '1799', '0', '0', '1677', '053751', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (17, '2003', '4249', 'BANCO BRADESCO S/A.', '5', 'S', 'M', '42', '4249', '0', '0', '3739', '289590', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (21, '2003', '3836', 'BANCO DO BRASIL S/A.. APLICAÇÕES', '5', 'S', 'M', '70', '3836', '0', '0', '35637', '74047', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (22, '2003', '4102', 'BANCO DO BRASIL S/A.. APLICAÇÕES', '5', 'S', 'M', '70', '4102', '0', '0', '35637', '78883', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (152, '2010', '3318', 'MÍVEIS E UTENSÍLIOS-INC.', '5', 'S', 'M', '336', '3318', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (153, '2010', '3325', 'COMPUTADORES E PERIFÉRICOS-INC.', '5', 'S', 'M', '336', '3325', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (37, '2010', '5348', 'CONVENIO 005/2010-PM AMATURÁ', '5', 'S', 'M', '5229', '5348', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (154, '2010', '3332', 'MÁQUINAS E EQUIP. ELETRONICOS-INC.', '5', 'S', 'M', '336', '3332', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (16, '2010', '6083', 'BANCO DO BRASIL S/A.', '5', 'S', 'M', '42', '6083', '0', '0', '35637', '86622', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (23, '2010', '6090', 'BANCO DO BRASIL S/A.. APLICAÇÕES', '5', 'S', 'M', '70', '6090', '0', '0', '35637', '86622', '1', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (33, '2010', '5320', 'CONVENIO 001/2010-PM BENJAMIN CONSTANT', '5', 'S', 'M', '5229', '5320', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (32, '2003', '2317', 'BLOQUEIO JUDICIAL', '5', 'S', 'M', '203', '2317', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (24, '2003', '105', 'ADIANTAMENTO P/ PEQ. DESPESAS', '5', 'S', 'M', '98', '105', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (34, '2010', '5327', 'CONVENIO 002/2010-PM ATALAIA DO NORTE', '5', 'S', 'M', '5229', '5327', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (46, '2010', '5404', 'CONVENIO 013/2010-PM CAAPIRANGA', '5', 'S', 'M', '5229', '5404', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (45, '2010', '5397', 'CONVENIO 012/2010-PM CAAPIRANGA', '5', 'S', 'M', '5229', '5397', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (44, '2014', '6335', 'CONVENIO 001/2014-PM BENJAMIN CONSTANT', '5', 'S', 'M', '5229', '6335', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (126, '2003', '3199', 'CIALI-COMPANHIA DE ALIMENTOS', '5', 'S', 'M', '231', '3199', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (125, '2010', '6076', 'N.J. CONSTRUÇÃO NAVEGAÇÃO E COM. LTDA.', '5', 'S', 'M', '5236', '6076', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (124, '2010', '6069', 'CONSTRUTORA PONCTUAL CORP. LTDA.', '5', 'S', 'M', '5236', '6069', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (123, '2010', '6062', 'P. R. CONST. TERRAPL. LTDA.', '5', 'S', 'M', '5236', '6062', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (144, '2003', '2758', 'IMÓVEL SÉDE DA CIAMA-AV. TEFÉ', '5', 'S', 'M', '322', '2758', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (146, '2010', '4340', 'BENFEITORIAS BENS DE TERCEIROS-MUSA', '5', 'S', 'M', '322', '4340', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (145, '2010', '3311', 'BENFEITORIAS IMÓVEIS DE TERCEIROS-INC.', '5', 'S', 'M', '322', '3311', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (148, '2003', '350', 'COMPUTADORES E PERIFÉRICOS', '5', 'S', 'M', '336', '350', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (147, '2003', '343', 'MÁQUINAS EQUIP. AGRÍCOLAS', '5', 'S', 'M', '336', '343', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (151, '2003', '2212', 'VEÍCULOS', '5', 'S', 'M', '336', '2212', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (150, '2003', '364', 'EQUIPAMENTOS DE COMUNICAÇÃO', '5', 'S', 'M', '336', '364', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (149, '2003', '357', 'MÓVEIS E UTENSÍLIOS', '5', 'S', 'M', '336', '357', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (142, '2010', '3297', 'SOFTWARES-INC.', '5', 'S', 'M', '280', '3297', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (143, '2010', '3304', 'MÁQUINAS E EQUIP. ELETRONICOS-INC.', '5', 'S', 'M', '280', '3304', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (141, '2010', '3290', 'COMPUTADORES E PERIFÉRICOS-INC.', '5', 'S', 'M', '280', '3290', '0', '0', '0', '0', '9', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (90, '2010', '5768', 'CONVENIO 065/2010-PM SILVES', '5', 'S', 'M', '5229', '5768', '0', '0', '0', '0', '9', '0  ', '2010', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (233, '2003', '1589', 'PUBLICAÇÕES', '5', 'S', 'D', '1435', '1589', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (241, '2003', '1792', 'MATERIAL ELÉTRICO', '5', 'S', 'D', '1435', '1792', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);
INSERT INTO conta VALUES (242, '2003', '2184', 'SEGURO DE VEÍCULOS', '5', 'S', 'D', '1435', '2184', '0', '0', '0', '0', '3', '0  ', '2003', 1, '2015-08-29 11:29:48.356', 1);


--
-- Name: conta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('conta_id_seq', 395, true);


--
-- Data for Name: contrato; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO contrato VALUES (1205, '94501,03', '20150206', 'CONFECÇÃO E MONTAGEM DAS ESQUADRIAS METÁLICAS E TODOS OS ACESSÓRIOS NECESSÁRIOS DA SALA DE ESTABILIZAÇÃO E CLÍNICA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA-AM.', '002/2015', '001', '2', '07913249000137', 'ALUMIFER VIDROS (A.A.R. LEITE)', '20150322', '32980', '20150210', 'N', '33D7DE91EA82BD9C', '20150122', '20150721', '2015010511460307761330', '20150122', '20150203', '17092485', '20150123', '20150222', '78472015', '20150122', '20150122', '33D7DE91EA82BD9C', '20150122', '20150721', ' ', '00000000', '00000000', '01', 'TC 001/2015', 0, NULL, 2, '790245622015', '20150204', '20150802', '001/2015', 3, '0', 0);
INSERT INTO contrato VALUES (1206, '38490,00', '20150205', 'FORNECIMENTO, INSTALAÇÃO E MONTAGEM DA AMPLIAÇÃO DA REDE CANALIZADA DE GASES MEDICINAIS COMPOSTA DE OXIGÊNIO, AR COMPRIMIDO E VÁCUO CLÍNICO DO HGUT', '005/2015', '001', '2', '02800411000197', 'DAMON E VALOIS LTDA-EPP', '20150405', '32979', '20150209', 'N', '77988557113470D3', '20141124', '20150523', '2015011906531144042898', '20150127', '20150217', '17105960', '20150127', '20150226', '87552015', '20150127', '20150427', '77988557113470D3', '20141124', '20150523', '00009982015', '20150127', '20150228', '01', 'TC 002/2015', 0, NULL, 2, '673956482014', '20141106', '20150504', 'TC 002/2015', 3, '0', 0);
INSERT INTO contrato VALUES (1207, '43957,55', '20150209', 'AQUISIÇÃO DE EQUIPAMENTOS PARA PISCINA TERAPÊUTICA DE FISIOTERAPIA E AQUISIÇÃO DE EXPURGO PARA O HGUT.', '009/2015', '001', '2', '07695558000188', 'UNITEKI COMÉRCIO E CONSTRUÇÃO LTDA', '20150408', '32987', '20150223', 'N', '263822014-88888558', '20141015', '20150413', '2015020207352109286122', '20150204', '20150303', '17167485', '20150204', '20150306', '14582015', '20150107', '20150407', '73925D1CFB9392DE', '20150117', '20150716', ' ', '00000000', '00000000', '01', 'TC 003/2015', 0, NULL, 2, '749239002015', '20150107', '20150705', '003/2015', 3, '0', 0);
INSERT INTO contrato VALUES (1208, '5820,00', '20150323', 'CONFECÇÃO E MONTAGEM DAS ESQUADRIAS METÁLICAS E TODOS OS ACESSÓRIOS NECESSÁRIOS DA SALA DE ESTABILIZAÇÃO E CLÍNICA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA-AM.', '002/2015', '001', '2', '07913249000137', 'A.A.R. LEITE-ME', '20150401', '33018', '20150409', 'N', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', '02', '1º ADITIVO', 0, NULL, 3, ' ', '00000000', '00000000', '001/2015', 1, '0', 0);
INSERT INTO contrato VALUES (1209, '0,00', '20150315', 'SERVIÇOS DE APOIO ADMINISTRATIVO EXTERNO E TRANSPORTE A SER REALIZADO POR MOTOBOY PARA REALIZAR SERVIÇOS DA CIAMA', '003/2011', '001', '2', '08940297000187', 'AMAZONIA EXPRESS-FIR DA SILVA SERVIÇOS DE ENTREGA', '20160315', '33003', '20150317', 'N', ' ', '20141015', '20150413', '2015030207094512887048', '20150312', '20150331', '17279496', '20150225', '20150327', '236032015', '20150310', '20150608', ' ', '20141015', '20150413', ' ', '00000000', '00000000', '02', '6º ADITIVO', 0, NULL, 3, '845177392015', '20150305', '20150831', '002/2011', 3, '0', 0);
INSERT INTO contrato VALUES (1211, '79980,00', '20150427', 'PRESTAÇÃO DE SERVIÇOS DE AGENCIAMENTO DE VIAGENS, COMPREENDENDO A EMISSÃO, REMARCAÇÃO, DESDOBRAMENTO, CONFIRMAÇÃO E CANCELAMENTO DE PASSAGENS AÉREAS REGIONAIS, NACIONAIS E INTERNACIONAIS PARA A CIAMA', '013/2015', '001', '2', '34516450000153', 'SELENETUR AGÊNCIA DE VIAGENS E TURISMO LTDA', '20160430', '33031', '20150430', 'N', '568FF6AAE5DA4444', '20150218', '20150817', '2015033101375205971070', '20150402', '20150429', '17468213', '20150327', '20150426', '220032015', '20150305', '20150603', '568FF6AAE5DA4444', '20150218', '20150817', '030174201000011', '20150218', '20160218', '01', '006/2015', 0, NULL, 4, '787877472015', '20150202', '20150731', '006/2015', 3, '0', 0);
INSERT INTO contrato VALUES (1210, '7500,00', '20150413', 'FORNECIMENTO, INSTALAÇÃO E MONTAGEM DA AMPLIAÇÃO DA REDE CANALIZADA DE GASES MEDICINAIS COMPOSTA DE OXIGÊNIO, AR COMPRIMIDO E VÁCUO CLÍNICO DO HGUT', '005/2015', '001', '2', '02800411000197', 'DAMON E VALOIS LTDA-EPP', '20150502', '33029', '20150428', 'N', '77988557113470D3', '20141124', '20150523', ' ', '00000000', '00000000', ' ', '00000000', '00000000', '87552015', '20150127', '20150427', '77988557113470D3', '20141124', '20150523', ' ', '00000000', '00000000', '02', '1º TA TC 002/15', 0, NULL, 4, '673956482014', '20141106', '20150504', '002/2015', 1, '0', 0);
INSERT INTO contrato VALUES (1212, '882,00', '20150413', 'AQUISIÇÃO DE PLACAS INDICATIVAS EM PVC PARA A SALA DE ESTABILIZAÇÃO E SALA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA - AM.', '015/2015', '001', '2', '02878815000101', 'FATH COMÉRCIO E SE', '20150423', '33022', '20150415', 'N', '80174CD8D3E5585F', '20150413', '20151010', '2015032609480362272899', '20150413', '20150424', '17557879', '20150413', '20150513', '221422015', '20150305', '20150603', '80174CD8D3E5585F', '20150413', '20151010', ' ', '00000000', '00000000', '20', 'OES 004/2015', 0, NULL, 4, '926842442015', '20150413', '20151009', 'OES 004/2015', 3, '0', 0);
INSERT INTO contrato VALUES (1213, '16148,10', '20150430', 'PRESTAÇÃO DE SERVIÇO DE SEGURANÇA ARMADA NAS DEPENDÊNCIAS DA CIAMA', '005/2011', '001', '2', '07030464000190', 'LEGÍTIMA SERV DE PROTEÇÃO, SEG. E VIG.PATRIMONIAL', '20160502', '33032', '20150504', 'N', '179FB43D29FAA2E6', '20150413', '20151010', '2015042103130281184081', '20150429', '20150520', '17535441', '20150408', '20150508', '385052015', '20150422', '20150721', '179FB43D29FAA2E6', '20150413', '20151010', '002797019', '20150408', '20150508', '02', '4º ADITIVO', 0, NULL, 5, '92429822015', '20150415', '20151011', '003/2011', 1, '0', 0);
INSERT INTO contrato VALUES (1214, '7896,00', '20150626', 'PRESTAÇÃO DE SERVIÇO DE TÉCNICO ESPECIALIZADO PARA PROMOVER A CERTIFICAÇÃO DO SISTEMA DE GESTÃO DA QUALIDADE TENDO COMO BASE OS PADRÕES NORMATIVOS DA NBR ISO 9001:2008 E SISTEMA DE GESTÃO AMBIENTAL, COM BASE NA NORMA NBR ISO 14001:2004.', '018/2015', '001', '2', '01950467000165', 'TUV RHEINLAND DO BRASIL LTDA', '20180626', '33076', '20150707', 'N', ' ', '20150427', '20151024', '2015052904092047162840', '20150601', '20150627', '1503000066580', '20150303', '20150903', '8282015', '20150416', '20151231', ' ', '20150427', '20151024', '10949362015', '20150523', '20151231', '01', 'TC 007/2015', 0, NULL, 6, '897634142015', '20150330', '20150925', '007/2015', 3, '0', 0);
INSERT INTO contrato VALUES (1204, '20296,74', '20150224', 'SERVIÇOS ESPECIALIZADOS DE AUDITORIA INDEPENDENTE DAS DEMONSTRAÇÕES FINANCEIRAS DA CIAMA', '006/2010', '001', '2', '07376826000107', 'FERNANDES AUDITORES INDEPENDENTES S/S', '20160224', '32995', '20150305', 'N', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', '02', '5º ADITIVO', 0, NULL, 2, ' ', '00000000', '00000000', '004/2010', 1, '0', 0);
INSERT INTO contrato VALUES (1198, '4071,71', '20141230', 'LOCAÇÃO DO IMÓVEL QUE SERVE DE SEDE DAS ATIVIDADES DO ESCRITÓRIO REGIONAL DO PROJETO DE DESENVOLVIMENTO SUSTENTÁVEL E SERVIÇOS BÁSICOS DO ALTO SOLIMÕES.', '001/2012', '001', '1', '25076990278', 'MARIA APARECIDA CARVALHO DA CRUZ', '20151231', '32954', '20150105', 'N', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '19850131', '00000000', '02', '3 ADITIVO', 1, '2015-08-29 12:53:09.784', 1, ' ', '00000000', '00000000', '0', 3, '0', 201501);
INSERT INTO contrato VALUES (1200, '10900,00', '20150129', 'SERVIÇOS DE INSTALAÇÃO DE AR CONDICIONADOS SPLIT 12.000 BTU''S COM MATERIAL/PEÇAS INCLUSOS, PARA A CLÍNICA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA-AM.', '008/2015', '001', '2', '09493146000190', 'A.M.S. GARCIA', '20150212', '32978', '20150206', 'N', ' ', '00000000', '00000000', '2014122909102529071840', '20141229', '20150127', '17082447', '20150122', '20150221', '46314', '20141202', '20150302', ' ', '20141223', '20150621', ' ', '00000000', '00000000', '20', 'OES 003/2015', 1, '2015-08-29 12:53:09.784', 1, '674122742014', '20141106', '20150504', 'OES 003/2015', 3, '0', 201501);
INSERT INTO contrato VALUES (1199, '21890,00', '20150105', 'SERVIÇOS DE AUDITORIA EXTERNA DO PROJETO DE DESENVOLVIMENTO SUSTENTÁVEL E SERVIÇOS BÁSICOS DO ALTO SOLIMÕES.', '056/2014', '001', '2', '32646846000190', 'RAAC AUDITORES E CONSULTORES INDEPENDENTES S/S', '20150120', '32954', '20150105', 'N', '21649201488888846', '20140820', '20150216', '2014111702343264011119', '20141205', '20141216', '20141587509', '20141204', '20150204', '2284471', '20141205', '20150305', ' ', '20141021', '20150419', ' ', '00000000', '00000000', '01', 'TC 005/2015', 1, '2015-08-29 12:53:09.784', 1, ' ', '00000000', '00000000', 'TC 005/2015', 3, '0', 201501);
INSERT INTO contrato VALUES (1203, '30000,00', '20150120', 'AQUISIÇÃO DE MATERIAIS PARA ENERGIZAÇÃO DE BOMBAS DE SUCÇÃO DA ESTAÇÃO DE TRATAMENTO DE ÁGUA - ETA DO MUNICÍPIO DE TABATINGA-AM.', '006/2015', '001', '2', '02887535000151', 'B.A. ELÉTRICA LTDA', '20150220', '32897', '20150223', 'N', ' ', '00000000', '00000000', '2015010506432216809655', '20150113', '20150203', '17017408', '20150113', '20150212', '1156112014', '20141117', '20150215', '6E743DA8C20A415C', '20150113', '20150712', ' ', '00000000', '00000000', '01', ' TC 004/2015', 1, '2015-08-29 12:53:09.784', 1, '687803312014', '20141117', '20150515', 'TC 004/2015', 3, '0', 201501);
INSERT INTO contrato VALUES (1197, '0,00', '20141230', 'PRESTAÇÃO DE SERVIÇOS NAS ÁREAS MÉDICAS, ODONTOLÓGICAS DE APOIO AO DIAGNÓSTICO', '28/2013', '001', '2', '03766415000169', 'SESI-SERVIÇO SOCIAL DA INDUSTRIA', '20160101', '32954', '20150105', 'N', ' ', '00000000', '00000000', '2014122907110847935694', '20150116', '20150127', '16791797', '20141203', '20150102', '1028612014', '20141008', '20150106', '84B1558CBC2D9050', '20141202', '20150531', ' ', '00000000', '00000000', '02', '1 ADITIVO', 1, '2015-08-29 12:53:09.784', 1, '641841592014', '20141008', '20150405', '0', 3, '0', 201501);
INSERT INTO contrato VALUES (1202, '27744,00', '20150128', 'AQUISIÇÃO DE MATERIAIS PARA CONSTRUÇÃO PARA REFORÇO NA LAJE PRÉ-MOLDADA TRELIÇADA E ACABAMENTO DA SALA DE ESTABILIZAÇÃO AVANÇADA DO HOSPITAL DE GUARNIÇÃO DO MUNICÍPIO DE TABATINGA-AM.', '010/2015', '001', '2', '03499782000143', 'D. R. MORENO', '20150204', '32977', '20150205', 'N', '223512014-88888782', '20150829', '20150225', '2015011206212657919155', '20150122', '20150210', '17079764', '20150122', '20150221', '46514', '20141202', '20150302', ' ', '00000000', '00000000', ' ', '00000000', '00000000', '01', 'OC 001/2015', 1, '2015-08-29 12:53:09.784', 1, '640581542014', '20141007', '20150404', 'OC 001/2015', 3, '0', 201501);
INSERT INTO contrato VALUES (1201, '15885,00', '20150128', 'AQUISIÇÃO DE MATERIAL PARA CONSTRUÇÃO DE CANALETA E RIP RAP PARA DISSIPAÇÃO DAS ÁGUAS DE LAVAGEM DOS FILTROS NA ESTAÇÃO DE TRATAMENTO DE ÁGUA NO MUNICÍPIO-AM.', '011/2015', '001', '2', '03499782000143', 'D. R. MORENO', '20150211', '32977', '20150205', 'N', '223512014-88888782', '20150829', '20150225', '2015011206212657919155', '20150126', '20150210', '17079764', '20150122', '20150221', '46514', '20141202', '20150302', ' ', '00000000', '00000000', ' ', '00000000', '00000000', '01', 'OC 002/2015', 1, '2015-08-29 12:53:09.784', 1, '640581542014', '20141007', '20150404', 'OC 002/2015', 3, '0', 201501);


--
-- Data for Name: contrato_empenho; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: contrato_empenho_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('contrato_empenho_id_seq', 678, true);


--
-- Name: contrato_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('contrato_id_seq', 1214, true);


--
-- Data for Name: convenio; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO convenio VALUES (20, '0', 'N', '10º TA CV 048-10', '0,00', '001', '20150105', 'CONSTRUÇÃO DE RESERVATÓRIO ELEVADO METÁLICO PARA DISTRIBUIÇÃO DE ÁGUA', '20150528', '8666', '19930621', '32959', '20150112', '08', 1, '2015-07-31 11:47:13.212', 1);
INSERT INTO convenio VALUES (23, '0', 'N', '10º TA CV 068-10', '0,00', '001', '20150204', 'CONSTRUÇÃO DO GINÁSIO POLIESPORTIVO COBERTO', '20150505', '8666', '19930621', '32977', '20150205', '08', 1, '2015-07-31 11:47:13.212', 1);
INSERT INTO convenio VALUES (22, '0', 'N', '10º TA CV 004-10', '0,00', '001', '20150108', 'CONSTRUÇÃO DA COMUNIDADE DO CUIA', '20150408', '8666', '19930621', '32977', '20150205', '08', 1, '2015-07-31 11:47:13.212', 1);
INSERT INTO convenio VALUES (21, '0', 'N', '10º TA CV 050-10', '0,00', '001', '20150105', 'CAPTAÇÃO, RESERVAÇÃO E DISTRIBUIÇÃO DE ÁGUA POTÁVEL EM PARTE DO NOVO LOTEAMENTO', '20150528', '8666', '19930621', '32959', '20150112', '08', 1, '2015-07-31 11:47:13.212', 1);


--
-- Data for Name: convenio_empenho; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: convenio_empenho_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('convenio_empenho_id_seq', 11, true);


--
-- Name: convenio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('convenio_id_seq', 23, true);


--
-- Data for Name: cotacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cotacao VALUES (25, 'E', '2', '07174273000100', '1', '0,00', 'P', '0,00', '0', 1, '2015-08-18 11:13:46.723', 15, 1, '0');
INSERT INTO cotacao VALUES (9, 'E', '2', '32646846000190', '1', '21890,00', 'V', '0,01', '0', 1, '2015-08-18 11:13:46.723', 10, 1, '0');
INSERT INTO cotacao VALUES (10, 'E', '2', '04063643000135', '1', '25000,00', 'P', '0,01', '0', 1, '2015-08-18 11:13:46.723', 10, 1, '0');
INSERT INTO cotacao VALUES (11, 'E', '2', '35330125000164', '1', '31850,00', 'P', '0,01', '0', 1, '2015-08-18 11:13:46.723', 10, 1, '0');
INSERT INTO cotacao VALUES (12, 'E', '2', '09493146000190', '1', '10900,00', 'V', '0,01', '0', 1, '2015-08-18 11:13:46.723', 11, 1, '0');
INSERT INTO cotacao VALUES (14, 'E', '2', '10622067000111', '1', '11150,00', 'P', '0,01', '0', 1, '2015-08-18 11:13:46.723', 11, 1, '0');
INSERT INTO cotacao VALUES (13, 'E', '2', '13735149000160', '1', '12320,00', 'P', '0,01', '0', 1, '2015-08-18 11:13:46.723', 11, 1, '0');
INSERT INTO cotacao VALUES (15, 'E', '2', '04760986000159', '1', '16877,00', 'P', '0,05', '0', 1, '2015-08-18 11:13:46.723', 12, 1, '0');
INSERT INTO cotacao VALUES (16, 'E', '2', '03499782000143', '1', '15885,00', 'V', '0,05', '0', 1, '2015-08-18 11:13:46.723', 12, 1, '0');
INSERT INTO cotacao VALUES (17, 'E', '2', '07174273000100', '1', '16340,00', 'P', '0,05', '0', 1, '2015-08-18 11:13:46.723', 12, 1, '0');
INSERT INTO cotacao VALUES (19, 'E', '2', '03499782000143', '1', '27744,20', 'V', '107', '0', 1, '2015-08-18 11:13:46.723', 13, 1, '0');
INSERT INTO cotacao VALUES (20, 'E', '2', '04418320000117', '1', '41610,00', 'P', '0,61', '0', 1, '2015-08-18 11:13:46.723', 14, 1, '0');
INSERT INTO cotacao VALUES (21, 'E', '2', '04343480000144', '1', '45702,96', 'P', '0,61', '0', 1, '2015-08-18 11:13:46.723', 14, 1, '0');
INSERT INTO cotacao VALUES (22, 'E', '2', '02887535000151', '1', '30000,00', 'V', '0,61', '0', 1, '2015-08-18 11:13:46.723', 14, 1, '0');
INSERT INTO cotacao VALUES (23, 'E', '2', '04760986000159', '1', '0,00', 'P', '0,00', '0', 1, '2015-08-18 11:13:46.723', 15, 1, '0');
INSERT INTO cotacao VALUES (24, 'E', '2', '03499782000143', '1', '0,00', 'P', '0,00', '0', 1, '2015-08-18 11:13:46.723', 15, 1, '0');
INSERT INTO cotacao VALUES (18, 'E', '2', '10770606000160', '1', '19650,00', 'P', '0,05', '0', 1, '2015-08-18 11:13:46.723', 12, 1, '0');
INSERT INTO cotacao VALUES (26, 'E', '2', '07913249000137', '1', '94501,03', 'V', '0,01', '0', 0, NULL, 16, 2, '1');
INSERT INTO cotacao VALUES (28, 'E', '2', '07695558000188', '1', '43957,55', 'V', '0,17', '0', 0, NULL, 18, 2, '1');
INSERT INTO cotacao VALUES (29, 'E', '2', '34484741000107', '1', '45498,00', 'P', '0,17', '0', 0, NULL, 18, 2, '1');
INSERT INTO cotacao VALUES (27, 'E', '2', '02800411000197', '1', '38490,00', 'V', '0,04', '0', 0, NULL, 17, 2, '1');
INSERT INTO cotacao VALUES (31, 'P', '2', '10181964000137', '1', '0,50', 'P', '0,01', '0', 0, NULL, 19, 4, '1');
INSERT INTO cotacao VALUES (30, 'P', '2', '34516450000153', '1', '1,00', 'V', '0,01', '0', 0, NULL, 19, 4, '1');
INSERT INTO cotacao VALUES (33, 'E', '2', '02878815000101', '2', '792,00', 'V', '2,00', '0', 0, NULL, 20, 4, '2');
INSERT INTO cotacao VALUES (32, 'E', '2', '02878815000101', '1', '90,00', 'V', '2,00', '0', 0, NULL, 20, 4, '1');
INSERT INTO cotacao VALUES (37, 'E', '2', '34586099000177', '2', '1496,00', 'P', '2,00', '0', 0, NULL, 20, 4, '2');
INSERT INTO cotacao VALUES (36, 'E', '2', '34586099000177', '1', '210,00', 'P', '2,00', '0', 0, NULL, 20, 4, '1');
INSERT INTO cotacao VALUES (34, 'E', '2', '09391365000169', '1', '118,80', 'P', '2,00', '0', 0, NULL, 20, 4, '1');
INSERT INTO cotacao VALUES (35, 'E', '2', '09391365000169', '2', '841,50', 'P', '2,00', '0', 0, NULL, 20, 4, '2');
INSERT INTO cotacao VALUES (38, 'E', '2', '01950467000165', '1', '7896,00', 'V', '1,00', '0', 0, NULL, 21, 5, '1');
INSERT INTO cotacao VALUES (39, 'E', '2', '42174805000282', '1', '15400,00', 'P', '1,00', '0', 0, NULL, 21, 6, '1');
INSERT INTO cotacao VALUES (40, 'E', '2', '06066523000117', '1', '13985,67', 'P', '1,00', '0', 0, NULL, 21, 6, '1');


--
-- Name: cotacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cotacao_id_seq', 40, true);


--
-- Data for Name: esfera_do_conveniado; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO esfera_do_conveniado VALUES (1, '1', 'Federal');
INSERT INTO esfera_do_conveniado VALUES (2, '2', 'Estadual');
INSERT INTO esfera_do_conveniado VALUES (3, '3', 'Municipal');
INSERT INTO esfera_do_conveniado VALUES (4, '4', 'ONGs');
INSERT INTO esfera_do_conveniado VALUES (5, '5', 'Outros');


--
-- Name: esfera_do_conveniado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('esfera_do_conveniado_id_seq', 5, true);


--
-- Data for Name: item_adesao_ata; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: item_adesao_ata_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('item_adesao_ata_id_seq', 1, true);


--
-- Data for Name: item_licitacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO item_licitacao VALUES (12, '1', 'AUDITORIA EXTERNA DO PROJETO DE DESENVOLVIMENTO SUSTENTÁVEL E SERVIÇOS BÁSICOS DO ALTO SOLIMÕES', '1,00', '20141230', '20150105', '0', 1, '2015-08-18 11:48:07.147', 10, 1, '0', '01', '0');
INSERT INTO item_licitacao VALUES (13, '1', 'SERVIÇOS DE INSTALAÇÃO DE AR CONDICIONADOS SPLIT 12.000 BTU''S COM MATERIAL/PEÇAS INCLUSOS, PARA A CLÍNICA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA-AM.', '1,00', '20150129', '20150206', '0', 1, '2015-08-18 11:48:07.147', 11, 1, '0', '01', '0');
INSERT INTO item_licitacao VALUES (16, '1', 'AQUISIÇÃO DE MATERIAIS PARA ENERGIZAÇÃO DE BOMBAS DE SUCÇÃO DA ESTAÇÃO DE TRATAMENTO DE ÁGUA - ETA DO MUNICÍPIO DE TABATINGA-AM.', '61,00', '20150116', '20150223', '0', 1, '2015-08-18 11:48:07.147', 14, 1, '0', '01', '0');
INSERT INTO item_licitacao VALUES (15, '1', 'AQUISIÇÃO DE MATERIAIS PARA CONSTRUÇÃO PARA REFORÇO NA LAJE PRÉ-MOLDADA TRELIÇADA E ACABAMENTO DA SALA DE ESTABILIZAÇÃO AVANÇADA DO HOSPITAL DE GUARNIÇÃO DO MUNICÍPIO DE TABATINGA-AM.', '107,00', '20150128', '20150205', '0', 1, '2015-08-18 11:48:07.147', 13, 1, '0', '01', '0');
INSERT INTO item_licitacao VALUES (18, '1', 'AQUISIÇÃO DE MATERIAL PARA CONSTRUÇÃO DE CANALETA E RIP RAP PARA DISSIPAÇÃO DAS ÁGUAS DE LAVAGEM DOS FILTROS NA ESTAÇÃO DE TRATAMENTO DE ÁGUA NO MUNICÍPIO-AM.', '5,00', '20150128', '20150205', '0', 1, '2015-08-18 11:48:07.147', 12, 1, 'UND', '01', '0');
INSERT INTO item_licitacao VALUES (17, '1', 'AQUISIÇÃO DE MATERIAIS PARA CONSTRUÇÃO PARA REFORÇO NA LAJE PRÉ-MOLDADA TRELIÇADA E ACABAMENTO DA SALA DE ESTABILIZAÇÃO AVANÇADA DO HOSPITAL DE GUARNIÇÃO DO MUNICÍPIO DE TABATINGA-AM.', '107,00', '20150115', '20150115', '0', 1, '2015-08-18 11:48:07.147', 15, 1, '0', '03', '0');
INSERT INTO item_licitacao VALUES (19, '1', 'CONFECÇÃO E MONTAGEM DAS ESQUADRIAS METÁLICAS E ACESSÓRIOS NECESSÁRIOS PARA SALA DE ESTABILIZAÇÃO E CLÍNICA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA-AM.', '0,07', '20150205', '20150205', '0', 0, NULL, 16, 2, 'M2', '01', '1');
INSERT INTO item_licitacao VALUES (21, '1', 'AQUISIÇÃO DE EQUIPAMENTOS PARA PISCINA TERAPÊUTICA DE FISIOTERAPIA E AQUISIÇÃO DE EXPURGO PARA O HGUT.', '0,17', '20150205', '20150205', '0', 0, NULL, 18, 2, 'UND', '01', '1');
INSERT INTO item_licitacao VALUES (20, '1', 'FORNECIMENTO, INSTALAÇÃO E MONTAGEM DA AMPLIAÇÃO DA REDE CANALIZADA DE GASES MEDICINAIS COMPOSTA DE OXIGÊNIO, AR COMPRIMIDO E VÁCUO CLÍNICO DO HGUT', '0,04', '20150205', '20150205', '0', 0, NULL, 17, 2, 'UND', '01', '1');
INSERT INTO item_licitacao VALUES (22, '1', 'PRESTAÇÃO DE SERVIÇOS DE FORNECIMENTOS DE BILHETES E ORDENS DE PASSAGENS (PTA), AÉREAS REGIONAIS, NACIONAIS E INTERNACIONAIS PARA', '0,01', '20150423', '20150423', '0', 0, NULL, 19, 4, 'SERVIÇO', '01', '1');
INSERT INTO item_licitacao VALUES (23, '1', 'AQUISIÇÃO DE PLACAS INDICATIVAS EM PVC PARA SALA DE ESTABILIZAÇÃO E SALA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA - AM', '0,02', '20150413', '20150413', '0', 0, NULL, 20, 4, 'UND', '01', '1');
INSERT INTO item_licitacao VALUES (24, '2', 'AQUISIÇÃO DE PLACAS INDICATIVAS EM PVC PARA SALA DE ESTABILIZAÇÃO E SALA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA - AM', '0,02', '20150413', '20150413', '0', 0, NULL, 20, 4, 'UND', '01', '2');
INSERT INTO item_licitacao VALUES (25, '1', 'PRESTAÇÃO DE SERVIÇO DE TÉCNICO ESPECIALIZADO PARA PROMOVER A CERTIFICAÇÃO DO SISTEMA DE GESTÃO DA QUALIDADE TENDO COMO BASE OS PADRÕES NORMATIVOS DA NBR ISO 9001:2008 E SISTEMA DE GESTÃO AMBIENTAL, COM BASE NA NORMA NBR ISO 14001:2004.', '1,00', '20150626', '20150626', '0', 0, NULL, 21, 6, 'SERVIÇO', '01', '1');
INSERT INTO item_licitacao VALUES (26, '1', 'PRESTAÇÃO DE SERVIÇOS DE FORNECIMENTO DE BILHETES E ORDENS DE PASSAGENA (PTA), AÉREAS REGIONAIS, NACIONAIS E INTERNACIONAIS PARA A CIAMA', '1,00', '0       ', '0       ', '0', 0, NULL, 22, 3, 'SERVIÇO', '03', '1');
INSERT INTO item_licitacao VALUES (27, '1', 'PRESTAÇÃO DE SERVIÇOS DE FORNECIMENTO DE BILHETES E ORDENS DE PASSAGENA (PTA), AÉREAS REGIONAIS, NACIONAIS E INTERNACIONAIS PARA A CIAMA', '1,00', '0       ', '0       ', '0', 0, NULL, 23, 3, 'SERVIÇO', '03', '1');


--
-- Name: item_licitacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('item_licitacao_id_seq', 27, true);


--
-- Data for Name: licitacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO licitacao VALUES (13, '010/2015', '0', '20150120', '01', 'AQUISIÇÃO DE MATERIAIS PARA CONSTRUÇÃO PARA REFORÇO NA LAJE PRÉ-MOLDADA TRELIÇADA E ACABAMENTO DA SALA DE ESTABILIZAÇÃO AVANÇADA DO HOSPITAL DE GUARNIÇÃO DO MUNICÍPIO DE TABATINGA-AM.', '29450,00', 'CC 006/2015', 'I', 1, '2015-08-18 10:32:46.462', 1);
INSERT INTO licitacao VALUES (11, '008/2015', '0', '20150119', '08', 'SERVIÇOS DE INSTALAÇÃO DE AR CONDICIONADOS SPLIT 12.000 BTU''S COM MATERIAL/PEÇAS INCLUSOS, PARA A CLÍNICA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA-AM.', '13495,91', 'DL', 'I', 1, '2015-08-18 10:32:46.462', 1);
INSERT INTO licitacao VALUES (14, '006/2015', '0', '20150105', '01', 'AQUISIÇÃO DE MATERIAIS PARA ENERGIZAÇÃO DE BOMBAS DE SUCÇÃO DA ESTAÇÃO DE TRATAMENTO DE ÁGUA - ETA DO MUNICÍPIO DE TABATINGA-AM.', '35000,00', 'CC 004/2015', 'I', 1, '2015-08-18 10:32:46.462', 1);
INSERT INTO licitacao VALUES (12, '011/2015', '0', '20150120', '08', 'AQUISIÇÃO DE MATERIAL PARA CONSTRUÇÃO DE CANALETA E RIP RAP PARA DISSIPAÇÃO DAS ÁGUAS DE LAVAGEM DOS FILTROS NA ESTAÇÃO DE TRATAMENTO DE ÁGUA NO MUNICÍPIO-AM.', '16000,00', 'DL', 'I', 1, '2015-08-18 10:32:46.462', 1);
INSERT INTO licitacao VALUES (10, '56/2014', '0', '20141203', '01', 'AUDITORIA EXTERNA DO PROJETO DE DESENVOLVIMENTO SUSTENTÁVEL E SERVIÇOS BÁSICOS DO ALTO SOLIMÕES.', '31850,00', 'CC 015/2014', 'I', 1, '2015-08-18 10:32:46.462', 1);
INSERT INTO licitacao VALUES (15, '001/2015', '0', '20150107', '01', 'AQUISIÇÃO DE MATERIAIS PARA CONSTRUÇÃO PARA REFORÇO NA LAJE PRÉ-MOLDADA TRELIÇADA E ACABAMENTO DA SALA DE ESTABILIZAÇÃO AVANÇADA DO HOSPITAL DE GUARNIÇÃO DO MUNICÍPIO DE TABATINGA-AM.', '29450,00', 'CC 001/2015', 'I', 1, '2015-08-18 10:32:46.462', 1);
INSERT INTO licitacao VALUES (16, '002/2015', '32960', '20150113', '01', 'CONFECÇÃO E MONTAGEM DAS ESQUADRIAS METÁLICAS E TODOS OS ACESSÓRIOS NECESSÁRIOS DA SALA DE ESTABILIZAÇÃO E CLÍNICA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA-AM', '94503,33', 'CC 002/2015', 'I', 0, NULL, 2);
INSERT INTO licitacao VALUES (18, '009/2015', '32969', '20150126', '01', 'AQUISIÇÃO DE EQUIPAMENTOS PARA PISCINA TERAPÊUTICA DE FISIOTERAPIA E AQUISIÇÃO DE EXPURGO PARA O HGUT.', '60977,66', 'CC 005/2015', 'I', 0, NULL, 2);
INSERT INTO licitacao VALUES (17, '005/2015', '32966', '20150121', '01', 'FORNECIMENTO, INSTALAÇÃO E MONTAGEM DA AMPLIAÇÃO DA REDE CANALIZADA DE GASES MEDICINAIS COMPOSTA DE OXIGÊNIO, AR COMPRIMIDO E VÁCUO CLÍNICO DO HGUT', '47865,96', 'CC 003/2015', 'I', 0, NULL, 2);
INSERT INTO licitacao VALUES (19, '013/2015', '33014', '20150401', '01', 'PRESTAÇÃO DE SERVIÇOS DE FORNECIMENTO DE BILHETES E ORDENS DE PASSAGENA (PTA), AÉREAS REGIONAIS, NACIONAIS E INTERNACIONAIS PARA A CIAMA', '79980,00', 'CC 008/2015', 'I', 0, NULL, 4);
INSERT INTO licitacao VALUES (20, '015/2015', '0', '20150407', '08', 'AQUISIÇÃO DE PLACAS INDICATIVAS EM PVC PARA SALA DE ESTABILIZAÇÃO E SALA DE FISIOTERAPIA DO HOSPITAL DE GUARNIÇÃO DE TABATINGA - AM', '882,00', 'DL', 'I', 0, NULL, 4);
INSERT INTO licitacao VALUES (21, '018/2015', '0', '20150611', '08', 'PRESTAÇÃO DE SERVIÇO DE TÉCNICO ESPECIALIZADO PARA PROMOVER A CERTIFICAÇÃO DO SISTEMA DE GESTÃO DA QUALIDADE TENDO COMO BASE OS PADRÕES NORMATIVOS DA NBR ISO 9001:2008 E SISTEMA DE GESTÃO AMBIENTAL, COM BASE NA NORMA NBR ISO 14001:2004.', '14000,00', 'DL', 'I', 0, NULL, 6);
INSERT INTO licitacao VALUES (23, '012/2015', '0', '20150318', '01', 'PRESTAÇÃO DE SERVIÇOS DE FORNECIMENTO DE BILHETES E ORDENS DE PASSAGENA (PTA), AÉREAS REGIONAIS, NACIONAIS E INTERNACIONAIS PARA A CIAMA', '79980,00', 'CC 007/2015', 'I', 0, NULL, 3);
INSERT INTO licitacao VALUES (22, '007/2015', '0', '20150302', '01', 'PRESTAÇÃO DE SERVIÇOS DE FORNECIMENTO DE BILHETES E ORDENS DE PASSAGENA (PTA), AÉREAS REGIONAIS, NACIONAIS E INTERNACIONAIS PARA A CIAMA', '79980,00', 'CC 005/2015', 'I', 0, NULL, 3);


--
-- Data for Name: licitacao_dotacao; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: licitacao_dotacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('licitacao_dotacao_id_seq', 6, true);


--
-- Name: licitacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('licitacao_id_seq', 23, true);


--
-- Data for Name: meses; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO meses VALUES (1, 'Janeiro');
INSERT INTO meses VALUES (2, 'Fevereiro');
INSERT INTO meses VALUES (3, 'Março');
INSERT INTO meses VALUES (4, 'Abril');
INSERT INTO meses VALUES (5, 'Maio');
INSERT INTO meses VALUES (6, 'Junho');
INSERT INTO meses VALUES (7, 'Julho');
INSERT INTO meses VALUES (8, 'Agosto');
INSERT INTO meses VALUES (9, 'Setembro');
INSERT INTO meses VALUES (10, 'Outubro');
INSERT INTO meses VALUES (11, 'Novembro');
INSERT INTO meses VALUES (12, 'Dezembro');


--
-- Name: meses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('meses_id_seq', 12, true);


--
-- Data for Name: modalidade_de_licitacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO modalidade_de_licitacao VALUES (1, '00', 'Dispensa p/ Compra e Serviços');
INSERT INTO modalidade_de_licitacao VALUES (2, '01', 'Convite p/ Compras e Serviços');
INSERT INTO modalidade_de_licitacao VALUES (3, '02', 'Convite p/ Obras e Serviços de Engenhari');
INSERT INTO modalidade_de_licitacao VALUES (4, '03', 'Tomada de Preços p/ Compras e Serviços');
INSERT INTO modalidade_de_licitacao VALUES (5, '04', 'Tomada de Preços p/ Obras e Serviços Eng');
INSERT INTO modalidade_de_licitacao VALUES (6, '05', 'Concorrência p/ Compras e Serviços');
INSERT INTO modalidade_de_licitacao VALUES (7, '06', 'Concorrência p/ Obras e Serviços de Eng');
INSERT INTO modalidade_de_licitacao VALUES (8, '07', 'Leilão');
INSERT INTO modalidade_de_licitacao VALUES (9, '08', 'Dispensa de Licitação');
INSERT INTO modalidade_de_licitacao VALUES (10, '09', 'Inexigibilidade de Licitação');
INSERT INTO modalidade_de_licitacao VALUES (11, '10', 'Concurso');
INSERT INTO modalidade_de_licitacao VALUES (12, '11', 'Pregão Eletrônico');
INSERT INTO modalidade_de_licitacao VALUES (14, '13', 'Concorrência para concessão adm. de uso');
INSERT INTO modalidade_de_licitacao VALUES (13, '12', 'Pregão Presencial');
INSERT INTO modalidade_de_licitacao VALUES (15, '14', 'Concorrência para concessão de dir. uso');
INSERT INTO modalidade_de_licitacao VALUES (16, '15', 'Anulada');
INSERT INTO modalidade_de_licitacao VALUES (17, '16', 'Deserta');
INSERT INTO modalidade_de_licitacao VALUES (18, '17', 'Fracassada');
INSERT INTO modalidade_de_licitacao VALUES (19, '18', 'Internacional');


--
-- Name: modalidade_de_licitacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('modalidade_de_licitacao_id_seq', 19, true);


--
-- Data for Name: movcon_final; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: movcon_final_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('movcon_final_id_seq', 1, true);


--
-- Data for Name: movcon_inicial; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO movcon_inicial VALUES (22, 37, '1', '970.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (115, 130, '1', '0', '508.871,02', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (39, 54, '1', '329.349,38', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (40, 55, '1', '989.983,07', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (41, 56, '1', '188.319,86', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (42, 57, '1', '999.999,99', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (43, 58, '1', '1.227.050,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (44, 59, '1', '999.100,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (45, 60, '1', '999.100,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (46, 61, '1', '1.000.285,16', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (47, 62, '1', '120.763,49', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (48, 63, '1', '499.629,19', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (49, 64, '1', '1.453.742,90', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (50, 65, '1', '1.452.090,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (51, 66, '1', '999.099,06', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (52, 67, '1', '1.002.572,45', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (53, 68, '1', '999.999,99', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (54, 69, '1', '1.067.000,01', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (55, 70, '1', '670.357,45', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (56, 71, '1', '207.262,63', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (57, 72, '1', '671.450,32', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (58, 73, '1', '269.660,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (59, 74, '1', '120.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (60, 75, '1', '374.825,20', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (61, 76, '1', '311.065,80', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (62, 77, '1', '892.646,90', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (63, 78, '1', '1.845.360,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (64, 79, '1', '599.452,22', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (65, 80, '1', '1.453.719,60', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (66, 81, '1', '799.900,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (67, 82, '1', '913.063,45', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (68, 83, '1', '384.982,66', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (69, 84, '1', '1.454.515,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (70, 85, '1', '92.998,93', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (71, 86, '1', '92.998,39', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (72, 87, '1', '92.998,93', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (73, 88, '1', '92.998,93', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (81, 95, '1', '1.061.642,30', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (82, 96, '1', '820.709,56', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (83, 97, '1', '5.624.994,10', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (84, 98, '1', '2.510.263,97', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (85, 99, '1', '1.000.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (86, 100, '1', '1.451.120,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (87, 101, '1', '148.146,50', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (88, 102, '1', '1.000.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (89, 103, '1', '50.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (90, 104, '1', '271.540,24', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (91, 105, '1', '53.964,69', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (92, 106, '1', '184.300,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (93, 107, '1', '198.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (94, 108, '1', '133.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (95, 109, '1', '1.500.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (96, 110, '1', '1.000.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (97, 111, '1', '500.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (98, 112, '1', '200.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (99, 113, '1', '148.520,10', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (100, 114, '1', '540.936,60', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (101, 115, '1', '437.336,73', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (102, 116, '1', '446.567,72', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (103, 117, '1', '2.000.511,97', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (104, 118, '1', '11.149.817,37', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (105, 119, '1', '6.500.122,55', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (106, 120, '1', '999.113,20', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (107, 121, '1', '28.076.840,82', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (108, 122, '1', '39.232.681,27', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (109, 123, '1', '2.416.731,94', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (110, 124, '1', '2.715.101,10', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (111, 125, '1', '2.070.538,16', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (112, 126, '1', '508.871,02', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (113, 127, '1', '1.600.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (114, 128, '1', '14.860.994,11', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (116, 131, '1', '0', '1.600.000,00', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (117, 132, '1', '16.673.394,57', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (118, 133, '1', '10.390,01', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (119, 134, '1', '1.320,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (120, 135, '1', '162.950,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (121, 136, '1', '283.760,45', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (122, 137, '1', '454.598,56', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (123, 138, '1', '7.702,01', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (124, 139, '1', '175.077,05', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (125, 140, '1', '15.320,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (126, 141, '1', '80.683,35', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (127, 142, '1', '15.816,20', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (128, 143, '1', '15.248,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (129, 144, '1', '888.316,56', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (130, 145, '1', '148.592,41', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (131, 146, '1', '607.667,07', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (132, 147, '1', '0', '1.320,00', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (133, 148, '1', '0', '439.997,33', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (134, 149, '1', '0', '233.979,14', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (135, 150, '1', '0', '6.914,09', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (136, 151, '1', '0', '103.057,04', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (137, 152, '1', '0', '15.320,00', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (138, 153, '1', '0', '80.683,35', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (139, 154, '1', '0', '15.248,00', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (140, 155, '1', '0', '175.077,05', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (141, 156, '1', '0', '588.722,41', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (142, 157, '1', '0', '15.816,20', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (143, 158, '1', '0', '148.592,41', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (144, 159, '1', '0', '978.838,74', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (145, 160, '1', '0', '5.628,52', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (146, 161, '1', '0', '39.428,40', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (147, 162, '1', '0', '393,60', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (148, 163, '1', '0', '5.375,89', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (1, 6, '1', '791,45', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (2, 7, '1', '322.968,09', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (3, 9, '1', '2.212,16', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (4, 12, '1', '61.278,70', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (5, 13, '1', '517,24', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (7, 19, '1', '2.595.724,05', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (8, 20, '1', '1.075.301,97', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (9, 21, '1', '10.477,02', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (10, 22, '1', '51.657,71', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (11, 23, '1', '2.677.495,97', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (12, 28, '1', '2.992,29', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (13, 29, '1', '636.970,11', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (14, 30, '1', '27.116,99', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (15, 31, '1', '38.803,67', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (16, 32, '1', '50.988,24', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (17, 33, '1', '960.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (18, 34, '1', '2.230.999,10', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (19, 35, '1', '1.060.058,06', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (20, 36, '1', '999.100,02', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (21, 37, '1', '970.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (23, 38, '1', '300.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (24, 39, '1', '300.000,01', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (25, 40, '1', '400.000,02', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (26, 41, '1', '477.427,64', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (27, 42, '1', '1.000.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (28, 43, '1', '1.720.000,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (29, 44, '1', '57.132,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (30, 45, '1', '3.590.850,87', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (31, 46, '1', '1.004.867,36', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (32, 47, '1', '966.440,61', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (33, 48, '1', '242.500,00', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (34, 49, '1', '992.707,62', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (35, 50, '1', '1.808.745,84', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (36, 51, '1', '524.854,18', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (37, 52, '1', '243.085,19', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (38, 53, '1', '189.224,87', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (74, 89, '1', '110.134,46', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (75, 90, '1', '110.134,46', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (76, 91, '1', '110.134,46', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (77, 92, '1', '494.321,13', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (78, 93, '1', '711.540,73', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (79, 94, '1', '413.180,10', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (80, 94, '1', '413.180,10', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (149, 164, '1', '0', '260,44', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (150, 165, '1', '0', '1.636,63', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (151, 166, '1', '0', '1.577,01', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (152, 167, '1', '0', '15.227,12', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (153, 168, '1', '0', '2.292,66', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (154, 169, '1', '0', '1.168,50', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (155, 170, '1', '0', '2.350,00', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (156, 171, '1', '0', '666,00', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (157, 172, '1', '0', '323,55', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (158, 173, '1', '0', '1.296,00', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (159, 174, '1', '0', '1.470,56', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (160, 175, '1', '0', '4.020,50', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (161, 176, '1', '0', '82.825,02', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (162, 177, '1', '0', '41.040,00', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (163, 180, '1', '0', '52.300,25', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (164, 181, '1', '0', '708,06', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (165, 182, '1', '0', '62.708,77', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (166, 183, '1', '0', '208,84', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (167, 184, '1', '0', '938,84', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (168, 185, '1', '0', '3.824.872,82', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (169, 186, '1', '0', '40.999,95', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (170, 187, '1', '0', '444.972,24', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (171, 188, '1', '0', '256.000.000,00', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (172, 189, '1', '12.228.172,78', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (173, 190, '1', '46.007.901,80', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (174, 191, '1', '1.130.253,57', '0', 1, '2015-08-29 11:30:42.973', 1);
INSERT INTO movcon_inicial VALUES (6, 18, '1', '16.521,19', '0', 1, '2015-08-29 11:30:42.973', 1);


--
-- Name: movcon_inicial_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('movcon_inicial_id_seq', 174, true);


--
-- Data for Name: movcon_mensal; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO movcon_mensal VALUES (2, 3, '2', '2.000,00', '1.282,03', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (3, 6, '2', '0', '9,00', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (4, 7, '2', '708.730,00', '569.975,43', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (5, 9, '2', '13.562,23', '2.246,90', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (6, 12, '2', '26.639,10', '99.529,08', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (7, 13, '2', '0', '29,90', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (8, 18, '2', '161.036,19', '34.260,63', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (9, 15, '2', '250.000,00', '250.000,00', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (10, 16, '2', '50,00', '21,90', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (11, 19, '2', '23.403,60', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (12, 20, '2', '7.065,90', '411.890,91', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (13, 21, '2', '79,97', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (14, 22, '2', '219,99', '26.727,78', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (15, 23, '2', '20.437,65', '50,13', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (16, 266, '2', '500,00', '500,00', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (17, 25, '2', '500,00', '500,00', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (18, 28, '2', '0', '2.992,29', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (19, 29, '2', '943,53', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (20, 30, '2', '0', '27.116,99', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (21, 136, '2', '1.487,04', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (22, 148, '2', '0', '1.701,55', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (23, 149, '2', '0', '1.612,50', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (24, 150, '2', '0', '31,48', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (25, 151, '2', '0', '2.250,00', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (26, 156, '2', '0', '7.899,06', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (27, 159, '2', '0', '14.454,24', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (28, 160, '2', '0', '86,58', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (29, 161, '2', '39.428,40', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (30, 162, '2', '393,60', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (98, 3, '2', '1.002,70', '756,77', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (99, 6, '2', '0', '9,00', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (100, 7, '2', '880.732,08', '600.087,34', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (101, 9, '2', '1.909,87', '21,90', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (102, 12, '2', '17.058,18', '5.446,90', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (103, 17, '2', '266.153,83', '266.153,83', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (104, 13, '2', '0', '29,90', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (105, 18, '2', '12.799,81', '143.296,75', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (106, 15, '2', '1.405,74', '1.405,74', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (107, 16, '2', '171.631,78', '171.659,88', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (108, 19, '2', '20.839,07', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (109, 20, '2', '404.419,05', '268.439,62', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (110, 21, '2', '72,85', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (111, 22, '2', '71,09', '17.132,24', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (112, 23, '2', '18.364,56', '172.354,80', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (113, 25, '2', '3.000,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (114, 29, '2', '2.380,39', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (115, 31, '2', '14.971,65', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (116, 148, '2', '0', '1.701,56', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (117, 149, '2', '0', '1.612,26', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (118, 150, '2', '0', '31,48', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (119, 151, '2', '0', '2.250,00', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (120, 156, '2', '0', '7.899,06', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (121, 159, '2', '0', '14.454,24', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (122, 160, '2', '0', '86,58', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (123, 267, '2', '283.105,31', '283.105,31', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (124, 169, '2', '389,50', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (125, 269, '2', '133,98', '133,98', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (126, 176, '2', '78.252,40', '93.689,28', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (127, 177, '2', '22.937,61', '25.094,89', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (128, 178, '2', '7.468,43', '6.773,67', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (129, 179, '2', '750,00', '23.629,42', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (130, 180, '2', '23.358,37', '31.505,09', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (131, 181, '2', '708,06', '708,06', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (132, 182, '2', '31.925,04', '34.598,15', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (133, 183, '2', '176,82', '176,82', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (134, 184, '2', '2.233,20', '891,29', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (135, 185, '2', '384.388,88', '114.423,87', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (136, 189, '2', '0', '285.197,76', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (137, 195, '2', '0', '57.326,92', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (138, 196, '2', '0', '137.843,22', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (139, 197, '2', '0', '16,00', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (140, 198, '2', '0', '458.330,00', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (141, 199, '2', '273.195,50', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (142, 200, '2', '31.505,09', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (143, 201, '2', '23.629,42', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (144, 202, '2', '7.618,65', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (145, 203, '2', '2.500,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (146, 204, '2', '4.350,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (147, 207, '2', '4.800,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (148, 208, '2', '4.500,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (149, 209, '2', '3.958,74', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (150, 210, '2', '6.638,51', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (151, 211, '2', '375,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (152, 212, '2', '67.738,07', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (153, 213, '2', '25.094,89', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (154, 215, '2', '749,23', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (155, 216, '2', '6.381,84', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (156, 217, '2', '1.469,44', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (157, 218, '2', '49,50', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (158, 219, '2', '5,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (159, 220, '2', '507,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (160, 221, '2', '10.760,20', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (161, 222, '2', '5,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (162, 223, '2', '28.035,18', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (163, 225, '2', '7.862,20', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (164, 226, '2', '18.694,50', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (165, 227, '2', '17.511,22', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (166, 228, '2', '1.380,00', '938,85', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (167, 229, '2', '253,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (168, 231, '2', '534,33', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (169, 233, '2', '2.394,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (170, 235, '2', '305,60', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (171, 238, '2', '759,00', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (172, 240, '2', '10.652,37', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (173, 243, '2', '2.079,95', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (174, 245, '2', '181,95', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (175, 247, '2', '583,99', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (176, 248, '2', '2.502,63', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (177, 252, '2', '14.492,29', '8.410,10', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (178, 253, '2', '226,51', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (179, 255, '2', '702,48', '0', 0, NULL, 2);
INSERT INTO movcon_mensal VALUES (180, 3, '2', '1.000,00', '1.000,33', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (181, 6, '2', '0', '10,00', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (182, 7, '2', '460.447,00', '910.311,27', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (183, 9, '2', '808,50', '21,90', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (184, 12, '2', '50,00', '21,90', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (185, 17, '2', '1.047,01', '29,90', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (186, 13, '2', '0', '29,90', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (187, 18, '2', '0', '29,90', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (188, 15, '2', '691.137,73', '691.137,73', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (189, 16, '2', '102.474,40', '102.474,40', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (190, 19, '2', '26.542,47', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (191, 20, '2', '697.964,77', '409.699,02', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (192, 21, '2', '92,92', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (193, 22, '2', '55,96', '50,25', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (194, 23, '2', '21.746,77', '103.015,42', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (195, 25, '2', '0', '3.000,00', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (196, 29, '2', '1.828,72', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (197, 134, '2', '0', '1.320,00', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (198, 139, '2', '0', '175.077,05', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (199, 140, '2', '0', '15.320,00', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (200, 141, '2', '0', '80.683,35', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (201, 142, '2', '0', '15.816,20', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (202, 143, '2', '0', '15.248,00', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (203, 145, '2', '0', '148.592,41', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (204, 147, '2', '1.320,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (205, 148, '2', '0', '1.701,55', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (206, 149, '2', '0', '1.612,26', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (207, 150, '2', '0', '31,48', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (208, 151, '2', '0', '2.250,00', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (209, 152, '2', '15.320,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (210, 153, '2', '80.683,35', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (211, 154, '2', '15.248,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (212, 155, '2', '175.077,05', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (213, 156, '2', '0', '7.899,06', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (214, 157, '2', '15.816,20', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (215, 158, '2', '148.592,41', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (216, 159, '2', '0', '14.454,24', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (217, 160, '2', '0', '86,58', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (218, 318, '2', '0', '15.191,94', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (219, 267, '2', '294.384,78', '294.384,78', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (220, 169, '2', '389,50', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (221, 319, '2', '0', '3.361,23', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (222, 269, '2', '133,98', '133,98', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (223, 176, '2', '86.494,06', '87.288,93', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (224, 177, '2', '23.235,31', '23.149,22', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (225, 178, '2', '7.468,43', '7.377,00', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (226, 179, '2', '0', '22.235,59', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (227, 180, '2', '51.142,23', '29.646,71', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (228, 181, '2', '708,06', '708,06', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (229, 182, '2', '34.498,18', '34.292,98', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (230, 183, '2', '176,82', '176,82', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (231, 184, '2', '891,29', '2.347,41', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (232, 185, '2', '245.030,13', '37.018,50', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (233, 195, '2', '0', '55.354,86', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (234, 196, '2', '0', '561,67', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (235, 197, '2', '0', '317,61', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (236, 198, '2', '0', '458.330,00', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (237, 199, '2', '256.877,46', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (238, 200, '2', '29.646,71', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (239, 201, '2', '22.235,59', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (240, 202, '2', '5.975,86', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (241, 203, '2', '4.100,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (242, 204, '2', '0', '150,00', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (243, 207, '2', '4.800,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (244, 208, '2', '4.500,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (245, 211, '2', '375,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (246, 212, '2', '63.187,89', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (247, 213, '2', '23.149,22', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (248, 215, '2', '626,55', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (249, 216, '2', '4.093,80', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (250, 217, '2', '1.209,25', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (251, 218, '2', '304,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (252, 219, '2', '21,35', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (253, 220, '2', '534,37', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (254, 221, '2', '3.078,24', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (255, 222, '2', '2.949,90', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (256, 223, '2', '43.227,11', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (257, 224, '2', '3.000,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (258, 225, '2', '4.200,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (259, 226, '2', '17.448,20', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (260, 227, '2', '17.511,22', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (261, 227, '2', '17.511,22', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (262, 228, '2', '1.452,00', '891,57', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (263, 229, '2', '105,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (264, 231, '2', '573,53', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (265, 233, '2', '3.852,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (266, 235, '2', '369,98', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (267, 237, '2', '30,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (268, 238, '2', '706,80', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (269, 239, '2', '1.031,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (270, 240, '2', '385,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (271, 243, '2', '1.773,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (272, 245, '2', '268,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (273, 247, '2', '583,99', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (274, 248, '2', '2.069,63', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (275, 250, '2', '27.116,99', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (276, 251, '2', '100,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (277, 252, '2', '13.924,95', '6.814,56', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (278, 253, '2', '226,51', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (279, 255, '2', '1.424,59', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (280, 256, '2', '7.733,98', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (281, 258, '2', '614,00', '0', 0, '2015-08-26 11:52:39.131', 3);
INSERT INTO movcon_mensal VALUES (282, 258, '2', '614,00', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (283, 261, '2', '1.458,82', '0', 0, NULL, 3);
INSERT INTO movcon_mensal VALUES (284, 3, '2', '1.002,76', '1.511,57', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (285, 6, '2', '0', '10,00', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (286, 7, '2', '15.964.125,84', '16.262.910,90', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (287, 9, '2', '0', '9.874,75', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (288, 12, '2', '0', '21,90', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (289, 17, '2', '259.301,91', '29,90', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (290, 13, '2', '0', '29,90', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (291, 18, '2', '145.076,90', '29,90', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (292, 15, '2', '200.000,00', '200.000,00', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (293, 16, '2', '668.070,48', '668.023,03', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (294, 19, '2', '24.532,79', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (295, 20, '2', '560.057,94', '676.005,61', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (296, 21, '2', '86,67', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (297, 22, '2', '51,64', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (298, 23, '2', '16.790,65', '672.671,55', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (299, 25, '2', '835,00', '835,00', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (300, 29, '2', '5.943,05', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (301, 31, '2', '7.485,83', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (302, 129, '2', '15.000.000,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (303, 148, '2', '0', '1.701,55', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (304, 149, '2', '0', '1.612,26', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (305, 150, '2', '0', '31,48', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (306, 151, '2', '0', '2.250,00', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (307, 156, '2', '0', '7.415,46', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (308, 159, '2', '0', '14.454,24', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (309, 160, '2', '0', '86,58', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (310, 318, '2', '0', '5.063,89', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (311, 267, '2', '259.565,33', '259.565,33', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (312, 319, '2', '3.361,23', '186,25', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (313, 269, '2', '135,38', '135,38', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (314, 176, '2', '86.550,07', '95.055,68', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (315, 177, '2', '23.221,54', '26.519,08', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (316, 178, '2', '7.468,43', '6.388,90', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (317, 179, '2', '5.001,46', '18.805,52', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (318, 180, '2', '58.526,41', '25.073,39', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (319, 181, '2', '708,06', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (320, 182, '2', '32.942,09', '29.123,90', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (321, 183, '2', '176,82', '24,55', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (322, 184, '2', '4.902,69', '191,59', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (323, 185, '2', '578.698,40', '0,01', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (324, 188, '2', '0', '120.000.000,00', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (325, 189, '2', '120.000.000,00', '15.000.000,00', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (326, 195, '2', '0', '49.855,17', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (327, 196, '2', '0', '235.499,98', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (328, 197, '2', '0', '98,00', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (329, 198, '2', '0', '458.330,00', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (330, 199, '2', '221.325,78', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (331, 200, '2', '69.364,25', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (332, 201, '2', '22.859,44', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (333, 202, '2', '5.074,42', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (334, 203, '2', '3.100,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (335, 204, '2', '1.450,00', '150,00', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (336, 206, '2', '48.871,82', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (337, 207, '2', '4.800,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (338, 208, '2', '4.500,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (339, 209, '2', '13.914,61', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (340, 211, '2', '375,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (341, 212, '2', '71.841,77', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (342, 213, '2', '195.389,94', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (343, 215, '2', '609,02', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (344, 216, '2', '4.630,71', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (345, 217, '2', '1.323,28', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (346, 218, '2', '586,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (347, 219, '2', '57,50', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (348, 220, '2', '528,66', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (349, 221, '2', '3.800,35', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (350, 222, '2', '241,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (351, 223, '2', '32.615,46', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (352, 225, '2', '7.000,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (353, 226, '2', '17.108,30', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (354, 227, '2', '2.284,10', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (355, 228, '2', '1.452,00', '889,65', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (356, 229, '2', '20,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (357, 231, '2', '622,58', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (358, 232, '2', '153,79', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (359, 233, '2', '3.349,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (360, 234, '2', '99,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (361, 235, '2', '534,78', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (362, 237, '2', '47,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (363, 238, '2', '1.239,24', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (364, 239, '2', '215,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (365, 240, '2', '4.572,50', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (366, 241, '2', '135,40', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (367, 242, '2', '105,65', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (368, 243, '2', '2.020,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (369, 245, '2', '2.497,20', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (370, 247, '2', '583,99', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (371, 248, '2', '1.636,63', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (372, 250, '2', '54.233,98', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (373, 251, '2', '200,00', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (374, 252, '2', '13.960,77', '8.739,81', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (375, 253, '2', '226,51', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (376, 256, '2', '693,65', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (377, 257, '2', '946,05', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (378, 258, '2', '1.268,53', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (379, 260, '2', '117,63', '0', 0, NULL, 4);
INSERT INTO movcon_mensal VALUES (380, 3, '2', '1.000,67', '1.147,46', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (381, 6, '2', '0', '10,00', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (382, 7, '2', '31.352.986,92', '31.358.490,47', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (383, 9, '2', '43,50', '6.370,81', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (384, 12, '2', '50,00', '21,90', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (385, 17, '2', '0', '29,90', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (386, 13, '2', '0', '29,90', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (387, 18, '2', '0', '29,90', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (388, 15, '2', '499.279,63', '59,80', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (389, 16, '2', '14.814,41', '14.861,86', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (390, 19, '2', '25.734,24', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (391, 20, '2', '15.713.714,82', '16.132.514,52', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (392, 21, '2', '6.441,16', '101,90', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (393, 22, '2', '54,52', '95,46', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (394, 23, '2', '15.289,81', '31.838,38', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (395, 266, '2', '4.796,10', '4.796,10', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (396, 29, '2', '17.180,58', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (397, 129, '2', '15.000.000,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (398, 148, '2', '0', '1.626,50', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (399, 149, '2', '0', '1.612,26', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (400, 150, '2', '0', '31,48', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (401, 151, '2', '0', '2.250,00', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (402, 156, '2', '0', '7.415,46', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (403, 159, '2', '0', '14.454,24', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (404, 160, '2', '0', '86,58', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (405, 318, '2', '0', '5.063,89', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (406, 267, '2', '257.542,71', '257.542,71', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (407, 319, '2', '186,25', '138,55', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (408, 269, '2', '135,38', '135,38', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (409, 176, '2', '98.600,59', '87.536,62', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (410, 177, '2', '22.082,68', '22.936,44', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (411, 178, '2', '7.468,43', '6.466,14', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (412, 179, '2', '2.744,71', '20.206,69', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (413, 180, '2', '45.514,74', '26.941,58', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (414, 181, '2', '708,06', '2.375,14', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (415, 182, '2', '29.079,74', '31.273,98', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (416, 183, '2', '176,82', '633,54', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (417, 184, '2', '0', '4.885,27', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (418, 185, '2', '113.499,96', '43,50', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (419, 189, '2', '0', '15.261.431,28', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (420, 195, '2', '0', '43.508,06', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (421, 196, '2', '0', '77,24', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (422, 197, '2', '0', '173,00', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (423, 198, '2', '0', '458.330,00', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (424, 199, '2', '235.631,09', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (425, 200, '2', '42.655,96', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (426, 201, '2', '20.355,10', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (427, 202, '2', '5.042,72', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (428, 203, '2', '2.700,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (429, 204, '2', '450,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (430, 206, '2', '2.028,58', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (431, 207, '2', '4.800,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (432, 208, '2', '4.500,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (433, 209, '2', '6.809,28', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (434, 211, '2', '375,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (435, 212, '2', '61.234,63', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (436, 213, '2', '25.932,14', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (437, 215, '2', '1.660,58', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (438, 216, '2', '5.142,64', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (439, 217, '2', '1.726,10', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (440, 218, '2', '207,25', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (441, 219, '2', '49,70', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (442, 220, '2', '77,50', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (443, 221, '2', '1.057,47', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (444, 222, '2', '215,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (445, 223, '2', '32.540,41', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (446, 224, '2', '130,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (447, 225, '2', '3.000,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (448, 226, '2', '16.469,70', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (449, 226, '2', '16.469,70', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (450, 227, '2', '53.035,08', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (451, 227, '2', '1.320,00', '806,85', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (452, 230, '2', '1.555,25', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (453, 230, '2', '1.555,25', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (454, 231, '2', '609,90', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (455, 232, '2', '100,99', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (456, 233, '2', '3.276,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (457, 235, '2', '401,30', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (458, 237, '2', '288,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (459, 238, '2', '539,68', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (460, 239, '2', '164,40', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (461, 240, '2', '1.050,50', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (462, 241, '2', '35,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (463, 242, '2', '857,64', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (464, 243, '2', '1.830,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (465, 245, '2', '1.980,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (466, 246, '2', '1.550,00', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (467, 247, '2', '583,99', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (468, 248, '2', '1.636,63', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (469, 248, '2', '1.636,63', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (470, 250, '2', '27.116,99', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (471, 252, '2', '11.874,58', '7.585,88', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (472, 253, '2', '226,51', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (473, 254, '2', '55,65', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (474, 257, '2', '1.241,35', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (475, 258, '2', '719,90', '0', 0, NULL, 5);
INSERT INTO movcon_mensal VALUES (476, 3, '2', '1.004,00', '901,02', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (477, 6, '2', '0', '10,00', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (478, 7, '2', '41.206.585,18', '41.194.798,70', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (479, 9, '2', '50,00', '21,90', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (480, 12, '2', '0', '21,90', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (481, 17, '2', '0', '260.258,22', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (482, 13, '2', '0', '29,90', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (483, 18, '2', '1.192,46', '157.815,91', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (484, 15, '2', '511.431,28', '1.010.651,11', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (485, 16, '2', '171.828,42', '171.780,42', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (486, 19, '2', '28.099,50', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (487, 20, '2', '21.528.060,58', '20.597.035,17', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (488, 21, '2', '101,27', '50,00', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (489, 22, '2', '59,63', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (490, 23, '2', '16.022,54', '172.079,01', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (491, 29, '2', '1.381,59', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (492, 129, '2', '20.000.000,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (493, 136, '2', '0', '1.487,04', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (494, 148, '2', '0', '1.520,25', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (495, 149, '2', '0', '1.662,06', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (496, 150, '2', '0', '31,48', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (497, 151, '2', '0', '2.250,00', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (498, 156, '2', '0', '6.922,11', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (499, 159, '2', '0', '14.454,24', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (500, 160, '2', '0', '86,58', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (501, 318, '2', '0', '5.063,89', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (502, 267, '2', '250.453,90', '250.453,90', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (503, 269, '2', '135,38', '135,38', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (504, 176, '2', '83.561,96', '94.826,01', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (505, 177, '2', '21.971,76', '25.783,44', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (506, 178, '2', '7.468,43', '5.956,54', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (507, 179, '2', '2.083,33', '20.663,92', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (508, 180, '2', '31.279,29', '27.551,20', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (509, 181, '2', '1.667,08', '708,06', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (510, 182, '2', '30.032,47', '31.507,62', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (511, 183, '2', '481,27', '201,82', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (512, 184, '2', '1.062,76', '2.214,89', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (513, 185, '2', '218.645,01', '1.722,00', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (514, 189, '2', '0', '20.000.000,00', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (515, 195, '2', '0', '52.265,27', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (516, 197, '2', '0', '152.699,98', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (517, 198, '2', '0', '458.330,00', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (518, 199, '2', '244.263,03', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (519, 200, '2', '60.497,96', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (520, 201, '2', '25.247,25', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (521, 202, '2', '4.487,96', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (522, 203, '2', '1.000,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (523, 204, '2', '6.450,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (524, 206, '2', '10.000,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (525, 207, '2', '4.800,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (526, 208, '2', '4.500,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (527, 209, '2', '4.700,78', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (528, 211, '2', '375,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (529, 212, '2', '68.356,09', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (530, 212, '2', '68.356,09', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (531, 213, '2', '62.190,95', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (532, 215, '2', '1.415,22', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (533, 216, '2', '5.483,68', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (534, 217, '2', '1.356,23', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (535, 218, '2', '3.504,16', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (536, 219, '2', '18,50', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (537, 220, '2', '1.123,68', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (538, 221, '2', '3.415,08', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (539, 222, '2', '4.188,23', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (540, 223, '2', '31.928,42', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (541, 224, '2', '2.000,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (542, 226, '2', '15.676,60', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (543, 227, '2', '20.011,22', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (544, 228, '2', '1.188,00', '775,50', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (545, 229, '2', '98,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (546, 231, '2', '483,98', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (547, 233, '2', '1.206,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (548, 233, '2', '1.206,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (549, 235, '2', '414,45', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (550, 237, '2', '756,53', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (551, 238, '2', '1.958,90', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (552, 239, '2', '88,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (553, 240, '2', '2.436,90', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (554, 241, '2', '150,76', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (555, 242, '2', '753,34', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (556, 243, '2', '2.056,47', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (557, 245, '2', '990,00', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (558, 247, '2', '583,99', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (559, 248, '2', '1.636,63', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (560, 252, '2', '12.435,74', '7.190,70', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (561, 253, '2', '226,51', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (562, 254, '2', '47,61', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (563, 255, '2', '1.756,20', '0', 0, NULL, 6);
INSERT INTO movcon_mensal VALUES (31, 163, '2', '5.375,89', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (32, 164, '2', '260,44', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (33, 165, '2', '1.636,63', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (34, 166, '2', '1.577,01', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (35, 167, '2', '15.227,12', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (36, 168, '2', '2.292,66', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (37, 267, '2', '269.633,17', '269.633,17', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (38, 169, '2', '389,50', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (39, 170, '2', '2.350,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (40, 171, '2', '666,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (41, 172, '2', '323,55', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (42, 173, '2', '1.296,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (43, 174, '2', '1.470,56', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (44, 269, '2', '133,98', '133,98', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (45, 176, '2', '82.877,42', '82.048,65', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (46, 177, '2', '41.040,00', '22.099,79', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (47, 178, '2', '10.460,72', '10.460,72', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (48, 179, '2', '0', '22.465,07', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (49, 180, '2', '6.666,67', '29.952,67', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (50, 181, '2', '708,06', '708,06', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (51, 182, '2', '62.708,77', '31.751,48', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (52, 183, '2', '208,84', '176,82', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (53, 184, '2', '938,84', '774,38', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (54, 185, '2', '152.398,59', '13.562,23', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (55, 195, '2', '0', '51.207,11', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (56, 197, '2', '0', '500,00', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (57, 198, '2', '0', '458.330,00', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (58, 199, '2', '263.146,62', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (59, 200, '2', '29.952,67', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (60, 201, '2', '22.465,07', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (61, 202, '2', '3.559,15', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (62, 203, '2', '2.500,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (63, 204, '2', '1.800,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (64, 207, '2', '4.800,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (65, 208, '2', '4.500,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (66, 211, '2', '375,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (67, 212, '2', '59.374,73', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (68, 213, '2', '22.099,79', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (69, 215, '2', '857,98', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (70, 216, '2', '44,69', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (71, 217, '2', '63,41', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (72, 219, '2', '271,17', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (73, 220, '2', '64,80', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (74, 221, '2', '3.697,82', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (75, 222, '2', '1.535,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (76, 223, '2', '28.035,41', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (77, 225, '2', '3.000,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (78, 227, '2', '2.500,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (79, 228, '2', '1.392,00', '758,85', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (80, 231, '2', '516,75', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (81, 233, '2', '1.000,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (82, 235, '2', '463,88', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (83, 237, '2', '15,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (84, 238, '2', '885,60', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (85, 239, '2', '135,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (86, 240, '2', '1.253,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (87, 241, '2', '30,50', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (88, 244, '2', '127,20', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (89, 245, '2', '351,06', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (90, 248, '2', '60,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (91, 249, '2', '5.868,29', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (92, 250, '2', '54.233,98', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (93, 251, '2', '30,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (94, 252, '2', '14.444,56', '8.680,85', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (95, 253, '2', '226,51', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (96, 254, '2', '250,00', '0', 1, '2015-08-29 11:34:06.589', 1);
INSERT INTO movcon_mensal VALUES (97, 263, '2', '5.367,95', '0', 1, '2015-08-29 11:34:06.589', 1);


--
-- Name: movcon_mensal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('movcon_mensal_id_seq', 563, true);


--
-- Data for Name: participante_convenio; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO participante_convenio VALUES (47, '04282869000127', '2', 'PREFEITURA MUNICIPAL DE MAUÉS', '0,00', '10,00', '207472014-88888869', '20140902', '20150301', '2015010503452934135106', '20150107', '20150203', '16792840', '20141203', '20150102', '00402015', '20150102', '20150327', ' ', '20141030', '20150428', '002693562', '20150107', '20150207', 1, '2015-07-31 11:47:21.542', 21, 1, '749325062015', '20150107', '20150705', '2');
INSERT INTO participante_convenio VALUES (48, '04282869000127', '2', 'PREFEITURA MUNICPAL DE MAUÉS', '0,00', '10,00', '207472014-88888869', '20140902', '20150301', '2015010503452934135106', '20150107', '20150203', '16792840', '20150107', '20150206', '00402015', '20150102', '20150327', ' ', '20141030', '20150428', '002693562', '20150107', '20150207', 1, '2015-07-31 11:47:21.542', 20, 1, '749325062015', '20150107', '20150705', '2');
INSERT INTO participante_convenio VALUES (49, '04628020000162', '2', 'PREFEITURA MUNICIPAL DE ANAMÃ', '0,00', '10,00', ' ', '00000000', '00000000', '20150105034606448176204', '20150122', '20150203', '16860357', '20141215', '20150114', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', 1, '2015-07-31 11:47:21.542', 22, 1, '646801252014', '20141010', '20150407', '2');
INSERT INTO participante_convenio VALUES (50, '04628020000162', '2', 'PREFEITURA MUNICIPAL DE ANAMÃ', '0,00', '10,00', ' ', '00000000', '00000000', ' ', '00000000', '00000000', '17061776', '20150120', '20150219', ' ', '00000000', '00000000', ' ', '00000000', '00000000', ' ', '00000000', '00000000', 1, '2015-07-31 11:47:21.542', 23, 1, '646801252014', '20141010', '20150407', '2');


--
-- Name: participante_convenio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('participante_convenio_id_seq', 50, true);


--
-- Data for Name: participante_licitacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO participante_licitacao VALUES (8, '04063643000135', '2', 'ESTRUTURAL AUDITORES INDEPENDENTES S/S', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 10, 1);
INSERT INTO participante_licitacao VALUES (9, '32646846000190', '2', 'RAAC AUDITORES E CONSULTORES INDEPENDENTES', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 10, 1);
INSERT INTO participante_licitacao VALUES (10, '35330125000164', '2', 'SÁ LEITÃO AUDITORES S/S', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 10, 1);
INSERT INTO participante_licitacao VALUES (11, '13735149000160', '2', 'C. AUGUSTO MORAIS FAVACHO-ME', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 11, 1);
INSERT INTO participante_licitacao VALUES (12, '09493146000190', '2', 'A.M.S. GARCIA', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 11, 1);
INSERT INTO participante_licitacao VALUES (13, '10622067000111', '2', 'LOPES E SILVA CONSERVADORA LTDA-ME', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 11, 1);
INSERT INTO participante_licitacao VALUES (14, '07174273000100', '2', 'J.P. MORENO - MINNIE VARIEDADES E MATERIAIS DE CON', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 12, 1);
INSERT INTO participante_licitacao VALUES (15, '10770606000160', '2', 'C. FELIPE PEIXOTO MORENO', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 12, 1);
INSERT INTO participante_licitacao VALUES (16, '34546101000184', '2', 'VIVALDO G. DE SOUZA - CASA GONÇALVES DE CONSTRUÇÃO', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 12, 1);
INSERT INTO participante_licitacao VALUES (17, '03499782000143', '2', 'D.R. MORENO', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 12, 1);
INSERT INTO participante_licitacao VALUES (18, '04760986000159', '2', 'SOLIMÕES MATERIAIS DE CONSTRUÇÃO LTDA', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 12, 1);
INSERT INTO participante_licitacao VALUES (19, '03499782000143', '2', 'D.R. MORENO', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 13, 1);
INSERT INTO participante_licitacao VALUES (20, '04760986000159', '2', 'SOLIMÕES MATERIAIS DE CONSTRUÇÃO LTDA', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 13, 1);
INSERT INTO participante_licitacao VALUES (22, '04349930000106', '2', 'A.B. RIBEIRO', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 13, 1);
INSERT INTO participante_licitacao VALUES (23, '10770606000160', '2', 'C. FELIPE PEIXOTO MORENO', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 13, 1);
INSERT INTO participante_licitacao VALUES (24, '04418320000117', '2', 'JML COMÉRCIO DE MATERIAIS E SERVIÇOS ELÉTRICOS DE', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 14, 1);
INSERT INTO participante_licitacao VALUES (25, '02887535000151', '2', 'B.A. ELÉTRICA LTDA', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 14, 1);
INSERT INTO participante_licitacao VALUES (26, '04343480000144', '2', 'PASCO ELETRO SISTEMA LTDA', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 14, 1);
INSERT INTO participante_licitacao VALUES (21, '07174273000100', '2', 'MINNIE VARIEDADES E MATERIAIS DE CONSTRUÇÃO', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 13, 1);
INSERT INTO participante_licitacao VALUES (27, '07174273000100', '2', 'MINNIE VARIEDADES E MATERIAIS DE CONSTRUÇÃO', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 15, 1);
INSERT INTO participante_licitacao VALUES (28, '04760986000159', '2', 'SOLIMÕES MATERIAIS DE CONSTRUÇÃO LTDA', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 15, 1);
INSERT INTO participante_licitacao VALUES (29, '03499782000143', '2', 'D.R. MORENO', '1', '0', 1, '2015-08-18 11:11:15.28', 'S', 15, 1);
INSERT INTO participante_licitacao VALUES (35, '10477650000186', '2', 'ROCHA ALUMÍNIO', '1', '10477650000186', 0, NULL, 'S', 16, 2);
INSERT INTO participante_licitacao VALUES (30, '06067933000182', '2', 'MUNDIAL INDÚSTRIA E COM. DE ESQUADRIAS', '1', '06067933000182', 0, NULL, 'S', 16, 2);
INSERT INTO participante_licitacao VALUES (31, '09053303000147', '2', 'CONSTRUTORA MEDINA LTDA', '1', '09053303000147', 0, NULL, 'S', 16, 2);
INSERT INTO participante_licitacao VALUES (32, '07675099000170', '2', 'METAL ALUMÍNIO LTDA', '1', '07675099000470', 0, NULL, 'S', 16, 2);
INSERT INTO participante_licitacao VALUES (33, '13152818000171', '2', 'EDIFIK IND. E COM. ESTRUTURAS DE ALUMÍNIO LTDA', '1', '13152818000171', 0, NULL, 'S', 16, 2);
INSERT INTO participante_licitacao VALUES (36, '14215008000180', '2', 'ALUMAN ESQUADRIAS', '1', '0', 0, NULL, 'S', 16, 2);
INSERT INTO participante_licitacao VALUES (37, '19224622000121', '2', 'HEMATEC FORROS E DIVISÓRIAS', '1', '0', 0, NULL, 'S', 16, 2);
INSERT INTO participante_licitacao VALUES (38, '10649872000139', '2', 'MC SERRALHERIA E ESQUADRIA DE ALUMÍNIO', '1', '0', 0, NULL, 'S', 16, 2);
INSERT INTO participante_licitacao VALUES (34, '07913249000137', '2', 'ALUMIFER VIDROS (A.A.R. LEITE)', '1', '07913249000143', 0, NULL, 'S', 16, 2);
INSERT INTO participante_licitacao VALUES (39, '34484741000107', '2', 'HIDROCENTER COMÉRCIO DE PISCINAS LTDA', '1', '0', 0, NULL, 'S', 18, 2);
INSERT INTO participante_licitacao VALUES (40, '07695558000188', '2', 'UNITEK COMÉRCIO E CONSTRUÇÃO LTDA', '1', '0', 0, NULL, 'S', 18, 2);
INSERT INTO participante_licitacao VALUES (41, '00721870000150', '2', 'KMP DE MORAES', '1', '0', 0, NULL, 'S', 18, 2);
INSERT INTO participante_licitacao VALUES (42, '07556500000153', '2', 'TUCUNARÉ TURISMO - LJ TURISMO LTDA EPP', '1', '0', 0, NULL, 'S', 19, 4);
INSERT INTO participante_licitacao VALUES (43, '09288401000163', '2', 'J.P. VIAGENS E TURISMO LTDA ME', '1', '0', 0, NULL, 'S', 19, 4);
INSERT INTO participante_licitacao VALUES (44, '34516450000153', '2', 'SELENETUR AGÊNCIAS DE VIAGENS E TURISMO LTDA', '1', '0', 0, NULL, 'S', 19, 4);
INSERT INTO participante_licitacao VALUES (45, '03176086000162', '2', 'TREVO TURISMO LTDA', '1', '0', 0, NULL, 'S', 19, 4);
INSERT INTO participante_licitacao VALUES (46, '04442937000178', '2', 'PARINTUR HOTEIS E TURISMO', '1', '0', 0, NULL, 'S', 19, 4);
INSERT INTO participante_licitacao VALUES (47, '10181964000137', '2', 'OCA VIAGENS E TURISMO DA AMAZÔNIA', '1', '0', 0, NULL, 'S', 19, 4);
INSERT INTO participante_licitacao VALUES (48, '02878815000101', '2', 'FATHCOPY SERVIÇOS REPROGRÁFICOS', '1', '0', 0, NULL, 'S', 20, 4);
INSERT INTO participante_licitacao VALUES (50, '34586099000177', '2', 'A.C.M. FREIRE - ME', '1', '0', 0, NULL, 'S', 20, 4);
INSERT INTO participante_licitacao VALUES (49, '09391365000169', '2', 'INFINITE PRINT & SIGN', '1', '0', 0, NULL, 'S', 20, 4);
INSERT INTO participante_licitacao VALUES (51, '01950467000165', '2', 'TUV RHEINLAND DO BRASIL LTDA', '1', '0', 0, NULL, 'S', 21, 6);
INSERT INTO participante_licitacao VALUES (52, '42174805000282', '2', 'ABS QUALITY EVALUATIONS INC.', '1', '0', 0, NULL, 'S', 21, 6);
INSERT INTO participante_licitacao VALUES (53, '06200724000165', '2', 'BSI BRASIL SISTEMAS DE GESTÃO LTDA', '1', '0', 0, NULL, 'S', 21, 6);
INSERT INTO participante_licitacao VALUES (54, '06066523000117', '2', 'BUREAU VERITAS CERTIFICATION', '1', '0', 0, NULL, 'S', 21, 6);


--
-- Name: participante_licitacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('participante_licitacao_id_seq', 54, true);


--
-- Data for Name: publicacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO publicacao VALUES (5, '20150119', '0 ', 'CARTA ENVIADA AOS FORNECEDORES', 1, '2015-08-18 11:15:49.884', 11, 1);
INSERT INTO publicacao VALUES (4, '20141203', '0 ', 'QUADRO DE AVISOS E E-MAIL ENVIADOS AO FORNECEDORES', 1, '2015-08-18 11:15:49.884', 10, 1);
INSERT INTO publicacao VALUES (6, '20150120', '0 ', 'CARTA ENVIADA AOS FORNECEDORES', 1, '2015-08-18 11:15:49.884', 12, 1);
INSERT INTO publicacao VALUES (7, '20150120', '0 ', 'PROTOCOLO DE ENTREGA', 1, '2015-08-18 11:15:49.884', 13, 1);
INSERT INTO publicacao VALUES (8, '20150107', '0 ', 'PROTOCOLO DE ENTREGA', 1, '2015-08-18 11:15:49.884', 14, 1);
INSERT INTO publicacao VALUES (9, '20150113', '1 ', 'DOE AM', 0, NULL, 16, 2);
INSERT INTO publicacao VALUES (10, '20150113', '1 ', 'JORNAL DO COMMÉRCIO', 0, NULL, 16, 2);
INSERT INTO publicacao VALUES (11, '20150121', '1 ', 'DOE AM', 0, NULL, 17, 2);
INSERT INTO publicacao VALUES (12, '20150121', '1 ', 'JORNAL DO COMMÉRCIO', 0, NULL, 17, 2);
INSERT INTO publicacao VALUES (13, '20150126', '1 ', 'DOE AM', 0, NULL, 18, 2);
INSERT INTO publicacao VALUES (14, '20150126', '1 ', 'JORNAL DO COMMÉRCIO', 0, NULL, 11, 2);
INSERT INTO publicacao VALUES (15, '20150401', '1 ', 'DOE AM', 0, NULL, 19, 4);
INSERT INTO publicacao VALUES (16, '20150401', '1 ', 'JORNAL DO COMMÉRCIO', 0, NULL, 19, 4);
INSERT INTO publicacao VALUES (17, '20150415', '1 ', 'DOE AM', 0, NULL, 20, 4);
INSERT INTO publicacao VALUES (18, '20150611', '1 ', 'CARTAS ENVIADAS AOS FORNECEDORES', 0, NULL, 21, 6);


--
-- Name: publicacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('publicacao_id_seq', 18, true);


--
-- Data for Name: status_item_licitacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO status_item_licitacao VALUES (1, '01', 'Homologado');
INSERT INTO status_item_licitacao VALUES (2, '02', 'Deserto');
INSERT INTO status_item_licitacao VALUES (3, '03', 'Fracassado');
INSERT INTO status_item_licitacao VALUES (4, '04', 'Cancelado');
INSERT INTO status_item_licitacao VALUES (5, '05', 'Anulado/Revogado(Toda a licitação foi anulada)');


--
-- Name: status_item_licitacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('status_item_licitacao_id_seq', 5, true);


--
-- Data for Name: tipo_adesao_ata; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_adesao_ata VALUES (1, '01', 'Adesão ata própria (PARTICIPANTE)');
INSERT INTO tipo_adesao_ata VALUES (2, '02', 'Adesão ata externa (CARONA)');


--
-- Name: tipo_adesao_ata_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_adesao_ata_id_seq', 3, true);


--
-- Data for Name: tipo_certidao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_certidao VALUES (1, '01', 'INSS');
INSERT INTO tipo_certidao VALUES (2, '02', 'Federal');
INSERT INTO tipo_certidao VALUES (3, '03', 'Estadual');
INSERT INTO tipo_certidao VALUES (4, '04', 'Municipal');
INSERT INTO tipo_certidao VALUES (5, '05', 'FGTS');
INSERT INTO tipo_certidao VALUES (6, '06', 'CAM');
INSERT INTO tipo_certidao VALUES (7, '07', 'CNDT');
INSERT INTO tipo_certidao VALUES (8, '99', 'Outras Certidões');


--
-- Name: tipo_certidao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_certidao_id_seq', 8, true);


--
-- Data for Name: tipo_convenio; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_convenio VALUES (1, '01', 'Delegação de recursos e encargos');
INSERT INTO tipo_convenio VALUES (2, '02', 'Transferência voluntária');
INSERT INTO tipo_convenio VALUES (3, '03', 'Termo de Convênio');
INSERT INTO tipo_convenio VALUES (4, '04', 'Termo de Denúncia');
INSERT INTO tipo_convenio VALUES (12, '12', 'Cessão');
INSERT INTO tipo_convenio VALUES (5, '05', 'Termo de Cooperação Técnico e Científico');
INSERT INTO tipo_convenio VALUES (6, '06', 'Termo de Cooperação Técnico e Financeiro');
INSERT INTO tipo_convenio VALUES (7, '07', 'Termo de Parceria');
INSERT INTO tipo_convenio VALUES (8, '08', 'Termo Aditivo de Convênio');
INSERT INTO tipo_convenio VALUES (9, '09', 'Termo Aditivo de Cooperação Técnico e Científico');
INSERT INTO tipo_convenio VALUES (10, '10', 'Termo Aditivo de Cooperação Técnico e Financeiro');
INSERT INTO tipo_convenio VALUES (11, '11', 'Termo Aditivo de Parceria');
INSERT INTO tipo_convenio VALUES (13, '13', 'Aditivo de Cessão');
INSERT INTO tipo_convenio VALUES (14, '14', 'Termo de Responsabilidade');
INSERT INTO tipo_convenio VALUES (15, '15', 'Termo Aditivo de Responsabilidade');


--
-- Name: tipo_convenio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_convenio_id_seq', 15, true);


--
-- Data for Name: tipo_de_conta; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_de_conta VALUES (1, '1', 'CONTA BANCARIA');
INSERT INTO tipo_de_conta VALUES (2, '2', 'CONTA DE RECEITA');
INSERT INTO tipo_de_conta VALUES (3, '3', 'CONTA DE DESPESA');
INSERT INTO tipo_de_conta VALUES (9, '9', 'OUTRAS CONTAS CONTABEIS');


--
-- Name: tipo_de_conta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_de_conta_id_seq', 1, true);


--
-- Data for Name: tipo_de_contrato; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_de_contrato VALUES (1, '01', 'Termo de Contrato');
INSERT INTO tipo_de_contrato VALUES (2, '02', 'Termo Aditivo ao Contrato');
INSERT INTO tipo_de_contrato VALUES (3, '03', 'Termo de Re-Ratificação de Contrato');
INSERT INTO tipo_de_contrato VALUES (4, '04', 'Termo de Distrato de Contrato');
INSERT INTO tipo_de_contrato VALUES (5, '05', 'Termo de Rescisão de Contrato');
INSERT INTO tipo_de_contrato VALUES (6, '06', 'Termo de Concessão de Uso');
INSERT INTO tipo_de_contrato VALUES (7, '07', 'Termo de Aditivo de Concessão de Uso');
INSERT INTO tipo_de_contrato VALUES (8, '08', 'Termo de Permissão de Uso');
INSERT INTO tipo_de_contrato VALUES (9, '09', 'Termo Aditivo de Permissão de Uso');
INSERT INTO tipo_de_contrato VALUES (10, '10', 'Termo de Autorização de Uso');
INSERT INTO tipo_de_contrato VALUES (11, '11', 'Termo Aditivo de Autorização de Uso');
INSERT INTO tipo_de_contrato VALUES (12, '12', 'Termo de Cessão');
INSERT INTO tipo_de_contrato VALUES (13, '13', 'Termo Aditivo a Cessão');
INSERT INTO tipo_de_contrato VALUES (14, '14', 'Termo de Compromisso');
INSERT INTO tipo_de_contrato VALUES (15, '15', 'Termo Aditivo ao Compromisso');
INSERT INTO tipo_de_contrato VALUES (16, '16', 'Termo de Direito Real de Uso');
INSERT INTO tipo_de_contrato VALUES (17, '17', 'Termo Aditivo ao Direito Real de Uso');
INSERT INTO tipo_de_contrato VALUES (18, '18', 'Termo de Doação');
INSERT INTO tipo_de_contrato VALUES (19, '19', 'Carta Contrato');
INSERT INTO tipo_de_contrato VALUES (20, '20', 'Ordem de Serviços');
INSERT INTO tipo_de_contrato VALUES (21, '21', 'Termo Aditivo a Ordem de Serviços');
INSERT INTO tipo_de_contrato VALUES (22, '22', 'Termo de Revogação de Autorização de Uso');
INSERT INTO tipo_de_contrato VALUES (23, '23', 'Termo de Adesão ao Contrato');
INSERT INTO tipo_de_contrato VALUES (24, '24', 'Termo de Outorga');
INSERT INTO tipo_de_contrato VALUES (25, '25', 'Termo aditivo de Outorga');
INSERT INTO tipo_de_contrato VALUES (26, '26', 'Termo de Ex-Ofício');
INSERT INTO tipo_de_contrato VALUES (27, '27', 'Termo Aditivo de Carta Contrato');
INSERT INTO tipo_de_contrato VALUES (28, '28', 'Termo de Cooperação Técnica');
INSERT INTO tipo_de_contrato VALUES (29, '29', 'Termo Aditivo de Cooperação Técnica');
INSERT INTO tipo_de_contrato VALUES (30, '30', 'Termo de Ordem de Serviços');
INSERT INTO tipo_de_contrato VALUES (31, '31', 'Termo de Recebimento de Auxílio Aluguel');
INSERT INTO tipo_de_contrato VALUES (32, '32', 'Termo de Recebimento de Cheque Moradia');
INSERT INTO tipo_de_contrato VALUES (33, '33', 'Termo de Recebimento de Indenização');
INSERT INTO tipo_de_contrato VALUES (34, '34', 'Termo de Quitação de Contrato');
INSERT INTO tipo_de_contrato VALUES (35, '35', 'Protocolo de Intenções');
INSERT INTO tipo_de_contrato VALUES (36, '36', 'Termo Aditivo de Protocolo de Intenções');
INSERT INTO tipo_de_contrato VALUES (37, '37', 'Termo Aditivo de Doação');
INSERT INTO tipo_de_contrato VALUES (38, '38', 'Apostila de Retificação de Contrato');
INSERT INTO tipo_de_contrato VALUES (39, '39', 'Termo de Contrato de Gestão');
INSERT INTO tipo_de_contrato VALUES (40, '40', 'Termo Aditivo de Contrato de Gestão');
INSERT INTO tipo_de_contrato VALUES (41, '41', 'Termo de Rescisão de Cessão');
INSERT INTO tipo_de_contrato VALUES (42, '42', 'Termo de Apostilamento de Contrato');
INSERT INTO tipo_de_contrato VALUES (43, '43', 'Apólice de contratação de serviços de seguro');
INSERT INTO tipo_de_contrato VALUES (44, '44', 'Termo Aditivo de Apólice de contrataçãode serviços de seguro');


--
-- Name: tipo_de_contrato_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_de_contrato_id_seq', 58, true);


--
-- Data for Name: tipo_de_movimento; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_de_movimento VALUES (1, '1', 'INICIAL');
INSERT INTO tipo_de_movimento VALUES (2, '2', 'MENSAL');
INSERT INTO tipo_de_movimento VALUES (3, '3', 'FINAL');


--
-- Name: tipo_de_movimento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_de_movimento_id_seq', 1, true);


--
-- Data for Name: tipo_de_saldo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_de_saldo VALUES (1, 'C', 'Credito');
INSERT INTO tipo_de_saldo VALUES (2, 'D', 'Debito');
INSERT INTO tipo_de_saldo VALUES (3, 'M', 'Mista');


--
-- Name: tipo_de_saldo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_de_saldo_id_seq', 1, true);


--
-- Data for Name: tipo_do_aditivo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_do_aditivo VALUES (1, '1', 'Acrescimo de valor');
INSERT INTO tipo_do_aditivo VALUES (2, '2', 'Decrescimo de valor');
INSERT INTO tipo_do_aditivo VALUES (3, '3', 'Nao houve alteracao de valor');


--
-- Name: tipo_do_aditivo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_do_aditivo_id_seq', 1, true);


--
-- Data for Name: tipo_moeda; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_moeda VALUES (1, '001', 'Real');
INSERT INTO tipo_moeda VALUES (2, '003', 'Dólar');
INSERT INTO tipo_moeda VALUES (3, '009', 'Outra Moeda');


--
-- Name: tipo_moeda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_moeda_id_seq', 3, true);


--
-- Data for Name: tipo_participante_licitacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_participante_licitacao VALUES (1, '1', 'Participante comum');
INSERT INTO tipo_participante_licitacao VALUES (2, '2', 'Consórcio');
INSERT INTO tipo_participante_licitacao VALUES (3, '3', 'Consorciado');


--
-- Name: tipo_participante_licitacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_participante_licitacao_id_seq', 3, true);


--
-- Data for Name: tipo_pessoa; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo_pessoa VALUES (1, '1', 'Física');
INSERT INTO tipo_pessoa VALUES (2, '2', 'Jurídica');
INSERT INTO tipo_pessoa VALUES (3, '3', 'Outros');


--
-- Name: tipo_pessoa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_pessoa_id_seq', 3, true);


--
-- Name: contrato_empenho_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contrato_empenho
    ADD CONSTRAINT contrato_empenho_id PRIMARY KEY (id);


--
-- Name: convenio_empenho_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY convenio_empenho
    ADD CONSTRAINT convenio_empenho_id PRIMARY KEY (id);


--
-- Name: id_adesao_ata_licitacao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY adesao_ata_licitacao
    ADD CONSTRAINT id_adesao_ata_licitacao PRIMARY KEY (id);


--
-- Name: id_certidao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY certidao
    ADD CONSTRAINT id_certidao PRIMARY KEY (id);


--
-- Name: id_conta; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY conta
    ADD CONSTRAINT id_conta PRIMARY KEY (id);


--
-- Name: id_contrato; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contrato
    ADD CONSTRAINT id_contrato PRIMARY KEY (id);


--
-- Name: id_convenio; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY convenio
    ADD CONSTRAINT id_convenio PRIMARY KEY (id);


--
-- Name: id_cotacao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cotacao
    ADD CONSTRAINT id_cotacao PRIMARY KEY (id);


--
-- Name: id_esfera_do_conveniado; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY esfera_do_conveniado
    ADD CONSTRAINT id_esfera_do_conveniado PRIMARY KEY (id);


--
-- Name: id_item_adesao_ata; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY item_adesao_ata
    ADD CONSTRAINT id_item_adesao_ata PRIMARY KEY (id);


--
-- Name: id_item_licitacao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY item_licitacao
    ADD CONSTRAINT id_item_licitacao PRIMARY KEY (id);


--
-- Name: id_licitacao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY licitacao
    ADD CONSTRAINT id_licitacao PRIMARY KEY (id);


--
-- Name: id_meses; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY meses
    ADD CONSTRAINT id_meses PRIMARY KEY (id);


--
-- Name: id_modalidade_de_licitacao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY modalidade_de_licitacao
    ADD CONSTRAINT id_modalidade_de_licitacao PRIMARY KEY (id);


--
-- Name: id_movcon_final; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY movcon_final
    ADD CONSTRAINT id_movcon_final PRIMARY KEY (id);


--
-- Name: id_movcon_inicial; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY movcon_inicial
    ADD CONSTRAINT id_movcon_inicial PRIMARY KEY (id);


--
-- Name: id_movcon_mensal; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY movcon_mensal
    ADD CONSTRAINT id_movcon_mensal PRIMARY KEY (id);


--
-- Name: id_participante_convenio; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY participante_convenio
    ADD CONSTRAINT id_participante_convenio PRIMARY KEY (id);


--
-- Name: id_participante_licitacao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY participante_licitacao
    ADD CONSTRAINT id_participante_licitacao PRIMARY KEY (id);


--
-- Name: id_status_item; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY status_item_licitacao
    ADD CONSTRAINT id_status_item PRIMARY KEY (id);


--
-- Name: id_tipo_adesao_ata; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_adesao_ata
    ADD CONSTRAINT id_tipo_adesao_ata PRIMARY KEY (id);


--
-- Name: id_tipo_certidao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_certidao
    ADD CONSTRAINT id_tipo_certidao PRIMARY KEY (id);


--
-- Name: id_tipo_convenio; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_convenio
    ADD CONSTRAINT id_tipo_convenio PRIMARY KEY (id);


--
-- Name: id_tipo_de_conta; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_de_conta
    ADD CONSTRAINT id_tipo_de_conta PRIMARY KEY (id);


--
-- Name: id_tipo_de_contrato; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_de_contrato
    ADD CONSTRAINT id_tipo_de_contrato PRIMARY KEY (id);


--
-- Name: id_tipo_de_movimento; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_de_movimento
    ADD CONSTRAINT id_tipo_de_movimento PRIMARY KEY (id);


--
-- Name: id_tipo_de_saldo; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_de_saldo
    ADD CONSTRAINT id_tipo_de_saldo PRIMARY KEY (id);


--
-- Name: id_tipo_do_aditivo; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_do_aditivo
    ADD CONSTRAINT id_tipo_do_aditivo PRIMARY KEY (id);


--
-- Name: id_tipo_moeda; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_moeda
    ADD CONSTRAINT id_tipo_moeda PRIMARY KEY (id);


--
-- Name: id_tipo_participante_licitacao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_participante_licitacao
    ADD CONSTRAINT id_tipo_participante_licitacao PRIMARY KEY (id);


--
-- Name: id_tipo_pessoa; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_pessoa
    ADD CONSTRAINT id_tipo_pessoa PRIMARY KEY (id);


--
-- Name: licitacao_dotacao_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY licitacao_dotacao
    ADD CONSTRAINT licitacao_dotacao_id PRIMARY KEY (id);


--
-- Name: publicacao_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY publicacao
    ADD CONSTRAINT publicacao_id PRIMARY KEY (id);


--
-- Name: fki_adesao_ata_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_adesao_ata_mes ON adesao_ata_licitacao USING btree (mes);


--
-- Name: fki_certidao_id_licitacao; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_certidao_id_licitacao ON certidao USING btree (id_licitacao);


--
-- Name: fki_certidao_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_certidao_mes ON certidao USING btree (mes);


--
-- Name: fki_contrato_empenho_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_contrato_empenho_mes ON contrato_empenho USING btree (mes);


--
-- Name: fki_contrato_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_contrato_mes ON contrato USING btree (mes);


--
-- Name: fki_convenio_empenho_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_convenio_empenho_mes ON convenio_empenho USING btree (mes);


--
-- Name: fki_convenio_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_convenio_mes ON convenio USING btree (mes);


--
-- Name: fki_cotacao_id_licitacao; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_cotacao_id_licitacao ON cotacao USING btree (id_licitacao);


--
-- Name: fki_cotacao_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_cotacao_mes ON cotacao USING btree (mes);


--
-- Name: fki_dotacao_id_licitacao; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_dotacao_id_licitacao ON licitacao_dotacao USING btree (id_licitacao);


--
-- Name: fki_dotacao_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_dotacao_mes ON licitacao_dotacao USING btree (mes);


--
-- Name: fki_id_convenio; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_id_convenio ON convenio_empenho USING btree (id_convenio);


--
-- Name: fki_id_nu_contrato; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_id_nu_contrato ON contrato_empenho USING btree (id_nu_contrato);


--
-- Name: fki_item_id_licitacao; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_item_id_licitacao ON item_licitacao USING btree (id_licitacao);


--
-- Name: fki_item_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_item_mes ON item_licitacao USING btree (mes);


--
-- Name: fki_licitacao_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_licitacao_mes ON licitacao USING btree (mes);


--
-- Name: fki_participante_convenio_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_participante_convenio_mes ON participante_convenio USING btree (mes);


--
-- Name: fki_participante_id_convenio; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_participante_id_convenio ON participante_convenio USING btree (id_convenio);


--
-- Name: fki_participante_id_licitacao; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_participante_id_licitacao ON participante_licitacao USING btree (id_licitacao);


--
-- Name: fki_participante_licitacao_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_participante_licitacao_mes ON participante_licitacao USING btree (mes);


--
-- Name: fki_publicacao_id_licitacao; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_publicacao_id_licitacao ON publicacao USING btree (id_licitacao);


--
-- Name: fki_publicacao_mes; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_publicacao_mes ON publicacao USING btree (mes);


--
-- Name: adesao_ata_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY adesao_ata_licitacao
    ADD CONSTRAINT adesao_ata_mes FOREIGN KEY (mes) REFERENCES meses(id);


--
-- Name: certidao_id_licitacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY certidao
    ADD CONSTRAINT certidao_id_licitacao FOREIGN KEY (id_licitacao) REFERENCES licitacao(id) ON UPDATE CASCADE;


--
-- Name: certidao_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY certidao
    ADD CONSTRAINT certidao_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: conta_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY conta
    ADD CONSTRAINT conta_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: contrato_empenho_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contrato_empenho
    ADD CONSTRAINT contrato_empenho_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: contrato_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contrato
    ADD CONSTRAINT contrato_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: convenio_empenho_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY convenio_empenho
    ADD CONSTRAINT convenio_empenho_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: convenio_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY convenio
    ADD CONSTRAINT convenio_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: cotacao_id_licitacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cotacao
    ADD CONSTRAINT cotacao_id_licitacao FOREIGN KEY (id_licitacao) REFERENCES licitacao(id) ON UPDATE CASCADE;


--
-- Name: cotacao_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cotacao
    ADD CONSTRAINT cotacao_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: dotacao_id_licitacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY licitacao_dotacao
    ADD CONSTRAINT dotacao_id_licitacao FOREIGN KEY (id_licitacao) REFERENCES licitacao(id) ON UPDATE CASCADE;


--
-- Name: dotacao_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY licitacao_dotacao
    ADD CONSTRAINT dotacao_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: id_adesao_ata; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY item_adesao_ata
    ADD CONSTRAINT id_adesao_ata FOREIGN KEY (id_adesao_ata) REFERENCES adesao_ata_licitacao(id);


--
-- Name: id_convenio; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY convenio_empenho
    ADD CONSTRAINT id_convenio FOREIGN KEY (id_convenio) REFERENCES convenio(id) ON UPDATE CASCADE;


--
-- Name: id_nu_contrato; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contrato_empenho
    ADD CONSTRAINT id_nu_contrato FOREIGN KEY (id_nu_contrato) REFERENCES contrato(id) ON UPDATE CASCADE;


--
-- Name: item_id_licitacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY item_licitacao
    ADD CONSTRAINT item_id_licitacao FOREIGN KEY (id_licitacao) REFERENCES licitacao(id) ON UPDATE CASCADE;


--
-- Name: item_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY item_licitacao
    ADD CONSTRAINT item_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: licitacao_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY licitacao
    ADD CONSTRAINT licitacao_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: movcon_final_conta; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movcon_final
    ADD CONSTRAINT movcon_final_conta FOREIGN KEY (id_conta) REFERENCES conta(id) ON UPDATE CASCADE;


--
-- Name: movcon_final_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movcon_final
    ADD CONSTRAINT movcon_final_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: movcon_inicial_conta; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movcon_inicial
    ADD CONSTRAINT movcon_inicial_conta FOREIGN KEY (id_conta) REFERENCES conta(id) ON UPDATE CASCADE;


--
-- Name: movcon_inicial_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movcon_inicial
    ADD CONSTRAINT movcon_inicial_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: movcon_mensal_conta; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movcon_mensal
    ADD CONSTRAINT movcon_mensal_conta FOREIGN KEY (id_conta) REFERENCES conta(id) ON UPDATE CASCADE;


--
-- Name: movcon_mensal_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movcon_mensal
    ADD CONSTRAINT movcon_mensal_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: participante_convenio_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY participante_convenio
    ADD CONSTRAINT participante_convenio_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: participante_id_convenio; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY participante_convenio
    ADD CONSTRAINT participante_id_convenio FOREIGN KEY (id_convenio) REFERENCES convenio(id) ON UPDATE CASCADE;


--
-- Name: participante_id_licitacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY participante_licitacao
    ADD CONSTRAINT participante_id_licitacao FOREIGN KEY (id_licitacao) REFERENCES licitacao(id) ON UPDATE CASCADE;


--
-- Name: participante_licitacao_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY participante_licitacao
    ADD CONSTRAINT participante_licitacao_mes FOREIGN KEY (mes) REFERENCES meses(id);


--
-- Name: publicacao_id_licitacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY publicacao
    ADD CONSTRAINT publicacao_id_licitacao FOREIGN KEY (id_licitacao) REFERENCES licitacao(id) ON UPDATE CASCADE;


--
-- Name: publicacao_mes; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY publicacao
    ADD CONSTRAINT publicacao_mes FOREIGN KEY (mes) REFERENCES meses(id) ON UPDATE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

