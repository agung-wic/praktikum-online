<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="kotak">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold "><?= $title; ?></h6>
                    </div>
                    <div class="col-auto mr-auto">
                        <a href="" class="btn gradien mb-3 tombolTambahKelompok" data-toggle="modal" data-target="#TambahKelompok">Tambah Kelompok</a>
                    </div>
                    <div class="col-1">
                        <a href="" class="btn gradien mb-3" data-toggle="modal" data-target="#KelompokAddFile"><i class="fas fa-file-csv"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kelompok</th>
                                    <th scope="col">Jumlah Anggota</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kelompok as $k) : ?>
                                    <tr>

                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $k['no_kelompok'] ?></td>
                                        <td><?= $k['jumlah'] ?></td>
                                        <td>
                                            <a href="<?= base_url('modul/detail/' . $k['id']); ?>" class="badge badge-pill badge-primary"><i class="fas fa-fw fa-info"></i>Detail</a>
                                            <a href="<?= base_url('modul/editkelompok/' . $k['id']); ?>" data-id="<?= $k['id'] ?>" data-toggle="modal" data-target="#TambahKelompok" class="badge badge-pill badge-primary tombolEditKelompok"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>

<div class="modal fade" id="KelompokAddFile" tabindex="-1" role="dialog" aria-labelledby="KelompokAddFileLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="KelompokAddFileLabel">Unggah Kelompok Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Berkas csv harus memiliki format sebagai berikut:</h6>
                <ol>
                    <li>Kolom pertama = Nama Kelompok</li>
                    <li>Kolom kedua = NRP Mahasiswa dengan 0 sebagai angka pertama</li>
                </ol>
                <?= form_open_multipart(base_url('modul/addfilekelompok')) ?>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="filekelompok" name="filekelompok">
                    <label class="custom-file-label" for="filekelompok">Pilih berkas</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="TambahKelompok" tabindex="-1" role="dialog" aria-labelledby="TambahKelompokLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahKelompokLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('asisten/tambahkelompok') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <input type="text" class="form-control" id="no_kelompok" name="no_kelompok" placeholder="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>