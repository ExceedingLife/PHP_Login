<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");

    //mySQL database config
require_once "config.php";

// Define all variables and initialize them as 'empty'
$name = $username = $password = $password2 = "";
$nameerror = $usernameerror = $passworderror = $password2error = "";

// Process data when the form is submitted.
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate 'Username'
    if(empty(trim($_POST["username"]))) {
        $usernameerror = "Please enter a Username.";
    } else {
        // Prepare a SELECT statement.
        $sql = "SELECT userid FROM users WHERE username = :username";
        if($stmt = $pdoConn->prepare($sql)) {
            // Bind variables to prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            // Set parameters
            $param_username = trim($_POST["username"]);
            // Attempt to execute prepared statement
            if($stmt->execute()) {
                if($stmt->rowCount() == 1) {
                    $usernameerror = "Username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Something went wrong with SELECT, please try again later.";
            }
        }
        // Close $stmt
        unset($stmt);
    }
    //Name check
    if(empty(trim($_POST["name"]))) {
        $nameerror = "Please enter a name.";
    } else {
        $name = trim($_POST["name"]);
    }
    // Validate Password
    if(empty(trim($_POST["password"]))) {
        $passworderror = "Please enter a password.";
    } else if (strlen(trim($_POST["password"])) < 6) {
        $passworderror = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    // Validate Confirm Password.
    if(empty(trim($_POST["password2"]))) {
        $password2error = "Please confirm your password";
    } else {
        $pass2 = trim($_POST["password2"]);
        if(empty($passworderror) && ($password != $pass2)) {
            $password2error = "Passwords <b>DID NOT</b> match.";
        }
    }

    //Check for inputs on form to continue.
    // Error checks or input checks.
    if(!empty($name) && !empty($username) && !empty($password) && !empty($pass2)) {
        // Prepare SELECT statement
        $sql = "INSERT INTO  users(name, username, password) " .
               "VALUES (:name, :username, :password)";

         if($stmt = $pdoConn->prepare($sql)) {
            // Bind variables to prepared statement as parameters
            $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_pass, PDO::PARAM_STR);
            // Set parameters
            $param_name = $name;
            $param_username = $username;
            $param_pass = password_hash($password, PASSWORD_DEFAULT);
            // attempt to execute the prepared Statement
            if($stmt->execute()) {
                // Determine if Success or Error
                header("Location: ../index.php");
                //echo "all good";
            } else {
                echo "Something went wrong with INSERT";
            }
        } else {
            echo "Other side of prepare.";
        }
        // Close Statement
        unset($stmt);
    } else {
         $errormsg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" ' .
                     'class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</button>' .
                     'All fields are required to continue</div>';
    }
    // Close connection
    unset($pdoConn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP_Login-register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootStrap 4 CDN CSS external link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="../css/main.css" />
</head>
<body>
    <header class="container-fluid text-center text-light py-4">
        <div>
            <div class="d-block">
                <img id="headpic" class="rounded-circle" src="../img/Andrew.JPG" />
            </div>
            <div>
                <h1 class="header-text d-inline">PHP BootStrap4 Login - Register</h1>
                <span class="d-inline text-light2">By Andrew Harkins</span>
            </div>
        </div>
    </header>
    <section class="text-center" id="section-content">
        <div id="divAlert" class="container rounded">
            <?php
                if(isset($errorMsg)) {
                    echo $errorMsg;
                }
            ?>
        </div>
        <div class="container rounded contentdiv" id="contentdiv">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-body">
                        <form id="formregister" class="rounded" method="post" onsubmit="return validationRegister();"
                         action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <h3 class="text-center mb-4">Create an Account</h3>
                            <div id="alertArea" class="container rounded"></div>
                            <fieldset>
                                <div class="form-group">
                                    <?php if(isset($nameerror)) {
                                        echo '<span id="error"><b>' . $nameerror . '</b></span>';
                                    } ?>
                                    <input class="form-control input-lg <?php echo (!empty($nameerror)) ? 'is-invalid'
                                    : ''; ?>" placeholder="Your Name" id="txtName" name="name" type="text">
                                </div>
                                <div class="form-group">
                                    <?php if(isset($usernameerror)) {
                                        echo '<span id="error"><b>' . $usernameerror . '</b></span>';
                                    }?>
                                    <input class="form-control input-lg <?php echo (!empty($usernameerror)) ? 'is-invalid'
                                    : ''; ?>" placeholder="Username" id="txtUsername" name="username" type="text">
                                </div>
                                <div class="form-group">
                                    <?php if(isset($passworderror)) {
                                        echo '<span id="error"><b>' . $passworderror . '</b></span>';
                                    }?>
                                    <input class="form-control input-lg <?php echo (!empty($passworderror)) ? 'is-invalid'
                                    : ''; ?>" placeholder="Password"
                                           id="txtPassword" name="password" type="password">
                                </div>
                                <div class="form-group">
                                    <?php if(isset($password2error)) {
                                        echo '<span id="error"><b>' . $password2error . '</b></span>';
                                    }?>
                                    <input class="form-control input-lg <?php echo (!empty($password2error)) ? 'is-invalid'
                                    : ''; ?>" placeholder="Confirm Password"
                                           id="txtPassword2" name="password2" type="password">
                                </div>
                                <div class="form-check">
                                    <input name="form-check-input d-inline" type="checkbox" id="chkTerms" required>
                                    <label class="form-check-label small d-inline" for="chkTerms">I read and agree to the <a id="terms" href="JavaScript:termsAccept()">terms of service</a></label>
                                </div>
                                <input class="btn btn-lg btn-primary btn-block" id="btnRegister" name="submit" value="Sign Up" type="submit" />
                                <a class="btn btn-lg btn-danger btn-block" id="btnCancel" href="../index.php">Cancel</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BootStrap 4 CDN JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/register.js"></script>
</body>
</html>
