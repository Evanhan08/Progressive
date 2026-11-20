<?php
// data.php - all the store info is here so every page can use it

// variables
$storeName = "Pampanga Rice Dealer";
$tagline = "Rice at your doorstep! 100% local rice for Filipino families.";
$location = "Lubao, Pampanga";
$smart = "0908-9646734";
$sun = "0933-8519537";
$sackKilos = 25;
$deliveryFee = 150; 
$rate2 = 0.05;      
$rate5 = 0.10;      
$rate10 = 0.15;   
$totalRice = 9;
$isOpen = true;

// arrays (same order: index 0 is Pinoy Rice, 1 is Jasmine, etc.)
$names = array("Pinoy Rice", "Jasmine", "Buco Panda", "Kanin ni Juan", "Diwata", "Pandan", "Maharlika", "Matador", "Master Chef");
$prices = array(1250, 1500, 1400, 1350, 1300, 1550, 1450, 1200, 1600);
$stocks = array(40, 25, 0, 12, 30, 18, 8, 22, 5);
$payments = array("Cash on Delivery", "GCash", "PayMaya", "Bank Transfer");
$steps = array("Choose your rice and how many sacks.", "Fill out the order form.", "We will contact you to confirm.", "Choose how you will pay.", "Wait for your rice to arrive!");
$reasons = array("It supports Filipino farmers.", "It helps our local community.", "It is locally grown and fresh.");
$next = array("We will call or text you to confirm your order.", "We will prepare and pack your rice.", "Your rice will be delivered to your address.");

// associative array
$info = array("delivery" => "Free delivery within the Lubao area", "days" => "Available every day", "type" => "100% local rice, no imported rice");
?>
