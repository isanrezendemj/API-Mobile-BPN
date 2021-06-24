<?php
include_once('include.php');
$conn=getconnection();
$kode=$_GET['kode'];
$sql="SELECT * FROM inventaris WHERE No_Aset='$kode'" ;
$result=$conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $user=[
        "id"=>$row['id'],
        "nama_barang"=>$row['Nama_Barang'],
        "tgl_peroleh"=>$row['Tgl_Peroleh'],
        "asal_perolehan"=>$row['Asal_Perolehan'],
        "rupiah_aset"=>$row['Rupiah_Aset'],
        "tempat_aset"=>$row['Tempat_Aset'],
        "merk_barang"=>$row['Merk_Barang'],
        "kondisi"=>$row['Kondisi'],
        "gambar"=> 'http://149.28.153.239:9000/storage/' . $row['Image']
    ];
}
$conn->close();
echo json_encode($user);
