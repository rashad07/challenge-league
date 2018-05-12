<?php

try {
    $conn = @mysqli_connect('localhost', 'root', '', 'challenge');
    if(!$conn)
    {
        echo '<center><span style="font-style: italic;font-size: 26px">Couldn\'t make connection to the Database!</span></center>';
        exit();
    }
}
catch(Exception $e){
    echo $e->getMessage();
}

?>