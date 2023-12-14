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

// Select data from the InsectDatabase table
$sql = "SELECT * FROM InsectDatabase";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugs</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<?php
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<a href='./single.php/?Id=" . $row["ID"] . "'>";
        echo "<div class='block'>";

        echo "<h1>" . $row["CommonName"] . "</h1>";
        echo "<p>" . $row["Species"] . "<br>";
        echo "<img src='" . $row['Image'] . "'><br><br></p>";

        echo "</div>";
        echo "</a>";
    }
} else {
    echo "0 results";
}
?>
</body>
</html>
