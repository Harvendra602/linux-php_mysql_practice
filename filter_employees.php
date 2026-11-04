<?php

require __DIR__ . "/db_connect.php";

$minimumSalary = 25000;

$sql = "SELECT name, salary
        FROM employees
        WHERE salary >= :minimum_salary
        ORDER BY salary DESC";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    "minimum_salary" => $minimumSalary
]);

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($employees as $employee) {
    echo $employee["name"] . " - ";
    echo $employee["salary"] . "\n";
}