<div class="row mx-5">
  <div class="kotak" style="background-color: white;">
    <div class="row-lg-6">
      <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="container">
      <h4 class="mt-3"><b><?= $modul['name'] ?></b></h4>
      <h6>Kode Percobaan: <?= $modul['modul']; ?></h6>
      <a href="<?= base_url('assets/file/') . $modul['pdf'] ?>" download class=" mb-3 badge badge-pill badge-info"><i class="fas fa-fw fa-download"></i>
        Modul
      </a>
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
<div class="row mx-3">
  <div class="col-lg-6">
    <nav>
      <div class="nav nav-tabs" style="border:none;" id="nav-tab">
        <?php
        $i = 0;
        while ($i < count($live_stream)) {
        ?>
          <a class="nav-item nav-link" style="background-color:black;color:white" id="nav-video-<?= $i ?>" data-toggle="tab" href="#video-<?= $i; ?>" role="tab" aria-controls="video-<?= $i; ?>" aria-selected="true">Video <?= $i + 1; ?></a>
        <?php $i++;
        } ?>
      </div>

    </nav>
    <div class="tab-content" id="nav-tabContent">
      <?php
      $i = 0;
      while ($i < count($live_stream)) {
      ?>
        <div class="tab-pane fade" id="video-<?= $i; ?>" role="tabpanel" aria-labelledby="video-<?= $i; ?>-tab">
          <div class="kotak" style="background-color:black;
          border-top-left-radius: 0px;
          border-top-right-radius: 25px;
          border-bottom-left-radius: 25px;
          border-bottom-right-radius: 25px;">
            <div class="container text-center">
              <iframe style="padding-right:3%;transform:<?= $live_stream[$i]['transform'] ?>" width="<?= $live_stream[$i]['width'] ?>" height=" <?= $live_stream[$i]['height'] ?>" src="<?= $live_stream[$i]['link'] ?>" frameborder="0" allow="accelerometer; mute; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      <?php $i++;
      } ?>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="kotak">
      <div class="container py-3">
        <div class="row">
          <?php if ($user['role_id'] != "8") { ?>
            <div class="col-lg-6">
              <div class="kotak" style="background-color: #bcaead;">
                <div class="container mt-2" style="color: black;">
                  <h6 class="mb-3"><b>Input</b></h6>
                  <input type="text" name="aksi" value="data" hidden>
                  <input type="text" id="id" data-id="<?= $modul['modul']; ?>" name="id" value="<?= $modul['modul']; ?>" hidden>
                </div>
                <div class="row justify-content-center">
                  <?php if ($tombol_arah[0]['tombol_status'] == 1) { ?>
                    <button style="font-size: 300%;margin-bottom:3%;margin-top:10%" type="submit" data-tampil=<?= "#" .  $tombol_arah[0]['data_tampil_output']; ?> data-kirim="<?= $tombol_arah[0]['tombol_kirim'] ?>" data-id="<?= $modul['modul'] ?>" class="param1 btn btn-dark fa fa-arrow-circle-up kirim1a">
                    </button>
                  <?php } else { ?> <button style="color:#bcaead;background-color:#bcaead;font-size: 300%;margin-bottom:3%;margin-top:10%" data-id="<?= $modul['modul'] ?>" class="btn fa fa-arrow-circle-up" disabled>
                    </button>
                  <?php } ?>
                </div>
                <div class="row justify-content-center">
                  <?php if ($tombol_arah[2]['tombol_status'] == 1) { ?>
                    <button style="font-size: 300%" type="submit" data-tampil=<?= "#" .  $tombol_arah[2]['data_tampil_output']; ?> data-kirim="<?= $tombol_arah[2]['tombol_kirim'] ?>" data-id="<?= $modul['modul'] ?>" class="param1 btn btn-dark fa fa-arrow-circle-left kirim1a">
                    </button>
                  <?php } else { ?> <button style="color:#bcaead;background-color:#bcaead;font-size: 300%" data-id="<?= $modul['modul'] ?>" class="btn fa fa-arrow-circle-left" disabled>
                    </button>
                  <?php } ?>
                  <button style="font-size:200%;margin-right:3%;margin-left:3%;background-color:black;color:white" type="submit" data-id="<?= $modul['modul'] ?>" class="btn fas fa-circle kirim1a" disabled>
                  </button>
                  <?php if ($tombol_arah[3]['tombol_status'] == 1) { ?>
                    <button style="font-size: 300%" type="submit" data-tampil=<?= "#" .  $tombol_arah[3]['data_tampil_output']; ?> data-kirim="<?= $tombol_arah[3]['tombol_kirim'] ?>" data-id="<?= $modul['modul'] ?>" class="param1 btn btn-dark fa fa-arrow-circle-right kirim1a">
                    </button>
                  <?php } else { ?><button style="color:#bcaead;background-color:#bcaead;font-size: 300%" data-id="<?= $modul['modul'] ?>" class="btn fa fa-arrow-circle-right" disabled>
                    </button>
                  <?php } ?>
                </div>
                <div class="row justify-content-center">
                  <?php if ($tombol_arah[1]['tombol_status'] == 1) { ?>
                    <button style="font-size: 300%;margin-top:3%;margin-bottom:20%" type="submit" data-tampil=<?= "#" . $tombol_arah[1]['data_tampil_output']; ?> data-kirim="<?= $tombol_arah[1]['tombol_kirim'] ?>" data-id="<?= $modul['modul'] ?>" class="param1 btn btn-dark fa fa-arrow-circle-down kirim1a">
                    </button>
                  <?php } else { ?> <button style="color:#bcaead;background-color:#bcaead;font-size: 300%;margin-bottom:3%;margin-top:10%" data-id="<?= $modul['modul'] ?>" class="btn fa fa-arrow-circle-up" disabled>
                    </button>
                  <?php } ?>
                </div>
                <?php
                foreach ($tombol_tulisan as $t) :  ?>
                  <div class="row justify-content-center mb-1">
                    <button type="submit" style="margin: 1%;" data-kirim="<?= $t['tombol_kirim']; ?>" data-tampil=<?= "#" .  $t['data_tampil_output']; ?> data-id="<?= $modul['modul'] ?>" class="param1 btn btn-dark px-4 kirim1a">
                      <?= $t['tombol_keterangan'] ?>
                    </button>
                  </div>
                <?php
                endforeach;
                ?>
                <div class="row justify-content-center mb-3" style="padding-bottom:10%;">
                </div>
              </div>
            </div>
            <div class="col-lg-6">
            <?php } else { ?> <div class="col-lg-12"> <?php }  ?>
              <div class="kotak" style="background-color: #bcaead;">
                <div class="container mt-2" style="color: black;">
                  <h6 class="mb-3"><b>Output</b></h6>
                  <div class="form-group">
                    <?php
                    foreach ($output_tulisan as $t) :  ?>
                      <label for="data1"><?= $t['tulisan']; ?></label>
                      <output type="text" id="<?= $t['data_tampil_output']; ?>" name="<?= $t['data_tampil_output']; ?>" class="form-control form-control-user mb-4"></output>
                    <?php
                    endforeach;
                    ?>
                  </div>
                  <div class="row justify-content-center mb-3">
                  </div>
                </div>
                <?php if ($modul['modul'] == 'M8') { ?>
                  <div class="container mt-2" style="color: black;">
                    <h6 class="mb-3"><b>Tabel</b></h6>
                    <div class="form-group">
                      <?php
                      foreach ($output_tulisan as $t) :  ?>
                        <label for="data1"><?= $t['tulisan']; ?></label>
                        <output type="text" id="<?= $t['data_tampil_output']; ?>" name="<?= $t['data_tampil_output']; ?>" class="form-control form-control-user mb-4"></output>
                      <?php
                      endforeach;
                      ?>
                    </div>
                    <div class="row justify-content-center mb-3">
                    </div>
                  </div>
                <?php } ?>
              </div>
              </div>
              <div class="col-lg-auto ml-auto">
                <h6><b>Sisa Waktu </h6> <span id="hours"></span>
                <span id="mins"></span>
                <span id="secs"></span>
                </b>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-lg-auto mr-auto">
                <a href="<?= base_url('praktikan/modul/') . $modul['modul'] ?>" class="btn btn-secondary px-5">Kembali</a>
              </div>
              <div class="col-lg-auto ml-auto">
                <a href="#" class="btn gradien px-5" data-toggle="modal" data-target="#SelesaiModal">Selesai</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="SelesaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih "Selesai" jika ingin mengakhiri praktikum ini.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('praktikan/selesai/') . $modul['modul'] ?>">Selesai</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tombolAbsen" tabindex="-1" role="dialog" aria-labelledby="tombolAbsenLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tombolAbsenLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('praktikan/absen') ?>" method="post">
          <div class="form-group">
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="id_modul" name="id_modul">
            <div class="row">
              <div class="col">
                <p class="card-text">Nama :<?= ' ' . $user['name']; ?></p>
                <p class="card-text">NRP :<?= ' ' . $user['nrp']; ?></p>
                <p class="card-text">Email :<?= ' ' . $user['email']; ?></p>
                <p class="card-text">Praktikum :<?= ' ' . $modul['name'] ?></p>
                <p class="card-text">Jadwal :<?= ' ' . $jadwal['jadwal'] ?></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Absen</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    // The data/time we want to countdown to
    var countDownDate = new Date("<?= $jadwal['jadwal']; ?>").getTime();
    var waktu = "<?= $modul['time']; ?>";
    var batas = waktu.split(":");
    var jam = parseInt(batas[0]) * 60 * 60 * 1000;
    var menit = parseInt(batas[1]) * 60 * 1000;
    var detik = parseInt(batas[2]) * 1000;
    var sisa = jam + menit + detik;
    // Run myfunc every second
    var myfunc = setInterval(function() {

      var now = new Date().getTime();
      var timeleft = countDownDate + jam + menit + detik - now;

      // Calculating the days, hours, minutes and seconds left
      var hours = Math.floor((timeleft / (1000 * 60 * 60)));
      var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

      // Result is output to the specific element
      document.getElementById("hours").innerHTML = hours + " :"
      document.getElementById("mins").innerHTML = minutes + " :"
      document.getElementById("secs").innerHTML = seconds

      if (timeleft < 0) {
        clearInterval(myfunc);
        document.getElementById("hours").innerHTML = ""
        document.getElementById("mins").innerHTML = ""
        document.getElementById("secs").innerHTML = ""
        window.location.href = "<?= base_url('praktikan/selesai/') . $modul['modul'] ?>";
      }
    }, 1000);
  </script>