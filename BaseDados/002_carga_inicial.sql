CREATE TABLE IF NOT EXISTS `tb_cargo` (
  `id_cargo` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `ds_cargo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`) USING BTREE,
  UNIQUE KEY `id_cargo` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


INSERT INTO `tb_cargo` (`id_cargo`, `ds_cargo`) VALUES
	(1, 'Cargo1'),
	(2, 'Cargo2');


CREATE TABLE IF NOT EXISTS `tb_tipo_usuario` (
  `id_tipo_usuario` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `ds_tipo_usuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_usuario`) USING BTREE,
  UNIQUE KEY `id_tipo_usuario` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


INSERT INTO `tb_tipo_usuario` (`id_tipo_usuario`, `ds_tipo_usuario`) VALUES
	(1, 'Administrador'),
	(2, 'Colaborador');


CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `ds_nome_usuario` varchar(255) DEFAULT NULL,
  `ds_email_usuario` varchar(255) DEFAULT NULL,
  `ds_senha` varchar(255) DEFAULT NULL,
  `fk_cargo` int(2) unsigned DEFAULT NULL,
  `fk_tipo_usuario` int(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`),
  UNIQUE KEY `ds_email_usuario` (`ds_email_usuario`),
  KEY `fk_cargo_tb_cargo` (`fk_cargo`),
  KEY `fk_tipo_usuario_tb_usuario` (`fk_tipo_usuario`),
  CONSTRAINT `fk_cargo_tb_usuario` FOREIGN KEY (`fk_cargo`) REFERENCES `tb_cargo` (`id_cargo`),
  CONSTRAINT `fk_tipo_usuario_tb_usuario` FOREIGN KEY (`fk_tipo_usuario`) REFERENCES `tb_tipo_usuario` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO tb_usuario (id_usuario, ds_nome_usuario, ds_email_usuario, ds_senha, fk_cargo, fk_tipo_usuario) VALUES(1, 'Administrador', 'admin@app.com', '$2y$10$zKh0sq3Fk002BnWooZvHlOi50MOSp8lxlX6aItZ0gecUYQtS5BqXG', 1, 1);

UPDATE tb_usuario SET id_usuario=0 WHERE id_usuario=1;
