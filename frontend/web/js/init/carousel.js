if ($('.image-carousel').length > 0) {
    $('.image-carousel').each(function (index, elem) {
        return $(elem).owlCarousel({
            loop: false,
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

if ($('.video-carousel').length > 0) {
    $('.video-carousel').each(function (index, elem) {
        return $(elem).owlCarousel({
            loop: false,
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

