
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
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/loginsystem/CSS/main.css">
    <script defer src="/loginsystem/JS/main.js"></script>
    <title>Document</title>
</head>
<body>
<header class="header">
 <h1 class="header__h1">this is header</h1>
</header>

<main class="main">


    <div class="main__wraper">
     
    <?php 
      include 'dataconn.php';
    
       $query ="SELECT * FROM cart";
       $stm=$pdo->prepare($query);
       $stm->execute();

       $result= $stm->fetchAll();



       if($result){
          foreach($result as $row){

            if($row['id']>9 & $row['id']<14 ){
            echo '
                     
                          <form action="cartupdate.php?action=add&id='.$row['id'].'" method="post">
                          <div class="main__product">
                                    <div class="main__item">
                              <img src="/loginsystem/'.$row['image'].'" alt="Productpicture">
                              <h2>'.$row['name'].'</h2>
                                  <div class="main__details">   
                                    <h5>Price:'.number_format($row['price'],2).'</h5>
                                     <input type="hidden" name="name" value="'.$row['name'].'" >
                                     <input type="hidden" name="price" value="'.$row['price'].'" >
                                     <input type="number" name="quantity" value="1">
                                     <input type="submit" name="add_to_cart" value="ADD TO CART">
                                           </div>
                                     </div>
                                  <div>
                             </form>
                  
            ';
          }
        }
       }
       else{
            echo "<h3>NO</h3>";
       }
    ?>
      

    
           
      </div>
     <a href="/WHEY SUPPLIMENT/HTML/newcart/cartversion2.php">main</a>
</main>

<footer class="footer">


</footer> 
</body>
</html>
