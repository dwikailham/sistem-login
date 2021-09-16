-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 11:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Dwika Ilham Zakaria', 'dwikailham37@gmail.com', 'default.svg', '$2y$10$rgEXqPUFF6FInvK46jrN4eZ9ZrWgJopyWYEvDdbnav9YnEBNVLOv.', 1, 1, 1628898577),
(9, 'Dwika Ilham', 'idwika18@gmail.com', 'undraw_profile_3.svg', '$2y$10$6Sdraid3s4CtInKtNpRCG.coHDhbdPhi6G4Cd8P19dIS5SZF6hD9u', 2, 1, 1631779667);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Manajemen Menu', 'menu', 'fas fa-fw fa-file-alt', 1),
(5, 3, 'Sub Manajemen Menu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 2, 'Ubah Password', 'user/ubahpassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'idwika18@gmail.com', '2NyV9pwi2CCr7+YsAWpX+dejfl6eHOIEDdzI0cHx2JY=', 1631752005),
(2, 'idwika18@gmail.com', 's2A70YsptFZ85L9DEQAN0yjzEDvliClMGeN4o2+8nqg=', 1631752184),
(3, 'dwikailham37@gmail.com', '5jnHP7eBlHFl6qW7UMnzQ+XbnkiLzjGmmx/Kx3IJrrQ=', 1631752317),
(4, 'idwika18@gmail.com', 'loyw/NrwCbi1mwJUsGiEZSkyBI9fX1KFwFhqmAzbEjM=', 1631752565),
(5, 'idwika18@gmail.com', 'jLTXcs6rSthGF/8Z1Y04QKpZV/7kE2ABrSn+diQP5bo=', 1631752606),
(6, 'dwikailham37@gmail.com', '2R8L9Yv4Cg2E2E4PeE2WcgGHM1gX/0+LF8xUV5pcHNg=', 1631752783),
(7, 'idwika18@gmail.com', 'Bw4dT+4huUozyECtgpV0P7dJ7f1KWYrlCcAknF2eY9o=', 1631752870),
(8, 'idwika18@gmail.com', 'yzfUJCUX+6q1+bvlMIcv1nBbuvnD4KhCFV60D6zRPqM=', 1631753017),
(9, 'dwikailham37@gmail.com', 'gq9kuoknKh3HRHrzvnTkWQSTaAipc0csfjsOpOshSZg=', 1631753208),
(10, 'dwikailham37@gmail.com', 'OA/URsovQkwk6VopoLO5nem+6SG44seXRdKY+mv+JI4=', 1631753400),
(11, 'dwikailham37@gmail.com', 'M8BFq1BWkPE/2pePg05HTqf0gWdcjO/QDqq5WSKWqU4=', 1631753700),
(12, 'dwikailham37@gmail.com', 'H7S4ILDHQelG84ev3+Jz0tdq/nb5eF6OjLUDMT5CuMg=', 1631754051),
(13, 'dwikailham37@gmail.com', 'ksr+h+CuqHYWZZ0fmAUWCNkHaUJfWOB8Gcebf9VNp8A=', 1631754145),
(14, 'dwikailham37@gmail.com', 'V5uuzEDXfntUVtF0VqMHq7dvIMebuF0/rXYsHYqKT2k=', 1631755515),
(15, 'dwikailham37@gmail.com', 'ZVyiBVaqJ9JpwjUG6Oc2cHsrsWL+3xcgZyZE60rYe0k=', 1631755668),
(16, 'idwika18@gmail.com', 'CNhtrA1PLF1xV25dNyrxA6zYChinMjY0u/VBfkLatYI=', 1631761557),
(17, 'idwika18@gmail.com', '669CXhwB+tx9A8TKliSgMOYMZEEin1acl05d1dvOllo=', 1631776984),
(18, 'idwika18@gmail.com', 'eQLe6W7xnM0Z2CeMRJjkhbJObWWwpT1IFKC1WWU011U=', 1631777110),
(19, 'idwika18@gmail.com', 'umcLB1BGqodqpGXu9ZKNqHQ5RD7YIkIoL53Fs7bP/pA=', 1631779767);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
