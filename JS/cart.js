let checkout = document.querySelector(".checkout");
let main__checkout = document.querySelector(".main__checkout");
let cart = document.querySelector("#cart");
let checkin = document.querySelector("#checkin");











checkin.onclick=()=>{

    main__checkout.classList.add("checkoutclose");
}


checkout.onclick=()=>{
    main__checkout.classList.remove("checkoutclose");
   
}

