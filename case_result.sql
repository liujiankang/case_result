-- phpMyAdmin SQL Dump
-- version 4.4.15.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-05-30 20:49:54
-- 服务器版本： 5.5.48-log
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `case_result`
--

-- --------------------------------------------------------

--
-- 表的结构 `case_failed_detail`
--

CREATE TABLE IF NOT EXISTS `case_failed_detail` (
  `id` int(11) NOT NULL,
  `summaryId` int(11) NOT NULL,
  `step` varchar(500) DEFAULT NULL,
  `stackLog` text,
  `caseMethod` varchar(200) DEFAULT NULL,
  `caseDesc` text,
  `owner` varchar(20) DEFAULT NULL,
  `creatTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `case_summary`
--

CREATE TABLE IF NOT EXISTS `case_summary` (
  `id` int(11) NOT NULL,
  `packageName` varchar(200) NOT NULL COMMENT '包名',
  `version` varchar(20) DEFAULT NULL COMMENT '版本号',
  `module` varchar(200) DEFAULT NULL COMMENT '模块名称',
  `lable` varchar(200) DEFAULT NULL COMMENT '标签',
  `caseTotalNum` int(11) DEFAULT '1' COMMENT '总case条数',
  `caseFailedNum` int(11) DEFAULT '0' COMMENT '失败的case条数',
  `caseStartTime` datetime DEFAULT NULL COMMENT 'case开始时间',
  `caseEndTime` datetime DEFAULT NULL COMMENT 'case结束时间',
  `creatTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_failed_detail`
--
ALTER TABLE `case_failed_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_summary`
--
ALTER TABLE `case_summary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_failed_detail`
--
ALTER TABLE `case_failed_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `case_summary`
--
ALTER TABLE `case_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
