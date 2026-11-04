<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>

<h2>Add New Employee</h2>

<form action="insert_employee.php" method="POST">

    <label>Employee Name:</label>
    <input type="text" name="name" required>

    <br><br>

    <label>Employee Salary:</label>
    <input type="number" name="salary"
           min="0" step="0.01" required>

    <br><br>

    <button type="submit">Add Employee</button>

</form>

</body>
</html>
