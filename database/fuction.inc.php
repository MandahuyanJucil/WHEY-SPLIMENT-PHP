<?php 

function emptyInputSignup($name,$email,$username,$password,$repassword){
$result;

if(empty($name)||empty($email)||empty($username)||empty($password)||($repassword)){
  $result = true;    
}
else{
  $result = false; 
}
  return  $result;
}

function invalidUid($username){
$result;

if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
  $result = true;    
}
else{
  $result = false; 
}
  return  $result;
}


function invalidemail($email){
    $result;
    
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $result = true;    
    }
    else{
      $result = false; 
    }
      return  $result;
    }

    function passwordMatch($repassword,$password) {
        $result;
        
        if ($password!==$repassword){
          $result = true;    
        }
        else{
          $result = false; 
        }
          return  $result;
        }


        function uidExists($conn,$username,$email) {
           $sql = "SELECT * FROM  users WHERE usersUid = ? OR usersEmail =?;";
           $stmt = mysqli_stmt_init($conn);

           if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location:/WHEY SUPPLIMENT/HTML/register.php? error=stmtfailed");
            exit();
           }
           mysqli_stmt_bind_param($stmt,"ss",$username,$email);
           mysqli_stmt_execute($stmt);

           $resultData = mysqli_stmt_get_result($stmt);
           if($row = mysqli_fetch_assoc($resultData)){
                
            return $row;
           }
           else{
                $result=false;
                return $result;
           }

           mysqli_stmt_close($stmt);
         }
    


         function createUser($conn,$name,$email,$username,$password) {
            $sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES(?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
 
            if(!mysqli_stmt_prepare($stmt,$sql)){
             header("location:/WHEY SUPPLIMENT/HTML/register.php? error=stmtfailed");
             exit();
            }

            $hashpassword= password_hash($password,PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashpassword);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location:/WHEY SUPPLIMENT/HTML/register.php? error=none");
            exit();
          }
     





 function emptyInputLogin($username,$password){
            $result;
        
            if(empty($username)||empty($password)){
            $result=true;
            }
            else{
            $result=false;
            }
            return $result;
        }       





        
        function loginuser($conn, $username, $password){
          $uidExists = uidExists($conn,$username,$username);

          if($uidExists === false){
      header("location:/WHEY SUPPLIMENT/HTML/login.php? error=Wrongusername");
    exit();
          }

        
          $passwordHashed = $uidExists["usersPwd"];
          $checkpassword = password_verify( $password, $passwordHashed);



          if($checkpassword === false){
            header("location:/WHEY SUPPLIMENT/HTML/login.php? error=Wrongpassword");
            exit();
          }

          else if($checkpassword === true){
          
            session_start();
            
            $_SESSION["ids"] = $uidExists["usersId"];
            $_SESSION["useruid"] = $uidExists["usersUid"];
       

            header("location:/WHEY SUPPLIMENT/HTML/main.php");
            exit();
          }
        }
?>























































          

/* 
          function emptyInputLogin($username,$password){
            $result;
        
            if(empty($username)||empty($password)){
            $result=true;
            }
            else{
            $result=false;
            }
            return $result;
        }       




  function loginUser($conn, $username, $password){
    $uidExists = uidExists($conn,$username,$username);

    if($uidExists === true){
        header("location:/WHEY SUPPLIMENT/HTML/login.php?error=Wrongusername");
        exit();
    }

    $hashpassword= $uidExists["usersPdw"];
    $checkpassword = password_verify($password,$hashpassword);


    if($checkpassword === false){
        header("location:/WHEY SUPPLIMENT/HTML/login.php?error=Wronglogin");
        exit();
    }
    else if($checkpassword === true){
       session_start(); 
       $_SESSION["userid"] = $uidExists["usersId"];
       $_SESSION["useruid"] = $uidExists["userUid"];
       header("location:/WHEY SUPPLIMENT/HTML/main.php");
       exit();
    }
  } */






































































































/* function emptyInputSignup($name,$password,$repassword,$email){
    $result;

    if(empty($name)||empty($email)||empty($repassword)||empty($password)){
    $result=true;
    }
    else{
    $result=false;
    }
    return $result;
}


function invalidUid($name){
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)){
    $result=true;
    }
    else{
    $result=false;
    }
    return $result;
}

function invalidemail($email){
    $result;

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $result=true;
    }
    else{
    $result=false;
    }
    return $result;
}


function passwordMatch($password,$repassword){
    $result;

    if($password !== $repassword){
    $result=true;
    }
    else{
    $result=false;
    }
    return $result;
}


function uidExists($conn,$name,$email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? or usersEmail= ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:/WHEY SUPPLIMENT/HTML/register.php?error=usernametaken ");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$name,$email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
      return $row;
    }
    else{
        $result = false;
        return  $result;
    }
    mysqli_stmt_close($stmt);
}





createuser($conn,$name,$password,$email){
    $sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES(?,?,?,?)=;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:/WHEY SUPPLIMENT/HTML/register.php?error=usernametaken ");
        exit();
    }
           
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
           
    mysqli_stmt_bind_param($stmt,"sss",$name, $hashedpwd,$email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:/WHEY SUPPLIMENT/HTML/register.php?error=none");
        exit();
} */