<?php
// Database connection parameters
$host = "localhost";
$dbname = "laravel_practice";
$username = "laravel_dev";
$password = "Sarthak@2023";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
// Insert a new employee record without using an HTML form
    $name = "Rohit";
    $salary = 32000;
// Prepare and execute the SQL statement
    $sql = "INSERT INTO employees (name, salary)
            VALUES (:name, :salary)";

    $stmt = $pdo->prepare($sql);
// Execute the statement with parameters
    $stmt->execute([
        "name" => $name,
        "salary" => $salary
    ]);

    echo "Employee added successfully!\n";

} catch (PDOException $e) {
    echo "Database operation failed.\n";
    error_log($e->getMessage());
}