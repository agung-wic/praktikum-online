<div class="row mx-5">
  <div class="kotak" style="background-color: white;">
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
      <?= $lokasi ?>
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
    <div class="kotak" background-color:black">
      <div class="container py-3">
        <div class="row">
          <div class="col-lg-12">
            <div class="kotak" style="background-color: #bcaead;">
              <div class="container mt-2" style="color: black;">
                <h6 class="mb-3"><b>Output</b></h6>
                <div class="form-group">
                  <label for="data1">Output 1</label>
                  <output type="text" id="data4" name="data4" class="form-control form-control-user mb-4"></output>
                  <label for="data1">Output 2</label>
                  <output type="text" id="data1a" name="data1a" class="form-control form-control-user mb-4"></output>
                  <label for="data1">Output 3</label>
                  <output type="text" id="data3" name="data3" class="form-control form-control-user"></output>
                </div>
                <div class="row justify-content-center mb-3">
                </div>
              </div>
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

<div class="modal fade" id="Keterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Keterangan Button</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <button type="submit" id="param2" data-kirim="[d]" data-tampil="#data4" data-id="<?= $modul['modul'] ?>" class="btn btn-secondary px-4 kirim1a" disabled>
          1
        </button>
        <a class="">Drop Bola</a>
        <div class="p-1">
        </div>
        <button type="submit" data-kirim="[i]" data-tampil="#data4" data-id="<?= $modul['modul'] ?>" id="param4" class="btn btn-secondary px-4 kirim1a" disabled>
          2
        </button>
        <a class="">Status Bola</a>
        <div class="p-1">
        </div>
        <button type="submit" data-kirim="[t]" data-tampil="#data3" data-id="<?= $modul['modul'] ?>" id="param3" class="btn btn-secondary pl-1 px-4 kirim1a" disabled>
          3
        </button>
        <a class="">Cek Waktu</a>
        <div class="p-1">
        </div>
        <button type="submit" data-kirim="[r]" data-tampil="#data4" data-id="<?= $modul['modul'] ?>" id="param4" class="btn btn-secondary px-4 kirim1a" disabled>
          4
        </button>
        <a class="">Reload Bola</a>
        <div class="p-1">
        </div>
        <button type="submit" data-kirim="" data-tampil="#data3" data-id="<?= $modul['modul'] ?>" id="param3" class="btn btn-secondary pl-1 px-4 kirim1a" disabled>
          5
        </button>
        <a class="">Reset Alat</a>
        <div class="p-1">
        </div>
        <button type="submit" data-kirim="" data-tampil="#data4" data-id="<?= $modul['modul'] ?>" id="param4" class="btn btn-secondary px-4 kirim1a" disabled>
          6
        </button>
        <a class=""></a>
        <div class="p-1">
        </div>
        <button type="submit" data-kirim="[r]" data-tampil="#data4" data-id="<?= $modul['modul'] ?>" id="param4" class="btn btn-secondary px-4 kirim1a" disabled>
          7
        </button>
        <a class=""></a>
        <div class="p-1">
        </div>
        <button type="submit" data-kirim="" data-tampil="#data3" data-id="<?= $modul['modul'] ?>" id="param3" class="btn btn-secondary pl-1 px-4 kirim1a" disabled>
          8
        </button>
        <a class=""></a>
        <div class="p-1">
        </div>
        <button type="submit" data-kirim="" data-tampil="#data4" data-id="<?= $modul['modul'] ?>" id="param4" class="btn btn-secondary px-4 kirim1a" disabled>
          9
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
      window.location.href = "<?= base_url('praktikan/modul/') ?>";
    }
  }, 1000);
</script>