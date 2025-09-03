

//Start Header
var swiperr = new Swiper('.testimnial', {
    // Optional parameters
    direction: 'horizontal', // 'vertical' for vertical slides
    loop: true, // Enable loop mode
    autoplay: {
      delay: 1500, // Autoplay delay in milliseconds
    },
    speed: 1000, // Transition speed in milliseconds
    pagination: {
      el: '.swiper-pagination',
      clickable: true, // Enable pagination bullets clickable
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    keyboard: {
      enabled: true,
      onlyInViewport: false, // Allow keyboard control outside viewport
    },
    mousewheel: {
      invert: true, // Invert mousewheel direction
    },
    slidesPerView: 1, // Number of slides per view
    spaceBetween: 30, // Space between slides in pixels
  });

  //End Header
//Start Testimonial
var swiper = new Swiper('.Himages', {
    // Optional parameters
    direction: 'horizontal', // 'vertical' for vertical slides
    loop: true, // Enable loop mode
    autoplay: {
      delay: 1500, // Autoplay delay in milliseconds
    },
    speed: 1000, // Transition speed in milliseconds
    pagination: {
      el: '.swiper-pagination',
      clickable: true, // Enable pagination bullets clickable
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    keyboard: {
      enabled: true,
      onlyInViewport: false, // Allow keyboard control outside viewport
    },
    mousewheel: {
      invert: true, // Invert mousewheel direction
    },
    slidesPerView: 1, // Number of slides per view
    spaceBetween: 30, // Space between slides in pixels
  });

  //End Testimonial

  //start dark
// زرار الـ moon
document.querySelector(".moon").onclick = function(){
    document.body.classList.add("dark");
    localStorage.setItem("theme", "dark");
    document.querySelector(".moon").style.display ="none";
    document.querySelector(".sun").style.display ="block";
}

// زرار الـ sun
document.querySelector(".sun").onclick = function(){
    document.body.classList.remove("dark");
    localStorage.setItem("theme", "light");
    document.querySelector(".moon").style.display ="block";
    document.querySelector(".sun").style.display ="none";
}

// لما الصفحة تحمل
window.onload = function(){
    if(localStorage.getItem("theme") === "dark"){
        document.body.classList.add("dark");
        document.querySelector(".moon").style.display ="none";
        document.querySelector(".sun").style.display ="block";
    } else {
        document.body.classList.remove("dark");
        document.querySelector(".moon").style.display ="block";
        document.querySelector(".sun").style.display ="none";
    }
}

//end Dark
window.onscroll = function(){
  if(window.scrollY > 600){
    document.querySelector(".up").style.display = "block"
  }
  else{
    document.querySelector(".up").style.display = "none"
  }
}
document.querySelector(".up").onclick = function(){
  window.scroll({
    top :0 ,
    behavior :"smooth"
  })
}
