<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Francois+One&family=Gideon+Roman&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
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
            <a href="index.php">HOME |</a>
            <a href="index.php#rice">RICE |</a>
            <a href="index.php#order">ORDER |</a>
            <a href="functions.php">STOCKS |</a>
        </div>
    </div>

