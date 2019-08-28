-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2019 at 01:20 PM
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
(1, 3, 'admin', '[\"ROLE_SUPER_ADMIN\"]', '$2y$13$FbESQa4hdjwLtW/Yu0yaneLkpRMRPL7r5gI1EvCyIlqqe442BO.jq', 1),
(2, 3, 'nathalie', '[\"ROLE_SUPER_ADMIN\"]', '$2y$13$dgFhcb.XdT7I0SjoUqBp2O0NpfXBOf3IKzSkfSWABexbPxJhWQLqK', 1),
(3, 1, 'rabesandratana', '[\"ROLE_ADMIN\"]', '$2y$13$ei/HzKDvzNRMp9c5IUm5MeZftGG3OWJn01p4ZwtDyP50SoVOrA1/q', 1),
(4, 1, 'RATSIMBA', '[\"ROLE_ADMIN\"]', '$2y$13$.xnfGWR136ieWWkfvHd8uOi5xRXHsib8EUsL4JWv.NEB4JDgtcyKe', 1),
(5, 1, 'RAKOTONDRASOA', '[\"ROLE_ADMIN\"]', '$2y$13$GWOZwoLWY9ApQ5EL7V.a.un.l6bSUz.RBc9blZOXaimQ4hV4pOyaq', 1),
(6, 1, 'RATSIMBAZAFY', '[\"ROLE_ADMIN\"]', '$2y$13$.rmxuI0bd3UKpDZaTltzd.Pfvp42c9ziPFTozJawrZfxj2qDxhvry', 1),
(7, 1, 'RANDRIAMANALINA', '[\"ROLE_ADMIN\"]', '$2y$13$c/jhWldzhtfNQDbJrA0//epQws0O.xeME2niOO9gFiuGZMkoJoueW', 1),
(8, 1, 'RAHARIMINA', '[\"ROLE_ADMIN\"]', '$2y$13$FSBm3uKpXApGdkN3kvTZOe43mMNHYevgyawWOql3313J9nTSwHKR.', 1),
(9, 1, 'RAHARIMBOLA', '[\"ROLE_ADMIN\"]', '$2y$13$mAm89Dam.5uUokIwtXoZR.73MLyghIZrXILIqk7CcPk1WfGesMpra', 1),
(10, 1, 'RAJEMIARIMIRAHO', '[\"ROLE_ADMIN\"]', '$2y$13$Di.jH9Jxv1klh.yDTSAa4euAXCJyCjlLHPYit89hPUQGwEPSAI.Bm', 1),
(11, 1, 'RATINARIVO', '[\"ROLE_ADMIN\"]', '$2y$13$55w45UcdC7jiRhttFQ7B0.5buJPK.WM6OT49QhhXrrn6VBLAJWdo.', 1),
(12, 1, 'ZOARITSIHOARANA', '[\"ROLE_ADMIN\"]', '$2y$13$Z87SrknCYZEIIuz6pbYjE.M2t8qHrSV8gdTshbjpn.HqpofN2BRwy', 1),
(13, 2, 'ANDRIAMIANDRAVOLA', '[\"ROLE_USER\"]', '$2y$13$lHquPWII.z12Ye17LU6VfeoECqGSESF8zEclNdpczDslx28TkDM/S', 1),
(14, 1, 'RANDIMBINDRAINIBE', '[\"ROLE_ADMIN\"]', '$2y$13$JzK0jYcols9h.4tydc11TufqYhQzHxdCMPx1h72Dg1vbLbEnB1ci6', 1),
(15, 1, 'RAJAONARIVONY', '[\"ROLE_ADMIN\"]', '$2y$13$wCI7350Skya0Pi2hlYeLGOLxPYMXoTM5r5JLEdsCd.b3POmMEDKXC', 1),
(16, 1, 'TSIRINATSIVA', '[\"ROLE_ADMIN\"]', '$2y$13$G7VXOPFIFKlgSGwIgq9Zh.8sV5A2/8pt2A6EKP6HIDPngZeYpvEEa', 1),
(17, 1, 'RAMASIMBOHITRA', '[\"ROLE_ADMIN\"]', '$2y$13$25kWtPCNb8sVQggD0IrX6u73KVV2dUr5JSLdWftxglbpGdWpNbgaS', 1),
(18, 1, 'RAKOTOMIRAHO', '[\"ROLE_ADMIN\"]', '$2y$13$NGZHrVjiaLqQRyF2/xZ/.OtiAbRkgkkQILS9TDz7mntiArX5ZEOEK', 1),
(19, 2, 'ANDRIANIRINA', '[\"ROLE_USER\"]', '$2y$13$MU/Ua5pUKPmwvMb/.XLesu57l8foy4LQ45k2wFBX08OpRyMLRI96K', 1),
(20, 1, 'RABEHERIMANANA', '[\"ROLE_ADMIN\"]', '$2y$13$30i/DNrwFGyJkr.FNt./GO3fEpTJXFG1PXFRWe4fSqbSCtHiOtIgG', 1),
(21, 1, 'RANDRIAMAROSON', '[\"ROLE_ADMIN\"]', '$2y$13$ct9x9QPYDb59aYwpaAihyu2AU2V/yk5lIRpGPRaO/vkI/FOGI.f/y', 1),
(22, 1, 'ANDRIAMANANTSOA', '[\"ROLE_ADMIN\"]', '$2y$13$LN6c/8Kt/6.ofBtM5t6WqeNExZO08kDWLN8wqWWt8FBR6esLM/i0.', 1),
(23, 2, 'BEMENA', '[\"ROLE_USER\"]', '$2y$13$inEmf63Pyj3BD8pmgn8pf.iVaxyNBzW4B.4x4OaiMM71WFUOQyIiS', 1),
(24, 1, 'RASTEFANO', '[\"ROLE_ADMIN\"]', '$2y$13$olpvJg2lycJYF2d0nzx/DOnR4FZjBC6PYVRR0dgQU3fQssvb/UkIa', 1),
(25, 2, 'INGY', '[\"ROLE_USER\"]', '$2y$13$x9R3fDy2.7/lIgiZJd2vl.WG41WKokHJ100AP.zeuK8Xp0fYH/jGu', 1),
(26, 1, 'HERINANTENAINA', '[\"ROLE_ADMIN\"]', '$2y$13$He3wQU6qTak1c9xQ61V83e.mYylz6CZZxApPk.g1LuWfN8WPjOJx2', 1),
(27, 2, 'MAKANIAINA', '[\"ROLE_USER\"]', '$2y$13$srIBz307o7.A5RaakpacHOXsXRjMJWlSLtHv8QFVwlqpOsuwnf9Sa', 1),
(28, 2, 'MBOLATIANA', '[\"ROLE_USER\"]', '$2y$13$KnqYzwl03c9O4hS6AFtta.C3mqQgkD.y.kLlFVITq0bT/gN.VeeOm', 1),
(29, 2, 'RABARINJAKA', '[\"ROLE_USER\"]', '$2y$13$ZY3alk/9h7y1t13WF9K6ZuY3NdDz.cYFLReJTB089NNJQo06V3CMm', 1),
(30, 2, 'RAFALIMANANA', '[\"ROLE_USER\"]', '$2y$13$EWN6Vmi7aEsSfbC8NY2XWO6IleFMwDqVs.cqcK/LxqHeDQcRf0zXG', 1),
(31, 2, 'RAKOTOSON', '[\"ROLE_USER\"]', '$2y$13$toPCndn.Ivqu6K2UX89enuX2RoyAiRN6DWUORamqMKzJXPBhRRUge', 1),
(32, 2, 'RAMIARIMANANTSOA', '[\"ROLE_USER\"]', '$2y$13$vHXPqyKkjnX7UvzP3d8VsexyLEEmHFukwQk0riavyoxUp4p6LJvwK', 1),
(33, 2, 'RANAIVOSON', '[\"ROLE_USER\"]', '$2y$13$EBE23xHX6uWmknMkif4OJOfsLrsUneK4swuYUT.Fv4lrfbiyU09HC', 1),
(34, 2, 'RANDRIANIMANANA', '[\"ROLE_USER\"]', '$2y$13$xMRgixvU8ukFbgAJiiC2Ru4BGPOgH6ltP24tT2nEG2B44M8dqgSAu', 1),
(35, 2, 'RAOBADIA', '[\"ROLE_USER\"]', '$2y$13$uVgSV2dCiNdL.MFeqHlGdOMIiGIxVGj81pFCTwjJuc.agu.kEx07i', 1),
(36, 2, 'RATSIMBALISON', '[\"ROLE_USER\"]', '$2y$13$KxYzghW7LALyVhH7lTfLy.T.ItsZOsDUnmhIIDHG3YpFkZoRhe2Hq', 1),
(37, 2, 'ANDRIAMIANDRAVOLA2', '[\"ROLE_USER\"]', '$2y$13$qqOgylpvx.Daxz2g/8wwz.mnQEfa5251/47Ep78dJ3PiXF3/ARaJK', 1),
(38, 2, 'ANDRIANIRINA2', '[\"ROLE_USER\"]', '$2y$13$nxB9RlMKmSP5yK1.Rb3xE.LBz.B4jlig3YQ0TJ.2BD4YpaeZSMDWC', 1),
(39, 2, 'ANDRIATSITOHAINA', '[\"ROLE_USER\"]', '$2y$13$AZ7ZRRcBIiu42eepQSOUjurGfpPeE8ly9gjCqPIYVx54CPwlW/.Ye', 1),
(40, 2, 'LOVASAMIMENDRIKA', '[\"ROLE_USER\"]', '$2y$13$NxWSVpjpzNwnGIbW4uFwweerLADrv6OolE40MAVKMafbF0yWmWUu2', 1),
(41, 2, 'RAKOTOMALALA', '[\"ROLE_USER\"]', '$2y$13$75PzPT/RbsLmLaPFWLQICOA4XIvuJHCpgBUyWHLcsh8Z9TtrjqrDi', 1),
(42, 2, 'RAKOTOMALALA2', '[\"ROLE_USER\"]', '$2y$13$VjLQBVNawZUl5I8ZrVzMKu5oZuMVZwSBXfQhcxthfcD5MRd6glR5i', 1),
(43, 2, 'RAKOTOMALALA3', '[\"ROLE_USER\"]', '$2y$13$tkAdu0nCBNzcvuPIqdjWoe4sNjyMSFBZZSOsc0R.yxkpm4ZC5jlSO', 1),
(44, 2, 'RAKOTONOELY', '[\"ROLE_USER\"]', '$2y$13$i59a.GB9cjJ8gMPIf6jzauaTA2gDn5rQouMm7zbhGeCWf.6D/.EEO', 1),
(45, 2, 'RAKOTOVAO', '[\"ROLE_USER\"]', '$2y$13$G/3h31GESYa2YT2.3PI8GOTzT.VwzCIGlziZ0wEtwhFvDO.4o1wea', 1),
(46, 2, 'RAMAMONJISOA', '[\"ROLE_USER\"]', '$2y$13$HaDh83W/nbx837ba5WYbf.7ZyT.k5ccUIVkitfxhaEOl4EOD8Kev2', 1),
(47, 2, 'RANDRIAMANANTSOA', '[\"ROLE_USER\"]', '$2y$13$5O9BUWbGNulwPKgJP3KJguMfUd/jkJlG1S9kvlxquvCxO4TM9JdLS', 1),
(48, 2, 'RANDRIANDIMBISOA', '[\"ROLE_USER\"]', '$2y$13$94b2hiW5iUgbGFat9yRJP.qVKInkmk/GDzWKEHCRz8Wqm6itykmIK', 1),
(49, 2, 'RATOVOANDRIAMAHERY', '[\"ROLE_USER\"]', '$2y$13$G5kD5BLtelTHUnbbYZTdGONKguezEJ0vkAKbuZwOk.5N5Qd7GOi/6', 1),
(50, 2, 'RAZAFIMANDIMBY', '[\"ROLE_USER\"]', '$2y$13$GFarQEsHJgMrtx0wJ3m03uuPuw..izdLvGYKJEk9Mv/OZZSEVzygu', 1),
(51, 2, 'TOVOMIZAKA', '[\"ROLE_USER\"]', '$2y$13$4tRmg6o/cA187POfM8NYeu3g7O2GNRA71Jz7lOsAxJuujhWNKtopu', 1),
(52, 2, 'ANDRIAMIHAJANIRINA', '[\"ROLE_USER\"]', '$2y$13$jQa4.PDGApF.nGZ2Rm9aMeCI/UKXMpr75H54GnqXI5rjQtvrrcH6u', 1),
(53, 2, 'ANDRIANJAFINDRAFITO', '[\"ROLE_USER\"]', '$2y$13$XKTdWdIhXuKhmOu9igmtyONPgi0QiJ0EzGcrAnabZfVgjTZmG9uLO', 1),
(54, 2, 'ANDRIANTSILAVINA', '[\"ROLE_USER\"]', '$2y$13$FesFcQDIbEuqRBc7WLumDu7OREFSELdox3Jcur.eM0ma5sRfa3X4q', 1),
(55, 2, 'ANDRIANIRINA3', '[\"ROLE_USER\"]', '$2y$13$buTjcwh2yKqFk391uB08S./cwdBhEgLGgHCaMeg91RXO5C9lZ.jAS', 1),
(56, 2, 'ANDRIANANTENAINAMARCELLIN', '[\"ROLE_USER\"]', '$2y$13$JccpXfKCAWPwCRsNJVMacOJPMdO9E6gqJ/IykSxtHXCtUKeHNi4wm', 1),
(57, 2, 'DAMYARNAUD', '[\"ROLE_USER\"]', '$2y$13$QYvc2i0PvnpWugXqlf521.PAd5a7k0ZkDtXux7drZorTN6Uxlaqta', 1),
(58, 2, 'FANDRESENAHARINELINANICO', '[\"ROLE_USER\"]', '$2y$13$Pp/pvO7UWLiDN6CYwp9R1uLWK56cYmonwznq8rAZNgw9GapoMebwm', 1),
(59, 2, 'MANOVOSOATOJONIAINA', '[\"ROLE_USER\"]', '$2y$13$sbvtlCrvmRyTBnYbi8.Bbe63uf8lWUHfQxxPzbqb7g.VEkhmx6Qg2', 1),
(60, 2, 'NOMENJANAHARYPATRICOLIVIER', '[\"ROLE_USER\"]', '$2y$13$AyE4rXOLAblV/g4MhMXIROH9yj4ts4Jewwu6w42R1Q2FJBE63D3xK', 1),
(61, 2, 'RAFALIMANANTSOANOTIAVINAANTSANIAINA', '[\"ROLE_USER\"]', '$2y$13$2pNvW6AeH7M0HLiGJt0rUOtci6OyNV9NFiL5..cXPgo7tzVmEzEFu', 1),
(62, 2, 'RAFANORENANTSOAPIERRELOUISFANEVASOASAROBIDY', '[\"ROLE_USER\"]', '$2y$13$3OWs06lufxlmYYlgA4xvducRS3XRjpSe0n8eQbYG0hDB.lEWnVjH2', 1),
(63, 2, 'RAHARIMALALATANTELIARISOACHARLOTTE', '[\"ROLE_USER\"]', '$2y$13$x6Q/ciLtLcK/.BrHSplEW.KIqmWjX2.WZl/cj/gz6WgFtS5ue9AWG', 1),
(64, 2, 'RAJAONASYANDRIAMIHAJA', '[\"ROLE_USER\"]', '$2y$13$GOO3v3XDZnCUkAEOoSqdL.470yj7LJVwP8QS3v11PFdZwPMdT9ByG', 1),
(65, 1, 'test', '[\"ROLE_ADMIN\"]', '$2y$13$1uHe3OCAyTEdGQVELEuvmOHLnPuwjtDl/kzjtX94KmvIEME8MmdUi', 1),
(66, 2, 'etudiant', '[\"ROLE_USER\"]', '$2y$13$8c6huwLq4e5TVQAysr0JPefFmB/8qGSKjT7bx9Gsk2/tfW1CiLzNi', 1),
(67, 2, 'test3', '[\"ROLE_USER\"]', '$2y$13$eETJGyNYVClvICfHljyI9.xtas0oVe6kwhNR0ZsSsya04JLMjN6YK', 1);

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
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ec`
--

INSERT INTO `ec` (`id`, `uc_id`, `enseignant_id`, `nom`, `coefficient`, `code`, `credit`, `description`, `is_active`) VALUES
(1, 1, 1, 'Circuits Electroniques et Electriques I', 0.25, 'E111CEE', 3, 'Circuit Electronique', 1),
(2, 1, NULL, 'Métrologie', 0.25, 'E112MET', 3, 'Métrologie', 1),
(3, 1, NULL, 'Electrostatique', 0.25, 'E113EST', 3, 'Electrostatique', 1),
(4, 2, NULL, 'Algèbre I', 0.333, 'E121ALG', 2, 'Algèbre 1', 1),
(5, 2, NULL, 'Analyse I', 0.333, 'E122ANL', 2, 'Analyse 1', 1),
(6, 2, NULL, 'Calcul vectoriel et Intégral  l', 0.3333, 'E123CVI', 2, 'CVI 1', 1),
(7, 3, NULL, 'Algorithmique', 0.5, 'E132AGO', 3, 'Algorithmique', 1),
(8, 3, 2, 'Logique combinatoire I', 0.5, 'E133LCO', 3, 'Logique', 1),
(9, 4, NULL, 'Optique Géométrique', 0.5, 'E141OPG', 2, 'Optique Géométrique', 1),
(10, 4, NULL, 'Chimie Physique', 0.5, 'E142CPH', 3, 'Chimie Physique', 1),
(11, 9, NULL, 'Français et Cadrage Culturel', 0.5, 'E151FCC', 2, 'Français et Cadrage Culturel', 1),
(12, 9, NULL, 'Initiation aux Etudes Universitaires', 0.5, 'E152IEN', 2, 'Initiation aux Etudes Universitaires', 1),
(13, 5, NULL, 'Circuits Electroniques et Electriques II', 2, 'E211CEE', 2, 'Circuits Electroniques et Electriques II', 1),
(14, 5, NULL, 'Electrocinétique des Courants Continus', 0.5, 'E212ECC', 3, 'Electrocinétique des Courants Continus', 1),
(15, 6, NULL, 'Algèbre II', 0.25, 'E221ALG', 2, 'Algèbre II', 1),
(16, 6, NULL, 'Analyse II', 0.25, 'E222ANL', 2, 'Algèbre II', 1),
(17, 6, NULL, 'Calcul Vectoriel et Intégral II', 0.25, 'E223CVI', 2, 'CVI 2', 1),
(18, 6, NULL, 'Calcul Numérique', 0.25, 'E223CVI', 3, 'CN', 1),
(19, 7, NULL, 'Thermodynamique', 0.3333, 'E231TRM', 2, 'TH', 1),
(20, 7, NULL, 'Optique Physique', 0.3333, 'E232OPH', 2, 'optique physique', 1),
(21, 7, NULL, 'Mécanique Générale', 0.3333, 'E233MCG', 3, 'Mécanique gen', 1),
(22, 8, NULL, 'Programmation en C 1', 0.25, 'E241MOF', 3, 'Programmation en C 1', 1),
(23, 8, NULL, 'Logique combinatoire II', 0.25, 'E242LCO', 2, 'Logique combinatoire II', 1),
(24, 22, NULL, 'Anglais', 0.5, 'E251ANG', 2, 'Anglais', 1),
(25, 22, NULL, 'Français', 0.5, 'E252FRS', 2, 'Français', 1),
(26, 10, NULL, 'Electrocinétique des Courants Variables', 0.3333, 'E311ECV', 3, 'Electrocinétique des Courants Variables', 1),
(27, 10, NULL, 'Electronique I', 0.333, 'E312ELN', 3, 'Electronique I', 1),
(28, 10, NULL, 'Systèmes Linéaires I', 0.333, 'E313SYL', 3, 'Systèmes Linéaires I', 1),
(29, 11, NULL, 'Informatique I', 0.5, 'E321INF', 3, 'Informatique I', 1),
(30, 11, NULL, 'Architecture des ordinateurs / Système d\'exploitation', 0.5, 'E322ADO', 3, 'Architecture des ordinateurs / Système d\'exploitation', 1),
(31, 12, NULL, 'Analyse Algèbre', 0.3333, 'E331ANA', 3, 'Analyse Algèbre', 1),
(32, 12, NULL, 'Géométrie Analytique', 0.3333, 'E332GAN', 3, 'Géométrie Analytique', 1),
(33, 12, NULL, 'Probabilité et Statistique', 0.3333, 'E333PRS', 3, 'Probabilité et Statistique', 1),
(34, 15, NULL, 'Simulation MATLAB', 0.3333, 'E341SIM', 2, 'Simulation MATLAB', 1),
(35, 15, NULL, 'Analyse Fonctionnelle', 0.3333, 'E342ANF', 2, 'Analyse Fonctionnelle', 1),
(36, 15, NULL, 'Anglais', 0.3333, 'E351ANG', 2, 'Anglais', 1),
(37, 16, NULL, 'Electromagnétisme', 0.333, 'E411ELM', 3, 'Electromagnétisme', 1),
(38, 16, NULL, 'Electronique II', 0.3333, 'E412ELN', 3, 'Electronique II', 1),
(39, 16, NULL, 'Systèmes Linéaires II', 0.3333, 'E413SYL', 3, 'Systèmes Linéaires II', 1),
(40, 17, NULL, 'Informatique II', 0.3333, 'E421INF', 3, 'Informatique II', 1),
(41, 17, NULL, 'Initiation JAVA', 0.3333, 'E422LGC', 3, 'Initiation JAVA', 1),
(42, 17, NULL, 'Base de données', 0.3333, 'E423BDR', 2, 'Base de données', 1),
(43, 18, NULL, 'Signaux Aléatoires et Bruits', 0.5, 'E431SAB', 3, 'Signaux Aléatoires et Bruits', 1),
(44, 18, NULL, 'Signaux Déterministes', 0.5, 'E432SDT', 3, 'Signaux Déterministes', 1),
(45, 19, NULL, 'Rédaction Scientifique', 0.3333, 'E441RSC', 2, 'Rédaction Scientifique', 1),
(46, 19, NULL, 'Français', 0.3333, 'E442FRS', 2, 'Français', 1),
(47, 19, NULL, 'Economie', 0.3333, 'E451ECO', 3, 'Economie', 1),
(48, 23, NULL, 'Mathématiques Financières', 0.5, 'E511MFI', 2, 'Mathématiques Financières', 1),
(49, 23, NULL, 'Méthodes informatique de gestion', 0.5, 'E512MIG', 1, 'Méthodes informatique de gestion', 1),
(50, 24, NULL, 'PLOO', 0.333, 'E521POO', 2, 'PLOO', 1),
(51, 24, NULL, 'Développement Web', 0.3333, 'E522DEW', 2, 'Développement Web', 1),
(52, 24, NULL, 'Base de données', 0.3333, 'E531THS', 3, 'Base de données', 1),
(53, 25, NULL, 'Théorie du signal', 0.5, 'E531THS', 2, 'Théorie du signal', 1),
(54, 25, NULL, 'Electrotechnique', 0.5, 'E532ETC', 3, 'Electrotechnique', 1),
(55, 26, NULL, 'ACCE', 0.333, 'EN541ACC', 3, 'ACCE', 1),
(56, 26, NULL, 'TP ACCE', 0.333, 'EN542TAC', 1, 'TP ACCE', 1),
(57, 26, NULL, 'Circuits séquentiels', 0.333, 'E543CSQ', 3, 'Circuits séquentiels', 1),
(58, 27, NULL, 'TED', 0.25, 'E552TED', 3, 'TED', 1),
(59, 27, NULL, 'TP TED', 0.25, 'EN51TED', 1, 'TP TED', 1),
(60, 27, NULL, 'Circuits intégrés', 0.25, 'E554CIN', 3, 'Circuits intégrés', 1),
(61, 27, NULL, 'TP Circuits intégrés', 0.25, 'EN554CIN', 1, 'TP Circuits intégrés', 1),
(62, 28, NULL, 'Technologie des CI', 0.5, 'E611TCN', 3, 'Technologie des CI', 1),
(64, 28, NULL, 'Microprocesseurs', 0.5, 'E612MIC', 3, 'Microprocesseurs', 1),
(65, 29, NULL, 'Distribution', 0.5, 'E621DIS', 2, 'Distribution', 1),
(66, 29, NULL, 'Fiabilité Systémique', 0.5, 'E622FSY', 2, 'Fiabilité Systémique', 1),
(67, 30, NULL, 'Mécanique quantique', 0.5, 'E631MQU', 2, 'Mécanique quantique', 1),
(68, 30, NULL, 'Théorie de perturbations', 0.5, 'E632TPE', 1, 'Théorie de perturbations', 1),
(69, 31, NULL, 'Programmation JAVA', 0.5, 'E641JVA', 3, 'Programmation JAVA', 1),
(70, 31, NULL, 'Structures de données', 0.5, 'EN641STD', 2, 'Structures de données', 1),
(71, 32, NULL, 'Electronique de puissance', 0.333, 'E651ENP', 3, 'Electronique de puissance', 1),
(72, 32, NULL, 'Simulation PSPICE', 0.333, 'E652SPC', 3, 'Simulation PSPICE', 1),
(73, 32, NULL, 'TP PSPICE', 0.333, 'E653SPC', 1, 'TP PSPICE', 1),
(74, 33, NULL, 'Systèmes Asservis Linéaires Continus', 0.5, 'E711SAC', 3, 'Systèmes Asservis Linéaires Continus', 1),
(75, 33, NULL, 'Circuits Mémoires', 0.5, 'E744CME', 3, 'Circuits Mémoires', 1),
(76, 34, NULL, 'Physique des Semiconducteurs', 0.5, 'E721PDS', 3, 'Physique des Semiconducteurs', 1),
(77, 34, NULL, 'Mesures des Grandeurs Physiques et Capteurs', 0.5, 'E722MPC', 3, 'Mesures des Grandeurs Physiques et Capteurs', 1),
(78, 35, NULL, 'Réseau local', 0.33, 'E731RLO', 2, 'Réseau local', 1),
(79, 35, NULL, 'Programmation Matérielle', 0.333, 'E851PRM', 3, 'Programmation Matérielle', 1),
(80, 35, NULL, 'Génie logiciel', 0.333, 'E851PRM', 2, 'Génie logiciel', 1),
(81, 36, NULL, 'Circuits et Fonction de l’Electronique', 0.25, 'E741CFE', 3, 'Circuits et Fonction de l’Electronique', 1),
(82, 36, NULL, 'EP CFE', 0.25, 'E744CFE', 3, 'EP CFE', 1),
(83, 36, NULL, 'Electronique Analogique', 0.25, 'E742EAN', 3, 'E742EAN', 1),
(84, 36, NULL, 'EP Electronique Analogique', 0.25, 'E743EAN', 1, 'EP Electronique Analogique', 1),
(85, 37, NULL, 'Analyse Financière', 0.5, 'E751ANF', 2, 'Analyse Financière', 1),
(86, 37, NULL, 'Evaluation financière', 0.5, 'E751EVF', 1, 'Evaluation financière', 1),
(87, 38, NULL, 'Systèmes Asservis Linéaires Echantillonnés', 0.25, 'E811SAE', 3, 'Systèmes Asservis Linéaires Echantillonnés', 1),
(88, 38, NULL, 'EP Systèmes Asservis Linéaires', 0.25, 'E812SAL', 1, 'EP Systèmes Asservis Linéaires', 1),
(89, 40, NULL, 'Programmation evenementielle\r\n', 0.5, 'E821JAV\r\n', 3, 'Programmation evenementielle\r\n', 1),
(90, 40, NULL, 'Réseaux', 0.5, 'E822SDD', 3, 'Réseaux', 1),
(91, 41, NULL, 'Système d’Exploitation', 0.333, 'E831SXP', 3, 'Système d’Exploitation', 1),
(92, 41, NULL, 'EP Système d’Exploitation', 0.333, 'E832SXP', 1, 'EP Système d’Exploitation', 1),
(93, 41, NULL, 'Système de Gestion de Base de Données', 0.333, 'E833SGB', 0, 'Système de Gestion de Base de Données', 1),
(94, 42, NULL, 'Fibre Optique', 0.5, 'E841FOP', 0, 'Fibre Optique', 1),
(95, 42, NULL, 'Optoélectronique', 0.5, 'E842OPT', 3, 'Optoélectronique', 1),
(96, 43, NULL, 'Théorie et Pratique du Codage', 0.333, 'E732TPC', 3, 'Théorie et Pratique du Codage', 1),
(97, 43, NULL, 'Transmission de Données', 0.333, 'E852TRX', 3, 'Transmission de Données', 1),
(98, 43, NULL, 'EP Transmission de Données', 0.333, 'E853TRX', 1, 'EP Transmission de Données', 1),
(99, 44, 15, 'Programmation en Langage Machine', 0.5, 'E911PLM', 3, 'Programmation en Langage Machine', 1),
(100, 44, 1, 'Administration Systèmes', 0.5, 'E912ADS', 3, 'Administration Systèmes', 1),
(101, 45, 20, 'Physique des Dispositifs Semiconducteurs', 0.5, 'E921PDS', 3, 'Physique des Dispositifs Semiconducteurs', 1),
(102, 45, 18, 'Microprocesseurs II', 0.5, 'E922MIP', 3, 'Microprocesseurs II', 1),
(103, 46, 3, 'Représentation d’Etat des Systèmes Multi variables', 0.5, 'E931RSM', 3, 'Représentation d’Etat des Systèmes Multi variables', 1),
(104, 46, 16, 'Traitement Numérique du Signal', 0.5, 'E932TNS', 3, 'Traitement Numérique du Signal', 1),
(105, 47, 3, 'Gestion de Qualité', 0.5, 'E941GQU', 2, 'Gestion de Qualité', 1),
(106, 47, 3, 'Normes', 0.5, 'E941NOR', 1, 'Normes', 1),
(107, 49, 3, 'Systèmes Asservis Non Linéaires', 0.333, 'E951SALEA', 3, 'Systèmes Asservis Non Linéaires', 1),
(108, 49, 18, 'Circuits  Programmables', 0.333, 'E961CPGEA', 3, 'Circuits  Programmables', 1),
(109, 49, 21, 'Instrumentation', 0.333, 'E962INSEA', 3, 'Instrumentation', 1),
(110, 50, 1, 'Administration Systèmes', 0.5, 'E1011ADS', 3, 'Administration Systèmes', 1),
(111, 50, 3, 'Commandes Optimales Modales', 0.5, 'E1031COM', 3, 'Commandes Optimales Modales', 1),
(112, 51, NULL, 'Marketing et gestion de ressources humaines', 0.5, 'E1021MANG', 2, 'Marketing et gestion de ressources humaines', 1),
(113, 51, NULL, 'Techniques quantitatives de décision', 0.5, 'E1022TQD', 1, 'Techniques quantitatives de décision', 1),
(114, 52, NULL, 'Electronique Biomédical', 0.333, 'E1031ENBEA', 2, 'Electronique Biomédical', 1),
(115, 52, NULL, 'Electronique Industriel', 0.333, 'E1032ENIEA', 3, 'Electronique Industriel', 1),
(116, 52, NULL, 'Modélisation Comportementale', 0.3333, 'E1033MODEA', 3, 'Modélisation Comportementale', 1),
(117, 53, NULL, 'Robotique', 0.5, 'E1041ROBEA', 3, 'Robotique', 1),
(118, 53, NULL, 'Systèmes Embarqués', 0.5, 'E1042SEMEA', 3, 'Systèmes Embarqués', 1),
(119, 54, NULL, 'Mémoire', 1, 'E1041MEM', 7, 'Mémoire', 1),
(120, 56, NULL, 'Téléinformatique', 0.333, 'E951TLIIA', 3, 'Téléinformatique', 1),
(121, 56, NULL, 'Cryptographie', 0.333, 'E952CRYIA', 3, 'Cryptographie', 1),
(122, 56, NULL, 'Génie Logiciel II', 0.333, 'E961GLOIA', 3, 'Génie Logiciel II', 1),
(123, 57, NULL, 'Vision Artificielle', 0.333, 'E1031VARIA', 2, 'Vision Artificielle', 1),
(124, 57, NULL, 'Filtrage et Segmentation d’Image', 0.333, 'E1032FSIIA', 3, 'Filtrage et Segmentation d’Image', 1),
(125, 57, NULL, 'Développement d’Application Android', 0.333, 'E1033DAAIA', 3, 'Développement d’Application Android', 1),
(126, 58, NULL, 'Intelligence Artificielle', 0.5, 'E1061IARIA', 3, 'Intelligence Artificielle', 1),
(127, 58, NULL, 'Réseaux  bayésiens', 0.5, 'E1061IAPIA', 3, 'Réseaux  bayésiens', 1),
(132, 59, 1, 'test1', 0.25, 'code', 2, 'test', 1),
(133, 59, 1, 'test2', 0.25, 'E113EST', 2, 'e', 1),
(134, 59, 1, 'test3', 0.25, 'e', 3, 'e', 1),
(136, 59, 1, 'test4', 0.25, 'eee', 2, 'ee', 1),
(137, 59, 1, 'test5', 0.25, 'po', 1, 'ok', 0),
(138, 60, 1, 'ue', 1, 'ee', 3, 'ee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ec_niveaux`
--

