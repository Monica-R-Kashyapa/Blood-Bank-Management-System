<?php
include 'db.php';

// Handle Add Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $hospital_add = $_POST['hospital_add'];

    $sql = "INSERT INTO Patient (p_id, p_name, hospital_add) VALUES ('$p_id', '$p_name', '$hospital_add')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Update Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $p_id = $_POST['p_id'];
    $column = $_POST['column'];
    $new_value = $_POST['new_value'];

    $sql = "UPDATE Patient SET $column='$new_value' WHERE p_id=$p_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle Delete Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $p_id = $_POST['p_id'];

    $sql = "DELETE FROM Patient WHERE p_id=$p_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM Patient");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
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
        <h2>Manage Patients</h2>
        <!-- Add Form -->
        <form method="POST" action="patients.php">
            <h3>Add Patient</h3>
            <label for="p_id">ID:</label>
            <input type="text" id="p_id" name="p_id" required>
            <label for="p_name">Name:</label>
            <input type="text" id="p_name" name="p_name" required>
            <label for="hospital_add">Hospital Address:</label>
            <input type="text" id="hospital_add" name="hospital_add" required>
            <input type="submit" name="add" value="Add Patient">
        </form>

        <!-- Update Form -->
        <form method="POST" action="patients.php">
            <h3>Update Patient</h3>
            <label for="p_id_update">ID:</label>
            <input type="text" id="p_id_update" name="p_id" required>
            <label for="column">Column to Update:</label>
            <select id="column" name="column" required>
                <option value="p_name">Name</option>
                <option value="hospital_add">Hospital Address</option>
            </select>
            <label for="new_value">New Value:</label>
            <input type="text" id="new_value" name="new_value" required>
            <input type="submit" name="update" value="Update Patient">
        </form>

        <!-- Delete Form -->
        <form method="POST" action="patients.php">
            <h3>Delete Patient</h3>
            <label for="p_id_delete">ID:</label>
            <input type="text" id="p_id_delete" name="p_id" required>
            <input type="submit" name="delete" value="Delete Patient">
        </form>

        <!-- View Records -->
        <button onclick="viewRecords()">View Records</button>

        <h3>Existing Patients</h3>
        <table id="patientTable" style="display:none;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Hospital Address</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['p_id']; ?></td>
                <td><?php echo $row['p_name']; ?></td>
                <td><?php echo $row['hospital_add']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
    <script>
        function viewRecords() {
            document.getElementById('patientTable').style.display = 'table';
        }
        function fillUpdateForm(id, name, add) {
            document.getElementById('p_id').value = id;
            document.getElementById('column').value = 'p_name'; // Default to Name
            document.getElementById('new_value').value = name;
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>
