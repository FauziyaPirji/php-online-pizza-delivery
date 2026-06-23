-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2026 at 03:46 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzahouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `userName` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `joinDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userName`, `firstName`, `lastName`, `email`, `phone`, `password`, `photo`, `joinDate`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@example.com', '1234567890', 'admin123', 'female.jpg', '2024-10-27 12:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categorieId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `categorieName` varchar(21) NOT NULL,
  `categorieDesc` varchar(100) NOT NULL,
  `categoriePhoto` varchar(100) NOT NULL,
  `categorieCreateDate` datetime NOT NULL,
  PRIMARY KEY (`categorieId`),
  UNIQUE KEY `categorieName` (`categorieName`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorieId`, `categorieName`, `categorieDesc`, `categoriePhoto`, `categorieCreateDate`) VALUES
(1, 'VEG PIZZA', 'A delight for veggie lovers! Choose from our wide range of delicious vegetarian pizzas, its softer a', 'card-1.jpg', '2024-10-27 12:54:16'),
(2, 'NON-VEG PIZZA', 'Choose your favourite non-veg pizzas from the Dominos Pizza menu. Get fresh non-veg pizza with your ', 'card-2.jpg', '2024-10-27 13:10:38'),
(3, 'PIZZA MANIA', 'Indulge into mouth-watering taste of Pizza mania range, perfect answer to all your food cravings', 'card-3.jpg', '2024-10-27 13:11:13'),
(4, 'SIDES ORDERS', 'Complement your pizza with wide range of sides available at Dominos Pizza India', 'card-4.jpg', '2024-10-27 13:11:48'),
(5, 'BEVERAGES', 'Complement your pizza with wide range of beverages available at Dominos Pizza India', 'card-5.jpg', '2024-10-27 13:12:27'),
(6, 'CHOICE OF CRUSTS', 'Fresh Pan Pizza Tastiest Pan Pizza. ... Dominos freshly made pan-baked pizza, deliciously soft ,butt', 'card-6.jpg', '2024-10-27 13:13:25'),
(7, 'BURGER PIZZA', 'Dominos Pizza Introducing all new Burger Pizza with the tag line looks like a burger, tastes like a ', 'card-7.jpg', '2024-10-27 13:14:41'),
(8, 'CHOICE OF TOPPINGS', 'CHOICE OF TOPPINGS', 'card-8.jpg', '2024-10-27 13:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `userName` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `joinDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `userName`, `firstName`, `lastName`, `email`, `phone`, `password`, `photo`, `joinDate`) VALUES
(1, 'xyz', 'xyz', 'xyz', 'xyz@example.com', '1234567890', 'xyz123', 'customer1.png', '2024-10-27 12:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `orderId` int NOT NULL,
  `email` varchar(35) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `feedback` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`feedbackId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE IF NOT EXISTS `orderitems` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `orderId` int NOT NULL,
  `pizzaId` int NOT NULL,
  `itemQuantity` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderId`, `pizzaId`, `itemQuantity`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` bigint NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `amount` bigint NOT NULL,
  `paymentMode` enum('0','1') NOT NULL COMMENT '0=case delivery or 1=online',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL COMMENT '0=Order placed, 1=Order confirmed, 2=Preparing your order, 3=Your order is on the way, 4=Order Delivered, 5=Order denied, 6=Order cancelled',
  `OrderDate` datetime NOT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `OrderDate`) VALUES
(1, 1, 'abc, a', 380055, '1234567890', 99, '0', '0', '2026-04-30 13:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

DROP TABLE IF EXISTS `pizza`;
CREATE TABLE IF NOT EXISTS `pizza` (
  `pizzaId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `pizzaName` varchar(21) NOT NULL,
  `pizzaPrice` int NOT NULL,
  `pizzaDesc` text NOT NULL,
  `pizzaCategorieId` int NOT NULL,
  `pizzaPhoto` varchar(100) NOT NULL,
  `pizzaPubliceDate` datetime NOT NULL,
  PRIMARY KEY (`pizzaId`),
  UNIQUE KEY `pizzaName` (`pizzaName`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`pizzaId`, `pizzaName`, `pizzaPrice`, `pizzaDesc`, `pizzaCategorieId`, `pizzaPhoto`, `pizzaPubliceDate`) VALUES
(1, 'Margherita', 99, 'A hugely popular margherita, with a deliciously tangy single cheese topping', 1, 'pizza-1.jpg', '2024-10-27 13:17:14'),
(2, 'Double Cheese Margher', 199, 'The ever-popular Margherita - loaded with extra cheese... oodies of it', 1, 'pizza-2.jpg', '2024-10-27 13:17:53'),
(3, 'Farm House', 149, 'A pizza that goes ballistic on veggies! Check out this mouth watering overload of crunchy, crisp capsicum, succulent mushrooms and fresh tomatoes', 1, 'pizza-3.jpg', '2024-10-27 13:24:15'),
(4, 'Peppy Paneer', 249, 'Chunky paneer with crisp capsicum and spicy red pepper - quite a mouthful!', 1, 'pizza-4.jpg', '2024-10-27 13:27:15'),
(5, 'Mexican Green Wave', 149, 'A pizza loaded with crunchy onions, crisp capsicum, juicy tomatoes and jalapeno with a liberal sprinkling of exotic Mexican herbs.', 1, 'pizza-5.jpg', '2024-10-27 13:28:03'),
(6, 'Deluxe Veggie', 319, 'For a vegetarian looking for a BIG treat that goes easy on the spices, this ones got it all.. The onions, the capsicum, those delectable mushrooms - with paneer and golden corn to top it all.', 1, 'pizza-6.jpg', '2024-10-27 13:29:22'),
(7, 'Veg Extravaganza', 299, 'A pizza that decidedly staggers under an overload of golden corn, exotic black olives, crunchy onions, crisp capsicum, succulent mushrooms, juicyfresh tomatoes and jalapeno - with extra cheese to go all around.', 1, 'pizza-7.jpg', '2024-10-27 13:30:21'),
(8, 'Cheese N Corn', 199, 'Cheese I Golden Corn', 1, 'pizza-8.jpg', '2024-10-27 13:30:54'),
(9, 'PANEER MAKHANI', 219, 'Paneer and Capsicum on Makhani Sauce', 1, 'pizza-9.jpg', '2024-10-27 13:31:28'),
(10, 'VEGGIE PARADISE', 299, 'Goldern Corn, Black Olives, Capsicum & Red Paprika', 1, 'pizza-10.jpg', '2024-10-27 13:32:00'),
(11, 'FRESH VEGGIE', 149, 'Onion I Capsicum', 1, 'pizza-11.jpg', '2024-10-27 13:32:28'),
(12, 'Indi Tandoori Paneer', 349, 'It is hot. It is spicy. It is oh-so-Indian. Tandoori paneer with capsicum I red paprika I mint mayo', 1, 'pizza-12.jpg', '2024-10-27 13:33:08'),
(13, 'PEPPER BARBECUE CHICK', 199, 'Pepper Barbecue Chicken I Cheese', 2, 'pizza-13.jpg', '2024-10-27 13:33:41'),
(14, 'CHICKEN SAUSAGE', 249, 'Chicken Sausage I Cheese', 2, 'pizza-14.jpg', '2024-10-27 13:34:14'),
(15, 'Chicken Golden Deligh', 149, 'Mmm! Barbeque chicken with a topping of golden corn loaded with extra cheese. Worth its weight in gold!', 2, 'pizza-15.jpg', '2024-10-27 13:34:44'),
(16, 'Non Veg Supreme', 399, 'Bite into supreme delight of Black Olives, Onions, Grilled Mushrooms, Pepper BBQ Chicken, Peri-Peri Chicken, Grilled Chicken Rashers', 2, 'pizza-16.jpg', '2024-10-27 13:35:18'),
(17, 'Chicken Dominator', 319, 'Treat your taste buds with Double Pepper Barbecue Chicken, Peri-Peri Chicken, Chicken Tikka & Grilled Chicken Rashers', 2, 'pizza-17.jpg', '2024-10-27 13:35:56'),
(18, 'PEPPER BARBECUE & ONI', 249, 'Pepper Barbecue Chicken I Onion', 2, 'pizza-18.jpg', '2024-10-27 13:36:30'),
(19, 'CHICKEN FIESTA', 199, 'Grilled Chicken Rashers I Peri-Peri Chicken I Onion I Capsicum', 2, 'pizza-19.jpg', '2024-10-27 13:36:58'),
(20, 'Indi Chicken Tikka', 349, 'The wholesome flavour of tandoori masala with Chicken tikka I onion I red paprika I mint mayo', 2, 'pizza-20.jpg', '2024-10-27 13:37:33'),
(21, 'TOMATO', 99, 'Juicy tomato in a flavourful combination with cheese I tangy sauce', 3, 'pizza-21.jpg', '2024-10-27 13:38:10'),
(22, 'VEG LOADED', 149, 'Tomato | Grilled Mushroom |Jalapeno |Golden Corn | Beans in a fresh pan crust', 3, 'pizza-22.jpg', '2024-10-27 13:38:43'),
(23, 'CHEESY', 99, 'Orange Cheddar Cheese I Mozzarella', 3, 'pizza-23.jpg', '2024-10-27 13:39:15'),
(24, 'CAPSICUM', 99, 'Capsicum', 3, 'pizza-24.jpg', '2024-10-27 13:41:56'),
(25, 'ONION', 99, 'onion', 3, 'pizza-25.jpg', '2024-10-27 13:42:28'),
(26, 'GOLDEN CORN', 139, 'Golden Corn', 3, 'pizza-26.jpg', '2024-10-27 13:42:57'),
(27, 'PANEER & ONION', 149, 'Creamy Paneer | Onion', 3, 'pizza-27.jpg', '2024-10-27 13:44:04'),
(28, 'CHEESE N TOMATO', 149, 'A delectable combination of cheese and juicy tomato', 3, 'pizza-28.jpg', '2024-10-27 13:45:19'),
(29, 'Garlic Breadsticks', 99, 'The endearing tang of garlic in breadstics baked to perfection.', 4, 'pizza-29.jpg', '2024-10-27 13:45:55'),
(30, 'Stuffed Garlic Bread', 99, 'Freshly Baked Garlic Bread stuffed with mozzarella cheese, sweet corns & tangy and spicy jalapeños', 4, 'pizza-30.jpg', '2024-10-27 13:46:29'),
(31, 'Veg Pasta Italiano Wh', 99, 'Penne Pasta tossed with extra virgin olive oil, exotic herbs & a generous helping of new flavoured sauce.', 4, 'pizza-31.jpg', '2024-10-27 13:47:02'),
(32, 'Non Veg Pasta Italian', 99, 'Penne Pasta tossed with extra virgin olive oil, exotic herbs & a generous helping of new flavoured sauce.', 4, 'pizza-32.jpg', '2024-10-27 13:47:35'),
(33, 'Cheese Jalapeno Dip', 35, 'A soft creamy cheese dip spiced with jalapeno.', 4, 'pizza-33.jpg', '2024-10-27 13:49:04'),
(34, 'Cheese Dip', 35, 'A dreamy creamy cheese dip to add that extra tang to your snack.', 4, 'pizza-34.jpg', '2024-10-27 13:49:35'),
(35, 'Lava Cake', 99, 'Filled with delecious molten chocolate inside.', 4, 'pizza-35.jpg', '2024-10-27 13:50:07'),
(36, 'Butterscotch Mousse C', 149, 'A Creamy & Chocolaty indulgence with layers of rich, fluffy Butterscotch Cream and delicious Dark Chocolate Cake, topped with crunchy Dark Chocolate morsels - for a perfect dessert treat!', 4, 'pizza-36.jpg', '2024-10-27 13:50:59'),
(37, 'Lipton Ice Tea', 25, '250ml', 5, 'pizza-37.jpg', '2024-10-27 13:51:41'),
(38, 'Mirinda', 35, '500ml', 5, 'pizza-38.jpg', '2024-10-27 13:52:13'),
(39, 'PEPSI BLACK CAN', 45, 'PEPSI BLACK CAN', 5, 'pizza-39.jpg', '2024-10-27 13:52:45'),
(40, 'Pepsi', 52, '500ml', 5, 'pizza-40.jpg', '2024-10-27 13:53:25'),
(41, '7Up', 52, '500ml', 5, 'pizza-41.jpg', '2024-10-27 13:54:21'),
(42, 'Cheese Burst', 149, 'Crust with oodles of yummy liquid cheese filled inside.', 6, 'pizza-42.jpg', '2024-10-27 13:54:54'),
(43, 'Classic Hand Tossed', 249, 'Dominos traditional hand stretched crust, crisp on outside, soft & light inside.', 6, 'pizza-43.jpg', '2024-10-27 13:55:26'),
(44, 'Wheat Thin Crust', 299, 'Presenting the light healthier and delicious light wheat thin crust from Dominos.', 6, 'pizza-44.jpg', '2024-10-27 13:56:09'),
(46, 'Fresh Pan Pizza', 299, 'Tastiest Pan Pizza.Ever. Dominos freshly made pan-baked pizza, deliciously soft ,buttery,extra cheesy and delightfully crunchy.', 6, 'pizza-45.jpg', '2024-10-27 13:58:47'),
(48, 'New Hand Tossed', 299, 'Classic Dominos crust. Fresh, hand stretched.', 6, 'pizza-46.jpg', '2024-10-27 14:00:42'),
(49, 'BURGER PIZZA- CLASSIC', 129, 'Bite into delight! Witness the epic combination of pizza and burger with our classic Burger Pizza, that looks good and tastes great!', 7, 'pizza-47.jpg', '2024-10-27 14:01:26'),
(50, 'BURGER PIZZA- PREMIUM', 139, 'The good just got better! Treat yourself to the premium taste of the Burger Pizza, that looks good and tastes great with paneer and red paprika.', 7, 'pizza-48.jpg', '2024-10-27 14:02:09'),
(51, 'BURGER PIZZA-  NON VE', 149, 'For all the meat cravers, try the classic non-veg Burger Pizza loaded with the goodness of burger and the greatness of pizza.', 7, 'pizza-49.jpg', '2024-10-27 14:03:28'),
(52, 'Extra Cheese', 35, 'Extra Cheese', 8, 'pizza-50.jpg', '2024-10-27 14:04:02'),
(53, 'veg toppings', 55, 'Black Olives, Crisp Capsicum, Paneer, Mushroom, Golden Corn, Fresh Tomato, Jalapeno, Red Pepper & Babycorn.', 8, 'pizza-51.jpg', '2024-10-27 14:04:36'),
(54, 'Non Veg Toppings', 55, 'Barbeque Chicken, Hot Spicy Chicken,Chunky Chicken and Chicken Salami.', 8, 'pizza-52.jpg', '2024-10-27 14:05:13'),
(55, 'Packaged Drinking Wat', 20, 'Drinking Water', 5, 'pizza-53.jpg', '2024-10-27 14:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `sitedetails`
--

DROP TABLE IF EXISTS `sitedetails`;
CREATE TABLE IF NOT EXISTS `sitedetails` (
  `tempId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `systemName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact1` varchar(15) NOT NULL,
  `contact2` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dateTime` datetime NOT NULL,
  PRIMARY KEY (`tempId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sitedetails`
--

INSERT INTO `sitedetails` (`tempId`, `systemName`, `email`, `contact1`, `contact2`, `address`, `dateTime`) VALUES
(1, 'pizza house', 'pizzahouse@gmail.com', '1234567890', '0987654321', 'Ahmedabad', '2024-10-27 14:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

DROP TABLE IF EXISTS `viewcart`;
CREATE TABLE IF NOT EXISTS `viewcart` (
  `cartItemId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `pizzaId` int NOT NULL,
  `itemQuantity` bigint NOT NULL,
  `userId` int NOT NULL,
  `addedDate` datetime NOT NULL,
  PRIMARY KEY (`cartItemId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
