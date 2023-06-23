<?php 
session_start();
$product_ids=array();


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

<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/receipt.css">
<script defer src="/WHEY SUPPLIMENT/JS/cart.js"></script>

<main class="main">

    <div class="main__wraper">
    <div class="main__firstdiv">
                  <h1>PAYMENT SUCCESS!</h1>
         </div> 
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
  <td><h6 class="main__tabledata"><?php  echo number_format($product['price'] * $product['quantity'],2); ?></h6></td>
  
</tr>
<?php 
  $total=$total+($product['quantity']*$product['price']);
endforeach;
?>
<tr>
  <td colspan="3"></td>
   <td colspan=""><h6 class="main__tabledata">TOTAL:<?php echo number_format($total,2); ?></h6></td>

</tr>

<?php endif; ?>
</table>
<div class="closereceipt">
  <a href="main.php?action=paynow"><h4 class="h4close">CLOSE</h4></a>
</div>
</div>  