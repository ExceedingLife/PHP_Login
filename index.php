<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP_Login-login</title>
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
                <h1 class="header-text d-inline">PHP BootStrap4 Login - Home</h1>
                <span class="d-inline text-light2">By Andrew Harkins</span>
            </div>
        </div>
    </header>

    <section class="text-center" id="section-content">
        <div id="divAlert" class="container rounded"></div>
        <div class="container rounded contentdiv" id="contentdiv">

            <form id="formsignin" class="d-block rounded" method="post" onsubmit="return validateSubmit();">
                <img class=" rounded mb-4" src="img/bootstrap.png" data-toggle="tooltip" title="BootStrap4 & JavaScript Login - PHP SQL" />
                <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>
                <div class="glyphIconInputs">
                    <label for="txtUsername" class="sr-only">Username</label>
                    <input type="text" id="txtUsername" class="form-control" name="username" placeholder="Username" required autofocus />
                    <span class="glyphicon glyphicon-chevron-right" data-toggle="tooltip" title="Enter your Username"></span>
                </div>
                <div class="glyphIconInputs">
                    <label for="txtPassword" class="sr-only">Password</label>
                    <input type="password" id="txtPassword" class="form-control" name="password" placeholder="Password" required />
                    <span class="glyphicon glyphicon-lock" data-toggle="tooltip" title="Password must be at least 6 characters"></span>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me" />
                        Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                <div>
                    <a class="d-inline mr-3" href="php/register.php">Sign up Here</a>
                    <a class="d-inline ml-3" href="#">View Users Here</a>
                </div>
                <p class="mt-5 mb-3 text-muted">&copy;2016-2019</p>
            </form>
        </div>
    </section>

    <!-- BootStrap 4 CDN JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
