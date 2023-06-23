

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

 

  
    
?>
 

<?php include 'inc/header.php'?>



<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/deals.css">

<main class="main">



<div class="main__firstdiv__wraper">
<?php        
date_default_timezone_set('Asia/Manila');
$weaks=date("m/d/y");
$weaksword=date("l");
$hours=date('g');
$hour=date('i A');
 

      
        $gretingrow = "<div class='main__datecontainer'>
         <div class='main__deals'> <h3>".$weaksword." DEALS</h3></div>

         <div class='main__dateandtime'> <h4 class='main__time'>".$hours.":".$hour." </h4> <h4 class='main__date'>".$weaks."</h4></div>
                </div>
                
                    
                 
        

                ";
            
                echo($gretingrow);

              ?>





<?php 





if(isset($_POST['add_to_cart'])){

  if(isset($_SESSION['cart'])){
        $session_array_id = array_column($_SESSION['cart'],"id");



        if(!in_array($_GET['id'],$session_array_id)){
          $session_array = array(

            'id'=> $_GET['id'],
            "name" => $_POST['name'],
            "price" => $_POST ['price'],
            "quantity" => $_POST['quantity']
         );
 
         $_SESSION['cart'][]=$session_array;

        }
      }
      else{
        $session_array = array(

           'id'=> $_GET['id'],
           "name" => $_POST['name'],
           "price" => $_POST ['price'],
           "quantity" => $_POST['quantity']
        );

        $_SESSION['cart'][]=$session_array;
      }
}


          $query = "SELECT * FROM cart";
          $result = mysqli_query($connect,$query);

           
           

          while($row = mysqli_fetch_array($result)) {

            $discount=$row['price'] *0.2;
            $discountedprice =$row['price']-$discount;



            if($row['id']>8 & $row['id']<19){
            
            
            ?>
              <div id="product<?=$row['id']?>" class="main__pd">
            <form  method="post" action="deals.php?id=<?=$row['id']?>"   >
                
                <img src="/WHEY SUPPLIMENT/<?=$row['image'] ?>" alt="picture" >
                <h2><?= $row['name']?></h2>
                <h2><span>&#8369;</span><?= number_format( $discountedprice) ?></h2> <h2 class="main__oldprice"> <?= number_format($row['price'],2);?></h2> 
                <div class="mian__btn">
                  <input type="hidden" name="name" value="<?=$row['name'] ?>">
                  <input type="hidden" name="price" value="<?= $discountedprice?>">
                  <div class="main__quantitydiv">
                    <input class="main__quantity" type="number" name="quantity" value="1">
                  </div>   
                  <?Php  

             if(isset($_SESSION["useruid"])){ 
                 
              echo "
              
              <div class='main__btn'>
              <button class='btn'>
                 <input type='submit' name='add_to_cart' value='Add To Cart'>  
              </button>
                

              </div>
              "; 
             }
              else {
          
               echo  "
               <div class='main__btn'>
                  <a href='login.php'> <input type='button' name='none' value='Add To Cart'></a>
                  
               </div>
               ";
             }
             ?>
                 </div>
                 </div>
              

           </form>     
           <?php
          }
    }
          ?>












     
  

        </div>

</main>






























<?php include 'inc/footer.php' ?>