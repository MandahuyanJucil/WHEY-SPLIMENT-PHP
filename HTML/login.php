
    <?php include 'inc/header.php' ?>
    
  <link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/login.css">
    <main class="main">
         
        <div class="main__firstdiv">
              <div class="main__firstdiv__first">
                <h1 class="main__firstdiv__first__h1">Log In</h1>
                    <div class="main__firstdiv__first__container">
                        <form class="form__login" action="/WHEY SUPPLIMENT/database/login.inc.php" method="post">
                            <label class="margin" for="username">Username:</label>
                            <input class="margin" type="text" name="uid" id="username" placeholder="Username/Email" required>

                            <label class="margin" for="password">Password:</label>
                            <input class="margin" type="password" name="password" id="password" placeholder="password" required>
                            
                        <div class="main__firstdiv__first__container__sub-res">
                        <button class="main__firstdiv__first__container__btn" type="submit" name="submit">Log In</button>

                        <button class="main__firstdiv__first__container__btn" type="reset" name="reset"> Reset</button>
                        </div>
                        </form>

                         
                        <div class="main__firstdiv__first__reg">
                            
                            <a href="/WHEY SUPPLIMENT/HTML/register.php">Register</a>
                       </div>
                  
                    </div>
                    <?php   
           
           if(isset($_GET["error"])){
               if($_GET["error"] == "invalidName"){
                 echo "<p>Invalid Username</p>"; 
               }
               else if($_GET["error"] == "Wronglogin"){
                 echo "<p>Wrong login</p>"; 
               }
               else if($_GET["error"] == "Wrongusername"){
                echo "<p>Wrong username</p>"; 
              } 
              else if($_GET["error"] == "Wrongpassword"){
                echo "<p>Wrong password</p>"; 
              }
           }
        ?>
              </div>
        </div>
       
    </main>

    <?php include 'inc/footer.php'?>