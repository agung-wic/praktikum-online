<div class="container">
  <div class="kotak mt-5">
    <!-- Page Heading -->
    <h1 class="mt-2 mb-5" style="text-align: center;"><?= $title ?></h1>
    <div class="accordion" id="accordionExample">
      <?php $i = 0;
      foreach ($modul as $m) : ?>
        <div class="card" style="background-color: #e2e1e6;">
          <div class="card-header" id="heading<?= $m['modul']; ?>">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-left collapsed" style="font-size: large;" type="button" data-toggle="collapse" data-target="#collapse<?= $m['modul']; ?>" aria-expanded="true" aria-controls="collapseOne">
                <?= $m['modul'] ?>. <?= $m['name']; ?>
              </button>
            </h2>
          </div>

          <div id="collapse<?= $m['modul']; ?>" class="collapse" aria-labelledby="heading<?= $m['modul']; ?>" data-parent="#accordionExample">
            <div class="card-body">
              Tujuan Percobaan: <?= $m['tujuan'] ?>
              <p class="mt-4"><b>Waktu : <?= $m['time'] ?></b></p>
              <p><b>Status : <?php
                              if ($i < count($status[$i])) {
                                if ($m['modul'] == $status[$i]['modul_id']) {
                                  if ($status[$i]['status'] == 0) {
                                    echo "Belum Selesai";
                                  } else {
                                    echo "Selesai";
                                  }
                                  $i++;
                                } else {
                                  echo "Belum Selesai";
                                }
                              } else {
                                echo "Belum Selesai";
                              }
                              ?></b></p>
              <div class="row">
                <a class="btn ml-auto gradien" href="<?= base_url() ?>praktikan/modul/<?= $m['modul']; ?>">Pilih Modul</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>