const links = document.querySelectorAll('.menu-header__link, .social__item');
links.forEach(function(link){
    link.addEventListener('click', function(){
        let currentLink = link;
        if(!currentLink.classList.contains('_active')) {
            links.forEach(function(link) {
                link.classList.remove('_active');
            });
            currentLink.classList.add('_active');
        };
    });
});

input = document.getElementById('email');

function ph () {
    input.setAttribute('placeholder','email |');
};

function phr () {
    input.setAttribute('placeholder', 'Type your email address here…');
};

input.addEventListener("mouseover", ph);
input.addEventListener("mouseout", phr);

