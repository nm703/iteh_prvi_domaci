/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.25-MariaDB : Database - baza
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`baza` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `baza`;

/*Table structure for table `clanovi` */

DROP TABLE IF EXISTS `clanovi`;

CREATE TABLE `clanovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 NOT NULL,
  `ime` varchar(200) CHARACTER SET latin1 NOT NULL,
  `prezime` varchar(200) CHARACTER SET latin1 NOT NULL,
  `idstatus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

/*Data for the table `clanovi` */

insert  into `clanovi`(`id`,`email`,`password`,`ime`,`prezime`,`idstatus`) values 
(37,'n@gmail.com','nevena','nevena','markovic',1),
(38,'a@gmail.com','aleksa','aleksa','aleksic',1),
(39,'ana@gmailc.com','ana','ana','ulemek',1),
(40,'s@gmail.com','stefan','stefan','stefanovic',2),
(44,'p@gmail.com','pera','pera','peric',2),
(57,'miki@gmail.com','miki','miki','miki',3);

/*Table structure for table `novosti` */

DROP TABLE IF EXISTS `novosti`;

CREATE TABLE `novosti` (
  `idnovosti` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(200) CHARACTER SET latin1 NOT NULL,
  `tekst` varchar(2000) CHARACTER SET latin1 NOT NULL,
  `vreme` datetime DEFAULT NULL,
  `idclana` int(11) DEFAULT NULL,
  PRIMARY KEY (`idnovosti`),
  KEY `idclana` (`idclana`),
  CONSTRAINT `novosti_ibfk_1` FOREIGN KEY (`idclana`) REFERENCES `clanovi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Data for the table `novosti` */

insert  into `novosti`(`idnovosti`,`naslov`,`tekst`,`vreme`,`idclana`) values 
(1,'Novogodisnji trk','Dodjite da Novu godinu zapocnemo na zdrav nacin. Utrci u Novu godinu, ali bukvalno.',NULL,37),
(2,'Preko 150 clanova Beogradskog trkackog kluba na polumaratonu u Sarajevu','U nedelju, 18. septembra u Sarajevu ce biti odrzan 15. Sarajevski polumaraton. Beogradski trkacki klub kao jedan od najvecih trkackih klubova u regionu uzece ucesce.',NULL,38),
(3,'Poceo upis u BRC Skolu trcanja!','I ove jeseni pozivamo sugradjane da budu fizicki aktivni i prikljuce se velikoj beogradskoj trkackoj zajednici! Pod sloganom “From Zero to Hero” nova sezona skole',NULL,37),
(10,'Heroji Beograda: Prica o prestonici kroz trcanje','Svecanost pod nazivom “Heroji su medju nama” koju organizuje Beogradski maraton, ove godine obelezila su priznanja za pojedince i organizacije ',NULL,39),
(11,'Prolecni polumaraton u Budimpesti!','Jos uvek sumiramo utiske! Vikend za nama je bio vise nego putovanje na trku!',NULL,37),
(12,'BRC Plogging kod Brankovog mosta u nedelju!','Dzogirajte i ocistite okolinu sa Beogradskim trkackim klubom! 17. aprila u 9 casova organizujemo plogging kod Brankovog mosta, sa novobeogradske strane. ',NULL,38),
(13,'BRC redakcija gori! Ovog leta treneri pisu za vas!','I dok odmaras imaces korisno trkacko stivo koje se lako vari a puno znaci ako se primeni. ',NULL,38),
(14,'Stigao je Nordijac: Prvi klub nordijskog hodanja','Srbija je dobila prvi Klub nordijskog hodanja „Nordijac“. Krajem avgusta u Kulturnom centru Grad u Beogradu na manifestaciji kojoj je prisustvovalo preko 100 nordijskih hodaca',NULL,37);

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `ime` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `status` */

insert  into `status`(`idstatus`,`ime`) values 
(1,'pocasni'),
(2,'bivsi'),
(3,'obican');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
