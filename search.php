<?php include "Connection.php";
            /////////////////////////////////////////////////////////////////////////////////////////////
            //search word
if(!empty($_GET['search']))
{
    $search=$_GET['search'];
                //get all the news contain the search word
    $query="SELECT * FROM news,inserted_by,users where news.news_id=inserted_by.news_id and users.user_id=inserted_by.user_id";
    if ($r = @mysqli_query($dbc,$query))
    {
        if(empty($_GET['page']))
        {
            $page=0;
        }
        else {
            $page=$_GET['page']-1;
        }
        $count=0;
        while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
        {
                if(stristr(strtolower($row['news_title']),strtolower($search)))
                {
                    if($count >= $page*5 && $count < ($page+1)*5){
                    print "<li><a href=\"index.php?news_id={$row['news_id']}\">{$row['news_title']} </a><br>";
                    print "Date : {$row['news_date']} --- Inserted_by : {$row['user_name']}</li><hr>";}
                    $count++;
                }
        }
        print "<div class='row' style='margin:10px;'>";
                            //next and Previous page
        if($page!=0){
        print "<form action='index.php' method='get'>
        <button type'submit'>Previous Page</button>
        <input type='hidden' name='search' value='$search'>
        <input type='hidden' name='page' value='$page'>
        </form>";}
        if($count>($page+1)*5){
            $page+=2;
        print "<form action='index.php' method='get'>
        <button type'submit'>Next Page</button>
        <input type='hidden' name='search' value='$search'>
        <input type='hidden' name='page' value='$page'>
        </form>";}
        print " </div>";
    }
}
            //////////////////////////////////////////////////////////////////////////////////
            //open the news to read
else if(!empty($_GET['news_id']))
{
    $query="SELECT news.news_title,news.news_body FROM news
    where news.news_id=".$_GET['news_id'];
    if ($r = @mysqli_query($dbc,$query))
    {
        $row = mysqli_fetch_array($r,MYSQLI_ASSOC);
        print "<center><h2>{$row['news_title']}</h2></center>";
        print "<p >{$row['news_body']} </p>";
        print '<center><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
                            //if the news is not rated
                            if(!empty($_SESSION['user_id']))
        {
            $user_id=$_SESSION['user_id'];
            $news_id=$_GET['news_id'];
            $query="SELECT COUNT(*) FROM confionce WHERE confionce.user_id=$user_id AND confionce.news_id=$news_id";
            if($r = @mysqli_query($dbc,$query))
            {
            $row = mysqli_fetch_array($r,MYSQLI_NUM);
            if($row[0]==0)
            {
                                        //rate stars
                for($i=0;$i<10;$i++)
                {
                print "<span class=\"fa fa-star\" id=\"star$i\"></span>";
                }
                print '</center>';
                $id=$_GET['news_id'];
                print "<form  action=\"index.php?news_id=$id\" method=\"post\">
                <input type=\"hidden\" name=\"rate\" id=\"hiddenrate\" >
                <center><input type=\"submit\" value=\"Rate\" ></center>
                </form>";
            }
            }
        else
        {
                // Query didn't run.
                $str='<p style="color: red;">Could not retrieve the data because:<br>';
                $str.=mysqli_error($dbc);
                $str.='</p><p>The query being run was: ';
                $str.=$query.'</p>';
                print $str;
        }
        }
    }
    else
    {
        // Query didn't run.
            $str='<p style="color: red;">Could not retrieve the data because:<br>';
            $str.=mysqli_error($dbc);
            $str.='</p><p>The query being run was: ';
            $str.=$query.'</p>';
            print $str;
    }
}
            /////////////////////////////////////////////////////////////////////////////////////////////////
else if(!empty($_GET['cat']))
{
                //news of users
    if($_GET['cat']=='users'){
    $query="SELECT news.news_id,news.news_title,users.user_name,news.news_date FROM news,users,inserted_by
    where news.news_id=inserted_by.news_id and inserted_by.user_id=users.user_id
    and users.user_role='user' order by news.news_date desc";
    }
                //news of medias
    else if($_GET['cat']=='media'){
    $query="SELECT news.news_id,news.news_title,users.user_name,news.news_date FROM news,users,inserted_by
    where news.news_id=inserted_by.news_id and inserted_by.user_id=users.user_id
    and users.user_role='media' order by news.news_date desc";
    }
                //news of top news
    else if($_GET['cat']=='top')
    {
    $query="SELECT data3.news_id,data3.news_title,users.user_name,data3.rate,news.news_date FROM data3,users,news,inserted_by
        WHERE data3.news_id=inserted_by.news_id and inserted_by.user_id=users.user_id and news.news_id=data3.news_id
        order by data3.rate DESC";
    }
                //news of recents
    else if($_GET['cat']=='recents')
    {
    $query="SELECT news.news_id,news.news_title,news.news_date,users.user_name FROM news,users,inserted_by
        WHERE news.news_id=inserted_by.news_id and inserted_by.user_id=users.user_id
        order by news.news_date DESC";
    }
                //news of sports,politics,Technology,Health
    else
    {
    $cat=$_GET['cat'];
    $query="SELECT news.news_id,news.news_title,news.news_date,users.user_name FROM news,users,inserted_by
        WHERE news.news_id=inserted_by.news_id and inserted_by.user_id=users.user_id and news.category='$cat'
        order by news.news_date DESC";
    }
    if ($r = @mysqli_query($dbc,$query))
    {
        if(empty($_GET['page']))
        {
            $page=0;
        }
        else {
            $page=$_GET['page']-1;
        }
        $count=0;
        while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
        {
                if($count >= $page*5 && $count < ($page+1)*5){
                print "<li><a href=\"index.php?news_id={$row['news_id']}\">{$row['news_title']} </a><br>";
                if($_GET['cat']=='top')
                {
                print "Rate : {$row['rate']}/10 ---";
                }
                print "Date : {$row['news_date']} --- Inserted_by : {$row['user_name']}</li><hr>";
                }
                $count++;
            }
            $cat=$_GET['cat'];
            print "<div class='row' style='margin:10px;'>";
            if($page!=0){
            print "<form action='index.php' method='get'>
            <button type'submit'>Previous Page</button>
            <input type='hidden' name='cat' value='$cat'>
            <input type='hidden' name='page' value='$page'>
            </form>";}
            if($count>=($page+1)*5){
                $page+=2;
            print "<form action='index.php' method='get'>
            <button type'submit'>Next Page</button>
            <input type='hidden' name='cat' value='$cat'>
            <input type='hidden' name='page' value='$page'>
            </form>";}
            print " </div>";
    }
    else
    {
        // Query didn't run.
            $str='<p style="color: red;">Could not retrieve the data because:<br>';
            $str.=mysqli_error($dbc);
            $str.='</p><p>The query being run was: ';
            $str.=$query.'</p>';
            print $str;
    }
}
else {
    echo "<script>window.location.replace(\"index.php?cat=recents\")</script>";
}
            /////////////////////////////////////////////////////////////////////////////
?>