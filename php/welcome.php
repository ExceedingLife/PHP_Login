<?php
  // Initialize the SESSION
    session_start();
  // Check if user is logged in otherwise redirect to index.php
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("Location: ../index.php");
      exit;
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP_Login-welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootStrap 4 CDN CSS external link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="css/main.css" />
    <!-- Glyph Icons CSS -->
    <link rel="stylesheet" href="css/glyphicon.css" />
</head>
<body>
    <header class="container-fluid text-center text-light py-4">
        <div>
            <div class="d-block">
                <img id="headpic" class="rounded-circle" src="img/Andrew.JPG" />
            </div>
            <div>
                <h1 class="header-text d-inline">PHP BootStrap4 Login - Welcome</h1>
                <span class="d-inline text-light2">By Andrew Harkins</span>
            </div>
        </div>
    </header>

    <section class="text-center" id="section-content">
        <div id="divAlert" class="container rounded"></div>
        <div class="container rounded contentdiv" id="contentdiv">
            <div class="pb-2 mt-4 mb-2 border-bottom clearfix">
                <h2>PHP Login Welcome</h2>
                <a class="btn btn-primary float-right" href="../index.php">Return to Dashboard</a>
            </div>
            <div>
                <p>
                    Hello, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>
                </p>
                <p>
                    You have successfully logged in.
                </p>
                <div>
                    <a href="#" class="btn btn-warning">Reset Password</a>
                    <a href="#" class="btn btn-danger">Sign out</a>
                </div>
            </div>
        </div>
    </section>

    <!-- BootStrap 4 CDN JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
