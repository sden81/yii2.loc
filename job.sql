-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 06 2017 г., 21:59
-- Версия сервера: 10.1.22-MariaDB
-- Версия PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `job`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `source_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `auth`
--

INSERT INTO `auth` (`id`, `user_id`, `source`, `source_id`) VALUES
(4, 5, 'facebook', '309635112708214'),
(5, 6, 'vkontakte', '198986694'),
(6, 9, 'vkontakte', '49388089');

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `idjobs` int(11) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `location` varchar(100) DEFAULT NULL,
  `salary` mediumint(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `jobs`
--

INSERT INTO `jobs` (`idjobs`, `company_name`, `title`, `description`, `location`, `salary`, `uid`, `created_at`, `updated_at`, `address`) VALUES
(6, 'Google', 'Software Engineer', 'ffasf', '0', NULL, 1, 1468762337, 1468762339, 'Street 11 New York'),
(7, 'Apple', 'PHP Developer', 'ffasf', '0', NULL, 1, 1468762338, 1468762339, 'Street 11 New York'),
(8, 'Mail.Ru', 'Software Engineer', 'ffasf', '0', NULL, 1, 1468762339, 1468762339, 'Street 21 New York'),
(9, 'Yandex', 'Senior Software Engineer', 'ffasf', '0', NULL, 1, 1468762340, 1468762339, 'Street 12 New York'),
(10, 'Mail.Ru', 'Front End Developer', 'ffasf', '0', NULL, 1, 1468762341, 1468762339, 'Street 22 New York');

-- --------------------------------------------------------

--
-- Структура таблицы `jobs_categories`
--

CREATE TABLE `jobs_categories` (
  `idjobs_categories` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `jobs_categories`
--

INSERT INTO `jobs_categories` (`idjobs_categories`, `category`) VALUES
(1, 'Accounting'),
(2, 'Education '),
(3, 'Manufacturing'),
(4, 'Engineering'),
(5, 'Building & Construction'),
(6, 'Information Technology (IT)'),
(7, 'Design');

-- --------------------------------------------------------

--
-- Структура таблицы `jobs_cats_relation`
--

CREATE TABLE `jobs_cats_relation` (
  `jobs_idcats` int(11) NOT NULL,
  `jobs_idjobs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `jobs_cats_relation`
--

INSERT INTO `jobs_cats_relation` (`jobs_idcats`, `jobs_idjobs`) VALUES
(5, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1468753614),
('m130524_201442_init', 1470767131),
('m160719_184240_add_birth_column_to_user_table', 1468953830),
('m160722_172200_add_auth_table', 1469208178),
('m160722_182157_add_github_column_to_user_table', 1469308337),
('m160723_211126_add_address_column_to_jobs_table', 1469308341),
('m160727_175505_add_fio_column_to_user_table', 1469642126),
('m160727_195415_add_counter_column_to_resume_table', 1469650204),
('m160809_182204_tbl_test', 1470767159);

-- --------------------------------------------------------

--
-- Структура таблицы `notify`
--

