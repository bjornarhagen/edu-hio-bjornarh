function loaderShow(element) {
    var loader = $('#loading-animation');

    if (element) {
        element.append(loader);
        element.css('position', 'relative');
    } else {
        loader.appendTo('body');
    }

    loader.fadeIn('50');
}

function loaderHide() {
    var loaderer = $('#loading-animation');
    loaderer.fadeOut('50');
    $('#loading-animation a').off('click');
}

function loaderAbort(callbackfunction) {
    $('#loading-animation a').click(function(e) {
        e.preventDefault();
        
        if (callbackfunction != 0) {
            callbackfunction();
        }

        loaderHide();
        
        $('#loading-animation a').off('click');
    });
}