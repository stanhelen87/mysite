--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.3.358.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 14.01.2016 14:36:45
-- Версия сервера: 5.6.25-log
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE 	u924202834_alena;

--
-- Описание для таблицы buyerin
--
DROP TABLE IF EXISTS buyerin;
CREATE TABLE buyerin (
  id_buyerin INT(11) NOT NULL AUTO_INCREMENT,
  login CHAR(20) DEFAULT NULL,
  password CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_buyerin)
)
ENGINE = INNODB
AUTO_INCREMENT = 22
AVG_ROW_LENGTH = 780
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы hours_import
--
DROP TABLE IF EXISTS hours_import;
CREATE TABLE hours_import (
  id_hours INT(11) NOT NULL,
  id_buyer INT(11) DEFAULT NULL,
  hours CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_hours)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы list_pattern
--
DROP TABLE IF EXISTS list_pattern;
CREATE TABLE list_pattern (
  id_pattern INT(11) NOT NULL AUTO_INCREMENT,
  name_pattern CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_pattern)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы tbl_kindparent
--
DROP TABLE IF EXISTS tbl_kindparent;
CREATE TABLE tbl_kindparent (
  id_parent INT(11) NOT NULL AUTO_INCREMENT,
  kindparent CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_parent)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы tbl_producer
--
DROP TABLE IF EXISTS tbl_producer;
CREATE TABLE tbl_producer (
  id_producer INT(11) NOT NULL AUTO_INCREMENT,
  producer CHAR(20) DEFAULT NULL,
  country CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_producer)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы tbl_status
--
DROP TABLE IF EXISTS tbl_status;
CREATE TABLE tbl_status (
  id_status INT(11) NOT NULL AUTO_INCREMENT,
  name CHAR(20) DEFAULT NULL,
  code INT(11) DEFAULT NULL,
  type CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_status)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы tbl_user
