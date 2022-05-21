<?php
if(!empty($_POST['word']))
{
  $word=strtolower($_POST['word']);
  if(stristr($word,' '))
  {
    echo "<script>alert('You cant put space')</script>";
  }
  else {
  include 'Connection.php';
  $query = "INSERT INTO `forbiddenwords`(`word`) VALUES ('$word')";
  mysqli_query($dbc, $query);
  mysqli_close($dbc);
}
}
?>