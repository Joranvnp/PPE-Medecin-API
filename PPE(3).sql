-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 02 mai 2023 à 08:31
-- Version du serveur :  10.3.34-MariaDB-0+deb10u1
-- Version de PHP : 7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `PPE`
--

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE `authentification` (
  `token` varchar(255) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `ipAppareil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`token`, `idPatient`, `ipAppareil`) VALUES
('1dc43920847f7749eedd5f4cdf59d6b65ab761b7877ca797f9f91722e721', 10, '172.18.204.13'),
('2099ba1ea5f6107926e446c08fe284f4ce0d1fc7e01c3f60d07e3c37d135', 10, '172.18.201.142'),
('3250962ecff5a2c27cbb36e95bcfe3f528aed30b73ad47f57879edf47c40', 10, '172.18.204.13'),
('3abe9ba40b65a1774061025d1e00b2fa41c1107155088c4a0117835291f7', 10, '192.168.100.254'),
('bd136201a83077a3d1dfb3e79d7db6585f3fecd758a6ffd76f65edf28418', 10, '172.18.109.9'),
('c17f01254a8e9a967cc616ae216eb7dda0a51c190b656715d3c329f9fae8', 10, '172.18.204.13'),
('c9ca475bfbd280c7c846c0c546033534bb5f3d037e8d0e941ec0e1972a24', 10, '172.18.204.12'),
('d3bd3bfe66907b7c32f6e1dfaf6fcf8bdaee452c2bc76e74146d22d957e3', 10, '192.168.100.254'),
('e4f4cef4ef289ca2eb631f7054b202acc757230f3cb3166aa95a059804ab', 10, '192.168.100.254'),
('f2b50137fe737a0e7e599ef5244cb591cb567e3ba4c3b8fe1371bea48c37', 10, '192.168.100.254'),
('f5b7dd9f15cfd0ee09c5f2e5a2bea41f973f40890d167ac9b5354554a7da', 10, '172.18.204.12'),
('f6bd39280e69e5a175ed805a11e04fce71803e0c2029e2c1b785d8960078', 10, '172.18.204.12'),
('f92435850774c12a1e7a6117c2cc3caf61a0d2a4a8be4543616cc776d362', 10, '172.18.204.13'),
('faaf11712b7a77df850a2abac2c3fb4429fd72feeba592edf23e7f269fcc', 10, '172.18.204.13');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `idMedecin` varchar(200) NOT NULL,
  `nomMedecin` varchar(500) NOT NULL,
  `prenomMedecin` varchar(500) NOT NULL,
  `loginMedecin` varchar(100) NOT NULL,
  `mdpMedecin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`idMedecin`, `nomMedecin`, `prenomMedecin`, `loginMedecin`, `mdpMedecin`) VALUES
