-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Гру 24 2020 р., 16:15
-- Версія сервера: 10.3.15-MariaDB
-- Версія PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `project1`
--

-- --------------------------------------------------------

--
-- Структура таблиці `card_datas`
--

CREATE TABLE `card_datas` (
  `card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_sum` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `card_datas`
--

INSERT INTO `card_datas` (`card_id`, `user_id`, `payment_method`, `card_number`, `code`, `name`, `surname`, `phone_number`, `payment_sum`, `payment_date`) VALUES
(79, 2, 'Приват Банк', '1234567891234568', '$2y$10$WimzNBnVg/2oEFJEo1Md7eUXfKEOUIRnNByoW9kGYteIz3qUPjzHq', 'Name1', 'Surname2', '+380666536910', 5, '2020-12-23 22:35:34'),
(80, 2, 'Приват Банк', '1234567891234568', '$2y$10$FJn3J2Vv1rlcoOmD3fyd5uf1DTuLeNarfVWcXMoLzXTHmWwcrtCoK', 'Name2', 'Surname2', '+380666536910', 5, '2020-12-23 22:37:14'),
(81, 2, 'Приват Банк', '1234567891234568', '$2y$10$q.gUqA9waLPlzAHbdDWhIeT2mxuX6IjXj6OOzysfVATDBRr4zA5E6', 'Name1', 'Surname2', '+380666536910', 5, '2020-12-23 22:43:57'),
(82, 3, 'MasterCard', '1234567891234569', '$2y$10$v.LNIvfMd4y0nNVeKjLoweuAJkqUX2g6j1EqrZZ6VgDHKnNhztrx.', 'Name1', 'Surname2', '+380666536910', 5, '2020-12-23 22:50:16'),
(83, 3, 'MasterCard', '1234567891234569', '$2y$10$8ijOpHlEyv/7iHobbP11Du0Ba.s5mD2JPRzS//69NjtzqZ86NtURa', 'Name1', 'Surname2', '+380666536910', 5, '2020-12-23 22:54:53'),
(84, 3, 'MasterCard', '1234567891234569', '$2y$10$.J4GgAvo6zW9qo7rYpossO9NLCgvYoTqIVUP2ToR76By2.2Kt01xa', 'Name1', 'Surname1', '+380666536910', 5, '2020-12-23 23:00:24'),
(85, 3, 'MasterCard', '1234567891234569', '$2y$10$mtG/uTSCCLl/nYY7jaMpNee4hZQ/Jue3Y/VqX/j3bpLLehEhrqPem', 'Name3', 'Surname3', '+380666536910', 5, '2020-12-24 08:12:28'),
(86, 3, 'MasterCard', '1234567891234569', '$2y$10$WvLDjrA.wR6EQ./FKgnT3uKOe4lTid6SPSZWR7kXMK71AGl2kycpG', 'Name3', 'Surname3', '+380666536910', 5, '2020-12-24 09:02:54'),
(87, 1, 'Visa', '1234567891234568', '$2y$10$CWCG4ruKD7FQvWYmyo2FceGOEVkriEhzUP6DZVPOETqBelebFhbfy', 'Name2', 'Surname2', '+380666536910', 5, '2020-12-24 11:38:42'),
(88, 1, 'American Expres', '1234567891234567', '$2y$10$qtaRbBswc58rZJ4REQgImOXV56Bn58QhFeJJC/tSy85tYqY6b20j6', 'Name1', 'Surname1', '+380666536910', 5, '2020-12-24 11:42:46');

-- --------------------------------------------------------

--
-- Структура таблиці `card_monies`
--

CREATE TABLE `card_monies` (
  `card_id` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_monies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `card_monies`
--

INSERT INTO `card_monies` (`card_id`, `payment_method`, `card_number`, `card_code`, `user_monies`) VALUES
(25, 'American Express', '1234567891234567', '$2y$10$O3MWCwilt6DFWnDIsj9heu7MRr3srhTBYvQC8eoWMr0BM7AhvAiee', 10),
(26, 'Visa', '1234567891234568', '$2y$10$6p2aDaqUXqcR.vBnLtZ3du8T9MUl5IDE1J.uindgs3szqT8uAlXP2', 10),
(27, 'MasterCard', '1234567891234569', '$2y$10$SEDvtiG/.QvHxgNaucrDxeEJIKZpjaMuZBu3z19N3gu2V/73hTjda', 30),
(28, 'American Express', '1234567891234561', '$2y$10$LIODsBM2V3v0N9l0BsnTNOlu3Xavs909auMIDTEWWV40vzqsUPYV2', 15),
(29, 'Visa', '1234567891234562', '$2y$10$QGF4OXYNBYhA5ew06E4SWenqHLgtkXJJqP0p.wMcGBKxtCBijxstC', 35),
(30, 'MasterCard', '1234567891234563', '$2y$10$I76qc3eikUR8h88NgsSXGe/ZvIiiryy99slnjXwjq4yr3t8pw9fTq', 70);

-- --------------------------------------------------------

--
-- Структура таблиці `films`
--

CREATE TABLE `films` (
  `film_id` int(11) NOT NULL,
  `film_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `film_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `film_cost` int(5) NOT NULL,
  `film_mark` int(1) NOT NULL,
  `mark_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `films`
--

INSERT INTO `films` (`film_id`, `film_title`, `film_description`, `film_cost`, `film_mark`, `mark_count`) VALUES
(1, 'film1', 'filmdescription1', 5, 5, 1),
(2, 'film2', 'filmdescription2', 7, 4, 1),
(3, 'film3', 'filmdescription3', 10, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `film_titles1`
--

CREATE TABLE `film_titles1` (
  `film_title_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `film_id`, `purchase_price`, `purchase_date`) VALUES
(69, 1, 1, 5, '2020-12-24 11:18:12'),
(70, 1, 1, 5, '2020-12-24 11:19:54'),
(71, 1, 1, 5, '2020-12-24 11:21:21'),
(72, 4, 3, 10, '2020-12-24 11:26:44'),
(73, 4, 1, 5, '2020-12-24 11:31:51'),
(74, 4, 3, 10, '2020-12-24 11:34:02'),
(75, 4, 1, 5, '2020-12-24 11:59:24'),
(76, 4, 2, 7, '2020-12-24 12:00:53');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `budget` int(11) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `country`, `reg_date`, `budget`, `admin`) VALUES
(1, 'User1', '$2y$10$bUj7tW.A4XZjlskWqO4Q5uY1oXuciKWBSyAsrEC5vhUN3p7qyHwBe', 'user1@gmail.com', 'Україна', '2020-12-16 18:45:14', 75, 0),
(2, 'User2', '$2y$10$LlQZkTtDS5IpL2vVym3VueXMJJz0seqPuX4yewgZS/Bn/8jyV8Exu', 'user2@gmail.com', 'Україна', '2020-12-16 18:58:42', 95, 0),
(3, 'User3', '$2y$10$lmjmIhp5lAQUwK65QWNtrOTBRpSiwH5K6nw2kNlmZwdMdC9.n7IpW', 'user3@gmail.com', 'Україна', '2020-12-17 22:28:49', 125, 0),
(4, 'Pyskor', '$2y$10$Zqe4AkBSZWyAsvA9LFqfZOWkh4Vv4RwdvGwMklbceAJyJ7Ow.R2a.', 'pyskoroleksiy@gmail.com', 'Україна', '2020-12-23 12:48:14', 0, 1);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `card_datas`
--
ALTER TABLE `card_datas`
  ADD PRIMARY KEY (`card_id`);

--
-- Індекси таблиці `card_monies`
--
ALTER TABLE `card_monies`
  ADD PRIMARY KEY (`card_id`);

--
-- Індекси таблиці `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`film_id`);

--
-- Індекси таблиці `film_titles1`
--
ALTER TABLE `film_titles1`
  ADD PRIMARY KEY (`film_title_id`);

--
-- Індекси таблиці `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `card_datas`
--
ALTER TABLE `card_datas`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT для таблиці `card_monies`
--
ALTER TABLE `card_monies`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблиці `films`
--
ALTER TABLE `films`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `film_titles1`
--
ALTER TABLE `film_titles1`
  MODIFY `film_title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблиці `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
