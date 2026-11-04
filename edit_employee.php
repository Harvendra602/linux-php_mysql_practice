
<?php

require __DIR__ . "/db_connect.php";

// 1. Get employee ID from the URL
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id) {
    exit("Invalid employee ID.");
}

// 2. Fetch the employee from MySQL
$sql = "SELECT * FROM employees WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["id" => $id]);

$employee = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$employee) {
    exit("Employee not found.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
</head>
<body>

<h2>Edit Employee</h2>

<form action="update_employee.php" method="POST">

    <input type="hidden" name="id"
           value="<?= htmlspecialchars((string)$employee['id']) ?>">

    <label>Name</label>
    <input type="text" name="name"
           value="<?= htmlspecialchars($employee['name']) ?>"
           required>

    <br><br>

    <label>Salary</label>
    <input type="number" name="salary" step="0.01"
           value="<?= htmlspecialchars((string)$employee['salary']) ?>"
           min="0" required>

    <br><br>

    <button type="submit">Update Employee</button>

</form>

</body>
</html>
