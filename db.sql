CREATE DATABASE `imersao17`;

use `imersao17`;

CREATE TABLE `categoria` (
  `id` varchar(36) NOT NULL,
  `parent_id` varchar(36) NULL,
  `nome` varchar(255) NOT NULL,
  `ativo` boolean NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `imersao17`.`categories` (`id`,`name`) VALUES ("6b4c28f4-6831-495a-9444-19c93452faa3","Relogios");
INSERT INTO `imersao17`.`categories` (`id`,`name`) VALUES ("7c0ca0d4-ff23-4bd7-b131-c563067c4b43","Eletronicos");

CREATE TABLE `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENTE,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `peso` decimal(10,3) NOT NULL,
  `ativo` boolean NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories_idx` (`category_id`)
);

INSERT INTO `imersao17`.`products` (`id`,`name`,`description`,`price`,`category_id`,`image_url`)
VALUES ("7f8c9d8e-9f0a-1b2c-3d4e-5f6g7h8i9j0k","Product 1","Description 1", 100, "6b4c28f4-6831-495a-9444-19c93452faa3", "http://localhost:9000/products/1.png"),
("eb296629-1fce-43ca-8413-1b3bddd07106","Product 20","Description 20", 2000, "6b4c28f4-6831-495a-9444-19c93452faa3", "http://localhost:9000/products/20.png");

CREATE TABLE `variacao` (
  `id` int(11) NOT NULL AUTO_INCREMENTE,
  `cor` varchar(255) NOT NULL,
  `tamanho` varchar(255) NOT NULL,
  `ativo` boolean NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `sku` (
  `id` int(11) NOT NULL AUTO_INCREMENTE,
  `produto_id` int(11) NOT NULL,
  `variacao_id` int(11) NOT NULL,
  `nome` varchar(255) NULL,
  `descricao` varchar(255) NULL,
  `preco` decimal(10,2) NULL,
  `peso` decimal(10,3) NULL,
  `largura` decimal(10,2) NULL,
  `altura` decimal(10,2) NULL,
  `profundidade` decimal(10,2) NULL,
  `ativo` boolean NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories_idx` (`category_id`)
);
