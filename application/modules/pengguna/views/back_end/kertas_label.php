<style media="screen">
body {
  background: rgb(204,204,204);
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="107"] {
  width: 5.56cm;
  height: 3cm;
}

@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
</style>

<title>Cetak Label</title>
<page size="107">

  <table  style="height:1mm" >



  <?php for ($i=0; $i <1 ; $i++) { ?>

    <tr >
      <td  colspan="7" ></td>
    </tr>
    <tr style="height:17.5mm" >
      <td style="width: 0.5mm;"></td>
      <td style="width: 49mm;" align="center"> <p style="font-size:10">  </p>
      </td>
 
      <td style="width: 0.5mm;"></td>
    </tr>

    <?php
  } ?>
  </table>

</page>


<script type="text/javascript">

// window.onload = function () {
//   			window.print();
//         setTimeout(window.close, 500);
//       }

</script>
