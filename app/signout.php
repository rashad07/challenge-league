<?php
if (isset($_GET['logout'])) {
    session_start();
    session_unset();
    session_destroy();

    header("Location: login.php?logout=success");
}
elseif (isset($_GET['delete-account'])) {
    session_start();
    session_unset();

    $_SESSION['delete-account']="success";
    echo '<script>window.location.href = "index-2.php";</script>';
}
elseif (isset($_GET['password-update']) and $_GET['password-update']="success")
{
    session_start();
    session_unset();

    $_SESSION['password-update'] = 'success';
    header("Location: login.php?password-update=success");
}
else
    {
        header("Location: login.php?logout=fail");
    }
?>