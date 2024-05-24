/* Optimale Systemer - 2016 */
(function() {
  var dropzone = $('#image-dropzone');

  $.fn.extend({
    filedrop: function (options) {
      var defaults = {
        callback: null
      }
      options = $.extend(defaults, options)
      return this.each(function () {
        var files = []
        var $this = $(this)

        $this.bind('dragover dragleave drop', function (event) {
          event.stopPropagation()
          event.preventDefault()
        })

        $this.bind('dragenter', function(event) {
          dropzone.addClass('dragover');
        });

        $this.bind('dragleave', function(event) {
          dropzone.removeClass('dragover');
        });

        $this.bind('drop', function (event) {
          dropzone.removeClass('dragover');

          // Get all files that are dropped
          files = event.originalEvent.target.files || event.originalEvent.dataTransfer.files

          // Send files trough callback
          if (options.callback) {
            options.callback(files);
          }

          return false
        })
      })
    }
  })

  var preview = $('#image-dropzone-preview');
  var fileSelected = false;

  dropzone.click(function(event) {
    var input = $('#image-dropzone-data');

    input.click();
    
    if (!fileSelected) {
      fileSelected = true;
      
      input.change(function(changeEvent) {
        changeEvent.stopPropagation();
        files = changeEvent.originalEvent.target.files || changeEvent.originalEvent.dataTransfer.files;
        processFiles(files);
        fileSelected = false;
        input.off('change');
      });
    }
  });

  // Event listener filedropper
  dropzone.filedrop({
    callback: function (files) {
      processFiles(files);
    }
  })

  function processFiles(files) {
    for (i = 0; i < files.length; i++) {

      if (files[i].type.match('image.*') && files[i].name.match(/\.(jpg|jpeg|gif|png|svg|ico|webp|exif|bmp|tiff|bpg|flif)$/i) ) {
        var reader = new FileReader();

        reader.onload = function (event) {
          // Show preview image
          preview.attr('src', event.target.result);
          preview.data('changed', '1');
          // console.log(event.target.result);
          $('#image-dropzone-data-base').val(event.target.result);
        }

        reader.readAsDataURL(files[i]);
      } else {
        alert('Bare bilder er tillat');
      }
    }
  }
})();;