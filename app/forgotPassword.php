<?php
include 'header.php';
?>


<section id="content">
    <div class="container">
        <div class="row">
            <div style="background-color: #ebebeb;left: 25%" class="col-md-6">
                <center><h2 class="medium-title" style="color: grey">Enter the Email of Your Account</h2></center>
                <form method="POST" action="resetRequest.php">
                    <div class="form-group">
                        <?php
//                        echo date('m-d-Y h:i:s', time());
                        if (isset($_SESSION['empty_error']))
                        {
                            echo "\xe2\x9d\x8c".'
                                    <center>
                                    <span style="color: #cb171e;">'.$_SESSION['empty_error'].'</span>
                                    <input style="color: black" class="form-control" name="email" id="email" type="text" >
                                    </center>';
                            unset($_SESSION['empty_error']);
                        }
                        elseif (isset($_SESSION['not_found']))
                        {
                            echo "\xe2\x9d\x8c".'
                                    <center>
                                    <span style="color: #cb171e;">'.$_SESSION['not_found'].'</span>
                                    <input style="color: black" class="form-control" name="email" id="email" type="text" >
                                    </center>';
                            unset($_SESSION['not_found']);
                        }
                        elseif (isset($_SESSION['verify_error']))
                        {
                            echo "\xe2\x9d\x8c".'
                                    <center>
                                    <span style="color: #cb171e;">'.$_SESSION['verify_error'].'</span>
                                    <input style="color: black" class="form-control" name="email" id="email" type="text" >
                                    </center>';
                            unset($_SESSION['verify_error']);
                        }
                        elseif (isset($_SESSION['deleted-account']))
                        {
                            echo '<center>
                                    <span style="color: #cb171e;">'.$_SESSION['deleted-account'].'</span>
                                    <input style="color: black" class="form-control" name="email" id="email" type="text" >
                                    </center>';
                            unset($_SESSION['deleted-account']);
                        }
                        elseif (isset($_SESSION['email_success']))
                        {
                            echo '<center>
                                    <span style="color: green;">'. $_SESSION['email_success'].'</span>
                                    </center>';
                            unset( $_SESSION['email_success']);
                        }
                        else
                        {
                            if (!isset($_SESSION['email_success']))
                            {
                                echo '<input style="color: black" class="form-control" name="email" id="email" type="text" >';
                            }
                            else
                            {
                                echo '<a style="text-decoration: underline" href="forgotPassword.php">Back</a>';
                            }
                        }
                        ?>
                    </div>
                    <center>
                        <button style="" type="submit" id="submit" name="submit" class="btn btn-primary">Continue</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
include 'footer.html';
?>

