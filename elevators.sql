-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 11:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elevators`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `lk_states_countries`$$
CREATE DEFINER=`aitmisrc_elevators`@`localhost` PROCEDURE `lk_states_countries` ()   SELECT
	lk_state.id,
	lk_country.name_ar AS CountryAr,
    lk_country.name_en AS CountryEng,
    lk_state.name_ar  AS StateAr,
    lk_state.name_en AS StateEng
from lk_country
INNER JOIN lk_state
ON lk_country.id = lk_state.country_id$$

DROP PROCEDURE IF EXISTS `SP_EditCityByID`$$
CREATE DEFINER=`aitmisrc_elevators`@`localhost` PROCEDURE `SP_EditCityByID` (IN `cityId` INT)   select
	lk_city.id AS cityID,
    lk_city.name_ar AS cityAr,
    lk_city.name_en AS cityEng,
    lk_country.id AS countryID,
    lk_country.name_ar AS countryAr,
    lk_country.name_en AS countryEng,
    lk_state.id AS stateID,
    lk_state.name_ar AS stateAr,
    lk_state.name_en AS stateEng
from
	lk_country
    left outer JOIN lk_state
    ON lk_country.id = lk_state.country_id
    LEFT OUTER JOIN lk_city
    ON lk_state.id = lk_city.state_id
where lk_city.id = cityId$$

DROP PROCEDURE IF EXISTS `SP_GetAllOrders`$$
CREATE DEFINER=`aitmisrc_elevators`@`localhost` PROCEDURE `SP_GetAllOrders` ()   select 
	cart.id,
    cart.mount,
    cart.status,
    products.mainPhoto,
    products.name_ar,
    products.name_en,
    products.localPrice,
    products.forignPrice,
    users.name AS username
from cart
inner join products
ON cart.product_id = products.id
inner join users
on cart.user_id = users.id$$

DROP PROCEDURE IF EXISTS `SP_GetCities`$$
CREATE DEFINER=`aitmisrc_elevators`@`localhost` PROCEDURE `SP_GetCities` ()   select 
	lk_city.id,
    lk_city.name_ar,
    lk_city.name_en,
    lk_state.name_ar AS StateAr,
    lk_state.name_en AS StateEng,
    lk_country.name_ar AS CountryAr,
    lk_country.name_en AS CountryEng
FROM lk_city
    LEFT OUTER JOIN lk_state
    ON lk_state.id = lk_city.state_id
    LEFT OUTER JOIN lk_country
    ON lk_country.id = lk_state.country_id$$

DROP PROCEDURE IF EXISTS `SP_GetMyOrderByUserID`$$
CREATE DEFINER=`aitmisrc_elevators`@`localhost` PROCEDURE `SP_GetMyOrderByUserID` (IN `userId` INT)   select 
	cart.id,
    cart.mount,
    cart.status,
    cart.created_at,
    cart.updated_at,
    cart.replayDate,
    cart.replay,
    products.mainPhoto,
    products.name_ar,
    products.name_en,
    products.localPrice,
    products.forignPrice,
    users.name AS username
from cart
inner join products
ON cart.product_id = products.id
inner join users
on cart.user_id = users.id

where cart.user_id = userId$$

DROP PROCEDURE IF EXISTS `SP_GetOrderById`$$
CREATE DEFINER=`aitmisrc_elevators`@`localhost` PROCEDURE `SP_GetOrderById` (IN `cartId` INT)   select 
	cart.id,
    cart.mount,
    cart.status,
    cart.created_at,
    cart.updated_at,
    cart.replayDate,
    cart.replay,
    products.mainPhoto,
    products.name_ar,
    products.name_en,
    products.localPrice,
    products.forignPrice,
    users.name AS username
from cart
inner join products
ON cart.product_id = products.id
inner join users
on cart.user_id = users.id

where cart.id = cartId$$

DROP PROCEDURE IF EXISTS `SP_GetPricesByID`$$
CREATE DEFINER=`aitmisrc_elevators`@`localhost` PROCEDURE `SP_GetPricesByID` (IN `priceId` INT)   select 
	prices.id,
    prices.name,
    prices.address,
    prices.phone,
    prices.floorNum,
    prices.peopleNum,
    prices.doorsNum,
    prices.notes,
    prices.status,
    prices.replay,
    prices.created_at,
    prices.updated_at,
	lk_door_types.name_ar AS doorAr,
    lk_door_types.name_en AS doorEn,
    lk_elevator_types.name_ar AS elevatorAr,
    lk_elevator_types.name_en AS elevatorEn
from prices
left outer join lk_door_types
ON lk_door_types.id = prices.doorType_id

left outer join lk_elevator_types
ON lk_elevator_types.id = prices.elevatorType_id

where prices.id = priceId$$

DROP PROCEDURE IF EXISTS `SP_GetPricesData`$$
CREATE DEFINER=`aitmisrc_elevators`@`localhost` PROCEDURE `SP_GetPricesData` ()   select 
	prices.id,
    prices.name,
    prices.address,
    prices.phone,
    prices.floorNum,
    prices.peopleNum,
    prices.doorsNum,
    prices.notes,
    prices.status,
	lk_door_types.name_ar AS doorAr,
    lk_door_types.name_en AS doorEn,
    lk_elevator_types.name_ar AS elevatorAr,
    lk_elevator_types.name_en AS elevatorEn
from prices
left outer join lk_door_types
ON lk_door_types.id = prices.doorType_id

left outer join lk_elevator_types
ON lk_elevator_types.id = prices.elevatorType_id$$

DROP PROCEDURE IF EXISTS `SP_GetProductData`$$
CREATE DEFINER=`aitmisrc_elevators`@`localhost` PROCEDURE `SP_GetProductData` ()   select
	products.id,
    products.mainPhoto,
    products.mPhT_ar,
    products.name_ar,
    products.name_en,
    products.description_ar,
    products.description_en,
    products.code,
    products.productionYear,
    products.localPrice,
    products.forignPrice,
    
    lk_category.name_ar AS categoryAr,
    lk_category.name_en AS categoryEng,
    
    lk_design.name_ar AS designAr,
    lk_design.name_en AS designEng,
    
    lk_country.name_ar AS countryAr,
    lk_country.name_en AS countryEng,
    
    lk_type.name_ar AS typeAr,
    lk_type.name_en AS typeEng,
    
    lk_size.sizeNum,
    lk_size.unit,
    
    lk_model.name_ar AS modelAr,
    lk_model.name_en AS modelEng,
    
    lk_company.name_ar AS companyAr,
    lk_company.name_en AS companyEng

from products

LEFT OUTER JOIN lk_category
ON lk_category.id = products.cat_id

left outer join lk_design
ON lk_design.id = products.design_id

left outer join lk_country
ON lk_country.id = products.country_id

left outer JOIN lk_type
ON lk_type.id = products.type_id

left outer join lk_size
ON lk_size.id = products.size_id

left outer join lk_model
ON lk_model.id = products.model_id

left outer join lk_company
on lk_company.id = products.company_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `image`, `name_ar`, `name_en`, `description_ar`, `description_en`) VALUES
(1, '1656155404.jpg', 'عن الموقع', 'About website', 'لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل كتاب عينة. لقد صمد ليس فقط لخمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظل دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي مع إصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'hussien', 'hussien2392@gmail.com', '$2y$10$cmVb4msYUfx/PJ5EljcTk.1EKHUqiyde0CF8C6vkgdIsa3Dy6XL0m');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `mount` int(11) NOT NULL DEFAULT 1,
  `status` enum('0','1') NOT NULL,
  `replay` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `replayDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `mount`, `status`, `replay`, `created_at`, `updated_at`, `replayDate`) VALUES
