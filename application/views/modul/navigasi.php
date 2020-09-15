<div class="col-lg-6" style="margin:auto">
    <div class="kotak">
        <?php
        var_dump($tombol_arah);
        die; ?>
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-6" style="margin:auto">
                    <div class="kotak" style="background-color: #bcaead;">
                        <div class="container mt-2" style="color: black;">
                            <h6 class="mb-3"><b><?= $modul['name'] ?></b></h6>
                        </div>
                        <div class="row justify-content-center">
                            <button style="font-size:300%;margin-bottom:3%;margin-top:10%" type="submit" class="btn btn-dark fa fa-arrow-circle-up tombolEditArah" data-id="<?= $tombol_arah[0]['id']; ?>" data-toggle="modal" data-target="#tombolEditArah">
                            </button>
                        </div>
                        <div class="row justify-content-center">
                            <button style="font-size: 300%" type="submit" class="btn btn-dark fa fa-arrow-circle-left" data-id="<?= $tombol_arah[2]['id']; ?>" data-toggle="modal" data-target="#tombolEditArah">
                            </button>
                            <button style="font-size:200%;margin-right:3%;margin-left:3%;background-color:black;color:white" type="submit" class="btn fas fa-circle" disabled>
                            </button>
                            <button style="font-size: 300%" type="submit" class="btn btn-dark fa fa-arrow-circle-right" data-id="<?= $tombol_arah[3]['id']; ?>" data-toggle="modal" data-target="#tombolEditArah">
                            </button>
                        </div>
                        <div class="row justify-content-center">
                            <button style="font-size: 300%;margin-top:3%;margin-bottom:20%" type="submit" class="btn btn-dark fa fa-arrow-circle-down" data-id="<?= $tombol_arah[1]['id']; ?>" data-toggle="modal" data-target="#tombolEditArah">
                            </button>
                        </div>
                        <?php
                        foreach ($tombol_tulisan as $t) :  ?>
                            <div class="row justify-content-center mb-1">
                                <button type="submit" style="margin: 1%;" data-kirim="<?= $t['tombol_kirim']; ?>" data-tampil="#data4" data-id="<?= $modul['modul'] ?>;" class="btn btn-dark px-4">
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
            </div>
            <div class="row mt-5">
                <div class="col-lg-auto mr-auto">
                    <a href="<?= base_url('praktikan/modul/') . $modul['modul'] ?>" class="btn btn-secondary px-5">Kembali</a>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>