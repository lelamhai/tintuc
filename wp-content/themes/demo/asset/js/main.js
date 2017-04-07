$('#excerpt-long b').text(function(_, txt) {
  return txt.length > 17 ? txt.substr(0, 17) + "..." : txt;
});

$( document ).ready(function() {
    $('.title-list-post-news li').hover(function(){
    	var stt = 0;
		$('.wrap-list-post-news img').each(function(){
			if($(this).is(':visible'))
			{
				stt = $(this).attr("stt");
				alert(stt);
			}
			else{
				alert("hello");
			}
		});
    });
});

$('#home-slider').on('slide.bs.carousel', function (e) {
  
  var slideFrom = $(this).find('.active').index();
  var slideTo = $(e.relatedTarget).index();
  
  $('.list-group-item').eq(slideFrom).removeClass('active');
  $('.list-group-item').eq(slideTo).addClass('active');

});
