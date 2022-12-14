CREATE SCHEMA `lojadecroche` ;
 
CREATE TABLE `lojadecroche`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_completo` VARCHAR(250) NULL,
  `cpf` VARCHAR(15) NULL,
  `senha` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `tipo` TINYINT(1) NULL,
  PRIMARY KEY (`id`));

ALTER TABLE `lojadecroche`.`usuario` 
ADD UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE;
;

ALTER TABLE `lojadecroche`.`usuario` 
CHANGE COLUMN `tipo` `tipo` TINYINT(1) NULL DEFAULT 0 ;

CREATE TABLE `lojadecroche`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `produto` VARCHAR(45) NULL,
  `preco` VARCHAR(45) NULL,
  `quantidade` INT NULL,
  `tamanho` VARCHAR(45) NULL,
  `cor` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `lojadecroche`.`pedido` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customizacao` VARCHAR(250) NULL,
  `endereco` VARCHAR(250) NULL,
  PRIMARY KEY (`id`));

ALTER TABLE `lojadecroche`.`pedido` 
ADD INDEX `idUsuario_idx` (`idUsuario` ASC) VISIBLE;
;
ALTER TABLE `lojadecroche`.`pedido` 
ADD CONSTRAINT `idUsuario`
  FOREIGN KEY (`idUsuario`)
  REFERENCES `lojadecroche`.`usuario` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


ALTER TABLE `lojadecroche`.`pedido` 
ADD INDEX `idProduto_idx` (`idProduto` ASC) VISIBLE;
;
ALTER TABLE `lojadecroche`.`pedido` 
ADD CONSTRAINT `idProduto`
  FOREIGN KEY (`idProduto`)
  REFERENCES `lojadecroche`.`produtos` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `lojadecroche`.`produtos` 
ADD COLUMN `img` VARCHAR(250) NULL AFTER `cor`;
