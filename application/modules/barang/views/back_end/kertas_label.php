<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title;?></title>
        <style>
          @page { margin: 0px; }
body { margin: 0px; }

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
        </style>
    </head>
    <body>
        <div style="text-align:center">
         
        </div>
        <table id="table">
            <thead>
                <tr>
                    <!-- <th> <img style='display:block; width:100px;height:70px;' src='data:image/jpeg;base64, <?= $conf[0]->logo_instansi;?>'></th> -->
                    <th colspan='3' style="text-align:center" > <?= $barang[0]->kode_id_barang;?></th>
                  
                </tr>
            </thead>
            <tbody>
                <tr>
                     <td><img style=' width:100px;height:70px;' src='data:image/jpeg;base64, <?= $conf[0]->logo_instansi;?>'> </td>
                    <td><?= $barang[0]->kode_barang?> <hr> <?= $barang[0]->kode_lokasi?> </td>
                    <td> <img src="<?= base_url('assets/qr/'.$barang[0]->kode_id_barang.'.png')?>" style='display:block; width:100px;height:100px;'></td>
                 
                </tr>

                <tr><th colspan='3' style="text-align:center"> <?= $barang[0]->nama_barang;?></th> </tr>
               
            </tbody>
        </table>
    </body>
</html>