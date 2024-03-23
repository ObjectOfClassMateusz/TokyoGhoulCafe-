-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Mar 2024, 16:59
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `_ant_`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `PASSWD` text NOT NULL,
  `EMAIL` text NOT NULL,
  `NICK` text NOT NULL,
  `IMAGE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `account`
--

INSERT INTO `account` (`ID`, `PASSWD`, `EMAIL`, `NICK`, `IMAGE`) VALUES
(2345, 'qwerty123', 'matt90@as.sd', 'matt90', './_images_/65fef9de0581d7.00070201.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dessert`
--

CREATE TABLE `dessert` (
  `ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `STRAWBERRY` tinyint(1) NOT NULL,
  `CHOCOLATE` tinyint(1) NOT NULL,
  `SUGAR` tinyint(1) NOT NULL,
  `GLUTEN` tinyint(1) NOT NULL,
  `VANILIA` tinyint(1) NOT NULL,
  `CARMELL` tinyint(1) NOT NULL,
  `PRICE` decimal(10,0) UNSIGNED NOT NULL,
  `IMAGE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `dessert`
--

INSERT INTO `dessert` (`ID`, `NAME`, `STRAWBERRY`, `CHOCOLATE`, `SUGAR`, `GLUTEN`, `VANILIA`, `CARMELL`, `PRICE`, `IMAGE`) VALUES
(2, 'デザート 1', 1, 1, 1, 1, 0, 0, '8', 'x1.jpg'),
(3, 'Name2', 1, 1, 1, 1, 1, 0, '15', 'x2.jpg'),
(4, 'Name3', 0, 1, 1, 0, 1, 1, '9', 'x4.jpg'),
(5, 'Name4', 1, 0, 1, 1, 0, 0, '20', 'x5.jpg'),
(6, 'Name5', 1, 0, 1, 0, 1, 0, '25', 'x6.jpg'),
(7, 'Name6', 1, 1, 1, 1, 0, 1, '14', 'x7.jpg'),
(8, 'Name7', 0, 0, 1, 0, 0, 0, '4', 'x8.jpg'),
(9, 'Name8', 0, 1, 1, 0, 0, 0, '12', 'x9.jpg'),
(10, 'Name9', 1, 0, 1, 0, 1, 1, '8', 'x12.jpg'),
(11, 'Name11', 1, 0, 0, 0, 0, 0, '18', 'x1010.jpg'),
(12, 'Name10', 0, 1, 1, 0, 0, 1, '5', 'x1111.jpg'),
(13, 'Name232', 1, 0, 0, 0, 1, 1, '16', 'x1313.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2346;

--
-- AUTO_INCREMENT dla tabeli `dessert`
--
ALTER TABLE `dessert`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
