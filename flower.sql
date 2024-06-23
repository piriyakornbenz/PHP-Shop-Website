-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2024 at 02:30 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin`, `password`) VALUES
(3, 'admin', '$2y$10$9nNDFEbkEcgowGbKp3Nuf.PRjF80cIcwGkt3bhxCCKdxTriKCeq3u'),
(5, 'admin2', '$2y$10$hP9dUqIjN0/Iqj5KWjhD6OmfRG1W6RmyZkdqEFRVdWCDU3C7o.iDS');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(32, 'admin', 'admin', 'admin@gmail.com', '$2y$10$ZtHzLHrWgQdYBHCb1IfzjOSIZ2CozBcpm98CfHmWnNwsoHlua/oRS'),
(33, 'admin2', 'admin2', 'admin2@gmail.com', '$2y$10$xvzcjT0YKI2ZT31003JX0.O/G3RAvzwvvqEFNMckT3myUf426czTm'),
(36, 'Byrom', 'Kaser', 'bkaser0@cmu.edu', '$2y$10$Fzv/C4CXF9mTyJHhjLNWzes2OoLAbx/q80T.i8vsiCD3EkIIcl8tu'),
(37, 'Ethelin', 'Chadband', 'echadband1@bing.com', '$2y$10$c.GxEj8cAet/14EdfF1mDenomN62JX5XJGt.EDd8R42SKW9sk04i6'),
(38, 'Selle', 'Wonham', 'swonham2@ycombinator.com', '$2y$10$IJB9ruVWMMUQ8/5dap6OluqWnxO8WvfvqCiQVLGOA/bEvsGcVy9Ie'),
(39, 'Joann', 'Hulse', 'jhulse3@hhs.gov', '$2y$10$VxCS96A975pzE3EwpdmKB.OQKfbwWSINVK9Zm7lp2lH0sxd5MY0.S'),
(40, 'Anna', 'maria', 'alindegard4@google.ru', '$2y$10$OGd2W/NwtOrg0l2T1vju8O1Yu3XcQk/zRUMYi4gveLDEnvQFtQLX2'),
(41, 'Kellina', 'Stamp', 'kstamp5@europa.eu', '$2y$10$FbXr4imTjkP1UNrghSgee.IpXWRA3aQ5T1OaXScXfRgFBexnN6AS.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `price`) VALUES
(6, '32', '1', '531'),
(7, '32', '2', '400'),
(8, '32', '7', '400'),
(9, '32', '2', '400'),
(10, '32', '7', '400');

-- --------------------------------------------------------

--
-- Table structure for table `section_about`
--

CREATE TABLE `section_about` (
  `id` int NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `button` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `section_about`
--

INSERT INTO `section_about` (`id`, `heading`, `description`, `button`) VALUES
(1, 'why choose us?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit ratione temporibus nam dolores reiciendis delectus, harum vitae obcaecati, voluptas sint quo sed nisi dolorem nobis eveniet ipsum labore sequi.', 'learn more');

-- --------------------------------------------------------

--
-- Table structure for table `section_footer`
--

CREATE TABLE `section_footer` (
  `id` int NOT NULL,
  `footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `section_footer`
--

INSERT INTO `section_footer` (`id`, `footer`) VALUES
(1, 'Copyright Website 2024');

-- --------------------------------------------------------

--
-- Table structure for table `section_home`
--

CREATE TABLE `section_home` (
  `id` int NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `button` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `section_home`
--

INSERT INTO `section_home` (`id`, `heading`, `sub_heading`, `description`, `button`) VALUES
(1, 'flowers', 'natural & beautiful flowers', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit ratione temporibus nam dolores reiciendis delectus, harum vitae obcaecati, voluptas sint quo sed nisi dolorem nobis eveniet ipsum labore sequi.', 'shop now');

-- --------------------------------------------------------

--
-- Table structure for table `section_icons`
--

CREATE TABLE `section_icons` (
  `id` int NOT NULL,
  `icon` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `section_icons`
--

INSERT INTO `section_icons` (`id`, `icon`, `heading`, `description`) VALUES
(1, '689445445.png', 'free delivery', 'on all orders'),
(4, '1375029778.png', '10 days returns', 'money back guarantee'),
(5, '1504920414.png', 'offer & gift', 'on all order'),
(6, '1468967406.png', 'secure payment', 'protected by paypal');

-- --------------------------------------------------------

--
-- Table structure for table `section_products`
--

CREATE TABLE `section_products` (
  `id` int NOT NULL,
  `heading` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `section_products`
--

INSERT INTO `section_products` (`id`, `heading`, `price`, `discount`, `picture`) VALUES
(1, 'flower pot', 590, 10, '1567541235.png'),
(2, 'flower pot', 500, 20, '1571879254.png'),
(7, 'flower pot', 500, 20, '1454656626.png');

-- --------------------------------------------------------

--
-- Table structure for table `section_reviews`
--

CREATE TABLE `section_reviews` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `section_reviews`
--

INSERT INTO `section_reviews` (`id`, `name`, `email`, `message`, `date`) VALUES
(3, 'John', 'john@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis enim omnis perspiciatis autem eligendi at recusandae iste animi aliquam illum, eum harum neque nesciunt numquam vitae ad molestias quam voluptas.', '2024-05-09 14:07:29'),
(4, 'John', 'john@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis enim omnis perspiciatis autem eligendi at recusandae iste animi aliquam illum, eum harum neque nesciunt numquam vitae ad molestias quam voluptas.', '2024-05-09 14:07:35'),
(5, 'John', 'john@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis enim omnis perspiciatis autem eligendi at recusandae iste animi aliquam illum, eum harum neque nesciunt numquam vitae ad molestias quam voluptas.', '2024-05-09 14:28:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_about`
--
ALTER TABLE `section_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_footer`
--
ALTER TABLE `section_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_home`
--
ALTER TABLE `section_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_icons`
--
ALTER TABLE `section_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_products`
--
ALTER TABLE `section_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_reviews`
--
ALTER TABLE `section_reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `section_about`
--
ALTER TABLE `section_about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `section_footer`
--
ALTER TABLE `section_footer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_home`
--
ALTER TABLE `section_home`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `section_icons`
--
ALTER TABLE `section_icons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section_products`
--
ALTER TABLE `section_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `section_reviews`
--
ALTER TABLE `section_reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
