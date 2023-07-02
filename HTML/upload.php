<?php

if(isset($_POST['profiles'])){
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