<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="kotak">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold "><?= $title; ?> Praktikum</h6>
                    </div>
                    <!-- <div class="col-auto mr-auto">
                        <a href="" class="btn gradien mb-3 tampilTambahModul" data-toggle="modal" data-target="#BuatModul">Buat Modul</a>
                    </div> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row mx-1">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <?php if (empty($list)) { ?>
                            <div class="alert alert-danger" role="alert">
                                Data not found!
                            </div>
                        <?php } else { ?>
                            <div id="bungkus">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($modul as $m) :
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $m['modul'] ?>. <?= $m['name']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('modul/editVideo/') . $m['id']; ?>" class="badge badge-pill badge-info tampilEditVideo" data-id="<?= $m['id']; ?>" data-toggle="modal" data-target="#BuatVideo">
                                                        <i class="fas fa-video"></i>
                                                        Edit Video
                                                    </a>
                                                    <a href="<?= base_url('modul/editModul/') . $m['id']; ?>" class="badge badge-pill badge-primary tampilEditModul" data-id="<?= $m['id']; ?>" data-toggle="modal" data-target="#BuatModul">
                                                        <i class=" fas fa-fw fa-edit"></i>
                                                        Edit Konten
                                                    </a>
                                                    <a href="<?= base_url('modul/deleteModul/') . $m['id']; ?>" onclick="return confirm('Yakin?');" class="badge badge-pill badge-danger">
                                                        <i class="fas fa-fw fa-trash-alt"></i>
                                                        Delete
                                                    </a>
                                                </td>
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
            <div class="mt-2">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>

<div class="modal fade" id="BuatModul" tabindex="-1" role="dialog" aria-labelledby="BuatModulLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BuatModulLabel">Buat Modul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('modul/tambahModul') ?>" method="post">
                    <div class="form-group">
                        <input class="form-control" type="number" name="id" id="id" hidden>
                    </div>
                    <div class="form-group">
                        <label for="modul">Kode Modul</label>
                        <input type="text" class="form-control edit" id="modul" name="modul">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Modul</label>
                        <input type="text" class="form-control edit" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan Percobaan</label>
                        <textarea rows="20" cols="20" id="tujuan" name="tujuan" class="form-control edit" style="height:200px"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="peralatan">Peralatan yang Digunakan</label>
                        <textarea rows="20" cols="20" id="peralatan" name="peralatan" class="form-control edit" style="height:200px"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="teori">Teori</label>
                        <textarea rows="20" cols="20" id="teori" name="teori" class="form-control edit" style="height:200px"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cara">Cara Melakukan Percobaan</label>
                        <textarea rows="20" cols="20" id="cara" name="cara" class="form-control edit" style="height:200px"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tugas_lapres">Tugas Lapres</label>
                        <textarea rows="20" cols="20" id="tugas_lapres" name="tugas_lapres" class="form-control edit" style="height:200px"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tugas_pendahuluan">Tugas Pendahuluan</label>
                        <textarea rows="20" cols="20" id="tugas_pendahuluan" name="tugas_pendahuluan" class="Pendahuluanform-control edit" style="height:200px"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="time">Waktu Praktikum</label>
                        <input type="text" class="form-control edit" id="time" name="time">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="BuatVideo" tabindex="-1" role="dialog" aria-labelledby="BuatVideolabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BuatVideoLabel">Edit Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart(base_url('modul/addfilevideo')) ?>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="filevideo" name="filevideo">
                        <label class="custom-file-label" for="filevideo">Pilih berkas</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="idi" name="idi" hidden>
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