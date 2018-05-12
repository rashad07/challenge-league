<?php
session_start();

$username=$_SESSION['u_username'];
$u_id = $_SESSION['u_id'];
include_once 'dbc.php';
$sql_media = "Select * from media where user_id ='$u_id' order by uploaded_at desc";
$result_media =mysqli_query($conn,$sql_media);
if (mysqli_num_rows($result_media)>0) {
    $row_media = mysqli_fetch_assoc($result_media);
    $imagename = $row_media['name'];

    if (unlink("images/users/$username/$imagename")) {
        $sql_delete_media = "delete from media where user_id ='$u_id'";
        $result_delete_media = mysqli_query($conn, $sql_delete_media);
        mysqli_close($conn);
        header("Location: profile.php?media-delete=success");
        exit();
    } else {
        echo "Something wrong happened!Media can not be Deleted!";
    }
}
else{
    echo "Not found any image!";
}

?>