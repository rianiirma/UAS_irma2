<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penggajihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="text-center mb-4">
            <img src="logo.png" alt="Logo" class="img-fluid" style="max-width: 200px;">
            <h2 class="mt-3">PENGGAJIHAN<br>GURU/KARYAWAN YAYASAN ASSALAAM</h2>
        </div>
        <div class="card shadow">
            <div class="card-header">
                <b>Data Penggajihan</b>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <fieldset>
                        <div class="row mb-3">
                            <div class="md-6">
                                <label for="no" class="form-label">No</label>
                                <input type="number" id="no" name="no" class="form-control" placeholder="No" required>
                            </div>
                            <div class="md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="-md-6">
                                <label for="unit" class="form-label">Unit Pendidikan</label>
                                <select id="unit" name="unit" class="form-select" required>
                                    <option value="">Pilih Unit Pendidikan</option>
                                    <option value="TK">TK</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMK">SMK</option>
                                </select>
                            </div>
                            <div class="-md-6">
                                <label for="tanggal_gaji" class="form-label">Tanggal Gaji</label>
                                <input type="date" id="tanggal_gaji" name="gaji" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="p-3">
                                    <legend class="w-auto px-2"><b>Gaji</b></legend>
                                    <div class="mb-3">
                                        <label for="jabatan" class="form-label">Jabatan</label>
                                        <select id="jabatan" name="jabatan" class="form-select" required>
                                            <option value="">Pilih Jabatan</option>
                                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                                            <option value="Wakasek">Wakasek</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Karyawan">Karyawan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lama_kerja" class="form-label">Lama Kerja</label>
                                        <input type="number" id="lama_kerja" name="lama_kerja" class="form-control" placeholder="Lama Kerja" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status_kerja" class="form-label">Status Kerja</label>
                                        <select id="status_kerja" name="status_kerja" class="form-select" required>
                                            <option value="">Pilih Status Kerja</option>
                                            <option value="Tetap">Tetap</option>
                                            <option value="Kontrak">Kontrak</option>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="p-3">
                                    <legend class="w-auto px-2"><b>Potongan</b></legend>
                                    <div class="mb-3">
                                        <label for="bpjs" class="form-label">BPJS</label>
                                        <input type="number" id="bpjs" name="bpjs" class="form-control" placeholder="BPJS">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pinjaman" class="form-label">Pinjaman</label>
                                        <input type="number" id="pinjaman" name="pinjaman" class="form-control" placeholder="Pinjaman">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cicilan" class="form-label">Cicilan</label>
                                        <input type="number" id="cicilan" name="cicilan" class="form-control" placeholder="Cicilan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="infaq" class="form-label">Infaq</label>
                                        <input type="number" id="infaq" name="infaq" class="form-control" placeholder="Infaq">
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="proses" class="btn btn-primary">Proses</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
            if (isset($_POST['proses'])) {
                $nomor = $_POST['no'];
                $nama = $_POST['nama'];
                $unit = $_POST['unit'];
                $gaj = $_POST['gaji'];
                $jabatan = $_POST['jabatan'];
                $lamker = $_POST['lama_kerja'];
                $st = $_POST['status_kerja'];
                $bpjs = $_POST['bpjs'];
                $pinjam = $_POST['pinjaman'];
                $cicilan = $_POST['cicilan'];
                $infaq = $_POST['infaq'];

                if ($jabatan == "Kepala Sekolah") {
                    $gaji = 10000000;
                } elseif ($jabatan == "Wakasek") {
                    $gaji = 7500000;
                } elseif ($jabatan == "Guru") {
                    $gaji = 5000000;
                } elseif ($jabatan == "Karyawan") {
                    $gaji = 2500000;
                } else {
                    $gaji = 0;
                }

                $bonus = ($st == "Tetap") ? 1000000 : 0;

                $gaji_kotor = $gaji + $bonus;
                $total_potongan = $bpjs + $pinjam + $cicilan + $infaq;
                $gaji_bersih = $gaji_kotor - $total_potongan;

                class daftar{

                    public function pendaftaran($nomor2, $nama2, $unit2, $gaj2, $jabatan2, $gaji2, $lamker2, $st2, $bonus2, $bpjs2, $pinjam2, $cicilan2, $infaq2, $gaji_bersih2){
            
        ?>
        <div class="container mt-5">
        <div class="card shadow">
        <div class="card-header text-center h2">
        <tr>
            <th colspan="2" class="text-center h5"><?php echo $nama2; ?></th>
        </tr>
        </div>
        <br>
        <div class="text-center text-primary">
            <h4>STRUK GAJI</h4>
        </div>
        <div class="card-body">
            <center>
            <table class="text-primary">
                    <tr>
                        <th>No</th>
                        <td>:</td>
                        <td><?php echo $nomor2; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td><?php echo $nama2; ?></td>
                    </tr>
                    <tr>
                        <th>Unit Pendidikan</th>
                        <td>:</td>
                        <td><?php echo $unit2; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Gaji</th>
                        <td>:</td>
                        <td><?php echo $gaj2; ?></td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>:</td>
                        <td><?php echo $jabatan2; ?></td>
                    </tr>
                    <tr>
                        <th>Gaji</th>
                        <td>:</td>
                        <td>Rp <?php echo number_format($gaji2, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Lama Kerja</th>
                        <td>:</td>
                        <td><?php echo $lamker2; ?> Tahun</td>
                    </tr>
                    <tr>
                        <th>Status Kerja</th>
                        <td>:</td>
                        <td><?php echo $st2; ?></td>
                    </tr>
                    <tr>
                        <th>Bonus</th>
                        <td>:</td>
                        <td>Rp <?php echo number_format($bonus2, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>BPJS</th>
                        <td>:</td>
                        <td>Rp <?php echo number_format($bpjs2, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Pinjaman</th>
                        <td>:</td>
                        <td>Rp <?php echo number_format($pinjam2, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Cicilan</th>
                        <td>:</td>
                        <td>Rp <?php echo number_format($cicilan2, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Infaq</th>
                        <td>:</td>
                        <td>Rp <?php echo number_format($infaq2, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td><b>Gaji Bersih</b></td>
                        <td>:</td>
                        <td>Rp -<?php echo number_format($gaji_bersih2, 0, ',', '.'); ?></td>
                    </tr>
            </table>
            </center>
            <?php
                }    
                }    
                $hasil = new daftar();
                echo $hasil->pendaftaran($nomor, $nama, $unit, $gaj, $jabatan, $gaji, $lamker, $st, $bonus, $bpjs, $pinjam, $cicilan, $infaq, $gaji_bersih);
                } 
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>