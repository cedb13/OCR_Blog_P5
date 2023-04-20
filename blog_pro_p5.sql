-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 20 avr. 2023 à 15:22
-- Version du serveur : 8.0.32-0buntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_pro_p5`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `idComment` int NOT NULL,
  `lastName` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstName` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contentComment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `datePublication` date NOT NULL,
  `post_idPost` int NOT NULL,
  `validate` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`idComment`, `lastName`, `firstName`, `email`, `title`, `contentComment`, `datePublication`, `post_idPost`, `validate`) VALUES
(1, 'Doe', 'Jane', '	 espace@google.com', 'trop bien', 'Ouahaou Blablabla bla bla', '2022-10-05', 3, 1),
(2, 'Francoise', 'Claudia', 'chiffer@yahoo.fr', 'Sur Mars?', 'Carrément un petit voyage sur Mars bientot pour les developpers Blablabla bla bla', '2022-10-05', 2, 1),
(3, 'Leponge', 'Bob', 'lb@lb.lb', 'Le numérique voyage', 'Très instructif, merci.', '2023-03-16', 2, 1),
(10, 'Jeff', 'Bob', 'jj@jj.jj', 'Space Dev', 'Un voyage pas comme les autres', '2023-03-22', 2, 0),
(11, 'Gaston', 'Tarzan', 'lb@lb.lb', 'Détente Music', 'Travailler avec une music calme permet en effet de ce concentrer.', '2023-03-22', 3, 0),
(14, 'M', 'mi5', 'mm@mm.m', 'My code name is ...', 'Ne faut-il pas avoir codé pour faire du no-code...', '2023-03-28', 7, 1),
(16, 'Bob', 'Marley', 'emc2@egal.com', 'Test de code', 'code de test', '2023-04-13', 7, 1),
(17, 'Bob', 'Chantal', 'emc2@egal.com', 'Excellent!', 'J&#039;ai la fibre dans mon village.', '2023-04-17', 10, 0),
(18, 'Message', 'Aeraine', 'arn@pasteur.louis', 'HumanoDatacenter', 'Pourrons nous porter dans nos propres cellules des bruns d&#039;Adn qui servirons de carte mémoire à nos propres projets ?', '2023-04-18', 12, 0),
(19, 'Labrocante', 'louis', 'll@anquite.com', 'Recycler son PC pour qu&#039;il aille dans l&#039;espace', 'Vous avez besoin de composant? avez-vous pensé au recyclage de vieux PC ?', '2023-04-18', 2, 1),
(21, 'Terrasson', 'Fabrice', 'fb@gg.com', 'Rien test je sais pas', 'fnlfhgp fzciirgtùr fscghgcgs', '2023-04-20', 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `idPost` int NOT NULL,
  `user_idUser` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `caption` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `contentPost` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateLastUpload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`idPost`, `user_idUser`, `title`, `caption`, `contentPost`, `dateLastUpload`) VALUES
