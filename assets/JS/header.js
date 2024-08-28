
window.addEventListener('scroll',()=>{
    let scroll = window.scrollY;
    if (scroll>10) {
        document.querySelector('header').style.backgroundColor="#343434";
    }else {
        document.querySelector('header').style.backgroundColor="#34364400";
    }
});