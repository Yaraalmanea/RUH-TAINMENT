-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 18, 2022 at 05:52 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RUH-TAINMENT`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `username` varchar(24) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`username`, `first_name`, `last_name`, `password`) VALUES
('YaraAlmanea', 'yara', 'almanea', '$2y$10$Z5aHn78WMwx2rfV1vg98luUXptj6WoCcjMxdj5mr1xmctZD0PCzZa');

-- --------------------------------------------------------

--
-- Table structure for table `Place`
--

CREATE TABLE `Place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `age_category` varchar(8) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `location` varchar(15000) DEFAULT NULL,
  `Description` varchar(255) NOT NULL,
  `featured` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Place`
--

INSERT INTO `Place` (`place_id`, `place_name`, `age_category`, `photo`, `location`, `Description`, `featured`) VALUES
(2, 'Winter Wonderland', 'Family', 'uploads/627d2a1e2353d6.93694860winter-wonderland.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.913341909328!2d46.65004438502624!3d24.76416018409945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee33aa8756fef%3A0x528fc41fa973ad80!2z2YjZhtiq2LEg2YjZhtiv2LEg2YTYp9mG2K8g2KfZhNix2YrYp9i2!5e0!3m2!1sar!2ssa!4v1649544634850!5m2!1sar!2ssa', ' A limited-time theme park by Riyadh Season featuring games and events with more than 103 games including Skyloop, Horror House & skating rink.', '0'),
(3, 'Bobs Famous Bowling', 'Family', 'uploads/627e4edcc3d933.43144615bob-b.png', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14494.91705810082!2d46.6307768!3d24.7361733!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x688c5518ff149eed!2sBOB&#39;s!5e0!3m2!1sen!2ssa!4v1652852925273!5m2!1sen!2ssa', 'One of the latest bowling alleys that offer modern alleys with 16 swish lanes as well as arcade games, comfy seating, and delicious food altogether! ', '0'),
(4, 'Padel Rush', 'Family', 'uploads/627e4fa230ce40.10740111padelrush.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.7213213836567!2d46.60045191426526!3d24.770742354949693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee3a6c3ea658b%3A0x4619339e8e05f9fc!2sPadel%20Rush!5e0!3m2!1sen!2sus!4v1652445018493!5m2!1sen!2sus', 'Padel Rush is the ultimate destination for players looking to either learn the sport or have fun with friends.  Unleash your talents with the padel sport!', '1'),
(5, 'Top Gun', 'Adult', 'uploads/627e507100b253.68907290topgun.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.464123613681!2d46.37397921427592!3d25.254968035553414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2c1d19ff927a53%3A0xb3d9b8cfd427641b!2sTop%20Gun!5e0!3m2!1sen!2sus!4v1652445237852!5m2!1sen!2sus', 'The biggest shooting range in the Middle East, it is more than just an ordinary shooting range and is equipped with 39 shooting targets.', '0'),
(6, 'Doos Karting', 'Adult', 'uploads/627e511b9bc928.73218868doos2.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.054231662722!2d46.595025314264966!3d24.759329655402663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee3045206a5e7%3A0xcd82588f24284042!2sDoos%20karting!5e0!3m2!1sen!2sus!4v1652445382598!5m2!1sen!2sus', 'The first indoor electric Karting track in KSA! Come and experience the thrill of facing off against motorsport fans at our Karting circuit.', '0'),
(7, 'Archery Range', 'Family', 'uploads/627e51a0c575d7.89790957archery-range.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115955.6854985807!2d46.45262002944948!3d24.74008856675732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee1f551220a4f%3A0x38a8fea7cc30110!2zQXJjaGVyeSBSYW5nZSDwn46vINmF2YrYr9in2YYg2KfZhNiz2YfYp9mF!5e0!3m2!1sen!2sus!4v1652445545073!5m2!1sen!2sus', 'Pick up a bow & arrow, draw the string, aim & shoot! Expert archers are here to teach you, come & show us what you have got! ', '0'),
(8, 'Bounce', 'Children', 'uploads/627e52fdc962b5.39341036bounce--.jpeg', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d463820.8659066398!2d46.2424569!3d24.7405915!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f01518a72ae8b%3A0xe599aaaf16e93bb8!2sBOUNCE%20Riyadh!5e0!3m2!1sen!2ssa!4v1652445928447!5m2!1sen!2ssa', ' A Freestyle Playground with exciting freestyle activities like wall-to-wall trampolines, climbing and an adventure challenge course, let us get immersed in the adventure!', '0'),
(9, 'Firstaiment', 'Family', 'uploads/627e5385253738.67988742firstaiment.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.43896630327!2d46.77722061615882!3d24.848852908341176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2efed9fcdc0fe5%3A0x88e8bce730bf6ac5!2sFirstaiment!5e0!3m2!1sen!2ssa!4v1652446036735!5m2!1sen!2ssa', 'The first and largest paintball center in the Middle East, it combines excitement and enthusiasm in the experience of the player, where they hunt each other in a dynamic challenge.  ', '1'),
(10, 'Squid Game', 'Family', 'uploads/627e53f9cdde88.11171524squid-game.webp', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.633889176307!2d46.60419431426528!3d24.773738854830718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee364f4090f29%3A0x46c8c8e73ba67982!2sSQUID%20GAME!5e0!3m2!1sen!2ssa!4v1652446188436!5m2!1sen!2ssa', 'A unique chance to try the new thrilling experience derived from the wildly popular series -Squid Game-, provides players with an experience of six different games.', '0'),
(11, 'Escape The Room', 'Family', 'uploads/627e54b4bb4322.31087943escape-room.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.4385730583635!2d46.66042051426547!3d24.780431554564903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee3819597f2b9%3A0x7b36619001f595de!2sEscape%20The%20Room%20-%20Riyadh!5e0!3m2!1sen!2ssa!4v1652446275075!5m2!1sen!2ssa', ' A new entertainment concept in which the Escape Room is a real-life adventure game where you have 60 minutes to open your mind and crack codes to escape.', '1'),
(12, 'Crystal Maze', 'Family', 'uploads/627e58e19c6963.16938512crystal.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.933804669296!2d46.601294314408726!3d24.76345865523843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee3f5fcb7225b%3A0xb278db99bcc2a87e!2sBoulevard%20Riyadh%20City!5e0!3m2!1sen!2ssa!4v1652852969193!5m2!1sen!2ssa', 'Bringing you the popular TV series -Crystal Maze- to life, an immersive & interactive competition that will keep you excited and wanting more!', '0'),
(13, 'Zero Latency', 'Family', 'uploads/627e55762294f7.74097672zlatency.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.3831680243297!2d46.741860114265606!3d24.782329754489506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2efdc6c882c783%3A0x988ebda9989c67c1!2zWmVybyBMYXRlbmN5IHwg2LLZitix2Ygg2YTZitiq2YbYs9mK!5e0!3m2!1sen!2ssa!4v1652446567534!5m2!1sen!2ssa', 'The Worlds Greatest Free-Roam VR Experience! Put on your headset, pick up your controller & get ready to be transported into the virtual world.', '0'),
(14, 'Muvi Cinemas', 'Family', 'uploads/627e564e662a01.64492856muvi-.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.745562678174!2d46.629414714264456!3d24.73561395634343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee31f06becdb7%3A0xbed72dafa242bfa6!2zTXV2aSBDaW5lbWFzIHwg2YXZiNqk2Yog2LPZitmG2YXYpw!5e0!3m2!1sen!2ssa!4v1652446784165!5m2!1sen!2ssa', 'The 1st home-grown Cinema brand, it offers immersive screens combined with delicious menu options; giving moviegoers an exceptional experience.', '0'),
(15, 'Mueseum of Happiness', 'Family', 'uploads/627e56b85d9db3.15523337moh1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.6184412435273!2d46.7314060142668!3d24.842718952088198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2efbae05d37873%3A0x7cdc19495476d774!2sMuseum%20Of%20Happiness!5e0!3m2!1sen!2ssa!4v1652446869800!5m2!1sen!2ssa', 'A one-of-a-kind pop-up event where you will witness unique art installations, colorful rooms, and worthy selfie moments you do not want to miss!', '1'),
(16, 'Mueseum of Illusions', 'Family', 'uploads/627e5706c27c03.26609624museum-of-illusions.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.0985607230546!2d46.625536616143016!3d24.75780961207778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee3434cfddf05%3A0xfaa60856eeb6dc5!2sMuseum%20of%20Illusions!5e0!3m2!1sen!2ssa!4v1652446970836!5m2!1sen!2ssa', 'A mind-blowing journey that will make you realize nothing is as it seems, you will be engaging in 80 mind-bending exhibits puzzling your perceptions! ', '0'),
(17, 'Nofa Wildlife Park', 'Family', 'uploads/627e577d39b6e1.58433051nofa.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3634.3012389238816!2d45.94051491425657!3d24.37082197071003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e28ddb041849325%3A0xb29a756b1a64cb0e!2sNofa%20Wildlife%20Park!5e0!3m2!1sen!2ssa!4v1652447080298!5m2!1sen!2ssa', 'A trip to Nofa Wildlife Park will give its visitors an up-close encounter with a cheetah, having more than 700 animals & a guided safari drive.', '0'),
(18, 'Planet X', 'Children', 'uploads/627e57d471e479.73502464planet-x.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.8531955842577!2d46.6457899142644!3d24.731919756489873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f1ddb837320e5%3A0x6479502c389a098d!2sPlanet%20X!5e0!3m2!1sen!2ssa!4v1652447169182!5m2!1sen!2ssa', 'An Entertainment Center that depicts a world of adventure and unconventional attractions through Escape Rooms, VR simulations, & Arcade gaming. ', '0'),
(19, 'Qiddiya', 'Family', 'uploads/627e5851388751.26725715q-.png', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d232227.42013608702!2d46.046339425000006!3d24.570089300000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f290eab7d7c0f%3A0x97dcd8d7ea046a4d!2sQiddiya%20Project!5e0!3m2!1sen!2ssa!4v1652447268176!5m2!1sen!2ssa', 'The hugest Entertainment destination of its kind, bigger than Disneyland, it has theme parks, sports arenas, concert venues, & racetracks.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `date` datetime NOT NULL,
  `star` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `place_id`, `username`, `comments`, `date`, `star`) VALUES
(1, 2, 'Maha', ' Everything about this place is magical I would definitely go back over and over to it!', '2022-05-13 15:52:31', 5),
(2, 2, 'Faisal', ' Rides were so busy and it takes forever to get on any game here! there are not enough chairs/tables for when you would like to rest a little.', '2022-05-13 15:53:15', 2),
(3, 2, 'Ahmed', '  We tried almost all the rides except the one that will hang you upside down! the horror house is the funniest!\r\n we enjoyed it and are definitely gonna visit again!', '2022-05-13 15:54:00', 5),
(4, 2, 'Munera', ' A spacious and magical place. Amazingly several shows. All of the staff were very friendly.', '2022-05-13 15:54:31', 4),
(5, 2, 'Khaled', ' Go crazy, try the hard big ones! Worth the long queue. Sadly there are not many attractions for children below 100cm :( ', '2022-05-13 15:55:03', 3),
(6, 2, 'Nouf', ' The most spectacular destination in Riyadh. Definitely worth a visit despite the long queues. ', '2022-05-13 15:55:28', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `Place`
--
ALTER TABLE `Place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `place_id` (`place_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Place`
--
ALTER TABLE `Place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `Place` (`place_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
