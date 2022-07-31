CREATE TABLE IF NOT EXISTS tb_filtro_comodidades (
  id_filtro_comodidades SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  ds_filtro_comodidades varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_filtro_comodidades),
  UNIQUE KEY id_filtro_comodidades (id_filtro_comodidades)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tb_filtro_comodidades (id_filtro_comodidades, ds_filtro_comodidades) VALUES
(1,'Apartamento cobertura'),
(2,'Ar condicionado'),
(3,'Banheira'),
(4,'Box'),
(5,'Churrasqueira'),
(6,'Chuveiro a gás'),
(7,'Closet'),
(8,'Novos ou reformados'),
(9,'Piscina privativa'),
(10,'Somente uma casa no terreno'),
(11,'Tanque'),
(12,'Televisão'),
(13,'Utensílios de cozinha'),
(14,'Ventilador de teto');

CREATE TABLE IF NOT EXISTS tb_filtro_mobilias (
  id_filtro_mobilias SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  ds_filtro_mobilias varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_filtro_mobilias),
  UNIQUE KEY id_filtro_mobilias (id_filtro_mobilias)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tb_filtro_mobilias (id_filtro_mobilias, ds_filtro_mobilias) VALUES
(1,'Armários na cozinha'),
(2,'Armários no quarto'),
(3,'Armários nos banheiros'),
(4,'Cama de casal'),
(5,'Cama de solteiro'),
(6,'Mesas e cadeiras de jantar'),
(7,'Sofá');

CREATE TABLE IF NOT EXISTS tb_filtro_bem_estar (
  id_filtro_bem_estar SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  ds_filtro_bem_estar varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_filtro_bem_estar),
  UNIQUE KEY id_filtro_bem_estar (id_filtro_bem_estar)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tb_filtro_bem_estar (id_filtro_bem_estar, ds_filtro_bem_estar) VALUES
(1,'Janelas grandes'),
(2,'Rua silenciosa'),
(3,'Sol da manhã'),
(4,'Sol da tarde'),
(5,'Vista livre');


CREATE TABLE IF NOT EXISTS tb_filtro_eletrodomestico (
  id_filtro_eletrodomestico SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  ds_filtro_eletrodomestico varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_filtro_eletrodomestico),
  UNIQUE KEY id_filtro_eletrodomestico (id_filtro_eletrodomestico)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tb_filtro_eletrodomestico (id_filtro_eletrodomestico, ds_filtro_eletrodomestico) VALUES
(1,'Fogão'),
(2,'Fogão cooktop'),
(3,'Geladeira'),
(4,'Máquina de lavar'),
(5,'Microondas');

CREATE TABLE IF NOT EXISTS tb_filtro_comodos (
  id_filtro_comodos SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  ds_filtro_comodos varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_filtro_comodos),
  UNIQUE KEY id_filtro_comodos (id_filtro_comodos)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


INSERT INTO tb_filtro_comodos (id_filtro_comodos, ds_filtro_comodos) VALUES
(1,'Área de serviço'),
(2,'Cozinha americana'),
(3,'Home-office'),
(4,'Jardim'),
(5,'Quintal'),
(6,'Varanda');


CREATE TABLE IF NOT EXISTS tb_filtro_acessibilidade (
  id_filtro_acessibilidade SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  ds_filtro_acessibilidade varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_filtro_acessibilidade),
  UNIQUE KEY id_filtro_acessibilidade (id_filtro_acessibilidade)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tb_filtro_acessibilidade (id_filtro_acessibilidade, ds_filtro_acessibilidade) VALUES
(1,'Banheiro adaptado'),
(2,'Corrimão'),
(3,'Piso tátil'),
(4,'Quartos e corredores com portas amplas'),
(5,'Rampas de acesso'),
(6,'Vaga de garagem acessível');




