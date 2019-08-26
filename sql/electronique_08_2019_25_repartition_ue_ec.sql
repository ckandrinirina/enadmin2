-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2019 at 11:56 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronique`
--

-- --------------------------------------------------------

--
-- Table structure for table `acces`
--

CREATE TABLE `acces` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acces`
--

INSERT INTO `acces` (`id`, `type_id`, `username`, `roles`, `password`, `is_active`) VALUES
(1, 3, 'admin', '[\"ROLE_SUPER_ADMIN\"]', '$2y$13$FbESQa4hdjwLtW/Yu0yaneLkpRMRPL7r5gI1EvCyIlqqe442BO.jq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anne_universitaire`
--

CREATE TABLE `anne_universitaire` (
  `id` int(11) NOT NULL,
  `anne_universitaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anne_universitaire`
--

INSERT INTO `anne_universitaire` (`id`, `anne_universitaire`) VALUES
(1, '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `droit`
--

CREATE TABLE `droit` (
  `id` int(11) NOT NULL,
  `valeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ec`
--

CREATE TABLE `ec` (
  `id` int(11) NOT NULL,
  `uc_id` int(11) DEFAULT NULL,
  `enseignant_id` int(11) DEFAULT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coefficient` double NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ec`
--

INSERT INTO `ec` (`id`, `uc_id`, `enseignant_id`, `nom`, `coefficient`, `code`, `credit`, `description`) VALUES
(1, 1, NULL, 'Circuits Electroniques et Electriques I', 0.3333, 'E111CEE', 3, 'Circuit Electronique'),
(2, 1, NULL, 'Métrologie', 0.3333, 'E112MET', 3, 'Métrologie'),
(3, 1, NULL, 'Electrostatique', 0.3333, 'E113EST', 3, 'Electrostatique'),
(4, 2, NULL, 'Algèbre I', 0.333, 'E121ALG', 2, 'Algèbre 1'),
(5, 2, NULL, 'Analyse I', 0.333, 'E122ANL', 2, 'Analyse 1'),
(6, 2, NULL, 'Calcul vectoriel et Intégral  l', 0.3333, 'E123CVI', 2, 'CVI 1'),
(7, 3, NULL, 'Algorithmique', 0.5, 'E132AGO', 3, 'Algorithmique'),
(8, 3, NULL, 'Logique combinatoire I', 0.5, 'E133LCO', 3, 'Logique'),
(9, 4, NULL, 'Optique Géométrique', 0.5, 'E141OPG', 2, 'Optique Géométrique'),
(10, 4, NULL, 'Chimie Physique', 0.5, 'E142CPH', 3, 'Chimie Physique'),
(11, 9, NULL, 'Français et Cadrage Culturel', 0.5, 'E151FCC', 2, 'Français et Cadrage Culturel'),
(12, 9, NULL, 'Initiation aux Etudes Universitaires', 0.5, 'E152IEN', 2, 'Initiation aux Etudes Universitaires'),
(13, 5, NULL, 'Circuits Electroniques et Electriques II', 2, 'E211CEE', 2, 'Circuits Electroniques et Electriques II'),
(14, 5, NULL, 'Electrocinétique des Courants Continus', 0.5, 'E212ECC', 3, 'Electrocinétique des Courants Continus'),
(15, 6, NULL, 'Algèbre II', 0.25, 'E221ALG', 2, 'Algèbre II'),
(16, 6, NULL, 'Analyse II', 0.25, 'E222ANL', 2, 'Algèbre II'),
(17, 6, NULL, 'Calcul Vectoriel et Intégral II', 0.25, 'E223CVI', 2, 'CVI 2'),
(18, 6, NULL, 'Calcul Numérique', 0.25, 'E223CVI', 3, 'CN'),
(19, 7, NULL, 'Thermodynamique', 0.3333, 'E231TRM', 2, 'TH'),
(20, 7, NULL, 'Optique Physique', 0.3333, 'E232OPH', 2, 'optique physique'),
(21, 7, NULL, 'Mécanique Générale', 0.3333, 'E233MCG', 3, 'Mécanique gen'),
(22, 8, NULL, 'Programmation en C 1', 0.25, 'E241MOF', 3, 'Programmation en C 1'),
(23, 8, NULL, 'Logique combinatoire II', 0.25, 'E242LCO', 2, 'Logique combinatoire II'),
(24, 22, NULL, 'Anglais', 0.5, 'E251ANG', 2, 'Anglais'),
(25, 22, NULL, 'Français', 0.5, 'E252FRS', 2, 'Français'),
(26, 10, NULL, 'Electrocinétique des Courants Variables', 0.3333, 'E311ECV', 3, 'Electrocinétique des Courants Variables'),
(27, 10, NULL, 'Electronique I', 0.333, 'E312ELN', 3, 'Electronique I'),
(28, 10, NULL, 'Systèmes Linéaires I', 0.333, 'E313SYL', 3, 'Systèmes Linéaires I'),
(29, 11, NULL, 'Informatique I', 0.5, 'E321INF', 3, 'Informatique I'),
(30, 11, NULL, 'Architecture des ordinateurs / Système d\'exploitation', 0.5, 'E322ADO', 3, 'Architecture des ordinateurs / Système d\'exploitation'),
(31, 12, NULL, 'Analyse Algèbre', 0.3333, 'E331ANA', 3, 'Analyse Algèbre'),
(32, 12, NULL, 'Géométrie Analytique', 0.3333, 'E332GAN', 3, 'Géométrie Analytique'),
(33, 12, NULL, 'Probabilité et Statistique', 0.3333, 'E333PRS', 3, 'Probabilité et Statistique'),
(34, 15, NULL, 'Simulation MATLAB', 0.3333, 'E341SIM', 2, 'Simulation MATLAB'),
(35, 15, NULL, 'Analyse Fonctionnelle', 0.3333, 'E342ANF', 2, 'Analyse Fonctionnelle'),
(36, 15, NULL, 'Anglais', 0.3333, 'E351ANG', 2, 'Anglais'),
(37, 16, NULL, 'Electromagnétisme', 0.333, 'E411ELM', 3, 'Electromagnétisme'),
(38, 16, NULL, 'Electronique II', 0.3333, 'E412ELN', 3, 'Electronique II'),
(39, 16, NULL, 'Systèmes Linéaires II', 0.3333, 'E413SYL', 3, 'Systèmes Linéaires II'),
(40, 17, NULL, 'Informatique II', 0.3333, 'E421INF', 3, 'Informatique II'),
(41, 17, NULL, 'Initiation JAVA', 0.3333, 'E422LGC', 3, 'Initiation JAVA'),
(42, 17, NULL, 'Base de données', 0.3333, 'E423BDR', 2, 'Base de données'),
(43, 18, NULL, 'Signaux Aléatoires et Bruits', 0.5, 'E431SAB', 3, 'Signaux Aléatoires et Bruits'),
(44, 18, NULL, 'Signaux Déterministes', 0.5, 'E432SDT', 3, 'Signaux Déterministes'),
(45, 19, NULL, 'Rédaction Scientifique', 0.3333, 'E441RSC', 2, 'Rédaction Scientifique'),
(46, 19, NULL, 'Français', 0.3333, 'E442FRS', 2, 'Français'),
(47, 19, NULL, 'Economie', 0.3333, 'E451ECO', 3, 'Economie'),
(48, 23, NULL, 'Mathématiques Financières', 0.5, 'E511MFI', 2, 'Mathématiques Financières'),
(49, 23, NULL, 'Méthodes informatique de gestion', 0.5, 'E512MIG', 1, 'Méthodes informatique de gestion'),
(50, 24, NULL, 'PLOO', 0.333, 'E521POO', 2, 'PLOO'),
(51, 24, NULL, 'Développement Web', 0.3333, 'E522DEW', 2, 'Développement Web'),
(52, 24, NULL, 'Base de données', 0.3333, 'E531THS', 3, 'Base de données'),
(53, 25, NULL, 'Théorie du signal', 0.5, 'E531THS', 2, 'Théorie du signal'),
(54, 25, NULL, 'Electrotechnique', 0.5, 'E532ETC', 3, 'Electrotechnique'),
(55, 26, NULL, 'ACCE', 0.333, 'EN541ACC', 3, 'ACCE'),
(56, 26, NULL, 'TP ACCE', 0.333, 'EN542TAC', 1, 'TP ACCE'),
(57, 26, NULL, 'Circuits séquentiels', 0.333, 'E543CSQ', 3, 'Circuits séquentiels'),
(58, 27, NULL, 'TED', 0.25, 'E552TED', 3, 'TED'),
(59, 27, NULL, 'TP TED', 0.25, 'EN51TED', 1, 'TP TED'),
(60, 27, NULL, 'Circuits intégrés', 0.25, 'E554CIN', 3, 'Circuits intégrés'),
(61, 27, NULL, 'TP Circuits intégrés', 0.25, 'EN554CIN', 1, 'TP Circuits intégrés'),
(62, 28, NULL, 'Technologie des CI', 0.5, 'E611TCN', 3, 'Technologie des CI'),
(64, 28, NULL, 'Microprocesseurs', 0.5, 'E612MIC', 3, 'Microprocesseurs'),
(65, 29, NULL, 'Distribution', 0.5, 'E621DIS', 2, 'Distribution'),
(66, 29, NULL, 'Fiabilité Systémique', 0.5, 'E622FSY', 2, 'Fiabilité Systémique'),
(67, 30, NULL, 'Mécanique quantique', 0.5, 'E631MQU', 2, 'Mécanique quantique'),
(68, 30, NULL, 'Théorie de perturbations', 0.5, 'E632TPE', 1, 'Théorie de perturbations'),
(69, 31, NULL, 'Programmation JAVA', 0.5, 'E641JVA', 3, 'Programmation JAVA'),
(70, 31, NULL, 'Structures de données', 0.5, 'EN641STD', 2, 'Structures de données'),
(71, 32, NULL, 'Electronique de puissance', 0.333, 'E651ENP', 3, 'Electronique de puissance'),
(72, 32, NULL, 'Simulation PSPICE', 0.333, 'E652SPC', 3, 'Simulation PSPICE'),
(73, 32, NULL, 'TP PSPICE', 0.333, 'E653SPC', 1, 'TP PSPICE'),
(74, 33, NULL, 'Systèmes Asservis Linéaires Continus', 0.5, 'E711SAC', 3, 'Systèmes Asservis Linéaires Continus'),
(75, 33, NULL, 'Circuits Mémoires', 0.5, 'E744CME', 3, 'Circuits Mémoires'),
(76, 34, NULL, 'Physique des Semiconducteurs', 0.5, 'E721PDS', 3, 'Physique des Semiconducteurs'),
(77, 34, NULL, 'Mesures des Grandeurs Physiques et Capteurs', 0.5, 'E722MPC', 3, 'Mesures des Grandeurs Physiques et Capteurs'),
(78, 35, NULL, 'Réseau local', 0.33, 'E731RLO', 2, 'Réseau local'),
(79, 35, NULL, 'Programmation Matérielle', 0.333, 'E851PRM', 3, 'Programmation Matérielle'),
(80, 35, NULL, 'Génie logiciel', 0.333, 'E851PRM', 2, 'Génie logiciel'),
(81, 36, NULL, 'Circuits et Fonction de l’Electronique', 0.25, 'E741CFE', 3, 'Circuits et Fonction de l’Electronique'),
(82, 36, NULL, 'EP CFE', 0.25, 'E744CFE', 3, 'EP CFE'),
(83, 36, NULL, 'Electronique Analogique', 0.25, 'E742EAN', 3, 'E742EAN'),
(84, 36, NULL, 'EP Electronique Analogique', 0.25, 'E743EAN', 1, 'EP Electronique Analogique'),
(85, 37, NULL, 'Analyse Financière', 0.5, 'E751ANF', 2, 'Analyse Financière'),
(86, 37, NULL, 'Evaluation financière', 0.5, 'E751EVF', 1, 'Evaluation financière'),
(87, 38, NULL, 'Systèmes Asservis Linéaires Echantillonnés', 0.25, 'E811SAE', 3, 'Systèmes Asservis Linéaires Echantillonnés'),
(88, 38, NULL, 'EP Systèmes Asservis Linéaires', 0.25, 'E812SAL', 1, 'EP Systèmes Asservis Linéaires'),
(89, 40, NULL, 'Programmation evenementielle\r\n', 0.5, 'E821JAV\r\n', 3, 'Programmation evenementielle\r\n'),
(90, 40, NULL, 'Réseaux', 0.5, 'E822SDD', 3, 'Réseaux'),
(91, 41, NULL, 'Système d’Exploitation', 0.333, 'E831SXP', 3, 'Système d’Exploitation'),
(92, 41, NULL, 'EP Système d’Exploitation', 0.333, 'E832SXP', 1, 'EP Système d’Exploitation'),
(93, 41, NULL, 'Système de Gestion de Base de Données', 0.333, 'E833SGB', 0, 'Système de Gestion de Base de Données'),
(94, 42, NULL, 'Fibre Optique', 0.5, 'E841FOP', 0, 'Fibre Optique'),
(95, 42, NULL, 'Optoélectronique', 0.5, 'E842OPT', 3, 'Optoélectronique'),
(96, 43, NULL, 'Théorie et Pratique du Codage', 0.333, 'E732TPC', 3, 'Théorie et Pratique du Codage'),
(97, 43, NULL, 'Transmission de Données', 0.333, 'E852TRX', 3, 'Transmission de Données'),
(98, 43, NULL, 'EP Transmission de Données', 0.333, 'E853TRX', 1, 'EP Transmission de Données'),
(99, 44, NULL, 'Programmation en Langage Machine', 0.5, 'E911PLM', 3, 'Programmation en Langage Machine'),
(100, 44, NULL, 'Administration Systèmes', 0.5, 'E912ADS', 3, 'Administration Systèmes'),
(101, 45, NULL, 'Physique des Dispositifs Semiconducteurs', 0.5, 'E921PDS', 3, 'Physique des Dispositifs Semiconducteurs'),
(102, 45, NULL, 'Microprocesseurs II', 0.5, 'E922MIP', 3, 'Microprocesseurs II'),
(103, 46, NULL, 'Représentation d’Etat des Systèmes Multi variables', 0.5, 'E931RSM', 3, 'Représentation d’Etat des Systèmes Multi variables'),
(104, 46, NULL, 'Traitement Numérique du Signal', 0.5, 'E932TNS', 3, 'Traitement Numérique du Signal'),
(105, 47, NULL, 'Gestion de Qualité', 0.5, 'E941GQU', 2, 'Gestion de Qualité'),
(106, 47, NULL, 'Normes', 0.5, 'E941NOR', 1, 'Normes'),
(107, 49, NULL, 'Systèmes Asservis Non Linéaires', 0.333, 'E951SALEA', 3, 'Systèmes Asservis Non Linéaires'),
(108, 49, NULL, 'Circuits  Programmables', 0.333, 'E961CPGEA', 3, 'Circuits  Programmables'),
(109, 49, NULL, 'Instrumentation', 0.333, 'E962INSEA', 3, 'Instrumentation'),
(110, 50, NULL, 'Administration Systèmes', 0.5, 'E1011ADS', 3, 'Administration Systèmes'),
(111, 50, NULL, 'Commandes Optimales Modales', 0.5, 'E1031COM', 3, 'Commandes Optimales Modales'),
(112, 51, NULL, 'Marketing et gestion de ressources humaines', 0.5, 'E1021MANG', 2, 'Marketing et gestion de ressources humaines'),
(113, 51, NULL, 'Techniques quantitatives de décision', 0.5, 'E1022TQD', 1, 'Techniques quantitatives de décision'),
(114, 52, NULL, 'Electronique Biomédical', 0.333, 'E1031ENBEA', 2, 'Electronique Biomédical'),
(115, 52, NULL, 'Electronique Industriel', 0.333, 'E1032ENIEA', 3, 'Electronique Industriel'),
(116, 52, NULL, 'Modélisation Comportementale', 0.3333, 'E1033MODEA', 3, 'Modélisation Comportementale'),
(117, 53, NULL, 'Robotique', 0.5, 'E1041ROBEA', 3, 'Robotique'),
(118, 53, NULL, 'Systèmes Embarqués', 0.5, 'E1042SEMEA', 3, 'Systèmes Embarqués'),
(119, 54, NULL, 'Mémoire', 1, 'E1041MEM', 7, 'Mémoire'),
(120, 56, NULL, 'Téléinformatique', 0.333, 'E951TLIIA', 3, 'Téléinformatique'),
(121, 56, NULL, 'Cryptographie', 0.333, 'E952CRYIA', 3, 'Cryptographie'),
(122, 56, NULL, 'Génie Logiciel II', 0.333, 'E961GLOIA', 3, 'Génie Logiciel II'),
(123, 57, NULL, 'Vision Artificielle', 0.333, 'E1031VARIA', 2, 'Vision Artificielle'),
(124, 57, NULL, 'Filtrage et Segmentation d’Image', 0.333, 'E1032FSIIA', 3, 'Filtrage et Segmentation d’Image'),
(125, 57, NULL, 'Développement d’Application Android', 0.333, 'E1033DAAIA', 3, 'Développement d’Application Android'),
(126, 58, NULL, 'Intelligence Artificielle', 0.5, 'E1061IARIA', 3, 'Intelligence Artificielle'),
(127, 58, NULL, 'Réseaux  bayésiens', 0.5, 'E1061IAPIA', 3, 'Réseaux  bayésiens');

-- --------------------------------------------------------

--
-- Table structure for table `emploi_du_temps`
--

CREATE TABLE `emploi_du_temps` (
  `id` int(11) NOT NULL,
  `jour_id` int(11) DEFAULT NULL,
  `heure_id` int(11) DEFAULT NULL,
  `niveau_id` int(11) DEFAULT NULL,
  `ec_id` int(11) DEFAULT NULL,
  `semestre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `login_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `lieux_naissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enseignant_type`
--

CREATE TABLE `enseignant_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enseignant_type`
--

INSERT INTO `enseignant_type` (`id`, `type`) VALUES
(1, 'permanent'),
(2, 'vacataire');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `sexe_id` int(11) NOT NULL,
  `niveaux_id` int(11) NOT NULL,
  `anne_universitaire_id` int(11) NOT NULL,
  `login_id` int(11) DEFAULT NULL,
  `parcour_id` int(11) DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession_pere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession_mere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `lieux_naissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anne_entre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_sortant` tinyint(1) DEFAULT NULL,
  `contact2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `begin_at` datetime NOT NULL,
  `end_at` datetime DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fiche_individuel`
--

CREATE TABLE `fiche_individuel` (
  `id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `ec_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL,
  `anne_universitaire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heures`
--

CREATE TABLE `heures` (
  `id` int(11) NOT NULL,
  `heures` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heures`
--

INSERT INTO `heures` (`id`, `heures`) VALUES
(1, '07:30 à 09:30'),
(2, '09:30 à 11:30'),
(3, '12:30 à 14:30'),
(4, '14:30 à 16:30');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_at` datetime NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information_fils`
--

CREATE TABLE `information_fils` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `information_id` int(11) DEFAULT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_at` datetime NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information_niveaux`
--

CREATE TABLE `information_niveaux` (
  `information_id` int(11) NOT NULL,
  `niveaux_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jours`
--

CREATE TABLE `jours` (
  `id` int(11) NOT NULL,
  `jours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jours`
--

INSERT INTO `jours` (`id`, `jours`) VALUES
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(4, 'Jeudi'),
(5, 'Vendredi'),
(6, 'Samedi');

-- --------------------------------------------------------

--
-- Table structure for table `moyenne`
--

CREATE TABLE `moyenne` (
  `id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL,
  `niveau_id` int(11) NOT NULL,
  `anne_universitaire_id` int(11) NOT NULL,
  `value` double NOT NULL,
  `is_ratrapage` tinyint(1) NOT NULL,
  `is_valide` tinyint(1) NOT NULL,
  `credit` double NOT NULL,
  `is_final` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `niveaux`
--

INSERT INTO `niveaux` (`id`, `type_id`, `niveau`, `nom`) VALUES
(1, 1, 'L1', 'L1'),
(2, 1, 'L2', 'L2'),
(3, 1, 'L3', 'L3'),
(4, 1, 'M1', 'M1'),
(5, 1, 'M2IA', 'M2(IA)'),
(6, 1, 'M2EA', 'M2(EA)'),
(7, 1, 'MVR', 'MVR'),
(8, 2, 'LP1', 'L1'),
(9, 2, 'LP2', 'L2'),
(10, 2, 'LP3', 'L3'),
(11, 2, 'MP1', 'M1'),
(12, 2, 'MP2IA', 'M2(IA)'),
(13, 2, 'MP2EA', 'M2(EA)'),
(14, 2, 'TASI', 'TASI'),
(15, 3, 'sortant', 'sortant');

-- --------------------------------------------------------

--
-- Table structure for table `niveaux_uc`
--

CREATE TABLE `niveaux_uc` (
  `niveaux_id` int(11) NOT NULL,
  `uc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `niveaux_uc`
--

INSERT INTO `niveaux_uc` (`niveaux_id`, `uc_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 22),
(2, 10),
(2, 11),
(2, 12),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(4, 33),
(4, 34),
(4, 35),
(4, 36),
(4, 37),
(4, 38),
(4, 40),
(4, 41),
(4, 42),
(4, 43),
(5, 44),
(5, 45),
(5, 46),
(5, 50),
(5, 51),
(5, 54),
(5, 56),
(5, 57),
(5, 58),
(6, 44),
(6, 45),
(6, 46),
(6, 47),
(6, 49),
(6, 50),
(6, 51),
(6, 52),
(6, 53),
(6, 54),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 7),
(8, 8),
(8, 9),
(8, 22),
(9, 10),
(9, 11),
(9, 12),
(9, 15),
(9, 16),
(9, 17),
(9, 18),
(9, 19),
(10, 23),
(10, 24),
(10, 25),
(10, 26),
(10, 27),
(10, 28),
(10, 29),
(10, 31),
(10, 32),
(11, 33),
(11, 34),
(11, 35),
(11, 36),
(11, 38),
(11, 40),
(11, 41),
(11, 42),
(11, 43),
(12, 44),
(12, 45),
(12, 46),
(12, 50),
(12, 51),
(12, 54),
(12, 56),
(12, 57),
(12, 58),
(13, 44),
(13, 45),
(13, 46),
(13, 47),
(13, 49),
(13, 50),
(13, 51),
(13, 52),
(13, 53),
(13, 54);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `ec_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL,
  `anne_universitaire_id` int(11) DEFAULT NULL,
  `niveaux_id` int(11) NOT NULL,
  `note_uc_id` int(11) DEFAULT NULL,
  `valeur` double NOT NULL,
  `is_ratrapage` tinyint(1) NOT NULL,
  `is_valide` tinyint(1) NOT NULL,
  `value_coeff` double NOT NULL,
  `is_final` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note_uc`
--

CREATE TABLE `note_uc` (
  `id` int(11) NOT NULL,
  `uc_id` int(11) DEFAULT NULL,
  `etudiant_id` int(11) DEFAULT NULL,
  `semestre_id` int(11) DEFAULT NULL,
  `anne_universitaire_id` int(11) DEFAULT NULL,
  `niveaux_id` int(11) DEFAULT NULL,
  `value_coeff` double NOT NULL,
  `is_ratarapage` tinyint(1) NOT NULL,
  `is_valide` tinyint(1) NOT NULL,
  `credit` int(11) NOT NULL,
  `is_final` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parametrage`
--

CREATE TABLE `parametrage` (
  `id` int(11) NOT NULL,
  `chefmention_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repartition_ec`
--

CREATE TABLE `repartition_ec` (
  `id` int(11) NOT NULL,
  `ec_id` int(11) DEFAULT NULL,
  `niveaux_id` int(11) DEFAULT NULL,
  `semestre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repartition_ec`
--

INSERT INTO `repartition_ec` (`id`, `ec_id`, `niveaux_id`, `semestre_id`) VALUES
(1, 1, 1, 1),
(2, 1, 8, 2),
(3, 2, 1, 1),
(4, 2, 8, 2),
(5, 3, 1, 1),
(6, 3, 8, 2),
(7, 4, 1, 1),
(8, 4, 8, 2),
(9, 5, 1, 1),
(10, 5, 8, 2),
(11, 6, 1, 1),
(12, 6, 8, 2),
(13, 7, 1, 1),
(14, 7, 8, 2),
(15, 8, 1, 1),
(16, 8, 8, 2),
(17, 9, 1, 1),
(18, 9, 8, 2),
(19, 10, 1, 1),
(20, 10, 8, 2),
(21, 11, 1, 1),
(22, 11, 8, 2),
(23, 12, 1, 1),
(24, 12, 8, 2),
(25, 13, 1, 3),
(26, 13, 8, 4),
(27, 14, 1, 3),
(28, 14, 8, 4),
(29, 15, 1, 3),
(30, 16, 1, 3),
(31, 17, 1, 3),
(32, 18, 1, 3),
(33, 19, 1, 3),
(34, 19, 8, 4),
(35, 20, 1, 3),
(36, 20, 8, 4),
(37, 21, 1, 3),
(38, 21, 8, 4),
(39, 22, 1, 3),
(40, 22, 8, 4),
(41, 23, 1, 3),
(42, 23, 8, 4),
(43, 24, 1, 3),
(44, 24, 8, 4),
(45, 25, 1, 3),
(46, 25, 8, 4),
(47, 26, 2, 5),
(48, 26, 9, 6),
(49, 27, 2, 5),
(50, 27, 9, 6),
(51, 28, 2, 5),
(52, 28, 9, 6),
(53, 29, 2, 5),
(54, 29, 9, 6),
(55, 30, 9, 6),
(56, 30, 2, 5),
(57, 31, 2, 5),
(58, 31, 9, 6),
(59, 32, 2, 5),
(60, 32, 9, 6),
(61, 33, 2, 5),
(62, 33, 9, 6),
(63, 34, 2, 5),
(64, 34, 9, 6),
(65, 35, 2, 5),
(66, 35, 9, 6),
(67, 36, 2, 5),
(68, 36, 9, 6),
(69, 37, 2, 7),
(70, 37, 9, 8),
(71, 15, 8, 4),
(72, 16, 8, 4),
(73, 17, 8, 4),
(74, 18, 8, 4),
(75, 38, 2, 7),
(76, 38, 9, 8),
(77, 39, 2, 7),
(78, 39, 9, 8),
(79, 40, 2, 7),
(80, 40, 9, 8),
(81, 41, 2, 7),
(82, 41, 9, 8),
(83, 42, 2, 7),
(84, 42, 9, 8),
(85, 43, 2, 7),
(86, 43, 9, 8),
(87, 44, 2, 7),
(88, 44, 9, 8),
(89, 45, 2, 7),
(90, 45, 9, 8),
(91, 46, 2, 7),
(92, 46, 9, 8),
(93, 47, 2, 7),
(94, 47, 9, 8),
(95, 48, 3, 9),
(96, 48, 10, 10),
(97, 49, 3, 9),
(98, 49, 10, 10),
(99, 50, 3, 9),
(100, 50, 10, 10),
(101, 51, 3, 9),
(102, 51, 10, 10),
(103, 52, 3, 9),
(104, 52, 10, 10),
(105, 53, 3, 9),
(106, 53, 10, 10),
(107, 54, 3, 9),
(108, 54, 10, 10),
(109, 55, 3, 9),
(110, 55, 10, 10),
(111, 56, 3, 9),
(112, 56, 10, 10),
(113, 57, 3, 9),
(114, 57, 10, 10),
(115, 58, 3, 9),
(116, 58, 10, 10),
(117, 59, 3, 9),
(118, 59, 10, 10),
(119, 60, 3, 9),
(120, 60, 10, 10),
(121, 61, 3, 9),
(122, 61, 10, 10),
(123, 62, 3, 11),
(124, 62, 10, 12),
(127, 64, 3, 11),
(128, 64, 10, 12),
(129, 65, 3, 11),
(130, 65, 10, 12),
(131, 66, 3, 11),
(132, 66, 10, 12),
(133, 67, 3, 11),
(134, 68, 3, 11),
(135, 69, 3, 11),
(136, 69, 10, 12),
(137, 70, 3, 11),
(138, 70, 10, 12),
(139, 71, 3, 11),
(140, 71, 10, 12),
(141, 72, 3, 11),
(142, 72, 10, 12),
(143, 73, 3, 11),
(144, 73, 10, 12),
(145, 74, 4, 13),
(146, 74, 11, 14),
(147, 75, 4, 13),
(148, 75, 11, 14),
(149, 76, 4, 13),
(150, 76, 11, 14),
(151, 77, 4, 13),
(152, 77, 11, 14),
(153, 78, 4, 13),
(154, 78, 11, 14),
(155, 79, 4, 13),
(156, 79, 11, 14),
(157, 80, 4, 13),
(158, 80, 11, 14),
(159, 81, 4, 13),
(160, 81, 11, 14),
(161, 82, 4, 13),
(162, 82, 11, 14),
(163, 83, 4, 13),
(164, 83, 11, 14),
(165, 84, 4, 13),
(166, 84, 11, 14),
(167, 85, 4, 13),
(168, 86, 4, 13),
(169, 87, 4, 15),
(170, 87, 11, 16),
(171, 88, 4, 15),
(172, 88, 11, 16),
(173, 89, 4, 15),
(174, 89, 11, 16),
(175, 90, 4, 15),
(176, 90, 11, 16),
(177, 91, 4, 15),
(178, 91, 11, 16),
(179, 92, 4, 15),
(180, 92, 11, 16),
(181, 93, 4, 15),
(182, 93, 11, 16),
(183, 94, 4, 15),
(184, 94, 11, 16),
(185, 95, 4, 15),
(186, 95, 11, 16),
(187, 96, 4, 15),
(188, 96, 11, 16),
(189, 97, 4, 15),
(190, 97, 11, 16),
(191, 98, 4, 15),
(192, 98, 11, 16),
(193, 99, 6, 18),
(194, 99, 13, 20),
(195, 100, 6, 18),
(196, 100, 13, 20),
(197, 101, 6, 18),
(198, 101, 13, 20),
(199, 102, 6, 18),
(200, 102, 13, 20),
(201, 103, 6, 18),
(202, 103, 13, 20),
(203, 104, 6, 18),
(204, 104, 13, 20),
(205, 105, 6, 18),
(206, 105, 13, 20),
(207, 106, 6, 18),
(208, 106, 13, 20),
(209, 107, 6, 18),
(210, 107, 13, 20),
(211, 108, 6, 18),
(212, 108, 13, 20),
(213, 109, 6, 18),
(214, 109, 13, 20),
(215, 110, 6, 22),
(216, 110, 13, 24),
(217, 111, 6, 22),
(218, 111, 13, 24),
(219, 112, 6, 22),
(220, 112, 13, 24),
(221, 113, 6, 22),
(222, 113, 13, 24),
(223, 114, 6, 22),
(224, 114, 13, 24),
(225, 115, 6, 22),
(226, 115, 13, 24),
(227, 116, 6, 22),
(228, 116, 13, 24),
(229, 117, 6, 22),
(230, 117, 13, 24),
(231, 118, 6, 22),
(232, 118, 13, 24),
(233, 119, 6, 22),
(234, 119, 13, 24),
(235, 99, 5, 17),
(236, 99, 12, 19),
(237, 100, 12, 17),
(238, 100, 12, 19),
(239, 101, 5, 17),
(240, 101, 12, 19),
(241, 100, 5, 17),
(242, 102, 5, 17),
(243, 102, 12, 19),
(244, 105, 5, 17),
(245, 105, 12, 19),
(246, 106, 5, 17),
(247, 106, 12, 19),
(248, 103, 5, 17),
(249, 103, 12, 19),
(250, 104, 5, 17),
(251, 104, 12, 19),
(252, 120, 5, 17),
(253, 120, 12, 19),
(254, 121, 5, 17),
(255, 121, 12, 18),
(256, 122, 5, 17),
(257, 122, 12, 19),
(258, 110, 5, 21),
(259, 110, 12, 23),
(260, 111, 5, 21),
(261, 111, 12, 23),
(262, 112, 5, 21),
(263, 112, 12, 23),
(264, 113, 5, 21),
(265, 113, 12, 23),
(266, 123, 5, 21),
(267, 123, 12, 23),
(268, 124, 5, 21),
(269, 124, 12, 23),
(270, 125, 5, 21),
(271, 125, 12, 23),
(272, 126, 5, 21),
(273, 126, 12, 23),
(274, 127, 5, 21),
(275, 127, 12, 23),
(276, 119, 5, 21),
(277, 119, 12, 23);

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `niveau_id` int(11) DEFAULT NULL,
  `semestre_id` int(11) DEFAULT NULL,
  `parcour_id` int(11) DEFAULT NULL,
  `salle_class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salle_class`
--

CREATE TABLE `salle_class` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scolarite`
--

CREATE TABLE `scolarite` (
  `id` int(11) NOT NULL,
  `niveau_id` int(11) DEFAULT NULL,
  `etudiant_id` int(11) DEFAULT NULL,
  `numero_inscription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scolarite_image`
--

CREATE TABLE `scolarite_image` (
  `id` int(11) NOT NULL,
  `scolarites_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `semestre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semestre`
--

INSERT INTO `semestre` (`id`, `semestre`, `nom`) VALUES
(1, 'S1', 'S1'),
(2, 'SP1', 'S1'),
(3, 'S2', 'S2'),
(4, 'SP2', 'S2'),
(5, 'S3', 'S3'),
(6, 'SP3', 'S3'),
(7, 'S4', 'S4'),
(8, 'SP4', 'S4'),
(9, 'S5', 'S5'),
(10, 'SP5', 'S5'),
(11, 'S6', 'S6'),
(12, 'SP6', 'S6'),
(13, 'S7', 'S7'),
(14, 'SP7', 'S7'),
(15, 'S8', 'S8'),
(16, 'SP8', 'S8'),
(17, 'S9IA', 'S9'),
(18, 'S9EA', 'S9'),
(19, 'SP9IA', 'S9'),
(20, 'SP9EA', 'S9'),
(21, 'S10IA', 'S10'),
(22, 'S10EA', 'S10'),
(23, 'SP10IA', 'S10'),
(24, 'SP10EA', 'S10'),
(25, 'S11', 'S11'),
(26, 'S12', 'S12'),
(27, 'Sp11', 'Sp11'),
(28, 'Sp12', 'Sp12');

-- --------------------------------------------------------

--
-- Table structure for table `semestre_niveaux`
--

CREATE TABLE `semestre_niveaux` (
  `semestre_id` int(11) NOT NULL,
  `niveaux_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semestre_niveaux`
--

INSERT INTO `semestre_niveaux` (`semestre_id`, `niveaux_id`) VALUES
(1, 1),
(2, 8),
(3, 1),
(4, 8),
(5, 2),
(6, 9),
(7, 2),
(8, 9),
(9, 3),
(10, 10),
(11, 3),
(12, 10),
(13, 4),
(14, 11),
(15, 4),
(16, 11),
(17, 5),
(18, 6),
(19, 12),
(20, 13),
(21, 5),
(22, 6),
(23, 12),
(24, 13),
(25, 7),
(26, 7),
(27, 14),
(28, 14);

-- --------------------------------------------------------

--
-- Table structure for table `semestre_uc`
--

CREATE TABLE `semestre_uc` (
  `semestre_id` int(11) NOT NULL,
  `uc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semestre_uc`
--

INSERT INTO `semestre_uc` (`semestre_id`, `uc_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 9),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 9),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 22),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 22),
(5, 10),
(5, 11),
(5, 12),
(5, 15),
(6, 10),
(6, 11),
(6, 12),
(6, 15),
(7, 16),
(7, 17),
(7, 18),
(7, 19),
(8, 16),
(8, 17),
(8, 18),
(8, 19),
(9, 23),
(9, 24),
(9, 25),
(9, 26),
(9, 27),
(10, 23),
(10, 24),
(10, 25),
(10, 26),
(10, 27),
(11, 28),
(11, 29),
(11, 30),
(11, 31),
(11, 32),
(12, 28),
(12, 29),
(12, 31),
(12, 32),
(13, 33),
(13, 34),
(13, 35),
(13, 36),
(13, 37),
(14, 33),
(14, 34),
(14, 35),
(14, 36),
(15, 38),
(15, 40),
(15, 41),
(15, 42),
(15, 43),
(16, 38),
(16, 40),
(16, 41),
(16, 42),
(16, 43),
(17, 44),
(17, 45),
(17, 46),
(17, 47),
(17, 56),
(18, 44),
(18, 45),
(18, 46),
(18, 47),
(18, 49),
(19, 44),
(19, 45),
(19, 46),
(19, 47),
(19, 56),
(20, 44),
(20, 45),
(20, 46),
(20, 47),
(20, 49),
(21, 50),
(21, 51),
(21, 54),
(21, 57),
(21, 58),
(22, 50),
(22, 51),
(22, 52),
(22, 53),
(22, 54),
(23, 50),
(23, 51),
(23, 54),
(23, 57),
(23, 58),
(24, 50),
(24, 51),
(24, 52),
(24, 53),
(24, 54);

-- --------------------------------------------------------

--
-- Table structure for table `sexe`
--

CREATE TABLE `sexe` (
  `id` int(11) NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sexe`
--

INSERT INTO `sexe` (`id`, `sexe`) VALUES
(1, 'homme'),
(2, 'femme');

-- --------------------------------------------------------

--
-- Table structure for table `type_acces`
--

CREATE TABLE `type_acces` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_acces`
--

INSERT INTO `type_acces` (`id`, `type`) VALUES
(1, 'enseignant'),
(2, 'étudiant'),
(3, 'administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `type_parcour`
--

CREATE TABLE `type_parcour` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_parcour`
--

INSERT INTO `type_parcour` (`id`, `type`) VALUES
(1, 'académique'),
(2, 'professionnel'),
(3, 'sortant');

-- --------------------------------------------------------

--
-- Table structure for table `ue`
--

CREATE TABLE `ue` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coefficient` double DEFAULT NULL,
  `credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ue`
--

INSERT INTO `ue` (`id`, `nom`, `coefficient`, `credit`) VALUES
(1, 'EN11', 1, 9),
(2, 'EN12', 1, 6),
(3, 'EN13', 1, 6),
(4, 'EN14', 1, 5),
(5, 'EN21', 1, 5),
(6, 'EN22', 1, 9),
(7, 'EN23', 1, 7),
(8, 'EN24', 1, 5),
(9, 'EN15', 1, 4),
(10, 'EN31', 1, 9),
(11, 'EN32', 1, 6),
(12, 'EN33', 1, 9),
(15, 'EN34', 1, 6),
(16, 'EN41', 1, 9),
(17, 'EN42', 1, 8),
(18, 'EN43', 1, 6),
(19, 'EN44', 1, 7),
(22, 'EN25', 1, 4),
(23, 'EN51', 1, 3),
(24, 'EN52', 1, 7),
(25, 'EN53', 1, 5),
(26, 'EN54', 1, 7),
(27, 'EN55', 1, 8),
(28, 'EN61', 1, 6),
(29, 'EN62', 1, 4),
(30, 'EN63', 1, 3),
(31, 'EN64', 1, 5),
(32, 'EN65', 1, 7),
(33, 'EN71', 1, 6),
(34, 'EN72', 1, 6),
(35, 'EN73', 1, 7),
(36, 'EN74', 1, 10),
(37, 'EN75', 1, 3),
(38, 'EN81', 1, 4),
(40, 'EN82', 1, 6),
(41, 'EN83', 1, 4),
(42, 'EN84', 1, 3),
(43, 'EN85', 1, 7),
(44, 'EN91', 1, 6),
(45, 'EN92', 1, 6),
(46, 'EN93', 1, 6),
(47, 'EN94', 1, 3),
(49, 'EN95EA', 1, 9),
(50, 'EN101', 1, 6),
(51, 'EN102', 1, 3),
(52, 'EN103EA', 1, 8),
(53, 'EN104EA', 1, 6),
(54, 'EN104', 1, 7),
(56, 'EN95IA', 1, 9),
(57, 'EN103IA', 1, 8),
(58, 'EN104IA', 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acces`
--
ALTER TABLE `acces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D0F43B10F85E0677` (`username`),
  ADD KEY `IDX_D0F43B10C54C8C93` (`type_id`);

--
-- Indexes for table `anne_universitaire`
--
ALTER TABLE `anne_universitaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec`
--
ALTER TABLE `ec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8DE8BDFF4783DC6D` (`uc_id`),
  ADD KEY `IDX_8DE8BDFFE455FCC0` (`enseignant_id`);

--
-- Indexes for table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F86B32C1220C6AD0` (`jour_id`),
  ADD KEY `IDX_F86B32C1F2A733EB` (`heure_id`),
  ADD KEY `IDX_F86B32C1B3E9C81` (`niveau_id`),
  ADD KEY `IDX_F86B32C127634BEF` (`ec_id`),
  ADD KEY `IDX_F86B32C15577AFDB` (`semestre_id`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_81A72FA15CB2E05D` (`login_id`),
  ADD KEY `IDX_81A72FA1C54C8C93` (`type_id`);

--
-- Indexes for table `enseignant_type`
--
ALTER TABLE `enseignant_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_717E22E35CB2E05D` (`login_id`),
  ADD KEY `IDX_717E22E3448F3B3C` (`sexe_id`),
  ADD KEY `IDX_717E22E3AAC4B70E` (`niveaux_id`),
  ADD KEY `IDX_717E22E3E7D48F5` (`anne_universitaire_id`),
  ADD KEY `IDX_717E22E39A561E99` (`parcour_id`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiche_individuel`
--
ALTER TABLE `fiche_individuel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4DA93DE4DDEAB1A3` (`etudiant_id`),
  ADD KEY `IDX_4DA93DE427634BEF` (`ec_id`),
  ADD KEY `IDX_4DA93DE45577AFDB` (`semestre_id`),
  ADD KEY `IDX_4DA93DE4E7D48F5` (`anne_universitaire_id`);

--
-- Indexes for table `heures`
--
ALTER TABLE `heures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6F966489A76ED395` (`user_id`);

--
-- Indexes for table `information_fils`
--
ALTER TABLE `information_fils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_59E38A5CA76ED395` (`user_id`),
  ADD KEY `IDX_59E38A5C2EF03101` (`information_id`);

--
-- Indexes for table `information_niveaux`
--
ALTER TABLE `information_niveaux`
  ADD PRIMARY KEY (`information_id`,`niveaux_id`),
  ADD KEY `IDX_4BC6D1312EF03101` (`information_id`),
  ADD KEY `IDX_4BC6D131AAC4B70E` (`niveaux_id`);

--
-- Indexes for table `jours`
--
ALTER TABLE `jours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moyenne`
--
ALTER TABLE `moyenne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F27AFF8FDDEAB1A3` (`etudiant_id`),
  ADD KEY `IDX_F27AFF8F5577AFDB` (`semestre_id`),
  ADD KEY `IDX_F27AFF8FB3E9C81` (`niveau_id`),
  ADD KEY `IDX_F27AFF8FE7D48F5` (`anne_universitaire_id`);

--
-- Indexes for table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_56F771A0C54C8C93` (`type_id`);

--
-- Indexes for table `niveaux_uc`
--
ALTER TABLE `niveaux_uc`
  ADD PRIMARY KEY (`niveaux_id`,`uc_id`),
  ADD KEY `IDX_D2D77FF0AAC4B70E` (`niveaux_id`),
  ADD KEY `IDX_D2D77FF04783DC6D` (`uc_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CFBDFA14DDEAB1A3` (`etudiant_id`),
  ADD KEY `IDX_CFBDFA1427634BEF` (`ec_id`),
  ADD KEY `IDX_CFBDFA145577AFDB` (`semestre_id`),
  ADD KEY `IDX_CFBDFA14E7D48F5` (`anne_universitaire_id`),
  ADD KEY `IDX_CFBDFA14AAC4B70E` (`niveaux_id`),
  ADD KEY `IDX_CFBDFA1422937FBA` (`note_uc_id`);

--
-- Indexes for table `note_uc`
--
ALTER TABLE `note_uc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5EFEC0AB4783DC6D` (`uc_id`),
  ADD KEY `IDX_5EFEC0ABDDEAB1A3` (`etudiant_id`),
  ADD KEY `IDX_5EFEC0AB5577AFDB` (`semestre_id`),
  ADD KEY `IDX_5EFEC0ABE7D48F5` (`anne_universitaire_id`),
  ADD KEY `IDX_5EFEC0ABAAC4B70E` (`niveaux_id`);

--
-- Indexes for table `parametrage`
--
ALTER TABLE `parametrage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_48D99353E4ACB2E3` (`chefmention_id`);

--
-- Indexes for table `repartition_ec`
--
ALTER TABLE `repartition_ec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B0B7DF0927634BEF` (`ec_id`),
  ADD KEY `IDX_B0B7DF09AAC4B70E` (`niveaux_id`),
  ADD KEY `IDX_B0B7DF095577AFDB` (`semestre_id`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4E977E5CB3E9C81` (`niveau_id`),
  ADD KEY `IDX_4E977E5C5577AFDB` (`semestre_id`),
  ADD KEY `IDX_4E977E5C9A561E99` (`parcour_id`),
  ADD KEY `IDX_4E977E5CF6415C1E` (`salle_class_id`);

--
-- Indexes for table `salle_class`
--
ALTER TABLE `salle_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scolarite`
--
ALTER TABLE `scolarite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_276250ABB3E9C81` (`niveau_id`),
  ADD KEY `IDX_276250ABDDEAB1A3` (`etudiant_id`);

--
-- Indexes for table `scolarite_image`
--
ALTER TABLE `scolarite_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A8E0A9C8C5D9C0B6` (`scolarites_id`);

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semestre_niveaux`
--
ALTER TABLE `semestre_niveaux`
  ADD PRIMARY KEY (`semestre_id`,`niveaux_id`),
  ADD KEY `IDX_FDAD8D665577AFDB` (`semestre_id`),
  ADD KEY `IDX_FDAD8D66AAC4B70E` (`niveaux_id`);

--
-- Indexes for table `semestre_uc`
--
ALTER TABLE `semestre_uc`
  ADD PRIMARY KEY (`semestre_id`,`uc_id`),
  ADD KEY `IDX_2D6467255577AFDB` (`semestre_id`),
  ADD KEY `IDX_2D6467254783DC6D` (`uc_id`);

--
-- Indexes for table `sexe`
--
ALTER TABLE `sexe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_acces`
--
ALTER TABLE `type_acces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_parcour`
--
ALTER TABLE `type_parcour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ue`
--
ALTER TABLE `ue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acces`
--
ALTER TABLE `acces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anne_universitaire`
--
ALTER TABLE `anne_universitaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `droit`
--
ALTER TABLE `droit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ec`
--
ALTER TABLE `ec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enseignant_type`
--
ALTER TABLE `enseignant_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fiche_individuel`
--
ALTER TABLE `fiche_individuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heures`
--
ALTER TABLE `heures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information_fils`
--
ALTER TABLE `information_fils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jours`
--
ALTER TABLE `jours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `moyenne`
--
ALTER TABLE `moyenne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note_uc`
--
ALTER TABLE `note_uc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parametrage`
--
ALTER TABLE `parametrage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repartition_ec`
--
ALTER TABLE `repartition_ec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salle_class`
--
ALTER TABLE `salle_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scolarite`
--
ALTER TABLE `scolarite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scolarite_image`
--
ALTER TABLE `scolarite_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sexe`
--
ALTER TABLE `sexe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_acces`
--
ALTER TABLE `type_acces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_parcour`
--
ALTER TABLE `type_parcour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ue`
--
ALTER TABLE `ue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acces`
--
ALTER TABLE `acces`
  ADD CONSTRAINT `FK_D0F43B10C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type_acces` (`id`);

--
-- Constraints for table `ec`
--
ALTER TABLE `ec`
  ADD CONSTRAINT `FK_8DE8BDFF4783DC6D` FOREIGN KEY (`uc_id`) REFERENCES `ue` (`id`),
  ADD CONSTRAINT `FK_8DE8BDFFE455FCC0` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignant` (`id`);

--
-- Constraints for table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  ADD CONSTRAINT `FK_F86B32C1220C6AD0` FOREIGN KEY (`jour_id`) REFERENCES `jours` (`id`),
  ADD CONSTRAINT `FK_F86B32C127634BEF` FOREIGN KEY (`ec_id`) REFERENCES `ec` (`id`),
  ADD CONSTRAINT `FK_F86B32C15577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`),
  ADD CONSTRAINT `FK_F86B32C1B3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `FK_F86B32C1F2A733EB` FOREIGN KEY (`heure_id`) REFERENCES `heures` (`id`);

--
-- Constraints for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `FK_81A72FA15CB2E05D` FOREIGN KEY (`login_id`) REFERENCES `acces` (`id`),
  ADD CONSTRAINT `FK_81A72FA1C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `enseignant_type` (`id`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_717E22E3448F3B3C` FOREIGN KEY (`sexe_id`) REFERENCES `sexe` (`id`),
  ADD CONSTRAINT `FK_717E22E35CB2E05D` FOREIGN KEY (`login_id`) REFERENCES `acces` (`id`),
  ADD CONSTRAINT `FK_717E22E39A561E99` FOREIGN KEY (`parcour_id`) REFERENCES `type_parcour` (`id`),
  ADD CONSTRAINT `FK_717E22E3AAC4B70E` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `FK_717E22E3E7D48F5` FOREIGN KEY (`anne_universitaire_id`) REFERENCES `anne_universitaire` (`id`);

--
-- Constraints for table `fiche_individuel`
--
ALTER TABLE `fiche_individuel`
  ADD CONSTRAINT `FK_4DA93DE427634BEF` FOREIGN KEY (`ec_id`) REFERENCES `ec` (`id`),
  ADD CONSTRAINT `FK_4DA93DE45577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`),
  ADD CONSTRAINT `FK_4DA93DE4DDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `FK_4DA93DE4E7D48F5` FOREIGN KEY (`anne_universitaire_id`) REFERENCES `anne_universitaire` (`id`);

--
-- Constraints for table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `FK_6F966489A76ED395` FOREIGN KEY (`user_id`) REFERENCES `acces` (`id`);

--
-- Constraints for table `information_fils`
--
ALTER TABLE `information_fils`
  ADD CONSTRAINT `FK_59E38A5C2EF03101` FOREIGN KEY (`information_id`) REFERENCES `informations` (`id`),
  ADD CONSTRAINT `FK_59E38A5CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `acces` (`id`);

--
-- Constraints for table `information_niveaux`
--
ALTER TABLE `information_niveaux`
  ADD CONSTRAINT `FK_4BC6D1312EF03101` FOREIGN KEY (`information_id`) REFERENCES `informations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4BC6D131AAC4B70E` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `moyenne`
--
ALTER TABLE `moyenne`
  ADD CONSTRAINT `FK_F27AFF8F5577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`),
  ADD CONSTRAINT `FK_F27AFF8FB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `FK_F27AFF8FDDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `FK_F27AFF8FE7D48F5` FOREIGN KEY (`anne_universitaire_id`) REFERENCES `anne_universitaire` (`id`);

--
-- Constraints for table `niveaux`
--
ALTER TABLE `niveaux`
  ADD CONSTRAINT `FK_56F771A0C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type_parcour` (`id`);

--
-- Constraints for table `niveaux_uc`
--
ALTER TABLE `niveaux_uc`
  ADD CONSTRAINT `FK_D2D77FF04783DC6D` FOREIGN KEY (`uc_id`) REFERENCES `ue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D2D77FF0AAC4B70E` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA1422937FBA` FOREIGN KEY (`note_uc_id`) REFERENCES `note_uc` (`id`),
  ADD CONSTRAINT `FK_CFBDFA1427634BEF` FOREIGN KEY (`ec_id`) REFERENCES `ec` (`id`),
  ADD CONSTRAINT `FK_CFBDFA145577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14AAC4B70E` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14DDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14E7D48F5` FOREIGN KEY (`anne_universitaire_id`) REFERENCES `anne_universitaire` (`id`);

--
-- Constraints for table `note_uc`
--
ALTER TABLE `note_uc`
  ADD CONSTRAINT `FK_5EFEC0AB4783DC6D` FOREIGN KEY (`uc_id`) REFERENCES `ue` (`id`),
  ADD CONSTRAINT `FK_5EFEC0AB5577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`),
  ADD CONSTRAINT `FK_5EFEC0ABAAC4B70E` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `FK_5EFEC0ABDDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `FK_5EFEC0ABE7D48F5` FOREIGN KEY (`anne_universitaire_id`) REFERENCES `anne_universitaire` (`id`);

--
-- Constraints for table `parametrage`
--
ALTER TABLE `parametrage`
  ADD CONSTRAINT `FK_48D99353E4ACB2E3` FOREIGN KEY (`chefmention_id`) REFERENCES `enseignant` (`id`);

--
-- Constraints for table `repartition_ec`
--
ALTER TABLE `repartition_ec`
  ADD CONSTRAINT `FK_B0B7DF0927634BEF` FOREIGN KEY (`ec_id`) REFERENCES `ec` (`id`),
  ADD CONSTRAINT `FK_B0B7DF095577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`),
  ADD CONSTRAINT `FK_B0B7DF09AAC4B70E` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`);

--
-- Constraints for table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `FK_4E977E5C5577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`),
  ADD CONSTRAINT `FK_4E977E5C9A561E99` FOREIGN KEY (`parcour_id`) REFERENCES `type_parcour` (`id`),
  ADD CONSTRAINT `FK_4E977E5CB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `FK_4E977E5CF6415C1E` FOREIGN KEY (`salle_class_id`) REFERENCES `salle_class` (`id`);

--
-- Constraints for table `scolarite`
--
ALTER TABLE `scolarite`
  ADD CONSTRAINT `FK_276250ABB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `FK_276250ABDDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`);

--
-- Constraints for table `scolarite_image`
--
ALTER TABLE `scolarite_image`
  ADD CONSTRAINT `FK_A8E0A9C8C5D9C0B6` FOREIGN KEY (`scolarites_id`) REFERENCES `scolarite` (`id`);

--
-- Constraints for table `semestre_niveaux`
--
ALTER TABLE `semestre_niveaux`
  ADD CONSTRAINT `FK_FDAD8D665577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FDAD8D66AAC4B70E` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `semestre_uc`
--
ALTER TABLE `semestre_uc`
  ADD CONSTRAINT `FK_2D6467254783DC6D` FOREIGN KEY (`uc_id`) REFERENCES `ue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2D6467255577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
