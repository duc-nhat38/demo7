let index = 0;
let slides = document.getElementsByClassName("mySlides");
let dots = document.getElementsByClassName("dot");
slides[0].style.display = "block";
dots[0].className += " active";
let i;

function prev(){
  i = index;
  index--;
  if(index < 0){
    index = slides.length-1;
  }
  slides[index].style.display = "block";
  dots[index].className += " active";
  slides[i].style.display = "none";
  dots[i].className = dots[i].className.replace(" active", "");
}

function next(){
  i = index;
  index++;
  if(index > slides.length-1){
    index = 0;
  }
  slides[index].style.display = "block";
  dots[index].className += " active";
  slides[i].style.display = "none";
  dots[i].className = dots[i].className.replace(" active", "");
}
setInterval(function(){
  next();
}, 3000);


window.onscroll = function() {  myFunction()};
let menu = document.getElementById("myMenu");
let sticky = menu.offsetTop;
function myFunction(){
  if(window.pageYOffset > sticky){
    menu.classList.add("sticky");

  }else{
    menu.classList.remove("sticky");
  }
}

let num = 0;
let getProductHot = document.getElementsByClassName("productHots");
let getProductSale = document.getElementsByClassName("productSales");
let getProductNew = document.getElementsByClassName("productNews");
getProductHot[0].style.display = "inline-block";
getProductSale[0].style.display = "inline-block";
getProductNew[0].style.display = "inline-block";
let k;
function productHotPrev(){
  k = num;
  num--;
  if(num < 0){
    num = getProductHot.length-1;
  }
  getProductHot[num].style.display = "inline-block";
  getProductHot[k].style.display = "none";
}
function productHotNext(){
  k = num;
  num++;
  if(num > getProductHot.length-1){
    num = 0;
  }
  getProductHot[num].style.display = "inline-block";
  getProductHot[k].style.display = "none";
}
function productSalePrev(){
  k = num;
  num--;
  if(num < 0){
    num = getProductSale.length-1;
  }
  getProductSale[num].style.display = "inline-block";
  getProductSale[k].style.display = "none";
}
function productSaleNext(){
  k = num;
  num++;
  if(num > getProductSale.length-1){
    num = 0;
  }
  getProductSale[num].style.display = "inline-block";
  getProductSale[k].style.display = "none";
}
function productNewPrev(){
  k = num;
  num--;
  if(num < 0){
    num = getProductNew.length-1;
  }
  getProductNew[num].style.display = "inline-block";
  getProductNew[k].style.display = "none";
}
function productNewNext(){
  k = num;
  num++;
  if(num > getProductNew.length-1){
    num = 0;
  }
  getProductNew[num].style.display = "inline-block";
  getProductNew[k].style.display = "none";
}
function myPay(){
  document.getElementById("button").style.display = "none";
  document.getElementById("body_cart_right").style.display = "block";
}
myPay();

