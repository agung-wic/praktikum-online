<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="kotak">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold "><?= $title . " - " . $nama_modul['name'] . " - " . $nama_kelompok['no_kelompok']; ?></h6>
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
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>

<div class="modal fade" id="NilaiEdit" tabindex="-1" role="dialog" aria-labelledby="NilaiEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NilaiEditLabel">Edit Nilai Praktikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('asisten/editnilai/') . $k['id'] . "/" . $id_kelompok ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" name="id" id="id" hidden>
                        <input class="form-control" type="text" name="modul_id" id="modul_id" hidden>
                    </div>
                    <div class="form-group hapus">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control " id="name" name="name" disabled>
                    </div>
                    <div class="form-group hapus">
                        <label for="nrp">NRP</label>
                        <input type="text" class="form-control " id="nrp" name="nrp" disabled>
                    </div>
                    <div class="form-group hapus">
                        <label for="modul">Modul</label>
                        <input type="text" class="form-control " id="modul" name="modul" disabled>
                    </div>
                    <div class="form-group">
                        <label for="resume">Resume (0-25)</label>
                        <input type="number" min="0" max="25" class="form-control" id="resume" name="resume">
                    </div>
                    <div class="form-group">
                        <label for="pretest">Pretest (0-5)</label>
                        <input type="number" min="0" max="5" class="form-control" id="pretest" name="pretest">
                    </div>
                    <div class="form-group">
                        <label for="uji_lisan">Uji Lisan (0-10)</label>
                        <input type="number" min="0" max="10" class="form-control" id="uji_lisan" name="uji_lisan">
                    </div>
                    <div class="form-group">
                        <label for="praktikum">Praktikum (0-10)</label>
                        <input type="number" min="0" max="10" class="form-control" id="praktikum" name="praktikum">
                    </div>
                    <div class="form-group">
                        <label for="postest">Postest/Video (0-5)</label>
                        <input type="number" min="0" max="5" class="form-control" id="postest" name="postest">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="laporan">Laporan</label>
                                <div class="row">
                                    <div class="col-6">
                                        <span>Format (0-10)</span>
                                    </div>
                                    <div class="col-4">
                                        <input type="number" min="0" max="10" class="form-control mb-1" id="format" name="format" placeholder="Format Penulisan">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <span>Bab (0-25)</span>
                                    </div>
                                    <div class="col-4">
                                        <input type="number" min="0" max="25" class="form-control mb-1" id="bab" name="bab" placeholder="Bab 4, 4, 4">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <span>Kesimpulan (0-10)</span>
                                    </div>
                                    <div class="col-4">
                                        <input type="number" min="0" max="10" class="form-control" id="kesimpulan" name="kesimpulan" placeholder="Kesimpulan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="laporan">Nilai Akhir</label>
                                <div class="row">
                                    <div class="col-auto">
                                        <input type="number" min="0" max="100" class="form-control mb-1" id="nilai_akhir" name="nilai_akhir" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <input type="text" min="0" max="100" class="form-control mb-1" id="nilai_akhir_abjad" name="nilai_akhir_abjad" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary hapus">Edit</button>
                    </div>
            </form>
        </div>
    </div>
</div>