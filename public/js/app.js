

window.onload = function() {
    var openMenu = document.getElementsByClassName('open-menu')[0];
    var navBar = document.getElementsByClassName('nav-bar')[0];
    var overlay = document.getElementsByClassName('overlay')[0];

    openMenu.onclick = function(){
        if(!openMenu.classList.contains('active')){
            overlay.style.display = "block";
            navBar.className += " active";
        }
    };
    overlay.onclick = function(){
        if(navBar.classList.contains('active')){
            overlay.style.display = "none";
            navBar.classList.remove('active')
        }
    }
};




//# sourceMappingURL=app.js.map
