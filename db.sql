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

-- Create writer table
CREATE TABLE IF NOT EXISTS `writer` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `writer` VARCHAR(24) NOT NULL,
    `bio`VARCHAR(200),
    PRIMARY KEY(`id`)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8
  COLLATE=utf8_hungarian_ci;

-- Create books table
CREATE TABLE IF NOT EXISTS `books` (
    `ISBN` VARCHAR(13) NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    `img` BLOB NOT NULL,
    `lang` VARCHAR(30),
    `price` INT(10),
    `publisher_id` INT NOT NULL,
    `genre_id` INT NOT NULL,
    `writer_id` INT NOT NULL,
    PRIMARY KEY(`ISBN`),
    FOREIGN KEY (`publisher_id`) REFERENCES `publisher`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (`genre_id`) REFERENCES `genre`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (`writer_id`) REFERENCES `writer`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_hungarian_ci;
