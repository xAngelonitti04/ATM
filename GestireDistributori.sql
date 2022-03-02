CREATE DATABASE GestireDistributori;
USE GestireDistributori;
CREATE TABLE IF NOT EXISTS `bevande` (
  `IdBevanda` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(30) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  PRIMARY KEY (`IdBevanda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;



INSERT INTO `bevande` (`IdBevanda`, `Nome`, `Tipo`) VALUES
(1, 'CocaCola', 'Bevanda Gassata'),
(2, 'Aranciata', 'Bevanda Gassata'),
(3, 'Pepsi', 'Bevanda Gassata'),
(4, 'Peroni', 'Birra'),
(5, 'Sprite', 'Bevanda Gassata'),
(6, 'Acqua Frizzante', 'Bevanda Gassata'),
(7, 'Acqua Liscia', 'Bevanda Liscia');


CREATE TABLE IF NOT EXISTS `contenere` (
  `IdContenere` int(11) NOT NULL AUTO_INCREMENT,
  `IdDistributore` int(11) NOT NULL,
  `IdBevanda` int(11) NOT NULL,
  `Quantita` int(11) NOT NULL,
  PRIMARY KEY (`IdContenere`),
  KEY `contenere_ibfk_1` (`IdDistributore`),
  KEY `contenere_ibfk_2` (`IdBevanda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;


INSERT INTO `contenere` (`IdContenere`, `IdDistributore`, `IdBevanda`, `Quantita`) VALUES
(1, 1, 1, 19),
(2, 1, 2, 9),
(3, 1, 3, 10),
(4, 1, 4, 18),
(5, 1, 5, 7),
(6, 1, 6, 14),
(7, 1, 7, 16),
(8, 2, 1, 0),
(9, 2, 2, 0),
(10, 2, 3, 0),
(11, 2, 4, 0),
(12, 2, 5, 0),
(13, 2, 6, 0),
(14, 2, 7, 0),
(15, 3, 1, 15),
(16, 3, 2, 20),
(17, 3, 3, 10),
(18, 3, 4, 15),
(19, 3, 5, 20),
(20, 3, 6, 10),
(21, 3, 7, 15),
(22, 4, 1, 29),
(23, 4, 2, 11),
(24, 4, 3, 20),
(25, 4, 4, 30),
(26, 4, 5, 12),
(27, 4, 6, 20),
(28, 4, 7, 20),
(29, 5, 1, 0),
(30, 5, 2, 0),
(31, 5, 3, 0),
(32, 5, 4, 0),
(33, 5, 5, 0),
(34, 5, 6, 0),
(35, 5, 7, 0),
(36, 6, 1, 0),
(37, 6, 2, 0),
(38, 6, 3, 0),
(39, 6, 4, 0),
(40, 6, 5, 0),
(41, 6, 6, 0),
(42, 6, 7, 0);



CREATE TABLE IF NOT EXISTS `distributori` (
  `IdDistributore` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(30) NOT NULL,
  `FlagAttivo` int(11) NOT NULL,
  PRIMARY KEY (`IdDistributore`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;



INSERT INTO `distributori` (`IdDistributore`, `Nome`, `FlagAttivo`) VALUES
(1, 'H24', 1),
(2, 'BariDistribuzione', 0),
(3, 'DistriPuglia', 0),
(4, 'NiciosDispenser', 0),
(5, 'GrumoDispenser', 1),
(6, 'SqueoDispenser', 1);


ALTER TABLE `contenere`
  ADD CONSTRAINT `contenere_ibfk_2` FOREIGN KEY (`IdBevanda`) REFERENCES `bevande` (`IdBevanda`),
  ADD CONSTRAINT `contenere_ibfk_1` FOREIGN KEY (`IdDistributore`) REFERENCES `distributori` (`IdDistributore`);

