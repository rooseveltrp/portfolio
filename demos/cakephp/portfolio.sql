DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `posts` (`id`, `user_id`, `title`, `contents`) VALUES
(1, 1, 'Welcome to my Blog!', 'Hi,<br />Welcome to my Sample Blog Application!');

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `users` (`id`, `admin`, `first_name`, `last_name`, `email_address`, `username`, `password`) VALUES
(1, 1, 'Roosevelt', 'Purification', 'dummy@roosevelt.guru', 'admin', '589cfea4bc4330584b55601f1d5456fdf45ed4ec'),
(2, 0, 'Average', 'Joe', 'joe@averagejoe.com', 'regular', '589cfea4bc4330584b55601f1d5456fdf45ed4ec');
