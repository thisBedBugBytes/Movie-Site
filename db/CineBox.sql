-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2024 at 06:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CineBox`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'Preetasha', '1234'),
(2, 'Birjis', '2345'),
(3, 'Rachona', '3456');

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL CHECK (`rating` >= 0 and `rating` <= 5),
  `review` text DEFAULT NULL,
  `log_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`movie_id`, `user_id`, `rating`, `review`, `log_time`) VALUES
(1, 1, 2.0, 'Not so good urghhh', '2024-11-30'),
(1, 4, 1.0, 'The sequal is so disappointing:(', '2024-11-30'),
(2, 1, 4.0, 'Full on entertainment', '2024-11-30'),
(3, 2, 4.0, 'A really nice movie', '2024-11-30'),
(7, 2, 4.0, 'Nice', '2024-11-30'),
(8, 1, 5.0, 'Action packed UwU', '2024-11-30'),
(8, 2, 5.0, '100/100', '2024-11-30'),
(9, 2, 2.0, 'Basic story', '2024-11-30'),
(13, 1, 4.0, 'Really Nice', '2024-11-30'),
(14, 1, 5.0, 'Perfect Ending', '2024-11-30'),
(18, 2, 5.0, 'Deserves Oscar FR', '2024-11-30'),
(18, 4, 5.0, 'My most favorite movie', '2024-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `director` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `release_date` date NOT NULL,
  `duration_min` int(11) DEFAULT NULL,
  `genre` enum('Action','Animation','Comedy','Thriller','Horror','Drama','Romance','Mystery','Sci-fi') DEFAULT NULL,
  `poster` text NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `director`, `description`, `release_date`, `duration_min`, `genre`, `poster`, `rating`) VALUES
