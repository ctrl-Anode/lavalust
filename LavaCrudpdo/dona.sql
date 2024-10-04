Create Database `gasco_donabel`;
Use `gasco_donabel`;
CREATE TABLE `dvg_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dvg_last_name` varchar(255) NOT NULL,
  `dvg_first_name` varchar(255) NOT NULL,
  `dvg_email` varchar(225) NOT NULL,
  `dvg_gender` varchar(225) NOT NULL,
  `dvg_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;