-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 22 avr. 2018 à 17:04
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `description`, `created_at`, `active`) VALUES
(1, 'Les divertissements sous Louis XIV', 'Comme son père et son grand-père, Louis XIV est passionné par la chasse et la pratique avec ferveur dans le domaine de Versailles qu’il a spécialement agrandi pour sa passion. Cette passion est si grande que parfois – rarement certes – Louis XIV se laisse aller en supprimant purement et simplement le conseil parce que la journée est si belle et qu’il veut en profiter pleinement pour la chasse. Le souverain s’y rend au moins trois fois par semaine. Avec le billard plus tard, cette activité forme la distraction favorite du Grand Roi. ', '2018-02-01 00:00:00', 1),
(2, 'Kevin Love et les Cavaliers : « En couple, mais c’est compliqué »', 'Le 11 juillet 2014, une déflagration d’une rare intensité secoue la NBA. LeBron James annonce son retour à Cleveland et toutes les cartes de la ligue sont rebattues. Alors qu’il digère la nouvelle, comme les autres joueurs de la ligue, Kevin Love reçoit un coup de fil. À l’autre bout du fil, c’est le King en personne qui appelle celui qui joue toujours aux Wolves.\r\n\r\nLe quadruple MVP et son entourage agissent en parallèle des dirigeants de l’Ohio. LeBron James sait que les Cavaliers discutent depuis plus d’un an avec Minnesota pour essayer de récupérer l’intérieur. Les Wolves ne sont pas contre lâcher leur ailier fort, qui a mal pris la gestion de son cas et l’incapacité de son équipe à aller en playoffs les saisons précédentes, mais Flip Saunders veut mettre la main sur un jeune joueur prometteur dans l’échange de sa star.\r\n\r\nPour l’instant, la piste la plus chaude mène d’ailleurs à Golden State, autour d’un échange entre Kevin Love et Klay Thompson. Fraîchement engagé comme coach, Steve Kerr n’est pas franchement pour mais c’est surtout Jerry West, conseiller spécial de la franchise, qui menace de démissionner de son poste si le club transfère l’arrière shooteur vers les Grands Lacs…\r\n\r\nLeBron James et Kevin Love se connaissent puisqu’ils ont joué ensemble lors des Jeux olympiques de 2012 mais les deux hommes ne sont pas très proches. Le King passait son temps à Londres avec Carmelo Anthony et Chris Paul, quand l’intérieur était surtout avec Russell Westbrook. Au téléphone, les arguments sont donc avant tout sportifs, le revenant expliquant que le profil d’intérieur shooteur colle bien à son jeu et que les deux hommes seront sans doute très complémentaires. À la fin de la conversation, Kevin Love est convaincu et répond « qu’il en est » à LeBron James. La première étape est franchie.', '2018-02-01 00:00:00', 1),
(20, 'JO 2018 : Le tour du monde en 80 stats (ou presque)', 'Vendredi, au coeur du stade olympique de Pyeongchang, les 92 nations qualifiées pour les Jeux Olympiques bénéficieront de quelques secondes de gloire à l\'occasion du défilé des délégations. On y retrouvera des habitués (Norvège, France, Canada, Etats-Unis ...) et aussi une demi-douzaine de pays qui disputeront les JO d\'hiver pour la première fois de leur histoire (Équateur, Érythrée, Kosovo, Malaisie, Nigeria et Singapour). Il y a aussi un bon nombre d\'absents. Sans parler de la Russie (dont le comité olympique a été suspendu), c\'est au total 123 pays reconnus par le CIO qui ne seront pas de la partie en Corée du Sud, et là encore, on retrouve un bon nombre d\'habitués.', '2018-02-08 14:24:59', 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `couleur` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `libelle`, `couleur`) VALUES
(1, 'Divertissement', '#FF5733'),
(2, 'Sport', '#3355FF');

-- --------------------------------------------------------

--
-- Structure de la table `category_post`
--

CREATE TABLE `category_post` (
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category_post`
--

INSERT INTO `category_post` (`category_id`, `post_id`) VALUES
(1, 1),
(2, 2),
(2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `isAdmin`) VALUES
(1, 'oz', 'oz', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_BA5AE01D2B36786B` (`title`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`category_id`,`post_id`),
  ADD KEY `IDX_D11116CA12469DE2` (`category_id`),
  ADD KEY `IDX_D11116CA4B89032C` (`post_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `FK_D11116CA12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D11116CA4B89032C` FOREIGN KEY (`post_id`) REFERENCES `blog_post` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
