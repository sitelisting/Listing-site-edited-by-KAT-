<?php

session_start();
if($_SESSION['name']){
    $name = $_SESSION['name'];
}else{

    header('Location:login.php');
}

?>
