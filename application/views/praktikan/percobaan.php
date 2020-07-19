<?php
// $host    = "192.168.43.56";
// $port    = 25003;
// $message = "Hello Server";
// echo "Message To server :" . $message;
// // create socket
// $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// // connect to server
// $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
// // send string to server
// socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
// // get server response
// $result = socket_read($socket, 1024) or die("Could not read server response\n");
// echo "Reply From Server  :" . $result;
// // close socket
?>

<div class="row mx-5">
  <div class="col justify-content-center">
    <div class="kotak">
      <div class="container">
        <?= $modul['content']; ?>
      </div>
    </div>
  </div>
  <div class="col justify-content-center">
    <div class="kotak">
      <div class="container">
        <img class="mb-5" name="main" style="display: block; margin: auto; background-color: #6a6a6a; color: white; border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;" id="main" width="100%" src="http://192.168.43.56:8081">
        <div class="row">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-6">
                <div class="kotak" style="background-color: #bcaead;">
                  <div class="container mt-2" style="color: black;">
                    <h6 class="mb-3"><b>Input</b></h6>
                    <form action="<?= base_url('praktikan/percobaan/') . $modul['modul'] ?>" method="post">
                      <div class="form-group">
                        <label for="var">Variabel</label>
                        <select class="form-control" name="var" id="var">
                          <option <?php if (($this->input->post('var')) && $this->input->post('var') == "x") echo "selected"; ?> value="x">Naik</option>
                          <option <?php if (($this->input->post('var')) && $this->input->post('var') == "z") echo "selected"; ?> value="z">Turun</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="val">Nilai</label>
                        <input type="text" id="val" name="val" value="<?= set_value('val'); ?>" class="form-control form-control-user" id="val" name="val">
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
          <div class="col-lg-auto mr-auto">
            <a href="<?= base_url('praktikan/modul/') . $modul['modul'] ?>" class="btn btn-secondary px-5">Kembali</a>
          </div>
          <div class="col-lg-auto ml-auto">
            <a href="<?= base_url('praktikan/modul/') ?>" class="btn btn-secondary px-5">Selesai</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>