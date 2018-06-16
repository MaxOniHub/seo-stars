$(window).on('load resize', function() {
  var maxHeight;
  maxHeight = 0;
  $('.testimonials-list-row').find('.testimonial-card').height('auto').each(function() {
    if ($(this).height() > maxHeight) {
      maxHeight = $(this).height();
    }
  }).height(maxHeight);
});
