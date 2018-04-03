<?php
if (isset($_GET['logout'])) {
    session_start();
    session_unset();
    session_destroy();

    header("Location: login_page.php?logout=success");
}
else
    {
        header("Location: login_page.php?logout=fail");
    }
?>