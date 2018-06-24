$(function() {
  $('.rating-edited.edited').each(function(i, list) {
    $('> li', list).click(function(e) {
      $(this).siblings().removeClass('active animated');
      $(this).addClass('active animated');
      setTimeout((function() {
        return $('li', list).removeClass('animated');
      }), 810);
      if ($(list).data('onchange') && window[$(list).data('onchange')]) {
        window[$(list).data('onchange')]($(this).index() + 1);
      }
      $(list).attr('data-value', $(this).index() + 1);
    });
  });
});

window.ratingChange = function(val) {
  $('#ratingResult').val(val);
};