('0f2770ae85551984374f60a8ae466d89c02e7906', 'ALEXIOU', 'ANNA', 'a.anna', '$2a$12$5IFxQb6UMoeC7zf6tTWM/e9IGsmdrhmmGEJSDArw74vZUhVWWt.Uq'),
('10d2cf11e89240e2a61f9951c2370eb26d8cc02c', 'NGUYEN', 'THI KIMANH', 'n.thikimanh', '$2a$12$uS5o0dUExUnkjJfiedyTO.7gAe/fi7i0.JpQ0Es6WX85dR4QYtHZq'),
('149635f4043520aebdea1fd4d38768ba24a64658', 'LEVY ABDULGAN', 'DORA', 'l.dora', '$2a$12$hBlhDbL/jUpicfKkpcO8buoEtThfxrHeXCUxiKVYFDI34kMMlWrcO'),
('16e3cbd02663ea1d89c06efeca5bbdb1d683f490', 'GUIBE', 'Clotilde', 'g.clotilde', '$2a$12$.gstLNp5hW28fH8qd0./OOjfZJvc0uJFhVrGn0UfM8RFeCUfXajPC'),
('27747c1b31f49173fac69769326249038e87b331', 'COUTURIER', 'MICHEL', 'c.michel', '$2a$12$CYQCf.3iFbhQC.C7sKqjEuNpmOmMG/4kjUAcCxdhMQRSm9h2NV2bm'),
('35f1ae494124096d175c4178b58b5f1d3684167d', 'ANDRE ARLET', 'HELENE', 'a.helene', '$2a$12$ZTCpsoiNFsPnC3KqAGnMseGd828AeN5/z44d1WACfY8XD3xDcMWl2'),
('3b3c457120a9827a32c9a83ef9059ce91d191112', 'CHAU TAN', 'SIV', 'c.siv', '$2a$12$afZ7Mj89kg3qKvahsJbpTOoEbnOC1DrzDcqWIaMsUZu1VeaTGD1cK'),
('491901eec066a524d52cb5cf0fb788ac845d61ca', 'BAGHER', 'MARIANNE', 'b.marianne', '$2a$12$.jvbaNKBH4PeRtN2Pu5g5evIpnS2heKg1umSqeOF9tvqq2tJ1MWwO'),
('5859c091492eb7e5aaa920c57a0016e2ca37c450', 'BRIERE', 'ISABELLE', 'b.isabelle', '$2a$12$msECe5HSkcvqLKFyobbxt.bvQlVEWB8JFEjnWs72Ivol6Sg5izVRa'),
('5f6f46886b826d15cce7d3bc2457701e655a5cf9', 'BUCK COAT', 'VIRGINIE', 'b.virginie', '$2a$12$BZVn/fGKmPHnM58u6k8Hu.XYUWi2osT8OaalRI0i6B.qBfHYKp4NG'),
('5ff8a93f2767b12ce8464dc20fc3b231acbf88a6', 'COMBOURIEU', 'LAURE', 'c.laure', '$2a$12$vcjRDwe8RvE5Q1RCvfbdu.smox8DOTY4GTU.BikOd8nSzGZJcV0Ly'),
('66a257fe8bf2ac247cc136fb15b823893da82061', 'TRESCAZES', 'THIERRY', 't.thierry', '$2a$12$8RLW.183Y5fKAUGi9z5tpuwB1WnOnrjuIgX9kTv85UBUR1HYb8XiO'),
('6da92af04876b2dd388525071e80b729f2bd133a', 'GOUBY', 'CAROLINE', 'g.caroline', '$2a$12$8OxKfbU/y8bm5R2AntZ1Au5q.446TrntUX7AQsmnltYu7lnKCV5y.'),
('6e7c3b5f3fa876cfc5856df1a1848cc8a7690c28', 'SENBEL', 'THIERRY', 's.thierry', '$2a$12$H.KlsK3nRa2zdq2NwYTQ/..Ofm29gNdFtnjDtZTow6a2Ja1Dn7Aie'),
('73288729bb3d0404856ab7a859ef7ddcd40f9311', 'ITHURBIDE', 'MARINE', 'i.marine', '$2a$12$AVf2NMcR3UmURrYJONlrvu3pSyWiN7GntTp1VNcn7pf/USpbZyrUi'),
('75b5de8c054aae5daa204a44e1fd946e9af720f4', 'MURATYAN', 'EDOUARD', 'm.edouard', '$2a$12$OAevasl3u9ebnFn72r8NUuLPZ0rkKrbo0ROQsGm6up27Etdv3nK2e'),
('8ffc1b058df517a1365e4be9b1ce6205c0efaa81', 'LAZAR', 'VIOLETA', 'l.violeta', '$2a$12$pXcoG9BexcW2SzDqnSvF9uHZZGxXdqWk9JLnPLSnHobZaeh52/J8W'),
('96ac9f3dd86058c7ad2f75d0168d5d8d107407dd', 'NAHON', 'DOMINIQUE', 'n.dominique', '$2a$12$VVWcXQMYt99ucL0l3eD2lOSXcDrHtw.HfGOef4JFv/zMFXpiSECgW'),
('995edf24872c38b1241a81acabfaef172ddf8e7c', 'KALFA', 'OURIEL', 'k.ouriel', '$2a$12$qcKEfGFtJxZuIa7IKEU0KOkqEJDBOwzMfXpfobIaXqi0duqdn7zLK'),
('a133ceafa517289ff3120ee1a8bf9ea175c57699', 'BELNELBAZ', 'JACQUES', 'b.jacques', '$2a$12$MwbMS16LBI9ccBcRJwYOvOgaIIGJYrpR04e7.fY36zi5rcvv8Ipj2'),
('b49b4948c1b6bc3b591e44db5c2f62ee05d6e1f2', 'SAYRIN', 'JEAN', 's.jean', '$2a$12$d17Mgpzwwb8i0.zkYpxzBus2vQQRZkxCOKiuSSq.uh7R/2xcJwFZa'),
('bbe793e7dd6e7e41b9321438471c697b9c3d72cd', 'FERON', 'ANNE', 'f.anne', '$2a$12$Sqs4D4e8vMJKLK035W167eADCpzQcMRrJteFvMm1r95lQouuC81tW'),
('bfcb366633089a542bfff19bffbf3318e35d9d11', 'KIEUSSEIAN PETARD', 'ODILE', 'k.odile', '$2a$12$Fy.0uj3YQNbnAfb5oH90Zeb6AM7/6Il3WN02VXWD0b63ojf544X12'),
('d0084bea9049e11e0cb060dcef340c97d8f3e113', 'CHETRIT', 'MICKAEL', 'c.mickael', '$2a$12$gYo.XxMI5dJTlXHfra02buwf8HoimgIWylVLlhJr4keVGkOsdlq96'),
('d533031ca70ff9e18c1601f476aea3ceb5031802', 'KNIAZEFF', 'ALEXIS', 'k.alexis', '$2a$12$9c.73oApU3E5XPzFJPacO.nGEtJV3DAoQiGQZqepAF9RvK4RccnyG'),
('dbe4373de016f1c2949e2b70aa7ac9e47ceabd3e', 'PARTOUCHE TAIEB', 'LAURIE', 'p.laurie', '$2a$12$UA4pJgCZCamCS.WNSzi/t.Mx.Q25/VLpzWl0buSTYCGUJ99GstUY6'),
('f5b3e1b6efb2bf95d002f3a86b9d315838d35cb0', 'PAMPHIL', 'RUXANDRA', 'p.ruxandra', '$2a$12$vssW2/7WKtd6xZr0Q2YtTe2Ph5jSlioZfLjQTjZv1OlYoEqKE8Kk2'),
('f83c9d4559d00183bfa10ee86909a180a1f05d9a', 'GASPARIAN', 'DIDIER', 'g.didier', '$2a$12$1UJh2QH2TgGzag08e8GwkO2EPge6x9hDQHi5XXhsr23iwL0MXGSHC');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `idPatient` int(11) NOT NULL,
  `nomPatient` varchar(255) NOT NULL,
  `prenomPatient` varchar(255) NOT NULL,
  `ruePatient` varchar(255) NOT NULL,
  `cpPatient` varchar(255) NOT NULL,
  `villePatient` varchar(255) NOT NULL,
  `telPatient` varchar(255) NOT NULL,
  `loginPatient` varchar(255) NOT NULL,
  `mdpPatient` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`idPatient`, `nomPatient`, `prenomPatient`, `ruePatient`, `cpPatient`, `villePatient`, `telPatient`, `loginPatient`, `mdpPatient`) VALUES
