(function($){
  var prevImage, prevUrl;
  
  $(document).ready(function() {
    prevUrl = $('section.preview span.url');
    prevImage = $('section.preview img');
    
    $('#inWidth').on('keyup', updateImage);
    $('#inHeight').on('keyup', updateImage);
    $('#inType').on('change', updateImage);
  });
  
  function updateImage(){
    var width = parseInt($('#inWidth').val());
    var height = parseInt($('#inHeight').val());
    var type = $('#inType').val();
    
    var sizeText = width + "x" + height;
    var url = "http://spacer.viromania.com/" + sizeText + "." + type.toLowerCase();
    
    prevUrl.html(url);
    prevImage.attr('src', url);
    prevImage.attr('alt', sizeText);
    prevImage.attr('title', sizeText);
  }
  
})(jQuery)