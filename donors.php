<?php
include 'db.php';

// Handle Add Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $donor_id = $_POST['donor_id'];
    $donor_name = $_POST['donor_name'];
    $do_phno = $_POST['do_phno'];
    $do_add = $_POST['do_add'];
    $do_dob = $_POST['do_dob'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $bp = $_POST['bp'];
    $doctor_id = $_POST['doctor_id'];

    $sql = "INSERT INTO Donor (donor_id, donor_name, do_phno, do_add, do_dob, gender, weight, bp, doctor_id) 
            VALUES ('$donor_id', '$donor_name', '$do_phno', '$do_add', '$do_dob', '$gender', '$weight', '$bp', '$doctor_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Update Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $donor_id = $_POST['donor_id'];
    $column = $_POST['column'];
    $new_value = $_POST['new_value'];

    $sql = "UPDATE Donor SET $column='$new_value' WHERE donor_id=$donor_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle Delete Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $donor_id = $_POST['donor_id'];

    $sql = "DELETE FROM Donor WHERE donor_id=$donor_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM Donor");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donors</title>
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
        <h2>Manage Donors</h2>
        <!-- Add Form -->
        <form method="POST" action="donors.php">
            <h3>Add Donor</h3>
            <label for="donor_id">Donor ID:</label>
            <input type="text" id="donor_id" name="donor_id" required>
            <label for="donor_name">Name:</label>
            <input type="text" id="donor_name" name="donor_name" required>
            <label for="do_phno">Phone Number:</label>
            <input type="text" id="do_phno" name="do_phno" required>
            <label for="do_add">Address:</label>
            <input type="text" id="do_add" name="do_add" required>
            <label for="do_dob">Date of Birth:</label>
            <input type="date" id="do_dob" name="do_dob" required>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <label for="weight">Weight:</label>
            <input type="text" id="weight" name="weight" required>
            <label for="bp">Blood Pressure:</label>
            <input type="text" id="bp" name="bp" required>
            <label for="doctor_id">Doctor ID:</label>
            <input type="text" id="doctor_id" name="doctor_id" required>
            <input type="submit" name="add" value="Add Donor">
        </form>

        <!-- Update Form -->
        <form method="POST" action="donors.php">
            <h3>Update Donor</h3>
            <label for="donor_id_update">Donor ID:</label>
            <input type="text" id="donor_id_update" name="donor_id" required>
            <label for="column">Column to Update:</label>
            <select id="column" name="column" required>
                <option value="donor_name">Name</option>
                <option value="do_phno">Phone Number</option>
                <option value="do_add">Address</option>
                <option value="do_dob">Date of Birth</option>
                <option value="gender">Gender</option>
                <option value="weight">Weight</option>
                <option value="bp">Blood Pressure</option>
                <option value="doctor_id">Doctor ID</option>
            </select>
            <label for="new_value">New Value:</label>
            <input type="text" id="new_value" name="new_value" required>
            <input type="submit" name="update" value="Update Donor">
        </form>

        <!-- Delete Form -->
        <form method="POST" action="donors.php">
            <h3>Delete Donor</h3>
            <label for="donor_id_delete">Donor ID:</label>
            <input type="text" id="donor_id_delete" name="donor_id" required>
            <input type="submit" name="delete" value="Delete Donor">
        </form>

        <!-- View Records -->
        <button onclick="viewRecords()">View Records</button>

        <h3>Existing Donors</h3>
        <table id="donorTable" style="display:none;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Weight</th>
                <th>Blood Pressure</th>
                <th>Doctor ID</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['donor_id']; ?></td>
                <td><?php echo $row['donor_name']; ?></td>
                <td><?php echo $row['do_phno']; ?></td>
                <td><?php echo $row['do_add']; ?></td>
                <td><?php echo $row['do_dob']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['weight']; ?></td>
                <td><?php echo $row['bp']; ?></td>
                <td><?php echo $row['doctor_id']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
    <script>
        function viewRecords() {
            document.getElementById('donorTable').style.display = 'table';
        }
        function fillUpdateForm(id, name, phno, add, dob, gender, weight, bp, doctor_id) {
            document.getElementById('donor_id_update').value = id;
            document.getElementById('column').value = 'donor_name'; // Default to Name
            document.getElementById('new_value').value = name;
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>
