<?php  

$con=mysqli_connect("localhost","root","","loginpt");


?>







<?php 


$query="SELECT * FROM person";
$result = mysqli_query($con,$query);


while($row=mysqli_fetch_assoc($result)){




    if($row>0){
      echo "
      <form class='form__register' action='loginpractice.php' method='post'>
                         <label  for='name'>name</label> <br>
                             <input  type='text'; id='name'; placeholder='name' name='name'; required><br>
                             <label  for='username'>Username</label> <br>
                             <input  type='text' id='username' placeholder='Username' name='username' required><br>
 
                             <label  for='password'>Password</label> <br>
                             <input  type='password' id='password' placeholder='password' name='password' required><br>
                             <label  for='re-password'>Re-Password</label> <br>
                             <input  type='password' name='re-password' id='re-password' placeholder='Retype-password' required><br>
                             <label  for='email'>Email</label> <br>
                         <input  type='email' name='email' id='email' placeholder='Email' required>
                         <div>
                                 
                                 <button type='submit' name='submit'> Sign up</button>

                                 <button type='reset' name='reset'> Reset</button>
                         </div>
                         </form>
      ";

      if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['re-password'];
        crtnwac($con,$name,$email,$username,$password);
      }
       
     
   
    }
  
    
}
function crtnwac($con,$name,$email,$username,$password){
        
    $sql= "INSERT INTO person (name,username,password,email) VALUES(?,?,?,?);";
    $stmt=mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt,$sql)){
     header("location:/WHEY SUPPLIMENT/HTML/loginpractice.php? error=stmtfailed");
     exit();
    }
     
    $passwordhased=password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$passwordhased);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_close($stmt);
         header("location:/WHEY SUPPLIMENT/HTML/loginpractice.php? error=none");
         exit();

   }



?>