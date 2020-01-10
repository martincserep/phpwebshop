-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Jan 11. 00:08
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `ecom`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `product_id` bigint(10) UNSIGNED NOT NULL,
  `product_name` text NOT NULL,
  `specification` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `specification`, `description`, `price`, `quantity`, `image`, `category`) VALUES
(1, 'iPhone 8', 'specification', 'My first awesome phone!', 449, 10, '', 'phone'),
(2, 'iPhone XR', 'specification', 'Phone with the most powerful battery!', 599, 10, '', 'phone'),
(3, 'iPhone 11', 'specification', 'Just the right amount of everything.', 699, 10, '', 'phone'),
(6, 'iPhone 11 Pro', 'specification', 'The pro one!', 999, 10, '', 'phone'),
(7, 'iPhone 11 Pro Max', 'specification', 'To a perfectionist.', 1099, 10, '', 'phone'),
(8, 'Apple Watch Series 5 - Aluminium', 'specification', 'There’s an Apple Watch for everyone.', 399, 10, '', 'watch'),
(9, 'Apple Watch Series 5 - Stainless', 'specification', 'For the sophisticated.', 699, 10, '', 'watch'),
(10, 'MacBook Pro 16 inch', 'specification', 'The best for the brightest.', 2399, 10, '', 'macbook');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
