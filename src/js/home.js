document.querySelector('.header__menu').addEventListener('click', function(){
   document.querySelector('.header__nav-box').classList.toggle('header__nav-box--open') 
   document.querySelector('.overlay').classList.toggle('overlay--show') 
})

document.querySelector('.overlay').addEventListener('click', function(){
    document.querySelector('.header__nav-box').classList.toggle('header__nav-box--open') 
    document.querySelector('.overlay').classList.toggle('overlay--show') 
 })