if ($('.about-person-carousel').length > 0) {
  $('.about-person-carousel').owlCarousel({
    loop: true,
    margin: 50,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      993: {
        items: 3
      }
    }
  });
}

if ($('.image-carousel').length > 0) {
  $('.image-carousel').each(function(index, elem) {
    return $(elem).owlCarousel({
      loop: true,
      margin: 50,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        993: {
          items: 3
        }
      }
    });
  });
}
