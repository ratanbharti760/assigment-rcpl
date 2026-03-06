<?php
session_start();
include("../config/db.php");

// Protect page
if(!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Delete Doctor
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM doctors WHERE doctor_id='$id'");
    header("Location: view_doctors.php");
    exit();
}

// Fetch doctors
$result = mysqli_query($conn, "SELECT * FROM doctors ORDER BY doctor_id DESC");
?>

<?php include("../includes/header.php"); ?>

<div class="container mt-5">
    <h3 class="text-center mb-4">Manage Doctors</h3>

    <div class="text-end mb-3">
        <a href="add_doctor.php" class="btn btn-success">+ Add Doctor</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Doctor Name</th>
                <th>Specialization</th>
                <th>Contact</th>
                <th width="150">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php if(mysqli_num_rows($result) > 0) { ?>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['doctor_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['specialization']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td>
                            <a href="edit_doctor.php?id=<?php echo $row['doctor_id']; ?>" 
                               class="btn btn-primary btn-sm">
                               Edit
                            </a>

                            <a href="view_doctors.php?delete=<?php echo $row['doctor_id']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this doctor?');">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="5" class="text-center">No doctors found.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="text-center">
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</div>

<?php include("../includes/footer.php"); ?>