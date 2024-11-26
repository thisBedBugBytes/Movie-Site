-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2024 at 08:57 PM
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
(2, 'Birjis', '5678'),
(3, 'Rochona', '3456');

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
(62, 2, 4.0, 'Spicing things up with the wrinkle of teenage angst, Inside Out 2 clears the head and warms the heart by living up to its predecessor\'s emotional intelligence.\n\nSpicing things up with the wrinkle of teenage angst, Inside Out 2 clears the head and warms the heart by living up to its predecessor\'s emotional intelligence.\n\nSpicing things up with the wrinkle of teenage angst, Inside Out 2 clears the head and warms the heart by living up to its predecessor\'s emotional intelligence.\n\n', '2024-11-27'),
(62, 18, 2.0, 'A funny adventure full of positive messages for the whole family, this Pixar sequel hits you right in the feels.', '2024-11-27'),
(63, 2, 3.0, NULL, '2024-11-27');

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
(1, 'Stree 2: Sarkate Ka Aatank', 'Amar Kaushik', 'After the events of Stree, the town of Chanderi is being haunted again. This time, women are mysteriously abducted by a terrifying headless entity. Once again, it\'s up to Vicky and his friends to save their town and loved ones.', '2024-08-15', 149, 'Horror', 'https://upload.wikimedia.org/wikipedia/en/a/a1/Stree_2.jpg', NULL),
(2, 'Joker: Folie à Deux', 'Todd Phillips', 'Struggling with his dual identity, failed comedian Arthur Fleck meets the love of his life, Harley Quinn, while incarcerated at Arkham State Hospital.\r\n\r\n', '2024-10-04', 138, 'Drama', 'https://m.media-amazon.com/images/M/MV5BNTRlNmU1NzEtODNkNC00ZGM3LWFmNzQtMjBlMWRiYTcyMGRhXkEyXkFqcGc@._V1_.jpg', NULL),
(3, 'La La Land', 'Damien Chazelle', 'When Sebastian, a pianist, and Mia, an actress, follow their passion and achieve success in their respective fields, they find themselves torn between their love for each other and their careers.', '2016-12-09', 128, 'Drama', 'https://m.media-amazon.com/images/M/MV5BMzUzNDM2NzM2MV5BMl5BanBnXkFtZTgwNTM3NTg4OTE@._V1_.jpg', NULL),
(61, 'Dunkirk', 'Christopher Nolan', 'During World War II, soldiers from the British Empire, Belgium and France try to evacuate from the town of Dunkirk during a arduous battle with German forces.', '2017-07-21', 106, 'Action', 'https://m.media-amazon.com/images/M/MV5BZWU5ZjJkNTQtMzQwOS00ZGE4LWJkMWUtMGQ5YjdiM2FhYmRhXkEyXkFqcGc@._V1_.jpg', NULL),
(62, 'Inside Out 2', 'Kelsey Mann', 'Joy, Sadness, Anger, Fear and Disgust have been running a successful operation by all accounts. However, when Anxiety shows up, they aren\'t sure how to feel.', '2024-06-14', 96, 'Animation', 'https://m.media-amazon.com/images/M/MV5BODI0OGRjYmEtNzFlNi00NTRlLTg3YTItM2ZkOGYyYTVhYjlkXkEyXkFqcGc@._V1_.jpg', NULL),
(63, 'Taxi Driver', 'Martin Scorsese', 'Travis, an ex-marine and Vietnam veteran, works as a taxi driver in New York City. One day, he decides to save an underage prostitute from her pimp in an effort to clean the city of its corruption.', '1976-02-08', 114, 'Thriller', 'https://m.media-amazon.com/images/M/MV5BZDNhMGYwM2UtMTdlZS00MGQ1LWI2YzAtODY5YWI1MjYyNzRmXkEyXkFqcGc@._V1_.jpg', NULL);

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
(1, 'maisha', '01712312312', 'maisha@gmail.com', 'maisha2121', '2000-11-09', 'Female', 0),
(2, 'Naashrah Naashidin Preetasha', '01685419452', 'n.n.preetasha29@gmail.com', '$2y$10$8njoiBGhhhTWr5c3Hz1mrO16RLl7bmAsA6rCpE8c2JGCG9XORtDqu', '2002-09-29', 'Female', 0),
(13, 'hridita', '01712312345', 'hridita@gmail.com', '$2y$10$Y9kB5Bre1QUkBlx8t2Xld.durgNGWK0lfSD1up.b/Xyq2d86S52we', '2024-11-07', 'Female', 0),
(18, 'towhid aslam', '01878431782', 'rdaslam12@gmail.com', '$2y$10$BTiuLVAAIA7IuYyG3rsKau2XmEbCylZurEfynkNja2qRsJo5GLyzW', '2000-06-25', 'Male', 0),
(19, 'Golu Toid 2', '01982762685', 'rdaslam02@gmail.com', '$2y$10$nn/PmcjJG/mg0559V.ri2OiW0VYEgOp7BLoFZpArxo4y56Q5cq7CO', '2002-06-28', 'Male', 0),
(20, 'Shahriar Ahmed', '01841596304', 'shahriar1906@gmail.com', '$2y$10$D6rZhOIYzaYcSSIGFmMfBuEzbxOcPFQbJ5CDh21cf/JzvTcQyJ0oa', '2002-12-19', 'Male', 0),
(21, 'Mustoba Munim Ahsan ', '01987687565', 'munim@gmail.com', '$2y$10$e7EW5W28Wp664efeOC7bueHn22A/yl7sXkxwQpbIHM84FpUF5oNii', '2002-10-28', 'Male', 0),
(22, 'Abu Masroor', '01625635645', 'upom@gmail.com', '$2y$10$MoQr0/VDWba7lChAHkdS4.VqohOpHUDAXHXNowMO86i5Azli2pR6y', '2002-07-28', 'Male', 0);

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
(3, 2),
(62, 2);

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
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  ADD CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
