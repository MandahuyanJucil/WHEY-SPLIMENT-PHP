<?php 

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['re-password'];
   
    
    require_once 'dbh.inc.php';
    require_once 'fuction.inc.php';

      

       if(invalidUid($username) !== false) {

        header("location:/WHEY SUPPLIMENT/HTML/register.php?error=invalidName");
           exit();
       }

       if(invalidemail($email) !== false) {

        header("location:/WHEY SUPPLIMENT/HTML/register.php?error=invalidemail");
           exit();
       }

       if(passwordMatch($repassword,$password) !== false) {

        header("location:/WHEY SUPPLIMENT/HTML/register.php?error=passworddontmatch");
           exit();
       }


       if(uidExists($conn,$username,$email) !== false) {

        header("location:/WHEY SUPPLIMENT/HTML/register.php?error=usernametaken ");
           exit();
       }

        createUser($conn,$name,$email,$username,$password);
      



}
else{
  header("location:/WHEY SUPPLIMENT/HTML/register.php?");
  exit();
}