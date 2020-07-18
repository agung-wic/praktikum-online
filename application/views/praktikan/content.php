<div class="row mx-5">
  <div class="col justify-content-center">
    <div class="kotak">
      <div class="container">
        <?= $modul['content']; ?>
      </div>
    </div>
  </div>
  <div class="col justify-content-center">
    <div class="kotak">
      <div class="container">
        <video width="100%" controls>
          <source src="<?= base_url('assets/vid/') . $modul['video']; ?>" type="video/mp4">
        </video>
        <div class="row">
          <div class="col-lg-4">
            <a href="<?= base_url('assets/vid/') . $modul['video'] ?>" class="badge badge-pill badge-info"><i class="fas fa-fw fa-download"></i>
              Video
            </a>
            <a href="<?= base_url('assets/file/') . $modul['pdf'] ?>" class="badge badge-pill badge-info"><i class="fas fa-fw fa-download"></i>
              Modul
            </a>
          </div>
          <div class="col-lg-auto ml-auto">
            <h6><b><?= $modul['time'] ?></b></h6>
            <h6><b>Status : Belum Selesai</b></h6>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-auto ml-auto">
            <a href="<?= base_url('praktikan/percobaan/') . $modul['modul']; ?>" class="btn btn-secondary px-5">Mulai</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>