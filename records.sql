-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 26 2016 г., 17:58
-- Версия сервера: 5.5.50-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `top10studio_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `homepage` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `records`
--

INSERT INTO `records` (`id`, `name`, `email`, `homepage`, `text`, `ip`, `browser`, `date`, `file`) VALUES
(1, 'Den Denchik', 'it.denchik@yandex.ru', '', '<p>\r\n	Текст1</p>\r\n', '127.0.0.1', 'Chrome', '2016-09-26 14:39:20', ''),
(2, 'Den Denchik', 'it.denchik@yandex.ru', '', '<p>\r\n	Текст2</p>\r\n', '127.0.0.1', 'Chrome', '2016-09-26 14:40:18', ''),
(3, 'Den Denchik', 'it.denchik@yandex.ru', '', 'Текст3\r\n', '127.0.0.1', 'Chrome', '2016-09-26 14:53:25', ''),
(4, 'Den Denchik', 'it.denchik@yandex.ru', '', 'Текст4', '', '', '2016-09-26 14:54:46', ''),
(5, 'Den Denchik', 'it.denchik@yandex.ru', '', 'Текст5', '', '', '2016-09-26 14:54:46', ''),
(6, 'Den Denchik', 'it.denchik@yandex.ru', '', 'Текст6', '', '', '2016-09-26 14:56:51', ''),
(7, 'Den Denchik', 'it.denchik@yandex.ru', '', 'Текст7', '', '', '2016-09-26 14:56:51', ''),
(8, 'Den Denchik', 'it.denchik@yandex.ru', '', 'Текст8', '', '', '2016-09-26 14:57:07', ''),
(9, 'Den Denchik', 'it.denchik@yandex.ru', '', 'Текст9', '', '', '2016-09-26 14:57:07', ''),
(10, 'Den Denchik', 'it.denchik@yandex.ru', '', 'Текст9', '', '', '2016-09-26 14:58:02', ''),
(11, 'Den Denchik', 'it.denchik@yandex.ru', '', 'Текст10', '', '', '2016-09-26 14:58:02', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
