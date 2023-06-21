<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to retrieve the hashed password from the database based on the entered username
    $query = "SELECT password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        // Verify the entered password with the stored hashed password
        if (password_verify($password, $storedPassword)) {
            // Passwords match, login successful
            // Perform the necessary actions and redirect the user to the desired page
            header("Location: display.php");
            exit();
        } else {
            // Passwords do not match, login failed
            // Redirect to index.php with an error message
            header("Location: index.php?error=Invalid username or password");
            exit();
        }
    } else {
        // No user found with the entered username
        // Redirect to index.php with an error message
        header("Location: index.php?error=Invalid username or password");
        exit();
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>
    <!-- Navbar code -->
    <!-- ... -->

    <div class="container-fluid login-background">
        <div class="row">
            <div class="col-md-4 text-light">
                <form action="" method="POST" class="logform">
                    <h2 class="text-center mb-4 text-light">Login</h2>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="text-center m-3">
                        <a href="./signup.php" class="ca text-center text-white">Don't have an account? Sign up here</a>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger" name="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="my-3 text-light">
        <div class="text-center">
            <p>&copy; 2023 Developed By Hasan Ahmad</p>
        </div>
    </footer>

    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
