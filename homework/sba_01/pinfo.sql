SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `pinfo`
--

CREATE TABLE `pinfo` (
  `name` varchar(30) NOT NULL,
  `class` varchar(2),
  `clsno` tinyint(3) UNSIGNED ,
  `stid` mediumint(9) UNSIGNED NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinfo`
--

INSERT INTO `pinfo` (`name`, `class`, `clsno`, `stid`, `weight`, `height`) VALUES
('陳大文', '1A', 2, 123456, 58.6, 1.86),
('鍾新霖', '3B', 5, 451236, 63.46, 1.66),
('李小龍', '3C', 11, 562231, 58.6, 1.86),
('何國忠', '2D', 16, 358761, 68.2, 1.88),
('張美蘭', '1B', 7, 396812, 72.6, 1.7),
('黃仲橋', '2C', 23, 652213, 60.5, 1.76);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pinfo`
--
ALTER TABLE `pinfo`
  ADD KEY `stid` (`stid`);
COMMIT;
