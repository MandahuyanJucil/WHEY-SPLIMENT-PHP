

let allproductbuynow = document.querySelector(".allproductbuynow");
let main__firstdiv__buynow = document.querySelector(".main__firstdiv__buynow")
let checkout = document.querySelector(".checkout")

allproductbuynow.onclick=()=>{

    main__firstdiv__buynow.classList.add("buynow__open");
}

checkout.onclick=()=>{

    main__firstdiv__buynow.classList.remove("buynow__open");
}
