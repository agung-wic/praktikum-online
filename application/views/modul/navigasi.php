<div class="col-lg-6" style="margin:auto">
    <div class="kotak">
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-6" style="margin:auto">
                    <div class="kotak" style="background-color: #bcaead;">
                        <div class="container mt-2" style="color: black;">
                            <h6 class="mb-3"><b><?= $modul['name'] ?></b></h6>
                            <input type="text" name="aksi" value="data" hidden>
                            <input type="text" id="id" data-id="<?= $modul['modul']; ?>" name="id" value="<?= $modul['modul']; ?>" hidden>
                        </div>
                        <div class="row justify-content-center">
                            <?php if ($tombol_arah[0]['tombol_status'] == 1) { ?>
                                <button style="font-size:300%;margin-bottom:3%;margin-top:10%" type="submit" class="btn btn-dark fa fa-arrow-circle-up tombolTambahRole" data-toggle="modal" data-target="#tombolEditAtasModal">
                                </button>
                            <?php } else { ?> <button style="color:#bcaead;background-color:#bcaead;font-size: 300%;margin-bottom:3%;margin-top:10%" data-id="<?= $modul['modul'] ?>;" class="btn fa fa-arrow-circle-up" disabled>
                                </button>
                            <?php } ?>
                        </div>
                        <div class="row justify-content-center">
                            <?php if ($tombol_arah[2]['tombol_status'] == 1) { ?>
                                <button style="font-size: 300%" type="submit" data-tampil="#data1a" data-kirim="<?= $tombol_arah[1]['tombol_kirim'] ?>]" data-id="<?= $modul['modul'] ?>;" class="param1 btn btn-dark fa fa-arrow-circle-left kirim1a">
                                </button>
                            <?php } else { ?> <button style="color:#bcaead;background-color:#bcaead;font-size: 300%" data-id="<?= $modul['modul'] ?>;" class="btn fa fa-arrow-circle-left" disabled>
                                </button>
                            <?php } ?>
                            <button style="font-size:200%;margin-right:3%;margin-left:3%;background-color:black;color:white" type="submit" data-id="<?= $modul['modul'] ?>;" class="btn fas fa-circle kirim1a" disabled>
                            </button>
                            <?php if ($tombol_arah[3]['tombol_status'] == 1) { ?>
                                <button style="font-size: 300%" type="submit" data-tampil="#data1a" data-kirim="[c,87]" data-id="<?= $modul['modul'] ?>;" class="param1 btn btn-dark fa fa-arrow-circle-right kirim1a">
                                </button>
                            <?php } else { ?><button style="color:#bcaead;background-color:#bcaead;font-size: 300%" data-id="<?= $modul['modul'] ?>;" class="btn fa fa-arrow-circle-right" disabled>
                                </button>
                            <?php } ?>
                        </div>
                        <div class="row justify-content-center">
                            <?php if ($tombol_arah[1]['tombol_status'] == 1) { ?>
                                <button style="font-size: 300%;margin-top:3%;margin-bottom:20%" type="submit" data-tampil="#data1a" data-kirim="[v,87]" data-id="<?= $modul['modul'] ?>;" class="param1 btn btn-dark fa fa-arrow-circle-down kirim1a">
                                </button>
                            <?php } else { ?> <button style="color:#bcaead;background-color:#bcaead;font-size: 300%;margin-bottom:3%;margin-top:10%" data-id="<?= $modul['modul'] ?>;" class="btn fa fa-arrow-circle-up" disabled>
                                </button>
                            <?php } ?>
                        </div>
                        <?php
                        foreach ($tombol_tulisan as $t) :  ?>
                            <div class="row justify-content-center mb-1">
                                <button type="submit" style="margin: 1%;" data-kirim="<?= $t['tombol_kirim']; ?>" data-tampil="#data4" data-id="<?= $modul['modul'] ?>;" class="param1 btn btn-dark px-4 kirim1a">
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

<div class="modal fade" id="tombolEditAtasModal" tabindex="-1" role="dialog" aria-labelledby="tombolEditAtasModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tombolEditAtasModalLabel">Tombol Atas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('modul/edittombol') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <input type="text" class="form-control" id="role" name="role" placeholder="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>