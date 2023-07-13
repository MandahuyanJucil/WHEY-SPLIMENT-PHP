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
         

         
      

      </main>
     
      <?php include 'inc/footer.php' ?>