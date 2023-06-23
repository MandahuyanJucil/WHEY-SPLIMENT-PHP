let main__checkout = document.querySelector('.main__checkout');
let main__tabledata = document.querySelector('.main__tabledata');
let check = document.querySelector("#check");
let checkclose = document.querySelector("#checkclose");


check.onclick=()=>{
    main__checkout.classList.add("checkoutclose");
}


checkclose.onclick=()=>{
    main__checkout.classList.remove("checkoutclose");
}






