<?php
include 'db.php';

// Handle Add Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $bloodb_id = $_POST['bloodb_id'];
    $p_id = $_POST['p_id'];

    $sql = "INSERT INTO Blood_delivery (bloodb_id, p_id) VALUES ('$bloodb_id', '$p_id')";

    if ($conn->query($sql) === TRUE) {
        echo '<p style="color: green; text-align: center;">New blood delivery record created successfully</p>';
    } else {
        echo '<p style="color: red; text-align: center;">Error:' . $sql . "<br>" . $conn->error.'</p>';
    }
}

// Handle Delete Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $bloodb_id = $_POST['bloodb_id'];

    $sql = "DELETE FROM Blood_delivery WHERE bloodb_id=$bloodb_id";

    if ($conn->query($sql) === TRUE) {
        echo '<p style="color: green; text-align: center;">Blood delivery record deleted successfully</p>';
    } else {
        echo '<p style="color: red; text-align: center;">Error deleting blood bank record: ' . $conn->error.'</p>';
    }
}

$result = $conn->query("SELECT * FROM Blood_delivery");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Deliveries</title>
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
            <li><a href="blood.php">Blood </a></li>
            <li><a href="patients.php">Patients</a></li>
            <li><a href="blood_deliveres.php">Blood Deliveries</a></li>
        </ul>
    </nav>
    <main>
        <h2>Manage Blood Deliveries</h2>
        <!-- Add Form -->
        <form method="POST" action="blood_deliveres.php">
            <h3>Add Blood Delivery</h3>
            <label for="bloodb_id">Blood Bank ID:</label>
            <input type="text" id="bloodb_id" name="bloodb_id" required>
            <label for="p_id">Patient ID:</label>
            <input type="text" id="p_id" name="p_id" required>
            <input type="submit" name="add" value="Add Blood Delivery">
        </form>

        <!-- Delete Form -->
        <form method="POST" action="blood_deliveres.php">
            <h3>Delete Blood Delivery</h3>
            <label for="bloodb_id_delete">Blood Bank ID:</label>
            <input type="text" id="bloodb_id_delete" name="bloodb_id" required>
            <input type="submit" name="delete" value="Delete Blood Delivery">
        </form>

        <!-- View Records -->
        <button onclick="viewRecords()">View Records</button>

        <h3>Existing Blood Deliveries</h3>
        <table id="bloodDeliveryTable" style="display:none;">
            <tr>
                <th>Blood Bank ID</th>
                <th>Patient ID</th>
               
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['bloodb_id']; ?></td>
                <td><?php echo $row['p_id']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
    <script>
        function viewRecords() {
            document.getElementById('bloodDeliveryTable').style.display = 'table';
        }
        function fillUpdateForm(bloodb_id, p_id) {
            document.getElementById('bloodb_id').value = bloodb_id;
            document.getElementById('p_id').value = p_id;
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>
