<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title;?></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                height: 70px;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
        </div>
        <table  width="100%" style="font-size: 12px">
            <tr>
                <td  width="50%"></td>
                <td align="right">
                <img src="<?= $conf[0]->logo?>" alt="Red dot" />
                <p>Yogyakarta, <?= date('d-m-Y')?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td>Nomor</td>
                            <td>:</td>
                            <td> <?= $data[0]->nomor_surat?></td>
                        </tr>

                        <tr>
                            <td>Prihal</td>
                            <td>:</td>
                            <td> Surat Penawaran Harga</td>
                        </tr>

                        <tr>
                            <td>Lampiran</td>
                            <td>:</td>
                            <td> Brosur</td>
                        </tr>
                    </table>
                </td>
                <td></td>
            </tr>

            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td>Kepada Yth</td>
                         </tr>
                         <tr>
                            <td>Direktur/Pimpinan</td>
                            </tr>
                         <tr>
                            <td><?= $data_surat[0]->nama_customer?></td>
                            </tr>
                         <tr>
                            <td><?= $data_surat[0]->alamat?>
                            </td>     
                        </tr>

                       
                    </table>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Dengan Hormat, </p>
                    <p>Sebelumnya kami mengucapkan terimakasih atas Kepercayaan Bapak/Ibu Kepada Kami Untuk dapat ikut 
Serta Berkontribusi dalam memenuhi kebutuhan di Instansi yang bapak/ibu Pimpin.
Bersama Ini Kami PT. Protic Care Indonesia Selaku Distributor Alat Kesehatan, Bermaksud Menyampaikan 
Informasi Harga Sebagai Berikut :</p>
                </td>
            </tr>



            <td colspan="2">
                  
                <table id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Jumlah </th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}


$no = 0;
foreach ($data as $k) {
    $no++;
  ?>

<tr>
                                    <td scope="row"><?= $no?></td>
                                    <td> <?= $k->nama_data_barang?> </td>
                                    <td><?= $qty =$k->qty;?></td>
                                    <td><?= $k->kode_barang;?></td>
                                    <td><?= rupiah($harga = $k->harga_jual);?></td>
                                    <td><?= rupiah($qty * $harga)?></td>
                                </tr>
                               

  <?php
}
                            ?>
                               
                            </tbody>
                        </table>

                </td>
            </tr>


<tr>
    <td colspan="2" >
Keterangan : <br>
<ol type="1">
  <li>Harga SudahTermasuk Pajak </li>
  <li>Garansi 3 Tahun </li>
  <li>Pembayaran :

  <ul style="list-style-type:disc;">
            <li>100% Pelunasan 60 hari Setelah Barang diterima</li>
            <li>Ditransfer Ke Rekening Bank BCA Cabang Adi Sucipto Yogyakarta Nomor 
6975519230 an. PT. Edgar Prima Solution</li>
          
            </ul>
  </li>
            
  <li>Free Biaya Pengiriman dan Instalasi </li>
  <li>Penawaran ini Berlaku 14 (empat belas) Hari Sejak Surat Di Terbitkan :</li>
</ol>

   </td>
</tr>

<tr align="center">
    <td>
        <?php $barcode = strtr( $data_surat[0]->nomor_surat, "/", "_" );  ?>
  <img height="100" width="100" src="<?= base_url('assets/qr/'.$barcode.'.png')?>" alt="">      
  </td>
    <td>

    Hormat Kami <br>
<?= $conf[0]->nama_vendor;?> <br><br>

<br> <?= $conf[0]->nama_pimpinan;?> 
<br>Direktur


    </td>
</tr>

        </table>

       

        <h6 align="center">
        <hr>
        Office: PT. Protic Care Indonesia - Ruko LA No.02 , Jl. Keniten, Tamanmartani, Kalasan, Sleman, DI Yogyakarta 55571 <br>
Email : protic.indonesia@gmail.com - Website : www.protic.id
        </h6>
      
    </body>
</html>