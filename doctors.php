<?php
include 'db.php';

// Handle Add Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $doctor_id = $_POST['doctor_id'];
    $doctor_name = $_POST['doctor_name'];
    $doctor_add = $_POST['doctor_add'];
    $doctor_phno = $_POST['doctor_phno'];

    $sql = "INSERT INTO Doctor (doctor_id, doctor_name, doctor_add, doctor_phno) VALUES ('$doctor_id', '$doctor_name', '$doctor_add', '$doctor_phno')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Update Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $doctor_id = $_POST['doctor_id'];
    $column = $_POST['column'];
    $new_value = $_POST['new_value'];

    $sql = "UPDATE Doctor SET $column='$new_value' WHERE doctor_id='$doctor_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle Delete Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $doctor_id = $_POST['doctor_id'];

    // Perform deletion
    $sql = "DELETE FROM Doctor WHERE doctor_id=$doctor_id";

    if ($conn->query($sql) === TRUE) {
        echo "Doctor record deleted successfully";
    } else {
        echo "Error deleting doctor record: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM Doctor");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
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
            <li><a href="patients.php">Patients</a></li>
            <li><a href="blood_deliveres.php">Blood Deliveries</a></li>
        </ul>
    </nav>
    <main>
        <h2>Manage Doctors</h2>
        <!-- Add Form -->
        <form method="POST" action="doctors.php">
            <h3>Add Doctor</h3>
            <label for="doctor_id">Doctor ID:</label>
            <input type="text" id="doctor_id" name="doctor_id" required>
            <label for="doctor_name">Name:</label>
            <input type="text" id="doctor_name" name="doctor_name" required>
            <label for="doctor_add">Address:</label>
            <input type="text" id="doctor_add" name="doctor_add" required>
            <label for="doctor_phno">Phone Number:</label>
            <input type="text" id="doctor_phno" name="doctor_phno" required>
            <input type="submit" name="add" value="Add Doctor">
        </form>

        <!-- Update Form -->
        <form method="POST" action="doctors.php">
            <h3>Update Doctor</h3>
            <label for="doctor_id_update">Doctor ID:</label>
            <input type="text" id="doctor_id_update" name="doctor_id" required>
            <label for="column">Column to Update:</label>
            <select id="column" name="column" required>
                <option value="doctor_name">Name</option>
                <option value="doctor_add">Address</option>
                <option value="doctor_phno">Phone Number</option>
            </select>
            <label for="new_value">New Value:</label>
            <input type="text" id="new_value" name="new_value" required>
            <input type="submit" name="update" value="Update Doctor">
        </form>

        <!-- Delete Form -->
        <form method="POST" action="doctors.php">
            <h3>Delete Doctor</h3>
            <label for="doctor_id_delete">Doctor ID:</label>
            <input type="text" id="doctor_id_delete" name="doctor_id" required>
            <input type="submit" name="delete" value="Delete Doctor">
        </form>

        <!-- View Records -->
        <button onclick="viewRecords()">View Records</button>

        <h3>Existing Doctors</h3>
        <table id="doctorTable" style="display:none;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone Number</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['doctor_id']; ?></td>
                <td><?php echo $row['doctor_name']; ?></td>
                <td><?php echo $row['doctor_add']; ?></td>
                <td><?php echo $row['doctor_phno']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
    <script>
        function viewRecords() {
            document.getElementById('doctorTable').style.display = 'table';
        }
        function fillUpdateForm(id, name, add, phno) {
            document.getElementById('doctor_id_update').value = id;
            document.getElementById('column').value = 'doctor_name'; // Default to Name
            document.getElementById('new_value').value = name;
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>
