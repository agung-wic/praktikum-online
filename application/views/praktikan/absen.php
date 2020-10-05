<div class="row mx-5">
    <div class="col-lg-6 justify-content-center">
        <div class="card border-left-warning h-100 py-2" style="background-color: white;">
            <div class="card-header">
                <h6>Selamat Datang</h6>
            </div>
            <div class="card-body">
                <h4><b><?= $user['name'] ?></b></h4>
                <h5><b><?= $user['nrp'] ?></b></h5>
            </div>
        </div>
    </div>
</div>
<p class="card-text">Praktikum :<?= ' ' . $modul['name'] ?></p>
<p class="card-text">Jadwal :<?= ' ' . $status['jadwal'] ?></p>