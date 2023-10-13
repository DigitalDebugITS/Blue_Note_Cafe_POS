-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 12:25 PM
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
-- Table structure for table `rpos_admin`
--

CREATE TABLE `rpos_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_admin`
--

INSERT INTO `rpos_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'System Admin', 'admin@mail.com', '903b21879b4a60fc9103c3334e4f6f62cf6c3a2d');

-- --------------------------------------------------------

--
-- Table structure for table `rpos_orders`
--

CREATE TABLE `rpos_orders` (
  `order_id` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `staff_name` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `Order_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_orders`
--

INSERT INTO `rpos_orders` (`order_id`, `order_code`, `order_status`, `created_at`, `staff_name`, `payment_method`, `Order_total`) VALUES
('0ee762e863', 'OMVA-2096', '', '2023-09-15 14:42:09.109642', 'Ernest Lubinda', 'cash', 8),
('1145c3c017', 'GPEL-4698', '', '2023-09-15 16:10:50.813136', 'Ernest Lubinda', 'cash', 37),
('70e74dd27c', 'DCXK-9427', '', '2023-09-18 06:42:55.706524', 'Ernest Lubinda', 'cash', 20),
('b6f3f2ae10', 'AFKZ-5762', '', '2023-09-18 07:01:14.706104', 'Ernest Lubinda', 'cash', 23),
('d34771c20e', 'KZWJ-3754', '', '2023-09-17 08:20:30.239867', 'Ernest Lubinda', 'cash', 20),
('ea8729e044', 'FPKJ-3728', '', '2023-09-15 16:29:20.000822', 'Ernest Lubinda', 'cash', 176);

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
('KZMV-8546', 'e769e274a3', 'Frappuccino', '3', '1', 25),
('TFDM-5294', '826e6f687f', 'Margherita Pizza', '12', '1', 26),
('RHAN-7920', 'e769e274a3', 'Frappuccino', '3', '1', 27),
('RHAN-7920', 'bd200ef837', 'Turkish Coffee', '8', '1', 28),
('NRGC-9341', '826e6f687f', 'Margherita Pizza', '12', '1', 29),
('OTQB-0315', 'e769e274a3', 'Frappuccino', '3', '1', 30),
('CNAY-7634', '826e6f687f', 'Margherita Pizza', '12', '1', 31),
('CNAY-7634', 'e769e274a3', 'Frappuccino', '3', '1', 32),
('WACQ-1528', 'e769e274a3', 'Frappuccino', '3', '1', 33),
('NOXK-2051', 'bd200ef837', 'Turkish Coffee', '8', '1', 34),
('ZUVB-6712', 'bd200ef837', 'Turkish Coffee', '8', '1', 35),
('TMZV-4519', '826e6f687f', 'Margherita Pizza', '12', '1', 36),
('PZYT-5693', '826e6f687f', 'Margherita Pizza', '12', '2', 37),
('PZYT-5693', 'f9c2770a32', 'Whipped Milk Shake', '8', '1', 38),
('PZYT-5693', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 39),
('FMJZ-0497', '826e6f687f', 'Margherita Pizza', '12', '1', 40),
('KVUG-2618', 'e769e274a3', 'Frappuccino', '3', '1', 41),
('OMVA-2096', 'bd200ef837', 'Turkish Coffee', '8', '1', 42),
('MGAL-6817', '826e6f687f', 'Margherita Pizza', '12', '1', 43),
('GPEL-4698', '4e68e0dd49', 'Caramel Macchiato', '4', '1', 44),
('GPEL-4698', 'cff0cb495a', 'Americano', '3', '1', 45),
('GPEL-4698', '2b976e49a0', 'Cheeseburger', '3', '1', 46),
('GPEL-4698', '2fdec9bdfb', 'Jambalaya', '9', '1', 47),
('GPEL-4698', '5d66c79953', 'Cheese Curd', '6', '1', 48),
('GPEL-4698', '826e6f687f', 'Margherita Pizza', '12', '1', 49),
('FPKJ-3728', '826e6f687f', 'Margherita Pizza', '12', '13', 50),
('FPKJ-3728', 'f9c2770a32', 'Whipped Milk Shake', '8', '1', 51),
('FPKJ-3728', '2fdec9bdfb', 'Jambalaya', '9', '1', 52),
('FPKJ-3728', 'e769e274a3', 'Frappuccino', '3', '1', 53),
('KZWJ-3754', '826e6f687f', 'Margherita Pizza', '12', '1', 54),
('KZWJ-3754', 'f9c2770a32', 'Whipped Milk Shake', '8', '1', 55),
('DCXK-9427', 'f9c2770a32', 'Whipped Milk Shake', '8', '1', 56),
('DCXK-9427', '826e6f687f', 'Margherita Pizza', '12', '1', 57),
('AFKZ-5762', '826e6f687f', 'Margherita Pizza', '12', '1', 58),
('AFKZ-5762', 'f9c2770a32', 'Whipped Milk Shake', '8', '1', 59),
('AFKZ-5762', '2b976e49a0', 'Cheeseburger', '3', '1', 60);

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
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rpos_products`
--