(2, 9, 'Des Developpers sur Mars', 'Un petit voyage sur Mars bientot pour les developpers et leurs PC', 'Le Spaceborne Computer-2 de HPE fait partie d&#039;une mission visant à donner aux astronautes plus de liberté pour effectuer leur propre traitement de données lors de leurs voyages vers la Lune, Mars et au-delà.\r\n\r\nUn peu moins d&#039;un an après son installation sur la station spatiale internationale, le Spaceborne Computer-2 (SB-2) de HPE a déjà mené à bien 24 expériences de recherche, indiquait HPE cette semaine. \r\nGrâce au SB-2, les partenaires de HPE ont utilisé l&#039;intelligence artificielle (IA) pour inspecter les gants des astronautes afin d&#039;y déceler des défauts dangereux, et ont permis la réalisation de gravures en 3D dans l&#039;espace. \r\nL&#039;IA a aussi analysé des images satellites de la Terre.\r\n	\r\nCes expériences montrent comment des systèmes informatiques performants utilisés dans l&#039;espace peuvent aider les astronautes à analyser des données sans avoir à les renvoyer sur Terre. \r\nLa mise au point de systèmes d&#039;IA suffisamment puissants pour le traitement de données en temps réel et suffisamment robustes pour résister aux conditions de l&#039;espace doivent aider les astronautes à devenir plus autonomes lors de leurs voyages vers la Lune, Mars et au-delà.\r\n	\r\nLe SB-2 propose deux fois plus de vitesse de calcul que son prédécesseur et est équipé de GPU pour traiter efficacement les données à forte intensité d&#039;images, telles que les clichés des calottes polaires sur terre ou les radiographies médicales. Les GPU prennent également en charge des projets spécifiques utilisant l&#039;IA et l&#039;apprentissage automatique.\r\n	\r\nDans le cadre de l&#039;une des expériences SB-2, la NASA et Microsoft ont développé un modèle d&#039;IA pour l&#039;analyse des gants afin de détecter les dommages sur les gants des astronautes. \r\nCes gants sont utilisés lors des sorties dans l&#039;espace, lorsque les astronautes réparent des équipements ou installent de nouveaux instruments sur l&#039;ISS.\r\nLe modèle d&#039;IA a été utilisé pour analyser rapidement des photos et des vidéos enregistrées dans l&#039;espace de gants récemment portés. \r\nSi des dommages étaient détectés, une photo annotée par l&#039;IA était générée dans l&#039;espace et immédiatement envoyée sur Terre, mettant en évidence les zones à examiner par les ingénieurs de la NASA.\r\n	\r\n	\r\nExtrait de :\r\n&quot;A bord de l&#039;ISS, l&#039;informatique dans l&#039;espace&quot;\r\n	', '2023-04-20'),
(3, 6, 'Développer en music', 'la music peut aider à ce concentrer, mais qu&#039;elle type de musique choisir?', 'la music peut aider à ce concentrer, mais qu&#039;elle type de musique choisir?\r\n\r\n- Métal\r\n- Classique\r\n- Hip-Hop', '2023-03-26'),
(7, 7, 'Code Versus No-code', 'faut-il avoir des notions de code, avoir codé pour faire du no-code?', '- Code vs No Code -\r\n\r\nQu’il s’agisse du Code ou  No Code, les deux approches ont leurs avantages et inconvénients. Il n’est pas toujours facile de savoir quelle est la meilleure alternative. Nous le rappelons, tout dépend de vos besoins. Découvrez quelles sont les différences majeures de ces deux approches.\r\n\r\n‍\r\n\r\nNiveau de personnalisation\r\n\r\nLes plateformes No Code permettent de créer des solutions fiables, grâce à une interface intuitive. Elles offrent des fonctionnalités simples d’utilisation, mais parfois limitées en personnalisation. En effet, la majorité des composants disponibles sur les plateformes No Code son préconçus. Les options de personnalisation sont donc limitées, si vous souhaitez créer une solution sur-mesure. Mais c’est là que le low-code peut entrer en jeu ! Il vous permettra d’étendre les capacités de la plateforme, comme nous le faisons chez Octolio.\r\n\r\nDans le cas où le développement est effectué manuellement, avec des lignes de code, votre solution peut évidemment être 100% sur-mesure. Les développeurs peuvent construire des produits personnalisés, en fonction de besoins bien spécifiques.\r\n\r\n‍\r\n\r\nCourbe d’apprentissage\r\n\r\nL’interface des plateformes No Code est conçue de manière à ce qu’elles restent accessibles à tous ses utilisateurs : startup, TPE, PME, grand groupe, etc. Même si la prise en main peut parfois être complexe pour la création, la courbe d’apprentissage est relativement rapide, grâce à des interfaces user-friendly. Il y a aussi de nombreux tutoriels, ressources ou communautés, permettant d’acquérir les connaissances nécessaires pour utiliser les outils No Code.\r\n\r\nSoyons honnêtes, si vous souhaitez monter en compétence rapidement sur ces outils pour créer une solution de A à Z, il vous faudra investir un peu de temps. C’est pour cela que les agences No Code telles qu’Octolio sont là pour vos accompagner !\r\n\r\nEn optant pour une solution 100% sur-mesure, la courbe d’apprentissage sera plus longue et plus complexe, mais vous serez accompagné du début à la fin. L’équipe de développeurs se doit de vous accompagner durant tout le processus de développement de la solution, pour vous aider et répondre à toutes vos questions.L’ampleur du projet nécessitera un budget beaucoup plus important et davantage de temps.\r\n\r\nQu’il s’agisse de Code ou No Code, les équipes font en sorte de vous fournir une solution clé en main. L’échange et la formation sont essentiels pour maintenir votre solution.\r\n\r\n‍\r\n\r\nInvestissement\r\n\r\nLes outils de développement No Code sont faciles à utiliser. Ils vous permettent de réussir à créer des applications avec un budget limité. Mais ces plateformes peuvent s&#039;avérer coûteuses au cas où votre produit nécessiterait beaucoup d&#039;intégrations, de fonctionnalités et de mises à jour à l&#039;avenir. C’est pour cela qu’il est essentiel de bien définir ses objectifs dès le départ.\r\n\r\nUne solution codée prendra 3 fois plus de temps, et vous coûtera 2 fois plus cher.\r\n\r\nExtrait de Octolio : \r\nhttps://www.octolio.io/articles-de-blog/code-vs-no-code-les-perspectives-de-2022', '2023-03-27'),
(10, 6, 'Sommes nous tous égaux face aux réseaux ?', 'Des disparités mais pas toujours là ou on s&#039;y attend le plus.', 'Certes la ville et les territoires urbains ont un meilleur débit et ont la fibre pour la plus part, là ou les milieux ruraux ont encore l&#039;ADSL et quel ADSL étant donné que les câbles téléphoniques ne sont pas mis à neuf …\r\n\r\nCependant il arrive que dans son malheur la ruralité offre de l&#039;espace aux antennes 5G, ce qui permet en cas de soucis de ligne, des partages de connexions bien plus efficaces qu&#039;un ADSL désuet.\r\n\r\nLa ruralité qui bénéficie de la fibre ou des antennes 5G, peut même s&#039;assurer une certaine stabilité de connexion, là ou dans nos grandes villes les plaintes affluent concernant la fibre au vue de la façon que cette dernière est connecté à nos immeubles, là ou la coutume est souvent de déshabiller Paul pour habiller Pierre…', '2023-04-18'),
(12, 9, 'Datacenter Versus ADN', 'L&#039;ADN serait-il la solution au problème de stockage de l&#039;information?', 'Piloté par le CNRS et doté d’un budget de 20 millions d’euros sur 7 ans, le programme et équipement prioritaire de recherche (PEPR) exploratoire MoleculArXiv vise à inventer de nouveaux dispositifs de stockage de données sur ADN et polymères artificiels.', '2023-04-18');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int NOT NULL,
  `lastName` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstName` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `lastName`, `firstName`, `email`, `password`) VALUES
(1, 'Leponge', 'Bob', 'bob@gmail.com', '$2y$10$WpcFezEMRGWnUwbE73R7aeBRniJ/TDXWYQ4lZ92U4qYrSabqtjZ3a'),
(2, 'Big', 'Greu', 'bigre@gmail.com', '$2y$10$7GLjHsGqbPyxmxVXYT9IiO41UggroRPJLrbH1nU3VPl839rwCszIu'),
(3, 'Lenon', 'John', 'john10000@gmail.com', '$2y$10$bBs/u7XRQvDdYVjl/A82bu4i9Q3ZxM8hUpEtyFQsPwjuBvrpwCn4e'),
(4, 'Batman', 'Souris', 'chauve@souris.bat', '$2y$10$khTJIT6IcsBqtVJ.Kc4TA.bCP6lLFAXEw9BVfWQcll45pgsjjOoPW'),
(5, 'Gaston', 'Francis', 'test@test.test', '$2y$10$Q9DSTf47u2bKQEOzI0gOrO9vHba140M4lJARMO8wxVlIbjGn1eTzO'),
(6, 'Lagafe', 'Gaston', 'gi@gi.gi', '$2y$10$HJK17f4iRhPrVeDRYn7.Nua./PSAxxO17TwLfSRcHbrQKx4FZ5IXq'),
(7, 'Bond', 'James', 'JBdu07@gmail.com', '$2y$10$rm/DCizCz2xLlRuFjyA52exiJcQuf4LRYjmrG0Cjxg8sSWNe3fvvm'),
(8, 'Bonche', 'Cedric', 'cedric.bonche@gmail.com', '$2y$10$xh3h3.5XqYw29CVQiRL3CutYXhvLmpMmU6QFl30SJkgRodzNNeTIa'),
(9, 'Einstein', 'Albert', 'emc2@egal.com', '$2y$10$SqHzNGIzBuZgbJMmhTXRyOCWqUBYw5AUSXXOfwI1u1P0lFNeTpGFO'),
(10, 'Bob', 'Marley', 'bm@gmail.yahoo', '$2y$10$RU0tCSF5uWC5ZhfIV9KIVeIERWbppl391/ReVUukqJTKb/3qFx0pW'),
(55, 'Carre', 'Léponge', 'emc@deux.com', '$2y$10$TT9XwCtk3dznwe9t475hxuFAbrY6EoSh46NBi17ZB9Wyw7OJhgblC'),
(56, 'Bob', 'Gisel', 'fgh@gh.com', '$2y$10$Ok9Y0EoJRrVAnOGQxfYiN.ttyE1sxju5PqbqzkKsKdBVKH71T3h4W');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
