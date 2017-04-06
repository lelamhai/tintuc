$('.autoplay').slick({
	/*Sceen Desktop and Landscape Tablet*/
  	slidesToShow: 4,
  	slidesToScroll: 1,
  	autoplay: true,
  	autoplaySpeed: 2000,
  	responsive: [
    {
    /*Portrait Tablet*/
     	breakpoint: 1024,
     	settings: {
        slidesToShow: 3,
        slidesToScroll: 1
        /*infinite: true,
        dots: true*/
      }
    },
    {
    	/*Portrait Phone*/
      	breakpoint: 600,
      	settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
    	/*Portrait Phone*/
      	breakpoint: 480,
      	settings: {
        	slidesToShow: 1,
        	slidesToScroll: 1
      	}
    }
  ]
});