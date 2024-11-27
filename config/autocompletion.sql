-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2024 at 03:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autocompletion`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id_animal` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `genr` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id_animal`, `name`, `genr`, `description`, `image_url`) VALUES
(1, 'Loutre de mer', 'Mammifère', 'Une loutre qui vit dans les océans, connue pour sa fourrure dense.', 'Loutre de mer.jpg'),
(2, 'Python royal', 'Reptile', 'Un serpent non venimeux souvent gardé comme animal de compagnie.', 'Python royal.jpg'),
(3, 'Aigle royal', 'Oiseau', 'Un prédateur majestueux qui plane à de grandes hauteurs.', 'Aigle royal.jpg'),
(4, 'Grenouille verte', 'Amphibien', 'Une grenouille qui vit dans les zones humides et les marais.', 'Grenouille verte.jpg'),
(5, 'Loutre d\'Europe', 'Mammifère', 'La loutre d\'Europe est un mammifère semi-aquatique que l\'on trouve dans les rivières et lacs d\'Europe. Elle est connue pour son pelage dense et sa capacité à plonger longtemps sous l\'eau.', 'LoutreE.jpg'),
(6, 'Raton laveur', 'Mammifère', 'Un animal nocturne connu pour son masque noir distinctif et sa capacité à manipuler des objets.', 'ratonjpg.jpg'),
(7, 'Corbeau', 'Oiseau', 'Un oiseau intelligent, souvent associé au mystère et connu pour sa capacité à résoudre des problèmes.', 'Corbeau.jpg'),
(8, 'Loutre de rivière', 'Mammifère', 'Une loutre qui habite les rivières et lacs, joueuse et agile dans l’eau.', 'Loutre de rivière.jpeg'),
(9, 'Loup arctique', 'Mammifère', 'Un loup blanc adapté aux conditions extrêmes de l’Arctique.', 'Loup arctique.jpg'),
(10, 'Loup rouge', 'Mammifère', 'Une espèce rare et menacée, trouvée principalement en Amérique du Nord.', 'Loup rouge.jpg'),
(11, 'Renard roux', 'Mammifère', 'Le plus connu des renards, célèbre pour son pelage roux et sa ruse.', 'Renard roux.jpg'),
(12, 'Renard polaire', 'Mammifère', 'Un renard adapté aux climats froids, avec un pelage blanc en hiver.', 'Renard polaire.jpg'),
(13, 'Baleine bleue', 'Mammifère marin', 'Le plus grand animal vivant sur Terre, connu pour ses dimensions impressionnantes et sa beauté majestueuse.', 'Baleine bleue.jpg'),
(14, 'Hibou', 'Oiseau', 'Un oiseau de proie nocturne, connu pour ses aigrettes et son regard perçant.', 'Hibou.jpg'),
(15, 'Écureuil roux', 'Mammifère', 'Un petit rongeur arboricole, connu pour son pelage roux et sa queue touffue.', 'Écureuil roux.jpg'),
(16, 'Dragon chinois', 'Créature mythique', 'Un symbole de puissance, de force et de bonne fortune dans la culture asiatique.', 'Dragon chinois.jpg'),
(17, 'Panda géant', 'Mammifère', 'Un grand ours noir et blanc, principalement herbivore, qui vit en Chine.', 'Panda géant.jpg'),
(18, 'Tigre du Bengale', 'Mammifère', 'Un des plus grands félins, connu pour son pelage rayé orange et noir.', 'Tigre du Bengale.jpg'),
(19, 'Éléphant d’Afrique', 'Mammifère', 'Le plus grand animal terrestre, célèbre pour ses grandes oreilles et sa trompe puissante.', 'Tigre du Bengale.jpg'),
(20, 'Phénix', 'Créature mythique', 'Un oiseau légendaire associé au feu et à la renaissance, qui renaît de ses cendres.', 'Phénix.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id_animal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id_animal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
