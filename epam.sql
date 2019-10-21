-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 09 2019 г., 14:43
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `epam`
--

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, '1 department '),
(2, '2 department '),
(3, '3 department ');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `id_deparment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `id_deparment`) VALUES
(1, 'TV sets', 1000, 1),
(2, 'computers', 1500, 2),
(3, 'mobile phones', 500, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `products_produced`
--

CREATE TABLE `products_produced` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_produced`
--

INSERT INTO `products_produced` (`id`, `id_product`, `id_worker`, `quantity`) VALUES
(1, 1, 1, 11),
(2, 1, 2, 10),
(3, 1, 3, 9),
(4, 1, 4, 3),
(5, 2, 5, 2),
(6, 2, 6, 3),
(7, 2, 7, 5),
(8, 2, 8, 8),
(9, 3, 9, 4),
(10, 3, 10, 9),
(11, 3, 11, 2),
(12, 3, 12, 500),
(21, 1, 37, 1),
(22, 1, 38, 3),
(23, 1, 39, 3),
(24, 1, 40, 3),
(25, 1, 41, 1),
(26, 1, 42, 5),
(27, 2, 43, 7),
(28, 2, 44, 7),
(29, 2, 45, 6),
(30, 2, 46, 3),
(31, 2, 47, 1),
(32, 2, 48, 3),
(33, 3, 49, 3),
(34, 3, 50, 6),
(35, 3, 51, 5),
(36, 3, 52, 6),
(37, 3, 53, 1),
(38, 3, 54, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `id_deparment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `first_name`, `last_name`, `id_deparment`) VALUES
(1, 'Василиса', 'Корнилова ', 1),
(2, 'Марианна', 'Ярный', 1),
(3, 'Борислав', 'Шевцов', 1),
(4, 'Агафья', 'Цельнера', 1),
(5, 'Инесса', 'Яцко', 2),
(6, 'Лариса', 'Северинова', 2),
(7, 'Дарья', 'Коршикова', 2),
(8, 'Герман', 'Лещёв', 2),
(9, 'Порфирий', 'Данильцин', 3),
(10, 'Иннокентий', 'Калмыков', 3),
(11, 'Ефрем', 'Яромеев', 3),
(12, 'Ирина', 'Хесмана', 3),
(37, 'Виктор', 'Ястржембский ', 1),
(38, 'Никифор', 'Янчуковский ', 1),
(39, 'Ирина', 'Енина ', 1),
(40, 'Мирон', 'Семёнов ', 1),
(41, 'Нина', 'Моренова ', 1),
(42, 'Яна', 'Ярилова ', 1),
(43, 'Агап', 'Тёмкин ', 2),
(44, 'Оксана', 'Маланова ', 2),
(45, 'Яна', 'Дёмшина ', 2),
(46, 'Зинаида', 'Вельдина ', 2),
(47, 'Алиса', 'Комракова ', 2),
(48, 'Самсон', 'Шведов ', 2),
(49, 'Василиса', 'Муратова ', 3),
(50, 'Казимир', 'Рыков ', 3),
(51, 'Гаврила', 'Леонов ', 3),
(52, 'Ефросинья', 'Язынина ', 3),
(53, 'Антонина', 'Кидина ', 3),
(54, 'Валерьян', 'Сиянов ', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_deparment` (`id_deparment`);

--
-- Индексы таблицы `products_produced`
--
ALTER TABLE `products_produced`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_worker` (`id_worker`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_deparment` (`id_deparment`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products_produced`
--
ALTER TABLE `products_produced`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_deparment`) REFERENCES `departments` (`id`);

--
-- Ограничения внешнего ключа таблицы `products_produced`
--
ALTER TABLE `products_produced`
  ADD CONSTRAINT `products_produced_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `workers` (`id`),
  ADD CONSTRAINT `products_produced_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`id_deparment`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
