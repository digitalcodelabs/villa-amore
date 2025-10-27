/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.6.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: villa_amore
-- ------------------------------------------------------
-- Server version	10.6.22-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `about_sections`
--

DROP TABLE IF EXISTS `about_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `about_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_sections`
--

LOCK TABLES `about_sections` WRITE;
/*!40000 ALTER TABLE `about_sections` DISABLE KEYS */;
INSERT INTO `about_sections` VALUES (1,'Welcome to Villa Amore','<p>At Villa Amore, hospitality is more than a service – it\'s our way of life. Set within a lovingly restored 400-year-old Tuscan villa, we, your hosts, welcome you as friends rather than guests. Our passion is sharing the simple joys of Tuscany – from the scent of rosemary and jasmine in the gardens to the golden sunsets over the hills – while ensuring your stay is as comfortable as it is unforgettable. Every experience is curated with warmth, attention to detail, and a genuine love for creating memories.</p>','Learn More','/about',1,'2025-10-23 08:07:18','2025-10-23 08:07:18');
/*!40000 ALTER TABLE `about_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_password_reset_tokens`
--

DROP TABLE IF EXISTS `admin_password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_password_reset_tokens`
--

LOCK TABLES `admin_password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `admin_password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Daniel','admin@example.com',NULL,'$2y$12$lzHUjLCfcvYIs27gEjdzQuFZvEiriAZlUCfEOVwmAEWj3LYUx04T2',NULL,'2025-10-21 11:42:27','2025-10-21 11:42:27');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('villaamore-cache-5c785c036466adea360111aa28563bfd556b5fba','i:8;',1761482917),('villaamore-cache-5c785c036466adea360111aa28563bfd556b5fba:timer','i:1761482917;',1761482917),('villaamore-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6','i:1;',1761576319),('villaamore-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer','i:1761576319;',1761576319);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Gallery','Discover the Beauty of Villa Amore',1,'2025-10-23 08:07:18','2025-10-23 08:07:18');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_images_gallery_id_order_index` (`gallery_id`,`order`),
  CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` VALUES (1,1,'galleries/01K8G90D2VR1JJA8SKV7HSQXP7.jpeg','Villa Exterior View',1,'2025-10-23 08:07:18','2025-10-26 10:48:32'),(2,1,'galleries/01K8G90D2WG8WCAPZ1TGC207Q2.jpeg','Luxury Bedroom',2,'2025-10-23 08:07:18','2025-10-26 10:48:32'),(3,1,'galleries/01K8G90D2WG8WCAPZ1TGC207Q3.jpeg','Swimming Pool',3,'2025-10-23 08:07:18','2025-10-26 10:48:32'),(4,1,'galleries/01K8G90D2XTVBZKY2K9TFSYYBD.jpeg','Elegant Dining Area',4,'2025-10-23 08:07:18','2025-10-26 10:48:32'),(5,1,'galleries/01K8G90D2XTVBZKY2K9TFSYYBE.jpeg','Garden & Terrace',5,'2025-10-23 08:07:18','2025-10-26 10:48:32'),(6,1,'galleries/01K8G90D2YEKS0TDHSEP4S04WF.jpeg','Spa & Wellness',6,'2025-10-23 08:07:18','2025-10-26 10:48:32'),(7,1,'galleries/01K8G90D2YEKS0TDHSEP4S04WG.jpeg','Tuscan Sunset View',7,'2025-10-23 08:07:18','2025-10-26 10:48:32'),(8,1,'galleries/01K8G90D2ZNBM4RY5RNJV9A92M.jpeg','Luxury Interior',8,'2025-10-23 08:07:18','2025-10-26 10:48:32');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_10_21_143406_create_admins_table',2),(5,'2025_10_21_174133_create_pages_table',3),(6,'2025_10_23_105736_create_page_modules_table',4),(7,'2025_10_23_105740_create_sliders_table',4),(8,'2025_10_23_105744_create_slider_slides_table',4),(9,'2025_10_23_105748_create_about_sections_table',4),(10,'2025_10_23_105752_create_galleries_table',4),(11,'2025_10_23_105756_create_gallery_images_table',4),(12,'2025_10_23_123706_create_testimonials_table',5),(13,'2025_10_23_123710_create_testimonial_items_table',5),(14,'2025_10_26_130059_add_show_in_navigation_to_pages_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_modules`
