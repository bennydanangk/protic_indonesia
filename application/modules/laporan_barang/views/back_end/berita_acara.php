<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Berita Acara</title>
        <style>
          @page { margin: 10px; }
body { margin: 10px; }

            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 1px;
                padding-bottom: 1px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }

            /* .h2 {
  font-family: 'Raleway', sans-serif;
  font-weight: lighter;
  font-size: 100px;
  line-height: 0px;
  text-align: center
}
.h3 {
  font-family: 'Raleway', sans-serif;
  font-weight: lighter;
  font-size: 35px;
  line-height: 0px;
  text-align: center */
}


        </style>
    </head>
    <body>

    <?php 
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
 
   ?>

            <table >
                <tr align="center">
                    <td width="8%"><img style=' width:120px;height:90px;' src='data:image/jpeg;base64, <?= $conf[0]->logo_instansi;?>'></td>
                    <td width="80%" > 
                 <h2>PEMERINTAH KABUPATEN BOYOLALI</h2>
                    <h3 style="line-height: 0px;"> <?= $conf[0]->nama_instansi;?></h3>
                    <p ><?= $conf[0]->alamat_instansi;?> <?= $conf[0]->no_telp;?> Email:<?= $conf[0]->email_instansi;?></p>
                    </td>
                    <td width="12%" > 
                </tr>
            </table>


<hr style="line-height: 0;">

<table  width="100%">
    <tr>
    
    <td colspan="3" align="center" >
    <b><u>BERITA ACARA SERAH TERIMA BARANG </u></b>
    <br> Nomor: <i>BR/<?= $barang[0]->kode_id_barang?>/ <?= $barang[0]->id_barang?> /<?= date('d/m/Y')?></i>
    </td>
    </tr>

    <tr>
<td></td>
<td >
<p>Pada hari ini <?= tgl_indo(date('Y-m-d'))?> Saya <b> <?php echo $barang[0]->nama_pengguna ?></b>  telah menerima barang invertaris dengan sebagai berikut: </p>
</td>
<td></td>
</tr>


    <tr>

<td width="10%"></td>
<td width="80%">

<table width="100%">
    <tr>
        <td width="25%">   &ensp;Nama Barang</td>
        <td width="1%">:</td>
        <td width="74%"><?php echo $barang[0]->nama_barang ?></td>
    </tr>
    <tr>
        <td width="25%">  &ensp;Nama Barang</td>
        <td width="1%">:</td>
        <td width="74%"><?php echo $barang[0]->kode_id_barang ?></td>
    </tr>

    <tr>
        <td width="25%">  &ensp;Kode Barang</td>
        <td width="1%">:</td>
        <td width="74%"><?php echo $barang[0]->kode_barang ?></td>
    </tr>

    <tr>
        <td width="25%">  &ensp;Kode Lokasi</td>
        <td width="1%">:</td>
        <td width="74%"><?php echo $barang[0]->kode_lokasi ?></td>
    </tr>
    <tr>
        <td width="25%">  &ensp;Kondisi Barang</td>
        <td width="1%">:</td>
        <td width="74%"><?php echo $barang[0]->kondisi_barang ?></td>
    </tr>
    <tr>
        <td width="25%">  &ensp;Jumlah Barang</td>
        <td width="1%">:</td>
        <td width="74%"><?php echo $barang[0]->jumlah ?></td>
    </tr>
    <tr>
        <td width="25%">  &ensp;Ket</td>
        <td width="1%">:</td>
        <td width="74%"><?php echo $barang[0]->keterangan ?></td>
    </tr>


</table>
</td>
<td width="10%"></td>

</tr>
<td></td>
<td  >
<p>Barang tersebut saya terima dan selanjutnya dipergunakan sebagai perlengkapan Kantor/OPD/Ruang <b><?php echo $barang[0]->nama_ruangan ?></b> dan saya bertanggung jawab apabila terjadi kehilangan ataupun kerusakan sesuai perundang - undangan yang berlaku. </p>
</td>
<td></td>
</table>

<table  width="100%" >
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <b>         <?php echo $barang[0]->jabatan ?> ,</b>

<br><br><br><br>
<b><u><?php echo $barang[0]->nama_pengguna ?> </u></b><br>
<?php echo $barang[0]->nip ?> 
        </td>
    </tr>
</table>
     
    </body>
</html>