<?Php  include "inc/header.php"  ?>
<?Php 

?>
<link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/profile.css">


<main class="main">
       

 <div class="main__firstdiv">
 <?php echo "<h2 class='main__firstdiv__h2'> Welcome ".$_SESSION["useruid"]."!</h2>"            ?>
           <div class="main__firstdiv__container">
           
                 <div class="main__firstdiv__picture">
                  <img src="/WHEY SUPPLIMENT/IMG/Backuplogo.png" alt="profile picture">
                 </div>

                 <div class="main__firstdiv__info">
                    <?php echo "<h2>".$_SESSION["useruid"]."</h2>"               ?>
                 </div>
           </div>
      

 </div>

</main>

<?Php  include "inc/footer.php"  ?>