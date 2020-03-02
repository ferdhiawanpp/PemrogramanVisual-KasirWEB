
<?php

interface Produk
{
  public function getHarga();
}

class Makanan implements Produk
{
  protected $hargaMakan = array();

  function __construct($db, $post)
  {
    //var_dump($post) ;
    $qmakan = $db->getRows('makan', array('order_by' => 'id_produk DESC'));

    foreach ($qmakan as $rowma) {
      $this->hargaMakan[$rowma['nama']] = $rowma['harga'];

      $jumlah =  floatval($rowma['jumlah']) - floatval($post[$rowma['nama']]);

      //$userData = ;
      $condition = array('id_produk' => $rowma['id_produk']);

      $db->update('makan', array('jumlah' => $jumlah), $condition);
    }
  }

  public function getHarga()
  {
    return $this->hargaMakan;
  }
}

class Minuman implements Produk
{
  protected $hargaMinum = array();

  function __construct($db)
  {
    $qminum = $db->getRows('minum', array('order_by' => 'id_produk DESC'));

    foreach ($qminum as $rowmi) {
      $this->hargaMinum[$rowmi['nama']] = $rowmi['harga'];

      $jumlah = $rowmi['jumlah'] - '$post'[$rowmi['nama']];

      $userData = array(
        'jumlah' => $jumlah
      );
      $condition = array('id_produk' => $rowmi['id_produk']);

      $db->update('minum', $userData, $condition);
    }
  }

  public function getHarga()
  {
    return $this->hargaMinum;
  }
}


class Detail
{

  protected $db;
  protected $produkma;
  protected $produkmi;
  protected $totalMakan;
  protected $totalMinum;

  public function __construct($produkma, $produkmi, $db)
  {
    $this->produkma = $produkma;
    $this->produkmi = $produkmi;
    $this->db = $db;
  }

  public function getJumlahMakan($post)
  {

    $q = $this->db->getRows('makan');

    $harga = $this->produkma->getHarga();

    $jml = count($post);

    foreach ($q as $row) {
      $p = array();

      $nama = $row['nama'];

      if ($post[$nama] == null) {
        $p[$nama] = 0;
      } else {
        $p[$nama] = $post[$nama];
      }
      $totalMakan = $p[$nama] * $harga[$nama];
      $this->totalMakan = $this->totalMakan + $totalMakan;
    }
    return $this->totalMakan;
  }

  public function getJumlahMinum($post)
  {

    $q = $this->db->getRows('minum');

    $harga = $this->produkmi->getHarga();

    $jml = count($post);

    foreach ($q as $row) {
      $p = array();

      $nama = $row['nama'];

      if ($post[$nama] == null) {
        $p[$nama] = 0;
      } else {
        $p[$nama] = $post[$nama];
      }
      $totalMinum = $p[$nama] * $harga[$nama];
      $this->totalMinum = $this->totalMinum + $totalMinum;
    }
    return $this->totalMinum;
  }

  public function update()
  {

    $userData = array(
      'harga_makan' => $this->totalMakan,
      'harga_minum' => $this->totalMinum,
      'total' => $this->totalMakan + $this->totalMinum
    );
    $this->db->insert('detail', $userData);
  }
}

class Transaksi extends Detail
{

  protected $penjual;
  protected $tgl;
  protected $wkt;

  function __construct($tgl, $penjual, $wkt)
  {
    $this->tgl = $tgl;
    $this->penjual = $penjual;
    $this->wkt = $wkt;

    /*$userData = array(
        'nama_kasir' => $penjual,
        'tanggal_transaksi' => $tgl,
        'waktu_transaksi' => $wkt
    );
    $db->insert('transaksi',$userData);*/
  }


  public function getPenjual()
  {
    return $this->penjual;
  }

  public function getTanggal($h)
  {
    $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

    $tanggal = explode("-", $this->tgl);

    return $hari[$h] . "," . $tanggal[2] . "-" . $bulan[$tanggal[1]] . "-" . $tanggal[0];
  }
}

?>