-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-08-14 13:47:43
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `students`
--

-- --------------------------------------------------------

--
-- 資料表結構 `pinfo`
--

CREATE TABLE `pinfo` (
  `name` text NOT NULL,
  `race` text NOT NULL,
  `stid` int(11) NOT NULL,
  `class` text NOT NULL,
  `clsno` int(11) NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `debug` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `pinfo`
--

INSERT INTO `pinfo` (`name`, `race`, `stid`, `class`, `clsno`, `weight`, `height`, `debug`) VALUES
('皇甫翔', '人類', 191120, '5A', 19, 67.2, 1.76, 1),
('胡月亭', '人類', 191202, '5A', 3, 55, 1.62, 2),
('<ruby>不死川<rt>しなずがわ</rt></ruby><ruby>不死奈<rt>ふしな</rt></ruby>', '人類', 221310, '2C', 10, 49.2, 1.47, 3),
('林宇軒', '人類', 191218, '5C', 17, 66.5, 1.75, 4),
('陳大明', '人類', 191217, '5C', 16, 61.8, 1.68, 5),
('蔣大同', '人類', 191126, '5A', 26, 69.1, 1.72, 6),
('<ruby>蕾米莉亞<rt>Remilia</rt></ruby>·<ruby>斯卡雷特<rt>Scarlet</rt></ruby>', '紅魔吸血鬼', 231101, '1A', 1, 26.1, 1.31, 7),
('<ruby>芙蘭朵露<rt>Flandre</rt></ruby>·<ruby>斯卡雷特<rt>Scarlet</rt></ruby>', '紅魔吸血鬼', 231102, '1A', 2, 24.5, 1.26, 8),
('<ruby>安德烈雅<rt>Andreea</rt></ruby>·<ruby>勒克勒米瓦拉<rt>Lăcrămioara</rt></ruby>·<ruby>約內斯庫<rt>Ionescu</rt></ruby>', '瓦拉幾亞吸血鬼', 191204, '5A', 5, 55.2, 1.66, 9),
('張軍', '人類', 191423, '5D', 23, 60.3, 1.66, 10),
('雷葉明', '人類', 201116, '4A', 16, 62.5, 1.71, 11),
('<ruby>凜<rt>Rin</rt></ruby>·<ruby>西曼斯卡<rt>Szymańska</rt></ruby>', '人類', 191203, '5B', 10, 55.9, 1.65, 15),
('<ruby>大和<rt>やまと</rt></ruby><ruby>英子<rt>えいこ</rt></ruby>', '人類', 191104, '5A', 4, 56.4, 1.57, 16);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `pinfo`
--
ALTER TABLE `pinfo`
  ADD PRIMARY KEY (`debug`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pinfo`
--
ALTER TABLE `pinfo`
  MODIFY `debug` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
