<?php
if(!empty($_POST['InsertTitle']) && !empty($_POST['InsertBody']) && !empty($_SESSION['user_id']) && !empty($_POST['InsertCat']))
{
  include 'Connection.php';
  $title=$_POST['InsertTitle'];
  $body=$_POST['InsertBody'];
  $cat=$_POST['InsertCat'];
  $query="SELECT * FROM forbiddenwords";
  $dont=0;
  //check if the news contains a forbidden words
  if($r = mysqli_query($dbc,$query))
  {
    while($row = mysqli_fetch_array($r,MYSQLI_NUM))
    {
      $tit=explode(" ",$title);
      foreach ($tit as $key => $value) {
          if(strtolower($value)===$row[0])
          {
            echo "<script>alert('Forbidden Words')</script>";
            $dont=1;
            break;
          }
      }
      $bod=explode(" ",$body);
      foreach ($bod as $key => $value) {
          if(strtolower($value)===$row[0])
          {
            echo "<script>alert('Forbidden Words')</script>";
            $dont=1;
            break;
          }
      }
    }
  }
	//if the news not contains a forbiddenwords
  if($dont==0)
  {
    $query="INSERT INTO news VALUES(0,'$title','$body',NOW(),'$cat')";
    if(@mysqli_query($dbc,$query))
    {
      $query="SELECT MAX(news.news_id) FROM news ";
      if($r = @mysqli_query($dbc,$query))
      {
        $row = mysqli_fetch_array($r,MYSQLI_NUM);
        $news_id = $row[0];
        $user_id=$_SESSION['user_id'];
        $query="INSERT INTO inserted_by VALUES($user_id,$news_id)";
        mysqli_query($dbc,$query);
      }
    }
  }
  mysqli_close($dbc);
}
?>