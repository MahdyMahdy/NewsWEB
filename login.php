<?php
if(!empty($_POST['LoginEmail']) && !empty($_POST['LoginPassword']))
{
  include 'Connection.php';
  $email=$_POST['LoginEmail'];
  $password=$_POST['LoginPassword'];
  $query = "SELECT * FROM users WHERE user_email='$email' AND user_password='$password'";
  if($r = mysqli_query($dbc, $query))
  {
      if($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
      {
        $_SESSION["user_id"]=$row["user_id"];
      }
  }
  mysqli_close($dbc);
}
?>