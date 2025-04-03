-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 11:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BookHup`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `description`) VALUES
(1, 'Stephen King', 'Stephen Edwin King (born September 21, 1947) is an American author of horror, supernatural fiction, suspense, crime, science-fiction, and fantasy novels. His books have sold more than 350 million copies, and many have been adapted into films, television s'),
(2, 'Robert Jordan', 'James Oliver Rigney Jr. (October 17, 1948 – September 16, 2007), better known by his pen name Robert Jordan, was an American author of epic fantasy. He is known best for his series the Wheel of Time (finished by Brandon Sanderson after Jordan\'s death) whi'),
(3, 'Sanmao', 'Sanmao (Chinese: 三毛 sān máo) was the pen name of Echo Chen Ping (born Chen Mao-ping; March 26, 1943 – January 4, 1991), a Chinese writer and translator based in Taiwan. Her works range from autobiographical writing, travel writing and reflective novels, t'),
(4, 'Dan Jones', 'Daniel Gwynne Jones (born 27 July 1981) is a British historian, TV presenter and journalist. He was educated at The Royal Latin School, a state grammar school in Buckingham, before attending Pembroke College, Cambridge.\r\n'),
(5, 'James Clear', 'author of the New York Times bestseller, Atomic Habits, which has sold more than 5 million copies worldwide. I\'m also known for my popular 3-2-1 newsletter, which is sent out each week.'),
(6, 'Gary Keller', 'Gary Keller is an American entrepreneur and best-selling author. He is the founder of Keller Williams, which is the largest real estate company in the world by agent count, closed sales volume, and units sold. [1] Keller founded Keller Williams on trainin'),
(7, 'Brant Pinvidic', 'Brant Pinvidic is a Canadian film director and television producer, best known for Why I\'m Not on Facebook, Why I\'m Not on Pokemon GO, Bar Rescue and Extreme Weight Loss. He is the CEO of INvelop Entertainment, host of the podcast Why I\'m Not... With Bran'),
(8, 'Robert T. Kiyosaki', 'Robert Toru Kiyosaki (born April 8, 1947) is an American businessman and author. Kiyosaki is the founder of Rich Global LLC and the Rich Dad Company, a private financial education company that provides personal finance and business education to people thr'),
(9, 'Matthew MacDonald\r\n', 'Matthew MacDonald is a science and technology writer with well over a dozen books to his name. He\'s particularly known for his books about building websites, which include a do-it-from-scratch tutorial (Creating a Website: The Missing Manual), a look at c'),
(10, 'Tom Butler', 'Tom Butler (born 1951) is a Canadian actor who has starred in movies and on television series and in many television films.\r\n\r\n'),
(16, 'jhon smith', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publish_date` date NOT NULL DEFAULT current_timestamp(),
  `price` double NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `book_image` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` 
(`id`, `title`, `author`, `publish_date`, `price`, `client_id`, `category_id`, `book_image`, `author_id`) VALUES
(1, 'The Eyes of the Dragon', 'Stephen King', '2018-01-09', 66.24, 1, 1, 'dragons.jpg', 1),
(2, 'The Eye of the World', 'Robert Jordan', '2019-10-29', 40.44, 1, 1, 'eye-of-world.jpg', 2),
(4, 'Stories of the Sahara', 'Sanmao', '2021-10-23', 103.04, 1, 16, 'Stories-of-the-Sahara.jpg', 3),
(5, 'The Plantagenets', 'Dan Jones', '2021-10-23', 69.92, 1, 16, 'Plantagenets.jpg', 4),
(6, 'Atomic Habits', 'James Clear', '2018-10-16', 97.92, 1, 13, 'atomic-habits.jpg', 5),
(7, 'Rich Dad Poor Dad', 'Robert T. Kiyosaki', '2021-10-23', 33.08, 1, 13, 'rich-dad.jpg', 8),
(8, 'The One Thing', 'Gary Keller, Jay Papasan', '2021-10-23', 91.8, 1, 13, 'the-one.jpg', 6),
(9, 'The 3-Minute Rule', 'Brant Pinvidic', '2019-10-29', 97.92, 1, 13, '3-minute-rule.jpg', 7),
(10, 'JavaScript Cookbook', 'Matthew MacDonald, Adam D. Scott & 1 more', '2021-08-10', 257.56, 1, 29, 'javascript-cookbook.jpg', 9),
(11, 'PHP & Mysql', 'Tom Butler, Kevin Yank', '2017-11-05', 147.0, 1, 29, 'php&mysql.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `total`, `quantity`, `client_id`, `book_id`) VALUES
(356, 0, 3, 4, 4),
(358, 0, 2, 4, 6),
(359, 0, 1, 4, 7),
(360, 0, 4, 4, 1),
(362, 0, 2, 1, 5),
(363, 0, 1, 1, 2),
(364, 0, 3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Fantasy'),
(2, 'Science Fiction'),
(3, 'Adventure'),
(4, 'Romance'),
(5, 'Detective & Mystery'),
(6, 'Horror'),
(7, 'Historical Fiction'),
(8, 'Children’s Fiction'),
(9, 'Memoir & Autobiography'),
(10, 'Biography'),
(11, 'Cooking'),
(12, 'Art & Photography'),
(13, 'Personal Development'),
(14, 'Motivational / Inspirational'),
(15, 'Health & Fitness'),
(16, 'History'),
(17, 'Humor & Entertainment'),
(18, 'Business & Money'),
(19, 'Law & Criminology'),
(20, 'Politics & Social Sciences'),
(21, 'Religion & Spirituality'),
(22, 'Education & Teaching'),
(23, 'Travel'),
(24, 'True Crime'),
(29, 'programming');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `email`, `telephone`, `username`, `address`, `city`, `password`) VALUES
(1, 'Admin admin', 'a@a.com', 05240585, 'admin', 'admin', 'sidisalem', 'admin');

INSERT INTO `customer` (`id`, `fullname`, `email`, `telephone`, `username`, `address`, `city`, `password`) VALUES
(4, 'Admin admin', 'a2@a.com', 05240585, 'admin1', 'admin1', 'Aljouf', 'admin1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `ordering` (`client_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_id` FOREIGN KEY (`client_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--

ALTER TABLE `cart`
  ADD CONSTRAINT `book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordering` FOREIGN KEY (`client_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
