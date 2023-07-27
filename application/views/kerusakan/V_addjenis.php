<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $sub_judul; ?></h6>
        </div>
        <div class="card-body">
            <form class="form-group" method="post" action="">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Id Kerusakan</label>
                            <input readonly type="text" class="form-control col-md-lg" name="id_jenis" id="id_jenis" value="<?= $id_jenis; ?>">
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama Kerusakan</label>
                                <input type="text" class="form-control col-md-lg" name="kerusakan" id="kerusakan" value="<?= set_value('kerusakan'); ?>">

                                <?= form_error('kesakan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Detail Kerusakan</label>
                            <textarea type="text" rows="4" class="form-control col-md-lg" name="detail" id="detail" value="<?= set_value('detail'); ?>"></textarea>

                            <?= form_error('detail', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Solusi Kerusakan</label>
                            <textarea type="text" rows="4" class="form-control col-md-lg" name="solusi" id="solusi" value="<?= set_value('solusi'); ?>"></textarea>

                            <?= form_error('solusi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->