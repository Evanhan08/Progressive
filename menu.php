<!-- menu.php - the rice menu table -->
<div class="section" id="rice">
    <h2 class="section-title">Our Rice</h2>
    <p>Prices are per sack (<?php echo $sackKilos; ?> kilos). Buy more, save more: <?php echo $rate2 * 100; ?>% off for 2+ sacks, <?php echo $rate5 * 100; ?>% off for 5+ sacks, and <?php echo $rate10 * 100; ?>% off for 10+ sacks!</p>

    <div class="card">
        <div class="scroll">
            <table>
                <tr>
                    <th>Rice</th>
                    <th>Per Sack</th>
                    <th>Per Kilo</th>
                    <th>Stock</th>
                    <th>Status</th>
                </tr>
                <?php
                // for loop, one row for each rice
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

                    echo "<tr>";
                    echo "<td class='name'>" . $names[$i] . "</td>";
                    echo "<td>&#8369;" . $prices[$i] . "</td>";
                    echo "<td>&#8369;" . $perKilo . "</td>";
                    echo "<td>" . $stocks[$i] . "</td>";
                    echo "<td class='" . $statusClass . "'>" . $status . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
