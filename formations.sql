-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 22 Octobre 2015 à 20:30
-- Version du serveur :  5.5.44-0+deb8u1
-- Version de PHP :  5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `formations`
--

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

CREATE TABLE IF NOT EXISTS `catalogue` (
`idproduit` int(13) NOT NULL,
  `idfamillecatalogue` int(13) NOT NULL,
  `idsousfamillecatalogue` int(13) NOT NULL,
  `ref_produit` varchar(255) CHARACTER SET latin1 NOT NULL,
  `designation_produit` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `catalogue`
--

INSERT INTO `catalogue` (`idproduit`, `idfamillecatalogue`, `idsousfamillecatalogue`, `ref_produit`, `designation_produit`) VALUES
(1, 1, 1, 'SECU 001', 'Perfectionnement a la conduite (ADC) et/ou Passage CACES PEMP 1B - 3B (et Recyclage) R386'),
(2, 1, 1, 'SECU 002', 'Perfectionnement a la conduite des Chariot Automoteur (ADC) et/ou passage CACES (et Recyclage) R389'),
(3, 1, 1, 'SECU 003', 'Perfectionnement a la conduite des Grues Auxiliaires de chargement et/ou Passage CACES R390'),
(4, 1, 1, 'SECU 004', 'Perfectionnement a la conduite des engins de chantier et/ou Passage CACES R372M'),
(5, 1, 1, 'SECU 005', 'Port du harnais de securite'),
(6, 1, 1, 'SECU 006', 'Port du harnais de securite sur pylone, toitures et chateau d\\''eau'),
(7, 1, 1, 'SECU 007', 'Port du harnais de securite sur pylone, toitures et chateau d\\''eau avec travail en suspension'),
(8, 1, 1, 'SECU 008', 'Travail sur cordes, avec evacuation'),
(9, 1, 1, 'SECU 009', 'Perfectionnement a la conduite des Nacelles Suspendues'),
(10, 1, 1, 'SECU 010', 'Formation au Montage et Demontage des Echafaudages Mobiles'),
(11, 1, 1, 'SECU 011', 'Montage et demontage d\\''echafaudage fixe'),
(12, 1, 1, 'SECU 012', 'Reception et conformite d\\''echafaudage fixe'),
(13, 1, 1, 'SECU 013', 'Formation initial a la pratique de l\\''Elingage'),
(14, 1, 1, 'SECU 014', 'Perfectionnement a la conduite de Ponts Roulants'),
(15, 1, 1, 'SECU 015', 'Audits Securite-Hauteur sur sites, en vue de preconisation concernant les postes a risques'),
(16, 1, 2, 'SECU 016', 'Preparation a l''habilitation electrique Personnel non electricien (Tous niveau d''habilitation)'),
(17, 1, 2, 'SECU 017', 'Preparation a l''habilitation electrique Personnel electricien (Tous niveau d''habilitation)'),
(18, 1, 3, 'SECU 018', 'Sauveteur Secouriste du Travail (SST) Formation initial et MAC (Recyclage)'),
(20, 1, 4, 'SECU 019', 'Formation Incendie Equipier de Premiere Intervention (EPI)'),
(21, 1, 4, 'SECU 020', 'Formation Incendie des Guide Files et Serre Files'),
(22, 1, 4, 'SECU 021', 'Mise en place d''un exercice d''évacuation'),
(23, 1, 5, 'SECU 022', 'Formation des membres du CHSCT (-300/+300 p.)'),
(24, 1, 6, 'SECU 023', 'Formation a la prevention des Accidents Professionnels: Gestes et Postures au poste de travail'),
(25, 1, 6, 'SECU 024', 'Prevention des risques lies a l''activite physique (PRAP)'),
(26, 1, 7, 'SECU 025', 'Formation a la gestion et a l''utilisation en securite des produits chimiques'),
(27, 1, 8, 'SECU 026', 'Formation a la gestion des plans de prevention'),
(28, 1, 9, 'SECU 027', 'Formation a la gestion des protocoles de securite'),
(29, 1, 10, 'SECU 028', 'Accompagnement a l''evaluation des risques professionnels et a la mise en place de documents uniques'),
(30, 1, 11, 'SECU 029', 'Formation initial ENCADREMENT TECHNIQUE'),
(31, 1, 11, 'SECU 030', 'Formation initial ENCADREMENT DE CHANTIER'),
(32, 1, 11, 'SECU 031', 'Formation initial OPERATEUR'),
(33, 1, 11, 'SECU 031', 'Formation initial OPERATEUR INTERVENANT SEUL'),
(34, 2, 12, 'GPEC 001', 'La GPEC'),
(35, 2, 12, 'GPEC 002', 'Faire evoluer sa GPEC'),
(36, 2, 12, 'GPEC 003', 'Accompagnement a la mise en place de la GPEC au sein de l''entreprise'),
(37, 2, 12, 'GPEC 004', 'Connaitre les aspect juridique de la GPEC'),
(38, 2, 12, 'GPEC 005', 'GPEC: Les entretiens professionnels de Progres'),
(39, 2, 12, 'GPEC 006', 'GPEC: L''evolution des competences'),
(40, 2, 12, 'GPEC 007', 'GPEC: Reglementation de l''evaluation des performances'),
(41, 2, 12, 'GPEC 008', 'GPEC: L''emploi des seniors'),
(42, 3, 13, 'ANID 001', 'Manager son Equipe'),
(43, 3, 13, 'ANID 002', 'Conduire une reunion'),
(44, 3, 13, 'ANID 003', 'Developper votre leadership au feminin'),
(45, 3, 14, 'ANID 004', 'Maitriser sa tresorerie et nogicier avec sa banque'),
(46, 3, 14, 'ANID 005', 'Maitriser son organisation et sa gestion des documents'),
(47, 3, 15, 'ANID 006', 'Prendre la parole en public'),
(48, 3, 15, 'ANID 007', 'Ecouter et mieux observer pour mieux communiquer'),
(49, 3, 15, 'ANID 008', 'S''affirmer sans agresser'),
(50, 3, 15, 'ANID 009', 'Rediger des e-mais efficaces'),
(51, 3, 16, 'ANID 010', 'Mieux gerer son stress au quotidien'),
(52, 3, 16, 'ANID 011', 'Mieux gerer son temps, gerer ses priorites'),
(53, 3, 16, 'ANID 012', 'Mieux gerer les conflits'),
(54, 3, 16, 'ANID 013', 'Developper son charisme'),
(55, 3, 16, 'ANID 014', 'Gagner en estime de soi et en confiance'),
(56, 3, 16, 'ANID 015', 'Mieux decider'),
(57, 3, 16, 'ANID 016', 'Prevenir l''epuisement et le burn-out'),
(58, 3, 17, 'ANID 017', 'Le coaching pour mieux gerer son quotidien'),
(59, 3, 17, 'ANID 018', 'Coacher efficacement son equipe'),
(60, 3, 18, 'ANID 019', 'Recruter sans se tromper'),
(61, 3, 18, 'ANID 020', 'Conduite des entretiens d''evaluation (annuel)'),
(62, 3, 18, 'ANID 021', 'Sensibilisation a la gestion des personnes handicapées'),
(63, 3, 19, 'ANID 022', 'Prospecter, communiquer, convaincre'),
(64, 3, 19, 'ANID 023', 'Accroitre sa performance commercial'),
(65, 3, 19, 'ANID 024', 'Optimiser la vente en magasin'),
(66, 4, 20, 'LANG 001', 'Anglais (Initiation, Perfectionnement) et anglais metier'),
(67, 4, 20, 'LANG 002', 'Allemand'),
(68, 4, 20, 'LANG 003', 'Espagnol'),
(69, 4, 20, 'LANG 004', 'Italien'),
(70, 4, 20, 'LANG 005', 'Portugais'),
(71, 4, 21, 'LANG 006', 'Arabe'),
(72, 4, 21, 'LANG 007', 'Hebreu'),
(73, 4, 21, 'LANG 008', 'Japonais'),
(74, 4, 21, 'LANG 009', 'Chinois-Mandarin'),
(75, 4, 21, 'LANG 010', 'Polonais'),
(76, 4, 21, 'LANG 011', 'Russe'),
(77, 4, 22, 'LANG 012', 'Francais Langue Maternelle (FLAM)'),
(78, 4, 22, 'LANG 013', 'Francais Langue Etrangere (FLE)'),
(79, 4, 22, 'LANG 014', 'Langue des signes Francaise (LSF)'),
(80, 4, 22, 'LANG 015', 'Remise a niveau Grammaire et Orthographe'),
(81, 5, 23, 'INF 001', 'Word (Initiation et Perfectionnement)'),
(82, 5, 23, 'INF 002', 'Excel(Initiation et Perfectionnement)'),
(83, 5, 23, 'INF 003', 'Power Point(Initiation et Perfectionnement)'),
(84, 5, 23, 'INF 004', 'Access(Initiation et Perfectionnement)'),
(85, 5, 23, 'INF 005', 'Outlook(Initiation et Perfectionnement)'),
(86, 5, 23, 'INF 006', 'Decouverte PC et MAC'),
(87, 5, 23, 'INF 007', 'Open Office'),
(88, 5, 24, 'INF 008', 'Photoshop'),
(89, 5, 24, 'INF 009', 'Illustrator'),
(90, 5, 24, 'INF 010', 'Indesign'),
(91, 5, 24, 'INF 011', 'Dreamweaver'),
(92, 5, 24, 'INF 012', 'Autocad'),
(93, 5, 25, 'INF 013', 'Bases de donnees'),
(94, 5, 25, 'INF 014', 'Developpement Internet'),
(95, 6, 26, 'NETT 001', 'Technique de base des metiers de la proprete'),
(96, 6, 26, 'NETT 002', 'Formation CYCLE COMPLET des laveurs de vitre'),
(97, 6, 26, 'NETT 003', 'Formation Degraffitage: l''enlevement des graffitis'),
(98, 6, 27, 'NETT 004', 'Formation aux techniques de nettoyage en securite en milieu ferroviaire (TCO 509)'),
(99, 6, 27, 'NETT 005', 'Formation en Espaces Publics & Privatifs SNCF (Gares, Centres de Maintenance)'),
(100, 6, 27, 'NETT 006', 'Formation en Espaces Publics & Privatifs RATP (Gares, Station de metro, Centres de Maintenance, Depot de bus)'),
(101, 6, 27, 'NETT 007', 'Formation Materiel Roulant SNCF'),
(102, 6, 27, 'NETT 008', 'Formation Materiels Roulants RATP(Bus, Tramway, Metro, Car Scolaire, de Voyage, de Transport, etc...)'),
(103, 6, 27, 'NETT 009', 'Formateur SNCF P1 P2 P3 (Locotracteur et Rail-Route) - Chef de manoeuvre - Accrocheur de Wagon'),
(104, 6, 28, 'ESPV 001', 'L''entretien des espaces Verts'),
(105, 6, 28, 'ESPV 002', 'Le chiffrage pour des chantiers d''entretien d''espaces verts');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`idclient` int(13) NOT NULL,
  `nom_societe` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idclient`, `nom_societe`, `adresse`, `code_postal`, `ville`, `telephone`) VALUES
(1, 'SAS CRIDIP', '8 RUE OCTAVE VOYER', '85100', 'LES SABLES D OLONNE', '0251232424');

-- --------------------------------------------------------

--
-- Structure de la table `commande_catalogue`
--

CREATE TABLE IF NOT EXISTS `commande_catalogue` (
`idcommande` int(13) NOT NULL,
  `idclient` int(13) NOT NULL,
  `besoin` longtext NOT NULL,
  `nb_personne` varchar(255) NOT NULL,
  `start_periode` varchar(255) NOT NULL,
  `end_periode` varchar(255) NOT NULL,
  `observation` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande_catalogue`
--

INSERT INTO `commande_catalogue` (`idcommande`, `idclient`, `besoin`, `nb_personne`, `start_periode`, `end_periode`, `observation`) VALUES
(1, 1, '&lt;p&gt;Remise a niveau&lt;/p&gt;\r\n', '20', '1451602800', '1454194800', '&lt;p&gt;Nop&lt;/p&gt;\r\n'),
(2, 1, '&lt;p&gt;Remise &amp;agrave; niveau Developpement&lt;/p&gt;\r\n', '1', '1446764400', '1448838000', '&lt;p&gt;Nop&lt;/p&gt;\r\n'),
(3, 1, '&lt;p&gt;jfldsjfjdsjfksf&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:28px&quot;&gt;&lt;u&gt;sdfdsf&lt;/u&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;sdf&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;fsd&lt;/p&gt;\r\n', '40', '1443650400', '1445986800', '');

-- --------------------------------------------------------

--
-- Structure de la table `commande_inter`
--

CREATE TABLE IF NOT EXISTS `commande_inter` (
`idcommande` int(13) NOT NULL,
  `idclient` int(13) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `date_choisie` varchar(255) NOT NULL,
  `nb_personne` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande_inter`
--

INSERT INTO `commande_inter` (`idcommande`, `idclient`, `theme`, `date_choisie`, `nb_personne`) VALUES
(3, 1, '3', '1445850000', '2'),
(4, 1, '6', '1445850000', '2'),
(5, 1, '2', '1450083600', '2'),
(6, 1, '16', '1448614800', '25'),
(7, 1, '14', '1447837200', '8');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`idcontact` int(13) NOT NULL,
  `idclient` int(13) NOT NULL,
  `nom_contact` varchar(255) NOT NULL,
  `prenom_contact` varchar(255) NOT NULL,
  `tel_contact` varchar(255) NOT NULL,
  `port_contact` varchar(255) NOT NULL,
  `mail_contact` varchar(255) NOT NULL,
  `skype_contact` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`idcontact`, `idclient`, `nom_contact`, `prenom_contact`, `tel_contact`, `port_contact`, `mail_contact`, `skype_contact`) VALUES
(1, 1, 'MOCKELYN', 'Maxime', '0978456525', '0633134330', 'mmockelyn@gmail.com', 'mockelyn.maxime');

-- --------------------------------------------------------

--
-- Structure de la table `directus_activity`
--

CREATE TABLE IF NOT EXISTS `directus_activity` (
`id` int(10) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `identifier` varchar(100) DEFAULT NULL,
  `table_name` varchar(100) NOT NULL DEFAULT '',
  `row_id` int(10) DEFAULT '0',
  `user` int(10) NOT NULL DEFAULT '0',
  `data` text,
  `delta` text NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `parent_table` varchar(100) DEFAULT NULL,
  `parent_changed` tinyint(1) NOT NULL COMMENT 'Did the top-level record in the change set alter (scalar values/many-to-one relationships)? Or only the data within its related foreign collection records? (*toMany)',
  `datetime` datetime DEFAULT NULL,
  `logged_ip` varchar(20) DEFAULT NULL,
  `user_agent` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Contains history of revisions';

--
-- Contenu de la table `directus_activity`
--

INSERT INTO `directus_activity` (`id`, `type`, `action`, `identifier`, `table_name`, `row_id`, `user`, `data`, `delta`, `parent_id`, `parent_table`, `parent_changed`, `datetime`, `logged_ip`, `user_agent`) VALUES
(1, 'LOGIN', 'LOGIN', NULL, 'directus_users', 0, 1, NULL, '', NULL, NULL, 0, '2015-10-22 08:44:37', '192.168.40.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0'),
(2, 'ENTRY', 'ADD', 'utilisateur', 'directus_columns', 3, 1, '{"id":"3","table_name":"utilisateur","column_name":"id","data_type":null,"ui":"numeric","system":"0","master":"0","hidden_input":"0","hidden_list":"0","required":"1","relationship_type":null,"table_related":null,"junction_table":null,"junction_key_left":null,"junction_key_right":null,"sort":"1","comment":""}', '[]', NULL, NULL, 1, '2015-10-22 09:04:02', '192.168.40.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0'),
(3, 'ENTRY', 'ADD', 'utilisateur', 'directus_columns', 4, 1, '{"id":"4","table_name":"utilisateur","column_name":"active","data_type":null,"ui":"checkbox","system":"0","master":"0","hidden_input":"0","hidden_list":"0","required":"0","relationship_type":null,"table_related":null,"junction_table":null,"junction_key_left":null,"junction_key_right":null,"sort":"2","comment":""}', '[]', NULL, NULL, 1, '2015-10-22 09:04:02', '192.168.40.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0'),
(4, 'UI', 'ADD', 'utilisateur', 'directus_ui', 2, 1, '{"id":"2","table_name":"utilisateur","column_name":"iduser","ui_name":"numeric","name":"id","value":"numeric"}', '[]', NULL, NULL, 1, '2015-10-22 09:09:13', '192.168.40.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0'),
(5, 'UI', 'ADD', 'utilisateur', 'directus_ui', 3, 1, '{"id":"3","table_name":"utilisateur","column_name":"iduser","ui_name":"numeric","name":"size","value":"large"}', '[]', NULL, NULL, 1, '2015-10-22 09:09:13', '192.168.40.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0'),
(6, 'UI', 'ADD', 'utilisateur', 'directus_ui', 4, 1, '{"id":"4","table_name":"utilisateur","column_name":"iduser","ui_name":"numeric","name":"allow_null","value":"0"}', '[]', NULL, NULL, 1, '2015-10-22 09:09:13', '192.168.40.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0'),
(7, 'LOGIN', 'LOGIN', NULL, 'directus_users', 0, 1, NULL, '', NULL, NULL, 0, '2015-10-22 13:52:42', '192.168.40.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0');

-- --------------------------------------------------------

--
-- Structure de la table `directus_bookmarks`
--

CREATE TABLE IF NOT EXISTS `directus_bookmarks` (
`id` int(11) unsigned NOT NULL,
  `user` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_bookmarks`
--

INSERT INTO `directus_bookmarks` (`id`, `user`, `title`, `url`, `icon_class`, `active`, `section`) VALUES
(1, 1, 'Activity', 'activity', 'icon-bell', NULL, 'other'),
(2, 1, 'Files', 'files', 'icon-attach', NULL, 'other'),
(3, 1, 'Messages', 'messages', 'icon-chat', NULL, 'other'),
(4, 1, 'Users', 'users', 'icon-users', NULL, 'other');

-- --------------------------------------------------------

--
-- Structure de la table `directus_columns`
--

CREATE TABLE IF NOT EXISTS `directus_columns` (
`id` int(11) unsigned NOT NULL,
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `data_type` varchar(64) DEFAULT NULL,
  `ui` varchar(64) DEFAULT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `master` tinyint(1) NOT NULL DEFAULT '0',
  `hidden_input` tinyint(1) NOT NULL DEFAULT '0',
  `hidden_list` tinyint(1) NOT NULL DEFAULT '0',
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `relationship_type` varchar(20) DEFAULT NULL,
  `table_related` varchar(64) DEFAULT NULL,
  `junction_table` varchar(64) DEFAULT NULL,
  `junction_key_left` varchar(64) DEFAULT NULL,
  `junction_key_right` varchar(64) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `comment` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_columns`
--

INSERT INTO `directus_columns` (`id`, `table_name`, `column_name`, `data_type`, `ui`, `system`, `master`, `hidden_input`, `hidden_list`, `required`, `relationship_type`, `table_related`, `junction_table`, `junction_key_left`, `junction_key_right`, `sort`, `comment`) VALUES
(1, 'directus_users', 'group', NULL, 'many_to_one', 0, 0, 0, 0, 0, 'MANYTOONE', 'directus_groups', NULL, NULL, 'group_id', NULL, ''),
(2, 'directus_users', 'avatar_file_id', 'INT', 'single_file', 0, 0, 0, 0, 0, 'MANYTOONE', 'directus_files', NULL, NULL, 'avatar_file_id', NULL, ''),
(3, 'utilisateur', 'id', NULL, 'numeric', 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, 1, ''),
(4, 'utilisateur', 'active', NULL, 'checkbox', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 2, '');

-- --------------------------------------------------------

--
-- Structure de la table `directus_files`
--

CREATE TABLE IF NOT EXISTS `directus_files` (
`id` int(10) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(2000) DEFAULT NULL,
  `title` varchar(255) DEFAULT '',
  `location` varchar(200) DEFAULT NULL,
  `caption` text,
  `type` varchar(50) DEFAULT '',
  `charset` varchar(50) DEFAULT '',
  `tags` varchar(255) DEFAULT '',
  `width` int(5) DEFAULT '0',
  `height` int(5) DEFAULT '0',
  `size` int(20) DEFAULT '0',
  `embed_id` varchar(200) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `date_uploaded` datetime DEFAULT NULL,
  `storage_adapter` int(11) unsigned DEFAULT NULL,
  `needs_index` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Directus Files Storage';

-- --------------------------------------------------------

--
-- Structure de la table `directus_groups`
--

CREATE TABLE IF NOT EXISTS `directus_groups` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `restrict_to_ip_whitelist` tinyint(1) NOT NULL DEFAULT '0',
  `nav_override` text,
  `show_activity` tinyint(1) NOT NULL DEFAULT '1',
  `show_messages` tinyint(1) NOT NULL DEFAULT '1',
  `show_users` tinyint(1) NOT NULL DEFAULT '1',
  `show_files` tinyint(1) NOT NULL DEFAULT '1',
  `nav_blacklist` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_groups`
--

INSERT INTO `directus_groups` (`id`, `name`, `description`, `restrict_to_ip_whitelist`, `nav_override`, `show_activity`, `show_messages`, `show_users`, `show_files`, `nav_blacklist`) VALUES
(1, 'Administrator', NULL, 0, NULL, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `directus_messages`
--

CREATE TABLE IF NOT EXISTS `directus_messages` (
`id` int(10) NOT NULL,
  `from` int(11) DEFAULT NULL,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `attachment` int(11) DEFAULT NULL,
  `response_to` int(11) DEFAULT NULL,
  `comment_metadata` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `directus_messages_recipients`
--

CREATE TABLE IF NOT EXISTS `directus_messages_recipients` (
`id` int(11) unsigned NOT NULL,
  `message_id` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `read` tinyint(11) NOT NULL,
  `group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `directus_preferences`
--

CREATE TABLE IF NOT EXISTS `directus_preferences` (
`id` int(10) unsigned NOT NULL,
  `user` int(11) DEFAULT NULL,
  `table_name` varchar(64) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `columns_visible` varchar(300) DEFAULT NULL,
  `sort` varchar(64) DEFAULT 'id',
  `sort_order` varchar(5) DEFAULT 'ASC',
  `active` varchar(5) DEFAULT '3',
  `search_string` text
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_preferences`
--

INSERT INTO `directus_preferences` (`id`, `user`, `table_name`, `title`, `columns_visible`, `sort`, `sort_order`, `active`, `search_string`) VALUES
(1, 1, 'directus_activity', NULL, 'type,action,identifier,table_name,row_id', 'id', 'ASC', '1,2', NULL),
(2, 1, 'directus_bookmarks', NULL, 'user,title,url,icon_class', 'id', 'ASC', '1,2', NULL),
(3, 1, 'directus_files', NULL, 'name,url,title,location', 'date_uploaded', 'DESC', '1,2', NULL),
(4, 1, 'directus_groups', NULL, 'name,description,restrict_to_ip_whitelist,nav_override,show_activity', 'id', 'ASC', '1,2', NULL),
(5, 1, 'directus_messages', NULL, 'from,subject,message,datetime,attachment', 'id', 'ASC', '1,2', NULL),
(6, 1, 'directus_messages_recipients', NULL, 'message_id,recipient,read,group', 'id', 'ASC', '1,2', NULL),
(7, 1, 'directus_schema_migrations', NULL, '', 'version', 'ASC', '1,2', NULL),
(8, 1, 'directus_users', NULL, 'first_name,last_name,email,password', 'id', 'ASC', '1,2', NULL),
(9, 1, 'utilisateur', NULL, 'login,password,idcontact,nom_user,type', 'id', 'ASC', '1,2', NULL),
(10, 1, 'catalogue', NULL, 'idfamillecatalogue,idsousfamillecatalogue,ref_produit,designation_produit', 'idproduit', 'ASC', '1,2', NULL),
(11, 1, 'client', NULL, 'nom_societe,adresse,code_postal,ville,telephone', 'idclient', 'ASC', '1,2', NULL),
(12, 1, 'commande_inter', NULL, 'idclient,theme,date_choisie,nb_personne', 'idcommande', 'ASC', '1,2', NULL),
(13, 1, 'contact', NULL, 'idclient,nom_contact,prenom_contact,tel_contact,port_contact', 'idcontact', 'ASC', '1,2', NULL),
(14, 1, 'famille_catalogue', NULL, 'designation_famille', 'idfamillecatalogue', 'ASC', '1,2', NULL),
(15, 1, 'inter_calendar_formation', NULL, 'theme,date_formation,prix,duree', 'idformation', 'ASC', '1,2', NULL),
(16, 1, 'sous_famille_catalogue', NULL, 'idfamillecatalogue,designation_sous_famille', 'idsousfamillecatalogue', 'ASC', '1,2', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `directus_privileges`
--

CREATE TABLE IF NOT EXISTS `directus_privileges` (
`id` int(11) NOT NULL,
  `table_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `group_id` int(11) NOT NULL,
  `read_field_blacklist` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `write_field_blacklist` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `nav_listed` tinyint(4) NOT NULL DEFAULT '1',
  `status_id` tinyint(1) NOT NULL DEFAULT '1',
  `allow_view` tinyint(4) NOT NULL DEFAULT '1',
  `allow_add` tinyint(4) NOT NULL DEFAULT '1',
  `allow_edit` tinyint(4) NOT NULL DEFAULT '1',
  `allow_delete` tinyint(4) NOT NULL DEFAULT '1',
  `allow_alter` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_privileges`
--

INSERT INTO `directus_privileges` (`id`, `table_name`, `group_id`, `read_field_blacklist`, `write_field_blacklist`, `nav_listed`, `status_id`, `allow_view`, `allow_add`, `allow_edit`, `allow_delete`, `allow_alter`) VALUES
(1, 'directus_activity', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(2, 'directus_columns', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(3, 'directus_groups', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(4, 'directus_files', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(5, 'directus_messages', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(6, 'directus_preferences', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(7, 'directus_privileges', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(8, 'directus_settings', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(9, 'directus_tables', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(10, 'directus_ui', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(11, 'directus_users', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(12, 'directus_ip_whitelist', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(13, 'directus_social_feeds', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(14, 'directus_messages_recipients', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(15, 'directus_social_posts', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(16, 'directus_storage_adapters', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(17, 'directus_tab_privileges', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(18, 'directus_bookmarks', 1, NULL, NULL, 1, 1, 2, 1, 2, 2, 1),
(19, 'utilisateur', 1, NULL, NULL, 1, 0, 2, 1, 2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `directus_schema_migrations`
--

CREATE TABLE IF NOT EXISTS `directus_schema_migrations` (
  `version` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_schema_migrations`
--

INSERT INTO `directus_schema_migrations` (`version`) VALUES
('20150203221946'),
('20150203235646'),
('20150204002341'),
('20150204003426'),
('20150204012338'),
('20150204015251'),
('20150204021255'),
('20150204022237'),
('20150204023325'),
('20150204024327'),
('20150204031412'),
('20150204035240'),
('20150204040328'),
('20150204041007'),
('20150204042025'),
('20150204042725'),
('20150226033750'),
('20150705010917'),
('20150705022037'),
('20150705024605'),
('20150705025217'),
('20150706152311'),
('20150706223858'),
('20150720121526'),
('20150723013904');

-- --------------------------------------------------------

--
-- Structure de la table `directus_settings`
--

CREATE TABLE IF NOT EXISTS `directus_settings` (
`id` int(10) unsigned NOT NULL,
  `collection` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `value` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_settings`
--

INSERT INTO `directus_settings` (`id`, `collection`, `name`, `value`) VALUES
(1, 'global', 'cms_user_auto_sign_out', '60'),
(3, 'global', 'project_name', 'FORMATION'),
(4, 'global', 'project_url', 'http://192.168.40.129/formation/index.php?view=index'),
(5, 'global', 'cms_color', '#7ac943'),
(6, 'global', 'rows_per_page', '200'),
(7, 'files', 'storage_adapter', 'FileSystemAdapter'),
(8, 'files', 'storage_destination', ''),
(9, 'files', 'thumbnail_storage_adapter', 'FileSystemAdapter'),
(10, 'files', 'thumbnail_storage_destination', ''),
(11, 'files', 'thumbnail_quality', '100'),
(12, 'files', 'thumbnail_size', '200'),
(13, 'global', 'cms_thumbnail_url', ''),
(14, 'files', 'file_naming', 'file_id'),
(15, 'files', 'thumbnail_crop_enabled', '1');

-- --------------------------------------------------------

--
-- Structure de la table `directus_storage_adapters`
--

CREATE TABLE IF NOT EXISTS `directus_storage_adapters` (
`id` int(11) unsigned NOT NULL,
  `key` varchar(255) CHARACTER SET latin1 NOT NULL,
  `adapter_name` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `role` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'DEFAULT, THUMBNAIL, or Null. DEFAULT and THUMBNAIL should only occur once each.',
  `public` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1 for yes, 0 for no.',
  `destination` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `url` varchar(2000) CHARACTER SET latin1 DEFAULT '' COMMENT 'Trailing slash required.',
  `params` varchar(2000) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_storage_adapters`
--

INSERT INTO `directus_storage_adapters` (`id`, `key`, `adapter_name`, `role`, `public`, `destination`, `url`, `params`) VALUES
(1, 'files', 'FileSystemAdapter', 'DEFAULT', 1, '/var/www/formation/directus/media/', 'http://192.168.40.129/formation/directus/media/', NULL),
(2, 'thumbnails', 'FileSystemAdapter', 'THUMBNAIL', 1, '/var/www/formation/directus/media/thumbs/', 'http://192.168.40.129/formation/directus/media/thumbs/', NULL),
(3, 'temp', 'FileSystemAdapter', 'TEMP', 1, '/var/www/formation/directus/media/temp/', 'http://192.168.40.129/formation/directus/media/temp/', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `directus_tables`
--

CREATE TABLE IF NOT EXISTS `directus_tables` (
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `single` tinyint(1) NOT NULL DEFAULT '0',
  `default_status` tinyint(1) NOT NULL DEFAULT '1',
  `is_junction_table` tinyint(1) NOT NULL DEFAULT '0',
  `footer` tinyint(1) DEFAULT '0',
  `list_view` varchar(200) DEFAULT NULL,
  `column_groupings` varchar(255) DEFAULT NULL,
  `primary_column` varchar(255) DEFAULT NULL,
  `user_create_column` varchar(64) DEFAULT NULL,
  `user_update_column` varchar(64) DEFAULT NULL,
  `date_create_column` varchar(64) DEFAULT NULL,
  `date_update_column` varchar(64) DEFAULT NULL,
  `filter_column_blacklist` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_tables`
--

INSERT INTO `directus_tables` (`table_name`, `hidden`, `single`, `default_status`, `is_junction_table`, `footer`, `list_view`, `column_groupings`, `primary_column`, `user_create_column`, `user_update_column`, `date_create_column`, `date_update_column`, `filter_column_blacklist`) VALUES
('directus_messages_recipients', 1, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('directus_users', 1, 0, 1, 0, 0, NULL, NULL, NULL, 'id', NULL, NULL, NULL, NULL),
('utilisateur', 1, 0, 1, 0, 0, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `directus_ui`
--

CREATE TABLE IF NOT EXISTS `directus_ui` (
`id` int(11) unsigned NOT NULL,
  `table_name` varchar(64) DEFAULT NULL,
  `column_name` varchar(64) DEFAULT NULL,
  `ui_name` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `value` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_ui`
--

INSERT INTO `directus_ui` (`id`, `table_name`, `column_name`, `ui_name`, `name`, `value`) VALUES
(1, 'directus_users', 'avatar_file_id', 'single_file', 'allowed_filetypes', 'image/'),
(2, 'utilisateur', 'iduser', 'numeric', 'id', 'numeric'),
(3, 'utilisateur', 'iduser', 'numeric', 'size', 'large'),
(4, 'utilisateur', 'iduser', 'numeric', 'allow_null', '0');

-- --------------------------------------------------------

--
-- Structure de la table `directus_users`
--

CREATE TABLE IF NOT EXISTS `directus_users` (
`id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `first_name` varchar(50) DEFAULT '',
  `last_name` varchar(50) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `salt` varchar(255) DEFAULT '',
  `token` varchar(255) DEFAULT '',
  `reset_token` varchar(255) DEFAULT '',
  `reset_expiration` datetime DEFAULT NULL,
  `position` varchar(500) DEFAULT '',
  `email_messages` tinyint(1) DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `last_access` datetime DEFAULT NULL,
  `last_page` varchar(255) DEFAULT '',
  `ip` varchar(50) DEFAULT '',
  `group` int(11) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `avatar_file_id` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `directus_users`
--

INSERT INTO `directus_users` (`id`, `active`, `first_name`, `last_name`, `email`, `password`, `salt`, `token`, `reset_token`, `reset_expiration`, `position`, `email_messages`, `last_login`, `last_access`, `last_page`, `ip`, `group`, `avatar`, `avatar_file_id`, `location`, `phone`, `address`, `city`, `state`, `zip`) VALUES
(1, 1, '', '', 'mmockelyn@cridip.com', 'f8b73443ae5b63a4da795a0f60135c24729cebdf', '56289fb9471bd', '', '', NULL, '', 1, '2015-10-22 15:52:42', '2015-10-22 15:52:00', '{"path":"messages","route":"messages"}', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `famille_catalogue`
--

CREATE TABLE IF NOT EXISTS `famille_catalogue` (
`idfamillecatalogue` int(13) NOT NULL,
  `designation_famille` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `famille_catalogue`
--

INSERT INTO `famille_catalogue` (`idfamillecatalogue`, `designation_famille`) VALUES
(1, 'Securite'),
(2, 'GPEC'),
(3, 'Animer-Diriger'),
(4, 'Langues'),
(5, 'Informatique'),
(6, 'Nettoyage-Transport-Espace-Vert');

-- --------------------------------------------------------

--
-- Structure de la table `inter_calendar_formation`
--

CREATE TABLE IF NOT EXISTS `inter_calendar_formation` (
`idformation` int(13) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `date_formation` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inter_calendar_formation`
--

INSERT INTO `inter_calendar_formation` (`idformation`, `theme`, `date_formation`, `prix`, `duree`) VALUES
(1, 'HABILITATION ELECTRIQUE BS-BE MANOEUVRE', '1448269200', '190', '2 Jours (14H)'),
(2, 'HABILITATION ELECTRIQUE BS-BE MANOEUVRE', '1450083600', '190', '2 Jours (14H)'),
(3, 'SAUVETEUR SECOURISTE DU TRAVAIL (SST Initial)', '1445850000', '190', '2 Jours (14H)'),
(4, 'SAUVETEUR SECOURISTE DU TRAVAIL (SST Initial)', '1447664400', '190', '2 Jours (14H)'),
(5, 'SAUVETEUR SECOURISTE DU TRAVAIL (SST Initial)', '1449478800', '190', '2 Jours (14H)'),
(6, 'FORMATION ET CACES CHARIOTS 1,3 et 5', '1445850000', '280', '5 Jours (35H)\r\n'),
(7, 'FORMATION ET CACES CHARIOTS 1,3 et 5', '1446454800', '280', '5 Jours (35H)'),
(8, 'FORMATION ET CACES CHARIOTS 1,3 et 5', '1447059600', '280', '5 Jours (35H)'),
(9, 'FORMATION ET CACES CHARIOTS 1,3 et 5', '1447664400', '280', '5 Jours (35H)'),
(10, 'FORMATION ET CACES CHARIOTS 1,3 et 5', '1448269200', '280', '5 Jours (35H)'),
(11, 'FORMATION ET CACES CHARIOTS 1,3 et 5', '1448874000', '280', '5 Jours (35H)'),
(12, 'FORMATION ET CACES CHARIOTS 1,3 et 5', '1449478800', '280', '5 Jours (35H)'),
(13, 'FORMATION ET CACES CHARIOTS 1,3 et 5', '1450083600', '280', '5 Jours (35H)'),
(14, 'FORMATION ET CACES PEMP 1B & 3B', '1447837200', '240', '3 Jours (21H)'),
(15, 'FORMATION ET CACES PEMP 1B & 3B', '1450256400', '240', '3 Jours (21H)'),
(16, 'ECHAFAUDAGES ROULANTS', '1448614800', '210', '1 Jour (7H)');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande_catalogue`
--

CREATE TABLE IF NOT EXISTS `ligne_commande_catalogue` (
`idligne` int(13) NOT NULL,
  `idcommande` int(13) NOT NULL,
  `idproduit` int(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ligne_commande_catalogue`
--

INSERT INTO `ligne_commande_catalogue` (`idligne`, `idcommande`, `idproduit`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 1, 12),
(4, 1, 40),
(5, 1, 41),
(6, 1, 81),
(7, 1, 82),
(8, 1, 83),
(9, 1, 84),
(10, 2, 93),
(11, 2, 94),
(12, 3, 16),
(13, 3, 17),
(14, 3, 24),
(15, 3, 25),
(16, 3, 66),
(17, 3, 67),
(18, 3, 68),
(19, 3, 70),
(20, 3, 81),
(21, 3, 82),
(22, 3, 83),
(23, 3, 84),
(24, 3, 85);

-- --------------------------------------------------------

--
-- Structure de la table `sous_famille_catalogue`
--

CREATE TABLE IF NOT EXISTS `sous_famille_catalogue` (
`idsousfamillecatalogue` int(13) NOT NULL,
  `idfamillecatalogue` int(13) NOT NULL,
  `designation_sous_famille` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sous_famille_catalogue`
--

INSERT INTO `sous_famille_catalogue` (`idsousfamillecatalogue`, `idfamillecatalogue`, `designation_sous_famille`) VALUES
(1, 1, 'CACES HAUTEUR / ENGINS'),
(2, 1, 'ELECTRICITE'),
(3, 1, 'SECOURISME'),
(4, 1, 'INCENDIE'),
(5, 1, 'CHSCT'),
(6, 1, 'GESTES ET POSTURES / PRAP'),
(7, 1, 'PRODUITS CHIMIQUES'),
(8, 1, 'PLAN DE PREVENTION'),
(9, 1, 'PROTOCOLES DE SECURITE'),
(10, 1, 'EVALUATION DES RISQUES PROFESSIONNELS ET DOCUMENT UNIQUE'),
(11, 1, 'PREVENTION DES RISQUES LIES A L\\''AMIANTE'),
(12, 2, 'GPEC'),
(13, 3, 'MANAGEMENT'),
(14, 3, 'DIRIGER'),
(15, 3, 'COMMUNIQUER'),
(16, 3, 'EFFICACITE PROFESSIONNEL'),
(17, 3, 'COACHER'),
(18, 3, 'GERER LE PERSONNEL'),
(19, 3, 'VENDRE'),
(20, 4, 'OCCIDENTALES'),
(21, 4, 'ORIENTALES'),
(22, 4, 'FRANCAIS'),
(23, 5, 'BUREAUTIQUE'),
(24, 5, 'INFOGRAPHIE'),
(25, 5, 'TECHNIQUE'),
(26, 6, 'NETTOYAGE INDUSTRIEL'),
(27, 6, 'NETTOYAGE INDUSTRIEL SECTEUR FERROVIAIRE / TRANSPORT'),
(28, 6, 'ESPACES VERTS');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`iduser` int(11) unsigned NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `idcontact` int(13) DEFAULT NULL,
  `nom_user` varchar(255) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `prenom_user` varchar(255) DEFAULT NULL,
  `adresse_mail` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `login`, `password`, `idcontact`, `nom_user`, `type`, `prenom_user`, `adresse_mail`) VALUES
(1, 'mmockelyn', '2432f58e6ecd7e156403dd1b89830b5ae391fe7d', 0, 'MOCKELYN', 0, 'Maxime', 'mmockelyn@cridip.com'),
(2, 'cridip', 'c0302cb832da4f325c45949db17f3f98386a305d', 1, 'MOCKELYN', 1, 'Maxime', 'mmockelyn@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `catalogue`
--
ALTER TABLE `catalogue`
 ADD PRIMARY KEY (`idproduit`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`idclient`);

--
-- Index pour la table `commande_catalogue`
--
ALTER TABLE `commande_catalogue`
 ADD PRIMARY KEY (`idcommande`);

--
-- Index pour la table `commande_inter`
--
ALTER TABLE `commande_inter`
 ADD PRIMARY KEY (`idcommande`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`idcontact`);

--
-- Index pour la table `directus_activity`
--
ALTER TABLE `directus_activity`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directus_bookmarks`
--
ALTER TABLE `directus_bookmarks`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directus_columns`
--
ALTER TABLE `directus_columns`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `table-column` (`table_name`,`column_name`);

--
-- Index pour la table `directus_files`
--
ALTER TABLE `directus_files`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directus_groups`
--
ALTER TABLE `directus_groups`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directus_messages`
--
ALTER TABLE `directus_messages`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directus_messages_recipients`
--
ALTER TABLE `directus_messages_recipients`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directus_preferences`
--
ALTER TABLE `directus_preferences`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`user`,`table_name`,`title`), ADD UNIQUE KEY `pref_title_constraint` (`user`,`table_name`,`title`);

--
-- Index pour la table `directus_privileges`
--
ALTER TABLE `directus_privileges`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directus_schema_migrations`
--
ALTER TABLE `directus_schema_migrations`
 ADD UNIQUE KEY `idx_directus_schema_migrations_version` (`version`);

--
-- Index pour la table `directus_settings`
--
ALTER TABLE `directus_settings`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `Unique Collection and Name` (`collection`,`name`);

--
-- Index pour la table `directus_storage_adapters`
--
ALTER TABLE `directus_storage_adapters`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directus_tables`
--
ALTER TABLE `directus_tables`
 ADD PRIMARY KEY (`table_name`);

--
-- Index pour la table `directus_ui`
--
ALTER TABLE `directus_ui`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique` (`table_name`,`column_name`,`ui_name`,`name`);

--
-- Index pour la table `directus_users`
--
ALTER TABLE `directus_users`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `famille_catalogue`
--
ALTER TABLE `famille_catalogue`
 ADD PRIMARY KEY (`idfamillecatalogue`);

--
-- Index pour la table `inter_calendar_formation`
--
ALTER TABLE `inter_calendar_formation`
 ADD PRIMARY KEY (`idformation`);

--
-- Index pour la table `ligne_commande_catalogue`
--
ALTER TABLE `ligne_commande_catalogue`
 ADD PRIMARY KEY (`idligne`);

--
-- Index pour la table `sous_famille_catalogue`
--
ALTER TABLE `sous_famille_catalogue`
 ADD PRIMARY KEY (`idsousfamillecatalogue`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `catalogue`
--
ALTER TABLE `catalogue`
MODIFY `idproduit` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
MODIFY `idclient` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `commande_catalogue`
--
ALTER TABLE `commande_catalogue`
MODIFY `idcommande` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande_inter`
--
ALTER TABLE `commande_inter`
MODIFY `idcommande` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
MODIFY `idcontact` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `directus_activity`
--
ALTER TABLE `directus_activity`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `directus_bookmarks`
--
ALTER TABLE `directus_bookmarks`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `directus_columns`
--
ALTER TABLE `directus_columns`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `directus_files`
--
ALTER TABLE `directus_files`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `directus_groups`
--
ALTER TABLE `directus_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `directus_messages`
--
ALTER TABLE `directus_messages`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `directus_messages_recipients`
--
ALTER TABLE `directus_messages_recipients`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `directus_preferences`
--
ALTER TABLE `directus_preferences`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `directus_privileges`
--
ALTER TABLE `directus_privileges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `directus_settings`
--
ALTER TABLE `directus_settings`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `directus_storage_adapters`
--
ALTER TABLE `directus_storage_adapters`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `directus_ui`
--
ALTER TABLE `directus_ui`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `directus_users`
--
ALTER TABLE `directus_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `famille_catalogue`
--
ALTER TABLE `famille_catalogue`
MODIFY `idfamillecatalogue` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `inter_calendar_formation`
--
ALTER TABLE `inter_calendar_formation`
MODIFY `idformation` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `ligne_commande_catalogue`
--
ALTER TABLE `ligne_commande_catalogue`
MODIFY `idligne` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `sous_famille_catalogue`
--
ALTER TABLE `sous_famille_catalogue`
MODIFY `idsousfamillecatalogue` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `iduser` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
