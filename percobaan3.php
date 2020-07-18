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


  <title>Percobaan Modul 3</title>
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

            <h4 class="mt-3"><b>Tetapan Pegas</b></h4>
            <h6 class="mb-5">Kode Percobaan: G3</h6>
            <h6><b>I. Tujuan Percobaan</b></h6>
            <p>Menentukan besar tetapan pegas.</p>

            <h6><b>II. Peralatan Yang Digunakan</b></h6>
            <ol>
              <li>Beban (1 set)</li>
              <li>Pegas (2 buah)</li>
              <li>Stopwatch (1 buah)</li>
              <li>Statif (1 set)</li>
              <li>Timbangan standar 0-50 gram (1 set)</li>
            </ol>

            <h6><b>III. Teori</b></h6>
            <ol>
              <li><b>Cara Statis</b>
                <p>Apabila suatu pegas dengan tetapan pegas k diberi beban w seperti ditunjukkan pada Gambar 4.3., maka ujung pegas akan bergeser sepanjang x sesuai dengan persamaan:</p>
                <div class="row justify-content-center mb-4">
                  <img src="http://localhost/fisdas/assets/img/modul3-1.png" width="80%" alt="">
                </div>
              </li>
              <li><b>Cara Dinamis</b>
                <p>Apabila pegas yang telah diberi beban dan telah membentuk kesetimbangan baru tadi disimpangkan dan dilepas, maka sistem pegas akan mengalami getaran selaras dengan periode:</p>
                <div class="row justify-content-center mb-4">
                  <img src="http://localhost/fisdas/assets/img/modul3-2.png" width="80%" alt="">
                </div>
              </li>
            </ol>


            <h6><b>IV. Cara Melakukan Percobaan:</b></h6>
            <ol type="a">
              <li><b>Cara Statis</b>
                <ol>
                  <li>Gantungkan ember pada pegas (gunakan statif) dan anggap kedudukan ember sebagai skala nol.</li>
                  <li>Tambahkan satu persatu beban yang ada, catat massa beban dan kedudukan ember setiap penambahan beban. Lakukan untuk 5 macam beban.</li>
                  <li>Keluarkan beban satu persatu, catat massa beban dan kedudukan ember setiap pengurangan beban.</li>
                  <li>Lakukan langkah 1 - 3, untuk pegas yang lain.</li>
                </ol>
              </li>
              <li><b>Cara Dinamis</b>
                <ol>
                  <li>Gantungkan ember pada pegas, beri simpangan lalu lepaskan. Catat waktu untuk 15 getaran.</li>
                  <li>Tambahkan sebuah beban pada ember, lalu catat waktu untuk 15 getaran. Kerjakan langkah ini dengan menambahkan beban. Usahakan langkah 1 – 2 dengan simpangan yang sama.</li>
                  <li>Lakukan langkah 1 – 2 untuk pegas yang lain.</li>
                </ol>
              </li>
            </ol>

            <h6><b>V. Tugas Untuk Laporan Resmi:</b></h6>
            <ol>
              <li>Hitung tetapan pegas k dengan cara statis menurut persamaan (4).</li>
              <li>Buat grafik soal a, dengan w sebagai ordinat dan x sebagai absis.</li>
              <li>Buat ralat pengukuran dari percobaan cara dinamis.</li>
              <li>Hitung tetapan pegas k dengan cara dinamis dengan persamaan (5).</li>
              <li>Buat kesimpulan untuk percobaan ini.</li>
            </ol>

            <h6><b>VI. Tugas Pendahuluan:</b></h6>
            <ol>
              <li>Buktikan persamaan (5).</li>
              <li>Turunkan persamaan pegas gabungan bila 2 pegas dihubungkan seri dan paralel.</li>
              <li>Apa yang dimaksud dengan getaran selaras.</li>
              <li>Gambar grafik w = f(x) dari cara statis dan tentukan harga k dari grafik tersebut.</li>
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