CREATE TABLE `notify` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notif` smallint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `notify`
--

INSERT INTO `notify` (`id`, `text`, `created_at`, `notif`) VALUES
(1, 'У нас появилась новая новость', '2016-08-26 16:19:33', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `resume`
--

CREATE TABLE `resume` (
  `idresume` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `skills` text,
  `uid` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `counter` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`idresume`, `title`, `skills`, `uid`, `created_at`, `updated_at`, `counter`) VALUES
(2, 'PHP', 'fasf421421', NULL, 1468860664, 1498498910, 0),
(3, 'Java', 'fasf421421', 1, 1478860664, 1468863158, 0),
(4, 'Vacy Pupkin', 'Programming', 10, 1498499113, 1498985220, 0),
(5, 'dasd', 'asdasd', 10, 1498500256, 1498500256, 0),
(6, 'dasd', 'asdasd', 10, 1498500501, 1498500501, 0),
(7, 'dasd', 'adads', 10, 1498732043, 1498732043, 0),
(8, 'asdasd', 'asdasd', 10, 1498765757, 1498765757, 0),
(9, 'asdasd', 'asdeqwe', 10, 1498913906, 1498913906, 0),
(10, 'dasd', 'asdsa', 10, 1498931090, 1498931090, 0),
(11, 'dasd', 'asdsa', 10, 1498931102, 1498931102, 0),
(12, 'dasd', 'asdsa', 10, 1498931142, 1498931142, 0),
(13, 'dasd', 'asdsa', 10, 1498931148, 1498931148, 0),
(14, 'asdasd', 'asdasd', 10, 1498933352, 1498933352, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `resume_education`
--

CREATE TABLE `resume_education` (
  `idresume_education` int(11) NOT NULL,
  `education_name` varchar(100) DEFAULT NULL,
  `faculty` varchar(50) DEFAULT NULL,
  `resume_idresume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `resume_education`
--

