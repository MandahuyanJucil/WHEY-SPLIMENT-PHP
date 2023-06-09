<?php 

function product($name,$img,$descriptionprice,$price){
   
    $mainproduct ="
    <div class='main__fourdiv__product'>
    <div class='main__fourdiv__product__container'>
      <img src='/WHEY SUPPLIMENT/IMG/$img' alt='producpicture'>

      <div class='main__fourdiv__details'>
         <h4>$name</h4>
        <p>$descriptionprice</p> 
        <p id='price'>&#x20B1;$price</p>  
      </div>
      
            
          <div class='main__price'>
           <div class='divider'>
                <button class='buynow'>Buy Now</button>
                <button  class='buynow'>Add to Cart</button>
             </div>
           </div>
           
    </div>
</div>
    ";

echo $mainproduct;

}






function topcategory($name,$img,$description,$links){

    $category = "
    
    <div class='main__firstdiv__container'>
                   <h4 class='main__firstdiv__h1'>$name</h4>
                   <img src='/WHEY SUPPLIMENT/IMG/$img' alt='endurancepicute'>
                   <p class='main__pr'>$description</p>
                   <div class='main__firsdiv__shop'>
                  <a href='$links'> <button class='main__firstdiv__btn'><h3>Shop now</h3></button> <a>
                   </div> 
                </div>
    ";

    echo $category;
}

