-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2014 at 05:47 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `manage_image`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authassignment`
--

CREATE TABLE IF NOT EXISTS `tbl_authassignment` (
  `itemname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authuser`
--

CREATE TABLE IF NOT EXISTS `tbl_authuser` (
  `authId` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(2) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  `ordering` int(4) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`authId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clientauths`
--

CREATE TABLE IF NOT EXISTS `tbl_clientauths` (
  `authId` int(11) NOT NULL AUTO_INCREMENT,
  `authKey` varchar(300) NOT NULL,
  `authCode` varchar(300) NOT NULL,
  `authClient` varchar(300) NOT NULL,
  `expIrationDate` datetime NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`authId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_imageduan`
--

CREATE TABLE IF NOT EXISTS `tbl_imageduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_image` varchar(500) NOT NULL,
  `id_group` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share`
--

CREATE TABLE IF NOT EXISTS `tbl_share` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_image` varchar(300) NOT NULL,
  `use_share` varchar(100) NOT NULL,
  `use_recive` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `access_token` text NOT NULL,
  `facebook_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `language` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userduan`
--

CREATE TABLE IF NOT EXISTS `tbl_userduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `userGroup` varchar(20) NOT NULL,
  `language` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
