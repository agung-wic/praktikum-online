<div class="row m-5 justify-content-center">
    <div class="col-8 justify-content-center">
        <div class="card border-bottom-danger h-100 py-2" style="background-color: white;">
            <div class="card-header">
                <h6>Presensi Praktikum</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h4 class="text-center"><b><?= $modul['name'] ?></b></h4>
                        <h5 class="text-center"><b><?= $status['jadwal'] ?></b></h5>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <h6 class="text-center"><?= $user['name'] ?></h6>
                        <h6 class="text-center"><?= $user['nrp'] ?></h6>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <form action="<?= base_url('praktikan/do_absen/') ?>" method="post">
                    <input type="text" name="nrp" value="<?= $user['nrp']; ?>" hidden>
                    <input type="text" name="modul_id" value="<?= $modul['modul']; ?>" hidden>
                    <div class="row justify-content-center">
                        <button class="btn gradien px-5" type="submit"> Hadir </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>