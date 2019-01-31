<?php
// mySQL database connection data.
    define("DB_Server", "localhost");
    define("DB_Username", "root");
    define("DB_Password", "password");
    define("DB_Name", "logindb");

/* Attempt to connect to MySQL Database */
    try {
        $pdoConn = new PDO("mysql:host=" . DB_Server . ";dbname=" .
                            DB_Name, DB_Username, DB_Password);

        //echo "Successfully Connected@!";
    // Set the PDO error mode to exception.
        $pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      //echo $e->getMessage();
        die("Error: Could not connect. " . $e->getMessage());
    }
