<!-- SCRIPT SQL -->

-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 02 avr. 2024 à 12:59
-- Version du serveur : 10.6.16-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `TheDistrict`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `image`, `active`) VALUES
(4, 'Pizza', 'pizza_cat.jpg', 1),
(5, 'Burger', 'burger_cat.jpg', 1),
(9, 'Wraps', 'wrap_cat.jpg', 1),
(10, 'Pasta', 'pasta_cat.jpg', 1),
(11, 'Sandwich', 'sandwich_cat.jpg', 1),
(12, 'Asian Food', 'asian_food_cat.jpg', 1),
(13, 'Salade', 'salade_cat.jpg', 1),
(14, 'Veggie', 'veggie_cat.jpg', 1),
(19, 'Coming Soon', 'Coming_soon_cat.jpg', 1),
(20, 'Boisson Chaudes', 'boisson_chaudes_cat.jpg', 1),
(21, 'Pâtisserie', 'patisserie_cat.jpg', 1),
(22, 'Boissons Froides', 'boisson_froides_cat.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `total` decimal(6,2) NOT NULL,
  `date_commande` datetime NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `utilisateur_id`, `total`, `date_commande`, `etat`) VALUES
(6, 4, '109.09', '2024-03-28 00:00:00', 0),
(7, 4, '109.09', '2024-03-28 00:00:00', 0),
(8, 4, '109.09', '2024-03-28 00:00:00', 0),
(9, 4, '109.09', '2024-03-28 00:00:00', 0),
(10, 4, '109.09', '2024-03-28 00:00:00', 0),
(11, 4, '49.90', '2024-03-28 00:00:00', 0),
(12, 4, '24.00', '2024-03-29 00:00:00', 0),
(13, 4, '25.00', '2024-03-29 00:00:00', 0),
(14, 4, '10.00', '2024-03-29 00:00:00', 0),
(15, 4, '8.00', '2024-03-29 00:00:00', 0),
(16, 4, '9.98', '2024-04-02 00:00:00', 0),
(17, 4, '8.00', '2024-04-02 00:00:00', 0),
(18, 4, '8.00', '2024-04-02 00:00:00', 0),
(19, 4, '8.00', '2024-04-02 00:00:00', 0),
(20, 4, '15.40', '2024-04-02 00:00:00', 0),
(21, 4, '8.00', '2024-04-02 00:00:00', 0),
(22, 4, '96.00', '2024-04-02 00:00:00', 0),
(23, 4, '8.00', '2024-04-02 00:00:00', 0),
(24, 4, '8.00', '2024-04-02 00:00:00', 0),
(25, 4, '8.00', '2024-04-02 00:00:00', 0),
(26, 4, '8.00', '2024-04-02 00:00:00', 0),
(27, 4, '8.00', '2024-04-02 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `plat_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `detail`
--

INSERT INTO `detail` (`id`, `commande_id`, `plat_id`, `quantite`) VALUES
(6, 6, 5, 2),
(7, 6, 14, 1),
(8, 6, 20, 1),
(9, 6, 21, 10),
(10, 7, 5, 2),
(11, 7, 14, 1),
(12, 7, 20, 1),
(13, 7, 21, 10),
(14, 8, 5, 2),
(15, 8, 14, 1),
(16, 8, 20, 1),
(17, 8, 21, 10),
(18, 9, 5, 2),
(19, 9, 14, 1),
(20, 9, 20, 1),
(21, 9, 21, 10),
(22, 10, 5, 2),
(23, 10, 14, 1),
(24, 10, 20, 1),
(25, 10, 21, 10),
(26, 11, 5, 2),
(27, 11, 14, 1),
(28, 11, 20, 1),
(29, 11, 21, 10),
(30, 12, 4, 3),
(31, 13, 9, 5),
(32, 14, 12, 1),
(33, 15, 4, 1),
(34, 16, 21, 2),
(35, 17, 4, 1),
(36, 18, 4, 1),
(37, 19, 5, 1),
(38, 19, 4, 1),
(39, 20, 4, 2),
(40, 20, 5, 1),
(41, 21, 4, 1),
(42, 22, 4, 12),
(43, 23, 4, 1),
(44, 24, 4, 1),
(45, 25, 4, 1),
(46, 26, 4, 1),
(47, 27, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `categorie_id`, `libelle`, `prix`, `image`, `description`, `active`) VALUES
(4, 5, 'District Burger', '8.00', 'hamburger.jpg', 'Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits. .', 1),
(5, 4, 'Pizza Bianca', '15.40', 'pizza.salmon.jpg', 'Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.', 1),
(9, 9, 'Vegan Wrap', '5.00', 'Food.Name.3461.jpg', 'Un bon mélange de crudité mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.', 1),
(10, 5, 'Cheeseburger', '8.00', 'cheesburger.jpg', 'Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.', 1),
(12, 10, 'Spaghetti aux légumes', '10.00', 'spaghetti-legumes.jpg', 'Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide', 1),
(13, 13, 'Salade César', '7.00', 'salad1.jpg', 'Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l\'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.', 1),
(14, 4, 'Pizza Margherita', '15.40', 'pizza-margherita.jpg', 'Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...', 1),
(15, 14, 'Courgettes farcies', '8.00', 'courgettes_farcies.png', 'Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!', 1),
(16, 10, 'Lasagnes', '12.00', 'lasagnes_viande.jpg', 'Découvrez notre recette des lasagnes, l\'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratinée à l\'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.', 1),
(17, 10, 'Tagliatelles au saumon', '12.00', 'tagliatelles_saumon.png', 'Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui qui vous assure un véritable régal!  ', 1),
(19, 5, 'Burger Gourmet', '14.99', 'Food.Name.6340.jpg', 'Un délice grillé de 200g de steak juteux, enrobé de feuilles de salade fraîche, de tranches de cornichons croquants et de notre sauce BBQ maison. Chaque bouchée est une explosion de saveurs équilibrées, vous invitant à savourer l\'harmonie parfaite entre la tendreté de la viande, la fraîcheur des légumes et le mariage unique de notre sauce spéciale.', 1),
(20, 5, 'American Burger', '12.99', 'pexels.cottonbro.studio.4676413.jpg', 'Succombez au charme de notre burger américain au poulet : des filets de poulet émincés dorés à la perfection, nappés de fromage fondu, le tout couronné d\'une généreuse portion de sauce BBQ maison. Chaque bouchée vous transporte au cœur de l\'Amérique avec ses saveurs authentiques et réconfortantes.', 1),
(21, 11, 'Croc-fondant', '4.99', 'Food.Name.3631.jpg', 'Un classique réconfortant : pain grillé, jambon moelleux, et cheddar fondant, une symphonie de textures et de saveurs en une seule bouchée.', 1),
(22, 4, 'Pizza Crémeuse de la Forêt', '10.00', 'Food.Name.8298.jpg', 'Découvrez notre création unique, la Pizza Crémeuse de la Forêt. Sur une base de crème légère, vous trouverez une harmonie parfaite entre la fraîcheur de la salade croquante, la richesse de la mozzarella fondante et la délicatesse des champignons savoureux. Une symphonie de saveurs forestières qui éveillera vos papilles à chaque bouchée.', 1),
(23, 12, 'Sashimi Saumon', '15.00', 'pexels.christel.jensen.628776.jpg', 'Tranche de saumon cru, délicatement tranchée, accompagnée de wasabi et de gingembre mariné.', 1),
(24, 12, 'Rouleau de Printemps frit', '10.00', 'pexels.bich.tran.840216.jpg', 'Légumes frais et crevettes enveloppés dans une feuille de riz, frits jusqu\'à croustillant.', 1),
(25, 12, 'Riz frits au Wok', '12.00', 'pexels.jay.abrantes.343871.jpg', 'Un délice de riz sauté au wok, imprégné de saveurs exotiques, garni de légumes croquants, d\'œufs brouillés, et assaisonné de sauces soja et d\'épices asiatiques pour une explosion de saveurs en bouche.', 1),
(26, 12, 'Sushi', '18.00', 'pexels.oleksandr.p.3147493.jpg', 'Sélection de sushis traditionnels, garnis de poisson frais et de riz vinaigré, accompagnés de sauce soja et de wasabi.', 1),
(27, 20, 'Café Noir', '2.00', 'cafe.jpg', 'Un breuvage sombre et réconfortant, offrant une explosion de saveurs intenses et un arôme enivrant, idéal pour éveiller les sens à chaque gorgée.', 1),
(28, 21, 'Cookie', '2.50', 'cookies.jpg', 'Une douceur croustillante à l\'extérieur, moelleuse à l\'intérieur, infusée de pépites de chocolat fondantes, offrant une symphonie de textures et de saveurs réconfortantes.', 1),
(29, 22, 'Ice Tea', '1.50', 'ice-tea.jpg', 'Rafraîchissant et désaltérant, cet élixir glacé allie la fraîcheur du thé infusé aux notes subtiles de citron, offrant une expérience rafraîchissante inégalée.', 1),
(30, 21, 'Muffin Chocolat', '2.50', 'muffin.jpg', 'Un délice moelleux, riche en chocolat, avec des pépites fondantes à chaque bouchée, mariant harmonieusement la douceur et l\'intensité pour une expérience gourmande inoubliable.', 1),
(31, 22, 'Coca-Cola', '1.50', 'coca.jpg', 'Une boisson pétillante et rafraîchissante, symbole de convivialité, offrant une explosion de saveurs sucrées et acidulées qui éveillent les papilles à chaque gorgée.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` varchar(20) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `telephone`, `adresse`, `cp`, `ville`) VALUES
(1, 'hedley@gmail.com', '[\"ROLE_CLIENT\"]', 'mdp', 'Hedley', 'Claudia', '0651114400', '30 rue de Poulainville', '80000', 'Amiens'),
(2, 'venno@gmail.com', '[\"ROLE_CLIENT\"]', 'mdp', 'Vargas', 'Vernon', '0614744440', '330 Avenue du Général Leclercq', '80000', 'Amiens'),
(4, 'erwabtot@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$je8/aIRLxDTK/nT0XpLZ2u7fpiOtR.Ug02zRrOj6DYPKkpJCeM2xO', 'Totet', 'Erwan', '0635194831', '3 Bis rue de Nesle Appt 1', '80190', 'Mesnil-Saint-Nicaise');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67DFB88E14F` (`utilisateur_id`);

--
-- Index pour la table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2E067F9382EA2E54` (`commande_id`),
  ADD KEY `IDX_2E067F93D73DB560` (`plat_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2038A207BCF5E72D` (`categorie_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `FK_2E067F9382EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `FK_2E067F93D73DB560` FOREIGN KEY (`plat_id`) REFERENCES `plat` (`id`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `FK_2038A207BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



<!-- .env.local -->

# In all environments, the following files are loaded if they exist,
# the latter taking precedence over the former:
#
#  * .env                contains default values for the environment variables needed by the app
#  * .env.local          uncommitted file with local overrides
#  * .env.$APP_ENV       committed environment-specific defaults
#  * .env.$APP_ENV.local uncommitted environment-specific overrides
#
# Real environment variables win over .env files.
#
# DO NOT DEFINE PRODUCTION SECRETS IN THIS FILE NOR IN ANY OTHER COMMITTED FILES.
# https://symfony.com/doc/current/configuration/secrets.html
#
# Run "composer dump-env prod" to compile .env files for production use (requires symfony/flex >=1.2).
# https://symfony.com/doc/current/best_practices.html#use-environment-variables-for-infrastructure-configuration

###> symfony/framework-bundle ###
APP_ENV=dev
APP_SECRET=3a4ab37a3eb4223745e8c2ea0a235efd
###< symfony/framework-bundle ###

###> doctrine/doctrine-bundle ###
# Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
# IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
#
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"
DATABASE_URL="mysql://admin:Afpa1234@127.0.0.1:3306/TheDistrict?serverVersion=10.6.16-MariaDB&charset=utf8mb4"
# DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
###< doctrine/doctrine-bundle ###

###> symfony/messenger ###
# Choose one of the transports below
# MESSENGER_TRANSPORT_DSN=amqp://guest:guest@localhost:5672/%2f/messages
# MESSENGER_TRANSPORT_DSN=redis://localhost:6379/messages
MESSENGER_TRANSPORT_DSN=doctrine://default?auto_setup=0
###< symfony/messenger ###

###> symfony/mailer ###
MAILER_DSN=smtp://localhost:1025
###< symfony/mailer ###
