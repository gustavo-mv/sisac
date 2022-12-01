-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 03:45 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisac`
--

-- --------------------------------------------------------

--
-- Table structure for table `alunos`
--

CREATE TABLE `alunos` (
  `idalunos` int NOT NULL,
  `gra` int NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `alunos`
--

INSERT INTO `alunos` (`idalunos`, `gra`, `nome`) VALUES
(1, 20112501, 'Gustavo Vieira'),
(3, 20112410, 'Francisco Deleon'),
(4, 20112347, 'Isaac Taylor'),
(5, 20112348, 'Lincoln Carvalho'),
(6, 20112487, 'Alan Siqueira'),
(7, 20112536, 'Francisco Genilson'),
(8, 204050, 'Gabriela Franco'),
(17, 2040503, 'Alanzin Sinucaz');

-- --------------------------------------------------------

--
-- Table structure for table `aulas`
--

CREATE TABLE `aulas` (
  `idAulas` int NOT NULL,
  `data` date DEFAULT NULL,
  `carga` int DEFAULT NULL,
  `alunosfaltantes` json DEFAULT NULL,
  `materia_idmateria` int NOT NULL,
  `materia_professores_idprofessor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `idmateria` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cargaHoraria` int NOT NULL,
  `periodo` float DEFAULT NULL,
  `professores_idprofessor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `presencas`
--

CREATE TABLE `presencas` (
  `idpresencas` int NOT NULL,
  `faltas` int NOT NULL DEFAULT '0',
  `alunos_idalunos` int NOT NULL,
  `materia_idmateria` int NOT NULL,
  `materia_professores_idprofessor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `professores`
--

CREATE TABLE `professores` (
  `idprofessor` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `professores`
--

INSERT INTO `professores` (`idprofessor`, `nome`, `usuario`, `senha`) VALUES
(1, 'Helder Gomes', 'antoniohelder', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`idalunos`),
  ADD UNIQUE KEY `gra_UNIQUE` (`gra`);

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`idAulas`,`materia_idmateria`,`materia_professores_idprofessor`),
  ADD KEY `fk_Aulas_materia1_idx` (`materia_idmateria`,`materia_professores_idprofessor`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idmateria`,`professores_idprofessor`),
  ADD KEY `fk_materia_professores_idx` (`professores_idprofessor`);

--
-- Indexes for table `presencas`
--
ALTER TABLE `presencas`
  ADD PRIMARY KEY (`idpresencas`,`alunos_idalunos`,`materia_idmateria`,`materia_professores_idprofessor`),
  ADD KEY `fk_presencas_alunos1_idx` (`alunos_idalunos`),
  ADD KEY `fk_presencas_materia1_idx` (`materia_idmateria`,`materia_professores_idprofessor`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`idprofessor`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `idalunos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `aulas`
--
ALTER TABLE `aulas`
  MODIFY `idAulas` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `idmateria` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presencas`
--
ALTER TABLE `presencas`
  MODIFY `idpresencas` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `idprofessor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_Aulas_materia1` FOREIGN KEY (`materia_idmateria`,`materia_professores_idprofessor`) REFERENCES `materia` (`idmateria`, `professores_idprofessor`);

--
-- Constraints for table `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_materia_professores` FOREIGN KEY (`professores_idprofessor`) REFERENCES `professores` (`idprofessor`);

--
-- Constraints for table `presencas`
--
ALTER TABLE `presencas`
  ADD CONSTRAINT `fk_presencas_alunos1` FOREIGN KEY (`alunos_idalunos`) REFERENCES `alunos` (`idalunos`),
  ADD CONSTRAINT `fk_presencas_materia1` FOREIGN KEY (`materia_idmateria`,`materia_professores_idprofessor`) REFERENCES `materia` (`idmateria`, `professores_idprofessor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
