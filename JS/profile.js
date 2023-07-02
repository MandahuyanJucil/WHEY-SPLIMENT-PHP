


profile=document.querySelector("#profile");
changeprofile=document.querySelector("#changeprofile");
customtext = document.querySelector("#customtext");



changeprofile.addEventListener("click",function(){
    profile.click();
})

profile.addEventListener("change",function(){
    if(profile.value){
        customtext.innerHTML=profile.value;
    }
    else{
        customtext.innerHTML="No file";
    }
})
