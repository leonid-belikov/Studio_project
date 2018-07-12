

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- 
-----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

USE `mydb` ;


-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `hash` VARCHAR(200) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `mydb`.`Project`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mydb`.`Project` (
  `idProject` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `description` TEXT(1000) NOT NULL,
  `idLabel` INT NOT NULL,
  `likeCount` INT NOT NULL,
  PRIMARY KEY (`idProject`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `mydb`.`Like`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mydb`.`Like` (
  `idLike` INT NOT NULL AUTO_INCREMENT,
  `likeDate` DATETIME NOT NULL,
  `idLiker` INT NOT NULL,
  `Project_idProject` INT NOT NULL,
  PRIMARY KEY (`idLike`),
  INDEX `fk_Like_User_idx` (`idLiker` ASC),
  INDEX `fk_Like_Project1_idx` (`Project_idProject` ASC),
  CONSTRAINT `fk_Like_User`
    FOREIGN KEY (`idLiker`)
    REFERENCES `mydb`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Like_Project1`
    FOREIGN KEY (`Project_idProject`)
    REFERENCES `mydb`.`Project` (`idProject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '	';



-- -----------------------------------------------------
-- Table `mydb`.`Order`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mydb`.`Order` (
  `idOrder` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `specification` VARCHAR(100) NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `deadline` DATE NOT NULL,
  `cost` INT NOT NULL,
  `orderDate` DATE NOT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`idOrder`),
  INDEX `fk_Order_User1_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_Order_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `mydb`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `mydb`.`Screenshot`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mydb`.`Screenshot` (
  `idScreenshot` INT NOT NULL AUTO_INCREMENT,
  `src` VARCHAR(100) NOT NULL,
  `Project_idProject` INT NOT NULL,
  PRIMARY KEY (`idScreenshot`),
  INDEX `fk_Screenshot_Project1_idx` (`Project_idProject` ASC),
  CONSTRAINT `fk_Screenshot_Project1`
    FOREIGN KEY (`Project_idProject`)
    REFERENCES `mydb`.`Project` (`idProject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
