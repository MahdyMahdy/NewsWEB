<?php
if(!empty($_POST['SignUpName']) && !empty($_POST['SignUpEmail']) && !empty($_POST['SignUpPassword1']) && !empty($_POST['SignUpPassword2']))
{
      //check if the confirmation password match
  if($_POST['SignUpPassword1']==$_POST['SignUpPassword2'])
  {
    $email=$_POST['SignUpEmail'];
    include 'Connection.php';
          //check if the email alreday exists
    $query="SELECT COUNT(*) FROM users WHERE users.user_email='$email'";
    if($r = mysqli_query($dbc, $query))
    {
      $row = mysqli_fetch_array($r,MYSQLI_NUM);
      if($row[0]==0)
      {
        $name=$_POST['SignUpName'];
        $password=$_POST['SignUpPassword1'];
        $query="INSERT INTO users VALUES(0,'$name','$email','$password','user')";
        mysqli_query($dbc, $query);
        $query="SELECT user_id FROM users WHERE users.user_email='$email'";
        if($r = mysqli_query($dbc, $query))
        {
          $row = mysqli_fetch_array($r,MYSQLI_NUM);
          $_SESSION['user_id']=$row[0];
        }
      }
    }
    mysqli_close($dbc);
  }
}
?>