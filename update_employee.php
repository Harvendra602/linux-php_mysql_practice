
<?php

require __DIR__ . "/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request.");
}


$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$name = trim($_POST["name"] ?? "");
$salary = filter_input(INPUT_POST, "salary", FILTER_VALIDATE_FLOAT);

if (!$id || $name === "" || $salary === false || $salary === null || $salary < 0) {
    exit("Please enter valid employee details.");
}

$sql = "UPDATE employees
        SET name = :name, salary = :salary
        WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    "name" => $name,
    "salary" => $salary,
    "id" => $id
]);

echo "Employee updated successfully!";

echo "<br><br>";

echo '<a href="employees.php">
        <button type="button">Back to Employees List</button>
      </a>';

?>
