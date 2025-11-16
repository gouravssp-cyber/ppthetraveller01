-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2025 at 01:27 PM
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
-- Database: `sspsof5_ppdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:3;', 1762777328),
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1762777328;', 1762777328),
('laravel-cache-livewire-rate-limiter:42ccfafda53fdee70027f01d3997be7f911d0e1c', 'i:1;', 1762776004),
('laravel-cache-livewire-rate-limiter:42ccfafda53fdee70027f01d3997be7f911d0e1c:timer', 'i:1762776004;', 1762776004),
('laravel-cache-livewire-rate-limiter:5bacd5bcfd02e42e4e0e5fcd6f3241c3ac442473', 'i:1;', 1762761195),
('laravel-cache-livewire-rate-limiter:5bacd5bcfd02e42e4e0e5fcd6f3241c3ac442473:timer', 'i:1762761195;', 1762761195);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `tour_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `h1_title` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `slug`, `tour_type_id`, `meta_title`, `meta_description`, `h1_title`, `description`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'leh ladakh tour', 'leh-ladakh-tour', 1, 'Leh Ladakh Tour Package – Explore the Land of High Passes', 'Book your Manali tour package for 4 days and explore Solang Valley, Rohtang Pass & more. Perfect trip for nature & adventure lovers.', 'Leh Ladakh Tour Package – Explore the Land of High Passes', 'Adventure, Monasteries & Lakes in the Himalayas', 'active', 1, '2025-11-08 20:08:39', '2025-11-08 20:08:39'),
(2, 'Sikkim2', 'sikkim2', 1, 'Tour Packages in Sikkim', 'Discover Goa beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Goa tour package now.', 'Tour Packages in Sikkim', 'Discover Goa beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Goa tour package now.', 'active', 1, '2025-11-08 20:13:20', '2025-11-08 20:13:20'),
(3, 'Arunachal Pradesh', 'arunachal-pradesh', 1, 'Tour Packages in Arunachal Pradesh', 'Discover Arunachal Pradesh beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures.', 'Arunachal Pradesh Itinerary', 'Discover Himachal Pradesh beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Himachal Pradesh tour package now', 'active', 1, '2025-11-08 20:16:22', '2025-11-08 20:16:22'),
(4, 'Mizoram', 'mizoram', 1, 'Tour Packages in Mizoram', 'Discover Mizoram beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Mizoram tour package now', 'Mizoram Itinerary', 'Discover Mizoram beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Mizoram tour package now', 'active', 1, '2025-11-08 20:17:38', '2025-11-08 20:17:38'),
(5, 'Tripura', 'tripura', 1, 'Tour Packages in Tripura', 'Discover Tripura beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Tripura tour package now.', 'Tripura Itinerary', 'Discover Tripura beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Tripura tour package now.', 'active', 1, '2025-11-08 20:19:09', '2025-11-08 20:19:09'),
(6, 'Nagaland', 'nagaland', 1, 'Tour Packages in Nagaland', 'Discover Nagaland beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Nagaland tour package now.', 'Nagaland Itinerary', 'Discover Nagaland beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Nagaland tour package now.', 'active', 0, '2025-11-08 20:20:30', '2025-11-08 20:20:30'),
(7, 'shillong', 'shillong', 1, 'Tour Packages in Shillong | Shillong Tour Packages', 'Discover Shillong beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Shillong tour package now.', 'Shillong Itinerary', 'Discover Shillong beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Shillong tour package now.', 'active', 1, '2025-11-08 20:21:29', '2025-11-08 20:21:29'),
(8, 'meghalaya', 'meghalaya', 1, 'Tour Packages in Meghalaya', 'Discover Goa beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Goa tour package now.', 'Tour Packages in Meghalaya', 'Discover Goa beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Goa tour package now.', 'active', 1, '2025-11-08 20:22:26', '2025-11-08 20:22:26'),
(9, 'Ladakh Tour', 'ladakh-tour', 1, 'Tour Packages in Ladakh | Ladakh Tour Packages', 'Book Ladakh tour packages to discover spiritual Kurukshetra, vibrant Chandigarh, scenic Pinjore Gardens, Sultanpur National Park.', 'Tour Packages in Ladakh | Ladakh Tour Packages', 'Book Ladakh tour packages to discover spiritual Kurukshetra, vibrant Chandigarh, scenic Pinjore Gardens, Sultanpur National Park, and the cultural charm of Kingdom of Dreams.', 'active', 1, '2025-11-08 20:24:29', '2025-11-08 20:24:29'),
(10, 'Shimla', 'shimla', 1, 'Tour Packages in Shimla', 'Discover Shimla beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. ', 'Tour Packages in Shimla', 'Discover Shimla beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Himachal Pradesh tour package now.', 'active', 1, '2025-11-08 20:31:13', '2025-11-08 20:31:13'),
(11, 'Manipur', 'manipur', 1, 'Tour Packages in Manipur | Manipur Tour Packages', 'Discover Manipur’s charm with Loktak Lake, Kangla Fort, vibrant culture, and scenic hills. Explore temples, traditions, and nature in this Northeast gem.', 'Tour Packages in Manipur | Manipur Tour Packages', 'Discover Manipur’s charm with Loktak Lake, Kangla Fort, vibrant culture, and scenic hills. Explore temples, traditions, and nature in this Northeast gem.', 'active', 1, '2025-11-08 20:31:54', '2025-11-08 20:31:54'),
(12, 'Assam Tour', 'assam-tour', 1, 'Tour Packages in Assam | Assam Tour Packages', 'Discover Kashmir beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Kashmir tour package now.', 'Tour Packages in Assam | Assam Tour Packages', 'Discover Kashmir beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Kashmir tour package now.', 'active', 1, '2025-11-08 20:32:48', '2025-11-08 20:32:48'),
(13, 'kashmir', 'kashmir', 1, 'Tour Packages in Kashmir | Kashmir Tour Packages', 'Discover Kashmir beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Kashmir tour package now', 'Tour Packages in Kashmir | Kashmir Tour Packages', 'Discover Kashmir beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Kashmir tour package now.', 'active', 1, '2025-11-08 20:34:23', '2025-11-08 20:34:23'),
(14, 'Himachal Pradesh', 'himachal-pradesh', 1, 'Tour Packages in Himachal Pradesh', 'Discover Himachal Pradesh beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures.', 'Tour Packages in Himachal Pradesh', 'Discover Himachal Pradesh beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Himachal Pradesh tour package now.', 'active', 1, '2025-11-08 20:36:55', '2025-11-08 20:36:55'),
(15, 'andaman', 'andaman', 1, 'Tour Packages in Andaman', 'Discover Goa beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Goa tour package now.', 'Tour Packages in Andaman', 'Discover Goa beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Goa tour package now.', 'active', 1, '2025-11-08 20:38:12', '2025-11-09 23:47:32');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `destination_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `package_id`, `destination_id`, `question`, `answer`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'What should I pack for the trip?', '<h3><br></h3><p>Pack layers, as temperatures can vary significantly. Include warm clothing, comfortable shoes for trekking, and essentials like sunscreen and a camera.</p><p><br></p>', 1, '2025-11-09 12:23:50', '2025-11-09 12:23:50'),
(2, 1, NULL, '  Are meals included in the package?', '<h3><br></h3><p>Yes, the package typically includes breakfast and dinner. Local cuisine will be highlighted during your stay.</p><p><br></p>', 2, '2025-11-09 12:23:50', '2025-11-09 12:23:50'),
(3, 1, NULL, 'Is the tour suitable for families?', '<h3><br></h3><p>Absolutely! The itinerary is designed to cater to all ages, with activities suitable for families and individuals alike.</p><h3><br><br></h3><p><br></p>', 3, '2025-11-09 12:23:50', '2025-11-09 12:23:50'),
(4, 1, NULL, 'What are the modes of transport during the tour?', '<h3><br></h3><p>Transport will be provided via private vehicles for comfort and convenience, ensuring a smooth travel experience throughout your tour.</p><p><br></p>', 4, '2025-11-09 12:23:50', '2025-11-09 12:23:50'),
(5, 3, NULL, ' Why is Dalhousie considered a top hill station in Himachal Pradesh?', '<h3><br><br></h3><p>Dalhousie is renowned for its scenic beauty, pleasant climate, and colonial heritage. Unlike crowded hill stations, it offers peaceful surroundings with easy access to forests, hills, and viewpoints.</p><p><br></p>', 1, '2025-11-09 16:55:33', '2025-11-09 16:55:33'),
(6, 3, NULL, 'What is the best time to visit Dalhousie?', '<h3><br></h3><p>The ideal time to visit Dalhousie is between March and June for pleasant weather and sightseeing, or September to November for clear skies and cooler temperatures. Winters (December–February) are perfect for snow lovers, as snowfall transforms Dalhousie into a winter wonderland, but some roads may be slippery.</p><p><br></p>', 2, '2025-11-09 16:55:33', '2025-11-09 16:55:33'),
(7, 3, NULL, ' Is Khajjiar included in Dalhousie tour?', '<h3><br><br></h3><p>Key attractions include Gandhi Chowk, St. John’s Church, Dainkund Peak, Khajjiar, and Panchpula. Khajjiar is particularly famous for its rolling meadows and lake, earning the nickname “Mini Switzerland of India.”</p><p><br></p>', 3, '2025-11-09 16:55:33', '2025-11-09 16:55:33'),
(8, 3, NULL, 'Are there activities suitable for families and children in Dalhousie?', '<h3><br></h3><p>Yes, Dalhousie is family-friendly with numerous activities suitable for children and elderly travelers. Nature walks, horse riding, boating in Khajjiar, and visits to viewpoints like Dainkund Peak are safe and enjoyable for all age groups</p><p><br></p>', 4, '2025-11-09 16:55:33', '2025-11-09 16:55:33'),
(9, 3, NULL, 'Is Dalhousie accessible by road, rail, and air?', '<h3><br></h3><p>Dalhousie is well-connected by road, making it accessible from nearby cities like Pathankot (about 80 km) via taxis or buses. The nearest railway station is Pathankot, and the nearest airport is Pathankot Airport, approximately 90 km away.</p><p><br></p>', 5, '2025-11-09 16:55:33', '2025-11-09 16:55:33'),
(10, 4, NULL, ' Arrival in Mandi', '<h3><br></h3><p>Upon arrival at Mandi, check into your hotel and relax for a while. Later, visit the famous Bhutnath Temple, stroll around the vibrant local market, and enjoy the serene atmosphere by the Beas River. Spend the evening at leisure and overnight stay in Mandi.</p><p><br></p>', 1, '2025-11-09 17:05:18', '2025-11-09 17:05:18'),
(11, 4, NULL, 'Excursion to Rewalsar Lake', '<h3><br></h3><p>After breakfast, proceed for a day trip to the sacred Rewalsar Lake, which is surrounded by temples, monasteries, and a Gurudwara. Explore the Buddhist Monastery, Naina Devi Temple, and soak in the spiritual vibes of this beautiful destination. Return to Mandi by evening for dinner and overnight stay.</p><p><br></p>', 2, '2025-11-09 17:05:18', '2025-11-09 17:05:18'),
(12, 4, NULL, ' Prashar Lake Adventure', '<h3><br></h3><p>Today, enjoy an adventurous drive to the mesmerizing Prashar Lake, nestled amidst the Dhauladhar ranges. Visit the ancient Prashar Rishi Temple, admire the floating island on the lake, and capture breathtaking views of the Himalayas. Return to Mandi in the evening for overnight stay at the hotel.</p><p><br></p>', 3, '2025-11-09 17:05:18', '2025-11-09 17:05:18'),
(13, 4, NULL, ' Departure from Mandi', '<h3><br></h3><p>After breakfast, visit the Panchvaktra Temple and enjoy panoramic views from Tarna Hill. Later, check out from the hotel and depart with unforgettable memories of your Mandi trip.</p><p><br></p>', 4, '2025-11-09 17:05:18', '2025-11-09 17:05:18'),
(14, 5, NULL, 'What’s covered in the Spiti Valley tour package?', '<h3><br></h3><p>You\'ll get hotel stays, transportation, guided tours, and select meals.</p><p><br></p>', 1, '2025-11-09 17:15:38', '2025-11-09 17:15:38'),
(15, 5, NULL, 'Can I customize the 4-days itinerary?', '<h3><br></h3><p>Yes, we can tweak some parts to fit your preferences!</p><p><br></p>', 2, '2025-11-09 17:15:38', '2025-11-09 17:15:38'),
(16, 5, NULL, 'What kind of transportation is included?', '<h3><br></h3><p>Comfortable private vehicles for all transfers and sightseeing.</p><p><br></p>', 3, '2025-11-09 17:15:38', '2025-11-09 17:15:38'),
(17, 5, NULL, 'Which spots will we visit?', '<h3><br></h3><p>We’ll explore Manali, Kaza –Kibber – Langza– Kaza.</p><p><br></p>', 4, '2025-11-09 17:15:38', '2025-11-09 17:15:38'),
(18, 5, NULL, 'Is this tour good for families?', '<h3><br></h3><p>Absolutely! The itinerary is family-friendly and has something for everyone.</p><p><br></p>', 5, '2025-11-09 17:15:38', '2025-11-09 17:15:38'),
(19, 6, NULL, 'What’s covered in the Spiti Valley tour package?', '<h3><br></h3><p>You\'ll get hotel stays, transportation, guided tours, and select meals.</p><p><br></p>', 1, '2025-11-09 17:24:52', '2025-11-09 17:24:52'),
(20, 6, NULL, '  Can I customize the 4-days itinerary?', '<h3><br></h3><p>Yes, we can tweak some parts to fit your preferences!</p><p><br></p>', 2, '2025-11-09 17:24:52', '2025-11-09 17:24:52'),
(21, 6, NULL, 'What kind of transportation is included?', '<h3><br></h3><p>Comfortable private vehicles for all transfers and sightseeing.</p><p><br></p>', 3, '2025-11-09 17:24:52', '2025-11-09 17:24:52'),
(22, 6, NULL, 'Which spots will we visit?', '<h3><br></h3><p>We’ll explore Manali, Kaza –Kibber – Langza– Kaza.</p><p><br></p>', 4, '2025-11-09 17:24:52', '2025-11-09 17:24:52'),
(23, 6, NULL, 'Is this tour good for families?', '<h3><br></h3><p>Absolutely! The itinerary is family-friendly and has something for everyone.</p><p><br></p>', 5, '2025-11-09 17:24:52', '2025-11-09 17:24:52'),
(24, 8, NULL, 'How do I reach Shimla?', '<h3><br></h3><p>Shimla is accessible by road, train (Kalka-Shimla toy train), and air (via Jubbarhatti Airport).</p><p><br></p>', 1, '2025-11-09 18:32:36', '2025-11-09 18:32:36'),
(25, 8, NULL, 'Is it safe to travel alone in Shimla?', '<h3><br></h3><p>Yes, Shimla is generally safe for solo travelers, but it\'s always good to stay cautious.</p><p><br></p>', 2, '2025-11-09 18:32:36', '2025-11-09 18:32:36'),
(26, 8, NULL, '  What kind of clothing should I pack?', '<h3><br></h3><p>Warm clothing is recommended, especially from October to February.</p><p><br></p>', 3, '2025-11-09 18:32:36', '2025-11-09 18:32:36'),
(27, 8, NULL, 'Are there any adventure sports available?', '<h3><br></h3><p>Yes, activities like paragliding, horse riding, and trekking are popular in and around Shimla.</p><p><br></p>', 4, '2025-11-09 18:32:36', '2025-11-09 18:32:36'),
(28, 9, NULL, 'Is Rohtang Pass accessible year-round?', '<h3><br></h3><p>No, it is usually open from May to October, depending on weather conditions.</p><p><br></p>', 1, '2025-11-09 18:53:04', '2025-11-09 18:53:04'),
(29, 9, NULL, 'What activities are suitable for beginners in Manali?', '<h3><br></h3><p>Options like paragliding, skiing lessons, and guided treks are beginner-friendly.</p><p><br></p>', 2, '2025-11-09 18:53:04', '2025-11-09 18:53:04'),
(30, 9, NULL, 'Can I find vegetarian food in Manali?', '<h3><br></h3><p>Yes, many restaurants offer a wide range of vegetarian options.</p><p><br></p>', 3, '2025-11-09 18:53:04', '2025-11-09 18:53:04'),
(31, 9, NULL, 'What should I carry for a trip to Manali?', '<h3><br></h3><p>Pack warm clothing, trekking shoes, personal essentials, and a camera for stunning views.</p><p><br></p>', 4, '2025-11-09 18:53:04', '2025-11-09 18:53:04'),
(32, 10, NULL, 'What is the best time to visit Bharatpur Beach, Neil Island?', '<h3><br></h3><p>October to May is ideal for pleasant weather and activities.</p><p><br></p>', 1, '2025-11-09 19:25:19', '2025-11-09 19:25:19'),
(33, 10, NULL, 'How do I reach Bharatpur Beach, Neil Island Islands?', '<h3><br></h3><p>Flights to Port Blair are available from major Indian cities, along with ferry services.</p><p><br></p>', 2, '2025-11-09 19:25:19', '2025-11-09 19:25:19'),
(34, 10, NULL, '  Are there any safety concerns for tourists?', '<h3><br></h3><p>Bharatpur Beach, Neil Island is generally safe; follow local guidelines.</p><p><br></p>', 3, '2025-11-09 19:25:19', '2025-11-09 19:25:19'),
(35, 10, NULL, 'What kind of accommodations are available?', '<h3><br></h3><p>Options range from budget hotels to luxury resorts.</p><p><br></p>', 4, '2025-11-09 19:25:19', '2025-11-09 19:25:19'),
(36, 10, NULL, '  Can I drink alcohol in Bharatpur Beach, Neil Island?', '<h3><br></h3><p>Yes, but restrictions apply in certain areas; check local regulations</p><p><br></p>', 5, '2025-11-09 19:25:20', '2025-11-09 19:25:20'),
(37, 11, NULL, 'What are the top attractions included in the Sikkim tourpackage?', '<h3><br></h3><p>Visits to popular Sikkim attractions.</p><p><br></p>', 1, '2025-11-10 02:50:29', '2025-11-10 02:50:29'),
(38, 11, NULL, 'What kind of food is available in Sikkim?', '<h3><br></h3><p>Sikkim offers a variety of local dishes, includingJadoh (rice cooked with meat), Dohneiiong (pork with black sesame),and Tungtap (fermented fish chutney). Indian, Chinese, andcontinental cuisines are also available in major towns and cities.</p><p><br></p>', 2, '2025-11-10 02:50:29', '2025-11-10 02:50:29'),
(39, 11, NULL, '  What are the popular activities to do in Sikkim?', '<h3><br></h3><p>The popular activities to do in Sikkim are Trekkingand hiking in the mountains, Visiting monasteries and cultural sites,River rafting and angling, Participating in local festivals and culturalevents.</p><p><br></p>', 3, '2025-11-10 02:50:29', '2025-11-10 02:50:29'),
(40, 11, NULL, '  What kind of accommodation options are available in Sikkim?', '<h3><br></h3><p>Accommodation options range from budget hotels andguesthouses to mid-range and luxury hotels. Homestays are alsobecoming popular, providing an opportunity to experience localhospitality and culture.</p><p><br></p>', 4, '2025-11-10 02:50:29', '2025-11-10 02:50:29'),
(41, 12, NULL, 'What is Kanyakumari famous for?', '<h3><br></h3><p>Famous for sunrise &amp; sunset views, Vivekananda Rock Memorial and Thiruvalluvar Statue.</p><p><br></p>', 1, '2025-11-10 02:56:30', '2025-11-10 02:56:30'),
(42, 12, NULL, 'Best time to visit Kanyakumari?', '<h3><br></h3><p>October to March for pleasant weather.</p><p><br></p>', 2, '2025-11-10 02:56:30', '2025-11-10 02:56:30'),
(43, 12, NULL, '  Is Kanyakumari suitable for families?', '<h3><br></h3><p>Yes, family-friendly with sightseeing and beaches.</p><p><br></p>', 3, '2025-11-10 02:56:30', '2025-11-10 02:56:30'),
(44, 12, NULL, 'Are meals included?', '<h3><br></h3><p>Breakfast included, other meals optional.</p><p><br></p>', 4, '2025-11-10 02:56:30', '2025-11-10 02:56:30'),
(45, 12, NULL, 'Can we book Poovar cruise in advance?', '<h3><br></h3><p>Yes, optional pre-booking available.</p><p><br></p>', 5, '2025-11-10 02:56:30', '2025-11-10 02:56:30'),
(46, 13, NULL, 'What’s covered in the Bomdila tour package?', '<h3><br></h3><p>You\'ll get hotel stays, transportation, guided tours, and select meals.</p><p><br></p>', 1, '2025-11-10 03:03:37', '2025-11-10 03:03:37'),
(47, 13, NULL, 'Can I customize the 4-days itinerary?', '<h3><br></h3><p>Yes, we can tweak some parts to fit your preferences!</p><p><br></p>', 2, '2025-11-10 03:03:37', '2025-11-10 03:03:37'),
(48, 13, NULL, 'What kind of transportation is included?', '<h3><br></h3><p>Comfortable private vehicles for all transfers and sightseeing.</p><p><br></p>', 3, '2025-11-10 03:03:38', '2025-11-10 03:03:38'),
(49, 13, NULL, 'Which spots will we visit?', '<h3><br></h3><p>We’ll explore Manali, Kaza –Kibber – Langza– Kaza.</p><p><br></p>', 4, '2025-11-10 03:03:38', '2025-11-10 03:03:38'),
(50, 13, NULL, '  Is this tour good for families?', '<h3><br></h3><p>Absolutely! The itinerary is family-friendly and has something for everyone.</p><p><br></p>', 5, '2025-11-10 03:03:38', '2025-11-10 03:03:38'),
(51, 14, NULL, 'What’s covered in the Sela Pass tour package?', '<h3><br></h3><p>You\'ll get hotel stays, transportation, guided tours, and select meals.</p><p><br></p>', 1, '2025-11-10 03:10:58', '2025-11-10 03:10:58'),
(52, 14, NULL, 'Can I customize the 4-days itinerary?', '<h3><br></h3><p>Yes, we can tweak some parts to fit your preferences!</p><p><br></p>', 2, '2025-11-10 03:10:58', '2025-11-10 03:10:58'),
(53, 14, NULL, 'What kind of transportation is included?', '<h3><br></h3><p>Comfortable private vehicles for all transfers and sightseeing.</p><p><br></p>', 3, '2025-11-10 03:10:58', '2025-11-10 03:10:58'),
(54, 14, NULL, 'Which spots will we visit?', '<h3><br></h3><p>We’ll explore Manali, Kaza –Kibber – Langza– Kaza.</p><p><br></p>', 4, '2025-11-10 03:10:58', '2025-11-10 03:10:58'),
(55, 14, NULL, 'Is this tour good for families?', '<h3><br></h3><p>Absolutely! The itinerary is family-friendly and has something for everyone.</p><p><br></p>', 5, '2025-11-10 03:10:58', '2025-11-10 03:10:58'),
(56, 15, NULL, 'What are the top attractions included in the Arunachal tourpackage?', '<h3><br></h3><p>Visits to popular Arunachal Pradesh attractions such as theItanagar Wildlife Sanctuary, Bomdila Monastery, Tawang Monastery,Ziro Valley, Namdapha National Park.</p><p><br></p>', 1, '2025-11-10 03:19:01', '2025-11-10 03:19:01'),
(57, 15, NULL, 'What kind of food is available in Arunachal Pradesh?', '<h3><br></h3><p>Arunachal Pradesh offers a variety of local dishes, includingJadoh (rice cooked with meat), Dohneiiong (pork with black sesame),and Tungtap (fermented fish chutney). Indian, Chinese, andcontinental cuisines are also available in major towns and cities.</p><p><br></p>', 2, '2025-11-10 03:19:01', '2025-11-10 03:19:01'),
(58, 15, NULL, 'What are the popular activities to do in Arunachal Pradesh?', '<h3><br></h3><p>The popular activities to do in Arunachal Pradesh are Trekkingand hiking in the mountains, Visiting monasteries and cultural sites,River rafting and angling, Participating in local festivals and culturalevents.</p><p><br></p>', 3, '2025-11-10 03:19:01', '2025-11-10 03:19:01'),
(59, 15, NULL, 'What kind of accommodation options are available in ArunachalPradesh?', '<h3><br></h3><p>Accommodation options range from budget hotels andguesthouses to mid-range and luxury hotels. Homestays are alsobecoming popular, providing an opportunity to experience localhospitality and culture.</p><p><br></p>', 4, '2025-11-10 03:19:01', '2025-11-10 03:19:01'),
(60, 16, NULL, 'What are the must-visit places in Tripura?', '<h3><br></h3><p>The most important places to visit in the region are Ujjayanta Palace, Neermahal, Unakoti, Sepahijala Wildlife Sanctuary, Tripura Sundari Temple, and Pilak. There is a blend of cultural heritage, natural beauty, and historical significance at these attractions.</p><p><br></p>', 1, '2025-11-10 03:28:56', '2025-11-10 03:28:56'),
(61, 16, NULL, 'What is the best time to visit Tripura?', '<h3><br></h3><p>The best time to visit Tripura is from October to March when the weather is pleasant and ideal for sightseeing and outdoor activities.</p><p><br></p>', 2, '2025-11-10 03:28:56', '2025-11-10 03:28:56'),
(62, 16, NULL, 'How many days are ideal for a Tripura tour?', '<h3><br></h3><p>For a comfortable trip to Tripura, a four to five day itinerary is ideal.</p><p><br></p>', 3, '2025-11-10 03:28:56', '2025-11-10 03:28:56'),
(63, 16, NULL, '  What type of accommodation options are available in Tripura?', '<h3><br></h3><p>Tripura offers a range of accommodations from budget hotels and guesthouses to mid-range hotels and heritage properties.</p><p><br></p>', 4, '2025-11-10 03:28:56', '2025-11-10 03:28:56'),
(64, 16, NULL, 'What is the local cuisine like in Tripura?', '<h3><br></h3><p>The cuisine of Tripura includes dishes such as Mui Borok (a traditional fish stew), Wahan Mosdeng (a spicy pork curry), and bamboo shoot preparations. Fresh, local ingredients are often used in the preparation of the food.</p><p><br></p>', 5, '2025-11-10 03:28:56', '2025-11-10 03:28:56'),
(65, 17, NULL, 'What is the best time to visit Tripura?', '<h3><br></h3><p>The best time to visit Tripura is from October to March when theweather is pleasant and ideal for sightseeing and outdoor activities.</p><p><br></p>', 1, '2025-11-10 03:37:34', '2025-11-10 03:37:34'),
(66, 17, NULL, 'How many days are ideal for a Tripura tour?', '<h3><br></h3><p>For a comfortable trip to Tripura, a four to five day itinerary isideal.</p><p><br></p>', 2, '2025-11-10 03:37:34', '2025-11-10 03:37:34'),
(67, 17, NULL, 'What type of accommodation options are available in Tripura?', '<h3><br></h3><p>Tripura offers a range of accommodations from budget hotelsand guesthouses to mid-range hotels and heritage properties.</p><h3><br><br></h3><p><br></p>', 3, '2025-11-10 03:37:34', '2025-11-10 03:37:34'),
(68, 17, NULL, 'What is the local cuisine like in Tripura?', '<h3><br></h3><p>The cuisine of Tripura includes dishes such as Mui Borok (atraditional fish stew), Wahan Mosdeng (a spicy pork curry), andbamboo shoot preparations. Fresh, local ingredients are often used inthe preparation of the food.</p><p><br></p>', 4, '2025-11-10 03:37:34', '2025-11-10 03:37:34'),
(69, 18, NULL, 'What is the best time to visit Mizoram?', '<h3><br></h3><p>The best time to visit Mizoram is from October to March whenthe weather is pleasant and suitable for sightseeing and outdooractivities.</p><p><br></p>', 1, '2025-11-10 03:46:12', '2025-11-10 03:46:12'),
(70, 18, NULL, 'How many days are ideal for a Mizoram tour?', '<h3><br></h3><p>A four to five days tour is ideal to cover the major attractions ofMizoram comfortably.</p><p><br></p>', 2, '2025-11-10 03:46:12', '2025-11-10 03:46:12'),
(71, 18, NULL, 'What type of accommodation options are available in Mizoram?', '<h3><br></h3><p>Mizoram offers a range of accommodations, from budget hotelsand guesthouses to mid-range hotels and homestays.</p><p><br></p>', 3, '2025-11-10 03:46:12', '2025-11-10 03:46:12'),
(72, 18, NULL, '  What is the local cuisine like in Mizoram?', '<h3><br></h3><p>Mizo cuisine includes dishes like Bamboo Shoot Fry, Bai (a stewmade with local vegetables and pork), Sawhchiar (a rice and meatdish), and Chhangban (sticky rice).</p><p><br></p>', 4, '2025-11-10 03:46:12', '2025-11-10 03:46:12'),
(73, 19, NULL, 'What is the best time to visit Mizoram?', '<h3><br></h3><p>The best time to visit Mizoram is from October to March whenthe weather is pleasant and suitable for sightseeing and outdooractivities.</p><p><br></p>', 1, '2025-11-10 03:54:05', '2025-11-10 03:54:05'),
(74, 19, NULL, '  How many days are ideal for a Mizoram tour?', '<h3><br></h3><p>A four to five days tour is ideal to cover the major attractions ofMizoram comfortably.</p><p><br></p>', 2, '2025-11-10 03:54:05', '2025-11-10 03:54:05'),
(75, 19, NULL, 'What type of accommodation options are available in Mizoram?', '<h3><br></h3><p>Mizoram offers a range of accommodations, from budget hotelsand guesthouses to mid-range hotels and homestays.</p><p><br></p>', 3, '2025-11-10 03:54:05', '2025-11-10 03:54:05'),
(76, 19, NULL, '  What is the local cuisine like in Mizoram?', '<h3><br></h3><p>Mizo cuisine includes dishes like Bamboo Shoot Fry, Bai (a stewmade with local vegetables and pork), Sawhchiar (a rice and meatdish), and Chhangban (sticky rice).</p><p><br></p>', 4, '2025-11-10 03:54:05', '2025-11-10 03:54:05'),
(77, 20, NULL, 'What are the must-visit places in Nagaland?', '<h3><br></h3><p>Nagaland offers a blend of cultural heritage and natural beauty, with must-visit destinations like Dzukou Valley, Kohima War Cemetery, and Khonoma Village.</p><p><br></p>', 1, '2025-11-10 04:01:05', '2025-11-10 04:01:05'),
(78, 20, NULL, 'What is the best time to visit Nagaland?', '<h3><br></h3><p>Nagaland is best visited between October and May. During thisperiod, the state enjoys pleasant weather and the Hornbill Festival,which displays the state\'s vibrant culture, takes place in December.</p><p><br></p>', 2, '2025-11-10 04:01:05', '2025-11-10 04:01:05'),
(79, 20, NULL, '  How many days are ideal for a Nagaland tour?', '<h3><br></h3><p>If you wish to explore the major attractions of Nagalandcomfortably, a tour of four to five days is ideal.</p><p><br></p>', 3, '2025-11-10 04:01:05', '2025-11-10 04:01:05'),
(80, 20, NULL, 'What is the local cuisine like in Nagaland?', '<h3><br></h3><p>The Naga cuisine includes dishes such as smoked pork withbamboo shoots, fish cooked in bamboo tubes, and a variety of spicychutneys.</p><h3><br><br></h3><p><br></p>', 4, '2025-11-10 04:01:05', '2025-11-10 04:01:05'),
(81, 20, NULL, 'What type of accommodation options are available in Nagaland?', '<h3><br></h3><p>Nagaland tour packages offer a range of accommodations, from budget guesthouses to mid-range hotels and cozy homestays. Cities like Kohima and Dimapur provide more options, while village stays are simpler yet comfortable, giving a true taste of local life.</p><p><br></p>', 5, '2025-11-10 04:01:05', '2025-11-10 04:01:05'),
(82, 21, NULL, 'What is Leh-Ladakh famous for?', '<h3><br></h3><p>Leh-Ladakh is famous for its mesmerizing landscapes, including high-altitude deserts, turquoise lakes, and snow-capped mountains. It is also known for ancient Buddhist monasteries, vibrant festivals, and unique local culture that attracts travelers from around the world.</p><p><br></p>', 1, '2025-11-10 04:08:34', '2025-11-10 04:08:34'),
(83, 21, NULL, 'What is the best time to visit Leh-Ladakh?', '<h3><br></h3><p>The ideal time to visit Leh-Ladakh is from May to September when roads are accessible, weather is pleasant, and sightseeing is comfortable. Winter months bring heavy snowfall and road closures, making travel extremely challenging, so planning your trip during summer ensures a smooth experience.</p><p><br></p>', 2, '2025-11-10 04:08:34', '2025-11-10 04:08:34'),
(84, 21, NULL, '  Is Leh-Ladakh suitable for family trips?', '<h3><br></h3><p>Yes, Leh-Ladakh can be visited by families, but altitude sickness is a concern. It is advisable to take proper acclimatization, plan shorter day trips initially, and consult a doctor if traveling with children or elderly members. The region offers safe and memorable experiences with breathtaking views for all age groups.</p><p><br></p>', 3, '2025-11-10 04:08:34', '2025-11-10 04:08:34'),
(85, 21, NULL, '  What are the must-visit attractions in Leh-Ladakh?', '<h3><br></h3><p>Must-visit attractions include Pangong Lake, Nubra Valley, Khardung La Pass, Thiksey Monastery, Hemis Monastery, and magnetic hills. Each location provides unique experiences, from high-altitude adventure to spiritual exploration, making Leh-Ladakh a comprehensive destination for nature and culture lovers.</p><p><br></p>', 4, '2025-11-10 04:08:34', '2025-11-10 04:08:34'),
(86, 21, NULL, 'Are adventure activities available in Leh-Ladakh?', '<h3><br></h3><p>Absolutely! Leh-Ladakh is a hub for adventure enthusiasts. Visitors can enjoy river rafting, jeep safaris, trekking, and mountain biking. These activities are best undertaken with experienced guides and proper preparation due to the high-altitude terrain, ensuring both safety and excitement</p><p><br></p>', 5, '2025-11-10 04:08:34', '2025-11-10 04:08:34'),
(87, 22, NULL, 'What are the highlights of this Ladakh 3-day tour?', '<h3><br></h3><p>The tour covers Leh Palace, Shanti Stupa, Khardung La Pass, Nubra Valley, Diskit Monastery, Hunder Sand Dunes, and Pangong Lake.</p><p><br></p>', 1, '2025-11-10 07:15:28', '2025-11-10 07:15:28'),
(88, 22, NULL, 'Is this trip suitable for first-time visitors to Ladakh?', '<h3><br></h3><p>Yes, the 3-day tour is designed to cover key attractions while keeping the itinerary manageable for first-time travelers.</p><p><br></p>', 2, '2025-11-10 07:15:28', '2025-11-10 07:15:28'),
(89, 22, NULL, ' What type of accommodation is provided during the tour?', '<h3><br><br></h3><p>Comfortable hotels and camps are arranged in Leh, Nubra, and Pangong, offering both convenience and local charm.</p><p><br></p>', 3, '2025-11-10 07:15:28', '2025-11-10 07:15:28'),
(90, 22, NULL, 'How is transportation managed throughout the journey?', '<h3><br></h3><p>Air-conditioned private vehicles or SUVs are provided for intercity travel and sightseeing, ensuring a smooth ride in Ladakh’s terrain.</p><p><br></p>', 4, '2025-11-10 07:15:28', '2025-11-10 07:15:28'),
(91, 22, NULL, 'Can families and elderly travelers join this tour?', '<h3><br></h3><p>Yes, families can enjoy this tour. However, due to high altitude, elderly travelers should consult their doctor before planning the trip.</p><p><br></p>', 5, '2025-11-10 07:15:28', '2025-11-10 07:15:28'),
(100, 23, NULL, 'What’s covered in the Meghalaya tour package?', '<h3><br></h3><p>You\'ll get hotel stays, transportation, guided tours, and select meals.</p><p><br></p>', 1, '2025-11-10 00:32:31', '2025-11-10 00:32:31'),
(200, 23, NULL, 'Can I customize the 6-day itinerary?', '<h3><br></h3><p>Yes, we can tweak some parts to fit your preferences!</p><p><br></p>', 2, '2025-11-10 00:32:31', '2025-11-10 00:32:31'),
(300, 23, NULL, 'What kind of transportation is included?', '<h3><br></h3><p>Comfortable private vehicles for all transfers and sightseeing.</p><p><br></p>', 3, '2025-11-10 00:32:31', '2025-11-10 00:32:31'),
(400, 23, NULL, 'Which spots will we visit?', '<h3><br></h3><p>We’ll explore Shillong, Cherrapunji, Dawki River, and root bridges.</p><p><br></p>', 4, '2025-11-10 00:32:31', '2025-11-10 00:32:31'),
(500, 23, NULL, 'Is this tour good for families?', '<h3><br></h3><p>Absolutely! The itinerary is family-friendly and has something for everyone.</p><p><br></p>', 5, '2025-11-10 00:32:31', '2025-11-10 00:32:31'),
(501, 24, NULL, 'What’s included in the bike trip package?', '<h3><br></h3><p>The package covers bike rentals, fuel, accommodations, and a guide.</p><p><br></p>', 1, '2025-11-10 00:51:23', '2025-11-10 00:51:23'),
(502, 24, NULL, 'Can I bring my own bike?', '<h3><br></h3><p>Yes, feel free! The package cost will adjust accordingly.</p><p><br></p>', 2, '2025-11-10 00:51:23', '2025-11-10 00:51:23'),
(503, 24, NULL, 'Do I need prior experience with bike trips?', '<h3><br></h3><p>Basic biking skills are a must; the trails are thrilling but manageable.</p><p><br></p>', 3, '2025-11-10 00:51:23', '2025-11-10 00:51:23'),
(504, 24, NULL, ' What’s the main route for this trip?', '<h3><br><br></h3><p>We’ll ride through Shillong, Cherrapunji, Dawki, and scenic villages.</p><p><br></p>', 4, '2025-11-10 00:51:23', '2025-11-10 00:51:23'),
(505, 24, NULL, 'Is it safe for solo riders?', '<h3><br></h3><p>Definitely! Our guides ensure a safe and fun experience for everyone.</p><p><br></p>', 5, '2025-11-10 00:51:23', '2025-11-10 00:51:23'),
(506, 25, NULL, 'What’s included in the bike trip package?', '<h3><br></h3><p>The package covers bike rentals, fuel, accommodations, and a guide.</p><h3><br><br></h3><p><br></p>', 1, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(507, 25, NULL, 'Can I bring my own bike?', '<h3><br></h3><p>Yes, feel free! The package cost will adjust accordingly.</p><h3><br><br></h3><p><br></p>', 2, '2025-11-10 02:06:10', '2025-11-10 02:06:10'),
(508, 25, NULL, 'Do I need prior experience with bike trips?', '<h3><br></h3><p>Basic biking skills are a must; the trails are thrilling but manageable.</p><h3><br><br></h3><p><br></p>', 3, '2025-11-10 02:06:10', '2025-11-10 02:06:10'),
(509, 25, NULL, 'What’s the main route for this trip?', '<h3><br></h3><p>We’ll ride through Shillong, Cherrapunji, Dawki, and scenic villages.</p><p><br></p>', 4, '2025-11-10 02:06:10', '2025-11-10 02:06:10'),
(510, 25, NULL, 'Is it safe for solo riders?', '<h3><br></h3><p>Definitely! Our guides ensure a safe and fun experience for everyone.</p><p><br><br></p><p><br></p>', 5, '2025-11-10 02:06:10', '2025-11-10 02:06:10'),
(511, 26, NULL, 'What is the best time to visit Cherrapunji?', '<h3><br></h3><p>The best time to visit Cherrapunji is from October to May, when the weather is pleasant and ideal for sightseeing and trekking. While the monsoon season (June to September) brings heavy rains and lush greenery, it can make travel difficult. For a comfortable trip, plan your visit during the dry months.</p><p><br></p>', 1, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(512, 26, NULL, 'How did I reach Cheerapunji?', '<h3><br></h3><p>Cherrapunji is well connected by road. The nearest airport is in Shillong, about 54 km away, and the closest railway station is in Guwahati, around 140 km from Cherrapunji. From these points, you can hire a taxi or take a bus to reach Cherrapunji comfortably.</p><p><br></p>', 2, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(513, 26, NULL, 'What are the must-visit attractions in Cherrapunji?', '<h3><br></h3><p>Must-visit attractions in Cherrapunji include the Nohkalikai Waterfalls, Seven Sisters Waterfalls, Double Decker Living Root Bridge, Mawsmai Caves, and the lush green valleys surrounding the region. These spots showcase the natural beauty and unique culture of the area.</p><p><br></p>', 3, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(514, 26, NULL, 'Is Cherrapunji suitable for family trips?', '<h3><br></h3><p>Yes, Cherrapunji is great for family trips. Its natural beauty, easy trekking trails, waterfalls, and cultural sites offer enjoyable experiences for all ages. Just plan your visit during the dry season for comfortable travel.</p><p><br></p>', 4, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(515, 26, NULL, 'Are there any adventure sports available?', '<h3><br></h3><p>Yes, Cherrapunji is a great destination for adventure lovers. You can enjoy activities like trekking through dense forests, river canyoning, exploring limestone caves, ziplining across valleys, and rappelling down waterfalls. These adventures provide a thrilling way to experience the region’s natural beauty.</p><p><br><br></p><p><br></p>', 5, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(516, 27, NULL, 'What is the best time to visit Khasi Hills?', '<h3><br></h3><p>The best time to visit Khasi Hills is typically between October to March.</p><p><br></p>', 1, '2025-11-10 04:04:51', '2025-11-10 04:04:51'),
(517, 27, NULL, 'What should I pack for the trip?', '<h3><br></h3><p>Pack layers, as temperatures can vary significantly. Include warm clothing, comfortable shoes for trekking, and essentials like sunscreen and a camera</p><p><br></p>', 2, '2025-11-10 04:04:51', '2025-11-10 04:04:51'),
(518, 27, NULL, 'Are meals included in the package?', '<h3><br></h3><p>Yes, the package typically includes breakfast and dinner. Local cuisine will be highlighted during your stay.</p><p><br></p>', 3, '2025-11-10 04:04:51', '2025-11-10 04:04:51'),
(519, 27, NULL, 'Is the tour suitable for families?', '<h3><br></h3><p>Absolutely! The itinerary is designed to cater to all ages, with activities suitable for families and individuals alike.</p><p><br></p>', 4, '2025-11-10 04:04:51', '2025-11-10 04:04:51'),
(520, 27, NULL, 'What are the modes of transport during the tour?', '<h3><br></h3><p>Transport will be provided via private vehicles for comfort and convenience, ensuring a smooth travel experience throughout your tour.</p><p><br><br></p><p><br></p>', 5, '2025-11-10 04:04:51', '2025-11-10 04:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_days`
--

