-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 20 2018 г., 18:36
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `EMIS`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `author` tinytext NOT NULL,
  `genre` tinytext NOT NULL,
  `year` int(4) NOT NULL,
  `pages` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `genre`, `year`, `pages`, `created_at`) VALUES
(2, 'аномальная зона', 'андрей кокотюха', 'детектив', 2016, 250, '2018-02-20 17:27:09'),
(7, 'второй раз не воскреснешь', 'анна и сергей литвиновы', 'роман', 2004, 280, '2018-02-20 17:29:25'),
(8, 'не могу с тобой расстаться', 'ирина островецкая', 'роман', 2015, 450, '2018-02-20 17:29:56'),
(9, 'город сбывшихся желаний', 'джессика гилмор', 'проза', 2016, 220, '2018-02-20 17:30:46'),
(10, 'попроси меня остаться', 'джессика гилмор', 'роман', 2015, 335, '2018-02-20 17:32:08');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
