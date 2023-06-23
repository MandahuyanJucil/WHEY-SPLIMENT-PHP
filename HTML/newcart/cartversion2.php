

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
    ?>


    
           
      </div>

</main>

<footer class="footer">

<table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>


<?php
if(!empty( $_SESSION['shopping_cart'])):

  $total=0;

  foreach($_SESSION['shopping_cart'] as $key => $product):

?>
<tr>
  
  <td><?php  echo $product['name']; ?></td>
  <td><?php  echo $product['quantity']; ?></td>
  <td><?php  echo number_format($product['price'],2); ?></td>
  <td><?php  echo number_format($product['price'] * $product['quantity'],2); ?></td>
  <td><a href="cartversion2.php?action=delete&id=<?php echo $product['id']?>"><h6>remove</h6></a></td>
</tr>
<?php 
  $total=$total+($product['quantity']*$product['price']);
endforeach;
?>
<tr>
   <td>TOTAL</td>
   <td><?php echo number_format($total,2); ?></td>
   <td></td>
</tr>
<tr>
  <td>
    <?php  
     if (isset($_SESSION['shopping_cart'])):
      if(count($_SESSION['shopping_cart'])>0):
      ?>
      <a href="#">Checkout</a>
      <?php endif; endif; ?>
  </td>
</tr>
<?php endif; ?>
</table>
<a href="/WHEY SUPPLIMENT//HTML/newcart/cartupdate.php">cart</a>
</footer> 
</body>
</html>