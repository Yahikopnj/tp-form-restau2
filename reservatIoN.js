
document.getElementById("resp").addEventListener("click", ()=>{
    var menu = document.getElementById("men");
    if(window.getComputedStyle(menu).display == "block"){
        
        menu.style.animation = "fadeout 0.5s"
        setTimeout(() => {
            menu.style.display = "none";
          }, 498);
       
    }else{
       
        menu.style.animation = "fadein 0.5s"
        setTimeout(() => {
            menu.style.display = "block";
          }, 500);
    }

    
})