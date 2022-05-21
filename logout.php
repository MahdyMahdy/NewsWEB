<?php
if(!empty($_GET['logout']))
    unset($_SESSION['user_id']);
?>