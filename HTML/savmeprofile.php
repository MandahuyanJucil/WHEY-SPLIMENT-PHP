
<?php include "inc/header.php"  ?>


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
                 <?php 
                 
                 foreach($result as $rwoprofile){
                    $_SESSION['Profile']=$rwoprofile['profile'];

                 }

                

                 if(isset($_SESSION["useruid"])){
                  echo'
                  <form action="savmeprofile.php" method="post" enctype="multipart/form-data">
                              <input type="file" name="profile">
                              <input type="submit" name="profiles" value="upload">
                  </form>';  


                    try{
                          $profiles=$_POST['profiles'];
                          $queryfile="UPDATE users SET profile=$profiles WHERE usersUid=".$_SESSION["useruid"]." ;";

                     
                          $stmfile=$pdo->prepare($queryfile);
                          $stmfile->execute();
                                            
                          $resultfile= $stmfile->fetchAll();

                          
                            $file=$_FILES['profile'];
                                
                            $filename=$_FILES['profile']['name'];
                            $filetmpname=$_FILES['profile']['tmp_name'];
                            $filesize=$_FILES['profile']['size'];
                            $fileerror=$_FILES['profile']['error'];
                            $filetype=$_FILES['profile']['type'];
                           
                            $fileext=explode('.',$filename);
                            $fileactualext=strtolower(end($fileext));
                            
                            $allowed=array('jpg','jpeg','png');
                        
                            if(in_array($fileactualext,$allowed)) {
                                   if( $fileerror===0){
                                       if($filesize<1000000000){
                                        $filenamenew="profile".$_SESSION["useruid"].".".$fileactualext;
                                        $filedirectory='uploads/'.$filenamenew;
                                        move_uploaded_file($filetmpname, $filedirectory);
                                       } 
                                       else{
                                        echo'File size si To big';
                                       }
                                   }
                                   else{
                                    echo'Something Wrong with your file';
                                   }
                            }
                             else{
                              echo'File type is Invalid';
                             }
                        }
                        

                        catch(PDOException $e){
                          die("Failed Connection:". $e->getMessage());
                           }
                      
                        if(!empty( $_SESSION['Profile'])){
                          echo'<img src="uploads/profile'.$_SESSION["useruid"].'.jpg" alt="">';
                        }
                          
                 }
                      

                 
                      
                 
                
               
                  ?>
                 </div>
                 
           </div>
    

 </div>

</main>

<?Php  include "inc/footer.php"  ?>