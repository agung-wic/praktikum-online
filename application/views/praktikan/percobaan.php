<div class="row mx-5">
  <div class="kotak">
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
  <div class="col-lg-6 justify-content-center">
    <div class="kotak" style="transform:rotate(270deg);">
      <div class="container">
        <iframe width="560" height="600" src="https://www.youtube.com/embed/XwC44ihPP8g?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="kotak">
      <div class="container py-3">

        <div class="row">
          <div class="col-lg-6">
            <div class="kotak" style="background-color: #bcaead;">
              <div class="container mt-2" style="color: black;">
                <h6 class="mb-3"><b>Input</b></h6>
                <input type="text" name="aksi" value="data" hidden>
                <input type="text" id="id" data-id="<?= $modul['modul']; ?>" name="id" value="<?= $modul['modul']; ?>" hidden>
              </div>
              <div class="row justify-content-center">
                <button style="font-size: 400%;color: #E5E5E5" type="submit" data-tampil="#data1a" data-kirim="[c,87]" data-id="<?= $modul['modul'] ?>;" id="param1a" class="btn fa fa-arrow-circle-up kirim1a">
                </button>
              </div>
              <div class="row justify-content-center mb-3">
                <button style="font-size: 400%;color: #E5E5E5" type="submit" data-tampil="#data1a" data-kirim="[v,87]" data-id="<?= $modul['modul'] ?>;" id="param1b" class="btn fa fa-arrow-circle-down kirim1a">
                </button>
              </div>
              <div class="row justify-content-center mb-3">
                <button type="submit" id="param2" data-kirim="[d]" data-tampil="#data4" data-id="<?= $modul['modul'] ?>;" class="btn btn-secondary px-4 kirim1a">
                  Jatuhkan
                </button>
                <div class="p-1">
                </div>
                <button type="submit" data-kirim="[i]" data-tampil="#data4" data-id="<?= $modul['modul'] ?>;" id="param4" class="btn btn-secondary px-4 kirim1a">
                  Jumlah Bola
                </button>
              </div>
              <input type="text" name="aksi" value="jatuhkan" hidden>
              <div class="row justify-content-center mb-3">
                <button type="submit" data-kirim="[t]" data-tampil="#data3" data-id="<?= $modul['modul'] ?>;" id="param3" class="btn btn-secondary pl-1 px-4 kirim1a">
                  Hasil waktu
                </button>
                <div class="p-1">
                </div>
                <button type="submit" data-kirim="[r]" data-tampil="#data4" data-id="<?= $modul['modul'] ?>;" id="param4" class="btn btn-secondary px-4 kirim1a">
                  Reload Bola
                </button>
              </div>
              <div class="row justify-content-center mb-3">
                <button type="submit" data-kirim="[s]" data-id="<?= $modul['modul'] ?>;" id="param3" class="btn btn-secondary pl-1 px-4 kirim1a">
                  RESET
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="kotak" style="background-color: #bcaead;">
              <div class="container mt-2" style="color: black;">
                <h6 class="mb-3"><b>Output</b></h6>
                <div class="form-group">
                  <label for="data1">Jumlah Bola</label>
                  <output type="text" id="data4" name="data4" class="form-control form-control-user mb-4"></output>
                  <label for="data1">Ketinggian sekarang</label>
                  <output type="text" id="data1a" name="data1a" class="form-control form-control-user mb-4"></output>
                  <label for="data1">Hasil waktu</label>
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