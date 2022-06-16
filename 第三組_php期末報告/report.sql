-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022 年 06 月 16 日 03:58
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `report`
--

-- --------------------------------------------------------

--
-- 資料表結構 `orderform`
--

CREATE TABLE `orderform` (
  `oNo` int(11) NOT NULL,
  `oName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oEmail` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oTel` int(15) NOT NULL,
  `oRemark` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oAddress` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oOrder` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orderform`
--

INSERT INTO `orderform` (`oNo`, `oName`, `oEmail`, `oTel`, `oRemark`, `oAddress`, `oOrder`) VALUES
(1, '123', 'EMMA@mail', 0, '', '         888高雄市888路3', '          8號商品:5件13號商品:3件         '),
(3, 'a10833', 'b@gamil.com', 1234567890, '', '   879+台北市+fjidsf路', '   6號商品:3件 1號商品:100件    '),
(4, 'a10833', 'b@gamil.com', 1234567890, 'dfqwedf', '  866台北市a789  ', '  8號商品:5件 13號商品:3件  '),
(5, 'mmm', 'ssss@gmail.com', 3349100, '', '   877高雄市水源路100號', '   13號商品:25件   '),
(6, 'mmm', 'ssss@gmail.com', 1234567890, '', '  866台北市fjidsf路 ', '  6號商品:2件 5號商品:1件  '),
(11, 'test1', 'EMMA@mail', 123, '測試測試測試\r\n', '  111台北市101大樓789987 ', '  3號商品:3件 8號商品:3件  '),
(12, 'test1', '444@mail', 123123, '愛大千forever永不變心', '111台北市 766台北市fjidsf路', '1號商品:3件\n2號商品:6件\n3號商品:1件\n'),
(18, '123', 'EMMA@mail.ooo', 123, '', '   111高雄市+愛情摩天輪 ', '   1號商品:3件   '),
(19, '789', 'C@gmail.com', 1234567890, '', '806台北市sdf路sdjflaijsd', '6號商品:1件\n'),
(20, 'asdf', 'sdf@gmail.com', 1234567890, 'sdfgewrg', '806高雄市hfas路jhlskdjf號', '1號商品:1件\n'),
(21, 'test1', 'test@mail', 12364654, '大千NO1', ' 806高雄市愛情摩天輪 ', ' 30號商品:4件 '),
(22, '456', 'd@gmail.com', 1234567890, '', '806台北市XX路OO號', '29號商品:1件\n20號商品:2件\n'),
(23, '456', 'd@gmail.com', 912345678, '', '806台北市XX路OO號', '20號商品:1件\n'),
(24, '456', 'd@gmail.com', 1234567890, '', '806台北市XX路OO號', '1號商品:3件\n'),
(25, '456', 'd@gmail.com', 1234567890, '', '806台北市XX路OO號', '1號商品:3件\n');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `pNo` int(11) NOT NULL,
  `pName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pSize` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pStyle` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pPrice` int(11) NOT NULL,
  `pPath` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`pNo`, `pName`, `pSize`, `pStyle`, `pPrice`, `pPath`) VALUES
(1, '黃大謙 UCCU大學tee', 'S', '紅', 950, 'tee.png'),
(2, '黃大謙 UCCU大學tee', 'M', '紅', 950, 'tee.png'),
(3, '黃大謙 UCCU大學tee', 'L', '紅', 950, 'tee.png'),
(5, '黃大謙 UCCU大學tee', 'XL', '紅', 950, 'tee.png'),
(6, '做自己很好 勵志A5筆記本', 'A4', '白', 150, 'notebook.png'),
(7, '做自己很好 勵志A5筆記本', 'A4', '紅', 150, 'notebook.png'),
(9, '做自己很好 勵志A5筆記本', 'A5', '紅', 150, 'notebook.png'),
(20, '做自己很好 勵志A5筆記本', 'A5', '白', 150, 'notebook.png'),
(25, '黃大謙 UCCU大學tee', 'L', '黑', 950, 'tee.png'),
(26, '做自己很好 勵志A5筆記本', 'A5', '黑', 150, 'notebook.png'),
(29, '黃大謙 UCCU大學tee', 'M', '黑', 950, 'tee.png'),
(35, '黃大謙 UCCU大學tee', 'XXS', '黑', 950, 'tee.png');

-- --------------------------------------------------------

--
-- 資料表結構 `suggest`
--

CREATE TABLE `suggest` (
  `sNo` int(11) NOT NULL,
  `sName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sEmail` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Suggest` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `suggest`
--

INSERT INTO `suggest` (`sNo`, `sName`, `sEmail`, `Suggest`, `state`) VALUES
(1, '0', '0', '0', '已閱'),
(3, 'yuhua', 'a1083357@gmail.com', '哈哈哈哈哈哈哈', '已閱'),
(5, '王宣筑', 'HIHIH8@gmail.com', '摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳歐歐摳摳歐摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳摳歐歐摳摳歐摳\r\n\r\n', '已閱'),
(6, '王宣筑', 'HIHIH8@gmail.com', '1', '未讀'),
(8, '123', 'HIHIH8@gmail.com', '好棒棒喔', '已閱'),
(9, '王宣筑', 'HIHIH8@gmail.com', 'HEYY~~~\r\n\r\n', '已閱'),
(10, '魔人揪咪', 'JOJO@gmail.com', 'JOJOJO', '未讀'),
(11, 'dsjfhlqw', 'C@gmail.com', 'dfqwefasdf', '未讀'),
(12, 'test2', 'JOJO@gmail.com', 'GOOOOOOOOOD\r\n', '已閱'),
(13, 'www', 'a10833@gmail.com', '哈哈哈哈哈', ''),
(14, 'XDD', 's@gmail.com', '哈ㄏ哈哈', ''),
(15, '哈哈XD', 'd@gmail.com', 'XDDDDD', ''),
(16, '嘿嘿嘿', 'a10833@gmail.com', 'XDDDDDD', '');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `uNo` int(11) NOT NULL,
  `uEmail` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uName` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uPwd` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uRole` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`uNo`, `uEmail`, `uName`, `uPwd`, `uRole`) VALUES
(2, 'A@mail', 'adminw', 'www', 'admin'),
(17, 'admin@mail.com', 'admin', '123', 'admin'),
(20, 'c@gmail.com', '789', '789', 'user'),
(25, 'd@gmail.com', '456', '456', 'user');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orderform`
--
ALTER TABLE `orderform`
  ADD PRIMARY KEY (`oNo`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pNo`);

--
-- 資料表索引 `suggest`
--
ALTER TABLE `suggest`
  ADD PRIMARY KEY (`sNo`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uNo`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderform`
--
ALTER TABLE `orderform`
  MODIFY `oNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `pNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `suggest`
--
ALTER TABLE `suggest`
  MODIFY `sNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `uNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
