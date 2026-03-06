<?php
session_start();
include "../config/db.php";

// Protect Page
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Get Counts from Database
$symptom_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM symptoms"));
$disease_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM diseases"));
$doctor_count  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM doctors"));
$mapping_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM disease_symptom"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | Smart Health</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }
        .dashboard-title {
            font-weight: 600;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Smart Health</a>
        <div>
            <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<!-- Dashboard Content -->
<div class="container mt-5">

    <h3 class="text-center dashboard-title mb-4">Admin Dashboard</h3>

    <div class="row g-4">

        <!-- Manage Symptoms -->
        <div class="col-md-4">
            <div class="card shadow p-3 text-center">
                <h5 class="mb-2">Manage Symptoms</h5>
                <p class="text-muted">Add, View, Edit, Delete Symptoms</p>
                <h4 class="text-primary"><?php echo $symptom_count; ?></h4>
                <div class="mt-3">
                    <a href="add_symptom.php" class="btn btn-success btn-sm">Add</a>
                    <a href="view_symptoms.php" class="btn btn-secondary btn-sm">View</a>
                </div>
            </div>
        </div>

        <!-- Manage Diseases -->
        <div class="col-md-4">
            <div class="card shadow p-3 text-center">
                <h5 class="mb-2">Manage Diseases</h5>
                <p class="text-muted">Add, View, Edit, Delete Diseases</p>
                <h4 class="text-primary"><?php echo $disease_count; ?></h4>
                <div class="mt-3">
                    <a href="add_disease.php" class="btn btn-success btn-sm">Add</a>
                    <a href="view_diseases.php" class="btn btn-secondary btn-sm">View</a>
                </div>
            </div>
        </div>

        <!-- Manage Doctors -->
        <div class="col-md-4">
            <div class="card shadow p-3 text-center">
                <h5 class="mb-2">Manage Doctors</h5>
                <p class="text-muted">Add, View, Edit, Delete Doctors</p>
                <h4 class="text-primary"><?php echo $doctor_count; ?></h4>
                <div class="mt-3">
                    <a href="add_doctor.php" class="btn btn-success btn-sm">Add</a>
                    <a href="view_doctors.php" class="btn btn-secondary btn-sm">View</a>
                </div>
            </div>
        </div>

        <!-- Disease Symptom Mapping -->
        <div class="col-md-12">
            <div class="card shadow p-4 text-center">
                <h5 class="mb-2">Disease–Symptom Mapping</h5>
                <p class="text-muted">Map symptoms with diseases</p>
                <h4 class="text-primary"><?php echo $mapping_count; ?></h4>
                <div class="mt-3">
                    <a href="map_disease_symptom.php" class="btn btn-info btn-sm">Map</a>
                    <a href="view_mapping.php" class="btn btn-secondary btn-sm">View Mapping</a>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>