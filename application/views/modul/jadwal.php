<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- 
        <div class="kotak" style="margin-bottom:1%">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold ">Pengajuan Perubahan Jadwal Praktikum</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row mx-1">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-1 mt-2">
                                        <label for="show">Show</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="custom-select" name="show" id="show">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mt-2">Entries</div>
                                </div>
                            </div>
                            <div class="col-md-5 ml-auto">
                                <form action="<?= base_url('modul/jadwal') ?>" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="keyword2" name="keyword2" placeholder="Cari  ...">
                                        <div class="input-group-append">
                                            <button class="btn gradien" type="submit" id="cari-jadwal"><i class="fas fa-fw fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?= $this->session->flashdata('message2'); ?>
                        </div>
                        <?php if (empty($req)) { ?>
                            <div class="alert alert-danger" role="alert">
                                Data not found!
                            </div>
                        <?php } else { ?>
                            <div id="bungkus">

                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NRP</th>
                                            <th scope="col">Modul</th>
                                            <th scope="col">Jadwal</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NRP</th>
                                            <th scope="col">Modul</th>
                                            <th scope="col">Jadwal</th>
                                            <!-- <th scope="col">Detail</th> -->
        </tr>
        </tfoot>
        <tbody>
            <?php $i = 1;
                            foreach ($req as $r) :
            ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $r['name']; ?></td>
                    <td><?= $r['nrp']; ?></td>
                    <td><?= $r['modul']; ?></td>
                    <td><?= str_replace("T", " ", $r['jadwal_old']); ?></td>
                    <!-- <td>
                                                    <a href="<?= base_url('modul/detailpengajuan/') . $r['id']; ?>" class="badge badge-pill badge-primary">
                                                        <i class=" fas fa-fw fa-edit"></i>
                                                        Detail
                                                    </a>
                                                </td> -->
                </tr>
            <?php $i++;
                            endforeach; ?>
        </tbody>
        </table>
    </div>
<?php } ?>
</div>
</div>
</div>

</div>
-->


<!-- DataTales Example -->
<div class="kotak">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6 class="m-0 font-weight-bold "><?= $title; ?></h6>
            </div>
            <div class="col-auto mr-auto">
                <a href="" class="btn gradien mb-3 tampilTambahJadwal" data-toggle="modal" data-target="#JadwalEdit">Tambah Jadwal Baru</a>
                <a href="" class="btn gradien mb-3" data-toggle="modal" data-target="#JadwalAddFile"><i class="fas fa-file-csv"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="row mx-1">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-1 mt-2">
                                <label for="show">Show</label>
                            </div>
                            <div class="col-md-2">
                                <select class="custom-select" name="show" id="show">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-2">Entries</div>
                        </div>
                    </div>
                    <div class="col-md-5 ml-auto">
                        <form action="<?= base_url('modul/jadwal') ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="keyword1" name="keyword1" placeholder="Cari  ...">
                                <div class="input-group-append">
                                    <button class="btn gradien" type="submit" id="cari-jadwal"><i class="fas fa-fw fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?= $this->session->flashdata('message1'); ?>
                </div>

                <div id="bungkus">

                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NRP</th>
                                <th scope="col">Modul</th>
                                <th scope="col">Jadwal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NRP</th>
                                <th scope="col">Modul</th>
                                <th scope="col">Jadwal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1;
                            foreach ($list as $l) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $start + 1; ?></th>
                                    <td><?= $l['name']; ?></td>
                                    <td><?= $l['nrp']; ?></td>
                                    <td><?= $l['modul']; ?></td>
                                    <td><?= str_replace("T", " | ", $l['jadwal']); ?></td>
                                    <td>
                                        <a href="<?= base_url('modul/editjadwal/') . $l['id']; ?>" class="badge badge-pill badge-primary tampilEditJadwal" data-id="<?= $l['id']; ?>" data-toggle="modal" data-target="#JadwalEdit">
                                            <i class=" fas fa-fw fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="<?= base_url('modul/deletejadwal/') . $l['id']; ?>" onclick="return confirm('Yakin?');" class="badge badge-pill badge-danger">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php $start++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-2">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>

<div class="modal fade" id="JadwalAddFile" tabindex="-1" role="dialog" aria-labelledby="JadwalAddFileLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="JadwalAddFileLabel">Unggah Jadwal Praktikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Berkas csv harus memiliki format sebagai berikut:</h6>
                <ol>
                    <li>Kolom pertama = Nama Kelompok</li>
                    <li>Kolom kedua = Kode Modul (contoh: G1)</li>
                    <li>Kolom ketiga = Waktu dengan contoh format (2020-12-31 23:59) tanpa tanda kurung</li>
                </ol>
                <?= form_open_multipart(base_url('modul/addfilejadwal')) ?>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="filejadwal" name="filejadwal">
                    <label class="custom-file-label" for="filejadwal">Pilih berkas</label>
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

<div class="modal fade" id="JadwalEdit" tabindex="-1" role="dialog" aria-labelledby="JadwalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="JadwalEditLabel">Edit Jadwal Praktikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('modul/editjadwal') ?>" method="post">
                    <div class="form-group">
                        <input class="form-control" type="number" name="id" id="id" hidden>
                        <input class="form-control" type="text" name="modul" id="modul" hidden>
                    </div>
                    <div class="form-group">
                        <label for="no_kelompok">Kelompok</label>
                        <input type="text" class="form-control edit" id="no_kelompok" name="no_kelompok">
                    </div>
                    <div class="form-group disable">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control edit" id="name" name="name">
                    </div>
                    <div class="form-group disable">
                        <label for="nrp">NRP</label>
                        <input type="text" class="form-control edit" id="nrp" name="nrp">
                    </div>
                    <div class="form-group">
                        <label for="modul">Modul</label>
                        <select class="form-control" name="modul_id" id="modul_id">
                            <?php foreach ($modul as $m) : ?>
                                <option value="<?= $m['modul'] ?>"><?= $m['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jadwal">Jadwal</label>
                        <input type="datetime-local" class="form-control" id="jadwal" name="jadwal">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>