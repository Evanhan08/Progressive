<?php
// index.php - home page with the order form
require 'data.php';
$pageTitle = "Home - " . $storeName;
include 'header.php';
?>

    <!-- title -->
    <div id="hero">
        <div id="hero-text">
            <p class="tag">&#127806; ORDER YOUR RICE</p>
            <h1>Rice at Your Doorstep</h1>
            <p><?php echo $tagline; ?></p>
            <?php
            // if-else for the store status
            if ($isOpen) {
                echo "<p class='in-stock'>We are open!</p>";
            } else {
                echo "<p class='sold-out'>Sorry, we are closed.</p>";
            }
            ?>
            <a href="#order" class="btn">Order Now</a>
        </div>
        <div id="hero-logo">
            <img src="img/logo.png" alt="Rice Dealer logo">
        </div>
    </div>

    <!-- features -->
    <div class="section" id="features">
        <div class="grid three">
            <div class="card">
                <p class="icon">&#128666;</p>
                <h3>Free Delivery</h3>
                <p><?php echo $info["delivery"]; ?></p>
            </div>
            <div class="card">
                <p class="icon">&#128339;</p>
                <h3>Every Day</h3>
                <p><?php echo $info["days"]; ?></p>
            </div>
            <div class="card">
                <p class="icon">&#127806;</p>
                <h3>Local Rice</h3>
                <p><?php echo $info["type"]; ?></p>
            </div>
        </div>
    </div>

    <?php include 'menu.php'; ?>

    <!-- order section -->
    <div class="section" id="order">
        <h2 class="section-title">Place Your Order</h2>
        <div class="order-grid">

            <!-- order form -->
            <div class="card">
                <form method="POST" action="process.php">
                    <div class="form-grid">
                        <div>
                            <label>Full Name</label>
                            <input name="customer_name" placeholder="Enter your full name" required>
                        </div>
                        <div>
                            <label>Contact Number</label>
                            <input name="contact" placeholder="Enter your phone number" required>
                        </div>
                        <div class="full">
                            <label>Delivery Address</label>
                            <textarea name="address" placeholder="House no., street, barangay" required></textarea>
                        </div>
                        <div>
                            <label>Delivery Area</label>
                            <select name="area">
                                <option value="Lubao">Lubao (free delivery)</option>
                                <option value="Other">Other area</option>
                            </select>
                        </div>
                        <div>
                            <label>Delivery Date</label>
                            <input name="date" type="date">
                        </div>
                        <div class="full">
                            <label>Payment Method</label>
                            <select name="payment">
                                <?php
                                // foreach loop for the payment options
                                foreach ($payments as $pay) {
                                    echo "<option value='" . $pay . "'>" . $pay . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <h3>How many sacks of each rice?</h3>
                    <div class="qty-grid">
                        <?php
                        // for loop, one number box for each rice
                        for ($i = 0; $i < $totalRice; $i++) {
                            // the most they can order is 10 sacks or whatever is left in stock
                            $max = $stocks[$i];
                            if ($max > 10) {
                                $max = 10;
                            }
                            echo "<div>";
                            echo "<label>" . $names[$i] . "</label>";
                            echo "<input name='sack" . $i . "' type='number' min='0' max='" . $max . "' value='0'>";
                            echo "</div>";
                        }
                        ?>
                    </div>

                    <label>Notes (Optional)</label>
                    <textarea name="note" placeholder="Any notes for your order?"></textarea>

                    <div class="buttons">
                        <button type="submit" class="btn">Submit Order</button>
                        <button type="reset" class="btn-reset">Reset</button>
                    </div>
                </form>
            </div>

            <!-- order info -->
            <div class="card">
                <h3>Order Info</h3>
                <div class="info-item">
                    <span class="info-icon">&#128205;</span>
                    <p><b>Location</b><br><?php echo $location; ?></p>
                </div>
                <div class="info-item">
                    <span class="info-icon">&#128339;</span>
                    <p><b>Open</b><br><?php echo $info["days"]; ?></p>
                </div>
                <div class="info-item">
                    <span class="info-icon">&#128222;</span>
                    <p><b>Contact</b><br>Smart: <?php echo $smart; ?><br>Sun: <?php echo $sun; ?></p>
                </div>
                <div class="info-item">
                    <span class="info-icon">&#128666;</span>
                    <p><b>Delivery</b><br><?php echo $info["delivery"]; ?>. Other areas have a &#8369;<?php echo $deliveryFee; ?> fee.</p>
                </div>
                <div class="info-item">
                    <span class="info-icon">&#128221;</span>
                    <p><b>Please Note</b><br>We will contact you to confirm your order before delivery.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- steps and reasons -->
    <div class="section" id="steps">
        <div class="grid two">
            <div class="card">
                <h3>Simple Ordering Process</h3>
                <ol>
                <?php
                // foreach loop for the steps
                foreach ($steps as $step) {
                    echo "<li>" . $step . "</li>";
                }
                ?>
                </ol>
            </div>
            <div class="card">
                <h3>Why Buy Local Rice?</h3>
                <ul>
                <?php
                // while loop to show every reason
                $i = 0;
                while ($i < 3) {
                    echo "<li>" . $reasons[$i] . "</li>";
                    $i++;
                }
                ?>
                </ul>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>