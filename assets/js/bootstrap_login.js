function login(url) {
	$("#login").submit(function(e) {
         e.preventDefault();
         $.ajax({
             url: url,
             type: 'POST',
             data: $(this).serialize(),             
             success: function(data) {    
			
				let obj = JSON.parse(data);      
				
				s =obj['status']; 
				var st ='';
				if(s == 'login'){
					st ='success';
				}else {
					st ='error';
				}
				Swal.fire({
				icon: st ,
				title: st,
				text: obj['message'],
				footer: '<a href="">Terimakasih</a>',
				timer: 2000
				})   

				setTimeout(function () {
					window.location.href = obj['url']; 
					}, 2000); 
				$("#login").trigger("reset");
             }
         });
     });
}
