<?php
session_start();
include("../config/db.php");

// Protect Page
if(!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Delete Disease
if(isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM diseases WHERE disease_id = $id");
    header("Location: view_diseases.php");
    exit();
}

// Fetch Diseases
$result = mysqli_query($conn, "SELECT * FROM diseases ORDER BY disease_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Diseases | Smart Health</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">Smart Health</a>
        <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-5">

    <h3 class="text-center mb-4">Manage Diseases</h3>

    <div class="text-end mb-3">
        <a href="add_disease.php" class="btn btn-success">
            + Add New Disease
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Disease Name</th>
                        <th>Description</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(mysqli_num_rows($result) > 0) { ?>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['disease_id']; ?></td>
                            <td><?php echo $row['disease_name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <a href="edit_disease.php?id=<?php echo $row['disease_id']; ?>"
                                   class="btn btn-primary btn-sm">
                                   Edit
                                </a>

                                <a href="view_diseases.php?delete=<?php echo $row['disease_id']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this disease?');">
                                   Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4" class="text-center">
                            No diseases found.
                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>
    </div>

    <div class="text-center mt-3">
        <a href="dashboard.php" class="btn btn-secondary">
            Back to Dashboard
        </a>
    </div>

</div>

</body>
</html>