-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Deportistas`;
CREATE TABLE `Deportistas` (
  `registro` int(4) NOT NULL,
  `dep_nombres` varchar(50) NOT NULL,
  `dep_lugar-nac` varchar(30) NOT NULL,
  `dep_fecha-nac` varchar(30) NOT NULL,
  `dep_doc` int(10) NOT NULL,
  `dep_edad` int(3) NOT NULL,
  `dep_sexo` varchar(10) NOT NULL,
  `dep_peso` int(3) NOT NULL,
  `dep_altura` int(3) NOT NULL,
  `dep_talla-zap` int(2) NOT NULL,
  `dep_talla-cam` varchar(3) NOT NULL,
  `dep_dir` varchar(30) NOT NULL,
  `dep_barrio` varchar(20) NOT NULL,
  `dep_tel` bigint(20) NOT NULL,
  `dep_institucion` varchar(30) NOT NULL,
  `dep_curso-semestre` varchar(10) NOT NULL,
  `acud_nombres` varchar(50) NOT NULL,
  `acud_doc` int(10) NOT NULL,
  `acud_tel` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Deportistas` (`registro`, `dep_nombres`, `dep_lugar-nac`, `dep_fecha-nac`, `dep_doc`, `dep_edad`, `dep_sexo`, `dep_peso`, `dep_altura`, `dep_talla-zap`, `dep_talla-cam`, `dep_dir`, `dep_barrio`, `dep_tel`, `dep_institucion`, `dep_curso-semestre`, `acud_nombres`, `acud_doc`, `acud_tel`) VALUES
(1,	'Janier Banguera Hernandez',	'Buenaventura',	'03-03-1984',	14475177,	37,	'Masculino',	89,	179,	40,	'L',	'Cra 61 C N 20B - 32',	'Nueva Buenaventura',	3173976663,	'Unversidad Del Pacifico',	'Graduado',	'Alejandro Banguera Cuellar',	16474080,	3155699658);

-- 2022-01-09 01:39:38
