

function Lwsclick(e) {
    e.classList.toggle("change");
    
      jQuery('.lws-primary-menu ul').slideToggle("slow");
    
    //jQuery('.lws-primary-menu ul').toggle("lws-mobile-active"); //you can list several class names 
    e.preventDefault();
  }
