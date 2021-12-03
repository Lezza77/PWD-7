<?php
include 'koneksi.php';
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<table border="1">
    <tr>
        <th>NO</th>
        <th>NIM</th>
        <th>Nama Mhs</th>
        <th>Kode MK</th>
        <th> Nama MK</th>
        <th>Nilai</th>
    </tr>
    
    <?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $sql="SELECT siswa.nim AS 'NIM', siswa.nama AS 'Nama MHS', 
    matakuliah.kode AS 'Kode MK',matakuliah.namamk AS 'Nama MK',
    khs.nilai AS 'Nilai' FROM siswa JOIN khs ON siswa.nim = khs.nim
     JOIN matakuliah ON khs.kodeMK = matakuliah.kode where siswa.nim = '".$cari."'";
    $tampil = mysqli_query($con, $sql);
} else {
    $sql="SELECT siswa.nim AS 'NIM', siswa.nama AS 'Nama MHS',
     matakuliah.kode AS 'Kode MK',matakuliah.namamk AS 'Nama MK',
     khs.nilai AS 'Nilai' FROM siswa JOIN khs ON siswa.nim = khs.nim
      JOIN matakuliah ON khs.kodeMK = matakuliah.kode";
    $tampil = mysqli_query($con, $sql);
}
$no = 1;
while ($r = mysqli_fetch_array($tampil)) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $r['NIM']; ?></td>
        <td><?php echo $r['Nama MHS']; ?></td>
        <td><?php echo $r['Kode MK']; ?></td>
        <td><?php echo $r['Nama MK']; ?></td>
        <td><?php echo $r['Nilai']; ?></td>
    </tr>
    <?php
} ?>
</table>