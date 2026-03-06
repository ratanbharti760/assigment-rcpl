<?php
session_start();
include("../config/db.php");

// Check admin login
if(!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $symptom_name = mysqli_real_escape_string($conn, $_POST['symptom_name']);

    $check = mysqli_query($conn, "SELECT * FROM symptoms WHERE symptom_name='$symptom_name'");

    if(mysqli_num_rows($check) > 0) {
        $message = "Symptom already exists!";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO symptoms (symptom_name) VALUES ('$symptom_name')");
        
        if($insert) {
            $message = "Symptom added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Symptom</title>
    <link rel="stylesheet" href="/smart_health/assets/style.css">
</head>
<body>

<div class="container">
    <h2 class="center" style="font-weight: light;">Add Symptom</h2>
    
    <?php if($message != "") { ?>
        <p class="center"><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST" style="width:300px;margin:auto;">

        <input type="text" name="symptom_name" placeholder="Enter Symptom Name" required style="width:100%;padding:10px;margin-bottom:10px;">

        <button type="submit" name="add" class="btn blue" style="width:100%; font-weight: lighter;">
            Add Symptom
        </button>

        
        <a href="dashboard.php"
   style="
       display:block;
       width:100%;
       margin-top:10px;
       padding:12px;
       text-align:center;
       background-color:#6c757d;
       color:white;
       text-decoration:none;
       border-radius:6px;
       font-size:15px;
       box-sizing:border-box;
   ">
   Back
</a>


    </form>
</div>

</body>
</html>
