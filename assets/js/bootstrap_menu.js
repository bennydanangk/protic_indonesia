function get_menu(url) {
    $.ajax({
  url: url,
  type: "GET",
  
  success: function (data) {
     
     $('#menu_bar').html(data);
  }
  });
  }
  