=================&& Struk Total Pembelian $$=================
<br>
Total Harga Makanan = Rp. <?php echo $data['makan']?>,-
<br>
<br>
Total Harga Minuman = Rp. <?php echo $data['minum']?>,-
<br><br>
Total Keseluruhan = Rp. <?php echo $data['total']?>,-
<br><br>
<div style="width:500px; right: 100px; ">
	<div style="float: left; margin-right: 15px;">
  	Tanggal transaksi :<br>
 	 <?php echo $data['tgl']?>
 	</div>

	<div style="width: 270px; float: left;">
	  Nama kasir :<br>
	  <?php echo $data['penjual']?>
	</div>
	<div style=";width: 130px; float: left;">
	  Waktu transaksi :<br>
	  <?php echo $data['wkt']?>
	</div>
</div>  
<br><br><br><br><br>
========================================================
<br>
<script>window.print()</script>