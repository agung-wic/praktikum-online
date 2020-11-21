<div class="row mx-3">
  <div class="col-lg-12">
    <div class="kotak">
      <div class="container py-3">
        <div class="row">
          <div class="col-lg-8">
            <h4><b>Praktikan</b></h4>
            <h6>Perhatikan share screen dari <b>Asisten</b> dan analisa percobaan modul <b><?= $modul['name'] ?></b> dengan baik. Jangan lupa untuk menekan tombol selesai
              jika praktikum dirasa sudah cukup.</h6>
            <br>
            <div class="alert alert-danger">
              <h6><b> PRAKTIKAN DIANGGAP TIDAK MENGIKUTI PRAKTIKUM JIKA TIDAK MENEKAN TOMBOL SELESAI </b></h6>
            </div>
          </div>
          <div class="col-lg-auto ml-auto mt-auto">
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
  console.log(countDownDate);
  var waktu = "<?= $modul['time']; ?>";
  console.log(waktu);
  var batas = waktu.split(":");
  console.log(batas);
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