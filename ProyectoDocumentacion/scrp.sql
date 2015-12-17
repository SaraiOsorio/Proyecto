SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema escuela
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `escuela` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `escuela` ;

-- -----------------------------------------------------
-- Table `escuela`.`alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `escuela`.`alumnos` (
  `id_alumno` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `paterno` VARCHAR(45) NOT NULL,
  `materno` VARCHAR(45) NOT NULL,
  `fecha_n` DATE NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id_alumno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escuela`.`materias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `escuela`.`materias` (
  `id_materia` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `duracion` INT NOT NULL,
  `clave` VARCHAR(10) NOT NULL,
  `credito` INT NOT NULL,
  PRIMARY KEY (`id_materia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escuela`.`escuelas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `escuela`.`escuelas` (
  `id_escuela` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `calle` VARCHAR(45) NOT NULL,
  `no_exteriror` VARCHAR(45) NOT NULL,
  `colonia` VARCHAR(45) NOT NULL,
  `ciudad` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `cp` INT NOT NULL,
  `te_oficina` VARCHAR(16) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `cedula` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_escuela`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escuela`.`turno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `escuela`.`turno` (
  `id_turno` INT NOT NULL AUTO_INCREMENT,
  `turno` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_turno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escuela`.`carreras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `escuela`.`carreras` (
  `id_carrera` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `creditos` VARCHAR(45) NOT NULL,
  `duracion` INT NOT NULL,
  `id_escuela` INT NOT NULL,
  `id_turno` INT NOT NULL,
  PRIMARY KEY (`id_carrera`),
  INDEX `id_escuela_caresc_idx` (`id_escuela` ASC),
  INDEX `id_escuela_cartur_idx` (`id_turno` ASC),
  CONSTRAINT `id_escuela_caresc`
    FOREIGN KEY (`id_escuela`)
    REFERENCES `escuela`.`escuelas` (`id_escuela`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_escuela_cartur`
    FOREIGN KEY (`id_turno`)
    REFERENCES `escuela`.`turno` (`id_turno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escuela`.`cardex`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `escuela`.`cardex` (
  `id_cardex` INT NOT NULL AUTO_INCREMENT,
  `id_alumno` INT NOT NULL,
  `id_materia` INT NOT NULL,
  PRIMARY KEY (`id_cardex`),
  INDEX `id_alumno_almcar_idx` (`id_alumno` ASC),
  INDEX `id_materia_matcar_idx` (`id_materia` ASC),
  CONSTRAINT `id_alumno_almcar`
    FOREIGN KEY (`id_alumno`)
    REFERENCES `escuela`.`alumnos` (`id_alumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_materia_matcar`
    FOREIGN KEY (`id_materia`)
    REFERENCES `escuela`.`materias` (`id_materia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
