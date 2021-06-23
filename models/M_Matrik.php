<?php

class M_Matrik extends Model
{
    public function lihat()
    {
        $query = $this->get('tab_matrik', ['id', 'id_alternatif', 'id_kriteria', 'id_nilai']);
        $query = $this->execute();
        return $query;
    }
    public function view_matrik()
    {
        $query = $this->get('view_matrik');
        $query = $this->execute();
        return $query;
    }
    public function view_matrik2()
    {
        $query = $this->get('view_matrik2');
        $query = $this->execute();
        return $query;
    }

    public function tambah($data)
    {
        $query = $this->insert('tab_matrik', $data);
        $query = $this->execute();
        return $query;
    }

    public function lihat_id($id)
    {
        $query = $this->get_where('tab_matrik', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function ubah($data, $id)
    {
        $query = $this->update('tab_matrik', $data, ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function cek($id)
    {
        $query = $this->get_where('tab_matrik', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function detail($id)
    {
        $query = $this->get_where('tab_matrik', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function hapus($id)
    {
        $query = $this->delete('tab_matrik', ['dummy' => $id]);
        $query = $this->execute();
        return $query;
    }
}
