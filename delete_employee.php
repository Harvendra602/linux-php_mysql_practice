
<?php

require __DIR__ . "/db_connect.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    exit("Invalid employee ID.");
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM employees WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute(['id' => $id]);

if ($stmt->rowCount() > 0) {
    echo "Employee deleted successfully!";
} else {
    echo "Employee not found.";
}

echo '<br><br>';
echo '<a href="employees.php">Back to Employees List</a>';
