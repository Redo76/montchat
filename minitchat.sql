
CREATE DATABASE `minitchat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

-- minitchat.users definition

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(128) NOT NULL,
  `e_mail` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- minitchat.comments definition

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `comm_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comm_contenu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;