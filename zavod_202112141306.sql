﻿--
-- Script was generated by Devart dbForge Studio 2020 for MySQL, Version 9.0.689.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 14.12.2021 13:06:02
-- Server version: 8.0.27
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE zavod;

--
-- Drop table `priemshiki`
--
DROP TABLE IF EXISTS priemshiki;

--
-- Drop table `product`
--
DROP TABLE IF EXISTS product;

--
-- Drop table `proizvodstvo`
--
DROP TABLE IF EXISTS proizvodstvo;

--
-- Set default database
--
USE zavod;

--
-- Create table `proizvodstvo`
--
CREATE TABLE proizvodstvo (
  id_proizvodstva int NOT NULL AUTO_INCREMENT,
  nameizdeliya tinytext DEFAULT NULL,
  dataproizvodtva tinytext DEFAULT NULL,
  kolvobrak tinytext DEFAULT NULL,
  PRIMARY KEY (id_proizvodstva)
)
ENGINE = INNODB,
AUTO_INCREMENT = 6,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create table `product`
--
CREATE TABLE product (
  id_zavod int NOT NULL AUTO_INCREMENT,
  name tinytext DEFAULT NULL,
  cex tinytext DEFAULT NULL,
  kolvo_izdely int DEFAULT NULL,
  stoimost int DEFAULT NULL,
  PRIMARY KEY (id_zavod)
)
ENGINE = INNODB,
AUTO_INCREMENT = 8,
AVG_ROW_LENGTH = 3276,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create foreign key
--
ALTER TABLE product
ADD CONSTRAINT FK_product_proizvodstvo_id_proizvodstva FOREIGN KEY (id_zavod)
REFERENCES proizvodstvo (id_proizvodstva);

--
-- Create table `priemshiki`
--
CREATE TABLE priemshiki (
  id_priemshiki int NOT NULL AUTO_INCREMENT,
  nameizdeliya tinytext DEFAULT NULL,
  priemshik tinytext DEFAULT NULL,
  PRIMARY KEY (id_priemshiki)
)
ENGINE = INNODB,
AUTO_INCREMENT = 6,
AVG_ROW_LENGTH = 3276,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create foreign key
--
ALTER TABLE priemshiki
ADD CONSTRAINT FK_priemshiki_product_id_zavod FOREIGN KEY (id_priemshiki)
REFERENCES product (id_zavod);

-- 
-- Dumping data for table proizvodstvo
--
INSERT INTO proizvodstvo VALUES
(1, 'сырье', '01.02.2021', '4'),
(2, 'чугун', '15.05.2021', '6'),
(3, 'огурец', '01.06.2021', '11'),
(4, 'курочка', '07.12.2021', '22'),
(5, 'щука', '03.12.2020', '14');

-- 
-- Dumping data for table product
--
INSERT INTO product VALUES
(1, 'сырье', 'промышленное производство', 152, 70),
(2, 'чугун', 'металлургический', 82, 6),
(3, 'огурец', 'овощной', 1289, 23),
(4, 'курочка', 'мясной', 1821, 142),
(5, 'щука', 'рыбный', 432, 246);

-- 
-- Dumping data for table priemshiki
--
INSERT INTO priemshiki VALUES
(1, 'сырье', 'валерий'),
(2, 'чугун', 'стас'),
(3, 'овощи', 'кирик'),
(4, 'мясо', 'игорь'),
(5, 'рыба', 'антон');

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;