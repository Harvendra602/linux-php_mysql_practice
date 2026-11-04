<?php

require "db_connect.php";

// Fetch all employees using a prepared statement to prevent SQL injection. fetchALL returns an array of all rows from the result set. Each row is represented as an associative array.

$search = trim($_GET['search'] ?? '');

$sql = "SELECT * FROM employees
        WHERE name LIKE :search
        ORDER BY id ASC";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    'search' => '%' . $search . '%'
]);

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
</head>
<body>

<h2>Employee Management System</h2>

<a href="add_employee.php">Add New Employee</a>

<br><br>

<form method="GET" action="employees.php">

    <input type="text"
           name="search"
           placeholder="Enter employee name"
           value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>">

    <button type="submit">Search</button>

    <a href="employees.php">Show All</a>

</form>

<br>


<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Salary</th>
        <th>Action</th>
    </tr>

    <?php foreach ($employees as $employee): ?>

    <tr>        
        <td><?= htmlspecialchars($employee["id"]) ?></td>

        <td><?= htmlspecialchars($employee["name"]) ?></td>

        <td><?= htmlspecialchars($employee["salary"]) ?></td>
        <td>
    <a href="edit_employee.php?id=<?= urlencode($employee['id']) ?>">
        Edit
    </a>
    <a href="delete_employee.php?id=<?php echo $employee['id']; ?>"
       onclick="return confirm('Are you sure you want to delete this employee?');">
        Delete
    </a>
</td>
    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>