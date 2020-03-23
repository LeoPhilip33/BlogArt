var opnavbar =0;
function burger(){
    if(opnavbar == 0){
        opnavbar =1;
        var x = document.getElementById("menuburgermid");
        x.style.display = "none";
        var x = document.getElementById("menuburger");
        x.style.transform = "translateY(50%)";
        var x = document.getElementById("menuburgertop");
        x.style.transform = "rotate(45deg)";
        x.style.position = "absolute";
        x.style.marginTop = "auto";
        var x = document.getElementById("menuburgerbot");
        x.style.transform = "rotate(-45deg)";
        x.style.position = "absolute";
        x.style.marginBottom = "auto";
        var x = document.getElementById("newmenu");
        x.style.display = "block";
        var x = document.getElementById("cond");
        x.style.display = "none";
        var x = document.getElementById("divbtn");
        x.style.display = "none";
        var x = document.getElementById("traitnav");
        x.style.display = "block";
        var x = document.getElementById("menunav");
        x.style.alignItems = "flex-start";
    }else{
        opnavbar = 0;
        var x = document.getElementById("menuburgermid");
        x.style.display = "block";
        var x = document.getElementById("menuburger");
        x.style.transform = "translateY(0)";
        var x = document.getElementById("menuburgertop");
        x.style.transform = "rotate(0deg)";
        x.style.position = "relative";
        var x = document.getElementById("menuburgerbot");
        x.style.transform = "rotate(-0deg)";
        x.style.position = "relative";
        var x = document.getElementById("newmenu");
        x.style.display = "none";
        var x = document.getElementById("cond");
        x.style.display = "flex";
        var x = document.getElementById("divbtn");
        x.style.display = "block";
        var x = document.getElementById("traitnav");
        x.style.display = "none";
        var x = document.getElementById("menuburgerbot");
        x.style.marginBottom = "7px";
        var x = document.getElementById("menuburgertop");
        x.style.marginTop = "7px";
    }
}
