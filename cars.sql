-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 07 2022 г., 22:11
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cars`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `model_id` int NOT NULL,
  `engine_id` int NOT NULL,
  `drive_id` int NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`id`, `category_id`, `model_id`, `engine_id`, `drive_id`, `name`) VALUES
(1, 1, 1, 1, 1, 'Lexus 1'),
(2, 1, 1, 3, 2, 'Lexus 2'),
(3, 1, 1, 2, 1, 'Lexus 11'),
(4, 1, 2, 1, 1, 'Lexus 4'),
(5, 1, 2, 2, 2, 'Lexus 5'),
(6, 1, 2, 3, 1, 'Lexus 6'),
(7, 1, 2, 2, 1, 'Lexus 7'),
(8, 1, 1, 2, 2, 'Lexus 7'),
(9, 1, 2, 1, 2, 'Lexus 8'),
(10, 1, 1, 2, 2, 'Lexus 9'),
(11, 1, 2, 1, 1, 'Lexus 10'),
(12, 2, 3, 1, 1, 'Toyota 1'),
(13, 2, 3, 2, 1, 'Toyota 2'),
(14, 2, 3, 3, 2, 'Toyota 3'),
(15, 2, 3, 1, 1, 'Toyota 4'),
(16, 2, 4, 1, 1, 'Toyota 5'),
(17, 2, 4, 2, 2, 'Toyota 6'),
(18, 2, 4, 3, 1, 'Toyota 7'),
(19, 2, 4, 2, 1, 'Toyota 8'),
(20, 2, 3, 3, 1, 'Toyota 9'),
(21, 2, 4, 1, 1, 'Toyota 10');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(55) NOT NULL,
  `link` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `link`) VALUES
(1, 'Lexus', 'lexus'),
(2, 'Toyota', 'toyota');

-- --------------------------------------------------------

--
-- Структура таблицы `drive`
--

CREATE TABLE `drive` (
  `id` int NOT NULL,
  `name` varchar(55) NOT NULL,
  `link` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `drive`
--

INSERT INTO `drive` (`id`, `name`, `link`) VALUES
(1, 'Полный', 'four-wheel'),
(2, 'Передний', 'front-wheel');

-- --------------------------------------------------------

--
-- Структура таблицы `engine`
--

CREATE TABLE `engine` (
  `id` int NOT NULL,
  `name` varchar(55) NOT NULL,
  `link` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `engine`
--

INSERT INTO `engine` (`id`, `name`, `link`) VALUES
(1, 'Бензин', 'petrol'),
(2, 'Дизель', 'diesel'),
(3, 'Гибрид', 'hybrid');

-- --------------------------------------------------------

--
-- Структура таблицы `model`
--

CREATE TABLE `model` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(55) NOT NULL,
  `link` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `model`
--

INSERT INTO `model` (`id`, `category_id`, `name`, `link`) VALUES
(1, 1, 'ES', 'es'),
(2, 1, 'GX', 'gx'),
(3, 1, 'Camry', 'camry'),
(4, 2, 'Corolla', 'corolla');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `drive_id` (`drive_id`),
  ADD KEY `engine_id` (`engine_id`),
  ADD KEY `model_id` (`model_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `drive`
--
ALTER TABLE `drive`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `engine`
--
ALTER TABLE `engine`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `drive`
--
ALTER TABLE `drive`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `engine`
--
ALTER TABLE `engine`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `model`
--
ALTER TABLE `model`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`drive_id`) REFERENCES `drive` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`engine_id`) REFERENCES `engine` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `car_ibfk_4` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
