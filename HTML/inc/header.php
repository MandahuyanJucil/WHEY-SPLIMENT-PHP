
<?Php 
 session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,900;1,300;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/header-footer.css">
    <script defer src="/WHEY SUPPLIMENT/JS/login.js"></script>
    <title>Document</title>
</head>
<body>
    
<header id="home" class="header">
     
      <div class="header__firstdiv">
        <div class="header__firstdiv__first">
         <i id="header__firstdiv__first__bars" class="fa fa-bars" aria-hidden="true"></i>
        
          <a href="/WHEY SUPPLIMENT/HTML/main.php"><img src="/WHEY SUPPLIMENT/IMG/345972288_5904374736327936_1887889285831655848_n.jpg" alt="logo"></a>
        </div>
          
        <div class="header__firstdiv__second">
            <div class="header__firstdiv__thrid">

              <form  class='form__header'action="search.php" method="post">
                <input type="text" name="search" placeholder="Search"><button type="submit" name="submit-search"></button> 
              </form>

            </div>
            <?php     
              $connect = mysqli_connect("localhost","root","","cart_item"); 
               
              $slq= "SELECT * FROM  cart";
              $result=mysqli_query($connect,$slq);
              $queryResults = mysqli_num_rows($result);
                
    
              
              ?>
        </div>

       
        
        <div class="header__firstdiv__fifth">
        <div class="header__firstdiv__fourth">
        <?Php  
             
             if(isset($_SESSION["useruid"])){ 
                   echo "<a id='user' href='mainprofile.php'> <h4 class='header__firstdiv__fourth__name'>".$_SESSION["useruid"]."</h4></a>";
                 
                   
             }
             ?>
        <?Php  
             if(isset($_SESSION["useruid"])){ 
                 
             echo "<a id='cart' href='/WHEY SUPPLIMENT/HTML/cart.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>";
             }
              else {
               echo "<a id='cart' href='/WHEY SUPPLIMENT/HTML/login.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>";
             }
             ?>
          
 
        </div>
          <h2 class="header__firstdiv__fifth__h2"><a href="/WHEY SUPPLIMENT/HTML/aboutus.php">Developers</a></h2>
        </div>

      </div>
           
      <div class="header__seconddiv ">
          <ul class="header__seconddiv__ul">

          <?Php  
             
             if(isset($_SESSION["useruid"])){ 
                   echo "<li class='header__seconddiv__li'> <a href='/WHEY SUPPLIMENT/HTML/main.php'>Home</a></li>";
                   echo "<li class='header__seconddiv__li'><a href='/WHEY SUPPLIMENT/database/logout.php'>log out</a></li>";
                   echo "<li class='header__seconddiv__li'><a href='/WHEY SUPPLIMENT/HTML/mainprofile.php?id=".$_SESSION["ids"]."'>profile</a></li>";
              
             }
              else  {
              echo "<li class='header__seconddiv__li'> <a href='/WHEY SUPPLIMENT/HTML/main.php'>Home</a></li>";
              echo "<li class='header__seconddiv__li'> <a href='/WHEY SUPPLIMENT/HTML/login.php'>Log in</a></li>";
              
             }
             ?>

             <li class="header__seconddiv__li"><a href="/WHEY SUPPLIMENT/HTML/category.php">Categories</a></li>
             <li class="header__seconddiv__li"><a href="/WHEY SUPPLIMENT/HTML/deals.php">Deals</a></li>
             <li class="header__seconddiv__li"><a href="/WHEY SUPPLIMENT/HTML/allproduct.php">All Product</a></li>
         
          
          </ul>
      </div>
    </header>

   