-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Lis 2019, 16:14
-- Wersja serwera: 5.6.20
-- Wersja PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `blog-cms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `views` int(10) unsigned NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `blog`
--

INSERT INTO `blog` (`id`, `title`, `alias`, `date`, `views`, `content`) VALUES
(1, 'Routing w AngularJS', 'routingangularjs', '2019-11-22', 11, '<p>Przykład routingu w AngularJS.</p>'),
(2, 'Routing w Codeingniter', 'routingcodeigniter', '2019-11-24', 12, '<p>Przykład routingu w Codeigniter</p>'),
(3, 'Routing w Laravel', 'routinglaravel', '2019-11-24', 11, '<p>Przykład routingu w Laravel</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `name`, `email`, `date`, `content`) VALUES
(1, 3, 'admin', 'admin@admin.pl', '2019-11-24', 'Przykładowy komentarz - Laravel'),
(2, 2, 'admin', 'admin@admin.pl', '2019-11-24', 'Przykładowy komentarz - Codeigniter'),
(3, 1, 'admin', 'admin@admin.pl', '2019-11-24', 'Przykładowy komentarz - AngularJS');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `config`
--

CREATE TABLE IF NOT EXISTS `config` (
`id` int(10) unsigned NOT NULL,
  `option` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `config`
--

INSERT INTO `config` (`id`, `option`, `value`) VALUES
(1, 'site_name', 'Blog - CMS'),
(2, 'front_theme', 'Default'),
(3, 'back_theme', 'Default'),
(4, 'num_posts', '3'),
(5, 'num_gal', '3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(5) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `pages`
--

INSERT INTO `pages` (`id`, `title`, `alias`, `content`, `order`) VALUES
(1, 'Codeigniter', 'codeigniter', 'Codeigniter - ogólnie otwarty framework aplikacji webowych do tworzenia stron w PHP.', 0),
(2, 'AngularJS', 'angularjs', 'AngularJS - framework JavaScriptowy do tworzenia aplikacji webowych w JavaScripcie.', 1),
(3, 'Bootstrap', 'bootstrap', 'Bootstrap - framework CSS czyli system do łatwego oraz przejrzystego tworzenia stylu aplikacji webowych', 2),
(4, 'Laravel', 'laravel', 'Laravel - framework PHP oparty na symfony.', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.pl', '0b15879c02d608aae0147fb9d3c00e5d9fc05396f24f64033c505f79a5eb11d04dbfe9e7b430ccae5b75c8170d7d4d435efdd9aacf0b633b9ec092abad0907f7');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
 ADD KEY `id` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD KEY `id` (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD KEY `id` (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `blog`
--
ALTER TABLE `blog`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `config`
--
ALTER TABLE `config`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