CREATE TABLE `itinerary_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `day_number` int(11) NOT NULL,
  `day_title` varchar(150) DEFAULT NULL,
  `day_description` longtext DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `feature_image_alt` varchar(200) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary_days`
--

INSERT INTO `itinerary_days` (`id`, `package_id`, `day_number`, `day_title`, `day_description`, `feature_image`, `feature_image_alt`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Arrival in Srinagar', '<h3><br><br></h3><p>Upon your arrival in Srinagar, you will be welcomed and transferred to your houseboat on Dal Lake. After settling in, enjoy a relaxing Shikara ride, taking in the breathtaking views of the surrounding mountains and vibrant floating gardens.</p><p><br></p>', 'itinerary/01K9M0JJ1S4FK88QMN1W6W5DXD.webp', 'i', 0, '2025-11-09 12:23:50', '2025-11-09 12:23:50'),
(2, 1, 2, 'Gulmarg Excursion', '<p>After breakfast, embark on a day trip to Gulmarg, known for its stunning landscapes. Enjoy the scenic gondola ride to the summit, where you can partake in thrilling activities such as skiing or snowboarding during winter, or simply enjoy the breathtaking views during the warmer months.</p><p><br></p>', 'itinerary/01K9M0JJ1W5YDSX68WMW7HTPGH.webp', 'img', 0, '2025-11-09 12:23:50', '2025-11-09 12:23:50'),
(3, 1, 3, ' Pahalgam Adventure', '<h3><br></h3><p>Travel to Pahalgam, the \"Valley of Shepherds.\" Take a leisurely walk along the Lidder River or opt for a trek to Baisaran, known as \"Mini Switzerland.\" Explore the charming village and relax amidst nature\'s beauty before returning to Srinagar for the night.</p><p><br></p>', 'itinerary/01K9M0JJ1Z6ZG17T30AKA1G0AR.webp', 'img', 0, '2025-11-09 12:23:50', '2025-11-09 12:23:50'),
(4, 1, 4, 'Departure', '<p>On your final day, enjoy a leisurely breakfast and visit the Mughal Gardens, such as Shalimar Bagh and Nishat Bagh, before heading to the airport for your departure, taking with you unforgettable memories of Kashmir.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 12:23:50', '2025-11-09 12:23:50'),
(5, 2, 1, 'Arrival in Srinagar | Srinagar Sightseeing Tour', '<h3><br><br></h3><p>Welcome to Srinagar! Upon arrival at the airport, get driven to your hotel. After check-in, relax for a while. Later, you\'ll be taken on a sightseeing tour starting with the Mughal Gardens, like the Shalimar Bagh, known for its stunning Persian-style terraces. Next, visit Nishat Bagh &amp; soak in the breathtaking views of Dal Lake &amp; explore Asia\'s largest Tulip Garden, home to an array of tulips in spring. Also, visit the historic terraced garden of Pari Mahal before getting driven to your hotel.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 16:44:53', '2025-11-09 16:44:53'),
(6, 2, 2, 'Excursion to Sonmarg', '<h3><br><br></h3><p>In the morning, get driven to the Thajiwas Pony Stand, where you can hire a pony (at your own cost) to reach Thajiwas Glacier. Once there, soak-in the amazing beauty of the ice-capped glacier and the surrounding alpine landscape. Also, you can visit Krishnasar Lake, famous for its crystal-clear waters that beautifully reflect the towering peaks, and visit the stunning Baltal Valley. After an amazing day, return to the pony stand, &amp; from there, get driven back to your hotel for an overnight stay.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 16:44:53', '2025-11-09 16:44:53'),
(7, 2, 3, 'Day Trip to Gulmarg', '<p>In the morning, get driven to the Gulmarg Union Cab Stand. Upon arrival, you can either walk or take a cab to the Gondola cable car station. As you ascend in the gondola (tickets not included), enjoy a smooth ride over lush meadows while soaking in the panoramic views of the surrounding mountains and valleys. Also, you can visit the Drung Waterfall and Strawberry Valley before returning to the Gulmarg Union Cab Stand. From there, get transferred to your hotel for an overnight stay.</p><p><br><br></p>', NULL, NULL, 0, '2025-11-09 16:44:53', '2025-11-09 16:44:53'),
(8, 3, 1, 'Arrival in Dalhousie', '<h3><br><br></h3><p>Arrive in Dalhousie and check into your hotel. Spend the evening exploring Mall Road, Subhash Chowk, and enjoy leisure time in the peaceful surroundings. Overnight stay at the hotel.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 16:55:33', '2025-11-09 16:55:33'),
(9, 3, 2, 'Local Sightseeing in Dalhousie', '<h3><br><br></h3><p>After breakfast, proceed for a local sightseeing tour. Visit Panchpula, Satdhara Falls, and St. John’s Church. Later, enjoy panoramic views of snow-clad mountains and pine valleys. Return to the hotel for dinner and overnight stay.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 16:55:33', '2025-11-09 16:55:33'),
(10, 3, 3, 'Excursion to Khajjiar', '<h3><br></h3><p>After breakfast, take a full-day excursion to Khajjiar, also called the “Mini Switzerland of India.” Enjoy activities like zorbing, horse riding, and photography in the meadows. Visit Khajji Nag Temple and return to Dalhousie by evening. Overnight stay at the hotel.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 16:55:33', '2025-11-09 16:55:33'),
(11, 3, 4, 'Departure from Dalhousie', '<h3><br><br></h3><p>After breakfast, check out from the hotel. If time permits, visit Dainkund Peak for panoramic views of the Himalayas. Later, depart with sweet memories of Dalhousie.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 16:55:33', '2025-11-09 16:55:33'),
(12, 4, 1, ' What makes Mandi a unique destination in Himachal Pradesh?', '<h3><br><br></h3><p>Mandi is often called the “Varanasi of the Hills” due to its numerous historic temples and spiritual significance. Unlike other hill stations that are primarily commercial, Mandi combines spirituality, culture, and natural beauty seamlessly.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:05:18', '2025-11-09 17:05:18'),
(13, 4, 2, 'When is the best time to visit Mandi for sightseeing and outdoor activities?', '<h3><br></h3><p>The ideal time to visit Mandi is between March and June, or September to November. During these months, the weather is pleasant, skies are clear, and outdoor sightseeing becomes comfortable.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:05:18', '2025-11-09 17:05:18'),
(14, 4, 3, 'Are there adventure activities available in and around Mandi?', '<h3><br></h3><p>Yes, Mandi offers multiple adventure opportunities for thrill-seekers. The surrounding mountains provide trekking and hiking trails suitable for beginners and experienced trekkers.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:05:18', '2025-11-09 17:05:18'),
(15, 4, 4, 'What are the must-visit attractions in Mandi?', '<h3><br></h3><p>Key attractions in Mandi include the Rewalsar Lake, Pandoh Dam, Bhima Kali Temple, Triloknath Temple, and Shikari Devi Temple. The town itself has a charming bazaar offering local handicrafts, traditional Himachali cuisine, and souvenirs.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:05:18', '2025-11-09 17:05:18'),
(16, 4, 5, 'Is Mandi suitable for family vacations and elderly travelers?', '<h3><br></h3><p>Absolutely. Mandi is well-suited for families and elderly travelers due to its moderate climate, easy accessibility, and well-maintained roads within the town.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:05:18', '2025-11-09 17:05:18'),
(17, 5, 1, 'Arrival in Manali', '<h3><br></h3><p>On arrival at Delhi from there you will meet and assist by our representative and now you will ready to “Hit the Queen of Hills “drive to Delhi Hotel. On arrival at Manali check in to hotel. Dinner &amp; Overnight Stay at Hotel.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:15:38', '2025-11-09 17:15:38'),
(18, 5, 2, ' Manali via Chandartal Rohtang Pass - Kaza', '<h3><br></h3><p>After Breakfast check out the hotel and drive to Kaza (182km 05 hours journey) Chandra Tal- The lake of the moon via Lohsar village and Kunzum Pass. The drive on this day will be one the highlights of the trip. Have a cup of tea at the last village of Spiti valley- Lohsar. After this you will just get closer to the high mountains and all you will see is snow capped peaks from Kunzum Pass and beyond.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:15:38', '2025-11-09 17:15:38'),
(19, 5, 3, 'Kaza –Kibber – Langza– Kaza', '<p>After breakfast drive to visit sightseeing of the day will be the famous Ki Monastery. Located at 4120m, 14km from Kaza on the Kaza to Kibber Road, the car will stop at the base of the monastery hill for the ultimate photo opportunity of this remarkable structure. Visitors will be able to trek around the monastery and admire the excellent collections of ancient paintings and scriptures contained in the large monastic complex. Occupying nearly all sides of the hill, Ki Monastry belongs Gelugpa Sect of Tibetan Buddhism.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-09 17:15:38', '2025-11-09 17:15:38'),
(20, 5, 4, 'Kaza to Chandartal Rohtang Pass – Manali', '<p>After early morning breakfast, we drive to Chandra Tal- The lake of the moon via Lohsar village and Kunzum Pass. The drive on this day will be one o the highlights of the trip. Have a cup of tea at the last village of Spiti valley- Lohsar. After this you will just get closer to the high mountains and all you will see is snow capped peaks from Kunzum Pass and beyond. The hike to Chandra Tal lake is 20 mins from the barricade. The lake is a mesmerizing sight that will leave you speechless for sure. We don’t have words to describe it. Spend the night at camp close to the lake. In After drive to Manali on the way you will visit Rohtang Pass, Rohtang Pass connects.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-09 17:15:38', '2025-11-09 17:15:38'),
(21, 5, 5, ' Departure to Destination', '<h3><br></h3><p>After Breakfast check out from hotel, departure to Delhi (580 km 14 hours journey) our representative will drop you at Chandigarh Railway Station/ Airport onwards to catch onwards your flight/train &amp; return to home with sweet memories of Spiti valley adventurous tour.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:15:38', '2025-11-09 17:15:38'),
(22, 6, 1, 'Arrival in Manali', '<p>On arrival at Delhi from there you will meet and assist by our representative and now you will ready to “Hit the Queen of Hills “drive to Delhi Hotel. On arrival at Manali check in to hotel. Dinner &amp; Overnight Stay at Hotel.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-09 17:24:52', '2025-11-09 17:24:52'),
(23, 6, 2, 'Manali via Chandartal Rohtang Pass - Kaza', '<p>After Breakfast check out the hotel and drive to Kaza (182km 05 hours journey) Chandra Tal- The lake of the moon via Lohsar village and Kunzum Pass. The drive on this day will be one the highlights of the trip. Have a cup of tea at the last village of Spiti valley- Lohsar. After this you will just get closer to the high mountains and all you will see is snow capped peaks from Kunzum Pass and beyond.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-09 17:24:52', '2025-11-09 17:24:52'),
(24, 6, 3, 'Kaza –Kibber – Langza– Kaza', '<p>After breakfast drive to visit sightseeing of the day will be the famous Ki Monastery. Located at 4120m, 14km from Kaza on the Kaza to Kibber Road, the car will stop at the base of the monastery hill for the ultimate photo opportunity of this remarkable structure. Visitors will be able to trek around the monastery and admire the excellent collections of ancient paintings and scriptures contained in the large monastic complex. Occupying nearly all sides of the hill, Ki Monastry belongs Gelugpa Sect of Tibetan Buddhism.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-09 17:24:52', '2025-11-09 17:24:52'),
(25, 6, 4, 'Kaza to Chandartal Rohtang Pass – Manali', '<p>After early morning breakfast, we drive to Chandra Tal- The lake of the moon via Lohsar village and Kunzum Pass. The drive on this day will be one o the highlights of the trip. Have a cup of tea at the last village of Spiti valley- Lohsar. After this you will just get closer to the high mountains and all you will see is snow capped peaks from Kunzum Pass and beyond. The hike to Chandra Tal lake is 20 mins from the barricade. The lake is a mesmerizing sight that will leave you speechless for sure. We don’t have words to describe it. Spend the night at camp close to the lake. In After drive to Manali on the way you will visit Rohtang Pass, Rohtang Pass connects.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-09 17:24:52', '2025-11-09 17:24:52'),
(26, 6, 5, 'Departure to Destination', '<p>After Breakfast check out from hotel, departure to Delhi (580 km 14 hours journey) our representative will drop you at Chandigarh Railway Station/ Airport onwards to catch onwards your flight/train &amp; return to home with sweet memories of Spiti valley adventurous tour.</p><p><br><br></p>', NULL, NULL, 0, '2025-11-09 17:24:52', '2025-11-09 17:24:52'),
(27, 7, 1, ' Arrival in Spiti Valley', '<h3><br></h3><p>Arrive at Dehradun railway station or Jolly Grant Airport. Our representative will receive you and drive you to the scenic hill station of Spiti Valley (approx. 2 hrs). Check into your hotel and relax. In the evening, take a stroll on the famous Mall Road and enjoy local snacks. Overnight stay in Spiti Valley.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:36:32', '2025-11-09 17:36:32'),
(28, 7, 2, ' Spiti Valley Sightseeing', '<h3><br></h3><p>After breakfast, head out for a full day of sightseeing. Visit Kempty Falls, Gun Hill (via ropeway), Camel’s Back Road, and Company Garden. You can also enjoy optional activities like horse riding or boating. Return to the hotel in the evening. Overnight stay in Spiti Valley.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:36:32', '2025-11-09 17:36:32'),
(29, 7, 3, ' Departure', '<h3><br></h3><p>After a relaxed breakfast, check out from your hotel and proceed towards Dehradun for your return journey. Trip ends with beautiful memories of Spiti Valley.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 17:36:32', '2025-11-09 17:36:32'),
(30, 8, 1, ' Arrival in Shimla', '<h3><br></h3><p>Explore The Mall Road and enjoy a local dinner.</p>', NULL, NULL, 0, '2025-11-09 18:32:36', '2025-11-09 18:32:36'),
(31, 8, 2, 'Visit Kufri', '<p>Visit Kufri for adventure activities; later, visit Jakhoo Temple.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-09 18:32:36', '2025-11-09 18:32:36'),
(32, 8, 3, 'Discover Christ Church', '<p>Discover Christ Church and Shimla Ridge; enjoy shopping at local bazaars.</p>', NULL, NULL, 0, '2025-11-09 18:32:36', '2025-11-09 18:32:36'),
(33, 8, 4, ' Departure', '<h3><br></h3><p>Excursion to Chail and its Palace; relax in the tranquil surroundings.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 18:32:36', '2025-11-09 18:32:36'),
(34, 9, 1, 'Arrival in Manali', '<p>Relax and explore Old Manali\'s cafes.</p>', NULL, NULL, 0, '2025-11-09 18:53:04', '2025-11-09 18:53:04'),
(35, 9, 2, 'Visit Solang Valley', '<p>Visit Solang Valley for adventure activities; return for a leisure evening.</p>', NULL, NULL, 0, '2025-11-09 18:53:04', '2025-11-09 18:53:04'),
(36, 9, 3, 'Day trip to Rohtang Pass', '<p>Day trip to Rohtang Pass for snow activities and stunning views.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-09 18:53:04', '2025-11-09 18:53:04'),
(37, 9, 4, 'Departure', '<p>Visit Hadimba Temple and Vashisht Village; enjoy the hot springs.</p><p><br><br></p>', NULL, NULL, 0, '2025-11-09 18:53:04', '2025-11-09 18:53:04'),
(38, 10, 1, 'Port Blair', '<p>Arrive in Port Blair, visit the Cellular Jail, and enjoy the light and sound show in the evening.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-09 19:25:19', '2025-11-09 19:25:19'),
(39, 10, 2, ' Havelock Island', '<h3><br></h3><p>Take a ferry to Havelock Island, relax at Radhanagar Beach, and indulge in water sports.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 19:25:19', '2025-11-09 19:25:19'),
(40, 10, 3, 'Neil Island', '<p>Visit Bharatpur Beach, Neil Island, for snorkelling and other water activities, then return to Havelock town.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-09 19:25:19', '2025-11-09 19:25:19'),
(41, 10, 4, ' Departure', '<h3><br></h3><p>Spend your last day shopping at local markets in Port Blair before departure.</p><p><br></p>', NULL, NULL, 0, '2025-11-09 19:25:19', '2025-11-09 19:25:19'),
(42, 11, 1, ' Rumtek Dharma Chakra Centre', '<p>Your journey begins with a warm welcome in Gangtok, the capital of Sikkim. Visit the iconic Rumtek Monastery and the Namgyal Institute of Tibetology to dive into the region’s rich spiritual and cultural heritage. In the evening, enjoy a peaceful walk along MG Marg, lined with cafes and shops. Stay overnight in Gangtok.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 02:50:28', '2025-11-10 02:50:28'),
(43, 11, 2, 'Gangtok', '<p>After breakfast, head towards the breathtaking Tsomgo Lake, nestled at an altitude of 12,400 feet. En route, enjoy stunning views of snow-capped mountains and winding roads. Visit the Baba Mandir, a revered shrine nearby. Return to Gangtok by evening and relax with local cuisine. Overnight stay in Gangtok.</p><p><br><br></p><p><br></p>', NULL, NULL, 0, '2025-11-10 02:50:28', '2025-11-10 02:50:28'),
(44, 11, 3, 'Nathula', '<p>Today, journey to Lachung, a picturesque mountain village in North Sikkim. Drive through scenic valleys, cascading waterfalls, and blooming rhododendron forests. Stop at the Singhik View Point for a panoramic view of the mighty Kanchenjunga. Arrive in Lachung by evening and enjoy a peaceful overnight stay amidst nature.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 02:50:29', '2025-11-10 02:50:29'),
(45, 11, 4, 'Tsomgo Chho', '<p>After breakfast, return to Itanagar. Depending on your departure schedule, you may wish to visit the serene Ganga Lake (Gyakar Sinyi) and the Buddhist Gompa. In the afternoon, you will be transferred to the airport or railway station for your onward journey, carrying with you unforgettable memories of Arunachal Pradesh..</p><p><br><br></p>', NULL, NULL, 0, '2025-11-10 02:50:29', '2025-11-10 02:50:29'),
(46, 13, 1, 'Arrival in Manali', '<p>On arrival at Delhi from there you will meet and assist by our representative and now you will ready to “Hit the Queen of Hills “drive to Delhi Hotel. On arrival at Manali check in to hotel. Dinner &amp; Overnight Stay at Hotel.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:03:37', '2025-11-10 03:03:37'),
(47, 13, 2, 'Manali via Chandartal Rohtang Pass - Kaza', '<p>After Breakfast check out the hotel and drive to Kaza (182km 05 hours journey) Chandra Tal- The lake of the moon via Lohsar village and Kunzum Pass. The drive on this day will be one the highlights of the trip. Have a cup of tea at the last village of Bomdila. After this you will just get closer to the high mountains and all you will see is snow capped peaks from Kunzum Pass and beyond.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:03:37', '2025-11-10 03:03:37'),
(48, 13, 3, 'Kaza –Kibber – Langza– Kaza', '<p>After breakfast drive to visit sightseeing of the day will be the famous Ki Monastery. Located at 4120m, 14km from Kaza on the Kaza to Kibber Road, the car will stop at the base of the monastery hill for the ultimate photo opportunity of this remarkable structure. Visitors will be able to trek around the monastery and admire the excellent collections of ancient paintings and scriptures contained in the large monastic complex. Occupying nearly all sides of the hill, Ki Monastry belongs Gelugpa Sect of Tibetan Buddhism.</p><p><br><br></p>', NULL, NULL, 0, '2025-11-10 03:03:37', '2025-11-10 03:03:37'),
(49, 13, 4, 'Kaza to Chandartal Rohtang Pass – Manali', '<p>After early morning breakfast, we drive to Chandra Tal- The lake of the moon via Lohsar village and Kunzum Pass. The drive on this day will be one o the highlights of the trip. Have a cup of tea at the last village of Bomdila. After this you will just get closer to the high mountains and all you will see is snow capped peaks from Kunzum Pass and beyond. The hike to Chandra Tal lake is 20 mins from the barricade. The lake is a mesmerizing sight that will leave you speechless for sure. We don’t have words to describe it. Spend the night at camp close to the lake. In After drive to Manali on the way you will visit Rohtang Pass, Rohtang Pass connects.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:03:37', '2025-11-10 03:03:37'),
(50, 13, 5, 'Departure to Destination', '<p>After Breakfast check out from hotel, departure to Delhi (580 km 14 hours journey) our representative will drop you at Chandigarh Railway Station/ Airport onwards to catch onwards your flight/train &amp; return to home with sweet memories of Bomdila adventurous tour.</p><p><br><br></p>', NULL, NULL, 0, '2025-11-10 03:03:37', '2025-11-10 03:03:37'),
(51, 14, 1, 'Arrival in Manali', '<p>On arrival at Delhi from there you will meet and assist by our representative and now you will ready to “Hit the Queen of Hills “drive to Delhi Hotel. On arrival at Manali check in to hotel. Dinner &amp; Overnight Stay at Hotel.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:10:58', '2025-11-10 03:10:58'),
(52, 14, 2, 'Manali via Chandartal Rohtang Pass - Kaza', '<p>After Breakfast check out the hotel and drive to Kaza (182km 05 hours journey) Chandra Tal- The lake of the moon via Lohsar village and Kunzum Pass. The drive on this day will be one the highlights of the trip. Have a cup of tea at the last village of Sela Pass. After this you will just get closer to the high mountains and all you will see is snow capped peaks from Kunzum Pass and beyond.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:10:58', '2025-11-10 03:10:58'),
(53, 14, 3, 'Kaza –Kibber – Langza– Kaza', '<p>After breakfast drive to visit sightseeing of the day will be the famous Ki Monastery. Located at 4120m, 14km from Kaza on the Kaza to Kibber Road, the car will stop at the base of the monastery hill for the ultimate photo opportunity of this remarkable structure. Visitors will be able to trek around the monastery and admire the excellent collections of ancient paintings and scriptures contained in the large monastic complex. Occupying nearly all sides of the hill, Ki Monastry belongs Gelugpa Sect of Tibetan Buddhism.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:10:58', '2025-11-10 03:10:58'),
(54, 14, 4, 'Kaza to Chandartal Rohtang Pass – Manali', '<p>After early morning breakfast, we drive to Chandra Tal- The lake of the moon via Lohsar village and Kunzum Pass. The drive on this day will be one o the highlights of the trip. Have a cup of tea at the last village of Sela Pass. After this you will just get closer to the high mountains and all you will see is snow capped peaks from Kunzum Pass and beyond. The hike to Chandra Tal lake is 20 mins from the barricade. The lake is a mesmerizing sight that will leave you speechless for sure. We don’t have words to describe it. Spend the night at camp close to the lake. In After drive to Manali on the way you will visit Rohtang Pass, Rohtang Pass connects.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:10:58', '2025-11-10 03:10:58'),
(55, 14, 5, 'Departure to Destination', '<p>After Breakfast check out from hotel, departure to Delhi (580 km 14 hours journey) our representative will drop you at Chandigarh Railway Station/ Airport onwards to catch onwards your flight/train &amp; return to home with sweet memories of Sela Pass adventurous tour.</p><p><br><br></p>', NULL, NULL, 0, '2025-11-10 03:10:58', '2025-11-10 03:10:58'),
(56, 15, 1, 'Arrival in Itanagar', '<p>Your journey begins with a warm welcome in Itanagar, the capital of Arunachal Pradesh. Take a tour of the Itanagar Fort and the Jawaharlal Nehru State Museum to learn more about the local culture and history. In the evening, stroll through the local markets for a peaceful tour. Stay overnight in Itanagar.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:19:01', '2025-11-10 03:19:01'),
(57, 15, 2, 'Itanagar to Ziro', '<p>After breakfast, drive to the picturesque town of Ziro, which is well known for its scenic beauty and Apatani tribal culture. Visit the Ziro Valley, known for its rice fields and pine forests. Explore Talley Valley Wildlife Sanctuary and Meghna Cave Temple. Spend the night in Ziro.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:19:01', '2025-11-10 03:19:01'),
(58, 15, 3, 'Ziro Exploration', '<p>Take a day to explore Ziro. Experience the unique customs and traditions of the Apatani tribe by visiting the Apatani villages. Enjoy a relaxing tour through the lush paddy fields while interacting with the friendly locals. Enjoy a beautiful sunset over the valley in the evening. Spend the night in Ziro.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:19:01', '2025-11-10 03:19:01'),
(59, 15, 4, 'Ziro to Itanagar and Departure', '<p>After breakfast, return to Itanagar. Depending on your departure schedule, you may wish to visit the serene Ganga Lake (Gyakar Sinyi) and the Buddhist Gompa. In the afternoon, you will be transferred to the airport or railway station for your onward journey, carrying with you unforgettable memories of Arunachal Pradesh..</p><p><br><br></p>', NULL, NULL, 0, '2025-11-10 03:19:01', '2025-11-10 03:19:01'),
(60, 16, 1, 'Arrival in Agartala', '<p>Arrive in the capital city of Tripura, Agartala. Arrive at your hotel and start your exploration with a visit to the Ujjayanta Palace, a majestic palace that serves as a museum. In the evening, explore the vibrant local markets to experience Tripura\'s culture.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:28:56', '2025-11-10 03:28:56'),
(61, 16, 2, 'Unakoti and Pilak', '<p>Visit Unakoti, an ancient Shaivite pilgrimage site renowned for its rock-cut sculptures and carvings. Visit Pilak after exploring Unakoti to see its impressive archaeological remains and sculptures that reflect the fusion of Hindu and Buddhist influences. By the evening, return to Agartala</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:28:56', '2025-11-10 03:28:56'),
(62, 16, 3, 'Neermahal and Sepahijala Wildlife Sanctuary', '<p>Explore Neermahal, a spectacular palace situated on the shores of Lake Rudrasagar. Enjoy a boat ride on the lake and explore its beautiful architecture. In the afternoon, visit Sepahijala Wildlife Sanctuary to view a diverse array of flora and fauna, including the spectacled monkey and a variety of bird species. Then return to Agartala for the night.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:28:56', '2025-11-10 03:28:56'),
(63, 16, 4, 'Departure', '<p>Visit the Tripura Sundari Temple, one of the 51 Shakti Peethas in India, on your last morning. You may then explore the remaining sights or enjoy a leisurely breakfast before departing Tripura, taking back wonderful memories with you.</p><p><br><br></p>', NULL, NULL, 0, '2025-11-10 03:28:56', '2025-11-10 03:28:56'),
(64, 17, 1, 'Arrival in Agartala', '<p>Arrive in the capital city of Tripura, Agartala. Arrive at your hotel and start your exploration with a visit to the Ujjayanta Palace, a majestic palace that serves as a museum. In the evening, explore the vibrant local markets to experience Tripura\'s culture.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:37:34', '2025-11-10 03:37:34'),
(65, 17, 2, 'Unakoti and Pilak', '<p>Visit Unakoti, an ancient Shaivite pilgrimage site renowned for its rock-cut sculptures and carvings. Visit Pilak after exploring Unakoti to see its impressive archaeological remains and sculptures that reflect the fusion of Hindu and Buddhist influences. By the evening, return to Agartala</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:37:34', '2025-11-10 03:37:34'),
(66, 17, 3, 'Neermahal and Sepahijala Wildlife Sanctuary', '<p>Explore Neermahal, a spectacular palace situated on the shores of Lake Rudrasagar. Enjoy a boat ride on the lake and explore its beautiful architecture. In the afternoon, visit Sepahijala Wildlife Sanctuary to view a diverse array of flora and fauna, including the spectacled monkey and a variety of bird species. Then return to Agartala for the night.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:37:34', '2025-11-10 03:37:34'),
(67, 17, 4, 'Departure', '<p>Visit the Tripura Sundari Temple, one of the 51 Shakti Peethas in India, on your last morning. You may then explore the remaining sights or enjoy a leisurely breakfast before departing Tripura, taking back wonderful memories with you.</p><p><br><br></p>', NULL, NULL, 0, '2025-11-10 03:37:34', '2025-11-10 03:37:34'),
(68, 18, 1, 'Arrival in Aizawl', '<p>Your journey begins in Aizawl, the capital city of Mizoram. Visit the Durtlang Hills for a panoramic view of the city after checking into your hotel. Explore Bara Bazar, the bustling local market, and take in the vibrant atmosphere. Enjoy a relaxing evening at your leisure.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:46:11', '2025-11-10 03:46:11'),
(69, 18, 2, 'Reiek Village', '<p>Visit Reiek Village, located approximately 29 km from Aizawl. Take a hike to the Reiek Peak for a breathtaking view of the surrounding hills and valleys. Explore a traditional Mizo village and gain an understanding of the customs and lifestyle of the local people. By the evening, return to Aizawl.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:46:11', '2025-11-10 03:46:11'),
(70, 18, 3, 'Tamdil Lake and Falkawn Village', '<p>Visit Tamdil Lake, located 85 kilometers outside of Aizawl. Enjoy boating on the serene lake and a picnic by its shores. Visit Falkawn Village in the afternoon to experience Mizoram\'s rich cultural heritage. Discover traditional Mizo houses and interact with local residents. For the night, return to Aizawl.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:46:11', '2025-11-10 03:46:11'),
(71, 18, 4, 'Departure', '<p>Spend your last morning in Aizawl visiting Solomon\'s Temple, a beautiful modern church. Enjoy a leisurely breakfast before exploring any remaining sights or shopping. Remember the beauty and warmth of Mizoram throughout your life.</p><p><br><br></p>', NULL, NULL, 0, '2025-11-10 03:46:12', '2025-11-10 03:46:12'),
(72, 19, 1, 'Arrival in Aizawl', '<p>Your journey begins in Aizawl, the capital city of Mizoram. Visit the Durtlang Hills for a panoramic view of the city after checking into your hotel. Explore Bara Bazar, the bustling local market, and take in the vibrant atmosphere. Enjoy a relaxing evening at your leisure.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:54:04', '2025-11-10 03:54:04'),
(73, 19, 2, 'Reiek Village', '<p>Visit Reiek Village, located approximately 29 km from Aizawl. Take a hike to the Reiek Peak for a breathtaking view of the surrounding hills and valleys. Explore a traditional Mizo village and gain an understanding of the customs and lifestyle of the local people. By the evening, return to Aizawl.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:54:04', '2025-11-10 03:54:04'),
(74, 19, 3, 'Tamdil Lake and Falkawn Village', '<p>Visit Tamdil Lake, located 85 kilometers outside of Aizawl. Enjoy boating on the serene lake and a picnic by its shores. Visit Falkawn Village in the afternoon to experience Mizoram\'s rich cultural heritage. Discover traditional Mizo houses and interact with local residents. For the night, return to Aizawl.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 03:54:04', '2025-11-10 03:54:04'),
(75, 19, 4, ' Departure', '<h3><br></h3><p>Spend your last morning in Aizawl visiting Solomon\'s Temple, a beautiful modern church. Enjoy a leisurely breakfast before exploring any remaining sights or shopping. Remember the beauty and warmth of Mizoram throughout your life.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 03:54:04', '2025-11-10 03:54:04'),
(76, 20, 1, 'Arrival in Kohima', '<p>As you arrive in Nagaland\'s capital city, Kohima, your first stop will be a tour of the city. Visit the local markets after checking into your hotel. Explore the vibrant culture of the city in the evening after visiting the Kohima War Cemetery, a poignant reminder of World War II.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 04:01:05', '2025-11-10 04:01:05'),
(77, 20, 2, 'Khonoma Village', '<p>Spend a day visiting Khonoma Village, Asia\'s first green village. Experience the sustainable practices and rich history of the Angami tribe. Experience a guided village tour, visit traditional homes, and learn about local customs and crafts.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 04:01:05', '2025-11-10 04:01:05'),
(78, 20, 3, 'Kisama Heritage Village', '<p>Enjoy a day at Kisama Heritage Village, the heart of the Hornbill Festival. Visit traditional huts, dance performances, and cultural exhibits to learn more about the Naga heritage. Discover the local cuisine and interact with the artisans displaying their wares.</p><h3><br><br></h3>', NULL, NULL, 0, '2025-11-10 04:01:05', '2025-11-10 04:01:05'),
(79, 20, 4, ' Departure', '<h3><br></h3><p>After breakfast, take the morning to explore any remaining sights or revisit your favorite spots in Kohima. It is time for you to depart, carrying with you the beautiful memories and unique experiences of Nagaland.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 04:01:05', '2025-11-10 04:01:05'),
(80, 21, 1, ' Arrival in Leh & Local Sightseeing', '<h3><br></h3><p>Arrive at Leh airport, transfer to hotel and relax to acclimatize. In the evening, visit Shanti Stupa, Leh Palace and explore the local Leh Market. Overnight stay at Leh.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 04:08:34', '2025-11-10 04:08:34'),
(81, 21, 2, 'Leh – Nubra Valley (via Khardung La)', '<h3><br></h3><p>Drive through the world’s highest motorable road Khardung La Pass to reach Nubra Valley. Visit Diskit Monastery and enjoy a camel ride at Hunder Sand Dunes. Overnight stay in Nubra Valley.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 04:08:34', '2025-11-10 04:08:34'),
(82, 21, 3, ' Nubra Valley – Pangong Lake – Leh', '<h3><br></h3><p>Early morning, head towards Pangong Lake, one of the most stunning high-altitude lakes. Spend some time enjoying the breathtaking view before returning to Leh via Chang La Pass. Evening free for shopping and leisure. Overnight stay in Leh.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 04:08:34', '2025-11-10 04:08:34'),
(83, 21, 4, 'Monasteries Tour & Departure', '<h3><br></h3><p>After breakfast, visit Thiksey Monastery, Hemis Monastery and Shey Palace. Later, transfer to Leh Airport for departure.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 04:08:34', '2025-11-10 04:08:34'),
(84, 22, 1, 'Arrival in Leh & Local Sightseeing', '<h3><br><br></h3><p>Arrive in Leh and take some time to acclimatize to the high altitude. Later, visit Leh Palace, admire panoramic views from Shanti Stupa, and stroll through the vibrant Leh Market for handicrafts and local flavors. Overnight stay in Leh.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 07:15:28', '2025-11-10 07:15:28'),
(85, 22, 2, 'Nubra Valley via Khardung La Pass', '<h3><br><br></h3><p>After breakfast, drive through the thrilling Khardung La Pass, one of the world’s highest motorable roads, to reach Nubra Valley. Visit the majestic Diskit Monastery and enjoy a camel safari at the famous Hunder Sand Dunes. Overnight stay in Nubra.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 07:15:28', '2025-11-10 07:15:28'),
(86, 22, 3, ' Pangong Lake Excursion & Departure', '<h3><br></h3><p>Early morning, head towards the breathtaking Pangong Lake, known for its ever-changing shades of blue. Spend some time capturing memories before returning to Leh for your onward journey.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 07:15:28', '2025-11-10 07:15:28'),
(100, 23, 1, 'Pick up from Airport', '<p>Pick up from Airport Visit Umiam lake on the way then Dropping at hotel in Shillong. Night Stay Hotel Park residency or woodland hill or Travellers in</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:32:30', '2025-11-10 00:32:30'),
(200, 23, 2, 'Shillong to Cherrapunji', '<p>Elephant Fall Mawdok bridge &amp; Valley, Seven sister falls, Garden of Caves, Mawsmai Caves, Nohkalikai Falls Stay Cherrapunji/Sohra Hotel Crescent or Similar</p>', NULL, NULL, 0, '2025-11-10 00:32:30', '2025-11-10 00:32:30'),
(300, 23, 3, 'Cherrapunji to Dawki and cleanest Village', '<p>Dawky valley, Cleanest Village of Asia, Root bridge Tree House Boating in Dawki Cleanest River, Bangladesh Border, Camping or resort stay in Shnongpdeng Stay Shnongpdeng (Dawki) Hotel betel nut or Camping on river side in Dawki/Shnongpdeng</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:32:30', '2025-11-10 00:32:30'),
(400, 23, 4, ' Beautifall Falls & Swimming', '<p>Shnongpdeng boating , Krang Suri Fall, Phe Phe fall Shillong Hotel Park Island residency or Similar</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:32:30', '2025-11-10 00:32:30'),
(500, 23, 5, 'Shillong local sight seen', '<p><br></p><p>LAITNUM Canyon Wards Lake Don Bosco Museum Police Bazar Shillong, Shillong Hotel Park Island residency or Similar</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:32:30', '2025-11-10 00:32:30'),
(501, 24, 1, 'Pick up from Airport', '<h3><br><br></h3><p>Pick up from Airport and Dropping at hotel in Shillong. Night Stay Hotel Park residency or woodland hill or Travellers in</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(502, 24, 2, 'Shillong Tour', '<h3><br><br></h3><p>LAITNUM Canyon Wards Lake Don Bosco Museum Police Bazar Shillong, Shillong Hotel Park Island residency OR Woodland Hill or Travellers in</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(503, 24, 3, ' Shillong to Cherrapunji', '<h3><br></h3><p>Elephant Fall, Mawdok bridge &amp;Valley, Wah kaba Falls, Seven sistter falls, Stay Cherrapunji/Sohra Hotel Crescent or Similar</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(504, 24, 4, 'Cherrapunji', '<h3><br><br></h3><p>Garden of Caves, Mawsmai Caves, Arwah Caves, Nohkalikai Falls Stay Cherrapunji/Sohra Hotel Crescent or Similar</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(505, 24, 5, 'Cherrapunji to Dawki and cleanest Village', '<h3><br></h3><p>Dawky valley, Cleanest Village of Asia, Root bridge Tree House Boating in Dawki Cleanest River, Bangladesh Border, Camping or resort stay in Shnongpdeng Stay Shnongpdeng (Dawki) Hotel betel nut or Camping on river side in Dawki/Shnongpdeng</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(506, 24, 6, 'Beautifall Falls & Swimming', '<h3><br><br></h3><p>Shnongpdeng boating , Krang Suri Fall, Phe Phe fall Shillong Hotel Park Island residency or Similar</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(507, 24, 7, ' Shillong local sight seen', '<h3><br></h3><p>Elephant Fall, Sacred forest , Shilong peak Shillong Hotel Park Island residency or Similar</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:51:23', '2025-11-10 00:51:23'),
(508, 24, 8, 'Catch your Flight or train from Guwahati', '<h3><br><br></h3><p>Dropping time to Guwahati Visti Kamakhya Temple Dropping Airport/Station</p><p><br></p>', NULL, NULL, 0, '2025-11-10 00:51:23', '2025-11-10 00:51:23'),
(509, 25, 1, ' Guwahati To Cherrapunjee', '<h3><br></h3><p>Upon reaching Guwahati, you’ll start a drive to Cherrapunjee. Overnight stay at a Hotel in Cherrapunjee.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(510, 25, 2, 'Explore In and Around Cherrapunjee', '<h3><br><br></h3><p>Post Breakfast at the hotel you’ll be exploring Cherrapunjee throughout the day. Post Breakfast at the hotel you’ll be exploring Cherrapunjee throughout the day</p><p><br></p>', NULL, NULL, 0, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(511, 25, 3, 'Post Breakfast at the hotel you’ll be exploring Cherrapunjee throughout the day', '<h3><br><br></h3><p>Post Breakfast you’ll head out for Mawlynong via Dawki. Overnight stay at Mawlynong.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(512, 25, 4, 'Mawlynong to Shillong via Krang Suri Falls', '<h3><br><br></h3><p>After a short village walk and breakfast, you’ll head towards Shillong. Overnight stay at Shillong.</p><h3><br><br></h3><p><br></p>', NULL, NULL, 0, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(513, 25, 5, 'Shillong Exploration Day', '<p><br></p><p><br></p><p>Overnight stay at Shillong.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(514, 25, 6, 'Shillong To Kaziranga', '<h3><br><br></h3><p>Upon reaching the resort you’ll be heading out for your first wilderness drive in Kaziranga National Park. Overnight stay at a resort in Kaziranga</p><p><br><br></p><p><br></p>', NULL, NULL, 0, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(515, 26, 1, 'Nohkalikai Waterfalls ', '<h3><br><br></h3><p>Nohkalikai Waterfalls is one of the tallest and most spectacular waterfalls in India, plunging from a height of about 340 meters. Located near Cherrapunji, it offers a breathtaking view as the water cascades down lush cliffs into a turquoise pool below. Surrounded by mist and greenery, it\'s a must-visit spot for nature lovers and photographers.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(516, 26, 2, 'Mawsmai Caves', '<h3><br><br></h3><p>Mawsmai Caves are a fascinating network of limestone caves located near Cherrapunji, known for their striking rock formations and narrow passages. These well-lit caves offer a thrilling yet accessible experience for visitors eager to explore Meghalaya’s underground wonders. A visit to Mawsmai Caves is often included in a tour package for Cherrapunji, making it a must-see attraction for adventure and nature enthusiasts.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(517, 26, 3, 'Double Decker Living Root Bridge (Nongriat)', '<h3><br><br></h3><p>Double Decker Living Root Bridge (Nongriat) is one of Meghalaya’s most iconic natural marvels, crafted by intertwining the roots of ancient rubber trees over many years. Nestled deep in the village of Nongriat, this two-tiered bridge showcases the incredible ingenuity of the Khasi people and their bond with nature. The trek to reach it is challenging yet deeply rewarding, taking you through dense forests, crystal-clear streams, and vibrant local villages—perfect for those seeking adventure and serenity in equal measure.</p><h3><br><br></h3><p><br></p>', NULL, NULL, 0, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(518, 26, 4, 'Seven Sisters Waterfalls (Nohsngithiang Falls)', '<h3><br><br></h3><p>Seven Sisters Waterfalls (Nohsngithiang Falls) is a breathtaking cascade located near Cherrapunji, famed for its seven distinct streams that plunge dramatically over the cliffs of the East Khasi Hills. Especially mesmerizing during the monsoon season, the falls flow down a height of about 315 meters, creating a spectacular sight against the backdrop of lush greenery and misty hills. It\'s a perfect spot for photography and soaking in Meghalaya’s natural splendor.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(519, 27, 1, 'Khasi Hills is a lively neighbourhood in Singapore, known for its blend of modern living, green spaces, and vibrant local culture.', '<h3><br><br></h3><p>Arrive in Khasi Hills and check into your hotel. Unwind or explore the nearby Khasi Hills Mall, then enjoy a relaxing evening at the serene Punggol Park.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 04:04:50', '2025-11-10 04:04:50'),
(520, 27, 2, 'Khasi Hills is a dynamic district in Singapore, offering a harmonious blend of residential living, lush parks, and local heritage, ', '<h3><br></h3><p>Arrive in Khasi Hills and settle into your hotel. Take a stroll through the vibrant Khasi Hills Mall, then enjoy a peaceful evening at the tranquil Khasi Hills Park.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 04:04:50', '2025-11-10 04:04:50'),
(521, 27, 3, 'Khasi Hills is a thriving neighbourhood in Singapore, offering a mix of contemporary living, scenic parks, and vibrant local culture.', '<h3><br></h3><p>Arrive in Khasi Hills and check into your hotel. Explore the nearby Khasi Hills Plaza for shopping, then unwind with a leisurely walk at the scenic Serangoon Park.</p><h3><br><br></h3><p><br></p>', NULL, NULL, 0, '2025-11-10 04:04:51', '2025-11-10 04:04:51'),
(522, 27, 4, 'Khasi Hills is a bustling area in Singapore, known for its modern residential complexes, lush greenery, and vibrant community life. ', '<h3><br><br></h3><p>Arrive in Khasi Hills and check into your hotel. Spend some time exploring the bustling Khasi Hills Mall, then enjoy a peaceful evening at the nearby Punggol Waterway Park.</p><p><br></p>', NULL, NULL, 0, '2025-11-10 04:04:51', '2025-11-10 04:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_places`
--

CREATE TABLE `itinerary_places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `itinerary_day_id` bigint(20) UNSIGNED NOT NULL,
  `place_name` varchar(150) NOT NULL,
  `place_description` text DEFAULT NULL,
  `destination_id` bigint(20) UNSIGNED DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `image_alt` varchar(200) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_04_095120_create_tour_types_table', 1),
(5, '2025_11_04_095137_create_destinations_table', 1),
(6, '2025_11_04_095151_create_packages_table', 1),
(7, '2025_11_04_095209_create_itinerary_days_table', 1),
(8, '2025_11_04_095223_create_itinerary_places_table', 1),
(9, '2025_11_04_095243_create_package_gallery_table', 1),
(10, '2025_11_04_095309_create_faqs_table', 1),
(11, '2025_11_04_095323_create_related_packages_table', 1),
(12, '2025_11_04_095347_create_package_sections_table', 1),
(13, '2025_11_04_095403_create_section_package_table', 1),
(14, '2025_11_04_095423_create_url_redirects_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `summary` text DEFAULT NULL,
  `full_description` longtext DEFAULT NULL,
  `tour_type_id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `duration_days` int(11) NOT NULL,
  `duration_nights` int(11) NOT NULL,
  `price_start` decimal(10,2) NOT NULL,
  `price_compare_at` decimal(10,2) DEFAULT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'INR',
  `highlights` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`highlights`)),
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_image_alt` varchar(200) DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `h1_title` varchar(150) DEFAULT NULL,
  `og_title` varchar(150) DEFAULT NULL,
  `og_description` varchar(160) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `migrated_from_legacy` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `slug`, `summary`, `full_description`, `tour_type_id`, `destination_id`, `duration_days`, `duration_nights`, `price_start`, `price_compare_at`, `currency`, `highlights`, `banner_image`, `banner_image_alt`, `meta_title`, `meta_description`, `canonical_url`, `h1_title`, `og_title`, `og_description`, `og_image`, `status`, `featured`, `migrated_from_legacy`, `created_at`, `updated_at`) VALUES
(1, '3 Nights 4 Days Kashmir Tour', '3-nights-4-days-kashmir-tour', 'Book your Kashmir tour package now and experience unforgettable moments in Paradise on Earth.', '<p>Embark on a breathtaking journey through the enchanting landscapes of Kashmir, often referred to as \"Paradise on Earth.\" This meticulously crafted tour package invites you to experience the region\'s stunning natural beauty, rich culture, and warm hospitality. From serene lakes to snow-capped mountains, every moment in Kashmir promises to be unforgettable.</p><p>Immerse yourself in the vibrant culture of Kashmir, where every corner tells a story. Visit charming villages to witness traditional crafts like Pashmina weaving and hand-painted pottery. Engage with local artisans who are passionate about preserving their heritage, and don\'t miss the opportunity to try your hand at some crafts yourself.</p><p><br><br></p>', 1, 13, 4, 3, 19999.00, 20000.00, 'INR', '[\"Dal Lake Shikara Ride\",\"Gulmarg Adventures\",\"Pahalgam Exploration\",\"Sonamarg Beauty\",\"Cultural Immersion\"]', 'banners/01K9M0JJ1253JK20Z5QFTW04TP.jpg', 'banner', '3 Nights 4 Days Kashmir Tour', 'Explore Kashmir beauty with PP The Travellers tour packages. Visit tribal cultures, scenic landscapes, and vibrant festivals. Get a Kashmir tour package.', 'https://www.ppthetraveller.com/tour-package/3-night-4-days-kashmir-tour', '3 Nights 4 Days Kashmir Tour', '3 Nights 4 Days Kashmir Tour', 'Explore Kashmir beauty with PP The Travellers tour packages. Visit tribal cultures, scenic landscapes, and vibrant festivals. Get a Kashmir tour package.', 'og-images/01K9M0JJ2D1GH1S8FXA1YCHFMG.jpg', 'published', 1, 1, '2025-11-09 17:53:50', '2025-11-10 00:26:03'),
(2, 'Romantic Valley Gateway', 'romantic-valley-gateway', 'Book your Andaman tour package now and experience unforgettable moments in Paradise on Earth.\n\n', '<p><strong>Romantic Valley Gateway</strong> is a serene escape nestled amid lush greenery and scenic landscapes — the perfect destination for couples seeking tranquility and connection. With its cozy accommodations, breathtaking views, and intimate ambiance, it offers an unforgettable retreat where nature and romance come together. Whether it’s a sunset walk, a candlelit dinner, or simply relaxing under the stars, Romantic Valley Gateway sets the stage for timeless memories.</p>', 1, 13, 3, 2, 14999.00, 14999.00, 'INR', '[\"srinagar\",\"gulmarg\",\"sonmarg\",\"pahalgam\"]', 'banners/01K9MFGJ2K9PFV1D552891TVA2.jpg', 'img', 'Romantic Valley Gateway', 'Explore Andaman beauty with PP The Travellers tour packages. Visit tribal cultures, scenic landscapes, and vibrant festivals. Get a Andaman tour package.', 'https://www.ppthetraveller.com/romantic-valley-gateway', 'Romantic Valley Gateway', 'Romantic Valley Gateway', 'Explore Andaman beauty with PP The Travellers tour packages. Visit tribal cultures, scenic landscapes, and vibrant festivals. Get a Andaman tour package.', NULL, 'published', 1, 1, '2025-11-09 22:14:53', '2025-11-10 00:24:50'),
(3, 'Dalhousie Tour Package – 4 Days', 'dalhousie-tour', 'Explore the Mini Switzerland of India – Dalhousie & Khajjiar\n\n', '<p>Discover the serene beauty of Dalhousie, a charming hill station in Himachal Pradesh, known for its colonial-era architecture, pine-clad hills, and breathtaking viewpoints. This tour package takes you through scenic valleys, lush forests, and pristine lakes, providing a perfect blend of relaxation, adventure, and cultural exploration. Stroll along the famous Gandhi Chowk and St. John’s Church, enjoy panoramic views from Dainkund Peak, and experience the tranquil charm of Khajjiar, often called the “Mini Switzerland of India.” Ideal for couples, families, and nature lovers, this Dalhousie tour promises a rejuvenating escape amidst the Himalayan splendor.</p><p><br><br></p>', 1, 14, 4, 3, 19999.00, NULL, 'INR', '[\"Visit Panchpula and Satdhara Falls\",\"Explore St. John\\u2019s Church\",\"Full-day excursion to Khajjiar (Mini Switzerland)\",\"Enjoy Mall Road & Subhash Chowk\",\"Panoramic views from Dainkund Peak\"]', 'banners/01K9MG433H6PB5T6TNWR55J9PX.webp', 'img', 'Dalhousie Tour Package – 4 Days', 'Book your Manali tour package for 4 days and explore Solang Valley, Rohtang Pass & more. Perfect trip for nature & adventure lovers.', 'https://www.ppthetraveller.com/dalhousie-tour', 'Dalhousie Tour Package – 4 Days', 'Dalhousie Tour Package – 4 Days', 'Book your Manali tour package for 4 days and explore Solang Valley, Rohtang Pass & more. Perfect trip for nature & adventure lovers.', NULL, 'published', 1, 1, '2025-11-09 22:25:33', '2025-11-10 00:25:20'),
(4, 'Mandi Tour Package – Explore the Heart of Himachal', 'mandi-tour-package-explore-the-heart-of-himachal', 'Scenic Hills & Temples of Mandi\n\n', '<p>Explore the enchanting hill town of Mandi, nestled in the heart of Himachal Pradesh, known for its beautiful temples, scenic valleys, and cultural heritage. This tour package offers a perfect blend of spirituality, nature, and adventure, taking you through the majestic Beas River, picturesque landscapes, ancient temples, and bustling local markets. Discover Mandi’s rich history, explore its vibrant festivals, and enjoy the serene ambiance of its surrounding mountains. Ideal for families, honeymooners, and adventure seekers, this Mandi tour promises an unforgettable experience of Himachal’s charm and tranquility.</p><p><br><br></p>', 1, 14, 4, 3, 19999.00, NULL, 'INR', '[\"Visit Bhutnath Temple\",\"Explore Rewalsar Lake\",\"Pandoh Dam sightseeing\",\"Local markets tour\",\"Cultural experience\"]', 'banners/01K9MGNYHJQMBZ9QWH6ZKCVE4T.webp', 'img', 'Mandi Tour Package – Explore the Heart of Himachal', 'Book your Manali tour package for 4 days and explore Solang Valley, Rohtang Pass & more. Perfect trip for nature & adventure lovers.', 'https://www.ppthetraveller.com/mandi-tour', 'Mandi Tour Package – Explore the Heart of Himachal', 'Mandi Tour Package – Explore the Heart of Himachal', 'Book your Manali tour package for 4 days and explore Solang Valley, Rohtang Pass & more. Perfect trip for nature & adventure lovers.', NULL, 'published', 1, 1, '2025-11-09 22:35:18', '2025-11-10 00:25:44'),
(5, 'Dharmshala', 'dharmshala', 'Explore the beauty of Himachal with our 4 Days Dharmshala Tour Package. PP The Traveller offers an unforgettable road trip with adventure, \n\n', '<p>Explore the enchanting beauty of Himachal with <strong>PP The Traveller’s</strong> 4-day Dharamshala tour! This unforgettable road trip blends adventure, sightseeing, and comfort for a truly memorable experience. Discover the serene monasteries, lush tea gardens, and breathtaking mountain views that make Dharamshala a traveler’s paradise. Whether you’re seeking peace, nature, or excitement, this tour promises the perfect Himachal getaway.</p>', 1, 14, 4, 3, 24999.00, NULL, 'INR', '[\"Arrival in Manali\",\"Manali via Chandartal Rohtang Pass - Kaza\",\"Kaza \\u2013Kibber \\u2013 Langza\\u2013 Kaza\",\"Kaza to Chandartal Rohtang Pass \\u2013 Manali\",\"Departure to destination\"]', 'banners/01K9MH8W4SFZFYNT5XV276XX59.webp', 'img', 'Dharmshala', 'Discover Spiti Valley beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Spiti Tour Package now.', 'https://www.ppthetraveller.com/dharmshala', 'Dharmshala', 'Dharmshala', 'Discover Spiti Valley beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Spiti Tour Package now.', NULL, 'published', 1, 1, '2025-11-09 22:45:38', '2025-11-10 00:24:35'),
(6, 'Hadimba Devi Temple', 'hadimba', 'Explore the beauty of Himachal with our 4 Days Hadimba Devi Temple Tour Package.', '<p>Explore the beauty of Himachal with our 4 Days Hadimba Devi Temple Tour Package. PP The Traveller offers an unforgettable road trip with adventure, sightseeing &amp; comfort included.<br><br></p>', 1, 14, 4, 3, 19999.00, NULL, 'INR', '[\"Arrival in Manali\",\"Manali via Chandartal Rohtang Pass - Kaza\",\"Kaza \\u2013Kibber \\u2013 Langza\\u2013 Kaza\",\"Kaza to Chandartal Rohtang Pass \\u2013 Manali\",\"Departure to destination\"]', 'banners/01K9MHSRG4XDAGPPQ09R9CYET3.webp', 'img', 'Hadimba Devi Temple', 'Discover Spiti Valley beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Spiti Tour Package now.', 'https://www.ppthetraveller.com/hadimba', 'Hadimba Devi Temple', 'Hadimba Devi Temple', 'Discover Spiti Valley beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Spiti Tour Package now.', NULL, 'published', 1, 0, '2025-11-09 22:54:51', '2025-11-10 00:24:18'),
(7, 'Tour Packages in Spiti Valley', '3-night-4-days-spliti-valley-tour', 'Tour Packages in Spiti Valley\n', '<ul><li>Tour Packages in Spiti Valley</li></ul><p><br><br></p><p><br></p>', 1, 14, 4, 3, 19999.00, NULL, 'INR', '[\"3 Days Spiti Valley Getaway\",\"Spiti Valley, Dhanaulti\",\"Breathtaking views of the Doon Valley\",\"Stay in a luxurious hotel or hill cottage\",\"Mall Road shopping, cable car rides, nature walks\",\"Sightseeing: Kempty Falls, Gun Hill, Company Garden\"]', 'banners/01K9MJF4WSRWPD0W5GGZ5R9462.jpg', 'img', 'Tour Packages in Spiti Valley', NULL, NULL, 'Tour Packages in Spiti Valley', 'Tour Packages in Spiti Valley', NULL, NULL, 'published', 1, 0, '2025-11-09 23:06:32', '2025-11-10 00:24:00'),
(8, '3 Nights 4 Days Shimla Tour Packages', '3-nights-4-days-shimla-tour-packages', 'Shimla Tour Package for 4 Days- Price and Itinerary\n\n', '<p>Experience the charm of Shimla, the summer capital of British India, nestled in the Himalayas. Known for its colonial architecture, vibrant markets, and breathtaking views, Shimla offers a perfect blend of natural beauty and cultural richness.</p><p><br>Whether you\'re wandering through pine forests or exploring historic landmarks, Shimla promises an unforgettable experience.</p><p><br><br></p>', 1, 14, 4, 3, 19999.00, NULL, 'INR', '[\"The Mall Road\",\"Jakhoo Temple\",\"Christ Church\",\"Shimla Ridge\",\"Kufri\"]', 'banners/01K9MNNSK8M8RYVV22MP76XH36.jpg', 'img', 'Shimla Tour Package for 4 Days – Explore the Hills', 'Book your Shimla tour package for 4 days and explore Kufri, Mall Road & more. Ideal for nature lovers seeking a serene getaway.', NULL, 'Shimla Tour Package for 4 Days – Explore the Hills', NULL, NULL, NULL, 'published', 0, 1, '2025-11-10 00:02:36', '2025-11-10 00:02:36'),
(9, '3 Nights 4 Days Manali Tour', '3-nights-4-days-manali-tour', 'Manali Tour Package for 4 Days- Price and Itinerary\n\n', '<p>Discover the stunning landscapes of Manali, a paradise for nature lovers and adventure enthusiasts alike. With its snow-capped mountains, lush valleys, and vibrant local culture, Manali offers an array of experiences, from tranquil temple visits to thrilling adventure sports.</p><p><br>This tour will immerse you in the beauty of the Himalayas.</p><p><br><br></p>', 1, 14, 4, 3, 19999.00, NULL, 'INR', '[\"Solang Valley\",\"Rohtang Pass\",\"Hadimba Temple\",\"Old Manali\",\"Vashisht Village\"]', 'banners/01K9MPV90CH6GZ71X7STS4KGQA.jpg', 'img', 'Manali Tour Package for 4 Days – Scenic Getaway', 'Book your Manali tour package for 4 days and explore Solang Valley, Rohtang Pass & more. Perfect trip for nature & adventure lovers.', NULL, 'Manali Tour Package for 4 Days – Scenic Getaway', 'Manali Tour Package for 4 Days – Scenic Getaway', 'Book your Manali tour package for 4 days and explore Solang Valley, Rohtang Pass & more. Perfect trip for nature & adventure lovers.', NULL, 'published', 0, 1, '2025-11-10 00:23:04', '2025-11-10 00:23:39'),
(10, 'Tour Packages in Bharatpur Beach, Neil Island', 'tour-packages-in-bharatpur-beach-neil-island', 'Bharatpur Beach, Neil Island Tour Package for 3 Days- Price and Itinerary\n\n', '<p>The Bharatpur Beach, Neil Island Islands, an exquisite archipelago in the Bay of Bengal, are a paradise for nature lovers and adventure seekers alike. With their crystal-clear waters, white sandy beaches, and lush tropical forests, these islands offer a tranquil escape from the hustle and bustle of city life. Visitors can explore vibrant coral reefs while snorkeling or diving, revealing an underwater world teeming with colorful marine life.</p><p><br>Moreover, the local culture is as diverse as the landscapes, with influences from various ethnic groups and communities. Travelers can indulge in delicious seafood and unique local dishes, often made with freshly caught fish and coconut.</p><p><br><br></p>', 1, 15, 4, 3, 23999.00, NULL, 'INR', '[\"Radhanagar Beach\",\"Cellular Jail\",\"Havelock Island\",\"Scuba Diving\",\"Local Culture\"]', 'banners/01K9MRPAZC8VZ2BX8452X043G7.webp', 'img', 'Tour Packages in Bharatpur Beach', 'Explore Neil with PP The Travellers tour packages. Enjoy stunning waterfalls, lush landscapes, and vibrant cultures. Book your Neil tour package now.', NULL, 'Tour Packages in Bharatpur Beach, Neil Island | Bharatpur Beach, Neil Island Tour Packages', 'Tour Packages in Bharatpur Beach, Neil Island | Bharatpur Beach, Neil Island Tour Packages', 'Explore Neil with PP The Travellers tour packages. Enjoy stunning waterfalls, lush landscapes, and vibrant cultures. Book your Neil tour package now.', NULL, 'published', 0, 0, '2025-11-10 00:55:19', '2025-11-10 04:36:59'),
(11, '4 Days Sikkim Tour packages', '4-days-sikkim-tour-packages', 'Plan a perfect Sikkim Tour Package for 3 Days, including extensive routes, costs, and choices. Enjoy an unforgettable experience with PP The Traveller.\n\n', '<p>Discover the breathtaking charm of Sikkim with PP The Traveller. Our curated Sikkim Tour Package blends nature, culture, and adventure for a truly unforgettable Himalayan escape.</p><p><br>Unveil the hidden gems of Sikkim with PP The Traveller. From misty mountains to peaceful monasteries, our exclusive tour package promises a soulful and scenic getaway.</p><p><br><br></p>', 1, 2, 4, 3, 15999.00, NULL, 'INR', '[\"Rumtek Dharma Chakra Centre\",\"Gangtok\",\"Nathula\",\"Tsomgo Chho\",\"Gurudongmar Lake\"]', 'banners/01K9NJ5E2FHG7T9PKGGQKKNQ7C.webp', 'img', '4 Days Sikkim Tour packages | Sikkim Tour packagess', 'Book 4 Days Sikkim Tour packagess @Best Price from ppthetraveller with memorable experiences and world-class services. Get Best Offers ', NULL, '4 Days Sikkim Tour packages | Sikkim Tour packagess', '4 Days Sikkim Tour packages | Sikkim Tour packagess', 'Book 4 Days Sikkim Tour packagess @Best Price from ppthetraveller with memorable experiences and world-class services. Get Best Offers ', NULL, 'draft', 0, 1, '2025-11-10 08:20:28', '2025-11-10 08:20:28'),
(12, '5 Days Sikkim Tour Package – Explore Gangtok, Tsomgo Lake & Baba Mandir', '5-days-sikkim-tour-package-explore-gangtok-tsomgo-lake-baba-mandir', 'Where the Himalayas Touch the Sky and Serenity Meets Adventure.\n\n', '<p>Experience the beauty of Sikkim and Darjeeling in 5 unforgettable days filled with mountains, monasteries, and misty tea gardens.</p><p><br>Discover the charm of the Himalayas with our 5-day Sikkim Darjeeling tour packed with stunning views and peaceful vibes.</p><p><br><br></p>', 1, 2, 5, 4, 24599.00, NULL, 'INR', '[\"Tsomgo Lake (Changu Lake)\",\"Baba Harbhajan Singh Mandir\",\"Gangtok Ropeway\",\"Do Drul Chorten Stupa\",\"MG Marg (Gangtok)\"]', 'banners/01K9NJGENB4N1SKQP89951AC3H.webp', 'img', '5 Days Sikkim Tour packages | Sikkim Tour packagess', 'Book 5 Days Sikkim Tour packagess @Best Price from ppthetraveller with memorable experiences and world-class services. Get Best Offers on Sikkim ', NULL, '5 Days Sikkim Tour packages | Sikkim Tour packagess', '5 Days Sikkim Tour packages | Sikkim Tour packagess', 'Book 5 Days Sikkim Tour packagess @Best Price from ppthetraveller with memorable experiences and world-class services. Get Best Offers on Sikkim ', NULL, 'draft', 0, 1, '2025-11-10 08:26:29', '2025-11-10 08:26:29'),
(13, 'Bomdila', 'bomdila', 'Explore the beauty of Himachal with our 4 Days Bomdila Tour Package.', '<p>Explore the beauty of Himachal with our 4 Days Bomdila Tour Package. PP The Traveller offers an unforgettable road trip with adventure, sightseeing &amp; comfort included.<br><br></p>', 1, 3, 4, 3, 15999.00, NULL, 'INR', '[\"Arrival in Manali\",\"Manali via Chandartal Rohtang Pass - Kaza\",\"Kaza \\u2013Kibber \\u2013 Langza\\u2013 Kaza\",\"Kaza to Chandartal Rohtang Pass \\u2013 Manali\",\"Departure to destination\"]', 'banners/01K9NJXGGBRG40NSVS5BJ1AQJR.webp', 'img', 'Bomdila', 'Discover Bomdila beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Spiti Tour Package now.', NULL, 'Bomdila', 'Bomdila', 'Discover Bomdila beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Spiti Tour Package now.', NULL, 'draft', 0, 0, '2025-11-10 08:33:37', '2025-11-10 08:33:37'),
(14, 'Sela Pass', 'sela-pass', 'Explore the beauty of Himachal with our 4 Days Sela Pass Tour Package.', '<p>Explore the beauty of Himachal with our 4 Days Sela Pass Tour Package. PP The Traveller offers an unforgettable road trip with adventure, sightseeing &amp; comfort included.<br><br></p>', 1, 3, 4, 3, 15999.00, NULL, 'INR', '[\"Arrival in Manali\",\"Manali via Chandartal Rohtang Pass - Kaza\",\"Kaza \\u2013Kibber \\u2013 Langza\\u2013 Kaza\",\"Kaza to Chandartal Rohtang Pass \\u2013 Manali\",\"Departure to destination\"]', 'banners/01K9NKAYB80QARFJ6X9NP28KHS.webp', 'img', 'Sela Pass', 'Discover Sela Pass beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Spiti Tour Package now.', NULL, 'Sela Pass', 'Sela Pass', 'Discover Sela Pass beauty with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Spiti Tour Package now.', NULL, 'draft', 0, 0, '2025-11-10 08:40:57', '2025-11-10 08:40:57'),
(15, 'Arunachal Pradesh Tour Package For 4 Days', 'arunachal-pradesh-tour-package-for-4-days', 'Plan a perfect Arunachal Pradesh Tour Package for 3 Days, including extensive routes, costs, and choices. \n', '<p>Explore the pristine beauty and cultural richness of Arunachal Pradesh with PP The Traveller. We offer you a unique experience of this fascinating state with our specially curated Arunachal Pradesh Tour Package.</p><p><br>Whether you travel through lush green valleys or stop at ancient monasteries, you will be captivated by this journey. We offer packages for all types of travellers, whether they are seeking adventure or tranquility.</p><p><br><br></p>', 1, 3, 4, 3, 15999.00, NULL, 'INR', '[\"Tawang Monastery\",\"Ziro Valley\",\"Sela Pass is a breathtaking high-altitude mountain\",\"Sela Pass is a stunning high-altitude mountain pass\",\"Bomdila Monastery,\"]', 'banners/01K9NKSPF5K82J2G4XXE76W3C5.png', 'img', 'Arunachal Pradesh Tour Package for 4 Days – The Northeast​', 'Book your Arunachal Pradesh tour package for 4 days and explore Tawang, Ziro Valley & more. Perfect for nature and culture enthusiasts.', NULL, 'Arunachal Pradesh Tour Package for 4 Days – The Northeast​', 'Arunachal Pradesh Tour Package for 4 Days – The Northeast​', 'Book your Arunachal Pradesh tour package for 4 days and explore Tawang, Ziro Valley & more. Perfect for nature and culture enthusiasts.', NULL, 'draft', 0, 0, '2025-11-10 08:49:01', '2025-11-10 08:49:01'),
(16, 'Tripura Tour Package For 4 Days', 'tripura-tour-package-for-4-days', 'Plan a perfect Tripura Tour Package for 3 Days, including extensive routes, costs, and choices. Enjoy an unforgettable experience with PP The Traveller.\n\n', '<p>PP The Traveller offers a specially designed Tripura Tour Package that will take you on a journey through Tripura that you will never forget. In the northeastern part of India, Tripura is characterized by a rich cultural heritage, natural beauty, and historical significance. The four-day itinerary ensures that you experience the best of Tripura, from its ancient temples and royal palaces to its serene landscapes and vibrant local culture.</p><p>Let us offer you an enriching travel experience in this lesser-explored corner of India.</p><p><br><br></p><p><br><br></p>', 1, 5, 4, 3, 15999.00, NULL, 'INR', '[\"Ujjayanta Palace in Agartala\",\"Neermahal is a stunning water palace located on Rudrasagar Lake\",\"Unakoti is a historic pilgrimage site in Tripura\",\"Sepahijala Wildlife Sanctuary in Tripura\",\"Tripura Sundari Temple is a prominent Hindu temple located\"]', 'banners/01K9NMBVCSQ2K8J1PCHBM63Q5G.webp', 'img', 'Tripura State Museum', 'Book your Tripura tour package for 4 days and explore Ujjayanta Palace, Neermahal & more. Ideal for culture and nature enthusiasts.', NULL, 'Tripura State Museum', 'Tripura State Museum', 'Book your Tripura tour package for 4 days and explore Ujjayanta Palace, Neermahal & more. Ideal for culture and nature enthusiasts.', NULL, 'draft', 0, 1, '2025-11-10 08:58:56', '2025-11-10 08:58:56'),
(17, 'Tripura Tour Package For 4 Days', 'tripura-tour-package-for-4-day', 'Plan a perfect Tripura Tour Package for 3 Days, including extensive routes, costs, and choices. Enjoy an unforgettable experience with PP The Traveller.\n\n', '<p>PP The Traveller offers a specially designed Tripura Tour Package that will take you on a journey through Tripura that you will never forget. In the northeastern part of India, Tripura is characterized by a rich cultural heritage, natural beauty, and historical significance. The four-day itinerary ensures that you experience the best of Tripura, from its ancient temples and royal palaces to its serene landscapes and vibrant local culture.</p><p>Let us offer you an enriching travel experience in this lesser-explored corner of India.</p><p><br><br></p><p><br><br></p>', 1, 5, 4, 3, 15999.00, 20000.00, 'INR', '[\"Ujjayanta Palace in Agartala\",\"Neermahal is a stunning water palace located on Rudrasagar Lake in Tripura\",\"Unakoti is a historic pilgrimage site in Tripura\",\"Sepahijala Wildlife Sanctuary in Tripura is a 18.53 km\\u00b2\",\"Tripura Sundari Temple is a prominent Hindu temple located in Udaipur\"]', 'banners/01K9NMVNM0KPF0440HS1TZAV36.webp', 'img', 'Tripura Tour Package for 4 Days – Cultural Escape', 'Book your Tripura tour package for 4 days and explore Ujjayanta Palace, Neermahal & more. Ideal for culture and nature enthusiasts.', NULL, 'Tripura Tour Package for 4 Days – Cultural Escape', 'Tripura Tour Package for 4 Days – Cultural Escape', 'Book your Tripura tour package for 4 days and explore Ujjayanta Palace, Neermahal & more. Ideal for culture and nature enthusiasts.', NULL, 'published', 0, 0, '2025-11-10 09:07:34', '2025-11-10 09:07:34'),
(18, 'Mizoram Tour Package For 4 Days', 'mizoram-tour-package-for-4-days', 'Plan a perfect Mizoram Tour Package for 3 Days, including extensive routes, costs, and choices. Enjoy an unforgettable experience with PP The Traveller.\n\n', '<p>Explore the lush landscapes and vibrant culture of Mizoram with PP The Traveller\'s Mizoram Tour Package. The state of Mizoram lies in the northeastern part of India, making it a haven for nature lovers and cultural enthusiasts alike.</p><p><br>With our 4-day itinerary, you will experience the best of Mizoram, from its serene hills and valleys to its rich traditions and warm hospitality. Let us take you on an unforgettable adventure in this beautiful state.</p><p><br><br></p>', 1, 4, 4, 3, 15999.00, 20000.00, 'INR', '[\"Aizawl, the capital of Mizoram, is nestled at 1,132 meters\",\"Reiek Village, located 29 km from Aizawl\",\"Tamdil Lake, located 110 km from Aizawl\",\"Phawngpui National Park, also known as Blue Mountain National Park\",\"Vantawng Falls, located near Thenzawl, is Mizoram\\u2019s highest waterfall at 751 feet\"]', 'banners/01K9NNBEPXQ90Y6EFSBS02NCG6.jpg', 'img', 'Mizoram Tour Package for 4 Days – Scenic Northeast', 'Book your Mizoram tour package for 4 days and explore Aizawl, Reiek Village & more. Ideal for nature and culture enthusiasts.', NULL, 'Mizoram Tour Package for 4 Days – Scenic Northeast', 'Mizoram Tour Package for 4 Days – Scenic Northeast', 'Book your Mizoram tour package for 4 days and explore Aizawl, Reiek Village & more. Ideal for nature and culture enthusiasts.', NULL, 'draft', 0, 1, '2025-11-10 09:16:11', '2025-11-10 09:16:11'),
(19, 'Tamdil Tour Package For 4 Days', 'tamdil-tour-package-for-4-days', 'Plan a perfect Mizoram Tour Package for 3 Days, including extensive routes, costs, and choices. Enjoy an unforgettable experience with PP The Traveller.\n\n', '<p>Explore the lush landscapes and vibrant culture of Mizoram with PP The Traveller\'s Mizoram Tour Package. The state of Mizoram lies in the northeastern part of India, making it a haven for nature lovers and cultural enthusiasts alike.</p><p><br>With our 4-day itinerary, you will experience the best of Mizoram, from its serene hills and valleys to its rich traditions and warm hospitality. Let us take you on an unforgettable adventure in this beautiful state.</p><p><br><br></p>', 1, 4, 4, 3, 15999.00, 20000.00, 'INR', '[\"Aizawl, the capital of Mizoram, is nestled at 1,132 meters above sea level\",\"Reiek Village, located 29 km from Aizawl, is a scenic hilltop destination\",\"Tamdil Lake, located 110 km from Aizawl\",\"Phawngpui National Park, also known as Blue Mountain National Park,\",\"Vantawng Falls, located near Thenzawl, is Mizoram\\u2019s highest waterfall at 751 feet\"]', 'banners/01K9NNSWKE05TDRPJ49XDV7DZY.webp', 'img', 'Tamdil Tour Package for 4 Days – Scenic Northeast', 'Book your Tamdil tour package for 4 days and explore Aizawl, Reiek Village & more. Ideal for nature and culture enthusiasts.', NULL, 'Tamdil Tour Package for 4 Days – Scenic Northeast', 'Tamdil Tour Package for 4 Days – Scenic Northeast', 'Book your Tamdil tour package for 4 days and explore Aizawl, Reiek Village & more. Ideal for nature and culture enthusiasts.', NULL, 'draft', 0, 1, '2025-11-10 09:24:04', '2025-11-10 09:24:04'),
(20, 'Tour Packages in Nagaland', 'tour-packages-in-nagaland', 'Plan the perfect Nagaland Tour Package with detailed routes, flexible pricing, and personalized choices. Experience Nagaland with PP The Traveller.\n\n', '<p>The Nagaland tour package from PP The Traveller is your gateway to exploring a land of vibrant culture and breathtaking landscapes. Nestled in the northeastern region of India, Nagaland offers an authentic experience filled with tribal heritage, scenic beauty, and thrilling adventure activities.</p><p><br>The itinerary of our 4-day tour offers an unforgettable journey through Nagaland, from its bustling markets to serene villages.</p><p><br><br></p>', 1, 6, 4, 3, 15999.00, 20000.00, 'INR', '[\"Kohima\",\"Khonoma Village\",\"Kisama Heritage Village\",\"Dzukou Valley\",\"Dimapur\"]', 'banners/01K9NP6QE8SS2PJPA340X5NVHW.jpg', 'img', 'Tour Packages in Nagaland | Nagaland Tour Packages', 'Nagaland Tour Package', NULL, 'Tour Packages in Nagaland | Nagaland Tour Packages', 'Tour Packages in Nagaland | Nagaland Tour Packages', 'Nagaland Tour Package', NULL, 'draft', 0, 1, '2025-11-10 09:31:05', '2025-11-10 09:31:05'),
(21, 'Leh Ladakh Tour Package – Explore the Land of High Passes', 'leh-ladakh-tour-package', 'Adventure, Monasteries & Lakes in the Himalayas\n\n', '<p>Experience the breathtaking landscapes of Leh-Ladakh, the Land of High Passes, where snow-capped mountains, turquoise lakes, and ancient monasteries create an unforgettable adventure. This tour package covers key attractions including Pangong Lake, Nubra Valley, Thiksey and Hemis Monasteries, and magnetic high-altitude passes like Khardung La. Witness the unique culture of Ladakhi people, enjoy scenic drives through rugged terrains, and indulge in thrilling activities like river rafting and jeep safaris. Ideal for adventure enthusiasts, nature lovers, and cultural explorers, this Leh-Ladakh tour promises memories that last a lifetime.</p><p><br><br></p>', 1, 1, 4, 2, 24999.00, NULL, 'INR', '[\"Visit Shanti Stupa & Leh Palace\",\"Excursion to Nubra Valley via Khardung La\",\"Trip to Pangong Lake\",\"Explore Thiksey & Hemis Monastery\",\"Scenic drives through mountain passes\"]', 'banners/01K9NPMDWPMTRWN330MRDHW113.webp', 'img', 'Leh Ladakh Tour Package – Explore the Land of High Passes', NULL, NULL, 'Leh Ladakh Tour Package – Explore the Land of High Passes', 'Leh Ladakh Tour Package – Explore the Land of High Passes', NULL, NULL, 'draft', 0, 1, '2025-11-10 09:38:34', '2025-11-10 09:38:34'),
(22, 'Highlights Tour – Palaces, Monasteries, Valleys & Lakes', 'highlights-tour-palaces-monasteries-valleys-lakes', 'Explore Ladakh’s timeless charm with visits to Leh Palace, Shanti Stupa, Nubra Valley, ', '<p>PP The Traveller offers a specially crafted Ladakh Tour Package that takes you on an unforgettable journey through the magical landscapes of the Himalayas. Nestled in the northernmost part of India, Ladakh is famed for its ancient monasteries, palaces, high mountain passes, and breathtaking valleys.</p><p>This 3-day itinerary covers the best of Ladakh, from the historic Leh Palace and serene Shanti Stupa to the bustling Leh Market. Travel through the world-famous Khardung La Pass into the spectacular Nubra Valley, where you’ll visit Diskit Monastery and experience the unique Hunder Sand Dunes. The journey concludes with the mesmerizing beauty of Pangong Lake, one of Ladakh’s most iconic attractions.</p><p>Let us offer you a seamless blend of adventure, culture, and natural wonders in this short yet enriching Ladakh experience.</p>', 1, 9, 3, 2, 14999.00, NULL, 'INR', '[\"Leh Palace\",\"Shanti Stupa\",\"Leh Market\",\"Khardung La Pass\",\"Nubra Valley\",\"Diskit Monastery\",\"Hunder Sand Dunes\",\"Pangong Lake\"]', 'banners/01K9P1AN5BFZ1Y1MVVGVCFFT33.webp', 'img', '3 Days Ladakh Tour Package', 'Pangong Lake', NULL, '3 Days Ladakh Tour Package – Explore Leh, Nubra Valley & Pangong Lake', '3 Days Ladakh Tour Package – Explore Leh, Nubra Valley & Pangong Lake', 'Discover Ladakh in 3 days with visits to Leh Palace', NULL, 'published', 1, 1, '2025-11-10 12:45:28', '2025-11-10 12:45:28'),
(23, '5 Night 6 Days Shillong Tour', '5-night-6-days-shillong-tour', '5 Night 6 Days Shillong Tour', '<p>&nbsp;Explore a 6-day journey through the scenic beauty of Meghalaya, starting in Shillong and heading to iconic spots like Cherrapunji and Dawki. The trip includes a tranquil stay by Umiam Lake, marvels such as Nohkalikai Falls and the root bridges, and a river boat ride near the border with Bangladesh. Comfortable hotels, private transport and local sights make this package ideal for families and nature lovers alike.&nbsp;</p>', 1, 7, 6, 5, 23999.00, 28999.00, 'INR', '[\"Guwahati\",\"Shillong\",\"Cherrapunji\",\"Dawki\",\"Nohkalikai Falls\"]', 'banners/01K9P5QPTSW9ZWTMTPYKRZNQZ7.webp', 'banne', 'Meghalaya Tour Package for 6 Days – Scenic Northeast', 'Book your 6-day Meghalaya tour package and explore Shillong, Cherrapunji, Dawki & more. Ideal for nature and adventure enthusiasts.', 'https://www.ppthetraveller.com/5-night-6-days-shillong-tour', '5 Night 6 Days Shillong Tour', 'Meghalaya Tour Package for 6 Days – Scenic Northeast', 'Book your 6-day Meghalaya tour package and explore Shillong, Cherrapunji, Dawki & more. Ideal for nature and adventure enthusiasts.', 'og-images/01K9P5QPX7SHVFEMXJ61PSMGBD.webp', 'published', 0, 0, '2025-11-10 00:32:30', '2025-11-10 00:32:30'),
(24, '7 Night - 8 Days Bike Trip Shillong', '7-night-8-days-bike-trip-shillong', '7 Night - 8 Days Bike Trip Shillong', '<p>Embark on a thrilling 8-day bike adventure across Meghalaya starting in Shillong, weaving through mist-clad hills, cascading waterfalls and serene rivers. Ride from Shillong to Cherrapunji and the famous double-decker living-root bridge, then onward to the crystal-clear waters at Dawki and rural villages like Mawlynnong. Each day brings fresh vistas, local culture, and the freedom of the open road. Comfortable stays and support for your bike ensure you focus on the journey—not just the destination.</p>', 1, 7, 8, 7, 31999.00, 35999.00, 'INR', '[\"Guwahati\",\"Shillong\",\"Cherrapunji\",\"Dawki\",\"Nohkalikai Falls\"]', 'banners/01K9P6T7XG76A6DHY4H5J3R8Q2.webp', 'banner', 'Meghalaya Bike Tour Package for 8 Days – Adventure Awaits', 'Embark on an 8-day Meghalaya bike tour covering Shillong, Cherrapunji, Dawki & more. Ideal for adventure and nature enthusiasts.', 'https://www.ppthetraveller.com/tour-package/7-night-8-days-bike-trip-shillong', 'Meghalaya Bike Tour Package for 8 Days – Adventure Awaits', 'Meghalaya Bike Tour Package for 8 Days – Adventure Awaits', 'Embark on an 8-day Meghalaya bike tour covering Shillong, Cherrapunji, Dawki & more. Ideal for adventure and nature enthusiasts.', 'og-images/01K9P6T80W9HV1XYYWJJ6C508T.webp', 'published', 0, 0, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(25, 'Enchanting Escapade in shillong', 'enchanting-escapade-in-shillong', 'Enchanting Escapade in shillong\n', '<p><br></p><p>Experience the charm of Shillong with our “Enchanting Escapade” — a journey filled with serene lakes, lush hilltops, and cultural discoveries at every turn. Begin with the tranquil waters of Umiam, wander through Ward’s Lake and the bustling Police Bazaar, then venture into Elephanta Falls and Shillong Peak for sweeping panoramas. Meet the Khasi people in village stay-style accommodations, savor local cuisine, and wrap up with a scenic roll through the “Scotland of the East.” A perfect blend of relaxation and adventure awaits.</p>', 1, 7, 7, 6, 23999.00, 28999.00, 'INR', '[\"Cherrapunjee\",\"Dawki\",\"Shillong via Krang Suri Falls\",\"Mawlynong to Shillong via Krang Suri Falls\",\"Exploration Day\"]', 'banners/01K9PB35P76DG4K6Z4S98JDV3T.webp', 'banner', 'Meghalaya Tour Package for 6 Days – Scenic Escapade', 'Book your Meghalaya tour package for 6 days to explore Shillong, Cherrapunji, Dawki & more. A perfect nature and adventure-filled journey.', 'https://www.ppthetraveller.com/tour-package/enchanting-escapade-in-shillong', 'Enchanting Escapade in shillong', 'Meghalaya Tour Package for 6 Days – Scenic Escapade', 'Book your Meghalaya tour package for 6 days to explore Shillong, Cherrapunji, Dawki & more. A perfect nature and adventure-filled journey.', 'og-images/01K9PB35TXXQ73J87AX2ZB8BHT.webp', 'published', 0, 0, '2025-11-10 02:06:09', '2025-11-10 02:16:56'),
(26, 'Tour Packages in Cherrapunji', 'cherrapunji-tour-packages', 'Explore Cherrapunji waterfalls, caves, and living root bridges in a 4-day guided adventure Best Tour Packages in Cherrapunji with the Best Deals and Offers.\n\n', '<p>Experience the enchantment of Cherrapunji, the jewel of Meghalaya, nestled in the misty hills of the Eastern Himalayas. Renowned as one of the wettest places on Earth, Cherrapunji mesmerizes visitors with its cascading waterfalls, living root bridges, lush green valleys, and mysterious ancient caves. This serene hill station offers a captivating blend of natural beauty and rich tribal heritage, making it a dream destination for nature lovers and adventure seekers. Whether you\'re exploring its breathtaking landscapes or immersing yourself in the local culture, a tour package For Cherrapunji ensures you don’t miss any of its magical charm.</p><p>Whether you\'re trekking through dense forests, marveling at thunderous waterfalls, or crossing centuries-old living root bridges, Cherrapunji offers an unforgettable journey into the heart of nature’s pristine beauty.</p>', 1, 8, 4, 3, 23999.00, 26999.00, 'INR', '[\"Nohkalikai Waterfalls\",\"Mawsmai Caves\",\"Double Decker Living Root Bridge (Nongriat)\",\"Seven Sisters Waterfalls (Nohsngithiang Falls)\",\"Thangkharang Park\"]', 'banners/01K9PF416C9KP03TB3SN3D1PNR.webp', 'banner', 'Tour Packages in Cherrapunji | Cherrapunji Tour Packages', 'Explore Cherrapunji waterfalls, caves, and living root bridges in a 4-day guided adventure Best Tour Packages in Cherrapunji with the Best Deals and Offers', 'https://www.ppthetraveller.com/cherrapunji-tour-packages', 'Tour Packages in Cherrapunji', 'Tour Packages in Cherrapunji | Cherrapunji Tour Packages', 'Explore Cherrapunji waterfalls, caves, and living root bridges in a 4-day guided adventure Best Tour Packages in Cherrapunji with the Best Deals and Offers', 'og-images/01K9PF4188QXAJHGQFCY3NMXAJ.webp', 'published', 0, 0, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(27, 'Tour Packages in Khasi Hills', 'khasi-hills', 'Book your Khasi Hills tour package now and experience unforgettable moments in Paradise on Earth\n\n', '<p>Begin your adventure in Khasi Hills, where modern skyscrapers, rich heritage, and vibrant street life offer the perfect blend of culture, energy, and exploration.</p><p>Begin your journey in Khasi Hills, where dynamic cityscapes, historic landmarks, and lively local markets create a vibrant blend of tradition, modernity, and discovery.</p>', 1, 8, 2, 1, 7999.00, 12999.00, 'INR', '[]', 'banners/01K9PHWG5T7TJ8ZN3RZHAN6WDS.jfif', 'banner', 'Tour Packages in Khasi Hills | Khasi Hills Tour Packages', 'Take a tour of Arunachal Pradesh with PP The Travellers. Explore scenic landscapes, rich cultures, and unique wildlife. Get your Arunachal Pradesh tour package', 'https://www.ppthetraveller.com/khasi-hills', 'Tour Packages in Khasi Hills', 'Tour Packages in Khasi Hills | Khasi Hills Tour Packages', 'Take a tour of Arunachal Pradesh with PP The Travellers. Explore scenic landscapes, rich cultures, and unique wildlife. Get your Arunachal Pradesh tour package', 'og-images/01K9PHWGC95KDVBJEM6VKYEQ11.jfif', 'published', 0, 0, '2025-11-10 04:04:50', '2025-11-10 04:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `package_gallery`
--

CREATE TABLE `package_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `alt_text` varchar(200) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_gallery`
--

INSERT INTO `package_gallery` (`id`, `package_id`, `image_url`, `alt_text`, `caption`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'gallery/01K9M0JJ17AXNZX1SPYT2CGC11.webp', 'img', NULL, 1, '2025-11-09 17:53:50', '2025-11-09 17:53:50'),
(2, 1, 'gallery/01K9M0JJ1A3HVD2PT6SH3GQ0VW.jpg', 'img', 'img', 2, '2025-11-09 17:53:50', '2025-11-09 17:53:50'),
(3, 1, 'gallery/01K9M0JJ1EW1HA07KM6EYSMYJ3.jpg', 'img', 'img', 3, '2025-11-09 17:53:50', '2025-11-09 17:53:50'),
(4, 1, 'gallery/01K9M0JJ1G65B5BJCCX17J619S.webp', 'img', 'img', 4, '2025-11-09 17:53:50', '2025-11-09 17:53:50'),
(5, 1, 'gallery/01K9M0JJ1KNB4JR45F7F1AXJ2D.webp', 'img', 'img', 5, '2025-11-09 17:53:50', '2025-11-09 17:53:50'),
(6, 1, 'gallery/01K9M0JJ1M94AV9DBC5NQA0FCK.avif', 'img', 'img', 6, '2025-11-09 17:53:50', '2025-11-09 17:53:50'),
(7, 2, 'gallery/01K9MFGJ2R7SJKNBC067VZHJ2A.avif', 'img', 'img', 1, '2025-11-09 22:14:53', '2025-11-09 22:14:53'),
(8, 2, 'gallery/01K9MFGJ2WFJT6DYGKFR7VWJ0Q.avif', 'img', 'img', 2, '2025-11-09 22:14:53', '2025-11-09 22:14:53'),
(9, 2, 'gallery/01K9MFGJ2YNYR52E6TB0HDFD7R.avif', 'img', 'img', 3, '2025-11-09 22:14:53', '2025-11-09 22:14:53'),
(10, 2, 'gallery/01K9MFGJ30S08TW2VW054Y5W8Y.avif', 'img', 'img', 4, '2025-11-09 22:14:53', '2025-11-09 22:14:53'),
(11, 2, 'gallery/01K9MFGJ32YFPQBGJ5YMPCTNY0.avif', 'img', 'img', 5, '2025-11-09 22:14:53', '2025-11-09 22:14:53'),
(12, 3, 'gallery/01K9MG433N3CB3BBGHW08YHV5A.webp', 'img', NULL, 1, '2025-11-09 22:25:33', '2025-11-09 22:25:33'),
(13, 3, 'gallery/01K9MG433Q725ZKBAN60ZPE8HB.webp', 'img', NULL, 2, '2025-11-09 22:25:33', '2025-11-09 22:25:33'),
(14, 3, 'gallery/01K9MG433SFAGTPWBF2QHRRWN5.webp', 'img', NULL, 3, '2025-11-09 22:25:33', '2025-11-09 22:25:33'),
(15, 3, 'gallery/01K9MG433V7XNNGQR2DVN4JVMN.webp', 'img', NULL, 4, '2025-11-09 22:25:33', '2025-11-09 22:25:33'),
(16, 3, 'gallery/01K9MG433XV5NJR8ACGTSB6H4X.webp', 'img', 'img', 5, '2025-11-09 22:25:33', '2025-11-09 22:25:33'),
(17, 4, 'gallery/01K9MGNYHPD5DY61D2J101S269.webp', 'img', NULL, 1, '2025-11-09 22:35:18', '2025-11-09 22:35:18'),
(18, 4, 'gallery/01K9MGNYHSFRN8AGSDGTNC57VC.webp', 'img', NULL, 2, '2025-11-09 22:35:18', '2025-11-09 22:35:18'),
(19, 4, 'gallery/01K9MGNYHW6QNH82S9E93EMBD5.webp', 'img', NULL, 3, '2025-11-09 22:35:18', '2025-11-09 22:35:18'),
(20, 4, 'gallery/01K9MGNYJ0SQSB2VTC7R5XZFZR.webp', 'img', NULL, 4, '2025-11-09 22:35:18', '2025-11-09 22:35:18'),
(21, 4, 'gallery/01K9MGNYJ9YX4S8F1MFRY1YA2F.webp', 'img', NULL, 5, '2025-11-09 22:35:18', '2025-11-09 22:35:18'),
(22, 5, 'gallery/01K9MH8W4XZXEH8F5ZA10MT71N.webp', 'img', NULL, 1, '2025-11-09 22:45:38', '2025-11-09 22:45:38'),
(23, 5, 'gallery/01K9MH8W4ZG68MA85GDZTHNQGE.webp', 'img', NULL, 2, '2025-11-09 22:45:38', '2025-11-09 22:45:38'),
(24, 5, 'gallery/01K9MH8W51XRP733AP528Q9RD9.webp', 'img', NULL, 3, '2025-11-09 22:45:38', '2025-11-09 22:45:38'),
(25, 5, 'gallery/01K9MH8W53X7RJTESXD0NQXFV5.webp', 'img', NULL, 4, '2025-11-09 22:45:38', '2025-11-09 22:45:38'),
(26, 5, 'gallery/01K9MH8W559504W6QPP8V5X66J.webp', 'img', NULL, 5, '2025-11-09 22:45:38', '2025-11-09 22:45:38'),
(27, 6, 'gallery/01K9MHSRG8E150JRDW52ZD9M8H.webp', 'img', NULL, 1, '2025-11-09 22:54:51', '2025-11-09 22:54:51'),
(28, 6, 'gallery/01K9MHSRGAXZ7X9XFQTNT8CTWD.webp', 'img', NULL, 2, '2025-11-09 22:54:51', '2025-11-09 22:54:51'),
(29, 6, 'gallery/01K9MHSRGDP10PR3B3BSD44R5P.webp', 'img', NULL, 3, '2025-11-09 22:54:51', '2025-11-09 22:54:51'),
(30, 6, 'gallery/01K9MHSRGFYFEMKDV99X8BKXHY.webp', 'img', NULL, 4, '2025-11-09 22:54:51', '2025-11-09 22:54:51'),
(31, 6, 'gallery/01K9MHSRGHT88A004GCAC228VD.webp', 'img', NULL, 5, '2025-11-09 22:54:52', '2025-11-09 22:54:52'),
(32, 7, 'gallery/01K9MJF4WWHDKF9W32X7BDH7WE.webp', 'img', NULL, 1, '2025-11-09 23:06:32', '2025-11-09 23:06:32'),
(33, 7, 'gallery/01K9MJF4WZJ0P8P1AV5RYCXJ0R.webp', 'img', NULL, 2, '2025-11-09 23:06:32', '2025-11-09 23:06:32'),
(34, 7, 'gallery/01K9MJF4X0NR1FGYSAZPCCQTAW.webp', 'img', NULL, 3, '2025-11-09 23:06:32', '2025-11-09 23:06:32'),
(35, 7, 'gallery/01K9MJF4X2YSKG4K9E8Z1VJ0E1.webp', 'img', NULL, 4, '2025-11-09 23:06:32', '2025-11-09 23:06:32'),
(36, 7, 'gallery/01K9MJF4X454TNDSF1QWQKVDZC.webp', 'img', NULL, 5, '2025-11-09 23:06:32', '2025-11-09 23:06:32'),
(37, 8, 'gallery/01K9MNNSKCJMQXH16H2H2C4N1E.avif', 'img', NULL, 1, '2025-11-10 00:02:36', '2025-11-10 00:02:36'),
(38, 8, 'gallery/01K9MNNSKFBNW1QPBZEF7RNDHF.avif', 'img', NULL, 2, '2025-11-10 00:02:36', '2025-11-10 00:02:36'),
(39, 8, 'gallery/01K9MNNSKH9D2JJDG3ENQ3M7MC.jpg', 'img', NULL, 3, '2025-11-10 00:02:36', '2025-11-10 00:02:36'),
(40, 8, 'gallery/01K9MNNSKK3CYJX9080RTHFVM2.jpg', 'img', NULL, 4, '2025-11-10 00:02:36', '2025-11-10 00:02:36'),
(41, 9, 'gallery/01K9MPV90G86AP7J5687PR8YQ4.jpg', 'img', NULL, 1, '2025-11-10 00:23:04', '2025-11-10 00:23:04'),
(42, 9, 'gallery/01K9MPV90K8HM6EBF9N1Q1YDQ1.jpg', 'img', NULL, 2, '2025-11-10 00:23:04', '2025-11-10 00:23:04'),
(43, 9, 'gallery/01K9MPV90NG9P7ZPHFQXS3WD95.jpg', 'img', NULL, 3, '2025-11-10 00:23:04', '2025-11-10 00:23:04'),
(44, 9, 'gallery/01K9MPV90QVAV3GBGKAW22563S.webp', 'img', NULL, 4, '2025-11-10 00:23:04', '2025-11-10 00:23:04'),
(45, 9, 'gallery/01K9MPV90SQXHJTPQ440KDN6AK.jpg', 'img', NULL, 5, '2025-11-10 00:23:04', '2025-11-10 00:23:04'),
(46, 10, 'gallery/01K9MRPAZF8S6XYEHX4M74EP5H.webp', 'img', NULL, 1, '2025-11-10 00:55:19', '2025-11-10 00:55:19'),
(47, 10, 'gallery/01K9MRPAZH8SE8D8CDVQ6MTR0D.webp', 'img', NULL, 2, '2025-11-10 00:55:19', '2025-11-10 00:55:19'),
(48, 10, 'gallery/01K9MRPAZKGKS1EKYTM16M242E.webp', 'img', NULL, 3, '2025-11-10 00:55:19', '2025-11-10 00:55:19'),
(49, 10, 'gallery/01K9MRPAZNK0B73R61B3CWDF86.webp', 'img', NULL, 4, '2025-11-10 00:55:19', '2025-11-10 00:55:19'),
(50, 10, 'gallery/01K9MRPAZQ3JSSQN3GG7B1NX6E.webp', 'img', NULL, 5, '2025-11-10 00:55:19', '2025-11-10 00:55:19'),
(51, 11, 'gallery/01K9NJ5E2KAQT5D8YR1X5JM0ZA.webp', 'img', NULL, 1, '2025-11-10 08:20:28', '2025-11-10 08:20:28'),
(52, 11, 'gallery/01K9NJ5E2N5GDG4CCR471CKJ1R.webp', 'img', NULL, 2, '2025-11-10 08:20:28', '2025-11-10 08:20:28'),
(53, 11, 'gallery/01K9NJ5E2Q1NKVBG131ZBP91QZ.webp', 'img', NULL, 3, '2025-11-10 08:20:28', '2025-11-10 08:20:28'),
(54, 11, 'gallery/01K9NJ5E2SA829XZ30HA8VVQ6Z.webp', 'img', NULL, 4, '2025-11-10 08:20:28', '2025-11-10 08:20:28'),
(55, 11, 'gallery/01K9NJ5E2VQR537NAJBG6C89RY.webp', 'img', NULL, 5, '2025-11-10 08:20:28', '2025-11-10 08:20:28'),
(56, 12, 'gallery/01K9NJGENE8Q9PAK3FZ7FMQXFA.webp', 'img', NULL, 1, '2025-11-10 08:26:29', '2025-11-10 08:26:29'),
(57, 12, 'gallery/01K9NJGENHSCAZD687TFGJ58XR.webp', 'img', NULL, 2, '2025-11-10 08:26:29', '2025-11-10 08:26:29'),
(58, 12, 'gallery/01K9NJGENKZDVYGPCPMS1T08NC.webp', 'img', NULL, 3, '2025-11-10 08:26:29', '2025-11-10 08:26:29'),
(59, 12, 'gallery/01K9NJGENP0YQFS7N831YTRFB1.webp', 'img', NULL, 4, '2025-11-10 08:26:29', '2025-11-10 08:26:29'),
(60, 12, 'gallery/01K9NJGENRZ55K9HB52J97ATXJ.webp', 'img', NULL, 5, '2025-11-10 08:26:29', '2025-11-10 08:26:29'),
(61, 12, 'gallery/01K9NJGENT1QXQTRWM1KZ5KTV7.webp', 'img', NULL, 6, '2025-11-10 08:26:30', '2025-11-10 08:26:30'),
(62, 13, 'gallery/01K9NJXGGFMKGT412Z2ZQ25RWN.webp', 'img', NULL, 1, '2025-11-10 08:33:37', '2025-11-10 08:33:37'),
(63, 13, 'gallery/01K9NJXGGH0HN44SSGC5JJ6M2D.webp', 'img', NULL, 2, '2025-11-10 08:33:37', '2025-11-10 08:33:37'),
(64, 13, 'gallery/01K9NJXGGK7FG826Z7KD5CT78V.webp', 'img', NULL, 3, '2025-11-10 08:33:37', '2025-11-10 08:33:37'),
(65, 13, 'gallery/01K9NJXGGNS5682VABF2PG8HXA.webp', 'img', NULL, 4, '2025-11-10 08:33:37', '2025-11-10 08:33:37'),
(66, 13, 'gallery/01K9NJXGGQZWMP4Y00JC1KJGM0.webp', 'imimg', NULL, 5, '2025-11-10 08:33:37', '2025-11-10 08:33:37'),
(67, 14, 'gallery/01K9NKAYBBRJ0Z52ZCMBNRM2CG.webp', 'img', NULL, 1, '2025-11-10 08:40:58', '2025-11-10 08:40:58'),
(68, 14, 'gallery/01K9NKAYBDEVS4CRZC0224MNEK.webp', 'img', NULL, 2, '2025-11-10 08:40:58', '2025-11-10 08:40:58'),
(69, 14, 'gallery/01K9NKAYBFZ6WNTFX8KTZWGVJM.webp', 'img', NULL, 3, '2025-11-10 08:40:58', '2025-11-10 08:40:58'),
(70, 14, 'gallery/01K9NKAYBHZQRT0RXYEYMK2986.webp', 'img', NULL, 4, '2025-11-10 08:40:58', '2025-11-10 08:40:58'),
(71, 14, 'gallery/01K9NKAYBM2MWJ8CJV0S7MT7ZP.webp', 'img', NULL, 5, '2025-11-10 08:40:58', '2025-11-10 08:40:58'),
(72, 15, 'gallery/01K9NKSPFCC2J8CF1MF76P1S94.png', 'img', NULL, 1, '2025-11-10 08:49:01', '2025-11-10 08:49:01'),
(73, 15, 'gallery/01K9NKSPFGX7WTGGXDJGBFNZ9E.png', 'img', NULL, 2, '2025-11-10 08:49:01', '2025-11-10 08:49:01'),
(74, 15, 'gallery/01K9NKSPFKV6QEJWARXQQAGDD1.png', 'img', NULL, 3, '2025-11-10 08:49:01', '2025-11-10 08:49:01'),
(75, 15, 'gallery/01K9NKSPFRTMKKEJQGM8FGFJYV.png', 'img', NULL, 4, '2025-11-10 08:49:01', '2025-11-10 08:49:01'),
(76, 15, 'gallery/01K9NKSPFWH69VZRYF8FQVE8YR.png', 'img', NULL, 5, '2025-11-10 08:49:01', '2025-11-10 08:49:01'),
(77, 16, 'gallery/01K9NMBVCX9X2518MFW46G0EQE.jpg', 'img', NULL, 1, '2025-11-10 08:58:56', '2025-11-10 08:58:56'),
(78, 16, 'gallery/01K9NMBVD0WJXNCHX8P77CC38G.jpg', 'img', NULL, 2, '2025-11-10 08:58:56', '2025-11-10 08:58:56'),
(79, 16, 'gallery/01K9NMBVD25SR10Y7VZB62MVBA.jpg', 'img', NULL, 3, '2025-11-10 08:58:56', '2025-11-10 08:58:56'),
(80, 16, 'gallery/01K9NMBVD5HPZBD0HR9B331BYJ.jpg', 'img', NULL, 4, '2025-11-10 08:58:56', '2025-11-10 08:58:56'),
(81, 16, 'gallery/01K9NMBVD7WH3ND83EA4350FBM.avif', 'iimg', NULL, 5, '2025-11-10 08:58:56', '2025-11-10 08:58:56'),
(82, 17, 'gallery/01K9NMVNM4X2NVRPYHWWQQQ64J.jpg', 'img', NULL, 1, '2025-11-10 09:07:34', '2025-11-10 09:07:34'),
(83, 17, 'gallery/01K9NMVNM7EHWG5C5DXW0ZWF4R.webp', 'img', NULL, 2, '2025-11-10 09:07:34', '2025-11-10 09:07:34'),
(84, 17, 'gallery/01K9NMVNMATQX76D7KN1PWYFMH.jpg', 'img', NULL, 3, '2025-11-10 09:07:34', '2025-11-10 09:07:34'),
(85, 17, 'gallery/01K9NMVNMDVXFMR8E3BH95CF46.webp', 'img', NULL, 4, '2025-11-10 09:07:34', '2025-11-10 09:07:34'),
(86, 17, 'gallery/01K9NMVNMFVMPG3J0162219WM5.avif', 'img', NULL, 5, '2025-11-10 09:07:34', '2025-11-10 09:07:34'),
(87, 18, 'gallery/01K9NNBEQ1JDWJVXHDJKP2RJXF.jpg', 'img', NULL, 1, '2025-11-10 09:16:11', '2025-11-10 09:16:11'),
(88, 18, 'gallery/01K9NNBEQ3542MC8QBSJPX6WFZ.webp', 'img', NULL, 2, '2025-11-10 09:16:11', '2025-11-10 09:16:11'),
(89, 18, 'gallery/01K9NNBEQ5R7QECHKEW9F9HRF7.webp', 'img', NULL, 3, '2025-11-10 09:16:11', '2025-11-10 09:16:11'),
(90, 18, 'gallery/01K9NNBEQ74A4KY98CCKX224F3.webp', 'img', NULL, 4, '2025-11-10 09:16:11', '2025-11-10 09:16:11'),
(91, 18, 'gallery/01K9NNBEQ9NY30XPHDSSF51K5K.webp', 'img', NULL, 5, '2025-11-10 09:16:11', '2025-11-10 09:16:11'),
(92, 19, 'gallery/01K9NNSWKJT35RQFSMQQMFDFZV.webp', 'img', NULL, 1, '2025-11-10 09:24:04', '2025-11-10 09:24:04'),
(93, 19, 'gallery/01K9NNSWKNXX46X3DCM7C8HVV3.webp', 'img', NULL, 2, '2025-11-10 09:24:04', '2025-11-10 09:24:04'),
(94, 19, 'gallery/01K9NNSWKQQQ99VPGHFX5R5RYT.webp', 'img', NULL, 3, '2025-11-10 09:24:04', '2025-11-10 09:24:04'),
(95, 19, 'gallery/01K9NNSWKSCHDCGK924WAM4Y0R.webp', 'img', NULL, 4, '2025-11-10 09:24:04', '2025-11-10 09:24:04'),
(96, 19, 'gallery/01K9NNSWKV41YNCSA8RW75KT6Y.webp', 'img', NULL, 5, '2025-11-10 09:24:04', '2025-11-10 09:24:04'),
(97, 20, 'gallery/01K9NP6QEDYSEEH3TM9PD3C6QG.webp', 'img', NULL, 1, '2025-11-10 09:31:05', '2025-11-10 09:31:05'),
(98, 20, 'gallery/01K9NP6QEF1DSNPK6WPXFDBK75.webp', 'img', NULL, 2, '2025-11-10 09:31:05', '2025-11-10 09:31:05'),
(99, 20, 'gallery/01K9NP6QEJBCS9BQKS9SAZ1PKV.jpg', 'img', NULL, 3, '2025-11-10 09:31:05', '2025-11-10 09:31:05'),
(100, 20, 'gallery/01K9NP6QEMN3KKB5EEJWHSE3JF.webp', 'img', NULL, 4, '2025-11-10 09:31:05', '2025-11-10 09:31:05'),
(101, 20, 'gallery/01K9NP6QEPHBF4W7T0QWWFA21S.webp', 'img', NULL, 5, '2025-11-10 09:31:05', '2025-11-10 09:31:05'),
(102, 21, 'gallery/01K9NPMDWTHFC85EB9B9M9J9WD.webp', 'img', NULL, 1, '2025-11-10 09:38:34', '2025-11-10 09:38:34'),
(103, 21, 'gallery/01K9NPMDWWQ2TAJ6EDET95AKNT.webp', 'img', NULL, 2, '2025-11-10 09:38:34', '2025-11-10 09:38:34'),
(104, 21, 'gallery/01K9NPMDWZ6CN7SMM3SKF506QZ.webp', 'img', NULL, 3, '2025-11-10 09:38:34', '2025-11-10 09:38:34'),
(105, 21, 'gallery/01K9NPMDX155PH2Z724BJ39VV4.webp', 'img', NULL, 4, '2025-11-10 09:38:34', '2025-11-10 09:38:34'),
(106, 21, 'gallery/01K9NPMDX3K60XX8ERH0JG19RA.webp', 'iimg', NULL, 5, '2025-11-10 09:38:34', '2025-11-10 09:38:34'),
(107, 22, 'gallery/01K9P1AN5GY9ZB9SZCKK8C5XA2.webp', 'img', NULL, 1, '2025-11-10 12:45:28', '2025-11-10 12:45:28'),
(108, 22, 'gallery/01K9P1AN5JTT9YJ6Q6AV7Z9EAF.webp', 'img', NULL, 2, '2025-11-10 12:45:28', '2025-11-10 12:45:28'),
(109, 22, 'gallery/01K9P1AN5NGDCAGY4JQ777WWE2.webp', 'img', NULL, 3, '2025-11-10 12:45:28', '2025-11-10 12:45:28'),
(110, 22, 'gallery/01K9P1AN5QFQEYDZ1W0HT2YHZ4.webp', 'img', NULL, 4, '2025-11-10 12:45:28', '2025-11-10 12:45:28'),
(111, 22, 'gallery/01K9P1AN5T3HFQ13MV9GDMR4PQ.webp', 'img', NULL, 5, '2025-11-10 12:45:28', '2025-11-10 12:45:28'),
(112, 23, 'gallery/01K9P5QPTZM7HR6EGSM4QHKJHK.webp', 'image 2', NULL, 1, '2025-11-10 00:32:30', '2025-11-10 00:32:30'),
(113, 23, 'gallery/01K9P5QPV3ZKJT1AFT35VEAG2C.webp', '3', NULL, 2, '2025-11-10 00:32:30', '2025-11-10 00:32:30'),
(114, 23, 'gallery/01K9P5QPV7BWAZHFABX30WD10H.webp', '4', NULL, 3, '2025-11-10 00:32:30', '2025-11-10 00:32:30'),
(115, 23, 'gallery/01K9P5QPVAJRFFP8WRG8J19WQR.webp', '5', NULL, 4, '2025-11-10 00:32:30', '2025-11-10 00:32:30'),
(116, 24, 'gallery/01K9P6T7YCFEH51MW5HQ2ETHRY.webp', '2', NULL, 1, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(117, 24, 'gallery/01K9P6T7YHXS94YZ3ZA3Y295ND.webp', '3', NULL, 2, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(118, 24, 'gallery/01K9P6T7Z7M0QBX5F736S9MHKH.webp', '4', NULL, 3, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(119, 24, 'gallery/01K9P6T7ZMK914WA82WA8NR983.webp', '5', NULL, 4, '2025-11-10 00:51:22', '2025-11-10 00:51:22'),
(120, 25, 'gallery/01K9PB35PER9AE9JFJHS6HXR18.webp', '2', NULL, 1, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(121, 25, 'gallery/01K9PB35PKDF9ZGGGZ2285ZZ1G.webp', '3', NULL, 2, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(122, 25, 'gallery/01K9PB35QGRC6BFPEVG4TGJGPC.webp', '4', NULL, 3, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(123, 25, 'gallery/01K9PB35RAGKE62K386EK80ET6.webp', '5', NULL, 4, '2025-11-10 02:06:09', '2025-11-10 02:06:09'),
(124, 26, 'gallery/01K9PF416NGGGNEEHN7M9G0BMR.webp', '1', NULL, 1, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(125, 26, 'gallery/01K9PF416TN2VGRPC0FT4FMBZ6.webp', '2', NULL, 2, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(126, 26, 'gallery/01K9PF416X81K91WX7JSJJEJJT.webp', '3', NULL, 3, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(127, 26, 'gallery/01K9PF4170XQ9DM1TSW98QZ6XK.webp', '4', NULL, 4, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(128, 26, 'gallery/01K9PF4173V49J6RTHYYQ7037H.webp', '5', NULL, 5, '2025-11-10 03:16:31', '2025-11-10 03:16:31'),
(129, 27, 'gallery/01K9PHWG600M27H736504X1XXC.jfif', '1', NULL, 1, '2025-11-10 04:04:50', '2025-11-10 04:04:50'),
(130, 27, 'gallery/01K9PHWG80Z9ZQVG1HE61Q5X56.jfif', '2', NULL, 2, '2025-11-10 04:04:50', '2025-11-10 04:04:50'),
(131, 27, 'gallery/01K9PHWG86FQ9JZGDX31CRBZ9Y.jfif', '3', NULL, 3, '2025-11-10 04:04:50', '2025-11-10 04:04:50'),
(132, 27, 'gallery/01K9PHWG8D5XF0XKXVXTNKYPJ1.jfif', '4', NULL, 4, '2025-11-10 04:04:50', '2025-11-10 04:04:50'),
(133, 27, 'gallery/01K9PHWG8HBT68PE8WZ65B2N1D.jfif', '5', NULL, 5, '2025-11-10 04:04:50', '2025-11-10 04:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `package_package_section`
--

CREATE TABLE `package_package_section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_section_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_package_section`
--

INSERT INTO `package_package_section` (`id`, `package_section_id`, `package_id`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, '2025-11-10 00:37:28', '2025-11-10 00:37:28'),
(2, 1, 1, 0, '2025-11-10 00:37:28', '2025-11-10 00:37:28'),
(3, 1, 25, 0, '2025-11-10 02:13:16', '2025-11-10 02:13:16'),
(4, 1, 4, 0, '2025-11-10 02:22:43', '2025-11-10 02:22:43'),
(5, 1, 5, 0, '2025-11-10 02:22:43', '2025-11-10 02:22:43'),
(6, 1, 6, 0, '2025-11-10 02:22:43', '2025-11-10 02:22:43'),
(7, 1, 3, 0, '2025-11-10 02:22:43', '2025-11-10 02:22:43'),
(8, 1, 7, 0, '2025-11-10 02:22:43', '2025-11-10 02:22:43'),
(9, 1, 8, 0, '2025-11-10 02:22:43', '2025-11-10 02:22:43'),
(10, 2, 5, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(11, 2, 9, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(12, 2, 11, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(13, 2, 12, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(14, 2, 13, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(15, 2, 16, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(16, 2, 17, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(17, 2, 18, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(18, 2, 19, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(19, 2, 20, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(20, 2, 21, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(21, 2, 22, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(22, 2, 3, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(23, 2, 24, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40'),
(24, 2, 6, 0, '2025-11-10 03:24:40', '2025-11-10 03:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `package_sections`
--

CREATE TABLE `package_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_image_alt` varchar(200) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `section_icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_sections`
--

INSERT INTO `package_sections` (`id`, `title`, `slug`, `description`, `banner_image`, `banner_image_alt`, `position`, `status`, `meta_title`, `meta_description`, `section_icon`, `created_at`, `updated_at`) VALUES
(1, 'Exotic Kashmir', 'exotic-kashmir', '<p>Book your Kashmir tour package now and experience unforgettable moments in Paradise on Earth.<br><br></p>', 'section-banners/01K9M0PWPCGSDRQK2NP0X3AXR3.jpg', '3-night-4-days-kashmir-tour', 0, 'active', '3-night-4-days-kashmir-tour', '3-night-4-days-kashmir-tour', NULL, '2025-11-09 17:56:12', '2025-11-09 17:56:12'),
(2, 'NorthEast Tour', 'northeast-tour', '<p>NorthEast Tour&nbsp;</p>', 'section-banners/01K9PFJYJXR589ZYZWYB76GYAH.png', 'banner', 2, 'active', 'NorthEast Tour', 'Discover  NorthEast Tour with PP The Travellers tour packages. Enjoy scenic vistas, lush hills, and cultural treasures. Book your Goa tour package now.', NULL, '2025-11-10 03:24:40', '2025-11-10 03:24:40');

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
-- Table structure for table `related_packages`
--

CREATE TABLE `related_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `related_package_id` bigint(20) UNSIGNED NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bwak0kai8EvyPLW2SMYG3t5ZDUtoZekGzc51sX3B', NULL, '192.168.0.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2xyNERIQllDeDVYdHRsdnh4cmVvM204RkNCTmJJNUd1SXpKa3NTViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4LjAuMTIyOjgwMDAiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1762777618),
('GNYbPkmRN55WaX5vjPYLMbcYDfhAjeFu5AnGqqYZ', 1, '192.168.0.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVkVTWEFxa0dsY1RUTEczSHFqYW9GMTE3c2dXek9WUkpnVDlCdFNROCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vMTkyLjE2OC4wLjEyMjo4MDAwL2FkbWluL3BhY2thZ2VzIjtzOjU6InJvdXRlIjtzOjM5OiJmaWxhbWVudC5hZG1pbi5yZXNvdXJjZXMucGFja2FnZXMuaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkVTFIYk5yc2oxRmFYam83VVhXZTByZURvcVVzV0p4emYxaDRCaFYxeTRSbmVIV3lLcmxteWkiO30=', 1762777656),
('p9WZfrPp40eRFAVVFMtegSQIQ6JKGS5i3XUStYym', 1, '192.168.0.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiZ3pvck1vdW44M0tCbjR4RGdTME9RNmRpcG1RT3JEOVZsbWhycXd1ciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4LjAuMTIyOjgwMDAiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkVTFIYk5yc2oxRmFYam83VVhXZTByZURvcVVzV0p4emYxaDRCaFYxeTRSbmVIV3lLcmxteWkiO3M6ODoiZmlsYW1lbnQiO2E6MDp7fXM6NjoidGFibGVzIjthOjE6e3M6MjE6Ikxpc3RQYWNrYWdlc19wZXJfcGFnZSI7czozOiJhbGwiO319', 1762775201);

-- --------------------------------------------------------

--
-- Table structure for table `tour_types`
--

CREATE TABLE `tour_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_types`
--

INSERT INTO `tour_types` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Domestic', 'domestic', 'Explore the World, One Adventure at a Time\n\n', 'active', '2025-11-08 20:05:49', '2025-11-08 20:05:49'),
(2, 'internationals', 'internationals', 'Explore the World, One Adventure at a Time\n\n', 'active', '2025-11-08 20:06:50', '2025-11-08 20:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `url_redirects`
--

CREATE TABLE `url_redirects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `old_url` varchar(255) NOT NULL,
  `old_slug` varchar(200) DEFAULT NULL,
  `new_url` varchar(255) NOT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `destination_id` bigint(20) UNSIGNED DEFAULT NULL,
  `redirect_type` enum('301','302','307') NOT NULL DEFAULT '301',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$U1HbNrsj1FaXjo7UXWe0reDoqUsWJxzf1h4BhV1y4RneHWyKrlmyi', NULL, NULL, '2025-11-08 20:01:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `destinations_slug_unique` (`slug`),
  ADD KEY `destinations_slug_index` (`slug`),
  ADD KEY `destinations_tour_type_id_index` (`tour_type_id`),
  ADD KEY `destinations_status_index` (`status`),
  ADD KEY `destinations_featured_index` (`featured`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_package_id_index` (`package_id`),
  ADD KEY `faqs_destination_id_index` (`destination_id`),
  ADD KEY `faqs_sort_order_index` (`sort_order`);

--
-- Indexes for table `itinerary_days`
--
ALTER TABLE `itinerary_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_days_package_id_index` (`package_id`),
  ADD KEY `itinerary_days_day_number_index` (`day_number`),
  ADD KEY `itinerary_days_sort_order_index` (`sort_order`);

--
-- Indexes for table `itinerary_places`
--
ALTER TABLE `itinerary_places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_places_itinerary_day_id_index` (`itinerary_day_id`),
  ADD KEY `itinerary_places_destination_id_index` (`destination_id`),
  ADD KEY `itinerary_places_sort_order_index` (`sort_order`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packages_slug_unique` (`slug`),
  ADD KEY `packages_slug_index` (`slug`),
  ADD KEY `packages_tour_type_id_index` (`tour_type_id`),
  ADD KEY `packages_destination_id_index` (`destination_id`),
  ADD KEY `packages_status_index` (`status`),
  ADD KEY `packages_featured_index` (`featured`);

--
-- Indexes for table `package_gallery`
--
ALTER TABLE `package_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_gallery_package_id_index` (`package_id`),
  ADD KEY `package_gallery_sort_order_index` (`sort_order`);

--
-- Indexes for table `package_package_section`
--
ALTER TABLE `package_package_section`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_package_section_package_section_id_package_id_unique` (`package_section_id`,`package_id`),
  ADD KEY `package_package_section_package_section_id_index` (`package_section_id`),
  ADD KEY `package_package_section_package_id_index` (`package_id`);

--
-- Indexes for table `package_sections`
--
ALTER TABLE `package_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_sections_title_unique` (`title`),
  ADD UNIQUE KEY `package_sections_slug_unique` (`slug`),
  ADD KEY `package_sections_slug_index` (`slug`),
  ADD KEY `package_sections_position_index` (`position`),
  ADD KEY `package_sections_status_index` (`status`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `related_packages`
--
ALTER TABLE `related_packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `related_packages_package_id_related_package_id_unique` (`package_id`,`related_package_id`),
  ADD KEY `related_packages_package_id_index` (`package_id`),
  ADD KEY `related_packages_related_package_id_index` (`related_package_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tour_types`
--
ALTER TABLE `tour_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tour_types_name_unique` (`name`),
  ADD UNIQUE KEY `tour_types_slug_unique` (`slug`),
  ADD KEY `tour_types_slug_index` (`slug`),
  ADD KEY `tour_types_status_index` (`status`);

--
-- Indexes for table `url_redirects`
--
ALTER TABLE `url_redirects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url_redirects_old_url_unique` (`old_url`),
  ADD KEY `url_redirects_package_id_foreign` (`package_id`),
  ADD KEY `url_redirects_destination_id_foreign` (`destination_id`),
  ADD KEY `url_redirects_old_url_index` (`old_url`),
  ADD KEY `url_redirects_new_url_index` (`new_url`),
  ADD KEY `url_redirects_status_index` (`status`);

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
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=521;

--
-- AUTO_INCREMENT for table `itinerary_days`
--
ALTER TABLE `itinerary_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;

--
-- AUTO_INCREMENT for table `itinerary_places`
--
ALTER TABLE `itinerary_places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `package_gallery`
--
ALTER TABLE `package_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `package_package_section`
--
ALTER TABLE `package_package_section`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `package_sections`
--
ALTER TABLE `package_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `related_packages`
--
ALTER TABLE `related_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_types`
--
ALTER TABLE `tour_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `url_redirects`
--
ALTER TABLE `url_redirects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_tour_type_id_foreign` FOREIGN KEY (`tour_type_id`) REFERENCES `tour_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `faqs_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itinerary_days`
--
ALTER TABLE `itinerary_days`
  ADD CONSTRAINT `itinerary_days_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itinerary_places`
--
ALTER TABLE `itinerary_places`
  ADD CONSTRAINT `itinerary_places_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `itinerary_places_itinerary_day_id_foreign` FOREIGN KEY (`itinerary_day_id`) REFERENCES `itinerary_days` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `packages_tour_type_id_foreign` FOREIGN KEY (`tour_type_id`) REFERENCES `tour_types` (`id`);

--
-- Constraints for table `package_gallery`
--
ALTER TABLE `package_gallery`
  ADD CONSTRAINT `package_gallery_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_package_section`
--
ALTER TABLE `package_package_section`
  ADD CONSTRAINT `package_package_section_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_package_section_package_section_id_foreign` FOREIGN KEY (`package_section_id`) REFERENCES `package_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `related_packages`
--
ALTER TABLE `related_packages`
  ADD CONSTRAINT `related_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `related_packages_related_package_id_foreign` FOREIGN KEY (`related_package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `url_redirects`
--
ALTER TABLE `url_redirects`
  ADD CONSTRAINT `url_redirects_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `url_redirects_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
