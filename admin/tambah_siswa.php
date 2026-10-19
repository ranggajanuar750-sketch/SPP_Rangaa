<?php
include_once "../src/koneksi.php";

# SKRIP TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
    $nisn     = $_POST['nisn'];
    $nis      = $_POST['nis'];
    $nama     = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat   = $_POST['alamat'];
    $no_telp  = $_POST['no_telp'];
    $id_spp   = $_POST['id_spp'];
    $arraybulan = array("Juli","Agustus","September","Oktober","Nopember","Desember",
    "Januari","Februari","Maret","April","Mei","Juni");
    
    // Validasi Form Inputs
    $pesanError = array();
    if (trim($nisn)=="") {
        $pesanError[] = "Data <b>NISN </b> tidak boleh kosong !";
    }
    if (trim($nis)=="") {
        $pesanError[] = "Data <b>NIS</b> tidak boleh kosong !";
    }
    if (trim($nama)=="") {
        $pesanError[] = "Data <b>NAMA</b> tidak boleh kosong !";
    }
    if (trim($id_kelas)=="") {
        $pesanError[] = "Data <b>ID KELAS</b> tidak boleh kosong !";
    }
    if (trim($alamat)=="") {
        $pesanError[] = "Data <b>ALAMAT</b> tidak boleh kosong !";
    }
    if (trim($no_telp)=="") {
        $pesanError[] = "Data <b>NOMOR TELEPON</b> tidak boleh kosong !";
    }
    if (trim($id_spp)=="") {
        $pesanError[] = "Data <b>ID SPP</b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error dari Form
    if (count($pesanError) >= 1) {
        $noPesan = 0;
        foreach ($pesanError as $indeks => $pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "<br>";
    }
    else {
        // Skrip Simpan data ke Database
        $sql = mysqli_query($koneksi, "INSERT INTO siswa (nisn, nis, nama, id_kelas, alamat, no_telp, id_spp) 
               VALUES('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$id_spp')");
        
        if($sql){
            $ds = mysqli_fetch_array(mysqli_query($koneksi, "SELECT nisn FROM siswa WHERE nisn = '$nisn'"));
            $nisn = $ds['nisn'];

            // Membuat tagihan (12 bulan dimulai dari Juli)
            $tahunsekarang = date('Y');

            for($i = 0; $i < 12; $i++){
                $bulan = $arraybulan[$i];

                if ($i == 6) {
                    $tahunsekarang++;
                }

                // Jalankan query simpan tagihan pembayaran
                $simpan = mysqli_query($koneksi, "INSERT INTO pembayaran (nisn, bulan_tagihan, tahun_tagihan, id_spp) 
                          VALUES ('$nisn', '$bulan', '$tahunsekarang', '$id_spp')");
            } // Tutup kurung kurawal untuk 'for' loop

            // Notifikasi Berhasil di luar loop agar tidak berulang-ulang
            echo "<center><b><font color='red' size='4'><p>Data Berhasil disimpan</p></font></b></center><br>";
            echo "<meta http-equiv='refresh' content='2; url=?open=data_siswa'>";
        } 
        else {
            echo "<center><b><font color='red' size='4'><p>Data Gagal Disimpan!</p></font></b></center><br>";
            echo "<meta http-equiv='refresh' content='2; url=?open=data_siswa'>";
        }
    } // Tutup kurung kurawal untuk 'else' validasi error
} // Tutup kurung kurawal untuk 'if(isset($_POST['btnSimpan']))'
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>?open=tambah_siswa" method="post">
  <table cellspacing="1" cellpadding="3">
    <tr>
      <td bgcolor="#CCCCCC" colspan="3"><strong>TAMBAH DATA SISWA </strong></td>
    </tr>
    <tr>
      <td>NISN</td>
      <td>:</td>
      <td><input name="nisn" type="text" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td>NIS </td>
      <td>:</td>
      <td><input name="nis" type="text" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td>NAMA </td>
      <td>:</td>
      <td><input name="nama" type="text" size="50" maxlength="50" /></td>
    </tr>
    <tr>
      <td>KELAS </td>
      <td>:</td>
      <td>
        <select name="id_kelas">
          <option value="">..... </option>
          <?php
          $tampilkelas = mysqli_query($koneksi, "SELECT * FROM kelas");
          while ($bacadata = mysqli_fetch_array($tampilkelas)){
              echo "<option value='".$bacadata['id_kelas']."'>".$bacadata['nama_kelas']."</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>ALAMAT </td>
      <td>:</td>
      <td><input name="alamat" type="text" size="20" maxlength="50" /></td>
    </tr>
    <tr>
      <td>NO. TELEPON </td>
      <td>:</td>
      <td><input name="no_telp" type="text" size="13" maxlength="13" /></td>
    </tr>
    <tr>
      <td>NOMINAL SPP </td>
      <td>:</td>
      <td>
        <select name="id_spp">
          <option value="">..... </option>
          <?php
          $tampilspp = mysqli_query($koneksi, "SELECT * FROM spp");
          while ($bacadata = mysqli_fetch_array($tampilspp)){
              echo "<option value='".$bacadata['id_spp']."'>".$bacadata['nominal']."</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="btnSimpan" type="submit" value="Simpan" /></td>
    </tr>
  </table>
</form>