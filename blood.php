<?php
include 'db.php';

// Check if form is submitted for adding a record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_record'])) {
    $blood_type = $_POST['blood_type'];
    $donor_id = $_POST['donor_id'];
    $bloodb_id = $_POST['bloodb_id'];

    $sql = "INSERT INTO Blood (blood_type, donor_id, bloodb_id) VALUES ('$blood_type', '$donor_id', '$bloodb_id')";
    if ($conn->query($sql) === TRUE) {
        echo '<p style="color: green; text-align: center;">New record created successfully</p>';
    } else {
        echo '<p style="color: red; text-align: center;">Error: ' . $sql . '<br>' . $conn->error . '</p>';
    }
}

// Check if form is submitted for updating a record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_record'])) {
    $blood_type = $_POST['blood_type'];
    $donor_id = $_POST['donor_id'];
    $bloodb_id = $_POST['bloodb_id'];
    $column = $_POST['column'];
    $new_value = $_POST['new_value'];

    $sql = "UPDATE Blood SET $column = '$new_value' WHERE blood_type = '$blood_type' AND donor_id = '$donor_id' AND bloodb_id = '$bloodb_id'";
    if ($conn->query($sql) === TRUE) {
        echo '<p style="color: green; text-align: center;">Record updated successfully</p>';
    } else {
        echo '<p style="color: red; text-align: center;">Error updating record: ' . $conn->error . '</p>';
    }
}

// Check if form is submitted for deleting a record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_record'])) {
    $blood_type = $_POST['blood_type'];
    $donor_id = $_POST['donor_id'];
    $bloodb_id = $_POST['bloodb_id'];

    $sql = "DELETE FROM Blood WHERE blood_type = '$blood_type' AND donor_id = '$donor_id' AND bloodb_id = '$bloodb_id'";
    if ($conn->query($sql) === TRUE) {
        echo '<p style="color: green; text-align: center;">Record deleted successfully</p>';
    } else {
        echo '<p style="color: red; text-align: center;">Error deleting record: ' . $conn->error . '</p>';
    }
}

$result = $conn->query("SELECT * FROM Blood");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood</title>
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
        <h2>Manage Blood</h2>
        <!-- Add Form -->
        <form method="POST" action="blood.php">
            <h3>Add Blood Record</h3>
            <label for="blood_type">Blood Type:</label>
            <input type="text" id="blood_type" name="blood_type" required>
            <label for="donor_id">Donor ID:</label>
            <input type="text" id="donor_id" name="donor_id" required>
            <label for="bloodb_id">Blood Bank ID:</label>
            <input type="text" id="bloodb_id" name="bloodb_id" required>
            <input type="submit" name="add_record" value="Add Blood Record">
        </form>

        <!-- Update Form -->
        <form method="POST" action="blood.php">
            <h3>Update Blood Record</h3>
            <label for="blood_type">Blood Type:</label>
            <input type="text" id="blood_type" name="blood_type" required>
            <label for="donor_id">Donor ID:</label>
            <input type="text" id="donor_id" name="donor_id" required>
            <label for="bloodb_id">Blood Bank ID:</label>
            <input type="text" id="bloodb_id" name="bloodb_id" required>
            <label for="column">Column to Update:</label>
            <select id="column" name="column" required>
                <option value="blood_type">Blood Type</option>
                <option value="donor_id">Donor ID</option>
                <option value="bloodb_id">Blood Bank ID</option>
            </select>
            <label for="new_value">New Value:</label>
            <input type="text" id="new_value" name="new_value" required>
            <input type="submit" name="update_record" value="Update Blood Record">
        </form>

        <!-- Delete Form -->
        <form method="POST" action="blood.php">
            <h3>Delete Blood Record</h3>
            <label for="blood_type">Blood Type:</label>
            <input type="text" id="blood_type" name="blood_type" required>
            <label for="donor_id">Donor ID:</label>
            <input type="text" id="donor_id" name="donor_id" required>
            <label for="bloodb_id">Blood Bank ID:</label>
            <input type="text" id="bloodb_id" name="bloodb_id" required>
            <input type="submit" name="delete_record" value="Delete Blood Record">
        </form>

        <!-- View Records -->
        <button onclick="viewRecords()">View Records</button>
        <h3>Existing Blood Records</h3>
        <table id="bloodTable" style="display:none;">
            <tr>
                <th>Blood Type</th>
                <th>Donor ID</th>
                <th>Blood Bank ID</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['blood_type']; ?></td>
                <td><?php echo $row['donor_id']; ?></td>
                <td><?php echo $row['bloodb_id']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
    <script>
        function viewRecords() {
            document.getElementById('bloodTable').style.display = 'table';
        }
    </script>
</body>
</html>
