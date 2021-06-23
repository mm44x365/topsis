<?php

class C_Poin extends Controller
{
    public function __construct()
    {
        $this->addFunction('url');

        $this->addFunction('web');
        $this->addFunction('session');
        $this->req = $this->library('Request');
        $this->poin = $this->model('M_Poin');
    }

    public function index()
    {
        $data = [
            'aktif' => 'poin',
            'judul' => 'Data Poin',
            'data_poin' => $this->poin->lihat(),
            'no' => 1
        ];
        $this->view('poin/index', $data);
    }

    public function tambah()
    {
        if (!isset($_POST['tambah'])) redirect('poin');

        $poin = $this->req->post('poin');
        if ($this->poin->tambah($poin)) {
            setSession('success', 'Data berhasil ditambahkan!');
            redirect('poin');
        } else {
            setSession('error', 'Data gagal ditambahkan!');
            redirect('poin');
        }
    }

    public function ubah($id)
    {
        if (!isset($id) || $this->poin->cek($id)->num_rows == 0) redirect('poin');

        $data = [
            'aktif' => 'poin',
            'judul' => 'Ubah poin',
            'poin' => $this->poin->lihat_id($id)->fetch_object(),
        ];
        $this->view('poin/ubah', $data);
    }

    public function proses_ubah($id)
    {
        if (!isset($id) || $this->poin->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('poin');

        $poin = $this->req->post('poin');
        if ($this->poin->ubah($poin, $id)) {
            setSession('success', 'Data berhasil diubah!');
            redirect('poin');
        } else {
            setSession('error', 'Data gagal diubah!');
            redirect('poin');
        }
    }

    public function hapus($id = null)
    {
        if (!isset($id) || $this->poin->cek($id)->num_rows == 0) redirect('poin');

        if ($this->poin->hapus($id)) {
            setSession('success', 'Data berhasil dihapus!');
            redirect('poin');
        } else {
            setSession('error', 'Data gagal dihapus!');
            redirect('poin');
        }
    }
}
