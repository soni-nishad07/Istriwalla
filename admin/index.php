<?php
session_start();
include('../db.php');

$pageTitle = "Login | Admin Panel";
include 'admin_head.php';
include 'admin_link.php';


$alert = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM admin_users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_email'] = $email;
            echo "<script>alert('Login successful!'); window.location.href='admin_dashboard.php';</script>";
            exit;
        } else {
            $alert = "Incorrect password!";
        }
    } else {
        $alert = "Email not found!";
    }
}
?>






<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="index.php" class="d-block">
                                                    <img src="assets/images/logo-light.png" alt="" height="18">
                                                </a>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Admin Login</h5>
                                        </div>

                                        <div class="mt-4">
                                      
                                    <?php if ($alert): ?>
                                        <div class="alert alert-danger"><?php echo $alert; ?></div>
                                    <?php endif; ?>      
                                                        
                                    

                                    
                                    <form method="POST">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative">
                                                <input type="password" name="password" class="form-control" id="password-input" placeholder="Enter password" required>
                                                <button class="btn btn-sm btn-link position-absolute end-0 top-0 mt-2 me-2" type="button" id="toggle-password"><i class="bi bi-eye-fill"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="remember">
                                            <label class="form-check-label" for="remember">Remember me</label>
                                        </div>

                                        <button type="submit" class="btn btn-success w-100">Sign In</button>
                                    </form>
                                    <div class="mt-4 text-center">                            
                                            
                                        </div>

                            
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->




        
<script>
    document.getElementById('toggle-password').addEventListener('click', function () {
        var pass = document.getElementById('password-input');
        pass.type = (pass.type === "password") ? "text" : "password";
    });
</script>




        <!-- footer -->
     

        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->



            <?php  include('admin_footer.php') ?>

        <?php  include('admin_footerlink.php') ?>


</body>

</html>