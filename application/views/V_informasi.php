<div class="jumbotron jumbotron-fluid">
    <div class="container">
    <h1 class="display-4">Informasi Kerusakan</h1>
        <p class="lead">Aplikasi Sisparkerlap Metode (CBR) Untuk Diagnosa Kerusakan Laptop</p>
    </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row content-justify-center">
        <div class="col-lg-12 info-panel">
            <!-- Tabel Informasi Kerusakan -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kerusakan</th>
                            <th>Detail</th>
                            <th>Solusi</th>
                        </tr>
                    </thead>
                    
                        <?php
                        $no = 1;
                        foreach ($macam as $row) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td style="font-weight:bold"><?= $row['nama_jenis']; ?></td>
                                <td><?= $row['detail_jenis']; ?></td>
                                <td><?= $row['solusi_jenis']; ?></td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-success mt-5">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy;2023 <a href="https://instagram.com/wulann.ws?igshid=NTc4MTIwNjQ2YQ=="><font color="#FFF">WAHYU WULAN SAFITRI</font></a></span>
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