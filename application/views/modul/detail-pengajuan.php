<div class="container-fluid">


    <!-- Begin Page Content -->
    <div class="container-fluid">


        <div class="kotak">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold "><?= $title; ?></h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input class="form-control" type="text" value="<?= $jadwal['name']; ?>" name="name" id="name" readonly>
                </div>
                <div class="form-group">
                    <label for="nrp">NRP</label>
                    <input type="text" class="form-control" value="<?= $jadwal['nrp']; ?>" id="nrp" name="nrp" readonly>
                </div>
                <div class="form-group">
                    <label for="modul">Modul</label>
                    <input type="text" class="form-control" value="<?= $jadwal['modul']; ?>" id="modul" name="modul" readonly>
                </div>
                <div class="form-group">
                    <label for="jadwal_old">Jadwal Lama</label>
                    <input type="text" class="form-control" value="<?= $jadwal['jadwal_old']; ?>" id="jadwal_old" name="jadwal_old" readonly>
                </div>
                <div class="form-group">
                    <label for="jadwal_new">Jadwal Baru yang Diajukan</label>
                    <input type="text" class="form-control" value="<?= $jadwal['jadwal_new']; ?>" id="jadwal_new" name="jadwal_new" readonly>
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <input type="text" class="form-control" value="<?= $jadwal['ket']; ?>" id="ket" name="ket" readonly>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('admin/accpengajuan') . "?id=" . $jadwal['id'] . "&action=1" ?>" class="btn btn-primary">
                    <i class=" fas fa-fw fa-check-circle"></i>
                    Setujui
                </a>
                <a href="<?= base_url('admin/accpengajuan') . "?id=" . $jadwal['id'] . "&action=2" ?>" onclick="return confirm('Yakin?');" class="btn btn-danger">
                    <i class="fas fa-fw fa-times-circle"></i>
                    Tolak
                </a>
            </div>
        </div>
    </div>
</div>