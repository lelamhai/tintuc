$('#home-slider').on('slide.bs.carousel', function (e) {
  var slideFrom = $(this).find('.active').index();
  var slideTo = $(e.relatedTarget).index();
  $('.item-title-hot-news').eq(slideFrom).removeClass('active');
  $('.item-title-hot-news').eq(slideTo).addClass('active');
});
