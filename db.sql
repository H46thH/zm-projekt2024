-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Erstellungszeit: 26. Dez 2024 um 15:30
-- Server-Version: 10.11.8-MariaDB-ubu2204-log
-- PHP-Version: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `cart`
--

INSERT INTO `cart` (`cart_id`, `productId`, `user_id`) VALUES
(12, 363, 363),
(63, 366, 14),
(66, 363, 14);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Clothes'),
(2, 'Electronics'),
(3, 'furniture'),
(4, 'Shoes'),
(5, 'Miscellaneous');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `sold` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `history`
--

INSERT INTO `history` (`id`, `user_id`, `product_id`, `sold`) VALUES
(86, 18, 363, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `buyer_seen` tinyint(1) DEFAULT NULL,
  `seller_seen` tinyint(1) DEFAULT NULL,
  `sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `notifications`
--

INSERT INTO `notifications` (`id`, `seller_id`, `buyer_id`, `product_id`, `status`, `buyer_seen`, `seller_seen`, `sold`) VALUES
(40, 15, 18, 363, 5, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `person`
--

CREATE TABLE `person` (
  `id_person` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `review` int(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `area_code` int(255) DEFAULT NULL,
  `payment_form` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `person`
--

INSERT INTO `person` (`id_person`, `first_name`, `review`, `email`, `password`, `picture`, `last_name`, `address`, `town`, `area_code`, `payment_form`) VALUES
(1, 'Max', 4, 'maxmuster@gmail.com', '12345', '', 'Mustermann', '', '', NULL, NULL),
(3, 'maria', NULL, 'maria@gmail.com', '12345', NULL, '', '', '', NULL, NULL),
(6, 'test', 1, 'test@gmail.com', '12345', NULL, 'test', 'Test123', 'Mosbach', 74821, 1),
(7, 'test', NULL, 'test2@gmail.com', '12345', NULL, 'test2', '', '', NULL, NULL),
(8, 'test3', NULL, 'test3@gmail.com', '12345', NULL, 'test', '', '', NULL, NULL),
(9, 'Antigona', 3, 'anti@gmail.com', '12345', NULL, 'Cunaj', NULL, NULL, NULL, NULL),
(10, 'Elinda', 3, 'elinda@gmail.com', '12345', NULL, 'Avdiu', 'Test', 'Test', 12313, 1),
(12, 'monica', 3, 'monica@gmail.com', '$2y$10$8yOTlGI6qx0W9kIglrDCPuKDaCOD.KaBdQ.6XAsFtc46Cv8Lsjmji', NULL, 'vizante', NULL, NULL, NULL, NULL),
(13, 'reghina', 3, 're@gmail.com', '$2y$10$lnk9aHC1tAQLiowiRsBuhuqRALXMQWpYZjgn6iVXKd2ZpVejVQ8NC', NULL, 'vizante', NULL, NULL, NULL, NULL),
(14, 'eve', 3, 'eve@gmail.com', '$2y$10$EqM/8cMfa8KRhNS8yG1JL.WmP7jmaML6yJUWwfcR7rDcVXt6epYzW', NULL, 'eve', NULL, NULL, NULL, NULL),
(15, 'monica', 4, 'monica.vizante@gmail.com', '$2y$10$4OfT2JCskXTtNZgYPWuSjuKdguuN7QZe.RfNWS/s4TIWdwZb4KJzi', NULL, 'vizante', 'dkwhdkj', 'djhqgjdh', 3232, 1),
(16, 'dewhhu', 3, 'g@gmail.com', '$2y$10$gjgVIkG.zzy.zCEY4dKZU.VIoG/l5g0KA.hNE/f.8xkPHTakjjd92', NULL, 'jdjwh', NULL, NULL, NULL, NULL),
(17, 'Reghina', 3, 'reghina@gmail.com', '$2y$10$qsoGlTEDTLv7PzlFosD.v.eVAbPfaRCG5rVREpQZ/3NZcOvJNxkdC', NULL, 'Vizante', 'Fkjekj', 'eoudilw', 123234, 1),
(18, 'Eveline', 3, 'eveline@gmail.com', '$2y$10$Jc7aP8ZAC0KVsTt5uLcMmumpIXF0Fy4UNGBNJ7DdGXXJT4pUOa8Mu', NULL, 'Vizante', 'test', 'test', 112345, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `categoryId` int(255) NOT NULL,
  `image` varchar(1025) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `categoryName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `person_id` int(255) DEFAULT NULL,
  `buyer_id` int(11) NOT NULL,
  `status_product` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `description`, `price`, `categoryId`, `image`, `name`, `categoryName`, `person_id`, `buyer_id`, `status_product`) VALUES
