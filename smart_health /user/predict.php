<?php
include "/config/db.php";

$disease_name = "";
$doctors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $symptom = trim($_POST['symptom'] ?? "");

    if (!empty($symptom)) {

        // Find disease based on symptom
        $stmt = $conn->prepare("SELECT disease_id, disease_name 
                                FROM diseases 
                                WHERE symptoms LIKE ?");
        
        $search = "%$symptom%";
        $stmt->bind_param("s", $search);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            $disease_id = $row['disease_id'];
            $disease_name = $row['disease_name'];

            // Fetch doctors using Many-to-Many mapping
            $doctor_query = $conn->prepare("
                SELECT d.name, d.specialization, d.contact 
                FROM doctors d
                JOIN doctor_disease dd ON d.doctor_id = dd.doctor_id
                WHERE dd.disease_id = ?
            ");

            $doctor_query->bind_param("i", $disease_id);
            $doctor_query->execute();
            $doctor_result = $doctor_query->get_result();

            while ($doc = $doctor_result->fetch_assoc()) {
                $doctors[] = $doc;
            }

            $doctor_query->close();

        } else {
            $disease_name = "No disease found for given symptom.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Disease Prediction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Smart Health Prediction</h3>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Enter Symptom</label>
                <input type="text" name="symptom" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Predict Disease
            </button>
        </form>
    </div>

    <?php if (!empty($disease_name)) : ?>

        <div class="card mt-4 shadow p-4">

            <h4 class="text-success">
                Predicted Disease: <?php echo htmlspecialchars($disease_name); ?>
            </h4>

            <hr>

            <h5>Recommended Doctors:</h5>

            <?php if (!empty($doctors)) : ?>

                <div class="row">
                    <?php foreach ($doctors as $doctor) : ?>
                        <div class="col-md-4 mt-3">
                            <div class="card p-3 shadow-sm">
                                <h6><?php echo htmlspecialchars($doctor['name']); ?></h6>
                                <p><strong>Specialization:</strong> <?php echo htmlspecialchars($doctor['specialization']); ?></p>
                                <p><strong>Contact:</strong> <?php echo htmlspecialchars($doctor['contact']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php else : ?>

                <p class="text-danger">No doctors available for this disease.</p>

            <?php endif; ?>

        </div>

    <?php endif; ?>

</div>

</body>
</html>
