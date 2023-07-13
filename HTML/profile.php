

<?php include 'inc/header.php' ?>


<?php 
      include 'inc/pdologin.php';

      if(isset($_POST['upload'])){
        $userid=intval($_GET['id']);

        $_SESSION['address']=$_POST['address'];
        $_SESSION['gcashnumber']=$_POST['gcashnumber'];
        $_SESSION['contactnumber']=$_POST['contactnumber'];


        $file_name=$_FILES['file']['name'];
        $file_temp=$_FILES['file']['tmp_name'];
        $file_size=$_FILES['file']['size'];
        $file_type=$_FILES['file']['type'];

        $loaction="uploads/".$file_name;
        $addr=$_SESSION['address'];
        $gcash=$_SESSION['gcashnumber'];
        $contnum= $_SESSION['contactnumber'];

        if($file_size < 544000){
           if(move_uploaded_file($file_temp,$loaction)){
                   
            try{
                  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql="UPDATE users SET profile='$loaction',address='$addr', gcash='$gcash',cellphonenumber='$contnum' WHERE  usersId='$userid'";
                  $pdo->exec($sql);
            }
            catch(PDOException $e){
               echo $e->getMessage();
            }
            $pdo=null;
            header('location:mainprofile.php?');
           }
        }
        else{
            echo '<script>alert("File is To Large")</script>';
        }




      }


      
       
    ?>

<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/profile.css">
<script defer src="/WHEY SUPPLIMENT/JS/profile.js"></script>

<main class="main">
       

 <div class="main__firstdiv">
 <?php echo "<h2 class='main__firstdiv__h2'> Welcome ".$_SESSION["useruid"]."!</h2>"?>
           <div class="main__firstdiv__container">
               
                 <div class="main__firstdiv__info">
     
                 <?php 

                  include 'profileaction.php';
                  $address=$result['address'];
                  $gcash=$result['gcash'];
                  $cellphonenumber=$result['cellphonenumber'];

                 
                 echo'
                 <div class="main__button">
                    <a href="mainprofile.php"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> </a>
                </div>
                  <h2 class="editprofile">Edit Your Profile</h2>
                
                  <form  class="informationform" method="post" enctype="multipart/form-data">
                
                    <input type="file" name="file" id="profile" hidden="hidden">
                    <button id="changeprofile">Choose Profile</button> <p id="customtext">No file</p>

                    <label for="address">Address<label>
                    <input type="text" name="address" id="address" class="inputfailed" required>

                    <label for="gcash">Gcash<label>
                    <input type="tel" name="gcashnumber" id="gcash" class="inputfailed" >

                    <label for="cellphone">Phone#<label>
                    <input type="tel" name="contactnumber" id="cellphone" class="inputfailed" >

                    <input type="submit" name="upload"  class="buttonbtn" value="upload">
                   </form>

              
                   ';
                           

                  
           
                  ?>
                 </div>
                
           </div>
    

 </div>

</main>

<?Php  include "inc/footer.php"  ?>