CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `contact` (`id`, `name`) VALUES
  (1, 'Testing'),
  (2, 'Testing2');
