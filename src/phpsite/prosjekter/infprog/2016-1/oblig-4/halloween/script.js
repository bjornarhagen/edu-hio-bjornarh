(function () {
    "use strict";
    window.onload = function() {
        if (preload()) ready();
    }

    var gCanvas,
        ctx,
        SwimGame = {},
        figures = [],
        shapes = [];

    var Figure = function(options) {
        options        = options || {};
        options.color  = options.hasOwnProperty("color")  ? options.color  : null;
        options.stroke = options.hasOwnProperty("stroke") ? options.stroke : null;
        options.size   = options.hasOwnProperty("size")   ? options.size   : null;
        options.p      = options.hasOwnProperty("p")      ? options.p      : null;
        options.d      = options.hasOwnProperty("d")      ? options.d      : null;
        options.image  = options.hasOwnProperty("image")  ? options.image  : null;

        this.id     = figures.length;
        this.size   = options.size;   // Width & height [x, y]
        this.p      = options.p;      // Position  [x, y]
        this.d      = options.d;      // Direction [x, y]

        if (options.image != null) {
            this.stroke = options.stroke;
            this.image = options.image;
        } else {
            this.color  = options.color;
            this.stroke = options.stroke;
        }

        figures.push(this);
    }

    Figure.prototype.switchDirection = function(axis) {
        this.d[axis] = -this.d[axis];
    }

    Figure.prototype.update = function() {
        var newPos = this.p[0] + this.d[0];

        for (var i = 0; i < figures.length; i++) {
            var otherFigure = figures[i];
            if (this.id != otherFigure.id) {

                if (this.p[0] < otherFigure.p[0] + otherFigure.size[0] &&
                    this.p[0] + this.size[0] > otherFigure.p[0] &&
                    this.p[1] < otherFigure.p[1] + otherFigure.size[1] &&
                    this.size[1] + this.p[1] > otherFigure.p[1]) {

                    // stop();
                    this.switchDirection(1);
                }
            }
        }


        if (newPos > gCanvas.width-this.size[0] || newPos < 0) {
            this.switchDirection(0);
        }

        newPos = this.p[1] + this.d[1];
        if(newPos > gCanvas.height-this.size[1] || newPos < 0) {
            this.switchDirection(1);
        }

        // Set new pos
        this.p[0] += this.d[0];
        this.p[1] += this.d[1];
    }

    Figure.prototype.render = function() {
        ctx.beginPath();

        if (this.image != null) {
            ctx.drawImage(SwimGame.sprites[this.image], this.p[0], this.p[1], this.size[0], this.size[1]);
        } else {
            ctx.rect(this.p[0], this.p[1], this.size[0], this.size[1]);
            ctx.fillStyle = this.color;
            ctx.fill();
        }

        ctx.closePath();
    }

    function preload() {
        var sprites = [];

        function loadSprites() {
            for (var i = 0; i < arguments.length; i++) {
                sprites[i] = new Image();
                sprites[i].src = arguments[i];
            }
        }

        loadSprites(
            "images/bg.jpg",
            "images/bat-01.png",
            "images/bat-02.png",
            "images/bat-03.png",
            "images/doot.gif"
        )

        SwimGame.sprites = sprites;

        return true;
    }

    function main(tFrame) {
        SwimGame.stopMain = window.requestAnimationFrame(main);
        SwimGame.tFrame = tFrame;

        update(tFrame); //Call your update method. In our case, we give it rAF's timestamp.
        render();
    }

    function ready() {
        gCanvas = document.getElementById("canvas");
        gCanvas.setAttribute("width", window.innerWidth);
        gCanvas.setAttribute("height", window.innerHeight);

        ctx = gCanvas.getContext("2d");

        for (var i = 0; i < 6; i++) {
            var image = Math.floor(Math.random()*(3-1)+1);
            
            shapes.push(
                new Figure({
                    size: [100, 50],
                    p: [Math.random()*((gCanvas.width-100)-100)+100, Math.random()*((gCanvas.height-100)-100)+100],
                    d: [Math.random()*(10-3)+3, Math.random()*(10-3)+3],
                    image: image
                })
            )
        }

        shapes.push(
            new Figure({
                size: [100, 100],
                p: [Math.random()*((gCanvas.width-100)-100)+100, Math.random()*((gCanvas.height-100)-100)+100],
                d: [Math.random()*(10-3)+3, Math.random()*(10-3)+3],
                image: 4
            })
        )

        main(); // Start cycle
    }

    function update(tFrame) {
        shapes.forEach(function(shape) {
            shape.update();
        });
    }

    function render() {
        ctx.fillStyle = "#000";
        ctx.fillRect(0, 0, gCanvas.width, gCanvas.height);
        ctx.drawImage(SwimGame.sprites[0], 0, 0, SwimGame.sprites[0].width, SwimGame.sprites[0].height, 0, 0, gCanvas.width, gCanvas.height);

        shapes.forEach(function(shape) {
            shape.render();
        });
    }

    function stop() {
        window.cancelAnimationFrame(SwimGame.stopMain);
    }
})();