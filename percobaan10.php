<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Custom fonts for this template-->
  <link href="http://localhost/fisdas/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="http://localhost/fisdas/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="http://localhost/fisdas/assets/css/css.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="icon" href="http://localhost/fisdas//assets/img/logoits.png" type="image/gif">


  <title>Percobaan Modul 10</title>
</head>
<style>
  .begron {
    background-image: url("http://localhost/fisdas//assets/img/background.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
  }
</style>

<body>
  <div class="begron" id="wrapper">
    <div class="row mx-5">
      <div class="col justify-content-center">
        <div class="kotak">
          <div class="container">

            <h4 class="mt-3"><b>Pengukuran Permukaan Tegangan</b></h4>
            <h6 class="mb-3">Kode Percobaan: M7</h6>
            <h6><b>I. Tujuan Percobaan</b></h6>
            <p>Menentukan tegangan permukaan dari berbagai cairan antara lain: air, minyak, tanah, alkohol, dan olie.</p>

            <h6><b>II. Peralatan Yang Digunakan</b></h6>
            <ol>
              <li>Stand base dengan panjang sisi 28 cm (1 buah)</li>
              <li>Batang besi panjang 25 cm dan 50 cm (2 buah)</li>
              <li>Spring balance dengan skala Newton (1 set)</li>
              <li>Laboratory stand (dongkrak) (1 buah)</li>
              <li>Cincin aluminium (1 buah)</li>
            </ol>

            <h6><b>III. Teori</b></h6>
            <p>Tegangan permukaan (alpha) adalah usaha yang diperlukan untuk menciptakan suatu permukaan baru. Secara matematis dituliskan sebagai:</p>
            <div class="row justify-content-center mb-4">
              <img src="http://localhost/fisdas/assets/img/modul10-1.png" width="80%" alt="">
            </div>
            <p>Dalam percobaan ini untuk menentukan tegangan permukaan zat cair di gunakan permukaan kontak berupa cincin aluminium berjari-jari r. Karena cincin punya 2 permukaan (luar dan dalam) yang kontak dengan zat cair maka:</p>
            <div class="row justify-content-center mb-4">
              <img src="http://localhost/fisdas/assets/img/modul10-2.png" width="80%" alt="">
            </div>

            <h6><b>IV. Cara Melakukan Percobaan:</b></h6>
            <ol>
              <li>Susun peralatan seperti Gambar 4.12.</li>
              <li>Isi gelas ukur dengan cairan yang akan dicari tegangan permukaannya.</li>
              <li>Putar skrup dari penyangga hingga gelas ukur yang berisi cairan naik dan cincinnya tenggelam dalam cairan.</li>
              <li>Lalu turunkan gelas ukur dengan jalan memutar skrup penyangga hingga dicapai keadaan maksimum dan baca tegangan permukaannya pada neraca pegas.</li>
              <li>Cairan yang dicari tegangan permukaan (&alpha;) adalah : air, minyak tanah, alkohol, dan olie.</li>
              <li>Lakukan masing-masing 5 kali dan buat tabelnya.</li>
            </ol>

            <h6><b>V. Tugas Untuk Laporan Resmi:</b></h6>
            <ol>
              <li>Hitung tegangan permukaan dari: air, minyak tanah, alkohol, dan olie. Masing-masing dengan ralatnya.</li>
              <li>Buat grafik gaya sebagai fungsi tegangan permukaan untuk tiap titik cairan.</li>
              <li>Buat kesimpulan dari hasil percobaan.</li>
            </ol>

            <h6><b>VI. Tugas Pendahuluan:</b></h6>
            <ol>
              <li>Apa yang dimaksud dengan tegangan permukaan, mengapa terjadi?</li>
              <li>Apakah ada perbedaan khusus antara zat cair yang adhesive dan non-adhesif terhadap tegangan permukaannya?</li>
              <li>Terangkan hubungan antara permukaan dan rapat massa!</li>
              <li>Tunjukkan cara lain untuk menentukan tegangan permukaan!</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="col justify-content-center">
        <div class="kotak">
          <div class="container">
            <img name="main" style="display: block; margin: auto; background-color: #6a6a6a; color: white; border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;" id="main" width="640" height="360" src="http://192.168.0.176:8081">
            <div class="row">
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="kotak" style="background-color: #bcaead;">
                      <div class="container mt-2" style="color: black;">
                        <h6 class="mb-3"><b>Input</b></h6>
                        <form action="">
                          <div class="form-group">
                            <label for="var1">Variabel 1</label>
                            <input type="text" id="var1" name="var1" class="form-control form-control-user" id="var1" name="var1">
                          </div>
                          <div class="form-group">
                            <label for="var2">Variabel 2</label>
                            <input type="text" id="var2" name="var2" class="form-control form-control-user" id="var2" name="var2">
                          </div>
                          <div class="form-group">
                            <label for="var3">Variabel 3</label>
                            <input type="text" id="var3" name="var3" class="form-control form-control-user" id="var3" name="var3">
                          </div>
                          <div class="row justify-content-center mb-3">
                            <button type="submit" class="btn btn-secondary px-4">
                              Kirim
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="kotak" style="background-color: #bcaead;">
                      <div class="container mt-2" style="color: black;">
                        <h6 class="mb-3"><b>Output</b></h6>
                        <form action="">
                          <div class="form-group">
                            <label for="data1">Data 1</label>
                            <input type="text" id="data1" name="data1" class="form-control form-control-user" id="data1" name="data1">
                          </div>
                          <div class="form-group">
                            <label for="data2">Data 2</label>
                            <input type="text" id="data2" name="data2" class="form-control form-control-user" id="data2" name="data2">
                          </div>
                          <div class="form-group">
                            <label for="data3">Data 3</label>
                            <input type="text" id="data3" name="data3" class="form-control form-control-user" id="data3" name="data3">
                          </div>
                          <div class="row justify-content-center mb-3">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-auto ml-auto">
                <h6><b>Waktu : 00:30:00</b></h6>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-lg-auto ml-auto">
                <a href="#" class="btn btn-secondary px-5">Selesai</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "Logout" jika ingin mengakhiri sesi ini.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="http://localhost/fisdas/auth/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="http://localhost/fisdas/assets/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/fisdas/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://localhost/fisdas/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://localhost/fisdas/assets/js/sb-admin-2.min.js"></script>
    <script src="http://localhost/fisdas/assets/js/script.js"></script>
</body>

</html>