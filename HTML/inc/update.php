
<?php   

if(isset($_POST['profiles'])){
      session_start();


     
     $names=$_SESSION["useruid"];


      
      $profile=$_POST['profile'];
     try{
       include_once 'pdologin.php';

       $query="UPDATE users SET profile=:profile  WHERE usersUid = '$names' ;";
       $stmt= $pdo->prepare($query);
              
       $stmt->bindParam(":profile",$profile);
    
       $stmt->execute();
        
       $pdo=null;
       $smtm=null;
      
       
      
     }

     catch(PDOException $e){
    die("Failed Connection:". $e->getMessage());
     }

     

}






     
    