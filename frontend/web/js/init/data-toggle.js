$(document).on('click', '[data-toggle]', function() {
  $(this).toggleClass('active');
  $($(this).data('toggle')).toggleClass('active');
});
