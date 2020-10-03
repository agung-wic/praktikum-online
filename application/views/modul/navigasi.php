<div class="col-lg-6" style="margin:auto">
    <div class="kotak">
        <div class="container py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-6" style="margin:auto">
                    <div class="kotak" style="background-color: #bcaead;">
                        <div class="container mt-2" style="color: black;">
                            <h6 class="text-center mb-5" style="padding-top:7%"><b><?= $modul['name'] ?></b></h6>
                        </div>
                        <div class="row justify-content-center">
                            <button style="font-size:300%;margin-bottom:3%;margin-top:10%" type="submit" class="btn btn-dark fa fa-arrow-circle-up tombolEditArah" data-id="<?= $tombol_arah[0]['id']; ?>" data-toggle="modal" data-target="#tombolEditArah">
                            </button>
                        </div>
                        <div class="row justify-content-center">
                            <button style="font-size: 300%" type="submit" class="btn btn-dark fa fa-arrow-circle-left tombolEditArah" data-id="<?= $tombol_arah[2]['id']; ?>" data-toggle="modal" data-target="#tombolEditArah">
                            </button>
                            <button style="font-size:200%;margin-right:3%;margin-left:3%;background-color:black;color:white" type="submit" class="btn fas fa-circle" disabled>
                            </button>
                            <button style="font-size: 300%" type="submit" class="btn btn-dark fa fa-arrow-circle-right tombolEditArah" data-id="<?= $tombol_arah[3]['id']; ?>" data-toggle="modal" data-target="#tombolEditArah">
                            </button>
                        </div>
                        <div class="row justify-content-center">
                            <button style="font-size: 300%;margin-top:3%;margin-bottom:20%" type="submit" class="btn btn-dark fa fa-arrow-circle-down tombolEditArah" data-id="<?= $tombol_arah[1]['id']; ?>" data-toggle="modal" data-target="#tombolEditArah">
                            </button>
                        </div>
                        <?php $i = 0;
                        foreach ($tombol_tulisan as $t) :  ?>
                            <div class="row justify-content-center mb-1">
                                <div class="col-lg-9 text-center">
                                    <button type="submit" style="margin-right: 3%;" data-toggle="modal" data-target="#tombolEditTulisan" data-id=" <?= $tombol_tulisan[$i]['id'] ?>" class="btn btn-dark px-4 tombolEditTulisan">
                                        <?= $t['tombol_keterangan'] ?>
                                    </button>
                                </div>
                                <div class="col-lg-3">
                                    <a href="<?= base_url('modul/deletetomboltulisan/') . $t['id']; ?>" onclick=" return confirm('Yakin?');"">
                                        <i class=" fas fa-minus-circle" style="font-size:200%;color:#e74a3b"></i>
                                    </a>
                                </div>
                            </div>
                        <?php $i++;
                        endforeach;
                        ?>
                        <div class="row justify-content-center mb-3" style="padding-bottom:10%;">
                        </div>
                        <div class="row justify-content-center mt-3 mb-1">
                            <button type="submit" style="background-color:#26A65B;border:none;margin-bottom:5%" data-id="<?= $modul['modul']; ?>" data-toggle="modal" data-target="#tombolTambahTulisan" class="btn btn-dark px-4 tombolTambahTulisan">
                                Tambahkan Tombol
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="margin:auto">
                    <div class="kotak" style="background-color: #bcaead;">
                        <div class="container mt-2" style="color: black;">
                            <h6 class="text-center mb-3"><b>Output</b></h6>
                            <div class="form-group">
                                <?php $i = 0;
                                foreach ($output_tulisan as $t) :  ?>
                                    <label for="data1"><?= $t['tulisan']; ?></label>
                                    <button type="submit" style="margin-right: 3%;" data-toggle="modal" data-target="#tombolEditTulisan" data-id=" <?= $output_tulisan[$i]['id'] ?>" class="form-control form-control-user mb-4 tombolEditTulisan">
                                        <?= Edit ?>
                                    </button>
                                <?php $i++;
                                endforeach;
                                ?>
                            </div>
                            <div class="row justify-content-center mb-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-auto mr-auto">
                    <a href="<?= base_url('modul/editnavigasi') ?>" class="btn btn-secondary px-5">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="tombolEditArah" tabindex="-1" role="dialog" aria-labelledby="tombolEditArahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tombolEditArahLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('modul/edittombolarah') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="id_modul" name="id_modul">
                        <label for="tombol_kirim">Nilai yang dikirim</label>
                        <input type="text" class="form-control" id="tombol_kirim" name="tombol_kirim">
                    </div>
                    <div class="form-group">
                        <label for="tombol_status">Status</label>
                        <input type="checkbox" class="form-check-input ml-3 pl-5" id="tombol_status" name="tombol_status">
                    </div>
                    <div class="form-group">
                        <label for="tombol_keterangan">Keterangan tombol</label>
                        <input type="text" class="form-control" id="tombol_keterangan" name="tombol_keterangan">
                    </div>
                    <div class="form-group">
                        <label for="data_tampil_output">Data output</label>
                        <input type="text" class="form-control" id="data_tampil_output" name="data_tampil_output">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tombolEditTulisan" tabindex="-1" role="dialog" aria-labelledby="tombolEditTulisanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title tombolEditTulisanLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('modul/edittomboltulisan') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="idd" name="idd">
                        <input type="hidden" id="idd_modul" name="idd_modul">
                        <label for="tombol_kirimm">Nilai yang dikirim</label>
                        <input type="text" class="form-control" id="tombol_kirimm" name="tombol_kirimm">
                    </div>
                    <div class="form-group">
                        <label for="tombol_statuss">Status</label>
                        <input type="checkbox" class="form-check-input ml-3 pl-5" id="tombol_statuss" name="tombol_statuss">
                    </div>
                    <div class="form-group">
                        <label for="tombol_keterangann">Keterangan tombol</label>
                        <input type="text" class="form-control" id="tombol_keterangann" name="tombol_keterangann">
                    </div>
                    <div class="form-group">
                        <label for="data_tampil_outputt">Data output</label>
                        <input type="text" class="form-control" id="data_tampil_outputt" name="data_tampil_outputt">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tombolTambahTulisan" tabindex="-1" role="dialog" aria-labelledby="tombolTambahTulisanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tombol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('modul/tambahtomboltulisan') ?>" method="post">
                    <div class="form-group">
                        <label for="keterangan">Keterangan tombol</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="modul_id" name="modul_id">
                        <label for="nilai">Nilai yang dikirim</label>
                        <input type="text" class="form-control" id="nilai" name="nilai">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="checkbox" class="form-check-input ml-3 pl-5" id="status" name="status">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>