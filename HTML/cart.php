

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

<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/cart.css">
<script defer src="/WHEY SUPPLIMENT/JS/cart.js"></script>

<main class="main">


    <div class="main__wraper">
     
    <?php 
      include 'newcart/dataconn.php';
    
       $query ="SELECT * FROM cart";
       $stm=$pdo->prepare($query);
       $stm->execute();

       $result= $stm->fetchAll();
    ?>


    
           

      <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th></th>
            </tr>


<?php
if(!empty( $_SESSION['shopping_cart'])):

  $total=0;

  foreach($_SESSION['shopping_cart'] as $key => $product):

?>
<tr>
  
  <td><h6 class="main__tabledata"><?php  echo $product['name']; ?></h6></td>
  <td><h6 class="main__tabledata"><?php  echo $product['quantity']; ?></h6></td>
  <td><h6 class="main__tabledata"><span>&#8369;</span> <?php  echo number_format($product['price'],2); ?></h6></td>
  <td><h6 class="main__tabledata"><span>&#8369;</span> <?php  echo number_format($product['price'] * $product['quantity'],2); ?></h6></td>
  <td><a href="cart.php?action=delete&id=<?php echo $product['id']?>"><h6 class="main__tabledata trashbin"><i style='font-size:24px' class='fas'>&#xf2ed;</i></h6></a></td>
</tr>
<?php 
  $total=$total+($product['quantity']*$product['price']);
endforeach;
?>
<tr>
  <td colspan="3"></td>
   <td colspan=""><h6 class="main__tabledata totalprice">TOTAL:<span>&#8369;</span><?php echo number_format($total,2); ?></h6></td>
   <td>

    <?php  
     if (isset($_SESSION['shopping_cart'])):
      if(count($_SESSION['shopping_cart'])>0):
      ?>
       <a href="#"><h6 class="main__tabledata" id="check">Checkout</h6></a>
      <?php endif; endif; ?>
      
  </td>
</tr>

<?php endif; ?>
</table>
</div>








<div class="main__checkout">
         
           

      <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th colspan="2">Total</th>
                <th></th>
            </tr>


<?php
if(!empty( $_SESSION['shopping_cart'])):

  $total=0;

  foreach($_SESSION['shopping_cart'] as $key => $product):

?>
<tr>
  
  <td><h6 class="main__tabledata"><?php  echo $product['name']; ?></h6></td>
  <td><h6 class="main__tabledata"><?php  echo $product['quantity']; ?></h6></td>
  <td><h6 class="main__tabledata"><?php  echo number_format($product['price'],2); ?></h6></td>
  <td colspan="2"><h6 class="main__tabledata"><?php  echo number_format($product['price'] * $product['quantity'],2); ?></h6></td>
  
</tr>
<?php 
  $total=$total+($product['quantity']*$product['price']);
endforeach;
?>
<tr>
  <td colspan="3"></td>
   <td colspan=""><h6 class="main__tabledata">TOTAL:<?php echo number_format($total,2); ?></h6></td>
  
</tr>
<tr>
<td>

<?php  
 if (isset($_SESSION['shopping_cart'])):
  if(count($_SESSION['shopping_cart'])>0):
  ?>
   <a href="#"><h6 class="main__tabledata close" id="checkclose">Close</h6></a>
  <?php endif; endif; ?>
  
</td> 
<td colspan="2"><h6 class="main__tabledata"><label for="gender">Payment:</label>  <select id="gender">
        <option>COD</option>
        <option>GCASH</option>
        
</select></h6>
</td> 

<td colspan="2"><a href="receipt.php"><h6 class="main__tabledata paynow">PAY NOW<h6></a> </td> 
</tr>

<?php endif; ?>
</table>

</div>
</main>


<?php include 'inc/footer.php'?>