var productImg = document.getElementById("productImg")
var SmallImg = document.getElementsByClassName("small-img");

SmallImg[0].onclick = function () {
    productImg.src = SmallImg[0].src;
}
SmallImg[1].onclick = function () {
    productImg.src = SmallImg[1].src;
}
SmallImg[2].onclick = function () {
    productImg.src = SmallImg[2].src;
}
SmallImg[3].onclick = function () {
    productImg.src = SmallImg[3].src;
}

function menutoggle() {
    const menuItems = document.getElementById("MenuItems");
    if (menuItems.style.display === "block") {
        menuItems.style.display = "none";
    } else {
        menuItems.style.display = "block";
    }
}