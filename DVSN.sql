/* DVSN SQL */

CREATE TABLE IF NOT EXISTS `dvsn_feed` (
`id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `contents` text NOT NULL,
  `by` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `dvsn_user` (
`id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `dvsn_user` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `image`, `ip`) VALUES
(1, 'John', 'Doe', 'John123', '924f96322231b95f18fc4c03bc30c48f', 'john.doe@example.com', 'mountain.jpeg', '192.168.0.1\r\n');

ALTER TABLE `dvsn_feed`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `dvsn_user`
 ADD PRIMARY KEY (`id`);
