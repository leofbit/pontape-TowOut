
function removerAlert() {
    var divs = $($('[id=alert]'));
    counter = 2500;  
    divs.each(function(i) {
        $(this).delay(counter).animate({
            'margin-left' : "50%",
            'opacity' : '0'
            }, 200, function() {
            $(this).remove();
        });
    });
}