CREATE TABLE IF NOT EXISTS tb_bairros (
  id_bairro SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  ds_bairro varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_bairro),
  UNIQUE KEY id_bairro (id_bairro)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tb_bairros (id_bairro, ds_bairro) VALUES
(1,'Bairro Imperial de São Cristóvão'),
(2,'Benfica'),
(3,'Caju'),
(4,'Catumbi'),
(5,'Centro'),
(6,'Cidade Nova'),
(7,'Estácio'),
(8,'Gamboa'),
(9,'Glória'),
(10,'Lapa'),
(11,'Mangueira'),
(12,'Paquetá'),
(13,'Rio Comprido'),
(14,'Santa Teresa'),
(15,'Santo Cristo'),
(16,'Saúde'),
(17,'Vasco da Gama'),
(18,'Botafogo'),
(19,'Catete'),
(20,'Copacabana'),
(21,'Cosme Velho'),
(22,'Flamengo'),
(23,'Gávea'),
(24,'Humaitá'),
(25,'Ipanema'),
(26,'Jardim Botânico'),
(27,'Lagoa'),
(28,'Laranjeiras'),
(29,'Leblon'),
(30,'Leme'),
(31,'Rocinha'),
(32,'São Conrado'),
(33,'Urca'),
(34,'Vidigal'),
(35,'Anil'),
(36,'Barra da Tijuca'),
(37,'Camorim'),
(38,'Cidade de Deus'),
(39,'Curicica'),
(40,'Freguesia de Jacarepaguá'),
(41,'Gardênia Azul'),
(42,'Grumari'),
(43,'Itanhangá'),
(44,'Jacarepaguá'),
(45,'Joá'),
(46,'Praça Seca'),
(47,'Pechincha'),
(48,'Recreio dos Bandeirantes'),
(49,'Tanque'),
(50,'Taquara'),
(51,'Vargem Grande'),
(52,'Vargem Pequena'),
(53,'Vila Valqueire'),
(54,'Bangu'),
(55,'Deodoro'),
(56,'Gericinó'),
(57,'Jardim Sulacap'),
(58,'Magalhães Bastos'),
(59,'Padre Miguel'),
(60,'Realengo'),
(61,'Santíssimo'),
(62,'Senador Camará'),
(63,'Vila Kennedy'),
(64,'Vila Militar'),
(65,'Barra de Guaratiba'),
(66,'Campo Grande'),
(67,'Cosmos'),
(68,'Guaratiba'),
(69,'Inhoaíba'),
(70,'Paciência'),
(71,'Pedra de Guaratiba'),
(72,'Santa Cruz'),
(73,'Senador Vasconcelos'),
(74,'Sepetiba'),
(75,'Alto da Boa Vista'),
(76,'Andaraí'),
(77,'Grajaú'),
(78,'Maracanã'),
(79,'Praça da Bandeira'),
(80,'Tijuca'),
(81,'Vila Isabel'),
(82,'Abolição'),
(83,'Água Santa'),
(84,'Cachambi'),
(85,'Del Castilho'),
(86,'Encantado'),
(87,'Engenho de Dentro'),
(88,'Engenho Novo'),
(89,'Higienópolis'),
(90,'Jacaré'),
(91,'Jacarezinho'),
(92,'Lins de Vasconcelos'),
(93,'Manguinhos'),
(94,'Maria da Graça'),
(95,'Méier'),
(96,'Piedade'),
(97,'Pilares'),
(98,'Riachuelo'),
(99,'Rocha'),
(100,'Sampaio'),
(101,'São Francisco Xavier'),
(102,'Todos os Santos'),
(103,'Bonsucesso'),
(104,'Bancários'),
(105,'Cacuia'),
(106,'Cidade Universitária'),
(107,'Cocotá'),
(108,'Freguesia'),
(109,'Galeão'),
(110,'Jardim Carioca'),
(111,'Jardim Guanabara'),
(112,'Maré'),
(113,'Moneró'),
(114,'Olaria'),
(115,'Pitangueiras'),
(116,'Portuguesa'),
(117,'Praia da Bandeira'),
(118,'Ramos'),
(119,'Ribeira'),
(120,'Tauá'),
(121,'Zumbi'),
(122,'Acari'),
(123,'Anchieta'),
(124,'Barros Filho'),
(125,'Bento Ribeiro'),
(126,'Brás de Pina'),
(127,'Campinho'),
(128,'Cavalcanti'),
(129,'Cascadura'),
(130,'Coelho Neto'),
(131,'Colégio'),
(132,'Complexo do Alemão'),
(133,'Cordovil'),
(134,'Costa Barros'),
(135,'Engenheiro Leal'),
(136,'Engenho da Rainha'),
(137,'Guadalupe'),
(138,'Honório Gurgel'),
(139,'Inhaúma'),
(140,'Irajá'),
(141,'Jardim América'),
(142,'Madureira'),
(143,'Marechal Hermes'),
(144,'Oswaldo Cruz'),
(145,'Parada de Lucas'),
(146,'Parque Anchieta'),
(147,'Parque Colúmbia'),
(148,'Pavuna'),
(149,'Penha'),
(150,'Penha Circular'),
(151,'Quintino Bocaiuva'),
(152,'Ricardo de Albuquerque'),
(153,'Rocha Miranda'),
(154,'Tomás Coelho'),
(155,'Turiaçu'),
(156,'Vaz Lobo'),
(157,'Vicente de Carvalho'),
(158,'Vigário Geral'),
(159,'Vila da Penha'),
(160,'Vila Kosmos'),
(161,'Vista Alegre');







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
  ds_rua_imovel varchar(255) DEFAULT NULL,
  ds_bairro_imovel varchar(60) DEFAULT NULL,
  qtd_area SMALLINT DEFAULT NULL,  
  qtd_quarto TINYINT DEFAULT NULL,
  qtd_banheiro TINYINT DEFAULT NULL,
  qtd_vagas TINYINT DEFAULT NULL,
  num_andar TINYINT DEFAULT NULL,
  chk_aceita_pet char(1) DEFAULT NULL,
  chk_mobilia char(1) DEFAULT NULL,
  chk_metro_prox char(1) DEFAULT NULL,
  fk_bairro SMALLINT unsigned DEFAULT NULL,
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
  KEY fk_bairro_tb_bairros (fk_bairro),
  CONSTRAINT fk_tipo_imovel_tb_tipo_imovel FOREIGN KEY (fk_tipo_imovel) REFERENCES tb_tipo_imovel (id_tipo_imovel),
  CONSTRAINT fk_tipo_negociacao_tb_tipo_imovel FOREIGN KEY (fk_tipo_negociacao) REFERENCES tb_tipo_negociacao (id_tipo_negociacao),
  CONSTRAINT fk_bairro_tb_tipo_imovel FOREIGN KEY (fk_bairro) REFERENCES tb_bairros (id_bairro)
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
    chk_destaque char(1) DEFAULT NULL,
    criado_em timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (id_anexo),
    KEY fk_imovel_tb_imovel (fk_imovel),
    CONSTRAINT fk_imovel_tb_anexo FOREIGN KEY (fk_imovel) REFERENCES tb_imovel (id_imovel)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;