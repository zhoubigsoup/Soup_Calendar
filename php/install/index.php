<?php
require_once("/functions/function_main.php");
$sql=<<<EOT

-- 主机: localhost
-- 生成日期: 2018 年 01 月 16 日 22:54
-- 服务器版本: 5.6.35-log
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- 表的结构 `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `fid` int(20) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `top` int(11) DEFAULT '0',
  `topic` varchar(50) CHARACTER SET utf8 NOT NULL,
  `describtion` varchar(50) CHARACTER SET utf8 NOT NULL,
  `text` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `author` varchar(50) CHARACTER SET utf8 NOT NULL,
  `part` int(20) NOT NULL,
  `imagepath` varchar(100) NOT NULL,
  `thumb` int(15) DEFAULT '0',
  `visible` varchar(20) DEFAULT 'true',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `forum`
--

INSERT INTO `forum` (`fid`, `date`, `top`, `topic`, `describtion`, `text`, `author`, `part`, `imagepath`, `thumb`, `visible`) VALUES
(11, '2018-01-12 16:37:57', 0, '欢迎来到汤块云教程网', 'Souper是一个由SoupCraft（汤块云）团队制作的我的世界..', '[h3]Souper是一个由SoupCraft（汤块云）[图片]http://s2.46c46.com/themes/default/images/icons/logo_soupcraft.png[/图片]团队制作的我的世界腐竹教程网站。的在这里，您可以和您志同道合的腐竹们共同学习开服技术，一起进步成为大神！[高兴][/h3]\r\n祝大家使用愉快！', '周大汤', 1, 'assets/images/flat6.jpg', 142, 'true');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(50) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `text` varchar(500) NOT NULL,
  `comefrom` varchar(50) NOT NULL,
  `toUser` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `viewed` int(10) DEFAULT '0',
  `smid` int(11) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`mid`, `title`, `text`, `comefrom`, `toUser`, `type`, `date`, `viewed`, `smid`) VALUES
(15, '欢迎来到Souper大家庭！', '在这里，您可以通过学习我们的教程来提高您的开服水平，祝您使用愉快！', '系统消息', '周大汤', 'system_Msg', '2018-01-11 14:46:10', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `part`
--

CREATE TABLE IF NOT EXISTS `part` (
  `pid` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `describtion` varchar(300) NOT NULL,
  `type` varchar(50) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `icon` varchar(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `part`
--

INSERT INTO `part` (`pid`, `name`, `describtion`, `type`, `admin`, `icon`) VALUES
(1, '新手教程', '给MC开服小白的教程', 'visitor', '周大汤', 'am-icon-book'),
(2, '开服工具', '开服工具的使用教程', 'visitor', '周大汤', 'am-icon-yelp'),
(3, '资源中心', 'MC资源中心', 'user', '周大汤', 'am-icon-file');

-- --------------------------------------------------------

--
-- 表的结构 `sys_msg`
--

CREATE TABLE IF NOT EXISTS `sys_msg` (
  `mid` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sys_msg`
--

INSERT INTO `sys_msg` (`mid`, `title`, `text`, `date`) VALUES
(1, '欢迎来到Souper大家庭！', '在这里，您可以通过学习我们的教程来提高您的开服水平，祝您使用愉快！', '2018-01-11 14:46:10');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `xp` int(50) DEFAULT '40',
  `email` varchar(100) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `type` varchar(20) DEFAULT 'user',
  `status` int(11) DEFAULT '0',
  `code` varchar(50) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

EOT;
queryMySQL($sql);
echo '安装完成！';
?>