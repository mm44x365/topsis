<?php

class M_Kriteria extends Model
{
    public function tambah($data)
    {
        $query = $this->insert('tab_kriteria', $data);
        $query = $this->execute();
        return $query;
    }

    public function lihat()
    {
        $query = $this->get('tab_kriteria');
        $query = $this->execute();
        return $query;
    }

    public function lihat_id($id)
    {
        $query = $this->get_where('tab_kriteria', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function ubah($data, $id)
    {
        $query = $this->update('tab_kriteria', $data, ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function cek($id)
    {
        $query = $this->get_where('tab_kriteria', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function hapus($id)
    {
        $query = $this->delete('tab_kriteria', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }
}
