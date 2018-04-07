<?php
session_start();

if (isset($_SESSION['image_name']))
{
    echo '<img class="form-control" style="width: 200px; height: 200px;" src="assets/images/users/'.$_SESSION['u_username'].'/'.$_SESSION['image_name'].'">';
}

?>