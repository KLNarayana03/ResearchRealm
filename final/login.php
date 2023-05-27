<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

error_reporting(E_ALL | E_STRICT);  
ini_set('display_startup_errors',1);  
ini_set('display_errors',1);

if(isset($_POST['login-btn'])) {

    $email = $_POST['email'];
    $password = $_POST['user-pass'];

    try {
      $SQLQuery = "SELECT * FROM users WHERE email = :email";
      $statement = $conn->prepare($SQLQuery);
      $statement->execute(array(':email' => $email));

      while($row = $statement->fetch()) {
        $id = $row['id'];
        $hashed_password = $row['password'];
        $username = $row['username'];
        $useremail = $row['email'];

        if(password_verify($password, $hashed_password)) {
          $_SESSION['id'] = $id;
          $_SESSION['username'] = $username;
          $_SESSION['email'] = $useremail;
          header('location: landingpage.php');
        }
        else {
          echo "Error: Invalid username or password";
        }
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>