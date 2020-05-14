<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

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

        if(password_verify($password, $hashed_password)) {
          $_SESSION['id'] = $id;
          $_SESSION['username'] = $username;
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