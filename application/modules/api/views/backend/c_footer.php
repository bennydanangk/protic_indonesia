
</html>

<script>

var token = "<?= $token?>";
function get_menu(token) {
    $.ajax({
                url: '<?= base_url('api/get_menu')?>',
                type: 'POST',
                data: token: token ,
                success: function (x) {
                    alert(x);
                }
            });
    
}

</script>
