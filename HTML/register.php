

<?php include 'inc/header.php'?>
<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/register.css  ">

<main class="main">
         
         <div class="main__firstdiv">
               <div class="main__firstdiv__first">
                 <h1 class="main__firstdiv__first__h1">Register</h1>
                     <div class="main__firstdiv__first__container">
                         <form class="form__register" action="/WHEY SUPPLIMENT/database/signup.inc.php" method="post">
                         <label class="margin" for="name">name</label> <br>
                             <input class="margin" type="text" id="name" placeholder="name" name="name" required><br>
                             <label class="margin" for="username">Username</label> <br>
                             <input class="margin" type="text" id="username" placeholder="Username" name="username" required><br>
 
                             <label class="margin" for="password">Password</label> <br>
                             <input class="margin" type="password" id="password" placeholder="password" name="password" required><br>
                             <label class="margin" for="re-password">Re-Password</label> <br>
                             <input class="margin" type="password" name="re-password" id="re-password" placeholder="Retype-password" required><br>
                             <label class="margin" for="email">Email</label> <br>
                         <input class="margin" type="email" name="email" id="email" placeholder="Email" required>
                         <div class="main__firstdiv__first__container__sub-res">
                                 
                                 <button class="main__firstdiv__first__container__btn" type="submit" name="submit"> Sign up</button>

                                 <button class="main__firstdiv__first__container__btn" type="reset" name="reset"> Reset</button>
                         </div>
                         </form>
                         <div class="main__firstdiv__first__reg">
                                 
                             <a href="/WHEY SUPPLIMENT/HTML/login.php">LOG IN</a>
                        </div>
                     </div>
                     <?php   
           
           if(isset($_GET["error"])){
               if($_GET["error"] == "emtyinput"){
                 echo "<p>emtyinput</p>"; 
               }
               else if($_GET["error"] == "invalidemail"){
                 echo "<p>Invalid Email</p>"; 
               }
   
               else if($_GET["error"] == "passworddontmatch"){
                 echo "<p>Password DONT Match</p>"; 
               }
   
               else if($_GET["error"] == "usernametaken"){
                   echo "<p>Username Are Taken</p>"; 
                 }
   
               else if($_GET["error"] == "none"){
                   echo "<p>Register Succes!</p>"; 
                 }
               
           }
        ?>
               </div>
         </div>
        
     </main>

         
     

     <?php include 'inc/footer.php'?>