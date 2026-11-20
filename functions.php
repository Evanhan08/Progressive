<?php
declare(strict_types=1);
require 'data.php';
$pageTitle = "Stock Control - " . $storeName;

$rice = [
    "Pinoy Rice" => ["price" => 1250, "stock" => 40],
    "Jasmine" => ["price" => 1500, "stock" => 25],
    "Buco Panda" => ["price" => 1400, "stock" => 0],
    "Kanin ni Juan" => ["price" => 1350, "stock" => 12],
    "Diwata" => ["price" => 1300, "stock" => 30],
    "Pandan" => ["price" => 1550, "stock" => 18],
    "Maharlika" => ["price" => 1450, "stock" => 8],
    "Matador" => ["price" => 1200, "stock" => 22],
    "Master Chef" => ["price" => 1600, "stock" => 5],
    "Brown Rice" => ["price" => 1700, "stock" => 9],
    "Red Rice" => ["price" => 1650, "stock" => 14],
    "Malagkit" => ["price" => 1800, "stock" => 6],
];

$tax_rate = 12;
function get_reorder_message(int $stock): string {
    return $stock < 10 ? "Yes" : "No";
}

function get_total_value(float $price, int $quantity): float {
    return $price * $quantity;
}
function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float {
    $total = $price * $quantity;
    return $total * ($tax_rate / 100);
}

include 'header.php';

?>

    <!-- title -->
    <div id="hero">
        <div id="hero-text">
            <p class="tag">&#127806; STOCK CONTROL</p>
            <h1>Stock Monitoring</h1>
            <p>Tax rate: <?php echo $tax_rate; ?>%. Re-order is Yes when the stock is below 10.</p>
        </div>
    </div>

    <!-- stock table -->
    <div class="section" id="stocks">
        <div class="card">
            <div class="scroll">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Stock</th>
                        <th>Re-order</th>
                        <th>Total Value</th>
                        <th>Tax Due</th>
                    </tr>
                    <?php
                    // foreach loop, one row for each rice in the array
                    foreach ($rice as $product_name => $data) {
                        echo "<tr>";
                        echo "<td class='name'>" . $product_name . "</td>";
                        echo "<td>" . $data["stock"] . "</td>";
                        echo "<td>" . get_reorder_message($data["stock"]) . "</td>";
                        echo "<td>&#8369;" . number_format(get_total_value($data["price"], $data["stock"]), 2) . "</td>";
                        echo "<td>&#8369;" . number_format(get_tax_due($data["price"], $data["stock"], $tax_rate), 2) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
