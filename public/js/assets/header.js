$('.search-box').on('click', function(e) {
    $('.search-box input').focus();
})

$('.menu-category').on('click', function(e) {
    $('.menu-category').each(function() {
        $(this).removeClass('active');
    })
    $(this).addClass('active');
})