function connecting(url) {
    $.ajax({
           url: url,
           type: "GET",
           data: {} ,
           success: function (response) {
         var x = JSON.parse(response);
         if(x.data != 'online'){
           $('#status_aplikasi').html('<p class="navbar-text"><span class="label bg-danger-400">Ofline</span></p>');
           $('#main_app').hide();
         }else{
           $('#status_aplikasi').html('<p class="navbar-text"><span class="label bg-success-400">Online</span></p>');
      }
       }
       });
       }