<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
        <a href="<?= base_url('konsultasi'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-undo-alt fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-8 mb-2">
            <div class="card shadow mb-4 alert">
                <?php
                // Nilai Perhitungan Terbesar
                $max = max(array_column($final, 'hasil'));
                $key = array_search($max, array_column($final, 'hasil'));
                ?>
                <h5 class="mt-3" style="font-weight:lighter; font-size:17px; text-transform:uppercase">Diagnosa:
                    <span style="font-weight:bold" class="text-success ml-3"> Kerusakan <?= $final[$key]['nama_jenis']; ?> </span>
                </h5>

                <h5 style="font-weight:lighter; font-size:17px; text-transform:uppercase">
                    Nilai Analisa Pakar: <span class="text-primary ml-3" style="font-weight:bold"><?= $final[$key]['hasil'] * 100; ?>%</span>
                </h5>
            </div>
        </div>

        <!-- Tabel Hasil Perhitungan Similarity -->
        <div class="col-xl-12 col-md-8 mb-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan Similarity Value</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Kerusakan</th>
                                    <th scope="col">Nama Kerusakan</th>
                                    <th scope="col">Hasil (Dalam Persen)</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $no = 1;
                                // Tampilkan ke tabel
                                foreach ($final as $row) { ?>
                                    <tr>
                                        <strong>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['id_jenis'] ?></td>
                                            <td><?= $row['nama_jenis']; ?></td>
                                            <td>
                                                <?php
                                                    $hasil = $row['hasil'] * 100;
                                                    echo $hasil . ' %';
                                                    ?>
                                            </td>
                                        </strong>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-8 mb-4">
        <div class="btn-container">
            <input id="show-btn" title="Lihat Hasil Perhitungan" type="button" value="Hasil Perhitungan" class="btn btn-primary" onclick="lihathasil()">

            <input id="hide-btn" title="Tutup Hasil Perhitungan" type="button" value="Tutup Perhitungan" class="btn btn-primary" onclick="tutuphasil()">
            
            <button type="button" class="btn btn-info" onclick="showHideElement()">Lihat Tempat Service</button>
        </div>
        </div>
        
        
        

        <!-- Tabel Basis Pengetahuan -->
        <div class="col-xl-8 col-md-8 mb-2">
            <div id="basis-kasus" class="card shadow mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Basis Pengetahuan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Gejala</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                $jum = 1;

                                foreach ($klas as $row) { ?>
                                    <tr>
                                        <?php if ($jum <= 1) { ?>
                                            <td align="center" rowspan="<?= $row['jumlah']; ?>"><?= $no++; ?></td>
                                            <td rowspan="<?= $row['jumlah']; ?>"><?= $row['nama_jenis'] ?></td>
                                            <?php $jum = $row['jumlah']; ?>
                                        <?php } else { ?>
                                            <?php $jum = $jum - 1; ?>
                                        <?php } ?>

                                        <td><?= $row['nama_ciri']; ?></td>
                                    </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Gejala Dipilih -->
        <div class="col-xl-4 col-md-8 mb-2">
            <div id="gejala-dipilih" class="card shadow mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gejala Yang Dipilih</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Id Gejala</th>
                                    <th scope="col">Nama Gejala</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                $jum = 1;

                                foreach ($ciri as $gejala) { ?>
                                    <?php
                                        $gej = $gejala;
                                        $row = $this->db->query("SELECT * FROM tb_ciri1 WHERE id_ciri = $gej")->row_array();
                                        ?>
                                    <tr>
                                        <td><?= $row['id_ciri']; ?></td>
                                        <td><?= $row['nama_ciri']; ?></td>
                                    </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Hasil Perhitungan Similarity -->
        <div class="col-xl-12 col-md-8 mb-2">
            <div id="hasil-konsul" class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan Similarity Value</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kasus</th>
                                    <th scope="col">Jumlah Gejala Sama</th>
                                    <th scope="col">Jumlah Gejala Kasus</th>
                                    <th scope="col">Jumlah Gejala Dipilih</th>
                                    <th scope="col">Bobot Gejala Sama</th>
                                    <th scope="col">Bobot Gejala Kasus</th>
                                    <th scope="col">Hasil</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                // Tampilkan ke tabel
                                foreach ($final as $row) { ?>
                                    <tr>
                                        <strong>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_jenis'] ?></td>
                                            <td><?= $row['jml_cocok']; ?></td>
                                            <td><?= $row['jml_gejala']; ?></td>
                                            <td><?= $row['jml_dipilih']; ?></td>
                                            <td><?= $row['bobot_sama']; ?></td>
                                            <td><?= $row['total_bobot']; ?></td>
                                            <td><?= $row['hasil']; ?></td>
                                        </strong>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Daftar Tempat Service Laptop -->
<div class="col-xl-12 col-md-8 mb-2">
            <div id="tempat-service" class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-3 font-weight-bold text-primary">Daftar Tempat Service Laptop Wilayah Bandar Lampung</h6>
                    <ul class="list-group">
                        <a target="_blank" href="https://www.google.com/maps/dir//J766%2BCR5,+Jl.+Teuku+Umar,+Surabaya,+Kec.+Kedaton,+Kota+Bandar+Lampung,+Lampung+35132/@-5.3889927,105.1920827,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e40db03acd2e7d3:0x5bacc0295f86cc1f!2m2!1d105.2620994!2d-5.3890007?entry=ttuhttps://www.google.com/maps/dir//J766%2BCR5,+Jl.+Teuku+Umar,+Surabaya,+Kec.+Kedaton,+Kota+Bandar+Lampung,+Lampung+35132/@-5.3889927,105.1920827,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e40db03acd2e7d3:0x5bacc0295f86cc1f!2m2!1d105.2620994!2d-5.3890007?entry=ttu" class="list-group-item list-group-item-action">Griyacom Service</a>
                        <a target="_blank" href="https://www.google.com/maps/dir//sentra+komputer/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2e40da2a957f37f5:0x4f8842aa07a3e35b?sa=X&ved=2ahUKEwiN2qDqucX_AhXeRWwGHXIpD30Q9Rd6BAhJEAU" class="list-group-item list-group-item-action">Sentra Computer</a>
                        <a target="_blank" href="https://www.google.com/maps/dir/-5.4297,105.2622/acer+customer+service+center+bandar+lampung/@-5.4112757,105.2397634,14z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2e40dae3e7b821ed:0x398fed19315a2c30!2m2!1d105.2621173!2d-5.3937577?entry=ttu" class="list-group-item list-group-item-action">Acer Custumer Service</a>
                        <a target="_blank" href="https://www.google.com/maps/dir//asus+service+center+bandar+lampung/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2e40db0165cb9983:0xc2cd0d5bd036738b?sa=X&ved=2ahUKEwj03fDyuMX_AhWMbmwGHSdID20Q9Rd6BAhEEAM" class="list-group-item list-group-item-action">Asus Service Center</a>
                        <a target="_blank" href="https://www.google.com/maps/dir//Jl.+Teuku+Umar+No.34A,+Surabaya,+Kec.+Kedaton,+Kota+Bandar+Lampung,+Lampung+35147/@-5.3942375,105.1919424,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e40dbebb7f01b51:0x882c724cbfc6e009!2m2!1d105.261983!2d-5.3942415?entry=ttu" class="list-group-item list-group-item-action">Metrocom Service</a>
                        <a target="_blank" href="https://www.google.com/maps/dir//zaicomtech/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2e40dab489d3fea3:0x7b8d0631615414b8?sa=X&ved=2ahUKEwjf5Nu4ucX_AhW2S2wGHftqDFUQ9Rd6BAg6EAU" class="list-group-item list-group-item-action">Zaicomteach</a>
                        <a target="_blank" href="https://www.google.com/maps?opi=89978449&client=firefox-b-d&lqi=Ch1zdXJ5YSBjb21wdXRlciBiYW5kYXIgbGFtcHVuZ0jAtOKh-5WAgAhaMxAAEAEYABgBGAIYAyIdc3VyeWEgY29tcHV0ZXIgYmFuZGFyIGxhbXB1bmcqBggCEAAQAZIBHWNvbXB1dGVyX3N1cHBvcnRfYW5kX3NlcnZpY2VzqgFRCgkvbS8wMmJkanQQATIfEAEiGzYzW43Fuq2hV1uIQujQiYAvWLgr24eSUyph2TIhEAIiHXN1cnlhIGNvbXB1dGVyIGJhbmRhciBsYW1wdW5n&phdesc=KE7D_QcSnWM&vet=12ahUKEwjg5LDPucX_AhW_WGwGHQVnAIsQ1YkKegQIEBAB..i&cs=0&um=1&ie=UTF-8&fb=1&gl=id&sa=X&geocode=KTX7TjLA20AuMeHOzdeD6KTm&daddr=jalur+2+universitas+lampung,+Jl.+Prof.+Dr.+Ir.+Sumantri+Brojonegoro,+Gedong+Meneng,+Kec.+Rajabasa,+Kota+Bandar+Lampung,+Lampung+34145" class="list-group-item list-group-item-action">Surya Computer</a>
                    </ul>
                </div>
            </div>
            
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-success mt-4">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy;2023 <a href="https://instagram.com/wulann.ws?igshid=NTc4MTIwNjQ2YQ=="><font color="#FFFFFF">WAHYU WULAN SAFITRI</font></a></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>