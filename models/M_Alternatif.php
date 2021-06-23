<?php

class M_Alternatif extends Model
{
    public function tambah($data)
    {
        $query = $this->insert('tab_alternatif', ['alternatif' => $data]);
        $query = $this->execute();
        return $query;
    }

    public function lihat()
    {
        $query = $this->get('tab_alternatif');
        $query = $this->execute();
        return $query;
    }

    public function lihat_id($id)
    {
        $query = $this->get_where('tab_alternatif', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function ubah($alternatif, $id)
    {
        $query = $this->update('tab_alternatif', ['alternatif' => $alternatif], ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function cek($id)
    {
        $query = $this->get_where('tab_alternatif', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function hapus($id)
    {
        $query = $this->delete('tab_alternatif', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }
}
