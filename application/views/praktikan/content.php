<div class="row mx-5">
  <div class="col justify-content-center">
    <div class="kotak">
      <div class="container">
        <h4 class="mt-3"><b><?= $modul['name'] ?></b></h4>
        <h6>Kode Percobaan: <?= $modul['modul']; ?></h6>
        <h6><b>I. Tujuan Percobaan</b></h6>
        <p><?= $modul['tujuan']; ?></p>
        <h6><b>II. Peralatan Yang Digunakan</b></h6>
        <?= $modul['peralatan']; ?>
        <h6><b>III. Teori</b></h6>
        <?= $modul['teori']; ?>
        <h6><b>IV. Cara Melakukan Percobaan:</b></h6>
        <?= $modul['cara']; ?>
        <h6><b>V. Tugas Untuk Laporan Resmi:</b></h6>
        <?= $modul['tugas_lapres']; ?>
        <h6><b>VI. Tugas Pendahuluan:</b></h6>
        <?= $modul['tugas_pendahuluan']; ?>
      </div>
    </div>
  </div>
  <div class="col justify-content-center">
    <div class="kotak">
      <div class="container py-3">
        <video width="100%" controls>
          <source src="<?= base_url('assets/vid/') . $modul['video']; ?>" type="video/mp4">
        </video>
        <div class="row">
          <div class="col-lg-4">
            <a href="<?= base_url('assets/vid/') . $modul['video'] ?>" download class="badge badge-pill badge-info"><i class="fas fa-fw fa-download"></i>
              Video
            </a>

          </div>
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
            <?php if ($status['status'] == 0) {
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