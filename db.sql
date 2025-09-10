-- Create database
CREATE DATABASE IF NOT EXISTS library
CHARACTER SET utf8mb4
COLLATE utf8mb4_hungarian_ci;

-- Select the database
USE library;

-- Create publisher table
CREATE TABLE IF NOT EXISTS `publisher` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `publisher` VARCHAR(24) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8
  COLLATE=utf8_hungarian_ci;

-- Create genre table
CREATE TABLE IF NOT EXISTS `genre` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `genre` VARCHAR(24) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8
  COLLATE=utf8_hungarian_ci;

-- Create books table
CREATE TABLE IF NOT EXISTS `books` (
    `ISBN` VARCHAR(13) NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    `kep` BLOB NOT NULL,
    `writer` VARCHAR(40),
    `lang` VARCHAR(30),
    `price` INT(10),
    `kiado_id` INT NOT NULL,
    `kat_id` INT NOT NULL,
    PRIMARY KEY(`ISBN`),
    FOREIGN KEY (`kiado_id`) REFERENCES `publisher`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (`kat_id`) REFERENCES `genre`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_hungarian_ci;
