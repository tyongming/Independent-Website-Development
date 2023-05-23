
<?php


    //1.destroy the session
    session_destroy('access_token');

    //2.redirect to login page
    header("Location: ../");

?>