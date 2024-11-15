<?php
session_start(); // Ensure the session is started
$pageTitle = "Dashboard";

// Check if the user is logged in, if not, redirect to login page
if (empty($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

// Block browser back button access to previously cached pages
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache");

include 'header.php'; 
include 'functions.php'; 

// Check if the session is still valid (to prevent direct URL access after logout)
checkUserSessionIsActive();  // Ensure this function verifies session status

verifyActiveSession();  // Ensure that the user is logged in to access the dashboard
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?php echo $pageTitle ?></title>

    <style>
        .btn-long {
            width: 100%; 
            padding: 12px;
            font-size: 18px;
        }

        .logout-btn {
            position: absolute;
            top: -140px; 
            right: 0px;  
        }

        .card {
            position: relative;
            margin-top: 30px;
        }

        .card-header {
            padding-bottom: 30px;  
        }
    </style>
</head>
<body>
    <main>
        <div class="container mt-5">
            <h3>Welcome to the System: <?php echo htmlspecialchars($_SESSION['email']); ?></h3>

            <div class="row mt-4">
                <!-- Add a Subject Card -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add a Subject</div>
                        <div class="card-body text-center">
                            <p>This section allows you to add a new subject in the system.</p>
                            <a href="add_subject.php" class="btn btn-primary btn-long">Add Subject</a>
                        </div>
                    </div>
                </div>

                <!-- Register a Student Card -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Register a Student</div>
                        <div class="card-body text-center">
                            <!-- Logout Button positioned at top-right, higher -->
                            <a href="logout.php" class="btn btn-danger logout-btn">Logout</a>
                            <p>This section allows you to register a new student in the system.</p>
                            <a href="student/register.php" class="btn btn-primary btn-long">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Db8H40fpEYmF0p9Q6tTxFCYYdQmg6doUqdm1lJQbLvPpk39Q4mmr+dW0Zc37wH7Y" crossorigin="anonymous"></script>
</body>
</html>

<?php
include 'footer.php';  // Include the footer
?>
