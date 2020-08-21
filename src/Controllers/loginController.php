<?php

if($_POST)
{ 
    
require('../Models/Database.php');



  
        $username =$_POST['username'];
        $password =$_POST['password'];
        $pass=sha1($password);

        $query = $bdd->prepare("SELECT * FROM user WHERE login = '".$username."' AND password = '".$pass."' ");
        $query->execute();
        $result = $query->fetch();

            if($result > 0) {
            //$data = $result[0];
            session_start();
            $_SESSION['username']=$username;
            header('Location: ../../index.php');
        } 
        else {
            echo "login ou password incorrect";
        }
     
}

?>