<?php
session_start() ;
   
if (!isset($_SESSION['username']))
{
    include 'src/Views/loginForm.php';
    die();
}


require('src/Models/model.php');

$req = rwUpload();

require('src/Views/uploadAndRead.php');



?>
