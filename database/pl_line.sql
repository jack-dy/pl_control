-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 �?09 �?20 �?17:56
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `pl_line`
--

-- --------------------------------------------------------

--
-- 表的结构 `pl_admin`
--

CREATE TABLE IF NOT EXISTS `pl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL COMMENT '账号',
  `key` varchar(20) NOT NULL COMMENT '权限',
  `password` varchar(40) NOT NULL COMMENT '密码',
  `nickname` varchar(20) NOT NULL COMMENT '名称',
  `token` varchar(200) NOT NULL,
  `update_time` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `pl_admin`
--

INSERT INTO `pl_admin` (`admin_id`, `user`, `key`, `password`, `nickname`, `token`, `update_time`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', '管理员', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1Njg4ODE0NDksImV4cCI6MTU2OTA1NDI0OSwibmJmIjoxNTY4ODgxNTA5LCJpc3MiOiJKb2huIFd1IEpXVCIsImF1ZCI6ImxvY2FsaG9zdCIsInVpZCI6IjEiLCJ1c2VybmFtZSI6Ilx1N2JhMVx1NzQ', '1568881449');

-- --------------------------------------------------------

--
-- 表的结构 `pl_category`
--

CREATE TABLE IF NOT EXISTS `pl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `pl_category`
--

INSERT INTO `pl_category` (`category_id`, `name`, `sort`, `create_time`) VALUES
(1, '122', 103, 1568945030),
(2, '2', 100, 1568945030),
(3, '4', 100, 1562062619);

-- --------------------------------------------------------

--
-- 表的结构 `pl_goods`
--

CREATE TABLE IF NOT EXISTS `pl_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `pics` text NOT NULL,
  `price` float NOT NULL,
  `sort` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '状态（0：下架，1：上架）',
  `is_delete` int(11) NOT NULL,
  `create_time` int(40) NOT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pl_news`
--

CREATE TABLE IF NOT EXISTS `pl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL COMMENT '标题',
  `times` int(11) NOT NULL COMMENT '时间',
  `content` text NOT NULL COMMENT '内容',
  `create_time` varchar(20) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
