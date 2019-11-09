-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 06 2019 г., 22:36
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

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `seo_words` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `mini_description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `mini_features` text NOT NULL,
  `features` text DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `new` int(11) NOT NULL DEFAULT 0,
  `leades` int(11) NOT NULL DEFAULT 0,
  `sale` int(11) NOT NULL DEFAULT 0,
  `visible` int(11) NOT NULL DEFAULT 0,
  `count_view` int(11) NOT NULL DEFAULT 0,
  `product_type` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vote_count` int(11) DEFAULT NULL,
  `votes` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `title`, `price`, `brand`, `seo_words`, `seo_description`, `mini_description`, `image`, `description`, `mini_features`, `features`, `datetime`, `new`, `leades`, `sale`, `visible`, `count_view`, `product_type`, `brand_id`, `vote_count`, `votes`) VALUES
(1, 'Мобильный телефон Apple iPhone 11 Pro Max 512GB (серый космос)', 131990, 'Apple', '', '', 'Первая куртка', 'img1.jpg', '', 'Процессор\r\nApple A13 Bionic\r\n64-битная архитектура', '', '2019-10-15 21:08:19', 1, 0, 0, 1, 6, 'mobile', 1, 1, 1),
(2, 'Мобильный телефон Apple iPhone XS Max 512GB (золотой)', 109990, 'Apple', '', '', 'Вторая куртка', 'img2.jpg', '', 'Тип дисплея\r\n \r\nSuper Retina HD (OLED)\r\nДиагональ (дюйм)\r\n \r\n6.5\r\nРазрешение (пикс)\r\n \r\n2688x1242', '', '2019-10-16 11:13:22', 1, 0, 0, 1, 4, 'mobile', 1, 1, 1),
(3, 'Смартфон SAMSUNG Galaxy S10 128Gb, SM-G973F, черный', 68990, 'Samsung', '', '', '', 'SamsungS10.jpg', '', 'Дисплей	6.1\", AMOLED\r\nРазрешение дисплея	2960×1440\r\nСенсорный экран	Multitouch\r\n', '', '2019-10-23 08:17:42', 1, 0, 0, 1, 12, 'mobile', 10, 5, 1),
(4, 'Смартфон OPPO Reno 2 Luminous Black ', 39990, 'Oppo', '', '', '', 'oppoReno2.jpg', '', 'Технология дисплея	AMOLED	\r\nКоличество цветов дисплея	16 млн.\r\nТип стекла	закалённое\r\nБезрамочный	Да', '', '2019-10-22 08:30:21', 0, 0, 0, 1, 0, 'mobile', 8, 1, 1),
(5, 'Смартфон HTC U12+ 6/128 Translucent Blue', 49990, 'HTC', '', '', '', 'htcU12Plus.jpg', '', 'Технология дисплея	Super LCD 6\r\nКоличество цветов дисплея	16 млн.', '', '2019-10-20 17:27:37', 0, 0, 0, 1, 20, 'mobile', 4, 1, 1),
(6, 'Смартфон Xiaomi Mi 9T Pro 128GB Carbon Black', 33990, 'Xiaomi', '', '', '', 'XiaomiMi9TPro.jpg', '', 'Технология дисплея	Super AMOLED	\r\nКоличество цветов дисплея	16.5 млн.\r\nAlways On Display	Да\r\nТип стекла	2.5D\r\nБезрамочный	Да', '', '2019-10-22 12:24:35', 0, 0, 0, 1, 0, 'mobile', 9, 1, 1),
(7, 'Ноутбук Dell Inspiron', 29990, 'Dell', '', '', 'Производитель процессора	Intel\r\nТип процессора	Core i3-6006U 2ГГц\r\nКоличество ядер		2\r\nКэш-память		3 МБ', 'DellInspiron.jpg', '', '', '', '2019-10-21 19:34:40', 0, 0, 0, 1, 0, 'notebook', 14, 1, 1),
(8, 'Смартфон Apple iPhone 7 Plus 32Gb Black ', 34990, 'Apple', NULL, NULL, NULL, 'appleIphone7Plus32Gb.jpg', NULL, 'Фотокамера МПикс	12/12 Стабилизатор изображения	оптический	 Автофокус		Да Разрешение фронтальной камеры	7 Мпикс', NULL, '2019-10-31 23:08:36', 0, 0, 0, 1, 0, 'mobile', 1, NULL, NULL),
(9, 'Смартфон LG G3 S White', 9990, 'LG', NULL, NULL, NULL, 'LGG3SWhite.jpg', NULL, 'Производитель процессора	Qualcomm Тип процессора	Snapdragon 400 Частота процессора		1.2 ГГц Количество ядер		4', NULL, '2019-10-31 23:13:48', 0, 0, 0, 1, 0, 'mobile', 5, NULL, NULL),
(10, 'Мобильный телефон Fly Power Plus 5000', 4990, 'Fly', NULL, NULL, NULL, 'FlyPowerPlus5000.jpg', NULL, 'Диагональ (дюйм): 5.45 Разрешение (пикс): 1440x720 Встроенная память (Гб): 8 Фотокамера (Мп): 8 Процессор: MediaTek MT6739V', NULL, '2019-10-31 23:56:11', 0, 0, 0, 1, 0, 'mobile', 3, NULL, NULL),
(11, 'Мобильный телефон Motorola One Action (темно-синий)', 17990, 'Motorola', NULL, NULL, NULL, 'MotorollaOneActionDarkBlue.jpg', NULL, 'Диагональ (дюйм): 6.3 Разрешение (пикс): 2520x1080 Встроенная память (Гб): 128 Фотокамера (Мп): 12 + 16 + 5 (тройная) Процессор: Samsung Exynos 9609 Octa', NULL, '2019-11-01 00:01:32', 0, 0, 0, 1, 0, 'mobile', 6, NULL, NULL),
(12, 'HONOR 20 PRO MЕРЦАЮЩИЙ БИРЮЗОВЫЙ', 34990, 'Honor', NULL, NULL, NULL, 'Honor20Pro.jpg', NULL, 'Основная камера 48 МП, диафрагма F/1.4 Двойная оптическая стабилизация по 4 осям Фронтальная камера 32 МП, диафрагма F/2.0 30-кратный цифровой зум и сенсор Sony 1/2 дюйма Режим съемки 3D-портретов Безрамочный экран 6,26 дюйма 7-нм процессор Kirin 980 8 ГБ RAM + 256 ГБ ROM Батарея 4000 мА*ч', NULL, '2019-11-01 00:06:02', 0, 0, 0, 1, 0, 'mobile', 2, NULL, NULL),
(13, 'Мобильный телефон Nokia 7.2 (бирюзовый)', 17990, 'Nokia', NULL, NULL, NULL, 'Nokia7.2.jpg', NULL, 'Диагональ (дюйм): 6.3 Разрешение (пикс): 2280x1080 Встроенная память (Гб): 64 Фотокамера (Мп): 48 + 8 + 5 (тройная) Процессор: Qualcomm Snapdragon 660', NULL, '2019-11-01 00:10:08', 0, 0, 0, 1, 0, 'mobile', 7, NULL, NULL),
(14, '15.4\" Ноутбук Apple MacBook Pro Retina TB серый', 186999, 'Apple', NULL, NULL, NULL, 'MacBookProRetina15.4\'\'.jpg', NULL, 'Производитель процессора  Intel Линейка процессора  Intel Core i7 Модель процессора  Core i7 9750H Количество ядер процессора  6', NULL, '2019-11-01 00:14:17', 0, 0, 0, 1, 0, 'notebook', 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(1, 1, 'iphone11ProMax#1.jpeg'),
(2, 1, 'iphone11ProMax#2.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `surname` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `rights` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `phone`, `surname`, `name`, `rights`) VALUES
(1, 'admin', 'admin@gmail.com', 'c98013385dc7945e7ba8ba95c8f6eec6', 'img_avatar.png', '88005553535', 'admin', 'admin', 1),
(22, 'user', 'user@gmail.com', '98f68d1038c1e4c6fb9a55ae62c33ab1', 'img_avatar2.png', '500149', 'user', 'user', 0),
(23, 'moderator', 'moderator@gmail.com', 'c98013385dc7945e7ba8ba95c8f6eec6', 'img_avatar.png', '89995553377', 'moderator', 'moderator', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
