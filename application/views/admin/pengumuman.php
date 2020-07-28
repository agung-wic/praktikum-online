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
                        <a href="" class="btn btn-primary mb-3 tampilTambahJadwal" data-toggle="modal" data-target="#BuatPengumuman">Buat Pengumuman</a>
                    </div>
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
                                        foreach ($list as $l) :
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $l['name']; ?></td>
                                                <td><?= $l['nrp']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/editpengumuman/') . $l['id']; ?>" class="badge badge-pill badge-primary tampilEditJadwal" data-id="<?= $l['id']; ?>" data-toggle="modal" data-target="#PengumumanEdit">
                                                        <i class=" fas fa-fw fa-edit"></i>
                                                        Edit
                                                    </a>
                                                    <a href="<?= base_url('admin/deletepengumuman/') . $l['id']; ?>" onclick="return confirm('Yakin?');" class="badge badge-pill badge-danger">
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
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>

<div class="modal fade" id="BuatPengumuman" tabindex="-1" role="dialog" aria-labelledby="BuatPengumumanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BuatPengumumanLabel">Buat Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input class="form-control" type="number" name="id" id="id" hidden>
                    </div>
                    <div class="form-group">
                        <label for="name">Judul</label>
                        <input type="text" class="form-control edit" id="judul" name="judul" readonly>
                    </div>
                    <div class="form-group">
                        <label for="text">Isi</label>
                        <textarea rows="10" cols="10" type="Pengumuman" class="form-control edit" style="height:200px"></textarea>
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

<div class="modal fade" id="PengumumanEdit" tabindex="-1" role="dialog" aria-labelledby="PengumumanEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PengumumanEditLabel">Edit Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/editjadwal') ?>" method="post">
                    <div class="form-group">
                        <input class="form-control" type="number" name="id" id="id" hidden>
                        <input class="form-control" type="text" name="modul" id="modul" hidden>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control edit" id="name" name="name">
                    </div>
                    <div class="form-group">
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