$(document).click(function(event) {
  if ($(event.target).closest('.mobile-menu').length || $(event.target).closest('.mobile-menu-btn').length) {
    return;
  }
  $('.mobile-menu').removeClass('active');
});

$('.mobile-menu-btn').click(function() {
  $('.mobile-menu').addClass('active');
});

$('.mobile-menu-btn-close').click(function() {
  $('.mobile-menu').removeClass('active');
});
