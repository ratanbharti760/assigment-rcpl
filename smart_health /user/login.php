 <?php
session_start();
include '../config/db.php';

$message = "";

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($query) == 1){

        $row = mysqli_fetch_assoc($query);

        if(password_verify($password, $row['password'])){

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];

            header("Location: select_symptoms.php");
            exit;

        } else {
            $message = "Incorrect password!";
        }

    } else {
        $message = "Email not registered!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login - Smart Health</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">User Login</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <?php if($message != "") { ?>
                <div class="alert alert-danger"><?php echo $message; ?></div>
            <?php } ?>

            <?php
            if(isset($_SESSION['success'])){
                echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                unset($_SESSION['success']);
            }
            ?>

            <div class="card p-4 shadow">
                <form method="POST">

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" name="login" class="btn btn-primary w-100">
                        Login
                    </button>

                    <p class="mt-3 text-center">
                        Don't have an account?
                        <a href="register.php">Register</a>
                    </p>

                </form>
            </div>

        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
