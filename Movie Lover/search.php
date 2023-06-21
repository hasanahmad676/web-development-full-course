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
    <title>Movie Lover</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php" style="color:red;text-transform: uppercase;">MovieLover</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./onlyview.php">Find Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.php">About Us</a>
                    </li>
                    <li class="nav-item" style="padding-left: 114px;">
                        <a class="nav-link" href="./loginindex.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Log-in</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

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

    // Retrieve the search query from the form input
    $search = $_GET['search'];

    // Prepare a SQL query to search for movie reviews by title
    $query = "SELECT * FROM movie_data WHERE title LIKE '%$search%'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any results were found
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="row align-items-center mb-3 text-light m-5 bd text-wrap">';
            echo '<div class="col-12" style="width: 600px;">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="300" height="400" /><br>';
            echo '</div>';
            echo '<div class="col">';
            echo '<h1>' . $row["title"] . '</h1><br>';
            echo "Director: " . $row["director"] . "<br>";
            echo "Year: " . $row["year"] . "<br>";
            echo "Genre: " . $row["gener"] . "<br>";
            echo "Rating: " . $row["rating"] . "<br>";
            echo '<div class="text-wrap">';
            echo "Description: " . $row["description"] . "<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo '<div class="text-center text-danger my-5">No movie reviews found as ' .$search. ' named.</div>';
    }


    // Close the database connection
    mysqli_close($conn);
    ?>


    <footer class="my-3 text-light">
        <div class="text-center">
            <p>&copy; 2023 Developed By Hasan Ahmad <a class="nav-link" href="./logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Log-out</a></p>
        </div>
    </footer>

    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>