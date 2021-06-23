<?php

class C_Kriteria extends Controller
{
    public function __construct()
    {
        $this->addFunction('url');

        $this->addFunction('web');
        $this->addFunction('session');
        $this->req = $this->library('Request');
        $this->kriteria = $this->model('M_Kriteria');
    }

    public function index()
    {
        $data = [
            'aktif' => 'kriteria',
            'judul' => 'Data Kriteria',
            'data_kriteria' => $this->kriteria->lihat(),
            'no' => 1
        ];
        $this->view('kriteria/index', $data);
    }

    public function tambah()
    {
        if (!isset($_POST['tambah'])) redirect('kriteria');
        $data = [
            'kriteria' =>  $this->req->post('kriteria'),
            'bobot' =>  $this->req->post('bobot'),
        ];
        // $kriteria = $this->req->post('kriteria');
        if ($this->kriteria->tambah($data)) {
            setSession('success', 'Data berhasil ditambahkan!');
            redirect('kriteria');
        } else {
            setSession('error', 'Data gagal ditambahkan!');
            redirect('kriteria');
        }
    }

    public function ubah($id)
    {
        if (!isset($id) || $this->kriteria->cek($id)->num_rows == 0) redirect('kriteria');

        $data = [
            'aktif' => 'kriteria',
            'judul' => 'Ubah Kriteria',
            'kriteria' => $this->kriteria->lihat_id($id)->fetch_object(),
        ];
        $this->view('kriteria/ubah', $data);
    }

    public function proses_ubah($id)
    {
        if (!isset($id) || $this->kriteria->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('kriteria');
        $data = [
            'kriteria' =>  $this->req->post('kriteria'),
            'bobot' =>  $this->req->post('bobot'),
        ];
        // $kriteria = $this->req->post('kriteria');
        // $bobot = $this->req->post('bobot');
        if ($this->kriteria->ubah($data, $id)) {
            setSession('success', 'Data berhasil diubah!');
            redirect('kriteria');
        } else {
            setSession('error', 'Data gagal diubah!');
            redirect('kriteria');
        }
    }

    public function hapus($id = null)
    {
        if (!isset($id) || $this->kriteria->cek($id)->num_rows == 0) redirect('kriteria');

        if ($this->kriteria->hapus($id)) {
            setSession('success', 'Data berhasil dihapus!');
            redirect('kriteria');
        } else {
            setSession('error', 'Data gagal dihapus!');
            redirect('kriteria');
        }
    }
}
