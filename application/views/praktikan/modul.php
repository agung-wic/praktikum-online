<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10  align-self-center">
      <div class="kotak mt-5 p-5">
        <!-- Page Heading -->
        <h1 class="mt-2 mb-5" style="text-align: center;"><?= $title ?></h1>
        <div class="accordion" id="accordionExample">
          <?php $i = 0;
          foreach ($modul as $m) : ?>
            <div class="card">
              <div class="card-header py-3" style="margin-bottom: 0px; background: linear-gradient(40deg,rgba(111, 140, 252, 1) 8%,rgba(47, 200, 201, 1) 100%);color: white;" id="heading<?= $m['modul']; ?>">
                <h2 class="mb-0">
                  <div class="btn-block text-left collapsed" style="font-size: large; " type="button" data-toggle="collapse" data-target="#collapse<?= $m['modul']; ?>" aria-expanded="true">
                    <img class="my-3" name="main" style="display: block; margin: auto; background-color: #6a6a6a; color: white; border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;" id="main" width="85%%" src="http://10.122.10.43:8081/">
                    <div>


                    </div><strong><?= $m['modul'] ?></strong> . <?= $m['name']; ?>
                  </div>
                </h2>
              </div>

              <div id="collapse<?= $m['modul']; ?>" class="collapse" aria-labelledby="heading<?= $m['modul']; ?>" data-parent="#accordionExample">
                <div class="card-body">
                  Tujuan Percobaan: <?= $m['tujuan'] ?>
                  <p class="mt-4"><b>Waktu : <?= $m['time'] ?></b></p>
                  <p><b>Status : <?php
                                  if ($i < count($status)) {
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
  </div>
</div>