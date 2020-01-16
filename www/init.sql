-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Jan 11. 03:12
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
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_item` text NOT NULL,
  `status` text DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'iPhone 8', 'specification', 'My first awesome phone!', 449, 10, '/uploads/15789457365936652075e1cccc8b49df-iphone8-spgray-select-2018.png', 'phone'),
(2, 'iPhone XR', 'specification', 'Phone with the most powerful battery!', 599, 10, '/uploads/157894572915060475445e1cccc1056a4-iphone-xr-black-select-201809.png', 'phone'),
(3, 'iPhone 11', 'specification', 'Just the right amount of everything.', 699, 10, '/uploads/157894538013272100165e1ccb6441d1d-iphone11-black-select-2019.png', 'phone'),
(6, 'iPhone 11 Pro', 'specification', 'The pro one!', 999, 10, '/uploads/15789457722134210495e1cccec14c3a-iphone-11-pro-space-select-2019.png', 'phone'),
(7, 'iPhone 11 Pro Max', 'specification', 'To a perfectionist.', 1099, 10, '/uploads/157894577919950314075e1cccf372d90-iphone-11-pro-max-midnight-green-select-2019.png', 'phone'),
(8, 'Apple Watch Series 5 - Aluminium', 'specification', 'There’s an Apple Watch for everyone.', 399, 10, '/uploads/157894588717678676145e1ccd5f9bf6e-watchseries540.png', 'watch'),
(9, 'Apple Watch Series 5 Hermés', 'specification', 'For the sophisticated.', 1299, 10, '/uploads/15789453618645628705e1ccb513dffd-hermeswatch.png', 'watch'),
(10, 'MacBook Pro 16 inch', 'specification', 'The best for the brightest.', 2399, 10, '/uploads/157894545614333800365e1ccbb0d57d6-mbp16touch-space-select-201911.jpg', 'macbook');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(999) NOT NULL,
  `access_level` varchar(16) NOT NULL,
  `access_code` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending,1=confirmed',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='admin and customer users';

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `contact_number`, `address`, `password`, `access_level`, `access_code`, `status`, `created`, `modified`) VALUES
(1, 'Martin', 'Cserép', 'martincserep1@gmail.com', '36704159966', 'afsfasdf', '$2y$10$S700vYeRdQ2UbgOXj6a77.HESv4Wtu12f9s4jWbEyzFioHvii5C6y', 'Admin', NULL, 1, '2020-01-11 03:12:02', '2020-01-11 02:12:35');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
