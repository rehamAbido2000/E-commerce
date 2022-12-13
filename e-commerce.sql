-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 09:24 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `adress`, `description`, `img`, `time`) VALUES
(2, 'Brandon Mcintyre', 'Tempora cillum volup', 'Artical-852591.jpg', '2021-12-16 22:00:00'),
(3, 'Ayanna Porter', 'Enim reprehenderit e', 'Artical-561725.jpg', '2021-12-16 22:00:00'),
(5, 'Mikayla Wiggins', 'Dolorem dolores volu', 'Artical-691149.webp', '2021-12-18 22:00:00'),
(6, 'Felicia Holman', 'Consequat Officiis ', 'Artical-869352.webp', '2021-12-19 11:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`) VALUES
(1, 'Apple'),
(2, 'Beoplay'),
(3, 'Google'),
(4, 'Meizu'),
(5, 'OnePlus'),
(6, 'Samsung'),
(7, 'Sony'),
(9, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ordered` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(2, 'mobiles'),
(3, 'Computers & Laptops'),
(4, 'Cameras & Photos'),
(5, 'Hardware'),
(6, 'Smartphones & Tablets'),
(7, 'TV & Audio'),
(8, 'Gadgets'),
(9, 'Car Electronics'),
(10, 'Video Games & Consoles'),
(11, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `msg` text NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `msg`, `time`) VALUES
(1, 'moxudi', 'disebyzu@mailinator.com', 1115343143, 'Sequi ipsum ad volup', '2021/12/17 . 23:58:05'),
(2, 'moxudi', 'disebyzu@mailinator.com', 1115343143, 'Sequi ipsum ad volup', '2021/12/17 . 23:59:07'),
(3, 'moxudi', 'disebyzu@mailinator.com', 1115343143, 'Sequi ipsum ad volup', '2021/12/17 . 23:59:23'),
(4, 'hutyryp', 'sepocafam@mailinator.com', 1115343143, 'Nostrum commodo moll', '2021/12/18 . 16:48:48'),
(5, 'tegylywe', 'liqo@mailinator.com', 1115343143, 'Unde adipisicing in ', '2021/12/26 . 22:48:45'),
(6, 'lowabo', 'haveqom@mailinator.com', 2147483647, 'Pariatur Adipisicin', '2022/01/02 . 21:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `buyer_adress` varchar(255) NOT NULL,
  `buyer_phone` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_state` varchar(255) NOT NULL,
  `order_state` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `buyer_id`, `buyer_adress`, `buyer_phone`, `product_id`, `price`, `quantity`, `payment_method`, `payment_state`, `order_state`, `time`) VALUES
(1, 10, 'wosofoqu', 1679251, 15, 1550, 2, 'paypal', '0', '0', '2021-12-26 20:41:00'),
(2, 8, 'borequj', 1273849, 13, 900, 1, 'paypal', '1', '0', '2021-12-26 20:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_state` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Payment_User_Id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payer_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payer_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payer_shipping_address` text CHARACTER SET utf8 NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payment_state`, `Payment_User_Id`, `payer_id`, `payer_email`, `payer_shipping_address`, `amount`) VALUES
(1, 'PAYID-MHDDNYQ6VF52365R3904700G', 'approved', 'E9E29X7GELL2J', 'John', 'sb-k2tpy7592171@business.example.com', 'a:6:{s:14:\"recipient_name\";s:8:\"John Doe\";s:5:\"line1\";s:9:\"1 Main St\";s:4:\"city\";s:8:\"San Jose\";s:5:\"state\";s:2:\"CA\";s:11:\"postal_code\";s:5:\"95131\";s:12:\"country_code\";s:2:\"US\";}', 1310),
(3, 'PAYID-MHDDXGA44786886NN670683F', 'approved', 'E9E29X7GELL2J', 'John', 'sb-k2tpy7592171@business.example.com', 'a:6:{s:14:\"recipient_name\";s:8:\"John Doe\";s:5:\"line1\";s:9:\"1 Main St\";s:4:\"city\";s:8:\"San Jose\";s:5:\"state\";s:2:\"CA\";s:11:\"postal_code\";s:5:\"95131\";s:12:\"country_code\";s:2:\"US\";}', 1965),
(4, 'PAYID-MHDDYAA8TC323423F8716605', 'approved', 'E9E29X7GELL2J', 'John', 'sb-k2tpy7592171@business.example.com', 'a:6:{s:14:\"recipient_name\";s:8:\"John Doe\";s:5:\"line1\";s:9:\"1 Main St\";s:4:\"city\";s:8:\"San Jose\";s:5:\"state\";s:2:\"CA\";s:11:\"postal_code\";s:5:\"95131\";s:12:\"country_code\";s:2:\"US\";}', 2620),
(5, 'PAYID-MHDDZFY3CP570072J163934N', 'approved', 'E9E29X7GELL2J', 'John', 'sb-k2tpy7592171@business.example.com', 'a:6:{s:14:\"recipient_name\";s:8:\"John Doe\";s:5:\"line1\";s:9:\"1 Main St\";s:4:\"city\";s:8:\"San Jose\";s:5:\"state\";s:2:\"CA\";s:11:\"postal_code\";s:5:\"95131\";s:12:\"country_code\";s:2:\"US\";}', 3275),
(6, 'PAYID-MHDP44I8A2328264L276894X', 'approved', 'E9E29X7GELL2J', 'John', 'sb-k2tpy7592171@business.example.com', 'a:6:{s:14:\"recipient_name\";s:8:\"John Doe\";s:5:\"line1\";s:9:\"1 Main St\";s:4:\"city\";s:8:\"San Jose\";s:5:\"state\";s:2:\"CA\";s:11:\"postal_code\";s:5:\"95131\";s:12:\"country_code\";s:2:\"US\";}', 11644),
(8, 'PAYID-MHENHIY9HY28450H21270749', 'approved', 'E9E29X7GELL2J', 'John', 'sb-k2tpy7592171@business.example.com', 'a:6:{s:14:\"recipient_name\";s:8:\"John Doe\";s:5:\"line1\";s:9:\"1 Main St\";s:4:\"city\";s:8:\"San Jose\";s:5:\"state\";s:2:\"CA\";s:11:\"postal_code\";s:5:\"95131\";s:12:\"country_code\";s:2:\"US\";}', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `brand_id`, `product_name`, `price`, `quantity`, `img`, `discount`, `rate`, `description`, `time`) VALUES
(12, 2, 6, 'Huawei MediaPad', 550, 50, 'Product-365951.webp', 0, 2, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, repudiandae, reprehenderit impedit deleniti fuga quam vitae temporibus itaque, assumenda est dolore excepturi id deserunt aperiam veniam? Magnam molestiae, ea est placeat illum obcaecati recusandae omnis reprehenderit rem sit enim qui iste temporibus dolorum? A corrupti porro assumenda accusantium tempora cum sint mollitia molestiae illo neque excepturi, molestias repellat voluptates facilis sit magni velit? Obcaecati repellendus veniam, eaque, dolore labore illum rerum provident fugit possimus aliquid quidem deserunt voluptas ut! Delectus illum placeat assumenda repudiandae nam perferendis totam minus ullam voluptatum!', '2021-12-22 21:40:43'),
(13, 2, 6, 'Luke Morton', 900, 90, 'Product-544020.webp', 20, 3, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, repudiandae, reprehenderit impedit deleniti fuga quam vitae temporibus itaque, assumenda est dolore excepturi id deserunt aperiam veniam? Magnam molestiae, ea est placeat illum obcaecati recusandae omnis reprehenderit rem sit enim qui iste temporibus dolorum? A corrupti porro assumenda accusantium tempora cum sint mollitia molestiae illo neque excepturi, molestias repellat voluptates facilis sit magni velit? Obcaecati repellendus veniam, eaque, dolore labore illum rerum provident fugit possimus aliquid quidem deserunt voluptas ut! Delectus illum placeat assumenda repudiandae nam perferendis totam minus ullam voluptatum!', '2021-12-22 21:41:05'),
(14, 2, 1, 'Armando Byers', 991, 20, 'Product-808190.webp', 10, 0, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, repudiandae, reprehenderit impedit deleniti fuga quam vitae temporibus itaque, assumenda est dolore excepturi id deserunt aperiam veniam? Magnam molestiae, ea est placeat illum obcaecati recusandae omnis reprehenderit rem sit enim qui iste temporibus dolorum? A corrupti porro assumenda accusantium tempora cum sint mollitia molestiae illo neque excepturi, molestias repellat voluptates facilis sit magni velit? Obcaecati repellendus veniam, eaque, dolore labore illum rerum provident fugit possimus aliquid quidem deserunt voluptas ut! Delectus illum placeat assumenda repudiandae nam perferendis totam minus ullam voluptatum!', '2021-12-22 21:41:24'),
(15, 2, 1, 'Vivian Nash', 1550, 20, 'Product-483502.webp', 0, 4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, repudiandae, reprehenderit impedit deleniti fuga quam vitae temporibus itaque, assumenda est dolore excepturi id deserunt aperiam veniam? Magnam molestiae, ea est placeat illum obcaecati recusandae omnis reprehenderit rem sit enim qui iste temporibus dolorum? A corrupti porro assumenda accusantium tempora cum sint mollitia molestiae illo neque excepturi, molestias repellat voluptates facilis sit magni velit? Obcaecati repellendus veniam, eaque, dolore labore illum rerum provident fugit possimus aliquid quidem deserunt voluptas ut! Delectus illum placeat assumenda repudiandae nam perferendis totam minus ullam voluptatum!', '2021-12-22 21:41:43'),
(16, 7, 2, 'Tana Hodge', 655, 22, 'Product-498472.webp', 30, 1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, repudiandae, reprehenderit impedit deleniti fuga quam vitae temporibus itaque, assumenda est dolore excepturi id deserunt aperiam veniam? Magnam molestiae, ea est placeat illum obcaecati recusandae omnis reprehenderit rem sit enim qui iste temporibus dolorum? A corrupti porro assumenda accusantium tempora cum sint mollitia molestiae illo neque excepturi, molestias repellat voluptates facilis sit magni velit? Obcaecati repellendus veniam, eaque, dolore labore illum rerum provident fugit possimus aliquid quidem deserunt voluptas ut! Delectus illum placeat assumenda repudiandae nam perferendis totam minus ullam voluptatum!', '2021-12-22 21:42:28'),
(17, 7, 2, 'Dexter Navarro', 369, 5, 'Product-252620.webp', 0, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, repudiandae, reprehenderit impedit deleniti fuga quam vitae temporibus itaque, assumenda est dolore excepturi id deserunt aperiam veniam? Magnam molestiae, ea est placeat illum obcaecati rec', '2021-12-22 21:42:49'),
(18, 3, 3, 'Brenda Calderon', 754, 80, 'Product-39570.webp', 0, 0, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, repudiandae, reprehenderit impedit deleniti fuga quam vitae temporibus itaque, assumenda est dolore excepturi id deserunt aperiam veniam? Magnam molestiae, ea est placeat illum obcaecati recusandae omnis reprehenderit rem sit enim qui iste temporibus dolorum? A corrupti porro assumenda accusantium tempora cum sint mollitia molestiae illo neque excepturi, molestias repellat voluptates facilis sit magni velit? Obcaecati repellendus veniam, eaque, dolore labore illum rerum provident fugit possimus aliquid quidem deserunt voluptas ut! Delectus illum placeat assumenda repudiandae nam perferendis totam minus ullam voluptatum!', '2021-12-22 22:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`, `adress`, `type`) VALUES
(1, 'ali', 'ali@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male', '0', 1),
(8, 'amr', 'amr@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male', '0', 2),
(9, 'kerexig', 'ruzupev@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'male', '0', 2),
(10, 'ahmed', 'ahmed@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male', '0', 2),
(11, 'mokidapuqe', 'coxetacapo@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'male', '0', 2),
(12, 'Geoffrey Franks', 'piret@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'male', '0', 1),
(13, 'hafyv', 'woreke@mailinator.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_name` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `medicine_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_id` (`payment_id`),
  ADD KEY `Payment_User_Id` (`Payment_User_Id`),
  ADD KEY `payer_id` (`payer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `p_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `prod_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_name` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