(1, 'Joker: Folie à Deux', 'Todd Phillips', 'Struggling with his dual identity, failed comedian Arthur Fleck meets the love of his life, Harley Quinn, while incarcerated at Arkham State Hospital.', '2024-10-04', 138, 'Thriller', 'https://m.media-amazon.com/images/M/MV5BNTRlNmU1NzEtODNkNC00ZGM3LWFmNzQtMjBlMWRiYTcyMGRhXkEyXkFqcGc@._V1_.jpg', 1.5),
(2, 'Stree 2', 'Amar Kaushik', 'The town of Chanderi is being haunted again. This time, women are mysteriously abducted by a terrifying headless entity. Once again, it is up to Vicky and his friends to save their town and loved ones.', '2024-08-15', 149, 'Horror', 'https://m.media-amazon.com/images/M/MV5BNWIzZjVmN2EtNGEyMy00MzVlLWIxMmItZjYzZGVjMzQ3N2VkXkEyXkFqcGc@._V1_.jpg', 4.0),
(3, 'The Piano Lesson', 'Malcolm Washington', 'The Charles family grapples with family legacy and difficult decisions as they determine the fate of their heirloom piano, exploring deeper themes along the way.', '2024-08-31', 125, 'Drama', 'https://m.media-amazon.com/images/M/MV5BMzQzOWY5ZmUtNGVkNi00NWIzLTliMWMtNDNkYmRjMTBiOTVlXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 4.0),
(4, 'Wicked', 'Jon M. Chu', 'Misunderstood because of her green skin, a young woman named Elphaba forges an unlikely but profound friendship with Glinda, a student with an unflinching desire for popularity. Following an encounter with the Wizard of Oz, their relationship soon reaches a crossroad as their lives begin to take very different paths.', '2024-11-22', 161, 'Drama', 'https://upload.wikimedia.org/wikipedia/en/3/3c/Wicked_%282024_film%29_poster.png', NULL),
(5, 'Barbie', 'Greta Gerwig', 'Barbie and Ken are having the time of their lives in the colorful and seemingly perfect world of Barbie Land. However, when they get a chance to go to the real world, they soon discover the joys and perils of living among humans.', '2023-07-21', 114, 'Comedy', 'https://m.media-amazon.com/images/M/MV5BYjI3NDU0ZGYtYjA2YS00Y2RlLTgwZDAtYTE2YTM5ZjE1M2JlXkEyXkFqcGc@._V1_.jpg', NULL),
(6, 'The Departed', 'Martin Scorsese', 'An undercover agent and a spy constantly try to counter-attack each other in order to save themselves from being exposed in front of the authorities. Meanwhile, both try to infiltrate an Irish gang.', '2006-10-06', 151, 'Thriller', 'https://m.media-amazon.com/images/M/MV5BMTI1MTY2OTIxNV5BMl5BanBnXkFtZTYwNjQ4NjY3._V1_FMjpg_UX1000_.jpg', NULL),
(7, 'The Wolf of Wall Street', 'Martin Scorsese', 'Introduced to life in the fast lane through stockbroking, Jordan Belfort takes a hit after a Wall Street crash. He teams up with Donnie Azoff, cheating his way to the top as his relationships slide.', '2013-12-25', 180, 'Thriller', 'https://m.media-amazon.com/images/M/MV5BMjIxMjgxNTk0MF5BMl5BanBnXkFtZTgwNjIyOTg2MDE@._V1_.jpg', 4.0),
(8, 'Jawan', 'Atlee Kumar', 'A man is driven by a personal vendetta to rectify the wrongs in society, while keeping a promise made years ago. He comes up against a monstrous outlaw with no fear, who has caused extreme suffering to many.', '2023-09-07', 169, 'Action', 'https://m.media-amazon.com/images/M/MV5BMGExNGI1NDktOWI2Mi00NDM3LWIxMmQtNTQxYTgzMzI0MTA1XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 5.0),
(9, 'Elemental', 'Peter Sohn', 'In a city where fire, water, land, and air residents live together, a fiery young woman and a go-with-the-flow guy discover something elemental: how much they actually have in common.', '2023-06-16', 109, 'Animation', 'https://m.media-amazon.com/images/M/MV5BNjU2MjE1OGItZjdmYS00ZmIyLTljNjYtOWI5ZGRkZjM4NDEwXkEyXkFqcGc@._V1_.jpg', 2.0),
(10, 'Inside Out', 'Pete Docter', 'Eleven-year-old Riley has moved to San Francisco, leaving behind her life in Minnesota. She and her five core emotions, Fear, Anger, Joy, Disgust and Sadness, struggle to cope with her new life.', '2015-06-19', 95, 'Animation', 'https://m.media-amazon.com/images/M/MV5BOTgxMDQwMDk0OF5BMl5BanBnXkFtZTgwNjU5OTg2NDE@._V1_.jpg', NULL),
(11, 'Dune', 'Denis Villeneuve', 'Paul Atreides arrives on Arrakis after his father accepts the stewardship of the dangerous planet. However, chaos ensues after a betrayal as forces clash to control melange, a precious resource.', '2021-10-22', 155, 'Sci-fi', 'https://upload.wikimedia.org/wikipedia/en/8/8e/Dune_%282021_film%29.jpg', NULL),
(12, 'Tenet', 'Christopher Nolan', 'When a few objects that can be manipulated and used as weapons in the future fall into the wrong hands, a CIA operative, known as the Protagonist, must save the world.', '2020-08-26', 150, 'Sci-fi', 'https://m.media-amazon.com/images/M/MV5BMTU0ZjZlYTUtYzIwMC00ZmQzLWEwZTAtZWFhMWIwYjMxY2I3XkEyXkFqcGc@._V1_.jpg', NULL),
(13, 'Dunkirk', 'Christopher Nolan', 'During World War II, soldiers from the British Empire, Belgium and France try to evacuate from the town of Dunkirk during a arduous battle with German forces.', '2017-07-21', 106, 'Action', 'https://m.media-amazon.com/images/M/MV5BZWU5ZjJkNTQtMzQwOS00ZGE4LWJkMWUtMGQ5YjdiM2FhYmRhXkEyXkFqcGc@._V1_.jpg', 4.0),
(14, 'Spider-Man: Across the Spider-Verse', 'Joaquim Dos Santos', 'In an attempt to curb the Spot, a scientist, from harnessing the power of the multiverse, Miles Morales joins forces with Gwen Stacy.', '2023-06-02', 140, 'Animation', 'https://m.media-amazon.com/images/M/MV5BNThiZjA3MjItZGY5Ni00ZmJhLWEwN2EtOTBlYTA4Y2E0M2ZmXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 5.0),
(15, 'Doctor Strange in the Multiverse of Madness', 'Sam Raimi', 'Doctor Strange teams up with a mysterious teenage girl from his dreams who can travel across multiverses, to battle multiple threats, including other-universe versions of himself, which threaten to wipe out millions across the multiverse.', '2022-05-06', 126, 'Drama', 'https://m.media-amazon.com/images/M/MV5BN2YxZGRjMzYtZjE1ZC00MDI0LThjZmQtZTZmMzVmMmQ2NzBmXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', NULL),
(16, 'Fight Club', 'David Fincher', 'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more.', '1999-10-15', 139, 'Action', 'https://m.media-amazon.com/images/M/MV5BOTgyOGQ1NDItNGU3Ny00MjU3LTg2YWEtNmEyYjBiMjI1Y2M5XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', NULL),
(17, 'Gone Girl', 'David Fincher', 'Nick Dunne discovers that the entire media focus has shifted on him when his wife, Amy Dunne, mysteriously disappears on the day of their fifth wedding anniversary.', '2014-10-03', 149, 'Mystery', 'https://m.media-amazon.com/images/M/MV5BMTk0MDQ3MzAzOV5BMl5BanBnXkFtZTgwNzU1NzE3MjE@._V1_FMjpg_UX1000_.jpg', NULL),
(18, 'La La Land', 'Damien Chazelle', 'When Sebastian, a pianist, and Mia, an actress, follow their passion and achieve success in their respective fields, they find themselves torn between their love for each other and their careers.', '2016-12-09', 128, 'Romance', 'https://m.media-amazon.com/images/M/MV5BMzUzNDM2NzM2MV5BMl5BanBnXkFtZTgwNTM3NTg4OTE@._V1_.jpg', 5.0),
(19, 'Merry Christmas', 'Sriram Raghavan', 'Two strangers meet on a fateful Christmas Eve, but a night of romance soon becomes a nightmare.', '2024-01-12', 144, 'Thriller', 'https://m.media-amazon.com/images/M/MV5BODZmMDEyYmYtODM0Yi00ZDYyLWI0ZjYtZWMxOGQ2ZjljOGYxXkEyXkFqcGc@._V1_.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `Banned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `phone_number`, `email`, `password`, `dob`, `gender`, `Banned`) VALUES
(1, 'Naashrah Naashidin Preetasha', '01685419452', 'n.n.preetasha29@gmail.com', '$2y$10$7WQdSEHjJbEAW9Kgr.1UeOEHC9lrn38T8J9xkSx7GpJX6F/lscPku', '2002-09-29', 'Female', 0),
(2, 'Mustoba Munim Ahsan ', '01712312345', 'munim@gmail.com', '$2y$10$CUaHni1xlwngez1vCAiUke6ZV60OWcbMGzmumv6Zy2gJe2chspu0S', '2002-10-28', 'Male', 0),
(3, 'Sadia Bhuiyan', '01812312345', 'sadiabhuiyan17@gmail.com', '$2y$10$wKO5tcFSlyQKI524uvlkfOtZ9O8RuFHgH1vOXOm8SjbyQNXERD6cC', '2002-10-17', 'Female', 0),
(4, 'Towhid Aslam', '01878431782', 'rdaslam12@gmail.com', '$2y$10$s1POo/PHEWyfRyrilmCr2uYCdUqzV0YHeYwqXrkISHS.kjBVeWNri', '2002-06-28', 'Male', 0),
(5, 'Abu Masroor Upom', '01987687654', 'upom@gmail.com', '$2y$10$i04Qq3T1kBFz1JNfy/.F0et45NsrkiVq67HCWQMHyXfD13WRzbVSi', '2002-07-28', 'Male', 0),
(6, 'Afia Ibnat Joya', '01945645678', 'joya@gmail.com', '$2y$10$aWnJwo./9QOE39D9yZM9we80AO8rl8N.KpDi6mEXR0.D7nMTdcB26', '2002-09-15', 'Female', 0),
(7, 'Iqfat Rahman', '0145245234', 'iqfat@gmail.com', '$2y$10$IAeN95rGTzZUjs93TxuaaupYTsPOqW.87E4Xt0SiHnfv25zvvVc56', '2001-09-05', 'Male', 0),
(8, 'Hridita Alam', '01567867890', 'hridita@gmail.com', '$2y$10$Q8Pc5v8efVWumokx8SjKm.eHL0JeOLEiNU0lcXfYbpBaV0EdSvULS', '2004-12-19', 'Female', 0);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`movie_id`, `user_id`) VALUES
(1, 2),
(3, 4),
(4, 1),
(4, 2),
(6, 2),
(6, 4),
(9, 2),
(10, 1),
(11, 1),
(11, 2),
(11, 4),
(17, 2),
(19, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`movie_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`movie_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `diary_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diary_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmoviedelete` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