--
DROP TABLE IF EXISTS tbl_user;
CREATE TABLE tbl_user (
  id_user INT(11) NOT NULL AUTO_INCREMENT,
  surname CHAR(50) DEFAULT NULL,
  name CHAR(50) DEFAULT NULL,
  middlename CHAR(50) DEFAULT NULL,
  address CHAR(50) DEFAULT NULL,
  status INT(11) DEFAULT NULL,
  number CHAR(20) DEFAULT NULL,
  username CHAR(20) DEFAULT NULL,
  password TEXT DEFAULT NULL,
  profile CHAR(20) DEFAULT NULL,
  email CHAR(20) DEFAULT NULL,
  salt CHAR(50) DEFAULT NULL,
  PRIMARY KEY (id_user)
)
ENGINE = INNODB
AUTO_INCREMENT = 176
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы tbl_import
--
DROP TABLE IF EXISTS tbl_import;
CREATE TABLE tbl_import (
  id_import INT(20) NOT NULL AUTO_INCREMENT,
  status INT(20) DEFAULT NULL,
  id_user INT(20) DEFAULT NULL,
  sum_price INT(20) DEFAULT NULL,
  create_time CHAR(20) DEFAULT NULL,
  hours CHAR(20) DEFAULT NULL,
  address CHAR(50) DEFAULT NULL,
  PRIMARY KEY (id_import),
  INDEX FK_import_product_id_product (status),
  CONSTRAINT FK_import_buyer_id_buyer FOREIGN KEY (id_user)
    REFERENCES tbl_user(id_user) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 147
AVG_ROW_LENGTH = 252
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы tbl_inkind
--
DROP TABLE IF EXISTS tbl_inkind;
CREATE TABLE tbl_inkind (
  id_inkind INT(11) NOT NULL AUTO_INCREMENT,
  id_parent INT(11) DEFAULT NULL,
  inkind CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_inkind),
  CONSTRAINT FK_inkind_kind_parent_id_parent FOREIGN KEY (id_parent)
    REFERENCES tbl_kindparent(id_parent) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 16
AVG_ROW_LENGTH = 1170
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы pattern_inkind
--
DROP TABLE IF EXISTS pattern_inkind;
CREATE TABLE pattern_inkind (
  id_pattern_inkind INT(11) NOT NULL AUTO_INCREMENT,
  id_inkind INT(11) DEFAULT NULL,
  id_pattern INT(11) DEFAULT NULL,
  PRIMARY KEY (id_pattern_inkind),
  CONSTRAINT FK_pattern_inkind_inkind_id_inkind FOREIGN KEY (id_inkind)
    REFERENCES tbl_inkind(id_inkind) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_pattern_inkind_list_pattern_id_pattern FOREIGN KEY (id_pattern)
    REFERENCES list_pattern(id_pattern) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы tbl_product
--
DROP TABLE IF EXISTS tbl_product;
CREATE TABLE tbl_product (
  id_product INT(11) NOT NULL AUTO_INCREMENT,
  name_product CHAR(20) DEFAULT NULL,
  id_inkind INT(11) DEFAULT NULL,
  cost INT(11) DEFAULT NULL,
  sum INT(11) DEFAULT NULL,
  id_producer INT(11) DEFAULT NULL,
  img TEXT DEFAULT NULL,
  material CHAR(20) DEFAULT NULL,
  color CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_product),
  CONSTRAINT FK_product FOREIGN KEY (id_inkind)
    REFERENCES tbl_inkind(id_inkind) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_product_producer_id_producer FOREIGN KEY (id_producer)
    REFERENCES tbl_producer(id_producer) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 51
AVG_ROW_LENGTH = 341
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы pattern_product
--
DROP TABLE IF EXISTS pattern_product;
CREATE TABLE pattern_product (
  id_pattern_product INT(11) NOT NULL AUTO_INCREMENT,
  id_product INT(11) DEFAULT NULL,
  id_pattern_inkind INT(11) DEFAULT NULL,
  value CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_pattern_product),
  CONSTRAINT FK_pattern_product_pattern_inkind_id_pattern_inkind FOREIGN KEY (id_pattern_inkind)
    REFERENCES pattern_inkind(id_pattern_inkind) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_pattern_product_product_id_product FOREIGN KEY (id_product)
    REFERENCES tbl_product(id_product) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы tbl_lists
--
DROP TABLE IF EXISTS tbl_lists;
CREATE TABLE tbl_lists (
  id_list INT(11) NOT NULL AUTO_INCREMENT,
  id_import INT(11) DEFAULT NULL,
  id_product INT(11) DEFAULT NULL,
  quantity INT(11) DEFAULT NULL,
  price INT(11) DEFAULT NULL,
  PRIMARY KEY (id_list),
  CONSTRAINT FK_tbl_list_tbl_import_id_import FOREIGN KEY (id_import)
    REFERENCES tbl_import(id_import) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_tbl_list_tbl_product_id_product FOREIGN KEY (id_product)
    REFERENCES tbl_product(id_product) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 19
AVG_ROW_LENGTH = 1260
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы buyerin
--
INSERT INTO buyerin VALUES
(1, 'aa', 'aa'),
(2, 'aa', 'aa'),
(3, 'aa', 'aa'),
(4, 'aa', 'aa'),
(5, 'aa', 'aa'),
(6, 'aa', 'aa'),
(7, 'aa', 'aa'),
(8, 'aa', 'aa'),
(9, 'aa', 'aa'),
(10, 'aa', 'aa'),
(11, 'aa', 'aa'),
(12, 'aa', 'aa'),
(13, 'aa', 'aa'),
(14, 'aa', 'aa'),
(15, 'aaa', 'ssss'),
(16, 'aa', 'aa'),
(17, 'aa', 'aa'),
(18, 'zz', 'zz'),
(19, 'zz', 'zz'),
(20, 'zz', 'zz'),
(21, 'zz', 'zz');

-- 
-- Вывод данных для таблицы hours_import
--

-- Таблица shoes.hours_import не содержит данных

-- 
-- Вывод данных для таблицы list_pattern
--

-- Таблица shoes.list_pattern не содержит данных

-- 
-- Вывод данных для таблицы tbl_kindparent
--
INSERT INTO tbl_kindparent VALUES
(1, 'Женская'),
(2, 'Мужская'),
(3, 'Детская');

-- 
-- Вывод данных для таблицы tbl_producer
--
INSERT INTO tbl_producer VALUES
(1, 'Rieker', 'Германия'),
(2, 'Wilmar', 'Италия'),
(3, 'Марко', 'Беларусь'),
(4, 'King boots', 'США'),
(5, 'Tamaris', 'Германия');

-- 
-- Вывод данных для таблицы tbl_status
--
INSERT INTO tbl_status VALUES
(1, 'STATUS_ORDER', 1, 'Import'),
(2, 'STATUS_BUY', 2, 'Import');

-- 
-- Вывод данных для таблицы tbl_user
--
INSERT INTO tbl_user VALUES
(87, 'Стануль', 'Елена', 'Дмитриевна', 'Александрова,19-98', NULL, '80297773524', 'demo', '$2y$13$G7ugVA.cR5EaCPbsU8lvIOuKmKFJXmtH2DaGtWJQhvZ6chgwiLt6O', NULL, NULL, NULL),
(90, '', 'Петр', '', '', NULL, '8033698700', '', '', '1200', NULL, NULL),
(174, 'Стануль', 'Елена', 'Дмтриевна', 'ул.Сибирякова,д.15,кв.3', NULL, '+375-29-6549875', 'admin', '$2y$13$SZ6tXb13Pt.Irn86228f2.NJm45jtB0tkaKEnhxcTJZl9hTwDHqtG', NULL, 'ariada_@mail.ru', NULL);

-- 
-- Вывод данных для таблицы tbl_import
--
INSERT INTO tbl_import VALUES
(129, NULL, 87, 60, '1449860724', 'C 8 00 до 12 00', ''),
(130, NULL, 87, 82, '1449860773', 'C 8 00 до 12 00', ''),
(133, NULL, 87, 31, '1449860935', '', ''),
(134, NULL, 87, 71, '1449861052', '', ''),
(135, NULL, 87, 40, '1449861462', '', ''),
(136, NULL, 87, 40, '1449925350', '', ''),
(137, NULL, 87, 31, '1450083440', 'C 18 00 до 22 00', 'ул. Дуброука 23-65'),
(138, NULL, 87, 20, '1450083516', '', ''),
(139, NULL, 87, 20, '1450083627', '', ''),
(140, NULL, 87, NULL, '1450084454', NULL, NULL),
(141, NULL, 87, NULL, '1450084461', NULL, NULL),
(142, NULL, 87, NULL, '1450084637', NULL, NULL),
(143, NULL, 87, 440, '1450088480', '', 'фя'),
(144, NULL, 87, NULL, '1450099957', '', ''),
(145, 1, 87, 20, '1450182428', 'C 8 00 до 12 00', 'г.Минск,пр.Машерова 23-12'),
(146, 1, 174, 55, '1451051206', '', 'П.Бровки 56-35');

-- 
-- Вывод данных для таблицы tbl_inkind
--
INSERT INTO tbl_inkind VALUES
(1, 1, 'Туфли'),
(2, 1, 'Балетки'),
(3, 1, 'Ботинки'),
(5, 1, 'Сапоги'),
(6, 1, 'Босоножки'),
(7, 2, 'Туфли'),
(8, 2, 'Кроссовки'),
(9, 2, 'Мокасины'),
(10, 2, 'Сапоги'),
(11, 2, 'Кеды'),
(12, 3, 'Ботинки'),
(13, 3, 'Сапоги'),
(14, 3, 'Кроссовки'),
(15, 3, 'Резиновая обувь');

-- 
-- Вывод данных для таблицы pattern_inkind
--

-- Таблица shoes.pattern_inkind не содержит данных

-- 
-- Вывод данных для таблицы tbl_product
--
INSERT INTO tbl_product VALUES
(1, 'Туфли', 1, 20, 2, 1, '../images/T1.jpg', NULL, NULL),
(2, 'Балетки', 2, 35, 4, 3, '../images/B1.jpg', NULL, NULL),
(3, 'Сапоги', 5, 40, 1, 5, '../images/S1.jpg', NULL, NULL),
(4, 'Кроссовки', 8, 15, 3, 2, '../images/KR1.jpg', NULL, NULL),
(5, 'Кеды', 11, 13, 4, 4, '../images/K1.jpg', NULL, NULL),
(6, 'Сапоги', 13, 12, 5, 5, '../images/DS1.jpg', NULL, NULL),
(7, 'Резиновые сапоги', 15, 11, 1, 3, '../images/DRS1.jpg', NULL, NULL),
(8, 'Туфли', 1, 35, 1, 3, '../images/T2.jpg', NULL, NULL),
(9, 'Туфли', 1, 23, 2, 2, '../images/T3.jpg', NULL, NULL),
(10, 'Tуфли', 1, 13, 5, 4, '../images/T4.jpg', NULL, NULL),
(11, 'Tуфли', 1, 15, 4, 5, '../images/T5.jpg', NULL, NULL),
(12, 'Tуфли', 1, 16, 5, 4, '../images/T6.jpg', NULL, NULL),
(13, 'Tуфли', 1, 17, 4, 4, '../images/T7.jpg', NULL, NULL),
(14, 'Tуфли', 1, 18, 5, 3, '../images/T8.jpg', NULL, NULL),
(15, 'Tуфли', 1, 19, 4, 2, '../images/T9.jpg', NULL, NULL),
(16, 'Tуфли', 1, 20, 5, 1, '../images/T10.jpg', NULL, NULL),
(17, 'Tуфли', 1, 21, 7, 2, '../images/T11.jpg', NULL, NULL),
(18, 'Tуфли', 1, 22, 5, 3, '../images/T12.jpg', NULL, NULL),
(19, 'Tуфли', 1, 23, 7, 4, '../images/T13.jpg', NULL, NULL),
(20, 'Tуфли', 1, 24, 6, 5, '../images/T14.jpg', NULL, NULL),
(21, 'Tуфли', 1, 25, 7, 4, '../images/T15.jpg', NULL, NULL),
(22, 'Tуфли', 1, 26, 5, 2, '../images/T16.jpg', NULL, NULL),
(23, 'Tуфли', 1, 27, 7, 1, '../images/T17.jpg', NULL, NULL),
(24, 'Tуфли', 1, 28, 5, 2, '../images/T18.jpg', NULL, NULL),
(25, 'Tуфли', 1, 40, 7, 3, '../images/T19.jpg', NULL, NULL),
(26, 'Tуфли', 1, 15, 5, 3, '../images/T20.jpg', NULL, NULL),
(27, 'Tуфли', 1, 34, 7, 1, '../images/T21.jpg', NULL, NULL),
(28, 'Кроссовки', 8, 34, 2, 2, '../images/KR2.jpg', NULL, NULL),
(29, 'Кроссовки', 8, 45, 33, 2, '../images/KR3.jpg', NULL, NULL),
(30, 'Кроссовки', 8, 45, 33, 1, '../images/KR4.jpg', NULL, NULL),
(31, 'Кроссовки', 8, 33, 3, 3, '../images/KR5.jpg', NULL, NULL),
(32, 'Кроссовки', 8, 43, 3, 4, '../images/KR6.jpg', NULL, NULL),
(33, 'Кроссовки', 8, 2, 3, 5, '../images/KR7.jpg', NULL, NULL),
(34, 'Кроссовки', 8, 23, 3, 1, '../images/KR8.jpg', NULL, NULL),
(35, 'Кроссовки', 8, 44, 3, 2, '../images/KR9.jpg', NULL, NULL),
(36, 'Кроссовки', 8, 22, 1, 1, '../images/KR10.jpg', NULL, NULL),
(37, 'Ботинки', 12, 22, 2, 2, '../images/DB1.jpg', NULL, NULL),
(38, 'Ботинки', 12, 45, 1, 5, '../images/DB2.jpg', NULL, NULL),
(39, 'Ботинки', 12, 12, 2, 2, '../images/DB3.jpg', NULL, NULL),
(40, 'Ботинки', 12, 32, 4, 4, '../images/DB4.jpg', NULL, NULL),
(41, 'Ботинки', 12, 44, 4, 2, '../images/DB5.jpg', NULL, NULL),
(42, 'Ботинки', 12, 33, 5, 5, '../images/DB6.jpg', NULL, NULL),
(43, 'Ботинки', 12, 33, 5, 4, '../images/DB7.jpg', NULL, NULL),
(44, 'Ботинки', 12, 22, 6, 3, '../images/DB8.jpg', NULL, NULL),
(45, 'Ботинки', 12, 77, 6, 2, '../images/DB9.jpg', NULL, NULL),
(46, 'Ботинки', 12, 56, 5, 1, '../images/DB10.jpg', NULL, NULL),
(47, 'Ботинки', 12, 44, 4, 3, '../images/DB11.jpg', NULL, NULL),
(48, 'Ботинки', 12, 44, 5, 4, '../images/DB12.jpg', NULL, NULL);

-- 
-- Вывод данных для таблицы pattern_product
--

-- Таблица shoes.pattern_product не содержит данных

-- 
-- Вывод данных для таблицы tbl_lists
--
INSERT INTO tbl_lists VALUES
(1, 129, 1, 3, 60),
(2, 130, 7, 2, 22),
(3, 133, 1, 1, 20),
(4, 133, 7, 1, 11),
(5, 134, 1, 3, 60),
(6, 134, 7, 1, 11),
(7, 135, 1, 2, 40),
(8, 136, 1, 2, 40),
(9, 137, 1, 1, 20),
(10, 137, 7, 1, 11),
(11, 138, 1, 1, 20),
(12, 139, 1, 1, 20),
(13, NULL, 1, 1, 20),
(14, NULL, 1, 1, 20),
(15, 143, 1, 22, 440),
(16, 145, 1, 1, 20),
(17, 146, 1, 1, 20),
(18, 146, 8, 1, 35);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;