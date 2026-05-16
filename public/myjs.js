
document.body.addEventListener('scroll',()=>{
    // console.log(document.documentElement.scrollTop || document.body.scrollTop);
    if (document.documentElement.scrollTop > 100 || document.body.scrollTop > 100){
        $('.scrollToTop').fadeIn();
    } else {
        $('.scrollToTop').fadeOut();
    }
});

function topFunction() {
    $('html, body').animate({ scrollTop: 0 }, 800);
    return false;
}
