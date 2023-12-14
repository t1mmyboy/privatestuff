<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "Testproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['Id'];
// Select data from the InsectDatabase table
$sql = "SELECT * FROM InsectDatabase WHERE ID = $id";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugs</title>

</head>
<body>
<style><?php include "single.css" ?></style>
    <div class="container">
        <div class="header">
            <a href="../index.php" class="home-button">Return to Home</a>
            <h1>Bug Details</h1>
        </div>
        <div class="content">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='block'>";
                    echo "<h1>" . $row["CommonName"] . "</h1>";
                    echo "<img src='" . $row['Image'] . "' alt='" . $row["CommonName"] . "'>";
                    echo "<p><strong>Species:</strong> " . $row["Species"] . "</p>";
                    echo "<p><strong>Habitat:</strong> " . $row["Habitat"] . "</p>";
                    echo "<p><strong>Lifespan:</strong> " . $row["Lifespan"] . " days</p>";
                    echo "<p><strong></strong> " . $row["Description"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</body>
</html>

