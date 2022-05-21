<?php
///////////////////////////////////////////////////
//if the user is not loged in
if(empty($_SESSION["user_id"]))
print'<li><a href="section2">LogIn</a></li>';
        ///////////////////////////////////////////////////
        //if the user loged in
else {
echo '<li><a href="section3">Insert News</a></li>';
$page=$_SERVER['PHP_SELF'];
include 'Connection.php';
$id=$_SESSION["user_id"];
$query="SELECT users.user_role FROM users WHERE users.user_id=$id";
if($r = mysqli_query($dbc, $query))
{
    $row = mysqli_fetch_array($r,MYSQLI_NUM);
                //if the user is admin
    if($row[0]=='admin')
    {
    print'<li class="has-submenu"><a href="#section2">ADMIN</a>
        <ul class="sub-menu">
        <li style="width:250px;"><a href="Section4">Forbidden Words</a></li>
        <li style="width:250px;"><a href="Section5" >Make ADMIN/MEDIA</a></li>
        </ul>
    </li>';
    }
}
print"<li><a href='$page?logout=true' class='external'>LogOut</a></li>";
            ///////////////////////////////////////////////////////////////////////////
}
?>