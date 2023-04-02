-- phpMyAdmin SQL Dump
-- version 3.3.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2023 at 11:11 AM
-- Server version: 5.1.44
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `books2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket_books`
--

CREATE TABLE IF NOT EXISTS `basket_books` (
  `id_bask` char(15) DEFAULT NULL,
  `id_book` int(5) DEFAULT NULL,
  `kolvo` int(2) DEFAULT NULL,
  `date_bask` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basket_books`
--

INSERT INTO `basket_books` (`id_bask`, `id_book`, `kolvo`, `date_bask`) VALUES
('ID6249b7bd73cfa', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id_book` int(5) NOT NULL AUTO_INCREMENT,
  `name_book` varchar(100) DEFAULT NULL,
  `id_publ` int(5) DEFAULT NULL,
  `id_cat` int(5) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `price` int(4) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_book`, `name_book`, `id_publ`, `id_cat`, `author`, `price`, `image`) VALUES
(1, 'Шерсть', 1, 1, 'Турция', 640, '.png'),
(2, 'Лен', 2, 1, 'Россия', 400, '.jpg'),
(3, 'Хлопок', 3, 1, 'Китай', 425, '.jpg'),
(4, 'Шелк', 3, 1, 'Китай', 720, '.jpg'),
(5, 'Кашемир', 1, 1, 'Турция', 314, '.jpg'),
(6, 'Хлопок', 2, 2, 'Россия', 425, '.jpg'),
(7, 'Синтетика', 2, 2, 'Россия', 720, '.jpg'),
(8, 'Ангора', 2, 2, 'Россия', 314, '.jpg'),
(9, 'Пуговицы', 2, 3, 'Россия', 100, '.jpg'),
(10, 'Бисер', 2, 3, 'Россия', 150, '.jpg'),
(11, 'Пайетки', 2, 3, 'Россия', 200, '.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_cat` int(5) NOT NULL AUTO_INCREMENT,
  `name_cat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cat`, `name_cat`) VALUES
(1, 'Ткани'),
(2, 'Нитки'),
(3, 'Аксессуары');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id_cust` int(5) NOT NULL AUTO_INCREMENT,
  `fam` varchar(30) DEFAULT NULL,
  `im` varchar(30) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `login` varchar(10) DEFAULT NULL,
  `pass` varchar(10) DEFAULT NULL,
  `subscribe` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_cust`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_cust`, `fam`, `im`, `addr`, `mail`, `login`, `pass`, `subscribe`) VALUES
(1, 'Афанасьев', 'Дмитрий', 'Ландышевая, 29', 'dmitriy061199@gmail.com', 'dima', 'dima', 0),
(2, 'Афанасьев', 'Дмитрий', 'Landyshivaya, 29', 'dmitriy061199@gmail.com', 'dimaa', '3672', 0),
(3, 'Afanasev', 'Dmitriy', 'Landyshivaya, 29', 'dmitriy061199@gmail.com', 'dimaaa', '3672', 1),
(4, 'Afanasev', 'Dmitriy', 'Landyshivaya, 29', 'dmitriy061199@gmail.com', 'dimaaaa', '3672', 1),
(5, 'Afanasev', 'Dmitriy', 'Landyshivaya, 29', 'dmitriy061199@gmail.com', 'dimaaaaa', '3672', 0),
(6, 'Afanasev', 'Dmitriy', 'Landyshivaya, 29', 'dmitriy061199@gmail.com', 'dimaaaaaa', '3672', 0),
(7, 'Afanasev', 'Dmitriy', 'Landyshivaya,', 'dmitriy061199@gmail.com', 'dmi', 'd', 0),
(8, 'Махмудова', 'Фируза', 'ul Politehnicheskaya 7', 'fmahmudova15@gmail.com', 'root', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `message_date` datetime NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `message`
--


-- --------------------------------------------------------

--
-- Table structure for table `message_content`
--

CREATE TABLE IF NOT EXISTS `message_content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `message_content`
--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int(5) NOT NULL AUTO_INCREMENT,
  `date_ord` date DEFAULT NULL,
  `id_cust` int(5) DEFAULT NULL,
  `dostavka` int(1) DEFAULT NULL,
  `bonus` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_books`
--

CREATE TABLE IF NOT EXISTS `order_books` (
  `id_order` int(3) DEFAULT NULL,
  `id_book` int(5) DEFAULT NULL,
  `kolvo` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_books`
--


-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `id_publ` int(5) NOT NULL AUTO_INCREMENT,
  `name_publ` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_publ`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id_publ`, `name_publ`) VALUES
(1, 'Шелк'),
(2, 'Лен'),
(3, 'Хлопок'),
(4, 'Кашемир');
