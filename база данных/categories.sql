-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 06 2019 г., 22:37
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sklamos`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `product_type`, `brand`) VALUES
(1, 'mobile', 'Apple'),
(2, 'mobile', 'Honor'),
(3, 'mobile', 'Fly'),
(4, 'mobile', 'HTC'),
(5, 'mobile', 'LG'),
(6, 'mobile', 'Motorola'),
(7, 'mobile', 'Nokia'),
(8, 'mobile', 'Oppo'),
(9, 'mobile', 'Xiaomi'),
(10, 'mobile', 'Samsung'),
(11, 'notebook', 'DNS'),
(12, 'notebook', 'Acer'),
(13, 'notebook', 'Asus'),
(14, 'notebook', 'Dell'),
(15, 'notebook', 'HP'),
(16, 'notebook', 'Lenovo'),
(17, 'notebook', 'MSI'),
(18, 'notebook', 'Toshiba'),
(19, 'notebook', 'Packard Bell'),
(20, 'notebook', 'Samsung'),
(21, 'notebook', 'Apple'),
(22, 'notebook', 'Sony'),
(23, 'notepad', 'Apple'),
(24, 'notepad', 'Samsung'),
(25, 'notepad', 'Sony');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