(2, 'gr', 'egr', 'eer', 'gr', 'g', 'gr', 'gr', 'g'),
(7, 'kevin', 'fez', 'fze', 'fze', 'fze', 'fez', 'k', '$2y$10$Z2RKJ2G/ETUOHjIaGvyyoOml7Erb.4vMF.co74XHvkIFsf7lYBLKy'),
(8, 'MUDLER', 'kévin', '13 allée des charmes', '57280', 'Maizières-lès-Metz', '0648222888', 'kevin57.mud@gmail.com', '$2y$10$as5M62Fw/2.dy5qrf2aP0eKaCtFZl5EggiKrSkVcc7CLTN53z3EBC'),
(9, 'M', 'k', '1', '5', 'M', '06', 'K', '$2y$10$u6.zsaO9r.MAVqaHcFudqelc2pFdd5Wl5vOM/BsK0crGjqkAmo04a'),
(10, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$zwlgmkVQ5/f.Y9f9jehD3Oc1mRjsP4noCf96.Celfsoze0uTfx7j.'),
(11, 'Vanpeene', 'Joran', '5 rue ', '55000', 'Gap', '07676647406', 'Joran', '$2y$10$.uJcSS6T8G461dWanjWBf.gFbDXt4B5Z7F7074G.RMcifdq38ZcEK'),
(12, 'aadz', 'ada', 'azd', 'azd', 'adz', 'adz', 'azd', '$2y$10$byZoq9ZIElizkbZ04lUUyeKwlcD.DthXu4bSqPtTIOEou0o/y3Zwy'),
(13, 'aadz', 'ada', 'azd', 'azd', 'adz', 'adz', 'azd', '$2y$10$xQViBIhQCzt94fsFYSsxEOGaTtDnTBY3BDuCNDz4P5hQXC2cdOyUO'),
(14, 'aadz', 'ada', 'azd', 'azd', 'adz', 'adz', 'azd', '$2y$10$A.REfvOrFust64lXHqeTbeZnda.r/nWOtJL3ogm97AWIY609cpeU2'),
(15, 'aadz', 'ada', 'azd', 'azd', 'adz', 'adz', 'azd', '$2y$10$FSTiCERFQ5beqVsrhPOMsO.eB6S0yCwLslw37hlQFi1Z4CYYVSBpy'),
(16, 'aadz', 'ada', 'azd', 'azd', 'adz', 'adz', 'azd', '$2y$10$KkqEbIAviiW9/hBCXcs8N.12jXcTmnoJley1r7SZljiwbC6hWH/wS'),
(17, 'a', 'aafe', 'a', '', 'afe', 'afe', 'afe', '$2y$10$mOLeNVXQSgU4xEvhET.7Ge6m.w62BK0BqU0qGWAdY645duQu7JYN.'),
(18, 'efzef', 'dvfefr', 'zef', 'zef', 'ef', 'zefzef', 'zeff', '$2a$12$1W8QOHrd0IvYsmhVwAOTgu0fl7k2cEuUZVIdGHpUbG31MnlT6b.DK'),
(19, 'a', 'zzdfzdaa', 'a', 'a', 'a', 'a', 'a', '$2y$10$OnVDB/EF6u1EuMIEkM105.ZSNW0pK02DiDV3sZe7m4fFpI2DEkHv2'),
(20, 'aa', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$UrA1qEn.uSIeBNAbPTwJP.q4/6RJPoQ7EzJjzjb42fbtm0EdWt7ee'),
(21, 'mudler', 'kevin', 'ferferf', '57280', 'a', '6', 'a', '$2y$10$DTbww5OJ8vGlHUzAqFrNHe7D2N.ym8DD1eD0n1AGRRRE9ej7ItSmO'),
(22, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$5qHG2yREIFXGwGyDIXidS.msR1lP0q.427iUdgavNMtaL03nvXaYu'),
(23, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$Th6EE/fMzmk2XyCx6Y5AIufizI7BhV1e9XjT8NtH1PskTlzoR73gO'),
(24, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$ehqHCEwp6wHfcj8pmcyjC.Q71dKeDbdN24/wPJI0BYgg6.1w5bcLe'),
(25, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$WIliu8PY6B/WDy8IpQFygOk5d.PlmsAHEheJHM3FuskRmZ7ceoFJG'),
(26, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$EYM.jpy7dxJSmkH8NAryPOhV4fDEsU2hzchLV129WsEVbfs3.LzXy'),
(27, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$zY3BX9.GU6t/1ZHoKX5vjeoeEA8cS4H119n0o9r61Bt9l76c8LtIe'),
(28, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$mWDB4lbCiYgd37qxkN3rkuqBO1OFuNab/Amn.UVIGTy153JSkrLMC'),
(29, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$klX6FPIqtmpgx4Lj29lUOezLv1re8VE86rpyYjk2DKO48DP8vOtzu'),
(30, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$..P.b/1Mxy24ra//kxP4yeuxvlsKhZU72wAhgTdbxnE/7s8v7MS7e'),
(31, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$Oq/C8mamyqoVV7uTpWKfTuB8zUTQZhWJwpHVOHyWhyvc4A4u7IuxK'),
(32, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '$2y$10$oghoBBvp5/nDmzUR17mbyOshzHmGEoYirF9OdR/LZ3R0LZZmCVZZK'),
(33, 'o', 'o', 'o', 'o', 'o', 'o', 'o', '$2y$10$h5EOUuBHJwTyypfxSlR2rOt40Y.TnNG5mFHoZepRHLPLNgeMlj2fu');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `idRdv` int(11) NOT NULL,
  `dateHeureRdv` datetime NOT NULL,
  `idPatient` int(11) NOT NULL,
  `idMedecin` varchar(500) NOT NULL,
  `compteRendu` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`idRdv`, `dateHeureRdv`, `idPatient`, `idMedecin`, `compteRendu`) VALUES
(155, '2023-04-12 08:00:00', 18, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(163, '2023-04-12 16:40:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(165, '2023-04-12 16:40:00', 10, 'dbe4373de016f1c2949e2b70aa7ac9e47ceabd3e', NULL),
(174, '2023-04-15 08:00:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(175, '2023-04-12 08:20:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(178, '2023-04-13 08:00:00', 10, 'd0084bea9049e11e0cb060dcef340c97d8f3e113', NULL),
(179, '2023-04-13 08:00:00', 10, 'd0084bea9049e11e0cb060dcef340c97d8f3e113', NULL),
(180, '2023-04-12 08:40:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(182, '2023-04-20 11:00:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(183, '2023-04-20 17:20:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(184, '2023-04-20 17:40:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(185, '2023-04-21 10:40:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(186, '2023-04-05 10:00:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(187, '2023-05-10 17:40:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(188, '2023-05-02 08:00:00', 10, '16e3cbd02663ea1d89c06efeca5bbdb1d683f490', NULL),
(189, '2023-05-13 08:40:00', 10, 'd0084bea9049e11e0cb060dcef340c97d8f3e113', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`token`),
  ADD KEY `idPatient` (`idPatient`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`idMedecin`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idPatient`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`idRdv`),
  ADD KEY `idPatient` (`idPatient`),
  ADD KEY `idMedecin` (`idMedecin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `idPatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `idRdv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD CONSTRAINT `authentification_ibfk_1` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `idMedecin` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`),
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
