$(document).ready(function(){
  //textarea

  $('#textarea').summernote({
        placeholder: $('#textarea').attr('placeholder'),
        tabsize: 10,
        height: 200,
        lang: "es-ES",
      });
  $('#textarea-details').summernote({
        placeholder: $('#textarea-details').attr('placeholder'),
        tabsize: 10,
        height: 200
      });
});