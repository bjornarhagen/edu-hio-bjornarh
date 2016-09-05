/* Bjørnar Hagen - 2016 */
(function() {
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    var newHash = this.hash;

                    $('html,body').animate({
                        scrollTop: target.offset().top - 50
                    }, 250, function() {
                        window.location.hash = newHash;
                    });

                    return false;
                }
            }
        });
    });

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
})();