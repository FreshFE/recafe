-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 02 月 18 日 09:44
-- 服务器版本: 5.5.25
-- PHP 版本: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `recafe`
--

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `priority` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`cid`, `fid`, `name`, `fullname`, `priority`) VALUES
(1, 0, 'Food', '', 1),
(2, 1, '咖啡', '', 1),
(3, 1, '果汁', '', 2),
(4, 1, '快餐', '', 3);

-- --------------------------------------------------------

--
-- 表的结构 `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `hidden` tinyint(3) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  `customline` int(10) unsigned NOT NULL,
  `coverpath` char(26) NOT NULL,
  `price` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `food`
--

INSERT INTO `food` (`id`, `cid`, `title`, `content`, `hidden`, `updateline`, `createline`, `customline`, `coverpath`, `price`) VALUES
(7, 2, 'Happy birthday', '', 1, 1361173709, 1361151980, 1361116800, '2013/08/5121dccb5c535.jpg', 0);

-- --------------------------------------------------------

--
-- 表的结构 `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(26) NOT NULL,
  `basepath` char(16) NOT NULL,
  `typepath` char(1) NOT NULL,
  `subpath` char(8) NOT NULL,
  `savepath` char(26) NOT NULL,
  `saverule` char(13) NOT NULL,
  `originalname` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `extension` char(4) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `thumbname` varchar(50) NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `image`
--

INSERT INTO `image` (`id`, `name`, `basepath`, `typepath`, `subpath`, `savepath`, `saverule`, `originalname`, `type`, `extension`, `size`, `thumbname`, `updateline`, `createline`) VALUES
(1, '2013/08/5121dccb5c535.jpg', './upload/images/', 'o', '2013/08/', './upload/images/o/2013/08/', '5121dccb5c535', '1360826484.jpg', 'application/octet-stream', 'jpg', 48143, '212x137', 1361173707, 1361173707);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
