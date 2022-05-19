<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM PENDAFTARAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <?php
    include("konekDB.php");
    $enama          ="";
    $enisn          ="";
    $enik           ="";
    $etmplahir      ="";
    $etgllahir      ="";
    $ejalan         ="";
    $ert            ="";
    $erw            ="";
    $edusun         ="";
    $edesa          ="";
    $ecamat         ="";
    $ekpos          ="";
    $ehp            ="";
    $etelp          ="";
    $eemail         ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama-siswa"])) {
            $enama = "Nama Tidak Boleh Kosong";
        }
        else {
            $nama = cek_input($_POST["nama-siswa"]);
        }
        if (empty($_POST["nisn-siswa"])) {
            $enisn = "NISN Tidak Boleh Kosong";
        }
        else {
            $nisn = cek_input($_POST["nisn-siswa"]);
        }
        if (empty($_POST["nik-siswa"])) {
            $enik = "NIK Siswa Tidak Boleh Kosong";
        } else {
            $nik = cek_input($_POST["nik-siswa"]);
        }
        if (empty($_POST["tmplahir-siswa"])) {
            $etmplahir = "Tempat Lahir Siswa Tidak Boleh Kosong";
        } else {
            $tmplahir = cek_input($_POST["tmplahir-siswa"]);
        }
        if (empty($_POST["tgllahir-siswa"])) {
            $etgllahir = "Tanggal Lahir Siswa Tidak Boleh Kosong";
        } else {
            $tgllahir = cek_input($_POST["tgllahir-siswa"]);
        }
        if (empty($_POST["jalan-siswa"])) {
            $ejalan = "Alamat jalan siswa  Tidak Boleh Kosong";
        } else {
            $jalan = cek_input($_POST["jalan-siswa"]);
        }
        if (empty($_POST["rt-siswa"])) {
            $ert = "Alamat RT Siswa Tidak Boleh Kosong";
        } else {
            $rt = cek_input($_POST["rt-siswa"]);
        }
        if (empty($_POST["rw-siswa"])) {
            $erw = "Alamat RW Siswa Tidak Boleh Kosong";
        } else {
            $rw = cek_input($_POST["rw-siswa"]);
        }
        if (empty($_POST["dusun-siswa"])) {
            $edusun = "Alamat dusun Siswa Tidak Boleh Kosong";
        } else {
            $dusun = cek_input($_POST["dusun-siswa"]);
        }
        if (empty($_POST["desa-siswa"])) {
            $edesa = "Alamat Desa Siswa Tidak Boleh Kosong";
        } else {    
            $desa = cek_input($_POST["desa-siswa"]);
        }
        if (empty($_POST["camat-siswa"])) {
            $ecamat = "Alamat Kecamatan Siswa Tidak Boleh Kosong";
        } else {
            $camat = cek_input($_POST["camat-siswa"]);
        }
        if (empty($_POST["kpos-siswa"])) {
            $ekpos = "Alamat Kode Pos Siswa Tidak Boleh Kosong";
        } else {
            $kpos = cek_input($_POST["kpos-siswa"]);
        }
        if (empty($_POST["hp-siswa"])) {
            $ehp = "Nomor HP Siswa Tidak Boleh Kosong";
        } else {
            $hp = cek_input($_POST["hp-siswa"]);
        }
        if (empty($_POST["telp-siswa"])) {
            $etelp = "Alamat Telpon Siswa Tidak Boleh Kosong";
        } else {
            $telp = cek_input($_POST["telp-siswa"]);
        }
        if (empty($_POST["email-siswa"])) {
            $eemail = "Alamat E-Mail Siswa Tidak Boleh Kosong";
        } else {
            $email = cek_input($_POST["nik-siswa"]);
        }

        $jkelamin   = cek_input($_POST["jkelamin"]);
        $agama      = cek_input($_POST["agama-siswa"]);
        $bkhusus    = cek_input($_POST["bkhusus-siswa"]);
        $tmptinggal = cek_input($_POST["tmptinggal-siswa"]);
        $trans      = cek_input($_POST["trans-siswa"]);
        $kip        = cek_input($_POST["kip-siswa"]);
        
        //Jika semua variabel error bernilai kosong, maka query insert akan di jalankan
        if (empty($enama)) {
            if (empty($enisn)) {
                if (empty($enik)) {
                    if (empty($etmplahir)) {
                        if (empty($etgllahir)) {
                            if (empty($ejalan)) {
                                if (empty($ert)) {
                                    if (empty($erw)) {
                                        if (empty($edusun)) {
                                            if (empty($edesa)) {
                                                if (empty($ecamat)) {
                                                    if (empty($ekpos)) {
                                                        if (empty($ehp)) {
                                                            if (empty($etelp)) {
                                                                if (empty($eemail)) {
                                                                    //query insert ke dalam tabel regist
                                                                    $sql = "INSERT INTO datapribadi(nama,jkelamin,nisin,nik,tmplahir,tgllahir,agama,bkhusus,najalan,rt,rw,ndusun,ndesa,kecamatan,kpos,tmptinggal,trans,hp,telp,email,kip) VALUES ('$nama','$jkelamin','$nisn','$tmplahir','$tgllahir','$jalan','$rt','$rw','$dusun','$desa','$camat','$kpos','$tmptinggal','$trans','$hp','$telp','$email','$kip')";

                                                                    $query = mysqli_query($conn,$sql);
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    function cek_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    ?>
    <div class="container">
    <h1 class="alert alert-dark text-center mt-4">FORMULIR PENDAFTARAN PESERTA DIDIK BARU</h1>

        <div class="row align-items-center">
            <div class="col">
                <p>Tanggal : <span id="tgl-p"></span></p>
            </div>
        </div>

        <p class="alert alert-dark text-right">DATA PRIBADI</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <label for="nama-siswa" class="mt-3">Nama Lengkap</label>
                <input type="text" name="nama-siswa" id="nama-siswa" class="form-control <?php echo($enama !="" ? "is-invalid" : ""); ?>">
                <span class="warning-danger"><?php echo $enama; ?></span>
            </div>
            <div class="form-group">
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Jenis Kelamin</label>
                        </div>
                        <div class="col">
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="jkelamin" id="jkelamin" value="Laki - Laki" checked>
                                <label for="jKelamin">Laki - Laki</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="jkelamin" id="jkelamin" value="Perempuan">
                                <label for="jKelamin">Perempuan</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="form-group">
                <label for="nisn-siswa" class="mt-3">NISN </label>
                <input type="text" name="nisn-siswa" id="nisn-siswa" class="form-control <?php echo($enisn !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $enisn; ?></span>
            </div>
            <div class="form-group">
                <label for="nik-siswa" class="mt-3">NIK </label>
                <input type="text" name="nik-siswa" id="nik-siswa" class="form-control <?php echo($enik !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $enik; ?></span>
            </div>
            <div class="form-group">
                <label for="tmplahir-siswa" class="mt-3">Tempat Lahir </label>
                <input type="text" name="tmplahir-siswa" id="tmplahir-siswa" class="form-control <?php echo($etmplahir !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $etmplahir; ?></span>
            </div>
            <div class="form-group">
                <label for="tgllahir-siswa" class="mt-3">Tanggal Lahir</label>
                <input type="date" name="tgllahir-siswa" id="tgllahir-siswa" class="form-control <?php echo($etgllahir !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $etgllahir; ?></span>
            </div>
            <div class="form-group">
                <label for="agama-siswa" class="mt-3">Tanggal Lahir</label>
                <select name="agama-siswa" id="agama-siswa" class="form-select">
                    <option>ISLAM</option>
                    <option>KRISTEN / PROTESTAN</option>
                    <option>KATHOLIK</option>
                    <option>HINDU</option>
                    <option>BUDDHA</option>
                    <option>KONG HU CU</option>
                    <option>LAINNYA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bkhusus-siswa" class="mt-3">Berkebutuhan Khusus</label>
                <select name="bkhusus-siswa" id="bkhusus-siswa" class="form-select">
                    <option>TIDAK</option>
                    <option>NETRA</option>
                    <option>RUNGU</option>
                    <option>GRAHITA RINGAN</option>
                    <option>GRAHITA SEDANG</option>
                    <option>DAKSA RINGAN</option>
                    <option>DAKSA SEDANG</option>
                    <option>LARAS</option>
                    <option>WICARA</option>
                    <option>TUNDA GANDA</option>
                    <option>HIPER AKTIF</option>
                    <option>CERDAS ISTIMEWA</option>
                    <option>BAKAT ISTIMEWA</option>
                    <option>KESULITAN BELAJAR</option>
                    <option>NARKOBA</option>
                    <option>INDIGO</option>
                    <option>DOWN SINDROME</option>
                    <option>AUTIS</option>
                </select>
            </div>
            <div class="form-group mt-5">
                <label for="jalan-siswa" class="mt-3">Nama Jalan</label>
                <input type="text" name="jalan-siswa" id="jalan-siswa" class="form-control <?php echo($ejalan !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $ejalan; ?></span>
            </div>
            <div class="form-group">
                <label for="rt-siswa" class="mt-3">RT</label>
                <input type="text" name="rt-siswa" id="rt-siswa" class="form-control <?php echo($ert !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $ert; ?></span>
            </div>
            <div class="form-group">
                <label for="rw-siswa" class="mt-3">RW</label>
                <input type="text" name="rw-siswa" id="rw-siswa" class="form-control <?php echo($erw !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $erw; ?></span>
            </div>
            <div class="form-group">
                <label for="dusun-siswa" class="mt-3">Nama Dusun</label>
                <input type="text" name="dusun-siswa" id="dusun-siswa" class="form-control <?php echo($edusun !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $edusun; ?></span>
            </div>
            <div class="form-group">
                <label for="desa-siswa" class="mt-3">Nama Desa</label>
                <input type="text" name="desa-siswa" id="desa-siswa" class="form-control <?php echo($edesa !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $edesa; ?></span>
            </div>
            <div class="form-group">
                <label for="jalan-siswa" class="mt-3">Nama Kecamatan</label>
                <input type="text" name="camat-siswa" id="camat-siswa" class="form-control <?php echo($ecamat !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $ecamat; ?></span>
            </div>
            <div class="form-group">
                <label for="kpos-siswa" class="mt-3">Kode Pos</label>
                <input type="text" name="kpos-siswa" id="kpos-siswa" class="form-control <?php echo($ekpos !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $ekpos; ?></span>
            </div>
            <div class="form-group">
                <label for="tmptinggal-siswa" class="mt-3">Tempat Tinggal</label>
                <select name="tmptinggal-siswa" id="tmptinggal-siswa" class="form-select">
                    <option>BERSAMA ORANG TUA</option>
                    <option>WALI</option>
                    <option>KOS</option>
                    <option>ASRAMA</option>
                    <option>PANTI ASUHAN</option>
                    <option>LAINNYA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="trans-siswa" class="mt-3">Moda Transportasi</label>
                <select name="trans-siswa" id="trans-siswa" class="form-select">
                    <option>JALAN KAKI</option>
                    <option>KENDARAAN PRIBADI</option>
                    <option>KENDARAAN UMUM / ANGKOT / PETE - PETE</option>
                    <option>JEMPUTAN SEKOLAH</option>
                    <option>KERETA API</option>
                    <option>OJEK</option>
                    <option>ANDONG / BENDI / SADO / DOKAR / DELMAN / BECAK</option>
                    <option>PERAHU PENYEBRANGAN / RAKIT / GETEK</option>
                    <option>LAINNYA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hp-siswa" class="mt-3">Nomor HP</label>
                <input type="text" name="hp-siswa" id="hp-siswa" class="form-control <?php echo($ehp !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $ehp; ?></span>
            </div>
            <div class="form-group">
                <label for="telp-siswa" class="mt-3">Nomor Telepon</label>
                <input type="text" name="telp-siswa" id="telp-siswa" class="form-control <?php echo($etelp !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $etelp; ?></span>
            </div>
            <div class="form-group">
                <label for="email-siswa" class="mt-3">Alamat Email</label>
                <input type="text" name="email-siswa" id="email-siswa" class="form-control <?php echo($eemail !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $eemail; ?></span>
            </div>
            <div class="form-group">
                <label for="kip-siswa" class="mt-3">Nomor KIP</label>
                <input type="text" name="kip-siswa" id="kip-siswa" class="form-control" placeholder="Jika Ada">
            </div>
            <small class="fst-italic text-danger mt-2">*Harap Klik Tombol Simpan sebelum Beralih Ke Form Selanjutnya </small>
            <div class="form-group mt-3">
                <input type="submit" name="btn-submit" class="btn btn-success" value="SIMPAN">
                <a href="form3.php" role="button" class="btn btn-secondary">SELANJUTNYA</a>
            </div>
        </form>
    
    <script>
        var date = new Date();
        document.getElementById("tgl-p").innerHTML = date.toLocaleDateString();
    </script>
</body>
</html>