


<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/receipt.css">
    <title>Document</title>
</head>
<body>
<div class="main__checkout">
<div class='main__buynow paynow' >
  <a href='#'> <h3>Payment Success!</h3></a> <br>

  </div>
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
      <td><h3>Total:<span>&#8369;</span>".number_format($total,2)."</h3></td>

     

  </tr>


  
  </table>






  <div class='main__close' >
        <a href='main.php'> <h3>Close</h3></a>
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
</body>
</html>