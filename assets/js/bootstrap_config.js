function update(url) {
    $("#setting").submit(function(e) {


        e.preventDefault();
        $.ajax({
            url: url,
            type: 'POST',
            data: $(this).serialize(),             
            success: function(data) {    
                   
     let timerInterval
Swal.fire({
 title: 'Update Data Suksess!',
 html: 'Data Proses <b></b> .',
 timer: 1000,
 timerProgressBar: true,
 didOpen: () => {
   Swal.showLoading()
   const b = Swal.getHtmlContainer().querySelector('b')
   timerInterval = setInterval(() => {
     b.textContent = Swal.getTimerLeft()
   }, 100)
 },
 willClose: () => {
   clearInterval(timerInterval)
 }
}).then((result) => {
 /* Read more about handling dismissals below */
 if (result.dismiss === Swal.DismissReason.timer) {
   console.log('I was closed by the timer')
 }
})

            }
        });
    });




}