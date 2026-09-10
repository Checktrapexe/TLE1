<?php
session_start();
require_once '../../included/connection.php';

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM items";
$result = mysqli_query($db, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>MediPod</title>
    <link rel="icon" type="image/x-icon" href="/media/favicon.gif">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

<nav>
    <!-- imports the navigation component-->
    <?php require_once "../../components/nav.php"; ?>
</nav>

<main>

    <section class="benefitSection">
        <h2 class="titleGenerate">generate an item</h2>
        <section class="itemlist">
            <?php if ($result && mysqli_num_rows($result) > 0): ?>

                <?php while ($item = mysqli_fetch_assoc($result)): ?>
                    <div class="item">
                        <h3><?php echo htmlspecialchars($item["name"]); ?></h3>
                        <p><?php echo htmlspecialchars($item["info"]); ?></p>
                        <p>Cost: <?php echo htmlspecialchars($item["cost"]); ?></p>
                        <button type="submit" name="print">
                            Print
                        </button>
                    </div>
                <?php endwhile; ?>

            <?php else: ?>
                <p>No items found.</p>
            <?php endif; ?>
        </section>
    </section>


</main>

<footer>
    <!--imports the footer component-->
    <?php require_once "../../components/footer.php"; ?>
</footer>

</body>
</html>