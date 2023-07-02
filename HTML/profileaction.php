<?php 
  $usersname=$_SESSION["ids"];
  $sql="SELECT * FROM users WHERE usersId='$usersname'";
  $query=$pdo->prepare($sql);
  $query->execute();
  $result= $query->fetch();