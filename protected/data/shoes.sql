--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.3.358.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 08.01.2016 15:53:51
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
USE shoes;

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
AUTO_INCREMENT = 175
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
(85, 'Стануль', 'Елена', 'Дмитриевна', 'Александрова 19,98', NULL, '8029666300000', 'aa', 'aa', '1500', NULL, NULL),
(86, 'Стануль', 'Елена', 'Дмитриевна', 'Александрова 19,98', NULL, '123', 'aa', 'aa', NULL, NULL, NULL),
(87, 'Стануль', 'Елена', 'Дмитриевна', 'Александрова,19-98', NULL, '80297773524', 'demo', '$2y$13$G7ugVA.cR5EaCPbsU8lvIOuKmKFJXmtH2DaGtWJQhvZ6chgwiLt6O', NULL, NULL, NULL),
(88, 'Петров', 'Михаил', 'Эдуардович', 'Александрова 19,98', NULL, '80293562414', 'aa', 'aa', NULL, NULL, NULL),
(89, 'Петров', 'Михаил', 'Эдуардович', 'Александрова 19,98', NULL, '80293562414', 'aa', 'aa', NULL, NULL, NULL),
(90, 'Шамров', 'Петр', 'Семенович', 'Семашко', NULL, '8033698700', 'zz', 'zz', '1200', NULL, NULL),
(91, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL, NULL, NULL),
(92, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL, NULL, NULL),
(93, NULL, NULL, NULL, 'Семашко', NULL, NULL, NULL, NULL, '12', NULL, NULL),
(94, NULL, NULL, NULL, 'УРУЧЬЕ', NULL, NULL, NULL, NULL, '1500', NULL, NULL),
(95, NULL, NULL, NULL, 'Любимова', NULL, NULL, NULL, NULL, '1200', NULL, NULL),
(96, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL, NULL, NULL),
(97, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL, NULL, NULL),
(98, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL, NULL, NULL),
(99, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL, NULL, NULL),
(100, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL, NULL, NULL),
(101, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL, NULL, NULL),
(102, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(103, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(104, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(105, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(106, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(107, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(108, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(109, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(110, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(111, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(112, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(113, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(114, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(115, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(116, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(117, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(118, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(119, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL, NULL, NULL),
(121, 'Захарич', 'Мария', 'Александровна', 'пр.Известия 15-24', NULL, '234-12-23', 'masha', NULL, NULL, 'ssas@hg.ru', NULL),
(122, 'Захарич', 'Мария', 'Дмитриевна', 'пр.Известия 15-24', NULL, '678844334', 'gffd', NULL, NULL, 'jhhg', NULL),
(123, 'Захарич', 'Мария', 'Дмитриевна', 'пр.Известия 15-24', NULL, '678844334', 'gffd', '$2y$13$S0eDhA6Q7Ag8Lqp2Al/0yuAYBvt6FOVTrQUswjEfvVphg3hSRN/oq', NULL, 'jhhg', NULL),
(124, 'Захарич', 'Мария', 'Дмитриевна', 'пр.Известия 15-24', NULL, '678844334', 'gffd', '$2y$13$/DoMRRmMAd8j3WeEDOFZNutXQom9ZWK6x0IikxxmCHgI4klGOlxGu', NULL, 'jhhg', NULL),
(125, 'Захарич', 'Мария', 'Дмитриевна', 'пр.Известия 15-24', NULL, '678844334', 'gffd', '$2y$13$wSLjp86Y3NIDYC.p.iFkmeG7BnHhFcC0LUYgFgBI99pqWmwAJJ0Hi', NULL, 'jhhg', NULL),
(126, 'Петров', 'Петр', 'Иванов', 'пр.Известия 15-24', NULL, '2112343', 'aa', '$2y$13$Aozwc58PxvRgsxYYLe63pO4XzI79YeRqYEed4li0wiriuAEZnPJfm', NULL, 'fghfhh', NULL),
(127, 'ыыва', 'ва', 'аа', 'выава', NULL, '43241', 'qq', '$2y$13$3srzp551QhkF.DyOYuOrk.6ph2olEXrxNwHklL6soCY6c5p..oG5S', NULL, 'fsd', NULL),
(128, 'dfd', 'fg', 'dfd', 'dfa', NULL, '342', 'qq', '$2y$13$z9LNOiFRAHwnYQ6DSC1N..ZPFJX/5BkguBXr4GIVQVN6CA3UmiDiS', NULL, 'dfdsf', NULL),
(129, 'asd', 'sfds', 'xc', 'csd', NULL, '213', 'd', '$2y$13$eS564lWKbiHGaxmGkCoBcOaz7njYRe0a1w4RzlDSuH1JDrjFwF2Qq', NULL, 'vdf', NULL),
(130, 'grre', 'rfgr', 'rt', 'rg', NULL, '45', 'dfd', '$2y$13$jJ5gOLbMZJnzN6EF4NhN2u.FQATaED3/1JDjenJfoiesVknqkLEuq', NULL, 'rert', NULL),
(131, 'sdd', 'sd', 'ds', 'sds', NULL, '333', 'sds', '$2y$13$ug1JYrfS1kzYCrYcEIolXeYf/yjXU/dKE6ML6Vnl5gHb7KDzs2UB6', NULL, 'dfdsf', NULL),
(132, 'sdd', 'sd', 'ds', 'sds', NULL, '333', 'sds', '$2y$13$ZufKD95GzaE9gqtfraA4PuafUT7jitZo8ZkaugoAwgMtL.XJMP3hS', NULL, 'dfdsf', NULL),
(133, 'sdd', 'sd', 'ds', 'sds', NULL, '333', 'sds', '$2y$13$MbB0HGQ7fGBrw5X7TFLimum26sEGfq6aICmQmuzUKuHmp09gE.I8y', NULL, 'dfdsf', NULL),
(134, 'sdd', 'sd', 'ds', 'sds', NULL, '333', 'sds', '$2y$13$u8G.Ca1IjOjZUWA1X.bqkeYcHU/bcvocIUT8tZ2Xd2rXjKNXx7rvi', NULL, 'dfdsf', NULL),
(135, 'sdd', 'sd', 'ds', 'sds', NULL, '333', 'sds', '$2y$13$fuesQXvVsaNcgZwvZ5FFhuR63lwErlVY9Oya9/Z5Ox23YN4qji6jG', NULL, 'dfdsf', NULL),
(136, 'sdd', 'sd', 'ds', 'sds', NULL, '333', 'sds', '$2y$13$2dZhqysj.UoltJEKdFsJ/.h5iz6IP3k/hVSO.4Oek0HxRl4qvqy6K', NULL, 'dfdsf', NULL),
(137, 'sdd', 'sd', 'ds', 'sds', NULL, '333', 'sds', '$2y$13$JmhWXXeZ8KrirlKM.aOhbuPGuvB.w6ZW2D/Zby7SNWJxDkX5/BIfu', NULL, 'dfdsf', NULL),
(138, 'ss', 'ss', 'ss', 'ss', NULL, '1212', '323', '$2y$13$ikt1WOVQrwt5GvvuJ8D/l.vWtfFNfqah85hTU4vw3rgDc6V2gyFZm', NULL, '43443', NULL),
(139, 'rer', 'rer', 'rr', 'er', NULL, '23', 'fff', '$2y$13$BRG7cUO85mSk7XkAnRu/VuqlDYW3efCFfJF9ti/PgdY2gUHdNAJY2', NULL, 'err', NULL),
(140, 'rer', 'rer', 'rr', 'er', NULL, '23', 'fff', '$2y$13$5LpnfD.wpn/5mP6jJz0gTude8BAYv7obCov1LbT.WFO5gyu32s1Em', NULL, 'err', NULL),
(141, 'ff', 'ffd', 'fg', 'f', NULL, '324', 'fd', '$2y$13$Ir.0fO49qzwwyzg7.gmumu.FVT06EaAJ8SXHS7zl/zmi.6PLssvUa', NULL, 'et', NULL),
(142, 'ff', 'ffd', 'fg', 'f', NULL, '324', 'fd', '$2y$13$oIFKzkJfby6nULD9FftYYucyLW5uIX2wJ4J7kItV3WsxXJ8RT2wY.', NULL, 'et', NULL),
(143, 'ff', 'ffd', 'fg', 'f', NULL, '324', 'fd', '$2y$13$HcA3BcGvXaj59lfNX1GeK.TVL8K5osS9vKWFOp25hsCwxaGPA6Wei', NULL, 'et', NULL),
(144, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'dd', '$2y$13$8saaPeAHV2PDno7LlPaOh.5CEp3e063GZNk.S8nhzIJnYX1Wu3lyK', NULL, 'dd', NULL),
(145, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'dd', '$2y$13$zm00aGNqqTNdlLnfbabOn./75GNEQcwu6WKsbwWtEExyby4Zu6s9i', NULL, 'dd', NULL),
(146, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'dd', '$2y$13$r2FNffkt1OJ8wYNEOugk0.XsA3cZ3h7URwBubPsjxCNRX/G23hM5y', NULL, 'dd', NULL),
(147, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'dd', '$2y$13$ajxqwQRGpVgvOYzp4VJlzuQ/0DcRw2njGyEtJ2Kq0itf2suP9qp9e', NULL, 'dd', NULL),
(148, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'demo', '$2y$13$zJwglI4.DdeR16lb3CQFCOd0BEWc//.o5/QeTvHSl5I.2TzZ63gfC', NULL, 'dd', NULL),
(149, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'demo', '$2y$13$jY3vnbTFaiIBXOoU80fyheW3twWCjiAkjxwFjAS9VmfkopnpB8.XC', NULL, 'dd', NULL),
(150, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'demo', '$2y$13$oAogTxmuRd0mnO7dJGg1k.5vYjUgOYUZimHDD3yRBbtntwzHawPlO', NULL, 'dd', NULL),
(151, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'demo', '$2y$13$DdXOlsRoYqAYZmvQMcyZ7OPKnzCbVMPoZBO1MgbklhX3FwcEP5e.a', NULL, 'dd', NULL),
(152, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'demo', '$2y$13$.V4Fwwf9Pmfz8XTt/mUkneK35elDSM7.1rvTgkPlqK/8khOTgZKl6', NULL, 'dd', NULL),
(153, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'demo', '$2y$13$GzbUdjyHF6UQM1AzwvhOIuWVHRxSZo/Zsh1L1t8Xs920RAGC4/2VS', NULL, 'dd', NULL),
(154, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'demo', '$2y$13$TuvYFTmDEzkT.wFBuPVue.D13MXlC9OleeZ8q7dyIQCIJj4GL833i', NULL, 'dd', NULL),
(155, 'fdf', 'dd', 'dd', 'dd', NULL, 'dd', 'demo', '$2y$13$UNnW2rXYP7kwTLTFGotjA.lQKKBPqhmgQr/r1SwClXv3cvopvWmv2', NULL, 'dd', NULL),
(156, 'Стануль', 'Елена', 'Дмитриевна', 'пр.Любимова 19-1-19', NULL, '270-61-91', 'lena', '$2y$13$xbz7Vup2dkuEna6Zqyynu.Ix/fh0S/7.ww5wYv6ayiikOlIufFizC', NULL, 'ariada_@mail.ru', NULL),
(157, 'Петрова', 'Ирина', 'Александровна', 'ул.Сибирякова,д.15,кв.3', NULL, '+375-29-6549875', 'aa', '$2y$13$LjpAKc9/ajdU.ELbvqPw/.ueIIQrqnJsONz8xSw1RO4pLE.unxkby', NULL, 'asre@mail.ru', NULL),
(158, 'Захарич', 'Татьяна', 'Александровна', 'ул.Сибирякова,д.15,кв.3', NULL, '+375-29-6674433', 'kk', '$2y$13$TnMX.UZVrl8/vK4mOaQ5LeSdnwCQMHZYqOHvcVJUIZj6LEpQpzbmC', NULL, 'ssas@hg.ru', NULL),
(159, 'Симакова', 'Елена', 'Григорьевна', 'ул.Пертровка,д.15,кв.3', NULL, '+375-29-3333332', '22', '$2y$13$9CTTyf3IAPvwdzMX3DbQ7.ngOUSpXBuX3CE2VqJh.ZJV5KiMSU3Eq', NULL, 'sg@mail.ru', NULL),
(160, '', '', '', '', NULL, '', 'asad', '$2y$13$ZGd3DZvw8QUNSvSrQuhwn.FIUilMSjkoIpvD5PxX8nkdrYsF3kGwC', NULL, '', NULL),
(161, '', '', '', '', NULL, '', 'asa', '$2y$13$Tx/.31HO0oLutAf0oj8xI.LurBdJNitCHIYegWtQgk1fsDp7tVSYq', NULL, '', NULL),
(162, '', '', '', '', NULL, '', 'aaa', '$2y$13$fC8tXoYHwLQKOLl3CRmjFutYdtD2QT6bWA1ueucwGtkoEyQzxIBIe', NULL, '', NULL),
(163, '', '', '', '', NULL, '', 'ddd', '$2y$13$XHcyaqUiGcHnRebcUxyzyuHBzRrHgKYtQQN4TlS1J3Wo43hrMgjKS', NULL, '', NULL),
(164, '', '', '', '', NULL, '', '', '$2y$13$t0pLLJCApWrL7EeJC38qvO2t7N4XV8Ke3VYiq19OhCDBjTaSJdQwm', NULL, '', NULL),
(165, 'Стаунуль', 'Елена', 'Дмитриевна', 'ул. П.Бровки', 1, '+375-29-7763252', 'afgfd', 'admin', '', 'arhf_@hjg.ru', NULL),
(166, 'Стаунло', 'выа', 'ыфвв', 'П.Бровки', NULL, '+375-33-5457865', '123', '123', NULL, 'fgd@hgghg.ru', NULL),
(167, 'Поло', 'ав', 'ваваа', 'ва', NULL, '+375-33-5457865', 'gfgfh', '$2y$13$JvaM3BgVSn.FWI3zHY43LeCLsG69MYw2ZpjGhy9wrucfPhieQrV2G', NULL, 'ghff@hjjg.ru', NULL),
(168, 'Поло', 'ав', 'ваваа', 'ва', NULL, '+375-33-5457865', 'ghfhf', '$2y$13$72eZHPRLWaECYbXJlN130.84N74gLMwYDfDBM29/apKl.HwnpNesC', NULL, 'ghff@hjjg.ru', NULL),
(169, 'Иолорлврл', 'пркенрк', 'кенкнкен', 'првнгнег76', NULL, '+375-29-7763252', '222222222', '$2y$13$DQteBFWpg.eBcM2Zsu0DlOIqK0LiACoMEpcm3yXvpHacWsshSmtzm', NULL, 'hjg@jhjh.ru', NULL),
(170, 'ыыыыыы', 'ыыыыыыыыыы', 'ыыыыыыыыыыыы', 'ыыыыыыыыыы', NULL, '+375-29-7763252', '3333333333', '$2y$13$6bDvI4onhKQ/I5RwIn9bee3gR5KRDnPvF5qS31NDmlQSorsZ6CgLu', NULL, 'arhf_@hjg.ru', NULL),
(171, 'ропрсос', 'ввв', 'вввв', 'ввв', NULL, '+375-29-7763252', '2222', '$2y$13$F4OMbRIIcxG3CryuFwnUZ.HkuC1qZR3skg9wEqjbstDXhrK4dM1JW', NULL, 'fd@kjk.ru', NULL),
(172, 'сс', 'ссс', 'сс', 'сс', 3, '+375-29-7763252', 'dddsss', '$2y$13$EhGLng54LDocD9MU0ZEjCe5hVcTJJHThhIKIq0ps3TSkRLEC.IQnS', 'sdd', 'arhf_@hjg.ru', NULL),
(173, '', '', '', '', 1, '', '', '$2y$13$DF4jVYyqUjo1ZXkfHy7i2O9i1.3cKhFeJlKjE9hGDkcEjWwhArJO.', '', '', NULL),
(174, 'Стануль', 'Елена', 'Дмтриевна', 'ул.Сибирякова,д.15,кв.3', NULL, '+375-29-6549875', 'admin', '$2y$13$SZ6tXb13Pt.Irn86228f2.NJm45jtB0tkaKEnhxcTJZl9hTwDHqtG', NULL, 'ariada_@mail.ru', NULL);

-- 
-- Вывод данных для таблицы tbl_import
--
INSERT INTO tbl_import VALUES
(78, 9, 90, NULL, NULL, NULL, NULL),
(79, 3, 90, NULL, NULL, NULL, NULL),
(80, 9, 90, NULL, NULL, NULL, NULL),
(81, 9, 90, NULL, NULL, NULL, NULL),
(82, 6, 90, NULL, NULL, NULL, NULL),
(83, 7, 90, NULL, NULL, NULL, NULL),
(84, 3, 90, NULL, NULL, NULL, NULL),
(85, NULL, NULL, NULL, NULL, 'C 8 00 до 12 00', 'пр.Любимова 20-1-32'),
(86, NULL, NULL, NULL, NULL, 'C 18 00 до 22 00', 'пр.Независимости 123-1'),
(87, NULL, 87, NULL, NULL, 'C 18 00 до 22 00', 'ул.Рафиева 15-23'),
(88, NULL, 87, NULL, NULL, 'C 8 00 до 12 00', 'Ул.Янки Брыля 18-13'),
(89, NULL, 87, NULL, NULL, 'C 8 00 до 12 00', 'пр.Независимости 123-1'),
(90, NULL, 87, NULL, NULL, 'C 8 00 до 12 00', 'пр.Любимова 20-1-32'),
(91, NULL, 87, NULL, NULL, 'C 8 00 до 12 00', 'пр.Любимова 20-1-32'),
(92, NULL, 87, NULL, NULL, 'C 18 00 до 22 00', 'ул.П.Бровки'),
(93, NULL, 87, NULL, NULL, 'C 18 00 до 22 00', 'ул.П.Бровки'),
(94, NULL, 87, NULL, NULL, 'C 8 00 до 12 00', 'Московская,28-2'),
(95, NULL, 87, NULL, NULL, 'C 8 00 до 12 00', 'Московская,28-2'),
(96, NULL, 87, NULL, NULL, '', 'Московкая 23-1'),
(97, NULL, 87, NULL, NULL, 'C 8 00 до 12 00', 'Петровка 23-24'),
(98, NULL, 87, NULL, NULL, 'C 8 00 до 12 00', 'Петровка 23-24'),
(99, NULL, 87, NULL, NULL, 'C 18 00 до 22 00', ''),
(100, NULL, 87, NULL, NULL, 'C 18 00 до 22 00', ''),
(101, NULL, 87, NULL, NULL, '', ''),
(102, NULL, 87, NULL, NULL, '', ''),
(103, NULL, 87, NULL, NULL, '', ''),
(104, NULL, 87, 0, NULL, '', ''),
(105, NULL, 87, 0, NULL, '', ''),
(106, NULL, 87, 0, NULL, '', ''),
(107, NULL, 87, 0, NULL, '', ''),
(108, NULL, 87, 0, NULL, '', ''),
(109, NULL, 87, 0, '1449850831', 'C 8 00 до 12 00', 'Петровщина 29-32'),
(110, NULL, 87, 0, '1449851546', 'C 8 00 до 12 00', 'Петровщина 29-32'),
(113, NULL, 87, 0, '1449851974', 'C 8 00 до 12 00', 'Петровщина 29-32'),
(114, NULL, 87, 0, '1449851983', 'C 8 00 до 12 00', 'Петровщина 29-32'),
(115, NULL, 87, 0, '1449852357', 'C 8 00 до 12 00', 'Петровщина 29-32'),
(116, NULL, 87, 0, '1449852394', 'C 8 00 до 12 00', 'Петровщина 29-32'),
(117, NULL, 87, 0, '1449852524', 'C 8 00 до 12 00', 'Петровщина 29-32'),
(118, NULL, 87, 0, '1449859265', 'C 8 00 до 12 00', 'Петровщина 29-32'),
(119, NULL, 87, 0, '1449859308', 'C 8 00 до 12 00', 'Петровщина 29-32'),
(120, NULL, 87, 55, '1449859811', '', ''),
(121, NULL, 87, 40, '1449859921', '', ''),
(122, NULL, 87, 60, '1449860051', '', ''),
(123, NULL, 87, 0, '1449860098', '', ''),
(124, NULL, 87, 40, '1449860116', 'C 8 00 до 12 00', ''),
(125, NULL, 87, 0, '1449860333', 'C 8 00 до 12 00', ''),
(126, NULL, 87, 20, '1449860353', 'C 8 00 до 12 00', ''),
(127, NULL, 87, 20, '1449860557', 'C 8 00 до 12 00', ''),
(128, NULL, 87, 60, '1449860640', 'C 8 00 до 12 00', ''),
(129, NULL, 87, 60, '1449860724', 'C 8 00 до 12 00', ''),
(130, NULL, 87, 82, '1449860773', 'C 8 00 до 12 00', ''),
(131, NULL, 87, 0, '1449860903', 'C 8 00 до 12 00', ''),
(132, NULL, 87, 0, '1449860920', 'C 8 00 до 12 00', ''),
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
(1, 'Туфли', 1, 20, 2, 1, 'http://localhost/shop/img/T1.jpg', NULL, NULL),
(2, 'Балетки', 2, 35, 4, 3, 'http://localhost/shop/img/B1.jpg', NULL, NULL),
(3, 'Сапоги', 5, 40, 1, 5, 'http://localhost/shop/img/S1.jpg', NULL, NULL),
(4, 'Кроссовки', 8, 15, 3, 2, 'http://localhost/shop/img/KR1.jpg', NULL, NULL),
(5, 'Кеды', 11, 13, 4, 4, 'http://localhost/shop/img/K1.jpg', NULL, NULL),
(6, 'Сапоги', 13, 12, 5, 5, 'http://localhost/shop/img/DS1.jpg', NULL, NULL),
(7, 'Резиновые сапоги', 15, 11, 1, 3, 'http://localhost/shop/img/DRS1.jpg', NULL, NULL),
(8, 'Туфли', 1, 35, 1, 3, 'http://localhost/shop/img/T2.jpg', NULL, NULL),
(9, 'Туфли', 1, 23, 2, 2, 'http://localhost/shop/img/T3.jpg', NULL, NULL),
(10, 'Tуфли', 1, 13, 5, 4, 'http://localhost/shop/img/T4.jpg', NULL, NULL),
(11, 'Tуфли', 1, 15, 4, 5, 'http://localhost/shop/img/T5.jpg', NULL, NULL),
(12, 'Tуфли', 1, 16, 5, 4, 'http://localhost/shop/img/T6.jpg', NULL, NULL),
(13, 'Tуфли', 1, 17, 4, 4, 'http://localhost/shop/img/T7.jpg', NULL, NULL),
(14, 'Tуфли', 1, 18, 5, 3, 'http://localhost/shop/img/T8.jpg', NULL, NULL),
(15, 'Tуфли', 1, 19, 4, 2, 'http://localhost/shop/img/T9.jpg', NULL, NULL),
(16, 'Tуфли', 1, 20, 5, 1, 'http://localhost/shop/img/T10.jpg', NULL, NULL),
(17, 'Tуфли', 1, 21, 7, 2, 'http://localhost/shop/img/T11.jpg', NULL, NULL),
(18, 'Tуфли', 1, 22, 5, 3, 'http://localhost/shop/img/T12.jpg', NULL, NULL),
(19, 'Tуфли', 1, 23, 7, 4, 'http://localhost/shop/img/T13.jpg', NULL, NULL),
(20, 'Tуфли', 1, 24, 6, 5, 'http://localhost/shop/img/T14.jpg', NULL, NULL),
(21, 'Tуфли', 1, 25, 7, 4, 'http://localhost/shop/img/T15.jpg', NULL, NULL),
(22, 'Tуфли', 1, 26, 5, 2, 'http://localhost/shop/img/T16.jpg', NULL, NULL),
(23, 'Tуфли', 1, 27, 7, 1, 'http://localhost/shop/img/T17.jpg', NULL, NULL),
(24, 'Tуфли', 1, 28, 5, 2, 'http://localhost/shop/img/T18.jpg', NULL, NULL),
(25, 'Tуфли', 1, 40, 7, 3, 'http://localhost/shop/img/T19.jpg', NULL, NULL),
(26, 'Tуфли', 1, 15, 5, 3, 'http://localhost/shop/img/T20.jpg', NULL, NULL),
(27, 'Tуфли', 1, 34, 7, 1, 'http://localhost/shop/img/T21.jpg', NULL, NULL),
(28, 'Кроссовки', 8, 34, 2, 2, 'http://localhost/shop/img/KR2.jpg', NULL, NULL),
(29, 'Кроссовки', 8, 45, 33, 2, 'http://localhost/shop/img/KR3.jpg', NULL, NULL),
(30, 'Кроссовки', 8, 45, 33, 1, 'http://localhost/shop/img/KR4.jpg', NULL, NULL),
(31, 'Кроссовки', 8, 33, 3, 3, 'http://localhost/shop/img/KR5.jpg', NULL, NULL),
(32, 'Кроссовки', 8, 43, 3, 4, 'http://localhost/shop/img/KR6.jpg', NULL, NULL),
(33, 'Кроссовки', 8, 2, 3, 5, 'http://localhost/shop/img/KR7.jpg', NULL, NULL),
(34, 'Кроссовки', 8, 23, 3, 1, 'http://localhost/shop/img/KR8.jpg', NULL, NULL),
(35, 'Кроссовки', 8, 44, 3, 2, 'http://localhost/shop/img/KR9.jpg', NULL, NULL),
(36, 'Кроссовки', 8, 22, 1, 1, 'http://localhost/shop/img/KR10.jpg', NULL, NULL),
(37, 'Ботинки', 12, 22, 2, 2, 'http://localhost/shop/img/DB1.jpg', NULL, NULL),
(38, 'Ботинки', 12, 45, 1, 5, 'http://localhost/shop/img/DB2.jpg', NULL, NULL),
(39, 'Ботинки', 12, 12, 2, 2, 'http://localhost/shop/img/DB3.jpg', NULL, NULL),
(40, 'Ботинки', 12, 32, 4, 4, 'http://localhost/shop/img/DB4.jpg', NULL, NULL),
(41, 'Ботинки', 12, 44, 4, 2, 'http://localhost/shop/img/DB5.jpg', NULL, NULL),
(42, 'Ботинки', 12, 33, 5, 5, 'http://localhost/shop/img/DB6.jpg', NULL, NULL),
(43, 'Ботинки', 12, 33, 5, 4, 'http://localhost/shop/img/DB7.jpg', NULL, NULL),
(44, 'Ботинки', 12, 22, 6, 3, 'http://localhost/shop/img/DB8.jpg', NULL, NULL),
(45, 'Ботинки', 12, 77, 6, 2, 'http://localhost/shop/img/DB9.jpg', NULL, NULL),
(46, 'Ботинки', 12, 56, 5, 1, 'http://localhost/shop/img/DB10.jpg', NULL, NULL),
(47, 'Ботинки', 12, 44, 4, 3, 'http://localhost/shop/img/DB11.jpg', NULL, NULL),
(48, 'Ботинки', 12, 44, 5, 4, 'http://localhost/shop/img/DB12.jpg', NULL, NULL),
(49, 'Ботинки', NULL, NULL, NULL, NULL, '', '', ''),
(50, 'Ботинки', 2, 123, 23, 3, 'http://localhost/shop/img/DS1.jpg', 'аавп', 'аавпа');

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