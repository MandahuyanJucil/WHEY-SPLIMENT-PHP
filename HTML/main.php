<?php 
session_start();
$product_ids=array();
/* session_destroy(); */

if(filter_input(INPUT_POST,'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){
           $count=count($_SESSION['shopping_cart']);
           $product_ids=array_column($_SESSION['shopping_cart'],'id');

           if(!in_array(filter_input(INPUT_GET,'id'),$product_ids)){
              $_SESSION['shopping_cart'][$count]=array(
              'id'=>filter_input(INPUT_GET,'id'),
              'name'=>filter_input(INPUT_POST,'name'),
              'price'=>filter_input(INPUT_POST,'price'),
              'quantity'=>filter_input(INPUT_POST,'quantity')
             );
           }
           else{
              for($i=0; $i<count($product_ids); $i++){
                  if($product_ids[$i]==filter_input(INPUT_GET,'id')){
                    $_SESSION['shopping_cart'][$i]['quantity']+=filter_input(INPUT_POST,'quantity');  
                  }
              }
           }
    }
    else{
      $_SESSION['shopping_cart'][0]=array(
       'id'=>filter_input(INPUT_GET,'id'),
       'name'=>filter_input(INPUT_POST,'name'),
       'price'=>filter_input(INPUT_POST,'price'),
       'quantity'=>filter_input(INPUT_POST,'quantity')
      );
    }
}

    if(filter_input(INPUT_GET,'action')=='delete'){
      foreach($_SESSION['shopping_cart'] as $key => $product){
        if($product['id']==filter_input(INPUT_GET,'id')){
          unset($_SESSION['shopping_cart'][$key]);
        }
      }
      $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
    }
    if(filter_input(INPUT_GET,'action')=='paynow'){
     unset( $_SESSION['shopping_cart']);
    }
?>
<?php include 'inc/header.php'?>
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