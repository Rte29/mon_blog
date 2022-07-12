-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 12 juil. 2022 à 08:34
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mon_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text NOT NULL,
  `comment_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user-id` (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`comment_id`, `id`, `post_id`, `comment_creation_date`, `comment_update_date`, `comment`, `comment_status`) VALUES
(3, 1, 1, '2022-05-18 06:28:11', '2022-05-18 06:28:11', '\"Le groupe pense, sent, et agit tout autrement que ne feraient ses membres s’ils étaient isolés\"\r\nÉmile Durkheim', 1),
(9, 1, 3, '2022-05-24 16:10:03', '2022-05-24 16:10:03', 'vive le css', 1),
(10, 1, 3, '2022-05-27 08:47:36', '2022-05-27 08:47:36', 'j\'aime le css', 1),
(41, 1, 5, '2022-06-30 08:29:44', '2022-06-30 08:29:44', 'Article très intéressant', 1),
(42, 1, 5, '2022-06-30 08:30:43', '2022-06-30 08:30:43', 'Bien vue', 1),
(43, 1, 5, '2022-06-30 08:30:59', '2022-06-30 08:30:59', 'A creuser', 1),
(44, 1, 5, '2022-06-30 08:31:08', '2022-06-30 08:31:08', 'Très pratique', 1),
(45, 1, 5, '2022-06-30 08:31:20', '2022-06-30 08:31:20', 'oui bof', 1),
(46, 1, 5, '2022-07-01 12:35:31', '2022-07-01 12:35:31', 'Bin je comprends rien à tout ça', 1),
(47, 1, 9, '2022-07-12 08:11:26', '2022-07-12 08:11:26', 'test de commentaire', 1);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `post_creation_date` timestamp NOT NULL,
  `post_update_date` timestamp NOT NULL,
  `chapo` varchar(500) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_picture` varchar(255) DEFAULT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`id`),
  KEY `post_category_id` (`post_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`post_id`, `title`, `id`, `post_creation_date`, `post_update_date`, `chapo`, `post_content`, `post_picture`, `post_category_id`, `post_status`) VALUES
