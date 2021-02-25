SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id`int(10)  NOT NULL,
`category` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  `price` varchar(30) NOT NULL,
  `totalPrice` varchar(30) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);
  
  ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;