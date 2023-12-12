
</html>

<script>
//.inv module
var url = '<?= base_url()?>';
var app= 'seting';
//end

connecting(url+'api/cek_koneksi');


//========Open Backup

function backup_database() {
    // $('#tabel_content').load(url+'/'+app+'/backup');

    window.open(url+'/'+app+'/backup', '_blank');
    // open_edit();
}



open_edit();
function open_edit() {
  
    $('#tabel_content').load(url+'/'+app+'/form_edit/1');
    
}

//======Del Data









</script>