(1, 'PHP', 1, '2022-05-11 08:16:23', '2022-05-11 08:16:23', 'Ca veut dire quoi PHP ?', 'PHP: \r\nHypertext Preprocessor, plus connu sous son sigle PHP (sigle auto-référentiel), est un langage de programmation libre, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP, mais pouvant également fonctionner comme n\'importe quel langage interprété de façon locale. PHP est un langage impératif orienté objet.\r\n\r\nPHP a permis de créer un grand nombre de sites web célèbres, comme Facebook et Wikipédia. Il est considéré comme une des bases de la création de sites web dits dynamiques mais également des applications web.', NULL, 1, 1),
(2, 'HTML', 1, '2022-05-11 08:17:52', '2022-05-11 08:17:52', 'HTML signifie « HyperText Markup Language » qu\'on peut traduire par « langage de balises pour l\'hypertexte ». Il est utilisé afin de créer et de représenter le contenu d\'une page web et sa structure ...', 'HTML:\r\nLe HyperText Markup Language, généralement abrégé HTML ou, dans sa dernière version, HTML5, est le langage de balisage conçu pour représenter les pages web.\r\n\r\nCe langage permet :\r\n\r\nd’écrire de l’hypertexte, d’où son nom,\r\nde structurer sémantiquement la page,\r\nde mettre en forme le contenu,\r\nde créer des formulaires de saisie,\r\nd’inclure des ressources multimédias dont des images, des vidéos, et des programmes informatiques,\r\nde créer des documents interopérables avec des équipements très variés de manière conforme aux exigences de l’accessibilité du web.\r\nIl est souvent utilisé conjointement avec le langage de programmation JavaScript et des feuilles de style en cascade (CSS). HTML est inspiré du Standard Generalized Markup Language (SGML). Il s\'agit d\'un format ouvert.', NULL, 2, 1),
(3, 'CSS', 1, '2022-05-11 08:19:12', '2022-06-01 14:19:53', 'Dis, c\'est quoi le CSS ?', '   CSS: \r\nLes feuilles de style en cascade1, généralement appelées CSS de l\'anglais Cascading Style Sheets, forment un langage informatique qui décrit la présentation des documents HTML et XML. Les standards définissant CSS sont publiés par le World Wide Web Consortium (W3C). Introduit au milieu des années 1990, CSS devient couramment utilisé dans la conception de sites web et bien pris en charge par les navigateurs web dans les années 2000.', NULL, 3, 1),
(4, '--- Les bases du HTML ---', 1, '2022-05-27 14:09:06', '2022-06-03 11:59:39', 'Mais c\'est quoi en fait le HTML ?', '        Qu\'est-ce que HTML, réellement ?    \r\n\r\nHTML n\'est pas un langage de programmation. C\'est un langage de balises qui définit la structure de votre contenu. HTML se compose d\'une série d\'éléments, utilisés pour entourer, ou envelopper, les diverses parties du contenu pour les faire apparaître ou agir d\'une certaine façon. Les balises entourantes peuvent être rendues par un mot ou une image lien hypertexte vers quelque chose d\'autre, un texte en italique, une police plus grande ou plus petite, et ainsi de suite. Par exemple, avec la ligne de contenu suivante :\r\n\r\nMon chat est très grincheux\r\nSi vous souhaitez que cette ligne reste ainsi, nous indiquerons qu\'il s\'agit d\'un paragraphe en l\'entourant des balises paragraphe :\r\n\r\n<p>Mon chat est très grincheux</p>', NULL, 2, 1),
(5, 'Les features queries (@supports) - CSS', 1, '2022-06-30 08:27:55', '2022-06-30 08:27:55', 'Les requêtes de fonctionnalité (ou feature queries) sont créées à l\'aide de la règle @supports et permettent aux développeurs web de tester la prise en charge d\'une fonctionnalité donnée par le navigateur puis de fournir le code CSS qui sera appliqué selon le résultat de ce test. ', 'En programmation classique, il faut des variables et des structures conditionnelles pour commencer à s\'amuser un peu, et CSS l\'a bien compris. C\'est pour cette raison que les features queries (règle @supports { ... }) entrent en jeu. Il ne s\'agit pas à proprement parler de if/else comme dans la programmation habituelle, mais le résultat en est presque identique malgré tout. En effet, @supports permet de détecter si une propriété ou une fonctionnalité existe et fonctionne dans le navigateur en cours d\'utilisation. Ainsi, nous pouvons prévoir des comportements différents selon les cas, voire offrir des variantes d\'intégration selon la compatibilité avec les propriétés. Si nous prenons l\'exemple du display:flex; (flexbox), on pourrait s\'assurer d\'une mise en forme différente en cas d\'incompatibilité, avec un display:inline-block; à la place ou une autre méthode.', NULL, 2, 1),
(9, 'Les dernières nouvelles PHP', 1, '2022-07-05 09:57:35', '2022-07-05 09:58:12', 'PHP 8.1 accueille les énumérations et des capacités de lecture seule\r\n\r\nPubliée récemment, la mise à jour 8.1 du langage PHP intègre des énumérations et des capacités de lecture seule. Il bénéficie également d\'améliorations sur les concurrences et les...\r\n', '\r\nAnnoncée comme une mise à jour majeure du langage de script populaire pour le développement web, PHP 8.1 s’enrichit de nombreuses capacités, depuis les enums ou énumérations et les propriétés en lecture seule readonly, jusqu’à la syntaxe appelable de première classe. Les enums, ou énumérations, permettent aux développeurs de définir un type personnalisé, limité à un nombre discret de valeurs possibles. Cette caractéristique peut s’avérer utile lors de la définition d\'un modèle de domaine en « rendant les états invalides non représentables », comme l’explique la documentation de PHP. Dans le langage PHP, les cas d\'enum sont des objets valides utilisables partout où un objet peut être utilisé, y compris les contrôles de type.\r\n\r\nParmi les autres fonctionnalités et améliorations apportées par PHP 8.1, on peut citer :\r\n\r\n- Les « Fibers » fournissent des primitives permettant d’implémenter une concurrence légère.\r\n\r\n- Avec la syntaxe appelable de première classe, les fermetures pour les appelables peuvent être créées en utilisant la syntaxe myfunc(...), qui est identique à Closure::fromCallable(\'myFunc\').\r\n\r\n- Le modificateur de propriété readonly empêche la modification d\'une propriété après l\'initialisation.\r\n\r\n- Les performances ont été améliorées grâce à un compilateur JIT (Just in Time) pour ARM64, à opache appelé aussi « Inheritance cache », une résolution rapide des noms de classe et des améliorations apportées aux itérateurs du système de fichiers de la bibliothèque standard.\r\n\r\n- Avec les initialisateurs (Initializer), il est désormais possible d’utiliser les objets comme valeurs de paramètres par défaut, variables statiques et constantes globales, en plus de leur utilisation possible dans les arguments d\'attributs. Cela permet effectivement d\'utiliser des attributs imbriqués.\r\n\r\n- Les types d\'intersection peuvent être utilisés quand une valeur doit satisfaire plusieurs contraintes de type simultanément.\r\n\r\n- Les développeurs peuvent déclarer des constantes de classe finales, afin qu\'elles ne puissent pas être remplacées par des classes filles.\r\n\r\n- Il est désormais possible d\'écrire des nombres octaux avec le préfixe explicite 0o.\r\n\r\n- Un type de retour never indique que la fonction ne retourne pas de valeur.\r\n\r\n- Les tableaux peuvent être dépaquetés avec des clés string.\r\n\r\n- De nouvelles classes, fonctions et interfaces ont été introduites, y compris un attribut pour #[ReturnTypeWillChange].\r\n\r\n- Le passage de null aux paramètres internes des fonctions non-variables est déprécié.\r\n\r\nPHP 8.1 arrivé quasiment un an après la sortie de la version PHP 8.0, qui offrait des fonctionnalités comme les types d\'union 2.0 et la compilation JIT. Autre nouveauté à signaler, la formation de la PHP Foundation, une organisation à but non lucratif destinée à assurer la longévité et la prospérité de PHP. La fondation compte notamment parmi ses membres JetBrains et Zend. Les participants feront des dons pour couvrir les salaires des principaux développeurs de PHP.\r\n\r\nLe code source et les binaires Windows de PHP 8.1 sont téléchargeables sur php.net.\r\n', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `post_category`
--

DROP TABLE IF EXISTS `post_category`;
CREATE TABLE IF NOT EXISTS `post_category` (
  `post_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `creation_date` date NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`post_category_id`),
  KEY `post_id` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post_category`
--

INSERT INTO `post_category` (`post_category_id`, `category`, `creation_date`, `update_date`) VALUES
(1, 'PHP', '2022-05-11', '2022-05-11'),
(2, 'HTML', '2022-05-11', '2022-05-11'),
(3, 'CSS', '2022-05-11', '2022-05-11');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(55) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(55) NOT NULL,
  `admin_role` tinyint(1) NOT NULL,
  `user_registration_date` date NOT NULL,
  `user_update_date` date NOT NULL,
  `username` varchar(55) NOT NULL,
  `pwd` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `last_name`, `first_name`, `birthday`, `email`, `admin_role`, `user_registration_date`, `user_update_date`, `username`, `pwd`) VALUES
(1, 'GOUEZ', 'ERWAN', '1969-01-01', 'er.gouez@gmail.com', 1, '2022-05-24', '2022-05-24', 'rte29', 'e1bfd762321e409cee4ac0b6e841963c'),
(35, 'EDDOUH', 'ZAKARIA', '1998-02-15', 'zak@example.fr', 0, '2022-06-20', '2022-06-20', 'zak', '0c87420f6030eadde0fa47ce83c8075c'),
(38, 'DURAND', 'PIERRE', '2022-06-01', 'pi@example.com', 0, '2022-06-27', '2022-06-27', 'tonton', '25d55ad283aa400af464c76d713c07ad'),
(41, 'TESTADMIN', 'TESTADMIN', '1960-01-01', 'exemple@exemple.com', 1, '2022-07-12', '2022-07-12', 'TestAdmin', '9283a03246ef2dacdc21a9b137817ec1'),
(42, 'TESTUTILISATEUR', 'TESTUTILISATEUR', '1960-01-01', 'exemple2@exemple.com', 0, '2022-07-12', '2022-07-12', 'TestUtilisateur', 'cffe24c9ef05b8c85160d917c53a9d1a'),
(43, 'TESTUTILISATEUR', 'TESTUTILISATEUR', '1960-01-01', 'exemple2@exemple.com', 0, '2022-07-12', '2022-07-12', 'TestUtilisateur2', 'cffe24c9ef05b8c85160d917c53a9d1a');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`post_category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
