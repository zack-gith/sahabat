<?php

namespace App\Controllers;

use App\Models\AsalTujuanModel;
use App\Models\KoperasiModel;
use App\Models\LoginModel;
use App\Models\MsgPenolakanModel;
use App\Models\RekomendasiModel;
use App\Models\TrayekModel;
use App\Models\VerifikasiModel;

class Koperasi extends BaseController
{
    protected $rekomendasiModel;
    protected $verifikasiModel;
    protected $trayekModel;
    protected $msgPenolakanModel;
    protected $loginModel;
    protected $user;
    protected $asalTujuanModel;
    protected $koperasiModel;

    public function __construct()
    {
        $this->rekomendasiModel = new RekomendasiModel();
        $this->verifikasiModel = new VerifikasiModel();
        $this->trayekModel = new TrayekModel();
        $this->msgPenolakanModel = new MsgPenolakanModel();
        $this->loginModel = new LoginModel();
        $this->asalTujuanModel = new AsalTujuanModel();
        $this->koperasiModel = new KoperasiModel();
        $this->session = session();
        $this->user = $this->loginModel->where('email', $this->session->get('email'))->first();
    }

    public function index()
    {
        $data = [
            'title' => 'Koperasi',
            'session' => $this->user,
            'permohonan' => $this->koperasiModel->getPermohonan(),
        ];
        return view('koperasi/index', $data);
    }

