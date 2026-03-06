<?php
include "../config/db.php";
include "../includes/header.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $gender   = $_POST['gender'] ?? '';
    $mobile   = trim($_POST['mobile'] ?? '');

    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($gender) || empty($mobile)) {
        $message = "<div class='alert alert-danger'>All fields are required!</div>";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "<div class='alert alert-danger'>Invalid email format!</div>";
    }
    else {

        // Check duplicate email
        $check = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "<div class='alert alert-danger'>Email already registered!</div>";
        } 
        else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare(
                "INSERT INTO users (name, email, password, gender, mobile) 
                 VALUES (?, ?, ?, ?, ?)"
            );

            $stmt->bind_param("sssss", $name, $email, $hashed_password, $gender, $mobile);

            if ($stmt->execute()) {
                $message = "<div class='alert alert-success'>
                                Registration Successful! 
                                <a href='/smart_health/user/login.php'>Click here to Login</a>
                            </div>";
            } else {
                $message = "<div class='alert alert-danger'>Database Error. Try again!</div>";
            }

            $stmt->close();
        }

        $check->close();
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow p-4">
            <h3 class="text-center mb-4">User Registration</h3>

            <?php echo $message; ?>

            <form method="POST" action="">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Register
                </button>

            </form>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
