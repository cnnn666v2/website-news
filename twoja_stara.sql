-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 11:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twoja_stara`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `author`, `created_at`) VALUES
(1, 'Example 1', 'Ex 1. Lel', 'Dozy', '2024-10-06'),
(2, 'Example 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet leo sit amet massa tincidunt faucibus. Vestibulum aliquet laoreet pretium. Aenean odio enim, auctor sit amet sodales id, egestas rhoncus nunc. Pellentesque tristique orci lectus, quis vestibulum lacus facilisis a. Proin sit amet quam interdum, elementum sapien tristique, interdum purus. Suspendisse et purus mollis, dictum elit vitae, dapibus tortor. Maecenas at maximus neque. Morbi fringilla feugiat nibh eget efficitur.\r\n\r\nProin congue interdum tellus ut scelerisque. Nulla ornare risus id augue pulvinar, ac bibendum sem varius. Morbi tempus libero et risus dictum dignissim a vitae arcu. Maecenas sit amet nisi quis justo vestibulum ultricies id ac massa. Suspendisse sit amet lacinia felis. Cras feugiat felis nulla. Donec non dui vel massa malesuada hendrerit et non justo. Mauris fringilla lectus non felis tristique mollis. Aliquam erat volutpat. Donec hendrerit ex nec purus dapibus, volutpat tristique augue imperdiet. Maecenas tincidunt justo sed cursus lobortis.\r\n\r\nPellentesque ut cursus nunc. Aenean ultrices leo lacus, ac tincidunt orci tempor at. Proin lobortis lectus elit, vel viverra augue efficitur eu. Pellentesque vitae pretium odio. In ac enim in lorem molestie convallis maximus pulvinar nisl. Etiam a malesuada libero, suscipit lobortis urna. Donec felis nisi, iaculis sit amet sollicitudin vel, tempor ac ligula. Sed bibendum et urna ac rhoncus. Aliquam vel massa vehicula, ultrices orci eget, posuere lectus. In non turpis facilisis, cursus metus a, accumsan ex. Ut eget nunc lacus. Fusce eget rhoncus lacus. Aenean tortor mauris, tristique vel ligula eu, sagittis condimentum risus.\r\n\r\nCurabitur sagittis malesuada mauris. Nullam efficitur arcu in risus faucibus facilisis. Suspendisse ac hendrerit nunc. Etiam malesuada turpis quis leo sollicitudin, ac ultrices sapien elementum. Maecenas tincidunt nec augue id facilisis. Aliquam tincidunt nisl sit amet suscipit suscipit. Morbi est lectus, maximus nec scelerisque ut, consequat porta quam. Maecenas in tortor neque. Praesent luctus rhoncus vulputate. Cras lobortis eros a nunc porttitor venenatis. Curabitur lacinia et lorem non commodo. Donec sed ex velit. Phasellus elementum magna a nisi pulvinar iaculis. Integer urna dui, pretium mattis elementum eu, condimentum quis tellus.\r\n\r\nMorbi accumsan iaculis turpis, sagittis ultrices ligula aliquet eu. Nunc ac porta orci. Praesent tincidunt consequat libero luctus gravida. Proin sed enim nisl. Curabitur pretium sagittis lobortis. Nulla sit amet accumsan erat, sed pretium orci. Phasellus placerat, lectus vitae facilisis tristique, elit turpis euismod nulla, quis accumsan urna turpis vitae sapien. Phasellus sed dapibus dui. Sed suscipit fermentum dui, sed mollis velit lacinia sit amet. Suspendisse nec gravida quam. Curabitur tristique tellus nec feugiat dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam auctor leo sit amet tortor bibendum, dignissim placerat sapien iaculis. Sed non lacus at justo accumsan dignissim. Nullam fermentum feugiat enim, ac ultricies odio faucibus ac. ', 'Dozy', '2024-10-06'),
(3, 'Example 3', 'Ex 3', 'Dozy', '2024-10-06'),
(4, 'Example 4', 'Desc Ex 4', 'Dozy', '2024-10-06'),
(5, 'Example 5', 'Desc Ex 5', 'Dozy', '2024-10-06'),
(6, 'Example 6', 'Desc Ex 6', 'Dozy', '2024-10-06'),
(7, 'Example 7', 'Desc Ex 7', 'Dozy', '2024-10-06'),
(8, 'Example 8', 'Desc Ex 8', 'Dozy', '2024-10-06'),
(9, 'Example 9', 'Desc Ex 9', 'Dozy', '2024-10-06'),
(10, 'Example 10', 'Desc Ex 10', 'Dozy', '2024-10-06'),
(11, 'Example 11', 'Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 Desc Ex 11 ', 'Dozy', '2024-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(12, 'dozy', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(13, 'jajco', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
