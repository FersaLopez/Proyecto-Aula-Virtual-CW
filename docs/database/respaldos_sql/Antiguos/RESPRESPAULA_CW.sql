-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: AULA_CW
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `arch_adj_asign`
--

DROP TABLE IF EXISTS `arch_adj_asign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arch_adj_asign` (
  `ID_ARCH_ADJ_ASIGN` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(100) DEFAULT NULL,
  `ruta_arch` char(250) DEFAULT NULL,
  `tipo_arch` char(50) DEFAULT NULL,
  `ID_ASIGN` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ARCH_ADJ_ASIGN`),
  KEY `ID_ASIGN` (`ID_ASIGN`),
  CONSTRAINT `arch_adj_asign_ibfk_1` FOREIGN KEY (`ID_ASIGN`) REFERENCES `asignacion` (`ID_ASIGN`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arch_adj_asign`
--

LOCK TABLES `arch_adj_asign` WRITE;
/*!40000 ALTER TABLE `arch_adj_asign` DISABLE KEYS */;
INSERT INTO `arch_adj_asign` VALUES (1,'Pou4','../../../../statics/media/files/materialesAulas/IPUfuv714Pou4.jpg','jpg',14),(2,'','../../../../statics/media/files/materialesAulas/IPUfuv715.png','png',15),(3,'ETE CM','../../../../statics/media/files/materialesAulas/IPUfuv716ETE CM.png','png',16),(4,'aS','../../../../statics/media/files/materialesAulas/IPUfuv717aS.png','png',17),(5,'Pou4','../../../../statics/media/files/materialesAulas/ELmnop718Pou4.png','png',18),(6,'PDF muy fino','../../../../statics/media/files/materialesAulas/GRSTVz919PDF muy fino.pdf','pdf',19),(7,'Practica','../../../../statics/media/files/materialesAulas/BGKept1120Practica.pdf','pdf',20);
/*!40000 ALTER TABLE `arch_adj_asign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arch_adj_cammat`
--

DROP TABLE IF EXISTS `arch_adj_cammat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arch_adj_cammat` (
  `ID_ARCH_ADJ_CAMMAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PUB_CMMT` int(11) DEFAULT NULL,
  `nombre` char(50) DEFAULT NULL,
  `tipo_arch` char(50) DEFAULT NULL,
  `ruta_arch` char(250) DEFAULT NULL,
  PRIMARY KEY (`ID_ARCH_ADJ_CAMMAT`),
  KEY `ID_PUB_CMMT` (`ID_PUB_CMMT`),
  CONSTRAINT `arch_adj_cammat_ibfk_1` FOREIGN KEY (`ID_PUB_CMMT`) REFERENCES `pub_cam_mat` (`ID_PUB_CMMT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arch_adj_cammat`
--

LOCK TABLES `arch_adj_cammat` WRITE;
/*!40000 ALTER TABLE `arch_adj_cammat` DISABLE KEYS */;
/*!40000 ALTER TABLE `arch_adj_cammat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arch_entrega`
--

DROP TABLE IF EXISTS `arch_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arch_entrega` (
  `ID_ARCH_ENTREGA` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(250) DEFAULT NULL,
  `ruta_archivo` char(250) DEFAULT NULL,
  `tipo_extension` char(100) DEFAULT NULL,
  `ID_UHA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ARCH_ENTREGA`),
  KEY `ID_UHA` (`ID_UHA`),
  CONSTRAINT `arch_entrega_ibfk_1` FOREIGN KEY (`ID_UHA`) REFERENCES `user_has_asignacion` (`ID_UHA`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arch_entrega`
--

LOCK TABLES `arch_entrega` WRITE;
/*!40000 ALTER TABLE `arch_entrega` DISABLE KEYS */;
INSERT INTO `arch_entrega` VALUES (1,'POR','../../../../statics/media/files/materialesAulas/UHA7713POR.png','png',13),(2,'Pou','../../../../statics/media/files/materialesAulas/UHA7714Pou.jpg','jpg',14),(3,'Pou','../../../../statics/media/files/materialesAulas/UHA15716Pou.png','png',16),(4,'Perritos','../../../../statics/media/files/materialesAulas/UHA16718Perritos.png','png',18),(5,'Pou','../../../../statics/media/files/materialesAulas/UHA18822Pou.jpg','jpg',22),(6,'Mi tarea Profe','../../../../statics/media/files/materialesAulas/UHA191024Mi tarea Profe.jpg','jpg',24),(7,'Pou2','../../../../statics/media/files/materialesAulas/UHA191024Pou2.jpg','jpg',24),(8,'Pou3','../../../../statics/media/files/materialesAulas/UHA191024Pou3.pdf','pdf',24),(9,'HOLA','../../../../statics/media/files/materialesAulas/UHA201242HOLA.jpg','jpg',42),(10,'Ola','../../../../statics/media/files/materialesAulas/UHA201242Ola.jpg','jpg',42),(11,'LOL','../../../../statics/media/files/materialesAulas/UHA201444LOL.jpg','jpg',44);
/*!40000 ALTER TABLE `arch_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arch_pforo`
--

DROP TABLE IF EXISTS `arch_pforo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arch_pforo` (
  `ID_ARCH_PFORO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PUB_FORO` int(11) DEFAULT NULL,
  `nombre` char(100) DEFAULT NULL,
  `tipo_arch` char(50) DEFAULT NULL,
  `ruta_arch` char(250) DEFAULT NULL,
  PRIMARY KEY (`ID_ARCH_PFORO`),
  KEY `ID_PUB_FORO` (`ID_PUB_FORO`),
  CONSTRAINT `arch_pforo_ibfk_1` FOREIGN KEY (`ID_PUB_FORO`) REFERENCES `pub_foro` (`ID_PUB_FORO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arch_pforo`
--

LOCK TABLES `arch_pforo` WRITE;
/*!40000 ALTER TABLE `arch_pforo` DISABLE KEYS */;
/*!40000 ALTER TABLE `arch_pforo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arch_resp_foro`
--

DROP TABLE IF EXISTS `arch_resp_foro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arch_resp_foro` (
  `ID_ARCH_R_PFORO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_RESP_PFORO` int(11) DEFAULT NULL,
  `nombre` char(50) DEFAULT NULL,
  `tipo_arch` char(250) DEFAULT NULL,
  `ruta_arch` char(250) DEFAULT NULL,
  PRIMARY KEY (`ID_ARCH_R_PFORO`),
  KEY `ID_RESP_PFORO` (`ID_RESP_PFORO`),
  CONSTRAINT `arch_resp_foro_ibfk_1` FOREIGN KEY (`ID_RESP_PFORO`) REFERENCES `resp_pforo` (`ID_RESP_PFORO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arch_resp_foro`
--

LOCK TABLES `arch_resp_foro` WRITE;
/*!40000 ALTER TABLE `arch_resp_foro` DISABLE KEYS */;
/*!40000 ALTER TABLE `arch_resp_foro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignacion`
--

DROP TABLE IF EXISTS `asignacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignacion` (
  `ID_ASIGN` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` char(60) DEFAULT NULL,
  `indicaciones` char(200) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `fecha_limite` datetime NOT NULL,
  `ID_BLOQUE` tinyint(4) DEFAULT NULL,
  `ID_TEMA` tinyint(4) DEFAULT NULL,
  `ID_AULA` char(50) DEFAULT NULL,
  `ID_TIPO_ASIGN` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ID_ASIGN`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_BLOQUE` (`ID_BLOQUE`),
  KEY `ID_TEMA` (`ID_TEMA`),
  KEY `ID_AULA` (`ID_AULA`),
  KEY `ID_TIPO_ASIGN` (`ID_TIPO_ASIGN`),
  CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`ID_BLOQUE`) REFERENCES `bloque` (`ID_BLOQUE`),
  CONSTRAINT `asignacion_ibfk_3` FOREIGN KEY (`ID_TEMA`) REFERENCES `tema` (`ID_TEMA`),
  CONSTRAINT `asignacion_ibfk_4` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`),
  CONSTRAINT `asignacion_ibfk_5` FOREIGN KEY (`ID_TIPO_ASIGN`) REFERENCES `tipo_asign` (`ID_TIPO_ASIGN`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacion`
--

LOCK TABLES `asignacion` WRITE;
/*!40000 ALTER TABLE `asignacion` DISABLE KEYS */;
INSERT INTO `asignacion` VALUES (2,'SI','HOLA',1,777,'2022-02-16 22:03:16','2022-02-16 22:03:16',NULL,NULL,'AGIPe8',3),(3,'fdse','Fd',1,123,'2022-02-16 22:03:16','2022-06-24 02:59:00',NULL,NULL,'IPUfuv',3),(4,'fdse','Fd',1,123,'2022-02-16 22:03:16','2022-06-24 02:59:00',NULL,NULL,'IPUfuv',3),(5,'fdse','Fd',1,123,'2022-02-16 22:03:16','2022-06-24 02:59:00',NULL,NULL,'IPUfuv',3),(6,'fdse','Fd',1,123,'2022-02-16 22:03:16','2022-06-24 02:59:00',NULL,NULL,'IPUfuv',3),(7,'fdse','Fd',1,123,'2022-02-16 22:03:16','2022-06-24 02:59:00',NULL,NULL,'IPUfuv',3),(8,'Póu','Lol',1,968,'2022-02-16 22:03:16','2022-06-02 14:02:00',NULL,NULL,'IPUfuv',1),(9,'Oli','Furro 5',1,777,'2022-02-16 22:03:16','2022-06-23 15:37:00',NULL,NULL,'IPUfuv',4),(10,'Fersa','Pou1',7,789,'2022-02-16 22:03:16','2022-06-07 08:07:00',NULL,NULL,'IPUfuv',1),(11,'Fe','DE',7,2,'2022-02-16 22:03:16','2022-05-30 07:08:00',NULL,NULL,'IPUfuv',3),(12,'POU1','Pou2',7,789,'2022-02-16 22:03:16','1505-08-07 04:05:00',NULL,NULL,'IPUfuv',1),(13,'PracticaPro','Si soy',7,968,'2022-02-16 22:03:16','2022-06-18 08:28:00',NULL,NULL,'IPUfuv',1),(14,'HolaXD','Sisoiiiii',7,777,'2022-02-16 22:03:16','2022-06-09 09:09:00',NULL,NULL,'IPUfuv',3),(15,'practica de laboratorio','Hagan la tarea\r\nHagan la tarea\r\nHagan la tarea\r\nHagan la tareaHagan la tareaHagan la tareaHagan la tareaHagan la tareaHagan la tareaHagan la tareavHagan la tareaHagan la tareavHagan la tareaHagan la t',7,100,'2022-02-16 22:03:16','2022-06-09 10:00:00',NULL,NULL,'IPUfuv',4),(16,'Matematicas con Papu','Hola que haceHola que haceHola que haceHola que haceHola que haceHola que haceHola que haceHola que haceHola que haceHola que haceHola que haceHola que haceHola que haceHola que haceHola que haceHola',7,700,'2022-02-16 22:03:16','2022-06-17 15:33:00',NULL,NULL,'IPUfuv',3),(17,'Ijole','a',7,1,'2022-02-16 22:03:16','2022-06-16 16:36:00',NULL,NULL,'IPUfuv',1),(18,'Paco123','Holi',7,100,'2022-02-16 22:03:16','2022-06-21 16:39:00',NULL,NULL,'ELmnop',5),(19,'Tarea de prueba xd','Sisoi',9,1000,'2022-02-16 22:03:16','2022-06-09 13:51:00',NULL,NULL,'GRSTVz',2),(20,'Practica 23','Hagan la tarea porfa',11,900,'2022-02-16 22:03:16','2022-06-10 01:30:00',NULL,NULL,'BGKept',1);
/*!40000 ALTER TABLE `asignacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aula`
--

DROP TABLE IF EXISTS `aula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aula` (
  `ID_AULA` char(50) NOT NULL,
  `ID_MATERIAS` tinyint(4) NOT NULL,
  `ID_GRUPO` smallint(6) DEFAULT NULL,
  `ID_CICLOS` smallint(6) DEFAULT NULL,
  `ID_GRADO` tinyint(4) DEFAULT NULL,
  `ID_TIPO_AULA` tinyint(4) DEFAULT NULL,
  `nombre` char(50) DEFAULT NULL,
  `reuniones_id` char(250) DEFAULT NULL,
  `descripcion` char(250) DEFAULT NULL,
  `ruta_foto` char(50) DEFAULT NULL,
  `seccion` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID_AULA`),
  KEY `ID_MATERIAS` (`ID_MATERIAS`),
  KEY `ID_GRUPO` (`ID_GRUPO`),
  KEY `ID_CICLOS` (`ID_CICLOS`),
  KEY `ID_GRADO` (`ID_GRADO`),
  KEY `ID_TIPO_AULA` (`ID_TIPO_AULA`),
  CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`ID_MATERIAS`) REFERENCES `materias` (`ID_MATERIAS`),
  CONSTRAINT `aula_ibfk_2` FOREIGN KEY (`ID_GRUPO`) REFERENCES `grupo` (`ID_GRUPO`),
  CONSTRAINT `aula_ibfk_3` FOREIGN KEY (`ID_CICLOS`) REFERENCES `ciclos` (`ID_CICLOS`),
  CONSTRAINT `aula_ibfk_4` FOREIGN KEY (`ID_GRADO`) REFERENCES `grado` (`ID_GRADO`),
  CONSTRAINT `aula_ibfk_5` FOREIGN KEY (`ID_TIPO_AULA`) REFERENCES `tipo_aula` (`ID_TIPO_AULA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aula`
--

LOCK TABLES `aula` WRITE;
/*!40000 ALTER TABLE `aula` DISABLE KEYS */;
INSERT INTO `aula` VALUES ('AGIPe8',1,101,NULL,NULL,1,'FERSA',NULL,'ya dejame en paz papu',NULL,NULL),('AYZfiq',1,101,NULL,NULL,1,'a',NULL,'a',NULL,NULL),('BEIOPv',1,101,NULL,NULL,1,'BB',NULL,'b',NULL,NULL),('BGKept',1,152,NULL,NULL,1,'Matemáticas IV con profesor PRO',NULL,'Que pro es la mate Que pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pro es la mate pr',NULL,NULL),('BKVil0',1,101,NULL,NULL,1,'BB',NULL,'B',NULL,NULL),('Bpstvx',1,101,NULL,NULL,1,'a',NULL,'a',NULL,NULL),('BSeo30',3,212,NULL,NULL,4,'Curso Web',NULL,'Pues si',NULL,NULL),('CFYchv',1,101,NULL,NULL,1,'a',NULL,'a',NULL,NULL),('CHMQU9',1,101,NULL,NULL,1,'asdasd',NULL,'dsadsa',NULL,NULL),('CLjpt9',3,201,NULL,NULL,4,'fISICA',NULL,'Fs',NULL,NULL),('CMYade',1,101,NULL,NULL,1,'Bb',NULL,'b',NULL,NULL),('CTehrv',4,201,NULL,NULL,2,'PapuNo',NULL,'JOJOJO',NULL,NULL),('CUjnz8',1,101,NULL,NULL,1,'ASD',NULL,'ASD',NULL,NULL),('ejn170',1,101,NULL,NULL,1,'',NULL,'',NULL,NULL),('ELmnop',84,212,NULL,NULL,3,'Aula de Pruebas',NULL,'Esto es una aula de prueba',NULL,NULL),('EMRZc7',1,306,NULL,NULL,3,'ETE CM',NULL,'Karel VIVA',NULL,NULL),('ety369',1,101,NULL,NULL,1,'a',NULL,'a',NULL,NULL),('FGXdj3',2,152,NULL,NULL,4,'Club Física',NULL,'Esto es Física',NULL,NULL),('FIXs47',3,212,NULL,NULL,4,'JIJIJA',NULL,'ASAS',NULL,NULL),('FJRXc2',1,101,NULL,NULL,1,'fds',NULL,'fds',NULL,NULL),('GPXvw2',1,101,NULL,NULL,1,'FASDF',NULL,'ASDF',NULL,NULL),('GRSTVz',81,152,NULL,NULL,4,'Clases Pros',NULL,'Para probar yaaaa',NULL,NULL),('HYktz2',1,101,NULL,NULL,1,'asd',NULL,'asdf',NULL,NULL),('Iaclq8',1,101,NULL,NULL,1,'SASA',NULL,'ASAS',NULL,NULL),('Icow34',1,101,NULL,NULL,1,'BB',NULL,'B',NULL,NULL),('IPUfuv',1,101,NULL,NULL,1,'Bb',NULL,'GG',NULL,NULL),('LYjktz',1,101,NULL,NULL,1,'BB',NULL,'b',NULL,NULL),('NZlm45',3,101,NULL,NULL,1,'ASD',NULL,'ASD',NULL,NULL),('OYctu5',1,101,NULL,NULL,1,'Fersa',NULL,'Ok',NULL,NULL),('Rces59',1,101,NULL,NULL,1,'Ostias',NULL,'JIJIJA',NULL,NULL),('SZel23',1,101,NULL,NULL,1,'Fersa',NULL,'Ok',NULL,NULL);
/*!40000 ALTER TABLE `aula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aula_has_usuario`
--

DROP TABLE IF EXISTS `aula_has_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aula_has_usuario` (
  `ID_AHU` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_AULA` char(50) DEFAULT NULL,
  `ID_ROL` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ID_AHU`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_AULA` (`ID_AULA`),
  KEY `ID_ROL` (`ID_ROL`),
  CONSTRAINT `aula_has_usuario_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `aula_has_usuario_ibfk_2` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`),
  CONSTRAINT `aula_has_usuario_ibfk_3` FOREIGN KEY (`ID_ROL`) REFERENCES `rol_user` (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aula_has_usuario`
--

LOCK TABLES `aula_has_usuario` WRITE;
/*!40000 ALTER TABLE `aula_has_usuario` DISABLE KEYS */;
INSERT INTO `aula_has_usuario` VALUES (1,1,'IPUfuv',1),(2,1,'Rces59',1),(3,1,'FGXdj3',1),(4,1,'EMRZc7',1),(5,1,'CHMQU9',1),(6,1,'GPXvw2',1),(7,1,'CUjnz8',1),(8,1,'CTehrv',1),(9,1,'FIXs47',1),(10,1,'NZlm45',1),(11,1,'FJRXc2',1),(12,1,'Iaclq8',1),(13,1,'BSeo30',1),(15,7,'IPUfuv',2),(16,7,'Rces59',2),(17,7,'ELmnop',1),(18,8,'ELmnop',2),(19,9,'GRSTVz',1),(20,10,'GRSTVz',2),(21,11,'BGKept',1),(22,12,'BGKept',2),(23,13,'BGKept',2),(24,14,'BGKept',2);
/*!40000 ALTER TABLE `aula_has_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bloque`
--

DROP TABLE IF EXISTS `bloque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bloque` (
  `ID_BLOQUE` tinyint(4) NOT NULL,
  `ruta_foto` char(100) DEFAULT NULL,
  `titulo` char(60) NOT NULL,
  `descripcion` char(200) DEFAULT NULL,
  `ID_AULA` char(50) DEFAULT NULL,
  PRIMARY KEY (`ID_BLOQUE`),
  UNIQUE KEY `titulo` (`titulo`),
  UNIQUE KEY `descripcion` (`descripcion`),
  KEY `ID_AULA` (`ID_AULA`),
  CONSTRAINT `bloque_ibfk_1` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloque`
--

LOCK TABLES `bloque` WRITE;
/*!40000 ALTER TABLE `bloque` DISABLE KEYS */;
/*!40000 ALTER TABLE `bloque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciclos`
--

DROP TABLE IF EXISTS `ciclos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciclos` (
  `ID_CICLOS` smallint(6) NOT NULL AUTO_INCREMENT,
  `ciclos` char(20) DEFAULT NULL,
  PRIMARY KEY (`ID_CICLOS`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciclos`
--

LOCK TABLES `ciclos` WRITE;
/*!40000 ALTER TABLE `ciclos` DISABLE KEYS */;
INSERT INTO `ciclos` VALUES (1,'2021 - 2022'),(2,'2022 - 2023'),(3,'2023 - 2024'),(4,'2024 - 2025');
/*!40000 ALTER TABLE `ciclos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coment_asign`
--

DROP TABLE IF EXISTS `coment_asign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coment_asign` (
  `ID_COMENT_ASIGN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_ASIGN` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha_coment` datetime NOT NULL,
  PRIMARY KEY (`ID_COMENT_ASIGN`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_ASIGN` (`ID_ASIGN`),
  CONSTRAINT `coment_asign_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `coment_asign_ibfk_2` FOREIGN KEY (`ID_ASIGN`) REFERENCES `asignacion` (`ID_ASIGN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coment_asign`
--

LOCK TABLES `coment_asign` WRITE;
/*!40000 ALTER TABLE `coment_asign` DISABLE KEYS */;
/*!40000 ALTER TABLE `coment_asign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coment_priv_asign`
--

DROP TABLE IF EXISTS `coment_priv_asign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coment_priv_asign` (
  `ID_COMENT_PRIV_ASIGN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_UHA` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha_coment` datetime NOT NULL,
  PRIMARY KEY (`ID_COMENT_PRIV_ASIGN`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_UHA` (`ID_UHA`),
  CONSTRAINT `coment_priv_asign_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `coment_priv_asign_ibfk_2` FOREIGN KEY (`ID_UHA`) REFERENCES `user_has_asignacion` (`ID_UHA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coment_priv_asign`
--

LOCK TABLES `coment_priv_asign` WRITE;
/*!40000 ALTER TABLE `coment_priv_asign` DISABLE KEYS */;
/*!40000 ALTER TABLE `coment_priv_asign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dia_semana`
--

DROP TABLE IF EXISTS `dia_semana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dia_semana` (
  `ID_DIA_SEMANA` tinyint(4) NOT NULL AUTO_INCREMENT,
  `dia` char(25) DEFAULT NULL,
  PRIMARY KEY (`ID_DIA_SEMANA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia_semana`
--

LOCK TABLES `dia_semana` WRITE;
/*!40000 ALTER TABLE `dia_semana` DISABLE KEYS */;
/*!40000 ALTER TABLE `dia_semana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `ID_ESTADO` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (0,'Inexistente'),(1,'Conectado'),(2,'Ocupado'),(3,'Desconectado'),(4,'Suspendido');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_entrega`
--

DROP TABLE IF EXISTS `estado_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_entrega` (
  `ID_ESTADO_ENTREGA` tinyint(4) NOT NULL AUTO_INCREMENT,
  `estado` char(50) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTADO_ENTREGA`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_entrega`
--

LOCK TABLES `estado_entrega` WRITE;
/*!40000 ALTER TABLE `estado_entrega` DISABLE KEYS */;
INSERT INTO `estado_entrega` VALUES (1,'Entregado a tiempo'),(2,'Entregado fuera de tiempo'),(3,'No entregado'),(4,'Calificado'),(5,'Calificado y vuelto a entregar'),(10,'En el tiempo establecido');
/*!40000 ALTER TABLE `estado_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_pforo`
--

DROP TABLE IF EXISTS `estado_pforo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_pforo` (
  `ID_ESTADO_PFORO` tinyint(4) NOT NULL AUTO_INCREMENT,
  `estado_foro` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTADO_PFORO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_pforo`
--

LOCK TABLES `estado_pforo` WRITE;
/*!40000 ALTER TABLE `estado_pforo` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_pforo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento_r_has_diadesemana`
--

DROP TABLE IF EXISTS `evento_r_has_diadesemana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento_r_has_diadesemana` (
  `ID_E_RDHS` smallint(6) NOT NULL AUTO_INCREMENT,
  `ID_EVENTO_R` smallint(6) DEFAULT NULL,
  `ID_DIA_SEMANA` tinyint(4) DEFAULT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  PRIMARY KEY (`ID_E_RDHS`),
  KEY `ID_EVENTO_R` (`ID_EVENTO_R`),
  KEY `ID_DIA_SEMANA` (`ID_DIA_SEMANA`),
  CONSTRAINT `evento_r_has_diadesemana_ibfk_1` FOREIGN KEY (`ID_EVENTO_R`) REFERENCES `eventos_repeat` (`ID_EVENTO_R`),
  CONSTRAINT `evento_r_has_diadesemana_ibfk_2` FOREIGN KEY (`ID_DIA_SEMANA`) REFERENCES `dia_semana` (`ID_DIA_SEMANA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento_r_has_diadesemana`
--

LOCK TABLES `evento_r_has_diadesemana` WRITE;
/*!40000 ALTER TABLE `evento_r_has_diadesemana` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento_r_has_diadesemana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `ID_EVENTO` smallint(6) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_EVENT` tinyint(4) DEFAULT NULL,
  `ID_AULA` char(50) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_ASIGN` int(11) DEFAULT NULL,
  `ID_MES` tinyint(4) DEFAULT NULL,
  `ID_CICLOS` smallint(6) DEFAULT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `dia` char(25) DEFAULT NULL,
  `año` int(11) DEFAULT NULL,
  `fecha_comp` datetime NOT NULL,
  `key_word` char(100) DEFAULT NULL,
  `titulo` char(250) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`ID_EVENTO`),
  KEY `ID_TIPO_EVENT` (`ID_TIPO_EVENT`),
  KEY `ID_AULA` (`ID_AULA`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_ASIGN` (`ID_ASIGN`),
  KEY `ID_MES` (`ID_MES`),
  KEY `ID_CICLOS` (`ID_CICLOS`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`ID_TIPO_EVENT`) REFERENCES `tipo_event` (`ID_TIPO_EVENT`),
  CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`),
  CONSTRAINT `eventos_ibfk_3` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `eventos_ibfk_4` FOREIGN KEY (`ID_ASIGN`) REFERENCES `asignacion` (`ID_ASIGN`),
  CONSTRAINT `eventos_ibfk_5` FOREIGN KEY (`ID_MES`) REFERENCES `mes` (`ID_MES`),
  CONSTRAINT `eventos_ibfk_6` FOREIGN KEY (`ID_CICLOS`) REFERENCES `ciclos` (`ID_CICLOS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos_rang`
--

DROP TABLE IF EXISTS `eventos_rang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos_rang` (
  `ID_EVENTO_RANG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_EVENT` tinyint(4) DEFAULT NULL,
  `ID_AULA` char(50) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_ASIGN` int(11) DEFAULT NULL,
  `ID_MES` tinyint(4) DEFAULT NULL,
  `ID_MES_FIN` tinyint(4) DEFAULT NULL,
  `ID_CICLOS` smallint(6) DEFAULT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `dia` char(25) DEFAULT NULL,
  `año` int(11) DEFAULT NULL,
  `fecha_comp` datetime NOT NULL,
  `dia_fin` char(50) DEFAULT NULL,
  `fecha_comp_fin` datetime NOT NULL,
  `key_word` char(100) DEFAULT NULL,
  `titulo` char(250) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`ID_EVENTO_RANG`),
  KEY `ID_TIPO_EVENT` (`ID_TIPO_EVENT`),
  KEY `ID_AULA` (`ID_AULA`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_ASIGN` (`ID_ASIGN`),
  KEY `ID_MES` (`ID_MES`),
  KEY `ID_MES_FIN` (`ID_MES_FIN`),
  KEY `ID_CICLOS` (`ID_CICLOS`),
  CONSTRAINT `eventos_rang_ibfk_1` FOREIGN KEY (`ID_TIPO_EVENT`) REFERENCES `tipo_event` (`ID_TIPO_EVENT`),
  CONSTRAINT `eventos_rang_ibfk_2` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`),
  CONSTRAINT `eventos_rang_ibfk_3` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `eventos_rang_ibfk_4` FOREIGN KEY (`ID_ASIGN`) REFERENCES `asignacion` (`ID_ASIGN`),
  CONSTRAINT `eventos_rang_ibfk_5` FOREIGN KEY (`ID_MES`) REFERENCES `mes` (`ID_MES`),
  CONSTRAINT `eventos_rang_ibfk_6` FOREIGN KEY (`ID_MES_FIN`) REFERENCES `mes_fin` (`ID_MES_FIN`),
  CONSTRAINT `eventos_rang_ibfk_7` FOREIGN KEY (`ID_CICLOS`) REFERENCES `ciclos` (`ID_CICLOS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos_rang`
--

LOCK TABLES `eventos_rang` WRITE;
/*!40000 ALTER TABLE `eventos_rang` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos_rang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos_repeat`
--

DROP TABLE IF EXISTS `eventos_repeat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos_repeat` (
  `ID_EVENTO_R` smallint(6) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_EVENT` tinyint(4) DEFAULT 7,
  `ID_AULA` char(50) DEFAULT NULL,
  `titulo` char(250) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`ID_EVENTO_R`),
  KEY `ID_TIPO_EVENT` (`ID_TIPO_EVENT`),
  KEY `ID_AULA` (`ID_AULA`),
  CONSTRAINT `eventos_repeat_ibfk_1` FOREIGN KEY (`ID_TIPO_EVENT`) REFERENCES `tipo_event` (`ID_TIPO_EVENT`),
  CONSTRAINT `eventos_repeat_ibfk_2` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos_repeat`
--

LOCK TABLES `eventos_repeat` WRITE;
/*!40000 ALTER TABLE `eventos_repeat` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos_repeat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `ID_GRADO` tinyint(4) NOT NULL AUTO_INCREMENT,
  `grado` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`ID_GRADO`),
  UNIQUE KEY `grado` (`grado`),
  UNIQUE KEY `grado_2` (`grado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (4,'Cuarto'),(0,'Graduado'),(5,'Quinto'),(6,'Sexto');
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `ID_GRUPO` smallint(6) NOT NULL,
  `grupo` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID_GRUPO`),
  UNIQUE KEY `grupo` (`grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (101,401),(102,402),(152,452),(201,501),(212,512),(306,606);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juego`
--

DROP TABLE IF EXISTS `juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juego` (
  `ID_JUEGO` smallint(6) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_JUEGO` smallint(6) DEFAULT NULL,
  `ID_TEMA` tinyint(4) DEFAULT NULL,
  `ID_AULA` char(50) DEFAULT NULL,
  `ID_BLOQUE` tinyint(4) DEFAULT NULL,
  `nombre` char(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `puntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_JUEGO`),
  KEY `ID_TIPO_JUEGO` (`ID_TIPO_JUEGO`),
  KEY `ID_TEMA` (`ID_TEMA`),
  KEY `ID_AULA` (`ID_AULA`),
  KEY `ID_BLOQUE` (`ID_BLOQUE`),
  CONSTRAINT `juego_ibfk_1` FOREIGN KEY (`ID_TIPO_JUEGO`) REFERENCES `tipo_juego` (`ID_TIPO_JUEGO`),
  CONSTRAINT `juego_ibfk_2` FOREIGN KEY (`ID_TEMA`) REFERENCES `tema` (`ID_TEMA`),
  CONSTRAINT `juego_ibfk_3` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`),
  CONSTRAINT `juego_ibfk_4` FOREIGN KEY (`ID_BLOQUE`) REFERENCES `bloque` (`ID_BLOQUE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juego`
--

LOCK TABLES `juego` WRITE;
/*!40000 ALTER TABLE `juego` DISABLE KEYS */;
/*!40000 ALTER TABLE `juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links_asignacion`
--

DROP TABLE IF EXISTS `links_asignacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links_asignacion` (
  `ID_LINKASIGN` int(11) NOT NULL AUTO_INCREMENT,
  `link` char(100) DEFAULT NULL,
  `ID_AULA` char(50) DEFAULT NULL,
  PRIMARY KEY (`ID_LINKASIGN`),
  KEY `ID_AULA` (`ID_AULA`),
  CONSTRAINT `links_asignacion_ibfk_1` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links_asignacion`
--

LOCK TABLES `links_asignacion` WRITE;
/*!40000 ALTER TABLE `links_asignacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `links_asignacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materias` (
  `ID_MATERIAS` tinyint(4) NOT NULL AUTO_INCREMENT,
  `materias` char(50) DEFAULT NULL,
  `ID_GRADO` tinyint(4) DEFAULT NULL,
  `ID_TIPO_MAT` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ID_MATERIAS`),
  KEY `ID_GRADO` (`ID_GRADO`),
  KEY `ID_TIPO_MAT` (`ID_TIPO_MAT`),
  CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`ID_GRADO`) REFERENCES `grado` (`ID_GRADO`),
  CONSTRAINT `materias_ibfk_2` FOREIGN KEY (`ID_TIPO_MAT`) REFERENCES `tipo_mat` (`ID_TIPO_MAT`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` VALUES (1,'Matemáticas IV',4,5),(2,'Física III',4,5),(3,'Lengua Española',4,5),(4,'Historia Universal',4,5),(5,'Lógica',4,5),(6,'Geografía',4,5),(7,'Dibujo II',4,5),(8,'Lengua extranjera Inglés IV',4,5),(9,'Lengua extranjera Francés IV',4,5),(10,'Danza clásica',4,6),(11,'Danza contemporánea',4,6),(12,'Danza española',4,6),(13,'Danza regional mexicana',4,6),(14,'Escultura IV',4,6),(15,'Fotografía IV',4,6),(16,'Grabado IV',4,6),(17,'Música IV',4,6),(18,'Pintura IV',4,6),(19,'Teatro IV',4,6),(20,'Educación Física IV',4,5),(21,'Orientación Educativa IV',4,5),(22,'Informática',4,5),(23,'Matemáticas V',5,5),(24,'Química III',5,5),(25,'Biología IV',5,5),(26,'Educación para la Salud',5,5),(27,'Historia de México II',5,5),(28,'Etimologías Grecolatinas',5,5),(29,'Lengua extranjera Inglés V',5,5),(30,'Lengua extranjera Francés V',5,5),(31,'Lengua extranjera Italiano V',5,5),(32,'Lengua extranjera Alemán V',5,5),(33,'Lengua extranjera Inglés I',5,5),(34,'Lengua extranjera Francés I',5,5),(35,'Lengua extranjera Italiano I',5,5),(36,'Lengua extranjera Alemán I',5,5),(37,'Ética',5,5),(38,'Educación Física V',5,5),(39,'Danza clásica',5,6),(40,'Danza contemporánea',5,6),(41,'Danza española',5,6),(42,'Danza regional mexicana',5,6),(43,'Escultura V',5,6),(44,'Fotografía V',5,6),(45,'Grabado V',5,6),(46,'Música V',5,6),(47,'Pintura V',5,6),(48,'Teatro V',5,6),(49,'Orientación Educativa V',5,5),(50,'Literatura Universal',5,5),(51,'Derecho',6,5),(52,'Literatura Mex. e Iberoam',6,5),(53,'Inglés VI',6,5),(54,'Francés VI',6,5),(55,'Alemán II',6,5),(56,'Italiano II',6,5),(57,'Inglés II',6,5),(58,'Francés II',6,5),(59,'Psicología',6,5),(60,'Higiene Mental',6,5),(61,'Estadística y probabilidad',6,5),(62,'Matemáticas VI',6,5),(63,'Dibujo constructivo II',6,1),(64,'Física IV-A1',6,1),(65,'Química IV-A1',6,1),(66,'Geología y Mineralogía',6,1),(67,'Biología V',6,2),(68,'Física IV-A2',6,2),(69,'Química IV-A2',6,2),(70,'Geografía Económica',6,3),(71,'Introducc. Al estudio de las Ciencias Sociales y E',6,3),(72,'Problemas Soc.Polit y Económicos de México',6,3),(73,'Contabilidad y Gestión Administrativa',6,3),(74,'Historia de la Cultura',6,4),(75,'Historia de las Doctrinas Filosóficas',6,4),(76,'Modelado II',6,4),(77,'Estética',6,4),(78,'Historia del Arte',6,4),(79,'Temas selec. Biología',6,7),(80,'Temas selec. de Morfología y Fisiología',6,7),(81,'Físico-Química',6,7),(82,'Temas selec. Matemáticas',6,7),(83,'Informática aplicada a la Ciencia y la Industria',6,7),(84,'Astronomía',6,7),(85,'Literatura mexicana',6,7),(86,'Revolución Mexicana',6,7),(87,'Geografía Política',6,7),(88,'Sociología',6,7),(89,'Comunicación Visual',6,7),(90,'Pensamiento Filosófico de México',6,4),(91,'Latín',6,4),(92,'Griego',6,4);
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mes`
--

DROP TABLE IF EXISTS `mes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mes` (
  `ID_MES` tinyint(4) NOT NULL AUTO_INCREMENT,
  `mes` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_MES`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mes`
--

LOCK TABLES `mes` WRITE;
/*!40000 ALTER TABLE `mes` DISABLE KEYS */;
INSERT INTO `mes` VALUES (1,'Enero'),(2,'Febrero'),(3,'Marzo'),(4,'Abril'),(5,'Mayo'),(6,'Junio'),(7,'Julio'),(8,'Agosto'),(9,'Septiembre'),(10,'Octubre'),(11,'Noviembre'),(12,'Diciembre');
/*!40000 ALTER TABLE `mes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mes_fin`
--

DROP TABLE IF EXISTS `mes_fin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mes_fin` (
  `ID_MES_FIN` tinyint(4) NOT NULL AUTO_INCREMENT,
  `mes_fin` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_MES_FIN`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mes_fin`
--

LOCK TABLES `mes_fin` WRITE;
/*!40000 ALTER TABLE `mes_fin` DISABLE KEYS */;
INSERT INTO `mes_fin` VALUES (1,'Enero'),(2,'Febrero'),(3,'Marzo'),(4,'Abril'),(5,'Mayo'),(6,'Junio'),(7,'Julio'),(8,'Agosto'),(9,'Septiembre'),(10,'Octubre'),(11,'Noviembre'),(12,'Diciembre');
/*!40000 ALTER TABLE `mes_fin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcmmt_has_report`
--

DROP TABLE IF EXISTS `pcmmt_has_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcmmt_has_report` (
  `ID_PCMMTHR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_PUB_CMMT` int(11) DEFAULT NULL,
  `motivo` text DEFAULT NULL,
  PRIMARY KEY (`ID_PCMMTHR`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_PUB_CMMT` (`ID_PUB_CMMT`),
  CONSTRAINT `pcmmt_has_report_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `pcmmt_has_report_ibfk_2` FOREIGN KEY (`ID_PUB_CMMT`) REFERENCES `pub_cam_mat` (`ID_PUB_CMMT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcmmt_has_report`
--

LOCK TABLES `pcmmt_has_report` WRITE;
/*!40000 ALTER TABLE `pcmmt_has_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `pcmmt_has_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pforo_has_report`
--

DROP TABLE IF EXISTS `pforo_has_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pforo_has_report` (
  `ID_UHR_PFORO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_PUB_FORO` int(11) DEFAULT NULL,
  `motivo` text DEFAULT NULL,
  PRIMARY KEY (`ID_UHR_PFORO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_PUB_FORO` (`ID_PUB_FORO`),
  CONSTRAINT `pforo_has_report_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `pforo_has_report_ibfk_2` FOREIGN KEY (`ID_PUB_FORO`) REFERENCES `pub_foro` (`ID_PUB_FORO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pforo_has_report`
--

LOCK TABLES `pforo_has_report` WRITE;
/*!40000 ALTER TABLE `pforo_has_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `pforo_has_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privacidad`
--

DROP TABLE IF EXISTS `privacidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privacidad` (
  `ID_PRIV` tinyint(4) NOT NULL AUTO_INCREMENT,
  `privacidad` char(25) DEFAULT NULL,
  PRIMARY KEY (`ID_PRIV`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privacidad`
--

LOCK TABLES `privacidad` WRITE;
/*!40000 ALTER TABLE `privacidad` DISABLE KEYS */;
INSERT INTO `privacidad` VALUES (1,'Pública'),(2,'Privada'),(3,'Pública, con requisitos');
/*!40000 ALTER TABLE `privacidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pub_cam_mat`
--

DROP TABLE IF EXISTS `pub_cam_mat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pub_cam_mat` (
  `ID_PUB_CMMT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_MATERIAS` tinyint(4) DEFAULT NULL,
  `ID_AULA` char(50) DEFAULT NULL,
  `ID_TIPO_CPUB` int(11) DEFAULT NULL,
  `ID_TIPO_MAT_CAMMAT` int(11) DEFAULT NULL,
  `link` char(250) DEFAULT NULL,
  `tema` char(250) DEFAULT NULL,
  `unidad` smallint(6) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_Especial` datetime DEFAULT NULL,
  `cam_cora` int(11) DEFAULT NULL,
  `cam_report` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PUB_CMMT`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_MATERIAS` (`ID_MATERIAS`),
  KEY `ID_AULA` (`ID_AULA`),
  KEY `ID_TIPO_CPUB` (`ID_TIPO_CPUB`),
  KEY `ID_TIPO_MAT_CAMMAT` (`ID_TIPO_MAT_CAMMAT`),
  CONSTRAINT `pub_cam_mat_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `pub_cam_mat_ibfk_2` FOREIGN KEY (`ID_MATERIAS`) REFERENCES `materias` (`ID_MATERIAS`),
  CONSTRAINT `pub_cam_mat_ibfk_3` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`),
  CONSTRAINT `pub_cam_mat_ibfk_4` FOREIGN KEY (`ID_TIPO_CPUB`) REFERENCES `tipo_cpub` (`ID_TIPO_CPUB`),
  CONSTRAINT `pub_cam_mat_ibfk_5` FOREIGN KEY (`ID_TIPO_MAT_CAMMAT`) REFERENCES `tipo_mat_cammat` (`ID_TIPO_MAT_CAMMAT`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pub_cam_mat`
--

LOCK TABLES `pub_cam_mat` WRITE;
/*!40000 ALTER TABLE `pub_cam_mat` DISABLE KEYS */;
/*!40000 ALTER TABLE `pub_cam_mat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pub_foro`
--

DROP TABLE IF EXISTS `pub_foro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pub_foro` (
  `ID_PUB_FORO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_MATERIAS` tinyint(4) DEFAULT NULL,
  `ID_TIPO_PFORO` tinyint(4) DEFAULT NULL,
  `ID_ESTADO_PFORO` tinyint(4) DEFAULT NULL,
  `pregunta` text DEFAULT NULL,
  `desarrollo` text DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `link` char(250) DEFAULT NULL,
  PRIMARY KEY (`ID_PUB_FORO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_MATERIAS` (`ID_MATERIAS`),
  KEY `ID_TIPO_PFORO` (`ID_TIPO_PFORO`),
  KEY `ID_ESTADO_PFORO` (`ID_ESTADO_PFORO`),
  CONSTRAINT `pub_foro_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `pub_foro_ibfk_2` FOREIGN KEY (`ID_MATERIAS`) REFERENCES `materias` (`ID_MATERIAS`),
  CONSTRAINT `pub_foro_ibfk_3` FOREIGN KEY (`ID_TIPO_PFORO`) REFERENCES `tipo_pub_foro` (`ID_TIPO_PFORO`),
  CONSTRAINT `pub_foro_ibfk_4` FOREIGN KEY (`ID_ESTADO_PFORO`) REFERENCES `estado_pforo` (`ID_ESTADO_PFORO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pub_foro`
--

LOCK TABLES `pub_foro` WRITE;
/*!40000 ALTER TABLE `pub_foro` DISABLE KEYS */;
/*!40000 ALTER TABLE `pub_foro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resp_pforo`
--

DROP TABLE IF EXISTS `resp_pforo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resp_pforo` (
  `ID_RESP_PFORO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_PUB_FORO` int(11) DEFAULT NULL,
  `fecha_resp` datetime NOT NULL,
  `respuesta` text DEFAULT NULL,
  PRIMARY KEY (`ID_RESP_PFORO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_PUB_FORO` (`ID_PUB_FORO`),
  CONSTRAINT `resp_pforo_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `resp_pforo_ibfk_2` FOREIGN KEY (`ID_PUB_FORO`) REFERENCES `pub_foro` (`ID_PUB_FORO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resp_pforo`
--

LOCK TABLES `resp_pforo` WRITE;
/*!40000 ALTER TABLE `resp_pforo` DISABLE KEYS */;
/*!40000 ALTER TABLE `resp_pforo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resp_rpforo`
--

DROP TABLE IF EXISTS `resp_rpforo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resp_rpforo` (
  `ID_RESP_RPFORO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_RESP_PFORO` int(11) DEFAULT NULL,
  `fecha_resp` datetime NOT NULL,
  `respuesta` text DEFAULT NULL,
  PRIMARY KEY (`ID_RESP_RPFORO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_RESP_PFORO` (`ID_RESP_PFORO`),
  CONSTRAINT `resp_rpforo_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `resp_rpforo_ibfk_2` FOREIGN KEY (`ID_RESP_PFORO`) REFERENCES `resp_pforo` (`ID_RESP_PFORO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resp_rpforo`
--

LOCK TABLES `resp_rpforo` WRITE;
/*!40000 ALTER TABLE `resp_rpforo` DISABLE KEYS */;
/*!40000 ALTER TABLE `resp_rpforo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_user`
--

DROP TABLE IF EXISTS `rol_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol_user` (
  `ID_ROL` tinyint(4) NOT NULL AUTO_INCREMENT,
  `rol` char(50) DEFAULT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_user`
--

LOCK TABLES `rol_user` WRITE;
/*!40000 ALTER TABLE `rol_user` DISABLE KEYS */;
INSERT INTO `rol_user` VALUES (1,'Docente'),(2,'Estudiante'),(3,'Profesor sin permisos especiales'),(4,'Estudiante con permisos especiales'),(5,'Estudiante representante de grupo'),(6,'Ayudante de Profesor');
/*!40000 ALTER TABLE `rol_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tema` (
  `ID_TEMA` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titulo` char(60) DEFAULT NULL,
  `descripcion` char(200) DEFAULT NULL,
  `ID_BLOQUE` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ID_TEMA`),
  UNIQUE KEY `titulo` (`titulo`),
  KEY `ID_BLOQUE` (`ID_BLOQUE`),
  CONSTRAINT `tema_ibfk_1` FOREIGN KEY (`ID_BLOQUE`) REFERENCES `bloque` (`ID_BLOQUE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema`
--

LOCK TABLES `tema` WRITE;
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_asign`
--

DROP TABLE IF EXISTS `tipo_asign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_asign` (
  `ID_TIPO_ASIGN` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tipo_asign` char(25) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_ASIGN`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_asign`
--

LOCK TABLES `tipo_asign` WRITE;
/*!40000 ALTER TABLE `tipo_asign` DISABLE KEYS */;
INSERT INTO `tipo_asign` VALUES (1,'Tarea'),(2,'Examen'),(3,'Pregunta'),(4,'Material'),(5,'Aviso');
/*!40000 ALTER TABLE `tipo_asign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_aula`
--

DROP TABLE IF EXISTS `tipo_aula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_aula` (
  `ID_TIPO_AULA` tinyint(4) NOT NULL,
  `ID_PRIV` tinyint(4) DEFAULT NULL,
  `tipo` char(15) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_AULA`),
  KEY `ID_PRIV` (`ID_PRIV`),
  CONSTRAINT `tipo_aula_ibfk_1` FOREIGN KEY (`ID_PRIV`) REFERENCES `privacidad` (`ID_PRIV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_aula`
--

LOCK TABLES `tipo_aula` WRITE;
/*!40000 ALTER TABLE `tipo_aula` DISABLE KEYS */;
INSERT INTO `tipo_aula` VALUES (1,2,'Curso'),(2,1,'Taller'),(3,2,'ETE'),(4,3,'Club');
/*!40000 ALTER TABLE `tipo_aula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cpub`
--

DROP TABLE IF EXISTS `tipo_cpub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_cpub` (
  `ID_TIPO_CPUB` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(50) DEFAULT NULL,
  `key_word` char(50) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_CPUB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cpub`
--

LOCK TABLES `tipo_cpub` WRITE;
/*!40000 ALTER TABLE `tipo_cpub` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_cpub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_event`
--

DROP TABLE IF EXISTS `tipo_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_event` (
  `ID_TIPO_EVENT` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ID_PRIV` tinyint(4) DEFAULT NULL,
  `tipo` char(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_EVENT`),
  KEY `ID_PRIV` (`ID_PRIV`),
  CONSTRAINT `tipo_event_ibfk_1` FOREIGN KEY (`ID_PRIV`) REFERENCES `privacidad` (`ID_PRIV`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_event`
--

LOCK TABLES `tipo_event` WRITE;
/*!40000 ALTER TABLE `tipo_event` DISABLE KEYS */;
INSERT INTO `tipo_event` VALUES (1,1,'UNAM General','Eventos generales de la UNAM'),(2,1,'ENP CicloE','Eventos de la ENP6 y sus fechas administrativas relacionadas con el ciclo indicado'),(3,1,'Eventos_ENP','Eventos especiales de la ENP6, como concursos, premios, ferias, etcétera'),(4,1,'Eventos cultYsoc','Eventos culturales y sociales de la comunidad estudiantil'),(5,1,'Días festivos','Días nacional y mundialmente festivos'),(6,2,'Evento_Asign','Eventos relacionados a una asignación'),(7,2,'Clase_Aula','Horario de clase de un aula'),(8,2,'Recordatorio','Recordatorios personalizados por el usuario en su sección: Calendario Privado Único');
/*!40000 ALTER TABLE `tipo_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_juego`
--

DROP TABLE IF EXISTS `tipo_juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_juego` (
  `ID_TIPO_JUEGO` smallint(6) NOT NULL AUTO_INCREMENT,
  `juego` char(75) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_JUEGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_juego`
--

LOCK TABLES `tipo_juego` WRITE;
/*!40000 ALTER TABLE `tipo_juego` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_mat`
--

DROP TABLE IF EXISTS `tipo_mat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_mat` (
  `ID_TIPO_MAT` tinyint(4) NOT NULL,
  `tipomat` char(70) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_MAT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_mat`
--

LOCK TABLES `tipo_mat` WRITE;
/*!40000 ALTER TABLE `tipo_mat` DISABLE KEYS */;
INSERT INTO `tipo_mat` VALUES (1,'Área 1. Ciencias Físico-Matemáticas y de las Ingenierías'),(2,'Área 2. Ciencias Biológicas, Químicas y de la Salud'),(3,'Área 3. Ciencias Sociales'),(4,'Área 4. Humanidades y de las Artes'),(5,'Tronco Común'),(6,'Estéticas'),(7,'Optativas');
/*!40000 ALTER TABLE `tipo_mat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_mat_cammat`
--

DROP TABLE IF EXISTS `tipo_mat_cammat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_mat_cammat` (
  `ID_TIPO_MAT_CAMMAT` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_matcmmt` char(50) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_MAT_CAMMAT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_mat_cammat`
--

LOCK TABLES `tipo_mat_cammat` WRITE;
/*!40000 ALTER TABLE `tipo_mat_cammat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_mat_cammat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pub_foro`
--

DROP TABLE IF EXISTS `tipo_pub_foro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_pub_foro` (
  `ID_TIPO_PFORO` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tipo` char(50) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_PFORO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pub_foro`
--

LOCK TABLES `tipo_pub_foro` WRITE;
/*!40000 ALTER TABLE `tipo_pub_foro` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_pub_foro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_user`
--

DROP TABLE IF EXISTS `tipo_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_user` (
  `ID_TIPO_USER` int(11) NOT NULL,
  `tipo_usuario` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_user`
--

LOCK TABLES `tipo_user` WRITE;
/*!40000 ALTER TABLE `tipo_user` DISABLE KEYS */;
INSERT INTO `tipo_user` VALUES (1,'Alumno'),(2,'Docente'),(3,'Moderador'),(4,'Admin');
/*!40000 ALTER TABLE `tipo_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_asignacion`
--

DROP TABLE IF EXISTS `user_has_asignacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_asignacion` (
  `ID_UHA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_ASIGN` int(11) DEFAULT NULL,
  `ID_ESTADO_ENTREGA` tinyint(4) DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `calificacion` tinyint(4) DEFAULT NULL,
  `texto_tarea` char(200) DEFAULT NULL,
  PRIMARY KEY (`ID_UHA`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_ASIGN` (`ID_ASIGN`),
  KEY `ID_ESTADO_ENTREGA` (`ID_ESTADO_ENTREGA`),
  CONSTRAINT `user_has_asignacion_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `user_has_asignacion_ibfk_2` FOREIGN KEY (`ID_ASIGN`) REFERENCES `asignacion` (`ID_ASIGN`),
  CONSTRAINT `user_has_asignacion_ibfk_3` FOREIGN KEY (`ID_ESTADO_ENTREGA`) REFERENCES `estado_entrega` (`ID_ESTADO_ENTREGA`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_asignacion`
--

LOCK TABLES `user_has_asignacion` WRITE;
/*!40000 ALTER TABLE `user_has_asignacion` DISABLE KEYS */;
INSERT INTO `user_has_asignacion` VALUES (1,7,3,2,'2022-06-08 20:12:05',10,NULL),(2,7,4,2,'2022-06-08 20:12:05',10,NULL),(3,7,5,2,'2022-06-08 20:12:05',10,NULL),(4,7,6,2,'2022-06-08 20:12:05',10,NULL),(5,7,7,2,'2022-06-08 20:12:05',10,NULL),(6,7,8,2,'2022-06-08 20:12:05',10,NULL),(7,7,9,2,'2022-06-08 20:12:05',10,NULL),(8,7,10,2,'2022-06-08 20:12:05',10,NULL),(9,7,11,2,'2022-06-08 20:12:05',10,NULL),(10,7,12,2,'2022-06-08 20:12:05',10,NULL),(11,7,13,2,'2022-06-08 20:12:05',10,NULL),(12,7,14,2,'2022-06-08 20:12:05',10,NULL),(13,7,7,2,'2022-06-08 20:12:05',10,NULL),(14,7,7,2,'2022-06-08 20:12:05',10,NULL),(15,7,15,3,NULL,NULL,NULL),(16,7,15,2,'2022-06-09 00:27:14',NULL,NULL),(17,7,16,3,NULL,NULL,NULL),(18,7,16,2,'2022-06-09 00:31:45',NULL,NULL),(19,7,17,3,NULL,NULL,NULL),(20,7,18,3,NULL,NULL,NULL),(21,8,18,3,NULL,NULL,NULL),(22,8,18,2,'2022-06-09 00:54:26',NULL,NULL),(23,9,19,3,NULL,NULL,NULL),(24,10,19,2,'2022-06-09 03:03:50',NULL,NULL),(25,10,19,2,'2022-06-09 03:03:50',NULL,NULL),(26,1,8,3,NULL,NULL,NULL),(27,1,10,3,NULL,NULL,NULL),(28,1,12,3,NULL,NULL,NULL),(29,1,13,3,NULL,NULL,NULL),(30,1,17,3,NULL,NULL,NULL),(31,1,3,3,NULL,NULL,NULL),(32,1,4,3,NULL,NULL,NULL),(33,1,5,3,NULL,NULL,NULL),(34,1,6,3,NULL,NULL,NULL),(35,1,7,3,NULL,NULL,NULL),(36,1,11,3,NULL,NULL,NULL),(37,1,14,3,NULL,NULL,NULL),(38,1,16,3,NULL,NULL,NULL),(39,1,9,3,NULL,NULL,NULL),(40,1,15,3,NULL,NULL,NULL),(41,11,20,3,NULL,NULL,NULL),(42,12,20,2,'2022-06-09 11:19:39',10,NULL),(43,13,20,4,'2022-06-09 11:33:16',0,NULL),(44,14,20,2,'2022-06-09 11:47:33',NULL,NULL);
/*!40000 ALTER TABLE `user_has_asignacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_interes_pforo`
--

DROP TABLE IF EXISTS `user_has_interes_pforo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_interes_pforo` (
  `ID_UHI_PFORO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_PUB_FORO` int(11) DEFAULT NULL,
  `ver_bool` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_UHI_PFORO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_PUB_FORO` (`ID_PUB_FORO`),
  CONSTRAINT `user_has_interes_pforo_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `user_has_interes_pforo_ibfk_2` FOREIGN KEY (`ID_PUB_FORO`) REFERENCES `pub_foro` (`ID_PUB_FORO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_interes_pforo`
--

LOCK TABLES `user_has_interes_pforo` WRITE;
/*!40000 ALTER TABLE `user_has_interes_pforo` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_has_interes_pforo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_intereses_pubcammat`
--

DROP TABLE IF EXISTS `user_has_intereses_pubcammat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_intereses_pubcammat` (
  `ID_UHI_PCMMT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_PUB_CMMT` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_UHI_PCMMT`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_PUB_CMMT` (`ID_PUB_CMMT`),
  CONSTRAINT `user_has_intereses_pubcammat_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `user_has_intereses_pubcammat_ibfk_2` FOREIGN KEY (`ID_PUB_CMMT`) REFERENCES `pub_cam_mat` (`ID_PUB_CMMT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_intereses_pubcammat`
--

LOCK TABLES `user_has_intereses_pubcammat` WRITE;
/*!40000 ALTER TABLE `user_has_intereses_pubcammat` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_has_intereses_pubcammat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_juego`
--

DROP TABLE IF EXISTS `user_has_juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_juego` (
  `ID_UHJ` int(11) NOT NULL AUTO_INCREMENT,
  `ID_JUEGO` smallint(6) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `puntos_obt` int(11) DEFAULT NULL,
  `posicion` smallint(6) DEFAULT NULL,
  `fecha_juego` datetime NOT NULL,
  PRIMARY KEY (`ID_UHJ`),
  KEY `ID_JUEGO` (`ID_JUEGO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `user_has_juego_ibfk_1` FOREIGN KEY (`ID_JUEGO`) REFERENCES `juego` (`ID_JUEGO`),
  CONSTRAINT `user_has_juego_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_juego`
--

LOCK TABLES `user_has_juego` WRITE;
/*!40000 ALTER TABLE `user_has_juego` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_has_juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ESTADO` int(11) DEFAULT NULL,
  `ID_TIPO_USER` int(11) DEFAULT NULL,
  `ID_GRADO` tinyint(4) DEFAULT NULL,
  `nombre` char(50) DEFAULT NULL,
  `apodo` char(50) DEFAULT NULL,
  `apellido_paterno` char(50) DEFAULT NULL,
  `apellido_materno` char(50) DEFAULT NULL,
  `num_identificador` char(13) DEFAULT NULL,
  `correo` char(80) DEFAULT NULL,
  `ruta_foto` char(50) DEFAULT NULL,
  `estado_unico` char(50) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `apodo` (`apodo`),
  UNIQUE KEY `num_identificador` (`num_identificador`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `num_identificador_2` (`num_identificador`),
  KEY `ID_ESTADO` (`ID_ESTADO`),
  KEY `ID_TIPO_USER` (`ID_TIPO_USER`),
  KEY `ID_GRADO` (`ID_GRADO`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_ESTADO`) REFERENCES `estado` (`ID_ESTADO`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_TIPO_USER`) REFERENCES `tipo_user` (`ID_TIPO_USER`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`ID_GRADO`) REFERENCES `grado` (`ID_GRADO`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,2,1,5,'Fernando Samuel','Fershota','López','Morales','315489721','hola@gmail','./xd/non','Me pica todo',2147483647,NULL),(2,1,3,NULL,'Servicios Moderadores','MODERS',NULL,NULL,'25',NULL,NULL,NULL,NULL,'ModersPros'),(3,1,4,NULL,'Yadid','SEB',NULL,NULL,'321073077','321073077@alumno.enp.unam.mx',NULL,NULL,NULL,'478'),(4,1,1,NULL,'Ilse','MAMA FURRA','Baños','Mancilla','321173988','banosm.ilsea.p8@gmail.com',NULL,NULL,NULL,'SI'),(5,1,4,NULL,'YO','CarlosAlf',NULL,NULL,'Porrr','PAPU@OLA',NULL,NULL,NULL,'45'),(6,1,4,NULL,'Profecito','Profecito',NULL,NULL,'POR1234567891','hola2@gmail',NULL,NULL,NULL,'Pou'),(7,1,4,NULL,'Proceson','Proceson',NULL,NULL,'LOL1234567891','ola@gmail.com',NULL,NULL,NULL,'123'),(8,1,1,NULL,'Fresongas','Pollo','Portillo','Partido','321172974','a@l',NULL,NULL,NULL,'77d3f989360ed373859657ce65c06d01731789425b6b5d173236c36d3f8fd7d6Nr62a189e33f0c8'),(9,1,2,NULL,'Profesor Papu',NULL,'Martinez','Alleon','PoU1234567891','Ko@gg',NULL,NULL,NULL,'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3Ah62a196d34ffe4'),(10,1,1,NULL,'Fercita','Ferrrr','López','Morales','326695478','lol@kok',NULL,NULL,NULL,'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3Dd62a197a384dc5'),(11,1,2,NULL,'Profesor PRO',NULL,'PRO','PRO','PPP1234567891','HI@gmail',NULL,NULL,NULL,'$2y$10$37hbLDJNg.KAg8jniiUtDuaUv7YXcdb/sfX8fbCEAMsbFCgK8.XRu'),(12,1,1,NULL,'Alumnito','Alumnito','Nito','Tito','321963852','Ni@lol',NULL,NULL,NULL,'$2y$10$5TGHblLtQXeG0.nSO80bcuE/t4FdYW076e5Z0PCoXbE.5kkBYDjXe'),(13,1,1,NULL,'Ilse','Ilse777','777','888','321741852','jojojo@gmail',NULL,NULL,NULL,'$2y$10$F1x7csp3nEo5mkiJ8v2aROYHjMmF.4ie.2/WjXa.MZiutMrlHX/3C'),(14,1,1,NULL,'Yadid','Yadishan','Lopez','Pro','321789456','yadid@soyreal',NULL,NULL,NULL,'$2y$10$JCGeglYtsAThLQOPxAEFjOJkQuUkxEdIirDKMxlEY5fOwEbGE3tda');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_has_insignias`
--

DROP TABLE IF EXISTS `usuario_has_insignias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_has_insignias` (
  `ID_USUARIO_HAS_INSIGNIAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MATERIAS` tinyint(4) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_AULA` char(50) DEFAULT NULL,
  `nombre_insignia` char(50) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO_HAS_INSIGNIAS`),
  KEY `ID_MATERIAS` (`ID_MATERIAS`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_AULA` (`ID_AULA`),
  CONSTRAINT `usuario_has_insignias_ibfk_1` FOREIGN KEY (`ID_MATERIAS`) REFERENCES `materias` (`ID_MATERIAS`),
  CONSTRAINT `usuario_has_insignias_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `usuario_has_insignias_ibfk_3` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_has_insignias`
--

LOCK TABLES `usuario_has_insignias` WRITE;
/*!40000 ALTER TABLE `usuario_has_insignias` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_has_insignias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_has_intereses`
--

DROP TABLE IF EXISTS `usuario_has_intereses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_has_intereses` (
  `ID_UHI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MATERIAS` tinyint(4) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_UHI`),
  KEY `ID_MATERIAS` (`ID_MATERIAS`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `usuario_has_intereses_ibfk_1` FOREIGN KEY (`ID_MATERIAS`) REFERENCES `materias` (`ID_MATERIAS`),
  CONSTRAINT `usuario_has_intereses_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_has_intereses`
--

LOCK TABLES `usuario_has_intereses` WRITE;
/*!40000 ALTER TABLE `usuario_has_intereses` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_has_intereses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-09 13:42:56
