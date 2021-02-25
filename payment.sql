

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE IF NOT EXISTS `creditCard` (
  /*`id` int(11) NOT NULL ,*/
  `name` varchar(200) NOT NULL,
  `cardnum` int(255) NOT NULL ,
  `cvv` int(20) NOT NULL,  
    `year` varchar(100) NOT NULL,
`month` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT  IGNORE INTO `creditCard` ( `name`,`cardnum`,`cvv`, `year`,`month`) VALUES
( 'rola', '1111','123', '2028','september'),
( 'ganna','2222', '123','2027','october'),
( 'yara', '3333','123','2026','april');

ALTER TABLE `creditCard`
  ADD PRIMARY KEY (`cardnum`);

ALTER TABLE `creditCard`
  MODIFY `cardnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;






