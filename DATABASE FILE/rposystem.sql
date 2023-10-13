-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 08:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rposystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `completed_orders`
--

CREATE TABLE `completed_orders` (
  `order_code` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `order_total` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `completed_orders`
--

INSERT INTO `completed_orders` (`order_code`, `order_id`, `staff_name`, `order_total`, `created_at`, `payment_method`) VALUES
('ARTW-4632', 'cdf1a279b0', 'Ernest Lubinda', 20, '2023-10-08 17:25:26', 'cash'),
('BPHA-0426', 'cff4333922', 'Ernest Lubinda', 48, '2023-10-03 14:42:45', 'cash'),
('BSNX-1574', '0e8ac6b8ec', 'Ernest Lubinda', 12, '2023-10-08 14:19:39', 'cash'),
('BUEM-6405', 'f8ba8839e0', 'Ernest Lubinda', 12, '2023-10-09 19:08:46', 'cash'),
('CINW-8927', '8b3ad46a30', 'Ernest Lubinda', 12, '2023-10-08 10:49:48', 'cash'),
('COPV-1640', 'cf55d7ae4c', 'Ernest Lubinda', 148, '2023-10-10 11:19:01', 'cash'),
('CRLE-7291', '04a3933a31', 'Ernest Lubinda', 26, '2023-10-08 17:28:34', 'cash'),
('DBTE-1624', '3cd5662037', 'Ernest Lubinda', 24, '2023-10-09 16:35:13', 'cash'),
('DGMN-6493', 'b9c5ca759a', 'Ernest Lubinda', 80, '2023-10-08 18:17:04', 'cash'),
('DKBA-1465', '7d91fdcaff', 'Ernest Lubinda', 16, '2023-10-08 16:49:20', 'Card'),
('GCIV-9382', '3a01905713', 'Ernest Lubinda', 36, '2023-10-04 00:04:02', 'cash'),
('IENT-2873', '21a2957946', 'Ernest Lubinda', 20, '2023-10-09 19:16:46', 'cash'),
('IHPB-4605', 'bdbc11fc3c', 'Ernest Lubinda', 80, '2023-10-08 13:51:33', 'cash'),
('ISLD-1079', '8d6e67ec33', 'Ernest Lubinda', 10, '2023-10-08 14:11:51', 'cash'),
('IXVK-0564', '2dbaf5f64e', 'Ernest Lubinda', 28, '2023-10-08 18:26:09', 'cash'),
('JWHS-5417', 'a7c7dc9cb6', 'Ernest Lubinda', 16, '2023-10-09 11:51:37', 'cash'),
('KYHM-4712', '8032b04e84', 'Ernest Lubinda', 6, '2023-10-03 18:53:50', 'Card'),
('KYWF-8701', 'c0841dd434', 'Ernest Lubinda', 24, '2023-10-09 20:27:30', 'cash'),
('LAGZ-3976', '1a432daf7d', 'Ernest Lubinda', 266, '2023-10-09 22:45:16', 'cash'),
('LODY-8904', 'e34277eb05', 'Ernest Lubinda', 6, '2023-10-10 11:23:55', 'cash'),
('MNQV-5617', '9769c007ed', 'Ernest Lubinda', 10, '2023-10-09 11:52:24', 'cash'),
('NWMP-3014', '444a8e4169', 'Ernest Lubinda', 6, '2023-10-08 14:33:45', 'cash'),
('QGZT-6321', '5ddf12f129', 'Ernest Lubinda', 16, '2023-10-08 18:40:35', 'cash'),
('SFAB-2675', '8078b5f6d5', 'Makoba Ngulube', 12, '2023-10-10 13:42:15', 'cash'),
('UAVH-6024', '70e008d8b0', 'Ernest Lubinda', 4, '2023-10-09 17:51:19', 'cash'),
('UNZA-1042', '39766c92cd', 'Ernest Lubinda', 6, '2023-10-09 11:50:29', 'cash'),
('VEQS-9583', 'd78d37b79c', 'Ernest Lubinda', 18, '2023-10-08 17:29:29', 'cash'),
('VKEX-7982', 'ae44256f57', 'Ernest Lubinda', 18, '2023-10-08 18:29:11', 'cash'),
('VWUQ-0617', '11a770f8a4', 'Ernest Lubinda', 4, '2023-10-04 00:05:56', 'cash'),
('WVAO-0174', 'd1d0da5b61', 'Ernest Lubinda', 84, '2023-10-09 20:35:25', 'cash'),
('XJRE-8536', '518a2d2f45', 'Ernest Lubinda', 62, '2023-10-10 09:15:15', 'cash'),
('XZJE-8021', '568c5af519', 'Ernest Lubinda', 4, '2023-10-08 14:12:20', 'cash'),
('YXOU-6537', '79b3426646', 'Ernest Lubinda', 16, '2023-10-09 17:30:43', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_admin`
--

CREATE TABLE `rpos_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `Phone_number` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_admin`
--

INSERT INTO `rpos_admin` (`admin_id`, `admin_name`, `Phone_number`, `admin_password`) VALUES
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'Admin', '0964234585', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_orders`
--

CREATE TABLE `rpos_orders` (
  `order_id` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `staff_name` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `Order_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rpos_order_details`
--

CREATE TABLE `rpos_order_details` (
  `order_code` varchar(100) NOT NULL,
  `prod_id` varchar(100) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_price` varchar(100) NOT NULL,
  `prod_qty` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rpos_order_details`
--

INSERT INTO `rpos_order_details` (`order_code`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `id`) VALUES
('XRLB-1924', 'e769e274a3', 'Frappuccino', '3', '1', 16),
('XRLB-1924', 'bd200ef837', 'Turkish Coffee', '8', '1', 17),
('AJKC-3529', 'e769e274a3', 'Frappuccino', '3', '1', 18),
('AJKC-3529', 'bd200ef837', 'Turkish Coffee', '8', '1', 19),
('AJKC-3529', '3d19e0bf27', 'Cincinnati Chili', '9', '1', 20),
('AJKC-3529', 'ec18c5a4f0', 'Corn Dogs', '4', '1', 21),
('SYOX-4816', '826e6f687f', 'Margherita Pizza', '12', '2', 22),
('SYOX-4816', 'f9c2770a32', 'Whipped Milk Shake', '8', '2', 23),
('SYOX-4816', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 24),
('ARTI-1896', 'f9c2770a32', 'Whipped Milk Shake', '8', '1', 25),
('ARTI-1896', '5d66c79953', 'Cheese Curd', '6', '1', 26),
('PAZJ-1659', '826e6f687f', 'Margherita Pizza', '12', '1', 27),
('ZNTR-7430', 'f4ce3927bf', 'Hot Dog', '4', '1', 28),
('ZNTR-7430', '31dfcc94cf', 'Buffalo Wings', '11', '1', 29),
('XWMU-2097', '06dc36c1be', 'Philly Cheesesteak', '7', '20', 30),
('BOZA-2861', '06dc36c1be', 'Philly Cheesesteak', '7', '20', 31),
('GICW-8504', '31dfcc94cf', 'Buffalo Wings', '11', '1', 32),
('BPHA-0426', '826e6f687f', 'Margherita Pizza', '12', '4', 33),
('KYHM-4712', '5d66c79953', 'Cheese Curd', '6', '1', 34),
('GCIV-9382', '826e6f687f', 'Margherita Pizza', '12', '3', 35),
('VWUQ-0617', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 36),
('NHML-5487', '5d66c79953', 'Cheese Curd', '6', '1', 37),
('NHML-5487', '826e6f687f', 'Margherita Pizza', '12', '1', 38),
('ZCAH-6873', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 39),
('ZCAH-6873', '5d66c79953', 'Cheese Curd', '6', '1', 40),
('ZCAH-6873', '826e6f687f', 'Margherita Pizza', '12', '5', 41),
('LGDU-7684', '5d66c79953', 'Cheese Curd', '6', '2', 42),
('FKHV-3648', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 43),
('FSRI-9410', '826e6f687f', 'Margherita Pizza', '12', '1', 44),
('GZMU-1340', '5d66c79953', 'Cheese Curd', '6', '1', 45),
('CINW-8927', '826e6f687f', 'Margherita Pizza', '12', '1', 46),
('IHPB-4605', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 47),
('IHPB-4605', '826e6f687f', 'Margherita Pizza', '12', '1', 48),
('IHPB-4605', '4e68e0dd49', 'Caramel Macchiato', '4', '3', 49),
('IHPB-4605', '826e6f687f', 'Margherita Pizza', '12', '3', 50),
('IHPB-4605', '5d66c79953', 'Cheese Curd', '6', '1', 51),
('IHPB-4605', '4e68e0dd49', 'Caramel Macchiato', '4', '14', 52),
('IHPB-4605', '826e6f687f', 'Margherita Pizza', '12', '1', 53),
('IHPB-4605', '5d66c79953', 'Cheese Curd', '6', '2', 54),
('ISLD-1079', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 55),
('ISLD-1079', '5d66c79953', 'Cheese Curd', '6', '1', 56),
('XZJE-8021', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 57),
('XZJE-8021', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 58),
('XZJE-8021', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 59),
('BSNX-1574', '826e6f687f', 'Margherita Pizza', '12', '1', 60),
('ONQF-4862', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 61),
('ONQF-4862', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 62),
('ONQF-4862', '5d66c79953', 'Cheese Curd', '6', '1', 63),
('ONQF-4862', '4e68e0dd49', 'Caramel Macchiato', '4', '3', 64),
('ONQF-4862', '5d66c79953', 'Cheese Curd', '6', '3', 65),
('NAQZ-0156', '826e6f687f', 'Margherita Pizza', '12', '1', 66),
('NAQZ-0156', '826e6f687f', 'Margherita Pizza', '12', '3', 67),
('NAQZ-0156', '826e6f687f', 'Margherita Pizza', '12', '1', 68),
('NAQZ-0156', '826e6f687f', 'Margherita Pizza', '12', '2', 69),
('NAQZ-0156', '826e6f687f', 'Margherita Pizza', '12', '1', 70),
('NWMP-3014', '5d66c79953', 'Cheese Curd', '6', '1', 71),
('NWMP-3014', '5d66c79953', 'Cheese Curd', '6', '1', 72),
('NWMP-3014', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 73),
('VWQK-7926', '826e6f687f', 'Margherita Pizza', '12', '1', 74),
('VWQK-7926', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 75),
('DMZG-0346', '826e6f687f', 'Margherita Pizza', '12', '1', 76),
('DMZG-0346', '826e6f687f', 'Margherita Pizza', '12', '2', 77),
('DMZG-0346', '826e6f687f', 'Margherita Pizza', '12', '2', 78),
('DKBA-1465', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 79),
('DKBA-1465', '826e6f687f', 'Margherita Pizza', '12', '1', 80),
('YNDQ-8532', '826e6f687f', 'Margherita Pizza', '12', '2', 81),
('YNDQ-8532', '826e6f687f', 'Margherita Pizza', '12', '4', 82),
('YNDQ-8532', '5d66c79953', 'Cheese Curd', '6', '2', 83),
('YNDQ-8532', '826e6f687f', 'Margherita Pizza', '12', '1', 84),
('YNDQ-8532', '5d66c79953', 'Cheese Curd', '6', '1', 85),
('YNDQ-8532', '826e6f687f', 'Margherita Pizza', '12', '1', 86),
('YNDQ-8532', '5d66c79953', 'Cheese Curd', '6', '1', 87),
('YNDQ-8532', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 88),
('ARTW-4632', '826e6f687f', 'Margherita Pizza', '12', '1', 89),
('ARTW-4632', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 90),
('VEQS-9583', '5d66c79953', 'Cheese Curd', '6', '1', 91),
('VEQS-9583', '826e6f687f', 'Margherita Pizza', '12', '1', 92),
('VEQS-9583', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 93),
('CRLE-7291', '5d66c79953', 'Cheese Curd', '6', '1', 94),
('CRLE-7291', '826e6f687f', 'Margherita Pizza', '12', '1', 95),
('CRLE-7291', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 96),
('UJHD-5637', '5d66c79953', 'Cheese Curd', '6', '1', 97),
('UJHD-5637', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 98),
('RBFH-1572', '5d66c79953', 'Cheese Curd', '6', '3', 99),
('ONSM-7582', '5d66c79953', 'Cheese Curd', '6', '9', 100),
('ONSM-7582', '5d66c79953', 'Cheese Curd', '6', '1', 101),
('ONSM-7582', '826e6f687f', 'Margherita Pizza', '12', '1', 102),
('OJLP-3169', '826e6f687f', 'Margherita Pizza', '12', '1', 103),
('OJLP-3169', '826e6f687f', 'Margherita Pizza', '12', '2', 104),
('OJLP-3169', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 105),
('DGMN-6493', '4e68e0dd49', 'Caramel Macchiato', '4', '8', 106),
('DGMN-6493', '5d66c79953', 'Cheese Curd', '6', '8', 107),
('IXVK-0564', '826e6f687f', 'Margherita Pizza', '12', '2', 108),
('IXVK-0564', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 109),
('VKEX-7982', '5d66c79953', 'Cheese Curd', '6', '1', 110),
('VKEX-7982', '826e6f687f', 'Margherita Pizza', '12', '1', 111),
('QGZT-6321', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 112),
('QGZT-6321', '826e6f687f', 'Margherita Pizza', '12', '1', 113),
('DWXG-0457', '826e6f687f', 'Margherita Pizza', '12', '1', 114),
('DWXG-0457', '5d66c79953', 'Cheese Curd', '6', '1', 115),
('DWXG-0457', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 116),
('WPTY-6405', '5d66c79953', 'Cheese Curd', '6', '1', 117),
('WPTY-6405', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 118),
('WPTY-6405', '826e6f687f', 'Margherita Pizza', '12', '1', 119),
('HXVY-1693', '5d66c79953', 'Cheese Curd', '6', '1', 120),
('HXVY-1693', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 121),
('HXVY-1693', '826e6f687f', 'Margherita Pizza', '12', '1', 122),
('XION-8271', '5d66c79953', 'Cheese Curd', '6', '1', 123),
('XION-8271', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 124),
('XION-8271', '826e6f687f', 'Margherita Pizza', '12', '1', 125),
('NMIS-5124', '5d66c79953', 'Cheese Curd', '6', '1', 126),
('NMIS-5124', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 127),
('NMIS-5124', '826e6f687f', 'Margherita Pizza', '12', '1', 128),
('DQZW-4105', '5d66c79953', 'Cheese Curd', '6', '4', 129),
('UNZA-1042', '5d66c79953', 'Cheese Curd', '6', '1', 130),
('JWHS-5417', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 131),
('JWHS-5417', '826e6f687f', 'Margherita Pizza', '12', '1', 132),
('MNQV-5617', '5d66c79953', 'Cheese Curd', '6', '1', 133),
('MNQV-5617', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 134),
('RCPU-8562', '826e6f687f', 'Margherita Pizza', '12', '1', 135),
('AMDP-7586', '5d66c79953', 'Cheese Curd', '6', '1', 136),
('OPEC-3742', '5d66c79953', 'Cheese Curd', '6', '2', 137),
('HJEO-3052', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 138),
('ACMT-1948', '826e6f687f', 'Margherita Pizza', '12', '1', 139),
('ACMT-1948', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 140),
('GXSM-3528', '5d66c79953', 'Cheese Curd', '6', '1', 141),
('DBTE-1624', '5d66c79953', 'Cheese Curd', '6', '2', 142),
('DBTE-1624', '826e6f687f', 'Margherita Pizza', '12', '1', 143),
('FQVN-6972', '826e6f687f', 'Margherita Pizza', '12', '1', 144),
('RTLM-0275', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 145),
('RTLM-0275', '5d66c79953', 'Cheese Curd', '6', '5', 146),
('UJBR-4925', '826e6f687f', 'Margherita Pizza', '12', '1', 147),
('YXOU-6537', '4e68e0dd49', 'Caramel Macchiato', '4', '4', 148),
('UAVH-6024', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 149),
('GIJC-7152', '4e68e0dd49', 'Caramel Macchiato', '4', '3', 150),
('PYRL-6591', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 151),
('BUEM-6405', '5d66c79953', 'Cheese Curd', '6', '2', 152),
('GOCK-7904', '826e6f687f', 'Margherita Pizza', '12', '1', 153),
('XJLP-1837', '826e6f687f', 'Margherita Pizza', '12', '1', 154),
('IENT-2873', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 155),
('IENT-2873', '826e6f687f', 'Margherita Pizza', '12', '1', 156),
('OWDZ-4291', '5d66c79953', 'Cheese Curd', '6', '2', 157),
('OWDZ-4291', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 158),
('OWDZ-4291', '826e6f687f', 'Margherita Pizza', '12', '1', 159),
('PKAX-8492', '5d66c79953', 'Cheese Curd', '6', '4', 160),
('PKAX-8492', '4e68e0dd49', 'Caramel Macchiato', '4', '4', 161),
('PKAX-8492', '826e6f687f', 'Margherita Pizza', '12', '6', 162),
('ZBGQ-6815', '5d66c79953', 'Cheese Curd', '6', '2', 163),
('ZBGQ-6815', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 164),
('ANEC-1637', '5d66c79953', 'Cheese Curd', '6', '1', 165),
('ANEC-1637', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 166),
('TRZM-5618', '826e6f687f', 'Margherita Pizza', '12', '2', 167),
('TRZM-5618', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 168),
('FTXO-8074', '826e6f687f', 'Margherita Pizza', '12', '5', 169),
('FTXO-8074', '4e68e0dd49', 'Caramel Macchiato', '4', '6', 170),
('KYWF-8701', '5d66c79953', 'Cheese Curd', '6', '2', 171),
('KYWF-8701', '826e6f687f', 'Margherita Pizza', '12', '1', 172),
('WVAO-0174', '826e6f687f', 'Margherita Pizza', '12', '7', 173),
('BMGF-8703', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 174),
('BJAN-4920', '5d66c79953', 'Cheese Curd', '6', '4', 175),
('BJAN-4920', '826e6f687f', 'Margherita Pizza', '12', '3', 176),
('LAGZ-3976', '826e6f687f', 'Margherita Pizza', '12', '18', 177),
('LAGZ-3976', '4e68e0dd49', 'Caramel Macchiato', '4', '8', 178),
('LAGZ-3976', '5d66c79953', 'Cheese Curd', '6', '3', 179),
('XJRE-8536', '5d66c79953', 'Cheese Curd', '6', '7', 180),
('XJRE-8536', '826e6f687f', 'Margherita Pizza', '12', '1', 181),
('XJRE-8536', '4e68e0dd49', 'Caramel Macchiato', '4', '2', 182),
('COPV-1640', '5d66c79953', 'Cheese Curd', '6', '16', 183),
('COPV-1640', '826e6f687f', 'Margherita Pizza', '12', '2', 184),
('COPV-1640', '4e68e0dd49', 'Caramel Macchiato', '4', '7', 185),
('LODY-8904', '5d66c79953', 'Cheese Curd', '6', '1', 186),
('SFAB-2675', '826e6f687f', 'Margherita Pizza', '12', '1', 187);

-- --------------------------------------------------------

--
-- Table structure for table `rpos_pass_resets`
--

CREATE TABLE `rpos_pass_resets` (
  `reset_id` int(20) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_pass_resets`
--

INSERT INTO `rpos_pass_resets` (`reset_id`, `reset_code`, `reset_token`, `reset_email`, `reset_status`, `created_at`) VALUES
(1, '63KU9QDGSO', '4ac4cee0a94e82a2aedc311617aa437e218bdf68', 'sysadmin@icofee.org', 'Pending', '2020-08-17 15:20:14.318643');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_payments`
--

CREATE TABLE `rpos_payments` (
  `pay_id` varchar(200) NOT NULL,
  `pay_code` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `pay_amt` varchar(200) NOT NULL,
  `pay_method` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_payments`
--

INSERT INTO `rpos_payments` (`pay_id`, `pay_code`, `order_code`, `pay_amt`, `pay_method`, `created_at`) VALUES
('0bf592', '9UMWLG4BF8', 'EJKA-4501', '8', 'Cash', '2022-09-04 16:31:54.525284'),
('4423d7', 'QWERT0YUZ1', 'JFMB-0731', '11', 'Cash', '2022-09-04 16:37:03.655834'),
('442865', '146XLFSC9V', 'INHG-0875', '10', 'Paypal', '2022-09-04 16:35:22.470600'),
('65891b', 'MF2TVJA1PY', 'ZPXD-6951', '16', 'Cash', '2022-09-03 13:12:46.959558'),
('e46e29', 'QMCGSNER3T', 'ONSY-2465', '12', 'Cash', '2022-09-03 08:35:50.172062');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_products`
--

CREATE TABLE `rpos_products` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `prod_quantity` int(11) NOT NULL,
  `original_quantity` int(11) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_products`
--

INSERT INTO `rpos_products` (`prod_id`, `prod_code`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `prod_quantity`, `original_quantity`, `created_at`) VALUES
('4e68e0dd49', 'QLKW-0914', 'Caramel Macchiato', '', 'Steamed milk, espresso and caramel; what could be more enticing? This blissful flavor is a favorite of coffee lovers due to its deliciously bold taste of creamy caramel and strong coffee flavor. These', '4', -90, 17, '2023-10-10 11:19:01.475029'),
('826e6f687f', 'AYFW-2683', 'Margherita Pizza', 'margherita-pizza0.jpg', 'Pizza margherita, as the Italians call it, is a simple pizza hailing from Naples. When done right, margherita pizza features a bubbly crust, crushed San Marzano tomato sauce, fresh mozzarella and basil, a drizzle of olive oil, and a sprinkle of salt.', '12', -203, 0, '2023-10-10 13:42:26.550220');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_staff`
--

CREATE TABLE `rpos_staff` (
  `staff_id` int(20) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_staff`
--

INSERT INTO `rpos_staff` (`staff_id`, `staff_name`, `staff_number`, `staff_email`, `staff_password`, `created_at`) VALUES
(6, 'Ernest Lubinda', 'DABJ-8126', 'ernestlubinda1@gmail.com123456', '1233', '2023-10-03 13:59:15.802602'),
(7, 'Makoba Ngulube', 'BNCafe-1542', 'makoba@gmail.com', '12', '2023-10-10 13:39:15.036887'),
(8, 'Tumelo', 'BNCAFE-5162', 'cashier@mail.com', '1', '2023-10-10 13:40:39.629848');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`order_code`);

--
-- Indexes for table `rpos_admin`
--
ALTER TABLE `rpos_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `rpos_order_details`
--
ALTER TABLE `rpos_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `rpos_payments`
--
ALTER TABLE `rpos_payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order` (`order_code`);

--
-- Indexes for table `rpos_products`
--
ALTER TABLE `rpos_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `rpos_staff`
--
ALTER TABLE `rpos_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rpos_order_details`
--
ALTER TABLE `rpos_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rpos_staff`
--
ALTER TABLE `rpos_staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
