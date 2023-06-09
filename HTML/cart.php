

<?php include 'inc/header.php' ?>
<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/cart.css">
<script defer src="/WHEY SUPPLIMENT/JS/cart.js"></script>

<main class="main">

<?php 
$total = 0;
$output="";

$output .="

<div class='main__list'>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total price</th>
      <th>-</th>
     
    </tr>
    
  
";



if(!empty($_SESSION['cart'])){

  foreach ($_SESSION['cart'] as $key => $value){
   
    $output .="

    <tr>
    <td><h3>".$value['id']."</h3></td>
    <td><h3>".$value['name']."</h3></td>
    <td><h3>".$value['price']."</h3></td>
    <td><h3>".$value['quantity']."</h3></td>
    <td><h3><span>&#8369;</span>".number_format($value['price'] * $value['quantity'],2)."</h3></td>
    <td>
     <div class='main__trash'>
        <a href='cart.php?action=remove&id=".$value['id']."'>
              <button><i class='fa fa-trash' aria-hidden='true'></i></button> 
              </a>
     </div>
    </td>
   

    ";
    $total =$total+ $value['quantity'] * $value['price'];
  }
          
  $output .="
  <tr>
      <td class='main__blank'><h3>-</h3></td>
      <td class='main__blank'><h3>-</h3></td>
      <td class='main__blank'><h3>-</h3></td>
      <td  class='main__blank'><h3>-</h3></td>
      <td><h3>Total:<span>&#8369;</span>".number_format($total,2)."</h3></td>
      <td>
      <div class='main__delteall'>
          <a href='cart.php?action=clearall'> 
          <button>Delete all</button>
          </a>
      </div>
      </td>
     

  </tr>


  
  </table>
  <div class='main__buynow' ><h3 id='checkin'>Check Out</h3> </div>
 
  </div>

  

  
  ";
 
}



echo $output;
?>

<?php 
if(isset($_GET['action'])){

  if($_GET['action']== "clearall"){
    unset($_SESSION['cart']);
    
  }

  if($_GET['action']== "remove"){
    foreach ($_SESSION['cart'] as $key => $value){

      if($value['id']==$_GET['id']){
        unset($_SESSION['cart'][$key]);
      }
    }
  }

}

?>
 </table>
  </div>
  <?php 
  if(empty($_SESSION['cart'])){
 $notice ="<h3 class ='notice'>NOTHING HERE</h3>
 "; 
 echo $notice;   
}
;
?>





<div  class="main__checkout ">
<?php 
$total = 0;
$output="";

$output .="
<div class='main__list__check '>
  <table class='checklist'>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total price</th>
  
     
    </tr>
    
  
";



if(!empty($_SESSION['cart'])){

  foreach ($_SESSION['cart'] as $key => $value){
   
    $output .="

    <tr>
    <td><h3>".$value['id']."</h3></td>
    <td><h3>".$value['name']."</h3></td>
    <td><h3>".$value['price']."</h3></td>
    <td><h3>".$value['quantity']."</h3></td>
    <td><h3><span>&#8369;</span>".number_format($value['price'] * $value['quantity'],2)."</h3></td>

   

    ";
    $total =$total+ $value['quantity'] * $value['price'];
  }
          
  $output .="
  <tr>
      <td class='main__blank'><h3>-</h3></td>
      <td class='main__blank'><h3>-</h3></td>
      <td class='main__blank'><h3>-</h3></td>
      <td  class='main__blank'><h3>-</h3></td>
      <td><h3 class='total'>Total:<span>&#8369;</span>".number_format($total,2)."</h3></td>

     

  </tr>


  
  </table>
  <div class='main__payment '>

  <label for='paymethod''> <h3>Payment:</h3> </label>  <select id='paymethod'>
         <option>Paypal</option>
         <option>COD</option>
         <option>Gcash</option>
 </select>
 
  </div>

  
 
  <div class='main__check  ' >
  <a id='cart' class='checkout'><h3 >Close</h3></a>
  <a href='receipt.php?action=paysucess'> <h3>Pay now</h3></a>
 
  </div>
  
 

  </div>

  ";
 
}



echo $output;
?>

<?php 
if(isset($_GET['action'])){

  if($_GET['action']== "clearall"){
    unset($_SESSION['cart']);
    
  }

  if($_GET['action']== "remove"){
    foreach ($_SESSION['cart'] as $key => $value){

      if($value['id']==$_GET['id']){
        unset($_SESSION['cart'][$key]);
      }
    }
  }

  if($_GET['action']== "paysucess"){
    unset($_SESSION['cart']);
    
  }

}

?>
 </table>
  </div>






  <?php 
  if(empty($_SESSION['cart'])){
 $notice ="<h3 class ='notice'>NOTHING HERE</h3>
 "; 
 echo $notice;   
}
;
?>
</div>







</main>

<?php include 'inc/footer.php' ?> 