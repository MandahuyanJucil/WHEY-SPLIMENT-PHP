<?php 
include 'inc/header.php'
?>

<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/proteinshake.css">








  
<?php 


$connect = mysqli_connect("localhost","root","","cart_item");


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



?>


<script defer src="/WHEY SUPPLIMENT/JS/allproduct.js"></script>

<main class="main">
           




<div class="main__firstdiv">


<h2 class="main__arrow"> <a href="main.php"><i class='fas fa-arrow-alt-circle-left' style='font-size:56px'></i></a></h2> 

  <div class="main_container">

         <div class="main__product">

         
         

<!--        <?Php  

             if(isset($_SESSION["useruid"])){ 
                 
              echo "
              <div class='main__checkcart'>
              <input class='allproductbuynow' type='button' name='add_to_cart' value='cart'>

              </div>
              "; 
             }
              else {
          
               echo  "
               <div class='main__checkcart'>
             <a href='login.php'> <input  type='button' name='add_to_cart' value='cart'></a>

              </div>
               ";
             }
             ?> -->
             
      
    
          <?php 
          $query = "SELECT * FROM cart";
          $result = mysqli_query($connect,$query);
          $resultcheck = mysqli_num_rows( $result);

          if( $resultcheck >1){
                while($row = mysqli_fetch_array($result)){
                    
                    if( $row['id']<=34 && $row['id'] >=22){
                    

                    ?>
                    <div class="main__pd">
                  <form  method="post" action="natural.php?id=<?=$row['id']?>">
                      
                      <img src="/WHEY SUPPLIMENT/<?=$row['image'] ?>" alt="picture" >
                      <h2><?= $row['name']?></h2>
                      <h2><span>&#8369;</span> <?= number_format($row['price'],2); ?></h2>
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


<div class="main__firstdiv__buynow  ">
             
<div  class="main__checkout ">
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


if(empty($_SESSION['cart'])){



  $output .="
  
    <td> <a id='cart' class='checkout close'><h3 >Close</h3></a></td>
  
";
}


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

  <label for='paymethod''> <h3>Payment </h3> </label>  <select id='paymethod'>
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

         
</div>





</main>















<?php 
include 'inc/footer.php'
?>