if ($('.about-person-carousel').length > 0) {
  $('.about-person-carousel').magnificPopup({
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
