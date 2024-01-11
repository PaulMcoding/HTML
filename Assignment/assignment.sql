-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2023 at 09:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE `make` (
  `makeID` bigint(20) UNSIGNED NOT NULL,
  `makeName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`makeID`, `makeName`) VALUES
(1, 'BMW'),
(2, 'Mercedes'),
(3, 'Audi'),
(4, 'Porsche'),
(5, 'Toyota'),
(11, 'Vauxhall'),
(20, 'Honda'),
(22, 'Nissan');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `makeID` int(11) DEFAULT NULL,
  `modelID` bigint(20) UNSIGNED NOT NULL,
  `modelName` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `img_src` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`makeID`, `modelID`, `modelName`, `description`, `img_src`) VALUES
(1, 1, 'M5 Competition', 'The BMW M5 is a high-performance luxury sports sedan that boasts a powerful twin-turbocharged V8 engine, advanced all-wheel-drive system, sleek and aggressive exterior, luxurious interior, and a range of advanced technology and safety features.', 'https://images.alphacoders.com/919/thumb-1920-919806.jpg'),
(1, 2, '330e', 'The BMW 330e is a plug-in hybrid with a 2.0L engine and an electric motor producing 288hp. It has a 22-mile electric range, 71 MPGe, and advanced safety/tech features.', 'https://www.thedrive.com/content/2021/04/0DE48D67-5E94-4CB9-AA3F-12B43603D7C7_1_201_a.jpeg?quality=85&crop=16%3A9&auto=webp&optimize=high&quality=70&width=1440'),
(1, 3, 'M2', 'The BMW M2 is a high-performance sports car known for its muscular design and impressive horsepower. With a turbocharged 3.0-liter inline-six engine, it produces up to 405 horsepower and 406 lb-ft of torque.', 'https://www.topgear.com/sites/default/files/cars-car/image/2018/07/bmw_m2_comp_032.jpg'),
(2, 5, 'E63 S', 'The E63S is a powerful, high-performance luxury sedan with a 603 horsepower twin-turbo V8 engine and advanced all-wheel drive system.', 'https://media.autoexpress.co.uk/image/private/s--X-WVjvBW--/f_auto,t_content-image-full-desktop@1/v1654005246/autoexpress/2022/05/Mercedes%20E63%20Final%20Edition.jpg'),
(2, 6, 'S600 Maybach Mansory', 'The S600 Maybach is an ultra-luxury version of the Mercedes-Benz S-Class sedan, offering exceptional refinement, power, and comfort. It features a 6.0-liter V12 engine, capable of producing up to 523 horsepower and 612 lb-ft of torque.', 'https://www.tuningblog.eu/wp-content/uploads/2022/07/Mercedes-Maybach-S-Klasse-by-MANSORY-Z223-Tuning-2022-5-1-e1658924800666.jpg'),
(2, 7, 'AMG GTs', 'The Mercedes-AMG GT S is a high-performance sports car with sleek styling and a powerful twin-turbo V8 engine, delivering 515 horsepower and a top speed of 193 mph.', 'https://www.topgear.com/sites/default/files/images/news-article/2020/07/7b73a94e389b80cf5b01a62e3a3b5a0f/20c0379_002.jpg'),
(3, 8, 'RS6 Avant', 'The Audi RS6 Avant is a high-performance luxury wagon that combines speed, power, and practicality. With a twin-turbo V8 engine, it can accelerate from 0 to 60 mph in just 3.5 seconds.', 'https://images6.alphacoders.com/107/1070091.jpg'),
(3, 9, 'S8', 'The Audi S8 is a luxurious and powerful sedan, featuring a 4.0-liter V8 engine that produces 563 horsepower and a top speed of 155 mph. It offers a spacious and sophisticated interior, advanced technology, and a smooth and comfortable ride.', 'https://www.topgear.com/sites/default/files/2022/06/Medium-29191-AudiS8TFSIquattro.jpg'),
(3, 11, 'A7 sportback', 'The Audi A7 Sportback is a stylish and luxurious four-door coupe with advanced technology, powerful engines, and a comfortable interior.', 'https://cdn.motor1.com/images/mgl/nn6YR/s1/2020-audi-a7-sportback-e-quattro.jpg'),
(4, 12, 'Cayenne', 'The Porsche Cayenne is a luxury SUV with excellent performance and handling. It offers powerful engines, spacious cabin, and advanced technology.', 'https://images7.alphacoders.com/880/880367.jpg'),
(4, 13, '911 Turbo S', 'The Porsche 911 Turbo S is a high-performance sports car with a 3.8-liter twin-turbocharged flat-six engine producing 640 horsepower and 590 lb-ft of torque and a top speed of 205mph', 'https://www.motortrend.com/uploads/sites/5/2020/03/2021-Porsche-911-Turbo-S-Coupe-5.jpg'),
(4, 14, '911 GT3 RS', 'The Porsche 911 GT3 RS is a high-performance sports car known for its track-focused design and precision handling. It boasts a powerful engine and advanced aerodynamics for thrilling performance on the road and track.', 'https://wallpapercave.com/wp/wp6782526.jpg'),
(2, 15, 'S65 AMG', 'The Mercedes-Benz S65 AMG is a high-performance luxury sedan that is equipped with a powerful 6.0-liter V12 biturbo engine. This engine delivers an impressive 621 horsepower and 738 lb-ft of torque.', 'https://www.topgear.com/sites/default/files/images/news-article/2019/03/c57af2ee3138938a6bc7a5d9ec153815/19c0164_002.jpg'),
(5, 16, 'Supra', 'The A80 Toyota Supra is a fourth-generation sports car that was produced from 1993 to 2002. Its known for its sleek, aerodynamic design and powerful twin-turbocharged engine, making it a popular choice among car enthusiasts.', 'https://www.topgear.com/sites/default/files/news-listicle/image/1993-toyota-supra-twin-turbo-sport-roof-_0.jpg'),
(11, 19, 'Astra', 'Astra by Vauxhall: compact car. Popular in Europe. Known for fuel efficiency, affordability, and versatility. In production since 1979, currently in seventh generation.', 'https://www.topgear.com/sites/default/files/cars-car/carousel/2019/08/jf1_1624-edit.jpg'),
(11, 30, 'Corsa', 'Vauxhall Corsa: subcompact car by Vauxhall Motors. Compact size, fuel-efficient, affordable. In production since 1982, currently in sixth generation.', 'https://www.topgear.com/sites/default/files/2021/09/2%20Vauxhall%20Corsa.JPG'),
(4, 32, '911 Dakar', 'The Porsche 911 Dakar is a rally car version of the iconic Porsche 911, modified for off-road racing with enhanced suspension and engine power.', 'https://i.gaw.to/content/photos/55/96/559699-2023-porsche-911-dakar.jpeg'),
(20, 33, 'Acty', 'The Honda Acty is a small commercial vehicle manufactured by Honda since 1977. It is a versatile and compact utility vehicle that is commonly used for commercial purposes such as delivering goods, as well as for recreational activities like camping and outdoor adventures. ', 'https://i.pinimg.com/originals/9b/8f/64/9b8f647121ab0aec64be905e54ef1d8e.jpg'),
(22, 41, 'GTR', 'The original GTR (Grand Touring Racing) was the Skyline GT-R, which was introduced by Nissan in 1969. The first generation Skyline GT-R, also known as the \"Hakosuka\" (meaning \"boxy Skyline\" in Japanese), was powered by a 2.0-liter inline-six engine and featured a sport-tuned suspension, advanced technology for its time, including a limited-slip differential and four-wheel disc brakes.', 'https://imageio.forbes.com/blogs-images/peterlyon/files/2018/11/Screenshot-2018-12-01-11.50.00.png?format=png&width=1200'),
(22, 42, 'GTR R-31', 'The GTR R31 (Skyline GT-R) is a high-performance sports car produced by Nissan from 1985 to 1990. It was the second generation of the Skyline GT-R and was powered by a turbocharged 2.0-liter inline-six engine that produced 210 horsepower and 195 lb-ft of torque.', 'https://i.pinimg.com/736x/b5/9c/d4/b59cd40127e2d62b5867531f943a1dcc.jpg'),
(22, 43, 'GTR R-32', 'The GTR R32 (Skyline GT-R) is a high-performance sports car produced by Nissan from 1989 to 1994. It was the third generation of the Skyline GT-R and featured advanced technology such as all-wheel drive and a twin-turbocharged RB26DETT engine.', 'https://car-images.bauersecure.com/wp-images/1372/skyline_01.jpg'),
(22, 44, 'GTR R-33', 'The R33 GTR (Skyline GT-R) is a high-performance sports car produced by Nissan from 1995 to 1998. It is the third generation of the Skyline GT-R and features a turbocharged 2.6-liter inline-six engine that produces up to 330 horsepower and 293 lb-ft of torque. ', 'https://images.pistonheads.com/nimg/45410/R33GTR_01.jpg'),
(22, 45, 'GTR R-34', 'The R34 GTR is a high-performance sports car produced by Nissan from 1999 to 2002. It was the successor to the R33 GTR and featured a twin-turboed RB26 engine.\r\nIt is highly sought after by car enthusiasts and is considered a Japanese icon.', 'https://blog.way.com/wp-content/uploads/2022/11/Nissan-Skyline-GT-R-R34.jpg'),
(22, 46, 'GTR R-35', 'The R35 GTR (Nissan GT-R) is a high-performance sports car produced by Nissan since 2007. It is the current generation of the GTR line of vehicles and features a twin-turbocharged 3.8-liter V6 engine that produces up to 600 horsepower and 481 lb-ft of torque.', 'https://upload.wikimedia.org/wikipedia/commons/7/7c/2018_Nissan_GT-R_Premium_in_Super_Silver%2C_Front_Right%2C_10-11-2022.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `model_old`
--

CREATE TABLE `model_old` (
  `makeID` int(11) DEFAULT NULL,
  `modelID` bigint(20) UNSIGNED NOT NULL,
  `modelName` varchar(40) DEFAULT NULL,
  `likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model_old`
--

INSERT INTO `model_old` (`makeID`, `modelID`, `modelName`, `likes`) VALUES
(1, 1, 'M5', 30),
(1, 2, 'M550i', 3),
(1, 3, '330e', 1),
(1, 4, 'M2', 4),
(2, 5, 'E63S', 4),
(2, 6, 'S550', 6),
(2, 7, 'S63', 5),
(2, 8, 'S600 Maybach', 13),
(3, 9, 'RS6', 4),
(3, 10, 'RS6 Avant', 7),
(3, 11, 'A8', 2),
(3, 12, 'S8', 9),
(4, 13, 'Cayenne', 5),
(4, 14, '911 Turbo S', 8),
(4, 15, '911 GT3 RS', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` bigint(20) UNSIGNED NOT NULL,
  `UserName` varchar(16) NOT NULL,
  `UserEmail` varchar(60) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `UserName`, `UserEmail`, `Password`) VALUES
(1, 'Admin', 'Admin@carsandbuys.com', 'Admin'),
(28, 'Paul', '36paulmurnane@gmail.com', 'Paul'),
(29, 'KarlHopps', 'Karl.hopps@gmail.com', 'KarlIsCool'),
(30, 'MaximusPontifex', 'maximus@gmail.com', 'Pontifex123'),
(31, 'FlaviaVesta', 'flavia@gmail.com', 'VestaPriestess'),
(32, 'LuciusAugur', 'lucius@gmail.com', 'Augur456'),
(33, 'JuliaCybele', 'julia@gmail.com', 'CybelePriestess');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`makeID`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD UNIQUE KEY `modelID` (`modelID`),
  ADD UNIQUE KEY `modelName` (`modelName`);

--
-- Indexes for table `model_old`
--
ALTER TABLE `model_old`
  ADD PRIMARY KEY (`modelID`),
  ADD UNIQUE KEY `modelName` (`modelName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `UID` (`UID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `make`
--
ALTER TABLE `make`
  MODIFY `makeID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `modelID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `model_old`
--
ALTER TABLE `model_old`
  MODIFY `modelID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
