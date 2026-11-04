<?php

require __DIR__ . "/db_connect.php";

$sql = "SELECT id, name, salary FROM employees";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($employees as $employee) {
    echo $employee["id"] . " - ";
    echo $employee["name"] . " - ";
    echo $employee["salary"] . "\n";
}