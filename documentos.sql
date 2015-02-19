--
-- PostgreSQL database dump
--

-- Dumped from database version 9.2.4
-- Dumped by pg_dump version 9.3.6
-- Started on 2015-02-19 16:09:51 VET

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 172 (class 3079 OID 11735)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1949 (class 0 OID 0)
-- Dependencies: 172
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 169 (class 1259 OID 49757)
-- Name: documento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE documento (
    id integer NOT NULL,
    codocumento character varying,
    de character varying,
    parapersona character varying,
    para character varying,
    degerencia character varying,
    asunto character varying,
    fecha character varying,
    saludo text,
    contenido text,
    tipodocumento character varying,
    fecha_sistema timestamp without time zone DEFAULT now()
);


ALTER TABLE public.documento OWNER TO postgres;

--
-- TOC entry 168 (class 1259 OID 49755)
-- Name: documento_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE documento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.documento_id_seq OWNER TO postgres;

--
-- TOC entry 1950 (class 0 OID 0)
-- Dependencies: 168
-- Name: documento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE documento_id_seq OWNED BY documento.id;


--
-- TOC entry 171 (class 1259 OID 49769)
-- Name: formato; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE formato (
    id integer NOT NULL,
    de character varying,
    parapersona character varying,
    para character varying,
    degerencia character varying,
    asunto character varying,
    fecha character varying,
    saludo text,
    contenido text,
    tipodocumento character varying,
    fecha_sistema timestamp without time zone DEFAULT now(),
    referencia character varying
);


ALTER TABLE public.formato OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 49767)
-- Name: formato_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE formato_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.formato_id_seq OWNER TO postgres;

--
-- TOC entry 1951 (class 0 OID 0)
-- Dependencies: 170
-- Name: formato_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE formato_id_seq OWNED BY formato.id;


--
-- TOC entry 1824 (class 2604 OID 49760)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY documento ALTER COLUMN id SET DEFAULT nextval('documento_id_seq'::regclass);


--
-- TOC entry 1826 (class 2604 OID 49772)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY formato ALTER COLUMN id SET DEFAULT nextval('formato_id_seq'::regclass);


--
-- TOC entry 1939 (class 0 OID 49757)
-- Dependencies: 169
-- Data for Name: documento; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO documento (id, codocumento, de, parapersona, para, degerencia, asunto, fecha, saludo, contenido, tipodocumento, fecha_sistema) VALUES (46, 'CSDC-GTIC-/2015', 'Administración y Finanzas', 'Marcos García', 'Carlos Jimenez', 'Gerencia de Tecnología Informática y Comunicaciones', 'Reparación de Torniquetes', 'Thursday, 19 de February del 2015', '         Tengo el agrado de dirigirme a usted muy respetuosamente para hacerle llegar un cordial saludo bolivariano revolucionario y antimperialista, a su vez  (Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, ipsam numquam accusamus nobis reprehenderit cum praesentium expedita, cupiditate voluptates beatae, ullam quidem. Rerum illum est, iste iure et reiciendis magni.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, ipsam numquam accusamus nobis reprehenderit cum praesentium expedita, cupiditate voluptates beatae, ullam quidem. Rerum illum est, iste iure et reiciendis magni.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, ipsam numquam accusamus nobis reprehenderit cum praesentium expedita, cupiditate voluptates beatae, ullam quidem. Rerum illum est, iste iure et reiciendis magni.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, ipsam numquam accusamus nobis reprehenderit cum praesentium expedita, cupiditate voluptates beatae, ullam quidem. Rerum illum est, iste iure et reiciendis magni.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, ipsam numquam accusamus nobis reprehenderit cum praesentium expedita, cupiditate voluptates beatae, ullam quidem. Rerum illum est, iste iure et reiciendis magni.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, ipsam numquam accusamus nobis reprehenderit cum praesentium expedita, cupiditate voluptates beatae, ullam quidem. Rerum illum est, iste iure et reiciendis magni.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, ipsam numquam accusamus nobis reprehenderit cum praesentium expedita, cupiditate voluptates beatae, ullam quidem. Rerum illum est, iste iure et reiciendis magni.)', ' (', 'ms', '2015-02-19 11:05:53.174416');


--
-- TOC entry 1952 (class 0 OID 0)
-- Dependencies: 168
-- Name: documento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('documento_id_seq', 46, true);


--
-- TOC entry 1941 (class 0 OID 49769)
-- Dependencies: 171
-- Data for Name: formato; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO formato (id, de, parapersona, para, degerencia, asunto, fecha, saludo, contenido, tipodocumento, fecha_sistema, referencia) VALUES (5, 'Administración y Finanzas', 'Marcos García', 'Carlos Jimenez', 'Gerencia de Tecnología Informática y Comunicaciones', 'Reparación de Torniquetes', 'Thursday, 19 de February del 2015', '         Tengo el agrado de dirigirme a usted muy respetuosamente para hacerle llegar un cordial saludo bolivariano revolucionario y antimperialista, a su vez  (Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, ullam, nostrum. Fuga ad eveniet beatae delectus earum id quod, eos pariatur eligendi modi non sint, porro eius libero incidunt quisquam?​)', ' [', 'ms', '2015-02-19 11:07:13.181559', 'asd');
INSERT INTO formato (id, de, parapersona, para, degerencia, asunto, fecha, saludo, contenido, tipodocumento, fecha_sistema, referencia) VALUES (6, 'Administración y Finanzas', 'Marcos García', 'Carlos Jimenez', 'Gerencia de Tecnología Informática y Comunicaciones', 'Reparación de Torniquetes', 'Thursday, 19 de February del 2015', '         Tengo el agrado de dirigirme a usted muy respetuosamente para hacerle llegar un cordial saludo bolivariano revolucionario y antimperialista, a su vez ', ' [asodmas odaksodkaospd kaposd kaspod kpaosd kpoask dpaosk dpoask dpoask dpaosk dpaosk dpaoskd paoskdpaoskdpaoskdpaoksdpaoksdpaksdpoakspdokaspodkaspodkaposkdpasokdpaso kdpaoskd poaskd poaskd poka]', 'ms', '2015-02-19 15:53:46.369463', 'asd');


--
-- TOC entry 1953 (class 0 OID 0)
-- Dependencies: 170
-- Name: formato_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('formato_id_seq', 6, true);


--
-- TOC entry 1829 (class 2606 OID 49766)
-- Name: documento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY documento
    ADD CONSTRAINT documento_pkey PRIMARY KEY (id);


--
-- TOC entry 1831 (class 2606 OID 49778)
-- Name: formato_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY formato
    ADD CONSTRAINT formato_pkey PRIMARY KEY (id);


--
-- TOC entry 1948 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-02-19 16:09:52 VET

--
-- PostgreSQL database dump complete
--

