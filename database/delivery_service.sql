-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 22 2021 г., 12:13
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `delivery_service`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `password`, `email`) VALUES
(24, 'Ростислав Баранец', '123456789', 'baranets.01@gmail.com'),
(35, 'Королёв Мирослав', 'sJ9Mjy3P44', 'yoprequeufeibre-5848@mail.com'),
(36, 'Гриневская Цезарь', '38SYU2b5kt', 'beugetrigimo-4597@gmail.com'),
(37, 'Баранов Всеволод', '92X4zpR2eR', 'nuboiffummeulle-9998@yopmail.com'),
(40, 'Федосеев Зигмунд', 'iLX67u4K5i', 'wegredannipreu@yopmail.com'),
(41, 'Потапов Йонас', 'ef2D6d63HG', 'fettoixautappi-5625@yopmail.com'),
(42, 'Медведев Филипп', 'ef2D6d63HG', 'gittebripreisu-9564@gmail.com'),
(43, 'Быкова Раиса', 'm3Cm5TS2y5', 'fribrettukebroi@gmail.com'),
(44, 'Агафонова Эллада', 'Bi7Me944fL', 'frutemmeinneufe@gmail.com'),
(46, 'Яворивска Валентина', 'ZRTs76a96m', 'preijacratau@gmail.com'),
(47, 'Максимова Устинья', 'E2ij5a3ML7', 'yoiyuceillitau@yopmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `delivery`
--

CREATE TABLE `delivery` (
  `id` int NOT NULL,
  `id_client` int DEFAULT NULL,
  `address1` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `distance` int DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `id_type` int DEFAULT NULL,
  `id_view` int DEFAULT NULL,
  `id_price` int DEFAULT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `delivery`
--

INSERT INTO `delivery` (`id`, `id_client`, `address1`, `address2`, `date`, `distance`, `weight`, `id_type`, `id_view`, `id_price`, `cost`) VALUES
(41, 24, '№457 Киев Заболотного Академика, 21', '№2 Днепр Стеценко, 57', '2021-06-15', 307, 3, 1, 1, 1, 1892),
(42, 24, '№2 Днепр Стеценко, 57', 'Тернополь Володимира Великого, 3', '2021-06-15', 523, 30, 2, 1, 2, 8951),
(43, 24, '№2 Днепр Стеценко, 57', '№464 Львов Вигоди, 58', '2021-06-15', 430, 13, 1, 4, 10, 6500),
(44, 35, 'Киев Горловская, 200', 'Харьков пр. Победы, дом 60, кв. 82', '2021-06-15', 250, 10, 4, 2, 4, 2070),
(45, 35, '№457 Киев Заболотного Академика, 21', '№461 Луганск Шевченко, 3', '2021-06-15', 411, 5, 1, 1, 1, 2516),
(46, 36, '№2 Днепр Стеценко, 57', '№459 Одесса Кордонная, 90', '2021-06-15', 340, 2, 1, 1, 1, 2090),
(47, 37, '№2 Днепр Стеценко, 57', '№461 Луганск Шевченко, 3', '2021-06-15', 350, 11, 1, 1, 1, 2150),
(48, 40, '№464 Львов Вигоди, 58', '№461 Луганск Шевченко, 3', '2021-06-15', 700, 270, 1, 4, 12, 24550),
(49, 43, 'Киев Мануильского, 21, кв. 19', '№460 Сумы Продольна, 46', '2021-06-15', 278, 32, 3, 1, 2, 4791),
(50, 44, '№2 Днепр Стеценко, 57', '№463 Кривой Рог Корнейчука, 17', '2021-06-15', 10, 57, 1, 3, 8, 250),
(51, 46, 'Киев Горловская, 247', 'Киев Мануильского, 77, кв. 2', '2021-06-15', 7, 2, 4, 3, 7, 140),
(52, 47, '№457 Киев Заболотного Академика, 21', '№459 Одесса Кордонная, 90', '2021-06-15', 213, 423, 1, 1, 3, 4310);

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE `department` (
  `id` int NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`id`, `city`, `address`) VALUES
(2, 'Днепр', 'Стеценко, 57'),
(456, 'Днепр', 'Пастера 4а'),
(457, 'Киев', 'Заболотного Академика, 21'),
(458, 'Киев', 'Княжий Затон, 14'),
(459, 'Одесса', 'Кордонная, 90'),
(460, 'Сумы', 'Продольна, 46'),
(461, 'Луганск', 'Шевченко, 3'),
(462, 'Львов', 'Спортивна, 2'),
(463, 'Кривой Рог', 'Корнейчука, 17'),
(464, 'Львов', 'Вигоди, 58');

-- --------------------------------------------------------

--
-- Структура таблицы `price_of_view`
--

CREATE TABLE `price_of_view` (
  `id` int NOT NULL,
  `id_view` int NOT NULL,
  `weight_id` int NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `price_of_view`
--

INSERT INTO `price_of_view` (`id`, `id_view`, `weight_id`, `cost`) VALUES
(1, 1, 1, 6),
(2, 1, 2, 17),
(3, 1, 3, 20),
(4, 2, 1, 8),
(5, 2, 2, 14),
(6, 2, 3, 25),
(7, 3, 1, 10),
(8, 3, 2, 20),
(9, 3, 3, 30),
(10, 4, 1, 15),
(11, 4, 2, 25),
(12, 4, 3, 35);

-- --------------------------------------------------------

--
-- Структура таблицы `type_of_delivery`
--

CREATE TABLE `type_of_delivery` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `type_of_delivery`
--

INSERT INTO `type_of_delivery` (`id`, `name`, `cost`) VALUES
(1, 'склад-склад', 50),
(2, 'склад-двери', 60),
(3, 'двери-склад', 65),
(4, 'двери-двери', 70);

-- --------------------------------------------------------

--
-- Структура таблицы `view_of_delivery`
--

CREATE TABLE `view_of_delivery` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `view_of_delivery`
--

INSERT INTO `view_of_delivery` (`id`, `name`, `description`) VALUES
(1, 'Стандарт', 'выезд за грузом или доставку в течение операционного дня соответствующего маршрута движения транспорта службы '),
(2, 'Вовремя', 'выезд за грузом или доставку в точно указанное, оговоренное время '),
(3, 'Експрес', 'выезд за грузом или доставку в течение одного часа с момента оформления заказа '),
(4, 'Ночной', 'выезд за грузом или доставку с 19:00 до 9:00 по маршруту движения транспорта службы доставки. ');

-- --------------------------------------------------------

--
-- Структура таблицы `weight`
--

CREATE TABLE `weight` (
  `id` int NOT NULL,
  `min` float NOT NULL,
  `max` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `weight`
--

INSERT INTO `weight` (`id`, `min`, `max`) VALUES
(1, 1, 20),
(2, 20.001, 200),
(3, 200.001, 1000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_view` (`id_view`),
  ADD KEY `id_price` (`id_price`);

--
-- Индексы таблицы `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price_of_view`
--
ALTER TABLE `price_of_view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_view` (`id_view`),
  ADD KEY `weight_id` (`weight_id`);

--
-- Индексы таблицы `type_of_delivery`
--
ALTER TABLE `type_of_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `view_of_delivery`
--
ALTER TABLE `view_of_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `department`
--
ALTER TABLE `department`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

--
-- AUTO_INCREMENT для таблицы `price_of_view`
--
ALTER TABLE `price_of_view`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `type_of_delivery`
--
ALTER TABLE `type_of_delivery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `view_of_delivery`
--
ALTER TABLE `view_of_delivery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `weight`
--
ALTER TABLE `weight`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`id_price`) REFERENCES `price_of_view` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`id_type`) REFERENCES `type_of_delivery` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `delivery_ibfk_4` FOREIGN KEY (`id_view`) REFERENCES `view_of_delivery` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `price_of_view`
--
ALTER TABLE `price_of_view`
  ADD CONSTRAINT `price_of_view_ibfk_1` FOREIGN KEY (`id_view`) REFERENCES `view_of_delivery` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `price_of_view_ibfk_2` FOREIGN KEY (`weight_id`) REFERENCES `weight` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