INSERT INTO `resume_education` (`idresume_education`, `education_name`, `faculty`, `resume_idresume`) VALUES
(8, 'School1', 'Company1', 2),
(9, 'School2', 'Company2', 2),
(11, 'asdasd', 'asdasd', 5),
(32, 'asd', 'asd', 6),
(55, 'asd', 'asd', 9),
(58, 'asd', 'asd', 7),
(59, 'sdsd', 'sdsd', 7),
(64, 'asdasd', 'sadasda', 11),
(65, 'asdasd', 'sadasda', 12),
(69, 'asdads', 'asdasd', 8),
(70, 'asdasd', 'asdasd', 14),
(71, 'asdasd', 'sadasda', 13),
(73, 'Scool1', '9 grade', 4),
(74, 'asdasd', 'sadasda', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `resume_work`
--

CREATE TABLE `resume_work` (
  `idresume_work` int(11) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `description` text,
  `date_job` varchar(50) DEFAULT NULL,
  `resume_idresume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `resume_work`
--

INSERT INTO `resume_work` (`idresume_work`, `company_name`, `description`, `date_job`, `resume_idresume`) VALUES
(10, 'Company3', 'Company DESC 3', '2016-07-02 2016-07-04', 3),
(28, 'asdas', 'adasd', '2017-07-14 2017-07-12', 14),
(29, 'asdasd', 'dasd', '2017-07-12 2017-07-10', 14),
(30, 'dfsdf', 'asdasd', '2017-07-19 2017-07-19', 13),
(31, 'asdasd', 'asdasd', '2017-07-13 2017-07-04', 13),
(33, 'Polet', 'teacher', '2016-07-13 2017-07-16', 4),
(34, 'niis', 'director', '2017-07-20 2017-07-31', 4),
(35, 'MS', 'Micro$oft', '2014-07-18 2016-12-31', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `birth` date DEFAULT NULL,
  `github` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `birth`, `github`, `fio`, `avatar`) VALUES
(1, 'optimus', 'hcSf_35QE3hNqjuaV5qhYLUzqv_7bStw', '$2y$13$.if0ZdqYqOO8UdSLKL2g7.O5RUrwq.cblA79Mu3KFlOimYQP2wWsq', NULL, 'optimus58@mail.ru', 10, 1468753903, 1470942659, '2016-07-02', '', 'Купцов Руслан', ''),
(5, 'onlineschoolprog@gmail.com', 'p2Jhul_3r2QQ1hhxQtr8cugSHyeud5R3', '$2y$13$B148MsDWd/w9V0t6heyn9uZzdGMmg2PLc5xRIMiwPRZZAouOdtw6S', '_LBPqTglyiCNvG6wuGLRePrd9tUPJupV_1469284799', 'onlineschoolprog@gmail.com', 10, 1469284799, 1469284799, NULL, 'onlineschoolprog@gmail.com', NULL, ''),
(6, 'rkuptsov1989', 'GAWFNJ5ArHttJc4oeV3bSpbIYB99NR9v', '$2y$13$xN.vVbLrXyh.DdoFLhp5yOlg/wQwjrtUiaf7dQd6.E6NfAZ96QKuG', 'c2_nfeTnSqHUMvrpolVO4f3ki0yfAvS9_1470949098', NULL, 10, 1470949098, 1470949098, NULL, 'rkuptsov1989', NULL, ''),
(8, 'optimus2', 'hcSf_35QE3hNqjuaV5qhYLUzqv_7bStw', '$2y$13$.if0ZdqYqOO8UdSLKL2g7.O5RUrwq.cblA79Mu3KFlOimYQP2wWsq', NULL, 'optimus@mail.ru', 10, 1468753903, 1470942659, '2016-07-02', '', 'Купцов Руслан2', ''),
(9, 'id49388089', 'KMv_HTHHmVlP3h_j86BswSbiESxCzz3F', '$2y$13$QDoc1gQOwmSeTo3XcVfsou11h/NC1XjuyQARyEwksw0Kx0C665CK.', 'luZ2KOm2g6AcCDd81JOtpokEMALqGt6F_1471776935', NULL, 10, 1471776935, 1471776935, NULL, 'id49388089', NULL, ''),
(10, 'den', 'lJQqXyLEKWvujzTv0zkfhhrxj9S_Xa4U', '$2y$13$vqOn5ucb1kyG/2CwqMPXPe.oGSqu4dK//rahUCVbA5gowFW.yyVAi', NULL, 'sd@23.ru', 10, 1498280892, 1498280892, NULL, NULL, NULL, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-auth-user_id-user-id` (`user_id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`idjobs`),
  ADD UNIQUE KEY `idjobs_UNIQUE` (`idjobs`);

--
-- Индексы таблицы `jobs_categories`
--
ALTER TABLE `jobs_categories`
  ADD PRIMARY KEY (`idjobs_categories`),
  ADD UNIQUE KEY `idjobs_categories_UNIQUE` (`idjobs_categories`);

--
-- Индексы таблицы `jobs_cats_relation`
--
ALTER TABLE `jobs_cats_relation`
  ADD KEY `fk_jobs_cats_relation_jobs_idx` (`jobs_idjobs`),
  ADD KEY `fk_id_cats` (`jobs_idcats`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`idresume`),
  ADD UNIQUE KEY `idresume_UNIQUE` (`idresume`);

--
-- Индексы таблицы `resume_education`
--
ALTER TABLE `resume_education`
  ADD PRIMARY KEY (`idresume_education`),
  ADD KEY `fk_resume_education_resume1_idx` (`resume_idresume`);

--
-- Индексы таблицы `resume_work`
--
ALTER TABLE `resume_work`
  ADD PRIMARY KEY (`idresume_work`),
  ADD KEY `fk_resume_work_resume1_idx` (`resume_idresume`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `idjobs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `jobs_categories`
--
ALTER TABLE `jobs_categories`
  MODIFY `idjobs_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `resume`
--
ALTER TABLE `resume`
  MODIFY `idresume` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `resume_education`
--
ALTER TABLE `resume_education`
  MODIFY `idresume_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT для таблицы `resume_work`
--
ALTER TABLE `resume_work`
  MODIFY `idresume_work` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `fk-auth-user_id-user-id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `jobs_cats_relation`
--
ALTER TABLE `jobs_cats_relation`
  ADD CONSTRAINT `fk_jobs_cats_relation_jobs` FOREIGN KEY (`jobs_idjobs`) REFERENCES `jobs` (`idjobs`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `resume_education`
--
ALTER TABLE `resume_education`
  ADD CONSTRAINT `fk_resume_education_resume1` FOREIGN KEY (`resume_idresume`) REFERENCES `resume` (`idresume`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `resume_work`
--
ALTER TABLE `resume_work`
  ADD CONSTRAINT `fk_resume_work_resume1` FOREIGN KEY (`resume_idresume`) REFERENCES `resume` (`idresume`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
