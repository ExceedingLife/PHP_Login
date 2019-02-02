<?php
  // Initialize the SESSION
    session_start();
  // Check if user logged in IF NOT redirect index.php
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("Location: ../index.php");
      exit;
  }

  // include config file
  require_once "config.php";

  // Define variables and set as empty
  $newPassword = $newPassword2 = "";
  $p1error = $p2error = "";
  // Process form when submitted
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Validate Password
      if(empty(trim($_POST["newPassword"]))) {
          $p1error = "Please enter a password.";
      } else if (strlen(trim($_POST["newPassword"])) < 6) {
          $p1error = "Password must have at least 6 characters.";
      } else {
          $newPassword = trim($_POST["newPassword"]);
      }
      // Validate Confirm Password.
      if(empty(trim($_POST["newPassword2"]))) {
          $p2error = "Please confirm your password";
      } else {
          $newPassword2 = trim($_POST["newPassword2"]);
          if(empty($p1error) && ($newPassword != $newPassword2)) {
              $p2error = "Passwords <b>DID NOT</b> match.";
          }
      }

      // Check input errors before database sql
      if(empty($p1error) && empty($p2error)) {
          // prepare sql
          $sql = "UPDATE users SET password = :password WHERE userid = :id";
          if($stmt = $pdoConn->prepare($sql)) {
              // Bind variables to prepared statement as parameters
              $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
              $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
              // Set parameters
              $param_password = password_hash($newPassword, PASSWORD_DEFAULT);
              $param_id = $_SESSION["id"];
              // Attempt to execute prepared statement
              if($stmt->execute()) {
                  // Password updated successfully / Destroy / Redirect
                  session_destroy();
                  header("Location: ../index.php");
                  exit();
              } else {
                  echo "Something went wrong with UPDATE";
              }
          }
          // close $stmt
          unset($stmt);
      }
      // close connection
      unset($pdoConn);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP_Login-password_reset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootStrap 4 CDN CSS external link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="../css/main.css" />
    <!-- Glyph Icons CSS -->
    <link rel="stylesheet" href="../css/glyphicon.css" />
</head>
<body>
    <header class="container-fluid text-center text-light py-4">
        <div>
            <div class="d-block">
                <img id="headpic" class="rounded-circle" src="../img/Andrew.JPG" />
            </div>
            <div>
                <h1 class="header-text d-inline">PHP BootStrap4 Login - Password Reset</h1>
                <span class="d-inline text-light2">By Andrew Harkins</span>
            </div>
        </div>
    </header>

    <section class="text-center" id="section-content">
        <div id="divAlert" class="container rounded"></div>
        <div class="container rounded contentdiv" id="contentdiv">
            <div class="pb-2 mt-4 mb-2 border-bottom clearfix">
                <h2>PHP Login Password Reset</h2>
                <a href="logout.php" class="btn btn-danger float-right">Sign out</a>
                <a class="btn btn-primary float-right" href="welcome.php">Home</a>
                <p>Fill out this form to reset your password.</p>
            </div>
            <form id="formreset" class="rounded" method="post" action="<?php echo
                  htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                 <fieldset>
                     <div class="form-group">
                         <?php if(isset($p1error)) {
                             echo '<span class="error"<b>' . $p1error . '</b></span>';
                         } ?>
                         <label>New Password</label>
                         <input type="password" id="txtPassword" class="form-control input-lg <?php echo(!empty($p1error)) ? 'is-invalid'
                             : ''; ?>" name="newPassword" />
                     </div>
                     <div class="form-group">
                         <?php if(isset($p2error)) {
                             echo '<span class="error"<b>' . $p2error . '</b></span>';
                         } ?>
                         <label>Confirm Password</label>
                         <input type="password" id="txtPassword2" class="form-control input-lg <?php echo(!empty($p2error)) ? 'is-invalid'
                            : ''; ?>" name="newPassword2" />
                     </div>
                     <div class="form-group">
                         <input type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit" />
                         <a class="btn btn-lg btn-danger" href="welcome.php">Cancel</a>
                     </div>
                 </fieldset>
            </form>
        </div>
</section>

    <!-- BootStrap 4 CDN JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
