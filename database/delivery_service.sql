-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2021 г., 15:42
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
(24, 'Ростислав Баранец', '1234567890', 'baranets.01@gmail'),
(25, 'qweqweqwe', 'qwe', 'qwe'),
(27, 'фцвфыфыв', 'фыафыафыа', 'фыафыафыа'),
(29, 'Ростислав', '12345', 'baranets.01@gmail.com');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Дамп данных таблицы `delivery`
--

INSERT INTO `delivery` (`id`, `id_client`, `address1`, `address2`, `date`, `distance`, `weight`, `id_type`, `id_view`, `id_price`, `cost`) VALUES
(31, 25, ' hb', '№1 Днепр йцувйцв', '2021-05-12', 10, 10, 3, 2, 4, 140),
(33, 25, '№1 Днепр йцувйцв', '№3 Днепр фавфывапыаукрвкрв', '2021-05-13', 123, 900, 1, 3, 9, 3740),
(34, 24, 'qwqe', 'qwewq', '2020-05-14', 10, 10, 1, 4, 10, 200),
(36, 25, '№2 Днепр фывфывфыв', '1ee12e', '2021-05-16', 10, 31, 2, 3, 8, 260);

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
(1, 'Днепрп', 'чити'),
(2, 'Днепр', 'фывфывфыв'),
(4, 'аыва', 'вфыа'),
(47, 'Киев', 'мотрна'),
(123, 'вфавыаф', 'афвава'),
(124, 'qwdwq', 'dwqd'),
(454, 'фпафап', 'фпаап');

-- --------------------------------------------------------

--
-- Структура таблицы `price_of_view`
--

CREATE TABLE `price_of_view` (
  `id` int NOT NULL,
  `id_view` int NOT NULL,
  `weight_min` float NOT NULL,
  `weight_max` float NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `price_of_view`
--

INSERT INTO `price_of_view` (`id`, `id_view`, `weight_min`, `weight_max`, `cost`) VALUES
(1, 1, 0, 20, 6),
(2, 1, 20.01, 200, 17),
(3, 1, 200.01, 1000, 20),
(4, 2, 0, 20, 8),
(5, 2, 20.01, 200, 14),
(6, 2, 200.1, 1000, 25),
(7, 3, 0, 20, 10),
(8, 3, 20.01, 200, 20),
(9, 3, 200.1, 1000, 30),
(10, 4, 0, 20, 15),
(11, 4, 20.01, 200, 25),
(12, 4, 200.1, 1000, 35);

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
(1, 'Стандарт', 'послуга передбачає виїзд за вантажем або доставку протягом операційного дня відповідного до маршруту руху транспорту служби'),
(2, 'Вовремя', 'послуга передбачає виїзд за вантажем або доставку в точно зазначене, обумовлений час'),
(3, 'Експрес', 'послуга передбачає виїзд за вантажем або доставку протягом однієї години з моменту оформлення замовлення '),
(4, 'Ночной', 'послуга передбачає виїзд за вантажем або доставку з 19:00 до 9:00 згідно маршруту руху транспорту служби доставки.');

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
  ADD KEY `id_view` (`id_view`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `department`
--
ALTER TABLE `department`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT для таблицы `price_of_view`
--
ALTER TABLE `price_of_view`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `type_of_delivery`
--
ALTER TABLE `type_of_delivery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `view_of_delivery`
--
ALTER TABLE `view_of_delivery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `price_of_view_ibfk_1` FOREIGN KEY (`id_view`) REFERENCES `view_of_delivery` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
