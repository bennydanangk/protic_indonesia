
</html>

<script>

var token = "<?= $token?>";
get_menu(token)
function get_menu(token) {
    $.ajax({
                url: '<?= base_url('api/get_menu')?>',
                type: 'POST',
                data: {token: token},
                success: function (x) {
                //    console.log(x);
                  

                   setTimeout(function(){
                    // $('#menu_output').html(x);
                    document.getElementById('menu_output').innerHTML = x;
   },1000); //delay is in milliseconds 
                }
            });
    
}

</script>
