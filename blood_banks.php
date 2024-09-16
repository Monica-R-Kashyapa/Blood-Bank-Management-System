<?php
include 'db.php';

// Handle Add Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $bloodb_id = $_POST['bloodb_id'];
    $bloodb_name = $_POST['bloodb_name'];
    $bloodb_add = $_POST['bloodb_add'];

    $sql = "INSERT INTO Blood_bank (bloodb_id, bloodb_name, bloodb_add) VALUES ('$bloodb_id', '$bloodb_name', '$bloodb_add')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Update Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $bloodb_id = $_POST['bloodb_id'];
    $column = $_POST['column'];
    $new_value = $_POST['new_value'];

    $sql = "UPDATE Blood_bank SET $column='$new_value' WHERE bloodb_id=$bloodb_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle Delete Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $bloodb_id = $_POST['bloodb_id'];

    $sql = "DELETE FROM Blood_bank WHERE bloodb_id=$bloodb_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM Blood_bank");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Banks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Blood Bank Management System</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="doctors.php">Doctors</a></li>
            <li><a href="donors.php">Donors</a></li>
            <li><a href="blood_banks.php">Blood Banks</a></li>
            <li><a href="blood.php">Blood</a></li>
            <li><a href="patients.php">Patients</a></li>
            <li><a href="blood_deliveres.php">Blood Deliveries</a></li>
        </ul>
    </nav>
    <main>
        <h2>Manage Blood Banks</h2>
        <!-- Add Form -->
        <form method="POST" action="blood_banks.php">
            <h3>Add Blood Bank</h3>
            <label for="bloodb_id">ID:</label>
            <input type="text" id="bloodb_id" name="bloodb_id" required>
            <label for="bloodb_name">Name:</label>
            <input type="text" id="bloodb_name" name="bloodb_name" required>
            <label for="bloodb_add">Address:</label>
            <input type="text" id="bloodb_add" name="bloodb_add" required>
            <input type="submit" name="add" value="Add Blood Bank">
        </form>

        <!-- Update Form -->
        <form method="POST" action="blood_banks.php">
            <h3>Update Blood Bank</h3>
            <label for="bloodb_id_update">ID:</label>
            <input type="text" id="bloodb_id_update" name="bloodb_id" required>
            <label for="column">Column to Update:</label>
            <select id="column" name="column" required>
                <option value="bloodb_name">Name</option>
                <option value="bloodb_add">Address</option>
            </select>
            <label for="new_value">New Value:</label>
            <input type="text" id="new_value" name="new_value" required>
            <input type="submit" name="update" value="Update Blood Bank">
        </form>

        <!-- Delete Form -->
        <form method="POST" action="blood_banks.php">
            <h3>Delete Blood Bank</h3>
            <label for="bloodb_id_delete">ID:</label>
            <input type="text" id="bloodb_id_delete" name="bloodb_id" required>
            <input type="submit" name="delete" value="Delete Blood Bank">
        </form>

        <!-- View Records -->
        <button onclick="viewRecords()">View Records</button>

        <h3>Existing Blood Banks</h3>
        <table id="bloodBankTable" style="display:none;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['bloodb_id']; ?></td>
                <td><?php echo $row['bloodb_name']; ?></td>
                <td><?php echo $row['bloodb_add']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
    <script>
        function viewRecords() {
            document.getElementById('bloodBankTable').style.display = 'table';
        }
        function fillUpdateForm(id, name, add) {
            document.getElementById('bloodb_id').value = id;
            document.getElementById('column').value = 'bloodb_name'; // Default to Name
            document.getElementById('new_value').value = name;
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>
