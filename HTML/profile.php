<?Php  include "inc/header.php"?>




<?php 
   
       include 'inc/pdologin.php';
             
       $query ="SELECT * FROM users;";
       $stm=$pdo->prepare($query);
       $stm->execute();

       $result= $stm->fetchAll();



     
    ?>



<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/profile.css">


<main class="main">
       

 <div class="main__firstdiv">
 <?php echo "<h2 class='main__firstdiv__h2'> Welcome ".$_SESSION["useruid"]."!</h2>"?>
           <div class="main__firstdiv__container">
                 <div class="main__firstdiv__info">
                   <form action="profile.php" method="post">
                    <?php 
                      if($result){
                        foreach($result as $row){
                          echo '<h3>'.$row['usersId'].'</h3>';
                        } 
                     }
                     else{
                          echo "<h3>NO</h3>";
                     }
                    ?>
                   <input type="file" name="profile">
                   <input type="submit" name="profile" value="Profile">
                   </form>
                 </div>
                
           </div>
    

 </div>

</main>

<?Php  include "inc/footer.php"  ?>