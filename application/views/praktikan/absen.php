<div class="row mx-5">
    <div class="col justify-content-center">
        <div class="kotak" style="background-color: white;">
            <div class="container">
                <p class="card-text">Nama :<?= ' ' . $user['name']; ?></p>
                <p class="card-text">NRP :<?= ' ' . $user['nrp']; ?></p>
                <p class="card-text">Email :<?= ' ' . $user['email']; ?></p>
                <hr>
                <p class="card-text"><small class="text-muted">Bergabung sejak <?= date('d F Y', $user['date_created']); ?></small></p>
            </div>
        </div>
    </div>
    <div class="col justify-content-center">
        <div class="kotak" style="background-color: white;">
            <div class=" container py-3">
                <video width="100%" controls autoplay loop>
                    <source src="<?= base_url('assets/vid/') . $modul['video']; ?>" type="video/mp4">
                </video>
                <div class="row">
                    <div class="col-lg-auto ml-auto">
                        <h6><b><?= $modul['time'] ?></b></h6>
                        <h6><b>Status : <?php if ($status['status'] == 0) {
                                            echo "Belum Selesai";
                                        } else {
                                            echo "Selesai";
                                        } ?></b></h6>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-auto ml-auto">
                        <?php if ($status['status'] != 1) {
                            $jadwal = strtotime($status['jadwal']);
                            $batas = strtotime($modul['time']);
                            $time = (date('H', $batas) * 60 * 60) + (date('i', $batas) * 60) + date('s', $batas);
                            if ((time() >= $jadwal) && ((time() <= ($jadwal + $time)))) { ?>
                                <a href="<?= base_url('praktikan/percobaan/') . $modul['modul']; ?>" class="btn gradien px-5">Mulai Praktikum!</a>
                            <?php } else { ?>
                                <span class="btn btn-secondary px-5">Mulai Praktikum!</span>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>