<?php
// Pampanga Rice Dealer - Module 1 activity (PHP text-based store page)

// ---------- VARIABLES ----------
$storeName = "Pampanga Rice Dealer";
$tagline = "100% local rice for Filipino families";
$location = "Lubao, Pampanga";
$sackKilos = 25;  // kilos in one sack (whole number)
$discount = 0.10; // 10% off if you buy 2 or more sacks (decimal)
$year = 2026;
$isOpen = true;   // boolean

// ---------- ARRAYS ----------
// indexed arrays (same order: index 0 is Pinoy Rice, 1 is Jasmine, etc.)
$names = array("Pinoy Rice", "Jasmine", "Buco Panda", "Kanin ni Juan");
$prices = array(1250, 1500, 1400, 1350); // price per sack
$stocks = array(40, 25, 0, 12);
$payments = array("Cash on Delivery", "GCash", "PayMaya", "Bank Transfer");

// associative array (each value has its own key)
$info = array("days" => "Open every day", "delivery" => "Free delivery within the Lubao area", "type" => "100% local rice, no imported rice");

// ---------- EXPRESSIONS AND OPERATORS ----------
// price per kilo = price of sack / kilos in sack
$kilo0 = $prices[0] / $sackKilos;
$kilo1 = $prices[1] / $sackKilos;
$kilo2 = $prices[2] / $sackKilos;
$kilo3 = $prices[3] / $sackKilos;

// price per sack if you buy 2 or more = price - (price * discount)
$sale0 = $prices[0] - ($prices[0] * $discount);
$sale1 = $prices[1] - ($prices[1] * $discount);
$sale2 = $prices[2] - ($prices[2] * $discount);
$sale3 = $prices[3] - ($prices[3] * $discount);

// add all the stocks
$totalStock = $stocks[0] + $stocks[1] + $stocks[2] + $stocks[3];

// money if we sell all the sacks (price x stock)
$totalValue = ($prices[0] * $stocks[0]) + ($prices[1] * $stocks[1]) + ($prices[2] * $stocks[2]) + ($prices[3] * $stocks[3]);

// comparison operators (they give true or false)
$pinoyInStock = $stocks[0] > 0;
$jasmineInStock = $stocks[1] > 0;
$bucoInStock = $stocks[2] > 0;

// logical operators (and, or, not)
$bothInStock = $pinoyInStock && $jasmineInStock;
$anyInStock = $bucoInStock || $jasmineInStock;
$bucoSoldOut = !$bucoInStock;

// status of each rice (typed by me for now)
$status0 = "In Stock";
$status1 = "In Stock";
$status2 = "Sold Out";
$status3 = "In Stock";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $storeName; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- top bar -->
    <div id="top-bar">
        <div id="brand">
            <img src="img/logo.png" alt="Rice Dealer logo" class="logo">
            <span><?php echo $storeName; ?></span>
        </div>
        <div id="nav">
            <a href="#about">About</a>
            <a href="#rice">Our Rice</a>
            <a href="#delivery">Delivery</a>
            <a href="#payment">Payment</a>
        </div>
    </div>

    <!-- title -->
    <div id="hero">
        <h1>Welcome to <?php echo $storeName; ?></h1>
        <p><?php echo $tagline; ?></p>
        <p>Buy 2 or more sacks and get <?php echo $discount * 100; ?>% off!</p>
    </div>

    <!-- about -->
    <div class="box" id="about">
        <h2>About Our Business</h2>
        <p>We are a local rice retailer in <?php echo $location; ?>. Our goal is to make quality local rice easier for families to buy, and to support our Filipino farmers.</p>
        <p><?php echo $info["type"]; ?>.</p>
    </div>

    <!-- products table -->
    <div class="box" id="rice">
        <h2>Our Rice</h2>
        <p>Prices are per sack (<?php echo $sackKilos; ?> kilos).</p>
        <div class="scroll">
            <table>
                <tr>
                    <th>Rice</th>
                    <th>Per Sack</th>
                    <th>2+ Sacks</th>
                    <th>Per Kilo</th>
                    <th>Stock</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td class="name"><?php echo $names[0]; ?></td>
                    <td>&#8369;<?php echo $prices[0]; ?></td>
                    <td>&#8369;<?php echo $sale0; ?></td>
                    <td>&#8369;<?php echo $kilo0; ?></td>
                    <td><?php echo $stocks[0]; ?></td>
                    <td class="in-stock"><?php echo $status0; ?></td>
                </tr>
                <tr>
                    <td class="name"><?php echo $names[1]; ?></td>
                    <td>&#8369;<?php echo $prices[1]; ?></td>
                    <td>&#8369;<?php echo $sale1; ?></td>
                    <td>&#8369;<?php echo $kilo1; ?></td>
                    <td><?php echo $stocks[1]; ?></td>
                    <td class="in-stock"><?php echo $status1; ?></td>
                </tr>
                <tr>
                    <td class="name"><?php echo $names[2]; ?></td>
                    <td>&#8369;<?php echo $prices[2]; ?></td>
                    <td>&#8369;<?php echo $sale2; ?></td>
                    <td>&#8369;<?php echo $kilo2; ?></td>
                    <td><?php echo $stocks[2]; ?></td>
                    <td class="sold-out"><?php echo $status2; ?></td>
                </tr>
                <tr>
                    <td class="name"><?php echo $names[3]; ?></td>
                    <td>&#8369;<?php echo $prices[3]; ?></td>
                    <td>&#8369;<?php echo $sale3; ?></td>
                    <td>&#8369;<?php echo $kilo3; ?></td>
                    <td><?php echo $stocks[3]; ?></td>
                    <td class="in-stock"><?php echo $status3; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- delivery -->
    <div class="box" id="delivery">
        <h2>Delivery</h2>
        <p><?php echo $info["delivery"]; ?>.</p>
        <p><?php echo $info["days"]; ?>.</p>
        <p>Open now? <?php echo $isOpen; ?> (1 means true)</p>
    </div>

    <!-- payment -->
    <div class="box" id="payment">
        <h2>Payment Methods</h2>
        <p>1. <?php echo $payments[0]; ?></p>
        <p>2. <?php echo $payments[1]; ?></p>
        <p>3. <?php echo $payments[2]; ?></p>
        <p>4. <?php echo $payments[3]; ?></p>
    </div>

    <!-- summary -->
    <div class="box" id="summary">
        <h2>Store Summary</h2>
        <p>Total sacks in stock: <?php echo $totalStock; ?></p>
        <p>Total value of all sacks: &#8369;<?php echo $totalValue; ?></p>
        <p>Pinoy Rice and Jasmine both in stock? <?php echo $bothInStock; ?> (1 means true)</p>
        <p>Buco Panda or Jasmine in stock? <?php echo $anyInStock; ?> (1 means true)</p>
        <p>Is Buco Panda sold out? <?php echo $bucoSoldOut; ?> (1 means true)</p>
    </div>

    <!-- footer -->
    <footer>
        &copy; <?php echo $year . " " . $storeName; ?>. Support our local farmers!
    </footer>

</body>
</html>