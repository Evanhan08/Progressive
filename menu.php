<!-- menu.php - rice cards -->
<div class="section" id="rice">
    <h2 class="section-title">Our Rice</h2>
    <p>Prices are per sack (<?php echo $sackKilos; ?> kilos). Buy more, save more: <?php echo $rate2 * 100; ?>% off for 2+ sacks, <?php echo $rate5 * 100; ?>% off for 5+ sacks, and <?php echo $rate10 * 100; ?>% off for 10+ sacks!</p>

    <div class="rice-list">
        <?php
        // for loop, one card for each rice
        for ($i = 0; $i < $totalRice; $i++) {
            $perKilo = $prices[$i] / $sackKilos;

            // if...elseif...else for the stock status
            if ($stocks[$i] == 0) {
                $status = "Sold Out";
                $statusClass = "sold-out";
            } elseif ($stocks[$i] <= 15) {
                $status = "Low Stock";
                $statusClass = "low-stock";
            } else {
                $status = "In Stock";
                $statusClass = "in-stock";
            }

            echo "<div class='card'>";
            echo "<h3>" . $names[$i] . "</h3>";
            echo "<p class='price'>&#8369;" . $prices[$i] . "</p>";
            echo "<p class='small'>&#8369;" . $perKilo . " per kilo</p>";
            echo "<p class='" . $statusClass . "'>" . $status . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>