(1, 1, 1, 5, '1', 'dfgfdg', '2023-01-08 11:50:38', '2023-01-08 12:06:32', '2023-01-08 12:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `replay` text DEFAULT NULL,
  `message` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `replay`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'df', 'hussiencode78@gmail.com', '12', 'xzczxc', 'df', '1', '2023-01-08 08:27:15', '2023-01-08 06:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `lk_category`
--

DROP TABLE IF EXISTS `lk_category`;
CREATE TABLE `lk_category` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_category`
--

INSERT INTO `lk_category` (`id`, `name_ar`, `name_en`) VALUES
(1, 'المصاعد', 'elevators'),
(2, 'الابواب', 'Doors'),
(3, 'الاكسسوارات', 'Accesorice');

-- --------------------------------------------------------

--
-- Table structure for table `lk_city`
--

DROP TABLE IF EXISTS `lk_city`;
CREATE TABLE `lk_city` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_city`
--

INSERT INTO `lk_city` (`id`, `name_ar`, `name_en`, `state_id`) VALUES
(1, 'المنصورة', 'Mansoura', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lk_company`
--

DROP TABLE IF EXISTS `lk_company`;
CREATE TABLE `lk_company` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_company`
--

INSERT INTO `lk_company` (`id`, `name_ar`, `name_en`) VALUES
(1, 'شركة 1', 'Company1'),
(2, 'الشركة 2', 'Company 2');

-- --------------------------------------------------------

--
-- Table structure for table `lk_country`
--

DROP TABLE IF EXISTS `lk_country`;
CREATE TABLE `lk_country` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_country`
--

INSERT INTO `lk_country` (`id`, `name_ar`, `name_en`) VALUES
(1, 'مصر', 'Egypt'),
(2, 'السودان', 'Sudan'),
(3, 'العراق', 'Iraq'),
(4, 'تونس', 'Tounis'),
(5, 'تونس', 'Tounis');

-- --------------------------------------------------------

--
-- Table structure for table `lk_design`
--

DROP TABLE IF EXISTS `lk_design`;
CREATE TABLE `lk_design` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_design`
--

INSERT INTO `lk_design` (`id`, `name_ar`, `name_en`) VALUES
(1, 'تصميم1', 'Design1'),
(2, 'التصميم2', 'design2'),
(3, 'التصميم 3', 'Design3');

-- --------------------------------------------------------

--
-- Table structure for table `lk_door_types`
--

DROP TABLE IF EXISTS `lk_door_types`;
CREATE TABLE `lk_door_types` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_door_types`
--

INSERT INTO `lk_door_types` (`id`, `name_ar`, `name_en`) VALUES
(1, 'نوع الباب الاول', 'Door Type first'),
(2, 'نوع الباب التاني', 'second Door Type');

-- --------------------------------------------------------

--
-- Table structure for table `lk_elevator_types`
--

DROP TABLE IF EXISTS `lk_elevator_types`;
CREATE TABLE `lk_elevator_types` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_elevator_types`
--

INSERT INTO `lk_elevator_types` (`id`, `name_ar`, `name_en`) VALUES
(1, 'نوع المصاعد الاول', 'first elevator type'),
(2, 'نوع المصعد الثاني', 'second elevators type');

-- --------------------------------------------------------

--
-- Table structure for table `lk_model`
--

DROP TABLE IF EXISTS `lk_model`;
CREATE TABLE `lk_model` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_model`
--

INSERT INTO `lk_model` (`id`, `name_ar`, `name_en`) VALUES
(1, 'الموديل 1', 'Model1'),
(2, 'الموديل 2', 'Model 2');

-- --------------------------------------------------------

--
-- Table structure for table `lk_product_files`
--

DROP TABLE IF EXISTS `lk_product_files`;
CREATE TABLE `lk_product_files` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title_ar` varchar(100) NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL,
  `extension` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `src` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_product_files`
--

INSERT INTO `lk_product_files` (`id`, `name`, `title_ar`, `title_en`, `description_ar`, `description_en`, `extension`, `product_id`, `src`) VALUES
(1, '1673181211.pdf', 'اسم الملف', 'file name', 'وصف الملف', 'file description', 'pdf', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lk_product_photos`
--

DROP TABLE IF EXISTS `lk_product_photos`;
CREATE TABLE `lk_product_photos` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `title_ar` varchar(100) NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_product_photos`
--

INSERT INTO `lk_product_photos` (`id`, `product_id`, `name`, `title_ar`, `title_en`, `description_ar`, `description_en`) VALUES
(1, 1, '1673180375.jpg', 'اسم الصورة', 'Photo Name', 'وصف الصورة', 'photo description');

-- --------------------------------------------------------

--
-- Table structure for table `lk_product_videos`
--

DROP TABLE IF EXISTS `lk_product_videos`;
CREATE TABLE `lk_product_videos` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `title_ar` varchar(100) NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL,
  `extension` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_product_videos`
--

INSERT INTO `lk_product_videos` (`id`, `product_id`, `name`, `title_ar`, `title_en`, `description_ar`, `description_en`, `extension`) VALUES
(1, 1, '1673180824.mp4', 'اسم الفيديو', 'video Name', 'وصف الفيديو', 'video description', 'mp4');

-- --------------------------------------------------------

--
-- Table structure for table `lk_size`
--

DROP TABLE IF EXISTS `lk_size`;
CREATE TABLE `lk_size` (
  `id` int(11) NOT NULL,
  `sizeNum` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_size`
--

INSERT INTO `lk_size` (`id`, `sizeNum`, `unit`) VALUES
(1, 50, 'cm');

-- --------------------------------------------------------

--
-- Table structure for table `lk_state`
--

DROP TABLE IF EXISTS `lk_state`;
CREATE TABLE `lk_state` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_state`
--

INSERT INTO `lk_state` (`id`, `name_ar`, `name_en`, `country_id`) VALUES
(1, 'القاهرة', 'Cairo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lk_type`
--

DROP TABLE IF EXISTS `lk_type`;
CREATE TABLE `lk_type` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lk_type`
--

INSERT INTO `lk_type` (`id`, `name_ar`, `name_en`) VALUES
(1, 'النوع الاول', 'first type'),
(2, 'النوع التاني', 'second type');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

DROP TABLE IF EXISTS `prices`;
CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `floorNum` int(11) NOT NULL,
  `peopleNum` int(11) NOT NULL,
  `doorsNum` int(11) NOT NULL,
  `doorType_id` int(11) NOT NULL,
  `elevatorType_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `replay` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `name`, `address`, `phone`, `floorNum`, `peopleNum`, `doorsNum`, `doorType_id`, `elevatorType_id`, `notes`, `status`, `replay`, `created_at`, `updated_at`) VALUES
(1, 'hussien', 'المنصورة-شارع الاوتوبيس القديم', '0504393978', 10, 5, 10, 1, 1, 'description', '1', 'تم الرد', '2023-01-08 11:18:26', '2023-01-08 11:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `mainPhoto` text NOT NULL,
  `mPhT_ar` varchar(100) NOT NULL,
  `mPhT_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `productionYear` int(11) NOT NULL,
  `localPrice` float NOT NULL,
  `forignPrice` float NOT NULL,
  `mPhD_ar` text NOT NULL,
  `mPhD_en` text NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL,
  `code` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `mainPhoto`, `mPhT_ar`, `mPhT_en`, `name_ar`, `name_en`, `productionYear`, `localPrice`, `forignPrice`, `mPhD_ar`, `mPhD_en`, `description_ar`, `description_en`, `code`, `cat_id`, `design_id`, `country_id`, `type_id`, `size_id`, `model_id`, `company_id`) VALUES
(1, '1673177045.jpg', 'باب', 'Door', 'المنتج الاول', 'Product 1', 2000, 3000, 100, 'وصف الصورة باب', 'Door Image Description', 'وصف المنتج', 'Description product', 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instegram` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `whatsapp`, `name_ar`, `name_en`, `address`, `facebook`, `twitter`, `instegram`, `email`) VALUES
(1, '01061093957', 'مصاعد الجمل', 'Gamal Elevators', 'المنصورة-شارع الاوتوبيس القديم', 'https://www.facebook.com/AITEgSolutions/', 'https://twitter.com/AdvancedIT1', 'https://www.ait-misr.com/ar/about-us/xbxbxcbxcb', 'info@ait-misr.com');

-- --------------------------------------------------------

--
-- Table structure for table `tel`
--

DROP TABLE IF EXISTS `tel`;
CREATE TABLE `tel` (
  `id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tel`
--

INSERT INTO `tel` (`id`, `phone`) VALUES
(1, '0504356025'),
(2, '0504393978');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'hussien', 'hussiencode78@gmail.com', '$2y$10$cmVb4msYUfx/PJ5EljcTk.1EKHUqiyde0CF8C6vkgdIsa3Dy6XL0m', '2023-01-07 10:36:31', '2023-01-07 10:36:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_category`
--
ALTER TABLE `lk_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_city`
--
ALTER TABLE `lk_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_company`
--
ALTER TABLE `lk_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_country`
--
ALTER TABLE `lk_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_design`
--
ALTER TABLE `lk_design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_door_types`
--
ALTER TABLE `lk_door_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_elevator_types`
--
ALTER TABLE `lk_elevator_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_model`
--
ALTER TABLE `lk_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_product_files`
--
ALTER TABLE `lk_product_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_product_photos`
--
ALTER TABLE `lk_product_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_product_videos`
--
ALTER TABLE `lk_product_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_size`
--
ALTER TABLE `lk_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_state`
--
ALTER TABLE `lk_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk_type`
--
ALTER TABLE `lk_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tel`
--
ALTER TABLE `tel`
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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lk_category`
--
ALTER TABLE `lk_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lk_city`
--
ALTER TABLE `lk_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lk_company`
--
ALTER TABLE `lk_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lk_country`
--
ALTER TABLE `lk_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lk_design`
--
ALTER TABLE `lk_design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lk_door_types`
--
ALTER TABLE `lk_door_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lk_elevator_types`
--
ALTER TABLE `lk_elevator_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lk_model`
--
ALTER TABLE `lk_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lk_product_files`
--
ALTER TABLE `lk_product_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lk_product_photos`
--
ALTER TABLE `lk_product_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lk_product_videos`
--
ALTER TABLE `lk_product_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lk_size`
--
ALTER TABLE `lk_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lk_state`
--
ALTER TABLE `lk_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lk_type`
--
ALTER TABLE `lk_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tel`
--
ALTER TABLE `tel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
