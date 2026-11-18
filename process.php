<?php
// process.php - gets the order from the form and shows the order slip
require 'data.php';

// if the page was opened without the form, go back to the form
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.php');
    exit;
}

// get the details from the form
$name = trim($_POST['customer_name']);
$contact = trim($_POST['contact']);
$address = trim($_POST['address']);
$area = $_POST['area'];
$date = $_POST['date'];
$payMethod = $_POST['payment'];
$note = trim($_POST['note']);

$pageTitle = "Order Slip - " . $storeName;
include 'header.php';

// ---------- CHECKING THE ORDER ----------
$error = "";

if ($name == "" || $contact == "" || $address == "") {
    $error = "Please fill out your name, contact number and address.";
}

// count all the sacks and check the stock of each rice
$totalSacks = 0;
for ($i = 0; $i < $totalRice; $i++) {
    $qty = $_POST["sack" . $i];
    $totalSacks = $totalSacks + $qty;
    if ($qty > $stocks[$i]) {
        $error = "Sorry, there is not enough stock for " . $names[$i] . ".";
    }
}

if ($totalSacks == 0) {
    $error = "Please choose at least 1 sack of rice.";
}

// if there is a problem, show it and stop
if ($error != "") {
    echo "<div class='section'><div class='card'>";
    echo "<p class='error'>" . $error . "</p>";
    echo "<a href='index.php#order' class='btn'>Back to the form</a>";
    echo "</div></div>";
    include 'footer.php';
    exit;
}

// ---------- COMPUTING THE BILL ----------
// the more sacks, the bigger the discount
if ($totalSacks >= 10) {
    $rate = $rate10;
} elseif ($totalSacks >= 5) {
    $rate = $rate5;
} elseif ($totalSacks >= 2) {
    $rate = $rate2;
} else {
    $rate = 0;
}

// delivery fee depends on the area
if ($area == "Lubao") {
    $fee = 0;
} else {
    $fee = $deliveryFee;
}

// text for the delivery date
if ($date == "") {
    $dateText = "As soon as possible";
} else {
    $dateText = $date;
}

// order number, like RC-1118
$orderNo = "RC-" . date("md") . "-" . $totalSacks;

// match expression for the payment instructions
$payNote = match ($payMethod) {
    "Cash on Delivery" => "Please prepare the exact amount when your rice arrives.",
    "GCash" => "We will send you our GCash details when we confirm your order.",
    "PayMaya" => "We will send you our PayMaya details when we confirm your order.",
    "Bank Transfer" => "We will send you our bank details when we confirm your order.",
    default => "Please contact us for the payment details.",
};

// switch statement for the delivery note
switch ($area) {
    case "Lubao":
        $areaNote = "Free delivery within the Lubao area.";
        break;
    default:
        $areaNote = "A delivery fee of PHP " . $deliveryFee . " is added for other areas.";
}
?>

    <!-- title -->
    <div id="hero">
        <div id="hero-text">
            <p class="tag">&#127806; THANK YOU</p>
            <h1>Order Received!</h1>
            <p>Order number: <b><?php echo $orderNo; ?></b></p>
        </div>
    </div>

    <!-- order slip -->
    <div class="section">
        <div class="order-grid">

            <div class="card">
                <h3>Order Slip</h3>
                <p>Name: <?php echo htmlspecialchars($name); ?></p>
                <p>Contact: <?php echo htmlspecialchars($contact); ?></p>
                <p>Address: <?php echo htmlspecialchars($address); ?></p>
                <p>Delivery date: <?php echo $dateText; ?></p>

                <div class="scroll">
                    <table>
                        <tr>
                            <th>Rice</th>
                            <th>Sacks</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                        <?php
                        // for loop, a row for each rice that was ordered
                        $subtotal = 0;
                        for ($i = 0; $i < $totalRice; $i++) {
                            $qty = $_POST["sack" . $i];
                            if ($qty > 0) {
                                $lineTotal = $prices[$i] * $qty;
                                $subtotal = $subtotal + $lineTotal;
                                echo "<tr>";
                                echo "<td class='name'>" . $names[$i] . "</td>";
                                echo "<td>" . $qty . "</td>";
                                echo "<td>&#8369;" . number_format($prices[$i], 2) . "</td>";
                                echo "<td>&#8369;" . number_format($lineTotal, 2) . "</td>";
                                echo "</tr>";
                            }
                        }

                        $discountAmount = $subtotal * $rate;
                        $total = $subtotal - $discountAmount + $fee;
                        ?>
                    </table>
                </div>

                <p>Total sacks: <?php echo $totalSacks; ?></p>
                <p>Subtotal: &#8369;<?php echo number_format($subtotal, 2); ?></p>
                <p>Discount (<?php echo $rate * 100; ?>%): &#8369;<?php echo number_format($discountAmount, 2); ?></p>
                <p>Delivery fee: &#8369;<?php echo number_format($fee, 2); ?></p>
                <p class="total">Total to pay: &#8369;<?php echo number_format($total, 2); ?></p>

                <?php
                // only show the notes if the customer wrote something
                if ($note != "") {
                    echo "<p>Notes: " . htmlspecialchars($note) . "</p>";
                }
                ?>
            </div>

            <div class="card">
                <h3>Payment and Delivery</h3>
                <p>Payment method: <b><?php echo $payMethod; ?></b></p>
                <p><?php echo $payNote; ?></p>
                <p><?php echo $areaNote; ?></p>

                <h3>What happens next?</h3>
                <ol>
                <?php
                // foreach loop for the next steps
                foreach ($next as $step) {
                    echo "<li>" . $step . "</li>";
                }
                ?>
                </ol>
                <a href="index.php#order" class="btn">Order Again</a>
            </div>

        </div>
    </div>

<?php include 'footer.php'; ?>