(363, 'Elevate your casual wardrobe with our Classic Black Hooded Sweatshirt. Made from high-quality, soft fabric that ensures comfort and durability, this hoodie features a spacious kangaroo pocket and an adjustable drawstring hood. Its versatile design makes it perfect for a relaxed day at home or a casual outing.', 79, 1, 'https://i.imgur.com/cSytoSD.jpeg', 'Classic Black Hooded Sweatshirt', 'Clothes', 15, 18, 1),
(364, 'Experience the perfect blend of comfort and style with our Classic Comfort Drawstring Joggers. Designed for a relaxed fit, these joggers feature a soft, stretchable fabric, convenient side pockets, and an adjustable drawstring waist with elegant gold-tipped detailing. Ideal for lounging or running errands, these pants will quickly become your go-to for effortless, casual wear.', 79, 1, 'https://i.imgur.com/mp3rUty.jpeg', 'Classic Comfort Drawstring Joggers', 'Clothes', 15, 15, 1),
(365, 'Experience ultimate comfort with our red jogger sweatpants, perfect for both workout sessions and lounging around the house. Made with soft, durable fabric, these joggers feature a snug waistband, adjustable drawstring, and practical side pockets for functionality. Their tapered design and elastic cuffs offer a modern fit that keeps you looking stylish on the go.', 98, 1, 'https://i.imgur.com/9LFjwpI.jpeg', 'Classic Red Jogger Sweatpants', 'Clothes', 15, 2, 0),
(366, 'Step out in style with this sleek navy blue baseball cap. Crafted from durable material, it features a smooth, structured design and an adjustable strap for the perfect fit. Protect your eyes from the sun and complement your casual looks with this versatile and timeless accessory.', 61, 1, 'https://i.imgur.com/R3iobJA.jpeg', 'Classic Navy Blue Baseball Cap', 'Clothes', 15, 0, 0),
(367, 'Top off your casual look with our Classic Blue Baseball Cap, made from high-quality materials for lasting comfort. Featuring a timeless six-panel design with a pre-curved visor, this adjustable cap offers both style and practicality for everyday wear.', 86, 1, 'https://i.imgur.com/wXuQ7bm.jpeg', 'Classic Blue Baseball Cap', 'Clothes', 15, 2, 0),
(368, 'Elevate your casual wardrobe with this timeless red baseball cap. Crafted from durable fabric, it features a comfortable fit with an adjustable strap at the back, ensuring one size fits all. Perfect for sunny days or adding a sporty touch to your outfit.', 35, 1, 'https://i.imgur.com/cBuLvBi.jpeg', 'Classic Red Baseball Cap', 'Clothes', 15, 0, 0),
(369, 'Elevate your casual wear with this timeless black baseball cap. Made with high-quality, breathable fabric, it features an adjustable strap for the perfect fit. Whether you’re out for a jog or just running errands, this cap adds a touch of style to any outfit.', 58, 1, 'https://i.imgur.com/KeqG6r4.jpeg', 'Classic Black Baseball Cap', 'Clothes', 15, 0, 0),
(370, 'Elevate your casual wardrobe with these classic olive chino shorts. Designed for comfort and versatility, they feature a smooth waistband, practical pockets, and a tailored fit that makes them perfect for both relaxed weekends and smart-casual occasions. The durable fabric ensures they hold up throughout your daily activities while maintaining a stylish look.', 84, 1, 'https://i.imgur.com/UsFIvYs.jpeg', 'Classic Olive Chino Shorts', 'Clothes', 15, 0, 0),
(371, 'Stay comfortable and stylish with our Classic High-Waisted Athletic Shorts. Designed for optimal movement and versatility, these shorts are a must-have for your workout wardrobe. Featuring a figure-flattering high waist, breathable fabric, and a secure fit that ensures they stay in place during any activity, these shorts are perfect for the gym, running, or even just casual wear.', 43, 1, 'https://i.imgur.com/eGOUveI.jpeg', 'Classic High-Waisted Athletic Shorts', 'Clothes', 15, 17, 1),
(372, 'Elevate your basics with this versatile white crew neck tee. Made from a soft, breathable cotton blend, it offers both comfort and durability. Its sleek, timeless design ensures it pairs well with virtually any outfit. Ideal for layering or wearing on its own, this t-shirt is a must-have staple for every wardrobe.', 39, 1, 'https://i.imgur.com/axsyGpD.jpeg', 'Classic White Crew Neck T-Shirt', 'Clothes', 15, 0, 0),
(373, 'Elevate your everyday wardrobe with our Classic White Tee. Crafted from premium soft cotton material, this versatile t-shirt combines comfort with durability, perfect for daily wear. Featuring a relaxed, unisex fit that flatters every body type, it\'s a staple piece for any casual ensemble. Easy to care for and machine washable, this white tee retains its shape and softness wash after wash. Pair it with your favorite jeans or layer it under a jacket for a smart look.', 73, 1, 'https://i.imgur.com/Y54Bt8J.jpeg', 'Classic White Tee - Timeless Style and Comfort', 'Clothes', 15, 0, 0),
(374, 'Elevate your everyday style with our Classic Black T-Shirt. This staple piece is crafted from soft, breathable cotton for all-day comfort. Its versatile design features a classic crew neck and short sleeves, making it perfect for layering or wearing on its own. Durable and easy to care for, it\'s sure to become a favorite in your wardrobe.', 35, 1, 'https://i.imgur.com/9DqEOV5.jpeg', 'Classic Black T-Shirt', 'Clothes', 15, 2, 1),
(375, 'Elevate your gaming experience with this state-of-the-art wireless controller, featuring a crisp white base with vibrant orange accents. Designed for precision play, the ergonomic shape and responsive buttons provide maximum comfort and control for endless hours of gameplay. Compatible with multiple gaming platforms, this controller is a must-have for any serious gamer looking to enhance their setup.', 69, 2, 'https://i.imgur.com/ZANVnHE.jpeg', 'Sleek White & Orange Wireless Gaming Controller', 'Electronics', 15, 2, 1),
(376, 'Experience the fusion of style and sound with this sophisticated audio set featuring a pair of sleek, white wireless headphones offering crystal-clear sound quality and over-ear comfort. The set also includes a set of durable earbuds, perfect for an on-the-go lifestyle. Elevate your music enjoyment with this versatile duo, designed to cater to all your listening needs.', 44, 2, 'https://i.imgur.com/yVeIeDa.jpeg', 'Sleek Wireless Headphone & Inked Earbud Set', 'Electronics', 15, 2, 0),
(377, 'Experience superior sound quality with our Sleek Comfort-Fit Over-Ear Headphones, designed for prolonged use with cushioned ear cups and an adjustable, padded headband. Ideal for immersive listening, whether you\'re at home, in the office, or on the move. Their durable construction and timeless design provide both aesthetically pleasing looks and long-lasting performance.', 28, 2, 'https://i.imgur.com/SolkFEB.jpeg', 'Sleek Comfort-Fit Over-Ear Headphones', 'Electronics', 15, 0, 0),
(378, 'Enhance your morning routine with our sleek 2-slice toaster, featuring adjustable browning controls and a removable crumb tray for easy cleaning. This compact and stylish appliance is perfect for any kitchen, ensuring your toast is always golden brown and delicious.', 48, 2, 'https://i.imgur.com/keVCVIa.jpeg', 'Efficient 2-Slice Toaster', 'Electronics', 15, 0, 0),
(379, 'Experience smooth and precise navigation with this modern wireless mouse, featuring a glossy finish and a comfortable ergonomic design. Its responsive tracking and easy-to-use interface make it the perfect accessory for any desktop or laptop setup. The stylish blue hue adds a splash of color to your workspace, while its compact size ensures it fits neatly in your bag for on-the-go productivity.', 10, 2, 'https://i.imgur.com/w3Y8NwQ.jpeg', 'Sleek Wireless Computer Mouse', 'Electronics', 15, 0, 0),
(380, 'Experience next-level computing with our ultra-slim laptop, featuring a stunning display illuminated by ambient lighting. This high-performance machine is perfect for both work and play, delivering powerful processing in a sleek, portable design. The vibrant colors add a touch of personality to your tech collection, making it as stylish as it is functional.', 43, 2, 'https://i.imgur.com/OKn1KFI.jpeg', 'Sleek Modern Laptop with Ambient Lighting', 'Electronics', 15, 0, 0),
(381, 'Experience cutting-edge technology and elegant design with our latest laptop model. Perfect for professionals on-the-go, this high-performance laptop boasts a powerful processor, ample storage, and a long-lasting battery life, all encased in a lightweight, slim frame for ultimate portability. Shop now to elevate your work and play.', 97, 2, 'https://i.imgur.com/ItHcq7o.jpeg', 'Sleek Modern Laptop for Professionals', 'Electronics', 15, 0, 0),
(382, 'Immerse yourself in superior sound quality with these sleek red and silver over-ear headphones. Designed for comfort and style, the headphones feature cushioned ear cups, an adjustable padded headband, and a detachable red cable for easy storage and portability. Perfect for music lovers and audiophiles who value both appearance and audio fidelity.', 39, 2, 'https://i.imgur.com/YaSqa06.jpeg', 'Stylish Red & Silver Over-Ear Headphones', 'Electronics', 15, 0, 0),
(383, 'Enhance your smartphone\'s look with this ultra-sleek mirror finish phone case. Designed to offer style with protection, the case features a reflective surface that adds a touch of elegance while keeping your device safe from scratches and impacts. Perfect for those who love a minimalist and modern aesthetic.', 27, 2, 'https://i.imgur.com/yb9UQKL.jpeg', 'Sleek Mirror Finish Phone Case', 'Electronics', 15, 0, 0),
(384, 'Experience modern timekeeping with our high-tech smartwatch, featuring a vivid touch screen display, customizable watch faces, and a comfortable blue silicone strap. This smartwatch keeps you connected with notifications and fitness tracking while showcasing exceptional style and versatility.', 16, 2, 'https://i.imgur.com/LGk9Jn2.jpeg', 'Sleek Smartwatch with Vibrant Display', 'Electronics', 15, 0, 0),
(385, 'Enhance the elegance of your living space with our Sleek Modern Leather Sofa. Designed with a minimalist aesthetic, it features clean lines and a luxurious leather finish. The robust metal legs provide stability and support, while the plush cushions ensure comfort. Perfect for contemporary homes or office waiting areas, this sofa is a statement piece that combines style with practicality.', 53, 3, 'https://i.imgur.com/Qphac99.jpeg', 'Sleek Modern Leather Sofa', 'furniture', 15, 2, 1),
(386, 'Elevate your dining room with this sleek Mid-Century Modern dining table, featuring an elegant walnut finish and tapered legs for a timeless aesthetic. Its sturdy wood construction and minimalist design make it a versatile piece that fits with a variety of decor styles. Perfect for intimate dinners or as a stylish spot for your morning coffee.', 24, 3, 'https://i.imgur.com/DMQHGA0.jpeg', 'Mid-Century Modern Wooden Dining Table', 'furniture', 15, 2, 1),
(387, 'Elevate your dining space with this luxurious table, featuring a sturdy golden metal base with an intricate rod design that provides both stability and chic elegance. The smooth stone top in a sleek round shape offers a robust surface for your dining pleasure. Perfect for both everyday meals and special occasions, this table easily complements any modern or glam decor.', 66, 3, 'https://i.imgur.com/NWIJKUj.jpeg', 'Elegant Golden-Base Stone Top Dining Table', 'furniture', 15, 0, 0),
(388, 'Elevate your living space with this beautifully crafted armchair, featuring a sleek wooden frame that complements its vibrant teal upholstery. Ideal for adding a pop of color and contemporary style to any room, this chair provides both superb comfort and sophisticated design. Perfect for reading, relaxing, or creating a cozy conversation nook.', 25, 3, 'https://i.imgur.com/6wkyyIN.jpeg', 'Modern Elegance Teal Armchair', 'furniture', 15, 0, 0),
(389, 'Enhance your dining space with this sleek, contemporary dining table, crafted from high-quality solid wood with a warm finish. Its sturdy construction and minimalist design make it a perfect addition for any home looking for a touch of elegance. Accommodates up to six guests comfortably and includes a striking fruit bowl centerpiece. The overhead lighting is not included.', 67, 3, 'https://i.imgur.com/4lTaHfF.jpeg', 'Elegant Solid Wood Dining Table', 'furniture', 15, 6, 1),
(390, 'Elevate your home office with our Modern Minimalist Workstation Setup, featuring a sleek wooden desk topped with an elegant computer, stylish adjustable wooden desk lamp, and complimentary accessories for a clean, productive workspace. This setup is perfect for professionals seeking a contemporary look that combines functionality with design.', 49, 3, 'https://i.imgur.com/3oXNBst.jpeg', 'Modern Minimalist Workstation Setup', 'furniture', 15, 0, 0),
(391, 'Elevate your office space with this sleek and comfortable Modern Ergonomic Office Chair. Designed to provide optimal support throughout the workday, it features an adjustable height mechanism, smooth-rolling casters for easy mobility, and a cushioned seat for extended comfort. The clean lines and minimalist white design make it a versatile addition to any contemporary workspace.', 71, 3, 'https://i.imgur.com/3dU0m72.jpeg', 'Modern Ergonomic Office Chair', 'furniture', 15, 2, 1),
(392, 'Step onto the field and stand out from the crowd with these eye-catching holographic soccer cleats. Designed for the modern player, these cleats feature a sleek silhouette, lightweight construction for maximum agility, and durable studs for optimal traction. The shimmering holographic finish reflects a rainbow of colors as you move, ensuring that you\'ll be noticed for both your skills and style. Perfect for the fashion-forward athlete who wants to make a statement.', 39, 4, 'https://i.imgur.com/qNOjJje.jpeg', 'Futuristic Holographic Soccer Cleats', 'Shoes', 15, 2, 0),
(393, 'Step into the spotlight with these eye-catching rainbow glitter high heels. Designed to dazzle, each shoe boasts a kaleidoscope of shimmering colors that catch and reflect light with every step. Perfect for special occasions or a night out, these stunners are sure to turn heads and elevate any ensemble.', 39, 4, 'https://i.imgur.com/62gGzeF.jpeg', 'Rainbow Glitter High Heels', 'Shoes', 15, 2, 1),
(394, 'Step into summer with style in our denim espadrille sandals. Featuring a braided jute sole for a classic touch and adjustable denim straps for a snug fit, these sandals offer both comfort and a fashionable edge. The easy slip-on design ensures convenience for beach days or casual outings.', 33, 4, 'https://i.imgur.com/9qrmE1b.jpeg', 'Chic Summer Denim Espadrille Sandals', 'Shoes', 15, 0, 0),
(395, 'Step into style with these eye-catching sneakers featuring a striking combination of orange and blue hues. Designed for both comfort and fashion, these shoes come with flexible soles and cushioned insoles, perfect for active individuals who don\'t compromise on style. The reflective silver accents add a touch of modernity, making them a standout accessory for your workout or casual wear.', 27, 4, 'https://i.imgur.com/hKcMNJs.jpeg', 'Vibrant Runners: Bold Orange & Blue Sneakers', 'Shoes', 15, 0, 0),
(396, 'Step into style with our Vibrant Pink Classic Sneakers! These eye-catching shoes feature a bold pink hue with iconic white detailing, offering a sleek, timeless design. Constructed with durable materials and a comfortable fit, they are perfect for those seeking a pop of color in their everyday footwear. Grab a pair today and add some vibrancy to your step!', 84, 4, 'https://i.imgur.com/mcW42Gi.jpeg', 'Vibrant Pink Classic Sneakers', 'Shoes', 15, 0, 0),
(397, 'Step into the future with this eye-catching high-top sneaker, designed for those who dare to stand out. The sneaker features a sleek silver body with striking gold accents, offering a modern twist on classic footwear. Its high-top design provides support and style, making it the perfect addition to any avant-garde fashion collection. Grab a pair today and elevate your shoe game!', 68, 4, 'https://i.imgur.com/npLfCGq.jpeg', 'Futuristic Silver and Gold High-Top Sneaker', 'Shoes', 15, 0, 0),
(398, 'Elevate your style with our cutting-edge high-heel boots that blend bold design with avant-garde aesthetics. These boots feature a unique color-block heel, a sleek silhouette, and a versatile light grey finish that pairs easily with any cutting-edge outfit. Crafted for the fashion-forward individual, these boots are sure to make a statement.', 36, 4, 'https://i.imgur.com/HqYqLnW.jpeg', 'Futuristic Chic High-Heel Boots', 'Shoes', 15, 0, 0),
(399, 'Step into sophistication with these chic peep-toe pumps, showcasing a lustrous patent leather finish and an eye-catching gold-tone block heel. The ornate buckle detail adds a touch of glamour, perfect for elevating your evening attire or complementing a polished daytime look.', 53, 4, 'https://i.imgur.com/AzAY4Ed.jpeg', 'Elegant Patent Leather Peep-Toe Pumps with Gold-Tone Heel', 'Shoes', 15, 0, 0),
(400, 'Step into sophistication with our Elegant Purple Leather Loafers, perfect for making a bold statement. Crafted from high-quality leather with a vibrant purple finish, these shoes feature a classic loafer silhouette that\'s been updated with a contemporary twist. The comfortable slip-on design and durable soles ensure both style and functionality for the modern man.', 17, 4, 'https://i.imgur.com/Au8J9sX.jpeg', 'Elegant Purple Leather Loafers', 'Shoes', 15, 0, 0),
(401, 'Step into comfort with our Classic Blue Suede Casual Shoes, perfect for everyday wear. These shoes feature a stylish blue suede upper, durable rubber soles for superior traction, and classic lace-up fronts for a snug fit. The sleek design pairs well with both jeans and chinos, making them a versatile addition to any wardrobe.', 39, 4, 'https://i.imgur.com/sC0ztOB.jpeg', 'Classic Blue Suede Casual Shoes', 'Shoes', 15, 0, 0),
(402, 'This modern electric bicycle combines style and efficiency with its unique design and top-notch performance features. Equipped with a durable frame, enhanced battery life, and integrated tech capabilities, it\'s perfect for the eco-conscious commuter looking to navigate the city with ease.', 22, 5, 'https://i.imgur.com/BG8J0Fj.jpg', 'Sleek Futuristic Electric Bicycle', 'Miscellaneous', 15, 2, 1),
(403, 'Indulge in the essence of summer with this vibrant citrus-scented Eau de Parfum. Encased in a sleek glass bottle with a bold orange cap, this fragrance embodies freshness and elegance. Perfect for daily wear, it\'s an olfactory delight that leaves a lasting, zesty impression.', 73, 5, 'https://i.imgur.com/xPDwUb3.jpg', 'Radiant Citrus Eau de Parfum', 'Miscellaneous', 15, 0, 0),
(1118, 'Sehr guter Stuhl, trust', 30, 3, '../Styling/Images/uploads/109122_6.jpg', 'Gelber Stuhl', 'furniture', 6, 10, 0),
(1119, 'Test Object', 34, 1, '../Styling/Images/uploads/T9107.001.5XL__S_0__22813f59f7d143f79527ac56fdb54b86.jpg', 'Test Object', 'Clothes', 2, 0, 0),
(1120, 'cjkwbkjqbd', 35, 1, '../Styling/Images/uploads/Weihnachtsmailing.jpg', 'jhgwjqhgd', 'Clothes', 2, 0, 0),
(1121, 'Linu paparinu', 1000, 5, '../Styling/Images/uploads/images.jpeg', 'linu', 'Miscellaneous', 2, 0, 0),
(1122, 'dhgqjhgdq', 30, 1, '../Styling/Images/uploads/T9107.001.5XL__S_0__22813f59f7d143f79527ac56fdb54b86.jpg', 'pantaloni', 'Clothes', 15, 0, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT für Tabelle `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT für Tabelle `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
