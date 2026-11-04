<?php

require __DIR__ . "/db_connect.php";

$sql = "SELECT id, name, salary
        FROM employees
        WHERE name = :name
        LIMIT 1";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    "name" => "Karan"
]);

$employee = $stmt->fetch(PDO::FETCH_ASSOC);

if ($employee) {
    echo $employee["name"] . " - ";
    echo $employee["salary"] . "\n";
} else {
    echo "Employee not found\n";
}