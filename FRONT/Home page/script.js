function orderlike(){
    var x = document.getElementsByClassName("vigntna");
    var numvignette = 1;
    var nameidvign = " ";
    var nameidlikes = " ";
    Array.prototype.forEach.call(x, function(element) {
        // Do stuff here
        var nameidvign = "vign" + numvignette;
        var nameidlikes = "like" + numvignette;
        console.log(nameidlikes);
        var likes = document.getElementById(nameidlikes);
        var likesparitem = likes.innerText || likes.textContent;
        likesparitem = 0 -likesparitem;
        console.log(likesparitem);
        var vign = document.getElementById(nameidvign);
        vign.style.order = likesparitem;
        numvignette++;
    });
}
function ordernumart(){
    var x = document.getElementsByClassName("vigntna");
    var numvignette = 1;
    var nameidvign = " ";
    var nameidart = " ";
    Array.prototype.forEach.call(x, function(element) {
        // Do stuff here
        var nameidvign = "vign" + numvignette;
        var nameidart = "numart" + numvignette;
        console.log(nameidart);
        var mums = document.getElementById(nameidart);
        var numitem = mums.innerText || mums.textContent;
        console.log(numitem);
        var vign = document.getElementById(nameidvign);
        vign.style.order = numitem;
        numvignette++;
    });
}