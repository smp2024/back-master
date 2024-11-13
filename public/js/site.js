$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

$('.alert').slideDown();
setTimeout(function() {
    $('.alert').slideUp();
}, 3000);


$(document).ready(function() {
    $(window).scroll(function() {
        var scroll = window.scrollY
            //console.log(scroll);
    })
})
