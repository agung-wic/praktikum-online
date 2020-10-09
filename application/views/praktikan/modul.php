<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10  align-self-center">
      <div class="kotak mt-5 p-5">
        <!-- Page Heading -->
        <h1 class="mt-2 mb-5" style="text-align: center;"><?= $title ?></h1>
        <div class="accordion" id="accordionExample">
          <?php $i = 0;
          $j = 0;
          foreach ($modul as $m) : ?>
            <div class="card pb-2">
              <div class="card-header gradien_modul py-3" id="heading<?= $m['modul']; ?>">
                <h2 class="mb-0">
                  <div class="btn-block text-left collapsed" style="font-size: large; " type="button" data-toggle="collapse" data-target="#collapse<?= $m['modul']; ?>" aria-expanded="true">
                    <div>
                    </div><strong><?= $m['modul'] ?></strong> . <?= $m['name']; ?>
                  </div>
                </h2>
              </div>
              <div id="collapse<?= $m['modul']; ?>" class="collapse" aria-labelledby="heading<?= $m['modul']; ?>" data-parent="#accordionExample">
                <div class="card-body">
                  Tujuan Percobaan: <?= $m['tujuan'] ?>
                  <p class="mt-4">Waktu : <b><?= $m['time'] ?></b></p>
                  <?php
                  if ($i < count($status)) {
                    if ($m['modul'] == $status[$i]['modul_id']) {
                      if ($status[$i]['status'] == 0) {
                        echo "<p>Status : <b>Belum Selesai</b></p>";
                      } else {
                        echo "<p>Status : <b>Selesai</b></p>";
                      }
                      echo "<p>Jadwal : <b>" . $status[$i]['jadwal'] . "</b></p>";
                      $i++;
                    } else {
                      echo "<p>Status : <b>Belum Selesai</b></p>";
                    }
                  } else {
                    echo "<p>Status : <b>Belum Selesai</b></p>";
                  }
                  $temp = 0;
                  $tes = 0;
                  $flag = [];
                  while ($tes < count($asisten)) {
                    if ($asisten[$tes]['id_modul'] == $m['modul']) {
                      $flag[$temp] = $tes;
                      $temp++;
                    }
                    $tes++;
                  }

                  if ($m['modul'] == $asisten[$j]['id_modul']) {

                    $halo = 0;
                    echo "<p style='margin-bottom:0px;'>Asisten : </p>";
                    while ($halo < count($flag)) {

                  ?> <li><b><?= $asisten[$flag[$halo]]['name'] ?> - <?= $asisten[$flag[$halo]]['nrp'] ?></b></li>

                  <?php $halo++;
                      $j++;
                    }
                  }
                  ?>
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