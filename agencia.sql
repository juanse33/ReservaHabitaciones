-- MySQL Script generated by MySQL Workbench
-- Sun May 12 09:35:33 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema agencia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema agencia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `agencia` DEFAULT CHARACTER SET utf8 ;
USE `agencia` ;

-- -----------------------------------------------------
-- Table `agencia`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agencia`.`administrador` (
  `idadministrador` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(45) NOT NULL,
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`idadministrador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agencia`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agencia`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `moneda` INT NOT NULL,
  `ciudad` VARCHAR(45) NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agencia`.`hotel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agencia`.`hotel` (
  `idhotel` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `cantidad_habitaciones` INT NOT NULL,
  `cantidad_habitaciones_disponibles` INT NOT NULL,
  `valor_habitacion` INT NOT NULL,
  `cuidad` VARCHAR(45) NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`idhotel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agencia`.`reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agencia`.`reserva` (
  `idreserva` INT NOT NULL AUTO_INCREMENT,
  `fecha_entrada` DATE NOT NULL,
  `fecha_salida` VARCHAR(45) NOT NULL,
  `hotel_idhotel` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idreserva`),
  INDEX `fk_reserva_hotel1_idx` (`hotel_idhotel` ASC) ,
  INDEX `fk_reserva_usuario1_idx` (`usuario_idusuario` ASC) ,
  CONSTRAINT `fk_reserva_hotel1`
    FOREIGN KEY (`hotel_idhotel`)
    REFERENCES `agencia`.`hotel` (`idhotel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `agencia`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agencia`.`habitacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agencia`.`habitacion` (
  `idhabitacion` INT NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `hotel_idhotel` INT NOT NULL,
  PRIMARY KEY (`idhabitacion`),
  INDEX `fk_habitacion_hotel_idx` (`hotel_idhotel` ASC) ,
  CONSTRAINT `fk_habitacion_hotel`
    FOREIGN KEY (`hotel_idhotel`)
    REFERENCES `agencia`.`hotel` (`idhotel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;