<?php
include_once "../src/koneksi.php";

# SKRIP TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
    $nisn  = $_POST['nisn'];
    $nis     = $_POST['nis'];
    $nama     = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat   = $_POST['alamat'];
    $no_telp  = $_POST['no_telp'];
    $id_spp   = $_POST['id_spp'];

    // Validasi Form Inputs
    $pesanError = array();
    if (trim($nisn)=="") {
        $pesanError[] = "Data <b>NISN</b> tidak boleh kosong !";
    }
    if (trim($nis)=="") {
        $pesanError[] = "Data <b>NIS</b> tidak boleh kosong !";
    }
    if (trim($nama)=="") {
        $pesanError[] = "Data <b>Nama</b> tidak boleh kosong !";
    }
    if (trim($id_kelas)=="") {
        $pesanError[] = "Data <b>ID Kelas</b> tidak boleh kosong !";
    }
    if (trim($alamat)=="") {
        $pesanError[] = "Data <b>Alamat</b> tidak boleh kosong !";
    }
    if (trim($no_telp)=="") {
        $pesanError[] = "Data <b>No. Telepon</b> tidak boleh kosong !";
    }
    if (trim($id_spp)=="") {
        $pesanError[] = "Data <b>ID SPP</b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error dari Form
    if (count($pesanError)>=1 ){
        $noPesan=0;
        foreach ($pesanError as $indeks=>$pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "</div> <br>";
    } else {

        // Skrip Simpan data ke Database
        $sqlEdit = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn', nis='$nis', nama='$nama', 
        id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp' WHERE nisn ='$nisn'");
        if($sqlEdit){
            echo "<center> <b> <font color = 'red' size = '4'> <p> Data Berhasil diubah </p> 
                </center> </b> </font> </br>
                <meta http-equiv='refresh' content='2; url=?open=data_siswa'>";
        }
        else{
            echo "<center> <b> <font color = 'red' size = '4'> <p> Data Gagal diubah </p> 
                </center> </b> </font> </br>
                <meta http-equiv='refresh' content='2; url=?open=data_siswa'>";
        }
        exit;
    }
}

# MEMBACA DATA DARI DATABASE UNTUK DIEDIT
$nisn  = $_GET['nisn'];
$sql     = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn ='$nisn'");
$data    = mysqli_fetch_array($sql);

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" >
    <table class="table-list" width="650" border="0" cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>EDIT DATA SISWA </strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td><input name="nisn" type="text" size="10" maxlength="10" value="<?php echo $data['nisn']; ?>"
             readonly = "true" /></td>
        </tr>
        <tr>
            <td><strong>NIS </strong></td>
            <td>:</td>
            <td><input name="nis" type="text" value="<?php echo $data['nis']; ?>" 
                size="20" maxlength="10" /></td>
        </tr>
        <tr>
            <td><strong>Nama </strong></td>
            <td>:</td>
            <td><input name="nama" type="text" value="<?php echo $data['nama']; ?>" 
                size="50" maxlength="50" /></td>
        </tr>
        <tr>
            <td><strong>ID Kelas </strong></td>
            <td>:</td>
            <td>
                <select name="id_kelas">
                    <option value="Kosong">.....</option>
                    <?php
                    $tampilkanKelas = mysqli_query($koneksi, "select * from kelas");
                    while ($bacaData = mysqli_fetch_array($tampilkanKelas)){
                        if($bacaData['id_kelas'] == $data['id_kelas']){
                            $cek = "selected";
                        } else { $cek = ""; }
                        echo "<option value='$bacaData[id_kelas]' $cek>$bacaData[nama_kelas]</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><strong>Alamat </strong></td>
            <td>:</td>
            <td><input name="alamat" type="text" value="<?php echo $data['alamat']; ?>" 
                size="50" maxlength="50" /></td>
        </tr>
        <tr>
            <td><strong>No. Telepon </strong></td>
            <td>:</td>
            <td><input name="no_telp" type="text" value="<?php echo $data['no_telp']; ?>" 
                size="50" maxlength="50" /></td>
        </tr>
        <tr>
            <td><strong>Nominal </strong></td>
            <td>:</td>
            <td>
                <select name="id_spp">
                    <option value="Kosong">.....</option>
                    <?php
                    $tampilkanSpp = mysqli_query($koneksi, "select * from spp");
                    while ($bacaData = mysqli_fetch_array($tampilkanSpp)){
                        if($bacaData['id_spp'] == $data['id_spp']){
                            $cek = "selected";
                        } else { $cek = ""; }
                        echo "<option value='$bacaData[id_spp]' $cek>$bacaData[nominal]</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="btnSimpan" type="submit" id="btnSimpan" value="Simpan" /></td>
        </tr>
    </table>
</form>