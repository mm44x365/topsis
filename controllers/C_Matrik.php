<?php

class C_Matrik extends Controller
{
    public function __construct()
    {
        $this->addFunction('url');

        $this->addFunction('web');
        $this->addFunction('session');
        $this->req = $this->library('Request');
        $this->alternatif = $this->model('M_Alternatif');
        $this->kriteria = $this->model('M_Kriteria');
        $this->poin = $this->model('M_Poin');
        $this->matrik = $this->model('M_Matrik');
    }

    public function index()
    {
        $data = [
            'aktif' => 'matrik',
            'judul' => 'Data Matrik',
            'data_alternatif' => $this->alternatif->lihat(),
            'data_kriteria' => $this->kriteria->lihat(),
            'data_poin' => $this->poin->lihat(),
            'view_matrik' => $this->matrik->view_matrik(),
            'no' => 1
        ];
        $this->view('matrik/index', $data);
    }

    public function tambah()
    {
        if (!isset($_POST['tambah'])) redirect('matrik');
        $data = [
            'id_alternatif' => $this->req->post('id_alternatif'),
            'id_kriteria' => $this->req->post('id_kriteria'),
            'nilai' => $this->req->post('nilai'),
        ];

        if ($this->matrik->tambah($data)) {
            setSession('success', 'Data berhasil ditambahkan!');
            redirect('matrik');
        } else {
            setSession('error', 'Data gagal ditambahkan!');
            redirect('matrik');
        }
    }

    public function clear($id = 1)
    {
        if ($this->matrik->hapus($id)) {
            setSession('success', 'Data berhasil dihapus!');
            redirect('matrik');
        } else {
            setSession('error', 'Data gagal dihapus!');
            redirect('matrik');
        }
    }
}
