


<?php  include "inc/header.php" ?>

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
            header('location:profile.php?');
           }
        }
        else{
            echo '<script>alert("File is To Large")</script>';
        }




      }

 
      include 'profileaction.php';
      $email=$result['usersEmail'];
      $name=$result['usersName'];
      $address=$result['address'];
      $gcash=$result['gcash'];
      $cellphonenumber=$result['cellphonenumber'];
      $checkprofile=$result['profile'];
      
       
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mainprofile</title>
    <link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/mainprofile.css">
</head>
<body>
    <main class="main">

      <div class="main__wraper">
        <div class="main__horizontal">

            <div class="main__profile">
                <?php   
                
                if(!empty($checkprofile)){
                  echo ' <img class="img__userprofile" src="'.$checkprofile.'" alt="Profile"> ';
                }
                else{
                    echo '<img class="img__userprofile" src="uploads/defualt.jpg" alt="Profile">';
                }
                ?>
           
            </div>
            <div > <h3 class="username"><?php echo $_SESSION["useruid"]; ?></h3></div>
            <div class="main__seeting">
                <a href='profile.php?id=<?php echo $_SESSION["ids"];?>'> <i class="fa fa-cog" aria-hidden="true"></i></a> 
            </div>
        </div>
         <div class="main__contactinfo">
             
              <div class="main__name">
                <h3>Name</h3><h4 class="name"><?php echo  $name ?></h4>
              </div>
              <div class="main__name">
                <h3>Gmail</h3><h4 class="name"><?php echo $email ?></h4>
              </div>
              <div class="main__name">
                <h3>Address</h3><h4 class="name"><?php echo  $address ?></h4>
              </div>
              <div class="main__name">
                <h3>Mobile Number</h3><h4 class="name"><?php echo  $cellphonenumber ?></h4>
              </div>
         </div>
        
      </div>

    </main>
</body>
</html>




<?php  include "inc/footer.php" ?>