-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 05:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pants', NULL, NULL),
(2, 'Shirts', NULL, NULL),
(3, 'Longsleeves', NULL, NULL),
(4, 'Poloshirts', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_23_020311_create_products_table', 1),
(6, '2024_05_12_033533_create_cart_table', 1),
(7, '2024_05_12_063936_add_category_to_products', 1),
(8, '2024_05_29_131142_create_checkout_table', 1),
(9, '2024_05_29_164804_create_order_items', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `beneficiary_name` varchar(255) DEFAULT NULL,
  `swift_code` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_method`, `bank_name`, `beneficiary_name`, `swift_code`, `total_amount`, `created_at`, `updated_at`) VALUES
(2, 1, 'bank', 'sdsdsds', 'Jarred Saludaga2', '2ae23131231', 250.00, '2024-05-31 06:36:12', '2024-05-31 06:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `imageUrl` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `product_name`, `imageUrl`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 1, 250.00, 'Tops and T-Shirt', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/e08e8cb7-4009-48de-bff6-32742ff06ca7/sportswear-t-shirt-MV5kVX.png', '2024-05-31 06:36:12', '2024-05-31 06:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `imageUrl` varchar(255) DEFAULT NULL,
  `product_status` varchar(255) NOT NULL DEFAULT 'Available',
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `quantity`, `imageUrl`, `product_status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Tops and T-Shirt', 'A white shirt for men', 250.00, 3, 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/e08e8cb7-4009-48de-bff6-32742ff06ca7/sportswear-t-shirt-MV5kVX.png', 'available', 2, '2024-05-31 06:34:19', '2024-05-31 06:53:07'),
(2, 'Men T-shirt', 'Stylish Mountain Warehouse Shirt', 750.00, 20, 'https://ih1.redbubble.net/image.1926013279.6349/ssrco,active_tshirt,mens,172b47:4762f60800,front,square_product,600x600.u4.jpg', 'available', 2, '2024-05-31 06:34:19', '2024-05-31 06:34:19'),
(3, 'Neck T-Shirt', 'Basic Model Crew Neck T-Shirt', 250.00, 50, 'https://terranova.ph/cdn/shop/files/SAB0055555001S105_det_1_06280311.jpg?v=1697618395&width=1946', 'available', 2, '2024-05-31 06:34:19', '2024-05-31 06:34:19'),
(4, 'Khaki Pants', 'Fashion Men Casual Work Cotton Pure', 850.00, 25, 'https://i5.walmartimages.com/seo/Homenesgenics-Sale-Clearance-Khaki-Pants-for-Men-Fashion-Men-Casual-Work-Cotton-Pure-Elastic-Waist-Long-Pants-Trousers_63e77ffa-309a-46d5-ad1c-476fbfbedecd_1.2221bce06ce4c8151afaf8365ebfaf19.jpeg', 'available', 1, '2024-05-31 06:34:19', '2024-05-31 06:34:19'),
(5, 'Maroon Pants', 'Stylish Maroon Pants for Men', 650.00, 15, 'https://i.pinimg.com/736x/4d/89/6f/4d896fe91b04ab5a369854322b47e5ec.jpg', 'available', 1, '2024-05-31 06:34:19', '2024-05-31 06:34:19'),
(6, 'Cargo & Chino Style Pants', 'SweatPants Cargo & Chino Styles', 1000.00, 40, 'https://lscoecomm.scene7.com/is/image/lscoecomm/XX%20CHINO?fmt=jpeg&qlt=70&resMode=bisharp&fit=crop,1&op_usm=0.6,0.6,8&wid=1200&hei=1500', 'available', 1, '2024-05-31 06:34:19', '2024-05-31 06:34:19'),
(7, 'Long Sleeve Shirt', 'Biege Sleeve Style for Men', 750.00, 10, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/c1c6c30fb08047628a53afbe00333ddd_9366/1_Moment_Long_Sleeve_Shirt_Beige_IK8557_21_model.jpg', 'available', 3, '2024-05-31 06:34:19', '2024-05-31 06:34:19'),
(8, 'Run Long Sleeve Tee', 'Own the run White Sleeve Tee', 350.00, 25, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/7bbfb04fe3e043d189deecb3a3df48c6_9366/Own_The_Run_Long_Sleeve_Tee_White_IK7432_21_model.jpg', 'available', 3, '2024-05-31 06:34:19', '2024-05-31 06:34:19'),
(9, 'Reg Fit-Navy Shirt', 'Training LongSleeve For Women', 500.00, 5, 'https://i.pinimg.com/originals/a1/16/e7/a116e7c58eea396fd32c9e5ee9d723a8.jpg', 'available', 3, '2024-05-31 06:34:19', '2024-05-31 06:34:19'),
(10, 'Cotton Fit Polo Shirt', 'Cotton Pique Polo Shirt For Men', 1200.00, 50, 'https://shop.mango.com/assets/rcs/pics/static/T6/fotos/S/67026318_30.jpg?imwidth=2048&imdensity=1&ts=1706029390393', 'available', 4, '2024-05-31 06:34:19', '2024-05-31 06:34:19'),
(11, 'Black Polo Shirt', 'Stylish Men Polo Shirt Fit', 950.00, 10, 'https://www.kennethcole.com/cdn/shop/products/cdes8f120000_black_4_800x.jpg?v=1670444579', 'available', 4, '2024-05-31 06:34:19', '2024-05-31 06:34:19'),
(12, 'Royal Blue Polo Shirt', 'Short Sleeve Royal Blue for Men', 1500.00, 15, 'https://rukminim1.flixcart.com/image/850/1000/xif0q/t-shirt/b/a/i/m-pckb01179-p7-park-avenue-original-imagpfh3dgsnndyt.jpeg?q=90', 'available', 4, '2024-05-31 06:34:19', '2024-05-31 06:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile_number`, `address`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$xm6/Ddq8oljtkFYzHWqRSuMeDvX48qKGcGWi9sc3encrHiID/i/Du', '1234567890', 'Admin Address', 'inactive', 'admin', NULL, '2024-05-31 06:06:02', '2024-05-31 07:41:28'),
(2, 'jarred', 'jarred@gmail.com', NULL, '$2y$12$fMZUZsnbafx1VW.lgmebSuA95VodOCmwLHWqUlOhgDMhc7XJrK.WG', '0348304834', 'proper punta engano', 'inactive', 'user', NULL, '2024-05-31 06:28:25', '2024-05-31 07:42:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
