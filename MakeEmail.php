<?php
if(!empty($_POST['MakeEmail']))
{
  include 'Connection.php';
  $role=$_POST['role'];
  if($role=='ADMIN')
  $role='admin';
  else if($role=='MEDIA')
  $role='media';
  $email=$_POST['MakeEmail'];
  $query="UPDATE users SET users.user_role='$role' where users.user_email='$email'";
  if(!mysqli_query($dbc,$query))
  {
    $str='<p style="color: red;">Could not retrieve the data because:<br>';
    $str.=mysqli_error($dbc);
    $str.='</p><p>The query being run was: ';
    $str.=$query.'</p>';
    print $str;
  }
  mysqli_close($dbc);
}
?>