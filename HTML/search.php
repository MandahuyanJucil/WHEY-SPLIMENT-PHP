<?php include 'inc/header.php' ?> 




<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/search.css">

<main class="main">





<div class="firstdiv">
<?php 

if(isset($_POST['submit-search'])){

    $search = mysqli_real_escape_string($connect,$_POST['search']);
    $sql = "SELECT * FROM cart WHERE name LIKE '%$search%'";
    $result = mysqli_query($connect, $sql);
    $queryResult = mysqli_num_rows($result);

    if($queryResult>0){
          while($row = mysqli_fetch_assoc( $result)){
           
            echo "
            
            <div class='main__product__search'>
                
                <img src='/WHEY SUPPLIMENT/".$row['image']."'  alt='picture' >
                <h4>".$row['name']."</h4>
                <h4><span>&#8369;</span>".number_format($row['price'],2);"</h4>
                <div class='mian__btn'>
        <input type='hidden' name='name' value='".$row['name']."'>
        <input type='hidden' name='price' value='".$row['price'].">

        <div class='main__quantitydiv'>
          <input class='main__quantity' type='number' name='quantity' value='1'>
        </div>   
                
                          
        ";

        if(isset($_SESSION["useruid"])){ 

                 if($row['id']<=9){ 
                  
                  echo "
                  <div class='main__btn'>
                  <a href='proteinshake.php'> <button class='visit'>Visit</button></a>
                
                  
               </div>
               </div>
                  "; 
                 }
               else if( $row['id']<=14){ 
                  
                  echo "
                  <div class='main__btn'>
                  <a href='bcaa.php'> <button class='visit'>Visit</button></a>
                
                  
               </div>
               </div>
                  "; 
                 }

                 else if($row['id']<=19){ 
                  
                  echo "
                  <div class='main__btn'>
                  <a href='creatine.php'> <button class='visit'>Visit</button></a>
                
                  
               </div>
               </div>
                  "; 
                 }

                 else if($row['id']<=24){ 
                  
                  echo "
                  <div class='main__btn'>
                  <a href='masgainer.php'> <button class='visit'>Visit</button></a>
                
                  
               </div>
               </div>
                  "; 
                 }

                 else if($row['id']<=29){ 
                  
                  echo "
                  <div class='main__btn'>
                  <a href='weightloss.php'> <button class='visit'>Visit</button></a>
                
                  
               </div>
               </div>
                  "; 
                 }

                 else if($row['id']<=34){ 
                  
                  echo "
                  <div class='main__btn'>
                  <a href='preworkout.php'> <button class='visit'>Visit</button></a>
                
                  
               </div>
               </div>
                  "; 
                 }
                 else{
                  echo "
                  <div class='main__btn'>
                  <a href='allproduct.php'> <button class='visit'>Visit</button></a>
                
                  
               </div>
               </div>
                  "; 
                 }

                }
           
            else {
        
             echo  "
             <div class='main__btn'>
             <a href='login.php'> <button class='visit'>Visit</button></a>
               
             
          </div>
          </div>
             ";
           }

       

             
           

        
          }
          
       
    }
    else{
        echo "<div class='noresult'>
                 <h2>NO RESULT</h2>
        </div>";
    }
}


?>

</div>







</main>





<?php include 'inc/footer.php' ?> 