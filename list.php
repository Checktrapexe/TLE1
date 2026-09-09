<?php
session_start();
require_once 'includes/connection.php';

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM items";
$result = mysqli_query($db, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    while ($item = mysqli_fetch_assoc($result)) {
        echo "<div class='item'>";
        echo "<h1>" . htmlspecialchars($item["name"]) . "</h1>";
        echo "<p>" . htmlspecialchars($item["info"]) . "</p>";
        echo "<p>Cost: " . htmlspecialchars($item["cost"]) . "</p>";
        echo "</div>";
    }

} else {
    echo "No items found.";
}


//this is code to add the items into the page, dunno where you want it