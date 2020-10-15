<div id="particles-js">
    <div class="container" style="position:absolute">
        <!-- Logo -->
        <div class="row-lg justify-content-center my-3 text-center">
            <div class="col-lg big-icon">
                <i class="fas fa-at fa-5x"></i>
            </div>
        </div>
        <!-- Judul -->
        <h4><?= $title ?></h4>

        <!-- Form -->
        <form class="user" method="post" action="<?= base_url('auth/addpassword'); ?>">
            <div class="form-group">
                <input class="form-control" type="password" id="password1" name="password1" placeholder="Kata Sandi" style="margin-top: 25px; background-color: #f6f6f6; border-top: 0px; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0px;">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password2" name="password2" placeholder="Konfirmasi Kata Sandi" style="margin-top: 25px; background-color: #f6f6f6; border-top: 0px; border-bottom: 1px solid #6a6a6a; border-left: 1px solid #6a6a6a; border-right: 0px;">
            </div>
            <div class="form-group">
                <input type="hidden" id="nrp" name="nrp" value="<?php if ($this->uri->segment('3') == NULL || $this->uri->segment('3') == "") {
                                                                    echo $nrp;
                                                                } else {
                                                                    echo $this->uri->segment('3');
                                                                } ?>">
            </div>
            <div class=" p-3"> <button type="submit" class="btn" style="display: block; margin: auto; background: linear-gradient(40deg, rgba(111,140,252,1) 8%, rgba(47,200,201,1) 100%); color: white; border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;
                padding-left:15%;
                padding-right:15%">Kirim
                </button>
            </div>
        </form>
    </div>