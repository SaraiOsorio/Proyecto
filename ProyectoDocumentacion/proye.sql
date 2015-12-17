SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema boutique
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `boutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `boutique` ;

-- -----------------------------------------------------
-- Table `boutique`.`proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`proveedores` (
  `idproveedor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `ubicacion` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idproveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`categorias` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`generos` (
  `idgenero` INT NOT NULL AUTO_INCREMENT,
  `genero` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idgenero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`productos` (
  `idproducto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(20) NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `id_genero` INT NOT NULL,
  `existencia` INT NOT NULL,
  `pre_clien` DECIMAL(10) NOT NULL,
  `pre_prove` DECIMAL(10) NOT NULL,
  `id_proveedor` INT NOT NULL,
  `id_categoria` INT NOT NULL,
  PRIMARY KEY (`idproducto`),
  INDEX `id_progen_idx` (`id_genero` ASC),
  INDEX `id_propro_idx` (`id_proveedor` ASC),
  INDEX `id_procat_idx` (`id_categoria` ASC),
  CONSTRAINT `id_progen`
    FOREIGN KEY (`id_genero`)
    REFERENCES `boutique`.`generos` (`idgenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_propro`
    FOREIGN KEY (`id_proveedor`)
    REFERENCES `boutique`.`proveedores` (`idproveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_procat`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `boutique`.`categorias` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`clasificaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`clasificaciones` (
  `idclasificacion` INT NOT NULL AUTO_INCREMENT,
  `clasificacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idclasificacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`usuarios` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `apellidos` VARCHAR(50) NOT NULL,
  `id_clasificacion` INT NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(16) NOT NULL,
  `imagen` VARCHAR(200) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  `id_genero` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `id_usucat_idx` (`id_clasificacion` ASC),
  INDEX `id_usugen_idx` (`id_genero` ASC),
  CONSTRAINT `id_usucat`
    FOREIGN KEY (`id_clasificacion`)
    REFERENCES `boutique`.`clasificaciones` (`idclasificacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_usugen`
    FOREIGN KEY (`id_genero`)
    REFERENCES `boutique`.`generos` (`idgenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`carrito` (
  `control` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `id_producto` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  INDEX `id_carusu_idx` (`id_usuario` ASC),
  INDEX `id_carpro_idx` (`id_producto` ASC),
  CONSTRAINT `id_carusu`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `boutique`.`usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_carpro`
    FOREIGN KEY (`id_producto`)
    REFERENCES `boutique`.`productos` (`idproducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`entregas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`entregas` (
  `identrega` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `ubicacion` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(16) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`identrega`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`bancos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`bancos` (
  `idbanco` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `ubicacion` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(16) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idbanco`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`pagos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`pagos` (
  `idPago` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `id_banco` INT NOT NULL,
  PRIMARY KEY (`idPago`),
  INDEX `id_pagban_idx` (`id_banco` ASC),
  CONSTRAINT `id_pagban`
    FOREIGN KEY (`id_banco`)
    REFERENCES `boutique`.`bancos` (`idbanco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`ventas` (
  `idventas` INT NOT NULL AUTO_INCREMENT,
  `cantidad_pro` INT NOT NULL,
  `total` DECIMAL(10) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `id_pago` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`idventas`),
  INDEX `id_venusu_idx` (`id_usuario` ASC),
  INDEX `id_venpa_idx` (`id_pago` ASC),
  CONSTRAINT `id_venusu`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `boutique`.`usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_venpa`
    FOREIGN KEY (`id_pago`)
    REFERENCES `boutique`.`pagos` (`idPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`paqueterias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`paqueterias` (
  `idpaqueteria` INT NOT NULL AUTO_INCREMENT,
  `estatus` VARCHAR(20) NOT NULL,
  `id_entrega` INT NOT NULL,
  `id_venta` INT NOT NULL,
  PRIMARY KEY (`idpaqueteria`),
  INDEX `id_paqentr_idx` (`id_entrega` ASC),
  INDEX `id_paqven_idx` (`id_venta` ASC),
  CONSTRAINT `id_paqentr`
    FOREIGN KEY (`id_entrega`)
    REFERENCES `boutique`.`entregas` (`identrega`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_paqven`
    FOREIGN KEY (`id_venta`)
    REFERENCES `boutique`.`ventas` (`idventas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boutique`.`comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boutique`.`comentarios` (
  `idcomentario` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `comentario` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idcomentario`),
  INDEX `id_comusu_idx` (`id_usuario` ASC),
  CONSTRAINT `id_comusu`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `boutique`.`usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
