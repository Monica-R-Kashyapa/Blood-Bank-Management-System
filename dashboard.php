<?php
// Include database connection
include('db.php');

// Fetch counts for each entity to display on the dashboard
$doctor_count = $conn->query("SELECT COUNT(*) AS count FROM Doctor")->fetch_assoc()['count'];
$donor_count = $conn->query("SELECT COUNT(*) AS count FROM Donor")->fetch_assoc()['count'];
$blood_bank_count = $conn->query("SELECT COUNT(*) AS count FROM Blood_bank")->fetch_assoc()['count'];
$blood_count = $conn->query("SELECT COUNT(*) AS count FROM Blood")->fetch_assoc()['count'];
$patient_count = $conn->query("SELECT COUNT(*) AS count FROM Patient")->fetch_assoc()['count'];
$blood_delivery_count = $conn->query("SELECT COUNT(*) AS count FROM Blood_delivery")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Bank Management Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Blood Bank Management Dashboard</h1>
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
            <div class="dashboard-container">
                <section id="doctors" class="dashboard-section">
                    <h2>Doctors</h2>
                    <p>Total Doctors: <?php echo $doctor_count; ?></p>
                    <button onclick="window.location.href='doctors.php'">Manage Doctors</button>
                </section>
                <section id="donors" class="dashboard-section">
                    <h2>Donors</h2>
                    <p>Total Donors: <?php echo $donor_count; ?></p>
                    <button onclick="window.location.href='donors.php'">Manage Donors</button>
                </section>
                <section id="blood_banks" class="dashboard-section">
                    <h2>Blood Banks</h2>
                    <p>Total Blood Banks: <?php echo $blood_bank_count; ?></p>
                    <button onclick="window.location.href='blood_banks.php'">Manage Blood Banks</button>
                </section>
                <section id="blood" class="dashboard-section">
                    <h2>Blood</h2>
                    <p>Total Blood Units: <?php echo $blood_count; ?></p>
                    <button onclick="window.location.href='blood.php'">Manage Blood</button>
                </section>
                <section id="patients" class="dashboard-section">
                    <h2>Patients</h2>
                    <p>Total Patients: <?php echo $patient_count; ?></p>
                    <button onclick="window.location.href='patients.php'">Manage Patients</button>
                </section>
                <section id="blood_deliveries" class="dashboard-section">
                    <h2>Blood Deliveries</h2>
                    <p>Total Blood Deliveries: <?php echo $blood_delivery_count; ?></p>
                    <button onclick="window.location.href='blood_deliveres.php'">Manage Blood Deliveries</button>
                </section>
            </div>
        </main>
    </div>
</body>
</html>
