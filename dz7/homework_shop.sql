-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 03 2016 г., 13:09
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `homework_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `vd_categories`
--

CREATE TABLE IF NOT EXISTS `vd_categories` (
  `id` int(11) NOT NULL,
  `Name` varchar(128) DEFAULT NULL,
  `Icon` varchar(45) DEFAULT NULL,
  `ParentCategories` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vd_categories`
--

INSERT INTO `vd_categories` (`id`, `Name`, `Icon`, `ParentCategories`) VALUES
(1, 'Компьютер', NULL, NULL),
(2, 'Настольники', NULL, 1),
(3, 'Ноутбуки', NULL, 1),
(4, 'Обычные', NULL, 3),
(5, 'Нетбуки', NULL, 3),
(6, 'Маки', NULL, 3),
(7, 'Мониторы', NULL, NULL),
(8, 'Большие', NULL, 7),
(9, 'Маленькие', NULL, 7),
(10, 'Квадратные', NULL, 9),
(11, 'Круглые', NULL, 9),
(12, 'Выпуклые', NULL, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `vd_cattochar`
--

CREATE TABLE IF NOT EXISTS `vd_cattochar` (
  `id` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `Characteristic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vd_characteristics`
--

CREATE TABLE IF NOT EXISTS `vd_characteristics` (
  `id` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vd_charvalues`
--

CREATE TABLE IF NOT EXISTS `vd_charvalues` (
  `id` int(11) NOT NULL,
  `Value` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vd_goodcharacteristics`
--

CREATE TABLE IF NOT EXISTS `vd_goodcharacteristics` (
  `id` int(11) NOT NULL,
  `Good` int(11) NOT NULL,
  `Characteristic` int(11) NOT NULL,
  `Value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vd_goods`
--

CREATE TABLE IF NOT EXISTS `vd_goods` (
  `id` int(11) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Price` float NOT NULL DEFAULT '0',
  `Aboud` text,
  `Category` int(11) NOT NULL,
  `Maker` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vd_makers`
--

CREATE TABLE IF NOT EXISTS `vd_makers` (
  `id` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Logo` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vd_order`
--

CREATE TABLE IF NOT EXISTS `vd_order` (
  `id` int(11) NOT NULL,
  `Orderno` varchar(45) NOT NULL,
  `OrderStatus` int(11) NOT NULL DEFAULT '0',
  `Payment` int(11) NOT NULL DEFAULT '0',
  `Comment` text,
  `TotalPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vd_orderline`
--

CREATE TABLE IF NOT EXISTS `vd_orderline` (
  `id` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `GoodId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Sale` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vd_photos`
--

CREATE TABLE IF NOT EXISTS `vd_photos` (
  `id` int(11) NOT NULL,
  `Path` varchar(256) NOT NULL,
  `Good` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `vd_categories`
--
ALTER TABLE `vd_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentCategory_idx` (`ParentCategories`);

--
-- Индексы таблицы `vd_cattochar`
--
ALTER TABLE `vd_cattochar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catId_idx` (`Category`),
  ADD KEY `CharID_idx` (`Characteristic`);

--
-- Индексы таблицы `vd_characteristics`
--
ALTER TABLE `vd_characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vd_charvalues`
--
ALTER TABLE `vd_charvalues`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vd_goodcharacteristics`
--
ALTER TABLE `vd_goodcharacteristics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goodchid_idx` (`Good`),
  ADD KEY `chid_idx` (`Characteristic`),
  ADD KEY `valueid_idx` (`Value`);

--
-- Индексы таблицы `vd_goods`
--
ALTER TABLE `vd_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryOfGood_idx` (`Category`),
  ADD KEY `GoodMaker_idx` (`Maker`);

--
-- Индексы таблицы `vd_makers`
--
ALTER TABLE `vd_makers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vd_order`
--
ALTER TABLE `vd_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vd_orderline`
--
ALTER TABLE `vd_orderline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `OrderIDForLine_idx` (`OrderId`),
  ADD KEY `GoodIDForOrderLine_idx` (`GoodId`);

--
-- Индексы таблицы `vd_photos`
--
ALTER TABLE `vd_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goodPhoto_idx` (`Good`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `vd_categories`
--
ALTER TABLE `vd_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `vd_cattochar`
--
ALTER TABLE `vd_cattochar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vd_characteristics`
--
ALTER TABLE `vd_characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vd_charvalues`
--
ALTER TABLE `vd_charvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vd_goodcharacteristics`
--
ALTER TABLE `vd_goodcharacteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vd_goods`
--
ALTER TABLE `vd_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vd_makers`
--
ALTER TABLE `vd_makers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vd_order`
--
ALTER TABLE `vd_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vd_orderline`
--
ALTER TABLE `vd_orderline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vd_photos`
--
ALTER TABLE `vd_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `vd_categories`
--
ALTER TABLE `vd_categories`
  ADD CONSTRAINT `parentCategory` FOREIGN KEY (`ParentCategories`) REFERENCES `vd_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `vd_cattochar`
--
ALTER TABLE `vd_cattochar`
  ADD CONSTRAINT `CharID` FOREIGN KEY (`Characteristic`) REFERENCES `vd_characteristics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `catId` FOREIGN KEY (`Category`) REFERENCES `vd_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `vd_goodcharacteristics`
--
ALTER TABLE `vd_goodcharacteristics`
  ADD CONSTRAINT `chid` FOREIGN KEY (`Characteristic`) REFERENCES `vd_characteristics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `goodchid` FOREIGN KEY (`Good`) REFERENCES `vd_goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `valueid` FOREIGN KEY (`Value`) REFERENCES `vd_charvalues` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `vd_goods`
--
ALTER TABLE `vd_goods`
  ADD CONSTRAINT `GoodMaker` FOREIGN KEY (`Maker`) REFERENCES `vd_makers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `categoryOfGood` FOREIGN KEY (`Category`) REFERENCES `vd_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `vd_orderline`
--
ALTER TABLE `vd_orderline`
  ADD CONSTRAINT `GoodIDForOrderLine` FOREIGN KEY (`GoodId`) REFERENCES `vd_goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `OrderIDForLine` FOREIGN KEY (`OrderId`) REFERENCES `vd_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `vd_photos`
--
ALTER TABLE `vd_photos`
  ADD CONSTRAINT `goodPhoto` FOREIGN KEY (`Good`) REFERENCES `vd_goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
