if ($('.video-carousel').length > 0) {
  $('.video-carousel').magnificPopup({
    delegate: 'a',
    type: 'iframe'
  });
}

if ($('.image-carousel').length > 0) {
  $('.image-carousel').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery: {
      enabled: true
    }
  });
}
