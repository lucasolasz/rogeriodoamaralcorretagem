CREATE TABLE IF NOT EXISTS tb_tipo_negociacao (
  id_tipo_negociacao TINYINT unsigned NOT NULL AUTO_INCREMENT,
  ds_tipo_negociacao varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_tipo_negociacao),
  UNIQUE KEY id_tipo_negociacao (id_tipo_negociacao)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


INSERT INTO tb_tipo_negociacao (id_tipo_negociacao, ds_tipo_negociacao) VALUES
	(1, 'Venda'),
	(2, 'Aluguel');

CREATE TABLE IF NOT EXISTS tb_tipo_imovel (
  id_tipo_imovel TINYINT unsigned NOT NULL AUTO_INCREMENT,
  ds_tipo_imovel varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_tipo_imovel),
  UNIQUE KEY id_tipo_imovel (id_tipo_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tb_tipo_imovel (id_tipo_imovel, ds_tipo_imovel) VALUES
	(1, 'Apartamento'),
	(2, 'Casa de Condomínio'),
	(3, 'Casa'),
	(4, 'Kitnet/Studio');


CREATE TABLE IF NOT EXISTS tb_imovel (
  id_imovel int unsigned NOT NULL AUTO_INCREMENT,
  ds_end_imovel varchar(255) DEFAULT NULL,
  qtd_area SMALLINT DEFAULT NULL,  
  qtd_quarto TINYINT DEFAULT NULL,
  qtd_banheiro TINYINT DEFAULT NULL,
  qtd_vagas TINYINT DEFAULT NULL,
  num_andar TINYINT DEFAULT NULL,
  chk_aceita_pet char(1) DEFAULT NULL,
  chk_mobilia char(1) DEFAULT NULL,
  chk_metro_prox char(1) DEFAULT NULL,
  fk_tipo_imovel TINYINT unsigned DEFAULT NULL,
  fk_tipo_negociacao TINYINT unsigned DEFAULT NULL,
  txt_escolas_colegios varchar(500) DEFAULT NULL,
  txt_transporte_publico varchar(500) DEFAULT NULL,
  txt_faculdades varchar(500) DEFAULT NULL,
  txt_entretenimento varchar(500) DEFAULT NULL,
  txt_hospitais varchar(500) DEFAULT NULL,
  txt_parque_area_verde varchar(500) DEFAULT NULL,
  mo_aluguel INT DEFAULT NULL,
  mo_venda INT DEFAULT NULL,
  mo_condominio INT DEFAULT NULL,
  mo_iptu INT DEFAULT NULL,
  mo_seguro_incendio INT DEFAULT NULL,
  mo_taxa_de_servico INT DEFAULT NULL,
  ds_nome_proprietario varchar(100) DEFAULT NULL,
  num_telefone_proprietario varchar(12) DEFAULT NULL,
  ds_email_proprietario varchar(100) DEFAULT NULL,
  publicado_em timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (id_imovel),
  UNIQUE KEY id_imovel (id_imovel),
  KEY fk_tipo_imovel_tb_tipo_imovel (fk_tipo_imovel),
  KEY fk_tipo_negociacao_tb_tipo_negociacao (fk_tipo_imovel),
  CONSTRAINT fk_tipo_imovel_tb_tipo_imovel FOREIGN KEY (fk_tipo_imovel) REFERENCES tb_tipo_imovel (id_tipo_imovel),
  CONSTRAINT fk_tipo_negociacao_tb_tipo_imovel FOREIGN KEY (fk_tipo_negociacao) REFERENCES tb_tipo_negociacao (id_tipo_negociacao)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS tb_caracteristicas_imovel (
  id_caracteristica_imovel SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  ds_caracteristica_imovel varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_caracteristica_imovel),
  UNIQUE KEY id_caracteristica_imovel (id_caracteristica_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tb_caracteristicas_imovel (id_caracteristica_imovel, ds_caracteristica_imovel) VALUES
(1,'Piscina privativa'),
(2,'Área de serviço'),
(3,'Banheira de hidromassagem'),
(4,'Box'),
(5,'Varanda'),
(6,'Closet'),
(7,'Armários nos banheiros'),
(8,'Armários na cozinha'),
(9,'Ar condicionado'),
(10,'Chuveiro a gás'),
(11,'Apartamento cobertura'),
(12,'Fogão incluso'),
(13,'Geladeira inclusa'),
(14,'Banheiro adaptado'),
(15,'Closet'),
(16,'Cozinha americana'),
(17,'Mesas e cadeiras de escritório'),
(18,'Jardim'),
(19,'Quartos e corredores com portas amplas'),
(20,'Quintal'),
(21,'Somente uma casa no terreno');


CREATE TABLE IF NOT EXISTS tb_caracteristicas_condominio (
  id_caracteristica_condominio SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  ds_caracteristica_condominio varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_caracteristica_condominio),
  UNIQUE KEY id_caracteristica_condominio (id_caracteristica_condominio)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


INSERT INTO tb_caracteristicas_condominio (id_caracteristica_condominio, ds_caracteristica_condominio) VALUES
(1,'Playground'),
(2,'Piscina'),
(3,'Churrasqueira'),
(4,'Quadra esportiva'),
(5,'Academia'),
(6,'Salão de festas'),
(7,'Sauna'),
(8,'Lavanderia no prédio'),
(9,'Brinquedoteca'),
(10,'Corrimão'),
(11,'Piso tátil'),
(12,'Rampas de acesso'),
(13,'Salão de jogos'),
(14,'Vaga de garagem acessível'),
(15,'Área verde'),
(16,'Elevador'),
(17,'Portaria 24h');



CREATE TABLE tb_relac_imovel_carac_imovel (
  id_rela_imovel_carac_imovel INT NOT NULL AUTO_INCREMENT,
  fk_caracteristica_imovel SMALLINT unsigned NOT NULL,
  fk_imovel int unsigned NOT NULL,
  PRIMARY KEY (id_rela_imovel_carac_imovel),
  KEY fk_caracteristica_imovel_tb_caracteristicas_imovel (fk_caracteristica_imovel),
  KEY fk_imovel_tb_imovel (fk_imovel),
  CONSTRAINT fk_caracteristica_imovel_tb_relac_imovel_carac_imovel FOREIGN KEY (fk_caracteristica_imovel) REFERENCES tb_caracteristicas_imovel (id_caracteristica_imovel),
  CONSTRAINT fk_imovel_tb_relac_imovel_carac_imovel FOREIGN KEY (fk_imovel) REFERENCES tb_imovel (id_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;



CREATE TABLE tb_relac_imovel_carac_condo (
  id_relac_imovel_carac_condo INT NOT NULL AUTO_INCREMENT,
  fk_caracteristica_condominio SMALLINT unsigned NOT NULL,
  fk_imovel int unsigned NOT NULL,
  PRIMARY KEY (id_relac_imovel_carac_condo),
  KEY fk_caracteristica_condominio_tb_relac_imovel_carac_condo (fk_caracteristica_condominio),
  KEY fk_imovel_tb_imovel (fk_imovel),
  CONSTRAINT fk_caracteristica_condominio_tb_relac_imovel_carac_condo FOREIGN KEY (fk_caracteristica_condominio) REFERENCES tb_caracteristicas_condominio (id_caracteristica_condominio),
  CONSTRAINT fk_imovel_tb_relac_imovel_carac_condo FOREIGN KEY (fk_imovel) REFERENCES tb_imovel (id_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS tb_anexo(
    id_anexo int unsigned NOT NULL AUTO_INCREMENT,
    fk_imovel int unsigned DEFAULT NULL,
    nm_path_arquivo varchar(300) DEFAULT NULL,
    nm_arquivo varchar(300) DEFAULT NULL,
    criado_em timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (id_anexo),
    KEY fk_imovel_tb_imovel (fk_imovel),
    CONSTRAINT fk_imovel_tb_anexo FOREIGN KEY (fk_imovel) REFERENCES tb_imovel (id_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;