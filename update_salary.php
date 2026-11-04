
<?php
$connection = new mysqli("localhost", "laravel_dev", "Sarthak@2023", "laravel_practice");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "UPDATE employees SET salary = 45000 WHERE name = 'Karan'";

if ($connection->query($sql) === TRUE) {
    echo "Karan's salary updated successfully!";
} else {
    echo "Error: " . $connection->error;
}

$connection->close();
?>
