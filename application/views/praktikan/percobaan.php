<div class="row mx-5">
  <div class="col justify-content-center">
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
  <div class="col justify-content-center">
    <div class="kotak">
      <div class="container">
        <img class="mb-5" name="main" style="display: block; margin: auto; background-color: #6a6a6a; color: white; border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;transform:rotate(270deg);margin-top:130px;" id="main" width="500px" src="http://192.168.43.39:8081">
        <div class="row" style="padding-top: 100px;">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-6">
                <div class="kotak" style="background-color: #bcaead;">
                  <div class="container mt-2" style="color: black;">
                    <h6 class="mb-3"><b>Input</b></h6>

                    <input type="text" name="aksi" value="data" hidden>
                    <input type="text" id="id" data-id="<?= $modul['modul']; ?>" name="id" value="<?= $modul['modul']; ?>" hidden>
                    <div class="form-group">
                      <label for="var">Variabel</label>
                      <select class="form-control" name="var" id="var">
                        <option <?php //if (($this->input->post('var')) && $this->input->post('var') == "x") echo "selected"; 
                                ?> data-send="[x,500]" value="x">Naik</option>
                        <option <?php //if (($this->input->post('var')) && $this->input->post('var') == "z") echo "selected"; 
                                ?> data-send="z" value="z">Turun</option>
                      </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="val">Nilai (dalam cm)</label>
                        <input type="text" id="val" name="val" value="<?//= set_value('val'); ?>" class="form-control form-control-user" id="val" name="val" placeholder="0">
                        <input type="text" id="id" name="id" value="<?//= $modul['modul']; ?>" hidden>
                      </div> -->
                    <div class="row justify-content-center mb-3">
                      <button type="submit" data-aksi="data" class="btn btn-secondary px-4 kirim1">
                        Kirim
                      </button>
                    </div>

                    <input type="text" id="id" name="id" data-id="<?= $modul['modul']; ?>" value="<?= $modul['modul']; ?>" hidden>
                    <input type="text" name="aksi" value="jatuhkan" hidden>
                    <div class="row justify-content-center mb-3">
                      <button type="submit" data-aksi="jatuhkan" class="btn btn-secondary px-4 kirim2">
                        Jatuhkan
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="kotak" style="background-color: #bcaead;">
                  <div class="container mt-2" style="color: black;">
                    <h6 class="mb-3"><b>Output</b></h6>
                    <div class="form-group">
                      <label for="data1">Data 1</label>
                      <output type="text" id="data1" name="data1" class="form-control form-control-user mb-4" id="data1" name="data1"></output>
                      <output type="text" id="data2" name="data2" class="form-control form-control-user" id="data2" name="data2"></output>
                    </div>
                    <!-- <div class="form-group">
                      <label for="data2">Data 2</label>
                      <input type="text" id="data2" name="data2" class="form-control form-control-user" id="data2" name="data2">
                    </div>
                    <div class="form-group">
                      <label for="data3">Data 3</label>
                      <input type="text" id="data3" name="data3" class="form-control form-control-user" id="data3" name="data3">
                    </div> -->
                    <div class="row justify-content-center mb-3">
                    </div>

                  </div>
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
            <a href="<?= base_url('praktikan/modul/') ?>" class="btn gradien px-5">Selesai</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // The data/time we want to countdown to
  var countDownDate = new Date("<?= $jadwal['jadwal']; ?>").getTime();

  // Run myfunc every second
  var myfunc = setInterval(function() {

    var now = new Date().getTime();
    var timeleft = countDownDate + (30 * 60 * 1000) - now;

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