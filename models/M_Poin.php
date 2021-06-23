<?php

class M_Poin extends Model
{
    public function tambah($data)
    {
        $query = $this->insert('tab_poin', ['poin' => $data]);
        $query = $this->execute();
        return $query;
    }

    public function lihat()
    {
        $query = $this->get('tab_poin');
        $query = $this->execute();
        return $query;
    }

    public function lihat_id($id)
    {
        $query = $this->get_where('tab_poin', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function ubah($poin, $id)
    {
        $query = $this->update('tab_poin', ['poin' => $poin], ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function cek($id)
    {
        $query = $this->get_where('tab_poin', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function hapus($id)
    {
        $query = $this->delete('tab_poin', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }
}