INSERT INTO `rpos_products` (`prod_id`, `prod_code`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `created_at`) VALUES
('06dc36c1be', 'FCWU-5762', 'Philly Cheesesteak', 'cheesestk.jpg', 'A cheesesteak is a sandwich made from thinly sliced pieces of beefsteak and melted cheese in a long hoagie roll. A popular regional fast food, it has its roots in the U.S. city of Philadelphia, Pennsylvania.', '7', '2022-09-03 11:02:47.738370'),
('0c4b5c0604', 'JRZN-9518', 'Spaghetti Bolognese', 'spaghetti_bolognese.jpg', 'Spaghetti bolognese consists of spaghetti (long strings of pasta) with an Italian ragÃ¹ (meat sauce) made with minced beef, bacon and tomatoes, served with Parmesan cheese. Spaghetti bolognese is one of the most popular pasta dishes eaten outside of Italy.', '15', '2022-09-03 10:43:27.610897'),
('14c7b6370e', 'QZHM-0391', 'Reuben Sandwich', 'reubensandwich.jpg', 'The Reuben sandwich is a North American grilled sandwich composed of corned beef, Swiss cheese, sauerkraut, and Thousand Island dressing or Russian dressing, grilled between slices of rye bread. It is associated with kosher-style delicatessens, but is not kosher because it combines meat and cheese.', '8', '2022-09-03 10:58:04.069144'),
('1e0fa41eee', 'ICFU-1406', 'Submarine Sandwich', 'submarine_sndwh.jpg', 'A submarine sandwich, commonly known as a sub, hoagie, hero, Italian, grinder, wedge, or a spuckie, is a type of American cold or hot sandwich made from a cylindrical bread roll split lengthwise and filled with meats, cheeses, vegetables, and condiments. It has many different names.', '8', '2022-09-03 10:55:23.020144'),
('2b976e49a0', 'CEWV-9438', 'Cheeseburger', 'cheeseburgers.jpg', 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty. The cheese is usually added to the cooking hamburger patty shortly before serving, which allows the cheese to melt. Cheeseburgers can include variations in structure, ingredients and composition.', '3', '2022-09-03 10:45:47.282634'),
('2fdec9bdfb', 'UJAK-9614', 'Jambalaya', 'Jambalaya.jpg', 'Jambalaya is an American Creole and Cajun rice dish of French, African, and Spanish influence, consisting mainly of meat and vegetables mixed with rice.', '9', '2022-09-03 10:48:49.593618'),
('31dfcc94cf', 'SYQP-3710', 'Buffalo Wings', 'buffalo_wings.jpg', 'A Buffalo wing in American cuisine is an unbreaded chicken wing section that is generally deep-fried and then coated or dipped in a sauce consisting of a vinegar-based cayenne pepper hot sauce and melted butter prior to serving.', '11', '2022-09-03 10:51:09.829079'),
('3adfdee116', 'HIPF-5346', 'Enchiladas', 'enchiladas.jpg', 'An enchilada is a corn tortilla rolled around a filling and covered with a savory sauce. Originally from Mexican cuisine, enchiladas can be filled with various ingredients, including meats, cheese, beans, potatoes, vegetables, or combinations', '10', '2022-09-03 12:52:26.427554'),
('3d19e0bf27', 'EMBH-6714', 'Cincinnati Chili', 'cincinnatichili.jpg', 'Cincinnati chili is a Mediterranean-spiced meat sauce used as a topping for spaghetti or hot dogs; both dishes were developed by immigrant restaurateurs in the 1920s. In 2013, Smithsonian named one local chili parlor one of the \"20 Most Iconic Food Destinations in America\".', '9', '2022-09-03 12:57:39.265554'),
('4e68e0dd49', 'QLKW-0914', 'Caramel Macchiato', '', 'Steamed milk, espresso and caramel; what could be more enticing? This blissful flavor is a favorite of coffee lovers due to its deliciously bold taste of creamy caramel and strong coffee flavor. These', '4', '2022-09-03 08:55:51.237667'),
('5d66c79953', 'GOEW-9248', 'Cheese Curd', 'cheesecurd.jpg', 'Cheese curds are moist pieces of curdled milk, eaten either alone or as a snack, or used in prepared dishes. These are chiefly found in Quebec, in the dish poutine, throughout Canada, and in the northeastern, midwestern, mountain, and Pacific Northwestern United States, especially in Wisconsin and Minnesota.', '6', '2022-09-03 11:22:25.639690'),
('826e6f687f', 'AYFW-2683', 'Margherita Pizza', 'margherita-pizza0.jpg', 'Pizza margherita, as the Italians call it, is a simple pizza hailing from Naples. When done right, margherita pizza features a bubbly crust, crushed San Marzano tomato sauce, fresh mozzarella and basil, a drizzle of olive oil, and a sprinkle of salt.', '12', '2022-09-03 08:02:57.213354'),
('97972e8d63', 'CVWJ-6492', 'Irish Coffee', 'irishcoffee.jpg', 'Irish coffee is a caffeinated alcoholic drink consisting of Irish whiskey, hot coffee, and sugar, stirred, and topped with cream The coffee is drunk through the cream', '11', '2022-09-03 13:08:19.157649'),
('a419f2ef1c', 'EPNX-3728', 'Chicken Nugget', 'chicnuggets.jpeg', 'A chicken nugget is a food product consisting of a small piece of deboned chicken meat that is breaded or battered, then deep-fried or baked. Invented in the 1950s, chicken nuggets have become a very popular fast food restaurant item, as well as widely sold frozen for home use', '5', '2022-09-03 12:44:07.749371'),
('a5931158fe', 'ELQN-5204', 'Pulled Pork', 'pulledprk.jpeg', 'Pulled pork is an American barbecue dish, more specifically a dish of the Southern U.S., based on shredded barbecued pork shoulder. It is typically slow-smoked over wood; indoor variations use a slow cooker. The meat is then shredded manually and mixed with a sauce', '8', '2022-09-03 13:04:12.191403'),
('b2f9c250fd', 'XNWR-2768', 'Strawberry Rhubarb Pie', 'rhuharbpie.jpg', 'Rhubarb pie is a pie with a rhubarb filling. Popular in the UK, where rhubarb has been cultivated since the 1600s, and the leaf stalks eaten since the 1700s. Besides diced rhubarb, it almost always contains a large amount of sugar to balance the intense tartness of the plant', '7', '2022-09-03 13:06:28.235333'),
('bd200ef837', 'HEIY-6034', 'Turkish Coffee', 'turkshcoffee.jpg', 'Turkish coffee is a style of coffee prepared in a cezve using very finely ground coffee beans without filtering.', '8', '2022-09-03 13:09:50.234898'),
('cff0cb495a', 'ZOBW-2640', 'Americano', '', 'Many espresso-based drinks use milk, but not the cafÃ© Americano â€“ or simply \'Americano\'. The drink also uses espresso but is infused with hot water instead of milk. The result is a coffee beverage ', '3', '2022-09-03 08:56:18.824990'),
('d57cd89073', 'ZGQW-9480', 'Country Fried Steak', 'country_fried_stk.jpg', 'Chicken-fried steak, also known as country-fried steak or CFS, is an American breaded cutlet dish consisting of a piece of beefsteak coated with seasoned flour and either deep-fried or pan-fried. It is sometimes associated with the Southern cuisine of the United States.', '10', '2022-09-03 11:00:05.523519'),
('d9aed17627', 'FIKD-9703', 'Crab Cake', 'crabcakes.jpg', 'A crab cake is a variety of fishcake that is popular in the United States. It is composed of crab meat and various other ingredients, such as bread crumbs, mayonnaise, mustard, eggs, and seasonings. The cake is then sautÃ©ed, baked, grilled, deep fried, or broiled.', '16', '2022-09-03 12:54:52.120847'),
('e2195f8190', 'HKCR-2178', 'Carbonara', 'carbonaraimgre.jpg', 'Carbonara is an Italian pasta dish from Rome made with eggs, hard cheese, cured pork, and black pepper. The dish arrived at its modern form, with its current name, in the middle of the 20th century. The cheese is usually Pecorino Romano, Parmigiano-Reggiano, or a combination of the two.', '16', '2022-09-03 10:23:06.266420'),
('e2af35d095', 'IDLC-7819', 'Pepperoni Pizza', 'peperopizza.jpg', 'Pepperoni is an American variety of spicy salami made from cured pork and beef seasoned with paprika or other chili pepper. Prior to cooking, pepperoni is characteristically soft, slightly smoky, and bright red. Thinly sliced pepperoni is one of the most popular pizza toppings in American pizzerias.', '7', '2022-09-03 12:49:01.017677'),
('e769e274a3', 'AHRW-3894', 'Frappuccino', 'frappuccino.jpg', 'Frappuccino is a line of blended iced coffee drinks sold by Starbucks. It consists of coffee or crÃ¨me base, blended with ice and ingredients such as flavored syrups and usually topped with whipped cream and or spices.', '3', '2022-09-03 13:11:30.109467'),
('ec18c5a4f0', 'PQFV-7049', 'Corn Dogs', 'corndog.jpg', 'A corn dog is a sausage on a stick that has been coated in a thick layer of cornmeal batter and deep fried. It originated in the United States and is commonly found in American cuisine', '4', '2022-09-03 13:00:32.787354'),
('f4ce3927bf', 'EAHD-1980', 'Hot Dog', 'hotdog0.jpg', 'A hot dog is a food consisting of a grilled or steamed sausage served in the slit of a partially sliced bun. The term hot dog can also refer to the sausage itself. The sausage used is a wiener or a frankfurter. The names of these sausages also commonly refer to their assembled dish.', '4', '2022-09-03 10:53:04.965223'),
('f9c2770a32', 'YXLA-2603', 'Whipped Milk Shake', 'milkshake.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '8', '2022-09-03 08:54:02.727645');

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
(2, 'Cashier Trevor', 'QEUY-9042', 'cashier@mail.com', '903b21879b4a60fc9103c3334e4f6f62cf6c3a2d', '2022-09-04 16:11:30.581882'),
(3, 'Ernest Lubinda', 'YZCN-4310', 'ernestlubinda1@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2023-09-15 13:22:07.920753');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rpos_admin`
--
ALTER TABLE `rpos_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `rpos_orders`
--
ALTER TABLE `rpos_orders`
  ADD PRIMARY KEY (`order_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rpos_staff`
--
ALTER TABLE `rpos_staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
