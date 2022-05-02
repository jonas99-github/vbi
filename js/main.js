$('form.ajax').on('submit', function(){
  var that = $(this),
      url = "test3.php",
      type = that.attr('method'),
      data={};
    that.find('[name]').each(function(index, value){
      var that = $(this),
          name = that.attr('name'),
          value = that.val();

      data[name] = value;
    });

$.ajax({
  url: url,
  type: type,
  data: data,
  success: function(response){
    //console.log(response);
  // document.getElementById("fini")=response;
alert(response);
  }
});
 return false;
});
