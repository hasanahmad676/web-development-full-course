<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style.css">
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

    <div class="tainer-fluid signup-background">
        <div class="row">
            <div class="col-md-4 text-light">
                <form class="logform" action="signup-check.php" method="post">
                    <h2 class="text-center mb-4 text-light">SIGN UP</h2>
                    <div class="mb-1">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    </div>

                    <div class="mb-1">
                    <label class="form-label">Name</label>
                    <?php if (isset($_GET['name'])) { ?>
                        <input class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>"><br>
                    <?php } else { ?>
                        <input class="form-control" type="text" name="name" placeholder="Name"><br>
                    <?php } ?>
                    </div>



                    <div class="mb-1">
                    <label class="form-label">User Name</label>
                    <?php if (isset($_GET['username'])) { ?>
                        <input class="form-control" type="text" name="username" placeholder="User Name" value="<?php echo $_GET['username']; ?>"><br>
                    <?php } else { ?>
                        <input class="form-control" type="text" name="username" placeholder="User Name"><br>
                    <?php } ?>
                    </div>


                    <div class="mb-1">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password"><br>
                    </div>


                    <div class="mb-1">
                    <label class="form-label">Re Password</label>
                    <input class="form-control" type="password" name="re_password" placeholder="Re_Password"><br>
                    </div>

                    <div class="mb-1 text-center">
                    <a href="./loginindex.php" class="text-light text-decoration-none">Already have an account?</a>

                    </div>
                    <div class="mb-1 text-center">
                    <button type="submit" class="btn btn-success">Sign Up</button>

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