<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP_Login- view users</title>
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
              <h1 class="header-text d-inline">PHP BootStrap4 Login - View Users</h1>
              <span class="d-inline text-light2">By Andrew Harkins</span>
          </div>
      </div>
  </header>
<?php
    require_once "config.php";
?>
  <section class="text-center" id="section-content">
      <div id="contentdiv" class="container rounded contentdiv">
          <div class="row">
              <div class="col-md-12">
                  <div class="pb-2 mt-4 mb-2 border-bottom clearfix">
                      <h2 class="float-left">PHP Login View All Users</h2>
                      <a class="btn btn-danger float-right mx-2" href="register.php">Create User</a>
                      <a class="btn btn-primary float-right mx-2" href="../index.php">Dashboard</a>
                  </div>
                  <?php
                        $sql = "SELECT * FROM users";
                        if($result = $pdoConn->query($sql)) {
                            if($result->rowCount() > 0) {
                                echo '<table class="table table-bordered">';
                                    echo '<thead class="thead-dark">';
                                        echo '<tr>';
                                            echo '<th scope="col">#</th>';
                                            echo '<th scope="col">Name</th>';
                                            echo '<th scope="col">Username</th>';
                                            echo '<th scope="col">Password</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while ($row = $result->fetch()) {
                                        echo '<tr>';
                                            echo '<th scope="row">' . $row["userid"] . '</th>';
                                            echo '<td>' . $row["name"] . '</td>';
                                            echo '<td>' . $row["username"] . '</td>';
                                            echo '<td colspan="2">' . $row["password"] . '</td>';
                                            echo '<td></td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                                unset($result);
                            } else {
                                echo "<p>No records were found in LoginDb</p>";
                            }
                        } else {
                            echo "ERROR: Could not execute the $sql" . $mysqli->error;
                        }
                        unset($pdoConn);
                  ?>

              </div>
          </div>
      </div>
  </section>

  <!-- BootStrap 4 CDN JavaScript -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
