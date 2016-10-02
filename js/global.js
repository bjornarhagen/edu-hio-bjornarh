/* Bjørnar Hagen - 2016 */

window.onload = ready;

function ready() {
    imageZoom();
}

function imageZoom() {
    var imgs = document.getElementsByClassName("image-zoomable");

    for (var i = 0; i < imgs.length; i++) {
        var id = "img-" + Math.floor(Math.random() * 1000) + Math.floor(Math.random() * 1000);

        imgs[i].insertAdjacentHTML('beforebegin', '<div id="' + id + '" style="position: relative; width:' + imgs[i].width +
            'px; height:' + imgs[i].height + 'px;"></div>');

        var wrapper = document.getElementById(id);
        wrapper.appendChild(imgs[i]);
    }
}