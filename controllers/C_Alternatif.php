<?php

class C_Alternatif extends Controller
{
    public function __construct()
    {
        $this->addFunction('url');

        $this->addFunction('web');
        $this->addFunction('session');
        $this->req = $this->library('Request');
        $this->alternatif = $this->model('M_Alternatif');
    }

    public function index()
    {
        $data = [
            'aktif' => 'alternatif',
            'judul' => 'Data Alternatif',
            'data_alternatif' => $this->alternatif->lihat(),
            'no' => 1
        ];
        $this->view('alternatif/index', $data);
    }

    public function tambah()
    {
        if (!isset($_POST['tambah'])) redirect('alternatif');

        $alternatif = $this->req->post('alternatif');
        if ($this->alternatif->tambah($alternatif)) {
            setSession('success', 'Data berhasil ditambahkan!');
            redirect('alternatif');
        } else {
            setSession('error', 'Data gagal ditambahkan!');
            redirect('alternatif');
        }
    }

    public function ubah($id)
    {
        if (!isset($id) || $this->alternatif->cek($id)->num_rows == 0) redirect('alternatif');

        $data = [
            'aktif' => 'alternatif',
            'judul' => 'Ubah alternatif',
            'alternatif' => $this->alternatif->lihat_id($id)->fetch_object(),
        ];
        $this->view('alternatif/ubah', $data);
    }

    public function proses_ubah($id)
    {
        if (!isset($id) || $this->alternatif->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('alternatif');

        $alternatif = $this->req->post('alternatif');
        if ($this->alternatif->ubah($alternatif, $id)) {
            setSession('success', 'Data berhasil diubah!');
            redirect('alternatif');
        } else {
            setSession('error', 'Data gagal diubah!');
            redirect('alternatif');
        }
    }

    public function hapus($id = null)
    {
        if (!isset($id) || $this->alternatif->cek($id)->num_rows == 0) redirect('alternatif');

        if ($this->alternatif->hapus($id)) {
            setSession('success', 'Data berhasil dihapus!');
            redirect('alternatif');
        } else {
            setSession('error', 'Data gagal dihapus!');
            redirect('alternatif');
        }
    }
}
