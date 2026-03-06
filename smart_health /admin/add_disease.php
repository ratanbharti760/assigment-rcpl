<?php
session_start();
include("../config/db.php");


 
 // Check admin login
if(!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if(isset($_POST['add'])) {

    $disease_name = mysqli_real_escape_string($conn, $_POST['disease_name']);
    $description  = mysqli_real_escape_string($conn, $_POST['description']);

    // Check duplicate
    $check = mysqli_query($conn, 
        "SELECT * FROM diseases WHERE disease_name='$disease_name'"
    );

    if(mysqli_num_rows($check) > 0) {
        $message = "Disease already exists!";
    } else {

        $insert = mysqli_query($conn,
            "INSERT INTO diseases (disease_name, description)
             VALUES ('$disease_name', '$description')"
        );

        if($insert) {
            $message = "Disease added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <head>
    <title>Add Disease</title>
    <link rel="stylesheet" href="/smart_health/assets/style.css">
    
</head>
</head>
<body>

<div class="container">
    <h2 class="center">Add Disease</h2>

    <?php if($message != "") { ?>
        <p class="center"><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST" style="width:400px;margin:auto;">

        <input type="text" name="disease_name"
               placeholder="Enter Disease Name"
               required
               style="width:100%;padding:10px;margin-bottom:10px;">

        <textarea name="description"
                  placeholder="Enter Description"
                  required
                  style="width:100%;padding:10px;margin-bottom:10px;height:100px;"></textarea>

        <button type="submit" name="add" class="btn green" style="width:100%;">
            Add Disease
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
