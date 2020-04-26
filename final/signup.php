<?php

require_once 'source/db_connect.php';

if(isset($_POST['signup-btn'])) {

      $username = $_POST['user-name'];
      $email = $_POST['user-email'];
      $password = $_POST['user-pass'];
      $confirm = $_POST['user-cnf'];

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $hashed_confirm = password_hash($confirm, PASSWORD_DEFAULT);

    try {
      if($username!="" && $email!="" && $password!="" && $confirm!="" && $password==$confirm){
        $SQLInsert = "INSERT INTO users (username, email, password, confirm)
                   VALUES (:username, :email, :password, :confirm)";

      $statement = $conn->prepare($SQLInsert);
      $statement->execute(array(':username' => $username,':email' => $email, ':password' => $hashed_password, ':confirm' => $hashed_confirm,));

      if($statement->rowCount() == 1) {
        header('location: index.html');
      }else{
        header('location: signup.html');
      }
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("something is wrong")';
      echo '</script>';
    }

      }
      
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>