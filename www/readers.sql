CREATE DATABASE IF NOT EXISTS reader;
 
USE reader;
--
-- Table structure for table `tasks`
--
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `sources` (
  `sourcename` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`sourcename`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `users_have_sources` (
  `userid` int(11) NOT NULL,
  `sourcename` varchar(200) NOT NULL,
  PRIMARY KEY (`sourcename`,`userid`),
  FOREIGN KEY (userid) REFERENCES users(userid),
  FOREIGN KEY (sourcename) REFERENCES sources(sourcename)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `yournews` (
  `userid` int(11) NOT NULL,
  `sourcename` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pubdate` varchar(200),
  `content` varchar(20000),
  PRIMARY KEY (`userid`,`title`)
) ;



			

--
-- Dumping data for table `tasks`
--

INSERT INTO `users` (`userid`, `username`, `password`, `created_at`) VALUES
(1, 'user1', 1, 1390815970),
(2, 'user2', 1, 1390815993),
(3, 'user3', 1, 1390817659),
(4, 'user4', 1, 1390818389);


INSERT INTO `sources` (`sourcename`, `url` , ranking) VALUES
('rthk local', 'http://rthk.hk/rthk/news/rss/e_expressnews_elocal.xml'),
('Football | The Guardian', 'https://www.theguardian.com/football/rss'),
('BBC Sport - Football', 'http://feeds.bbci.co.uk/sport/football/rss.xml?edition=int'),
('rthk global', 'http://rthk9.rthk.hk/rthk/news/rss/e_expressnews_einternational.xml');

INSERT INTO `users_have_sources` (`userid`,`sourcename`) VALUES
(1, 'rthk local'),
(1, 'rthk global');



