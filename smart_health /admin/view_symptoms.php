<?php
session_start();
include("../config/db.php");

// Correct session check
if(!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Delete Symptom
if(isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM symptoms WHERE symptom_id = $id");
    header("Location: view_symptoms.php");
    exit();
}

// Fetch Symptoms
$result = mysqli_query($conn, "SELECT * FROM symptoms ORDER BY symptom_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Symptoms | Smart Health</title>
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

    <h3 class="text-center mb-4">Manage Symptoms</h3>

    <div class="text-end mb-3">
        <a href="add_symptom.php" class="btn btn-success">
            + Add New Symptom
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Symptom Name</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(mysqli_num_rows($result) > 0) { ?>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['symptom_id']; ?></td>
                            <td><?php echo $row['symptom_name']; ?></td>
                            <td>
                                <a href="edit_symptom.php?id=<?php echo $row['symptom_id']; ?>"
                                   class="btn btn-primary btn-sm">
                                   Edit
                                </a>

                                <a href="view_symptoms.php?delete=<?php echo $row['symptom_id']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this symptom?');">
                                   Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="3" class="text-center">
                            No symptoms found.
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