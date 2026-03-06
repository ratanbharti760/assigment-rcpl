<?php
session_start();
include("../config/db.php");

// Protect page
if(!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

// Fetch diseases & symptoms
$diseases = mysqli_query($conn, "SELECT * FROM diseases ORDER BY disease_name ASC");
$symptoms = mysqli_query($conn, "SELECT * FROM symptoms ORDER BY symptom_name ASC");

if(isset($_POST['map'])) {

    $disease_id = $_POST['disease_id'];
    $symptom_id = $_POST['symptom_id'];

    // Check duplicate mapping
    $check = mysqli_query($conn,
        "SELECT * FROM disease_symptom 
         WHERE disease_id='$disease_id' 
         AND symptom_id='$symptom_id'"
    );

    if(mysqli_num_rows($check) > 0) {
        $message = "Mapping already exists!";
    } else {

        $insert = mysqli_query($conn,
            "INSERT INTO disease_symptom (disease_id, symptom_id)
             VALUES ('$disease_id', '$symptom_id')"
        );

        if($insert) {
            $message = "Mapping added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<?php include("../includes/header.php"); ?>

<div class="container mt-5">
    <h3 class="text-center mb-4">Disease – Symptom Mapping</h3>

    <?php if($message != "") { ?>
        <div class="alert alert-info text-center">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    <form method="POST" class="col-md-5 mx-auto">

        <!-- Select Disease -->
        <label class="form-label">Select Disease</label>
        <select name="disease_id" class="form-control mb-3" required>
            <option value="">-- Select Disease --</option>
            <?php while($d = mysqli_fetch_assoc($diseases)) { ?>
                <option value="<?php echo $d['disease_id']; ?>">
                    <?php echo $d['disease_name']; ?>
                </option>
            <?php } ?>
        </select>

        <!-- Select Symptom -->
        <label class="form-label">Select Symptom</label>
        <select name="symptom_id" class="form-control mb-3" required>
            <option value="">-- Select Symptom --</option>
            <?php while($s = mysqli_fetch_assoc($symptoms)) { ?>
                <option value="<?php echo $s['symptom_id']; ?>">
                    <?php echo $s['symptom_name']; ?>
                </option>
            <?php } ?>
        </select>

        <button type="submit" name="map"
                class="btn btn-success w-100">
            Add Mapping
        </button>

        <a href="view_mapping.php"
           class="btn btn-secondary w-100 mt-2">
           View Mapping
        </a>

        <a href="dashboard.php"
           class="btn btn-light w-100 mt-2">
           Back to Dashboard
        </a>

    </form>
</div>

<?php include("../includes/footer.php"); ?>