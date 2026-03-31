$('.ava-cards').slick({
   slidesToShow: 2,
   slidesToScroll: 1,
   autoplay: true,
   autoplaySpeed: 2000,

   responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  
})

new WOW().init();

document.querySelector(".abrir-menu").onclick = function(){
   document.documentElement.classList.add("menu-mobile");
}

document.querySelector(".fechar-menu").onclick = function(){
   document.documentElement.classList.remove("menu-mobile");
}

window.onscroll = function(){
  var top = window.scrollY;
  var topoFixo = document.getElementById('topo-fixo');

  if(top >= 800){
    topoFixo.classList.remove('saindo');
    topoFixo.classList.add('menu-fixo');
  }else{
        if (topoFixo.classList.contains('menu-fixo') && !topoFixo.classList.contains('saindo')) {
            topoFixo.classList.add('saindo');
            topoFixo.addEventListener('animationend', function onMenuFixoOut(e) {
                if (e.animationName === 'menuFixoOut') {
                    topoFixo.classList.remove('menu-fixo', 'saindo');
                    topoFixo.removeEventListener('animationend', onMenuFixoOut);
                }
            });
    }
  }

}
