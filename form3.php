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
    $enayah     ="";
    $enibu      ="";
    $ethlayah   ="";
    $ethlibu    ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama-ayah"])) {
            $enayah = "Nama Ayah Tidak Boleh Kosong";
        }
        else {
            $nayah = cek_input($_POST["nama-ayah"]);
        }
        if (empty($_POST["thl-ayah"])) {
            $ethlayah = "Tahun Lahir Ayah Tidak Boleh Kosong";
        }
        else {
            $thlayah = cek_input($_POST["thl-ayah"]);
        }
        if (empty($_POST["nama-ibu"])) {
            $enibu = "Nama Ibu Tidak Boleh Kosong";
        }
        else {
            $nibu = cek_input($_POST["nama-ibu"]);
        }
        if (empty($_POST["thl-ibu"])) {
            $ethlibu = "Tahun Lahir Ibu Tidak Boleh Kosong";
        }
        else {
            $thlibu = cek_input($_POST["thl-ibu"]);
        }

        $pdayah = cek_input($_POST["pd-ayah"]);
        $pkayah = cek_input($_POST["pk-ayah"]);
        $phayah = cek_input($_POST["ph-ayah"]);
        $bkhayah = cek_input($_POST["bkh-ayah"]);
        $pdibu = cek_input($_POST["pd-ibu"]);
        $pkibu = cek_input($_POST["pk-ayah"]);
        $hibu = cek_input($_POST["ph-ibu"]);
        $bkhibu = cek_input($_POST["bkh-ibu"]);

        //Jika semua variabel error bernilai kosong, maka query insert akan di jalankan
        if (empty($enayah)) {
            if (empty($ethlayah)) {
                if (empty($enibu)) {
                    if (empty($ethlibu)) {
                        //query insert ke dalam tabel regist
                        $sql = "INSERT INTO dataorangtua(nama_ayah,thlahir_ayah,pd_ayah,pk_ayah,ph_ayah,bkh_ayah,nama_ibu,thlahir_ibu,pd_ibu,pk_ibu,ph_ibu,bkh_ibu) VALUES ('$nayah','$thlayah','$pdayah','$pkayah','$phayah','$bkhayah','$nibu','$thlibu','$pdibu','$pkibu','$phibu','$bkhibu)";

                        $query = mysqli_query($conn,$sql);
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="row align-items-center">
            <div class="col">
                <p>Tanggal : <span id="tgl-p"></span></p>
            </div>
        </div>

        <p class="alert alert-dark text-right">DATA AYAH</p>
            <div class="form-group">
                <label for="nama-ayah" class="mt-1">Nama Ayah</label>
                <input type="text" name="nama-ayah" id="nama-ayah" class="form-control <?php echo($enayah !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $enayah; ?></span>
            </div>
            <div class="form-group">
                <label for="thl-ayah" class="mt-1">Tahun Lahir</label>
                <input type="text" name="thl-ayah" id="thl-ayah" class="form-control <?php echo($ethlayah !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $ethlayah; ?></span>
            </div>
            <div class="form-group">
                <label for="pd-ayah" class="mt-3">Pendidikan Ayah</label>
                <select name="pd-ayah" id="pd-ayah">
                    <option>TIDAK SEKOLAH</option>
                    <option>PUTUS SD</option>
                    <option>SD SEDERAJAT</option>
                    <option>SMP SEDERAJAT</option>
                    <option>SMA SEDERAJAT</option>
                    <option>D1</option>
                    <option>D2</option>
                    <option>D3</option>
                    <option>D4 / S1</option>
                    <option>S2</option>
                    <option>S3  </option>
                </select>
            </div>
            <div class="form-group">
                <label for="pk-ayah" class="mt-3">Pekerjaan Ayah</label>
                <select name="pk-ayah" id="pk-ayah">
                    <option>TIDAK BEKERJA</option>
                    <option>NELAYAN</option>
                    <option>PETANI</option>
                    <option>PETERNAK</option>
                    <option>PNS / TNI / POLRI</option>
                    <option>KARYAWAN SWASTA</option>
                    <option>PEDAGANG KECIL</option>
                    <option>PEDAGANG BESAR</option>
                    <option>WIRASWASTA</option>
                    <option>WIRAUSAHA</option>
                    <option>BURUH</option>
                    <option>PENSIUNAN</option>
                    <option>LAINNYA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ph-ayah" class="mt-3">Penghasilan Ayah</label>
                <select name="ph-ayah" id="ph-ayah">
                    <option>< Rp. 500.000</option>
                    <option>Rp. 500.000 - Rp. 999.999</option>
                    <option>Rp. 1.000.000 - Rp. 1.999.999</option>
                    <option>Rp. 2.000.000 - Rp. 4.999.999</option>
                    <option>Rp. 5.000.000 - Rp. 20.000.000</option>
                    <option>> Rp. 20.000.000</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bkh-ayah" class="mt-3">Berkebutuhan Khusus</label>
                <select name="bkh-ayah" id="bkh-ayah" class="form-select">
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

        <p class="alert alert-dark text-right mt-5">DATA IBU</p>
            <div class="form-group">
                <label for="nama-ibu" class="mt-1">Nama Ibu</label>
                <input type="text" name="nama-ibu" id="nama-ibu" class="form-control <?php echo($enibu !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $enibu; ?></span>
            </div>
            <div class="form-group">
                <label for="thl-ibu" class="mt-1">Tahun Lahir</label>
                <input type="text" name="thl-ibu" id="thl-ibu" class="form-control <?php echo($ethlayah !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $ethlibu; ?></span>
            </div>
            <div class="form-group">
                <label for="pd-ibu" class="mt-3">Pendidikan Ibu</label>
                <select name="pd-ibu" id="pd-ibu">
                    <option>TIDAK SEKOLAH</option>
                    <option>PUTUS SD</option>
                    <option>SD SEDERAJAT</option>
                    <option>SMP SEDERAJAT</option>
                    <option>SMA SEDERAJAT</option>
                    <option>D1</option>
                    <option>D2</option>
                    <option>D3</option>
                    <option>D4 / S1</option>
                    <option>S2</option>
                    <option>S3  </option>
                </select>
            </div>
            <div class="form-group">
                <label for="pk-ibu" class="mt-3">Pekerjaan Ibu</label>
                <select name="pk-ibu" id="pk-ibu">
                    <option>TIDAK BEKERJA</option>
                    <option>NELAYAN</option>
                    <option>PETANI</option>
                    <option>PETERNAK</option>
                    <option>PNS / TNI / POLRI</option>
                    <option>KARYAWAN SWASTA</option>
                    <option>PEDAGANG KECIL</option>
                    <option>PEDAGANG BESAR</option>
                    <option>WIRASWASTA</option>
                    <option>WIRAUSAHA</option>
                    <option>BURUH</option>
                    <option>PENSIUNAN</option>
                    <option>LAINNYA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ph-ibu" class="mt-3">Penghasilan Ibu</label>
                <select name="ph-ibu" id="ph-ibu">
                    <option>< Rp. 500.000</option>
                    <option>Rp. 500.000 - Rp. 999.999</option>
                    <option>Rp. 1.000.000 - Rp. 1.999.999</option>
                    <option>Rp. 2.000.000 - Rp. 4.999.999</option>
                    <option>Rp. 5.000.000 - Rp. 20.000.000</option>
                    <option>> Rp. 20.000.000</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bkh-ibu" class="mt-3">Berkebutuhan Khusus</label>
                <select name="bkh-ibu" id="bkh-ibu" class="form-select">
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
        </form>
            <small class="fst-italic text-danger mt-2">*Harap Klik Tombol Simpan sebelum Beralih Ke Form Selanjutnya </small>
            <div class="form-group mt-3">
                <input type="submit" name="btn-submit" class="btn btn-success" value="SIMPAN">
            </div>
    </div>

    <script>
        var date = new Date();
        document.getElementById("tgl-p").innerHTML = date.toLocaleDateString();
    </script>
</body>
</html>