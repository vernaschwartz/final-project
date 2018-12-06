-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 05:59 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `album_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `album_table`
--

CREATE TABLE IF NOT EXISTS `album_table` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` text,
  `artist_name` text NOT NULL,
  `album_year` int(11) NOT NULL,
  `num_songs` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image` text,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `album_table`
--

INSERT INTO `album_table` (`album_id`, `album_name`, `artist_name`, `album_year`, `num_songs`, `genre_id`, `price`, `image`) VALUES
(1, 'Nothing Was The Same', 'Drake', 2013, 15, 2, '9.99', 'https://upload.wikimedia.org/wikipedia/en/b/b9/Nothing_Was_the_Same_cover_2.png'),
(2, 'Witness', 'Katy Perry', 2017, 15, 1, '12.99', 'https://upload.wikimedia.org/wikipedia/en/9/9f/Katy_Perry_-_Witness_%28Official_Album_Cover%29.png'),
(3, 'Wish You Were Here', 'Pink Floyd', 1975, 5, 3, '7.99', 'https://images.genius.com/fd2ee944caba58b0d748b71c3ea44d33.1000x1000x1.jpg'),
(4, 'Everything I Love', 'Alan Jackson', 1996, 10, 5, '10.99', 'https://upload.wikimedia.org/wikipedia/en/thumb/3/37/Everythingilovealanjackson.jpg/220px-Everythingilovealanjackson.jpg'),
(5, 'Hard Normal Daddy', 'Squarepusher', 1997, 12, 6, '15.99', 'https://images-na.ssl-images-amazon.com/images/I/61NwDVeGeLL.jpg'),
(6, 'Californication', 'Red Hot Chili Peppers', 1999, 15, 3, '11.99', 'https://upload.wikimedia.org/wikipedia/en/d/df/RedHotChiliPeppersCalifornication.jpg'),
(7, 'The Dark Side of the Moon', 'Pink Floyd', 1973, 10, 3, '5.99', 'https://upload.wikimedia.org/wikipedia/en/thumb/3/3b/Dark_Side_of_the_Moon.png/220px-Dark_Side_of_the_Moon.png'),
(8, 'Hot Fuss', 'The Killers', 2004, 11, 3, '10.99', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/17/The_Killers_-_Hot_Fuss.png/220px-The_Killers_-_Hot_Fuss.png'),
(9, 'The Getaway', 'Red Hot Chili Peppers', 2016, 13, 3, '14.99', 'https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Thegetawayalbum.jpg/220px-Thegetawayalbum.jpg'),
(10, 'Because The Internet', 'Childish Gambino', 2013, 19, 2, '9.98', 'https://is3-ssl.mzstatic.com/image/thumb/Music4/v4/c7/e6/b0/c7e6b060-51c0-971b-0d80-518cd97db3c3/UMG_cvrart_00044003173460_01_RGB72_1502x1502_13CANIM00972.jpg/1200x630bb.jpg'),
(11, 'Drive', 'Alan Jackson', 2002, 13, 5, '9.99', 'https://upload.wikimedia.org/wikipedia/en/f/fe/Drivealanjackson.jpg'),
(12, 'Blue Clear Sky', 'George Strait', 1996, 10, 5, '10.98', 'https://upload.wikimedia.org/wikipedia/en/a/af/Blueclearsky.jpg'),
(13, 'The Road Less Traveled', 'George Strait', 2001, 10, 5, '13.98', 'https://upload.wikimedia.org/wikipedia/en/7/72/The_Road_Less_Traveled.jpg'),
(14, 'Kiss & Tell', 'Selena Gomez', 2009, 13, 1, '14.98', 'https://upload.wikimedia.org/wikipedia/en/2/23/Selena_Gomez_%26_the_Scene_-_Kiss_%26_Tell.jpg'),
(15, 'For You', 'Selena Gomez', 2014, 15, 1, '7.43', 'https://upload.wikimedia.org/wikipedia/en/a/ae/Selena_Gomez_-_For_You_%28Official_Album_Cover%29.png'),
(16, 'Master of Puppets', 'Metallica', 1985, 8, 4, '8.99', 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b2/Metallica_-_Master_of_Puppets_cover.jpg/220px-Metallica_-_Master_of_Puppets_cover.jpg'),
(17, '...And Justice for All', 'Metallica', 1988, 9, 4, '12.98', 'https://upload.wikimedia.org/wikipedia/en/thumb/b/bd/Metallica_-_...And_Justice_for_All_cover.jpg/220px-Metallica_-_...And_Justice_for_All_cover.jpg'),
(18, 'Vulgar Display of Power', 'Pantera', 1992, 11, 4, '12.99', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/12/PanteraVulgarDisplayofPower.jpg/220px-PanteraVulgarDisplayofPower.jpg'),
(19, 'The Marshall Mathers LP 2', 'Eminem', 2013, 16, 2, '13.98', 'https://upload.wikimedia.org/wikipedia/en/thumb/8/87/The_Marshall_Mathers_LP_2.png/220px-The_Marshall_Mathers_LP_2.png'),
(20, 'To Pimp a Butterfly', 'Kendrick Lamar', 2015, 16, 2, '11.99', 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f6/Kendrick_Lamar_-_To_Pimp_a_Butterfly.png/220px-Kendrick_Lamar_-_To_Pimp_a_Butterfly.png'),
(21, 'Take Care', 'Drake', 2011, 18, 2, '12.99', 'https://upload.wikimedia.org/wikipedia/en/a/ae/Drake_-_Take_Care_cover.jpg'),
(22, 'Forest Hills Drive', 'J. Cole', 2014, 13, 2, '10.99', 'https://upload.wikimedia.org/wikipedia/en/2/2a/2014ForestHillsDrive.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genre_table`
--

CREATE TABLE IF NOT EXISTS `genre_table` (
  `genre_id` int(11) NOT NULL,
  `genre_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre_table`
--

INSERT INTO `genre_table` (`genre_id`, `genre_name`) VALUES
(1, 'Pop'),
(2, 'Hip Hop'),
(3, 'Rock'),
(4, 'Metal'),
(5, 'Country'),
(6, 'Misc.');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
  `real_name` text,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `password`, `real_name`, `is_admin`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'bob', 'abc', 'larry', 2),
(3, 'vschwart', 'BASKETBALL03', 'verna', 2),
(9, 'abc', '123', 'bob', 2),
(10, 'abc', '123', 'bob', 2),
(11, 'verna', 'verna', 'verna', 2),
(12, 'ravherna', 'dog2000', 'raven', 2),
(13, 'pappi', '1amnomore', 'Pappi', 2),
(14, 'ver', 'basketball', 'schwartz', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
