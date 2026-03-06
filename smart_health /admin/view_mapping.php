<?php
session_start();
include("../config/db.php");

// Protect page
if(!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Delete mapping
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM disease_symptom WHERE id='$id'");
    header("Location: view_mapping.php");
    exit();
}

// Fetch mapping with JOIN
$query = "
    SELECT ds.id, d.disease_name, s.symptom_name
    FROM disease_symptom ds
    JOIN diseases d ON ds.disease_id = d.disease_id
    JOIN symptoms s ON ds.symptom_id = s.symptom_id
    ORDER BY d.disease_name ASC
";

$result = mysqli_query($conn, $query);
?>

<?php include("../includes/header.php"); ?>

<div class="container mt-5">
    <h3 class="text-center mb-4">Disease – Symptom Mapping</h3>

    <div class="text-end mb-3">
        <a href="map_disease_symptom.php" class="btn btn-success">
            + Add Mapping
        </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Disease</th>
                <th>Symptom</th>
                <th width="120">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php if(mysqli_num_rows($result) > 0) { ?>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['disease_name']; ?></td>
                        <td><?php echo $row['symptom_name']; ?></td>
                        <td>
                            <a href="view_mapping.php?delete=<?php echo $row['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this mapping?');">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="4" class="text-center">
                        No mappings found.
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="text-center">
        <a href="dashboard.php" class="btn btn-secondary">
            Back to Dashboard
        </a>
    </div>
</div>

<?php include("../includes/footer.php"); ?>