<?php
session_start();
include "../config/db.php";

// If already logged in
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, 
        "SELECT * FROM admin WHERE username='$username' AND password='$password'"
    );

    if(mysqli_num_rows($query) == 1) {
        $admin = mysqli_fetch_assoc($query);
        $_SESSION['admin_id'] = $admin['admin_id'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<?php include "../includes/header.php"; ?>

<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="text-center mb-3">Admin Login</h4>

                <?php if(isset($error)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>

                <form method="POST">
                    <div class="mb-3">
                        <input type="text" name="username"
                               class="form-control"
                               placeholder="Username" required>
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password"
                               class="form-control"
                               placeholder="Password" required>
                    </div>

                    <button type="submit" name="login"
                            class="btn btn-primary w-100">
                        Login
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>