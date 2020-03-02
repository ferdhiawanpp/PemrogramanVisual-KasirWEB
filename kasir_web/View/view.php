<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasir WaroengQue</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .harga{
          float: right;
          margin-right:  500px;
      }
      .menuka{
        float: right;
        margin-right: 450px;
      }
      .menuki{
        float: left;
      }
      .pesanka{
        width: 170px;
        float: right;
        margin-right: 80px;
      }
      .pesanki{
        width: 170px;
        float: left;
      }
    </style>
    <script type="text/javascript">
    	var tgl = new Date();
     hari = tgl.getDay();
    var tanggal = tgl.getDate();
    var bulan = tgl.getMonth();
    var tahun = tgl.getFullYear();
    tanggallengkap = tahun + "-" + bulan + "-" + tanggal  ;

    
    </script>
  </head>
  <body>
 <nav class="navbar-inverse" role="navigation" >
   <div class="container-fluid">
     <div class="navbar-header">
       <a class="navbar-brand" href="#" data-toggle="modal" data-target="#buy"> WaroengQue</a>
     </div>

     
   </div><!-- /.container-fluid -->
 </nav>
 <div class="container" style="margin-top:50px;">
   <div class=" panel-success">
     <div class="panel-body bg-primary">
    <div class="container">
      <h1><img src="<?php echo $basepath."asset/img/Food.png"?>" height="50px" width="50px"> Selamat datang di WaroengQue</h1>
     <h2> Selamat Makan :)</h2>
    </div>
     </div>
   </div>

  <div class="panel panel-default">
    <div class="panel-body">
      <div class="container">
     <div class="col-md-10" style="width: 800px;">
       <h2 style="float: left;">Harga Makanan:</h2>
       <h2 style="float: right;">Harga Minuman:</h2>
     </div>
       <br><br><br> <h3></h3><br>

       <?php
       	$jml = count($datama);
       for ($i=0; $i < $jml ; $i++) { 
       		$ma=$datama[$i];
       		$mi=$datami[$i];?>
       <h3 class="menuki">Nasi <?php echo $ma['nama'] ;?></h3>
       <h3 class="menuka" ><?php echo $mi['nama'] ;?> / Es </h3>
       <br><br><br>
       <h4 class="harga"><?php echo $mi['harga'];?></h4>
       <h4><?php echo $ma['harga'];?></h4>
       <?php
       }
		$ma=null;
		$mi=null;
       ?>

      </div>
    </div>
  </div>
 </div>

 <!-- [Modal Form] -->
 <div class=" " id=""  >
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header bg-danger" style="border-radius: 5px 5px 0px 0px;">
         <h4 class="modal-title" id="">Form pembelian</h4>
       </div>
       
       <form class="form-group" action="<?php echo $basepath.'index.php?F=Controller/Hitung'?>" method="post">
        <div class="modal-body">
        <div class="input-group pesanki" > 
          <span class="input-group-addon" style="width: 100px;">Makanan</span>
          <span class="form-control">Jumlah</span>
        </div>
        <div class="input-group pesanka" > 
          <span class="input-group-addon" style="width: 100px;">Minuman</span>
          <span class="form-control">Jumlah</span>
        </div>
        <input type="hidden" name="hari" id="hari">
        <input type="hidden" name="wkt" id="jam">
        <input type="hidden" name="tgl" id="saiki">

        <?php
       for($i=0; $i < $jml ; $i++) { 
       		$ma=$datama[$i];
       		$mi=$datami[$i];?>
       	
        <br><br><br>
         <div class="input-group pesanki"  > 
          <span class="input-group-addon" style="width: 100px">Nasi <?php echo $ma['nama'];?></span>
          <input type="number" class="form-control"  name="<?php echo $ma['nama'] ;?>">
        </div>

        <div class="input-group pesanka"  > 
          <span class="input-group-addon" style="width: 100px"><?php echo $mi['nama'] ;?>/Es </span>
          <input type="number" class="form-control" name="<?php echo $mi['nama'] ;?>">
        </div>
        <?php
    		}?>

       <br><br><br>
       </div>
       <div class="modal-footer">
       	<div style="float: left;">
       		Kasir : <input type="text" name="kasir">
       	</div> 
         <button type="submit" class="btn btn-primary" name="check" ><i class="fa fa-check"></i> Cek Total</button>
     	</div>
     </form>
       </div>
     </div>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	window.onload=document.getElementById("saiki");
    var element_jam = document.getElementById("saiki");
    element_jam.value = tanggallengkap;

    window.onload=document.getElementById("hari");
    var element_hari = document.getElementById("hari");
    element_hari.value = hari;

    window.setTimeout("waktu()",500);  

	function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",500);  
	document.getElementById("jam").value = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
	}
    </script>
  </body>
</html>