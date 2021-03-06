<?= $this->extend('layout/templatel') ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="row mb-5 wow fadeInRight">
        <div class="col-sm-12 mb-3 mb-md-0">
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-dark font-weight-bold card-title">Persetujuan Permohonan Izin Penyelenggaraan Angkutan Orang Tidak Dalam Trayek (AOTDT)</h5>
                            <p class="card-text">Untuk mengajukan permohonan Permohonan Izin Penyelenggaraan Angkutan Orang Tidak Dalam Trayek atau Permohonan Izin AOTDT, <br>
                                Silahkan lengkapi berkas dibawah ini, pastikan data yang anda upload adalah benar <br>
                            </p>
                        </div>
                        <div class="text-right col">
                            <?php
                            if (count($ranmor) == $ask['jumlah_kendaraan']) {
                            ?>
                                <a href="/ask/ajukanPTSP/<?= $ask['idask'] ?>" onclick="return confirm('Ajukan permohonan ini ?')" type="button" class="btn btn-sm btn-success">Ajukan Permohonan <i class="fa fa-check ml-1"></i> </a>
                                <a href="/ask/lengkapiBerkas/<?= $ask['slug'] ?>/<?= $ask['kode_registrasi'] ?>" class="btn btn-sm btn-primary"> Data Kendaraan <i class="fa fa-arrow-right"></i></a>
                            <?php } else { ?>
                                <a href="/ask/lengkapiBerkas/<?= $ask['slug'] ?>/<?= $ask['kode_registrasi'] ?>" class="btn btn-sm btn-primary"> Data Kendaraan <i class="fa fa-arrow-right"></i></a>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="cards px-4 py-3">
                        <div class="md-form mb-4 pink-textarea active-textarea">
                            <textarea name="pelayanan_dimohon" id="form18" class="md-textarea form-control" rows="3" disabled><?= $ask['pelayanan_dimohon'] ?></textarea>
                            <label for="form18">Pelayanan yang dimohon</label>
                            <div class="invalid-feedback">
                                Pelayanan yang dimohon
                            </div>
                        </div>

                        <div class="md-form">
                            <input name="jumlah_kendaraan" type="number" id="form2" class="form-control" value="<?= $ask['jumlah_kendaraan'] ?>" disabled>
                            <label for="form2">Jumlah Kendaraan</label>
                            <div class="invalid-feedback">
                                Jumlah Kendaraan tidak boleh kosong
                            </div>
                        </div>

                        <div class="md-form">
                            <div class="file-field">
                                <a href="/img/img_surat_permohonan/<?= $ask['img_surat_permohonan'] ?>" target="_blank" type="button" class="btn btn-sm btn-success"><i class="fa fa-eye mr-1"></i> Lihat dokumen</a>
                                <div class="file-path-wrapper">
                                    <input name="img_surat_permohonan" class="file-path validate" type="text" placeholder="Scan / Foto Surat Permohonanan Izin Penyelenggaraan AOTDT (Jelas)">
                                </div>
                            </div>
                            <div class="kacili" style="margin-left:280px;">
                                <?= $validation->getError('img_surat_permohonan') ?>
                            </div>
                        </div>

                        <div class="md-form">
                            <div class="file-field">
                                <a href="/img/img_bukti_pengesahan/<?= $ask['img_bukti_pengesahan'] ?>" target="_blank" type="button" class="btn btn-sm btn-success"><i class="fa fa-eye mr-1"></i> Lihat dokumen</a>
                                <div class="file-path-wrapper">
                                    <input name="img_bukti_pengesahan" class="file-path validate" type="text" placeholder="Scan / Foto Bukti Pengesahan dari Kemenkumham/Koperasi (Jelas)">
                                </div>
                            </div>
                            <div class="kacili" style="margin-left:280px;">
                                <?= $validation->getError('img_bukti_pengesahan') ?>
                            </div>
                        </div>

                        <div class="md-form">
                            <div class="file-field">
                                <a href="/img/img_domisili/<?= $ask['img_domisili'] ?>" target="_blank" type="button" class="btn btn-sm btn-success"><i class="fa fa-eye mr-1"></i> Lihat dokumen</a>
                                <div class="file-path-wrapper">
                                    <input name="img_domisili" class="file-path validate" type="text" placeholder="Scan / Foto Surat Keterangan Domisili (Jelas)">
                                </div>
                            </div>
                            <div class="kacili" style="margin-left:280px;">
                                <?= $validation->getError('img_domisili') ?>
                            </div>
                        </div>

                        <div class="md-form">
                            <div class="file-field">
                                <a href="/img/img_pernyataan_kesanggupan/<?= $ask['img_pernyataan_kesanggupan'] ?>" target="_blank" type="button" class="btn btn-sm btn-success"><i class="fa fa-eye mr-1"></i> Lihat dokumen</a>
                                <div class="file-path-wrapper">
                                    <input name="img_pernyataan_kesanggupan" class="file-path validate" type="text" placeholder="Scan / Foto Surat Pernyataan Kesanggupan untuk Memenuhi seluruh kewajiban sebagai pemegang izin AOTDT bermaterai (Jelas)">
                                </div>
                            </div>
                            <div class="kacili" style="margin-left:280px;">
                                <?= $validation->getError('img_pernyataan_kesanggupan') ?>
                            </div>
                        </div>

                        <div class="md-form">
                            <div class="file-field">
                                <a href="/img/img_pernyataan_kerjasama/<?= $ask['img_pernyataan_kerjasama'] ?>" target="_blank" type="button" class="btn btn-sm btn-success"><i class="fa fa-eye mr-1"></i> Lihat dokumen</a>
                                <div class="file-path-wrapper">
                                    <input name="img_pernyataan_kerjasama" class="file-path validate" type="text" placeholder="Scan / Foto Surat Pernyataan Kesanggupan memiliki dan atau bekerjasama dengan bengkel bermaterai (Jelas)">
                                </div>
                            </div>
                            <div class="kacili" style="margin-left:280px;">
                                <?= $validation->getError('img_pernyataan_kerjasama') ?>
                            </div>
                        </div>

                        <div class="md-form">
                            <div class="file-field">
                                <a href="/img/img_perjanjian/<?= $ask['img_perjanjian'] ?>" target="_blank" type="button" class="btn btn-sm btn-success"><i class="fa fa-eye mr-1"></i> Lihat dokumen</a>
                                <div class="file-path-wrapper">
                                    <input name="img_perjanjian" class="file-path validate" type="text" placeholder="Scan / Foto Surat Perjanjian antara pemilik kendaraan/anggota koperasi dengan Koperasi (Jelas)">
                                </div>
                            </div>
                            <div class="kacili" style="margin-left:280px;">
                                <?= $validation->getError('img_perjanjian') ?>
                            </div>
                        </div>

                        <div class="md-form">
                            <div class="file-field">
                                <a href="/img/img_pemda/<?= $ask['img_pemda'] ?>" target="_blank" type="button" class="btn btn-sm btn-success"><i class="fa fa-eye mr-1"></i> Lihat dokumen</a>
                                <div class="file-path-wrapper">
                                    <input name="img_pemda" class="file-path validate" type="text" placeholder="Scan / Foto Surat Keterangan dari Pemerintah Daerah Setempat tentang tempat penyimpanan kendaraan (Jelas)">
                                </div>
                            </div>
                            <div class="kacili" style="margin-left:280px;">
                                <?= $validation->getError('img_pemda') ?>
                            </div>
                        </div>

                        <div class="md-form">
                            <div class="file-field">
                                <a href="/img/img_rencana_bisnis/<?= $ask['img_rencana_bisnis'] ?>" target="_blank" type="button" class="btn btn-sm btn-success"><i class="fa fa-eye mr-1"></i> Lihat dokumen</a>
                                <div class="file-path-wrapper">
                                    <input name="img_rencana_bisnis" class="file-path validate" type="text" placeholder="Scan / Foto Rencana bisnis perusahaan angkutan/koperasi (Jelas)">
                                </div>
                            </div>
                            <div class="kacili" style="margin-left:280px;">
                                <?= $validation->getError('img_rencana_bisnis') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>