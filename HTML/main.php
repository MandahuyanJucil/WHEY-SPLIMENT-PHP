<?php include 'inc/header.php'?>
<?php 
$product_ids=array();
/* session_destroy(); */

    if(filter_input(INPUT_GET,'action')=='paynow'){
      
      unset($_SESSION['shopping_cart']);
    }
?>

<?php  require_once 'productfunction.php' ?>
<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/mainpage.css">

<main class="main" >
         
            <div class="main__firstdiv">

                <?php 
                topcategory('ENDURANCE','en.jpg','','endurance.php');
                topcategory('NATURAL','natural.jpg','','natural.php');
                topcategory('SPORT','sp.jpg','','sports.php');
                
                
                ?>

                
                </div>
            </div>

       <!--  EXTRA CATEGORY
            <div class="main__seconddiv">
            <div class="main__second__container">
                   <h4 class="main__second__h1">NATURAL</h4>
                   <img src="/WHEY SUPPLIMENT/IMG/Backuplogo.png" alt="endurancepicute">
                   <p>THIS IS DISCRIPTION</p>
                   <div class="main__firsdiv__shop">
                   <button class="main__second__btn"><h3>Shop now</h3></button>
                   </div>
                </div>
            </div> -->

           <div class="main__thirddiv">
            <h2>WHEY SUPPLIMENT</h2>
           </div>

           <!-- <div class="main__fourdiv">
                      
           <?php  
             product('protine','BCAA.jpg','THIS IS ds','1250');
             product('Name','BCAA.jpg','asdadadadadadasdasdadasdasdasdasdadadada','1250');
             product('Name','BCAA.jpg','THIS IS DESCRIPTIOM','1250');
             product('Name','BCAA.jpg','THIS IS DESCRIPTIOM','1250');
             product('Name','BCAA.jpg','THIS IS DESCRIPTIOM','950');
             product('Name','BCAA.jpg','THIS IS DESCRIPTIOM','1250');
             product('Name','BCAA.jpg','THIS IS DESCRIPTIOM','400');
            
           ?> 
             
           </div> -->

           <?php include 'inc/productinclude.php' ?>
      </main>
     
      <?php include 'inc/footer.php' ?>