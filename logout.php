<?php
  // Start session
  session_start();

  // Check if user is logged in
  if(isset($_SESSION['username'])) {
    require "php/db_connection.php";

    // Update database to reflect logout status
    if($con) {
      $username = $_SESSION['username'];
      $query = "UPDATE admin_credentials SET IS_LOGGED_IN = 'false' WHERE username = '$username'";
      $result = mysqli_query($con, $query);
    }

    // Destroy session
    session_destroy();
  }

  // Redirect to login page
  header("Location: login.php");
  exit();
?>
