<?php

include 'Model/Model.php';
 
class Controller {

public $model;



public function __construct() {
$this->model = new Model;

}

public function index(){
	$datama = $this->model->getRows('makan');
	$datami = $this->model->getRows('minum');
	include 'View/View.php';
}

public function coba()
{
	/*var_dump($this->model);
	echo "<br><br>";
	var_dump($this->model->getRows('makan'));*/

	var_dump($_POST);
	/*$detail -> getJumlahMakan($_POST);
	$transaksi -> getTotal();
	$transaksi -> getTanggal();
	$transaksi -> getPenjual();*/
}

public function Hitung()
{
	$produkma = new Makanan($this->model,$_POST);
	$produkmi = new Minuman($this->model,$_POST);
	$detail = new Detail($produkma,$produkmi,$this->model);
	$transaksi = new Transaksi($_POST['tgl'],$_POST['kasir'],$_POST['wkt']);

	$data['makan'] = $detail -> getJumlahMakan($_POST) ;
	$data['minum'] = $detail -> getJumlahMinum($_POST);
	$data['total'] = $data['makan']+$data['minum'];
	$data['tgl'] = $transaksi -> getTanggal($_POST['hari']);
	$data['penjual'] = $transaksi -> getPenjual();
	$data['wkt'] = $_POST['wkt'];

	$detail->update();

	include 'View/Print.php';
}


 
}