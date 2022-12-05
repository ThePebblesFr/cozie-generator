<?php
    session_start();
    $_SESSION['flow'] = array();
    header('Location:add_question.php');
?>