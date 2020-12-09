SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `Product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `description` TEXT NULL,
  `image` varchar(100) NULL,
  `status` int NULL,
  `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `update_at` DATETIME ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Product` (`title`, `description`, `image`, `status`) VALUES
("BMWi8", 'BMW car', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/2016_BMW_i8.jpg/799px-2016_BMW_i8.jpg', 0),
("Vonvol", 'Trunk', 'https://www.motortrend.com/uploads/sites/5/2020/06/2020-Volvo-XC90-T8-E-AWD-Inscription-30.jpg',1),
("Kia", 'Family car', 'https://imgd.aeplcdn.com/0x0/n/cw/ec/41523/sonet-exterior-right-front-three-quarter-108.jpeg' , 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
