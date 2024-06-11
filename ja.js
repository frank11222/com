document.querySelector(".menu-btn").addEventListener("click",() =>{
    document.querySelector(".nav-menu").classList.toggle("show");  
/*para llama documento es query selector */

} );
ScrollReveal().reveal('.hero',{delay:10000});
ScrollReveal().reveal('.news-cards',{delay:500});
ScrollReveal().reveal('.cards-banner-one',{delay:500});
ScrollReveal().reveal('.cards-banner-two',{delay:500});

var default_avatar = 'https://secure.gravatar.com/avatar?d=wavatar';
 
function handleError(image) {
    image.src = default_avatar;
}