--

DROP TABLE IF EXISTS `page_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` bigint(20) unsigned NOT NULL,
  `module_type` varchar(255) NOT NULL,
  `module_id` bigint(20) unsigned NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_modules_page_id_order_index` (`page_id`,`order`),
  CONSTRAINT `page_modules_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_modules`
--

LOCK TABLES `page_modules` WRITE;
/*!40000 ALTER TABLE `page_modules` DISABLE KEYS */;
INSERT INTO `page_modules` VALUES (1,2,'App\\Models\\Slider',1,1,1,'2025-10-23 08:07:18','2025-10-23 10:08:00'),(2,2,'App\\Models\\AboutSection',1,2,1,'2025-10-23 08:07:18','2025-10-23 10:08:00'),(3,2,'App\\Models\\Gallery',1,3,1,'2025-10-23 08:07:18','2025-10-23 10:08:00'),(4,2,'App\\Models\\Testimonial',1,4,0,'2025-10-23 10:08:00','2025-10-23 13:41:37'),(5,2,'App\\Models\\Testimonial',1,4,1,'2025-10-23 13:41:53','2025-10-23 13:41:53');
/*!40000 ALTER TABLE `page_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `show_in_navigation` tinyint(1) NOT NULL DEFAULT 1,
  `navigation_order` int(11) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (2,'Home','home','<p>Welcome to Villa Amore - Your Luxury Tuscan Retreat</p>','Villa Amore - Luxury Tuscan Retreat','Experience the ultimate luxury retreat in the heart of Tuscany at Villa Amore. Book your unforgettable stay today.',NULL,1,0,0,'2025-10-23 08:02:43','2025-10-23 08:02:43','2025-10-26 11:02:04'),(3,'Book Your Stay','book','Book your stay at Villa Amore and experience luxury in the heart of Tuscany.','Book Your Stay - Villa Amore','Reserve your luxury accommodation at Villa Amore. Check availability and book your perfect Tuscan getaway.',NULL,1,1,1,'2025-10-23 08:02:43','2025-10-23 08:02:43','2025-10-26 11:02:04'),(4,'Retreats','retreats','Discover our exclusive retreats designed for wellness, creativity, and connection.','Retreats - Villa Amore','Join our transformative retreats at Villa Amore focusing on wellness, yoga, creativity, and personal growth.',NULL,1,1,2,'2025-10-23 08:02:43','2025-10-23 08:02:43','2025-10-26 11:02:04'),(5,'Cooking Experiences','cooking','Immerse yourself in authentic Tuscan cooking experiences with our expert chefs.','Tuscan Cooking Experiences - Villa Amore','Learn to cook authentic Italian cuisine in our hands-on cooking classes featuring traditional Tuscan recipes.',NULL,1,1,3,'2025-10-23 08:02:43','2025-10-23 08:02:43','2025-10-26 11:02:04'),(6,'Prosecco & Paint','prosecco','Unleash your creativity with our Prosecco & Paint sessions in the beautiful Tuscan gardens.','Prosecco & Paint - Villa Amore','Enjoy a relaxing painting session with prosecco in our stunning gardens. Perfect for groups and special occasions.',NULL,1,1,4,'2025-10-23 08:02:43','2025-10-23 08:02:43','2025-10-26 11:02:04'),(7,'Weddings & Events','weddings','Celebrate your special moments in the magical setting of Villa Amore.','Weddings & Events - Villa Amore','Host your dream wedding or special event at Villa Amore. Stunning venues, exceptional service, unforgettable memories.',NULL,1,1,5,'2025-10-23 08:02:43','2025-10-23 08:02:43','2025-10-26 11:02:04'),(8,'For Retreat Organizers','organizers','Host your retreat at Villa Amore and provide your guests with an unforgettable experience.','For Retreat Organizers - Villa Amore','Partner with Villa Amore to host your wellness or yoga retreat in our beautiful Tuscan villa.',NULL,1,1,6,'2025-10-23 08:02:43','2025-10-23 08:02:43','2025-10-26 11:02:04'),(9,'About Us','about','Learn about our story and passion for hospitality at Villa Amore.','About Us - Villa Amore','Discover the story behind Villa Amore, a lovingly restored 400-year-old Tuscan villa dedicated to exceptional hospitality.',NULL,1,1,7,'2025-10-23 08:02:43','2025-10-23 08:02:43','2025-10-26 11:02:04'),(10,'Contact','contact','<p>Get in touch with us to plan your perfect Tuscan experience.</p>','Contact Us - Villa Amore','Contact Villa Amore for inquiries, bookings, or any questions about your stay in Tuscany.',NULL,1,1,8,'2025-10-23 08:02:43','2025-10-23 08:02:43','2025-10-26 11:09:27');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_slides`
--

DROP TABLE IF EXISTS `slider_slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider_slides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slider_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slider_slides_slider_id_order_index` (`slider_id`,`order`),
  CONSTRAINT `slider_slides_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_slides`
--

LOCK TABLES `slider_slides` WRITE;
/*!40000 ALTER TABLE `slider_slides` DISABLE KEYS */;
INSERT INTO `slider_slides` VALUES (1,1,'Villa Amore','Your Luxury Escape','sliders/01K88GFXNNQH5YBX55C6HS1T9E.jpg','BOOK NOW','/book',1,1,'2025-10-23 08:07:18','2025-10-23 09:25:25'),(2,1,'Luxury Rooms','Experience Ultimate Comfort','sliders/01K88GFXNPRV9X11D15EF51THX.jpg','VIEW ROOMS','/book',2,1,'2025-10-23 08:07:18','2025-10-23 09:25:25'),(3,1,'Dining Experience','Savor Exquisite Cuisine','sliders/01K88GFXNQAWWQXTS8VK7AYHH6.jpg','EXPLORE MENU','/cooking',3,1,'2025-10-23 08:07:18','2025-10-23 09:25:25'),(4,1,'Spa & Wellness','Rejuvenate Your Senses','sliders/01K88GFXNRAJ6D9C630DGD1JEE.jpg','LEARN MORE','/retreats',4,0,'2025-10-23 08:07:18','2025-10-23 09:46:12');
/*!40000 ALTER TABLE `slider_slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'Homepage Hero Slider',1,'2025-10-23 08:07:18','2025-10-23 08:07:18');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial_items`
--

DROP TABLE IF EXISTS `testimonial_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonial_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `testimonial_id` bigint(20) unsigned NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_location` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonial_items_testimonial_id_order_index` (`testimonial_id`,`order`),
  CONSTRAINT `testimonial_items_testimonial_id_foreign` FOREIGN KEY (`testimonial_id`) REFERENCES `testimonials` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial_items`
--

LOCK TABLES `testimonial_items` WRITE;
/*!40000 ALTER TABLE `testimonial_items` DISABLE KEYS */;
INSERT INTO `testimonial_items` VALUES (1,1,'Our stay at Villa Amore was nothing short of magical. The attention to detail, the warmth of the hospitality, and the breathtaking views made this the perfect anniversary getaway. We felt like we were home, yet in paradise.','Sarah & Michael Johnson','New York, USA',5,1,1,'2025-10-23 09:39:51','2025-10-23 13:42:53'),(2,1,'From the moment we arrived, we were treated like family. The villa\'s historic charm combined with modern luxury created an unforgettable experience. The gardens, the food, the sunset views – everything was perfect. We can\'t wait to return!','Emma & James Thompson','London, UK',5,2,1,'2025-10-23 09:39:51','2025-10-23 10:03:09'),(3,1,'Villa Amore exceeded all our expectations. The hosts\' passion for hospitality shines through in every detail. The rooms are stunning, the location is perfect, and the personal touches made us feel truly special. This is luxury hospitality at its finest.','Marco & Giulia Rossi','Milan, Italy',5,3,1,'2025-10-23 09:39:51','2025-10-23 10:03:09'),(4,1,'We\'ve stayed at many luxury villas across Europe, but Villa Amore stands out. The combination of authentic Tuscan heritage, impeccable service, and genuine warmth creates something truly unique. The memories we made here will last a lifetime.','Sophie & Alexandre Dubois','Paris, France',5,4,1,'2025-10-23 09:39:51','2025-10-23 10:03:09');
/*!40000 ALTER TABLE `testimonial_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'What Our Guests Say',NULL,1,'2025-10-23 09:39:51','2025-10-23 10:12:21');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-27 17:00:12
