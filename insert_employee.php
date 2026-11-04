<?php
// Insert a new employee record into the database
require "db_connect.php";

// Allow only form submissions
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Please submit the employee form.");
}

// Receive data from HTML form
$name = trim($_POST["name"] ?? "");
$salary = $_POST["salary"] ?? "";

// Validate data and ensure salary is a non-negative number
if ($name === "" || !is_numeric($salary) || $salary < 0) {
    exit("Please enter a valid name and salary.");
}

try {

    $sql = "INSERT INTO employees (name, salary)
            VALUES (:name, :salary)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        "name" => $name,
        "salary" => $salary
    ]);

    echo "Employee added successfully!";

} catch (PDOException $e) {

    error_log($e->getMessage());
    echo "Unable to add employee.";

}