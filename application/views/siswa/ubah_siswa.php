<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>


            <!-- KOnten -->
            <form action="<?= base_url('siswa/ubahsiswa'); ?>" method="post" enctype="multipart/form-data">
                <div class='row'>
                    <div class='col-sm-9'>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nis" name="nis" placeholder="Masukkan NIS" value="<?= $siswa['nis']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Siswa" value='<?= $siswa['nama']; ?>'>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="kelas" name="kelas" placeholder="Masukkan Kelas" value='<?= $siswa['kelas']; ?>'>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value='<?= $siswa['tanggal_lahir']; ?>'>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value='<?= $siswa['tempat_lahir']; ?>'>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat" value='<?= $siswa['alamat']; ?>'>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="gender" name="gender" placeholder="Masukkan Jenis Kelamin" value='<?= $siswa['gender']; ?>'>
                            </div>
                            <div class="form-group">
                                <select name="agama" class="form-control form-control-user">
                                    <option value="<?= $ag; ?>">Data tidak berubah...</option>
                                    <?php foreach ($agama as $ag) { ?>
                                        <option value="<?= $ag['id_siswa']; ?>"><?= $ag['agama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="window.history.back(-1)"><i class="fas fa-ban"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                                Update</button>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->