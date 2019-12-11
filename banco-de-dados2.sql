-- MySQL Script generated by MySQL Workbench
-- Tue Dec 10 21:06:24 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`endereco_juridica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`endereco_juridica` ;

CREATE TABLE IF NOT EXISTS `mydb`.`endereco_juridica` (
  `idEndereco` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `logradouro` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `CEP` VARCHAR(45) NOT NULL,
  `juridica_id_juridica` INT NOT NULL,
  PRIMARY KEY (`idEndereco`),
  CONSTRAINT `fk_endereco_juridica10`
    FOREIGN KEY (`juridica_id_juridica`)
    REFERENCES `mydb`.`juridica` (`id_juridica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `idEndereco_UNIQUE` ON `mydb`.`endereco_juridica` (`idEndereco` ASC) ;

CREATE INDEX `fk_endereco_juridica1_idx` ON `mydb`.`endereco_juridica` (`juridica_id_juridica` ASC) ;

CREATE UNIQUE INDEX `juridica_id_juridica_UNIQUE` ON `mydb`.`endereco_juridica` (`juridica_id_juridica` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`endereco_pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`endereco_pessoa` ;

CREATE TABLE IF NOT EXISTS `mydb`.`endereco_pessoa` (
  `idEndereco` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `logradouro` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `CEP` VARCHAR(45) NOT NULL,
  `pessoa_idPessoa` INT NOT NULL,
  PRIMARY KEY (`idEndereco`),
  CONSTRAINT `fk_endereco_pessoa_pessoa1`
    FOREIGN KEY (`pessoa_idPessoa`)
    REFERENCES `mydb`.`pessoa` (`idPessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `idEndereco_UNIQUE` ON `mydb`.`endereco_pessoa` (`idEndereco` ASC) ;

CREATE INDEX `fk_endereco_pessoa_pessoa1_idx` ON `mydb`.`endereco_pessoa` (`pessoa_idPessoa` ASC) ;

CREATE UNIQUE INDEX `pessoa_idPessoa_UNIQUE` ON `mydb`.`endereco_pessoa` (`pessoa_idPessoa` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`juridica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`juridica` ;

CREATE TABLE IF NOT EXISTS `mydb`.`juridica` (
  `id_juridica` INT NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(45) NOT NULL,
  `razao` VARCHAR(45) NOT NULL,
  `fantasia` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_juridica`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cnpj_UNIQUE` ON `mydb`.`juridica` (`cnpj` ASC) ;

CREATE UNIQUE INDEX `razao_UNIQUE` ON `mydb`.`juridica` (`razao` ASC) ;

CREATE UNIQUE INDEX `email_UNIQUE` ON `mydb`.`juridica` (`email` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`juridica_has_pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`juridica_has_pessoa` ;

CREATE TABLE IF NOT EXISTS `mydb`.`juridica_has_pessoa` (
  `juridica_id_juridica` INT NOT NULL,
  `pessoa_idPessoa` INT NOT NULL,
  PRIMARY KEY (`juridica_id_juridica`, `pessoa_idPessoa`),
  CONSTRAINT `fk_juridica_has_pessoa_juridica1`
    FOREIGN KEY (`juridica_id_juridica`)
    REFERENCES `mydb`.`juridica` (`id_juridica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_juridica_has_pessoa_pessoa1`
    FOREIGN KEY (`pessoa_idPessoa`)
    REFERENCES `mydb`.`pessoa` (`idPessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_juridica_has_pessoa_pessoa1_idx` ON `mydb`.`juridica_has_pessoa` (`pessoa_idPessoa` ASC) ;

CREATE INDEX `fk_juridica_has_pessoa_juridica1_idx` ON `mydb`.`juridica_has_pessoa` (`juridica_id_juridica` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`pessoa` ;

CREATE TABLE IF NOT EXISTS `mydb`.`pessoa` (
  `idPessoa` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `dataDeNasc` VARCHAR(45) NOT NULL,
  `sexo` ENUM('masculino', 'feminino') NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPessoa`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cpf_UNIQUE` ON `mydb`.`pessoa` (`cpf` ASC) ;

CREATE UNIQUE INDEX `idPessoaFisica_UNIQUE` ON `mydb`.`pessoa` (`idPessoa` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`telefone_juridica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`telefone_juridica` ;

CREATE TABLE IF NOT EXISTS `mydb`.`telefone_juridica` (
  `id_telefone_juridica` INT NOT NULL AUTO_INCREMENT,
  `telefone_juridica` VARCHAR(45) NOT NULL,
  `juridica_id_juridica` INT NOT NULL,
  PRIMARY KEY (`id_telefone_juridica`),
  CONSTRAINT `fk_telefone_juridica_juridica1`
    FOREIGN KEY (`juridica_id_juridica`)
    REFERENCES `mydb`.`juridica` (`id_juridica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_telefone_juridica_juridica1_idx` ON `mydb`.`telefone_juridica` (`juridica_id_juridica` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`telefone_pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`telefone_pessoa` ;

CREATE TABLE IF NOT EXISTS `mydb`.`telefone_pessoa` (
  `id_telefone_pessoa` INT NOT NULL AUTO_INCREMENT,
  `telefone_pessoa` VARCHAR(45) NOT NULL,
  `pessoa_idPessoa` INT NOT NULL,
  PRIMARY KEY (`id_telefone_pessoa`),
  CONSTRAINT `fk_telefone_pessoa_pessoa1`
    FOREIGN KEY (`pessoa_idPessoa`)
    REFERENCES `mydb`.`pessoa` (`idPessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_telefone_pessoa_pessoa1_idx` ON `mydb`.`telefone_pessoa` (`pessoa_idPessoa` ASC) ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mydb`.`endereco_juridica`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`endereco_juridica` (`idEndereco`, `nome`, `logradouro`, `bairro`, `numero`, `cidade`, `estado`, `CEP`, `juridica_id_juridica`) VALUES (1, 'casa', 'rua lucia saboia', 'Centro', '234', 'Sobral', 'Ceara', '48873345', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`endereco_pessoa`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`endereco_pessoa` (`idEndereco`, `nome`, `logradouro`, `bairro`, `numero`, `cidade`, `estado`, `CEP`, `pessoa_idPessoa`) VALUES (1, 'casa', 'Rua A', 'Cajazeira', '52', 'Fortaleza', 'Ceara', '60864463', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`juridica`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`juridica` (`id_juridica`, `cnpj`, `razao`, `fantasia`, `email`) VALUES (1, '27.865.757/0001-02', 'GLOBO', 'GLOBO', 'globo@email.com');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`juridica_has_pessoa`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`juridica_has_pessoa` (`juridica_id_juridica`, `pessoa_idPessoa`) VALUES (1, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`pessoa`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`pessoa` (`idPessoa`, `Nome`, `cpf`, `dataDeNasc`, `sexo`, `email`) VALUES (1, 'Sergio', '07234087346', '19/03/1998', 'masculino', 'sergio@outlook.com');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`telefone_juridica`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`telefone_juridica` (`id_telefone_juridica`, `telefone_juridica`, `juridica_id_juridica`) VALUES (1, '8532891471', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`telefone_pessoa`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`telefone_pessoa` (`id_telefone_pessoa`, `telefone_pessoa`, `pessoa_idPessoa`) VALUES (1, '85997246598', 1);

COMMIT;

