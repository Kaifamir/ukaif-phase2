<?php
  include "my-userDetails.php";
  if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    if (empty($uname)){
      header("Location: login.php?error=User Name is required");
      exit();
    }else if(empty($password)){
      header("Location: login.php?error=Password is required");
      exit();
    //else if details does not match sql stored details then display error message.
    }else{
      echo "Valid input";
      header("Location: blog.php");
    }


  }else{
    header("Location: login.php?");
    exit();
  }
?