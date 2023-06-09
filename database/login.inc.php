<?php 

if(isset($_POST["submit"])){

    $username = $_POST["uid"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'fuction.inc.php';
   
   if(emptyInputLogin($username,$password)!== false){

    header("location:/WHEY SUPPLIMENT/HTML/login.php? error=emtyinput");
    exit();
   }
    
   loginuser($conn, $username, $password);
}
else
{
 header("location:/WHEY SUPPLIMENT/HTML/main.php");
 exit();
}