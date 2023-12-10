
</html>

<script>
//.inv module
var url = '<?= base_url()?>';
var app= 'user';
//end

connecting(url+'api/cek_koneksi');

tabel_content();
function tabel_content() {
    $('#tabel_content').load(url+'/'+app+'/tabel_content');
}

//=========add==
function open_add() {
    $('#tabel_content').load(url+'/'+app+'/form_add');
    
}
//======= Edit===

function open_edit(id) {
    $('#tabel_content').load(url+'/'+app+'/form_edit/'+id);
    
}








</script>