-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 18 Sie 2024, 13:18
-- Wersja serwera: 10.3.39-MariaDB-0ubuntu0.20.04.2
-- Wersja PHP: 7.4.3-4ubuntu2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `2025_nina_lop`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Jadlospis`
--

CREATE TABLE `Jadlospis` (
  `DzienTygodnia` varchar(255) DEFAULT NULL,
  `Zupa` varchar(255) DEFAULT NULL,
  `DrugieDanie` varchar(255) DEFAULT NULL,
  `Napoj` varchar(255) DEFAULT NULL,
  `Deser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `Jadlospis`
--

INSERT INTO `Jadlospis` (`DzienTygodnia`, `Zupa`, `DrugieDanie`, `Napoj`, `Deser`) VALUES
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe'),
('Poniedziałek', 'Zalewajka', 'Kluski śląskie w sosie grzybowym', 'Mięta', 'Mleko czekoladowe'),
('Wtorek', 'Pomidorowa z ryżem', 'Pierogi z serem ze śmietaną i cynamonem', 'Kompot wiśniowy', 'Gruszka'),
('Środa', 'Zupa czosnkowa z szynką, serem i grzankami', 'Kluski śląskie w sosie grzybowym', 'Kompot wiśniowy', 'Jabłko'),
('Czwartek', 'Grochówka z ziemniakami i kiełbasą', 'Gołąbki w sosie pomidorowym z ziemnikami', 'Woda z sokiem malinowym', 'Ciastko owsiane'),
('Piątek', 'Krem pieczarkowy z makaronem', 'Kluski śląskie w sosie grzybowym', 'Herbata czarna z cukrem', 'Mleko waniliowe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Komentarze`
--

CREATE TABLE `Komentarze` (
  `Id` int(11) NOT NULL,
  `NazwaPotrawy` varchar(255) NOT NULL,
  `Ocena` int(11) DEFAULT NULL CHECK (`Ocena` >= 1 and `Ocena` <= 5),
  `Komentarze` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `Komentarze`
--

INSERT INTO `Komentarze` (`Id`, `NazwaPotrawy`, `Ocena`, `Komentarze`) VALUES
(1, 'Rosół z makaronem', 5, 'bardzo dobry'),
(2, 'Rosół z makaronem', 5, 'bardzo dobry'),
(3, 'Barszcz czerwony z ziemniakami', 3, 'mniam'),
(4, 'Mleko truskawkowe', 5, NULL),
(5, 'Tosty z serem', 3, NULL),
(6, 'Koperkowa z makaronem', 5, 'niedobre '),
(7, 'Herbata czarna z cukrem', 3, NULL),
(8, 'Mięta', 1, 'wcale nie smakuje miętą'),
(9, 'Pomidorowa z ryżem', 5, 'Wspaniała zupka, najlepsza pomidorówka jaką jadłam. Świetnie się komponuje z ryżem, gęsta, aksamitny smak. Polecam'),
(10, 'Rosół z makaronem', 3, NULL),
(11, 'Koperkowa z makaronem', 5, 'MEEEEEEGA');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Komentarze`
--
ALTER TABLE `Komentarze`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `Komentarze`
--
ALTER TABLE `Komentarze`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Potrawy`
--

CREATE TABLE `Potrawy` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(100) DEFAULT NULL,
  `RodzajPosilku` varchar(50) DEFAULT NULL,
  `Dieta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `Potrawy`
--

INSERT INTO `Potrawy` (`Id`, `Nazwa`, `RodzajPosilku`, `Dieta`) VALUES
(2, 'Pomidorowa z ryżem', 'Zupa', 'Wegetariańska'),
(3, 'Ogórkowa z ziemniakami', 'Zupa', 'Mięsna'),
(4, 'Barszcz czerwony z ziemniakami', 'Zupa', 'Mięsna'),
(5, 'Koperkowa z makaronem', 'Zupa', 'Mięsna'),
(6, 'Warzywniak z ziemniakami', 'Zupa', 'Mięsna'),
(7, 'Krupnik z kaszą jęczmienną', 'Zupa', 'Mięsna'),
(8, 'Kapuśniak z młodym kapusty', 'Zupa', 'Wegetariańska'),
(9, 'Grochówka z ziemniakami i kiełbasą', 'Zupa', 'Mięsna'),
(10, 'Krem pieczarkowy z makaronem', 'Zupa', 'Wegetariańska'),
(11, 'Kotlet schabowy z ziemniakami i mizerią', 'Drugie danie', 'Mięsna'),
(12, 'Pierogi z mięsem', 'Drugie danie', 'Mięsna'),
(13, 'Kotlet mielony z tłuczonymi ziemniakami i buraczkami', 'Drugie danie', 'Mięsna'),
(14, 'Pierogi z serem ze śmietaną i cynamonem', 'Drugie danie', 'Wegetariańska'),
(15, 'Pierogi ruskie z cebulką i skwarkami', 'Drugie danie', 'Mięsna'),
(16, 'Ryż z jabłkami, śmietanką i cynamonem', 'Drugie danie', 'Wegetariańska'),
(17, 'Gołąbki w sosie pomidorowym z ziemnikami', 'Drugie danie', 'Mięsna'),
(18, 'Gulasz wołowy z kaszą gryczaną i ogórkiem kiszonym', 'Drugie danie', 'Mięsna'),
(19, 'Filet z kurczaka z ziemniakami i surówką z kiszonej kapusty', 'Drugie danie', 'Mięsna'),
(20, 'Kluski śląskie w sosie grzybowym', 'Drugie danie', 'Mięsna'),
(21, 'Gyros z kurczaka z ryżem i surówką z kapusty pekińskiej', 'Drugie danie', 'Mięsna'),
(22, 'Kompot truskawkowy', 'Napoj', 'Wegetariańska'),
(23, 'Kompot wiśniowy', 'Napoj', 'Wegetariańska'),
(24, 'Kompot jabłkowy z rabarbarem', 'Napoj', 'Wegetariańska'),
(25, 'Woda mineralna z miodem', 'Napoj', 'Wegetariańska'),
(26, 'Woda mineralna z cytryną', 'Napoj', 'Wegetariańska'),
(27, 'Woda z sokiem malinowym', 'Napoj', 'Wegetariańska'),
(28, 'Sok jabłkowy', 'Napoj', 'Wegetariańska'),
(29, 'Sok pomarańczowy', 'Napoj', 'Wegetariańska'),
(30, 'Sok multiwitaminowy', 'Napoj', 'Wegetariańska'),
(31, 'Herbata czarna z cukrem', 'Napoj', 'Wegetariańska'),
(32, 'Mięta', 'Napoj', 'Wegetariańska'),
(33, 'Banan', 'Deser', 'Wegetariańska'),
(34, 'Jabłko', 'Deser', 'Wegetariańska'),
(35, 'Gruszka', 'Deser', 'Wegetariańska'),
(36, 'Pomarańcza', 'Deser', 'Wegetariańska'),
(37, 'Mandarynka', 'Deser', 'Wegetariańska'),
(38, 'Batonik zbożowy', 'Deser', 'Wegetariańska'),
(39, 'Ciastko owsiane', 'Deser', 'Wegetariańska'),
(40, 'Mleko waniliowe', 'Deser', 'Wegetariańska'),
(41, 'Mleko truskawkowe', 'Deser', 'Wegetariańska'),
(42, 'Mleko czekoladowe', 'Deser', 'Wegetariańska'),
(43, 'Zalewajka', 'Zupa', 'Mięsna'),
(46, 'Zupa czosnkowa z szynką, serem i grzankami', 'Zupa', 'Bezglutenowa'),
(47, 'Knedle z truskawkami', 'Drugie danie', 'Wegetariańska'),
(49, 'Wątróbka z cebulką i ziemnikami ', 'Drugie danie', 'Mięsna');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Potrawy`
--
ALTER TABLE `Potrawy`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Uzytkownicy`
--

CREATE TABLE `Uzytkownicy` (
  `Id` int(11) NOT NULL,
  `Login` varchar(50) DEFAULT NULL,
  `Haslo` varchar(255) NOT NULL,
  `Imie` varchar(50) DEFAULT NULL,
  `Nazwisko` varchar(50) DEFAULT NULL,
  `RodzajUzytkownika` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `Uzytkownicy`
--

INSERT INTO `Uzytkownicy` (`Id`, `Login`, `Haslo`, `Imie`, `Nazwisko`, `RodzajUzytkownika`) VALUES
(1, 'jan_kowalski', 'hasloJan', 'Jan', 'Kowalski', 'Uczen'),
(3, 'adam_nowakowski', 'hasloAdam', 'Adam', 'Nowakowski', 'PracownikKuchni'),
(10, 'pawel_zurawski', 'hasloPawel', 'Paweł', 'Żurawski', 'PracownikKuchni'),
(11, 'hhhohho', 'hhhhhhhhhhhh', 'ghnfgn', 'fgnfhbnf', 'PracownikKuchni'),
(12, 'dabida', 'koks123', 'Wiktor', 'Rakowiecki', 'Uczen'),
(13, 'anna_lewandowska', '$2y$10$QpyCI6fTKkLeusm40UyvH.5IFd/CePvoHNHEkXdXduR3L1b0cldu2', 'Anna', 'Lewandowska', 'Uczen'),
(14, 'jan_van', 'hasloJan', 'Jan', 'Van', 'PracownikKuchni'),
(15, 'klaudia_anna', '$2y$10$xxGYB0V42F29C9mgSgP5J.bRQRN5k8oMPCE.4aqKS32dNe17u47zm', 'Klaudia', 'Anna', 'PracownikKuchni'),
(16, 'bartosz_kowalski', '$2y$10$PRwjU8Bdzkc.TjreY0THhuXCQTrsGXReBC8VACeQA7pvV6BKAdj9u', 'Bartosz', 'Kowalski', 'Administrator'),
(17, 'katarzyna_nowak', '$2y$10$ckfNg1cCkbhj5LRHcGCpvOm7.IiPlEVfCax2JuOvYWuZp15uF6p72', 'Katarzyna', 'Nowak', 'Administrator'),
(18, 'adam_zakrzewski', '$2y$10$S7t9tmC2MbGJwdbe4twlLOlmIxcVoPnE8KEoB0aNdJtysXoPcAbDG', 'Adam', 'Zakrzewski', 'Uczen'),
(20, 'PS', '$2y$10$TnNkYXX4C/jNXnp.nLUKOuvhpNyO0EAgBbXoOjQkYNZnRGnTbyBMe', 'Paul', 'Smith', 'Uczen');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Uzytkownicy`
--
ALTER TABLE `Uzytkownicy`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;