<?php
//1. Cashiers
$query = "SELECT COUNT(*) FROM `rpos_staff` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($staff);
$stmt->fetch();
$stmt->close();

//2. Orders
$query = "SELECT COUNT(*) FROM `rpos_orders` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($orders);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*) FROM `completed_orders` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($corders);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*) FROM `completed_orders` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($orders);
$stmt->fetch();
$stmt->close();

//3. Orders
$query = "SELECT COUNT(*) FROM `rpos_products` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($products);
$stmt->fetch();
$stmt->close();

//4.Sales
$query = "SELECT SUM(order_total) FROM `Completed_orders` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($sales);
$stmt->fetch();
$stmt->close();
