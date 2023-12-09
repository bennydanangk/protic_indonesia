
</html>

<script>
var url = '<?= base_url('api/cek_koneksi')?>';
var url_app = '<?= base_url('user/')?>';

connecting(url);

tabel_content(url_app);
function tabel_content(url_app) {
    $('#tabel_content').load(url_app+'/tabel_content');
}

//=========TEst



</script>