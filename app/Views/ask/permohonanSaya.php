<?= $this->extend('layout/templatel') ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="row mb-5 wow fadeInRight">
        <div class="col-sm-12 mb-3 mb-md-0">
            <div class="">
                <div class="card-body">

                    <h5 class="text-dark font-weight-bold card-title">Data Permohonan Rekomendasi AOTDT</h5>
                    <p class="card-text">Silahkan lengkapi berkas kendaraan anda sesuai dengan jumlah kendaraan yang dimohon, <br>
                    </p>

                    <div class="cards px-4 py-3">
                        <div class="table-responsive animated zoomIn">
                            <table id="dtMaterialDesignExample" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead class="primary-color-dark white-text">
                                    <tr>
                                        <td class="th-sm">No
                                        </td>
                                        <td class="th-sm">Nama Perusahaan
                                        </td>
                                        <td class="th-sm" style="width: 120px;">Tanggal Pengajuan
                                        </td>
                                        <td class="th-sm">Status
                                        </td>
                                        <td class="th-sm" style="width:360px;">Action
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1
                                    ?>
                                    <?php foreach ($ask as $ran) : ?>
                                        <?php
                                        if ($ran['status_ptsp'] == 0) {
                                            $btn1 = '<a href="" class="badge badge-danger">Belum di ajukan</a>';
                                            $btn2 = '<a href="" class="btn btn-sm btn-info mr-1">Detail</a>';
                                            $btn3 = '<a onclick="return confirm(\'Apakah anda yakin ingin membatalkan pengajuan ini ?\')" href="/ask/batalkanPengajuan/' . $ran['kode_registrasi'] . '" class="btn btn-sm btn-danger">Batalkan</a>';
                                        }
                                        if ($ran['status_ptsp'] == 1) {
                                            $btn1 = '<a href="" class="badge badge-warning">Sedang Diverifikasi oleh PTSP</a>';
                                            $btn2 = '';
                                            $btn3 = '';
                                        }
                                        if ($ran['status_ptsp'] == 2) {
                                            $btn1 = '<a href="" class="badge badge-success">Diterima</a>';
                                            $btn2 = '';
                                            $btn3 = '<a href="" class="btn btn-sm btn-light">Cetak</a>';
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $ran['nama_perusahaan'] ?></td>
                                            <td><?= $ran['created_at'] ?></td>
                                            <td>
                                                <?= $btn1 ?>
                                            </td>
                                            <td>
                                                <?= $btn2 ?>
                                                <?= $btn3 ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>