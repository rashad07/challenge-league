<?php
 
 return $conn = mysqli_connect('localhost','root','','challenge');
 
 if(!$conn){
	 die("Connection failed" . mysqli_connect_error());
 }

?>