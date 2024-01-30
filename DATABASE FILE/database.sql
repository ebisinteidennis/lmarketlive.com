-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2024 at 08:14 PM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u242897466_optimalforextr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `name` varchar(122) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'info@admin.com', 'OGBOLOGBOAMOS44@');

-- --------------------------------------------------------

--
-- Table structure for table `btc`
--

CREATE TABLE `btc` (
  `id` int(11) NOT NULL,
  `usd` double NOT NULL,
  `method` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `btc`
--

INSERT INTO `btc` (`id`, `usd`, `method`, `email`, `userId`, `status`, `date`) VALUES
(1, 100, 'Bitcoin', 'user@mail.com', '1', 'Pending', '2023-11-08 17:12:31'),
(2, 100, 'Bitcoin', 'user@mail.com', '1', 'Pending', '2023-11-08 17:13:35'),
(3, 100, 'Bitcoin', 'danielfefegha65@gmail.com', '1', 'COMPLETED', '2023-11-10 20:14:29'),
(4, 1000, 'Bitcoin', 'danielfefegha65@gmail.com', '1', 'Pending', '2023-11-10 20:25:21'),
(5, 56, 'Bitcoin', '', '81742', 'COMPLETED', '2023-12-19 05:04:59'),
(6, 56, 'Bitcoin', '', '81742', 'Pending', '2023-12-19 05:10:08'),
(7, 7667, 'Bitcoin', '', '81742', 'Pending', '2023-12-19 05:10:19'),
(8, 56, 'Bitcoin', '', '81742', 'Pending', '2023-12-19 05:11:45'),
(9, 700, 'Bitcoin', '', '81742', 'Pending', '2023-12-19 05:13:56'),
(10, 1000, 'Bitcoin', '', '81742', 'Pending', '2023-12-19 05:18:54'),
(11, 7667, 'Bitcoin', '', '81742', 'Pending', '2023-12-19 05:23:28'),
(12, 20, 'Bitcoin', '', '271212434', 'Pending', '2023-12-19 07:17:21'),
(13, 50, 'Bitcoin', '', '595392', 'Pending', '2023-12-28 10:43:23'),
(14, 1000, 'Bitcoin', '', '595392', 'Pending', '2023-12-28 10:43:29'),
(15, 1000, 'Bitcoin', '', '595392', 'Pending', '2023-12-28 10:43:36'),
(16, 1000, 'Bitcoin', '', '595392', 'Pending', '2023-12-28 10:43:41'),
(17, 100, 'Bitcoin', '', '595392', 'Pending', '2023-12-28 10:43:49'),
(18, 50, 'Bitcoin', '', '8149', 'Pending', '2023-12-30 20:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE `investment` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pname` varchar(111) NOT NULL,
  `increase` double NOT NULL,
  `bonus` double DEFAULT NULL,
  `duration` int(111) NOT NULL,
  `pdate` varchar(111) NOT NULL,
  `froms` double NOT NULL,
  `activate` tinyint(4) NOT NULL,
  `usd` double NOT NULL,
  `profit` double NOT NULL,
  `payday` varchar(255) DEFAULT NULL,
  `lprofit` varchar(255) DEFAULT NULL,
  `tnxid` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `investment`
--

INSERT INTO `investment` (`id`, `email`, `pname`, `increase`, `bonus`, `duration`, `pdate`, `froms`, `activate`, `usd`, `profit`, `payday`, `lprofit`, `tnxid`, `status`, `date`) VALUES
(7, 'user@mail.com', 'Starter Plan', 15, NULL, 1, '2023-11-09 21:05:15', 30, 0, 100, 15, '2023/12/16', NULL, '', '', '2023-11-09 20:05:15'),
(8, 'user@mail.com', 'Starter Plan', 15, NULL, 1, '2023-11-09 21:06:16', 30, 0, 100, 15, '2023/12/16', NULL, '', '', '2023-11-09 20:06:16'),
(9, 'user@mail.com', 'Starter Plan', 15, NULL, 1, '2023-11-09 21:06:53', 30, 0, 100, 15, '2023/12/16', NULL, '', '', '2023-11-09 20:06:53'),
(10, 'user@mail.com', 'Starter Plan', 15, NULL, 1, '2023-11-09 21:07:45', 30, 0, 100, 15, '2023/12/16', NULL, '', '', '2023-11-09 20:07:45'),
(11, 'user@mail.com', 'Starter Plan', 15, NULL, 1, '2023-11-10 20:09:01', 30, 0, 100, 15, '2023/12/16', NULL, '', '', '2023-11-10 20:09:01'),
(12, 'danielfefegha65@gmail.com', 'Starter Plan', 15, NULL, 1, '2023-11-10 20:23:34', 30, 0, 50, 7.5, '2023/12/16', NULL, '', '', '2023-11-10 20:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `package1`
--

CREATE TABLE `package1` (
  `id` int(6) NOT NULL,
  `pname` varchar(122) NOT NULL,
  `increase` double NOT NULL,
  `duration` int(11) NOT NULL,
  `min_amt` varchar(255) NOT NULL,
  `max_amt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `package1`
--

INSERT INTO `package1` (`id`, `pname`, `increase`, `duration`, `min_amt`, `max_amt`) VALUES
(5, 'Starter Plan', 15, 1, '30', '300'),
(6, 'Premium  Plan', 35, 1, '500', '5000'),
(8, 'Gold Plan', 32.5, 2, '1000', '10000'),
(9, 'Diamond Plan', 33.33, 3, '3000', '3999'),
(10, 'Elite Plan', 30.57, 7, '5000', '5999');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `siteurl` varchar(255) NOT NULL,
  `sitemail` varchar(255) NOT NULL,
  `ref_bonus` varchar(255) NOT NULL,
  `btc_wallet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `siteurl`, `sitemail`, `ref_bonus`, `btc_wallet`) VALUES
(1, 'Anchor', 'https://anchor.com', 'support@anchor.com', '10', 'brbrbrbrbrbrbrrrrrrfffffffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `fname` varchar(1000) NOT NULL,
  `username` varchar(200) NOT NULL,
  `imgprofile` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `gender` varchar(1000) NOT NULL,
  `plan` varchar(1000) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cpassword` varchar(1000) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `referral` varchar(255) NOT NULL,
  `profit` double NOT NULL,
  `balanceloss` double NOT NULL,
  `balancelive` double NOT NULL,
  `balancemine` double NOT NULL,
  `totalwon` double NOT NULL,
  `walletbalance` double NOT NULL,
  `upgrade` varchar(255) DEFAULT '0',
  `pin` varchar(255) DEFAULT NULL,
  `last_access` varchar(255) DEFAULT NULL,
  `btc_wallet` varchar(255) NOT NULL,
  `eth_wallet` varchar(255) NOT NULL,
  `ltc_wallet` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `imgprofile`, `email`, `currency`, `gender`, `plan`, `password`, `cpassword`, `image`, `phone`, `country`, `referral`, `profit`, `balanceloss`, `balancelive`, `balancemine`, `totalwon`, `walletbalance`, `upgrade`, `pin`, `last_access`, `btc_wallet`, `eth_wallet`, `ltc_wallet`, `date`) VALUES
(1, 'John mark', 'user', '', 'danielfefegha65@gmail.com', '', '', '', '123456', '', '', '111111111111', 'Estonia', '', 7.5, 0, 0, 0, 0, 9607.5, '1', '', '2023-11-10 20:13:54', '', '', '', '2023-11-07 05:23:26'),
(8149, 'Marksanders ', 'MAJESTY2727', '', 'sanders43607@yahoo.com', '$', 'Male', 'Starter', 'Bulldogs1985%', 'Bulldogs1985%', '', '4194906426', 'United States', '', 3850, 0, 320, 3, 1, 3850, '1', '', NULL, '', '', '', '2023-12-30 20:11:02'),
(81742, 'micheal', 'ghost', '', 'fu109306@gmail.com', '', 'Male', 'Starter', '1234', '1234', 'uploads/RSS3USDT.P_2023-11-11_06-06-55.png', '112222', '', '', 4444, 23, 23, 457, 45788, 2, '1', '', NULL, '', '', '', '2023-12-18 13:08:41'),
(93929, 'Micheal', 'Mike', '', 'jwbinance1@gmail.com', '$', 'Male', 'Starter', '12345678', '12345678', 'uploads/RSS3USDT.P_2023-11-11_06-06-55.png', '9030765186', 'Chile', '', 0, 0, 0, 0, 0, 0, '0', NULL, NULL, '', '', '', '2023-12-18 07:44:39'),
(98836, 'altagent', 'altagent', '', 'altybox@outlook.com', '$', 'Female', 'Executive', 'Alt.Ag3nt1', 'Alt.Ag3nt1', '', '968175269', 'Zimbabwe', '', 0, 0, 0, 0, 0, 0, '0', NULL, NULL, '', '', '', '2023-12-30 02:36:10'),
(274006, 'Ebisintei Dennis', 'info@admin.com', '', 'info@admin.com', '€', 'Female', 'Starter', '1234', '1234', '', '08029074091', 'Nigeria', '', 0, 0, 0, 0, 0, 200, '1', '', NULL, '', '', '', '2023-12-17 01:47:21'),
(595392, 'UHRD HUHUUH', 'johnsmith002', '', '7eczkgu96c@zipcatfish.com', '$', 'Male', 'Starter', 'Vpk@12345', 'Vpk@12345', '', '09832140652', 'India', '', 0, 0, 0, 0, 0, 0, '0', NULL, NULL, '', '', '', '2023-12-28 10:42:59'),
(990488, 'Amos', 'Fundz11', '', 'warrist9@gmail.com', '$', 'Male', 'Starter', 'LOVEstar44', 'LOVEstar44', '', '07069383433', 'United States', '50', 400, 0, 100, 0, 0, 400, '1', '', NULL, '', '', '', '2023-12-19 21:11:39'),
(7067165, 'fafdafa', 'angelthomas528@gmail.com', '', 'angelthomas528@gmail.com', '€', 'Male', 'Pro', 'angelthomas528@gmail.com', 'angelthomas528@gmail.com', '', '4343434', 'Belgium', '', 0, 0, 0, 0, 0, 0, '0', NULL, NULL, '', '', '', '2023-12-24 17:42:05'),
(271212434, 'Micheal', 'Mizonfuo', '', 'izonfuopreye1@gmail.com', '', 'Male', 'Starter', 'Micheal2003#', 'Micheal2003#', 'uploads/RSS3USDT.P_2023-11-11_06-06-55.png', '9030765186', '', '', 0, 0, 0, 0, 0, 500, '1', '', NULL, '', '', '', '2023-12-19 07:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `name`, `address`) VALUES
(1, 'Bitcoin', '5454w54i40ljkfldfldkfklk'),
(2, 'Ethereum', '1ehehehehehehehehththehheheheheh'),
(3, 'Bitcoin Cash', '2bcbcbcbcbcbcbcbcbcbcbcbcbcbbcbcbc'),
(4, 'USDT', '3usdtusdtusdtusdtusdtusdtusdtusdtusdt'),
(5, 'Ripple', '4riririririririririrprprriririi');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `wallet` varchar(255) DEFAULT NULL,
  `method` varchar(255) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `acct_number` varchar(255) DEFAULT NULL,
  `acct_name` varchar(255) DEFAULT NULL,
  `acct_swift` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `email`, `amount`, `wallet`, `method`, `bank_name`, `acct_number`, `acct_name`, `acct_swift`, `status`, `date`) VALUES
(81742, 'fu109306@gmail.com', '50', '12345678990000000000000000', 'BANK', 'Wallist', '2323232', 'babab', '434343', 'Pending', '2023-12-19 06:46:58'),
(990488, 'warrist9@gmail.com', '100', '$dorothy', 'Cash app ', '$dorothy', '$dorothy', 'Cash app ', '726', 'Pending', '2023-12-20 01:56:56'),
(990489, '', '45', '12345678990000000000000000', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 16:39:25'),
(990490, 'fu109306@gmail.com', '5454', '54dfafdafdasfdasfda', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 16:43:29'),
(990491, 'fu109306@gmail.com', '5454', '54dfafdafdasfdasfda', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 16:45:00'),
(990492, 'fu109306@gmail.com', '5454', '54dfafdafdasfdasfda', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 16:47:30'),
(990493, 'fu109306@gmail.com', '45', 'fdafdafdasfafd', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 16:47:42'),
(990494, 'fu109306@gmail.com', '100', '12345678990000000000000000', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 16:49:51'),
(990495, 'fu109306@gmail.com', '100', '12345678990000000000000000', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 16:54:04'),
(990496, 'fu109306@gmail.com', '100', '12345678990000000000000000', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 17:07:15'),
(990497, 'fu109306@gmail.com', '100', '12345678990000000000000000', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 17:08:30'),
(990498, 'fu109306@gmail.com', '45', '12345678990000000000000000', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 17:12:01'),
(990499, 'warrist9@gmail.com', '$100', '$dorothy', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 17:21:54'),
(990500, 'izonfuopreye1@gmail.com', '$500', '$dhdhdb', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-22 17:24:17'),
(990501, 'warrist9@gmail.com', '100', '$dorothy', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-27 11:24:24'),
(990502, 'warrist9@gmail.com', '100', '$dorothy', '', NULL, NULL, NULL, NULL, 'PENDING', '2023-12-30 17:27:49'),
(990503, 'sanders43607@yahoo.com', '$3,850', '$Sikorskiuh60', '', NULL, NULL, NULL, NULL, 'PENDING', '2024-01-02 01:31:30'),
(990504, 'warrist9@gmail.com', '100', '$dorothy', '', NULL, NULL, NULL, NULL, 'PENDING', '2024-01-08 09:19:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `btc`
--
ALTER TABLE `btc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package1`
--
ALTER TABLE `package1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `btc`
--
ALTER TABLE `btc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `package1`
--
ALTER TABLE `package1`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271212435;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990505;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
