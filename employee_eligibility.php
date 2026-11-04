
<?php

require "db_connect.php";

function checkEligibility($salary) {
    if ($salary >= 30000) {
        return "Eligible";
    } else {
        return "Not Eligible";
    }
}

$sql = "SELECT * FROM employees";

$stmt = $pdo->query($sql);

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($employees as $employee) {
    $result = checkEligibility($employee["salary"]);

    echo $employee["name"] . " - " . $result . "\n";
}
