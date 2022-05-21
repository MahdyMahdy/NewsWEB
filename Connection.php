<?php
  $dbc=@mysqli_connect('localhost','root','')
        or die("connection error:".@mysqli_errno($dbc).': '.@mysqli_error($dbc));
    $exist = mysqli_query($dbc,"SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'newsweb'");
    $exist = mysqli_fetch_array($exist,MYSQLI_NUM);
    $exist = $exist[0];
    if (!$exist)
    {
        mysqli_query($dbc,"CREATE DATABASE IF NOT EXISTS newsweb");
        if (@mysqli_select_db($dbc,'newsweb'))
        {
            $myfile = fopen("newsweb.sql", "r") or die("Unable to open file!");
            $queries =  fread($myfile,filesize("newsweb.sql"));
            fclose($myfile);
            $queries = explode('$$',$queries);
            foreach($queries as $query )
                mysqli_query($dbc,$query);
        }
    }
    else
    {
        @mysqli_select_db($dbc,'newsweb');
    }
 ?>
