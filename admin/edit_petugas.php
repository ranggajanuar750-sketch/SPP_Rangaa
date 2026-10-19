<?php
include_once "../src/koneksi.php";

# SKRIP TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
    $id_petugas  = $_POST['id_petugas'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $nama_petugas   = $_POST['nama_petugas'];
    $level   = $_POST['level'];

    // Validasi Form Inputs
    $pesanError = array();
    if (trim($id_petugas)=="") {
        $pesanError[] = "Data <b>ID Petugas</b> tidak boleh kosong !";
    }
    if (trim($username)=="") {
        $pesanError[] = "Data <b>Username</b> tidak boleh kosong !";
    }
    if (trim($password)=="") {
        $pesanError[] = "Data <b>Password</b> tidak boleh kosong !";
    }
    if (trim($nama_petugas)=="") {
        $pesanError[] = "Data <b>Nama Petugas</b> tidak boleh kosong !";
    }
    if (trim($level)=="") {
        $pesanError[] = "Data <b>Level</b> tidak boleh kosong !";
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
        $id_petugas= $_POST['id_petugas'];
        $sqlEdit = mysqli_query($koneksi, "UPDATE petugas SET username='$username', password='$password', nama_petugas    ='$nama_petugas', level ='$level' 
            WHERE id_petugas ='$id_petugas'");
        if($sqlEdit){
            echo "<center> <b> <font color = 'red' size = '4'> <p> Data Berhasil diubah </p> 
                </center> </b> </font> </br>
                <meta http-equiv='refresh' content='2; url=?open=data_petugas'>";
        }
        else{
            echo "<center> <b> <font color = 'red' size = '4'> <p> Data Gagal diubah </p> 
                </center> </b> </font> </br>
                <meta http-equiv='refresh' content='2; url=?open=data_petugas'>";
        }
        exit;
    }
}

# MEMBACA DATA DARI DATABASE UNTUK DIEDIT
$id_petugas  = $_GET['id_petugas'];
$sql     = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas ='$id_petugas'");
$data    = mysqli_fetch_array($sql);

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self" >
    <table class="table-list" width="650" border="0" cellspacing="1" cellpadding="3">
        <tr>
            <td bgcolor="#CCCCCC"><strong>EDIT DATA PETUGAS</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="182"><strong>ID Petugas </strong></td>
            <td width="6">:</td>
            <td width="440"><input name="id_petugas" type="text" value="<?php echo $data['id_petugas']; ?>" 
                readonly = "true" /></td>
        </tr>
        <tr>
            <td><strong>Username </strong></td>
            <td>:</td>
            <td><input name="username" type="text" value="<?php echo $data['username']; ?>" 
                size="10" maxlength="10" /></td>
        </tr>
        <tr>
            <td><strong>Password </strong></td>
            <td>:</td>
            <td><input name="password" type="password" value="<?php echo $data['password']; ?>" 
                size="50" maxlength="50" /></td>
        </tr>
        <tr>
            <td><strong>Nama Petugas </strong></td>
            <td>:</td>
            <td><input name="nama_petugas" type="text" value="<?php echo $data['nama_petugas']; ?>" 
                size="50" maxlength="50" /></td>
        </tr>
        <tr>
            <td><strong>Level </strong></td>
            <td>:</td>
            <td>
                <select name="level">
                    <option value="Kosong">-- Pilih Level --</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
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