CREATE TABLE tb_relac_imovel_acessibilidade (
  id_relac_imovel_acessibilidade INT NOT NULL AUTO_INCREMENT,
  fk_filtro_acessibilidade SMALLINT unsigned NOT NULL,
  fk_imovel int unsigned NOT NULL,
  PRIMARY KEY (id_relac_imovel_acessibilidade),
  KEY fk_filtro_acessibilidade_tb_filtro_acessibilidade (fk_filtro_acessibilidade),
  KEY fk_imovel_tb_imovel (fk_imovel),
  CONSTRAINT fk_filtro_acessibilidade_tb_relac_imovel_acessibilidade FOREIGN KEY (fk_filtro_acessibilidade) REFERENCES tb_filtro_acessibilidade (id_filtro_acessibilidade),
  CONSTRAINT fk_imovel_tb_relac_imovel_acessibilidade FOREIGN KEY (fk_imovel) REFERENCES tb_imovel (id_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;


CREATE TABLE tb_relac_imovel_bem_estar (
  id_relac_imovel_bem_estar INT NOT NULL AUTO_INCREMENT,
  fk_filtro_bem_estar SMALLINT unsigned NOT NULL,
  fk_imovel int unsigned NOT NULL,
  PRIMARY KEY (id_relac_imovel_bem_estar),
  KEY fk_filtro_bem_estar_tb_filtro_bem_estar (fk_filtro_bem_estar),
  KEY fk_imovel_tb_imovel (fk_imovel),
  CONSTRAINT fk_filtro_bem_estar_tb_relac_imovel_bem_estar FOREIGN KEY (fk_filtro_bem_estar) REFERENCES tb_filtro_bem_estar (id_filtro_bem_estar),
  CONSTRAINT fk_imovel_tb_relac_imovel_bem_estar FOREIGN KEY (fk_imovel) REFERENCES tb_imovel (id_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;


CREATE TABLE tb_relac_imovel_comodidades (
  id_relac_imovel_comodidades INT NOT NULL AUTO_INCREMENT,
  fk_filtro_comodidades SMALLINT unsigned NOT NULL,
  fk_imovel int unsigned NOT NULL,
  PRIMARY KEY (id_relac_imovel_comodidades),
  KEY fk_filtro_comodidades_tb_filtro_comodidades (fk_filtro_comodidades),
  KEY fk_imovel_tb_imovel (fk_imovel),
  CONSTRAINT fk_filtro_comodidades_tb_relac_imovel_comodidades FOREIGN KEY (fk_filtro_comodidades) REFERENCES tb_filtro_comodidades (id_filtro_comodidades),
  CONSTRAINT fk_imovel_tb_relac_imovel_comodidades FOREIGN KEY (fk_imovel) REFERENCES tb_imovel (id_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;


CREATE TABLE tb_relac_imovel_comodos (
  id_relac_imovel_comodos INT NOT NULL AUTO_INCREMENT,
  fk_filtro_comodos SMALLINT unsigned NOT NULL,
  fk_imovel int unsigned NOT NULL,
  PRIMARY KEY (id_relac_imovel_comodos),
  KEY fk_filtro_comodos_tb_filtro_comodos (fk_filtro_comodos),
  KEY fk_imovel_tb_imovel (fk_imovel),
  CONSTRAINT fk_filtro_comodos_tb_relac_imovel_comodos FOREIGN KEY (fk_filtro_comodos) REFERENCES tb_filtro_comodos (id_filtro_comodos),
  CONSTRAINT fk_imovel_tb_relac_imovel_comodos FOREIGN KEY (fk_imovel) REFERENCES tb_imovel (id_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;


CREATE TABLE tb_relac_imovel_eletro (
  id_relac_imovel_eletro INT NOT NULL AUTO_INCREMENT,
  fk_filtro_eletrodomestico SMALLINT unsigned NOT NULL,
  fk_imovel int unsigned NOT NULL,
  PRIMARY KEY (id_relac_imovel_eletro),
  KEY fk_filtro_eletrodomestico_tb_filtro_eletrodomestico (fk_filtro_eletrodomestico),
  KEY fk_imovel_tb_imovel (fk_imovel),
  CONSTRAINT fk_filtro_eletrodomestico_tb_relac_imovel_eletro FOREIGN KEY (fk_filtro_eletrodomestico) REFERENCES tb_filtro_eletrodomestico (id_filtro_eletrodomestico),
  CONSTRAINT fk_imovel_tb_relac_imovel_eletro FOREIGN KEY (fk_imovel) REFERENCES tb_imovel (id_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;


CREATE TABLE tb_relac_imovel_mobilia (
  id_relac_imovel_mobilia INT NOT NULL AUTO_INCREMENT,
  fk_filtro_mobilias SMALLINT unsigned NOT NULL,
  fk_imovel int unsigned NOT NULL,
  PRIMARY KEY (id_relac_imovel_mobilia),
  KEY fk_filtro_mobilias_tb_filtro_mobilias (fk_filtro_mobilias),
  KEY fk_imovel_tb_imovel (fk_imovel),
  CONSTRAINT fk_filtro_mobilias_tb_relac_imovel_mobilia FOREIGN KEY (fk_filtro_mobilias) REFERENCES tb_filtro_mobilias (id_filtro_mobilias),
  CONSTRAINT fk_imovel_tb_relac_imovel_mobilia FOREIGN KEY (fk_imovel) REFERENCES tb_imovel (id_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;


ALTER TABLE tb_imovel ADD txt_link_video varchar(100) DEFAULT NULL;