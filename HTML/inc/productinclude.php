  <?php 

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


<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/productinclud.css">
<script defer src="/WHEY SUPPLIMENT/JS/allproduct.js"></script>

<main class="main">
           




<div class="main__firstdiv">




  <div class="main_container">

         <div class="main__product">

         
         

             
      
    
          <?php 
          $query = "SELECT * FROM cart";
          $result = mysqli_query($connect,$query);
          $resultcheck = mysqli_num_rows( $result);

          if( $resultcheck >1){
                while($row = mysqli_fetch_array($result)){
                    
                    if( $row['id']<=19 && $row['id'] >=10){
                    

                    ?>
                    <div class="main__pd">
                  <form  method="post" action="main.php?id=<?=$row['id']?>">
                      
                      <img src="/WHEY SUPPLIMENT/<?=$row['image'] ?>" alt="picture" >
                      <h2 class="h2__black"><?= $row['name']?></h2>
                      <h2 class="h2__black"><span>&#8369;</span> <?= number_format($row['price'],2); ?></h2>
                      <div class="mian__btn">
                        <input type="hidden" name="name" value="<?=$row['name'] ?>">
                        <input type="hidden" name="price" value="<?=$row['price'] ?>">
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
                    
                       
                 </form>       
                 </div>     
                 
                <?php
               
                   
                  }
                }  
          }
        
          ?>
         </div>
         
    
</div>

         
</div>





</main>