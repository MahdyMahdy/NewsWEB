<?php
if(!empty($_POST['rate']))
{
	$user_id=$_SESSION['user_id'];
	$news_id=$_GET['news_id'];
	$rate=$_POST['rate'];
	include 'Connection.php';
	$query="INSERT INTO confionce VALUES($user_id,$news_id,$rate)";
	@mysqli_query($dbc,$query);
	$_POST['rate']="";
    mysqli_close($dbc);
}
?>