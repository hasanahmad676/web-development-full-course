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

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re_password']) && isset($_POST['name'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['name']);

    if (empty($uname) || empty($pass) || empty($re_pass) || empty($name)) {
        header("Location: signup.php?error=All fields are required");
        exit();
    } elseif ($pass !== $re_pass) {
        header("Location: signup.php?error=The confirmation password does not match");
        exit();
    } else {
        // Check if username already exists
        $sql = "SELECT * FROM users WHERE username='$uname'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=The username is taken, please try another");
            exit();
        } else {
            // Hash the password using password_hash() instead of md5
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            // Insert the user data into the database
            $sql2 = "INSERT INTO users (username, password, name) VALUES ('$uname', '$pass', '$name')";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("Location: loginindex.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: signup.php?error=Unknown error occurred");
                exit();
            }
        }
    }
} else {
    header("Location: signup.php");
    exit();
}
?>
