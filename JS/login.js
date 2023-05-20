let header__firstdiv = document.querySelector(".header__firstdiv");
let header__firstdiv__first__bars = document.querySelector("#header__firstdiv__first__bars");
let header__seconddiv = document.querySelector(".header__seconddiv");










header__firstdiv__first__bars.onclick=()=>{
    
    header__seconddiv.classList.toggle("header__seconddiv__open");
}

document.onclick=(e)=>{
    if(!header__seconddiv.contains(e.target)&&!header__firstdiv__first__bars.contains(e.target)){
        header__seconddiv.classList.remove("header__seconddiv__open");
    }
}