CREATE TABLE `ec_niveaux` (
  `ec_id` int(11) NOT NULL,
  `niveaux_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ec_niveaux`
--

INSERT INTO `ec_niveaux` (`ec_id`, `niveaux_id`) VALUES
(1, 1),
(1, 8),
(2, 1),
(2, 8),
(3, 1),
(3, 8),
(4, 1),
(4, 8),
(5, 1),
(5, 8),
(6, 1),
(6, 8),
(7, 1),
(7, 8),
(8, 1),
(8, 8),
(9, 1),
(9, 8),
(10, 1),
(10, 8),
(11, 1),
(11, 8),
(12, 1),
(12, 8),
(13, 1),
(13, 8),
(14, 1),
(14, 8),
(15, 1),
(15, 8),
(16, 1),
(16, 8),
(17, 1),
(17, 8),
(18, 1),
(18, 8),
(19, 1),
(19, 8),
(20, 1),
(20, 8),
(21, 1),
(21, 8),
(22, 1),
(22, 8),
(23, 1),
(23, 8),
(24, 1),
(24, 8),
(25, 1),
(25, 8),
(26, 2),
(26, 9),
(27, 2),
(27, 9),
(28, 2),
(28, 9),
(29, 2),
(29, 9),
(30, 2),
(30, 9),
(31, 2),
(31, 9),
(32, 2),
(32, 9),
(33, 2),
(33, 9),
(34, 2),
(34, 9),
(35, 2),
(35, 9),
(36, 2),
(36, 9),
(37, 2),
(37, 9),
(38, 2),
(38, 9),
(39, 2),
(39, 9),
(40, 2),
(40, 9),
(41, 2),
(41, 9),
(42, 2),
(42, 9),
(43, 2),
(43, 9),
(44, 2),
(44, 9),
(45, 2),
(45, 9),
(46, 2),
(46, 9),
(47, 2),
(47, 9),
(48, 3),
(48, 10),
(49, 3),
(49, 10),
(50, 3),
(50, 10),
(51, 3),
(51, 10),
(52, 3),
(52, 10),
(53, 3),
(53, 10),
(54, 3),
(54, 10),
(55, 3),
(55, 10),
(56, 3),
(56, 10),
(57, 3),
(57, 10),
(58, 3),
(58, 10),
(59, 3),
(59, 10),
(60, 3),
(60, 10),
(61, 3),
(61, 10),
(62, 3),
(62, 10),
(64, 3),
(64, 10),
(65, 3),
(65, 10),
(66, 3),
(66, 10),
(67, 3),
(68, 3),
(69, 3),
(69, 10),
(70, 3),
(70, 10),
(71, 3),
(71, 10),
(72, 3),
(72, 10),
(73, 3),
(73, 10),
(74, 4),
(74, 11),
(75, 4),
(75, 11),
(76, 4),
(76, 11),
(77, 4),
(77, 11),
(78, 4),
(78, 11),
(79, 4),
(79, 11),
(80, 4),
(80, 11),
(81, 4),
(81, 11),
(82, 4),
(82, 11),
(83, 4),
(83, 11),
(84, 4),
(84, 11),
(85, 4),
(86, 4),
(87, 4),
(87, 11),
(88, 4),
(88, 11),
(89, 4),
(89, 11),
(90, 4),
(90, 11),
(91, 4),
(91, 11),
(92, 4),
(92, 11),
(93, 4),
(93, 11),
(94, 4),
(94, 11),
(95, 4),
(95, 11),
(96, 4),
(96, 11),
(97, 4),
(97, 11),
(98, 4),
(98, 11),
(99, 5),
(99, 6),
(99, 12),
(99, 13),
(100, 5),
(100, 6),
(100, 12),
(100, 13),
(101, 5),
(101, 6),
(101, 12),
(101, 13),
(102, 5),
(102, 6),
(102, 12),
(102, 13),
(103, 5),
(103, 6),
(103, 12),
(103, 13),
(104, 5),
(104, 6),
(104, 12),
(104, 13),
(105, 5),
(105, 6),
(105, 12),
(105, 13),
(106, 5),
(106, 6),
(106, 12),
(106, 13),
(107, 6),
(107, 13),
(108, 6),
(108, 13),
(109, 6),
(109, 13),
(110, 5),
(110, 6),
(110, 12),
(110, 13),
(111, 5),
(111, 6),
(111, 12),
(111, 13),
(112, 5),
(112, 6),
(112, 12),
(112, 13),
(113, 5),
(113, 6),
(113, 12),
(113, 13),
(114, 6),
(114, 13),
(115, 6),
(115, 13),
(116, 6),
(116, 13),
(117, 6),
(117, 13),
(118, 6),
(118, 13),
(119, 5),
(119, 6),
(119, 12),
(119, 13),
(120, 5),
(120, 12),
(121, 5),
(121, 12),
(122, 5),
(122, 12),
(123, 5),
(123, 12),
(124, 5),
(124, 12),
(125, 5),
(125, 12),
(126, 5),
(126, 12),
(127, 5),
(127, 12),
(132, 7),
(132, 14),
(133, 7),
(133, 14),
(134, 1),
(134, 7),
(134, 8),
(134, 14),
(136, 7),
(136, 14),
(137, 7),
(137, 14),
(138, 7);

-- --------------------------------------------------------

--
-- Table structure for table `ec_semestre`
--

CREATE TABLE `ec_semestre` (
  `ec_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ec_semestre`
--

INSERT INTO `ec_semestre` (`ec_id`, `semestre_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 3),
(13, 4),
(14, 3),
(14, 4),
(15, 3),
(15, 4),
(16, 3),
(16, 4),
(17, 3),
(17, 4),
(18, 3),
(18, 4),
(19, 3),
(19, 4),
(20, 3),
(20, 4),
(21, 3),
(21, 4),
(22, 3),
(22, 4),
(23, 3),
(23, 4),
(24, 3),
(24, 4),
(25, 3),
(25, 4),
(26, 5),
(26, 6),
(27, 5),
(27, 6),
(28, 5),
(28, 6),
(29, 5),
(29, 6),
(30, 5),
(30, 6),
(31, 5),
(31, 6),
(32, 5),
(32, 6),
(33, 5),
(33, 6),
(34, 5),
(34, 6),
(35, 5),
(35, 6),
(36, 5),
(36, 6),
(37, 7),
(37, 8),
(38, 7),
(38, 8),
(39, 7),
(39, 8),
(40, 7),
(40, 8),
(41, 7),
(41, 8),
(42, 7),
(42, 8),
(43, 7),
(43, 8),
(44, 7),
(44, 8),
(45, 7),
(45, 8),
(46, 7),
(46, 8),
(47, 7),
(47, 8),
(48, 9),
(48, 10),
(49, 9),
(49, 10),
(50, 9),
(50, 10),
(51, 9),
(51, 10),
(52, 9),
(52, 10),
(53, 9),
(53, 10),
(54, 9),
(54, 10),
(55, 9),
(55, 10),
(56, 9),
(56, 10),
(57, 9),
(57, 10),
(58, 9),
(58, 10),
(59, 9),
(59, 10),
(60, 9),
(60, 10),
(61, 9),
(61, 10),
(62, 11),
(62, 12),
(64, 11),
(64, 12),
(65, 11),
(65, 12),
(66, 11),
(66, 12),
(67, 11),
(68, 11),
(69, 11),
(69, 12),
(70, 11),
(70, 12),
(71, 11),
(71, 12),
(72, 11),
(72, 12),
(73, 11),
(73, 12),
(74, 13),
(74, 14),
(75, 13),
(75, 14),
(76, 13),
(76, 14),
(77, 13),
(77, 14),
(78, 13),
(78, 14),
(79, 13),
(79, 14),
(80, 13),
(80, 14),
(81, 13),
(81, 14),
(82, 13),
(82, 14),
(83, 13),
(83, 14),
(84, 13),
(84, 14),
(85, 13),
(86, 13),
(87, 15),
(87, 16),
(88, 15),
(88, 16),
(89, 15),
(89, 16),
(90, 15),
(90, 16),
(91, 15),
(91, 16),
(92, 15),
(92, 16),
(93, 15),
(93, 16),
(94, 15),
(94, 16),
(95, 15),
(95, 16),
(96, 15),
(96, 16),
(97, 15),
(97, 16),
(98, 15),
(98, 16),
(99, 17),
(99, 18),
(99, 19),
(99, 20),
(100, 17),
(100, 18),
(100, 19),
(100, 20),
(101, 17),
(101, 18),
(101, 19),
(101, 20),
(102, 17),
(102, 18),
(102, 19),
(102, 20),
(103, 17),
(103, 18),
(103, 19),
(103, 20),
(104, 17),
(104, 18),
(104, 19),
(104, 20),
(105, 17),
(105, 18),
(105, 19),
(105, 20),
(106, 17),
(106, 18),
(106, 19),
(106, 20),
(107, 18),
(107, 20),
(108, 18),
(108, 20),
(109, 18),
(109, 20),
(110, 21),
(110, 22),
(110, 23),
(110, 24),
(111, 21),
(111, 22),
(111, 23),
(111, 24),
(112, 21),
(112, 22),
(112, 23),
(112, 24),
(113, 21),
(113, 22),
(113, 23),
(113, 24),
(114, 22),
(114, 24),
(115, 22),
(115, 24),
(116, 22),
(116, 24),
(117, 22),
(117, 24),
(118, 22),
(118, 24),
(119, 21),
(119, 22),
(119, 23),
(119, 24),
(120, 17),
(120, 19),
(121, 17),
(121, 18),
(122, 17),
(122, 19),
(123, 21),
(123, 23),
(124, 21),
(124, 23),
(125, 21),
(125, 23),
(126, 21),
(126, 23),
(127, 21),
(127, 23),
(132, 25),
(132, 27),
(133, 25),
(133, 27),
(134, 1),
(134, 2),
(134, 25),
(134, 27),
(136, 25),
(136, 27),
(137, 25),
(137, 27),
(138, 25);

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

--
-- Dumping data for table `emploi_du_temps`
--

INSERT INTO `emploi_du_temps` (`id`, `jour_id`, `heure_id`, `niveau_id`, `ec_id`, `semestre_id`) VALUES
(1, 1, 3, 2, 28, 5),
(2, 1, 4, 2, 28, 5),
(3, 2, 1, 2, 29, 5),
(5, 2, 2, 2, 29, 5),
(6, 2, 3, 2, 26, 5),
(7, 2, 4, 2, 26, 5),
(8, 3, 1, 2, 33, 5),
(9, 3, 2, 2, 33, 5),
(10, 3, 3, 2, 32, 5),
(11, 3, 4, 2, 32, 5),
(12, 4, 1, 2, 36, 5),
(13, 4, 2, 2, 36, 5),
(14, 4, 3, 2, 27, 5),
(15, 4, 4, 2, 27, 5),
(16, 5, 3, 2, 31, 5),
(17, 5, 4, 2, 31, 5),
(18, 1, 1, 3, 48, 9),
(19, 1, 2, 3, 48, 9),
(21, 2, 2, 3, 54, 9),
(22, 2, 1, 3, 54, 9),
(23, 2, 3, 3, 55, 9),
(24, 2, 4, 3, 55, 9),
(25, 3, 1, 3, 57, 9),
(26, 3, 2, 3, 57, 9),
(27, 4, 1, 3, 60, 9),
(28, 4, 2, 3, 60, 9),
(29, 5, 1, 3, 58, 9),
(30, 5, 2, 3, 58, 9),
(31, 5, 3, 3, 52, 9),
(32, 5, 4, 3, 52, 9),
(33, 1, 1, 4, 74, 13),
(34, 1, 2, 4, 74, 13),
(35, 1, 3, 4, 85, 13),
(36, 1, 4, 4, 85, 13),
(37, 2, 1, 4, 76, 13),
(38, 2, 2, 4, 76, 13),
(39, 3, 1, 4, 81, 13),
(40, 3, 2, 4, 81, 13),
(41, 3, 3, 4, 79, 13),
(42, 3, 4, 4, 79, 13),
(43, 4, 1, 4, 75, 13),
(44, 4, 2, 4, 75, 13),
(45, 4, 3, 4, 83, 13),
(46, 4, 4, 4, 83, 13),
(47, 5, 1, 4, 77, 13),
(48, 5, 2, 4, 77, 13),
(49, 1, 1, 1, 1, 1),
(50, 1, 2, 1, 1, 1),
(51, 1, 3, 1, 3, 1),
(52, 1, 4, 1, 3, 1),
(53, 2, 3, 1, 2, 1),
(54, 2, 4, 1, 2, 1),
(55, 3, 1, 1, 7, 1),
(56, 3, 2, 1, 7, 1),
(57, 3, 3, 1, 10, 1),
(58, 3, 4, 1, 10, 1),
(59, 4, 1, 1, 8, 1),
(60, 4, 2, 1, 8, 1),
(61, 5, 3, 1, 6, 1),
(62, 5, 4, 1, 6, 1),
(63, 1, 1, 9, 34, 6),
(64, 1, 2, 9, 30, 6),
(65, 2, 1, 9, 36, 6),
(66, 2, 2, 9, 36, 6),
(67, 2, 3, 9, 29, 6),
(68, 2, 4, 9, 29, 6),
(69, 3, 1, 9, 31, 6),
(70, 3, 2, 9, 31, 6),
(71, 3, 3, 9, 32, 6),
(72, 3, 4, 9, 32, 6),
(73, 4, 1, 9, 27, 6),
(74, 4, 2, 9, 27, 6),
(75, 4, 3, 9, 26, 6),
(76, 4, 4, 9, 26, 6),
(77, 5, 1, 9, 33, 6),
(78, 5, 2, 9, 33, 6),
(79, 5, 3, 9, 28, 6),
(80, 5, 4, 9, 28, 6),
(81, 1, 1, 6, 100, 18),
(82, 1, 2, 6, 100, 18),
(83, 1, 3, 6, 104, 18),
(84, 1, 4, 6, 104, 18),
(85, 2, 1, 6, 107, 18),
(86, 2, 2, 6, 107, 18),
(87, 2, 3, 6, 99, 18),
(88, 2, 4, 6, 99, 18),
(89, 3, 1, 6, 102, 18),
(90, 3, 2, 6, 102, 18),
(91, 3, 3, 6, 108, 18),
(92, 3, 4, 6, 108, 18),
(93, 4, 1, 6, 101, 18),
(94, 4, 2, 6, 101, 18),
(95, 4, 3, 6, 101, 18),
(96, 4, 4, 6, 101, 18),
(97, 5, 1, 6, 103, 18),
(98, 5, 2, 6, 103, 18),
(99, 5, 3, 6, 109, 18),
(100, 5, 4, 6, 109, 18),
(101, 1, 1, 5, 100, 17),
(102, 1, 2, 5, 100, 17),
(103, 1, 3, 5, 104, 17),
(104, 1, 4, 5, 104, 17),
(105, 2, 1, 5, 120, 17),
(106, 2, 2, 5, 120, 17),
(107, 2, 3, 5, 99, 17),
(108, 2, 4, 5, 99, 17),
(109, 3, 1, 5, 102, 17),
(110, 3, 1, 5, 102, 17),
(111, 3, 2, 5, 102, 17),
(112, 3, 3, 5, 121, 17),
(113, 3, 4, 5, 121, 17),
(114, 4, 1, 5, 101, 17),
(115, 4, 2, 5, 101, 17),
(116, 4, 3, 5, 105, 17),
(117, 4, 4, 5, 105, 17),
(118, 5, 1, 5, 103, 17),
(119, 5, 2, 5, 103, 17),
(120, 5, 3, 5, 122, 17),
(121, 5, 4, 5, 122, 17);

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

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id`, `type_id`, `login_id`, `nom`, `prenom`, `contact`, `adresse`, `date_naissance`, `lieux_naissance`, `photo`, `contact2`, `contact3`, `mail`, `matricule`) VALUES
(1, 1, 2, 'RAMANANTSIHOARANA', 'Harisoa Nathalie', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/2ec005bba29b015f0d5ff790a7838d52.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/56'),
(2, 1, 3, 'RABESANDRATANA', 'M', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/1f12f95b68dca6e7412e7103f3dcc3ec.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/57'),
(3, 1, 4, 'RATSIMBA MAMY', 'Nirina', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/a7a98dc7166a7118f1424137e8d5cb28.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/59'),
(4, 1, 5, 'RAKOTONDRASOA', 'Justin', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/e28cde7abcffd8189d10b42ccef801df.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/58'),
(5, 1, 6, 'RATSIMBAZAFY', 'Gui Predon', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/4d9b7aa443c84f9463737ef891123388.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/57/'),
(6, 2, 7, 'RANDRIAMANALINA', 'B', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/cf1c9f29deefaa3aea91b74788a2184f.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/58'),
(7, 1, 8, 'RAHARIMINA', 'L', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/b6a0e8469ea4eed6a2fdeaad48aadebc.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/56'),
(8, 2, 9, 'RAHARIMBOLA', 'L', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/472cc6de4e68162d51dfaaef793ceebb.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/59'),
(9, 1, 10, 'RAJEMIARIMIRAHO', 'L', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/ef42d05273c360be2509f08a0960015f.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/532'),
(10, 1, 11, 'RATINARIVO', 'L', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/3ca86d2b8010f4dfda1c4ed1e6eb2efb.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/567'),
(11, 1, 12, 'ZOARITSIHOARANA', 'A', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/283f2ee51d859c6a44cdb52625aaf55a.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/565'),
(12, 2, 14, 'RANDIMBINDRAINIBE', 'Falimanana', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/bdd8fd9a29a7013f4f12167f9e6a2f1e.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/56'),
(13, 1, 15, 'RAJAONARIVONY', 'L', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/1238f400dc06c14415b2f09cfc53a8c8.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/56'),
(14, 1, 16, 'TSIRINATSIVA', 'M', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/4151517462908a13c724ed33ba4b994f.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/595'),
(15, 1, 17, 'RAMASIMBOHITRA', 'N', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/5a9c476117d004b992943b05e7026719.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/56'),
(16, 1, 18, 'RAKOTOMIRAHO', 'Soloniana', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/1b3f2af902d20f5d13a045e878e4e94b.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/5656'),
(17, 1, 20, 'RABEHERIMANANA', 'Liliane', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/274fc49473593971f1d59d04d39e908b.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/5656'),
(18, 1, 21, 'RANDRIAMAROSON', 'Rivo', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/29ba2c24354ace01837eb44bd92f851c.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/56'),
(19, 1, 22, 'ANDRIAMANANTSOA', 'gui', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/dbd561373ec086df8a9b6ce6aa2a50f3.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/5656'),
(20, 1, 24, 'RASTEFANO', 'Elise', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/cb9c11a8be538cd7fc8d9175c1367079.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/5656'),
(21, 1, 26, 'HERINANTENAINA', 'E', '0325648975', 'adresse', '1899-01-01', 'lieu', 'images/bbb7374dd396107d6b6b8f2100ad5ff3.jpeg', NULL, NULL, 'harisoanathalie@gmail.com', 'EN/123/5656');

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

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `sexe_id`, `niveaux_id`, `anne_universitaire_id`, `login_id`, `parcour_id`, `nom`, `prenom`, `photo`, `pere`, `profession_pere`, `mere`, `profession_mere`, `contact`, `date_naissance`, `lieux_naissance`, `adresse`, `anne_entre`, `is_sortant`, `contact2`, `contact3`, `mail`) VALUES
(2, 1, 6, 1, 19, 1, 'ANDRIANIRINA', 'José Rinah', 'images/a9fbaa84cab1f67c9235e5975c0e82a9.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '2001-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(3, 1, 6, 1, 23, 1, 'BEMENA', 'Angelico', 'images/6b9c90bef0c1a5f04444fc3ce2d2ebf1.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1999-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(4, 1, 6, 1, 25, 1, 'INGY', 'Franklin Ismael', 'images/90c43d3aa95cb36360d1de615d6466a0.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1994-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(5, 1, 6, 1, 27, 1, 'MAKANIAINA', 'Fanomezantsoa Julio Benin', 'images/2c5627c566989dc93f5e38db323fdc4f.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '2000-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(6, 1, 6, 1, 28, 1, 'MBOLATIANA', 'Vahatriniaina Nasolo Jacquis Rinah', 'images/19e2f2cee84eae4c20ce8b002111c2d8.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '2001-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(7, 1, 6, 1, 29, 1, 'RABARINJAKA', 'Rado Notahiana', 'images/1a7033a87fe3a51af6f2c8b46584108f.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1994-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(8, 1, 6, 1, 30, 1, 'RAFALIMANANA', 'Njakatiana', 'images/bbaf3843ba9a5ae764b6c16e01efdae1.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '2000-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(9, 1, 6, 1, 31, 1, 'RAKOTOSON', 'Toky Heriniaina', 'images/c4f25040ea3016828b80fd13f0e8781f.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '2002-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(10, 1, 6, 1, 32, 1, 'RAMIARIMANANTSOA', 'Jean Hubert', 'images/6938629c823427aebcd2e93ee1c15c9a.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1993-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(11, 1, 6, 1, 33, 1, 'RANAIVOSON', 'Andriamifidy Christian', 'images/67add6105608235e3772102a7f6dbc2e.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1997-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(12, 1, 6, 1, 34, 1, 'RANDRIANIMANANA', 'Safidinirina Arson', 'images/1980dbc059e2f3ad4687fa8ed71f767b.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1992-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(13, 1, 6, 1, 35, 1, 'RAOBADIA', 'Fanomezantsoa', 'images/ee718af7cbde724434fd8139a298e891.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1990-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(14, 1, 6, 1, 36, 1, 'RATSIMBALISON', 'Ralaitsitohaina Tafitasoa Carlos', 'images/4cf47b96d7a1a78b2c67873a268f9ef6.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1993-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(15, 1, 5, 1, 37, 1, 'ANDRIAMIANDRAVOLA', 'Manamirija Finiavana', 'images/018cf6aac6739a0188266a0d4c7eaad1.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '2000-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(16, 1, 5, 1, 38, 1, 'ANDRIANIRINA', 'Tahiriniaina', 'images/47a5a2323c61c34bc7cf1df2c6ef0868.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1999-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(17, 1, 5, 1, 39, 1, 'ANDRIATSITOHAINA', 'Elie Fenohasina', 'images/d0f6af66b93f1b2dd105731771da90e3.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1995-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(18, 1, 5, 1, 40, 1, 'LOVASAMIMENDRIKA', 'Rado Marcel Andriantsiferana', 'images/1b0296abd27dcde1c20e7f77259ee989.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '2001-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(19, 1, 5, 1, 41, 1, 'RAKOTOMALALA', 'Juanito Crusoé', 'images/e9d83693fbcb7d6b36509a3829e95d8a.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1997-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(20, 1, 5, 1, 42, 1, 'RAKOTOMALALA', 'Maheriniaina Jacklin', 'images/fc5ad04a7df4ccca9c6d7c22ecdb0016.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1992-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(21, 1, 5, 1, 43, 1, 'RAKOTOMALALA', 'Yanic Rolland', 'images/a5c0064cdb8ce8bd319d82cc27cb8485.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1992-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(22, 1, 5, 1, 44, 1, 'RAKOTONOELY', 'Jean Patrick', 'images/71f754cbc9de3798cfd1af4f3fe21e05.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1994-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(23, 1, 5, 1, 45, 1, 'RAKOTOVAO', 'Herivonjy Fanomezantsoa Tsilavina', 'images/14db8ace91fb0a0c23b18b2e83685e01.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1997-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(24, 1, 5, 1, 46, 1, 'RAMAMONJISOA', 'Andriantsilavo David', 'images/be3ffe00b9f1f02ab5cfe15c0bbf954c.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1990-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(25, 1, 5, 1, 47, 1, 'RANDRIAMANANTSOA', 'Alain', 'images/811132381ff5fbe1681f0f04326235e0.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1992-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(26, 1, 5, 1, 48, 1, 'RANDRIANDIMBISOA', 'Alain Philippe', 'images/60c0c8a398bbe9b286ba8088cfdc9d15.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1997-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(27, 1, 5, 1, 49, 1, 'RATOVO ANDRIAMAHERY', 'Mahery Jonathan', 'images/14e563389dd4246d58cf04b5783d67c2.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1995-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(28, 1, 5, 1, 50, 1, 'RAZAFIMANDIMBY', 'Mahandry Timony Camizza', 'images/19c04682053e8cd8eed73f2ae0a86f1c.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '2001-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(29, 1, 5, 1, 51, 1, 'TOVOMIZAKA', 'Anjara Manasoa', 'images/aefcbfd704dff8acf8171fcd695e7de8.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1997-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(30, 1, 4, 1, 52, 1, 'ANDRIAMIHAJANIRINA', 'NEKENA SAROBIDY', 'images/ebfb3e737c7f2d702f626984291ca9f6.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1992-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(31, 1, 4, 1, 53, 1, 'ANDRIANJAFINDRAFITO', 'ANDO FINOANA NANTENAINA', 'images/f8f26a30ef5c17e55d9ae2d19b6743af.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1996-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(32, 1, 4, 1, 54, 1, 'ANDRIANTSILAVINA', 'DIARY FANORENANTSOA', 'images/ecddd00e4e31d675ab2596a30686a197.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1993-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(33, 1, 4, 1, 55, 1, 'ANDRIANIRINA', 'FANASINA CHRISTEL', 'images/44f511b833e38806c8c3a38e7ddca62e.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1998-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(34, 1, 4, 1, 56, 1, 'ANDRIANANTENAINA', 'MARCELLIN', 'images/862d78d5b3e1bbd70c3c5423bfe6f44d.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1991-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(35, 1, 4, 1, 57, 1, 'DAMY', 'ARNAUD', 'images/f253010690f7088be60172a693a88369.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1994-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(36, 1, 4, 1, 58, 1, 'FANDRESENA', 'HARINELINA NICO', 'images/c6cc35ce59587405ffaf33fab10c5a6f.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1996-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(37, 1, 4, 1, 59, 1, 'MANOVOSOA', 'TOJONIAINA', 'images/6ec87ba959d4538d07e47fbd37c16d11.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1993-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(38, 1, 4, 1, 60, 1, 'NOMENJANAHARY', 'PATRIC OLIVIER', 'images/8ae8ab840c1a2ecc131f60dfdb4200d8.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1993-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(39, 1, 4, 1, 61, 1, 'RAFALIMANANTSOA', 'NOTIAVINA ANTSANIAINA', 'images/32bf6eb65d21365d7aa134bbfcd4cc02.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1994-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(40, 1, 4, 1, 62, 1, 'RAFANORENANTSOA', 'PIERRE LOUIS FANEVASOA SAROBIDY', 'images/67f55bc07b5f403617988585eb4861a6.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '2000-01-01', 'Tanambe', 'tanambe', '2014', NULL, NULL, NULL, NULL),
(41, 1, 4, 1, 63, 1, 'RAHARIMALALA', 'TANTELIARISOA CHARLOTTE', 'images/1952c80848728b7035cf715bf8922409.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '2000-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(42, 1, 4, 1, 64, 1, 'RAJAONASY', 'ANDRIAMIHAJA', 'images/79d504761df4bb8773392ca56af5c901.jpeg', 'RASOLO Andrianjarasoa', 'Agent de train', 'Honorine Andrianjarasoa', 'couturière', '0346640962', '1995-01-01', 'Tanambe', 'Lot II E 43 Y ankady', '2014', NULL, NULL, NULL, NULL),
(43, 1, 7, 1, 66, 1, 'ANDRINIRINA', 'Erick', 'images/efd2b651e61ed346ffc975d27a113e9a.jpeg', 'aa', 'aa', 'aa', 'aa', 'aa', '1899-01-01', 'aa', 'aa', '2013', NULL, 'aa', 'aa', 'aa'),
(44, 1, 7, 1, 67, 1, 'ANDRINIRINA2', 'Erick2', 'images/e5ae5f25be02daa96807cada086874e9.jpeg', 'aa', 'aa', 'aa', 'aa', 'aa', '1899-01-01', 'aa', 'aa', '2013', NULL, 'aa', 'aa', 'aa');

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

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `user_id`, `contenu`, `add_at`, `file`) VALUES
(1, 2, 'ioi', '2019-08-27 22:53:05', 'images/354a5ab731eba0e3db04ea5a5539ca4a.pptx'),
(2, 2, 'test', '2019-08-28 11:21:28', NULL),
(3, 2, 'lmlm', '2019-08-28 11:31:59', NULL),
(4, 2, 'lmlm', '2019-08-28 11:35:19', NULL),
(5, 2, 'lmlm', '2019-08-28 11:40:09', NULL),
(6, 2, 'lmlm', '2019-08-28 11:45:26', NULL);

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

--
-- Dumping data for table `information_fils`
--

INSERT INTO `information_fils` (`id`, `user_id`, `information_id`, `contenu`, `add_at`, `file`) VALUES
(1, 2, 2, 'ml', '2019-08-28 11:25:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `information_niveaux`
--

CREATE TABLE `information_niveaux` (
  `information_id` int(11) NOT NULL,
  `niveaux_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information_niveaux`
--

INSERT INTO `information_niveaux` (`information_id`, `niveaux_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 14),
(6, 15);

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
  `credit` double NOT NULL
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
(7, 59),
(7, 60),
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
(13, 54),
(14, 59);

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

--
-- Dumping data for table `parametrage`
--

INSERT INTO `parametrage` (`id`, `chefmention_id`) VALUES
(1, 1);

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

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id`, `niveau_id`, `semestre_id`, `parcour_id`, `salle_class_id`) VALUES
(1, 1, 1, 1, 5),
(2, 1, 3, 1, 5),
(3, 2, 5, 1, 2),
(4, 2, 8, 1, 2),
(5, 3, 9, 1, 4),
(6, 3, 11, 1, 4),
(7, 4, 14, 1, 1),
(8, 4, 15, 1, 1),
(9, 6, 17, 1, 6),
(10, 6, 21, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `salle_class`
--

CREATE TABLE `salle_class` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salle_class`
--

INSERT INTO `salle_class` (`id`, `nom`) VALUES
(1, 'P26'),
(2, 'V1'),
(3, 'V4'),
(4, 'P25'),
(5, 'P28'),
(6, 'Marron');

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
(24, 54),
(25, 59),
(25, 60),
(27, 59);

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
(1, 'EN11', 1, 5),
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
(58, 'EN104IA', 1, 6),
(59, 'test', 1, 9),
(60, 'test3', 1, 3);

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
-- Indexes for table `ec_niveaux`
--
ALTER TABLE `ec_niveaux`
  ADD PRIMARY KEY (`ec_id`,`niveaux_id`),
  ADD KEY `IDX_F637559727634BEF` (`ec_id`),
  ADD KEY `IDX_F6375597AAC4B70E` (`niveaux_id`);

--
-- Indexes for table `ec_semestre`
--
ALTER TABLE `ec_semestre`
  ADD PRIMARY KEY (`ec_id`,`semestre_id`),
  ADD KEY `IDX_C975EA9727634BEF` (`ec_id`),
  ADD KEY `IDX_C975EA975577AFDB` (`semestre_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `enseignant_type`
--
ALTER TABLE `enseignant_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `information_fils`
--
ALTER TABLE `information_fils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jours`
--
ALTER TABLE `jours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `moyenne`
--
ALTER TABLE `moyenne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `note_uc`
--
ALTER TABLE `note_uc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `parametrage`
--
ALTER TABLE `parametrage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `repartition_ec`
--
ALTER TABLE `repartition_ec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salle_class`
--
ALTER TABLE `salle_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
-- Constraints for table `ec_niveaux`
--
ALTER TABLE `ec_niveaux`
  ADD CONSTRAINT `FK_F637559727634BEF` FOREIGN KEY (`ec_id`) REFERENCES `ec` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F6375597AAC4B70E` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ec_semestre`
--
ALTER TABLE `ec_semestre`
  ADD CONSTRAINT `FK_C975EA9727634BEF` FOREIGN KEY (`ec_id`) REFERENCES `ec` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C975EA975577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`) ON DELETE CASCADE;

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
