(function() {
    var headerText = $('#hjem').find('h1');

    function randomText() {
        var text = headerText.html();
        var newText = "";
        var possible = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZæÆøØåÅ0123456789";

        for (var i=0; i < text.length; i++) {
            newText += possible.charAt(Math.floor(Math.random() * possible.length));
        }

        return newText
    }

    var interval = setInterval(function() {
        $('#hjem').find('h1').html(randomText());
    }, 50);

    headerText.hover(function() {
        clearInterval(interval);
        headerText.html('Bjørnar Hagen');
    }, function() {
        interval = setInterval(function() {
            $('#hjem').find('h1').html(randomText());
        }, 50);
    });
})();
(function() {
    var activeTab;

    function activateTab(id) {
        activeTab = $(id);
        activeTab.addClass('active').fadeIn('fast');

        activeTab.find('.tabs-close').click(function(btnE) {
            btnE.preventDefault();

            deactivateTab();
            activateTab('#hjem');
            window.location.hash = '';
            $(this).off('click');
        });
    }

    function deactivateTab() {
        $('body').find('.tabs.active').fadeOut('fast').removeClass('active');
    }

    $('#nav-main-toggle').on('click', 'ul > li > a', function(e) {
        deactivateTab();
        activateTab($(this).attr('href'));
    });

    if (window.location.hash) {
        deactivateTab();
        activateTab(window.location.hash);
    }
})();