    public function buat_permohonan()
    {
        session();
        $data = [
            'title' => 'Buat Permohonan',
            'trayek' => $this->trayekModel->getTrayek(),
            'session' => $this->user,
            'wilayah' => $this->asalTujuanModel->getWilayah(),
            'validation' => \Config\Services::validation(),
        ];
        return view('koperasi/buat_permohonan', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'img_surat_permohonan_koperasi' => [
                'rules' => 'uploaded[img_surat_permohonan_koperasi]|max_size[img_surat_permohonan_koperasi,1024]|is_image[img_surat_permohonan_koperasi]|mime_in[img_surat_permohonan_koperasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar dokumen terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar (Maksimal 1Mb)',
                    'is_image' => 'Ini bukan gambar',
                    'mime_in' => 'Ini bukan gambar',
                ],
            ],
            'img_ktp_pemilik' => [
                'rules' => 'uploaded[img_ktp_pemilik]|max_size[img_ktp_pemilik,1024]|is_image[img_ktp_pemilik]|mime_in[img_ktp_pemilik,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar dokumen terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar (Maksimal 1Mb)',
                    'is_image' => 'Ini bukan gambar',
                    'mime_in' => 'Ini bukan gambar',
                ],
            ],
            'img_stnkb' => [
                'rules' => 'uploaded[img_stnkb]|max_size[img_stnkb,1024]|is_image[img_stnkb]|mime_in[img_stnkb,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar dokumen terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar (Maksimal 1Mb)',
                    'is_image' => 'Ini bukan gambar',
                    'mime_in' => 'Ini bukan gambar',
                ],
            ],
            'img_jasa_raharja' => [
                'rules' => 'uploaded[img_jasa_raharja]|max_size[img_jasa_raharja,1024]|is_image[img_jasa_raharja]|mime_in[img_jasa_raharja,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar dokumen terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar (Maksimal 1Mb)',
                    'is_image' => 'Ini bukan gambar',
                    'mime_in' => 'Ini bukan gambar',
                ],
            ],
            'img_kir' => [
                'rules' => 'uploaded[img_kir]|max_size[img_kir,1024]|is_image[img_kir]|mime_in[img_kir,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar dokumen terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar (Maksimal 1Mb)',
                    'is_image' => 'Ini bukan gambar',
                    'mime_in' => 'Ini bukan gambar',
                ],
            ],
            'trayek_dilayani' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Trayek yang dilayani belum dipilih',
                ],
            ],
        ])) {
            return redirect()->to('/koperasi/buat_permohonan')->withInput();
        }

        //abil gambar
        $img_surat_permohonan_koperasi = $this->request->getFile('img_surat_permohonan_koperasi');

        if ($img_surat_permohonan_koperasi->getError() == 4) {
            $nama_img_surat_permohonan_koperasi = "default.png";
        } else {
            $nama_img_surat_permohonan_koperasi = $img_surat_permohonan_koperasi->getRandomName();
            $img_surat_permohonan_koperasi->move('img/img_surat_permohonan_koperasi', $nama_img_surat_permohonan_koperasi);
        }

        $img_ktp_pemilik = $this->request->getFile('img_ktp_pemilik');

        if ($img_ktp_pemilik->getError() == 4) {
            $nama_img_ktp_pemilik = "default.png";
        } else {
            $nama_img_ktp_pemilik = $img_ktp_pemilik->getRandomName();
            $img_ktp_pemilik->move('img/img_ktp_pemilik', $nama_img_ktp_pemilik);
        }

        $img_stnkb = $this->request->getFile('img_stnkb');

        if ($img_stnkb->getError() == 4) {
            $nama_img_stnkb = "default.png";
        } else {
            $nama_img_stnkb = $img_stnkb->getRandomName();
            $img_stnkb->move('img/img_stnkb_pkb', $nama_img_stnkb);
        }

        $img_jasa_raharja = $this->request->getFile('img_jasa_raharja');

        if ($img_jasa_raharja->getError() == 4) {
            $nama_img_jasa_raharja = "default.png";
        } else {
            $nama_img_jasa_raharja = $img_jasa_raharja->getRandomName();
            $img_jasa_raharja->move('img/img_jasa_raharja', $nama_img_jasa_raharja);
        }

        $img_kir = $this->request->getFile('img_kir');

        if ($img_kir->getError() == 4) {
            $nama_img_kir = "default.png";
        } else {
            $nama_img_kir = $img_kir->getRandomName();
            $img_kir->move('img/img_kir', $nama_img_kir);
        }

        // $slug = url_title($this->request->getVar('nama_pemohon'), '-', true);

        if ($this->request->getVar('asal')) {
            $status_asal = 0;
            $asal = $this->request->getVar('asal');
        } else {
            $status_asal = 3;
            $asal = 0;
        }

        if ($this->request->getVar('tujuan')) {
            $status_tujuan = 0;
            $tujuan = $this->request->getVar('tujuan');
        } else {
            $status_tujuan = 3;
            $tujuan = 0;
        }

        $slug = url_title($this->request->getVar('nama_pemilik'), '-', true);

        $this->koperasiModel->save([
            'slug' => $slug,
            'koperasi_id' => $this->user['id'],
            'status_asal' => $status_asal,
            'status_tujuan' => $status_tujuan,
            'trayek_dilayani' => $this->request->getVar('trayek_dilayani'),
            'asal' => $asal,
            'tujuan' => $tujuan,
            'nomor_kendaraan' => $this->request->getVar('nomor_kendaraan'),
            'nama_pemilik' => $this->request->getVar('nama_pemilik'),
            'alamat_pemilik' => $this->request->getVar('alamat_pemilik'),
            'jenis_kendaraan' => $this->request->getVar('jenis_kendaraan'),
            'nomor_kir' => $this->request->getVar('nomor_kir'),
            'merk' => $this->request->getVar('merk'),
            'tahun_pembuatan' => $this->request->getVar('tahun_pembuatan'),
            'nomor_chasis' => $this->request->getVar('nomor_chasis'),
            'nomor_mesin' => $this->request->getVar('nomor_mesin'),
            'nomor_regis_pkb' => $this->request->getVar('nomor_regis_pkb'),
            'img_surat_permohonan_koperasi' => $nama_img_surat_permohonan_koperasi,
            'img_ktp_pemilik' => $nama_img_ktp_pemilik,
            'img_stnkb' => $nama_img_stnkb,
            'img_jasa_raharja' => $nama_img_jasa_raharja,
            'img_kir' => $nama_img_kir,
        ]);

        return redirect()->to('/koperasi/index/' . $this->request->getVar('kdb') . '');
        // dd($this->request->getVar());
    }

    public function verifikasiPermohonanKota()
    {
        if ($this->user['id'] == 9) {
            session();
            $data = [
                'title' => 'Koperasi',
                'session' => $this->user,
                'permohonan' => $this->koperasiModel->getPermohonanKota(),
            ];
            return view('koperasi/indexKota', $data);
        } else {
            return view('blank');
        }
    }
    public function verifikasiPermohonanKab()
    {
        if ($this->user['id'] == 10) {
            session();
            $data = [
                'title' => 'Koperasi',
                'session' => $this->user,
                'permohonan' => $this->koperasiModel->getPermohonanKab(),
            ];
            return view('koperasi/indexKota', $data);
        } else {
            return view('blank');
        }
    }

    public function verifikasiKab($slug, $id)
    {
        if ($this->user['id'] == 10) {
            session();

            $check = $this->koperasiModel->getPermohonanKab($slug, $id);
            if ($check) {
                if ($check['asal'] == 1) {
                    $get = $this->koperasiModel->getPermohonanKab($slug, $id);
                } else if ($check['tujuan'] == 1) {
                    $get = $this->koperasiModel->getPermohonanKab($slug, $id);
                } else {
                    return view('blank');
                }
            } else {
                return view('blank');
            }
            $data = [
                'title' => 'Koperasi',
                'session' => $this->user,
                'permohonan' => $get,
                'koperasi' => $this->koperasiModel->getDataKoperasi($id),
                'trayek' => $this->trayekModel->getTrayek(),
                'wilayah' => $this->asalTujuanModel->getWilayah(),
            ];
            return view('koperasi/verifikasi', $data);
        } else {
            return view('blank');
        }
    }

    public function verifikasiKota($slug, $id)
    {
        if ($this->user['id'] == 9) {
            session();

            $check = $this->koperasiModel->getPermohonanKab($slug, $id);
            if ($check) {
                if ($check['asal'] == 2) {
                    $get = $this->koperasiModel->getPermohonanKab($slug, $id);
                } else if ($check['tujuan'] == 2) {
                    $get = $this->koperasiModel->getPermohonanKab($slug, $id);
                } else {
                    return view('blank');
                }
            } else {
                return view('blank');
            }

            $data = [
                'title' => 'Koperasi',
                'session' => $this->user,
                'permohonan' => $get,
                'koperasi' => $this->koperasiModel->getDataKoperasi($id),
                'trayek' => $this->trayekModel->getTrayek(),
                'wilayah' => $this->asalTujuanModel->getWilayah(),
            ];
            return view('koperasi/verifikasi', $data);
        } else {
            return view('blank');
        }
    }
}
