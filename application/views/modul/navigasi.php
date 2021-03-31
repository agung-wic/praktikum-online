<div class="col-lg-6" style="margin:auto">
    <div class="kotak">
        <div class="container py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-6">
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
                                    <a href="<?= base_url('modul/deletetomboltulisan/') . $t['id']; ?>" onclick=" return confirm('Yakin?');">
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
                <div class="col-lg-6">
                    <div class="kotak" style="background-color: #bcaead;">
                        <div class="container mt-2" style="color: black;">
                            <h6 class="text-center mb-3"><b>Output</b></h6>
                            <div class="form-group">
                                <?php $i = 0;
                                foreach ($output_tulisan as $t) :  ?>
                                    <div class="row justify mb-2">
                                        <div class="col-lg-6">
                                            <label><?= $t['tulisan']; ?></label>
                                        </div>
                                        <div class="col-lg-3 text-right">
                                            <a type="submit" style="color:white" data-toggle="modal" data-target="#outputEdit" data-id="<?= $output_tulisan[$i]['id'] ?>" class="outputEdit">
                                                <i class="fas fa-pen-square" style="font-size:200%;color:#4e73df"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-3 text-left">
                                            <a href="<?= base_url('modul/deleteoutput/') . $t['id']; ?>" onclick=" return confirm('Yakin?');">
                                                <i class=" fas fa-minus-circle" style="font-size:200%;color:#e74a3b"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row justify">
                                        <div class="col-lg-12">
                                            <output type="text" id="<?= $t['data_tampil_output']; ?>" name="<?= $t['data_tampil_output']; ?>" class="form-control form-control-user mb-4"></output>
                                        </div>
                                    </div>
                                <?php $i++;
                                endforeach;
                                ?>
                            </div>
                            <div class="row justify-content-center mb-3" style="padding-bottom:10%;">
                            </div>
                            <div class="row justify-content-center mt-3 mb-1">
                                <button type="submit" style="background-color:#26A65B;border:none;margin-bottom:5%" data-id="<?= $modul['modul']; ?>" data-toggle="modal" data-target="#tambahOutput" class="btn btn-dark px-4 tambahOutput">
                                    Tambahkan Output
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="kotak" style="background-color: #bcaead;">
                        <div class="container mt-2" style="color: black;">
                            <h6 class="text-center mb-3"><b>Setting Video</b></h6>
                            <div class="form-group">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1;
                                    foreach ($video as $v) :  ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $v['ket'] ?></td>
                                                <td>
                                                    <button type="submit" style="background-color:#26A65B;border:none;margin-bottom:5%" data-id="<?= $v['id']; ?>" data-toggle="modal" data-target="#editVideoStream" class="btn btn-dark px-4 editVideoStream">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php $i++;
                                    endforeach;
                                    ?>
                                </table>
                            </div>
                            <div class="row justify-content-center mb-3" style="padding-bottom:10%;">
                            </div>
                            <div class="row justify-content-center mt-3 mb-1">
                                <button type="submit" style="background-color:#26A65B;border:none;margin-bottom:5%" data-id="<?= $modul['modul']; ?>" data-toggle="modal" data-target="#tambahVideoStream" class="btn btn-dark px-4 tambahVideoStream">
                                    Tambah
                                </button>
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
                    <div class="form-group">
                        <label for="data_satuan">Satuan</label>
                        <input type="text" class="form-control" id="data_satuan" name="data_satuan">
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
                    <div class="form-group">
                        <label for="data_satuann">Satuan</label>
                        <input type="text" class="form-control" id="data_satuann" name="data_satuann">
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
                    <div class="form-group">
                        <label for="status">Status</label>
                        <label for="data-output">Data Output</label>
                        <input type="text" class="form-control" id="data-output" name="data-output">
                    </div>
                    <div class="form-group">
                        <label for="data_satuan">Satuan</label>
                        <input type="text" class="form-control" id="data_satuan" name="data_satuan">
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

<div class="modal fade" id="tambahOutput" tabindex="-1" role="dialog" aria-labelledby="tambahOutputLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tombol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('modul/tambahoutput') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="modul_idddd" name="modul_idddd">
                        <label for="tulisann">Keterangan Output</label>
                        <input type="text" class="form-control" id="tulisann" name="tulisann">
                    </div>
                    <div class="form-group">
                        <label for="data_tampil_outputttt">Data output</label>
                        <input type="text" class="form-control" id="data_tampil_outputttt" name="data_tampil_outputttt">
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

<div class="modal fade" id="outputEdit" tabindex="-1" role="dialog" aria-labelledby="outputEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title outputEditLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('modul/editoutput') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="iddd" name="iddd">
                        <input type="hidden" id="iddd_modul" name="iddd_modul">
                        <label for="tulisan">Keterangan Output</label>
                        <input type="text" class="form-control" id="tulisan" name="tulisan">
                    </div>
                    <div class="form-group">
                        <label for="data_tampil_outputtt">Data output</label>
                        <input type="text" class="form-control" id="data_tampil_outputtt" name="data_tampil_outputtt">
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

<div class="modal fade" id="tambahVideoStream" tabindex="-1" role="dialog" aria-labelledby="tambahVideoStream" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('modul/tambahVideoStream') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title tambahVideoStream"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="tambah_video_id" name="tambah_video_id">
                        <input type="hidden" id="tambah_video_id_modul" name="tambah_video_id_modul">
                        <label for="tambah_ket">Nama</label>
                        <input type="text" class="form-control" id="tambah_ket" name="tambah_ket" required>
                    </div>
                    <div class="form-group">
                        <label for="tambah_link">Link</label>
                        <input type="text" class="form-control" id="tambah_link" name="tambah_link" required>
                    </div>
                    <div class="form-group">
                        <label for="tambah_width">Width</label>
                        <input type="text" class="form-control" id="tambah_width" name="tambah_width" required>
                    </div>
                    <div class="form-group">
                        <label for="tambah_height">Height</label>
                        <input type="text" class="form-control" id="tambah_height" name="tambah_height" required>
                    </div>
                    <div class="form-group">
                        <label for="tambah_transform">Transform</label>
                        <input type="text" class="form-control" id="tambah_transform" name="tambah_transform" required>
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

<div class="modal fade" id="editVideoStream" tabindex="-1" role="dialog" aria-labelledby="editVideoStream" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title editVideoStream"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('modul/editVideoStream') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" id="video_id" name="video_id">
                        <input type="hidden" id="video_id_modul" name="video_id_modul">
                        <label for="ket">Nama</label>
                        <input type="text" class="form-control" id="ket" name="ket">
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" id="link" name="link">
                    </div>
                    <div class="form-group">
                        <label for="width">Width</label>
                        <input type="text" class="form-control" id="width" name="width">
                    </div>
                    <div class="form-group">
                        <label for="height">Height</label>
                        <input type="text" class="form-control" id="height" name="height">
                    </div>
                    <div class="form-group">
                        <label for="transform">Transform</label>
                        <input type="text" class="form-control" id="transform" name="transform">
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